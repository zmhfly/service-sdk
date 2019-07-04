<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Compatiables\Abstracts;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Base\ResponseInterface;
use Uniondrug\ServiceSdk\Base\Sdk as BaseSdk;

/**
 * V1兼容
 * @package Uniondrug\ServiceSdk\Compatiables\Abstracts
 */
abstract class Sdk extends BaseSdk
{
    /**
     * V1构造兼容
     * @param Container $container
     * @param string    $sdkName
     */
    final public function __construct(Container $container, string $sdkName)
    {
        parent::__construct($container, $sdkName);
        $this->_initHostByCompatiable();
    }

    /**
     * V1版Restful入口
     * @param string $method
     * @param string $uri
     * @param null   $body
     * @param null   $query
     * @param array  $extra
     * @return ResponseInterface
     */
    final protected function restful(string $method, string $uri, $body = null, $query = null, $extra = [])
    {
        $extra = is_array($extra) ? $extra : [];
        if (is_array($query) && count($query)) {
            $extra['query'] = $query;
        }
        return $this->_initRestful($method, $this->serviceHost.'/'.preg_replace("/^[\/]+/", "", $uri), $body, $extra)->endSdk();
    }
}
