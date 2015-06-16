<?php

//后台登录验证
class AdminBaseAction extends BaseAction {

    protected function _initialize() {
        $_SESSION['language'] = 'cn';
        $freeAuth = array('login', 'verify','addPic');
        if (!in_array(ACTION_NAME, $freeAuth)) {
            if ($_SESSION['AdminAuthInfo'] == null)
                redirect(U('Index/login'));
        }
    }

    function uploadError($id) {
        switch ($id) {
            case 1:
                $this->error("文件大小超出了服务器的设置大小");
                break;

            case 2:   
                $this->error("要上传的文件大小超出浏览器限制");
                break;

            case 3:
                $this->error("文件仅部分被上传");
                break;
            case 4:
                $this->error("没有找到要上传的文件");
                break;

            case 5:
                $this->error("服务器临时文件夹丢失");
                break;

            case 6:  
                $this->error("文件写入到临时文件夹出错 ");
                break;
        }
    }

}
?>

