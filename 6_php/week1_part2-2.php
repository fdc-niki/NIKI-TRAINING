<?php

  $countries = [
    "Philippines" => "Manila",
    "Japan" => "Tokyo",
    "America" => "Washington DC"
  ];

  print_r($countries);
  echo "<br>";
  echo $countries["America"]. "<br>";
  echo count($countries);
  echo "<br>";
  $countries["China"] = "Beijing";
  print_r($countries);
 ?>
