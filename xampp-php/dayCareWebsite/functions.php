<?php 
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'daycare');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['create_user'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $connection, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $full_name	 =  e($_POST['full_name']);
	$username    =  strtolower(e($_POST['username']));
	$email       =  e($_POST['email']);
	$mobile_number= e($_POST['mobile_number']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);


	// $user_query = mysqli_query($connection,"SELECT * FROM users");
 //     $users = array();
 //     while ($user = mysqli_fetch_array($user_query)) {
 //         $users[] = $user['username'];
 //     }

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	// if(in_array($username, $users)) {
 //         $user_warning = $username." Exists, Choose Different Username";

	// }
	$sql_user_query		= "SELECT * FROM users WHERE username='$username'";

	$res_sql_user_query	= mysqli_query($connection, $sql_user_query);


	if(mysqli_num_rows($res_sql_user_query) > 0){
		array_push($errors, "Sorry... Username Already Taken");
	}

	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
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
	                $picDestination = 'images/users/'.$picNameNew;
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

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (full_name, username, email, mobile_number, user_type, password,picture) 
					  VALUES('$full_name', '$username', '$email', '$mobile_number', '$user_type', '$password','$picDestination')";
			mysqli_query($connection, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: login.php');
		}else{
			$query = "INSERT INTO users (full_name, username, email, mobile_number, user_type, password,picture) 
					  VALUES('$full_name', '$username', '$email', '$mobile_number', 'user', '$password','$picDestination')";
			mysqli_query($connection, $query);

			if (!$query) {
				array_push($errors, "booooo");
			}
			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($connection);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: login.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $connection;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
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

//log user out if logout button is clicked

if (isset($_POST['logout'])){
	session_destroy();
	unset($_SESSION['user']);
	header("refresh:5; url=../login.php");
}

 // call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
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
				header('location: index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
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


if (isset($_POST['create_staff'])) {
	create_staff();
}
function create_staff(){
	global $connection, $username, $errors;

	$fullName = e($_POST['fullName']);
	$email = e($_POST['email']);
	$shortName = e($_POST['shortName']);
	$department = $_POST['department'];
	$mobileNumber = $_POST['mobileNumber'];

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
	                $picNameNew = $fullName.'.'.$actualPicExt;
	                $picDestination = 'images/staffs/'.$picNameNew;
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
	    	// end the Picture

	$query = "INSERT INTO `staffs`( `fullName`, `email`, `shortName`, `department`, `mobileNumber`,`picture`) VALUES ('$fullName','$email','$shortName','$department','$mobileNumber','$picDestination')";
	$results = mysqli_query($connection,$query);

	if ($results) {
		echo $fullName." has successfully created";
		header("refresh:5; url=index.php");
	}else{
		display_error();
		header("refresh:5; url=addStaff.php");

	}
}

?>