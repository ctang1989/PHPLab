<?php
header('Content-Type: text/html; charset=UTF-8');

class Computer {

	// 构造方法
	public function __construct() {
		echo "我是比较先进的构造方法！";
	}

	// 析构方法
	public function __destruct() {
		echo "我是析构方法";
	}

	// 普通方法
	public function run() {
		echo "我是普通方法！";
	}

}

$computer = new Computer();
$computer->run();

?>