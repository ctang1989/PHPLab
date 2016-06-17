<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

header("Content-Type: text/html;charset=utf-8");

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    public function model() {

    }
    // 数据创建
    public function create() {
        // $user = M('User');

        // 根据表单提交的POST数据，创建数据对象
        // var_dump($user->create());

        // 覆盖提交
        /*$data['user'] = '樱桃小丸子';
        $data['email'] = 'xiaowanzi@qq.com';
        var_dump($user->create($data));*/

        // 数组方式
        /*$data['user'] = $_POST['user'];
        $data['email'] = $_POST['email'];
        $data['date'] = date('Y-m-d H:i:s');
        var_dump($user->create($data));*/

        // 对象方式
        /*$data = new \stdClass();
        $data->user = $_POST['user'];
        $data->email = $_POST['email'];
        $data->date = date('Y-m-d H:i:s');
        var_dump($user->create($data));*/

        // 默认是$_POST, 传递$_GET修改
        // var_dump($user->create($_GET));

        // 第二个参数，将要操作的模式
        // var_dump($user->create($_POST, Model::MODEL_INSERT));
        // var_dump($user->create($_POST, Model::MODEL_UPDATE));

        // 限制可操作的字段
        // var_dump($user->field('user')->create());

        // 在模型类里限制字段
        $user = D('User');
        var_dump($user->create());
    }
    // 数据写入
    public function add() {
        /*$user = M('User');
        $data['user'] = '唐超';
        $data['email'] = 'ctang@qq.com';
        $data['date'] = date('Y-m-d H:i:s');
        $user->add($data);*/

        // 结合create()方法
        $user = M('User');
        $data = $user->create();
        $data['date'] = date('Y-m-d H:i:s');
        // $user->add($data);

        // 使用data连贯方法
        // $user->data($data)->add();

        // data连贯方法，支持字符串、数组、对象
        $data = 'user=星矢&email=xingshi@qq.com&date='.date('Y-m-d H:i:s');
        $user->data($data)->add();
    }
}