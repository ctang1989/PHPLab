<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {

	protected $fields = array('id', 'user', '_pk'=>'id',
								'type'=>array('id'=>'smallint','user'=>'varchar'));

	public function __construct() {
		parent::__construct();
		echo '\Home';
	}
}


?>