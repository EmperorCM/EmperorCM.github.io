$(function(){
    if((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
        $("#content").height(window.screen.availHeight-$("#header").height()-window.screenTop-50-$("#footer").height());
        $("#sidebar").height($("#content").height()+$("#site").height());
        $("#main").height($("#content").height()-$("#site").height());
    }else if (navigator.userAgent.indexOf('Firefox') >= 0){
		
        $("#content").height(window.innerHeight-$("#header").height()-20-$("#footer").height());
        $("#sidebar").height($("#content").height()+$("#site").height());
        $("#main").height($("#content").height()-$("#site").height());

    }else if (navigator.userAgent.indexOf('Opera') >= 0){
        $("#content").height(window.innerHeight-$("#header").height()-20-$("#footer").height());
        $("#sidebar").height($("#content").height()+$("#site").height());
        $("#main").height($("#content").height()-$("#site").height());

    }else{
        $("#content").height(window.innerHeight-$("#header").height()-20-$("#footer").height());
        $("#sidebar").height($("#content").height()+$("#site").height());
        $("#main").height($("#content").height()-$("#site").height());

    }  

    $(".list tbody > tr:odd").addClass("odd");
    $(window).resize(function(){
        wh();
    });
})
function wh(){
    var width=$("body").width()-225;

    $("#wrapper").width("100%");
    if(width<745){
        width=745;
        $("#wrapper").width("960px");
        $("#content").width(width);
    }else{
		
        $("#wrapper").width("100%");
        $("#content").width(width);
    }
}