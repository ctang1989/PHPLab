<?php
/**
  * 微信集成开发
  * @author: 唐超
  * 个人微信：mchina_tang
  * ================================
  * Copyright 2013-2015 David Tang
  * http://www.cnblogs.com/mchina/
  * ================================
  * Date: 2015-12-13
  */

//文本定义文件
require_once('lib/common.inc.php');
//配置文件
require_once('lib/config.php');
//回复消息类
require_once('lib/ResponseMode.class.php');
//数据库类
require_once('lib/MysqliDb.class.php');
//百度开发类
require_once('lib/BaiduApi.class.php');

//define your token
define("TOKEN", "weixin");
$wechatObj = new wechat();
if (isset($_GET['echostr'])){
	$wechatObj->valid();
}else{
	$wechatObj->responseMsg();
}

class wechat
{
	public function __construct()
	{
		$this->responseMode = new ResponseMode();
		$this->baiduApi = new BaiduApi();
		$this->mysqli = new MysqliDb();
	}
	
	public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				$RX_TYPE = trim($postObj->MsgType);

				switch($RX_TYPE)
				{
					case "text":
						$resultStr = $this->handleText($postObj);
						break;
					case "image":
						$resultStr = $this->handleImage($postObj);
						break;
					case "event":
						$resultStr = $this->handleEvent($postObj);
						break;
					case "location":
						$resultStr = $this->handleLocation($postObj);
						break;
					default:
						$resultStr = "Unknow msg type: ".$RX_TYPE;
						break;
				}
				echo $resultStr;
		}else{
			echo "";
			exit;
		}
	}

	public function handleText($postObj)
	{
		$fromusername= $postObj->FromUserName;
		$keyword = trim($postObj->Content);
	
		if(!empty($keyword)){
			//用户输入“帮助”，则输出欢迎语
			if($keyword == "帮助" || $keyword == "菜单" || $keyword == "功能" || $keyword == "导航" || $keyword == "提示" || $keyword == "？" || $keyword == "?"){
				$content = MOTD;
			}else if($keyword == "图文"){
				$content = array();
				$content[] = array(
						"title" => "苏州旅游攻略",
						"description" => "测试",
						"picUrl" => "http://1.microsz.sinaapp.com/images/suzhou/shantangjie.jpg",
						"url" => "http://www.baidu.com"
				);
				$content[] = array(
						'title' => '苏州旅游攻略',
						'description' => '测试',
						'picUrl' => 'http://1.microsz.sinaapp.com/images/suzhou/shantangjie.jpg',
						'url' => 'http://www.baidu.com'
				);
			}else if($keyword == "图片"){
				$content = array();
				$content = array(
						"mediaId"=>"dl25n6zKS3M3eyL4ToknDHGllGwhx-IvKf94XV_6W4zDwsOkTa7BmuTNlmdOOGyr"
				);
			}else if($keyword == "天气"){
				$content = $this->baiduApi->weather("苏州");
			}else if($keyword == "身份证"){
				$content = $this->baiduApi->idCard('320381198910204420');
			}else if($keyword == "附近"){
				$searched_for = "美食";
				$del_sql = "DELETE FROM tbl_weixin_user_status WHERE from_user = '$fromusername'";
				$this->mysqli->execute_dml($del_sql);
				$query_sql = "INSERT INTO tbl_weixin_user_status(from_user, searched_for) VALUES('$fromusername', '$searched_for');";
				$this->mysqli->execute_dml($query_sql);
				$content = "请将您的位置信息发送给我\n点击右下角(+) > [位置] > [发送位置]";
				//调试用
				//$content = $this->baiduApi->baiduLocal("31.326531", "120.722419", "酒店");
			}else{
				$content = "默认回复";
			}
			
			if (is_array($content)){
				if (isset($content[0]['title'])){
                    $result = $this->responseMode->responseNews($postObj, $content);
                }else if (isset($content['mediaId'])){
                    $result = $this->responseMode->responseImage($postObj, $content['mediaId']);
                }
			}else{
				$result = $this->responseMode->responseText($postObj, $content);
			}
			return $result;
			
		}else{
			echo "Input something...";
		}
	}
	
	public function handleImage($postObj)
	{
		$mediaId = $postObj->MediaId;
		$result = $this->responseMode->responseText($postObj, $mediaId);
		return $result;
	}

    public function handleEvent($postObj)
    {
        $contentStr = "";
        
        switch ($postObj->Event)
        {
            case "subscribe":
                $content = MOTD;
                break;
            case "CLICK":
            	switch ($postObj->EventKey)
            	{
            		case "xxxx":
            			$content = MOTD;
            			break;
            	}
				break;
            default :
                $content = "Unknow Event: ".$postObj->Event;
                break;
        }
        
        if (is_array($content)){
        	if (isset($content[0]['title'])){
        		$result = $this->responseMode->responseNews($postObj, $content);
        	}else if (isset($content['mediaId'])){
        		$result = $this->responseMode->responseImage($postObj, $content['mediaId']);
        	}
        }else{
        	$result = $this->responseMode->responseText($postObj, $content);
        }
        return $result;
    }
    
    public function handleLocation($postObj)
    {
    	$fromusername = $postObj->FromUserName;
    	$latitude = $postObj->Location_X;	//纬度
    	$longitude = $postObj->Location_Y;	//经度
    	 
    	$result = $this->mysqli->fetchOne("SELECT searched_for FROM tbl_weixin_user_status WHERE from_user='{$fromusername}'");
    	$searched_for = $result[searched_for];
    	 
    	$resultStr = $this->baiduApi->baiduLocal($latitude, $longitude, $searched_for);
    	
    	if (is_array($resultStr)){
			if (isset($resultStr[0]['picUrl'])){
                $result = $this->responseMode->responseNews($postObj, $resultStr);
            }else {
            	$result = $this->responseMode->responseText($postObj, "数组错误");
            }
		}else{
			$result = $this->responseMode->responseText($postObj, $resultStr);
		}
		return $result;
    }
		
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }
}

?>