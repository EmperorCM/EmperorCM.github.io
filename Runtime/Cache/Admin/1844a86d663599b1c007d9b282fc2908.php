<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>编辑模卡</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="wrapper">
            <h2>编辑模卡<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post" enctype="multipart/form-data" id="myform">
                <table class="form" >

                    <tr><td class="tkey">姓名：</td><td><input type="text" value="<?php echo ($girl["name"]); ?>" name="name" class="input_text" /></td></tr>
                    <tr><td class="tkey">身高：</td><td><input type="text" value="<?php echo ($girl["shengao"]); ?>" name="shengao" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">体重：</td><td><input type="text" value="<?php echo ($girl["tizhong"]); ?>" name="tizhong" class="input_text" />kg</td></tr>
                    <tr><td class="tkey">鞋码：</td><td><input type="text" value="<?php echo ($girl["xiema"]); ?>" name="xiema" class="input_text" />码</td></tr>
                    <tr><td class="tkey">胸围：</td><td><input type="text" value="<?php echo ($girl["xiongwei"]); ?>" name="xiongwei" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">腰围：</td><td><input type="text" value="<?php echo ($girl["yaowei"]); ?>" name="yaowei" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">臀围：</td><td><input type="text" value="<?php echo ($girl["tunwei"]); ?>" name="tunwei" class="input_text" />cm</td></tr>

                    <tr>
                        <td class="tkey">照片：</td>
                        <td>
                            <input name="pic" type="file" /><br />
                            <img src="/<?php echo ($girl["pic"]); ?>" style="margin:10px;">
                        </td>
                    </tr>
                    <tr><td class="tkey">简述：</td><td><textarea name="desc" cols="30" rows="10"><?php echo ($girl["desc"]); ?></textarea></tr>

                    <tr>
                        <td class="tkey">
                            <input name="oldpic" type="hidden" value="<?php echo ($girl["pic"]); ?>" />
                            <input name="id" type="hidden" value="<?php echo ($girl["id"]); ?>" />
                        </td>
                        <td><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
    <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>

        <script type="text/javascript">
            $(function(){
                
                
            })

           
        </script>

</html>