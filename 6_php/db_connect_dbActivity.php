<?php
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

echo "YOU HAVE AN ACTIVE DATABASE CONNECTION!!";
echo "<hr/>";

// login
if (isset($_GET["action"]) && ($_GET["action"] == "logout")) {
	unset($_SESSION["is_logged_in"]);
	header("Location: login.php");
	return false;
}

// - set to blank for now
$search_term = "";
// - if search term is present
if(isset($_GET["search_submit"])){
	if(!empty($_GET["user_search_term"])) {
		$search_term = $_GET["user_search_term"];
		$sql = "
			SELECT * FROM
				'employees'
			WHERE
				first_name LIKE '%$search_term%'
			OR
				last_name LIKE '$search_term%'
			OR
				phone_number LIKE '%$search_term%'
			OR
				email_address LIKE '%$search_term%'
			OR
				address1 LIKE '%$search_term%'
			";
		$result3 = mysqli_query($CONNECTION, $sql) ;
	}
} else {
	// this code is for fetching information
	$sql = "SELECT * FROM `employees` order by id desc";
	$result = mysqli_query($CONNECTION, $sql);
}

// this block of code is for saving new records
$has_error = "";
if(isset($_POST["submit_register"])){
	$first_name = mysqli_real_escape_string($CONNECTION, $_POST['user_first_name']);
	$last_name = mysqli_real_escape_string($CONNECTION, $_POST['user_last_name']);
	$phone_number = mysqli_real_escape_string($CONNECTION, $_POST['user_phone']);
	$email_address = mysqli_real_escape_string($CONNECTION, $_POST['user_email']);
	$address1 = mysqli_real_escape_string($CONNECTION, $_POST['user_address_1']);
	$address2 = mysqli_real_escape_string($CONNECTION, $_POST['user_address_2']);

	// validating input
	if(
		empty($first_name) ||
		empty($last_name) ||
		empty($phone_number) ||
		empty($email_address) ||
		empty($address1) ||
		empty($address2)
	){
		$has_error = true;
	}

	// if no error save data
	if ($has_error != true) {
		$sql = "INSERT INTO employees(first_name,last_name,phone_number,email_address,address1,address2)
		VALUES('$first_name', '$last_name','$phone_number','$email_address','$address1','$address2')";

		if (mysqli_query($CONNECTION, $sql)) {
			$has_error = false;
		} else {
			$has_error = true;
		}
	}


}

// this block of code is for updating
if(isset($_POST["submit_update"])){
	$employee_id = mysqli_real_escape_string($CONNECTION, $_POST["employee_id"]);
	$first_name = mysqli_real_escape_string($CONNECTION, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($CONNECTION, $_POST['last_name']);
	$phone_number = mysqli_real_escape_string($CONNECTION, $_POST['phone_number']);
	$email_address = mysqli_real_escape_string($CONNECTION, $_POST['email_address']);
	$address1 = mysqli_real_escape_string($CONNECTION, $_POST['address1']);
	$address2 = mysqli_real_escape_string($CONNECTION, $_POST['address2']);

	$sql = "
		update
		 	employees
		set
			first_name = '$first_name',
			last_name = '$last_name',
			phone_number = '$phone_number',
			email_address = '$email_address',
			address1 = '$address1'
			address2 = '$address2'

		where
			id = $employee_id";
	$result1 = mysqli_query($CONNECTION, $sql);
}

// this block of code is for deleting
if(isset($_POST["submit_delete"])){
	$employee_id = $_POST["employee_id"];
	$sql = "DELETE FROM employees WHERE id = $employee_id";
	$result2 = mysqli_query($CONNECTION, $sql);

}


// this code is for
mysqli_close($CONNECTION);
?>
