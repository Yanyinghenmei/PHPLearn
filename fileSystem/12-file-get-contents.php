<?php

// header('content-type:image/jpeg');

// file_get_contents 将整个文件读入一个字符串
// fopen fread fgetc fgets fgetss fgetcsv

// $filename = 'text1.txt';
//
// $str = file_get_contents($filename);
// echo strip_tags($str);

// $filename = './image.jpg';
// echo file_get_contents($filename);

// $filename = 'https://github.com/Yanyinghenmei';
// echo file_get_contents($filename);

// http://phpfamily.org/

$filename = 'user.csv';
// $handle = fopen($filename, 'wb+');
// $data = [1, 'daniel', '1113135372@qq.com'];
// fputcsv($handle, $data);

echo file_get_contents($filename);
$handle = fopen($filename, 'rb+');
$row = fgetcsv($handle);
echo '<br />';
print_r($row);
