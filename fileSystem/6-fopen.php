<?php
$filename = __DIR__.'/text1.txt';
echo $filename;

// $handle = fopen($filename, 'rb');
//
// echo "<br />";
// echo fread($handle, filesize($filename));
//
// fclose($handle);

$handle = fopen($filename,'rb+');

// fwrite() fpuus() 写入
fwrite($handle, 'test test', 3);
fwrite($handle, '123');
fclose($handle);
