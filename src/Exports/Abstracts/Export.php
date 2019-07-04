<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Exports\Abstracts;

use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Base\SdkInterface;
use Uniondrug\ServiceSdk\Exceptions\NotFound;

/**
 * Base
 * @package Uniondrug\ServiceSdk\Exports\Abstracts
 */
abstract class Export implements ExportInterface
{
    /**
     * DI容器
     * @var Container
     */
    private $container;
    private $prefix;
    /**
     * 历史记录
     * @var array
     */
    private $_histories = [];

    /**
     * Base constructor.
     * @param Container $container
     * @param string    $prefix
     */
    public function __construct(Container $container, string $prefix)
    {
        $this->container = $container;
        $this->prefix = $prefix;
    }

    /**
     * @param string $name
     * @return SdkInterface
     * @throws NotFound
     */
    public function __get($name)
    {
        if (!isset($this->_histories[$name])) {
            $class = "\\Uniondrug\\ServiceSdk\\Exports\\{$this->prefix}\\".ucfirst($name)."Sdk";
            if (!is_a($class, SdkInterface::class, true)) {
                throw new NotFound("call undefined {$name} sdk");
            }
            $this->_histories[$name] = new $class($this->container, $name);
        }
        return $this->_histories[$name];
    }
}
