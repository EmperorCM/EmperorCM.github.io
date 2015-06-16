<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>用户管理</title>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/drag.js"></script>
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" />
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" />
        <script>
            $(function(){
                $("#sidebar > ul > li > a").eq(0).addClass('selected');
                $(".but_add").click(function(){
                    $("#add").show("fast");
                })
                $(".windows > h4 > span").click(function(){
                    $(this).parent().parent(".windows").hide("fast");
                })
                $("#myform").submit(function(){
                    var str=$("#password").val();
                    rel=/^[a-zA-Z0-9\u4e00-\u9fa5]{5,20}$/;
                    if(!rel.test(str)){
                        alert("密码格式错误！");
                        return false;
                    }else if(str!=$("#npassword").val()){
                        alert("确认密码错误！");
                        return false;
                    }else{
                        $("#myform").submit();
                    }
                })

            })

        </script>
    </head>
    <body>
        <div id="wrapper">
            <h2>编辑用户</h2>
            <div id="main">
                <form action="<?php echo U('updata');?>" method="post" id="myform">
                    <table width="100%" class="form">
                        <tr><td class="tkey w240">用户名：</td><td><?php echo ($user["username"]); ?><input type="hidden" value="<?php echo ($user["id"]); ?>" name="id" /></td></tr>
                        <tr><td class="tkey">Email：</td><td><input type="text" name="email" value="<?php echo ($user["email"]); ?>" class="input_text" /></td></tr>
                        <tr><td class="tkey">新密码：</td><td><input type="text" name="password" value="" class="input_text"/>&nbsp;<font color="#f60">新密码为空时不修改密码！</span></td></tr>
                        <tr><td class="tkey">确定新密码：</td><td><input type="text" name="npassword" value="" class="input_text" /></td></tr>
                        <tr><td class="tkey">创建时间：</td><td><?php echo (date('Y-m-d',$user["create_time"])); ?></td></tr>
                        <tr><td class="tkey">&nbsp;</td><td><input type="submit" value="确定" class="but_blue" /></td></tr>
                    </table>

                </form>
            </div>
            <p class="hr_10"></p>
        </div>

    </body>
</html>