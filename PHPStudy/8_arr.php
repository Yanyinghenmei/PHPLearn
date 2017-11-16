<?php
$arr = array('a');

print_r($arr);

//// 二位数组 索引+索引
$array = array(array('a','b','c'),
               array('d','e','f'));

echo '<hr/>';
print_r($array);
echo '<hr/>';
print_r($array[0]);
echo '<hr/>';
//// 二维数组 索引+关联

$arr = array(array('id'=>1,'name'=>'daniel'),
             array('i\'m boss'));

print_r($arr);

echo '<hr/>';
$arr = ['a,','b'];
print_r($arr);

// 最重要的是二维的, 索引+关联, 数据库中查询的结果就是这种形式(类似OC中的数组包字典)
// 多文件上传回用到三位数组
