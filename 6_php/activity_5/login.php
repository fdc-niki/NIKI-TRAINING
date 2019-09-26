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
    </head>
    <body class="text-center">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="http://fdc-inc.com/images/fdc.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <?php if ($login_error === true) {?>
                <div class="alert alert-danger" role="alert">
                    Unable to login account! Please check your credentials!
                </div>
            <?php } ?>

            <!-- email address -->
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="login_user_email_address" required autofocus>

            <!-- passwprd -->
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="login_user_password" required>

            <div class="checkbox mb-3">
                <label>
                    <a href="register.php">
                        Sign up
                    </a>
                </label>
            </div>

            <!-- login button -->
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit_login">Sign in</button>
        </form>
    </body>
</html>
