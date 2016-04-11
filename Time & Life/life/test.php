<?php
header('Content-Type: text/html; charset=UTF-8');

require_once "includes/MysqliDb.class.php";
$conn = new MysqliDb();

$sql = "select * from tbl_project_charge";
$res = $conn->_fetch_array($sql);
var_dump($res);

echo "<hr />";

$sql2 = "select * from tbl_project_charge";
$res2 = $conn->_fetch_array_list($conn->_query($sql2));
var_dump($res2);

echo "<hr />";

echo $conn->_num_rows($conn->_query($sql));
?>