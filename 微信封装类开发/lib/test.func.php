<?php
/*
 * 测试文件
 */

require_once('config.php');
require_once('http_request_method.func.php');

function baiduLocal($latitude, $longitude, $searched_for){

	//百度密钥
	global $config;
	$ak = $config['baidu_ak'];
	//单页上所获取的数据的数目，默认为10条数据，单页最多可输出20条数据；
	$number = '10';
	//搜索半径
	$radius = '5000';

	//请求URL
	$url = "http://api.map.baidu.com/telematics/v3/local?location=".$longitude.",".$latitude."&radius=".$radius."&keyWord=".$searched_for."&output=json&number=".$number."&ak=".$ak;

	$json = http_get($url);
	$data = json_decode($json, true);

	return $data;
}

//苏州
$res_suzhou = baiduLocal("31.328328", "120.719149", "酒店");

print_r($res_suzhou);

?>