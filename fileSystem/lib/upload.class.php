<?php

define('UPLOAD_ERRS',[
  'upload_max_filesize'=>'超过了PHP配置文件中upload_max_filesize选项的值',
  'form_max_size'=>'文件超过了表单MAX_FILE_SIZE选项的值',
  'upload_file_partial'=>'文件部分被上传',
  'no_upload_file_select'=>'没有选择上传文件',
  'upload_system_error'=>'系统错误',
  'upload_no_tmp_path'=>'没有找到临时目录',
  'file_not_write'=>'文件不可写',
  'break_by_extension'=>'由于PHP的扩展程序中断文件上传',
  'no_allow_ext'=>'非法文件类型',
  'exceed_max_size'=>'超出允许上传的最大值',
  'not_true_image'=>'不是真实图片',
  'not_http_post'=>'不是post方式上传',
  'move_error'=>'文件移动失败',
  'no_allow_mime'=>'不允许的文件类型',
  'no_file_info'=>'fileInfo为null'
]);

class upload{
  // 受保护的属性
  protected $fileName;
  protected $maxSize;
  protected $allowMime;
  protected $allowExt;
  protected $uploadPath;
  protected $imgFlag;
  protected $fileInfo;

  protected $error;
  protected $ext;
  protected $uniName;
  // 构造函数
  public function __construct($fileName='myFile',
                              $uploadPath='uploads',
                              $maxSize=5242880,
                              $allowExt=array('jpg','png','jpeg'),
                              $allowMime=array('image/jpeg','image/png','image/jpg'),
                              $imgFlag=true) {
    $this->fileName=$fileName;
    $this->maxSize=$maxSize;
    $this->allowMime=$allowMime;
    $this->allowExt=$allowExt;
    $this->uploadPath=$uploadPath;
    $this->imgFlag=$imgFlag;
    $this->fileInfo=$_FILES[$this->fileName];
  }

  /**
   * 检测是否有错误
   * @return bool 有错误:false, 没错误:true
   */
  protected function checkError() {
    if (is_null($this->fileInfo)) {
      $this->error = ['no_file_info'];
      return false;
    }
    if ($this->fileInfo['error']>0) {
      switch ($this->fileInfo['error']) {
        case 1:
          $this->error = UPLOAD_ERRS['upload_max_filesize'];
          break;
        case 2:
          $this->error = UPLOAD_ERRS['form_max_size'];
          break;
        case 3:
          $this->error = UPLOAD_ERRS['upload_file_partial'];
          break;
        case 4:
          $this->error = UPLOAD_ERRS['no_upload_file_select'];
          break;
        case 6:
          $this->error = UPLOAD_ERRS['upload_no_tmp_path'];
          break;
        case 7:
          $this->error = UPLOAD_ERRS['file_not_write'];
          break;
        case 8:
          $this->error = UPLOAD_ERRS['break_by_extension'];
          break;
      }
      return false;
    }
    return true;
  }

  protected function checkSize() {
    if ($this->fileInfo['size']>$this->maxSize) {
      $this->error = UPLOAD_ERRS['exceed_max_size'];
      return false;
    }
    return true;;
  }

  protected function checkExt() {
    $this->ext = strtolower(pathinfo($this->fileInfo['name'],PATHINFO_EXTENSION));
    if (!in_array($this->ext,$this->allowExt)) {
      $this->error = UPLOAD_ERRS['no_allow_ext'];
      return false;
    }
    return true;
  }

  protected function checkMime() {
    if (!in_array($this->fileInfo['type'],$this->allowMime)) {
      $this->error = UPLOAD_ERRS['no_allow_mime'];
      return false;
    }
    return true;
  }

  protected function checkTrueImage() {
    if ($this->imgFlag) {
      if (!@getimagesize($this->fileInfo['tmp_name'])) {
        $this->error = UPLOAD_ERRS['not_true_image'];
        return false;
      }
      return true;
    }
  }

  protected function checkHTTPPost() {
    if (!is_uploaded_file($this->fileInfo['tmp_name'])) {
      $this->error = UPLOAD_ERRS['not_http_post'];
      return false;
    }
    return true;
  }

  protected function showError() {
    exit('<span style="color:red">'.$this->error.'</span>');
  }

  protected function checkUploadPath() {
    if (!file_exists($this->uploadPath)) {
      mkdir($this->uploadPath,0777,true);
    }
  }

  protected function getUniName() {
    return md5(uniqid(microtime(true),true));
  }

  public function uploadFile() {
    if ($this->checkError()&&
        $this->checkSize()&&
        $this->checkExt()&&
        $this->checkMime()&&
        $this->checkTrueImage()&&
        $this->checkHTTPPost()) {
        // 检测目录
        $this->checkUploadPath();
        $this->uniName = $this->getUniName();
        $destination = $this->uploadPath.DIRECTORY_SEPARATOR.$this->uniName.'.'.$this->ext;
        if (@move_uploaded_file($this->fileInfo['tmp_name'],$destination)) {
          return $destination;
        } else {
          $this->error = UPLOAD_ERRS['move_error'];
          $this->showError();
        }

    } else {
      $this->showError();
    }
  }
}
