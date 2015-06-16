<?php

class ModuleAction extends AdminBaseAction {

    public function index() {
        $c = D('Module');
        $data = $c->getModule();
        $this->assign('page', $data['page']);
        $this->assign('module', $data['list']);
        $this->display();
    }

    public function add() {
        $c = M('Module');
        $map['parentid'] = 0;
        $list = $c->where($map)->field('moduleid,title')->select();
        $this->assign('list', $list);
        $this->display('add');
    }

    public function insert() {

        $c = D('Module');
        if (!$c->create()) {
            $this->error($c->getError());
        } else {
            $result = $c->insert();
            if ($result == "-1")
                $this->error('添加失败');
            
            else if ($_POST['parentid']=="0") {
                $data['title'] = $_POST['title'];
                $data['status'] = $_POST['isshow'];
                $data['type'] = 2;
                $data['create_time'] = time();
                $data['url'] = "pList/mid/" . $result;
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
        $c = M('Module');
        $map['moduleid'] = $_GET['moduleid'];
        $module = $c->where($map)->find();
        if ($module) {
            $this->assign('module', $module);
            $list = $c->where('parentid=0')->field('moduleid,title')->select();
            $this->assign('list', $list);
            $this->display('edit');
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {

        $c = D('Module');
        if (!$c->create()) {
            $this->error($c->getError());
        } else {
            $this->assign("jumpUrl", U('module/index'));
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
            $c = M('Module');
            $map['moduleid'] = $_GET['id'];
            $result = $c->where($map)->delete();
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