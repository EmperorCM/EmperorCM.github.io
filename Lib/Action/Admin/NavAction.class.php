<?php

class NavAction extends AdminBaseAction {

    public function index() {
        $n = M('Nav');
        import("@.ORG.Page");
        $count = $n->count();
        $p = new Page($count, 10);
        $nav = $n->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('nav', $nav);
        $this->display("index");
    }

    public function add() {
        $this->display("add");
    }

    public function edit() {
        $n = M("Nav");
        $map['id'] = $_GET['id'];
        $nav = $n->where($map)->find();
        $this->assign("nav", $nav);
        $this->display("edit");
    }

    public function insert() {
        $n = D('Nav');
        if (!$n->create()) {
            $this->error($n->getError());
        } else {
            if ($n->add()) {
                $this->success('添加成功');
            } else {
                $this->error("添加失败");
            }
        }
    }

    public function updata() {
        $n = D('Nav');
        if (!$n->create()) {
            $this->error($n->getError());
        } else {
            if ($n->save()) {
                $this->success('修改成功');
            } else {
                $this->error("修改失败");
            }
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $n = M('Nav');
            $map['id'] = $_GET['id'];
            $result = $n->where($map)->delete();
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
