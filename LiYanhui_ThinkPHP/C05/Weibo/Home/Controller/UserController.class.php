<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    public function test($user, $pass){
    	echo "user : ".$user."<br />pass : ".$pass;
    }
    public function model() {
    	// $user = D('Admin/User');
        // var_dump($user->select());
        $user = M();
    	var_dump($user->query("SELECT * FROM think_user WHERE user='路飞'"));
    }
}