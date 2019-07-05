<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk;

use Uniondrug\ServiceSdk\Annotations\Backends;
use Uniondrug\ServiceSdk\Annotations\Compatiable;
use Uniondrug\ServiceSdk\Annotations\Javas;
use Uniondrug\ServiceSdk\Annotations\Modules;
use Uniondrug\ServiceSdk\Annotations\Unions;

/**
 * IDE注解释
 * @package Uniondrug\ServiceSdk
 */
class ServiceSdk
{
    use Compatiable;
    use Backends, Unions, Modules;
    use Javas;
}
