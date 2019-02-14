<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;

class Base extends Controller
{
    //初始化方法
    public function _initialize(){
        //判断是否登录
         if(!session('username')){
             $this->error('Login','login/index');
         }
    }
}
