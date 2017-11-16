<?php

header('content-type:text/html;charset-utf-8');

// 按值传递
// 可以在函数内部改变参数的值, 但是不会改变函数外部的值
$str = "hello";

function getExtension($fileName) {
  $fileName = $fileName.' world';
  echo "$fileName";
}

echo getExtension($str);
echo "<hr/>";
echo "$str";

// 引用传值
// 引用传值只能针对变量使用
// 引用传值可以修改函数外的变量
// 相当于传指针
// 引用传值必须在参数前面加上 & 符号

echo "<hr/>";

function newGetExtension(&$arg) {
  $arg = "new value";
  return $arg; 
}

$foo = 'Bob';
echo newGetExtension($foo);
echo "<hr/>";
echo $foo;
echo "<hr/>";
/*
$foo = 'Bob';
&$arg = $foo;
$arg = "new value";
// $foo = "new value";
*/

// 可变数量的参数
// php5.5之前 写法
function avg() {
  $args = func_get_args();
  echo array_sum($args)/func_num_args();
}

avg(1, 2, 3, 4);

echo '<hr/>';
// php5.6及之后
function avgNew(...$args) {
  $args = func_get_args();
  echo array_sum($args)/func_num_args();
}
avgNew(33, 4, 5);

// 省略 return 则返回的是 null
// 除资源外, 可以返回任意类型








//
