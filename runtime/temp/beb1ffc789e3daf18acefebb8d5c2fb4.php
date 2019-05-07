<?php /*a:4:{s:61:"C:\xampp\htdocs\so\application\admin\view\category\index.html";i:1543313810;s:60:"C:\xampp\htdocs\so\application\admin\view\public\header.html";i:1542712396;s:58:"C:\xampp\htdocs\so\application\admin\view\public\menu.html";i:1543972044;s:60:"C:\xampp\htdocs\so\application\admin\view\public\footer.html";i:1542521327;}*/ ?>
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
    <div class="init">
        <a href="javascript:;" class="del-action">
            <i class="fa fa-trash" aria-hidden="true"></i>
            <span>批量删除</span>
        </a>
        <a href="javascript:;" class="add-action show-add-model">
            <i class="fa fa-plus" aria-hidden="true"></i>
            <span>添加分类</span>
        </a>
        <span>共有数据：<?php echo model("category")->where('status', '>', -1)->count(); ?>条</span>
    </div>
    <div class="data">
        <table style="min-width: 700px;">
            <thead>
            <tr>
                <th>选择</th>
                <th>ID</th>
                <th>名称</th>
                <th>状态</th>
                <th>文章</th>
                <th>发布时间</th>
                <th>编辑</th>
                <th>删除</th>
                <th>查看</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($adminCat) || $adminCat instanceof \think\Collection || $adminCat instanceof \think\Paginator): $i = 0; $__LIST__ = $adminCat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="admin">
                <td><input type="checkbox" class="sel" sel_id="<?php echo htmlentities($vo['cat_id']); ?>"></td>
                <td><?php echo htmlentities($vo['cat_id']); ?></td>
                <td><?php echo htmlentities($vo['cat_name']); ?></td>
                <td><a href="<?php echo url('category/status',['cat_id'=>$vo['cat_id'],'status'=>$vo['status']==1?0:1]); ?>" class="status" title="点击修改状态"><?php echo htmlentities(status($vo['status'])); ?></a>
                </td>
                <td><?php echo htmlentities($vo['article_count']); ?></td>
                <td><?php echo htmlentities(date("Y-m-d",!is_numeric($vo['update_time'])? strtotime($vo['update_time']) : $vo['update_time'])); ?></td>
                <td><a href="<?php echo url('category/edit',['id'=>$vo['cat_id']]); ?>" ><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true" title="修改"></i></a>
                </td>
                <td> <a href="javascript:;" class="show-del-model"
                        onClick="delAction('.confirm', '<?php echo url('category/status',['cat_id'=>$vo['cat_id'],'status'=>-1]); ?>')"
                        true_id="<?php echo htmlentities($vo['cat_id']); ?>">
                    <i class="fa fa-trash fa-fw" aria-hidden="true" title="删除"></i>
                </a></td>
                <td><a href="<?php echo url('category/detail',['id'=>$vo['cat_id']]); ?>"><i class="fa fa-gg" aria-hidden="true" title="查看"></i></a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php echo $adminCat; ?>
    </div>

</section>
<form action="<?php echo url('category/save'); ?>" method="post">
    <div class="add-model ">
        <div class="model-shade cancel"></div>
        <div class="model-box">
            <h4>
                <span>添加</span>
                <i class="fa fa-times fa-lg cancel" aria-hidden="true"></i>
            </h4>
            <div class="input-group">
                <p><input type="text" name="cat_name" placeholder="请添加分类名称" class="pane"></p>
                <p><input type="text" name="cat_desc" placeholder="请添加分类描述" class="pane"></p>

                <p>
                    <select name="parent_id">
                        <option value="0">一级分类</option>
                        <?php if(is_array($indentCat) || $indentCat instanceof \think\Collection || $indentCat instanceof \think\Paginator): $i = 0; $__LIST__ = $indentCat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['cat_id']); ?>">
                            <?php echo $vo['cat_name']; ?>
                        </option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </p>
                <input type="submit" class="button" value="提交审核">
                <input type="button" class="button cancel" value="取消添加">
            </div>
        </div>
    </div>
</form>
<div class="del-model">
    <div class="model-shade cancel"></div>
    <div class="model-box">
        <h4>
            <span>信息</span>
            <i class="fa fa-times fa-lg cancel" aria-hidden="true"></i>
        </h4>
        <div class="input-group">
            <p>确认删除这个分类吗？</p>
            <input type="submit" class="button confirm" value="确&nbsp;定" onclick="">
            <input type="button" class="button cancel" value="取&nbsp;消">
        </div>
    </div>
</div>


</div>
<script charset="utf-8" src="/static/public/js/jquery-1.9.1.min.js"></script>
<script charset="utf-8" src="/static/public/js/component.js"></script>
<script charset="utf-8" src="/static/admin/js/admin.js"></script>
<script charset="utf-8" src="/static/public/js/respond.min.js"></script>
<script charset="utf-8" src="/static/public/js/html5shiv.min.js"></script>
<script charset="utf-8" src="/static/public/js/selectivizr-min.js"></script>
</body>
</html>

