<?php

// i 公鸡数
for ($i=1; $i <= 100; $i++) {
  for ($j=1; $j <= (100-$i-1); $j++) {
    if ($i*5 + $j*3 + (100-$i-$j)/3 == 100 ) {
      var_dump(
        '公鸡有'.$i.'<br/>',
        '母鸡有'.$j.'<br/>',
        '小鸡有'.(100-$i-$j).'<br/>',
        '======================='.'<br/>'
      );
    }
  }
}

// goto 语句不能跳进函数, 循环, 和类
// 但是可以跳出来

goto TEST;

echo '<br/>'."dadada";

for ($i=0; $i < 10; $i++) {
  TEST:
  echo "hello";
}
