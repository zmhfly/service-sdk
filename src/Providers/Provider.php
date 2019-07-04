<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Providers;

use Phalcon\DiInterface;
use Uniondrug\ServiceSdk\Base\Factory;

/**
 * 注入基类
 * 基于配置文件`config/app.php`配置
 * <code>
 * return [
 *     'default' => [
 *         'appName' => 'example',
 *         .
 *         .
 *         .
 *         'providers' => [
 *             .
 *             .
 *             .
 *             \Uniondrug\ServiceSdk\SdkServiceProvider::class
 *         ]
 *     ]
 * ]
 * </code>
 * @package Uniondrug\ServiceSdk\Providers
 */
class Provider
{
    /**
     * 注入名称
     * @var string
     */
    protected $name = 'serviceSdk';

    /**
     * @param DiInterface $di
     */
    protected function setShared(DiInterface $di)
    {
        $di->setShared($this->name, function() use ($di){
            return new Factory($di);
        });
    }
}
