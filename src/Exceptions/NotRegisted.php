<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Exceptions;

use Throwable;

/**
 * 未在Consul中注册服务
 * @package Uniondrug\ServiceSdk\Exceptions
 */
class NotRegisted extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, Code::NOT_REGISTED, $previous);
    }
}
