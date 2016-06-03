<?php
header('Content-Type: text/html; charset=UTF-8');

@$mysqli = new mysqli('localhost','root','abc123','thinkshare');

// 数据库连接时发生的错误
if (mysqli_connect_errno()) {
	echo "数据库连接错误，错误信息：".mysqli_connect_error();
	exit();
}

// 设置编码
$mysqli->set_charset('utf8');

// 创建一条SQL语句，获取数据库中表的数据
$sql = "SELECT * FROM tbl_gift_post_detail";

// 执行SQL语句，把结果集赋给$result
$result = $mysqli->query($sql);

// 取得第一行数据
print_r($result->fetch_row());
// 运行一次，指针下移一条
print_r($result->fetch_row());

// 销毁结果集
$result->free();

$mysqli->close();

?>