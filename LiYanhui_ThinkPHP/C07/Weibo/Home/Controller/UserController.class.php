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

        // 快捷查询
        // 1. 不同字段相同查询条件
        // $map['user|email'] = '蜡笔小新';
        // $map['user&email'] = '蜡笔小新';

        // 2. 不同字段不同查询条件
        // $map['id&user'] = array(1, '蜡笔小新', '_multi'=>true);

        // 支持使用表达式结合快捷查询
        // $map['id&user'] = array(array('gt', 0), '蜡笔小新', '_multi'=>true);

        // 区间查询
        // $map['id'] = array(array('gt', 1), array('lt', 4));
        // $map['id'] = array(array('gt', 1), array('lt', 4), 'OR');

        // 组合查询
        // 1. 字符串查询
        /*$map['id'] = array('eq', 1);
        $map['_string'] = 'user="蜡笔小新" AND email="xiaoxin@163.com"';
        $map['_logic'] = 'OR';*/

        // 2. 请求字符串查询
        /*$map['id'] = array('eq', 1);
        $map['_query'] = 'user=蜡笔小新&email=xiaoxin@163.com&_logic=OR';*/

        // 3. 复合查询
        /*$map['id'] = array('eq', 1);
        $where['id'] = 2;
        $map['_complex'] = $where;
        $map['_logic'] = 'OR';*/

        // var_dump($user->where($map)->select());

        // 统计查询
        // var_dump($user->count());
        // var_dump($user->count('email'));
        // var_dump($user->max('id'));
        // var_dump($user->min('id'));
        // var_dump($user->avg('id'));
        // var_dump($user->sum('id'));

        // 动态查询
        // 1. getBy
        // var_dump($user->getByemail('xiaoxin@163.com'));

        // 2. getFieldBy
        // var_dump($user->getFieldByUser('路飞', 'id'));

        // SQL查询
        // 1. query读取
        var_dump($user->query('SELECT * FROM think_user'));

        // 2. execute写入
        // var_dump($user->execute('UPDATE think_user set user="蜡笔大新" WHERE id=1'));
    }
}