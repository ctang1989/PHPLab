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

// 设置关闭自动提交（手工提交）
$mysqli->autocommit(false);

// 创建两个SQL语句
$sql = "UPDATE tbl_gift_card SET card_password=card_password-50 WHERE id=1;";
$sql .= "UPDATE tbl_gift_star_rating SET logistics_star=logistics_star+50 WHERE id=1;";

// 执行多条SQL语句
// 只要这两条SQL语句都成功了，就手工提交给数据库
// 否则，就回滚，撤销之前的有效操作
if ($mysqli->multi_query($sql)) {
	// 通过影响的行数，来判定SQL语句是否成功执行
	// 如果$success是false说明SQL语句有误，那么就执行回滚，否则就手工提交
	$success = $mysqli->affected_rows == 1 ? true : false;

	// 下移指针
	$mysqli->next_result();

	$success2 = $mysqli->affected_rows == 1 ? true : false;

	// 如果两条都成功的话
	if ($success && $success2) {
		// 执行手工提交
		$mysqli->commit();
		echo "完美提交";
	} else {
		// 执行回滚，撤销之前的所有操作
		$mysqli->rollback();
		echo "所有操作归零";
	}
} else {
	echo "第一条SQL语句有错误！";
}

// 开启自动提交
$mysqli->autocommit(true);

$mysqli->close();

?>