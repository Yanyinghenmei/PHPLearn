<?php

// 定义数组
// 遍历数组
// 常用数组函数
// 实战演练

// phpinfo();  环境信息

// array 符合类型, 有序的映射

$array = array('1' => "value");
// print_r($array);
var_dump($array);

echo gettype($array);

echo "<br/>";
// is_array()
echo is_array($array);

// 下表连续的所以数组(不设定key就可以)
$arr = array(1, 3, 4, 5);
print_r($arr);

// 指定下标
echo "<br/>";
// $arrayName = array(1 => 1,
                //   3 => 2
                // );
$arrayName = array('1' => 1,
                  "asfd" => 2);

print_r($arrayName['asfd']);

print_r($arrayName);

// 定义关联数组

$array1 = array(
  'username' => 'Daniel',
  'age' => 12,
  'email' => "asdfasdf");
print_r($array1);
echo "<br/>";
print_r($array1["age"]);

echo "<hr/>";










//
