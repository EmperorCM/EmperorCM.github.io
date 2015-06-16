<?php

class MsgModel extends Model {

    // 自动验证设置
    protected $_validate = array(
        array('title', 'require', '请输入标题', 0),
        array('nickname', 'require', '请输入姓名', 0),
        array('content', 'require', '请输入内容', 0),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

}

?>