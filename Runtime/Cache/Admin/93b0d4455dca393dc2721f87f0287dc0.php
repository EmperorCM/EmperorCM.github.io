<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>导航管理</title>
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
                            $(".list tbody").children("#list_"+data['data']).remove();
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
            <h2>导航管理<a href="<?php echo U('add');?>">添加</a></h2>
            <table class="list">
                <thead>
                    <tr>
                        <th width="60">id</th><th>排序</th><th>名称</th><th>链接地址</th><th>是否显示</th><th>添加时间</th><th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="list_<?php echo ($vo["id"]); ?>">
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["order"]); ?>&nbsp;</td>
                            <td><?php echo ($vo["title"]); ?>&nbsp;</td>
                            <td><?php echo ($vo["url"]); ?>&nbsp;</td>
                            <td><?php if(($vo["status"]) == "1"): ?>显示<?php else: ?>不显示<?php endif; ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?>&nbsp;</td>

                            <td>
                                <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="edit" >编辑</a>
                                <span class="del" onClick="del(<?php echo ($vo["id"]); ?>)">删除</span>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <p class="hr_10"></p>
            <div class="pages"><?php echo ($page); ?> </div>
        </div>

    </body>
</html>