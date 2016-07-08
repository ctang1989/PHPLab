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

// 创建三条选择语句
$sql = "SELECT * FROM tbl_gift_card;";
$sql .= "SELECT * FROM tbl_gift_post_detail;";
$sql .= "SELECT * FROM tbl_gift_star_rating;";

if ($mysqli->multi_query($sql)) {
	// 获取当前的结果集
	$result = $mysqli->store_result();
	print_r($result->fetch_row());

	echo "<br />";

	// 将结果集的指针移到下一条
	$mysqli->next_result();
	$result = $mysqli->store_result();
	if (!$result) {
		echo "第二条SQL语句有误！";
		exit();
	}
	print_r($result->fetch_row());

	echo "<br />";

	// 将结果集的指针移到下一条
	$mysqli->next_result();
	$result = $mysqli->store_result();
	if (!$result) {
		echo "第三条SQL语句有误！";
		exit();
	}
	print_r($result->fetch_row());
} else {
	echo "第一条SQL语句有误！";
	exit();
}

$mysqli->close();

?>