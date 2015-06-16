<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>添加友情链接</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
    </head>
    <body>
        <div id="wrapper">

            <h2>添加友情链接<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('insert');?>" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td class="tkey">标题：</td>
                        <td><input type="type" value="" name="title" class="input_text" /></td>
                    </tr>
                    <tr><td class="tkey">链接地址：</td><td><input type="text" name="url" class="input_text" /></td></tr>

                    <tr>
                        <td class="tkey">上传图片：</td>
                        <td><input type="file" name="logo" /></td>
                    </tr>
                    <tr>
                        <td class="tkey"><input type="hidden" name="option" value="add" class="input_text" /></td>
                        <td><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>