<?php
$id = $_GET['edit'];
$filename = "msg.txt";
  // 检测
$messages = [];

if(file_exists($filename)) {
  $string = file_get_contents($filename);
  if (strlen($string) > 0) {
    $messages = unserialize($string);
  }
}

// 替换
if(isset($_POST['temMsg'])) {
  $username = strip_tags($_POST['username']);
  $title = strip_tags($_POST['title']);
  $content = strip_tags($_POST['content']);
  $time = time();

  // 组成关联数组
  $message = compact('username','title','content','time');
  $messages[$id] = $message;

  // 序列化
  $msgsStr = serialize($messages);
  if(file_put_contents($filename,$msgsStr)) {
    echo "<script>alert('留言成功');location.href='message_board.php';</script>";
  } else {
    echo "<script>alert('留言失败');location.href='edit.php';</script>";
  }
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
    <link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>编辑</title>
  </head>
  <body>
    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12">
          <?php if($id !== null): ?>
            <form class="form-horizontal" action="#" method="post">
              <legend>编辑留言</legend>
              <label>用户名</label><input type="text" name="username" value=<?php echo $messages[$id]['username']?> required><br>
              <label>标题</label><input type="text" name="title" value=<?php echo $messages[$id]['title']?> required><br>
              <label>内容</label><textarea name="content" rows="8" cols="20" required><?php echo $messages[$id]['content']?></textarea><br><br>
              <input type="submit" value="保存" class="btn btn-primary btn-lg" name="temMsg">
            </form>
          <?php endif;?>
    		</div>
    	</div>
    </div>

  </body>
</html>
