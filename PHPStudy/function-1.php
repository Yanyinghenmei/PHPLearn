<?php

$a = 3;
function change($b) {
  $b = 5;
}

// $b 保存的是$a 的地址
function change_(&$b) {
  $b = 5;
}

change($a);
echo $a,'<br/>';
change_($a);
echo $a,'<br/>';
