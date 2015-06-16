<?php

class NavModel extends Model {

    // 自动验证设置
    protected $_validate = array(
        array('title', 'require', '请输入标题', 0),
        array('url', 'require', '请输入链接地址', 0),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

}

?>