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
$sql = "SELECT * FROM tbl_gift_card";

// 执行SQL语句，把结果集赋给$result
$result = $mysqli->query($sql);

// 移动数据指针
$result->data_seek(9);
$row = $result->fetch_row();
echo $row[1];

echo ' | ';

// 移动字段指针
$result->field_seek(3);
$field = $result->fetch_field();
echo $field->name;

$mysqli->close();

?>