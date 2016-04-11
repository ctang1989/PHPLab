<?php
/*
 * 获取Token
 */
require_once 'config.php';
require_once 'http_request_method.func.php';

function getToken(){

	$appid = APPID;
	$appsecret = APPSECRET;
	
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
	$json = http_get($url);
	$result = json_decode($json);
	$acc_token = $result->access_token;
	
	return $acc_token;
}

?>