<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $_scope = array(
		'sql1'=>array(
			'where'=>array('id'=>1),
		),
		'sql2'=>array(
			'order'=>array('date'=>'DESC'),
			'limit'=>2,
		),
		'default'=>array(
			'where'=>array('id'=>2),
		),
	);
}