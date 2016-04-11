<?php
/*
 * 百度接口类
 */
require_once('http_request_method.func.php');
//require_once('Tools.class.php');

class BaiduApi
{
	/* public function __construct(){
		$this->tools = new Tools();
	} */
	
	//天气信息查询
	function weather($city_name){
	
		global $config;
		$ak = $config['baidu_ak'];
		$url = "http://api.map.baidu.com/telematics/v3/weather?location=".$city_name."&output=json&ak=".$ak;
	
		$json = http_get($url);
		$result = json_decode($json, true);
	
		if($result['status'] == 'success'){
			
			$results = $result['results'][0];
			
			//城市名
			$cityname = $results['currentCity'];
	
			//PM2.5
			$pm25 = $results['pm25'];
	
			//穿衣
			$cyzs_tipt = $results['index'][0]['tipt'];
			$cyzs_zs = $results['index'][0]['zs'];
			$cyzs_des = $results['index'][0]['des'];
	
			//洗车
			$xczs_tipt = $results['index'][1]['tipt'];
			$xczs_zs = $results['index'][1]['zs'];
			$xczs_des = $results['index'][1]['des'];
	
			//旅游
			$lvzs_tipt = $results['index'][2]['tipt'];
			$lvzs_zs = $results['index'][2]['zs'];
			$lvzs_des = $results['index'][2]['des'];
	
			//感冒
			$gmzs_tipt = $results['index'][3]['tipt'];
			$gmzs_zs = $results['index'][3]['zs'];
			$gmzs_des = $results['index'][3]['des'];
	
			//运动
			$ydzs_tipt = $results['index'][4]['tipt'];
			$ydzs_zs = $results['index'][4]['zs'];
			$ydzs_des = $results['index'][4]['des'];
	
			//紫外线强度
			$zwxzs_tipt = $results['index'][5]['tipt'];
			$zwxzs_zs = $results['index'][5]['zs'];
			$zwxzs_des = $results['index'][5]['des'];
	
			$today_date = $results['weather_data'][0]['date'];
			$today_pic = $results['weather_data'][0]['dayPictureUrl'];
			$today_weather = $results['weather_data'][0]['weather'];
			$today_wind = $results['weather_data'][0]['wind'];
			$today_temperature = $results['weather_data'][0]['temperature'];
	
			$tomorrow_date = $results['weather_data'][1]['date'];
			$tomorrow_pic = $results['weather_data'][1]['dayPictureUrl'];
			$tomorrow_weather = $results['weather_data'][1]['weather'];
			$tomorrow_wind = $results['weather_data'][1]['wind'];
			$tomorrow_temperature = $results['weather_data'][1]['temperature'];
	
			//dat = The day after tomorrow
			$dat_date = $results['weather_data'][2]['date'];
			$dat_pic = $results['weather_data'][2]['dayPictureUrl'];
			$dat_weather = $results['weather_data'][2]['weather'];
			$dat_wind = $results['weather_data'][2]['wind'];
			$dat_temperature = $results['weather_data'][2]['temperature'];
	
			//tdfn = three days from now
			$tdfn_date = $results['weather_data'][3]['date'];
			$tdfn_pic = $results['weather_data'][3]['dayPictureUrl'];
			$tdfn_weather = $results['weather_data'][3]['weather'];
			$tdfn_wind = $results['weather_data'][3]['wind'];
			$tdfn_temperature = $results['weather_data'][3]['temperature'];
			
			$record = array();
			$record[0] = array(
					'title' => "$cityname"."天气预报",
					'description' => "$cityname"."天气预报",
					'picUrl' => 'http://1.thinkpark.sinaapp.com/images/weather.jpg',
					'url' => ''
			);
			$record[1] = array(
					'title' => "$today_date"."\n"."$today_weather"." "."$today_wind"."\n"."$today_temperature",
					'description' => "$cityname"." "."$today_weather"." "."$today_wind"." "."$today_temperature",
					'picUrl' => "$today_pic",
					'url' => ''
			);
			$record[2] = array(
					'title' => "$tomorrow_date"."\n"."$tomorrow_weather"." "."$tomorrow_wind"."\n"."$tomorrow_temperature",
					'description' => "$tomorrow_date"."\n"."$tomorrow_weather"." "."$tomorrow_wind"."\n"."$tomorrow_temperature",
					'picUrl' => "$tomorrow_pic",
					'url' => ''
			);
			$record[3] = array(
					'title' => "$dat_date"."\n"."$dat_weather"." "."$dat_wind"."\n"."$dat_temperature",
					'description' => "$dat_date"."\n"."$dat_weather"." "."$dat_wind"."\n"."$dat_temperature",
					'picUrl' => "$dat_pic",
					'url' => ''
			);
			$record[4] = array(
					'title' => "$tdfn_date"."\n"."$tdfn_weather"." "."$tdfn_wind"."\n"."$tdfn_temperature",
					'description' => "$tdfn_date"."\n"."$tdfn_weather"." "."$tdfn_wind"."\n"."$tdfn_temperature",
					'picUrl' => "$tdfn_pic",
					'url' => ''
			);
			//PM2.5
			$record[5] = array(
					'title' => "PM2.5: ".$pm25,
					'description' => "",
					'picUrl' => "http://1.thinkpark.sinaapp.com/images/pm25.jpg",
					'url' => ''
			);
			//指数
			$record[6] = array(
					'title' => "☞".$cyzs_tipt." ".$cyzs_zs." ".$cyzs_des."\n☞".$xczs_tipt." ".$xczs_zs." ".$xczs_des."\n☞".$lvzs_tipt." ".$lvzs_zs." ".$lvzs_des."\n☞".$gmzs_tipt." ".$gmzs_zs." ".$gmzs_des."\n☞".$ydzs_tipt." ".$ydzs_zs." ".$ydzs_des."\n☞".$zwxzs_tipt." ".$zwxzs_zs." ".$zwxzs_des,
					'description' => "",
					'picUrl' => "",
					'url' => ''
			);
	
			$result = $record;
		}else{
			$result = "未查询到【".$city_name."】的天气信息！";
		}
		
		return $result;
	}
	
	//身份证信息查询
	function idCard($id){
	
		$ch = curl_init();
		$url = 'http://apis.baidu.com/apistore/idservice/id?id='.$id;
		$header = array(
				'apikey: 68d787d4d20bc6e72970c29e6f589017',
		);
		// 添加apikey到header
		curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 执行HTTP请求
		curl_setopt($ch , CURLOPT_URL , $url);
		$json = curl_exec($ch);
		$result = json_decode($json,true);
	
		if ($result['retData']['sex'] == "M"){
			$sex = "男";
		}else if ($result['retData']['sex'] == "F"){
			$sex = "女";
		}else {
			$sex = "未知";
		}
	
		//return $result;
		if ($result['errNum'] == 0){
			$content = "身份证号码：".$id."\n性别：".$sex."\n出生日期：".$result['retData']['birthday']."\n发证地：".$result['retData']['address'];
		}else{
			$content = $result['retMsg'];
		}
	
		return $content;
	}
	
	//百度周边信息查询
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
	
		if($data['status'] == 'Success'){
	
			//搜索到的信息列表
			$record = $data['pointList'];
	
			$arr = array();
			$arr[0] = array(
					'title' => '附近5公里内'.$searched_for.'信息',
					'description' => '',
					'picUrl' => 'http://1.thinkpark.sinaapp.com/images/location_header.jpg',
					'url' => ''
			);
			for($i=1; $i<count($record); $i++){
				//名称
				$name = $record[$i]['name'];
				//地址
				$address = $record[$i]['additionalInformation']['address'];
				//电话
				if(!empty($record[$i]['additionalInformation']['telephone'])){
					$telephone = "\n电话：".$record[$i]['additionalInformation']['telephone'];
				}else{
					$telephone = "";
				}
				//距离
				if (($record[$i]['distance']) < 1000){
					$distance = $record[$i]['distance']."米";
				}else{
					$distance = sprintf("%1.1f千米",($record[$i]['distance']/1000));
				}
				$url = $record[$i]['additionalInformation']['link'][0]['url'];
				//$url_shorten = $this->tools->baiduShortUrl($url);
					
				$arr[$i] = array(
						'title' => $name." ".$distance.$telephone."\n".$address,
						'description' => '',
						'picUrl' => 'http://1.thinkpark.sinaapp.com/images/location.jpg',
						'url' => $url
				);
			}
	
			$result = $arr;
		}else{
			$result = "木有查询到附近".$searched_for."信息";
		}
		
		return $result;
	}
	
}

?>

