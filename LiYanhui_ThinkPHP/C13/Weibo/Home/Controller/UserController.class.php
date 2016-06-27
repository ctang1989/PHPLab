<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    // 自动验证
    public function add() {
        $user = D('User');

        // 附加规则
        // $data['user'] = '2';
        // $data['user'] = '张三A';
        // $data['user'] = '3';
        // $data['user'] = '张三';
        // $data['user'] = '4';
        // $data['user'] = '6';
        // $data['user'] = '4';
        // $data['user'] = '6';

        // $data['user'] = '2016-8-10A';
        // $data['user'] = '128.0.0.1';
        // $data['user'] = '128.0.0.1A';

        $data['user'] = '唐超11111';
        $data['email'] = 'abc@123';

        if ($user->create($data)) {
            echo "所有数据验证成功！";
        } else {
            var_dump($user->getError());
            // 返回JSON格式
            // $this->ajaxReturn($user->getError());
        }
    }
    // 动态验证
    public function add2() {
        $rules = array(
            array('user', 'require', '用户名不得为空'),
        );
        $user = M('User');
        $data['user'] = '';
        if ($user->validate($rules)->create($data)) {
            echo "所有数据验证成功！";
        } else {
            var_dump($user->getError());
        }
    }
}