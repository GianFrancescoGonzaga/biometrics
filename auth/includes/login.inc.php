<?php include "../../includes/db.inc.php"; ?>
<?php
	/**
	 * Created by PhpStorm.
	 * User: ludyg
	 * Date: 20/04/2019
	 * Time: 8:26 PM
	 */

	$msg_class = "danger";

	if(isset($_POST['login'])) {
		$email_username = $_POST['email_username'];
		$password = $_POST['password'];

		if(empty($email_username) || empty($password)) {
			$msg = "Please fill any missing fields";
			header("Location: ../login.php?error=true&email_username={$email_username}&msg={$msg}&msg_class={$msg_class}");
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE username=? OR email=?;";
			$stmt = mysqli_stmt_init($connection);
			if(!mysqli_stmt_prepare($stmt, $sql)) {
				$msg = "sql error" . mysqli_error($connection);
				header("Location: ../login.php?error=true&email_username={$email_username}&msg={$msg}&msg_class={$msg_class}");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "ss", $email_username, $email_username);
				mysqli_stmt_execute($stmt);

				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)) {
					$password_check = password_verify($password, $row['password']);
					if(!$password_check) {
						$msg = "Wrong password.";
						header("Location: ../login.php?error=true&email_username={$email_username}&msg={$msg}&msg_class={$msg_class}");
						exit();
					} else if($password_check) {
						session_start();
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['username'] = $row['username'];

						header("Location: ../../index.php?success=true");
					} else {
						$msg = "Wrong password.";
						header("Location: ../login.php?error=true&email_username={$email_username}&msg={$msg}&msg_class={$msg_class}");
						exit();
					}
				} else {
					$msg = "User doesn't exist.";
					header("Location: ../login.php?error=true&email_username={$email_username}&msg={$msg}&msg_class={$msg_class}");
					exit();
				}

			}
		}
	} else {
		header("Location: ../../index.php");
	}