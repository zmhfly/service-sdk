<?php
/**
 * @author kuanxing <346300265@qq.com>
 * @date   2018-06-21
 */
namespace Uniondrug\ServiceSdk\Modules;

use Uniondrug\Service\ClientResponseInterface;
use Uniondrug\ServiceSdk\Sdk;
use Uniondrug\ServiceSdk\ServiceSdkInterface;
use Uniondrug\Structs\StructInterface;

/**
 * 消息中心
 * @package Uniondrug\ServiceSdk\Modules
 */
class MessageSdk extends Sdk implements ServiceSdkInterface
{
    protected $serviceName = 'message';

    /**
     * 注册新应用
     * @link https://uniondrug.coding.net/p/module.message/git/blob/development/docs/api/AppController/registerAction.md
     * @param array|StructInterface $body
     * @return ClientResponseInterface
     */
    public function appRegister($body)
    {
        return $this->restful(static::METHOD_POST, "/app/register", $body);
    }

    /**
     * 消息分页列表
     * @link https://uniondrug.coding.net/p/module.message/git/blob/development/docs/api/MessageController/addAction.md
     * @param array|StructInterface $body
     * @return ClientResponseInterface
     */
    public function messageAdd($body)
    {
        return $this->restful(static::METHOD_POST, "/message/add", $body);
    }

    /**
     * 消息分页列表
     * @link https://uniondrug.coding.net/p/module.message/git/blob/development/docs/api/MessageController/pagingAction.md
     * @param array|StructInterface $body
     * @return ClientResponseInterface
     */
    public function messagePaging($body)
    {
        return $this->restful(static::METHOD_POST, "/message/paging", $body);
    }

    /**
     * 消息分页列表
     * @link https://uniondrug.coding.net/p/module.message/git/blob/development/docs/api/MessageController/detailAction.md
     * @param array|StructInterface $body
     * @return ClientResponseInterface
     */
    public function messageDetail($body)
    {
        return $this->restful(static::METHOD_POST, "/message/paging", $body);
    }
}