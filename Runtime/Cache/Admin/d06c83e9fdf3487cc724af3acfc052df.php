<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>编辑导航栏</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>


    </head>
    <body>
        <div id="wrapper">
            <h2>编辑导航栏<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post">
                <table class="form">
                    <tr><td class="tkey" width="150px">导航名称：</td><td><input type="text" name="title" value="<?php echo ($nav["title"]); ?>" class="input_text"/></td></tr>
                    <tr><td class="tkey">排序：</td><td><input type="text" name="order" value="<?php echo ($nav["order"]); ?>" size="2" class="input_text" /></td></tr>
                    <tr>
                        <td class="tkey"><span class="red">*</span>是否在导航显示：</td>
                        <td>
                            <label><input type="radio" name="status" value="1" <?php if(($nav["status"]) == "1"): ?>checked="checked"<?php endif; ?>/>&nbsp;是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="status" value="0" <?php if(($nav["status"]) == "0"): ?>checked="checked"<?php endif; ?>/>&nbsp;否</label>

                        </td>
                    </tr>
                    <tr>
                        <td class="tkey">链接地址：</td>
                        <td><input type="text" name="url" value="<?php echo ($nav["url"]); ?>" class="input_text" />&nbsp;<span class="red">请慎重修改此项！</span></td>
                    </tr>
                    <tr>
                        <td class="tkey"><input type="hidden" name="id" value="<?php echo ($nav["id"]); ?>" /></td>
                        <td><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>