<?php
// 嵌套定义
// 函数体中的变量不能再外面使用
// 函数体中的函数可以在外面使用
// 因为PHP中的函数都是全局的

function foo() {
  function bar() {
    echo "hello world".'<br/>';
  }
}

foo();
bar();

// 嵌套调用
function bar1() {
  echo "hello world".'<br/>';
}
function foo1() {
  bar1();
}
foo1();

function foo2() {
  $a = 'hello world'.'<br/>';
  function bar2() {
    // 变量$a不能在这里使用, 作用域不同
    echo $a;
  }
}
