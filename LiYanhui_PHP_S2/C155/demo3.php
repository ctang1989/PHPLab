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

// 计算有多少条字段
// echo $result->field_count;

// 获取字段的名称
// $field = $result->fetch_field();
// echo $field->name;
// $field = $result->fetch_field();
// echo $field->name;

// 遍历字段
// while (!!$field = $result->fetch_field()) {
// 	echo $field->name.'<br />';
// }

// 一次性取得字段数组
$fields = $result->fetch_fields();
// echo $fields[0]->name;

foreach ($fields as $field) {
	echo $field->name.'<br />';
}

$mysqli->close();

?>