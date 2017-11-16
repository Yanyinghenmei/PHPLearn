<?php

$filename = 'text1.txt';
$handle = fopen($filename, 'rb+');

// 读取
// 从文件指针中读取字符
// fgetc()
echo fgetc($handle).'<br />';

// 从文件中读取一行
// fgets()
echo fgets($handle).'<br />';

// 读取一行, 并且过滤掉HTML标记
// fgetss()
echo fgetss($handle).'<br />';


rewind($handle);

// feof() 检测文件指针是否到文件末尾
while (!feof($handle)) {
  // echo fgetc($handle);
  // echo fgets($handle);
  // echo fgetss($handle);


  echo strip_tags(fgets($handle));
}



fclose($handle);
















//
