<?php /*a:4:{s:58:"C:\xampp\htdocs\so\application\admin\view\index\index.html";i:1542713353;s:60:"C:\xampp\htdocs\so\application\admin\view\public\header.html";i:1542712396;s:58:"C:\xampp\htdocs\so\application\admin\view\public\menu.html";i:1543972044;s:60:"C:\xampp\htdocs\so\application\admin\view\public\footer.html";i:1542521327;}*/ ?>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/public/css/normalize.min.css">
    <link rel="stylesheet" href="/static/public/css/font-awesome.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/public/css/component.css">


<header>
    <a href="<?php echo url('index/index'); ?>" class="logo">
        <img src="/static/public/img/logo.png" alt="logo">
    </a>
    <a href="javascript:;" class="nav" title="导航">
        <i class="fa fa-list-ul fa-lg toggle-nav" aria-hidden="true"></i>
    </a>
    <a href="javascript:;" class="notice">
        <i class="fa fa-bell-o fa-lg" aria-hidden="true"></i>
        <span>&nbsp;提醒&nbsp;</span>
        <small>12</small>
    </a>
    <a href="javascript:;" style="display: flex;align-items: center" class="admin-user">
        <span>我是一只喵</span>
        <img src="/static/admin/img/avatar.jpg" alt="avatar" height="30">
    </a>
    <a href="<?php echo url('manager/logout'); ?>" class="abort" title="退出">
        <i class="fa fa-indent fa-lg" aria-hidden="true"></i>
    </a>
</header>
<div class="main">
<nav>
    <ul class="nav-active">
        <li>
            <a href="<?php echo url('index/index'); ?>">
                <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                <span>首页</span>
            </a>
        </li>
        <li>
            <a href="<?php echo url('category/index'); ?>">
                <i class="fa fa-sliders fa-lg" aria-hidden="true"></i>
                <span>分类</span>
            </a>
        </li>
        <li>
            <a href="<?php echo url('article/index'); ?>">
                <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
                <span>文章</span>
            </a>
        </li>
        <li>
            <a href="<?php echo url('comment/index'); ?>">
                <i class="fa fa-commenting-o fa-lg" aria-hidden="true"></i>
                <span>评论</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-user-secret fa-lg" aria-hidden="true"></i>
                <span>用户</span>
            </a>
        </li>
    </ul>
</nav>

<section>
    <h2>欢迎来到recuder后台！</h2>
    <div class="admin" style="padding-top: 0">
        <h4>信息统计</h4>
        <table style="min-width: 700px;">
        <thead>
        <tr>
            <th>项目名称</th>
            <th>全部数量</th>
            <th>今日新增</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>分类</td>
            <td>111</td>
            <td>111</td>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="admin" style="padding-bottom: 20px">
        <h4>服务器信息</h4>
        <table>
            <tbody>
            <tr>
                <td>服务器计算机名</td>
                <td>http://127.0.0.1/</td>
            </tr>
            </tbody>
        </table>
    </div>
</section>
</div>
<script charset="utf-8" src="/static/public/js/jquery-1.9.1.min.js"></script>
<script charset="utf-8" src="/static/public/js/component.js"></script>
<script charset="utf-8" src="/static/admin/js/admin.js"></script>
<script charset="utf-8" src="/static/public/js/respond.min.js"></script>
<script charset="utf-8" src="/static/public/js/html5shiv.min.js"></script>
<script charset="utf-8" src="/static/public/js/selectivizr-min.js"></script>
</body>
</html>

