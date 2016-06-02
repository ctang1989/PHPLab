<?php
header('Content-Type: text/html; charset=UTF-8');

// 创建类
class Computer {
	public $name;
	public $model;
}

// 声明对象
$computer1 = new Computer();
// 给成员字段赋值
$computer1->name = "联想";
// 取值
echo $computer1->name;

?>