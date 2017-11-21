<?php
header('content-type:text/html;charset=utf-8');
require_once 'file.func.php';

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
print_r(file_multiple_upload($_FILES));
