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

	// 解析if语句
	private function parIf() {
		$patternIf = '/\{if\s+\$([\w]+)\}/';
		$patternEndIf = '/\{\/if\}/';
		$patternElse = '/\{else\}/';
		if (preg_match($patternIf, $this->tpl)) {
			if (preg_match($patternEndIf, $this->tpl)) {
				$this->tpl = preg_replace($patternIf, "<?php if (\$this->vars['$1']) {?>", $this->tpl);
				$this->tpl = preg_replace($patternEndIf, "<?php } ?>", $this->tpl);
				if (preg_match($patternElse, $this->tpl)) {
					$this->tpl = preg_replace($patternElse, "<?php } else {?>", $this->tpl);
				}
			} else {
				exit('ERROR: if语句没有关闭！');
			}
		}
	}

	// 解析foreach语句
	private function parForeach() {
		$patternForeach = '/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
		$patternEndForeach = '/\{\/foreach\}/';
		$patternVar = '/\{@([\w]+)\}/';
		if (preg_match($patternForeach, $this->tpl)) {
			if (preg_match($patternEndForeach, $this->tpl)) {
				$this->tpl = preg_replace($patternForeach, "<?php foreach (\$this->vars['$1'] as \$$2=>\$$3) { ?>", $this->tpl);
				$this->tpl = preg_replace($patternEndForeach, "<?php } ?>", $this->tpl);
				if (preg_match($patternVar, $this->tpl)) {
					$this->tpl = preg_replace($patternVar, "<?php echo \$$1 ?>", $this->tpl);
				}
			} else {
				exit('ERROR: foreach语句必须有结尾标签！');
			}
		}
	}

	// 解析include语句
	private function parInclude() {
		$pattern = '/\{include\s+file=\"([\w\.\-]+)\"\}/';
		if (preg_match($pattern, $this->tpl, $file)) {
			if (!file_exists($file[1]) || empty($file)) {
				exit('ERROR: 包含文件出错！');
			}
			$this->tpl = preg_replace($pattern, "<?php include '$1'; ?>", $this->tpl);
		}
	}

	// 解析注释语句
	private function parCommon() {
		$pattern = '/\{#\}(.*)\{#\}/';
		if (preg_match($pattern, $this->tpl)) {
			$this->tpl = preg_replace($pattern, "<?php /* $1 */ ?>", $this->tpl);
		}
	}
	
	// 对外公共方法
	public function compile($parFile) {
		// 解析模板内容
		$this->parVar();
		$this->parIf();
		$this->parForeach();
		$this->parInclude();
		$this->parCommon();
		// 生成编译文件
		if (!file_put_contents($parFile, $this->tpl)) {
			exit('ERROR: 编译文件生成失败！');
		}
		
	}
}
?>