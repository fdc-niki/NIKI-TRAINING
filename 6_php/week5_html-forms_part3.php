<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Dinner Survey</title>
    </head>
    <body>
        <h1>Company Dinner Feedback Survey</h1>
        <?php

        if(empty($_POST["submit"])){ ?>
            <form action="" method="post">
            Employee name <br>
            <input type="text" name="name" value="" required><br><br>
            How would you rate your overall experience during dinner?<br>
            <select name="rating">
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Fair">Fair</option>
                <option value="Poor">Poor</option>
            </select><br><br>
            Do you have any other suggestions or comments to help us improve our future events?<br>
            <textarea name="comments" rows="4" cols="40"></textarea><br><br>
            <input type="submit" name="submit" value="Submit">
            </form>
    <?php } else {
            echo "EMPLOYEE: " . $_POST["name"] . "<br>";
            echo "RATING: " . $_POST["rating"] . "<br>";
            echo "COMMENTS: " . $_POST["comments"] . "<br>";
            }

         ?>

    </body>
</html>
