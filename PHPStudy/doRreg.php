<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$userInfo = compact('username','password','email');
print_r($userInfo);

// INSERT user(username,password,email) VALUES($username,$password,$email);

$keys = join(',',array_keys($userInfo));
$values = "'".join("','",array_values($userInfo))."'";

$str = "INSERT user({$keys}) VALUES({$values})";
echo '<br />'.$str;
