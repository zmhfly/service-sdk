<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Base;

use GuzzleHttp\Psr7\Stream;
use Uniondrug\Framework\Container;
use Uniondrug\HttpClient\Client;
use Uniondrug\ServiceSdk\Exceptions\Unknown;

/**
 * WithTrait
 * @package Uniondrug\ServiceSdk\Base
 */
trait WithTrait
{
    final public function delete(string $url, $body = null, array $options = [])
    {
        $this->curl("DELETE", $url);
    }

    final public function get(string $url, array $options = [])
    {
        $this->curl("GET", $url);
    }

    final public function head(string $url, array $options = [])
    {
        $this->curl("HEAD", $url);
    }

    final public function options(string $url, array $options = [])
    {
        $this->curl("OPTIONS", $url);
    }

    final public function patch(string $url, $body = null, array $options = [])
    {
        $this->curl("PATCH", $url);
    }

    final public function post(string $url, $body = null, array $options = [])
    {
        $this->curl("POST", $url);
    }

    final public function put(string $url, $body = null, array $options = [])
    {
        $this->curl("PUT", $url);
    }

    /**
     * @param int $deadline
     * @return SdkInterface|$this
     */
    final public function withCache(int $deadline = 60)
    {
        return $this;
    }

    /**
     * @param int $retryTimes
     * @return SdkInterface|$this
     */
    final public function withRetry(int $retryTimes = 1)
    {
        return $this;
    }

    /**
     * 发送Request请求
     * @param string $method
     * @param string $url
     * @param array  $options
     * @return ResponseInterface
     * @throws \Throwable
     */
    protected function curl(string $method, string $url, array $options = [])
    {
        /**
         * 1. di/httpClient
         * @var Container $container
         */
        $container = $this->container;
        if (!$container->has('httpClient')) {
            throw new Unknown("httpClient not injectable");
        }
        /**
         * 2. type/httpClient
         * @var Client $http
         */
        $http = $container->getShared('httpClient');
        if (!($http instanceof Client)) {
            throw new Unknown("invalid httpClient instance");
        }
        /**
         * 3. response
         */
        $response = new Response($container, $method, $url);
        try {
            $result = $http->request($method, $url, $options);
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
        return $response;
    }
}
