<?php

$names = ["hideyuki", "ryo", "yusuke", "hitomi", "rie"];
print_r($names);

echo "<br>";

for ($x = 0; $x < count($names); $x++){
  $name = $names[$x];
  echo $name. "<br>";
}

echo "<br>";

$x = 0;
while ($x < count($names)){
  $name = $names[$x];
  echo $name. "<br>";
  $x++;
}

 ?>
