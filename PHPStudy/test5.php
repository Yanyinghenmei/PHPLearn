
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie-edge">
     <title>计算器</title>
   </head>
   <body>
     <h1>计算器</h1>
     <form action="#" method="post">
       num1:<input type="text" name="num1" value="">
       <select class="" name="op">
         <option value="+">+</option>
         <option value="-">-</option>
         <option value="*">*</option>
         <option value="/">/</option>
         <option value="%">%</option>
       </select>
       num2:<input type="text" name="num2" value="">
       <input type="submit" name="act" value="计算">
     </form>
      <?php
      @$act = $_POST['act'];
      if ($act) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if ($num1 != null &&
            $num2 != null) {

              // 是否为数值型
              if (is_numeric($num1) && is_numeric($num2)){
                $op = $_POST['op'];
                $result;
                if ($op == '+') {
                    $result = $num1 + $num2;
                } elseif ($op == '-') {
                  $result = $num1 - $num2;
                } elseif ($op == '*') {
                  $result = $num1 * $num2;
                } elseif ($op == '/') {
                  if ($num2 == 0) {
                    $result = '除数不能为0';
                  } else {
                    $result = $num1 /  $num2;
                  }
                } elseif ($op == '%') {
                  if ($num2 == 0) {
                    $result = '除数不能为0';
                  } else {
                    $result = $num1 % $num2;
                  }
                }
                echo "{$act}";
                echo "{$result}";
              } else {
                echo "非法操作数";
              }

        } else {
          echo "请输入操作数";
        }

        $act = null;
        $num1 = null;
        $num2 = null;
        $result = null;
      } ?>
   </body>
 </html>
