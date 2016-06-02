<?php
header('Content-Type: text/html; charset=UTF-8');

// 创建类
class Computer {

	public $name;
	public $model;

	public function run() {
		echo "我是运行的方法";
	}

}

// 声明对象
$computer1 = new Computer();

$computer1->run();

?>