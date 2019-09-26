<?php
include 'db_connect.php';

if (isset($_SESSION["is_logged_in"])) {
	// - if the user is not logged in, redirect to index page
	header("Location: home.php");
}
 ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>Signin Template for Bootstrap</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">

        <style type="text/css">
            .form-signin input {
                border-radius: 2px !important;
                margin-bottom: 10px !important;
            }
        </style>
    </head>
    <body class="text-center">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="http://fdc-inc.com/images/fdc.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please create a new account</h1>
			<?php if($user_exist_error === true){?>
				<p style="color:red;">The user is already exist!</p>
			<?php } ?>

            <?php if ($has_error === true) {?>
                 <div class="alert alert-danger" role="alert">
                    Unable to register! Please check the form below!
                </div>
            <?php } ?>

            <input type="text" class="form-control" placeholder="Firstname" name="user_firstname" required>
            <input type="text" class="form-control" placeholder="Lastname" name="user_lastname" required>
            <input type="text" class="form-control" placeholder="Email" name="user_email" required>
            <input type="password" class="form-control" placeholder="Password" name="user_password" required>
            <input type="password" class="form-control" placeholder="Confirm Password" name="user_confirm_password" required>

             <div class="checkbox mb-3">
                <label>
                    <a href="login.php">
                        Sign in
                    </a>
                </label>
            </div>

            <!-- login button -->
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_register">Register</button>
        </form>
    </body>
</html>
