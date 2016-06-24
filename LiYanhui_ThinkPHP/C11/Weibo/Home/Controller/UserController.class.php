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
        $user = D('User');
        var_dump($user->create());
    }
    // 数据创建
    public function create() {

    }
    // 数据写入
    public function add() {

    }
    // 数据读取
    public function select() {
        $user = M('User');

        // 显示所有数据
        // var_dump($user->select());
        // 显示第一条数据
        // var_dump($user->find());
        // 获取第一条user字段的值
        // var_dump($user->getField('user'));
        // 获取所有user字段的值
        // var_dump($user->getField('user',true));
        // 传递多个字段，获取所有（重复的被屏蔽）
        // var_dump($user->getField('user,email'));
        // 冒号分割
        // var_dump($user->getField('id,user,email',':'));
        // 限制2条数据
        var_dump($user->getField('id,user,email',2));
    }
    // 数据更新
    public function save() {
        $user = M('User');

        // 修改第一条数据
        /*$data['user'] = '蜡笔大新';
        $data['email'] = 'daxin@qq.com';
        $map['id'] = 1;
        $user->where($map)->save($data);*/

        // 默认主键为条件
        /*$data['id'] = 1;
        $data['user'] = '蜡笔老新';
        $data['email'] = 'laoxin@163.com';
        $user->save($data);*/

        // 结合create()
        /*$user->create();
        echo $user->save();*/

        // 修改某一个值
        /*$map['id'] = 1;
        $user->where($map)->setField('user', '新新');*/

        // 统计累计，累加累减
        $map['id'] = 1;
        $user->where($map)->setInc('count', 1);
        // $user->where($map)->setDec('count', 1);
    }
    // 数据删除
    public function delete() {
        $user = M('User');

        // 直接删除主键
        // $user->delete(7);

        // 根据ID来删除
        /*$map['id'] = 8;
        $user->where($map)->delete();*/

        // 批量删除多个
        // $user->delete('6,9');

        // 删除count为0且按时间倒序的前2个
        /*$map['count'] = 0;
        $user->where($map)->order(array('date'=>'DESC'))->limit(2)->delete();*/

        // 删除所有数据
        // echo $user->where('1')->delete();
    }
    // ActiveRecord模式
    public function ar() {
        $user = M('User');

        // 添加一条数据
        /*$user->user = '火影忍者';
        $user->email = 'huoying@qq.com';
        $user->date = date('Y-m-d H:i:s');
        $user->add();*/

        // 找到主键为4的值
        // var_dump($user->find(4));

        // 找到user=蜡笔小新的记录
        /*var_dump($user->getByUser('蜡笔小新'));
        echo $user->user;   // 输出user*/

        // 通过主键查询多个
        // var_dump($user->select('1,2,3'));

        // 修改一条数据
        /*$user->find(1);
        $user->user = "xinxin";
        $user->save();*/

        // 删除当前找到的数据
        /*$user->find(12);
        $user->delete();*/
    }
}