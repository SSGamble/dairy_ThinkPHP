  <?php
   header('Content-type: application/json;charset=utf-8');
if(empty($_FILES)) die('{"status":0,"msg":"错误提交"}');
$dirPath = './img/';//设置文件保存的目录
if(!is_dir($dirPath)){
  //目录不存在则创建目录
  @mkdir($dirPath);
}
$count = count($_FILES);//所有文件数
if($count<1) die('{"status":0,"msg":"错误提交"}');//没有提交的文件
$success = $failure = 0;
foreach($_FILES as $key => $value){
  //循环遍历数据
  $tmp = $value['name'];//获取上传文件名
  $tmpName = $value['tmp_name'];//临时文件路径
  //上传的文件会被保存到php临时目录，调用函数将文件复制到指定目录
  if(move_uploaded_file($tmpName,$dirPath.date('YmdHis').'_'.$tmp)){
    $success++;
  }else{
    $failure++;
  }
}
$arr['status'] = 1;
$arr['msg']   = '提交成功';
$arr['success'] = $success;
$arr['failure'] = $failure;
echo json_encode($arr);
  ?>