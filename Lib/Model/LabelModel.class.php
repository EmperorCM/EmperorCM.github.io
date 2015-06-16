<?php
class LabelModel extends Model {
    // 自动验证设置
    protected $_validate = array(
        array('title','require','请输入标题',0),
        array('label_name','require','请输入别名',0),
        array('content','require','请输入内容',0),
        array('title', '/^[a-zA-Z0-9\x00-\xff]+$/', '标题格式非法，可用字母、数字、中文组成！', 0, 'regex'),
        array('label_name', '/^[a-zA-Z0-9]+$/', '别名格式非法，可用字母、数字组成！', 0, 'regex'),
    );
    protected $_auto = array(
        array('create_time', 'time', 1, 'function'),
    );

}
?>