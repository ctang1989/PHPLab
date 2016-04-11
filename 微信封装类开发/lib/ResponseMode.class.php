<?php
/*
 * 消息回复方式类
 */

class ResponseMode
{
	function responseText($postObj, $textContent)
	{
		$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[text]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				</xml>";
		$resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $textContent);
		return $resultStr;
	}
	
	function responseNews($postObj, $newsContent)
	{
		$newsTplHead = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>%s</ArticleCount>
		<Articles>";
		$newsTplBody = "<item>
		<Title><![CDATA[%s]]></Title>
		<Description><![CDATA[%s]]></Description>
		<PicUrl><![CDATA[%s]]></PicUrl>
		<Url><![CDATA[%s]]></Url>
		</item>";
		$newsTplFoot = "</Articles>
		</xml>";
	
		$bodyCount = count($newsContent);
		$bodyCount = $bodyCount < 10 ? $bodyCount : 10;
	
		$header = sprintf($newsTplHead, $postObj->FromUserName, $postObj->ToUserName, time(), $bodyCount);
	
		foreach($newsContent as $key => $value){
			$body .= sprintf($newsTplBody, $value['title'], $value['description'], $value['picUrl'], $value['url']);
		}
		
		$footer = $newsTplFoot;
	
		return $header.$body.$footer;
	}
	
	function responseNews_v2($postObj, $newsContent)
	{
		if(!is_array($newsContent)){
			return;
		}
		$itemTpl = "<item>
		<Title><![CDATA[%s]]></Title>
		<Description><![CDATA[%s]]></Description>
		<PicUrl><![CDATA[%s]]></PicUrl>
		<Url><![CDATA[%s]]></Url>
		</item>";
		$item_str = "";
		foreach ($newsContent as $item){
			$item_str .= sprintf($itemTpl, $item['title'], $item['description'], $item['picUrl'], $item['url']);
		}
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>%s</ArticleCount>
		<Articles>$item_str</Articles>
		</xml>";
	
		$resultStr = sprintf($xmlTpl, $postObj->FromUserName, $postObj->ToUserName, time(), count($newsContent));
		return $resultStr;
	}
	
	function responseImage($postObj, $mediaId)
	{
		$imageTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[image]]></MsgType>
				<Image>
				<MediaId><![CDATA[%s]]></MediaId>
				</Image>
				</xml>";
		$resultStr = sprintf($imageTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $mediaId);
		return $resultStr;
	}
	
}

?>
