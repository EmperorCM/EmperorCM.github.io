<?php
class AdminModel extends Model {
    // 自动验证设置
    protected $_validate = array(
        array('username', '', '此用户名已存在', 0,'unique',1),
        array('username', '/^[a-zA-Z0-9\x00-\xff]{5,20}$/', '用户名格式错误，请输入5到20位的字串，可用字母、数字、中文！', 0, 'regex'),
        array('opassword', 'require', '请输入原密码', 0),
        array('password', '/^[a-zA-Z0-9\x00-\xff]{5,20}$/', '密码格式错误，请输入5到30位的字串，可用字母、数字、中文！', 0, 'regex'),
        array('repassword', 'password', '确认密码不正确', 0, 'confirm'),
        array('email','email','邮箱格式错误!',2),
    );
    protected $_auto = array (
        array('password','md5',3,'function') , // 对password字段使md5函数处理
    );
}
?>