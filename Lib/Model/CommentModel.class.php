<?php

class CommentModel extends Model {

    // 自动验证设置
    protected $_validate = array(
        array('title', 'require', '请输入标题', 0),
        array('content', 'require', '请输入内容', 0),
        array('title', '/^[a-zA-Z0-9\x00-\xff]{2,50}$/', '标题格式非法，请输入5到50位的字串，可用字母、数字、中文！', 0, 'regex'),
    );


    /**
      +----------------------------------------------------------
     * 获取评价列表
      +----------------------------------------------------------
     * @access  public
      +----------------------------------------------------------
     * @param   $map            查询条件
     *           $field          查询字段
     *           $id             评价ID
      +----------------------------------------------------------
     * @return  $data['list']              信息列表
     *           $data['current']           当前查询条件
     *           $data['page']              当前分页信息
      +----------------------------------------------------------
     */
    public function getComments($map=null, $field="*", $id=false) {
        $field="comment_id,new_id,title,author,author_email,nb_comment.content,nb_comment.create_time,approved";
        if ($id) {
            $map['id'] = $id;
            $data['list'] = $this->field($field)->join("nb_news ON nb_news.id=nb_comment.new_id")->where($map)->find();
        } else {
            import("@.ORG.Page");
            $count = $this->where($map)->count();
            $page = pages($count, 30, $map);
            $data['page'] = $page['page'];
            $data['list'] = $this->field($field)->join("nb_news ON nb_news.id=nb_comment.new_id")->where($map)->order('create_time')->limit($page['firstRow'] . ',' . $page['listRows'])->select();
            }
        if (!$data['list'] && $data['list'] != null)
            return "-2";
        return $data;
    }



    /**
      +----------------------------------------------------------
     * 修改评价
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
        $result = $this->save();
        if ($result)
            return "1";
        return "-1";
    }

    /**
      +----------------------------------------------------------
     * 删除评价
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
                $map['comment_id'] = $id[$i];
                $result = $this->where($map)->delete();
                if (!$result)
                    return "-1";
                Log::write($_SESSION['username'] . "执行删除评价(ID=" . $id[$i] . ")操作，操作成功");
            }
            return "1";
        } else {
            $map['comment_id'] = $id;
            $result = $this->where($map)->delete();
            if (!$result)
                return "-2";
            Log::write($_SESSION['username'] . "执行删除评价(ID=" . $id . ")操作，操作成功");
            return "1";
        }
    }



}

?>