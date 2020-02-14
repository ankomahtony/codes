<?php
include("functions.php");
if (isset($_SESSION['user'])) {
    header('index.php');
}

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
	<body style="background-color: rgba(120,120,120,0.4);" >
	<div class="row">
		<div class="col-2 navDiv clickable" id="tab1" onclick="javascrpit:selectTab(1)">StoreApp</div>
		<div class="col-2 navDiv clickable" id="tab3" onclick="javascrpit:selectTab(3)">Login</div>
		<div class="col-2"></div>
		<div class="navDiv1">
			<button class='btn btn-primary navBtn' onclick="javascrpit:closing(1)">&#128694; Log Out</button>
			<button class='btn btn-danger navBtn ' onclick="javascrpit:closing(2)">&#10006; Exit</button>
		</div>
		
	</div>
	<hr class="hr-primary">
	
	<!-- SELECTING A COMPANY SECTION -->
	<div class="row">
		<div class="col-lg-6 bigDiv">
			<div class="row"> 
				<div class="col-12 form-title">
					User Login
				</div>

			</div>
			<br>

			<form action="" method="post">
				<input type="text" name="username" class="form-input" placeholder ="Enter Username">
				<br>
				<input type="password" name="password" placeholder="Enter password">
				<br>
				<button type="submit" class="btn btn-primary" name="login_btn"><span>Login</span></button>
				<div>
					Consult the Administrator for Help! &#128522;
				</div>
			</form>
		</div>
		<div class="col-lg-5 left-aside">
			<img src="images/cursor.png" class="left-aside-img">
		</div>
	</div>

	<form id="hidden-logout">
		<button id="close1" name="logout" type="submit">logout</button>
		<button id="close2" name="exit" type="submit">exit</button>
	</form>

	</body>
	<script type="text/javascrpit" src="js/bootstrap.min.js"></script>
	<script type="text/javascrip" src="js/bootstrap.js"></script>
	<script type="text/javascrip" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript">
		function selectTab(tabIndex) {
			document.getElementById('tab1Content').style.display = "none";
			document.getElementById('tab2Content').style.display = "none";
			document.getElementById('tab4Content').style.display = "none";

			document.getElementById('tab'+tabIndex+'Content').style.display="block";

		}
	</script>

</html>