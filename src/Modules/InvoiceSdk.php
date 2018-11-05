<?php
/**
 * 重要说明
 * 1. 本文件由Postman命令脚本自动生成, 请不要修改, 若需修改
 *    请通过`php console postman`命令重新生成.
 * 2. 本脚本在生成时, 依赖所在项目的Controller有 `@Sdk method`定义,
 *    同时, 项目根目录下的`postman.json`需有`sdk`、`sdkLink`定义
 * 3. 发布SDK，请将本文件放到`uniondrug/service-sdk`项目
 *    的`src/Modules`目录下，并发重新发布release版本.
 * @author PostmanCommand
 * @date   2018-11-02
 * @time   Fri, 02 Nov 2018 18:27:47 +0800
 */
namespace Uniondrug\ServiceSdk\Modules;

use Uniondrug\Service\ClientResponseInterface;
use Uniondrug\ServiceSdk\Sdk;
use Uniondrug\ServiceSdk\ServiceSdkInterface;
use Uniondrug\Structs\StructInterface;

/**
 * InvoiceSdk
 * @package Uniondrug\ServiceSdk\Modules
 */
class InvoiceSdk extends Sdk implements ServiceSdkInterface
{
    /**
     * 服务名称
     * 自来`postman.json`文件定义的`sdkService`值
     * @var string
     */
    protected $serviceName = 'invoice';

    /**
     * 新增一个发票
     * @link https://uniondrug.coding.net/p/module.invoice/git/blob/development/docs/api/InvoiceController/addAction.md
     * @param array $body 入参类型
     * @return ClientResponseInterface
     */
    public function add($body)
    {
        return $this->restful("POST", "/invoice/add", $body);
    }

    /**
     * 删除一个发票
     * @link https://uniondrug.coding.net/p/module.invoice/git/blob/development/docs/api/InvoiceController/deteleAction.md
     * @param array $body 入参类型
     * @return ClientResponseInterface
     */
    public function delete($body)
    {
        return $this->restful("POST", "/invoice/detele", $body);
    }

    /**
     * 获取发票分页列表
     * @link https://uniondrug.coding.net/p/module.invoice/git/blob/development/docs/api/InvoiceController/getListAction.md
     * @param array $body 入参类型
     * @return ClientResponseInterface
     */
    public function getList($body)
    {
        return $this->restful("POST", "/invoice/getList", $body);
    }
    /**
     * 根据开票单获取发票的总和
     * @link https://uniondrug.coding.net/p/module.invoice/git/blob/development/docs/api/InvoiceController/getInvoiceSumAction.md
     * @param array $body 入参类型
     * @return ClientResponseInterface
     */
    public function getInvoiceSum($body)
    {
        return $this->restful("POST", "/invoice/getInvoiceSum", $body);
    }
}