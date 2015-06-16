<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>模块添加</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h2>添加模块<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('insert');?>" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td class="tkey"><span class="red">*</span>上级模块：</td>
                        <td>
                            <select name="parentid">
                                <option value="0">请选择</option>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["classid"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr><td class="tkey"><span class="red">*</span>模块名称：</td><td><input type="text" name="title" class="input_text" /></td></tr>

                    <tr><td class="tkey">图片标题：</td><td><input type="file" name="img" /></td></tr>
                    <tr>
                        <td class="tkey"><span class="red">*</span>是否在导航显示：</td>
                        <td>
                            <label><input type="radio" name="isshow" value="1" />&nbsp;是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="isshow" value="0" checked="checked" />&nbsp;否</label>
                            &nbsp;<span class="red">此项只在针对一级模块有效，可以导航管理中进行修改！</span>
                        </td>
                    </tr>
                    <tr><td class="tkey">描述：</td><td><input type="text" name="description" size="60" class="input_text" /></td></tr>
                    <tr><td class="tkey">&nbsp;</td><td><input type="submit" value="确定" class="but_blue" /></td></tr>
                </table>
            </form>
            <p class="hr_10"></p>
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </body>
</html>