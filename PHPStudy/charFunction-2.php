<?php
/* 截余
// 第一次出现
string strstr (string $haystack, mixed $needle);
// 忽略大小写
string stristr (string $haystack, mixed $needle);

// 第一次出现
string strrchr ()
// 最后一次出现
string strrchr ()
*/

$str = 'abcdcef';
echo strstr($str, 'c').'<br/>';
echo stristr($str, 'c').'<br/>';
echo strchr($str, 'c').'<br/>';
echo strrchr($str, 'c').'<br/>';

$filename = 'a.bc.cd.png';
$newFileName = strrchr($filename, '.');
echo substr($newFileName, 1).'<br/>';

/** 反转
 * string strrev (string $string);
 */
 $name = strrev($filename);
 echo $name.'<br/>';
 $location = strpos($name, '.');
 echo substr($filename, -$location, $location).'<br/>';
 echo strrev(substr($name, 0, $location)).'<br/>';

 /** 字符串加密函数 实现计算字符串MD5哈希值
  * string md5(string $str);
  */
  echo md5($filename).'<br/>';

  /** 随机打乱字符串, 可用于产生验证码
   * string str_shuffle(string $str);
   */
   $str = 'abcdeghijklimnopqrstuvwxyz';
   echo substr(str_shuffle($str), 0, 6);

/** 分割字符串
 * explode 使用一个字符串分割另一个字符串
 * array explode (string $delimiter, string $string [, int $limit]);
 * limit 分成几份
 */
$str = 'A|B|C|D';
$arr = explode('|', $str);
print_r($arr);
echo '<hr/>';

/** 合并字符串
 * string implode (array, $pleces);
 * string implode (string $glue, array $pleces);
 */
 echo implode($arr).'<br/>';
 echo implode('', $arr).'<br/>';

/** 格式化字符串
 * sprintf
 * string sprintf (string $format [, mixed $args [, mixed $...]])
 * 说明: 如果%符号多余arg参数, 则必须使用占位符. 占位符位于%符号之后, 由数字和'\$' 组成
 * %s, %b, %f, %u, %%, %d, %e
 */

 $number = 5;
 $str = 'shanghai';
 $txt = sprintf('there are %u million cars in %s', $number, $str);
 echo $txt.'<br/>';

 // %1  指第一个参数
 // \$  占位符多余参数, 需要使用这个
 // .2f 保留小数点后两位,
 $number = 123;
 $txt = sprintf("带有两位小数的结果是: %1\$.2f<br/> 不带小数的是: %1\$d", $number);
 echo $txt.'<br/>';

echo sprintf("%.2f", 123.221);
