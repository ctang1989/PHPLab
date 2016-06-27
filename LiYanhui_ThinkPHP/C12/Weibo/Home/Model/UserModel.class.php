<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $_validate = array(
		// 验证规则
		// array('user', 'require', '用户名不得为空！', 0, 'regex', 3),
		// array('user', 'email', '邮箱格式不正确！'),
		// array('user', 'url', 'URL格式不合法！'),
		// array('user', 'currency', '货币格式不正确！'),
		// array('user', 'zip', '邮政编码格式不正确！'),
		// array('user', 'number', '必须是正整数！'),
		// array('user', 'integer', '必须是整数！'),
		// array('user', 'double', '必须是浮点数！'),
		// array('user', 'english', '必须是纯英文！'),

		// 附加规则
		// array('user', '/^\d{3,6}$/', '不是3-6位纯数字！', 0, 'regex'),
		// array('user', '唐超', '值不相等', 0, 'equal'),
		// array('user', '唐超', '值不能相等', 0, 'notequal'),
		array('user', 'name', '两个值不相同', 0, 'confirm'),
	);
}