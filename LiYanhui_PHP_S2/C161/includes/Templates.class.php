<?php

// 模板类
class Templates {

	// 创建一个存放数组的字段
	private $vars = array();

	// 创建一个构造方法，来验证各个目录是否存在
	public function __construct() {
		if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)) {
			exit('ERROR: 模板目录或编译目录或缓存目录不存在！请手工设置！');
		}
	}

	// assign()方法，用于注入变量
	public function assign($var, $value) {
		// $var表示模板里的变量名，$value是index.php文件里声明的变量值
		if (isset($var) && !empty($var)) {
			$this->vars[$var] = $value;
		} else {
			exit('ERROR: 请设置变量名！');
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
		// 当编译文件不存在或者模板文件修改过，则生成编译文件
		if (!file_exists($parFile) || filemtime($parFile) < filemtime($tplFile)) {
			// 引入模板解析类
			require ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($tplFile);		// 模板文件
			$parser->compile($parFile);			// 编译文件
		}
		// 载入编译文件
		include $parFile;
	}
}
?>