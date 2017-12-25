<?php
header('content-type:text/html;charset=utf8');

var_dump('mysql');
// phpinfo();

// MySQL方式连接数据库 mysql -uroot -p password
// mysql_connect($server,$username,$password);
$link = @mysql_connect('localhost','root','root') or die('数据库连接失败');
var_dump($link);

// 选择数据库 use database;
// mysql_select_db($database_name);
$database_name = 'imooc';
mysql_select_db($database_name) or die('数据库选择失败');


// 设置字符集 set names utf8;
// mysql_set_charset($charset);
mysql_set_charset('utf8');


// 插入一条数据
// $res = mysql_query("INSERT user(username,password,age) VALUES('Crol','ssssss',34)");
// if ($res) {
//   echo '插入成功'.'<br />';
// }

// 修改数据
// $res = mysql_query("UPDATE user SET username='吕树' WHERE id=3");
// if ($res) {
//   echo '修改成功'.'<br />';
// }

// 删除一条数据
// $res = mysql_query("DELETE FROM user WHERE id=3");
// if ($res) {
//   echo '删除成功'.'<br />';
// }

// 新建一个表
// $createSql = "CREATE TABLE dropTest(
//   id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//   username VARCHAR(20) UNIQUE NOT NULL
// )";
// $res = mysql_query($createSql);
// if ($res) {
//   echo '创建成功'.'<br />';
// } else {
//   echo '创建失败'.'<br />';
// }

// 删除一个表
// $res = mysql_query("DROP TABLE dropTest");
// if ($res) {
//   echo '删除成功'.'<br />';
// } else {
//   echo '删除失败'.'<br />';
// }


// 执行sql语句 INSERT UPDATE DELETE DROP
// mysql_query($query);  返回值bool

// mysql_fetch_array
// MYSQL_ASSOC: 返回关联数组
// MYSQL_NUM: 返回索引数组
// MYSQL_BOTH: 返回关联/索引混合数组    默认
echo '<br />';
$result = mysql_query("SELECT * FROM user");
while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) {
  echo $row['id'].$row['username'].$row['addr'];
  echo '<br />';
}

// 关闭数据库
mysql_close($link);
