<?php


namespace app\common\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'cat_id' => 'require|integer',
        'parent_id' => 'require|integer',
        'cat_name' => 'require|max:20',
        'cat_desc' => 'require|max:40',
        'status' => 'require|in:-1,0,1'
    ];

    protected $message = [
        'cat_id.require' => '分类ID必须传递',
        'cat_id.integer' => '分类ID必须是整形',
        'parent_id.require' => '父级ID必须传递',
        'parent_id.integer' => '父级ID必须是整形',
        'cat_name.require' => '分类名必须传递',
        'cat_name.max' => '分类名不能超过10个字符',
        'cat_desc.require' => '分类描述必须传递',
        'cat_desc.max' => '分类名不能超过20个字符',
        'status.require' => '状态必须传递',
        'status.in' => '状态值不合法'
    ];

    protected $scene = [
        'add'=> ['cat_name', 'cat_desc', 'parent_id'],
        'status' => ['cat_id', 'status']
    ];
}
