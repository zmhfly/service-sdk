<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2018-10-23
 */
namespace Uniondrug\ServiceSdk\Requests;

use Phalcon\Di;
use Phalcon\Logger\AdapterInterface;
use Uniondrug\Framework\Container;
use Uniondrug\Phar\Server\XHttp;
use Uniondrug\Phar\Server\XSocket;
use Uniondrug\ServiceSdk\Configs\Config;
use Uniondrug\ServiceSdk\Responses\Response;
use Uniondrug\ServiceSdk\Responses\ResponseInterface;

/**
 * SDK标准请求
 * @package Uniondrug\ServiceSdk\Requests
 */
class Request
{
    /**
     * 结果
     * @var Response
     */
    public $response;
    /**
     * 配置
     * @var Config
     */
    public $config;
    /**
     * 日志
     * @var AdapterInterface
     */
    public $logger;
    /**
     * 缓存时长
     * @var int
     */
    public $cacheDeadline;
    /**
     * @var RequestCache
     */
    public $cacheRequest;
    /**
     * @var RequestConsul
     */
    private static $consulRequest;
    /**
     * 重试次数
     * @var int
     */
    public $retryTimes;
    /**
     * 请求ID
     * @var string
     */
    public $requestId = '';
    /**
     * @var string
     */
    public $requestMethod;
    /**
     * @var string
     */
    public $requestUri;
    /**
     * @var string
     */
    public $requestUrl;
    /**
     * @var array
     */
    public $requestOptions;
    /**
     * @var Container
     */
    private $container;
    /**
     * @var XHttp|XSocket
     */
    private $server;

    /**
     * @param AdapterInterface $logger
     * @param Config           $config
     * @param int              $cacheDeadline
     * @param int              $retryTimes
     */
    public function __construct($logger, Config $config, int $cacheDeadline, int $retryTimes)
    {
        // 1. initialize
        $this->response = new Response();
        $this->logger = $logger;
        $this->config = $config;
        $this->cacheDeadline = $cacheDeadline;
        $this->retryTimes = $retryTimes;
        // 2. Container
        $this->container = Di::getDefault();
        if ($this->container->has('server')){
            $server = $this->container->get('server');
            if ($server instanceof XHttp || $server instanceof XSocket){
                $this->server = $server;
                $this->requestId = $this->server->getTrace()->getTrace();
            }
        }
    }

    /**
     * 请求完成
     * @return ResponseInterface
     */
    public function end()
    {
        $this->response->end();
        if ($this->response->hasError()) {
            $this->logger->debug("[d={$this->response->getDuration()}]SDK请求失败 - {$this->response->getError()}");
        } else {
            $this->logger->debug("[d={$this->response->getDuration()}]SDK请求成功");
        }
        return $this->response;
    }

    /**
     * 发起请求
     * @param string                   $method
     * @param string                   $uri
     * @param array|null               $extra
     * @param array|object|string|null $body
     * @param array|null               $query
     */
    public function send(string $method, string $uri, $extra = null, $body = null, $query = null)
    {
        try {
            $options = $this->optionsBuilder($extra, $body, $query);
            // 1. logger
            $this->logger->debug("SDK准备以{{$method}}请求{{$uri}}");
            // 2. initialize
            $this->requestMethod = $method;
            $this->requestUri = $uri;
            $this->requestOptions = $options;
            // 3. from cache
            if ($this->cacheDeadline > 0) {
                $this->cacheRequest = new RequestCache($this);
                if ($this->cacheRequest->get()) {
                    return;
                }
            }
            // 4. register
            if (self::$consulRequest === null) {
                self::$consulRequest = new RequestConsul($this->logger, $this->config, $this->requestId);
            }
            $this->requestUrl = self::$consulRequest->buildUrl($this->requestUri);
            if ($this->requestUrl === false) {
                $this->response->setInvalidUrlError("SDK计算请求地址失败");
                return;
            }
            // 5. from service
            $retryTimes = $this->retryTimes > 1 ? $this->retryTimes : 1;
            $httpOptions = $this->optionsMerger($this->requestOptions);
            $httpRequest = new RequestHttp($this, $httpOptions);
            for ($i = 1; $i <= $retryTimes; $i++) {
                if ($httpRequest->send($httpOptions, $this->requestUrl, $i)) {
                    break;
                }
            }
            // 6. update cache
            if ($this->cacheRequest !== null && !$this->response->hasError()) {
                $this->cacheRequest->set();
            }
        } catch(\Throwable $e) {
            $this->response->setFailureError($e->getMessage());
        }
    }

    /**
     * 创建请求选项
     * @param array|null               $extra
     * @param array|object|string|null $body
     * @param array|null               $query
     * @return array
     */
    public function optionsBuilder($extra = null, $body = null, $query = null)
    {
        $options = is_array($extra) ? $extra : [];
        // 1. get params
        if (is_string($query) || is_array($query)) {
            $options['query'] = $query;
        }
        // 2. post params
        if (is_string($body)) {
            $options['body'] = $body;
        } else if (is_array($body)) {
            $options['json'] = $body;
        } else if (is_object($body) && method_exists($body, 'toArray')) {
            $options['json'] = $body->toArray();
        }
        // 3. timeout
        if (!isset($options['timeout'])) {
            $options['timeout'] = $this->config->timeout;
        }
        // 4. header
        $options['headers'] = isset($options['headers']) && is_array($options['headers']) ? $options['headers'] : [];
        // 5. user agents
        if (!isset($options['headers']['User-Agent'])) {
            $options['headers']['User-Agent'] = $this->config->userAgent;
        }
        // n. return
        return $options;
    }

    /**
     * 透传Headers
     * @param array $options
     * @return array
     */
    public function optionsMerger(array $options)
    {
        if ($this->server !== null){
            $options['headers'] = array_merge_recursive($options['headers'], $this->server->getTrace()->getHeaderDatas());
        }
        return $options;
    }
}
