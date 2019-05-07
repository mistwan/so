<?php


namespace app\common\validate;


use think\Validate;

class Chart extends Validate
{
    protected $rule = [
        "sex" => "require",
        "rate" => "require",
        "status" => "require",
        "mode" => "require",
        "type" => "require"
    ];

    protected $field = [
        'sex' => '选择性别',
        "rate" => '最近玩过手机游戏',
        "status" => '你是可爱的',
        "mode" => '下列哪种方式会让您对某一款游戏感兴趣',
        "type" => "对哪种类型的手游视频感兴趣"
    ];

    protected $scene = [
        "add" => ['sex', "rate", "status", "mode", "type"]
    ];
}
