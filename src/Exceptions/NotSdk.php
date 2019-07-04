<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Exceptions;

use Throwable;

/**
 * 调用了SDK未定义的接口/方法
 * @package Uniondrug\ServiceSdk\Exceptions
 */
class NotSdk extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, Code::NOT_SDK, $previous);
    }
}
