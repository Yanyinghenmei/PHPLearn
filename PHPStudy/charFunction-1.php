<?php

/*
1. 函数库基础
2. 安装字符串函数库
3. 字符串函数库列表
*/

// strlen 获取(英文或数字)字符长度
// mbstring 测试中文的长度

$length = strlen('abcd');
echo $length.'<br/>';

/*
字符串的大小写转换
1. strtolower       转换成小写
2. strtoupper       转换成大写
*/

$str1 = 'html';
$str2 = 'PHP';

echo strtoupper($str1).'<br/>';
echo strtolower($str2).'<br/>';

/*
首字母大小写转换
1. ucfirst: upper char first 将句子首字母转换为大小
2. ucwords: upper char words 将句子的每个单词首字母转换为大写
*/

$str3 = 'this is a test string';
echo ucfirst($str3).'<br/>';
echo ucwords($str3).'<br/>';

/*
字符串替换函数
1. str_replace          实现字符串替换, 区分大小写
    mixed str_replace(mixed $search, mixed replace, mixed $subject, [int &$count]);
2. str_ireplace         不区分大小写
*/

$str = 'javascript';
echo str_replace('a', 'b', $str).'<br/>';
echo str_replace('A', 'b', $str).'<br/>';
echo str_ireplace('A', 'b', $str).'<br/>';

// 小案例
$str = 'ZenD_CONTRollER_FronT';
$str1 = strtolower($str);
echo $str1.'<br/>';
$str2 = str_replace('_',' ',$str1);
echo $str2.'<br/>';
$str3 = ucwords($str2);
echo $str3.'<br/>';
$str4 = str_replace(' ', '_', $str3);
echo $str4.'<br/>';

/*
字符串转化实体函数
htmlspecialchars 讲预定义的字符转换为HTML实体
string htmlspecialchars(string $string, int $flags = ENT_COMPAT)
ENT_COMPAT 默认, 仅转移双引号
ENT_QUOTES 转移双引号和单引号
ENT_NoQUOTES 不转义任何引号
*/

$str = "A>B,B<C,Tom&John,He said:\"I'm OK\"";
// A&gt;B,B&lt;C,Tom&amp;John,He said:&quot;I&#039;m OK&quot
echo htmlspecialchars($str, ENT_QUOTES).'<br/>';
// A>B,B<C,Tom&John,He said:"I'm OK"
// echo $str.'<br/>';

/*
移除字符串两侧的字符
ltrim 删除左侧不需要的空格或其他字符
string ltrim(string $str, [string $charlist]);
如果省略第二个参数, 则删除:
  \0, \r, \n, \t,
  \x0B(垂直制表符), 空格
*/

$str = "\n\n\t\t A B C\t\t\n";
echo ltrim($str).'<br/>';
echo rtrim($str).'<br/>';
echo trim($str).'<br/>';
echo trim($str, "\n").'<br/>';
echo trim($str, "\t").'<br/>';

/*
字符串位置相关函数
1. strpos 返回一个字符串在另一个字符串中间的位置 如果没有出现, 返回FALSE
2. stripos 返回一个字符串在另一个字符串中间的位置, 忽略大小写
3. strrpos 最后出现的位置   区分大小写
4. strripos 最后出现的位置   不区分大小写

   int strops (string haystack, mixed needle, [int offset]);
*/
$str = 'javascript';
var_dump(strpos($str, 'A'), '<br/>');
var_dump(stripos($str, 'A'), '<br/>');
echo '<hr/>';
/*
字符串截取函数
string substr (string $string, int $start, [, int $length]);
如果 start为负数, 则倒数. 最后一位对应-1
如果 length为负数, 则返回start, length之间的字母
*/
echo substr($str, 4, 2).'<br/>';
echo substr($str, 4, -2).'<br/>';
echo substr($str, -4, 2).'<br/>';
echo substr($str, -4, -2).'<br/>';
