<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>类别管理</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script>
            $(function(){
                
            })
            function del(id){
                if(confirm('确定要删除此分类吗?')){
                    var url="<?php echo C('WEB_URL');?>/Admin/Class/del/id/"+id;
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
            <h2>类别管理<a href="<?php echo U('add');?>" class="but_add">添加</a></h2>
            <table class="list">
                <thead>
                    <tr>
                        <th width="60">Id</th><th>类别名称</th><th>文章数</th><th>描述</th><th>添加时间</th><th width="150">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($class)): $i = 0; $__LIST__ = $class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="list_<?php echo ($vo["classid"]); ?>">
                        <td><?php echo ($vo["classid"]); ?></td>
                        <td align="left"><?php if($vo["parentid"] != 0): ?>　|-<?php endif; ?><a href="<?php echo C('WEB_URL');?>Index/pList/cid/<?php echo ($vo["classid"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
                        <td><a href="<?php echo U('News/index');?>/id/<?php echo ($vo["classid"]); ?>"><?php echo ($vo["c"]); ?></a></td>
                        <td><?php echo ($vo["description"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?>&nbsp;</td>
                        <td><a href="<?php echo U('edit',array('classid'=>$vo['classid']));?>" class="edit">编辑</a><a href="javascript:del(<?php echo ($vo["classid"]); ?>)">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <p class="hr_10"></p>
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </body>
</html>