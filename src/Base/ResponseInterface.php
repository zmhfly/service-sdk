<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Base;

/**
 * ResponseInterface
 * @package Uniondrug\ServiceSdk\Base
 */
interface ResponseInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @return string
     */
    public function getContents();

    /**
     * @return \stdClass
     */
    public function getData();

    /**
     * 执行时长
     * @return double
     */
    public function getDuration();

    /**
     * @return int
     */
    public function getErrno();

    /**
     * @return string
     */
    public function getError();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return bool
     */
    public function hasError();

    /**
     * @return array
     */
    public function toArray();
}
