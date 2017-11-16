<?php

$test = '';
switch ($test == null) {
  case true:
    echo '真';
  default:
    echo 'imooc';
  case false:
      echo '假';
      break;
}

echo "<br/>";
// 年月日 星期
$day = 3;
//date($format, $time)  格式化日期时间
date_default_timezone_set('PRC');
echo date("Y年m月d日 H:i:s"), '<br/>';

/*
date_default_timezone_set   设置时区
date_default_timezone_get   得到默认时区
*/

echo date_default_timezone_get(), '<br/>';

/*
time   获取当前时间戳
*/

echo date("Y.m.d H:i:s", time()), '<br/>';

/*
Y:  四位年份
m:  2位月
d:  2位日
H:  2位时
i:  2位分
s:  2位秒
w:  一周第几天 0~6
*/

echo "<hr/>";

echo date("w"), '<br/>';

$weekArr = array('0' => '日',
'1' => '一',
'2' => '二',
'3' => '三',
'4' => '四',
'5' => '五',
'6' => '六');
echo date("Y.m.d H:i:s").' 星期'.$weekArr[date("w")];
