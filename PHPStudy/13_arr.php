<?php

echo '<pre>';
$arr = [1, 23, 32];

foreach ($arr as $value) {
  echo $value.'<br/>';
}

foreach($arr as $value):
  echo $value.'<br/>';
endforeach;

echo '<hr/>';

// 7.0 变化
foreach ($arr as $key => $value) {
  var_dump(current($arr));
}

$arr = [1, 23, 32];
$ref = &$arr;
foreach ($arr as $key => $value) {
  echo "$value";
  // 这时候 最新版 和 老版本不会打印$arr[1],
  // php7 会打印$arr1, 真是个倔强的孩子
  unset($arr[1]);
}
print_r($arr);
print_r($ref);

echo '<hr/>';
echo '<hr/>';
// foreach 通过引用遍历
// 对数组修改也会影响循环

$arr = ['a'];
foreach ($arr as $key => &$value) {
  echo "$value".'<br/>';
  $arr[1] = 'b';
}

print_r($arr);
