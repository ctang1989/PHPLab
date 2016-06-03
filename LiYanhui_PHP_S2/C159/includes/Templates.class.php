<?php

// 模板类
class Templates {

	// 创建一个构造方法，来验证各个目录是否存在
	public function __construct() {
		if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE)) {
			exit('ERROR: 模板目录或编译目录或缓存目录不存在！请手工设置！');
		}
	}
}
?>