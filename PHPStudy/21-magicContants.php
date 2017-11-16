<?php

// 魔术常量

/*
__LINE__  当前行号
__FILE__  完整绝对路径和文件名
__DIR__   完整绝对路径

__FUNCTION__ 函数名
__CLASS__    类名
__METHOD__   当前类方法名称
__NAMESPACE__   命名空间
*/

echo __LINE__;
echo "<br/>";

echo __FILE__;
echo "<br/>";

echo __DIR__;
echo "<br/>";

$_GET['name'] = 'daniel';
$_POST['address'] = 'Beijing';
var_dump($_GET);
echo "<br/>";

var_dump($_POST);
echo "<br/>";

var_dump($_REQUEST);
