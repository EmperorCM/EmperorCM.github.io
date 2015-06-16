<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo Site('sitekeyword');?>" />
        <meta name="description" content="<?php echo Site('sitedescription');?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <title>关于我们-<?php echo Site('sitename');?></title>
        <link href="<?php echo C('WEB_URL');?>Public/ruili/css/base.css" rel="stylesheet" type="text/css" />
        <style>
            body{ background: #f1f2f4;}
            .wrap{ width: 1170px; margin: 50px auto; padding: 15px; background: #fff; border: 1px solid #d6d6d6; position: relative;}
            .detailBox{ position: absolute; left: 650px; top: 15px;}
            .detailBox li{ margin: 30px 0 50px 0; padding-left: 35px; position: relative;}
            .detailBox p{ color: #737373; font-size: 14px; width: 305px;}
            .icons{ position: absolute; display: block; width: 27px; height: 27px; left: 0px; _left: -35px; top: -3px; background: url(/Public/ruili/images/images/icons.jpg) left top no-repeat;}
            .icons2{ display: block; width: 40px; height: 37px; background: url(/Public/ruili/images/images/icons.jpg) left top no-repeat; margin: 0 auto;}
            .icon2{ background-position: -27px 0;}
            .icon3{ background-position: -54px 0;}
            .icon4{ background-position: 0 -27px;}
            .icon5{ background-position: -39px -27px;}
            .icon6{ background-position: -79px -27px;}
            .share{ position: relative; height: 131px;}
            .share div{ width: 60px; position: absolute;}
            .share1{ left: 0; bottom: 0;}
            .share2{ left: 80px; bottom: 0;}
            .share3{ left: 160px; bottom: 0;}
            .share img{ margin-left: 240px;}
            .bottom{ width: 1000px; margin: 30px auto 20px auto; overflow: hidden; font-size: 12px; color: #717171;}
            .bottomBox{ float: left; width: 190px; margin-left: 59px; _margin-left: 39px;}
            .bottom .heading{ font-weight: bold; color: #2e2e2e; font-size: 14px; margin-bottom: 10px;}
            .border{ float: left; height: 80px; border-right: 1px solid #e1e1e1; margin-top: 20px;}

            .logo{ margin-left: 10px; margin-bottom: 20px;}
            .logo p{ margin-top: 5px; color: #909090;}
            </style>
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

    <div class="wrap">
        <img src="/Public/ruili/images/map.jpg">
        <div class="detailBox">
            <ul>
                <li>
                    <i class="icons icon1"></i>
                    <p>公司地址：上海市虹口区东江湾路188号空间创意园区F1、F2、F7洋房3号线虹口足球场2号口.</p>
                </li>
                <li>
                    <i class="icons icon2"></i>
                    <p>前台电话：021-63598022</p>
                </li>
                <li>
                    <i class="icons icon3"></i>
                    <p>官方邮箱：512147451@qq.com</p>
                </li>
                <li class="share">
                    <div class="share1">
                        <i class="icons2 icon4"></i>
                        <p>微博转发</p>
                    </div>
                    <div class="share2">
                        <i class="icons2 icon5"></i>
                        <p>联系客服</p>
                    </div>
                    <div class="share3">
                        <i class="icons2 icon6"></i>
                        <p>订阅我们</p>
                    </div>
                    <img src="<?php echo C('WEB_URL');?>Public/ruili/images//erweima.jpg">
                </li>
            </ul>
        </div>
        <div class="bottom">
            <div class="bottomBox">
                <div class="heading">产品合作</div>
                <ul>
                    <li>Mail:</li>
                    <li>QQ:</li>
                    <li>TEL:</li>
                </ul>
            </div>
            <div class="border"></div>
            <div class="bottomBox">
                <div class="heading">在线营销</div>
                <ul>
                    <li>Mail:</li>
                    <li>QQ:</li>
                    <li>TEL:</li>
                </ul>
            </div>
            <div class="border"></div>
            <div class="bottomBox">
                <div class="heading">招聘管理</div>
                <ul>
                    <li>Mail:</li>
                    <li>QQ:</li>
                </ul>
            </div>
            <div class="border"></div>
            <div class="bottomBox">
                <div class="heading">微博业务</div>
                <ul>
                    <li>Mail:</li>
                    <li>QQ:</li>
                    <li>Weibo:</li>
                    <li>TEL:</li>
                </ul>
            </div>
        </div>
        <div class="logo">
            <img src="<?php echo C('WEB_URL');?>Public/ruili/images/logo2.jpg">
            <p>(安琪莉娜·瑞丽集团 - 中国知名艺人经纪、在线营销文化传播有限公司)</p>
        </div>
    </div>

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

</body>
</html>