<?php

/*

*/
$str1 = join('',range(0,9));
$str2 = join('',range('a','z'));
$str3 = join('',range('A','Z'));
echo $str1;

echo "<pre>";
$arr = array_merge(range(0,9),range('a','z'),range('A','Z'));
// print_r($arr);

$str = join('',$arr);
echo $str;

$stt = '';
for ($i=0; $i < 4; $i++) {
  $stt.=$arr[mt_rand(0,count($arr)-1)];
}
echo '<br />';
echo $stt;

// array_flip 交换数组的简直和键名
$res = array_rand(array_flip($arr), 4);
print_r($res);

$str = join('',$res);
echo $str;

// shuffle() 打乱数组
shuffle($arr);
// print_r($arr);

$keys = array_keys($arr);
print_r($keys);

echo '<hr />';
