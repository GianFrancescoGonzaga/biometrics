<?php
	if(!isset($_SESSION['user_id']) || !$_SESSION['username']) {
		header("Location: auth/login.php");
	}