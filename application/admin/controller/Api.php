<?php
namespace app\admin\controller;
//使用use来导入一个命名空间的类库
use think\Controller;
use think\image\Exception;

/**
 * ====================== API ========================
 * @author SGamble
 */
class Api extends Controller
{
    public function getAllDaily($id)
    {
        $contetn = db('dailylist')->where('id',$id)->value('content');
        json($contetn,"add success");
    }

    //添加图片
    public function addPic()
    {
        header('Content-type: application/json;charset=utf-8');
        if(empty($_FILES)) {
            die('{"status":0,"msg":"submiterror"}');
            $arr['status'] = 0;
            $arr['msg']   = 'submiterror';
            echo json_encode($arr);
        }
        $dirPath = './img/';//设置文件保存的目录
        if(!is_dir($dirPath)){
          //目录不存在则创建目录
          @mkdir($dirPath);
        }
        $count = count($_FILES);//获取所有文件数
        if($count<1) {  //没有提交的文件
            die('{"status":0,"msg":"nocount"}');
            $arr['status'] = 0;
            $arr['msg']   = 'nocount';
            echo json_encode($arr);
        }
        $success = $failure = 0;
        //循环遍历数据
        foreach($_FILES as $key => $value){
          $tmp = $value['name'];//获取上传文件名
          $tmpName = $value['tmp_name'];//临时文件路径
          //上传的文件会被保存到php临时目录，调用函数将文件复制到指定目录  ($tmpName,$dirPath.date('YmdHis').'_'.$tmp))
          if(move_uploaded_file($tmpName,$dirPath.$tmp)){
            $success++;
          }else{
            $failure++;
          }
        }
        $arr['status'] = 1;
        $arr['msg']   = '提交成功' + $count;
        $arr['success'] = $success; //成功数量
        $arr['failure'] = $failure; //失败数量
        echo json_encode($arr);
    }

    //添加新日志
    public function addDaily($id,$content,$location,$date,$modified,$time)
    {
        $data = [
            'id' => $id,
            'content' => $content,
            'location' => $location,
            'date' => $date,
            'modified' => $modified,
            'time'=>$time,
        ];
        if (db('dailylist')->insert($data)) {
            $json['info']="add success";
            echo(json_encode($json));
        } else {
            $json['info']="add error";
            echo(json_encode($json));
        }
    }

    //删除日志
    public function delDaily($id)
    {
        if(db('dailylist')->delete($id)){
            $json['info']="del success";
            echo(json_encode($json));
        }else{
            $json['info']="del error";
            echo(json_encode($json));
        }
    }

    //同步临时笔记
    public function synTemp($content)
    {
        header('Content-Type:text/html; charset=utf-8');
        $data= array(
            'content'=>$content,
        );
        //修改
        if(db('note')->where('id',2)->update($data)){
            $json['code']=1;
            echo(json_encode($json));
        }else{
            $json['code']=0;
            echo(json_encode($json));
        }
    }

    //同步日志
    public function synDaily($lst)
    {
        header('Content-Type:text/html; charset=utf-8');
//        echo $lst;die();
        $obj = json_decode($lst);
        $table_change = array('%23'=>'#');
        $content = strtr($obj->content,$table_change);
        $modified = time();
        $data = array(
            'id' => $obj->id,
            'title'=> $obj->title,
            'content' => $content,
            'location' => $obj->location,
            'date' =>  $obj->date,
            'modified'=>$modified, //同步完后新的时间戳
            'time'=>$obj->time,
        );
        //=============回调==============
        if(!strcasecmp($obj->status,"0")){  //添加日志
            if (db('dailylist')->insert($data)) {
                $json['info']="add su";
                $json['id']=$obj->id;
                $json['code']="1";
                $json['status']="9";
                $json['anchor']=$modified;
                echo(json_encode($json));
            } else {
                $json['info']="add error";
                $json['id']=$obj->id;
                $json['code']="0";
                $json['status']="0";
                $json['anchor']=$modified;
                echo(json_encode($json));
            }
        }else if(!strcasecmp($obj->status,"1")){    //修改日志
            if (db('dailylist')->where('id',$obj->id)->update($data)) {
                $json['info']="up su";
                $json['id']=$obj->id;
                $json['code']="1";
                $json['status']="9";
                $json['anchor']=$modified;
                echo(json_encode($json));
            } else {
                $json['info']="up error";
                $json['id']=$obj->id;
                $json['code']="0";
                $json['status']="0";
                $json['anchor']=$modified;
                echo(json_encode($json));
            }
        }else if(!strcasecmp($obj->status,"-1")){    //删除日志
            $id = $obj->id;
            if(db('dailylist')->delete($obj->id)){
                $json['info']="del su";
                $json['id']=$id;
                $json['code']="-1";
                $json['status']="9";
                $json['anchor']="null";
                echo(json_encode($json));
            }else{
                $json['info']="del error";
                $json['id']=$obj->id;
                $json['code']="0";
                $json['status']="0";
                $json['anchor']=$modified;
                echo(json_encode($json));
            }
        }
    }

    //将所有 Daily数据 给 Android
    public function synAndroid()
    {
        $dailies = db('dailylist')->order('id')->select();
        echo(json_encode($dailies));
    }
}
