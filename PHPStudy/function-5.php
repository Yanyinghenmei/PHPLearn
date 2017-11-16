<?php

// 可变函数
function test() {
  echo 'hello world'.'<br/>';
}

$func = 'test';
if (is_callable($func)) {
  $func();
}

if (function_exists($func)) {
  $func();
}
