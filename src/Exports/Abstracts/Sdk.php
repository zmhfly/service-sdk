<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Exports\Abstracts;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Base\ResponseInterface;
use Uniondrug\ServiceSdk\Base\Sdk as BaseSdk;

/**
 * V2兼容
 * @package Uniondrug\ServiceSdk\Exports\Abstracts
 */
abstract class Sdk extends BaseSdk
{
    /**
     * V2构造兼容
     * @param Container $container
     * @param string    $sdkName
     */
    final public function __construct(Container $container, string $sdkName)
    {
        parent::__construct($container, $sdkName);
        $this->_initHostByConsul();
    }

    /**
     * V2版Restful入口
     * @param string $method
     * @param string $uri
     * @param null   $body
     * @param null   $extra
     * @return ResponseInterface
     */
    final public function restful(string $method, string $uri, $body = null, $extra = null)
    {
        return $this->_initRestful($method, $this->serviceHost.'/'.preg_replace("/^[\/]+/", "", $uri), $body, $extra)->endSdk();
    }
}
