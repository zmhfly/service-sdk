<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

/**
 * V1版SDK为手工编写
 * @package Uniondrug\ServiceSdk\Providers
 */
class V1Provider extends Provider implements ServiceProviderInterface
{
    /**
     * V1版本注入
     * @param DiInterface $di
     */
    public function register(DiInterface $di)
    {
        $this->setShared($di);
    }
}
