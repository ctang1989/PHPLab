<?php
header('Content-Type: text/html; charset=UTF-8');

// 创建类
class Computer {

	// 创建一个构造方法（淘汰）
	public function Computer() {
		echo "我是构造方法";
	}

}

// 只要实例化，就可以运行构造方法
$computer = new Computer();

?>