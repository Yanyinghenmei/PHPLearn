<?php

echo $_GET['username'], "<br/>";
echo $_GET['age'], "<br/>";

print_r($_GET);

echo "<br/>";

print_r($_REQUEST);
echo "<br/>";
echo $_REQUEST[username], "<br/>";

echo "<hr/>";

$jump = "http://www.imooc.com";
$content = '慕课网';
$imooc = "<a href=$jump>$content</a>";
echo $imooc;
