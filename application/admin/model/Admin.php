<?php
namespace app\admin\model;
//使用use来导入一个命名空间的类库
use think\Model;
use think\Db;

class Admin extends Model
{
    //登录
    public function login($data){
        $user=Db::name('admin')->where('username','=',$data['username'])->find();
        if($user){
            if($user['password'] == md5($data['password'])){
                session('username',$user['username']);
                session('uid',$user['id']);
                return 3; //信息正确
            }else{
                return 2; //密码错误
            }
        }else{
            return 1; //用户不存在
        }
    }
}
