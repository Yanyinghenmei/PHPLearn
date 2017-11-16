<?php

/**
 * 创建文件
 * @param  string $filename 文件名
 * @return bool           是否成功
 */
function create_file(string $filename) {
  // 检测文件是否存在
  if (file_exists($filename)) {
    return false;
  }

  // 检测目录是否存在 不存在测常见
  if (!file_exists(dirname($filename))) {
    // 创建目录, 可以创建多级
    mkdir(dirname($filename),0777,true);
  }

  if (touch($filename)) {
    return true;
  } else {
    return false;
  }
}

/**
 * 删除文件
 * @param  string $filename 文件名/路径
 * @return bool           是否成功
 */
function delete_file(string $filename) {
  // 文件是否存在|是否有操作权限
  if (!file_exists($filename) || !is_writable($filename)) {
    return false;
  }

  if (unlink($filename)) {
    return true;
  }
  return false;
}

/**
 * 拷贝文件
 * @param  string $filename 拷贝的文件
 * @param  string $dest     拷贝到的路径
 * @return bool             是否成功
 */
function copy_file(string $filename, string $dest) {

  if (!file_exists($filename)) {
    return false;
  }

  // 检测$dest 是否是目录, 文件是否存在
  if (!is_dir($dest)) {
    mkdir($dest,0777,true);
  }

  // 检测目标路径是否已经存在同名文件
  $destName = $dest.DIRECTORY_SEPARATOR.basename($filename);
  if (file_exists($destName)) {
    return false;
  }

  // 复制文件
  if (copy($filename,$destName)) {
    return true;
  }
  return false;
}


/**
 * 重命名或移动文件
 * @param  string $filename 源文件
 * @param  string $newname  新文件
 * @return bool             是否成功
 */
function rename_file(string $filename, string $newname) {
  // 检测文件是否是文件并存在
  if (!file_exists($filename)) {
    return false;
  }

  $path = dirname($newname);
  if (!is_dir($path)) {
    mkdir($path,0777,true);
  }

  // 源文件是否存在
  if(file_exists($newname)) {
    return false;
  }

  if (rename($filename,$newname)) {
    return true;
  }
  return false;
}


/**
 * 获取文件信息
 * @param  string $filename 文件名/路径
 * @return array            文件信息
 */
function  file_get_info(string $filename) {
  if (!is_file($filename) || !is_readable($filename)) {
    return false;
  }

  return [
    'ctime' => date("Y-m-d H:i:s", filectime($filename)),
    'mtime' => date("Y-m-d H:i:s", filemtime($filename)),
    'atime' => date("Y-m-d H:i:s", fileatime($filename)),
    'size' => filesize($filename),
    'type' => filetype($filename)
  ];
}

/**
 * 字节单位转换
 * @param  int     $byte      字节数
 * @param  integer $precision 精度
 * @return string             结果
 */
function file_trans_byte(int $byte, int $precision=2) {
  $kb = 1024;
  $mb = 1024*$kb;
  $gb = 1024*$mb;
  $tb = 1024*$gb;

  if ($byte < $kb) {
    return $byte.'B';
  } elseif ($byte < $mb) {
    return round($byte/$kb,$precision).'KB';
  } elseif ($byte < $gb) {
    return round($byte/$mb,$precision).'MB';
  } elseif ($byte < $tb) {
    return round($byte/$gb,$precision).'GB';
  } else {
    return round($byte/$tb,$precision).'TB';
  }
}

/**
 * 读取文件内容返回字符串
 * @param  string $filename 文件名
 * @return string           文件内容
 */
function file_read(string $filename) {
  if (is_file($filename) && is_readable($filename)) {
    return file_get_contents($filename);
  }
  return false;
}

/**
 * 读取文件内容到数组中
 * @param  string  $filename         [文件名]
 * @param  boolean $skip_empty_lines [是否跳过空行]
 * @return [type]                    [结果]
 */
function file_read_array(string $filename, $skip_empty_lines = false) {
  if (is_file($filename) && is_readable($filename)) {
    if ($skip_empty_lines) {
    return file($filename,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    }
    return file($filename);
  }
  return false;
}

/**
 * 向文件中写入内容(覆盖)
 * @param  string $filename 文件名
 * @param  mixed $data     数据
 * @return bool           结果
 */
function file_write_cover(string $filename, $data) {
  $dirname = dirname($filename);
  if (!file_exists($dirname)) {
    mkdir($dirname,0777,true);
  }
  if (is_array($data) || is_object($data)) {
    $data = serialize($data);
  }
  if (file_put_contents($filename,$data)) {
    return true;
  }
  return false;
}

/**
 * 追加内容
 * @param  string $filename 文件名
 * @param  mixed $data     要写入的内容
 * @return bool           结果
 */
function file_write_append(string $filename, $data) {
  $dirname = dirname($filename);
  if (!file_exists($dirname)) {
    mkdir($dirname,0777,true);
  }
  if (is_array($data) || is_object($data)) {
    $data = serialize($data);
  }
  if (is_file($filename)) {
    $srcData = file_get_contents($filename);
    $data = $srcData.$data;
  }
  if (file_put_contents($filename,$data)) {
    return true;
  }
  return false;
}

/**
 * 截断文件到指定大小
 * @param  string  $filename 文件名
 * @param  integer $length   指定大小
 * @return bool            是否成功
 */
function file_truncate(string $filename,int $length=0) {
  // 检测文件是否是文件
  if (is_file($filename) && is_writable($filename)) {
    $handle = fopen($filename,'r+');
    $res = ftruncate($handle,$length<0?0:$length);
    fclose($handle);
    return $res;
  }
  return false;
}

/**
 * [down_file description]
 * @param  string $filename [文件名]
 * @param  array  $allowDownExt 可以下载的格式
 * @return void
 */
function down_file(string $filename, $allowDownExt=['png','jpg','jpeg','gif','txt','html','tar','zip']) {
  // 检测下载文件是否存在并可读
  if (!is_file($filename)) {
    return false;
  }
  // 检测文件类型是否允许下载
  $ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  if (!in_array($ext,$allowDownExt)) {
    return false;
  }
  // 通过heander()发送头信息
  // 告诉浏览器输出的是字节流
  header('content-type:application/octet-stream');
  // 告诉浏览器返回的文件大小是按照字节计算的
  header('Accept-Ranges:bytes');
  // 告诉浏览器返回的文件大小
  header('Accept-Length:'.filesize($filename));
  // 告诉浏览器如何处理文件(这里是作为附件处理), 告诉浏览器最终下载完的文件名称
  header('Content-Disposition:attachment;filename='.basename($filename));
  // 读取文件中的内容
  readfile($filename);
  exit;
}

/**
 * 下载大文件
 * @param  string $filename [文件名]
 * @param  array  $allowDownExt 可以下载的格式
 * @return void
 */
function down_file_section(string $filename, $allowDownExt=['png','jpg','jpeg','gif','txt','html','tar','zip']) {
  // 检测下载文件是否存在并可读
  if (!is_file($filename)) {
    return false;
  }
  // 检测文件类型是否允许下载
  $ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  if (!in_array($ext,$allowDownExt)) {
    return false;
  }

  $filesize = filesize($filename);
  // 通过heander()发送头信息
  // 告诉浏览器输出的是字节流
  header('content-type:application/octet-stream');
  // 告诉浏览器返回的文件大小是按照字节计算的
  header('Accept-Ranges:bytes');
  // 告诉浏览器返回的文件大小
  header('Accept-Length:'.$filesize);
  // 告诉浏览器如何处理文件(这里是作为附件处理), 告诉浏览器最终下载完的文件名称
  header('Content-Disposition:attachment;filename='.basename($filename));
  // 每次读取文件的字节数为 1024 字节, 直接输出数据
  $read_buffer = 1024;
  $sum_buffer=0;
  // 读取文件中的内容
  $handle=fopen($filename,'rb');
  while (!feof($handle) && $sum_buffer<$filesize) {
    echo fread($handle,$read_buffer);
    $sum_buffer+=$read_buffer;
  }
  fclose($handle);
  exit;
}

// echo file_truncate('../testfile.txt',6);
// echo file_write_cover('../testfile.txt', '12312312312313');
// echo file_write_append('../testfile.txt', '12312312312313');
// echo file_read('../testfile.txt');
// echo '<br />';
// print_r(file_read_array('../testfile.txt'));
// echo '<br />';
// print_r(file_read_array('../testfile.txt',true));
// print_r(file_get_info('../1-file.php'));
// echo '<br />'.file_trans_byte(123123131);






///
