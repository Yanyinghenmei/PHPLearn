
<?php
header('content-type:text/html;charset=utf-8');

// 预定义变量
/*
 * 所有的预定义变量都是数组, 都是全局变量
 * $GLOBALS    超全局变量, 没有下划线, 包含以下所有预定义变量
 * $_SERVERS    服务器和执行环境信息变量
 * $_ENV        环境变量
 * $_FILES      文件上传信息变量
 * $_COOKIE     http cookies
 * $_GET        HTTP GET变量              接收以问号形式传递的数据,
 * $_POST       HTTP POST变量             主要接收表单以POST发出的数据
 $ $_REQUEST    包含 以上三个
*/

// 接收表单发送的数据
// $_POST[]
echo '用户名:', $_POST['username'], '<br/>';
echo '密码:', $_POST['password'], '<br/>';
echo '邮件:', $_POST['email'], '<br/>';
echo '性别:', $_POST['sex'], '<br/>';


// $_GET        HTTP GET变量
/*
接收以问号形式传递的数据
表单以get形式发送的数据
包括超链接
*/
