<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="doAction.php" method="post" enctype="multipart/form-data">请选择您要上传的文件:
    <br>
    <!-- 限制大小 -->
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="800000"> -->
    <input type="file" name="myFile" accept="image/gif,image/png">
    <input type="submit" value="上传文件">
  </form>
</body>
</html>
