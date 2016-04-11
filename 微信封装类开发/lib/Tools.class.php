<?php
/*
 * 基础工具类
 */

class Tools
{
	//百度短网址生成器
	function baiduShortUrl($url){
		$result = http_post("http://dwz.cn/create.php", $url);
		return $result[tinyurl];
	}
	
}

?>