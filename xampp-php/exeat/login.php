<?php
include("functions.php");
if (isset($_SESSION['user'])) {
	header('location: user_panel.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet"href="style.css">

	<!-- jquery -->
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>

	<style>
		#loginpic{
			/*background-image:url(images/login_image/bg-title-01.jpg);*/
			background:transparent; 
		}
		body{
			background-image:url(images/login_image/bg-title-01.jpg);
			position: relative;
			top: 1em;
		}
		#logincontent{
			background-color:black;
			color:white;
			opacity:.5;
			border-radius:20px;
		}
		#logincontent:hover{
			background-color:black;
			color:white;
			opacity:.9;
			border-radius:20px;
		}
	</style>
</head>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5" id="loginpic">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" id="">
                        <div class="login-logo">

                        	<!-- Put institution logo here -->
                            <a href="">
                                <img src="" alt="">
                            </a>
                            <!-- end of institution logo -->
                        </div>
						<div>
						<center><span style="color: #00ffff; font-size: 30pt" id="showdrop">Show Login Form</span></center>
						</div>
                        <div class="login-form" id="dropdown">
                            <form method="post" action="login.php" id="logincontent">

								<?php echo display_error(); ?>

								<div class="input-group">
									<label>Username</label>
									<input type="text" name="username" >
								</div>
								<div class="input-group">
									<label>Password</label>
									<input type="password" name="password">
								</div>
								<div class="input-group">
									<button type="submit" class="btn" name="login_btn">Login</button>
								</div>
								<p>
									Not yet a member? <a href="#">Sign up</a>
								</p>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- end document-->

<script>
$('#dropdown').hide();
$('#showdrop').hover(function(){$(this).slideUp(500); $('#dropdown').show(500);});
</script>
</html>
