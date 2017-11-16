<?php

// 匿名函数
$message = '';
function test() {

  $message1 = '√√√';

  // 使用use表示要是要外层变量$message1 也可以使用引用传值
  $say = function($str) use ($message1) {
    // 通过global修饰的变量, 只有在最外层才能有效
    global $message;
    echo $str,$message,$message1;
  }; // 记得添加引号

  $say('hello world');
}

test();
