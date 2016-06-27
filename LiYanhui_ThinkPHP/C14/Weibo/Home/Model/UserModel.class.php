<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $_auto = array(
		// string, 自动设置count字段为1
		// array('count', '1'),		//array('count', '1', 3, 'string')
		// function, 给密码加密，加密类型为sha1, sha1函数PHP内置
		// array('user', 'sha1', 3, 'function'),
		// 把email字段的值填充到user字段中去
		// array('user', 'email', 3, 'field'),
		// callback, 给用户名加前缀
		// array('user', 'addPrefix', 3, 'callback', '_'),
		// ignore, 用于修改时密码留空时，忽略修改
		array('user', '', 2, 'ignore'),
	);

	// 回调函数
	protected function addPrefix($str, $prefix) {
		return $prefix.$str;
	}
}

