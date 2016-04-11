<?php 
/**
 * 慧联信息管理系统
 * ==================================
 * Copyright (c) 2013-2015 Tang Chao
 * 乐思乐享博客园
 * http://www.cnblogs.com/mchina/
 * ==================================
 * Author:唐 超
 * 个人微信：mchina_tang
 * 公众微信：zhuojinsz
 * Date:2015-03-11
 */
//防止恶意调用
if (!defined('IN_TG')){
	exit("Access Deny!");
}

//转换硬路径常量
define('ROOT_PATH',substr(dirname(_FILE_),0,-8));

//拒绝PHP低版本
if (PHP_VERSION<'4.1.0'){
	exit('PHP Version too low!');
}

//引入函数库
require ROOT_PATH.'includes/global.func.php';

//定义网站名称
define('MY_SITE_NAME',"慧联信息");

?>
