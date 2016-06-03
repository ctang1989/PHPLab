<?php
header('Content-Type: text/html; charset=UTF-8');

// 连接MySQL
// 当参数出现错误，导致连接错误的时候，$mysqli这个对象就没有创建成功
// 也就是说，没有资源句柄的功能，就没有调用mysqli下的方法和属性的能力了
@$mysqli = new mysqli('localhost','root','abc123','thinkshare');

// 为什么要用函数去捕捉呢？
// 为什么不用面向对象的方式去捕捉呢？
// 0表示没有任何错误
if (mysqli_connect_errno()) {
	echo "数据库连接错误，错误信息：".mysqli_connect_error();
	exit();
}

$mysqli->close();

?>