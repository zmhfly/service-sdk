<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-04
 */
namespace Uniondrug\ServiceSdk\Base;

use Phalcon\DiInterface;
use Uniondrug\Framework\Container;
use Uniondrug\ServiceSdk\Exceptions\NotExport;
use Uniondrug\ServiceSdk\Exceptions\NotFound;
use Uniondrug\ServiceSdk\Exports\Abstracts\ExportInterface;

/**
 * SDK注入实例
 * @package Uniondrug\ServiceSdk\Base
 */
class Factory
{
    /**
     * DI容器
     * @var Container
     */
    private $container;
    /**
     * 历史记录
     * @var array
     */
    private $_histories = [];
    /**
     * 导出类别
     * @var array
     */
    private $_exports = [
        'module',
        'union',
        'backend',
        'java'
    ];
    /**
     * 复用
     */
    use WithTrait;

    /**
     * Factory Constructor.
     * @param Container|DiInterface $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * 读取SDK
     * @param string $name
     * @return SdkInterface|ExportInterface
     * @throws NotExport|NotFound
     */
    public function __get($name)
    {
        // 1. call first time
        if (!isset($this->_histories[$name])) {
            $ucfirst = ucfirst($name);
            if (in_array($name, $this->_exports)) {
                // 2. call export
                $class = "\\Uniondrug\\ServiceSdk\\Exports\\{$ucfirst}";
                if (!is_a($class, ExportInterface::class, true)) {
                    throw new NotExport("not exported sdk - {$name}");
                }
                $this->_histories[$name] = new $class($this->container, "{$ucfirst}s");
            } else {
                // 3. call sdk, compatiable mode
                $class = "\\Uniondrug\\ServiceSdk\\Compatiables\\{$ucfirst}Sdk";
                if (!is_a($class, SdkInterface::class, true)) {
                    throw new NotFound("error or losed sdk - {$name}");
                }
                $this->_histories[$name] = new $class($this->container, $name);
            }
        }
        // 4. SdkInterface|ExportInterface
        return $this->_histories[$name];
    }
}
