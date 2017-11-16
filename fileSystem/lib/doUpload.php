<?php

require_once 'file.func.php';
$fileInfo=$_FILES['myFile'];
// print_r($fileInfo);
var_dump(file_upload($fileInfo));
