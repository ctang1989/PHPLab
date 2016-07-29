<?php

class Manage extends Model {

	// 构造
	public function __construct() {
		new ManageAction($this);
	}

	// 新增管理员
	public function addManage() {
		return "新增".parent::cg();
	}

	// 删除管理员
	public function deleteManage() {
		return "删除".parent::ok();
	}
}
?>