<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>扩展设置</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/drag.js"></script>

    </head>
    <body>
        <div id="wrapper">
            <h2>扩展信息</h2>
            <form method="post" action="<?php echo U('update');?>/type/contact">
                <table class="form">
                    <tr><td class="tkey">联系地址：</td><td><input type="text" name="address" value="<?php echo ($contact['address']); ?>" size="60" class="input_text" /></td></tr>
                    <tr><td class="tkey">联系电话：</td><td><input type="text" name="tel" value="<?php echo ($contact['tel']); ?>" class="input_text"  /></td></tr>
                    <tr><td class="tkey">传真：</td><td><input type="text" name="fax" value="<?php echo ($contact['fax']); ?>" class="input_text"  /></td></tr>
                    <tr><td class="tkey">email：</td><td><input type="text" name="email" value="<?php echo ($contact['email']); ?>" class="input_text"  /></td></tr>
                    <tr><td class="tkey">邮政编码：</td><td><input type="text" name="postcode" value="<?php echo ($contact['postcode']); ?>" class="input_text" /></td></tr>
                    <tr><td class="tkey">QQ：</td><td><input type="text" name="qq" value="<?php echo ($contact['qq']); ?>" class="input_text"  /></td></tr>
                    <tr><td class="tkey"></td><td><input type="submit" value="确定" class="but_blue"  /></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>