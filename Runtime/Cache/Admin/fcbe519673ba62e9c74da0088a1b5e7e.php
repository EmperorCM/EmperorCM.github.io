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
        <script>
            $(function(){
                
            })
        </script>

    </head>
    <body>
        <div id="wrapper">
            <h2>添加导航项<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('insert');?>" method="post">
                <table class="form">
                    <tr><td class="tkey" width="150px">导航名称：</td><td><input type="text" name="title"  class="input_text"/></td></tr>
                    <tr><td class="tkey">排序：</td><td><input type="text" name="order" size="2" class="input_text" /></td></tr>
                    <tr>
                        <td class="tkey"><span class="red">*</span>是否在导航显示：</td>
                        <td>
                            <label><input type="radio" name="status" value="1" checked="checked" />&nbsp;是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="status" value="0" />&nbsp;否</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="tkey">链接地址：</td>
                        <td><input type="text" id="url" name="url" class="input_text" />&nbsp;<span class="red"></span></td>
                    </tr>
                    <tr>
                        <td class="tkey"><input type="hidden" id="type" name="type" value="3" /></td>
                        <td><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>