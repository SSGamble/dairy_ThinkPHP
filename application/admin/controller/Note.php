<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;
use think\Db;

class Note extends Base
{
    //笔记页面列表
    public function notelst()
    {
        // 主页面显示列表
        $list = db('note')->where("groups","neq","Personal")->where('is_show','=',1)->order('date desc,id desc')->select();
        // 最新列表
        $list_new = db('note')->where("groups","neq","Personal")->where("is_show","neq","1")->order('gmt_modified desc')->limit(5)->select();

        // 当前为点击一级目录
        if(input('groups') != null){
            $groupsID = input('groups');
            $list = db('note')->where('p_id',$groupsID)->where('id','>',2)->order('date desc')->select();
            $list_new = null;
        }elseif (input('groups_name') != null) {
            $groupsName = input('groups_name');
            $list = db('note')->where('groups',$groupsName)->order('date desc')->select();
            $list_new = null;
        }elseif (input('key') != null) {
            $key = input('key');
            $list = db('note')->where("title|content",'like','%'.$key.'%')->order('date desc')->select();
            $list_new = null;
        }

        $hide = db('config')->where("name","hide")->find();

        //置顶
        $stickList = db('note')->where("id",'<',5)->select();

        //所有分组信息
        $groups = db('groups')->select();

        //主目录
        $groups0 = db('groups')->where('parent_id',0)->where('id','neq',2)->order('groups')->select();

        //选择项的 子目录 分组列表
        $groups1 = db('groups')->field('groups')->where('parent_id',1)->select();
        $groups2 = db('groups')->where('parent_id',2)->order('groups')->select();

        //笔记数量统计
        $default_num = db('note')->where('groups','Default')->count();
        $count = db('note')->count();

        // 年度总结
        $year = db('yearlist')->distinct(true)->field('year')->order('year desc')->select();

        // 模板变量赋值
        $this->assign('stickList', $stickList); //置顶列表
        $this->assign('hide', $hide);
        $this->assign('list', $list);
        $this->assign('list_new', $list_new);
        $this->assign('groups', $groups);
        $this->assign('groups0', $groups0);//-----
        $this->assign('groups1', $groups1);
        $this->assign('groups2', $groups2);
        $this->assign('count', $count);//笔记总数
        $this->assign('year', $year);//年度终结 年

        $this->assign('default_num', $default_num);

        return view('notelst');
    }

    // 隐藏标题
    public function hide()
    {
        $con = db('config')->where('name',"hide")->find();
        $code = $con['code'];
        $code = ($code == 0 ? 1 : 0);
        $data = [
            'code'=>$code,
        ];
        if(db('config')->where('name',"hide")->update($data)){
           if($code == 1){
               $res = "隐藏";
           }else{
               $res = "显示";
           }
        }
        echo $res;
    }

    // 获取笔记总数
    public function getCount()
    {
        $count = db('note')->count();
        echo $count;
    }

    // ajax 显示一级目录下的笔记
    public function aShowNote1()
    {
        $groupsID = $_POST['groupsID'];
        $data = db('note')->where('p_id',$groupsID)->where('id','>',2)->order('date desc')->select();
        echo json_encode($data);
    }

    // ajax 显示二级目录下的笔记
    public function aShowNote2()
    {
        $groupname = $_POST['groupname'];
        $data = db('note')->where('groups',$groupname)->order('date desc')->select();
        echo json_encode($data);die();
    }

    // ajax 显示 笔记预览
    public function noteview()
    {
        $noteid = $_POST['noteid'];
        $note = db('note')->find($noteid);//查询数据,返回一维数组
        echo json_encode($note);die();
    }

    // ajax 搜索 笔记
    public function aSearch()
    {
        $key = $_POST['key'];
        $research = db('note')->where("title|content",'like','%'.$key.'%')->order('date desc')->select();
        echo json_encode($research);die();
    }


    public function aShowNote()
    {
        $data = db('note')->where('id',2)->order('date desc')->select();
        echo(json_encode($data));die;
    }

    function json($data=array()){
        $result=array(
            'json'=>$data
        );
        //输出json
        echo json_encode($result);
        exit;
    }

    //v - 显示笔记
    public function showNote(){
        $id = input('id');//接收id
        $note = db('note')->find($id);//查询数据,返回一维数组
        $groups = db('groups')->select();
        $content = $note['content'];
        $this->assign('note',$note);
        $this->assign('groups', $groups);
        return view('shownote');
    }

    //v - 编辑笔记
    public function editNote(){
        $id = input('id');//接收id
        $note = db('note')->find($id);//查询数据,返回一维数组
        $groups = db('groups')->select();
        $content = $note['content'];
        $this->assign('note',$note);
        $this->assign('groups', $groups);
        return view('editnote');
    }

    //v - 编辑新笔记
    public function newEdit(){
        $groups = db('groups')->select();
        $this->assign('groups', $groups);
        return view('newedit');
    }

    // 搜索 Note
    public function search(){
        $key = input('key');
        $list = db('note')->where("title",'like','%'.$key.'%')->select();
        $this->assign('list',$list);
        return view('notelst');
    }

    // 自动保存 Note  --  防止数据意外丢失
    public function saveNote(){
        $context = $_POST['context'];

        $arr = explode(" ",explode("\n",$context)[0],2); //分割出标题
        $title = $arr[1];

        $data = [
            'title' => $title,
            'content' => $context,
            'groups' => "Default",
            'p_id'=> 1,
        ];
        db('note')->where('id',1)->update($data);
        echo "《".$data['title']."》保存成功--".time();
    }

    //添加新笔记
    public function addNote(){
        //如果接收到了数据
        if (request()->isPost()) {
            $arr = explode(" ",explode("\n",input('content'))[0],2); //分割出标题
            $title = $arr[1];
            $dirPath = './note/Default/';//默认文件保存目录
            //接收到的分组信息
            $groups = input('groups');
            $pid = 1; //默认添加到默认目录下
            $pid = db('groups')->where("groups",$groups)->value('parent_id');
            $pgroup = db('groups')->where("id",$pid)->value('groups');

            if($pid == 0){    //一级目录
                $pid = db('groups')->where("groups",$groups)->value('id');
            }

            $data = [
                'title' => $title,
                'content' => input('content'),
                'groups' => $groups,
                'p_id'=>$pid,
                'date'=>date('Y-m-d'),
                'gmt_modified'=>date('Y-m-d'),
            ];

            //添加数据 - 助手函数
            if (db('note')->insert($data)) {

                $g_count = db('note')->where('groups',$groups)->count();
                Db::table('groups')->where('groups',$groups)->setField('g_count', $g_count);

                return $this->redirect('/daily/admin/note');
            } else {
                return $this->error("失败");
            }
            return view('notelst');
        }
    }

    //删除笔记
    public  function delNote(){
        $id = input('id');
        $note = db('note')->find($id);
        $groups = db('note')->where("id",$id)->value('groups');
        
        if(db('note_del')->insert($note)){
            db('note')->delete($id);

            $g_count = db('note')->where('groups',$groups)->count();
            Db::table('groups')->where('groups',$groups)->setField('g_count', $g_count);

            $this->redirect('/daily/admin/note');
        }else{
            $this->error('删除失败');
        }
    }

    //更新笔记
    public function updateNote(){
        $arr = explode(" ",explode("\n",input('content'))[0],2); //分割出标题
        $title = $arr[1];
        $id = input('id');//接收id
        $note = db('note')->find($id);//查询数据,返回一维数组

        $pre_groups = db('note')->where("id",$id)->value('groups');
        
        $groups = input('groups');
        $isShow = input('showsel');//是否显示在首页
        $publish = input('showse2');//是否发布
        $summary = input('summary');
        $pid = 1; //默认添加到默认目录下
        $pid = db('groups')->where("groups",$groups)->value('parent_id');
        $pgroup = db('groups')->where("id",$pid)->value('groups');

        if($pid == 0){    //一级目录
            $pid = db('groups')->where("groups",$groups)->value('id');
        }

        $data= array(
            'id'=>$note['id'],
            'p_id' => $pid,
            'title'=>$title,
            'content'=>input('content'),
            'groups'=>input('groups'),
            'is_show'=>$isShow,
            'publish'=>$publish,
            'summary'=>$summary,
            'gmt_modified'=>date('Y-m-d'),
        );

        //修改
        if(db('note')->where('id',$id)->update($data)){

            $pre_groups_count = db('note')->where('groups',$pre_groups)->count();
            Db::table('groups')->where('groups',$pre_groups)->setField('g_count', $pre_groups_count);
            
            $g_count = db('note')->where('groups',$groups)->count();
            Db::table('groups')->where('groups',$groups)->setField('g_count', $g_count);

            $this->redirect('/daily/admin/note/shownote/id/'.$id.'.html');
        }else{
            $this->success('修改失败!');
        }

        return view('notelst');
    }

}
