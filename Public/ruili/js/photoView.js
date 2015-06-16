 /*
 * 相册插件
 * @author GongYunyun(gongyy999@126.com)
 * @date    2014-03-14
 * @version V1
  +----------------------------------------------------------
 * @param o                 --数据列表
 * @param main              --主容器
 * @param current           --验证对象
 * @param count             --数据总数
 * @param prevBtn           --上一张DOM
 * @param nextBtn           --下一张DOM
 * @param bg                --遮罩DOM
 * @param cycle             --是否循环
 * @param windowW                 --容器宽度
 * @param windowH                 --容器高度
  +----------------------------------------------------------
 */

function photoView(o){

    this.list=o.list;
    this.current=o.current||0;
    this.main=$(o.main);
    this.count=this.list.length;
    this.prevBtn=o.prevBtn?$(o.prevBtn):this.main.find(".btnPrev");
    this.nextBtn=o.nextBtn?$(o.nextBtn):this.main.find(".btnNext");
    this.cycle=o.cycle||true;
    this.mainW=$(window).width();
    this.mainH=$(window).height();

    this.imgBig=this.main.find(".imgBig");
    this.txtDom=this.main.find(".imgTxt");

    this.bgSize='backgroundSize' in document.createElement("div").style;
    this.isIE6=(!!window.ActiveXObject && !window.XMLHttpRequest) ? true : false;
    this.isIE7=$.browser.version=="7.0" ? true : false ;
    var _this=this;

    this.init=function(){
        $(window).resize(function(){
            this.W=$(window).width();
            this.H=$(window).height();
        })
        if(this.count==1){
            this.prevBtn.hide();
            this.nextBtn.hide();
        }else{
            this.prevBtn.click(function(){_this.prev()});
            this.nextBtn.click(function(){_this.next()});
        }

        this.main.find(".imgViewMain").click(function(e){
            if(e.target.className=="imgViewMain"||e.target.className=="close"){
                _this.main.hide();
            }
        })

    };
    this.init();
}

photoView.prototype.prev=function(){
    this.changeImg( this.current == 0 ? this.count-1 : this.current-1);
}

photoView.prototype.next=function(){
    this.changeImg( this.current < this.count-1 ? this.current+1 : 0 );
}

//浏览图片
photoView.prototype.changeImg= function(key) {
    this.current=typeof key == "undefined" ? this.current : key;
    this.main.show();
    //判断是否显示翻页
    if(!this.cycle&&this.count>1){
        if(this.current==0){
            this.prevBtn.hide();
            this.nextBtn.show();
        }else if(this.current==this.count-1){
            this.prevBtn.show();
            this.nextBtn.hide();
        }
    }
    

    var interval=null,
        img = new Image(),
        txt = this.list[this.current]['txt'],
        thumb = this.list[this.current]['thumb'],
        _this = this;

    img.src = this.list[this.current]['img'];

    //是否显示描述信息
    if(typeof txt!="undefined"&&txt!=""){
        this.txtDom.html(txt).show();
    }else{
        this.txtDom.hide();
    }

    //重置图片宽高
    var interval = setInterval(function() {
        if (img.complete) {
            clearInterval(interval);
            var imgW=img.width,
                imgH=img.height,
                style={};

            if(imgW/imgH >= _this.mainW/_this.mainH&&imgW >_this.mainW){
                style.width=_this.mainW;
                style.height=(imgH*_this.mainW)/imgW;
            } else if(imgH>_this.mainH){
                style.width=_this.mainH;
                style.height=imgW*(_this.mainH/_this.mainW);
            }else{
                style.width=imgW;
                style.height=imgH;
            }

            _this.imgBig.attr("src",img.src);
            if(_this.isIE7||_this.isIE6){
                _this.imgBig.css("marginTop",""+(_this.mainH-style.height)/2);
            }
            // _this.imgBig.animate({ "margin-top": ((_this.mainH - imgH) / 2) }, "fast").attr("src",img.src);
        }
    }, 100);

}