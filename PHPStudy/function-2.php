
<?php

// 参数的默认值
function test($a=100, $b=200) {
  echo $a, $b;
}

test(3, 4);
test();

// 函数参数是按照顺序依次传递的
// 默认值最好放在参数列表靠后的位置

// 可变参数列表
