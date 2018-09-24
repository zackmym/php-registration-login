<?php require_once("header.php"); ?>
<?php require_once("includes/init.php"); ?>


<?php 
	if(isset($_POST['register'])) {
		$firstname = $database->escape_string($_POST['firstname']);
		$lastname = $database->escape_string($_POST['lastname']);
		$username = $database->escape_string($_POST['username']);
		$password = $database->escape_string($_POST['password']);
		$confirm_pass = $database->escape_string($_POST['confirm_pass']);

		//$user = new User();

		if(empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($confirm_pass)) {

			$message = "fill all fields"; 
		} elseif ($password !== $confirm_pass) {
			$message = "passwords do not match";
		} else {
			User::create($firstname, $lastname, $username, $password, $confirm_pass);

			$message = "User Created Successfully";
		}


			

			
		 
	} else {
		$message = "";
	}
 ?>






	<div class="col-md-6 offset-md-3">
		<br>

		<h3 class="text-center">Fill the form below to register</h3> <br>

		<h3 class="error-message"><?php echo $message; ?></h3>

		<form action="" method="post" >

			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" name="firstname" class="form-control" placeholder="Firstname">
			</div>

			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" name="lastname" class="form-control" placeholder="Lastname">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>

			<div class="form-group">
				<label for="firstname">Confirm Password</label>
				<input type="password" name="confirm_pass" class="form-control" placeholder="Confirm password">
			</div>

			<input type="submit" name="register" value="Register" class="btn btn-primary btn-block">

		</form>

	</div>





<?php require_once("footer.php"); ?>