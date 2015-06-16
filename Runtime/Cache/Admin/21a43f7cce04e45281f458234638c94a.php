<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台管理</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
        <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/drag.js"></script>
        <script type="text/javascript">
            $(function(){
                //设置容器高度
                if((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
                    $("#sidebar").height(window.screen.availHeight-window.screenTop);
                    $("#iframe_home").height($("#sidebar").height()-$("#header").height()-$("#footer").height()-20);
                }else if (navigator.userAgent.indexOf('Firefox') >= 0){
                    $("#sidebar").height(window.innerHeight);
                    $("#iframe_home").height($("#sidebar").height()-$("#header").height()-$("#footer").height()-20);
                }else if (navigator.userAgent.indexOf('Opera') >= 0){
                    $("#sidebar").height(window.innerHeight);
                    $("#iframe_home").height($("#sidebar").height()-$("#header").height()-$("#footer").height()-20);
                }else{
                    $("#sidebar").height(window.innerHeight);
                    $("#iframe_home").height($("#sidebar").height()-$("#header").height()-$("#footer").height()-20);
                }

                $("#edit_pwd > h4").drag("#edit_pwd", {
                    lockedR : false,
                    lockedX : false,
                    lockedY : false
                });
                
                $("#nav > li > a").click(function(){
                    $(this).parent("li").addClass("current").append("<b class='arrow'></b>").siblings("li").removeClass("current").find("b").remove(".arrow");
                    $("#iframe_home").attr("src",$(this).attr("href"));
                    return false;
                });
                $("#nav > li > ol > li > a").click(function(){
                    $(this).closest("#nav > li").addClass("current").append("<b class='arrow'></b>").siblings("li").removeClass("current").find("b").remove(".arrow");
                    $("#iframe_home").attr("src",$(this).attr("href"));
                    return false;                   
                })
                
                $("#nav > li > b.hover").toggle(
                    function(){
                        $(this).siblings("ol").show();
                    },
                    function(){
                        $(this).siblings("ol").hide();
                    }
                )
            })

            function pwd(){
                var str=$("#password").val();
                rel=/^[a-zA-Z0-9\u4e00-\u9fa5]{5,20}$/;

                if(!rel.test(str)){
                    alert("密码格式错误！");
                    return false;
                }else if(str!=$("#npassword").val()){
                    alert("确认密码错误！");
                    return false;
                }else{
                    $("#myform").submit();
                }
            }

        </script>
    </head>
    <body>
        <table width="100%" cellspacing="0">
            <tr>
                <td width="160px" valign="top">
                    <div id="sidebar">
                        <ul id="nav">
                            <li class="current menu"><a href="<?php echo U('Index/main');?>" class=""><b class="index"></b>首页</a><b class="arrow"></b></li>
                            <li class="line"></li>
                            <li class="menu"><a href="<?php echo U('Admin/index');?>"><b class="user"></b>用户管理</a></li>
                            <li class="menu">
                                <a href="<?php echo U('Nav/index');?>"><b class="nav"></b>导航管理</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('Nav/index');?>">全部导航</a></li>
                                    <li><a href="<?php echo U('Nav/add');?>">添加导航</a></li>
                                </ol>
                            </li>
                            <li class="menu">
                                <a href="<?php echo U('Model/index');?>"><b class="c"></b>模卡管理</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('Model/index');?>">全部模卡</a></li>
                                    <li><a href="<?php echo U('Model/add');?>">添加模卡</a></li>
                                </ol>
                            </li>

                            <li class="menu">
                                <a href="<?php echo U('News/index');?>"><b class="article"></b>文章管理</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('News/index');?>">全部文章</a></li>
                                    <li><a href="<?php echo U('Class/index');?>">分类管理</a></li>
                                    <li><a href="<?php echo U('Module/index');?>">模块管理</a></li>
                                </ol>
                            </li>
                            <li class="menu">
                                <a href="<?php echo U('girl/index');?>"><b class="page"></b>女神联盟</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('girl/index');?>">所有女神</a></li>
                                    <li><a href="<?php echo U('girl/add');?>">添加女神</a></li>
                                </ol>
                            </li>
                            <li class="line"></li>
                            <li class="menu hide"><a href="<?php echo U('Comment/index');?>"><b class="comment"></b>评论管理</a></li>
                            <li class="menu">
                                <a href="<?php echo U('Label/index');?>"><b class="custom"></b>自定义标签</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('Label/index');?>">全部自定义标签</a></li>
                                    <li><a href="<?php echo U('Label/add');?>">添加自定义标签</a></li>
                                </ol>
                            </li>
                            <li class="menu">
                                <a href="<?php echo U('Links/index');?>"><b class="link"></b>友情链接</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('Links/index');?>">全部友情链接</a></li>
                                    <li><a href="<?php echo U('Links/add');?>">添加友情链接</a></li>
                                </ol>
                            </li>
                            <li class="menu">
                                <a href="<?php echo U('Options/webSet');?>"><b class="options"></b>网站设置</a><b class="hover"></b>
                                <ol>
                                    <li><a href="<?php echo U('Options/webSet');?>">基本设置</a></li>
                                    <li><a href="<?php echo U('Options/developSet');?>">扩展信息</a></li>
                                </ol>
                            </li>

                        </ul>
                    </div>
                </td>
                <td valign="top">
                    <div id="header">
                        <p class="fright">
                            欢迎您：<?php echo ($_SESSION['username']); ?>&nbsp;&nbsp;
                            <a href="javascript:myshow('#edit_pwd')" >修改密码</a>&nbsp;&nbsp;|
                            <a href="<?php echo U('Index/logout');?>">退出管理</a>
                        </p>
                        <p class="sitename">
                            <img src="<?php echo C('WEB_URL');?>/favicon.ico" width="20px" height="20px" id="favicon"/>
                            <a href="<?php echo C('WEB_URL');?>" target="_blank"><?php echo Site('sitename');?></a>
                        </p>

                    </div>
                    <div id="desktop" style="height:100%;">
                        <iframe width="100%" frameborder="no" scrolling="auto" style="border:none;" src="<?php echo U('main');?>" id="iframe_home"></iframe>
                        <!--<div id="footer">
    版权(C)2009-2010  <a href="http://www.nbyum.com/">nbyum.com版权所有. </a>
</div>-->
                    </div>
                </td>
            </tr>
        </table>
        <div id="edit_pwd" class="windows hide">
            <h4><a href="javascript:close('#edit_pwd')">关闭</a>修改密码</h4>
            <div>
                <form action="<?php echo U('updatePwd');?>" method="post" id="myform">
                    <table class="form" cellspacing="0" style="border:0px;">
                        <tr>
                            <td class="tkey w80">原密码：</td>
                            <td><input type="password" name="opassword" id="opassword" class="input_text" /></td>
                        </tr>
                        <tr>
                            <td class="tkey">新密码：</td>
                            <td><input type="password" name="password" id="password" class="input_text" /></td>
                        </tr>
                        <tr>
                            <td class="tkey">确定新密码：</td>
                            <td><input type="password" name="npassword" id="npassword" class="input_text" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button" onclick="pwd()" class="but_gray">确&nbsp;&nbsp;定</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>