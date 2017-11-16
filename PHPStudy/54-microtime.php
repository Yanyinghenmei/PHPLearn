<?php

date_default_timezone_set("Asia/ShangHai");

echo microtime(true).'<br/>';
echo strtotime("+1 week").'<br/>';
echo date('Y-m-d H:i:s', strtotime("+1 week"));

// 生成唯一 id
// string uniqid([string $prefix = "" [, bool $more_entropy = false]])
echo '<br/>';
echo uniqid().'<br/>';
echo uniqid().mt_rand().'<br/>'; // 长度不固定
echo uniqid(microtime().mt_rand()).'<br/>';

// uuid 8-4-4-4-12 = 32
echo md5(uniqid(microtime().mt_rand())),'<br/>';

// 获取日期/时间信息
// array getdate([int timestamp]);
print_r(getdate()).'<br/>';

/*
1. 安装
2. 常用的日期时间函数
*/
