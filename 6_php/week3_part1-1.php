<?php

$age = [
  "Ryo" => 25,
  "Hideyuki" => 27,
  "Hitomi" => 27,
  "Yusuke" => 28
];

print_r($age);

echo "<br>";

foreach ($age as $key => $value){
  echo "$key is $value years old. <br />";
}

 ?>
