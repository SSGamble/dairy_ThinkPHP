<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    //设置规则
    protected $rule = [
        'username'  =>  'require|unique:admin',
        'password' =>  'require',
    ];

    //错误提示信息
    protected $message = [
        'username.require'  =>  '管理员名字必须填写',
        'password.require' =>  '管理员密码必须填写',
    ];

    //验证场景
    protected $scene = [
        'add'  =>  ['username' => 'require|unique:admin','password'],
        // 'edit'  =>  ['username' => 'require|unique:admin'],
    ];

}
