<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>造型摄影 - <?php echo Site('sitename');?></title>
	<meta name="keywords" content="<?php echo Site('sitekeyword');?>" />
    <meta name="description" content="<?php echo Site('sitedescription');?>" />
	<link href="<?php echo C('WEB_URL');?>Public/ruili/css/base.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo C('WEB_URL');?>Public/ruili/css/master.css">
	<style>
	body{overflow:auto;background:#fff;}
	body.over{overflow:hidden;}
	.banner{ width: 100%; min-width: 1200px; text-align: center; background: #6b949a;}
	.tt{background:url(Public/ruili/images/temp001.jpg) center top;height:958px;margin-top: -40px;}
	.wrap{ width: 1200px; _width: 1201px; margin: 50px auto; overflow: hidden;}
	.box{ float: left; width: 238px; height: 238px; margin: 1px; position: relative;}
	.box .hobbyL{ position: absolute; left: 10px; width: 90px; padding-top: 35px; background: url(Public/ruili/images/hobby.jpg) left top no-repeat; text-align: left; cursor: pointer;}
	.box .hobbyR{ position: absolute; right: 10px; width: 90px; padding-top: 35px; background: url(Public/ruili/images/hobby.jpg) right top no-repeat; text-align: right; cursor: pointer;}
	.box .heading{ border-top: 1px solid #d8d8d8; font-size: 16px; margin-top: 3px;}
	.box .heading:hover{color:#ff3e87;}
	.box img:hover{filter:alpha(opacity=90);opacity:0.9;}
	.h1{ top: 23px;}
	.h2{ bottom: 32px;}
	.h3{ top: 17px;}
	.h4{ bottom: 39px;}
	#picBox{ position:fixed;width:100%;height:100%;background:rgba(0,0,0,0.6);text-align:center;top:0px;left:0px;display:none;overflow:auto;z-index:9}
	#picBox .btn{background:#969696;bottom:50px;right:50px;position:fixed;z-index:10;padding:10px;}
	#picBox a{display:block;width:40px;height:40px;background:#fff;margin-bottom:2px;color:#c1c2c3;font-size:24px;line-height: 40px;}
	#picBox .close{background:#c1c2c3; position:fixed;top:0px;right:50px;text-align:center;color:#fff;}

	i{
	    font-family:"iconfont" !important;
	    font-style:normal;
	    -webkit-font-smoothing: antialiased;
	    -webkit-text-stroke-width: 0.2px;
	    -moz-osx-font-smoothing: grayscale;
	  }
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

	<div class="tt">
		
	</div>
	<div class="banner">
		<img src="<?php echo C('WEB_URL');?>Public/ruili/images/title.jpg">
	</div>
	<div class="wrap">
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img1.jpg" onclick="showPic('huazhuangping',3)">
		</div>
		<div class="box">
			<div class="hobbyL h1" onclick="showPic('huazhuangping',3)">
				<div class="heading">化妆品</div>
			</div>
			<div class="hobbyR h2" onclick="showPic('xie',3)">
				<div class="heading">鞋</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img2.jpg" onclick="showPic('xie',3)">
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img3.jpg"  onclick="showPic('jietou',4)">
		</div>
		<div class="box">
			<div class="hobbyL h1" onclick="showPic('jietou',4)">
				<div class="heading">街头</div>
			</div>
		</div>
		<div class="box">
			<div class="hobbyR h4" onclick="showPic('shangwu',3)">
				<div class="heading" >商务</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img4.jpg"  onclick="showPic('shangwu',3)">
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img5.jpg"  onclick="showPic('zhuangmian',3)">
		</div>
		<div class="box">
			<div class="hobbyL h3"  onclick="showPic('zhuangmian',3)">
				<div class="heading">妆面</div>
			</div>
			<div class="hobbyR h4"  onclick="showPic('chuangyi',4)">
				<div class="heading">创意</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img6.jpg"  onclick="showPic('chuangyi',4)">
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img7.jpg" onclick="showPic('shangye',4)">
		</div>
		<div class="box">
			<div class="hobbyL h1" onclick="showPic('shangye',4)">
				<div class="heading" >专业商拍</div>
			</div>
			<div class="hobbyR h2"  onclick="showPic('hunsha',4)">
				<div class="heading">婚纱</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img8.jpg"  onclick="showPic('hunsha',4)">
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img9.jpg"  onclick="showPic('xiezheng',3)">
		</div>
		<div class="box">
			<div class="hobbyL h1"  onclick="showPic('xiezheng',3)">
				<div class="heading">个人写真</div>
			</div>
		</div>
		<div class="box">
			<div class="hobbyR h4"  onclick="showPic('shifang',3)">
				<div class="heading">私房</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img10.jpg"  onclick="showPic('shifang',3)">
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img11.jpg"  onclick="showPic('dianying',5)">
		</div>
		<div class="box">
			<div class="hobbyL h3" onclick="showPic('dianying',5)">
				<div class="heading" >电影海报</div>
			</div>
			<div class="hobbyR h4"  onclick="showPic('shangye',4)">
				<div class="heading">专业商拍</div>
			</div>
		</div>
		<div class="box">
			<img src="<?php echo C('WEB_URL');?>Public/ruili/images/img12.jpg" onclick="showPic('shangye',4)">
		</div>
	</div>
	<div id="picBox">
		<a href="javascript:void(0)" class="close" onclick="$('#picBox').hide();$('body').removeClass('over')">×</a>
		<p class="btn">
			<a href="javascript:void(0)" onclick="$('#picBox').scrollTop(0)"><i>&#xe60b;</i></a>
			<a href="javascript:void(0)" onclick="$('#picBox').hide();$('body').removeClass('over')"><i>&#xe60a;</i></a>

		</p>
		<div class="picBoxMain"></div>
	</div>
	<script src="<?php echo C('WEB_URL');?>Public/ruili/js/jquery.1.72.js" type="text/javascript"></script>
	<script>
		function showPic(name,len){
			var html="",
				i=0;
			for(;i<len;i++){
				html+="<p><img src='/Uploads/shoot/"+name+(i+1)+".jpg' /></p>";

			}
			$("#picBox").show().find(".picBoxMain").html(html);
			$("body").addClass("over");
		}
	</script>
	<!--[if IE 6]>
		<script type="text/javascript">
			$('.banner').width($(window).width()<1201?1201:$(window).width());

			$(window).resize(function(){
				$('.banner').width($(window).width()<1201?1201:$(window).width());
			})
		</script>
	<![endif]-->
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