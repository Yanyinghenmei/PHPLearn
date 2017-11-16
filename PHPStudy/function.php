<?php

// 函数变量
/*
局部变量
  动态变量
  静态变量
全局变量
*/

// 局部动态变量
/*
局部变量: 只能在函数体内使用
局部动态变量: 在函数体内使用完就被释放的局部变量
*/
function testa() {
  $a = 3;
}

testa();

// 局部静态变量 保存在静态区
// 函数运行结束后并不会释放掉
function testb() {
  static $b = 3;
  $b++;
  echo $b;
}
testb();
echo "<br/>";
testb();
testb();
testb();

// 全局变量
$a = 3;
$b = 4;

function testc() {
  global $a, $b;
  echo '<br/>', $a, $b;
  $a = 5;
}

testc();
echo $a;
