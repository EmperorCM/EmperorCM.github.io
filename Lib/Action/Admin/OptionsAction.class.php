<?php

class OptionsAction extends AdminBaseAction {

    public function webSet() {
        $o = M('Options');
        if ($_SESSION['language'] == "cn") {
            $map['id'] = 1;
        } else if ($_SESSION['language'] == "en") {
            $map['id'] = 2;
        }
        $field = "siteurl,sitename,siteicp,sitekeyword,sitedescription,siteright";
        $set = $o->where($map)->field($field)->select();

        $this->assign('set', $set[0]);
        $this->display("webSet");
    }

    public function systemSet() {
        $o = M('Options');
        if ($_SESSION['language'] == "cn") {
            $map['id'] = 1;
        } else if ($_SESSION['language'] == "en") {
            $map['id'] = 2;
        }
        $field = "thumbW,thumbH,slideW,slideH,textListNum,picListNum,fileSuffix1,fileSuffix2,fileSuffix3,fileSuffix4";
        $set = $o->where($map)->field($field)->select();

        $this->assign('set', $set[0]);
        $this->display("systemSet");
    }

    public function developSet() {
        $c = M('Contact');
        $map['id'] = 1;
        $contact = $c->where($map)->find();
        $this->assign('contact', $contact);
        $this->display("develop");
    }

    public function flashSet() {
        $s = M('Slide');
        $map['language'] = $_SESSION['language'];
        $slide = $s->where($map)->select();
        $this->assign('slide', $slide);
        $this->display("flash");
    }

    public function update() {
        
        $t = $_GET['type'];
        $o = D('options');
        if ($_SESSION['language'] == "cn") {
            $map['id'] = 1;
        } else if ($_SESSION['language'] == "en") {
            $map['id'] = 2;
        }
        if ($t == "web") {
            if (!$o->create()) {
                $this->error($o->getError());
            } else {
                if ($o->where($map)->save()) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败');
                }
            }
        } else if ($t == "contact") {
            $c = M("Contact");
            if (!$c->create()) {
                $this->error($c->getError());
            } else {
                if ($c->where($map)->save()) {
                    $this->success('编辑成功');
                } else {
                    $this->error('编辑失败');
                }
            }
        } else {
            $this->error("非法操作！");
        }
    }

    public function updateSlide() {
        
        $s = D('Slide');
        if (!$s->create()) {
            $this->error($s->getError());
        } else {
            if ($_FILES['pic']['size'] > 0) {
                
                $pic = uploadFile(Site('slideH'),Site('slideW'));
                $s->pic = $pic;
                
            }
            $map['slide_id'] = $_GET['id'];
            $map['language'] = $_SESSION['language'];
            if ($s->where($map)->save()) {
                $this->success('编辑成功');
            } else {
                $this->error('未修改数据或编辑失败');
            }
        }
    }

    public function updateSystem() {
        $s = D('Options');
        if (!$s->create()) {
            $this->error($s->getError());
        } else {
            if ($_SESSION['language'] == "cn") {
                $map['id'] = 1;
            } else if ($_SESSION['language'] == "en") {
                $map['id'] = 2;
            }
            if ($s->where($map)->save()) {
                $this->success('编辑成功');
            } else {
                $this->error('未修改数据或编辑失败');
            }
        }
    }



}

?>
