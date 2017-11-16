<?php

// 字符链接例子
error_reporting('E_ALL & ~E_NOTICE');

echo 'a'.'b'.'c'.'<br/>';

echo 'a','b','c','<br/>';

$str = 'a'.'b'.'c';
$str = 'a','b','c';   // 这里不能用逗号
echo phpinfo();
