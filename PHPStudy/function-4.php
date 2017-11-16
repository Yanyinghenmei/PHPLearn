<?php

// 参数的类型
// 可限定类型
// array, object, callable
function test(array $a) {
  print_r($a);
}

test([1, 2, 3]);

function test1(stdClass $a = null) {
  print_r($a);
}
$obj = new stdClass();
test1($obj);

// 参数默认值设为null, 才能传参nul
test1(null);

function test2(callable $a) {
  $a();
}

function callBack() {
  echo "hello world";
}

// 需要以字符串形式传递
test2('callBack');
