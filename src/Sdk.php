<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk;

/**
 * 兼容
 * 1. v1.x
 * 2. v2.x
 * @property Exports\Backend $backend 后端SDK入口
 * @property Exports\Module  $module  模块SDK入口
 * @property Exports\Union   $union   聚合SDK入口
 * @property Exports\Java    $java    JavaSDK入口
 * @method Base\ResponseInterface delete(string $uri, array $body = null, array $extra = null)
 * @method Base\ResponseInterface get(string $uri, array $extra = null)
 * @method Base\ResponseInterface head(string $uri, array $extra = null)
 * @method Base\ResponseInterface options(string $uri, array $extra = null)
 * @method Base\ResponseInterface patch(string $uri, array $body = null, array $extra = null)
 * @method Base\ResponseInterface post(string $uri, array $body = null, array $extra = null)
 * @method Base\ResponseInterface put(string $uri, array $body = null, array $extra = null)
 * @package Uniondrug\ServiceSdk
 */
class Sdk extends ServiceSdk
{
}
