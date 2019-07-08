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
interface ResponseInterface
{
    /**
     * 读取原文
     * @return string
     */
    public function getContents();

    /**
     * 读取对象
     * @return \stdClass
     */
    public function getData();

    /**
     * 读错误编号
     * @return int
     */
    public function getErrno();

    /**
     * 读错误原因
     * @return string
     */
    public function getError();

    /**
     * 是否有错误
     * @return bool
     */
    public function hasError();
}
