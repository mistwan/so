<?php /*a:1:{s:60:"C:\xampp\htdocs\so\application\admin\view\manager\login.html";i:1543923290;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/static/public/css/normalize.min.css">
    <link rel="stylesheet" href="/static/admin/css/login.css">
</head>
<body>
<div class="login">
    <img src="/static/index/img/logo.png" alt="logo">
    <form action="<?php echo url('manager/verify'); ?>" method="post">
        <input type="text" name="name" class="user" placeholder="请输入用户名" autocomplete><br>
        <input type="password" name="password" class="pass" placeholder="请输入密码" autocomplete><br>
        <div>
            <input type="checkbox" name="check" id="check" checked/>
            <label for="check">记住我</label>
        </div>
        <a href="<?php echo url('manager/register'); ?>">注册</a>
        <a href="<?php echo url('manager/index'); ?>">忘记密码？</a>
        <input type="submit" class="submit" value="登录">
    </form>
</div>
</body>
</html>
