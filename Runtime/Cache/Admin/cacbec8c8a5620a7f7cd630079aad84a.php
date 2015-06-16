<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>网站设置</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
    </head>
    <body>
        <div id="wrapper">

            <h2>网站设置</h2>
            <form method="post" action="<?php echo U('update',array('type'=>web));?>">
                <table class="form" >
                    <tr><td class="tkey">网站地址：</td><td><input type="text" name="siteurl" size="60" value="<?php echo ($set["siteurl"]); ?>" class="input_text" /></td></tr>
                    <tr><td class="tkey">网站名称：</td><td><input type="text" name="sitename" size="60" value="<?php echo ($set["sitename"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey">ICP备案号：</td><td><input type="text" name="siteicp" size="30" value="<?php echo ($set["siteicp"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey">网站关键字：</td><td><input type="text" name="sitekeyword" size="60" value="<?php echo ($set["sitekeyword"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey">网站描述：</td><td><input type="text" name="sitedescription" size="60" value="<?php echo ($set["sitedescription"]); ?>" class="input_text"/></td></tr>
                    <!--<tr><td class="tkey">网站logo：</td><td><input type="file" name="sitelogo" /></td></tr>-->
                    <tr><td class="tkey">网站版权：</td><td><input type="text" name="siteright" value="<?php echo ($set["siteright"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey"></td><td><input type="submit" value="确定"  class="but_blue"/></td></tr>
                </table>
            </form>

        </div>

    </body>
</html>