<?php
header("Content-type:text/html;charset=utf-8");

function bmi($height,$weight){
	$res = $weight / pow(($height/100),2);
	$res = sprintf('%.1f',$res);
	
	$info = "您的身体质量指数（BMI）是：".$res."\n身体状态：";
	
	if ($res <= 18.4){
		$status = "偏瘦";
	}elseif ($res >=18.5 && $res <=23.9){
		$status = "正常";
	}elseif ($res >=24.0 && $res <=27.9){
		$status = "过重";
	}elseif ($res >=28.0){
		$status = "肥胖";
	}
	
    return $info.$status;
}

?>