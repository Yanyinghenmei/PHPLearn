<?php

header('content-type:text/html;charset=utf-8');
// 匿名函数/闭包函数
// 没有名称的函数

$greet = function($name) {
  echo "$name".'<hr/>';
};

$greet("hello");

// 匿名函数用作回调函数的参数值
// 回调函数 callback 一个函数作为另外一个函数的参数而出现
function cube($n) {
  echo $n*$n*$n.'<hr/>';
}
cube(2);

call_user_func('cube', 3);

call_user_func(function($n){
  echo "$n";
}, 3);

$imooc = function($a) {
  echo $a;
};
$imooc('imooc');

// 内部函数: 在函数体内部申明的函数;
// 内部函数: 只有在外部函数调用后才可以被调用;
