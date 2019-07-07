<?php $page_title = "Sign In" ?>
<?php include "includes/login_header.php"; ?>
<?php
	$email = "";
	$username = "";

	if(isset($_GET['error'])) {
		$email = $_GET['email'];
		$username = $_GET['username'];
	}
?>
<?php
	$msg_class = "danger";
	include "../includes/alert_msg.php";
?>
	<main class="row">
		<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
			<div class="card rounded card-signin my-5">
				<div class="card-body">
					<h4 class="card-title text-center">Sign Up</h4>
					<form action="includes/signup.inc.php" method="post" class="form-signin mt-4">
						<div class="form-group">
							<label for="inputEmail"><h6>Email</h6></label>
							<input type="email"
								   name="email"
								   id="inputEmail"
								   class="form-control"
								   autofocus
								   placeholder="e.g. juandelacruz@gmail.com"
								   value="<?php echo "{$email}"; ?>" >
						</div>

						<div class="form-group">
							<label for="inputUsername"><h6>Username</h6></label>
							<input type="text"
								   name="username"
								   id="inputUsername"
								   class="form-control"
								   autofocus
								   placeholder="e.g. Juan Dela Cruz"
								   value="<?php echo "{$username}"; ?>" >
						</div>
						<div class="form-group">
							<label for="inputPassword"><h6>Password</h6></label>
							<input type="password"
								   name="password"
								   id="inputPassword"
								   class="form-control"
								   autofocus
								   placeholder="e.g. u3eVgPuf">
						</div>
						<div class="form-group">
							<label for="inputPassword"><h6>Confirm Password</h6></label>
							<input type="password"
								   name="confirm_password"
								   id="inputPassword"
								   class="form-control"
								   autofocus>
						</div>

						<button type="submit"
								class="btn-submit btn btn-primary btn-pill w-100 text-uppercase mt-2"
								name="submit">
							<i class="fas fa-user-plus mr-2"></i>Sign Up
						</button>
					</form>

					<hr>
					<a href="login.php">I already have an account.</a>
				</div>
			</div>
		</div>
	</main>

<?php include "includes/login_footer.php"; ?>