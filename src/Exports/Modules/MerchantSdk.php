<?php
/**
 * 重要说明
 * 1. 本文件由Postman命令脚本自动生成, 请不要修改, 若需修改
 *    请通过`php console postman`命令重新生成.
 * 2. 本脚本在生成时, 依赖所在项目的Controller有 `@Sdk method`定义,
 *    同时, 项目根目录下的`postman.json`需有`sdk`、`sdkLink`定义
 * 3. 发布SDK，请将本文件放到`uniondrug/service-sdk`项目
 *    的`src/Exports/Modules`目录下，并发重新发布release版本.
 * @author PostmanCommand
 * @date   2019-01-24
 * @time   Thu, 24 Jan 2019 16:28:01 +0800
 */
namespace Uniondrug\ServiceSdk\Exports\Modules;

use Uniondrug\ServiceSdk\Exports\Abstracts\SdkBase;
use Uniondrug\ServiceSdk\Responses\ResponseInterface;

/**
 * MerchantSdk
 * @package Uniondrug\ServiceSdk\Modules
 */
class MerchantSdk extends SdkBase
{
    /**
     * 服务名称
     * 自来`postman.json`文件定义的`sdkService`值
     * @var string
     */
    protected $serviceName = 'merchant.module';

    /**
     * 连锁及门店列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnerSwitchController/listAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getPartnerSwitchList($body)
    {
        return $this->restful("POST", "/partner/switch/list", $body);
    }
    
    /**
     * 添加商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/add.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addMerchant($body)
    {
        return $this->restful("POST", "/merchant/add", $body);
    }

    /**
     * 添加组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/organization/add.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addOrganization($body)
    {
        return $this->restful("POST", "/organization/add", $body);
    }

    /**
     * 删除商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/del.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function delMerchant($body)
    {
        return $this->restful("POST", "/merchant/del", $body);
    }

    /**
     * 删除组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/organization/del.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function delOrganization($body)
    {
        return $this->restful("POST", "/organization/del", $body);
    }

    /**
     * 编辑商户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/edit.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editMerchant($body)
    {
        return $this->restful("POST", "/merchant/edit", $body);
    }

    /**
     * 编辑组织架构
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/organization/edit.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editOrganization($body)
    {
        return $this->restful("POST", "/organization/edit", $body);
    }

    /**
     * 读取单个组织架构详情
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/organization/get.info.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getOrganizationInfo($body)
    {
        return $this->restful("POST", "/organization/info", $body);
    }

    /**
     * 读取商户资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/get.info.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getMerchantInfo($body)
    {
        return $this->restful("POST", "/merchant/info", $body);
    }

    /**
     * 用ids获取商户信息
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/get.ids.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getMerchantByIds($body)
    {
        return $this->restful("POST", "/merchant/ids", $body);
    }

    /**
     * 读取商户资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/merchant/get.list.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getMerchantList($body)
    {
        return $this->restful("POST", "/merchant/list", $body);
    }

    /**
     * 读取组织架构树
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/organization/get.tree.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getOrganizationTree($body)
    {
        return $this->restful("POST", "/organization/tree", $body);
    }

    /**
     * 员工登录
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/login.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function login($body)
    {
        return $this->restful("POST", "/worker/login", $body);
    }

    /**
     * 添加员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/add.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addWorker($body)
    {
        return $this->restful("POST", "/worker/add", $body);
    }

    /**
     * 编辑员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/edit.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editWorker($body)
    {
        return $this->restful("POST", "/worker/edit", $body);
    }

    /**
     * 停用员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/disable.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableWorker($body)
    {
        return $this->restful("POST", "/worker/disable", $body);
    }

    /**
     * 启用员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/enable.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function enableWorker($body)
    {
        return $this->restful("POST", "/worker/enable", $body);
    }

    /**
     * 员工列表
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/get.paging.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getWorkerPaging($body)
    {
        return $this->restful("POST", "/worker/paging", $body);
    }

    /**
     * 员工列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/WorkerController/listAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getWorkerList($body)
    {
        return $this->restful("POST", "/worker/list", $body);
    }

    /**
     * 员工简易资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/info.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getWorkerInfo($body)
    {
        return $this->restful("POST", "/worker/info", $body);
    }

    /**
     * 获取权限下员工数量
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/roleCount.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getRoleCount($body)
    {
        return $this->restful("POST", "/worker/roleCount", $body);
    }

    /**
     * 删除员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/remove.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function removeWorker($body)
    {
        return $this->restful("POST", "/worker/remove", $body);
    }

    /**
     * 关联员工
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/merchant/worker/relation.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function relationWorker($body)
    {
        return $this->restful("POST", "/worker/relation", $body);
    }

    /**
     * 添加组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/add", $body);
    }

    /**
     * 修改组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/edit", $body);
    }

    /**
     * 删除商户组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/delAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function delOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/del", $body);
    }

    /**
     * 读取商户组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/info", $body);
    }

    /**
     * 读取商户组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/listAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/list", $body);
    }

    /**
     * 读取组织架构树
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/treeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function treeOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/tree", $body);
    }

    /**
     * ids读取商户信息
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/OrganizeBaseController/idsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function idsOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/ids", $body);
    }

    /**
     * 添加员工
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/add", $body);
    }

    /**
     * 编辑员工
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/edit", $body);
    }

    /**
     * 读取员工列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/listAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/list", $body);
    }

    /**
     * 读取员工分页列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/paging", $body);
    }

    /**
     * 读取员工信息
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/info", $body);
    }

    /**
     * 停用员工
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/disableAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/disable", $body);
    }

    /**
     * 启用员工
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/enableAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function enableWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/enable", $body);
    }

    /**
     * 获取权限下用户数量
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/roleCountAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function roleCountWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/roleCount", $body);
    }

    /**
     * 删除权限
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/removeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function removeWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/remove", $body);
    }

    /**
     * 用户关联权限
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/relationAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function relationWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/relation", $body);
    }

    /**
     * 批量停用用户
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/editStatusEndAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndAllWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/editstatusendall", $body);
    }

    /**
     * 批量开启用户
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/editStatusStartAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartAllWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/editstatusstartall", $body);
    }

    /**
     * 修改用户权限组
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/roleIdEditAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function roleIdEditWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/roleidedit", $body);
    }

    /**
     * 通过手机号查询用户
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/dev_wss/docs/api/WorkerManController/mobileAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function moblieWorkerMan($body)
    {
        return $this->restful("POST", "/workerman/mobile", $body);
    }

    /**
     * 财务账号添加
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/add", $body);
    }

    /**
     * 财务账号查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/info", $body);
    }

    /**
     * 财务账号修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/edit", $body);
    }

    /**
     * 财务账号列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/paging", $body);
    }

    /**
     * 财务账号停用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/editStatusEndAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/editstatusend", $body);
    }

    /**
     * 财务账号启用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/editStatusStartAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/editstatusstart", $body);
    }

    /**
     * 原始用户添加
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addAssistants($body)
    {
        return $this->restful("POST", "/assistants/add", $body);
    }

    /**
     * 原始用户查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoAssistants($body)
    {
        return $this->restful("POST", "/assistants/info", $body);
    }

    /**
     * 原始用户修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editAssistants($body)
    {
        return $this->restful("POST", "/assistants/edit", $body);
    }

    /**
     * 查询用户列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingAssistants($body)
    {
        return $this->restful("POST", "/assistants/paging", $body);
    }

    /**
     * 用户停用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/editStatusEndAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndAssistants($body)
    {
        return $this->restful("POST", "/assistants/editstatusend", $body);
    }

    /**
     * 用户启用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/editStatusStartAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartAssistants($body)
    {
        return $this->restful("POST", "/assistants/editstatusstart", $body);
    }

    /**
     * 用户批量停用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/editStatusEndAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndAllAssistants($body)
    {
        return $this->restful("POST", "/assistants/editstatusendall", $body);
    }

    /**
     * 用户批量启用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/editStatusStartAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartAllAssistants($body)
    {
        return $this->restful("POST", "/assistants/editstatusstartall", $body);
    }

    /**
     * 用户批量启用
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/memberIdInfoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function memberIdInfoAssistants($body)
    {
        return $this->restful("POST", "/assistants/memberidinfo", $body);
    }

    /**
     * 添加费率
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addBalance($body)
    {
        return $this->restful("POST", "/balance/add", $body);
    }

    /**
     * 费率查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoBalance($body)
    {
        return $this->restful("POST", "/balance/info", $body);
    }

    /**
     * 费率修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editBalance($body)
    {
        return $this->restful("POST", "/balance/edit", $body);
    }

    /**
     * 查询费率列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingBalance($body)
    {
        return $this->restful("POST", "/balance/paging", $body);
    }

    /**
     * 查询顶级组织费率接口
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/infochainAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoChainBalance($body)
    {
        return $this->restful("POST", "/balance/infochain", $body);
    }


    /**
     * 添加开票配置
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/InvoiceController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addInvoice($body)
    {
        return $this->restful("POST", "/invoice/add", $body);
    }

    /**
     * 开票配置查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/InvoiceController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoInvoice($body)
    {
        return $this->restful("POST", "/invoice/info", $body);
    }

    /**
     * 开票配置修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/InvoiceController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editInvoice($body)
    {
        return $this->restful("POST", "/invoice/edit", $body);
    }

    /**
     * 开票配置列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/InvoiceController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingInvoice($body)
    {
        return $this->restful("POST", "/invoice/paging", $body);
    }

    /**
     * 添加原始商户中心
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addPartners($body)
    {
        return $this->restful("POST", "/partners/add", $body);
    }

    /**
     * 原始商户中心查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoPartners($body)
    {
        return $this->restful("POST", "/partners/info", $body);
    }

    /**
     * 原始商户中心修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editPartners($body)
    {
        return $this->restful("POST", "/partners/edit", $body);
    }

    /**
     * 原始商户中心列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingPartners($body)
    {
        return $this->restful("POST", "/partners/paging", $body);
    }

    /**
     * 原始商户中心列表树
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/treeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function treePartners($body)
    {
        return $this->restful("POST", "/partners/tree", $body);
    }

    /**
     * 原始商户中心关闭
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/editStatusEndAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndPartners($body)
    {
        return $this->restful("POST", "/partners/editstatusend", $body);
    }

    /**
     * 原始商户中心开启
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/editStatusStartAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartPartners($body)
    {
        return $this->restful("POST", "/partners/editstatusstart", $body);
    }

    /**
     * 添加原始连锁门店
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addStores($body)
    {
        return $this->restful("POST", "/stores/add", $body);
    }

    /**
     * 原始连锁门店查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoStores($body)
    {
        return $this->restful("POST", "/stores/info", $body);
    }

    /**
     * 原始连锁门店修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStores($body)
    {
        return $this->restful("POST", "/stores/edit", $body);
    }

    /**
     * 原始连锁门店列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingStores($body)
    {
        return $this->restful("POST", "/stores/paging", $body);
    }

    /**
     * 原始连锁门店关闭
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/editStatusEndAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEndStores($body)
    {
        return $this->restful("POST", "/stores/editstatusend", $body);
    }

    /**
     * 原始连锁门店开启
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoresController/editStatusStartAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStartStores($body)
    {
        return $this->restful("POST", "/stores/editstatusstart", $body);
    }

    /**
     * 添加门店图片
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/add", $body);
    }

    /**
     * 门店图片查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/info", $body);
    }

    /**
     * 门店图片修改
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/edit", $body);
    }

    /**
     * 门店图片列表
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function pagingStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/paging", $body);
    }

    /**
     * 门店图片删除
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/delAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function delStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/del", $body);
    }



    /**
     * 门店图片集合
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/StoreImageController/ListsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listsStoreImages($body)
    {
        return $this->restful("POST", "/storeimages/lists", $body);
    }

    /**
     * 获取rootid下所有组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/ListsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listRootidOrganizeBase($body)
    {
        return $this->restful("POST", "/organizebase/listrootid", $body);
    }

    /**
     * 获取所有银行
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AccountNumberController/bankListAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function bankListAccountNumber($body)
    {
        return $this->restful("POST", "/accountnumber/bankList", $body);
    }


    /**
     * 用连锁id获取组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/getByPartnerAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getOrganByPartnerId($body)
    {
        return $this->restful("POST", "/organizebase/getbypartner", $body);
    }

    /**
     * 通过partnerId获取组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/PartnerIdInfoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function partnerIdInfoOrganizeBase($body)
    {
        return $this->restful("POST", "/organizebase/partneridinfo", $body);
    }

    /**
     * ROOT下独立结算组织查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/ListIsIndependentAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listIsIndependent($body)
    {
        return $this->restful("POST", "/organizebase/listisindependent", $body);
    }

    /**
     * 最近上级独立结算组织查询
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/InfoIndependentAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function infoIndependent($body)
    {
        return $this->restful("POST", "/organizebase/infoindependent", $body);
    }

    /**
     * 批量关闭状态
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/editStatusEndAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusEnd($body)
    {
        return $this->restful("POST", "/organizebase/editstatusend", $body);
    }

    /**
     * 批量开启状态
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/editStatusStartAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editStatusStart($body)
    {
        return $this->restful("POST", "/organizebase/editstatusstart", $body);
    }

    /**
     * id查询费率
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/detailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function detailBalance($body)
    {
        return $this->restful("POST", "/balance/detail", $body);
    }
    /**
     * 统计特定组织下的数量
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/ccountAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function countOrganize($body)
    {
        return $this->restful("POST", "/organizebase/count", $body);
    }

    /**
     * 统计特定类型下的组织数量
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/countTypeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function countTypeOrganize($body)
    {
        return $this->restful("POST", "/organizebase/counttype", $body);
    }

    /**
     * 统计特定类型下组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/listAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listAllOrganize($body)
    {
        return $this->restful("POST", "/organizebase/listall", $body);
    }

    /**
     * 修改所属上级组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/editParentIdAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function editParentId($body)
    {
        return $this->restful("POST", "/organizebase/editparentid", $body);
    }

    /**
     * partnerIds读取商户信息
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/partnerIdsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function partnerIdsOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/partnerids", $body);
    }

    /**
     * 通过partnerId读取下级商户集合
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/listAllStoreAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listAllStoreOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/listallstore", $body);
    }

    /**
     * 通过partnerId读取简略下级商户集合
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/listAllStoreSmallAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function listAllStoreSmallOrgabuzeBase($body)
    {
        return $this->restful("POST", "/organizebase/listallstoresmall", $body);
    }

    /**
     * 通过默认编码获取组织
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/OrganizeBaseController/internalCodeInfoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function internalCodeInfo($body)
    {
        return $this->restful("POST", "/organizebase/internalcodeinfo", $body);
    }

    /**
     * 获取连锁集合的资金池
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/PartnersController/fundPoolsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function partnersFundPools($body)
    {
        return $this->restful("POST", "/partners/fundpools", $body);
    }

    /**
     * 获取连锁集合的人员数量
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/sumMemberLogicAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function assistantsListsStoreId($body)
    {
        return $this->restful("POST", "/assistants/listsStoreId", $body);
    }

    /**
     * 获取连锁集合的人员数量
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/AssistantsController/sumMemberLogicAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function assistantsSumMember($body)
    {
        return $this->restful("POST", "/assistants/summember", $body);
    }

    /**
     * ids查询费率集合
     * @link https://uniondrug.coding.net/p/module.merchant/git/blob/development/docs/api/BalanceController/idsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function balanceIds($body)
    {
        return $this->restful("POST", "/balance/ids", $body);
    }

}