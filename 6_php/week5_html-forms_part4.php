<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Palindrome</title>
    </head>
    <body>
        <form class="" action="" method="post">
            <h1>Is Palindrome?</h1>
            Word to check: <input type="text" name="word" value="">
            <input type="submit" name="check" value="CHECK"><br><br>
        </form>
        <div class="">
            <?php
                if(isset($_POST["check"])){
                    $palindrome = palindrome($_POST["word"]);
                    echo $palindrome;
                }

                function palindrome($word){
                    $normalWord = $word;
                    $reverseWord = strrev($word);
                    if ($normalWord == $reverseWord){
                        ?> <span style="font-weight:bold"><?php echo $word ?></span><?php echo " is palindrome";
                    } else {
                        ?> <span style="font-weight:bold"><?php echo $word ?></span><?php echo " is not palindrome";
                    }
                }
             ?>
        </div>
    </body>
</html>
