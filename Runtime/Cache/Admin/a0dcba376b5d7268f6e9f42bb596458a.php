<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>用户管理</title>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/drag.js"></script>
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" />
        <link rel="stylesheet"  href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" />
        
        <script type="text/javascript">
            $(function(){
                $("#add > h4").drag("#add", {
                    lockedR : false,
                    lockedX : false,
                    lockedY : false
                });        
            })
            function del(id){
                if(confirm('确定要删除记录吗?')){
                    var url="<?php echo C('WEB_URL');?>Admin/Admin/del/id/"+id;
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
            <div id="content">
                <div id="main">
                    <h2>用户管理<a href="javascript:myshow('#add')">添加</a></h2>
                    <table width="100%" cellspacing="0" class="list">
                        <thead>
                            <tr>
                                <th width="60">id</th><th>用户名</th><th>登录次数</th><th>最后登录时间</th><th>Email</th><th>生成日期</th><th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" id="list_<?php echo ($vo["id"]); ?>">
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td><?php echo ($vo["username"]); ?></td>
                                    <td><?php echo ($vo["login_count"]); ?></td>
                                    <td><?php echo (date('Y-m-d H:i:s',$vo["login_time"])); ?></td>
                                    <td><?php echo ($vo["email"]); ?>&nbsp;</td>
                                    <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td>
                                    <td><a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="edit" >编辑</a><span class="del" onClick="del(<?php echo ($vo["id"]); ?>)">删除</span></td>

                                    
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <p class="hr_10"></p>
                    <div class="pages"><?php echo ($page); ?> </div>
                    <div id="add" class="windows hide">
                        <h4><a href="javascript:close('#add')">关闭</a>添加用户</h4>
                        <form action="<?php echo U('insert');?>" method="POST">
                            <table class="form" cellspacing="0" style="border:0px;">
                                <tr><td class="tkey w80">用户名：</td><td><input type="text" name="username" class="input_text" /></td></tr>
                                <tr><td class="tkey">密码：</td><td><input type="password" name="password" class="input_text" /></td></tr>
                                <tr><td class="tkey">确认密码：</td><td><input type="password" name="repassword" class="input_text" /></td></tr>
                                <tr><td class="tkey">Email：</td><td><input type="text" name="email" class="input_text" /></td></tr>
                                <tr><td class="tkey">备注：</td><td><input type="text" name="content" class="input_text" /></td></tr>
                                <tr><td class="tkey"></td><td><input type="submit" class="but_blue" value="确 认"/></td></tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>