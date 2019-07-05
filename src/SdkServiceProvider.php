<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk;

use Phalcon\Di\ServiceProviderInterface;
use Uniondrug\ServiceSdk\Bases\Boot;

/**
 * SdkServiceProvider
 * @package Uniondrug\ServiceSdk
 */
class SdkServiceProvider implements ServiceProviderInterface
{
    /**
     * @param \Phalcon\DiInterface $di
     */
    public function register(\Phalcon\DiInterface $di)
    {
        $di->setShared('serviceSdk', function() use ($di){
            return new Boot($di);
        });
    }
}
