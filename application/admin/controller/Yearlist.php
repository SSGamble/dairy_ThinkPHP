<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;
use think\Db;

class Yearlist extends Base
{
    public function yearlist()
    {
        $top = db('yearlist')->where("group","eq","1")->where("rank","=","1")->select();
        $other = db('yearlist')->where("group","eq","1")->where("rank",">","1")->order('rank')->select();

        $booktop = db('yearlist')->where("group","eq","2")->where("rank","=","1")->select();
        $bookother = db('yearlist')->where("group","eq","2")->where("rank",">","1")->order('rank')->select();

        $music = db('yearlist')->where("group","eq","3")->select();

        $event = db('yearlist')->where("group","eq","4")->order('rank')->select();

        $this->assign('other', $other);
        $this->assign('top', $top);

        $this->assign('bookother', $bookother);
        $this->assign('booktop', $booktop);

        $this->assign('music', $music);

        $this->assign('event', $event);

        return view('file');
    }
}
