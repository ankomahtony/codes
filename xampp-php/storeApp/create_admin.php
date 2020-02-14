<?php
include("functions.php")
?>
<html>
	<head>
		<title>
			StoreApp
		</title>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/font-face.css" rel="stylesheet" media="all">
	    <link href="css/font-awesome.min.css" rel="stylesheet" media="all">
	    <link href="css/fontawesome-all.min.css" rel="stylesheet" media="all">
			
	</head>
	<body style="background-color: rgba(120,120,120,0.4);">

	<div class="row"> 
				<div class="col-12 form-title">
					Create Administrator
				</div>
				<div class="col-3 navDiv2 clickable">StoreApp</div>
				

			</div>
			<br>

			<form action="" class="create_form" method="post" enctype="multipart/form-data">
				<input type="text" name="full_name" class="create-form-input" placeholder ="Enter Full Name">
				<input type="text" name="email" class="create-form-input" placeholder ="Enter Valid Email">
				<input type="text" name="username" class="create-form-input" placeholder ="Enter Username">
				<input type="text" name="mobile_number" class="create-form-input" placeholder ="Enter Mobile number">
				<select name="user_type" id="user_type" class="create-form-input">
					<option value="admin" style="background-color: blue;">Admin</option>
					<option value="user" style="background-color: orange;">User</option>
				</select>
				<br>
				<input type="password" name="password_1" placeholder="Enter password" class="create-form-input">
				<input type="password" name="password_2" placeholder="Confirm password" class="create-form-input">
				<input type="file" name="picture" accept="image/*" class="create-form-input">
				<button type="submit" name="create_user" class="btn btn-primary"><span>Create</span></button>
			</form>
	<div>
	</div>




	</body>
	</html>