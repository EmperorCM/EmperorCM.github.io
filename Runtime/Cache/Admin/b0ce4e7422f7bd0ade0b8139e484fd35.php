<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>添加模卡</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        <div id="wrapper">
            <h2>添加模卡<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('insert');?>" method="post" enctype="multipart/form-data" id="myform">
                <table class="form" >

                    <tr><td class="tkey">姓名：</td><td><input type="text" name="name" class="input_text" /></td></tr>
                    <tr><td class="tkey">身高：</td><td><input type="text" name="shengao" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">体重：</td><td><input type="text" name="tizhong" class="input_text" />kg</td></tr>
                    <tr><td class="tkey">鞋码：</td><td><input type="text" name="xiema" class="input_text" />码</td></tr>
                    <tr><td class="tkey">胸围：</td><td><input type="text" name="xiongwei" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">腰围：</td><td><input type="text" name="yaowei" class="input_text" />cm</td></tr>
                    <tr><td class="tkey">臀围：</td><td><input type="text" name="tunwei" class="input_text" />cm</td></tr>

                    <tr>
                        <td class="tkey">照片：</td>
                        <td>
                            <input name="pic" type="file" />

                        </td>
                    </tr>
                    <tr><td class="tkey">简述：</td><td><textarea name="desc" cols="30" rows="10"></textarea></tr>

                    <tr>
                        <td class="tkey"></td>
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