<?php


define('UPLOAD_ERRS',[
  'upload_max_filesize'=>'超过了PHP配置文件中upload_max_filesize选项的值',
  'form_max_size'=>'文件超过了表单MAX_FILE_SIZE选项的值',
  'upload_file_partial'=>'文件部分被上传',
  'no_upload_file_select'=>'没有选择上传文件',
  'upload_system_error'=>'系统错误',
  'no_allow_ext'=>'非法文件类型',
  'exceed_max_size'=>'超出允许上传的最大值',
  'not_true_image'=>'不是真实图片',
  'not_http_post'=>'不是post方式上传',
  'move_error'=>'文件移动失败'
]);


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
function file_down_section(string $filename, $allowDownExt=['png','jpg','jpeg','gif','txt','html','tar','zip']) {
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

/**
 * 单文件上传
 * @param  array   $fileInfo   [文件信息]
 * @param  string  $uploadPath [默认保存路径]
 * @param  boolean $imageFlag  [是否检测真是图片]
 * @param  array   $allowExt   [允许上传的文件类型]
 * @return mixed               [保存路径/错误信息]
 */
function file_upload(array $fileInfo,
                    string $uploadPath='uploads',
                      bool $imageFlag=true,
                     array $allowExt=array('jpeg','jpg','png','gif'),
                       int $maxSize=2097152) {

  /*
  $allowExt
  $maxSize
  $imageFlag
  $uploadPath
   */

  // 检测上传是否有错误
  if ($fileInfo['error']===UPLOAD_ERR_OK) {
    // 检测上传文件类型
    $ext = strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));
    if (!in_array($ext,$allowExt)) {
      return array('return_code'=>false,'mes'=>UPLOAD_ERRS['no_allow_ext']);
    }
    // 上传文件大小是否符合规范
    if ($fileInfo['size']>$maxSize) {
      return array('return_code'=>false,'mes'=>UPLOAD_ERRS['exceed_max_size']);
    }
    // 检测是否是真是图片
    if ($imageFlag) {
      if (@!getimagesize($fileInfo['tmp_name'])) {
        return array('return_code'=>false,'mes'=>UPLOAD_ERRS['not_true_image']);
      }
    }
    // 检测文件是否是通过HTTP POST方式上传的
    if (!is_uploaded_file($fileInfo['tmp_name'])) {
      return array('return_code'=>false,'mes'=>UPLOAD_ERRS['not_http_post']);
    }

    // 检测目录是否存在
    if (!is_dir($uploadPath)) {
      mkdir($uploadPath,0777,true);
    }
    // 生成唯一文件名,防止重名覆盖
    $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
    $dest = $uploadPath.DIRECTORY_SEPARATOR.$uniName;
    // 移动服务器端的临时文件
    if (@!move_uploaded_file($fileInfo['tmp_name'],$dest)) {
      return array('return_code'=>false,'mes'=>UPLOAD_ERRS['move_error']);
    }
    return array('return_code'=>true,'mes'=>$dest);
  } else {
    switch ($fileInfo['error']) {
      case 1:
        $mes = UPLOAD_ERRS['upload_max_filesize'];
        break;
      case 2:
        $mes = UPLOAD_ERRS['form_max_size'];
        break;
      case 3:
        $mes = UPLOAD_ERRS['upload_file_partial'];
        break;
      case 4:
        $mes = UPLOAD_ERRS['no_upload_file_select'];
        break;
      case 6:
      case 7:
      case 8:
        $mes = UPLOAD_ERRS['upload_system_error'];
        break;
    }
    return array('return_code'=>false,'mes'=>$mes);
  }
}

/**
 * 重构文件上传的数据
 * @param  array $info 接收到的数据
 * @return array       重构完成的数据
 */
function file_get_files($info) {
  $i=0;
  $files=array();
  foreach ($info as $file) {
    if (is_string($file['name'])) {
      // 单文件
      $files[$i]=$file;
      $i++;
    } elseif (is_array($file['name'])) {
      // 多文件
      foreach ($file['name'] as $key => $value) {
        $files[$i]['name']=$file['name'][$key];
        $files[$i]['type']=$file['type'][$key];
        $files[$i]['tmp_name']=$file['tmp_name'][$key];
        $files[$i]['error']=$file['error'][$key];
        $files[$i]['size']=$file['size'][$key];
        $i++;
      }
    }
  }
  return $files;
}

/**
 * 多文件上海窜
 * @return array 上传结果
 */
function file_multiple_upload() {
  if (!count($_FILES)) {
    return array(false,'上传文件太大, 超过post_max_size');
  }
  $files = file_get_files($_FILES);
  $results=array();
  foreach ($files as $fileInfo) {
    $results[]=file_upload($fileInfo);
  }
  return $results;
}

/**
 * 压缩单个文件
 * @param  string $filename 文件名
 * @return bool             压缩结果
 */
function zip_file(string $filename) {
  if (!is_file($filename)) {
    return false;
  }

  $zip = new ZipArchive();
  $zipName = basename($filename).'.zip';
  // 打开压缩包, 不存在创建, 存在则覆盖
  if ($zip->open($zipName,ZipArchive::CREATE|ZipArchive::OVERWRITE)) {
    // 将文件添加到压缩包中
    if($zip->addFile($filename)) {
      // @unlink($filename);
    }
    $zip->close();
    return true;
  } else {
    return false;
  }
}

var_dump(zip_file('uploads/1.jpg'));














//
