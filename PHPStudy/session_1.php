<?php

session_name('mySessionId');
session_start();
echo session_id();

$_SESSION['username'] = 'Daniel';

echo '<a href="session_2.php">session_2.php</a>';
// session_destroy();

// php 配置中的SESSION选项 1640;

// session.auto_start(boolean);
// session.auto_start 指定回话模块是否在请求开始时自动启用, 默认为false


// session.name(string) (session_name?)
// 指定回话名以用作 cookie 的名字, 只能有字母数字组成 默认为PHPSESSIONID;

// session.save_headler(string)
// 定义用来存储和获取与回话关联的数据处理器的名字, 默认为files

// session.save_path(string)
// 文件存储路径

// session.gc_maxlifetime(integer)
// 指定过了多少秒数据会被视为'垃圾'并清除

// session.gc_probability(integer) session.gc_divisor(integer)
// 定义在每个回话初始化时启动 gc(garbadge collection, 垃圾回收)进程的概率,
// 此概率通过gc_probability/gc_divisor计算
