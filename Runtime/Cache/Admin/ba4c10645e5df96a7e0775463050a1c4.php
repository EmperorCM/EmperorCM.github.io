<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>编辑模块</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <h2>编辑模块<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td class="tkey"><span class="red">*</span>上级模块：</td>
                        <td>
                            <select name="parentid">
                                <option value="0">请选择</option>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["moduleid"]); ?>" <?php if(module.parentid == $vo['moduleid']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr><td class="tkey"><span class="red">*</span>类别名称：</td><td><input type="text" name="title" value="<?php echo ($module["title"]); ?>" class="input_text" /></td></tr>
                    <tr>
                        <td class="tkey">图片描述：</td>
                        <td>
                    <?php if($module["img"] != ''): ?><img src="<?php echo C('WEB_URL');?>Uploads/smallImages/<?php echo ($module["img"]); ?>" alt="<?php echo ($module["title"]); ?>" />
                        <?php else: ?> 
                        <img src="<?php echo C('WEB_URL');?>Public/admin/images/noImg.png" alt="<?php echo ($module["title"]); ?>" /><?php endif; ?>
                    <br /><input type="file" name="img" />
                    </td>
                    </tr>

                    <tr><td class="tkey"></td><td><input type="submit" value="确定" class="but_blue" /></td></tr>
                </table>
                <input type="hidden" name="moduleid" value="<?php echo ($module["moduleid"]); ?>" />
            </form>
            <div class="pages fright"><?php echo ($page); ?></div>
        </div>
    </body>
</html>