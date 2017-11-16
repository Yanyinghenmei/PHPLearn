<?php
header('content-type:text/html;charset=utf-8');

// $_GET        HTTP GET变量
/*
接收以问号形式传递的数据
表单以get形式发送的数据
包括超链接
*/
echo '搜索内容:', $_GET['keyword'], '<br/>';
