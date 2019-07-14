<?php

  $names = ["sushi", "ramen", "chocolate", "lechon", "peach"];

  print_r($names);

  echo "<br>";

  echo $names[0], "<br>";
  echo $names[4], "<br>";
  unset($names[4]);
  array_push($names, "niki");
  print_r($names);

?>
