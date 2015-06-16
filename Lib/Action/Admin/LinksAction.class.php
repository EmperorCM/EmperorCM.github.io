<?php

class LinksAction extends AdminBaseAction {

    public function index() {
        $l = M('Links');
        import("@.ORG.Page");
        $count = $l->count();
        $p = new Page($count, 10);

        $list = $l->order('id')->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    public function add() {
        $this->display('add');
    }

    public function insert() {
        $l = D('Links');
        if (!$l->create()) {
            $this->error($Type->getError());
        } else {
            if ($_FILES['logo']['size'] > 0) {
                $this->_upload();
            }
            $l->create_time = time();
            if ($l->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
    }

    public function update() {
        $l = D('Links');
        if (!$l->create()) {
            $this->error($l->getError());
        } else {
            if ($_FILES['logo']['size'] > 0) {
                $l->logo = $this->_upload();
            }

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
            $l = M('Links');
            $list = $l->select();
            $map['id'] = $_GET['id'];
            if ($l->where($map)->find()) {
                $this->assign('links', $l);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $l = M('Links');
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

    protected function _upload() {
        import("@.ORG.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = 1024 * 1024 * 3; //限制文件大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');    //限制文件类型
        $upload->savePath = './Uploads/';   //上传路径
        $upload->thumbMaxHeight = '210';  //最大高度
        $upload->thumbMaxWidth = '310';   //最大宽度
        $upload->thumbRemoveOrigin = true;    //删除原图
        $upload->thumbPrefix = "g_";
        $upload->saveRule = uniqid; //设置上传文件规则
        $upload->thumbRemoveOrigin = true; //删除原图
        if (!$upload->upload()) {
            $this->error($upload->getErrorMsg());
        } else {
            $info = $upload->getUploadFileInfo();
            return $info[0]['savename'];
        }
    }

}

?>