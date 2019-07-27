<?php

$number = 22;
echo "Number is $number. <br />";

if ($number < 15){
  $newNum = $number * 2;
  echo "The new number is $newNum";
} else if ($number >= 15 && $number <= 20){
  $newNum = $number + 10;
  echo "The new number is $newNum";
} else {
  $newNum = $number / 2;
  echo "The new number is $newNum";
}

 ?>
