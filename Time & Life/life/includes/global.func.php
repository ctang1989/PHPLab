<?php
ob_start();
header('Content-Type: text/html; charset=UTF-8');

//Mysqli
require_once 'MysqliDb.class.php';
//实例化
$mysqli = new MysqliDb();

/**
 * _setcookies() 生成登录cookies
 * @param unknown_type $_username
 */
function _setcookies($_username){
	setcookie('username',$_username);
}

function _manage_login(){
	if ((!isset($_COOKIE['username']))||(!isset($_SESSION['admin']))){
		_alert_back('非法登录！');
	}
}

//验证登录
function _check_admin($username,$password){
	//实例化
	$mysqli = new MysqliDb();
	$_result = $mysqli->_fetch_array("select username,password from tbl_admin where username='$username'");
		
	if (sha1($password) == $_result['password']){
		return $_result['username'];
	}else {
		return '';
	}
}

function _check_null($_string){

	//去掉两边的空格
	$_string=trim($_string);

	//姓名为空
	if (mb_strlen($_string,'utf-8') < 1){
		_alert_back('内容不能为空！');
	}

	return $_string;

}

/**
 * _alert_back()表是JS弹窗
 * @access public
 * @param $_info
 * @return void 弹窗
 */
function _alert_back($_info){
	echo "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
	exit();
}

function _alert_close($_info){
	echo "<script type='text/javascript'>alert('".$_info."');window.close();</script>";
	exit();
}

function _location($_info,$_url){
	if (!empty($_info)){
		echo "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
		exit();
	}else {
		header('Location:'.$_url);
	}
}

/**
 * _title() 标题截取函数
 * @param string $_string
 * @return string
 */
function _title($_string,$_strlen){
	if (mb_strlen($_string,'utf-8') > $_strlen ){
		$_string = mb_substr($_string,0,$_strlen,'utf-8').'...';
	}
	return $_string;
}

/**
 * _page() 分页模块
 * @param unknown_type $_sql
 * @param unknown_type $_size
 */
function _page($_sql,$_size){
	
	//实例化
	$mysqli = new MysqliDb();
	
	global $_page,$_pagesize,$_pageabsolute,$_pagenum,$_num;
	if (isset($_GET['page'])){
		$_page = $_GET['page'];
		if (empty($_page)||($_page<=0)||(!is_numeric($_page))){
			$_page = 1;
		}else{
			$_page = intval($_page);
		}
	}else{
		$_page = 1;
	}
	//设置每页显示条数
	$_pagesize = $_size;
	//首页要得到所有数据的总和
	//$_num = _num_rows(_query($_sql));
	//Mysqli方式
	$_num = $mysqli->_num_rows($mysqli->_query($_sql));
	if ($_num == 0){
		$_pageabsolute = 1;
	}else{
		$_pageabsolute = ceil($_num / $_pagesize);
	}
	//如果手动输入的 page = * > 实际的总页数，则 $_page = 最大页数
	if ($_page > $_pageabsolute){
		$_page = $_pageabsolute;
	}
	//计算总共多少页
	$_pagenum = ($_page - 1) * $_pagesize;
}

/**
 * _paging() 分页函数
 * @param $_type
 */
function _paging($_type,$_desc){
	global $_page, $_pageabsolute, $_num,$_id;
	if ($_type == 1){
		echo '<div id="page_num">';
		echo '<ul>';
		for ($i=0; $i<$_pageabsolute; $i++){
			if ($_page == ($i+1)){
				echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.($i+1).'">'.($i+1).'</a></li>';
			}else{
				echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.($i+1).'">'.($i+1).'</a></li>';
			}
		}
		echo '</ul>';
		echo '</div>';
	}elseif ($_type == 2){
		echo '<div id="page_text">';
		echo '<ul>';
		echo '<li>'.$_page.'/'.$_pageabsolute.'页 | </li>';
		echo '<li>共有<strong>'.$_num.'</strong>'.$_desc.' | </li>';
			if ($_page == 1){
				echo '<li>首页 | </li>';
				echo '<li>上一页 | </li>';
			}else{
				echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'">首页</a> | </li>';
				echo '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?'.$_id.'page='.($_page - 1).'">上一页</a> | </li>';
			}
			if ($_page == $_pageabsolute){
				echo '<li>下一页 | </li>';
				echo '<li>尾页</li>';
			}else{
				echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.($_page + 1).'">下一页</a> | </li>';
				echo '<li><a href="'.SCRIPT.'.php?'.$_id.'page='.$_pageabsolute.'">尾页</a></li>';
			}
		echo '</ul>';
		echo '</div>';
	}else{
		_paging(2, "条数据");
	}
}

/**
 * _session_destory() 删除session
 */
function _session_destory(){
	if (session_start()){
		session_destroy();
	}
}

/**
 * _unsetcookies() 删除cookies
 */
function _unsetcookies(){
	setcookie('username','',time()-1);
	_session_destory();
	_location(null, 'index.php');
}

?>

