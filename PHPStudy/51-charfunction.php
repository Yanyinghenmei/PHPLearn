<?php

header('content-type:text/html;charset=utf-8');

// strlen 只能测英文或数字字符的长度

echo strlen(null).'<br/>';

$str = 'asfghjkl;';
echo strlen($str).'<br/>';

$str1 = '中国a';
echo strlen($str1).'<br/>';

//mbstring 函数库
echo mb_strlen($str1).'<br/>';


// 大小写转换函数

// strtolower
// strtoupper

$str1 = "html";
$str2 = "HTML";

echo strtoupper($str1).'<br/>';
echo strtolower($str2).'<br/>';

$str1 = 'hello world';
echo ucfirst($str1).'<br/>';  // 句子首字母大写
echo ucwords($str1).'<br/>';  // 句子中的每个单词首字母大写

// 字符串替换功能
// str_replace(search, replace, subject, [int, count])    区分大小写
// str_ireplace   不区分大小写

echo str_replace('h', 'o', $str1).'<br/>';

// 作业
$str = 'Zend_CONTRollER_fronT'; // Zend_CONTRollER_fronT
$str = strtolower($str);
$str = str_ireplace('_', ' ', $str);
$str = ucwords($str);
$str = str_ireplace(' ', '_', $str);
echo $str.'<br/>';
