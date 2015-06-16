<?php
class HomeAction extends Action {

    public function __construct() {
        header('Content-Type:text/html; charset=utf-8');
        parent::__construct();
    }
 
    public function _empty() {
        header("Location: /404.html");
    }

    //登陆
    public function login() {

        $map['username'] = $_REQUEST['username'];
        $U = M('user');
        $res = $U->where($map)->field("userId,username,password,nickname,headImage,realname,sex,zone,address,tel,email,desc,createTime,loginTime")->find();
            
      if ($res) {
            
            if ($res['password'] != md5($_REQUEST['pwd'])) {
                $this->ajaxReturn(null, "密码错误", 1500);
            }
            unset($res['password']);

            $_SESSION['user'] = $res;
            $data['loginTime']=$res['loginTime']+1;

            $U->save($data);
            $this->ajaxReturn($res, "登录成功", 1);
        } else if($res!==false) {
            $this->ajaxReturn($res, "该帐号不存在", 1001);
        }else{
            $this->ajaxReturn(null, "未知错误", 0);
        }
    } 

    //注册普通会员
    public function reg() {
        $U = M("user");
        if(empty($_POST['username'])||empty($_POST['username'])||empty($_POST['username'])){
            $this->ajaxReturn(null, "缺少参数", 0);
        }else if($_POST['username']!=$_POST['username']){
            $this->ajaxReturn(null, "两次输入的密码不一致", 0);
        }
        $data['username'] = $_POST['username'];
        $res = $U->where($data)->getField("userId");
        if ($res) {
            $this->ajaxReturn(null, "该帐号已存在。", -3);
        }

        $data['createTime'] = time();
        $data['nickname'] = $data['username'];
        $data['password'] = md5($_POST['pwd']);
        $res = $U->add($data);

        if ($res) {
            $res = $U->where("userId=" . $res)->find();
            unset($res['password']);
            $_SESSION['user'] = $res;
            $this->ajaxReturn($res, "注册成功", 1);
        } else {
            log::write("注册失败:" . $U->getLastSql());
            $this->ajaxReturn(null, "注册失败", 0);
        }
    }

    //退出
    public function logout(){
        unset($_SESSION);
        $url = $_SERVER['HTTP_REFERER'];

        redirect($url);

    }

}
?>