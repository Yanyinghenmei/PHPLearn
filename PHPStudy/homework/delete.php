<?php

$id = $_GET['del'];
$filename = "msg.txt";
$messages = [];

if(file_exists($filename)) {
  $string = file_get_contents($filename);
  if (strlen($string) > 0) {
    $messages = unserialize($string);
    unset($messages[$id]);
    $resultMsgs = serialize($messages);
    if (file_put_contents($filename,$resultMsgs)) {
      echo "<script>alert('删除成功');location.href='message_board.php';</script>";
    } else {
      echo "<script>alert('删除失败');location.href='message_board.php';</script>";
    }
  }
}
