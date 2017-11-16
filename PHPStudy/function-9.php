
<?php

$numArr = [1, 43, 54, 62, 21, 66, 32, 78, 36, 76, 39];

function bubbleSort(array &$arr) {

  $length = count($arr);
  for ($i=0; $i <= $length-2; $i++) {
    for ($j=0; $j <= $length-2-$i; $j++) {
      if ($arr[$j] > $arr[$j+1]) {
        $temp = $arr[$j];
        $arr[$j] = $arr[$j+1];
        $arr[$j+1] = $temp;
      }
    }
  }
}

bubbleSort($numArr);
print_r($numArr);

function hlt($n) {
  if ($n === 1) {
    return 1;
  }

  return 2*hlt($n-1)+1;
}
echo "<br/>";
// echo hlt(4);


function hlt1($n) {
  if ($n === 1) {
    return 1;
  }

  return hlt1($n-1);
}
echo hlt1(4);

// func_get_args
// func_num_args
