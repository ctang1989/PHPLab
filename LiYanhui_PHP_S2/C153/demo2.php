<?php
header('Content-Type: text/html; charset=UTF-8');

// 使用构造方法
$mysqli = new mysqli('localhost','root','abc123','thinkshare');

$mysqli->close();

?>