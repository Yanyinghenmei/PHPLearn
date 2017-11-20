<?php

$fileInfo = $_FILES['myFile'];
print_r($fileInfo);

$filename=$fileInfo['name'];
$type=$fileInfo['type'];
$tmp_name=$fileInfo['tmp_name'];
$size=$fileInfo['size'];
$error=$fileInfo['error'];

if ($error == UPLOAD_ERR_OK) {
  // 将服务器上的零时文件移动到指定目录下
  // move_uploaded_file($tmp_name,$destination)
  if (move_uploaded_file($tmp_name,'./uploads/'.$filename)) {
    echo '文件上传成功';
  } else {
    echo '文件上传失败';
  }
  // copy($src,$dst): 将文件拷贝到指定文件
  // copy($tmp_name,$filename);
} else {
  switch ($error) {
    case '1':
      echo "上传文件超过了php.ini中upload_max_filesize";
      break;
    case '2':
      echo "上传文件超过了HTML表单中MAX_FILE_SIZE选项指定的值";
      break;
    case '3':
      echo "文件只有部分被上传";
      break;
    case '4':
      echo "没有文件被上传";
      break;
    case '6':
      echo "找不到临时文件";
      break;
    case '7':
      echo "文件写入失败";
      break;
    case '8':
      echo "上传的文件被PHP扩展程序中断";
      break;
  }
}
/*
Array
(
    [name] => 1754afe0fb7b2dbd8213d7232534ccbb.jpg
    [type] => image/jpeg
    [tmp_name] => /Applications/MAMP/tmp/php/php2movAT
    [error] => 0
    [size] => 843301

    name: 上传文件的名称
    type: 上传文件的MIME类型
    tmp_name: 上传到服务器的零时文件
    size: 上传文件的大馨
    error: 错误号
)
 */

// 文件上传配置选项
/*
 file_uploads= On, 支持HTTP上传
 upload_tmp_dir =, 临时文件保存目录
 upload_max_filesize =, 允许上传文件的最大值
 max_file_uploads =, 允许一次上传的最大文件数
 post_max_size =, POST方式发送数组的最大值


 max_execution_time = -1, 设置了脚本解析器终止之前允许的最大执行时间,防止程序写的不好而占
    尽服务器资源
 max_input_time = 60, 脚本解析输入数据允许的最大时间
 max_input_nesting_level = 64, 设置输入变量的嵌套深度
 max_input_vars = 1000, 接受多少输入的变量(限制分别应用于$_GET,$_POST,$_COOKIE超全局
    变量),指令的使用减轻了以河西碰撞来进行拒绝服务攻击的可能性. 如有超过指令数量的变量, 将会
    E_WAARNING的产生, 工多的输入变量将会从请求中截断
 memory_limit = 128M, 最大单线程的独立内存的使用量, 也就是一个web请求,给予线程最大的内
    存使用量的定义
 */

/*
  错误号:
  UPLOAD_ERR_OK          0  没有错误,文件上传成功
  UPLOAD_ERR_INI_SIZE    1  上传文件超过了php.ini中upload_max_filesize
  UPLOAD_ERR_FORM_SIZE   2  上传文件超过了HTML表单中MAX_FILE_SIZE选项指定的值
  UPLOAD_ERR_PARTIAL     3  文件只有部分被上传
  UPLOAD_ERR_NO_FILE     4  没有文件被上传
  UPLOAD_ERR_NO_TMP_DIR  6  找不到临时文件
  UPLOAD_ERR_CANT_WRITE  7  文件写入失败
  UPLOAD_ERR_EXTENSION   8  上传的文件被PHP扩展程序中断

 */

/*
  上传文件客户端限制
  ·通过表单隐藏域限制上传文件的最大值
  <input type="hidden" name="MAX_FILE_SIZE" value="字节数">
  ·通过accept属性限制上传文件类型
  <input type="file" name="myFile" accept="文件的MIME类型">
 */
