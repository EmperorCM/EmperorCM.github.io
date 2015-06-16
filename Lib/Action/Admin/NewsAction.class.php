<?php

class NewsAction extends AdminBaseAction {

    public function index() {
        $n = M('News');
        import("@.ORG.Page");
        if (!empty($_GET['id'])) {
            $map['nb_news.classid'] = $_GET['id'];
        }

        $count = $n->where($map)->count();
        $p = new Page($count, 20);
        $field = "id,nb_news.title,nb_class.title as class,content,nb_news.create_time,user,top,hit";
        $list = $n->field($field)->where($map)->join('nb_class ON nb_news.classid=nb_class.classid')->order('id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
        $page = $p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    public function add() {
        $c = D('Class');
        $m = D('Module');

        $class = $c->getClass('', 'classid,title,parentid');
        $module = $m->getModule('', 'moduleid,title,parentid');


        $this->assign('class', $class['list']);
        $this->assign('module', $module['list']);
        $this->display('add');
    }

    public function insert() {
        $n = D('News');
        if (!$n->create()) {
            $this->error($n->getError());
        } else {
            
            if ($_FILES['files']['error']!=0&&$_FILES['files']['error']!=4) {
                $this->uploadError($_FILES['files']['error']);
            } else if ($_FILES['pic']['error']!=0&&$_FILES['pic']['error']!=4) {
                $this->uploadError($_FILES['files']['error']);
            } 
            if ($_FILES['pic']['size'] > 0 && $_FILES['files']['size'] > 0) {
                $t = $this->getSuffix($n->fileType, 2); //获取允许文件后缀
                $file = uploadFile(C('thumbH'), C('thumbW'), $t);
                $n->files = date("Ymd") . '/' . $file[0]['savename'];
                $n->pic = date("Ymd") . '/m_' . $file[1]['savename'];
            } else if ($_FILES['pic']['size'] > 0) {
                $t = $this->getSuffix(0, 1); //获取允许文件后缀
                $n->pic = uploadFile(C('thumbH'), C('thumbW'), $t);
            } else if ($_FILES['files']['size'] > 0) {
                $t = $this->getSuffix($n->fileType,1);
                $n->files = uploadFile('', '', $t);
            }
            if ($_POST['file_text'] != "" && $_POST['fileFrom'] == "0") {
                $n->files = $_POST['file_text'];
            }
            if($n->files=="上传文件类型不允许")
                $this->error($n->files);

            $n->language = $_SESSION['language'];
            $t->user=$_SESSION['username'];
            if ($n->add()) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        }
    }

    public function edit() {
        if (!empty($_GET['id'])) {
            $c = D('Class');
            $m = D('Module');
            $n = M('News');
            $class = $c->getClass('', 'classid,title,parentid');
            $module = $m->getModule('', 'moduleid,title,parentid');

            $map['id'] = $_GET['id'];
            $new = $n->where($map)->find();
            if ($new) {

                if ($new['files'] != "" && strpos("a".$new['files'], "http://") !=false)
                    $new['files_from'] = 0;
                else if ($new['files'] != "")
                    $new['files_from'] = 1;

                $this->assign('class', $class['list']);
                $this->assign('module', $module['list']);
                $this->assign('news', $new);
                $this->display('edit');
            }
        } else {
            $this->error('编辑项不存在');
        }
    }

    public function updata() {
        $n = D('News');
        if (!$n->create()) {
            $this->error($n->getError());
        } else {
            
            $map['id'] = $n->id;
            if ($_FILES['files']['error']!=0&&$_FILES['files']['error']!=4) {
                $this->uploadError($_FILES['files']['error']);
            } else if ($_FILES['pic']['error']!=0&&$_FILES['pic']['error']!=4) {
                $this->uploadError($_FILES['files']['error']);
            } 
            
            if ($_FILES['pic']['size'] > 0 && $_FILES['files']['size'] > 0) {

                $file = $n->where($map)->getField('pic');    //获取原有图片
                delFile($file);
                $file = $n->where($map)->getField('files');  //获取原有附件
                delFile($file);

                $t = $this->getSuffix($n->fileType, 2); //获取允许文件后缀
                
                $file = uploadFile(Site('thumbH'), Site('thumbW'), $t);
                $n->files = date("Ymd") . '/' . $file[0]['savename'];
                $n->pic = date("Ymd") . '/m_' . $file[1]['savename'];
            } else if ($_FILES['pic']['size'] > 0) {
                $t = $this->getSuffix(0, 1); //获取允许文件后缀
                $file = $n->where($map)->getField('pic');    //获取原有图片
                delFile($file);
                $n->pic = uploadFile(Site('thumbH'), Site('thumbW'), $t);
            } else if ($_FILES['files']['size'] > 0) {
                $t = $this->getSuffix($n->fileType,1);
                $n->files = uploadFile('', '', $t);
                $file = $n->where($map)->getField('files');  //获取原有附件
                delFile($file);
            }
            if($n->files=="上传文件类型不允许")
                $this->error($n->files);
            
            if ($_POST['file_text'] != "" && $_POST['fileFrom'] == "0") {
                $n->files = $_POST['file_text'];
            }
            

            if ($n->save()) {
                $this->success('编辑成功');
            } else {
                $this->error('未修改数据或编辑失败');
            }
        }
    }

    public function del() {
        if (!empty($_GET['id'])) {
            $n = M('News');
            $map['id'] = $_GET['id'];
            $file = $n->where($map)->getField('pic');    //获取原有图片
            delFile($file);
            $file = $n->where($map)->getField('files');  //获取原有附件
            delFile($file);

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

    function getSuffix($type, $num=1) {
        if ($num == 2) {
            if ($type == "2")
                $suffix = Site('fileSuffix2') . "," . Site('fileSuffix1');
            else if ($type == "3")
                $suffix = Site('fileSuffix3') . "," . Site('fileSuffix1');
            else if ($type == "4")
                $suffix = Site('fileSuffix4') . "," . Site('fileSuffix1');
            else if($type=="5")
                $suffix = "swf,pdf," . Site('fileSuffix1');
            else if($type=="6")
                $suffix = "rar,zip" . Site('fileSuffix1');
        }else {
            if ($type == "2")
                $suffix = Site('fileSuffix2');
            else if ($type == "3")
                $suffix = Site('fileSuffix3');
            else if ($type == "4")
                $suffix = Site('fileSuffix4');
            else if ($type == "5")
                $suffix = "swf";
            else if ($type == "6")
                $suffix = "rar,zip";
            else
                $suffix = Site('fileSuffix1');
        }
        return $suffix;
    }

}

?>
