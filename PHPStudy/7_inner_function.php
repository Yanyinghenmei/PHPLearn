<?php

header('content-type:text/html;charset=utf-8');
function outer() {
  echo 'I am outer function<hr>';

  // 内部函数
  function inner() {
    echo 'I am inner function<hr>';
  }
}

// 函数是全局申明的
outer();
inner();

// 有条件的函数
$n = 3;
if ($n > 2) {
  function fun1() {
    echo '$n > 2';
  }
}

fun1();

// 递归函数
// 直接或者间接调用自身的函数

// 条件
/*
1. 每次调用自己必须更接近于解
2. 必须有一个终止处理或计算的准则
*/


// 线性递归
// function recursive($n) {
//   if ($n >= 1) {
//     return $n + recursive($n-1);
//   }
// }

// 尾递归
function new_ecursive($n, $result = 0) {

  $func = __FUNCTION__;
  if ($n >= 1) {
    return $func($n - 1, $result + $n);
  } else if ($n == 0) {
    return $result;
  } else {
    return "输入不得小于0";
  }
}

$num = 100;
echo '<hr/>'.new_ecursive($num);

// 可变函数(变量函数)
// 如果一个变量名后有圆括号, PHP将寻找与变量的值同名的函数, 并且尝试执行它
// 用来实现包括回调函数, 函数表在内的用途
// *可变函数不能用于例如echo print unset empty include require 及类似的语法结构
// *即不是通过中括号传参的'关键字'
// *不能调用对象的方法
function daniel() {
  echo 'daniel';
}

$str = 'daniel';
$str();
//** 自定义函数
// 匿名函数
// 内部函数
// 递归函数
// 可变函数












//
