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
        $user = M('User');
        
        // 连贯操作入门
        // var_dump($user->where('id>1')->order('id desc')->limit(2)->select());
        // 数组操作
        // var_dump($user->select(array('where'=>array('id'=>array('neq',1)),'order'=>'id desc','limit'=>2)));
        // CURD处理
        // var_dump($user->where('id in (1,2,3,4)')->find());
        /*var_dump($user->where('id=5')->delete());
        var_dump($user->select());*/

        // 连贯方法
        // 1. where
        /*$map['id'] = 1;
        var_dump($user->where($map)->select());*/
        /*$map['id'] = 1;
        var_dump($user->where($map)->where('user="蜡笔小新"')->select());*/
        // 2. order
        // var_dump($user->order('id DESC')->select());
        // var_dump($user->order(array('id'=>'DESC'))->select());
        // 3. field
        // var_dump($user->field('id,user')->select());
        // var_dump($user->field('SUM(id) AS count')->select());
        // var_dump($user->field(array('id','LEFT(user,3)'=>'left_user'))->select());
        // var_dump($user->field('*')->select());
        // 4. limit
        // var_dump($user->limit(2)->select());
        // var_dump($user->limit(1,2)->select());
        // 5. page
        // var_dump($user->page(2,2)->select());
        // 6. table
        // var_dump($user->table('think_info')->select());
        // var_dump($user->table('__USER__')->select());
        // var_dump($user->field('a.id,b.id')->table('__USER__ a, __INFO__ b')->select());
        var_dump($user->field('a.id,b.id')->table(array('think_user'=>'a','think_info'=>'b'))->select());
    }
}