<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk;

use Uniondrug\Framework\Container;

/**
 * @deprecated
 * @package Uniondrug\ServiceSdk
 */
abstract class Sdk extends Bases\Sdk
{
    const METHOD_DELETE = "DELETE";
    const METHOD_GET = "GET";
    const METHOD_HEAD = "HEAD";
    const METHOD_OPTIONS = "OPTIONS";
    const METHOD_PATCH = "PATCH";
    const METHOD_POST = "POST";
    const METHOD_PUT = "PUT";

    /**
     * Sdk constructor.
     * @param Container $container
     * @param string    $name
     */
    public function __construct(Container $container, $name)
    {
        parent::__construct($container, $name);
        parent::_v1();
    }
}
