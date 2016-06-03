<?php
header('Content-Type: text/html; charset=UTF-8');

// 使用mysqli对象操作数据库

// 创建mysqli对象（资源句柄）
$mysqli = new mysqli();

// 连接数据库
$mysqli->connect('localhost','root','abc123','thinkshare');

// 断开连接
$mysqli->close();

?>