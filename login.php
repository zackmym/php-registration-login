<?php require_once("header.php"); ?>
<?php require_once("includes/init.php"); ?>

<?php 
	if($session->is_logged_in()) { redirect_to("index.php");}

	
	if(isset($_POST['login'])) {


		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		

		
			$found_user = User::verify_user($username, $password);

			if($found_user) {
				$session->login($found_user);
				redirect_to("index.php");
			} else {
				$message = 'username and password do not match';
			}

		
	} else {
		$username = null;
		$password = null;
		$message = "";
	} 



 ?>


	








	<div class="col-md-6 offset-md-3">
	<br>
		<h3 class="text-center">Enter username and password to login</h3><br>

		<h3 class="bg-danger"><?php echo $message; ?></h3>

		<div class="login-form" >

			<form action="" method="post" >

				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="username">
				</div>

				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="password">
				</div>

				<div class="form-group">
					<input type="submit" name="login" value="Login" class="btn btn-primary float-left">
					<a href="register.php" class="btn btn-info float-right">Register</a>
				</div>
				
					
				</div>
	
			</form>

		</div>

	</div>
















<?php require_once("footer.php"); ?>