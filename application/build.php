php<?php
# 切换到root_directory
# php think build
# php think make:model Common/City
return [
    // 生成应用公共文件
    '__file__' => ['common.php'],

    // 定义demo模块的自动生成 （按照实际定义的文件名生成）
    'index' => [
        '__dir__' => ['controller', 'view'],
        'view' => ['index/index', 'login/login', 'register/register', 'article/article']
    ],

    'manager' => [
        '__dir__' => ['controller', 'view'],
        'view' => ['public/public', 'index/index', 'category/category']
    ],

    'common' => [
        '__dir__' => ['validate', 'model']
    ]
];
