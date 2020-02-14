<?php

session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'storeapp');

// variable declaration
$username = "";
$email    = "";
$errors   = array();

if (isset($_POST['create_admin'])) {
	register();
}
if (isset($_POST['login_admin'])) {
	login_admin();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $connection, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $full_name	 =  $_POST['full_name'];
	$username    =  strtolower($_POST['username']);
	$email       =  $_POST['email'];
	$phone_number= $_POST['phone_number'];
	$password  	=  $_POST['password'];
	$confirm_password  =  $_POST['confirm_password'];


	// $user_query = mysqli_query($connection,"SELECT * FROM users");
 //     $users = array();
 //     while ($user = mysqli_fetch_array($user_query)) {
 //         $users[] = $user['username'];
 //     }

	// form validation: ensure that the form is correctly filled 
	if (empty($username)) { 
		array_push($errors, "Username is required");
		$user_errors = 'Username cannot be empty!';  
	}
	// if(in_array($username, $users)) {
 //         $user_warning = $username." Exists, Choose Different Username";

	// }
	$sql_user_query		= "SELECT * FROM admin WHERE username='$username'";

	$res_sql_user_query	= mysqli_query($connection, $sql_user_query);


	if(mysqli_num_rows($res_sql_user_query) > 0){
		array_push($errors, "Sorry... Username Already Taken");
		$user_errors="Sorry... Username Already Taken";
	}

	if (empty($email)) { 
		array_push($errors, "Email is required"); 
		$email_errors="Email is required"; 
	}
	if (empty($password)) { 
		array_push($errors, "Password is required");
		$pass_errors="Password is required"; 
	}
	if ($password != $confirm_password) {
		array_push($errors, "The two passwords do not match");
		$confirm_errors="The two passwords do not match";
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database
		      // Handle the Photo
	    $picture  = $_FILES['picture'];
	    $picName = $picture['name'];
	    $picTemName = $picture['tmp_name'];
	    $picSize = $picture['size'];
	    $picError = $picture['error'];
	    $picType = $picture['type'];
	    $picNameSplit = explode('.', $picName);
	    $actualPicExt = end($picNameSplit);
	    $picExt_low = strtolower($actualPicExt);
	    $allowed_pic_Ext = array('jpg','jpeg','png');

	    if(in_array($picExt_low, $allowed_pic_Ext)){
	        if($picError ===0){
	            if ($picSize < 100000000) {
	                $picNameNew = $username.'.'.$actualPicExt;
	                $picDestination = 'images/'.$picNameNew;
	                move_uploaded_file($picTemName, $picDestination); 
	            }else{
	                echo "Picture is too big must be less than 10mb";
	            }
	        }else{
	            echo "There is error uploading the picture";
	        }
	    }else{
	        echo "Picture must has in jpg or png extention";
	    }
	    // end the student Photo

			$query = "INSERT INTO admin (full_name, username, email, phone_number, password,picture) VALUES('$full_name', '$username', '$email', '$phone_number','$password','$picDestination')";
			$final_query=mysqli_query($connection, $query);
			$_SESSION['success']  = "New Admin successfully created!!";

		if ($final_query) {
			echo $_SESSION['success'];
			header('location: index.php');
		}else{
			echo "<h1>Did not save</h1>";
		}
			

}
}

function login_admin(){
	global $connection;

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($connection, "SELECT * FROM admin WHERE username='$username'");
	$admin = mysqli_fetch_array($query);

	if (md5($password) == $admin['password']) {
		header('location: index.php');
	}else{
		echo "Check credentials";
	}
}


// escape string
function e($val){
	global $connection;
	return mysqli_real_escape_string($connection, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['admin']);
	 echo "<script type='text/javascript'>
alert('You are logging out!');
 </script>";
 	header('location:login.php');
}



// LOGIN USER
function login(){
	global $connection, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($connection, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: user_panel.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: user_panel.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}
function isAdmin(){
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin'){
		return true;
	}else{
		return false;
	}
}

function isLoggedIn(){
	if (isset($_SESSION['user'])){
		return true;
	}else{
		return false;
	}
}

?>


