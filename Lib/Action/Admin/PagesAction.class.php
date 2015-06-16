<?php

class PagesAction extends AdminBaseAction {

    public function index() {
        $pages = D('Pages');
        $data = $pages->getPages();
        $this->assign('page', $data['page']);
        $this->assign('pages', $data['list']);
        $this->display();
    }

    public function insert() {
        $page = D('Pages');
        if (!$page->create()) {
            $this->error($page->getError());
        } else {
            $this->assign("jumpUrl", U('Pages/index'));
            $result = $page->insert();
            if ($result == "-1")
                $this->error('添加失败');

            $data['title'] = $_POST['title'];
            $data['status'] = $_POST['isshow'];
            $data['type'] = 2;
            $data['create_time'] = time();
            $data['url'] = "/pages/id/" . $result;
            $n = M('nav');
            $result = $n->data($data)->add();
            if ($result)
                $this->success('添加成功');
            $this->error('添加导航失败！');
        }
    }

    public function updata() {
        $pages = D('Pages');
        if (!$pages->create()) {
            $this->error($pages->getError());
        } else {
            $this->assign("jumpUrl", U('Pages/index'));
            $result = $pages->updata();
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
            $pages = M('Pages');
            $map['id'] = $_GET['id'];
            $pages=$pages->where($map)->find();
            if ($pages) {
                $this->assign('pages', $pages);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function del() {
        $id = $_GET['id'];
        if ($id) {
            $pages = D('Pages');
            $result = $pages->del($id);
            if ($result == 1) {
                $this->ajaxReturn($id, "删除成功", "1");
            } else {
                $this->ajaxReturn($id, "删除失败","0");
            }
        } else {
            $this->ajaxReturn($id, "删除项不存在","0");
        }
    }

//    public function del() {
//        if (!empty($_GET['id'])) {
//            $pages = D('pages');
//            $map['id'] = $_GET['id'];
//            $result = $pages->where($map)->delete();
//            if ($result !== false) {
//                $this->success('删除成功');
//            } else {
//                $this->error('删除失败');
//            }
//        } else {
//            $this->error('删除项不存在');
//        }
//    }

    //更改分类排序
    public function chooseOrder() {
        $id = $_GET['id'];
        if ($id) {
            $type = D('Pages');
            $type->order = $_GET['order'];
            $type->id = $id;
            $result = $type->updata();
            if ($result == "1")
                $this->ajaxReturn($id, "更改排序成功", 0);
            $this->ajaxReturn($id, "出现未知错误", 0);
        } else {
            $this->ajaxReturn($id, "无法获取编号", 0);
        }
    }

}

?>
