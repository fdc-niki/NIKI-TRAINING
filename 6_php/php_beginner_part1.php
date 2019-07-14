<?php

$string = "This is a string";
$number = 2.5;
$boolean = True;
$array = ["Lucy", "Panda", "Grizzly", "Hunter"];

echo $string, "<br>";
echo $number, "<br>";
if (is_bool($boolean) === true) {
    echo "true", "<br>";
}
echo $boolean;
echo $array[0], $array[1], $array[2], $array[3];
?>
