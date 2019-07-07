<?php $page_title = "Sign In" ?>
<?php include "includes/login_header.php"; ?>
<?php
	$email_username = "";
	$username = "";

	if(isset($_GET['error'])) {
		$email_username = $_GET['email_username'];
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
					<h4 class="card-title text-center">Log in</h4>
					<form action="includes/login.inc.php" method="post" class="form-signin mt-4">
						<div class="form-group">
							<label for="inputEmail"><h6>Enter Email or Username</h6></label>
							<input type="text"
							       name="email_username"
							       id="inputEmail"
							       class="form-control"
							       autofocus
							       value="<?php echo "{$email_username}"; ?>" >
						</div>

						<div class="form-group">
							<label for="inputPassword"><h6>Enter Password</h6></label>
							<input type="password"
							       name="password"
							       id="inputPassword"
							       class="form-control"
							       autofocus>
						</div>

						<button type="submit"
						        class="btn-submit btn btn-primary btn-pill w-100 text-uppercase mt-2"
						        name="login">
							<i class="fas fa-sign-in-alt mr-2"></i>Log in
						</button>
					</form>

					<hr>
					<a href="signup.php">Create an account.</a>
				</div>
			</div>
		</div>
	</main>

<?php include "includes/login_footer.php"; ?>