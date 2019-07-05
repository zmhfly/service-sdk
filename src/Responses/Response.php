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
    public function ended(){
        return $this;
    }

    public function setContents(string $contents)
    {
        return $this;
    }

    public function setError(int $errno, string $error){
        return $this;
    }
}
