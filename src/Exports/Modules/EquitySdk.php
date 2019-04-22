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
 * @date   2019-04-10
 * @time   Wed, 10 Apr 2019 13:45:42 +0800
 */
namespace Uniondrug\ServiceSdk\Exports\Modules;

use Uniondrug\ServiceSdk\Exports\Abstracts\SdkBase;
use Uniondrug\ServiceSdk\Responses\ResponseInterface;

/**
 * EquitySdk
 * @package Uniondrug\ServiceSdk\Modules
 */
class EquitySdk extends SdkBase
{
    /**
     * 服务名称
     * 自来`postman.json`文件定义的`sdkService`值
     * @var string
     */
    protected $serviceName = 'equity.module';

    /**
     * 激活接口
     * 激活指定的权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/activeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function active($body)
    {
        return $this->restful("POST", "/equity/active", $body);
    }

    /**
     * 激活保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/activeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function ActiveGuarantee($body)
    {
        return $this->restful("POST", "/guarantee/active", $body);
    }

    /**
     * 添加权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addEquity($body)
    {
        return $this->restful("POST", "/equity/add", $body);
    }

    /**
     * 创建团体权益
     * 为了兼容1.x 再新增一个sdk
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/AddGroupEquityAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addGroupEquity($body)
    {
        return $this->restful("POST", "/equity/group/add/group", $body);
    }

    /**
     * 创建保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/addAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function addGuarantee($body)
    {
        return $this->restful("POST", "/guarantee/add", $body);
    }

    /**
     * 检查保障是否购买
     * 根据用户身份证号和产品ID检查是否购买过此保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/checkByIdCardAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function checkGuarantee($body)
    {
        return $this->restful("POST", "/guarantee/check", $body);
    }

    /**
     * 根据订单号查询权益消费记录
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/consumeDetailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function consumeDetail($body)
    {
        return $this->restful("POST", "/equity/consume/detail/orderNo", $body);
    }

    /**
     * 消费接口
     * 根据precheckNo消费权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/consumeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function consumeEquity($body)
    {
        return $this->restful("POST", "/equity/consume", $body);
    }

    /**
     * 权益消费列表
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/consumeListAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function consumeList($body)
    {
        return $this->restful("POST", "/equity/consume/lists", $body);
    }

    /**
     * 用分组id获取分组权益id
     * 为了兼容 1.x SDK 新增此方法 和上面的方法相同
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/detailByGroupIdAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function detailByGroupId($body)
    {
        return $this->restful("POST", "/equity/group/detailByGroupId", $body);
    }

    /**
     * 通过itemId获取对应的换药权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/detailItemAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function detailItem($body)
    {
        return $this->restful("POST", "/equity/detailitem", $body);
    }

    /**
     * 冻结所有权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/disableAllAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableAllEquity($body)
    {
        return $this->restful("POST", "/equity/disableAll", $body);
    }

    /**
     * 禁用接口
     * 禁用指定的权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/disableAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableEquity($body)
    {
        return $this->restful("POST", "/equity/disable", $body);
    }

    /**
     * 根据权益禁用保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/disableByEquityAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableGuaranteeByEquityId($body)
    {
        return $this->restful("POST", "/guarantee/disable/equityid", $body);
    }

    /**
     * 禁用权益
     * 根据保障ID禁用保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/disableAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function disableGuaranteeById($body)
    {
        return $this->restful("POST", "/guarantee/disable", $body);
    }

    /**
     * 启用权益
     * 启用指定权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/enableAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function enableEquity($body)
    {
        return $this->restful("POST", "/equity/enable", $body);
    }

    /**
     * 创建团体权益
     * 这个sdk 不知道谁加的，为了兼容1.x 再新增一个sdk
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/AddAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function equityGroupAdd($body)
    {
        return $this->restful("POST", "/equity/group/add", $body);
    }

    /**
     * 编辑权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/editAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function equityGroupEdit($body)
    {
        return $this->restful("POST", "/equity/group/edit", $body);
    }

    /**
     * 获取权益风控
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/limitAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function equityLimit($body)
    {
        return $this->restful("POST", "/equity/limit", $body);
    }

    /**
     * 通过orderNos 获取多条权益信息
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/orderNosAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getByOrderNos($body)
    {
        return $this->restful("POST", "/equity/orderNos", $body);
    }

    /**
     * 权益详情
     * 根据权益id 或权益卡号 查找权益详情
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/detailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getEquityByEquityNo($body)
    {
        return $this->restful("POST", "/equity/detail", $body);
    }

    /**
     * 权益详情
     * 根据权益id  查找权益详情
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getEquityByIdAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getEquityById($body)
    {
        return $this->restful("POST", "/equity/detail/equityId", $body);
    }

    /**
     * 根据外部订单号获取权益详情
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getDetailByOutOrderNoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getEquityByOutOrderNo($body)
    {
        return $this->restful("POST", "/equity/outorderno", $body);
    }

    /**
     * 通过id 获取多条权益信息
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getDetailByIdsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getEquityListByIds($body)
    {
        return $this->restful("POST", "/equity/ids/lists", $body);
    }

    /**
     * 权益列表
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getListsAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getEquityPaging($body)
    {
        return $this->restful("POST", "/equity/paging", $body);
    }

    /**
     * 用分组id获取分组权益id
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/getDetailByGroupIdAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getGroupEquityByGroupId($body)
    {
        return $this->restful("POST", "/equity/group/getdetailByGroupId", $body);
    }

    /**
     * 获取权益详情
     * 根据权益ID 获取权益信息
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/detailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getGroupEquityById($body)
    {
        return $this->restful("POST", "/equity/group/detail", $body);
    }

    /**
     * 获取权益列表
     * 根据项目ID 获取权益列表
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GroupEquityController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getGroupEquityPaging($body)
    {
        return $this->restful("POST", "/equity/group/paging", $body);
    }

    /**
     * 保障详情
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/detailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getGuaranteeDetail($body)
    {
        return $this->restful("POST", "/guarantee/detail", $body);
    }

    /**
     * 保障列表
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/pagingAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getGuaranteePaging($body)
    {
        return $this->restful("POST", "/guarantee/paging", $body);
    }

    /**
     * 获取用户有几个权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/memberCountAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getMemberEquityCount($body)
    {
        return $this->restful("POST", "/equity/member/count", $body);
    }

    /**
     * 用户有没有消费数据
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityConsumeController/memberAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function getMemberIsConsume($body)
    {
        return $this->restful("POST", "/equity/consume/member", $body);
    }

    /**
     * 获取分组权益 权益总金额
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getNominalValueAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function groupNominalValue($body)
    {
        return $this->restful("POST", "/equity/group/nominalValue", $body);
    }

    /**
     * 保障详情
     * 为了兼容 1.x sdk 新增此方法，正常调用请使用上面的detail 方法
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/infoAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function guaranteeDetail($body)
    {
        return $this->restful("POST", "/guarantee/info", $body);
    }

    /**
     * 保障列表
     * 为了兼容 1.x sdk 新增此方法，正常调用请使用上面的paging 方法
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/pagingListAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function guaranteeList($body)
    {
        return $this->restful("POST", "/guarantee/pagingList", $body);
    }

    /**
     * 设置权益为失效状态
     * 入参只需要一个，使用优先级为 equityId equityNo outOrderNo
     * 只有未激活和已激活状态的权益才可以设为失效状态
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/InvalidAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function invalid($body)
    {
        return $this->restful("POST", "/equity/invalid", $body);
    }

    /**
     * 设置保障为失效状态
     * 入参只需要一个，使用优先级为 guaranteeId equityId
     * 只有未激活和已激活状态的保障才可以设为失效状态
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/InvalidAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function invalidGuarantee($body)
    {
        return $this->restful("POST", "/guarantee/invalid", $body);
    }

    /**
     * 锁定试算
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/PrecheckController/lockAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function lockEquity($body)
    {
        return $this->restful("POST", "/precheck/lock", $body);
    }

    /**
     * 用户消费数据列表
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityConsumeController/memberEquityTypeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function memberEquityType($body)
    {
        return $this->restful("POST", "/equity/consume/memberequitytype", $body);
    }

    /**
     * 创建权益消费限制
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityOrganController/createAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function organCreate($body)
    {
        return $this->restful("POST", "/equity/organ/create", $body);
    }

    /**
     * 预核算接口
     * 传入订单信息，进行预核算
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/PrecheckController/checkAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function precheck($body)
    {
        return $this->restful("POST", "/precheck/check", $body);
    }

    /**
     * 试算记录详情
     * 根据试算流水号获取 试算记录详情
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/PrecheckController/detailAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function precheckDetail($body)
    {
        return $this->restful("POST", "/precheck/detail", $body);
    }

    /**
     * 项目下的用户拥有的权益和总金额计算
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/projectMemberAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function projectMember($body)
    {
        return $this->restful("POST", "/equity/projectmember", $body);
    }

    /**
     * 确认阅读协议
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/readAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function read($body)
    {
        return $this->restful("POST", "/equity/read", $body);
    }

    /**
     * 退款接口
     * 根据订单号和订单信息退还指定金额or次数的权益给用户权益账户
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/refundAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function refund($body)
    {
        return $this->restful("POST", "/equity/refund", $body);
    }

    /**
     * 赠送保障
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/GuaranteeController/giveAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function setGuaranteeGive($body)
    {
        return $this->restful("POST", "/guarantee/give", $body);
    }

    /**
     * 获取总金额 和保障总额
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/getTotalFeeAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function totalFee($body)
    {
        return $this->restful("POST", "/equity/totalfee", $body);
    }

    /**
     * 解锁接口
     * 根据precheckNo解锁已经锁定的权益
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/unlockAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function unlockEquity($body)
    {
        return $this->restful("POST", "/equity/unlock", $body);
    }

    /**
     * 更新权益卡时间
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/updateAvailableToAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function updateAvailableTo($body)
    {
        return $this->restful("POST", "/equity/updateavailableto", $body);
    }

    /**
     * 权益提额
     * @link https://uniondrug.coding.net/p/module.equity/git/tree/development/docs/api/EquityController/liftingAmountAction.md
     * @param array $body 入参类型
     * @return ResponseInterface
     */
    public function liftingAmount($body)
    {
        return $this->restful("POST", "/equity/liftingamount", $body);
    }
}