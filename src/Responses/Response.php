<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk\Responses;

/**
 * SDK请求结果
 * @package Uniondrug\ServiceSdk\Responses
 */
class Response implements ResponseInterface
{
    private $contents = '';
    private $data;
    private $errno = 0;
    private $error = '';

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->data = new \stdClass();
    }

    /**
     * 读取数据
     * @return string
     */
    public function __toString()
    {
        return $this->contents;
    }

    /**
     * SDK完成
     * @return $this
     */
    public function ended()
    {
        return $this;
    }

    /**
     * 读取原文
     * @return string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * 读取对象
     * @return \stdClass
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 读错误编号
     * @return int
     */
    public function getErrno()
    {
        return $this->errno;
    }

    /**
     * 读错误原因
     * @return string
     */
    public function getError()
    {
        return $this->error;
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
     * 设置返回原文
     * @param string $contents
     * @return $this
     */
    public function setContents(string $contents)
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * 设置错误
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
     * 结果转数组
     * @return array
     */
    public function toArray()
    {
        return json_decode(json_encode($this->data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }
}
