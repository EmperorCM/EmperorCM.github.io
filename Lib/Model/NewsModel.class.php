<?php

class NewsModel extends Model {

    // 自动验证设置
    protected $_validate = array(
        array('title', 'require', '请输入标题', 0),
        array('content', 'require', '请输入内容', 0),
        array('title', '/^[a-zA-Z0-9\x00-\xff]{5,100}$/', '标题格式非法，请输入5到20位的字串，可用字母、数字、中文！', 0, 'regex'),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

}

?>