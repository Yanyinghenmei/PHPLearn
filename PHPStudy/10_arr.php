<?php

// 动态创建下标连续的索引数组

$arr1[] = 12;
$arr1[] = 123123;
$arr1[] = true;

print_r($arr1);
echo '<hr>';

// 置顶下标的数组
$arr2[3] = 32;
$arr2[-56] = -12;
$arr2[0] = 'hello world';

// 已有下标最大值 +1;
$arr2[] = 'show time';

print_r($arr2);
echo '<hr>';

// 动态创建关联数组
$userInfo['username'] = 'Daniel';
$userInfo['age'] = 12;
$userInfo['height'] = 177;

print_r($userInfo);
echo '<hr>';

$arr3[][][][] = 1;

print_r($arr3);
echo '<hr>';

$arr4[0][] = 'name';
$arr4[0][] = 'age';
$arr4[0][] = 'home';

print_r($arr4);
echo '<hr>';










//
