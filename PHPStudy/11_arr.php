<?php
// range/compact 快速创建数组
// range 索引数组
// compact 关联数组

// value: start end step
$arr = range(0,10, 3);
$arr = range('a','z', 3);
print_r($arr);
echo '<hr>';

for($i=97;$i<=122;$i++) {
  $arr[] = chr($i);
}
print_r($arr);
echo '<hr>';

// compact
$username = 'Daniel';
$age = '12';
$email = 'sldjlfslj';

$userInfo = array(
  'usernmae' => $username,
  'age' => $age 
  );
print_r($userInfo);
echo '<hr>';

$userInfo2['username'] = $username;
$userInfo2['age'] = $age;
$userInfo2['$email'] = $email;
print_r($userInfo2);
echo '<hr>';

$userInfo3 = compact('username', 'age', 'email');
echo 'userInfo3'.'<hr/>';
print_r($userInfo3);
