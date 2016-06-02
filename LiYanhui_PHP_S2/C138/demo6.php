<?php
header('Content-Type: text/html; charset=UTF-8');

class Computer {

	public function __construct() {
		echo "我是比较先进的构造方法！";
	}
}

new Computer();

?>