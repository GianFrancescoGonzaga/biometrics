<?php include "../../includes/db.inc.php"; ?>
<?php
	/**
	 * Created by PhpStorm.
	 * User: ludyg
	 * Date: 20/04/2019
	 * Time: 6:40 PM
	 */

	$msg_class = "danger";

	if(isset($_POST['submit'])) {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
			$msg="Please fill all the fields required.";
			header("Location: ../signup.php?error=true&email={$email}&username={$username}&msg={$msg}&msg_class={$msg_class}");
			exit();
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			$msg="Invalid Email";
			header("Location: ../signup.php?error=true&username={$username}&msg={$msg}&msg_class={$msg_class}");
			exit();
		}

		if($confirm_password != $password) {
			$msg="Passwords are not the same.";
			header("Location: ../signup.php?error=true&email={$email}&username={$username}&msg={$msg}&msg_class={$msg_class}");
			exit();
		}

		$sql = "SELECT username FROM users WHERE username=?";
		$stmt = mysqli_stmt_init($connection);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			$msg="SQL Error" . mysqli_error($connection);
			header("Location: ../signup.php?error=true&email={$email}&username={$username}&msg={$msg}&msg_class={$msg_class}");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$result_check = mysqli_stmt_num_rows($stmt);

			if($result_check > 0) {
				$msg="Username already taken.";
				header("Location: ../signup.php?error=true&email={$email}&username={$username}&msg={$msg}&msg_class={$msg_class}");
				exit();
			} else {
				$sql = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					$msg="SQL Error" . mysqli_error($connection);
					header("Location: ../signup.php?error=true&email={$email}&username={$username}&msg={$msg}&msg_class={$msg_class}");
					exit();
				} else {
					$hashed_password = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
					mysqli_stmt_execute($stmt);
					header("Location: ../login.php?signup=true");
				}
			}
		}

		mysqli_stmt_close($stmt);
		mysqli_close($connection);
	} else {
		header("Location: ../signup.php");
	}
