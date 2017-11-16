<?php

header('content-type:text/html;charset=utf-8');

/*
 文件信息相关操作API解析及应用
 文件相关操作API解析及应用
 常用文件相关操作函数封装
*/

// 文件创建/删除/剪切/重命名/拷贝

// 创建文件
// touch($filename);

$filename = 'text2.txt';
var_dump(touch($filename));

// 删除文件
// unlink($filename)
/*
if (file_exists($filename)) {
  var_dump(unlink($filename));
  if (unlink($filename)) {
    echo '文件删除成功';
  } else {
    echo '文件删除失败';
  }
} else {
   echo '要删除的文件不存在';
}
*/


// 重命名/剪切 文件
// rename($filename, $newname);
/*
$newname = 'newtext.txt';
if (file_exists($filename)) {
  if (rename($filename,$newname)) {
    echo '重命名成功';
  } else {
    echo '重命名失败';
  }
} else {
  echo '文件不存在';
}
*/

// 将text2.txt 剪切到 text 目录下
/*
$dir = './text/';
$path = $dir.$filename;

if (file_exists($filename) && is_dir($dir)) {
  if (rename($filename, $path)) {
    echo '文件剪切成功';
  } else {
    echo '文件剪切失败';
  }
} else {
  echo '文件或目录不存在';
}
*/

// 复制文件
// copy()
/*
if (file_exists($path)) {
  if (copy($path, $filename)) {
    echo '拷贝成功';
  } else {
    echo '文件拷贝失败';
  }
} else {
  echo '文件不存在';
}
*/

// 拷贝远程文件需要开启PHP配置文件中的allow_url_fopen=On
$path = 'https://b-ssl.duitang.com/uploads/item/201711/04/20171104093514_84TAB.thumb.700_0.png';
if (copy($path, './image.jpg')) {
  echo '拷贝成功';
} else {
  echo '拷贝失败';
}




//
