var interactive={
	page:0,
	H:$(window).height(),
	time:0,
	pageStatus:[true,false,false,false,false,false],
	init:function(){
		var _t=this;
		$("#menu").on("mouseenter",function(){
			$(this).stop().animate({"right":5},500);
		}).on("mouseleave",function(){
			$(this).stop().animate({"right":-200},500);
		}).on("click",function(e){
			if(e.target.tagName==="LI"||e.target.tagName=="svg"){
				var element=e.target.tagName==="LI"?$(e.target):$(e.target).parent("li"),
					index=element.index(),
					step1=_t.page*_t.H+(index<_t.page?100:-100);
				if(index==_t.page){
					return false;
				}
				element.addClass("current").siblings("li").removeClass("current");

				$("#main").stop().animate({"scrollTop":step1},200,function(){
					_t.page=index;
					$("#main").stop().animate({"scrollTop":_t.page*_t.H},500);
				});
				if(_t.page==0){
					_t.page2();
				}else if(_t.page==1){
					_t.page3();
				}else if(_t.page==2){
					_t.page4();
				}
			}
		})

		$("#main > ul > li").height(_t.H);

		$("#main").height(_t.H).bind("mousewheel",function(e,delta){

			if((_t.page==4&&delta<0)||(_t.page==0&&delta>0)){
				return false;
			}
			var step1=_t.page*_t.H+(delta>0?100:-100);
			$(this).stop().animate({"scrollTop":step1},200,function(){
				_t.page=delta<0?_t.page+1:_t.page-1;
				$(this).stop().animate({"scrollTop":_t.page*_t.H},500);
				$("#menu").find("li").eq(_t.page).addClass("current").siblings("li").removeClass("current");
			});
			if(_t.page==0){
				interactive.page2();
			}else if(_t.page==1){
				interactive.page3();
			}else if(_t.page==2){
				interactive.page4();
			}
			return false;
		}).scrollTop(0);

		$(window).resize(function(){
			_t.H=$(window).height();
			$("#main").height(_t.H).scrollTop(_t.page*_t.H).children("ul").children("li").height(_t.H);
		})

		setTimeout(interactive.page1,500);
		this.page5();
		interactive.nav();
	},
	nav:function(){
		$("#nav").on("mouseenter",function(){
			$(this).children("div.menu").stop().animate({"height":80},300);
		}).on("mouseleave",function(){
			$(this).children("div.menu").stop().animate({"height":0},300);
		})

		$("#nav >div.menu").find("ol").on("mouseover",function(i){
			var i=$(this).index();
			$("#nav >div.navMain").find("li:eq("+i+")").addClass("current").siblings("li").removeClass("current");
		})
	},
	page1:function(){
		var time=Date.parse(new Date())/1000;
		$("#header > .menu").on("click",function(e){

			if((time+1)>Date.parse(new Date())/1000){
				return false;
			}
			time=Date.parse(new Date())/1000;
			if(e.target.tagName==="A"){
				var element=$(e.target),
					index=element.attr("data-tab");
				element.parent("li").addClass("current").siblings("li").removeClass("current");
				animateOut(index);
				$("#header").find("b").animate({"left":255*index},300);
				setTimeout(function(){
					animateIn(index);
				},900);
			}
		})

		//晶体动画
		$("#an1").animate({"width":582,"height":582},1000);
		$("#an2").animate({"width":678,"height":340,"marginLeft":270},1000);

		function animateIn(i){
			var inDom=$("#page1").find("div.box").eq(i);
				p=inDom.find("p"),
				title=p.eq(0),
				txt=p.eq(1),
				line=p.eq(2)
				btn=inDom.find("a"),
				img=inDom.siblings("span.tImg");

			img.animate({"opacity":1},800);
			line.animate({"width":300},400,function(){
				title.animate({"left":0,"opacity":1},500);
				txt.animate({"left":0,"opacity":1},500);
				btn.animate({"marginTop":130,"opacity":1},500);
			})
			inDom.css("z-index",1);
		}
		function animateOut(i){
			var outDom=i==0?$("#page1").find("div.box").eq(1):$("#page1").find("div.box").eq(0),
				p=outDom.find("p"),
				title=p.eq(0),
				txt=p.eq(1),
				line=p.eq(2)
				btn=outDom.find("a"),
				img=outDom.siblings("span.tImg");

			img.animate({"opacity":0},800);
			line.animate({"width":0},400,function(){
				title.animate({"left":-100,"opacity":0},500);
				txt.animate({"left":200,"opacity":0},500);
				btn.animate({"marginTop":200,"opacity":0},500);
			})
			outDom.css("z-index",0);
		}
	},
	page2:function(){
		if(this.pageStatus[2]===false){
			//相册 效果 
			$('#roundabout > p').roundabout({
	        	btnNext: "#roundabout .next",
	        	btnPrev: "#roundabout .prev",
	            autoplay: false,
	            autoplayDuration: 5000,
	            autoplayPauseOnHover: true,
	            childSelector:"img",
	            shape: 'square',
	            minOpacity: 0.3
	        });
	        this.pageStatus[2]=true;
		}
	},
	page3:function(){
		if(this.pageStatus[3]===false){
			var flash="<embed src=\"/Public/ruili/flash/p3.swf\" quality=\"high\" width=\"1171\" height=\"585\" align=\"middle\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" />";
			$("#flash3").html(flash);
			this.pageStatus[3]=true;
		}
	},
	page4:function(){
		if(this.pageStatus[4]===false){
			var flash="<embed src=\"/Public/ruili/flash/p4.swf\" quality=\"high\" width=\"915\" height=\"585\" align=\"middle\" allowfullscreen=\"true\" allowscriptaccess=\"always\" type=\"application/x-shockwave-flash\" wmode=\"transparent\" />";
			$("#flash4").html(flash);
			this.pageStatus[4]=true;
		}

		
	},
	page5:function(){

		if(this.pageStatus[5]===false){
			$("#J_weixin").on("mouseenter",function(){

				$("#J_weixinCode").stop().animate({"left":250,"opacity":1},500);
			}).on("mouseleave",function(){
				$("#J_weixinCode").stop().animate({"left":320,"opacity":0},500);
			})
			this.pageStatus[5]=true;
		}

	},
	girl:function(){
		this.nav();
	}

}


function handleMouseMove(e) {
	e = e || window.event;
	var t = e.clientX;
	var n = e.clientY;
	var r = $(window).innerWidth();
	var i = $(window).innerHeight();
	var s = (t - r / 2) / (r / 2) * 50;
	var o = (n - i / 2) / (i / 2) * 50;
	groupGo(s, o, ".cloudes", 1)
}

function groupGo(e, t, n, r) {
	var i = t / r;
	var s = e / r;
	$(n).find(".group3").each(function() {
		var e = parseInt($(this).attr("data-top"));
		var t = parseInt($(this).attr("data-left"));
		$(this).css({
			top: e + i + "px",
			left: t + s + "px"
		})
	});
	$(n).find(".group1").each(function() {
		var e = parseInt($(this).attr("data-top"));
		var t = parseInt($(this).attr("data-left"));
		$(this).css({
			top: e - i / 4 + "px",
			left: t - s / 4 + "px"
		})
	});
	$(n).find(".group2").each(function() {
		var e = parseInt($(this).attr("data-top"));
		var t = parseInt($(this).attr("data-left"));
		$(this).css({
			top: e + i / 5 + "px",
			left: t + s / 5 + "px"
		})
	})
}

$(window).mousemove(handleMouseMove)