<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>作业</title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <input type="text" name="lineNum" value="">
      <br>
      <input type="submit" name="action" value="金字塔">
      <input type="submit" name="action" value="空心菱形">
    </form>
  </body>
</html>

<?php
@$action = $_POST['action'];
$lineNum = $_POST['lineNum'];

if (is_numeric($lineNum)) {

  // 金字塔
  if ($action == '金字塔') {
    printPyramid($lineNum);
  }

  // 空心菱形
  elseif ($action == '空心菱形') {
    printDiamond($lineNum);
  }
} else {
    echo "请输入数字";
}
// 清除
$lineNum = null;
$action = null;

// [a-zA-Z_\x7f-\xff]-
// [a-zA-Z0-5_\x7f-\xff]
// function
function printPyramid($lineNum) {
  $columnNum = 2*$lineNum-1;

  for ($i=0; $i < $lineNum; $i++) {
    for ($j=0; $j < $columnNum; $j++) {
      if (($j+$i) < $lineNum-1 ||
          ($j-$i) > $lineNum-1) {
        echo '<span style="color:#FFF;">*</span>';
      } else {
        echo '*';
      }
    }
    echo '<br/>';
  }
}

function printDiamond($lineNum) {
  $columnNum;
  $num;
  if ($lineNum%2) {
    $columnNum = 2*($lineNum+1)/2-1;
    $num = ($lineNum+1)/2 - 1;
  } else {
    $columnNum = 2*$lineNum/2-1;
    $num = $lineNum/2-1;
  }

  for ($i=0; $i < $lineNum; $i++) {
    for ($j=0; $j < $columnNum; $j++) {
      if (($j+$i) == $num ||
          ($j-$i) == $num ||
          $j+$i-$lineNum+1 == $num ||
          $j-$i+($lineNum-1) == $num) {
        echo '*';
      } else {
        echo '<span style="color:#FFF;">*</span>';
      }
    }
    echo '<br/>';
  }
}


 ?>
