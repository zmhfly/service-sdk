<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Exceptions;

use Throwable;

/**
 * V1版SDK未定义兼容
 * @package Uniondrug\ServiceSdk\Exceptions
 */
class NotCompatiable extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, Code::NOT_COMPATIABLED, $previous);
    }
}
