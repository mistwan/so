<?php /*a:4:{s:60:"C:\xampp\htdocs\so\application\index\view\article\index.html";i:1544802010;s:62:"C:\xampp\htdocs\so\application\index\view\public\searcher.html";i:1543920183;s:60:"C:\xampp\htdocs\so\application\index\view\public\footer.html";i:1543545315;s:60:"C:\xampp\htdocs\so\application\index\view\public\script.html";i:1543767113;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlentities($detailArt['article_title']); ?></title>
    <link rel="stylesheet" href="/static/index/css/head&foot.css">
    <link rel="stylesheet" href="/static/public/css/normalize.min.css">
    <link rel="stylesheet" href="/static/public/css/font-awesome.css">
    <link rel="stylesheet" href="/static/public/css/component.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/article.css" />
</head>
<body>

<header style="height: 100px">
    
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

</header>

<!--<div class="content">
    <article>
        <h1 class="title">作为程序员的你，工作台是怎样的？</h1>
        <hr>
        <div class="article">
            <p>很好用的图床，上传一张图片，可以获得多个免费图床的地址，</p>
            <p>比如：新浪图床、淘宝图床，如果图床失效了，会更新其他的上来。</p>
            <p>同时也支持云存储，登录好账号后在后台设置一下接口代码。</p>
            <p>你上传过的图片，可以在上传历史中找到，方便找回上传过的内容。</p>
            <p>用着很方便，推荐给大家。</p>
            <p>访问地址： 聚合图床</p>
            <p>每次一分享加速器资源过不了几天就和谐失效了，为了小伙伴们的游戏体验，老夜也是乐此不疲的继续为大家分享着</p>
            <img class="alignnone size-large" src="https://ww1.sinaimg.cn/large/005YhI8igy1fwsz9zg94dj31a50v3n5k"/>
        </div>
        <div class="attitude">
            <a href="javascript:;">
                <i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
                <span>12</span>
            </a>
            <a href="javascript:;">
                <i class="fa fa-thumbs-o-down fa-2x" aria-hidden="true"></i>
                <span>12</span>
            </a>
            <a href="javascript:;">
                <i class="fa fa-jpy fa-2x" aria-hidden="true"></i>
            </a>
        </div>
        <div class="comment">
            <span>评论</span>
            <hr>
            <div class="reply">
                <form action="" method="get">
                    <input type="text" placeholder="写下你的评论" class="text">
                    <input type="submit" value="评论" class="submit">
                </form>
            </div>
            <div class="replied">
                <a href="javascript:;" class="avatar">
                    <img src="/static/index/img/avatar.jpg" alt="avatar">
                    <span>用户</span>
                </a>
                <a href="javascript:;" class="show-reply">回复&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>
                <p class="reply-content">每次一分享加速器资源过不了几天就和谐失效了，为了小伙伴们的游戏体验，老夜也是乐此不疲的继续为大家分享着</p>
                <form action="" method="get">
                    <input type="text" placeholder="写下你的回复..." class="text reply-input">
                    <input type="submit" value="回复" class="submit">
                </form>
            </div>
        </div>
    </article>
    <section class="tags">
        <h2>话题分类</h2>
        <hr>
        <a href="javascript:;"><span>Java</span>&nbsp;<span>11</span></a>
        <a href="javascript:;"><span>PHP</span>&nbsp;<span>999</span></a>
        <a href="javascript:;"><span>前端</span>&nbsp;<span>5</span></a>
        <a href="javascript:;"><span>娱乐</span>&nbsp;<span>44</span></a>
        <a href="javascript:;"><span>娱乐</span>&nbsp;<span>33</span></a>
        <a href="javascript:;"><span>图片</span>&nbsp;<span>3</span></a>
        <a href="javascript:;"><span>音乐</span>&nbsp;<span>3</span></a>
    </section>
</div>-->
<div class="content">
    <article>
        <h1 class="title"><?php echo htmlentities($detailArt['article_title']); ?></h1>
        <hr>
        <div class="article">
            <?php echo $detailArt['article_content']; ?>
        </div>
        <div class="attitude">
            <a href="javascript:;" id="agree" aid="<?php echo htmlentities($detailArt['article_id']); ?>">
                <i class="fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
                <span><?php echo htmlentities((isset($detailArt['agree']) && ($detailArt['agree'] !== '')?$detailArt['agree']:101)); ?></span>
            </a>
            <!--<a href="javascript:;" id="disagree" aid="<?php echo htmlentities($detailArt['article_id']); ?>">
                <i class="fa fa-thumbs-o-down fa-2x" aria-hidden="true"></i>
                <span></span>
            </a>-->
            <a href="javascript:;">
                <i class="fa fa-jpy fa-2x" aria-hidden="true"></i>
            </a>
        </div>
        <div class="comment">
            <span>评论</span>
            <hr>
            <div class="reply">
                <form action="<?php echo url('comment/add'); ?>" method="post">
                    <!--<div contenteditable="true">xxxxxx</div>-->
                    <textarea name="comment"
                              placeholder="写下你的评论"
                              class="write"
                              autoHeight="true"></textarea>
                    <!--<input type="text" name="comment" >-->
                    <div class="user-info">
                        <p>
                            <input type="text"
                                   name="username"
                                   class="username"
                                   placeholder="请填写你的昵称...">
                        </p>
                        <p>
                            <input type="text" name="email" class="email" placeholder="请填写你的邮箱...">
                        </p>
                    </div>
                    <input type="hidden" name="article_id" value="<?php echo htmlentities($detailArt['article_id']); ?>">
                    <input type="submit" value="提交评论" class="submit-comment">
                </form>
            </div>

            <!--<div class="replied">
                <span>王</span>
                <a href="javascript:;" class="show-discuss"><span>回复</span>&nbsp;<i class="fa fa-share" aria-hidden="true"></i></a>
                <p class="reply-content">每次一分享加速器资源过不了几天就和谐失效了，为了小伙伴们的游戏体验，老夜也是乐此不疲的继续为大家分享着</p>
                <form action="" method="post" class="discuss">
                    <input type="text" placeholder="写下你的回复..." class="write" >
                    <input type="submit" value="回复" class="submit" >
                </form>
            </div>-->
            <?php $_result=model('Comment')->getIndexComment($detailArt['article_id']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <hr>
            <div class="replied">
                <b><?php echo htmlentities($vo['username']); ?></b>
                <!--<a href="javascript:;" class="show-discuss">
                    <span>回复</span>&nbsp;<i class="fa fa-share" aria-hidden="true"></i>
                </a>-->
                <p class="reply-content">
                   <?php echo htmlentities($vo['comment']); ?>
                </p>
                <!--<form action="" method="post" class="discuss">
                    <input type="text" placeholder="写下你的回复..." class="write" >
                    <input type="submit" value="回复" class="submit" >
                </form>-->
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </article>

    <section class="tags">
        <h2>文章分类</h2>
        <hr>
        <?php if(is_array($cat) || $cat instanceof \think\Collection || $cat instanceof \think\Paginator): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo url('article/items',['id'=>$vo['cat_id']]); ?>">
            <span><?php echo htmlentities($vo['cat_name']); ?></span><span><?php echo htmlentities($vo['cat_count']); ?></span>
        </a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </section>
</div>
<footer>
    <p>本站资源来自互联网收集 仅供用于学习和交流 我们尊重软件和教程作者的版权 请遵循相关法律法规<br>
        本站一切资源不代表本站立场 如有侵权、后门、不妥请联系本站删除<br>
        © 2018 recuder | 皖ICP备17022877号-5</p>
</footer>

<script src="/static/public/js/jquery-1.9.1.min.js"></script>
<script src="/static/index/js/index.js"></script>
<script src="/static/public/js/respond.min.js"></script>
<script src="/static/public/js/html5shiv.min.js"></script>

<script>
    let SCOPE = {
        "agree_url": "<?php echo url('api/article/attitude', ['code'=>1]); ?>",
        "disagree_url": "<?php echo url('api/article/attitude', ['code => 0']); ?>",
    }
</script>
</body>
</html>
