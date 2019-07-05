<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk\Bases;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Exceptions\Unknown;
use Uniondrug\ServiceSdk\Exports\Abstracts\SdkExport;

/**
 * SDK入口/Boot
 * @package Uniondrug\ServiceSdk\Bases
 */
class Boot
{
    /**
     * 容器
     * @var Container
     */
    private $container;
    /**
     * 历史
     * @var array
     */
    private $history = [];

    /**
     * Boot constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * 按名称递归
     * @param string $name
     * @return SdkExport|Sdk
     * @throws Unknown
     */
    public function __get($name)
    {
        // 1. in history
        if (isset($this->history[$name])) {
            return $this->history[$name];
        }
        // 2. export
        $eclass = "\\Uniondrug\\ServiceSdk\\Exports\\".ucfirst($name);
        if (is_a($eclass, SdkExport::class, true)) {
            $this->history[$name] = new $eclass($this->container, $name);
            return $this->history[$name];
        }
        // 3. sdk compatiable
        $sclass = "\\Uniondrug\\ServiceSdk\\Modules\\".ucfirst($name)."Sdk";
        if (is_a($sclass, Sdk::class, true)) {
            $this->history[$name] = new $sclass($this->container, $name);
            return $this->history[$name];
        }
        // 4. not found
        throw new Unknown("call undefined sdk - {$name}");
    }
}
