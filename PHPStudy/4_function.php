<?php
header('content-type:text/html;charset=utf-8');

/*
1. 自定义函数基础
2. 生命自定义函数
3. 调用自定义函数
4. 参数
5. 返回值
*/
getExtension("hello.png");

echo '<hr/>';

// 默认为小写字符
function getExtension($fileName, $lowerCase = true) {
  $pos = strrpos($fileName,'.');
  $extensionStr = substr($fileName, $pos+1);
  if ($lowerCase) {
    $extensionStr = strtolower($extensionStr);
  }
  echo "$extensionStr";
}

/*
function functionName([$arg[=value]][,...]) {
  ...
}

// 局部变量     函数内
// 全局变量     从申明到文件结束    在函数体外申明的变量
               在函数内使用的时候用 global/$GLOBALS 申明
// 超全局变量   整个文件           系统自带的预定义函数
    $GLOBALS $_SERVER $_GET
*/

$n = 3;
function fun1() {
  // global $n;
  echo "内部变量".$GLOBALS['n'];
  $GLOBALS['n']++;
}

fun1();
echo "<hr/>";
echo $n;

echo "<hr/>";
echo $GLOBALS['n'];

echo '<hr/>';
print_r($GLOBALS);

echo '<hr/>';

// function sum(int $arg1,int $arg2) {
//   return $arg1 + $arg2;
// }

//定义sum函数
   function sum(int $arg1, int $arg2) {
       //函数中计算数值
       $a = 0;
       $b = 0;
       if ($arg1 < $arg2) {
           $a = $arg1;
           $b = $arg2;
       } else {
           $b = $arg1;
           $a = $arg2;
       }

       $result = 0;
       for ($i = $a; $i <= $b; $i++) {
           $result += $i;
       }

       return $result;
   }
   //调用函数，传入数值
   echo sum(1, 9);

// 资源不能作为参数 但是在函数内部可以使用资源 可以传递资源名
function readFileContent($fileName) {
  $heandle = fopen($fileName, 'r');
}

// 函数有默认值得为可选参数, 没有默认值的为必选参数
// 可选参数放在右侧

// 形参: 定义函数时写的参数
// 实参: 调用函数时写的参数











//
