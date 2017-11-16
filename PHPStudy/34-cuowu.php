<?php

// 错误抑制符
/*
通过@符号加到会产生错误的表达式之前
语法错误和致命错误不能去掉
*/

$var = 123;
@settype($var, 'Daniel');

// 三元运算符

!$var ?: var_dump("$var 不等于0 或者 null");
