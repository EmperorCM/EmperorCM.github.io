<?php
define('APP_DEBUG',TRUE); // 开启调试模式
define('THINK_PATH', './ThinkPHP/');
define('APP_PATH', './');
require(THINK_PATH.'/ThinkPHP.php');  
$App = new App(); 
?>