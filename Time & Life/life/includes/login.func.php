<?php
/**
 * Discuss Version1.0
 * ================================
 * Copy 2013-2014 joythink
 * http://www.joythink.net
 * ================================
 * Author:David
 * Date:2013-12-21
 */
//防止恶意调用
if (!defined('IN_TG')){
	exit("Access Deny!");
}

if (!function_exists('_alert_back')){
	exit('_alert_back()函数不存在，请检查！');
}

/**
 * _setcookies() 生成登录cookies
 */
function _setcookies($_username){
	setcookie('username',$_username);
}

/**
 * _check_username 检测并过滤用户名
 * @access public
 * @param string $_string 受污染的用户名
 * @param int $_min_num 最小位数
 * @param int $_max_num 最大位数
 * @return string 过滤后的用户名
 */
function _check_username($_string,$_min_num,$_max_num){

	//去掉两边的空格
	$_string=trim($_string);

	//长度大于2位或者小于20位
	if (mb_strlen($_string,'utf-8') < $_min_num||mb_strlen($_string.'utf-8') > $_max_num){
		_alert_back('输入的字符串长度小于'.$_min_num.'位或者大于'.$_max_num.'位');
	}

	//限制特殊字符
	$_char_pattern='/[<>\'\"\ \　]/';
	if (preg_match($_char_pattern, $_string)){
		_alert_back('用户名不得包含特殊字符');
	}

	//转义输入，有效防止SQL注入问题
	return mysql_escape_string($_string);
}

/**
 * _check_password 验证密码
 * @access public
 * @param string $_string
 * @param int $_min_num
 * @return string $_first_pass 返回一个加密后的密码
 */
function _check_password($_string,$_min_num){
	//判断密码
	if (strlen($_string) < $_min_num){
		_alert_back('密码不得小于'.$_min_num.'位');
	}

	//将密码返回
	return sha1($_string);
}

?>