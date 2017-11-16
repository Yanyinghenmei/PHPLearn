<?php

$filename = 'text1.txt';
$handle = fopen($filename, 'ab+');

fputs($handle, PHP_EOL.'aaaa');

// 移动指针
// fseek($handle, 0);
// 重置文件指针

// 将文件截断到给定的长度
// ftruncate();
ftruncate($handle, 4);

rewind($handle);
echo fread($handle, filesize($filename));
fclose($handle);
