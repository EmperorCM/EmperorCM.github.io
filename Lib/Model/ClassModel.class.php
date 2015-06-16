<?php

class ClassModel extends Model {

    // 自动验证设置
    protected $list, $num, $list2;
    protected $_validate = array(
        array('parentid', 'require', '请选择上级分类', 0),
        array('typename', 'require', '请输入分类名称', 0),
        array('type', 'require', '请选择分类类型', 0),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

    /**
      +----------------------------------------------------------
     * 获取分类列表
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param   $map            查询条件
     *           $field          查询字段
     *           $id             分类ID
      +----------------------------------------------------------
     * @return  $data['list']              信息列表
     *           $data['current']           当前查询条件
     *           $data['page']              当前分页信息
      +----------------------------------------------------------
     */
    public function getClass($map=null, $field="*", $id=false) {
        if ($id) {
            $map['id'] = $id;
            $data['list'] = $this->field($field)->where($map)->find();
        } else {
            import("@.ORG.Page");
            $count = $this->where($map)->count();
            $page = pages($count, 50, $map);
            $data['page'] = $page['page'];
            $field="nb_class.title,nb_class.classid ,nb_class.parentid ,nb_class.create_time,nb_class.description, count(case when  nb_class.classid =nb_news.classid then 1 end)  as c";
            $this->list = $this->field($field)->where($map)->join("nb_news ON nb_class.classid=nb_news.classid")->order('create_time')->limit($page['firstRow'] . ',' . $page['listRows'])->group("nb_class.classid")->select();
            $this->getList(0);
            $data['list'] = $this->list2;
            
        }
        if (!$data['list'] && $data['list'] != null)
            return "-2";
        return $data;
    }

    /**
      +----------------------------------------------------------
     * 添加分类
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param
      +----------------------------------------------------------
     * @return  1              添加成功
     *           -1             添加失败
      +----------------------------------------------------------
     */
    public function insert() {
        if ($_FILES['img']['size'] != 0) {
            //如果有文件上传 上传附件
            $picture = $this->_upload();
            if (!empty($picture['error']))
                return $picture['error'];
            $this->img =$picture['filename'];
        }
        $this->create_time = time();
        $result=$this->add();
        if ($result)
            return $result;
        return "-1";
    }

    /**
      +----------------------------------------------------------
     * 修改分类
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param
      +----------------------------------------------------------
     * @return  1              添加成功
     *           -1             添加失败
      +----------------------------------------------------------
     */
    public function updata() {
        if ($_FILES['img']['size'] != 0) {
            //如果有文件上传 上传附件
             $this->img = uploadFile(Site('thumbH'),Site('thumbW'));
            //删除分类图片
            $map['classid'] = $this->classid;
            $file = $this->where($map)->getField('img');
            unlink("./Uploads/".$file);
        }
        $result = $this->save();
        if ($result)
            return "1";
        return "-1";
    }

    /**
      +----------------------------------------------------------
     * 删除分类
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param   $id             删除条目ID号(可为数组)
      +----------------------------------------------------------
     * @return  1                  删除成功
     *           -1                 批量删除失败
     *           -2                 单条删除失败
      +----------------------------------------------------------
     */
    public function del($id) {
        if (is_array($id)) {
            for ($i = 0; $i < count($id); $i++) {
                $map['id'] = $id[$i];
                $file = $this->where($map)->getField('img');
                unlink("Uploads/m_".$file);
                $result = $this->where($map)->delete();
                if (!$result)
                    return "-1";
                Log::write($_SESSION['username'] . "执行删除分类(ID=" . $id[$i] . ")操作，操作成功");
            }
            return "1";
        } else {
            $map['id'] = $id;
            $file = $this->where($map)->getField('img');            //删除商品图片
            unlink($file);
            $result = $this->where($map)->delete();
            if (!$result)
                return "-2";
            Log::write($_SESSION['username'] . "执行删除分类(ID=" . $id . ")操作，操作成功");
            return "1";
        }
    }

    //递归分类列表
    protected function getList($parent_id) {
        for ($i = 0; $i < count($this->list); $i++) {
            if ($this->list[$i]['parentid'] == $parent_id) {
                $this->list2[$this->num++] = $this->list[$i];
                $this->getList($this->list[$i]["classid"]);
            }
        }
    }


}

?>