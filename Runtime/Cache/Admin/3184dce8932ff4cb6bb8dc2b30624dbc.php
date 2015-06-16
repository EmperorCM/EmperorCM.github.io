<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>添加自定义标签</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script>
            function del(id){
                if(confirm('确定要删除记录吗?')){
                    var url="<?php echo U('del');?>/id/"+id;
                    $.getJSON(url,function(data){
                        if(data['status']==1){
                            $(".list > tbody").children("#list_"+data['data']).remove();
                        }else{
                            alert(data['info']);
                        }
                    })
                }
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <h2>添加自定义标签<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('insert');?>" method="post">
                <table class="form" >
                    <tr><td class="tkey">标签描述：</td><td><input type="text" name="title" class="input_text" /></td></tr>
                    <tr><td class="tkey">别名：</td><td><input type="text" name="label_name" class="input_text"  /></td></tr>
                    <tr>
                        <td class="tkey">内容：</td>
                        <td>
                            <textarea id="content1" name="content" cols="50" rows="5" ></textarea>
                        </td>
                    </tr>
                    <tr><td class="tkey"></td><td><input type="submit" value="确定"  class="btn_blue"  /></td></tr>
                </table>
            </form>

        </div>

    </body>
</html>