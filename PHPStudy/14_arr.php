<?php

// list(): 将下标连续的数组赋值给相应的变量
// each(): 得到当前指针所在位置的键值对, 包含四个部分; 且讲指针向下移动一位

$arr = ['a', 'b', 'c'];

list($var1,$var2,$var3) = $arr;

var_dump($var1,$var2,$var3);

list(,$v1,$v2) = $arr;
var_dump($v1,$v2);

echo '<hr />';

list($arr1[],$arr2[],$arr3) = $arr;

echo '<pre>';
var_dump($arr1,$arr2,$arr3);

 // 不支持list() list(,)

 echo '<hr />';
 $arr = [
   [1,'Daniel',12],
   [2,'Pop',23],
   [3,'Cocoa',15]
 ];

 list($a1,$a2,$a3) = $arr;

 var_dump($a1,$a2,$a3);

foreach($arr as list($id,$name,$age)) {
  echo '信息'.$id.$name.$age.'<br />';
}

echo '<hr>';


$arr = [
  'a' => 'aaa',
  'b' => 'bbb',
  'c',
  'username' => 'Daniel',
  33 => 'ddd'
];
// print_r($arr);
//
// echo '<br>';
// $res = each($arr);
// print_r($res);
// echo '<br>';
// echo key($arr).current($arr);


// echo '<br>';
// list($k,$v) = each($arr);
// echo $k.'-'.$v;
//
// echo '<br>';
// list($k,$v) = each($arr);
// echo $k.'-'.$v;
//
// echo '<br>';
// list($k,$v) = each($arr);
// echo $k.'-'.$v;
//
// echo '<br>';
// list($k,$v) = each($arr);
// echo $k.'-'.$v;
//
// echo '<br>';
// list($k,$v) = each($arr);
// echo $k.'-'.$v;

while (list($k,$v)=each($arr)) {
  echo $k.'---'.$v.'<br>';
}



///
