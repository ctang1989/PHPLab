<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $patchValidate = true;
	protected $_validate = array(

		// 附加规则
		// array('user', array(1,3,5), '不在指定范围', 0, 'in'),
		// array('user', '张三,李四,王五', '不在指定范围', 0, 'in'),
		// array('user', array(1,3,5), '不得在指定范围', 0, 'notin'),
		// array('user', '张三,李四,王五', '不de在指定范围', 0, 'notin'),
		// array('user', array(3,5), '必须是3-5之间的数字', 0, 'between'),
		// array('user', '3,5', '必须是3-5之间的数字', 0, 'between'),
		// array('user', array(3,5), '必须不是3-5之间的数字', 0, 'notbetween'),
		// array('user', '3,5', '必须bu是3-5之间的数字', 0, 'notbetween'),

		// array('user', '2016-4-9, 2016-9-8', '不在指定日期范围内', 0, 'expire'),
		// IP禁止列表
		// array('user', '127.0.0.1', '您的IP被禁止', 0, 'ip_deny'),
		// IP允许列表
		// array('user', '128.0.0.1', '当前IP没有被允许', 0, 'ip_allow'),

		// 附加规则callback，回调验证
		// array('user', 'checkLength', '用户名必须在3-5位之间', 0, 'callback', 3, array(3,5)),
		// 附加规则function，函数验证
		// 在Common文件夹下的Common文件夹建立function.php文件，会自动加载
		array('user', 'checkLength', '用户名必须在3-5位之间', 0, 'function', 3, array(3,5)),
		array('email', 'email', '邮箱格式不正确'),
	);

	// 回调方法
	protected function checkLength($str, $min, $max) {
		preg_match_all('/./u', $str, $matches);
		// var_dump($matches[0]);
		$len = count($matches[0]);
		if ($len < $min || $len > $max) {
			return false;
		} else {
			return true;
		}
	}
}

