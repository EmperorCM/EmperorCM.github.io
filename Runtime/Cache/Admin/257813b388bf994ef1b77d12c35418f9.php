<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>后台管理</title>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" />
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" />
    </head>
    <body>
        <div id="wrapper">
            <h2>首页</h2>
            
            <table class="form" cellspacing="0" style="width:500px;">
                <thead>
                    <tr><th colspan="2">我的个人资料</th></tr>
                </thead>
                <tbody>
                    <tr><td class="tkey w120">用户名：</td><td class="td2"><?php echo ($_SESSION["username"]); ?></td></tr>
                    <tr><td class="tkey">注册时间：</td><td class="td2"><?php echo (date('Y-m-d H:i:s',$admin['create_time'])); ?></td></tr>
                    <tr><td class="tkey">邮箱地址：</td><td class="td2"><?php echo ($admin['email']); ?></td></tr>
                    <tr><td class="tkey">上次登录时间：</td><td class="td2"><?php echo (date('Y-m-d H:i:s',$admin['login_time'])); ?></td></tr>
                    <tr><td class="tkey">总登录次数：</td><td class="td2"><?php echo ($admin['login_count']); ?></td></tr>
                </tbody>
            </table>
            <div class="box hide" style="width:400px;">
                <h3 class="head">便签</h3>
                <div contenteditable="true" >
                    写便签
                </div>
            </div>
        </div>
    </body>
</html>