<?php

class LabelAction extends AdminBaseAction {

    public function index() {
        $l = M('Label');
        import("@.ORG.Page");
        $count = $l->count();
        $p = new Page($count, 10);
        $field = "id,title,label_name,create_time,user";
        $map['language']=$_SESSION['language'];
        $list = $l->field($field)->where($map)->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    public function add() {
        $this->display('add');
    }

    public function insert() {
        
        $l = D('Label');

        if (!$l->create()) {
            $this->error($l->getError());
        } else {
            $l->user=$_SESSION['username'];

            if ($l->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
    }

    public function updata() {
        $l = D('Label');
        if (!$l->create()) {
            $this->error($l->getError());
        } else {
            $map['id'] = $l->id;
            if ($l->where($map)->save()) {
                $this->success('编辑成功');
            } else {
                $this->error('未修改数据或编辑失败');
            }
        }
    }

    public function edit() {
        if (!empty($_GET['id'])) {
            $l = M('Label');
            $map['id'] = $_GET['id'];
            $label=$l->where($map)->find();
            if ($label) {
                $this->assign('label', $label);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $l = M('Label');
            $map['id'] = $_GET['id'];
            $result = $l->where($map)->delete();
            if ($result !== false) {
                $this->ajaxReturn($_GET['id'], '删除成功', 1);
            } else {
                $this->ajaxReturn($_GET['id'], '删除失败', 0);
            }
        } else {
            $this->ajaxReturn($_GET['id'],'出现未知错误，无法获取删除项',0);
        }
    }

}
?>