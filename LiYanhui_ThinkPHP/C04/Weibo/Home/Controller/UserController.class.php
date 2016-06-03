<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
// use Think\Model;

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    public function test($user, $pass){
    	echo "user : ".$user."<br />pass : ".$pass;
    }
    public function model() {
    	// 创建Model基类，传递User表，think_user
    	// $user = new Model('User');
    	// $user = new Model('User', 'tp_');
    	// $user = new Model('User', 'think_', 'mysql://root:abc123@localhost/thinkphp');
    	// var_dump($user);

    	// M()方法不需要导入命名空间 => // use Think\Model;
    	// $user = M('User');

    	$user = new UserModel();
    	
    	var_dump($user->select());
    }
}