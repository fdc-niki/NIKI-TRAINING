<?php

function fibonacci($result){
  $num1 = 0;
  $num2 = 1;
  $cnt = 0;

  while ($cnt < $result){
    echo "$cnt: $num1 <br>";
    $next = $num1 + $num2;
    $num1 = $num2;
    $num2 = $next;
    $cnt = $cnt + 1;
  }
}
$result = 10;
fibonacci($result);

 ?>
