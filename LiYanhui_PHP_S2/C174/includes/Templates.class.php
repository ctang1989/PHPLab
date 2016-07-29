<?php

// 模板类
class Templates {

	// 创建一个存放数组的字段
	private $vars = array();
	// 保存系统变量
	private $config = array();

	// 创建一个构造方法，来验证各个目录是否存在
	public function __construct() {
		if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)) {
			exit('ERROR: 模板目录或编译目录或缓存目录不存在！请手工设置！');
		}
		// 保存系统变量
		$sxe = simplexml_load_file('config/profile.xml');
		$tagLib = $sxe->xpath('/root/taglib');
		foreach ($tagLib as $tag) {
			$this->config["$tag->name"] = $tag->value;
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
		// 编译文件
		$parFile = TPL_C_DIR.md5($file).$file.'.php';
		// 缓存文件
		$cacheFile = CACHE.md5($file).$file.'.html';
		// 当第二次运行相同文件的时候，直接载入缓存文件，避开编译
		if (IS_CACHE) {
			// 缓存文件和编译文件都要存在
			if (file_exists($cacheFile) && file_exists($parFile)) {
				// 判断模板文件是否修改过，判断编译文件是否修改过
				if (filemtime($parFile) >= filemtime($tplFile) && filemtime($cacheFile) >= filemtime($parFile)) {
					// 载入缓存文件
					include $cacheFile;
					return;
				}
			}
		}
		// 当编译文件不存在或者模板文件修改过，则生成编译文件
		if (!file_exists($parFile) || filemtime($parFile) < filemtime($tplFile)) {
			// 引入模板解析类
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($tplFile);		// 模板文件
			$parser->compile($parFile);			// 编译文件
		}
		// 载入编译文件
		include $parFile;
		if (IS_CACHE) {
			// 获取缓冲区内的数据，并且创建缓存文件
			file_put_contents($cacheFile, ob_get_contents());
			// 清除缓冲区（清除了编译文件加载的内容）
			ob_end_clean();
			// 载入缓存文件
			include $cacheFile;
		}
	}

	// 创建create方法，用于header和footer这种模块模板解析使用，而不需要生成缓存文件
	public function create($file) {
		// 设置模板路径
		$tplFile = TPL_DIR.$file;
		// 判断模板是否存在
		if (!file_exists($tplFile)) {
			exit('ERROR: 模板文件不存在！');
		}
		// 编译文件
		$parFile = TPL_C_DIR.md5($file).$file.'.php';
		// 当编译文件不存在或者模板文件修改过，则生成编译文件
		if (!file_exists($parFile) || filemtime($parFile) < filemtime($tplFile)) {
			// 引入模板解析类
			require_once ROOT_PATH.'/includes/Parser.class.php';
			$parser = new Parser($tplFile);		// 模板文件
			$parser->compile($parFile);			// 编译文件
		}
		// 载入编译文件
		include $parFile;
	}
}
?>