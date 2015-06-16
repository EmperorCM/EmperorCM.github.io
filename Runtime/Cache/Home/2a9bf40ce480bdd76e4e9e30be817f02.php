<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>模卡总览 - <?php echo Site('sitename');?></title>
    <meta name="keywords" content="<?php echo Site('sitekeyword');?>" />
    <meta name="description" content="<?php echo Site('sitedescription');?>" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
	<link href="<?php echo C('WEB_URL');?>Public/ruili/css/base.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo C('WEB_URL');?>Public/ruili/css/news.css" rel="stylesheet" type="text/css" />
</head>
<body>
     <div class="header">
        <div class="header-nav clearfix">
            <ul class="nav-list clearfix">
                <li class="index">
                    <a href="/" class="logo"></a>
                </li>
                <li>
                    <a href="/news">新闻资讯</a>
                    <ul class="sub-list clearfix">
                        <li>
                            <a href="/news/m_1">资讯列表</a>
                        </li>
                        <li>
                            <a href="/news/m_2">最新动态</a>
                        </li>
                        <li>
                            <a href="/news/m_3">活动公告</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/model">模卡推荐</a>
                    <ul class="sub-list clearfix">
                        <li>
                            <a href="/mList_1.html">模卡排行</a>
                        </li>
                        <li>
                            <a href="/model">模卡总览</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/shoot">造型摄影</a>
                    <ul class="sub-list clearfix">
                        <li>
                            <a href="/shoot">推荐团队</a>
                        </li>
                        <li>
                            <a href="#">强大团队</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">排行榜</a>
                    <ul class="sub-list clearfix">
                        <li>
                            <a href="#">女生排行榜</a>
                        </li>
                        <li>
                            <a href="#">人气排行榜</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">星座运势</a>
                </li>
                <li>
                    <a href="<?php echo C('WEB_URL');?>girl">女神联盟</a>
                </li>
                <li>
                    <a href="/p_419">国王</a>
                </li>
                <li class="chinajoy">
                    <a href="/p_451">2015 Chinajoy<br />报名入口</a>
                </li>
            </ul>
            <div class="login-reg">
                <?php if(empty($_SESSION['user'])): ?><a href="javascript:void(0)" class="link" data-type="login">登录</a>
                    <a href="javascript:void(0)" class="link" data-type="reg">免费注册</a>
                <?php else: ?>
                    您好：<?php echo ($_SESSION['user']['username']); ?> <a href="/Index/logout">退出</a><?php endif; ?>
            </div>
            <style>
                .header-nav .nav-list{border-right:0px;}
                .nav-list > li.chinajoy{background:url("/Public/ruili/images/chinajoy.png") no-repeat;width:92px;height:57px;line-height: 20px;border-right:0px;position: absolute;
right: -92px;}
                .nav-list > li.chinajoy a{width:90px;color:#fff;}
            </style>
        </div>
    </div>


    <div class="rl-crumb">
       <a href="/">首页</a> &gt; <span>模卡总览</span>
    </div>
    <div class="container">
        <div class="page-content clearfix">
            <div class="rec-banner">
                <ul class="bnr-list clearfix">
                    <li>
                        <a href="#"><img src="<?php echo C('WEB_URL');?>Public/ruili/images/banner1.jpg" alt="" /></a>
                    </li>
                    <li class="hide">
                        <a href="#"><img src="<?php echo C('WEB_URL');?>Public/ruili/images/banner2.jpg" alt="" /></a>
                    </li>
                    
                </ul>
                <div class="tit-btn clearfix">
                    <ul class="btn clearfix">
                        <li class="current"></li>
                        <li></li>
                    </ul>
                </div>

            </div>
            <div class="asider-con">
                <div class="module-link mb20">
                    <?php echo getLabel('cardNav');?>
                </div>
                <div class="hot-event">
                    <div class="title">热门事件</div>
                    <div class="type-list">
                        <?php echo getLabel('hotAct');?>
                    </div>
                    <div class="act-list">
                        <?php echo getLabel('actList');?>
                    </div>
                </div>
            </div>
        </div>
        <div class="rec-page">
            <div class="rec-title clearfix">
                <h2>模卡总览</h2>
                <a href="/mList_1.html" class="more">模卡精选</a>
            </div>
            <div class="rec-content">
                <ul class="rec-list clearfix">
                     <?php if(is_array($model)): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="/mList_<?php echo ($vo["id"]); ?>.html">
                                <img src="/<?php echo ($vo['conve2']); ?>" alt="" />
                                <span><?php echo ($vo["title"]); ?></span>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
       
    </div>
    

    <script src="<?php echo C('WEB_URL');?>Public/ruili/js/jquery.1.72.js" type="text/javascript"></script>
    <script>
        $(".nav-list").children("li").eq(2).addClass("current").siblings("li").removeClass("current");
    </script>
    <a href="#header" class="top hide">回到顶部</a>

<div class="footer">
    <div class="footer-content clearfix">
        <?php echo getLabel('footer');?>
    </div>
    <p>© 2014 ruili.com 版权所有。沪ICP备10038086号-1</p>
</div>
<script>
    var historyUrl=window.location.href.match(/.com(\/([a-z])*)/)[1];

    $(".nav-list").children("li").children("a").each(function(){
        if($(this).attr("href").indexOf(historyUrl)>-1){
            $(this).parent("li").addClass("current");
        }
    })
</script>

<div class="dialog" id="loginReg">
    <div class="dialog-mask"></div>
    <div id="flipper">
        <div class="dialog-content" id="login">
            <a href="javascript:void(0)" class="close">×</a>
            <div class="dialog-tit clearfix">
                <img src="<?php echo C('WEB_URL');?>Public/ruili/images/logo.jpg" />
                <p><span>使用邮箱/手机号登陆</span></p>
            </div>
            <form action="" id="formLogin">
                
                <ul>
                    <li style="padding:5px;">
                        <em class="msgTip"></em>
                    </li>
                    <li>
                        <input type="text" name="username" placeholder="邮箱或手机" class="label-ipt">
                    </li>
                    <li>
                        <input type="password" name="pwd" placeholder="密码"  class="label-ipt">
                    </li>
                    <li>
                        <input type="button" value="立即登录" class="btnOrange" id="J_submitLogin">
                    </li>
                    <li>
                        <span class="reg-link">还没有成为瑞丽会员？<a href="javascript:void(0)" id="J_toReg">点击注册》</a></span>
                    </li>
                </ul>
            </form>
        </div>
        <div class="dialog-content" id="reg">
            <a href="javascript:void(0)" class="close">×</a>
            <div class="dialog-tit clearfix">
                <img src="<?php echo C('WEB_URL');?>Public/ruili/images/logo.jpg" />
                <p><span>使用邮箱/手机号注册</span></p>
            </div>
            <form action="" id="formReg">
                <ul>
                    <li style="padding:5px;">
                        <em class="msgTip"></em>
                    </li>
                    <li>
                        <input type="text" name="username" placeholder="邮箱或手机" class="label-ipt">
                    </li>
                    <li>
                        <input type="password" name="pwd" placeholder="密码" id="J_pwd"  class="label-ipt">
                    </li>
                    <li>
                        <input type="password" name="conpwd" placeholder="确认密码" class="label-ipt">
                    </li>
                    <li>
                        <input type="button" value="立即注册" class="btnOrange" id="J_submitReg">
                    </li>
                    <li>
                        <span class="reg-link">已有帐号？<a href="javascript:void(0)" id="J_toLogin">立即登录</a></span>
                    </li>
                </ul>
            </form>
        </div>

        <div class="dialog-content hide" id="regSuccess">
            <div class="dialog-tit clearfix">
                <img src="<?php echo C('WEB_URL');?>Public/ruili/images/logo.jpg" />
                <p><span>注册成功</span></p>
            </div>
            <p class="mt20 pt20">
                <a href="javascript:void(0)" class="btnGreen" onclick="window.history.go(0)">确定</a>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript" src="/Public/ruili/js/formValidate.js"></script>
<script>
    (function(){
        $("#J_toReg").on("click",function(){
            //$("#flipper").addClass("flip");
            $("#reg").show();
            $("#login").hide();
        })
        $("#J_toLogin").on("click",function(){
            //$("#flipper").removeClass("flip");
            $("#login").show();
            $("#reg").hide();
        })

        var loginVal=new FormValidate(
                {
                    "username":{ "reg":/(([\w._-])+@([\w_-])+((\.[\w_-]{2,6}){1,2})$)|(^(13|15|17|18|14)[0-9]{9}$)|(^\d{5,10}$)/,"error":"请输入正确的手机或邮箱"},
                    "pwd":{"reg":"pwd","error":"密码格式错误，请重试！"},
                },"#formLogin",this.callBack,true);

        loginVal.msg=function(obj, status, msg){
            msg=!status?msg:"";
            $("#login .msgTip").html(msg);

        }
        loginVal.callBack=function(data){
            var url="<?php echo U('login');?>";
            $.ajax({
                url:url,
                type:"post",
                dataTpye:"json",
                data:data,
                success:function(reg){
                    if(reg.status==1){
                        window.history.go(0);
                    }else{
                        $("#login .msgTip").html(reg.info);
                    }
                }
            })
        }

        var regVal=new FormValidate(
                {
                    "username":{ "reg":/(([\w._-])+@([\w_-])+((\.[\w_-]{2,6}){1,2})$)|(^(13|15|18|14)[0-9]{9}$)/,"error":"请输入正确的手机或邮箱"},
                    "pwd":{"reg":"pwd","error":"密码格式错误，请重试！"},
                    "conpwd":{"reg":"conPwd","pwdDom":"#J_pwd","error":"两次输入密码不一致！"},
                },"#formReg",this.callBack,true);

        regVal.msg=function(obj, status, msg){
            msg=!status?msg:"";
            $("#reg .msgTip").html(msg);

        }
        regVal.callBack=function(data){
            var url="<?php echo U('reg');?>";
            $.ajax({
                url:url,
                type:"post",
                dataTpye:"json",
                data:data,
                success:function(reg){
                    
                    if(reg.status==1){
                        $("#reg").hide();
                        $("#regSuccess").show();
                    }else{
                        $("#reg .msgTip").html(reg.info);
                    }
                }
            })
        }


        $("#J_submitLogin").on("click",function(){
            $("#formLogin").submit();
        })

        $("#J_submitReg").on("click",function(){
            $("#formReg").submit();
        })

        $("#loginReg").find(".close").on("click",function(){
            $("#loginReg").hide();
        })

        $(".login-reg").find("a").on("click",function(){
            var type=$(this).attr("data-type");
            
            if(type=="login"){
                $("#loginReg").show();
                $("#login").show().siblings("div").hide();
            }else if(type=="reg"){
                $("#loginReg").show();
                $("#reg").show().siblings("div").hide();
            }
        })

    })()
</script>

    <script>
    $("div.rec-banner").find("ul.btn > li").on("click",function(){
        var index=$(this).index();
        $("div.rec-banner").find(".bnr-list > li").eq(index).fadeIn().siblings("li").fadeOut();
        $(this).addClass("current").siblings("li").removeClass("current");
    })
    </script>
    
</body>
</html>