<?php
/**
 * @author wsfuyibing <websearch@163.com>
 * @date   2018-03-27
 */
namespace Uniondrug\ServiceSdk\Modules;

use Uniondrug\Service\ClientResponseInterface;
use Uniondrug\ServiceSdk\Sdk;
use Uniondrug\ServiceSdk\ServiceSdkInterface;

/**
 * 商户服务
 * @package Uniondrug\ServiceSdk\Modules
 */
class MerchantSdk extends Sdk implements ServiceSdkInterface
{
    protected $serviceName = 'merchant';

    /**
     * 添加商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/add.merchant.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function addMerchant($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/add", $body);
    }

    /**
     * 添加组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/add.organization.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function addOrganization($body)
    {
        return $this->restful(static::METHOD_POST, "/organization/add", $body);
    }

    /**
     * 删除商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/del.merchant.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function delMerchant($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/del", $body);
    }

    /**
     * 删除组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/del.organization.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function delOrganization($body)
    {
        return $this->restful(static::METHOD_POST, "/organization/del", $body);
    }

    /**
     * 编辑商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/edit.merchant.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function editMerchant($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/edit", $body);
    }

    /**
     * 编辑组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/edit.organization.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function editOrganization($body)
    {
        return $this->restful(static::METHOD_POST, "/organization/edit", $body);
    }

    /**
     * 读取商户资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/get.merchant.info.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getMerchantInfo($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/info", $body);
    }

    /**
     * 读取商户资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/get.merchant.list.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getMerchantList($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/info", $body);
    }

    /**
     * 读取组织架构树
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/get.organization.tree.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getOrganizationTree($body)
    {
        return $this->restful(static::METHOD_POST, "/organization/tree", $body);
    }
}
