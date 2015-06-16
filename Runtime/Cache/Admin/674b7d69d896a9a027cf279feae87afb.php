<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>女神管理</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script>
            function del(id){
                if(confirm('确定要删除记录吗?')){
                    var url="<?php echo C('WEB_URL');?>/Admin/girl/del/id/"+id;
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
            <h2>女神管理<a href="<?php echo U('add');?>" class="but_add">添加</a></h2>
            <table class="list">
                <thead>
                    <tr>
                        <th>id</th><th>姓名</th><th>身高</th><th>体重</th><th>鞋码</th><th>三围</th><th>添加时间</th><th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="list_<?php echo ($vo["id"]); ?>">
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                    
                    <td><?php echo ($vo["shengao"]); ?></td>
                    <td><?php echo ($vo["tizhong"]); ?></td>
                    <td><?php echo ($vo["xiema"]); ?></td>
                    <td><?php echo ($vo["xiongwei"]); ?>cm(胸)  <?php echo ($vo["yaowei"]); ?>cm(腰)  <?php echo ($vo["tunwei"]); ?>cm(臀)  </td>
                    <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?>&nbsp;</td>
                    <td><a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="edit" >编辑</a><span class="del" onClick="del(<?php echo ($vo["id"]); ?>)">删除</span></td>

                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="pages"><?php echo ($page); ?> </div>
        </div>
    </body>
</html>