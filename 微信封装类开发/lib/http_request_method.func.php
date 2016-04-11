<?php
/**
 * HTTP请求方法（GET/POST）
 * ================================
 * Copyright 2013-2014 David Tang
 * http://www.cnblogs.com/mchina/
 * ================================
 * Author:David|唐超
 * 个人微信：mchina_tang
 * 公众微信：zhuojinsz
 * Date:2014-05-07
 */

/**
 * 发送get请求
 * @param string $url
 * @return bool|mixed
 */
function http_get($url){

	if(!function_exists('file_get_contents')){
		$file_contents = file_get_contents($url);
	}else{
		//初始化一个cURL对象
		$ch = curl_init();
		$timeout = 5;
		//设置需要抓取的URL
		curl_setopt ($ch, CURLOPT_URL, $url);
		//设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		//在发起连接前等待的时间，如果设置为0，则无限等待
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		//运行cURL，请求网页
		$data = curl_exec($ch);
		//关闭URL请求
		curl_close($ch);
	}

	return $data;
}

/**
 * 发送post请求
 * @param string $url
 * @param string $param
 * @return bool|mixed
 */
function http_post($url = '', $param = ''){
	
	if(empty($url) || empty($param)) {
		return false;
	}
	
	$postUrl = $url;
	$curlPost = $param;
	$ch = curl_init(); //初始化curl
	curl_setopt($ch, CURLOPT_URL, $postUrl); //抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch); //运行curl
	$result = json_decode($data, true);
	curl_close($ch);
	
	return $result;
}

?>