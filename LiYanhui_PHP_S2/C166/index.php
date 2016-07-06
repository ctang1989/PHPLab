<?php
require dirname(__FILE__).'/template.inc.php';
global $tpl;
// 声明一个变量
$name = '唐超';
$content = '是一个工程师';
$array = array(1,2,3,4,5,6,7);
// 注入一个变量
$tpl->assign('name', $name);
$tpl->assign('content', $content);
$tpl->assign('a', 5>4);
$tpl->assign('array', $array);
// 载入tpl文件
$tpl->display('index.tpl');
?>