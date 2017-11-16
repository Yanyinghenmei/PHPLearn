<?php

header('content-type:text/html;charset=utf-8');
// 取随机数
// rand
// mt_rand    // 更好的随机数 速度是mt_rand 的 3-4 倍

echo rand(50, 80).'<br/>';
echo mt_rand(1, 40).'<br/>';

$chars = 'abcdefghijklmnopqrstuvwxyz1234567890';

$char = '';
for ($i=0; $i < 4; $i++) {
  $char = $char.substr($chars, mt_rand(0,strlen($chars)-1), 1);
}
echo $char.'<br/>';

$num='0123456789';
$let='abcdefghijklmnopqrstuvwxyz';
$LET='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$str=$num.$let.$LET;//从该给定的字符串中随机抽取元素组成定长的字符串

$len = strlen($str);

$result = '';
for ($i = 0; $i < 4; $i++) {
    $result = $result.substr($str,rand(0, $len-1), 1);
}

echo $result.'<br/>';

// 四舍五入
// round(float [,int $precision-0]) // 第二个参数, 要保留到小数点几位
echo round(123.5212).'<br/>';
echo round(123.1233, 2).'<br/>';
