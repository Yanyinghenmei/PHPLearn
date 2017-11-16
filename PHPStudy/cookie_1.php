<?php
date_default_timezone_set('PRC');
header('content-type:text/html;charset-utf-8');
// setcookie('username', 'tom', time()+86400, '/', '*.jd.com');

//写入cookie
// setcookie('name', 'tom', time()+86400, '/', '*.jd.com');
// setcookie('pwd', 'tom', time()+86400, '/', '*.jd.com');
// setcookie('email', 'tom', time()+86400, '/', '*.jd.com');
   setcookie('name', 'IMOOC');
   setcookie('pwd', '123456');
   setcookie('email', '123@mooc.com');

   //检测cookie是否设置，设置则输出
       print_r($_COOKIE['name']);
       print_r($_COOKIE['pwd']);
       print_r($_COOKIE['email']);


// 文件&目录 函数库

// 文件目录函数简介
// 文件函数库常用函数及操作
// 目录函数库常用函数及操作
// 项目实战
