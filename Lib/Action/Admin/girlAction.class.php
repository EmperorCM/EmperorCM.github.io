<?php

class girlAction extends AdminBaseAction {

    public function index() {

        $n = M('girl');
        import("@.ORG.Page");

        $count = $n->where($map)->count();
        $p = new Page($count, 20);
        $list = $n->where($map)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();

    }

    public function add() {
        $c = M('girl');

        $this->display('add');
    }

    public function insert() {

        $c = M('girl');
        $data = $_POST;
        $data['create_time']=time();

        if (count($_FILES) > 0) {
            $file =(array)uploadFile();
            for ($i = 0; $i < count($file); $i++) {
                $data[$file[$i]['key']] = $file[$i]['savepath'] . "m_" . $file[$i]['savename'];
            }
        }

        $result = $c->add($data);
        if ($result){
            $this->success('添加成功');
        }else{
            $this->error('添加失败！');
        }
    }

    public function edit() {
        $c = M('girl');
        $map['id']=$_GET['id'];
        $girl = $c->where($map)->find();
        if ($girl) {
            $this->assign('girl', $girl);
            $this->display('edit');
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {

        $c = M('girl');
        $data = $_POST;
        $data['create_time']=time();
        $data['pic']=$_POST['oldpic'];

        if (count($_FILES) > 0) {
            $file =(array)uploadFile();
            for ($i = 0; $i < count($file); $i++) {
                $data[$file[$i]['key']] = $file[$i]['savepath'] . "m_" . $file[$i]['savename'];
            }
        }

        $result = $c->save($data);
        if ($result){
            $this->success('编辑成功');
        }else{
            $this->error('编辑失败！');
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $c = M('girl');
            $map['id'] = $_GET['id'];
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