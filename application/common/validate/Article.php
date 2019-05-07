<?php


namespace app\common\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule = [
        "article_id" => 'require|integer',
        "article_title" => "require|max:80",
        "article_desc" => "require|max:100",
        "article_logo" => "require",
        "user_id" => "require|integer",
        "cat_id" => "require|integer",
        "article_content" => "require",
        'status' => 'require|in:-1,0,1'
    ];

    protected $message = [
        'article_id.require' => '文章ID必须传递',
        'article_id.integer' => '文章ID必须是整形',
        "article_title.require" => "文章标题必须填写",
        "article_title.max" => "文章标题不能超过40个字符",
        "article_desc.require" => "文章描述必须填写",
        "article_desc.max" => "文章描述不能超过50个字符",
        "article_logo.require" => "文章logo必须填写",
        "user_id.require" => "用户ID必须传递",
        "user_id.integer" => "用户ID必须是整数",
        "cat_id.require" => "分类必须填写",
        "cat_id.integer" => "分类必须是整数",
        "article_content.require" => "文章内容必须填写",
        "status.require" => "状态必须填写",
        "status.in" => "状态值必须为-1，0，1",
    ];

    protected $scene = [
        'add' => ['article_name', "article_desc", "article_logo", "article_content"],
        'update' => ["article_id", 'article_name', "article_desc", "article_logo", "article_content"],
        'status' => ["article_id", 'status']
    ];
}
