<?php


namespace app\common\validate;



use think\Validate;

class Manager extends Validate
{
    protected $rule = [
        "name" => "require|max:12|min:2",
//        "admin_name" => "require|between:1,120",
        'password'=>'require|confirm',
        "email" => "email",
        "avatar" => "max:64"
        /*"username" => "require|max:12",
        "username" => "require|max:12",
        "username" => "require|max:12",*/
    ];

    protected $message = [
        "name.require" => "用户名必须传递",
//        "admin_name.between" => "用户名长度必须为2-12个字符",
        "name.max" => "用户名长度不能超过12个字符",
        "name.min" => "用户名长度不能少于12个字符",
        "password.require" => "密码必须传递",
        "password.confirm" => "密码不一致",
        "email" => "邮箱格式错误",
    ];

    protected $scene = [
        "add" => ["name", "password", "email"]
    ];
}
