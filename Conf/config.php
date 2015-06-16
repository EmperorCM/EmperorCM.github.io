<?php

if (!defined('THINK_PATH'))
    exit();

return array(
    /* 开启调试模式 */
    'APP_DEBUG' => false,
    'SHOW_PAGE_TRACE' => false,
    /* 数据库类型 */
    'DB_TYPE' => 'mysql',
    /* 数据库服务器地址 */
    'DB_HOST' => 'localhost',
    /* 数据库名称 */
    'DB_NAME' => 'ruili',
    /* 数据库用户名 */
    'DB_USER' => 'root',
    /* 数据库密码 */
    'DB_PWD' => 'www@really.com',
    /* 数据库端口 */
    'DB_PORT' => '3306',
    /* 数据表前缀 */
    'DB_PREFIX' => 'nb_',
    /* 项目分组前后台 */
    'APP_GROUP_LIST' => 'Admin,Home',
    /* 默认模板 */
    'DEFAULT_THEME' => 'ruili',
    /* 默认分组 */
    'DEFAULT_GROUP' => 'Home',
    /* 是否开启模板编译缓存,设为false则每次都会重新编译 */
    'TMPL_CACHE_ON' => false,
    /* 默认错误跳转对应的模板文件 */
    'TMPL_ACTION_ERROR' => 'Public:message',
    /* 默认成功跳转对应的模板文件 */
    'TMPL_ACTION_SUCCESS' => 'Public:message',
    /* 表单令牌验证 */
    'TOKEN_ON' => false,
    /* PATHINFO模式下，各参数之间的分割符号 */
    'URL_PATHINFO_DEPR' => '/',
    /* URL访问模式,可选参数0、1、2、3,
     * 代表以下四种模式：0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)
     * 当URL_DISPATCH_ON开启后有效; 默认为PATHINFO 模式，提供最好的用户体验和SEO支持 */
    'URL_MODEL' => 2,
    /* 是否启用Dispatcher，一定要开启，要不然分组不好跳转 */
    'URL_DISPATCH_ON' => true,
    'WEB_URL' => 'http://www.really99.com/',
    'VAR_PAGE'=> 'p',
    'thumbH'=>'150',
    'thumbW'=>'260'
);
?>
