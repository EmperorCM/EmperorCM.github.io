<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>编辑自定义标签</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <h2>编辑自定义标签<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post">
                <table class="form" >
                    <tr><td class="tkey">标签描述：</td><td><input type="text" name="title" value="<?php echo ($label["title"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey">别名：</td><td><input type="text" name="label_name" value="<?php echo ($label["label_name"]); ?>" class="input_text" /></td></tr>
                    <tr>
                        <td class="tkey">内容：</td>
                        <td>
                            <textarea id="content1" name="content" cols="50" rows="5"><?php echo ($label["content"]); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="tkey"><input type="hidden" name="id" value="<?php echo ($label["id"]); ?>" /></td>
                        <td><input type="submit" value="确定" class="btn_blue" /></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>