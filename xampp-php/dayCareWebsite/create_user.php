<?php
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/cCss.css">

    <style type="text/css">
        body{
            background-color: rgba(0, 255, 0, 0.2);
        }
    </style>
</head>
	<body>

<header class="top" >
            <div class="header-area header-sticky fixed" style="height: 80px;">
                <div class="container" style="text-align: center; background-color: white; font-weight: bold;">
                    <div class="row">
                     <h1 style="font-size: 30pt;"> <a href="index.php"> <span style="color: darkviolet;">We</span><span style="color: gold;">ll</span><span style="color: deepskyblue;">be</span><span style="color: green;">ing</span> <span style="color: gold;">K</span><span style="color: red;">i</span><span style="color: deepskyblue;">d</span><span style="color: darkviolet;">s</span> <span style="color: red;">C</span><span style="color: deepskyblue;">a</span><span style="color: green;">r</span><span style="color: darkviolet;">e</span> </a>
                     </h1>
                 </div>
                 <div class="row">
                        <p><span style="color: red;">Love </span><span style="color: gold;">& </span><span style="color: darkviolet;"> Care</span> </p>  
                            
                </div>
                </div>
            </div>
        </header>
<br><br><br>
    <div id="wrapper">
        <div id="page" class="container">
                <h1 class="heading has-text-weight-bold is-size-4">Add New User </h1>


	<div class="row">

			</div>
			<br>

			<form action="" class="create_form" method="post" enctype="multipart/form-data">
                Full Name:
				<input type="text" name="full_name" class="input" placeholder ="Enter Full Name">
                Email:
				<input type="text" name="email" class="input" placeholder ="Enter Valid Email">
                Username:
				<input type="text" name="username" class="input" placeholder ="Enter Username">
                User Type:
				<input type="text" name="user_type" class="input" placeholder ="Enter User Type">
                Mobile Number
				<input type="text" name="mobile_number" class="input" placeholder ="Enter Mobile number">
				<br>
                Password:
				<input type="password" name="password_1" placeholder="Enter password" class="input">
                Confirm Password:
				<input type="password" name="password_2" placeholder="Confirm password" class="input">
                Picture:
				<input type="file" name="picture" accept="image/*" class="input">
				<button type="submit" name="create_user" class="btn btn-primary"><span>Create</span></button>
			</form>
	<div>
</div>
</div>
</div>
<br><br><br><br><br>
  
  <!-- Footer Start -->
<footer class="footer-area">
<div class="main-footer">
<div class="container">
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="single-widget pr-60">
            <div class="footer-logo pb-25">
                <a href="index.html"><img src="images/wbk-logo.png" alt="Wellbeing Logo"></a>
            </div>
            <p>I must explain to you how all this mistaken idea of denoung pleure and praising pain was born and give you a coete account of the system. </p>
            <div class="footer-social">
                <ul>
                    <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i class="zmdi zmdi-facebook"></i></a></li>
                    <li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a></li>
                    <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                    <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-widget">
            <h3>information</h3>
            <ul>
                <li><a href="#">addmission</a></li>
                <li><a href="#">Academic Calender</a></li>
                <li><a href="event.html">Event List</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="single-widget">
            <h3>useful links</h3>
            <ul>
                <li><a href="course.html">our courses</a></li>
                <li><a href="about.html">about us</a></li>
                <li><a href="teacher.html">teachers </a></li>
                <li><a href="event.html">our events</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="single-widget">
            <h3>get in touch</h3>
            <p>Manhyia - Opp. SDA Church, Manhyia SDA Close Street, Goaso</p>
            <p>+223  244  781  520 <br>+223  352  196  284 </p>
            <p>info@example.com</p>
        </div>
    </div>
</div>
</div>
</div>
<div class="footer-bottom text-center">
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <p>Copyright © <a href="#" target="_blank">Free themes Cloud</a> <?php echo date('Y'); ?>. All Right Reserved By Free themes Cloud.</p>
    </div>
</div>
</div>
</div>
</footer>  
</body>
</html>