<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>内容编辑</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script type="text/javascript" charset="utf-8" src="<?php echo C('WEB_URL');?>Public/kindeditor/kindeditor.js"></script>
        <script type="text/javascript">
            KE.show({
                id : 'content1',
                items : [
                    'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            });
            $(function(){
                $("#sidebar > ul > li > a").eq(4).addClass('selected');
                


            })
        </script>
    </head>
    <body>
        <div id="wrapper">
            <h2>文章编辑<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post" enctype="multipart/form-data" id="myform">
                <table class="form">
                    <tr>
                        <td class="tkey"><span class="red">*</span>&nbsp;所属分类：</td>
                        <td>
                            <select name="classid">
                                <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["classid"]); ?>" name="classid" <?php if(($vo["classid"]) == $news["classid"]): ?>selected="selected"<?php endif; ?>>
                                    <?php if($vo["parentid"] != 0): ?>&nbsp;&nbsp;&nbsp;&nbsp;|-<?php endif; echo ($vo["title"]); ?>
                                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="tkey w160"><span class="red">*</span>&nbsp;所属模块：</td>
                        <td>
                            <select name="moduleid">
                                <?php if(is_array($module)): $i = 0; $__LIST__ = $module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["moduleid"]); ?>" name="moduleid" <?php if(($vo["moduleid"]) == $news["moduleid"]): ?>selected="selected"<?php endif; ?>>
                                    <?php if($vo["parentid"] != 0): ?>&nbsp;&nbsp;&nbsp;&nbsp;|-<?php endif; echo ($vo["title"]); ?>
                                    </option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr><td class="tkey"><span class="red">*</span>&nbsp;标题：</td><td><input type="text" name="title" value="<?php echo ($news["title"]); ?>" size="60" class="input_text" /></td></tr>
                    <tr>
                        <td class="tkey"><span class="red">*</span>&nbsp;内容：</td>
                        <td><textarea id="content1" name="content" style="width:600px;height:300px;visibility:hidden;"><?php echo ($news["content"]); ?></textarea></td>
                    </tr>

                    <tr>
                        <td class="tkey">&nbsp;<input type="hidden" name="option" value="save" /></td>
                        <td><input type="hidden" name="id" value="<?php echo ($news["id"]); ?>" /><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>