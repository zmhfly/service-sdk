<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Base;

use GuzzleHttp\Psr7\Stream;
use Uniondrug\Framework\Container;
use Uniondrug\HttpClient\Client;
use Uniondrug\ServiceSdk\Exceptions\NotRegisted;
use Uniondrug\ServiceSdk\Exceptions\Unknown;
use Uniondrug\ServiceSdk\Exceptions\NotCompatiable;
use Uniondrug\ServiceSdk\Exceptions\NotSdk;

/**
 * Sdk基类
 * 兼容V1/V2二个版本
 * @package Uniondrug\ServiceSdk\Base
 */
abstract class Sdk implements SdkInterface
{
    /**
     * HTTP请求参数
     * 第1次调用时初始化
     * @var array
     */
    private static $defaultOptions;
    /**
     * HTTP请求工具
     * @var Client
     */
    private static $httpClient;
    /**
     * DI容器
     * @var Container
     */
    protected $container;
    /**
     * SDK名称
     * @var string
     */
    protected $sdkName;
    /**
     * 服务名称
     * 当调用SDK时, 将从Consul获取服务地址
     * @var string
     */
    protected $serviceName;
    /**
     * 服务地址
     * @var string
     */
    protected $serviceHost;
    /**
     * 复用
     */
    use WithTrait;

    /**
     * 当调用SDK未定义的接口/方法时触发
     * @param string $name
     * @param array  $arguments
     * @throws NotSdk
     */
    final public function __call($name, $arguments)
    {
        throw new NotSdk("SDK {$this->sdkName} 未定义 {$name} 接口/方法");
    }

    /**
     * 构造SDK对象
     * @param Container $container
     * @throws Unknown
     */
    public function __construct(Container $container, string $sdkName)
    {
        $this->container = $container;
        $this->sdkName = $sdkName;
        if ($this->serviceName === null) {
            throw new Unknown("SDK {$this->sdkName} 未通过 serviceName 属性定义服务名称");
        }
    }

    /**
     * V1版本兼容模式
     * @throws NotCompatiable
     */
    final protected function _initHostByCompatiable()
    {
        // 1. 已加载
        if ($this->serviceHost !== null) {
            return;
        }
        // 2. 第1次调用
        $host = $this->container->getConfig()->path('sdk.compatiables.'.$this->serviceName);
        if (is_string($host) && $host !== '') {
            if (preg_match("/^https*:\/\//i", $host) === 0) {
                $host = "http://{$host}";
            }
            $this->serviceHost = preg_replace("/[\/]+$/", "", $host);
            return;
        }
        // 3. 配置文件未定义兼容
        throw new NotCompatiable("SDK {$this->sdkName} 未通过配置文件 sdk.php 定义兼容服务地址");
    }

    /**
     * V2版本初始化
     * 通过服务名称从Consul读取服务地址
     * @throws Unknown
     */
    final protected function _initHostByConsul()
    {
        // 1. 已读取
        if ($this->serviceHost !== null) {
            return;
        }
        // 2. 第1次调用
        $url = $this->container->getConfig()->path('sdk.consulApiAddress');
        if (!is_string($url) || $url === '') {
            throw new Unknown("配置文件 sdk.php 未通过 consulApiAddress 字段定义Consul地址");
        }
        // 3. protected HOST(consul) from config
        if ($this->sdkName === "consul" && preg_match("/^(https*:\/\/[:_a-z0-9\.]+)/i", $url, $m) > 0) {
            $this->serviceHost = $m[1];
            return;
        }
        /**
         * 4. send consul request
         * @var Response $resp
         */
        $resp = $this->_initRestful("GET", "{$url}/{$this->serviceName}");
        if ($resp->hasError()) {
            throw new Unknown($resp->getError(), $resp->getErrno());
        }
        /**
         * 5. fetch consul service
         */
        $serv = $resp->getConsulService();
        if ($serv === false) {
            throw new NotRegisted("SDK {$this->sdkName} 的服务名 {$this->serviceName} 未在Consul注册");
        }
        $this->serviceHost = $serv->url;
    }

    /**
     * 发起Restful请求
     * @param string $method
     * @param string $url
     * @param null   $body
     * @param null   $extra
     * @return Response
     * @throws Unknown
     */
    final protected function _initRestful(string $method, string $url, $body = null, $extra = null)
    {
        // 1. 初始化默认选项
        if (self::$defaultOptions === null) {
            // 1.1 default
            self::$defaultOptions = [
                'allow_redirects' => false,
                'http_errors' => false,
                'timeout' => 30,
                'headers' => []
            ];
            // 1.2 user agent
            self::$defaultOptions['headers']['User-Agent'] = $this->container->getConfig()->path('app.appName', 'sketch').'/'.$this->container->getConfig()->path('app.appVersion', '0.0.0');
        }
        // 2. copy
        $options = self::$defaultOptions;
        // 3. merge
        if (is_array($extra) && count($extra)) {
            $options = array_replace_recursive($options, $extra);
        }
        // 4. body
        if (is_array($body)) {
            $options['json'] = $body;
        } else if (is_object($body)) {
            if (method_exists($body, 'toArray')) {
                $options['json'] = $body->toArray();
            } else if (method_exists($body, 'toJson')) {
                $options['body'] = $body->toJson();
                $options['headers']['content-type'] = 'application/json';
            }
        }
        // 5. http client
        if (self::$httpClient === null) {
            // 5.1 injectable
            if (!$this->container->has('httpClient')) {
                throw new Unknown("依赖 httpClient 未注入");
            }
            // 5.2 type/httpClient
            $http = $this->container->getShared('httpClient');
            if (!($http instanceof Client)) {
                throw new Unknown("依赖 httpClient 注入了错误对象");
            }
            // 5.3 assign
            self::$httpClient = $http;
        }
        // 6. request & response
        $response = new Response($this->container, $method, $url);
        try {
            $result = self::$httpClient->request($method, $url, $options);
            // set response contents
            $body = $result->getBody();
            if ($body instanceof Stream) {
                $response->setContents($body->getContents());
            }
            // throw for not 200 status
            $statusCode = (int) $result->getStatusCode();
            if ($statusCode !== 200) {
                throw new \Exception($result->getReasonPhrase(), $statusCode);
            }
        } catch(\Throwable $e) {
            $response->setError($e->getCode(), $e->getMessage());
        } finally {
            $response->end();
        }
        // 7. response
        return $response;
    }
}
