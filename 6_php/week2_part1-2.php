<?php

$numbers = [1,3,5,7,9,11];
print_r($numbers);

echo "<br>";

for ($i = 0; $i < count($numbers); $i++){
  $number = $numbers[$i];
  echo $number * 3 . "<br>";
}

echo "<br>";

$i = 0;
while ($i < count($numbers)){
  $number = $numbers[$i];
  echo $number * 3 . "<br>";
  $i++;
}

 ?>
