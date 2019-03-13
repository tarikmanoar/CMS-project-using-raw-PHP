<?php 
include_once 'dbconn.php';

session_start();



if (isset($_POST['lgoin'])) {
	$username = mysqli_real_escape_string($dbconn , $_POST['username']);
	$password = mysqli_real_escape_string($dbconn , $_POST['password']);

	$login_query = mysqli_query($dbconn,"SELECT * FROM users WHERE username = '$username' AND user_password = '$password'");
	if (!$login_query) {
		die("Query Failed".mysql_error($dbconn));
	}
	while ($row = mysqli_fetch_assoc($login_query)) {
	    $db_user_id = $row['user_id'];
	    $db_username = $row['username'];
	    $db_user_password = $row['user_password'];
	    $db_user_firstname = $row['user_firstname'];
	    $db_user_lastname = $row['user_lastname'];
	    $db_user_email = $row['user_email'];
	    $db_user_role = $row['user_role'];
	}

	if ($username !== $db_username && $password !== $db_user_password) {
		header("location: ../index.php");
	}elseif ($username == $db_username && $password == $db_user_password) {

		$_SESSION['username'] = $db_username;
		$_SESSION['firstname'] = $db_user_firstname;
		$_SESSION['lastname'] = $db_user_lastname;
		$_SESSION['user_role'] = $db_user_role;
		$_SESSION['user_id'] = $db_user_id;


		header("location: ../admin");
	}else{
		header("location: ../index.php");
	}
}