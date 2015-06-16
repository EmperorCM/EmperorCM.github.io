<?php

Load('extend');

class BaseAction extends Action {

    public function __construct() {
        header('Content-Type:text/html; charset=utf-8');
        parent::__construct();
    }

    /* 私有 登录验证 */

    private function checkLogin($data) {
        if (empty($data['username']))
            $this->error('用户名不能为空');
        if (empty($data['password']))
            $this->error('密码不能为空');
//        if (md5($data['verify']) != $_SESSION['verify'])
//            $this->error('验证码不正确');
        $model = M('Admin');
        $map['username'] = $data['username'];
        $res = $model->where($map)->find();
        if (!$res)
            $this->error('用户不存在');
        if ($res['password'] != md5($data['password']))
            $this->error('密码不正确');
        $_SESSION['language'] = $data['language'];
        $a = M("admin");
        $admin['login_time'] = time();
        $admin['last_ip'] = get_client_ip();
        $admin['login_count'] = array('exp', 'login_count+1');
        $a->where($map)->save($admin);
        $_SESSION[ucfirst(GROUP_NAME) . 'AuthInfo'] = $res;
        $_SESSION['username'] = $data['username'];
        redirect(U('index'));
    }

    /* 控制器 验证码 */

    public function verify() {
        import('@.ORG.Image');
        Image::buildImageVerify();
    }

    /* 控制器 登录 */

    public function login() {
        if (empty($_POST)) {
            $this->display();
            exit;
        }
        $this->checkLogin($_POST);
    }

    /* 控制器 退出 */

    public function logout() {
        unset($_SESSION[ucfirst(GROUP_NAME) . 'AuthInfo']);
        redirect(U('login'));
    }



    /**
     *
     * 上传图片方法
     * @param string $imagePath 图片的路径
     */
    protected function uploadFile($h="150", $w="150") {

        import("ORG.Net.UploadFile");
        $upload = new UploadFile (); // 实例化上传类
        $upload->saveRule = time;
        $upload->thumbPrefix = "";
        $upload->uploadReplace = true; //如果图片相同，覆盖相同图片
        $upload->maxSize = - 1; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $dateFile = date("Ymd");
        $big_path = "./Uploads/bigImages/" . $dateFile . "/";
        if (!is_dir($big_path))
            mkdir($big_path);
        $upload->savePath = $big_path; // 设置附件上传目录
        //生成缩略图
        $upload->thumb = true;
        $upload->autoSub = false;
        $small_path = "./Uploads/smallImages/" . $dateFile . "/";
        if (!is_dir($small_path))
            mkdir($small_path);
        $upload->thumbPath = $small_path; //要保存的路径
        $upload->thumbMaxHeight = $h; //图片高度
        $upload->thumbMaxWidth = $w; //图片宽度
        $upload->thumbPrefix = ""; //默认前缀为空
        if (!$upload->upload()) { // 上传错误 提示错误信息
            $this->error($upload->getErrorMsg());
        } else {
            // 上传成功 获取上传文件信息
            $info = $upload->getUploadFileInfo();
            return date("Ymd") . "/" . $info [0] ["savename"];
        }
    }

}

?>
