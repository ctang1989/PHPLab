<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller {
    public function index(){
    	echo "User index";
    }
    public function model() {

        $user = M('User');

        // 1. 字符串作为条件查询
        // var_dump($user->where('id=1 AND user="蜡笔小新"')->select());

        // 2. 使用索引数组作为查询条件
        /*$condition['id'] = 1;
        $condition['user'] = '蜡笔小新';
        $condition['_logic'] = 'OR';
        var_dump($user->where($condition)->select());*/

        // 3. 使用对象方式来查询
        /*$condition = new \stdClass();
        $condition->id = 1;
        $condition->user = '蜡笔小新';
        var_dump($user->where($condition)->select());*/

        // 表达式查询
        // $map['id'] = array('eq', 1);
        // $map['id'] = array('neq', 1);
        // $map['id'] = array('gt', 1);
        // $map['id'] = array('egt', 1);
        // $map['id'] = array('lt', 1);
        // $map['id'] = array('elt', 1);
        // $map['user'] = array('like', '%小%');
        // $map['user'] = array('notlike', '%小%');
        // $map['user'] = array('like', array('%小%', '%蜡%'), 'AND');
        // $map['id'] = array('between', '1,3');
        // $map['id'] = array('between', array('1','3'));
        // $map['id'] = array('not between', '1,3');
        // $map['id'] = array('in', '1,2,4');
        // $map['id'] = array('not in', '1,2,4');
        // $map['id'] = array('exp', '=1');
        // $map['id'] = array('exp', 'in (1,2,3)');
        $map['id'] = array('exp', '=1');
        $map['user'] = array('exp', '="蜡笔小新"');
        $map['_logic'] = 'OR';

        var_dump($user->where($map)->select());
    }
}