<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>管理员登录</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
    </head>
    <body>

        <div id="login">
            <h3>会员登录</h3>
            <form action="<?php echo U('login');?>" method="POST">
                <ul>
                    <li>用户名：<input type="text" name="username" /></li>
                    <li>密　码：<input type="password" name="password" /></li>
                    <li><input type="submit" value="登　录" /></li>
                </ul>
            </form>
        </div>
    </body>
</html>