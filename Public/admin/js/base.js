$(function(){
    $('.window').myPosition("center","center");
    $(".list tbody tr:even").addClass("odd");
})
function myshow(obj,lock){
    $(obj).show();
    if(lock)
        $("#loadingbox").show();
}

function close(obj,lock){
    $(obj).hide();
    if(lock)
        $("#loadingbox").hide();
}

function choose(area,type){
    if(type=="all"){
        if($(area).find("tbody input:checkbox:not(:checked)").length!=0){
            //$(area).find("input[type=checkbox]").attr("checked",true).end().find("tbody tr").addClass("selected");
            $(area).find("input[type=checkbox]").attr("checked",true).end().find("tbody tr");
        }else{
            //$(area).find("input[type=checkbox]").removeAttr("checked").end().find("tbody tr").removeClass("selected");
            $(area).find("input[type=checkbox]").removeAttr("checked").end().find("tbody tr");
        }
    }

}

jQuery.fn.extend({
    tabs:function(){    //标签切换插件
        $(this).children("li").each(function(i){
            $(this).click(function(){

                $(this).parent().siblings("div.tab").hide();
                $(this).addClass("selected").siblings("li").removeClass("selected").parent().siblings("div.tab").eq(i).show();

            })
        })
    },
    myPosition:function(left,top){
        left=left=="center"?$(window).scrollLeft() +($(window).width()-$(this).width())/2:left;
        top=top=="center"?$(window).scrollTop()+($(window).height()-$(this).height()-50)/2:top;
        $(this).css({
            'top'    : top,
            'left'   : left
        });

    }

});

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');    //把cookie分割成组
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];                      //取得字符串
        while (c.charAt(0)==' ') {          //判断一下字符串有没有前导空格
            c = c.substring(1,c.length);      //有的话，从第二位开始取
        }
        if (c.indexOf(nameEQ) == 0) {       //如果含有我们要的name
            return unescape(c.substring(nameEQ.length,c.length));    //解码并截取我们要值
        }
    }
    return false;
}

//清除cookie
function clearCookie(name) {
    setCookie(name, "", -1);
}

//设置cookie
function setCookie(name, value, seconds) {
    seconds = seconds || 0;   //seconds有值就直接赋值，没有为0，这个根php不一样。
    var expires = "";
    if (seconds != 0 ) {      //设置cookie生存时间
        var date = new Date();
        date.setTime(date.getTime()+(seconds*1000));
        expires = "; expires="+date.toGMTString();
    }
    document.cookie = name+"="+escape(value)+expires+"; path=/";   //转码并赋值
}  