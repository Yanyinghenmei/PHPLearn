<?php

$i = 1;
$j = 0;

if ($i-- || $j++) {
  echo "a";
} else {
   echo "b";
}
var_dump('<br/>',$i, $j,'<br/>');

echo "{$i} + {$j} =".($i+$j);

switch (i) {
  case '1':
    echo "true";
    break;

  default:
    echo "false";
    break;
}

/*
流程控制
1. 分支
  if ...
  switch ...
2. 循环

*/
