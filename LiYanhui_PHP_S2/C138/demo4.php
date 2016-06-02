<?php
header('Content-Type: text/html; charset=UTF-8');

// 创建类
class Computer {

	public $name;
	public $model;

	public function run($who) {
		echo $who."是运行的方法";
	}

}

// 声明对象
$computer1 = new Computer();

$computer1->run("Ctang");

?>