<?php
include 'db_connect_dbActivity.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EMPLOYEE MGT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<!-- main container class -->
	<div class="container" style="padding-top: 15px;">
		<!-- jumbotron section -->
		<div class="jumbotron" style="margin-bottom: 15px; padding: 1rem 2rem;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1>- EMPLOYEE MGT -</h1>
				</div>
			</div>
		</div>

		<!-- header section -->
		<header class="row">
			<div class="col-sm-12">
				<!-- success message -->
				<?php if ($has_error === false) {?>
				<div class="alert alert-success" role="alert">
					An employee was registered!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } ?>

				<?php if ($has_error === true) {?>
				 <div class="alert alert-danger" role="alert">
					Unable to save employee!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } ?>

				<!-- registration form -->
				<div class="card">
					<div class="card-header">
						REGISTRATION FORM
					</div>
					<div class="card-body">
						<form method="POST" action="">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputEmail4">Firstname</label>
									<input type="text" class="form-control" name="user_first_name" placeholder="John">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Lastname</label>
									<input type="text" class="form-control" name="user_last_name" placeholder="Doe">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Phone Number</label>
									<input type="text" class="form-control" name="user_phone" placeholder="(053)323354">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Email Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_email" placeholder="fdc@fdc.com">
							</div>
							<div class="form-group">
								<label for="inputAddress">Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_address_1" placeholder="1234 Main St">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Address 2</label>
								<input type="text" class="form-control" id="inputAddress2" name="user_address_2" placeholder="Apartment, studio, or floor">
							</div>
							<button type="submit" name="submit_register" class="btn btn-primary">REGISTER</button>
						</form>
					</div>
				</div>
			</div>
		</header>

		<!-- content section -->
		<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- ACTIVITY 4 - SEARCH -->
                        <div class="clearfix">
                            <form class="form-inline" action="" method="GET">
                                <div class="input-group mb-3 col-12" style="padding-left: 0px; padding-right: 0px;">
                                    <input type="text" class="form-control" placeholder="Type something" aria-describedby="basic-addon2" name="user_search_term">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" name="search_submit">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>

							<table class="table table-bordered">
								<thead class="thead-dark">
									<tr>
										<th scope="col" class="text-center">#</th>
										<th scope="col" class="text-center">First</th>
										<th scope="col" class="text-center">Last</th>
										<th scope="col" class="text-center">Email</th>
										<th scope="col" class="text-center">Phone</th>
										<th scope="col" class="text-center">Address1</th>
										<th scope="col" class="text-center">Address2</th>
									</tr>
								</thead>
								<tbody>

									<?php if(mysqli_num_rows($result) > 0){ // has to memorize
									while($row = mysqli_fetch_assoc($result)){ // has to memorize?>
										<tr>
											<th scope="row"><?php echo $row["id"]; ?></th>
											<td><?php echo $row["first_name"]; ?></td>
											<td><?php echo $row["last_name"]; ?></td>
											<td><?php echo $row["email_address"]; ?></td>
											<td><?php echo $row["phone_number"]; ?></td>
											<td><?php echo $row["address1"]; ?></td>
											<td><?php echo $row["address2"]; ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="Basic example">
													<form class="" action="" method="post">
														<input type="text" name="employee_id" value="<?php echo $row["id"]; ?>">
														<input type="text" name="first_name" value="<?php echo $row["first_name"]; ?>">
														<input type="text" name="last_name" value="<?php echo $row["last_name"]; ?>">
														<input type="text" name="email_address" value="<?php echo $row["email_address"]; ?>">
														<input type="text" name="phone_number" value="<?php echo $row["phone_number"]; ?>">
														<input type="text" name="address1" value="<?php echo $row["address1"]; ?>">
														<input type="text" name="address2" value="<?php echo $row["address2"]; ?>">
														<input type="submit" class="btn btn-warning" name="submit_update" value="UPDATE">
													</form>
													<form class="" action="" method="post">
														<input type="text" name="employee_id" value="<?php echo $row["id"]; ?>">
														<input type="submit" class="btn btn-danger" name="submit_delete" value="DELETE">
													</form>
												</div>
											</td>
										</tr>
									<?php }
								} else {
									echo "0 results";
								} ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
