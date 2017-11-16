<?php

$var = $_POST['number'] % 2;
if ($var == 1) {
  echo "奇数".'<br/>';
} else {
  echo "偶数".'<br/>';
}

echo $var;
