<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>UploadiFive Test</title>
        <script src="../js/jquery1.9.1.js" type="text/javascript"></script>
        <script src="jquery.uploadify.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="uploadify.css">
        <style type="text/css">
            body {
                font: 13px Arial, Helvetica, Sans-serif;
            }
            #picList li{float:left;height:80px;margin:0 10px;border:1px solid #d0d0d0;}
            #picList li a{display:block;text-align:center;color:#f60}
        </style>
    </head>

    <body>

        <form>
            <div id="queue"></div>
            <input id="file_upload" name="file_upload" type="file" multiple="true" />
        </form>
        <div id="picList">
            <ul class="clearfix">
            </ul>
            <p><a href="javascript:void(0)" class="btnOrange">确认</a></p>
        </div>
        
        <script type="text/javascript">
            <?php $timestamp = time(); ?>
            $(function() {
                $('#file_upload').uploadify({
                    'formData': {
                        'timestamp': '<?php echo $timestamp; ?>',
                        'token': '<?php echo md5('unique_salt' . $timestamp); ?>'
                    },
                    'swf': 'uploadify.swf',
                    'uploader': '/Admin/Record/addPic',
                    'onUploadSuccess': function(file, data, response) {
                        var html="<li><img src='"+"/Uploads/temp/"+data+"' height='80px' /><a href='javascript:void(0)'>×</a><input type='hidden' name='pic[]' value='"+data+"' /></li> ";
                        $("#picList > ul").append(html);
                    }
                });
            });
            
            $("#picList").on("click",function(e){
                if(e.target.tagName=="A"){
                    $(e.target).parents("li").remove();
                }
            })
        </script>
    </body>
</html>