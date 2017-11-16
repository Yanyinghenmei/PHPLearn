<?php

// mt_rand(min, max); 产生随机数
$i = mt_rand(0,255);
echo $i, '<br/>';

echo '<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.mt_rand(1,9).'</span>';
echo '<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.mt_rand(1,9).'</span>';
echo '<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.mt_rand(1,9).'</span>';
echo '<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.mt_rand(1,9).'</span>';

echo mt_rand(1,255);
