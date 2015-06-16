<?php

//获取网站设置信息
function Site($field) {
    $o = M('options');
    //$map['language'] = $_SESSION['language'];
    //$data = $o->where($map)->getField($field);
    $data = $o->getField($field);
    return $data;
}

function getRole($id) {
    switch ($id) {
        case 1: return '是';
            break;
        case 0: return '否';
            break;
        default: return '是';
            break;
    }
}

//获取导航信息
function nav() {
    $m = M('nav');
    $map['status'] = "1";
    $field = "title,url";
    $list = $m->where($map)->field($filed)->order("`order`")->select();
    $str = "";

    for ($i = 0; $i < count($list); $i++) {
        if (strchr($list[$i]['url'], "http")) {
            $str.="<li><a href='" . $list[$i]['url'] . "' target='_self'>" . $list[$i]['title'] . "</a></li>";
        } else {
            $str.="<li><a href='/" .$list[$i]['url'] . "' target='_self'>" . $list[$i]['title'] . "</a></li>";
        }
    }

    return $str;
}

//获取自定义标签
function getLabel($name) {
    $l = M('label');
    $map['label_name'] = $name;
    //$map['language'] = $_SESSION['language'];
    $field = 'content';
    $data = $l->where($map)->select();

    return $data['0']['content'];
}

function getLink($id) {
    $l = M("links");
    if ($id)
        $map['id'] = $id;
    $links = $l->where($map)->select();
    return $links;
}

//获取分类列表
function classList($id) {
    $c = M('class');
    if ($id) {
        $parentId = $c->where('classid=' . $id)->getField('parentid');
        if ($parentId != 0) {
            $map['parentid'] = array('in', array($id, $parentId));
        } else {
            $map['parentid'] = $parentId;
        }
        $classList = $c->where($map)->select();
    } else {
        $map['parentid'] = array('neq', "0");
        $classList = $c->where($map)->select();
    }
    return $classList;
}

//获取指定分类下的指定数量的新闻(ID，数量，置顶等级)
function getArticle($id, $count = 99, $top = '', $map) {

    $n = M('news');
    $c = M('class');
    if ($id) {
        $map['classid'] = $id;
        $map['parentid'] = $id;
        $map['_logic'] = 'or';

        $field = 'classid';
        $classid = $c->field($field)->where($map)->select();  //获取分类下所有子分类

        $str = null;
        for ($i = 0; $i < count($classid); $i++) {
            $str.=$classid[$i]['classid'] . ",";
        }
        $str = substr($str, 0, -1);
        $map = null;
        $map['classid'] = array('in', $str);
    }
    if ($top != '')
        $map['top'] = $top;
    $news = $n->where($map)->order('create_time desc')->limit('0,' . $count)->select();
    return $news;
}

//获取指定模块下的指定数量的新闻(ID，数量，置顶等级)
function getArticleModule($id, $count = 99, $top = '', $cid = '') {

    $n = M('news');
    $c = M('module');
    if ($id) {
        $map['moduleid'] = $id;
        $map['parentid'] = $id;
        $map['_logic'] = 'or';

        $field = 'moduleid';
        $moduleid = $c->field($field)->where($map)->select();  //获取分类下所有子分类

        $str = null;
        for ($i = 0; $i < count($moduleid); $i++) {
            $str.=$moduleid[$i]['moduleid'] . ",";
        }
        $str = substr($str, 0, -1);
        $map = null;
        $map['moduleid'] = array('in', $str);
    }
    if ($top != '')
        $map['top'] = $top;
    if ($cid != '')
        $map['classid'] = $cid;
    $news = $n->where($map)->order('create_time desc')->limit('0,' . $count)->select();
    return $news;
}

//获取友情链接
function getLinks($count = 10) {
    $l = M("links");
    $links = $l->order('id')->limit('0,' . $count)->select();
    return $links;
}

/**
  +----------------------------------------------------------
 * 字符串截取，支持中文和其他编码
  +----------------------------------------------------------
 * @static
 * @access public
  +----------------------------------------------------------
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
  +----------------------------------------------------------
 * @return string
  +----------------------------------------------------------
 */
function mysubstr($str, $start = 0, $len = 20, $charset = "utf-8", $suffix = true) {
    if (function_exists("mb_substr")) {
        if ($suffix && (strlen($str) > $len)) {
            return mb_substr($str, $start, $len, $charset) . "...";
        } else {
            return mb_substr($str, $start, $len, $charset);
        }
    } elseif (function_exists('iconv_substr')) {
        if ($suffix && (strlen($str) > $len)) {
            return iconv_substr($str, $start, $len, $charset) . "...";
        } else {
            return iconv_substr($str, $start, $len, $charset);
        }
    }
}

/*
  函数说明:计算$string在$array(需为数组)中重复出现的次数.
 */

function get_array_repeats(array $array, $string) {
    $count = array_count_values($array);
    return $count[$string];
}

/**
  +----------------------------------------------------------
 * 分页封装
  +----------------------------------------------------------
 * @access  public
  +----------------------------------------------------------
 * @param   int     $count      数据条数
 *           int     $num        每页数量
 *           array   $map        当前查询条件
  +----------------------------------------------------------
 * @return  array
  +----------------------------------------------------------
 */
function pages($count, $num, $map) {

    import("@.ORG.Page");
    $p = new Page($count, $num);
    $page['firstRow'] = $p->firstRow;
    $page['listRows'] = $p->listRows;
    foreach ($map as $key => $val) {
        $p->parameter .="$key=" . urlencode($val) . "&";
    }
    $page['page'] = $p->show();
    return $page;
}

/**
  +----------------------------------------------------------
 * 查询条件判断封装
  +----------------------------------------------------------
 * @access  public
  +----------------------------------------------------------
 * @param   $data       查询条件数组
 *           $table      查询表名(-1为忽略表名)
 *           $current    是否返回当前查询条件
  +----------------------------------------------------------
 * @return  array
  +----------------------------------------------------------
 */
function Map($data, $table = false, $current = false) {
    $table = $table == FALSE ? "" : $table . ".";


    if ($data['start_time'] != "" && $data['end_time'] != "") {
        $map['map'][$table . 'create_time'] = array('between', array($data['start_time'], $data['end_time']));
        if ($current) {
            $map['current']['start_time'] = date('Y-m-d H:i:s', $data['start_time']);
            $map['current']['end_time'] = date('Y-m-d H:i:s', $data['end_time']);
        }
    } else if ($data['start_time'] != "" && $data['end_time'] == "") {
        $map['map'][$table . 'create_time'] = array('gt', $data['start_time']);
        if ($current)
            $map['current']['start_time'] = date('Y-m-d H:i:s', $data['start_time']);
    } else if ($data['start_time'] == "" && $data['end_time'] != "") {
        $map['map'][$table . 'create_time'] = array('lt', $data['end_time']);
        if ($current)
            $map['current']['end_time'] = date('Y-m-d H:i:s', $data['end_time']);
    }

    foreach ($data as $key => $val) {
        if ($key != "start_time" && $key != "end_time") {
            if (($val && $val != "") || $val == "0")
                $map['map'][$table . $key] = $val;
            if ($current && $val != "")
                $map['current'][$key] = $val;
        }
    }

    return $map;
}

/**
 *
 * 上传图片方法
 * @param string $imagePath 图片的路径
 */
function uploadFile($h = "300", $w = "300",$path, $allowExts = "jpg,gif,png,jpeg") {
    $allowExts = explode(',', $allowExts);

    import("@.ORG.UploadFile");
    $upload = new UploadFile(); // 实例化上传类
    $upload->saveRule = 'uniqid';
    $upload->thumbPrefix = "";
    $upload->uploadReplace = true; //如果图片相同，覆盖相同图片
    $upload->maxSize = -1; // 设置附件上传大小
    //$upload->allowExts = $allowExts; // 设置附件上传类型
    $path =empty($path)? "Uploads/" . date("Ymd") . "/" : $path;
    if (!is_dir($path)){
        mkdir($path);
    }
    $upload->savePath = $path; // 设置附件上传目录
    //生成缩略图
    $upload->thumb = true;
    $upload->autoSub = false;
    $upload->thumbPath = $path; //要保存的路径
    $upload->thumbMaxHeight = $h; //图片高度
    $upload->thumbMaxWidth = $w; //图片宽度
    $upload->thumbPrefix = "m_"; //默认前缀为空

    if (!$upload->upload()) { // 上传错误 提示错误信息
        return($upload->getErrorMsg());
    } else {
        // 上传成功 获取上传文件信息
        $info = $upload->getUploadFileInfo();
        return $info;
    }
}

function delFile($url) {
    $url = "./Uploads/" . $url;
    unlink($url);
}

function auto_charset($fContents, $from = 'gbk ', $to = 'utf-8') {
    $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
    $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
    if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
//如果编码相同或者非字符串标量则不转换
        return $fContents;
    }
    if (is_string($fContents)) {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($fContents, $to, $from);
        } elseif (function_exists('iconv')) {
            return iconv($from, $to, $fContents);
        } else {
            return $fContents;
        }
    } elseif (is_array($fContents)) {
        foreach ($fContents as $key => $val) {
            $_key = auto_charset($key, $from, $to);
            $fContents[$_key] = auto_charset($val, $from, $to);
            if ($key != $_key)
                unset($fContents[$key]);
        }
        return $fContents;
    }
    else {
        return $fContents;
    }
}

?>
