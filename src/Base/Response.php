<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Base;

use Uniondrug\Framework\Container;

/**
 * SDK请求结果
 * @package Uniondrug\ServiceSdk\Base
 */
class Response implements ResponseInterface
{
    /**
     * DI容器
     * @var Container
     */
    private $container;
    /**
     * 请求结果
     * @var string
     */
    private $contents = '';
    /**
     * @var \stdClass|array
     */
    private $data;
    /**
     * 请求方式
     * @var string
     */
    private $method = '';
    /**
     * 请求地址
     * @var string
     */
    private $url = '';
    /**
     * 请求开始
     * @var double
     */
    private $begin;
    /**
     * 请求用时
     * @var double
     */
    private $duration;
    /**
     * 错误编号
     * @var int
     */
    private $errno = 0;
    /**
     * 错误原因
     * @var string
     */
    private $error = '';

    /**
     * @param Container $container
     * @param string    $method
     * @param string    $url
     */
    public function __construct(Container $container, string $method, string $url)
    {
        $this->begin = (double) microtime(true);
        $this->container = $container;
        $this->data = new \stdClass();
        $this->method = $method;
        $this->url = $url;
    }

    /**
     * 读取源文
     * @return string
     */
    public function __toString()
    {
        return $this->getContents();
    }

    /**
     * 请求完成
     * @return $this
     */
    public function end()
    {
        $this->duration = (double) microtime(true) - $this->begin;
        return $this;
    }

    /**
     * 完成SDK
     * @return $this
     */
    public function endSdk()
    {
        // 1. 解析JSON
        $json = json_decode($this->contents, false);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->setError(json_last_error(), json_last_error_msg());
            return $this;
        }
        // 2. 兼容模式
        if (isset($json->status, $json->message, $json->code)) {
            if ($json->status !== true) {
                $this->setError($json->code, $json->message);
                return $this;
            }
        } else if (isset($json->errno, $json->error)) {
            $json->errno = (int) $json->errno;
            if ($json->errno !== 0) {
                $this->setError($json->errno, $json->error);
                return $this;
            }
        } else {
            $this->setError(1, "SDK返回的JSON结构不合法");
            return $this;
        }
        // 3. 主数据
        if (isset($json->data) && is_object($json->data)) {
            $this->data = $json->data;
        }
        // 4. 完成
        return $this;
    }

    /**
     * @return \stdClass|false
     * @example return {
     *              "address" => "name.uniondrug.cn",
     *              "port" => 80,
     *              "url" => "http://name.uniondrug.cn:80",
     *          }
     */
    public function getConsulService()
    {
        // 1. parse to JSON
        $json = json_decode($this->contents, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->setError(json_last_error(), json_last_error_msg());
            return false;
        }
        // 2. validata json
        if (count($json) > 0 && isset($json[0]['ServiceAddress'], $json[0]['ServicePort'])) {
            // 2.1 standard
            $std = new \stdClass();
            $std->address = $json[0]['ServiceAddress'];
            $std->port = $json[0]['ServicePort'];
            $std->url = $json[0]['ServiceAddress'];
            // 2.2 scheme
            if (preg_match("/^https*:\/\//", $std->address) === 0) {
                $std->url = "http://{$std->url}";
            }
            // 2.3 port
            if (preg_match("/:\d+$/", $std->address) === 0) {
                $std->url = "{$std->url}:{$std->port}";
            }
            // 2.4 result
            $std->url = preg_replace("/[\/]+$/", "", $std->url);
            $std->url = 'http://192.168.10.130:8000';
            return $std;
        }
        // 3. invalid
        return false;
    }

    /**
     * 读取源文
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * 结果对象
     * @return \stdClass
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 执行时长
     * @return double
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * 错误编号
     * @return int
     */
    public function getErrno()
    {
        return $this->errno;
    }

    /**
     * 错误原因
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * 读取请求地址
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 是否有错误
     * @return bool
     */
    public function hasError()
    {
        return $this->errno !== 0;
    }

    /**
     * 设置原文
     * @param string $contents
     * @return $this
     */
    public function setContents(string $contents)
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * 设置错误记录
     * @param int    $errno
     * @param string $error
     * @return $this
     */
    public function setError(int $errno, string $error)
    {
        $this->errno = $errno;
        $this->error = $error;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return json_decode(json_encode($this->data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), true);
    }
}
