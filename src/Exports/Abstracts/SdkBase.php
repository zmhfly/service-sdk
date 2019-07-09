<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk\Exports\Abstracts;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Bases\Sdk;
use Uniondrug\ServiceSdk\Responses\ResponseInterface;

/**
 * SdkBase
 * @package Uniondrug\ServiceSdk\Exports\Abstracts
 */
abstract class SdkBase extends Sdk
{
    /**
     * SdkBase constructor.
     * @param Container $container
     * @param string    $name
     */
    public function __construct(Container $container, $name)
    {
        parent::__construct($container, $name);
        parent::_v2();
    }
}
