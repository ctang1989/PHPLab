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
$sql = "UPDATE tbl_gift_post_detail SET name='china' WHERE id=2";

// 执行SQL语句，把结果集赋给$result
$result = $mysqli->query($sql);

// 影响了多少行
echo $mysqli->affected_rows;

$mysqli->close();

?>