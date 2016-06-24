<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $_map = array(
		'xingming'=>'user',
		'youxiang'=>'email',
	);
}