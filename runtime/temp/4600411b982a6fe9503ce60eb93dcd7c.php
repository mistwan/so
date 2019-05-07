<?php /*a:4:{s:60:"C:\xampp\htdocs\so\application\admin\view\comment\index.html";i:1544010932;s:60:"C:\xampp\htdocs\so\application\admin\view\public\header.html";i:1542712396;s:58:"C:\xampp\htdocs\so\application\admin\view\public\menu.html";i:1543972044;s:60:"C:\xampp\htdocs\so\application\admin\view\public\footer.html";i:1542521327;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/public/css/normalize.min.css">
    <link rel="stylesheet" href="/static/public/css/font-awesome.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css">
    <link rel="stylesheet" href="/static/public/css/component.css">



<link rel="stylesheet" type="text/css" href="/static/admin/css/comment.css" />
</head>
<body>
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

<div class="comment">
    <h2>评论列表</h2>
    <!--<section class="panel">
        <p class="tag">
            <span class="left">用户<b>wang</b>对文章<b>PHP</b>的评价</span>
            <span class="right">2017-12-12 12:20:22</span>
        </p>
        <div>
            嗯，这个文章真是厉害了，哈哈哈嗯，这个文章真是厉害了，哈哈哈嗯，这个文章真是厉害了，哈哈哈嗯，这个文章真是厉害了，哈哈哈嗯，这个文章真是厉害了，哈哈哈
        </div>
        <p class="handle">
            <a href="javascript:;" class="status" title="点击修改状态">待审</a>
            <a href="javascript:;" class="status" title="删除">删除</a>
        </p>
    </section>-->
    <?php if(is_array($adminComment) || $adminComment instanceof \think\Collection || $adminComment instanceof \think\Paginator): $i = 0; $__LIST__ = $adminComment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <section class="panel">
        <p class="tag">
            <span class="left">用户<b><?php echo htmlentities($vo['username']); ?></b>对文章<b>
                <?php echo model("article")->where("article_id",$vo['article_id'])->value("article_title"); ?>
                </b>说:</span>
            <span class="right"><?php echo htmlentities($vo['create_time']); ?></span>
        </p>
        <div>
           <?php echo htmlentities($vo['comment']); ?>
        </div>
        <p class="handle">
            <a href="<?php echo url('comment/status',['id'=>$vo['id'],'status'=>$vo['status']==1?0:1]); ?>
" class="status" title="点击修改状态"><?php echo htmlentities(status($vo['status'])); ?></a>
            <a href="<?php echo url('comment/status',['id'=>$vo['id'],'status'=>-1]); ?>" class="status" title="删除">删除</a>
        </p>
    </section>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <?php echo $adminComment; ?>
</div>


<script charset="utf-8" src="/static/public/js/jquery-1.9.1.min.js"></script>
<script charset="utf-8" src="/static/public/js/component.js"></script>
<script charset="utf-8" src="/static/admin/js/admin.js"></script>
<script charset="utf-8" src="/static/public/js/respond.min.js"></script>
<script charset="utf-8" src="/static/public/js/html5shiv.min.js"></script>
<script charset="utf-8" src="/static/public/js/selectivizr-min.js"></script>
</body>
</html>

