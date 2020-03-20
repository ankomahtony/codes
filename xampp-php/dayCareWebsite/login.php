<?php
include("functions.php");
if (isset($_SESSION['user'])) {
    header('index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 hidden-sm">
                            <div class="logo">
                                <a href="index.html"><img id="logo-img" src="images/wbk-logo.png" alt="Wellbieng logo" /></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="content-wrapper one">
                                <!-- Main Menu Start -->
                                <div class="main-menu one text-right">
                                    <nav>
                                        <ul>
                                            <li><a href="index.php" style="color: orange;">Home</a>
                                        </li>
                                        <li><a href="#aboutUs" style="color: green;">About Us</a></li>
                                        <li><a href="#services" style="color: red;">Services</a>
                                        <!-- <ul>
                                            <li><a href="course.html">Admissions</a></li>
                                            <li><a href="course-details.html">Academic Calender</a></li>
                                        </ul> -->
                                        </li>
                                        <li><a href="#event" style="color: brown;">Event</a>
                                        <!-- <ul>
                                            <li><a href="event.html">Event</a></li>
                                            <li><a href="event-details.html">Event details</a></li>
                                        </ul> -->
                                        </li>
                                        <li class="hidden-sm"><a href="#staff" style="color: blue;">Staff</a>
                                        <!-- <ul>
                                            <li><a href="teacher.html">Staff</a></li>
                                            <li><a href="teacher-details.html">Staff Details</a></li>
                                        </ul> -->
                                        </li>
                                        <li class="hidden-sm" ><a href="#Student" style="color: indigo;">Students</a>
                                            <!-- <ul>
                                                <li><a href="teacher.html">Student</a></li>
                                                <li><a href="teacher-details.html">Alumini</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li><a href="blog.html">blog</a>
                                        <ul>
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                        </li> -->
                                        <li><a href="#contactUs" style="color: orange;">Contact Us</a></li>
                                        <!-- <li><a href="#">Buy Now</a> -->
                                        </ul>
                                    </nav>
                                </div>
                                <div class="mobile-menu hidden-lg hidden-md one"></div>
                                 <!-- Main Menu End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<br><br><br><br><br><br><br><br><br>
    <div id="wrapper">
        <div id="page" class="container">
                <h1 class="heading has-text-weight-bold is-size-4"> User Login </h1>


	<div class="row">

			</div>
			<br>


			<form action="" method="post">
				<input type="text" name="username" class="input" placeholder ="Enter Username">
				<br>
				<input type="password" name="password" placeholder="Enter password" class="input">
				<br>
				<button type="submit" class="btn btn-primary" name="login_btn"><span>Login</span></button>
				<div>
					Consult the Administrator for Help! &#128522;
				</div>
			</form>
		</div>

<div>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br>
  
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