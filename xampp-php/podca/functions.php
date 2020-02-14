<?php
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'podca');
$errors = array();

//Index Effect
$podca_query_last = mysqli_query($connection, "SELECT * FROM `blog` order by SN desc limit 1");
$podca_last = mysqli_fetch_assoc($podca_query_last);


if (isset($_POST['logout'])){
	session_destroy();
	unset($_SESSION['user']);
	header("refresh:5; url=login.php");
}

 // call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $connection, $username, $errors;

	// grap form values
	$username = $_POST['username'];
	$password = $_POST['password'];

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = $password;

		$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($connection, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			$_SESSION['user'] = $logged_in_user;
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
		}else {
			echo "Wrong username/password combination";
		}
	}
}
?>