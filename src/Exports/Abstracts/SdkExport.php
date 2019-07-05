<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
namespace Uniondrug\ServiceSdk\Exports\Abstracts;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Bases\Sdk;
use Uniondrug\ServiceSdk\Exceptions\Unknown;

/**
 * SdkBase
 * @package Uniondrug\ServiceSdk\Exports\Abstracts
 */
abstract class SdkExport
{
    /**
     * 容器
     * @var Container
     */
    private $container;
    private $name;
    /**
     * 历史
     * @var array
     */
    private $history = [];

    /**
     * SdkExport.
     * @param Container $container
     * @param string    $name
     */
    public function __construct($container, $name)
    {
        $this->container = $container;
        $this->name = $name;
    }

    /**
     * @param string $name
     * @return Sdk
     * @throws Unknown
     */
    public function __get($name)
    {
        // 1. in history
        if (isset($this->history[$name])) {
            return $this->history[$name];
        }
        // 2. sdk
        $sclass = "\\Uniondrug\\ServiceSdk\\Exports\\".ucfirst($this->name)."s\\".ucfirst($name)."Sdk";
        if (is_a($sclass, Sdk::class, true)) {
            $this->history[$name] = new $sclass($this->container, $name);
            return $this->history[$name];
        }
        // 3. unknown
        throw new Unknown("call undefined sdk - {$this->name}.{$name}");
    }
}
