<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;

class Dailylist extends Base
{
    // v - 显示日志列表
    public function dailylist()
    {
        $hide = db('config')->where("name","hide")->find();
        $key = input('opdate');
        if($key!=null) {
            $list = db('dailylist')->where("date", 'like', '%'.$key.'%')->order('id desc')->select();
            $page = $list->render();
            $this->assign('list', $list); // 模板变量赋值
        }else{
            $list = db('dailylist')->order('id desc')->select();
            $this->assign('list', $list); // 模板变量赋值
        }
        $count = db('dailylist')->count();
        $this->assign('count', $count);
        $this->assign('hide', $hide);
        return view('dailylist');
    }

    // 按 年 显示 Daily
    public function aShowDaily()
    {
        $key = $_POST['key'];
        $list = db('dailylist')->where("date", 'like', '%'.$key.'%')->order('id desc')->select();
        echo json_encode($list);die();
    }

    // ajax 显示 Daily 预览
    public function dailyview()
    {
        $noteid = $_POST['noteid'];
        $note = db('dailylist')->find($noteid);//查询数据,返回一维数组
        echo json_encode($note);die();
    }

    // ajax 搜索 笔记
    public function aSearch()
    {
        $skey = $_POST['skey'];
        $research = db('dailylist')->where("title|content",'like','%'.$skey.'%')->order('id desc')->select();
        echo json_encode($research);die();
    }

    // 笔记页面 跳转 日志页面
    public function dailylista()
    {
        $list = db('dailylist')->select();
        echo json_encode($list);die();
    }

    // v - 浏览日志
    public function showDaily(){
        $id = input('id');//接收id
        $daily = db('dailylist')->find($id);//查询数据,返回一维数组
//        $content = $daily['content'];
        $this->assign('daily',$daily);
        return view('showdaily');
    }

    // v - 添加新日志
    public function newDaily(){
        return view('newdailylist');
    }

    // 添加新日志
    public function addDaily(){
        $arr = explode(" ",explode("\n",input('content'))[0]); //分割出标题
        $title = $arr[1];

        $data = [
            'title' => $title,
            'content' => input('content'),
            'date' => $title,
            'modified' => time(),
        ];
        if (db('dailylist')->insert($data)) {
            return $this->redirect('dailylist');
        } else {
            $json['info']="add error";
            echo(json_encode($json));
        }
    }

    //v - 编辑日志
    public function editDaily(){
        $id = input('id');//接收id
        $daily = db('dailylist')->find($id);//查询数据,返回一维数组
        $dailycon = $daily['content'];
        $this->assign('dailycon',$dailycon);
        $this->assign('daily',$daily);
        return view('editdaily');
    }

    //更新日志
    public function updateDaily(){
        $arr = explode(" ",explode("\n",input('content'))[0]); //分割出标题
        $title = $arr[1];

        $id = input('id');
        $note = db('dailylist')->find($id);

        $data= array(
            'id'=>$id,
            'title'=>$title,
            'content'=>input('content'),
        );

        //修改
        if(db('dailylist')->where('id',$id)->update($data)){
            $this->redirect('dailylist');
        }else{
            $this->success('修改失败!');
        }
    }

    //删除日志
    public  function delDaily(){
        $id = input('id');
        if(db('dailylist')->delete($id)){
            $this->redirect('dailylist');
        }else{
            $this->error('删除失败');
        }
    }
}
