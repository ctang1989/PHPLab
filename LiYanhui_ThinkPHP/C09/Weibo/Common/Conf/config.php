<?php
return array(
	//'配置项'=>'配置值'
	// 禁止访问模块
	// 'MODULE_DENY_LIST'=>array('Common','Runtime','Admin'),
	// 允许访问的模块
	// 'MODULE_ALLOW_LIST'=>array('Home','Admin'),
	// 设置默认的加载模块
	// 'DEFAULT_MODULE'=>'Admin',
	// 单模块设置
	// 'MULTI_MODULE'=>false,
	// 设置PATHINFO的URL分隔符
	// 'URL_PATHINFO_DEPR'=>'_',
	// 修改键名称
	// 'VAR_MODULE'=>'mm',
	// 'VAR_CONTROLLER'=>'cc',
	// 'VAR_ACTION'=>'aa',

	// mysql全局定义
	/*
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_USER'=>'root',
	'DB_PWD'=>'abc123',
	'DB_NAME'=>'thinkphp',
	'DB_PORT'=>3306,
	'DB_PREFIX'=>'think_',
	*/
	// PDO专用定义
	'DB_TYPE'=>'pdo',
	'DB_USER'=>'root',
	'DB_PWD'=>'abc123',
	'DB_PREFIX'=>'think_',
	'DB_DSN'=>'mysql:host=localhost;dbname=thinkphp;charset=UTF8',

	// 页面Trace
	'SHOW_PAGE_TRACE'=>true,

);