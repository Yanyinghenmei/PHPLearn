<?php

$file = 'text2.txt';

// file_put_contents($file, $string);
// 如果文件不存在, 此函数会创建文件
// $res = file_put_contents($file,'asdf');
// if ($res) {
//   echo file_get_contents($file);
// }

// $content = file_get_contents($file);
// $res = file_put_contents($file,$content.' is test string');
// if ($res) {
//   echo file_get_contents($file);
// }

// $data = ['a','b','c'];
// $str = join($data,',');
// $data = serialize($data);
// $res = file_put_contents($file, $data);
// if ($res) {
//   $res = file_get_contents($file);
//   print_r(unserialize($res));
// }

// 将数组活对象转成json形式
// $data = json_encode($data);
// file_put_contents($file, $data);
// $dataJson = json_decode(file_get_contents($file));
// print_r($dataJson);


$str = 'abcd ';
$str1 = 'efghi';
// file_put_contents($file, $str);
file_put_contents($file, $str1, FILE_APPEND);
file_put_contents($file, $str1, FILE_APPEND);
print_r(file_get_contents($file));

// $handle = fopen($file,'w+');
// fwrite($handle,$str);
// fputs($handle,$str1);
// rewind($handle);
// echo fread($handle,filesize($file));
