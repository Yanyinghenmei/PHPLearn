<?php
header('conent-type:text/html;charset=utf-8');
$fileInfo=$_FILES['myFile'];
$maxSize=2097152;
$allowExt=array('jpg','png','jpeg');
// 是否检测是否是图片
$flag=true;

// 判断错误号
if ($fileInfo['error'] == 0) {
  // 判断大小
  if ($fileInfo['size']>$maxSize) {
    exit('上传文件过大');
  }
  // 判断类型
  // $ext=strtolower(end(explode('.',fileInfo['name'])));
  $ext=pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
  if (!in_array($ext,$allowExt)) {
    exit('非法文件类型');
  }
  // 判断是否是post方式上传的
  if (!is_uploaded_file($fileInfo['tmp_name'])) {
    exit('文件不是post方式上传的');
  }
  // 检测是否是真是的图片类型
  if ($flag) {
    if (!getimagesize($fileInfo['tmp_name'])) {
      exit('上传的文件不是图片');
    }
  }
  if (!getimagesize($fileInfo['tmp_name'])) {
    exit('上传的文件不是图片');
  }
  $path='./uploads';
  if (!file_exists($path)) {
    mkdir($path,0777,true);
    chmod($path,0777);
  }
  $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
  $destination=$path.DIRECTORY_SEPARATOR.$uniName;
  echo $destination;
  // @ 错误抑制符
  if (@move_uploaded_file($fileInfo['tmp_name'],$destination)) {
    echo '上传成功';
  } else {
    echo '文件上传失败';
  }
} else {
  echo '上传失败';
}
