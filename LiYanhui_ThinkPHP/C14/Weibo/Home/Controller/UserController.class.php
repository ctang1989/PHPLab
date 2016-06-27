<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    // 自动完成
    public function add() {
        $user = D('User');
        $data['id'] = 17;
        $data['user'] = '';
        $data['email'] = 'mchina.tang@gmail.com';
        if ($user->create($data)) {
            // $user->add();
            $user->save();
        }
    }
    // 动态完成
    public function add2() {
        $rules = array(
            array('user', 'sha1', 3, 'function'),
        );
        $user = M('User');
        $data['user'] = '蜡笔小新';
        if ($user->auto($rules)->create($data)) {
            $user->add();
        }
    }
}