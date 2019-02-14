<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;
use think\Db;

class Show extends Controller
{
    public function notelst(){
        $content = db('note')->where('id=32')->value('content');
        $content = explode(".",$content);
        array_shift($content);
        shuffle($content);
        $content = $content[1];
        $content = preg_replace("/^\\d+|\\d+$/", '', $content); //过滤首尾数字

        $list_new = db('note')->where("groups","neq","Personal")->where("publish","eq",1)->order('id desc')->paginate(6);
        $groupname = "致正少年的你，愿你所有快乐无需假装，愿你此生尽兴赤诚善良。";

        if(input('groups') != null){
            $groupname = input('groups');
            $list_new = db('note')->where("groups","neq","Personal")->where("groups","eq",$groupname)->where("publish","eq",1)->order('id desc')->paginate(6);
        }

        //所有分组信息
        $groups = db('groups')->where("groups","neq","Personal")->select();

        //主目录
        $groups0 = db('groups')->where('parent_id',0)->where("groups","neq","Personal")->where('id','neq',2)->order('groups')->select();

        //选择项的 子目录 分组列表
        $groups1 = db('groups')->field('groups')->where('parent_id',1)->where("groups","neq","Personal")->select();
        $groups2 = db('groups')->where('parent_id',2)->order('groups')->select();

        $this->assign('list_new', $list_new); //置顶列表

        $this->assign('groups', $groups);
        $this->assign('groups0', $groups0);//-----
        $this->assign('groups1', $groups1);
        $this->assign('groups2', $groups2);
        $this->assign('groupname', $groupname);
        $this->assign('content', $content);
        return view('notelst');
    }

    /**
     * v - 显示笔记
     */
    public function showNote(){
        $id = input('id');//接收id
        $note = db('note')->find($id);//查询数据,返回一维数组
        $groups = db('groups')->select();
        $content = $note['content'];
        $this->assign('note',$note);
        $this->assign('groups', $groups);
        return view('shownote');
    }

    /**
     * 搜索 Note
     */
    public function search(){
        $key = input('key');
        $list = db('note')->where("title",'like','%'.$key.'%')->select();
        $this->assign('list',$list);
        return view('notelst');
    }
}
