<?php

class ModelAction extends AdminBaseAction {

    public function index() {
        $n = M('Model');
        import("@.ORG.Page");


        $count = $n->where($map)->count();
        $p = new Page($count, 20);
        $list = $n->where($map)->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }
    public function addPic() {
        $path = 'Uploads/temp/';
        $file = (array) uploadFile(224,252,$path);
        echo $file[0]['savename'];
    }


    public function add() {
        $this->display('add');
    }

    public function insert() {
        $M = M('Model');
        $data = $_POST;

        $path = "Uploads/" . date("Ymd") . "/";
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (count($_FILES) > 0) {
            $file = (array) uploadFile(224,252,$path);
            $data[cover] = $file['savepath'] . "m_" . $file['savename'];
        }

        $len = count($_POST['picList']);
        $data['picList']="";
        if ($len > 0) {
            for ($i = 0; $i < count($_POST['picList']); $i++) {
                rename('Uploads/temp/'.$_POST['picList'][$i], $path .$_POST['picList'][$i]);
                rename('Uploads/temp/m_'.$_POST['picList'][$i], $path ."m_".$_POST['picList'][$i]);
                $data['picList'].=$data['picList']==""?$path ."m_".$_POST['picList'][$i]:",".$path ."m_".$_POST['picList'][$i];
            }
        }



        $data['create_time'] = time();


        $res = $M->add($data);
        if ($res) {
            $this->success("添加成功");
        } else {
            log::write("添加模卡发生错误：" . $C->getLastSql());
            $this->error("发生未知错误，请重试！");
        }
    }


    public function edit() {
        if (!empty($_GET['id'])) {
            $M = M('Model');
            $map['id'] = $_GET['id'];
            $model = $M->where($map)->find();
            if ($model) {
                $this->assign('model', $model);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {
        $M = M('Model');
        $data = $_POST;

        $path = "Uploads/" . date("Ymd") . "/";
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (count($_FILES) > 0) {
            $file = (array) uploadFile(224,252,$path);
            $data[cover] = $file['savepath'] . "m_" . $file['savename'];
        }else{
            $data[cover]=$_POST['oldcover'];
        }
        
        
        $len = count($_POST['picList']);
        
        if ($len > 0) {
            $data['picList']="";
            for ($i = 0; $i < count($_POST['picList']); $i++) {
                rename('Uploads/temp/'.$_POST['picList'][$i], $path .$_POST['picList'][$i]);
                rename('Uploads/temp/m_'.$_POST['picList'][$i], $path ."m_".$_POST['picList'][$i]);
                $data['picList'].=$data['picList']==""?$path ."m_".$_POST['picList'][$i]:",".$path ."m_".$_POST['picList'][$i];
            }
        }


        $res = $M->save($data);
        if ($res) {
            $this->success("修改成功");
        } else {
            log::write("修改模卡发生错误：" . $M->getLastSql());
            $this->error("发生未知错误，请重试！");
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $n = M('Model');
            $map['id'] = $_GET['id'];

            $result = $n->where($map)->delete();
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
