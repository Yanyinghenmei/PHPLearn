<?php

header('content-type:text/html;charset=utf-8');

echo pow(2, 3).'<br/>';

// 平方根 sqrt
// float sqrt (float arg)

echo sqrt(4).'<br/>';
echo sqrt(0).'<br/>';
echo sqrt(-1).'<br/>';

// 最大值 max
// maxed max(mixed $value, mixed $value, ...);

// 最小是 min
// mined min(mined $value, mined $value, ...);

echo max(3, 4, 5).'<br/>';
echo min(3, 4, 5).'<br/>';

float function deviation ($value) {
  return 3.50-$value;
}
