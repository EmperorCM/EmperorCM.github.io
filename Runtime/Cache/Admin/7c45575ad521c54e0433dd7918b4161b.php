<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>' />
        <link href="<?php echo C('WEB_URL');?>Public/admin/style/base.css" rel="stylesheet" type="text/css" />
        <title>系统消息</title>
    </head>
    <body>
        <div id="message">
            <h3><?php echo ($msgTitle); ?></h3>
            <ul>
                <?php if($status == 1 ): ?><li><font color="green"><?php echo ($message); ?></font></li>
                    <?php else: ?>
                    <li class="b red"><?php echo ($message); ?></li><?php endif; ?>
                <li><?php echo ($waitSecond); ?> 秒后自动跳转,如果不想等待,直接点击 <a href="<?php echo ($jumpUrl); ?>" class="b">这里跳转</a> </li>
            </ul>
        </div>
    </body>
</html>