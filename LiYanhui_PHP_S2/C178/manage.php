<?php
// 设置utf-8编码
header('Content-Type:text/html;charset=utf-8');

// 模型
require 'Model.class.php';
// 实体类
require 'Manage.class.php';
// 业务基类
require 'Action.class.php';
// 业务控制器
require 'ManageAction.class.php';
// 入口
new Manage();

?>