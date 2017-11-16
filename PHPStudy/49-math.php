<?php

header('content-type:text/html;charset=utf-8');

$x = 2.4;
$y = 3.02;

// 向上取整
echo ceil($x).'<br/>';
echo floor($y).'<br/>';   // 分页会用到

// 总记录数为X, 每页显示Y条记录, 求总页数Z
// $z = ceil($x/$y);

// 幂运算 pow
// number pow (number $base, number $exp)
echo pow(2, 3);
