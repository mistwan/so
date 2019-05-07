<?php /*a:5:{s:58:"C:\xampp\htdocs\so\application\index\view\index\index.html";i:1544770173;s:60:"C:\xampp\htdocs\so\application\index\view\public\header.html";i:1543418900;s:62:"C:\xampp\htdocs\so\application\index\view\public\searcher.html";i:1543920183;s:60:"C:\xampp\htdocs\so\application\index\view\public\footer.html";i:1543545315;s:60:"C:\xampp\htdocs\so\application\index\view\public\script.html";i:1543767113;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/index/css/head&foot.css">
    <link rel="stylesheet" href="/static/public/css/normalize.min.css">
    <link rel="stylesheet" href="/static/public/css/font-awesome.css">
    <link rel="stylesheet" href="/static/public/css/component.css">
    <link rel="stylesheet" href="/static/index/css/index.css">

</head>
<body>

<header>
    
<form method="get" action="<?php echo url('article/search'); ?>" >
    <ul>

        <li class="logo">
            <a href="<?php echo url('index/index'); ?>">
            <img src="/static/index/img/logo.png" alt="logo">
            </a>
        </li>
        <li><input type="text" class="search" name="search" placeholder="请输入搜索内容..."></li>
        <li><input type="submit" class="find" value="SEARCH"></li>
        <!-- <li><a href="" class="manager login">登&nbsp;陆</a></li>
         <li><a href="" class="manager reg">注&nbsp;册</a></li>-->
    </ul>
</form>

    <div class="head-content">
        <div class="head-left">
            <p>您好！</p>
            <p>欢迎来到我的个人博客^_^</p>
            <p><b>在这里，我将分享我的个人所想，所爱好，尽情享受技术所带来的乐趣吧!</b></p>
        </div>
        <div class="head-right">
            <div class="outer"></div>
            <div class="middle"></div>
            <div class="inner"></div>
        </div>
    </div>
</header>
<nav>
    <i class="fa fa-bars" aria-hidden="true" style="font-size: 20px;"></i>
    <div id="model"></div>
    <ul id="category">
        <li><a href="<?php echo url('chart/index'); ?>">问卷</a></li>
        <?php if(is_array($indexCat) || $indexCat instanceof \think\Collection || $indexCat instanceof \think\Paginator): $i = 0; $__LIST__ = $indexCat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><a href=""><?php echo htmlentities($vo['cat_name']); ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</nav>
<div class="content">
    <!--<section class="con">
        <div class="img">
            <img src="/static/index/img/foot_bg.png" alt="图片" >
        </div>

        <div class="text">
            <h2 class="title">2 元的维生素 C 和 100 元的维生素 C 区别大吗？</h2>
            <p class="meta">
                <span>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;2018-11-11
                </span>
                <span>
                    <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;200
                </span>
                <a href="javascript:;" class="up">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;<span>20</span>
                </a>
            </p>
            <p class="summary">
                2 元的维生素 C 和 100 元的维生素 C 有区别吗？
                区别还真的大！
                很多朋友也都说了：
                便宜的是药品，贵的是保健品，所以肯定是推荐买药品，便宜又可靠。
                是没有人真的头铁，去较真的做实验对比过两者到底有什么差距。
                正好，我们一直头比较铁。
            </p>
            <a href="javascript:;">BROWSE IT&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 20px;"></i></a>
        </div>
    </section>-->
    <?php if(is_array($indexArt) || $indexArt instanceof \think\Collection || $indexArt instanceof \think\Paginator): $i = 0; $__LIST__ = $indexArt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <section class="con">
        <div class="img">
            <img src="<?php echo htmlentities($vo['article_logo']); ?>" alt="logo">
        </div>
        <div class="text">
            <h2 class="title"><?php echo htmlentities($vo['article_title']); ?></h2>
            <p class="meta">
                <span>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;
                    <?php echo htmlentities(date("Y-m-d",!is_numeric($vo['create_time'])? strtotime($vo['create_time']) : $vo['create_time'])); ?>
                </span>
                <span>
                    <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;
                    <?php echo htmlentities((isset($vo['scan']) && ($vo['scan'] !== '')?$vo['scan']:100)); ?>
                </span>
                <span class="up">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;
                    <?php echo htmlentities((isset($vo['agree']) && ($vo['agree'] !== '')?$vo['agree']:50)); ?>
                </span>
            </p>
            <p class="summary"><?php echo htmlentities($vo['article_desc']); ?></p>
            <a href="<?php echo url('article/index',['id'=>$vo['article_id']]); ?>" target="_blank">BROWSE IT&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>
    </section>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>


<a href="javascript:;" class="top"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

<!--<div class="page">
    <ul>
        <li><a href="javascript:;"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        <li><a href="javascript:;" class="active">1</a></li>
        <li><a href="javascript:;">2</a></li>
        <li><a href="javascript:;">3</a></li>
        <li><a href="javascript:;">4</a></li>
        <li><a href="javascript:;">5</a></li>
        <li><a href="javascript:;"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    </ul>
</div>-->
<?php echo $indexArt; ?>


<footer>
    <p>本站资源来自互联网收集 仅供用于学习和交流 我们尊重软件和教程作者的版权 请遵循相关法律法规<br>
        本站一切资源不代表本站立场 如有侵权、后门、不妥请联系本站删除<br>
        © 2018 recuder | 皖ICP备17022877号-5</p>
</footer>

<script src="/static/public/js/jquery-1.9.1.min.js"></script>
<script src="/static/index/js/index.js"></script>
<script src="/static/public/js/respond.min.js"></script>
<script src="/static/public/js/html5shiv.min.js"></script>

<script src="/static/public/js/component.js"></script>
</body>
</html>

