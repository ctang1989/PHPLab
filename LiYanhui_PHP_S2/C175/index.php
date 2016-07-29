<?php
require dirname(__FILE__).'/init.inc.php';
global $tpl;
// 载入tpl文件
$tpl->assign('title', '标题');
$tpl->display('index.tpl');
?>