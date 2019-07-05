<?php

/**
 * 解析SDK的ID注解
 * @author wsfuyibing <websearch@163.com>
 * @date   2019-07-05
 */
class SdkAnnotation
{
    private $path;
    private $namespaces = [
        'mbs' => Uniondrug\ServiceSdk\Compatiables\Abstracts\Sdk::class
    ];

    public function __construct()
    {
        $this->path = __DIR__.'/..';
    }

    public function scanner()
    {
        $this->scanCompatiables();
        $this->scanExports();
    }

    /**
     * 扫描兼容目录
     * SDK/1.x
     */
    public function scanCompatiables()
    {
    }

    public function scanExports()
    {
    }
}

(new SdkAnnotation())->scanner();

