<?php
header('Content-Type: text/html; charset=UTF-8');

@$mysqli = new mysqli('localhost','root','abc123','thinkshare');

// 数据库连接时发生的错误
if (mysqli_connect_errno()) {
	echo "数据库连接错误，错误信息：".mysqli_connect_error();
	exit();
}

$mysqli->select_db('noexist');

// 数据库操作时发生的错误
if ($mysqli->errno) {
	echo "数据库操作错误，错误信息：".$mysqli->error;
}

$mysqli->close();

?>