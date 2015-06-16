<?php

class CommentAction extends AdminBaseAction {

    public function index() {
        $c = D('Comment');
        $data = $c->getComments();
        $this->assign('page', $data['page']);
        $this->assign('comments', $data['list']);
        $this->display();
    }


    public function updata() {
        $c = D('Comment');
        if (!$c->create()) {
            $this->error($c->getError());
        } else {
            $this->assign("jumpUrl", U('Comment/index'));
            $result = $c->updata();
            if ($result == "1")
                $this->success('编辑成功');
            else if ($result == "-1")
                $this->error('编辑失败');
            else
                $this->error($result);
        }
    }

    public function edit() {
        if (!empty($_GET['id'])) {
            $c = D('Comment');
            $map['comment_id'] = $_GET['id'];
            $comment=$c->where($map)->find();
            if ($comment) {
                $this->assign('comment', $comment);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function del() {
        $id = $_GET['id'];
        if ($id) {
            $c = D('Comment');
            $result = $c->del($id);
            if ($result == 1) {
                $this->ajaxReturn($id, "删除成功", "1");
            } else {
                $this->ajaxReturn($id, "删除失败","0");
            }
        } else {
            $this->ajaxReturn($id, "删除项不存在","0");
        }
    }


}

?>
