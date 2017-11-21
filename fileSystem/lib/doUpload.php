<?php
header('content-type:text/html;charset=utf-8');
require_once 'file.func.php';

// print_r($_FILES);

// echo '<pre>';
// print_r($_FILES);

// 单文件上传
// $fileInfo=$_FILES['myFile'];
// var_dump(file_upload($fileInfo));

// 多个单文件上海窜
// foreach ($_FILES as $fileInfo) {
//   var_dump(file_upload($fileInfo));
// }

// 多文件上传
// print_r($_FILES['myFile']);
$res = (file_multiple_upload());

foreach ($res as $result) {
  if ($result['return_code']) {
    $uploadFiles[]=$result['mes'];
  }
}

$uploadFiles = array_values(array_filter($uploadFiles));
print_r($uploadFiles);
