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
        // 跨模块实例化
    	// $user = D('Admin/User');
        // var_dump($user->select());

        // 使用原生SQL语句
        // $user = M();
    	// var_dump($user->query("SELECT * FROM think_user WHERE user='路飞'"));

        // 字段缓存
        // $user = M('User');
        // var_dump($user->getDbFields());

        // 使用手动定义数据表字段的方式取代字段缓存方式
        $user = D('User');
        var_dump($user->getDbFields());
    }
}