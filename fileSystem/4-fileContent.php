<?php
header('content-type:image/jpeg');
/*
 文件内容相关操作
 1. 打开文件
 2. 读写
 3. 关闭文件
*/
// echo '<pre>';

/*
$filename = './text1.txt';
// fopen() 打开文件, 以指定的方式来打开
$handle = fopen($filename, 'r');
var_dump($handle);

echo '<br />'.fread($handle,filesize($filename));

// 得到当前的指针位置 ftell
echo '<br />'.ftell($handle);

// 移动指针 fseek
fseek($handle, 0);
echo '<br />'.fread($handle,filesize($filename));

// 关闭文件 fclose()
var_dump(fclose($handle));


// 读写方式打开
$handle = fopen($filename, 'r+');
echo '<br />'.fread($handle, filesize($filename));
fclose($handle);
*/

// 读取二进制的文件
$filename = 'image.jpg';
$handle = fopen($filename, 'rb+');
echo fread($handle, filesize($filename));
fclose($handle);






//
