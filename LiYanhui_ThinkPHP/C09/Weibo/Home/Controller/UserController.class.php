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
        // $user = M('User');

        // 连贯方法
        // 7. alias
        // var_dump($user->alias('a')->select());
        // 8. group
        // var_dump($user->field('user,max(id)')->group('id')->select());
        // 9. having
        // var_dump($user->field('user,max(id)')->group('id')->having('id>2')->select());
        // 10. comment
        // var_dump($user->comment('所有用户')->select());
        // 11. join
        // var_dump($user->join('think_user ON think_info.id = think_user.id')->select());
        // var_dump($user->join('think_user ON think_info.id = think_user.id', 'RIGHT')->select());
        // 12. union
        // var_dump($user->union("SELECT * FROM think_info")->select());
        // 13. distinct
        // var_dump($user->distinct(true)->field('user')->select());
        // 14. cache
        // var_dump($user->cache(true)->select());

        // 命名范围
        $user = D('User');
        
        // 调用命名范围
        // var_dump($user->scope('sql1')->select());
        // var_dump($user->scope('sql2')->select());
        // 支持调用多个scope方法
        // var_dump($user->scope('sql1')->scope('sql2')->select());
        // default默认
        // var_dump($user->scope()->select());
        // 对命名范围的SQL进行调整
        // var_dump($user->scope('sql2', array('limit'=>4))->select());
        // 直接覆盖命名范围
        // var_dump($user->scope(array('where'=>array('id'=>1),'order'=>'date DESC', 'limit'=>2))->select());
        // 直接用命名范围名调用
        var_dump($user->sql2()->select());
    }
}