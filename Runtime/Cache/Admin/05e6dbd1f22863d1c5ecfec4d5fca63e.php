<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=7" />
        <title>修改模卡</title>
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/master.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo C('WEB_URL');?>Public/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
        <style>
            .picList li{float:left;margin:0 10px;}
            .picList li a{display:block;text-align:center;color:#f60}
        </style>
        

    </head>
    <body>
        <div id="wrapper">
            <h2>修改模卡<a href="javascript:history.go(-1)">返回</a></h2>
            <form action="<?php echo U('updata');?>" method="post" enctype="multipart/form-data" id="myform">
                <table class="form" >

                    <tr><td class="tkey">标题：</td><td><input type="text" name="title" size="60" value="<?php echo ($model['title']); ?>" class="input_text" /></td></tr>
                    <tr>
                    <td class="tkey">封面图片：</td>
                        <td>
                            <input type="file" name="cover" value=""/>
                            <input type="hidden" name="oldcover" value="<?php echo ($model['cover']); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="tkey">模卡照片</td>
                        <td>
                            <input id="file_upload" name="file_upload" type="file" multiple="true" />
                            <div class="picList clearfix" id="picList">
                                <ul></ul>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="tkey">&nbsp;<input type="hidden" name="id" value="<?php echo ($model['id']); ?>" /></td>
                        <td><input type="submit" value="确定" class="but_blue" /></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
    <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo C('WEB_URL');?>Public/admin/js/base.js"></script>
    <script src="<?php echo C('WEB_URL');?>Public/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function(){
                var swfUrl='/Public/uploadify/uploadify.swf',
                    uploadUrl="/Admin/Model/addPic",
                    token="6b79a77180e9ec3a7ca351ebe54641a2",
                    timestamp="1418738432",
                    formData={
                        'timestamp': timestamp,
                        'token': '2dc556cd1ab7e06c418244ccb04fc2da'
                    };
                $('#file_upload').uploadify({
                    'formData': formData,
                    'swf':swfUrl,
                    'uploader': uploadUrl,
                    'onUploadSuccess': function(file, data, response) {
                        data=$.trim(data);
                        var html="<li><img src='"+"/Uploads/temp/m_"+data+"' height='80px' /><a href='javascript:void(0)'>×</a><input type='hidden' name='picList[]' value='"+data+"' /></li> ";
                        $("#picList > ul").append(html);
                    }
                });

                $("#picList").on("click",function(e){
                    if(e.target.tagName=="A"){
                        $(e.target).parents("li").remove();
                    }
                })
                
            })

           
        </script>

</html>