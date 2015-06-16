<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>模块管理</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script>
            function del(id){
                if(confirm('确定要删除此分类吗?')){
                    var url="<?php echo C('WEB_URL');?>/Admin/Module/del/id/"+id;
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
            <h2>模块管理<a href="<?php echo U('add');?>" class="but_add">添加</a></h2>
            <table class="list">
                <thead>
                    <tr>
                        <th>Id</th><th>模块名称</th><th>文章数</th><th>描述</th><th>添加时间</th><th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($module)): $i = 0; $__LIST__ = $module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="list_<?php echo ($vo["moduleid"]); ?>">
                        <td><?php echo ($vo["moduleid"]); ?></td>

                        <td align="left"><?php if($vo["parentid"] != 0): ?>　|-<?php endif; ?><a href="<?php echo C('WEB_URL');?>Index/pList/mid/<?php echo ($vo["moduleid"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a>&nbsp;</td>
                        <td><a href="<?php echo U('News/index');?>/id/<?php echo ($vo["classid"]); ?>"><?php echo ($vo["c"]); ?></a></td>
                        <td><?php echo ($vo["description"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?>&nbsp;</td>
                        <td><a href="<?php echo U('News/index',array('moduleid'=>$vo['moduleid']));?>" class="look">管理内容</a><a href="<?php echo U('edit',array('moduleid'=>$vo['moduleid']));?>" class="edit">编辑</a><a href="javascript:del(<?php echo ($vo["moduleid"]); ?>)">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <p class="hr_10"></p>
            <div class="pages"><?php echo ($page); ?></div>

        </div>

    </body>
</html>