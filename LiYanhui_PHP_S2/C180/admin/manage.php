<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
global $tpl;

$db = DB::getDB();
// sql
$sql = "SELECT * FROM cms_manage";
// 获取结果集
$result = $db->query($sql);
// 打印出第一组数据
print_r($result->fetch_row());
DB::unDB($result, $db);

$tpl->display('manage.tpl');
?>