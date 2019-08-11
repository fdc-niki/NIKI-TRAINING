<?php
    $name = "";
    if (isset($_POST["name"])) {
       $name = $_POST["name"];
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Week5_html and forms</title>
    </head>
    <body>
        <form action="week5_html-forms_part1.php" method="post">
            Please input your name:<br>
            <input type="text" name="name" value="">
            <input type="submit" name="Submit Name">
        </form>
        <div>
            <h2> <?php echo "Hello $name !"; ?> </h2>
        </div>
    </body>
</html>
