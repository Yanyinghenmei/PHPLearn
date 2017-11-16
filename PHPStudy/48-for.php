<?php

// 死循环
for ($i=0; $i >= 0; $i++) {
  echo $i.'<br/>';
  if ($i>10) {
    break;
  }
}

// break 结束for, while, do...while ;结束循环
// contiune 结束本次循环
// return 停止当前函数运行

if (true) {
  echo "hah";
  echo "test break";
}

echo '<hr/>';

echo '<table border="1" cellpadding="0" cellspacing="0" width="80%">';
for ($i=1; $i <= 9; $i++) {
  echo '<tr>';
  for ($j=1; $j <= $i; $j++) {
    $result = $i * $j;
    echo '<td>'."$j*$i=$result".'</td>';
  }
  echo '</tr>';
}
echo '</table>';

// 百钱买白鸡


// 特殊写法
for ($i=0; $i < 10; $i++) :
  echo "lllllll";
endfor;

//
$i=0;
for (;$i < 10;$i++) {
  echo "000";
}

// 省略条件语句
// 条件永远为真
echo '<hr/>';
for ($i=0;; $i++) {
  echo "{$i}";
  if ($i > 10) {
    break;
  }
}

// 最后一条条件语句有效
for ($i=0; $i < 10, $i < 4; $i++) {
  echo '----'."$i";
}
