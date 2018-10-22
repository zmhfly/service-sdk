<?php
/**
 * @author zhaoyue
 * @date   2018-09-13
 */
namespace Uniondrug\ServiceSdk\Modules;

use Uniondrug\Service\ClientResponseInterface;
use Uniondrug\ServiceSdk\Sdk;
use Uniondrug\ServiceSdk\ServiceSdkInterface;

/**
 * 智推用户服务
 * @package Uniondrug\ServiceSdk\Modules
 */
class PromotionUserSdk extends Sdk implements ServiceSdkInterface
{
    protected $serviceName = 'promotionUser';

    /**
     * 查询代理人
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/getProxy.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getProxy($body)
    {
        return $this->restful(static::METHOD_POST, "/login/getProxy", $body);
    }

    /**
     * 工业用户注册
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/signIn.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function signIn($body)
    {
        return $this->restful(static::METHOD_POST, "/login/signIn", $body);
    }

    /**
     * 工业用户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/getMerchant.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getMerchant($body)
    {
        return $this->restful(static::METHOD_POST, "/login/getMerchant", $body);
    }

    /**
     * 完善资料
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/complete.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function complete($body)
    {
        return $this->restful(static::METHOD_POST, "/login/complete", $body);
    }

    /**
     * 登陆
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/login/login.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function login($body)
    {
        return $this->restful(static::METHOD_POST, "/login/login", $body);
    }

    /**
     * 工业审核
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/merchant/approve.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function merchantApprove($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/approve", $body);
    }

    /**
     * 变更工业阶段
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/merchant/changeStage.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function changeStage($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/changeStage", $body);
    }

    /**
     * 获取工业用户
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/merchant/getInfo.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getInfo($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/getInfo", $body);
    }

    /**
     * 获取工业名称列表
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/merchant/getNameList.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function getNameList($body)
    {
        return $this->restful(static::METHOD_POST, "/merchant/getNameList", $body);
    }

    /**
     * userToken
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/login/userToken.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function userToken($body)
    {
        return $this->restful(static::METHOD_POST, "/login/userToken", $body);
    }

    /**
     * tokenLogin
     * @link https://uniondrug.coding.net/p/docs/git/blob/development/sdks/service/promotion/user/login/tokenLogin.md
     * @param array $body
     * @return ClientResponseInterface
     */
    public function tokenLogin($body)
    {
        return $this->restful(static::METHOD_POST, "/login/tokenLogin", $body);
    }

}
