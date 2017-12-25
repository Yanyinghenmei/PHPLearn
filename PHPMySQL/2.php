<?php
header('content-type:text/html;charset=utf8');

/**
 * MySQLi面向过程方式操作数据库
 */
$connect = mysqli_connect('localhost','root','root','imooc') or die('连接数据库失败');

mysqli_set_charset($connect,'utf8');
// mysqli_query($connect,"set names utf8");

$insertSql = "INSERT user(username,password,age) VALUES('Deep','skbbbbbk',25)";
$result = mysqli_query($connect,$insertSql);

if ($result) {
  echo '插入成功'.'<br />';
} else {
  echo '插入失败'.'<br />';
}

$insertSql = "SELECT * FROM user";
$result = mysqli_query($connect,$insertSql);

echo '<pre>';
var_dump(mysqli_fetch_all($result,MYSQLI_ASSOC));
echo '</pre>';


mysqli_close($connect);
