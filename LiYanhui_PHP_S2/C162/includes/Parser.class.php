<?php

// 模板解析类
class Parser {

	// 模板的内容
	private $tpl;

	// 构造方法，初始化模板内容
	public function __construct($tplFile) {
		// 读取模板里的内容
		if (!$this->tpl = file_get_contents($tplFile)) {
			exit('ERROR: 读取模板出错！');
		}
	}

	// 解析普通变量
	private function parVar() {
		$pattern = '/\{\$([\w]+)\}/';
		if (preg_match($pattern, $this->tpl)) {
			$this->tpl = preg_replace($pattern, "<?php echo \$this->vars['$1'];?>", $this->tpl);
		}
	}
	
	// 对外公共方法
	public function compile($parFile) {
		// 解析模板内容
		$this->parVar();
		// 生成编译文件
		if (!file_put_contents($parFile, $this->tpl)) {
			exit('ERROR: 编译文件生成失败！');
		}
		
	}
}
?>