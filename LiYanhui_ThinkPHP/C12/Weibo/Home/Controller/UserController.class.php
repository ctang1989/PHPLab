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

        // 验证规则
        // $data['user'] = '蜡笔小新';
        // $data['user'] = 'mchina_tang@qq.com';
        // $data['user'] = 'http://www.google.com';
        // $data['user'] = 'A22.22';
        // $data['user'] = '2212221';
        // $data['user'] = '-221';
        // $data['user'] = '221.2';
        // $data['user'] = '2212.1a';
        // $data['user'] = 'abc123';

        // 附加规则
        // $data['user'] = '111';
        // $data['user'] = '唐超';
        // $data['user'] = '唐超Q';
        $data['user'] = '唐超Q';
        $data['name'] = '唐超QW';

        if ($user->create($data)) {
            echo "所有数据验证成功！";
        } else {
            var_dump($user->getError());
        }
    }
}