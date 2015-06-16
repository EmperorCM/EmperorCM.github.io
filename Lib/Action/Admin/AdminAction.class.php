<?php

class AdminAction extends AdminBaseAction {

    public function index() {
        $Admin = M('Admin');
        import("@.ORG.Page");
        $count = $Admin->count();
        $p = new Page($count, 10);
        $list = $Admin->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    public function insert() {
        $Admin = D('Admin');
        if (!$Admin->create()) {
            $this->error($Admin->getError());
        } else {
            $Admin->create_time = time();
            if ($Admin->add()) {
                $this->success('添加成功');
            } else {
                $this->error("添加失败");
            }
        }
    }

    public function edit() {
        $a = M('Admin');
        $map['id'] = $_GET['id'];
        $user = $a->where($map)->find();
        if ($a) {
            $this->assign('user', $user);
            $this->display('edit');
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {
        $a = M('Admin');
        if (!$a->create()) {
            $this->error($a->getError());
        } else {
            $data['id'] = $a->id;
            $data['email'] = $a->email;
            if ($a->password != "")
                $data['password'] = md5($a->password);
            $result = $a->save($data);
            if ($result) {
                $this->success("修改成功!");
            } else {
                $this->error("修改失败!");
            }
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $Admin = M('Admin');
            $map['id'] = $_GET['id'];
            $result = $Admin->where($map)->delete();
            if ($result !== false) {
                $this->ajaxReturn($_GET['id'], '删除成功', 1);
            } else {
                $this->ajaxReturn($_GET['id'], '删除失败', 0);
            }
        } else {
            $this->ajaxReturn($_GET['id'], '出现未知错误，无法获取删除项', 0);
        }
    }

}

?>
