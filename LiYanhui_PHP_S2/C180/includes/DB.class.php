<?php

// 数据库连接类
class DB {

	// 获取对象句柄
	static public function getDB() {
		$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if (mysqli_connect_errno()) {
			echo '数据库连接错误！错误代码：'.mysqli_connect_error();
			exit();
		}
		$mysqli->set_charset('utf8');
		return $mysqli;
	}

	// 清理
	static public function unDB(&$result, &$db) {
		if (is_object($result)) {
			// 清理结果集
			$result->free();
			// 销毁结果集对象
			$result = null;
		}
		if (is_object($db)) {
			// 关闭数据库
			$db->close();
			// 销毁对象句柄
			$db = null;
		}
	}

}
?>