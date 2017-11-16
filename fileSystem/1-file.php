<?php

date_default_timezone_set('PRC');
/*
 文件信息API
*/

$filename = "./text1.txt";

// 获取文件类型
// filetype
echo '文件类型为: ', filetype($filename), '<br>';

// 获得文件的大小  字节数
echo '文件大小为: ', filesize($filename), '<br />';

// 文件的相关信息
// 文件的创建时间
echo '文件的创建时间: ', date('Y-m-d h:i:s', filectime($filename)), '<br />';

// 文件的修改时间
echo '文件修改时间: ', date('Y-m-d h:i:s', filemtime($filename)), '<br />';

// 文件的最后访问时间
echo '文件的最后访问时间: ', date('Y-m-d h:i:s', fileatime($filename)), '<br />';

// 文件的权限/可读/可写/可执行 is_readable/is_writeable/is_executable
var_dump(
  is_readable($filename),
  is_writable($filename),
  is_executable($filename)
);

// 是否为文件并存在
var_dump(is_file($filename));
var_dump(is_file('filename'));
