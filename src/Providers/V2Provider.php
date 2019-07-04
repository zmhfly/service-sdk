<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

/**
 * V2版SDK为自动导出
 * <code>
 * php console postman
 * </code>
 * @package Uniondrug\ServiceSdk\Providers
 */
class V2Provider extends Provider implements ServiceProviderInterface
{
    /**
     * V2版本注入
     * @param DiInterface $di
     */
    public function register(DiInterface $di)
    {
        $this->setShared($di);
    }
}
