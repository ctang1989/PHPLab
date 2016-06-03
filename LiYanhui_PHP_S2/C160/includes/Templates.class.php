<?php

// 模板类
class Templates {

	// 创建一个构造方法，来验证各个目录是否存在
	public function __construct() {
		if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)) {
			exit('ERROR: 模板目录或编译目录或缓存目录不存在！请手工设置！');
		}
	}

	// display()方法
	public function display($file) {
		// 设置模板路径
		$tplFile = TPL_DIR.$file;
		// 判断模板是否存在
		if (!file_exists($tplFile)) {
			exit('ERROR: 模板文件不存在！');
		}
		// 生成编译文件
		$parFile = TPL_C_DIR.md5($file).$file.'.php';
		if (!file_exists($parFile) || filemtime($parFile) < filemtime($tplFile)) {
			file_put_contents($parFile, file_get_contents($tplFile));
		}
		// 载入编译文件
		include $parFile;
	}
}
?>