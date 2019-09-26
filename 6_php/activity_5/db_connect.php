<?php
// - ALWAYS INITIALISE SESSION
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "fdc_exercise";

$CONNECTION = mysqli_connect( // has to memorize
			$host,
			$user,
			$password,
			$dbname
		);

if (!$CONNECTION) {
    die("Connection failed: " . mysqli_connect_error());
}

// register
$has_error = "";
$user_exist_error = "";
if(isset($_POST["submit_register"])){
	$first_name = mysqli_real_escape_string($CONNECTION, $_POST['user_firstname']);
	$last_name = mysqli_real_escape_string($CONNECTION, $_POST['user_lastname']);
	$email_address = mysqli_real_escape_string($CONNECTION, $_POST['user_email']);
	$password = mysqli_real_escape_string($CONNECTION, $_POST['user_password']);

	$sql = "
		SELECT * FROM
			`users`
		WHERE
			`email_address` = '$email_address'
		";

	$result1 = mysqli_query($CONNECTION, $sql);
	$count = mysqli_num_rows($result1);
	if($count > 0){
		$user_exist_error = true;
	} else {
		$user_exist_error = false;
	}

	if(
		empty($first_name) ||
		empty($last_name) ||
		empty($email_address) ||
		empty($password)
	){
		$has_error = true;
	} else if($password != $_POST["user_confirm_password"]){
		$has_error = true;
	}



	if ($has_error != true) {
		$sql = "INSERT INTO users(
            first_name,last_name,email_address,password)
          VALUES('$first_name', '$last_name','$email_address','$password')";

		if (mysqli_query($CONNECTION, $sql)) {
			$has_error = false;
		} else {
			$has_error = true;
		}

        if($has_error === false){
            $_SESSION["is_logged_in"] = true;
            if($_SESSION["is_logged_in"] === true){
                header("Location: home.php");
            }
	    }
    }
}

// login
$login_error = "";
if(isset($_POST["submit_login"]) && !empty($_POST["login_user_email_address"]) && !empty($_POST["login_user_password"])) {
	$login_user_email_check = $_POST["login_user_email_address"];
	$login_user_pass_check = $_POST["login_user_password"];
	$sql = "
		SELECT * FROM
			`users`
		WHERE
			`email_address` = '$login_user_email_check'
		AND
			`password` = '$login_user_pass_check'
		";

	$result2 = mysqli_query($CONNECTION, $sql);
    $count_user = mysqli_num_rows($result2);
    if($count_user > 0){
        $_SESSION["is_logged_in"] = true;
        if($_SESSION["is_logged_in"] === true){
            header("Location: home.php");
        }
    } else {
        $login_error = true;
    }
}

// LOGOUT
if (isset($_POST["submit_signout"])) {
	unset($_SESSION["is_logged_in"]);
	header("Location: login.php");
	return false;
}




mysqli_close($CONNECTION);
?>
