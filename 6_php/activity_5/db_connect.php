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

// HOME USERS DATA
$total_pages = 0;
$current_page = 0;
$current_offset = 0;
$per_page = 5;

$search_term = "";
// - if search term is present
if(isset($_GET["submit_search"]) && !empty($_GET["search_input"])) {
	$search_term = $_GET["search_input"];
	$sql = "
		SELECT * FROM
			`users`
		WHERE
			`first_name` LIKE '%$search_term%'
		OR
			`last_name` LIKE '%$search_term%'
		OR
			`email_address` LIKE '%$search_term%'
		ORDER BY id ASC
		";
	$result = mysqli_query($CONNECTION, $sql) ;
} else if(!isset($_GET["page"])){
	$sql = "SELECT * FROM `users` ORDER BY id ASC";
	$result = mysqli_query($CONNECTION, $sql) ;
} else {
	if (isset($_GET["page"])) {
		$current_page = $_GET["page"] - 1;
	}

	$sql = "
		SELECT
			count(id) as total_rows
		FROM
			`users`
	";
	$count_result = mysqli_query($CONNECTION, $sql);
	$count_row = mysqli_fetch_assoc($count_result);

	$total_pages = $count_row["total_rows"] / $per_page;

	if ($current_page > 0) {
		$current_offset = $current_page * $per_page;
	}

	$sql = "
		SELECT * FROM
			`users`
		LIMIT $per_page OFFSET $current_offset";

	$result = mysqli_query($CONNECTION, $sql);
}

mysqli_close($CONNECTION);
?>
