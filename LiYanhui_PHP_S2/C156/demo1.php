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

// 创建三个修改的SQL语句
$sql = "UPDATE tbl_gift_card SET card_password='111112' WHERE id=1;";
$sql .= "UPDATE tbl_gift_post_detail SET name='tangc' WHERE id=1;";
$sql .= "UPDATE tbl_gift_star_rating SET fromuser='tangc' WHERE id=1;";

// 使用同时执行的方法
$mysqli->multi_query($sql);

$mysqli->close();

?>