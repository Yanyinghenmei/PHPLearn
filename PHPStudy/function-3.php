<?php

// 可变参数列表

// var_dump(1, 2, 3);

// func_num_args
// func_get_args

function test() {
  // echo func_num_args();
  print_r(func_get_args());
}

test(1, 2, 3);

function var_dump2() {
  if (func_num_args() <= 0) {
    return;
  }
  $pramras = func_get_args();
  foreach ($pramras as $key => $value) {
    if (is_integer($value)) {
      echo 'int: '.$value.'<br/>';
      continue;
    }
    if (is_string($value)) {
      echo 'string: '.$value.'<br/>';
    }
  }
}

var_dump2(1, 2, 3, 4, 'asf');
