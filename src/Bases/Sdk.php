<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk\Bases;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Exceptions\Invalid;
use Uniondrug\ServiceSdk\Exceptions\Undefined;
use Uniondrug\ServiceSdk\Responses\Response;
use Uniondrug\ServiceSdk\Responses\ResponseInterface;

/**
 * Sdk基类
 * @package Uniondrug\ServiceSdk\Bases
 */
abstract class Sdk
{
    /**
     * @var Client
     */
    private static $client;
    /**
     * 容器
     * @var Container
     */
    private $container;
    /**
     * GuzzleHttp选项
     * @var array
     */
    private static $defaultOptions = [
        'allow_redirects' => false,
        'html_errors' => false,
        'timeout' => 30,
        'headers' => []
    ];
    /**
     * SDK调用名
     * @var string
     */
    private $name;
    /**
     * 服务地址
     * 首次调用时, 将通过该名称查询服务的真实地址
     * @var string
     */
    private $serviceHost = '';
    /**
     * 服务地址最后查询时间
     * @var int
     */
    private $serviceHostUpdated = 0;
    /**
     * SDK服务名
     * @var string
     */
    protected $serviceName = null;

    /**
     * Sdk constructor.
     * @param Container $container
     * @param string    $name
     * @throws Invalid
     */
    public function __construct($container, $name)
    {
        $this->container = $container;
        $this->name = $name;
        // 1. service name
        if ($this->serviceName === null) {
            throw new Invalid("service name of sdk not defined by property - ".get_class($this)."::\$serviceName");
        }
        // 2. default options
        if (self::$defaultOptions === null) {
            // 2.1 default
            self::$defaultOptions = [
                'allow_redirects' => false,
                'html_errors' => false,
                'timeout' => 30,
                'headers' => [
                    'User-Agent' => $container->getConfig()->path('app.appName', 'unknown').'/'.$container->getConfig()->path('app.appVersion', '0.0.0')
                ]
            ];
            // 2.2 configuration
        }
    }

    /**
     * @param string $name
     * @param array  $arguments
     * @throws Undefined
     */
    public function __call($name, $arguments)
    {
        throw new Undefined("call undefined sdk method - ".get_class($this)."::{$name}()");
    }

    /**
     * 请求SDK
     * @param string $method
     * @param string $url
     * @param null   $body
     * @param null   $query
     * @param null   $extra
     * @return ResponseInterface
     */
    protected function restful(string $method, string $url, $body = null, $query = null, $extra = null)
    {
        // 1. format URL
        if (preg_match("/^https?:\/\//i", $url) === 0) {
            $url = $this->serviceHost.'/'.preg_replace("/^[\/]+/", "", $url);
        }
        // 2. options
        $options = self::$defaultOptions;
        // 2.1 with params override
        if (is_array($extra) && count($extra)) {
            $options = array_replace_recursive($options, $extra);
        }
        // 2.2 query string
        if (is_array($query) && count($query)) {
            $options['query'] = $query;
        }
        // 2.3 post body
        if (is_array($body) && count($body)) {
            // 2.3.1 with array
            $options['json'] = $body;
        } else if (is_object($body)) {
            // 2.3.2 with object
            if (method_exists($body, 'toArray')) {
                $options['json'] = $body->toArray();
            } else if (method_exists($body, 'toJson')) {
                $options['body'] = $body->toJson();
                $options['headers']['content-type'] = 'application/json';
            }
        }
        // 3 call http client
        if (self::$client === null) {
            self::$client = $this->container->getShared('httpClient');
        }
        // 4. init response
        $response = new Response();
        try {
            // 4.1 send request
            $request = self::$client->request($method, $url, $options);
            // 4.2 parse origin contents
            $stream = $request->getBody();
            if ($stream instanceof Stream) {
                $response->setContents($stream->getContents());
            }
            // 4.3 status
            $statusCode = (int) $request->getStatusCode();
            if ($statusCode !== 200) {
                throw new \Exception($request->getReasonPhrase(), $statusCode);
            }
        } catch(\Throwable $e) {
            $response->setError($e->getCode(), $e->getMessage());
        } finally {
            $response->ended();
        }
        return $response;
    }

    /**
     * 兼容V1
     */
    protected function __v1()
    {
        $this->serviceHost = 'http://192.168.10.127:8000';
    }

    /**
     * 兼容V2
     */
    protected function __v2()
    {
        $this->serviceHost = 'http://192.168.10.127:8000';
    }
}
