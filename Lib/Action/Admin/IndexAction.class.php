<?php

class IndexAction extends BaseAction {
    protected function _initialize() {
        $freeAuth = array('login', 'verify');
        if (!in_array(ACTION_NAME, $freeAuth)) {
            if ($_SESSION['AdminAuthInfo'] == null)
                redirect(U('login'));
        }
    }

    public function index() {
        $this->display();
    }

    public function main() {
        $a=M("Admin");
        $map['username']=$_SESSION['username'];
        $admin=$a->where($map)->select();
        $this->assign('admin',$admin[0]);
        $this->display("main");
    }

    public function uploadpwd() {

        $Admin = D("Admin");
        if (!$Admin->create()) {
            $this->error($Admin->getError());
        }  else {
            $opwd=MD5($_POST['opassword']);
            $map['username'] = Session::get("username");
            $data['password'] = $Admin->password;
            $pwd=$Admin->getField('password');
            if($pwd!=$opwd){
                $this->error("原密码错误！");
            }
            if ($Admin->where($map)->save($data)) {
                $this->success('修改成功');
                $this->display('index');
            } else {
                $this->error('修改失败');
                $this->display();
            }
        }
    }

}
?>
