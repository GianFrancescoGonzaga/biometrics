<?php
	/**
	 * Created by PhpStorm.
	 * User: ludyg
	 * Date: 20/04/2019
	 * Time: 6:48 PM
	 */

	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "loginsystem";

	$connection = mysqli_connect($host, $user, $password, $db);
	if(!$connection) die(mysqli_error($connection));