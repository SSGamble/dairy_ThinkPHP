<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        if(!isset($_POST['pwd'])){  
            return view('index');
        }else{
            $password = $_POST['pwd'];
            $user = db('admin')->where('id',1)->find();
            if(md5($password) == $user['password']){
                session('username',$user['username']);
                session('uid',$user['id']);
                return $this->redirect('/daily/admin/note');
            }else{
                $this->error('error');
            }
        }
        
    }

    public function login()
    {
        $password = $_POST['pwd'];
        $user = db('admin')->where('id',1)->find();
        print_r($user);
        if(md5($password) == $user['password']){
            return view('notelst');
        }else{
            // return view('index');
        }
    }

    // 确认密码后返回 Essay
    public function passEssay()
    {
        $password = $_POST['password'];
        $user = db('admin')->where('id',1)->find();
        if(md5($password) == $user['password']){
            $data = db('note')->where('p_id',22)->where('id','>',1)->order('id desc')->select();
            echo json_encode($data);
        }
    }

    // 确认密码后跳转 Daily 界面
    public function passDaily()
    {
        $password = $_POST['password'];
        $user = db('admin')->where('id',1)->find();
        if(md5($password) == $user['password']){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 确认密码
    public function checkPass()
    {
        $password = $_POST['password'];
        $user = db('admin')->where('id',1)->find();
        if(md5($password) == $user['password']){
            return true;
        }else{
            return false;
        }
    }


}
