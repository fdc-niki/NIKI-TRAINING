<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "fdc_exercise";
    $conn = mysqli_connect($host,$user,$password,$dbname);
    if(!$conn){
        include("db_fail.php");
    } else {
        include("db_success.php");
    }
?>
