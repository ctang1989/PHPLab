<?php
/*
 * 信息管理系统
 */

require_once '../lib/config.php';
require_once '../lib/http_request_method.func.php';

function ickd($express_com, $express_number){

	global $config;
	$id = $config['ickd_id'];
	$secret = $config['ickd_secret'];
	
	$ord = "desc";	//asc,desc
	
	$url = "http://api.ickd.cn/?id=".$id."&secret=".$secret."&com=".$express_com."&nu=".$express_number."&type=json&encode=utf8&ord=".$ord;

	$json = http_get($url);
	$result = json_decode($json, true);
	
	return $result;
}

function check_null($_string){

	//去掉两边的空格
	$_string=trim($_string);

	if (mb_strlen($_string,'utf-8') < 1){
		alert_back('请选择快递公司！');
	}

	return $_string;

}

function alert_back($_info){
	echo "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
	exit();
}

?>