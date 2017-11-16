<?php
header('content-type:text/html;charset=utf-8');

date_default_timezone_set("PRC");
$filename = "msg.txt";
// 检测
$messages = [];
if(file_exists($filename)) {
  $string = file_get_contents($filename);
  if (strlen($string) > 0) {
    $messages = unserialize($string);
  }
}

// 检测用户是否点击了提交按钮
if(isset($_POST['pubMsg'])){
  $username = strip_tags($_POST['username']);
  $title = strip_tags($_POST['title']);
  $content = strip_tags($_POST['content']);
  $time = time();

  // 组成关联数组
  $message = compact('username','title','content','time');

  array_push($messages,$message);

  // 序列化
  $messages = serialize($messages);
  if(file_put_contents($filename,$messages)) {
    echo "<script>alert('留言成功');location.href='message_board.php';</script>";
  } else {
    echo "<script>alert('留言失败');location.href='message_board.php';</script>";
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
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="hero-unit">
				<h1>
					留言板
				</h1>
			</div>
      <?php if (is_array($messages) && count($messages)>0): ?>
			<table class="table">
				<thead>
					<tr>
						<th>
							编号
						</th>
						<th>
							用户
						</th>
						<th>
							标题
						</th>
						<th>
							时间
						</th>
						<th>
							内容
						</th>
					</tr>
				</thead>
        <?php foreach ($messages as $key => $value):?>
				<tbody>
					<tr class="success">
						<td>
							<?php echo $key ?>
						</td>
						<td>
							<?php echo $value['username'] ?>
						</td>
						<td>
							<?php echo $value['title'] ?>
						</td>
						<td>
							<?php echo date("m/d/Y H:i:s", $value['time']) ?>
						</td>
						<td>
							<?php echo $value['content'] ?>
						</td>
            <td>
              <a href="edit.php?edit=<?php echo $key ?>">编辑</a>
            </td>
            <td>
              <a href="javascript:del(<?php echo $key ?>)">删除</a>
              <script type="text/javascript">
                function del(msgid) {
                  if (confirm("确定删除吗")) {
                    location.href="delete.php?del="+msgid;
                  }
                }
              </script>
            </td>
					</tr>
          </form>
				</tbody>
        <?php endforeach;?>
			</table>
    <?php endif; ?>

    <!-- 发布留言 -->
			<form class="form-horizontal" action="#" method="post">
				<legend>请留言</legend>
        <label>用户名</label><input type="text" name="username" required><br>
        <label>标题</label><input type="text" name="title" required><br>
        <label>内容</label><textarea name="content" rows="8" cols="20" required></textarea><br><br>
        <input type="submit" value="发布留言" class="btn btn-primary btn-lg" name="pubMsg">
			</form>
		</div>
	</div>
</div>
</body>
</html>
