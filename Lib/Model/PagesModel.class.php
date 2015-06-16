<?php

class PagesModel extends Model {

    // 自动验证设置
    protected $_validate = array(
        array('title', 'require', '请输入标题', 0),
        array('content', 'require', '请输入内容', 0),
        array('title', '/^[a-zA-Z0-9\x00-\xff]{5,50}$/', '标题格式非法，请输入5到50位的字串，可用字母、数字、中文！', 0, 'regex'),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

    /**
      +----------------------------------------------------------
     * 获取单页列表
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param   $map            查询条件
     *           $field          查询字段
     *           $id             单页ID
      +----------------------------------------------------------
     * @return  $data['list']              信息列表
     *           $data['current']           当前查询条件
     *           $data['page']              当前分页信息
      +----------------------------------------------------------
     */
    public function getPages($map=null, $field="*", $id=false) {
        if ($id) {
            $map['id'] = $id;
            $data['list'] = $this->field($field)->where($map)->find();
        } else {
            import("@.ORG.Page");
            $count = $this->where($map)->count();
            $page = pages($count, 30, $map);
            $data['page'] = $page['page'];
            $data['list'] = $this->field($field)->where($map)->order('create_time')->limit($page['firstRow'] . ',' . $page['listRows'])->select();
        }
        if (!$data['list'] && $data['list'] != null)
            return "-2";
        return $data;
    }

    /**
      +----------------------------------------------------------
     * 添加单页
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
             $this->img = uploadFile(Site('thumbH'),Site('thumbW'));
        }
        $this->create_time = time();
        $result=$this->add();
        if ($result)
            return $result;
        return "-1";
    }

    /**
      +----------------------------------------------------------
     * 修改单页
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
            $map['id'] = $this->id;
            $file = $this->where($map)->getField('img');
            unlink("./Uploads/bigImages/".$file);
            unlink("./Uploads/smallImages/".$file);
            $this->img = uploadFile(Site('thumbH'),Site('thumbW'));
            //删除单页图片
        }
        $result = $this->save();
        if ($result)
            return "1";
        return "-1";
    }

    /**
      +----------------------------------------------------------
     * 删除单页
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
                unlink($file);
                $result = $this->where($map)->delete();
                if (!$result)
                    return "-1";
                Log::write($_SESSION['username'] . "执行删除单页(ID=" . $id[$i] . ")操作，操作成功");
            }
            return "1";
        } else {
            $map['id'] = $id;
            $file = $this->where($map)->getField('img');            //删除商品图片
            unlink($file);
            $result = $this->where($map)->delete();
            if (!$result)
                return "-2";
            Log::write($_SESSION['username'] . "执行删除单页(ID=" . $id . ")操作，操作成功");
            return "1";
        }
    }



}

?>