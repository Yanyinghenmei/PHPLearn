<?php

$filename = __DIR__.'/text1.txt';
$handle = fopen($filename, 'wb+');

fwrite($handle, '-----'.PHP_EOL);
fputs($handle, '-----');

fseek($handle,0);
echo '<br />'.fread($handle, filesize($filename));
fclose($handle);

echo __FILE__;
