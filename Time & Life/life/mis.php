<?php
/**
 * 慧联信息管理系统
 * ==================================
 * Copyright (c) 2013-2015 Tang Chao
 * 乐思乐享博客园
 * http://www.cnblogs.com/mchina/
 * ==================================
 * Author:唐 超
 * 个人微信：mchina_tang
 * 公众微信：zhuojinsz
 * Date:2015-03-11
 */

require_once 'includes/global.func.php';

//处理登录
if($_GET['action'] == 'login'){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$name = _check_admin($username,$password);

	if($name!=""){
		_setcookies($username);
		_location('','index.php');
		exit();
	}else {
		_alert_back('用户名/密码错误，登录失败！');
		exit();
	}
}

//新增旅游基金
if ($_GET['action'] == 'new_travel_fund'){
	
	$income_date = _check_null($_POST['income_date']);
	$income_account = _check_null($_POST['income_account']);
	$income_item = _check_null($_POST['income_item']);
	$income_amount = _check_null($_POST['income_amount']);
	
	//获取账户余额
	$_result = $mysqli->_fetch_array("SELECT MAX(account_balance) AS account_balance FROM tbl_travel_fund");
	$last_account_balance = $_result['account_balance'];
	
	$account_balance = $last_account_balance + $income_amount;

	$mysqli->_dml("INSERT INTO tbl_travel_fund(income_date,income_account,income_item,income_amount,account_balance) 
				  VALUES('{$income_date}','{$income_account}','{$income_item}','{$income_amount}','{$account_balance}')");
	
	//判断是否添加成功
	if ($mysqli->_affected_rows()==1){
		//_close();
		_location('新增旅游基金成功！','index.php');
	}else {
		//_close();
		_alert_back('新增旅游基金失败！');
	}
}

//新增提前还款
if ($_GET['action'] == 'new_advance_repay'){

	$income_date = _check_null($_POST['income_date']);
	$income_account = _check_null($_POST['income_account']);
	$income_item = _check_null($_POST['income_item']);
	$income_amount = _check_null($_POST['income_amount']);

	//获取账户余额
	$_result = $mysqli->_fetch_array("SELECT MAX(account_balance) AS account_balance FROM tbl_advance_repay");
	$last_account_balance = $_result['account_balance'];

	$account_balance = $last_account_balance + $income_amount;

	$mysqli->_dml("INSERT INTO tbl_advance_repay(income_date,income_account,income_item,income_amount,account_balance)
			VALUES('{$income_date}','{$income_account}','{$income_item}','{$income_amount}','{$account_balance}')");

			//判断是否添加成功
			if ($mysqli->_affected_rows()==1){
				_location('新增成功！','advance_repay.php');
			}else {
				_alert_back('新增失败！');
			}
}

//新增巴比伦财富
if ($_GET['action'] == 'new_babylon_wealth'){

	$income_date = _check_null($_POST['income_date']);
	$income_account = _check_null($_POST['income_account']);
	$income_item = _check_null($_POST['income_item']);
	$income_amount = _check_null($_POST['income_amount']);

	//获取账户余额
	$_result = $mysqli->_fetch_array("SELECT MAX(account_balance) AS account_balance FROM tbl_babylon_wealth");
	$last_account_balance = $_result['account_balance'];

	$account_balance = $last_account_balance + $income_amount;

	$mysqli->_dml("INSERT INTO tbl_babylon_wealth(income_date,income_account,income_item,income_amount,account_balance)
			VALUES('{$income_date}','{$income_account}','{$income_item}','{$income_amount}','{$account_balance}')");

	//判断是否添加成功
	if ($mysqli->_affected_rows()==1){
		_location('新增成功！','babylon_wealth.php');
	}else {
		_alert_back('新增失败！');
	}
}

//新增工资收入
if ($_GET['action'] == 'new_wage_income'){

	$income_date = _check_null($_POST['income_date']);
	$income_account = _check_null($_POST['income_account']);
	$company = _check_null($_POST['company']);
	$income_amount = _check_null($_POST['income_amount']);

	$mysqli->_dml("INSERT INTO tbl_wage_income(income_date,income_account,company,income_amount)
			VALUES('{$income_date}','{$income_account}','{$company}','{$income_amount}')");

	//判断是否添加成功
	if ($mysqli->_affected_rows()==1){
		_location('新增成功！','wage_income.php');
	}else {
		_alert_back('新增失败！');
	}
}

//新增项目信息
if ($_GET['action'] == 'new_project_charge'){
	$project_name = _check_null($_POST['project_name']);
	$project_begin_date = _check_null($_POST['project_begin_date']);
	$project_end_date = $_POST['project_end_date'];
	$income_account = _check_null($_POST['income_account']);
	$project_charge = _check_null($_POST['project_charge']);

	$mysqli->_dml("INSERT INTO tbl_project_charge(project_name,project_begin_date,project_end_date,income_account,project_charge)
			VALUES('{$project_name}','{$project_begin_date}','{$project_end_date}','{$income_account}','{$project_charge}')");

	//判断是否添加成功
	if ($mysqli->_affected_rows()==1){
		//_close();
		_location('新增项目信息成功！','project.php');
	}else {
		//_close();
		_alert_back('新增项目信息失败！');
	}
}

//删除项目
if ($_GET['action'] == 'delete_project' && isset($_GET['del_id'])){
	//验证项目信息是否合法
	$_rows = $mysqli->_fetch_array("SELECT id FROM tbl_project_charge WHERE id='{$_GET['del_id']}' LIMIT 1");
	if ($_rows){
		
		//删除项目信息
		$mysqli->_dml("DELETE FROM tbl_project_charge WHERE id='{$_GET['del_id']}' LIMIT 1");
		
		//判断是否删除成功
		if ($mysqli->_affected_rows()==1){
			//_close();
			_location('项目信息删除成功！','project.php');
		}else {
			//_close();
			_alert_back('项目信息删除失败！');
		}
	}else{
		_alert_back('此项目信息不存在！');
	}
}


?>