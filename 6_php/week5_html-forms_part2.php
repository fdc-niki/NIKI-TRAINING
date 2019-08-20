

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Personal Information</title>
        <style media="">
            body{
                text-align: center;
                background-color: gray;
            }


        </style>
    </head>
    <body>
        <h1>Personal Information</h1><br>
        <form class="" action="" method="post">
            Username: <input type="text" name="username" value="" ><br><br>
            Password: <input type="password" name="password" value="" ><br><br>
            Firstname: <input type="text" name="firstname" value="" ><br><br>
            Lastname: <input type="text" name="lastname" value="" ><br><br>
            Email Address: <input type="email" name="email" value="" ><br><br>
            Birthdate: <input type="date" name="birthdate" value="" ><br><br>
            Present Address: <input type="text" name="presentAddress" value="" ><br><br>
            Gender: <br>
                Female<input type="radio" name="gender" value="Female">
                Male<input type="radio" name="gender" value="Male"><br><br>
            Please make my information private: <input type="checkbox" name="private" value="Yes"><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <div class="">
            <h3>
                <?php
                if(isset($_POST["submit"])){
                    if(isset($_POST["private"]) && $_POST["private"] == "Yes"){
                        echo "Note: User wants information to be private <br>";
                    } else {
                        echo "Username: ". $_POST["username"]. "<br>";
                        echo "Password: ". $_POST["password"]. "<br>";
                        echo "Firstname: ". $_POST["firstname"]. "<br>";
                        echo "Lastname: ". $_POST["lastname"]. "<br>";
                        echo "Email Address: ". $_POST["email"]. "<br>";
                        echo "Birthdate: ". $_POST["birthdate"]. "<br>";
                        echo "Present Address: ". $_POST["presentAddress"]. "<br>";
                        if(isset($_POST['gender'])){
                            echo "Gender: ".$_POST['gender']. "<br>";
                        }else{
                            echo "Gender: No gender specified <br>";
                        }
                        echo "Note: User information can be public <br>";
                        // display();
                    }
                }
                ?>
            </h3>
        </div>
    </body>
</html>

<?php


// function display(){
//     foreach ($_POST as $key => $value){
//         echo "$key is: $value <br>";
//     }
// }


 ?>
