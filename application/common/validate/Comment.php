<?php


namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        "username" => "require|chsDash",
        "email" => "require|email",
        "comment" => "require",
        "article_id" => "require|number",
        "status" => "require|in:-1,0,1",
        "id" => "require|number",
    ];

    protected $field = [
        'username' => '昵称',
        'email' => '邮箱',
        'comment' => '评论内容',
    ];

    protected $scene = [
        "add" => ["username", "email", "comment"],
        "status" => ["status", "id"]
    ];
}
