 <?php

     function palindrome($word){
         $normalWord = $word;
         $reverseWord = strrev($word);
         echo "Word to check is: $word <br>";

         if ($normalWord == $reverseWord){
             echo "$word is palindrome";
         } else {
             echo "$word is not palindrome";
         }
     }
     palindrome("nursesrun");


  ?>
