<?php

// 递归调用
// 什么是尾递归

// 线性递归
function sum1($n, $m) {
  if ($m <= $n) {
    return $n;
  }
  return sum1($n, $m-1) + $m;
}

// 尾递归
function sum($n, $m, $result = 0) {
  if ($n>$m) {
    return $result;
  }
  return sum($n+1, $m, $result+$n);
}

echo sum1(1, 100), '<br/>';
echo sum(1, 100), '<br/>';

// 1, 1, 2, 3, 5, 8 ...
// 菲波那切数列

function fbnq($n) {
  if ($n <= 2) {
    return 1;
  }

  return fbnq($n-1) + fbnq($n-2);
}

echo fbnq(6);
