<?php

header('content-type:text/html;charset=utf-8');

$str = "a>b, b<c, Tom&John, he said:\"I'm OK\"";

echo $str.'<br/>'; // 结果a>b, b;
echo '<br/>';

// > < 等特殊符号, 需要转换成HTML实体才能正常打印
// htmlspecialchars  将预定义字符转换成HTML实体
// htmlspecialchars (string [,int $flags = ENT_COMPAT]);
// 参数一: 要转换的字符
// 参数二: 如何处理引号
  // ENT_COMPAT - 默认, 仅编码双引号
  // ENT_QUOTES - 转义双引号和单引号
  // ENT_NOQUOTES - 不转义任何引号


echo htmlspecialchars($str, ENT_QUOTES).'<br/>';

// 删除空格函数(左边的)
// ltrim(string [,string]);
// 第一个参数必选
// 第二个参数 规定从字符串中删除的字符, 如果省略该参数, 则移除下列所有字符:
  // \0 \t \r \n \x0b 空格

$str = "\n\n\tA\tBC\t\t";
echo $str.'<br/>';
echo trim($str).'<br/>';
echo ltrim($str).'<br/>';
echo rtrim($str).'<br/>';

echo ltrim($str, '\t');
