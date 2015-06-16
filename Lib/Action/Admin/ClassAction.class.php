<?php

class ClassAction extends AdminBaseAction {

    public function index() {
        $c = D('Class');
        $data = $c->getClass();
        $this->assign('page', $data['page']);
        $this->assign('class', $data['list']);
        $this->display();
    }

    public function add() {
        $c = M('Class');
        $map['parentid'] = 0;
        $list = $c->where($map)->field('classid,title')->select();
        $this->assign('list', $list);
        $this->display('add');
    }

    public function insert() {
        $c = D('Class');
        if (!$c->create()) {
            $this->error($c->getError());
        } else {
            $result = $c->insert();
            if ($result == "-1")
                $this->error('添加失败');
            else if ($_POST['parentid'] == "0") {
                $data['title'] = $_POST['title'];
                $data['status'] = $_POST['isshow'];
                $data['type'] = 1;
                $data['create_time'] = time();
                $data['url'] = "pList/cid/" . $result;
                $n = M('nav');
                $result = $n->data($data)->add();
                if ($result)
                    $this->success('添加成功');
                $this->error('添加导航失败！');
            }
            $this->success("添加成功");
        }
    }

    public function edit() {
        $c = M('Class');
        $map['classid'] = $_GET['classid'];
        $class = $c->where($map)->find();
        if ($class) {
            $this->assign('class', $class);
            $list = $c->where('parentid=0')->field('classid,title')->select();
            $this->assign('list', $list);
            $this->display('edit');
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {

        $c = D('Class');
        if (!$c->create()) {
            $this->error($c->getError());
        } else {
            $this->assign("jumpUrl", U('Class/index'));

            $result = $c->updata();
            if ($result == "1")
                $this->success('编辑成功');
            else if ($result == "-1")
                $this->error('编辑失败');
            else
                $this->error($result);
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $c = M('Class');
            $map['classid'] = $_GET['id'];
            $result = $c->where($map)->delete();
            if ($result !== false) {
                $this->ajaxReturn($_GET['id'], '删除成功', 1);
            } else {
                $this->ajaxReturn($_GET['id'], '删除失败', 0);
            }
        } else {
            $this->ajaxReturn($_GET['id'], '出现未知错误，无法获取删除项', 0);
        }
    }

    //更改分类排序
    public function chooseOrder() {
        $id = $_GET['id'];
        if ($id) {
            $c = D('Class');
            $c->order = $_GET['order'];
            $c->typeid = $id;
            $result = $c->updata();
            if ($result == "1")
                $this->ajaxReturn($id, "更改排序成功", 0);
            $this->ajaxReturn($id, "出现未知错误", 0);
        } else {
            $this->ajaxReturn($id, "无法获取编号", 0);
        }
    }

}

?>