<?php 
session_start();
// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'daycare');


// call the postEvent() function if postPic is clicked
if (isset($_POST['postPic'])) {
    postPicture();
}

function postPicture(){
    global $connection;
    $picAbout = $_POST['picAbout'];
    $classPic = $_POST['classPic'];
    $datePosted = date('F d, Y');

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
    $allowed_pic_Ext = array('jpg','jpeg','png','mp4');

    if(in_array($picExt_low, $allowed_pic_Ext)){
        if($picError ===0){
            if ($picSize < 100000000) {
                $picNameNew = $picName.'.'.$actualPicExt;
                $picDestination = 'gallery/'.$picNameNew;
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

    $query = mysqli_query($connection, "INSERT INTO gallary (picture, about, classPic,datePosted) VALUES ('$picDestination','$picAbout','$classPic','$datePosted')");
    if ($query) {
        header('location: index.php');
    }else{
        echo "Something went wrong somewhere".$picDestination." ".$picAbout; 

    }

}

?>

<!doctype html>
<html class="no-js" lang="en">
     <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wellbeing Kids Care - Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line-icon.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/cCss.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
            hr{
                height: 5px;
                margin: 30px;
            }
            .hr-primary {
            background-image: -webkit-linear-gradient(left, rgba(66,133,244,.0), rgba(66, 133, 244,.9), rgba(66,133,244,0.0)); 
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Header Area Start -->
        <header class="top">
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
<!-- Header Area End -->
<!-- Background Area Start -->
<section id="slider-container" class="slider-area" style="background-color: deepskyblue;" >
<div class="slider-owl owl-theme owl-carousel" >
    <!-- Start Slingle Slide -->
    <div class="single-slide item" style="background-image: url(wbk-images/header1.png)">
    <!-- Start Slider Content -->
        <div class="slider-content-area item">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-left-5">
                        <div class="slide-content-wrapper">
                            <div class="slide-content" style="font-family: cursive;">
                                <h3 style=" font-family: fantasy;">Our Mission </h3>
                                <p style=" font-family: monospace;">To take care of your child so that you can have freedom to attend to your career/business </p>
                                <!-- <a class="default-btn" href="about.html">Learn more</a> -->
                                <img src="images/animate.gif" alt="this slowpoke moves"  style="width: 200px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Start Slider Content -->
    </div>
    <!-- End Slingle Slide -->
    <!-- Start Slingle Slide -->
    <div class="single-slide item" style="background-image: url(wbk-images/header2.png); " >
    <!-- Start Slider Content -->
        <div class="slider-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-left-5">
                        <div class="slide-content-wrapper text-left">
                            <div class="slide-content" style="font-family: cursive;">
                                <h3 style=" font-family: fantasy;">Our Vision </h3>
                                <p style=" font-family: monospace;">To build a solid foundation for pre-school education in the community. </p>
                                <img src="images/animate.gif" alt="this slowpoke moves"  style="width: 200px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Start Slider Content -->
    </div>
    <!-- End Slingle Slide -->
    <!-- Start Slingle Slide -->
    <div class="single-slide item " style="background-image: url(wbk-images/header4.png)">
    <!-- Start Slider Content -->
        <div class="slider-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-left-5">
                        <div class="slide-content-wrapper">
                           <div class="slide-content" style="font-family: cursive;">
                                <h3 style=" font-family: fantasy;">Our Business </h3>
                                <p style=" font-family: monospace;"> Your child's well-being, our interest, our business.</p>
                                 <img src="images/animate.gif" alt="this slowpoke moves"  style="width: 200px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Start Slingle Slide -->
    </div>
    <div class="single-slide item " style="background-image: url(images/daycare3.JPG)">
    <!-- Start Slider Content -->
        <div class="slider-content-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-left-5">
                        <div class="slide-content-wrapper">
                           <div class="slide-content" style="font-family: cursive;">
                            <?php 
                                $today = date('Y-m-d');
                                $query_last_event = mysqli_query($connection, "SELECT * FROM `events` WHERE eventDate > $today ORDER by eventDate ASC LIMIT 1" );
                                $last_event = mysqli_fetch_assoc($query_last_event);
                            ?>
                                <h3 style=" font-family: fantasy;">Pressing Event </h3>
                                <p style=" font-family: monospace;"><?php echo $last_event['event']; ?></p>
                                <p style=" font-family: monospace;"><?php echo $last_event['eventDate'] . $today; ?></p>
                                <a class="default-btn" href="#event">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Start Slider Content -->
    </div>
    <!-- End Slingle Slide -->
</div>
</section>
<!-- Background Area End -->
<!-- Notice Start -->

   
<div class="caption" style="background-color:rgba(0, 195, 255, 1); height: 100%;">
        <div class="row" style="height: 100%;">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div style="height: 100%; margin-top: 10%; ">
                 <img src="wbk-images/new-logo1.png"> 
                 <br>
                 <br>
             </div>
          
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top:50px; font-family: Georgia; margin-bottom: 10px;">
                <h1 style="font-size: 18pt;"><div>Welcome to our world of Beautiful Beginning</div></h1>
                <hr class="hr-primary">
                <div>
                    <h3 style="color: /*rgba(255, 192, 10, 1)*/ purple; padding: 5%; font-size: 19px; line-height: 2;"> We are committed to making sure your ward can see the picture of his or her future from the beginning. Thus by making sure we provide the right foundation for his or her academic, social, moral and spiriual life. </h3>
                </div>
                
            </div>
            
        </div>
        
</div>

<section class="notice-area pt-150 pb-150" id="aboutUs">
    <div class="notice-area-cover">
      <div class="container">
    <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div  id="aboutUs">
            <br>

            <h3 class="about-shadow">About Our School</h3>
            <hr class="hr-primary">
                <p style="color: white;line-height: 2;">The School provides with its clients, quality of service which will propel the clients to enviable
                    heights in this competitive century of the history of mankind. The school has dedicated and committed team of young staff with a common vision towards its goals.  The ultimate vision of the school is to establish good business relationship with
                    clients giving them value for their engagement with the school. The school has instituted systems that ensure that it is always on top of the game when it comes to impacting knowledge on younger ones. The school provide quality and practical training at all times to students.giving them value for their engagement with the center.
                        The center will institute systems that will ensure that it is always on top of the game when it comes to
                        impacting knowledge on IT training services.
                    <span id="dots">...</span>
                    <span id="more">  The center will always provide quality and practical computer
                        training at all times.
                    The center will institute systems that will ensure that it is always on top of the game when it comes to
                        impacting knowledge on IT training services. The center will always provide quality and practical computer
                        training at all times.</span>
                    </p>
                    <button onclick="myFunction()" id="myBtn"
                    class="btn btn-primary btn-lg prog-btn">Read more</button>
    </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12" style="background-color: rgba(0, 200, 200, 0.5);">
        <div class="notice-right" id="contactUs">
            <h3 class="about-shadow" style="color: indigo;">Get In Touch With Us</h3>
            <hr class="hr-primary">
        <form action="" >
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="" id="message" cols="30" rows="5" class="form-control"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-md" value="Send Message">
                            </div>
                        </div>
        
                    </div>
                </div>
        
            </div>
        </form>

        </div>
    </div>
    </div>
    <br>
            <section class="page__contact bg--white section-padding--lg">
            <div class="container-contact">
                <div class="row-contact">
                    <!-- Start Single Address -->
                    <div class="col-sm-6 xs-mt-60">
                        <div class="address location">
                            <div class="ct__icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="address__inner" style="color: rgba(0, 0, 200, 1); background-color: rgba(240, 255, 255, .7);box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.6); height: 90%;">
                                <h3>Our Location</h3>
                                <p style="font-size: 18pt;">Manhyia</p>
                                <ul>
                                    <p style="font-size: 16pt;">Opp. Central S.D.A Church</p> 
                                    <p style="font-size: 16pt;">Digital Address: BU-0001-6162</p> 
                                    <p style="font-size: 16pt;">Manhyia S.D.A. Street</p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Address -->
                    <!-- Start Single Address -->
                    <div class=" col-sm-6 xs-mt-60">
                        <div class="address phone">
                            <div class="ct__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="address__inner" style="color: rgba(0, 0, 200, 1);  background-color: rgba(240, 255, 255, .7); box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.6); height: 90%;">
                                <h3>Phone Number</h3>
                                <ul
                                >
                                    <li><a href="tell:+233-243724186">+233-243724186</a></li>
                                    <li><a href="tell:+233-352196284">+233-352196284</a></li>
                            </ul>
                                <h3>Email</h3>
                                <ul>
                                <li><a href="tell:+08097-654321">example@gmail.com</a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>  
    </div>

</section>
<!-- Notice End -->
<!-- Choose Start -->
<section class="choose-area pb-85 pt-77" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-left-4 col-sm-8 col-md-offset-left-4">
                <div class="choose-content text-left">
                    <h2>WHY YOU SHOULD CHOOSE WELLBEING KIDS ?</h2>
                    <div class="row">
                        <!-- <div class="col-md-8 col-md-offset-left-4 col-sm-8 col-md-offset-left-4" style="text-align: center; margin-top: 10px;"> -->
                            <div class="col-md-4 col-lg-3 service-provided"><a href="classes/class.php" style="color: rgba(127, 255, 0, 1);"> Baby Care</a></div>
                            <div class="col-md-4 col-lg-3 service-provided">Creche</div>
                            <div class="col-md-4 col-lg-3 service-provided">Nursery</div>
                            <div class="col-md-4 col-lg-3 service-provided">Kindergarten</div>
                            <div class="col-md-4 col-lg-4 service-provided">After School Care</div>
                            <div class="col-md-4 col-lg-4 service-provided">Weekend Care</div>
                            <div class="col-md-6 col-lg-4 service-provided">Day Drop Off</div>
                            <div class="col-md-6 col-lg-3 service-provided" style="font-size: 12pt;">Weekend Drop Off</div>
                            <div class="col-md-6 col-lg-4 service-provided" style="font-size: 12pt;">Holiday/Vacation Care</div>
                            <div class="col-md-6 col-lg-5 service-provided" style="font-size: 12pt;">Holiday/Vacation Drop-Off</div>

                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose Area End -->
<!-- Courses Area Start -->
<div class="courses-area pt-150 text-center" id="students">
<div class="container">
<div class="row">
<div class="col-xs-12">
    <div class="section-title">
        <img src="img/icon/section.png" alt="section-title">
        <h2>Classes Available</h2>
    </div>
</div>
</div>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=1"><img src="wbk-images/header2.png" alt="course">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=1">Marigold</a></h3>
                        <p>Baby of Age 6 Months to 1 Year</p>
                        <a class="default-btn" href="classes/class.php?id=1">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=2"><img src="wbk-images/morning-glory.JPG" alt="course">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=2">Morning Glory</a></h3>
                        <p>Baby of Ages 1 to 2 Years </p>
                        <a class="default-btn" href="classes/class.php?id=2">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=3"><img src="wbk-images/love.JPG" alt="course" class="course-img-tag">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=3">Love </a></h3>
                        <p>Kids of Ages 2 to 3 Years </p>
                        <a class="default-btn" href="classes/class.php?id=3">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=4"><img src="wbk-images/pace-makers.JPG" alt="course">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=4">Peace Markers</a></h3>
                        <p>Children of Ages 3 to 4 Years </p>
                        <a class="default-btn" href="classes/class.php?id=4">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=5"><img src="wbk-images/motivators.JPG" alt="course">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=5">Motivators</a></h3>
                        <p>Kids of Ages 4 to 5 Years </p>
                        <a class="default-btn" href="classes/class.php?id=5">read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single-course">
                    <div class="course-img">
                        <a href="classes/class.php?id=6"><img src="wbk-images/abundant-life.JPG" alt="course">
                            <div class="course-hover">
                                <i class="fa fa-link"></i>
                            </div>
                        </a>
                    </div>
                    <div class="course-content">
                        <h3><a href="classes/class.php?id=6">Abundant Life </a></h3>
                        <p>Kids of Ages 5 to 6 Years </p>
                        <a class="default-btn" href="classes/class.php?id=6">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<hr >

<div id="important_info" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#important_info" data-slide-to="0" class="active"></li>
    <li data-target="#important_info" data-slide-to="1"></li>
    <li data-target="#important_info" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row" style="height: 100%;">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div style="height: 100%; margin-top: 10%; ">
                 <img src="staffs/staff2.JPG"> 
                 <br>
                 <br>
             </div>
          
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top:50px; font-family: Georgia; margin-bottom: 10px;">
                <h1 style="font-size: 18pt;"> DEDICATED SERVICE FRONT</h1>
                <hr class="hr-primary">
                <div>
                    <h3 style="color: rgba(255, 192, 10, 1); padding: 5%; font-size: 22px;">As the most trusted pre-school/child care service provider in the community, we place a very high premium on the psychology and importance of customer service.<br> Our office is opened at all times for your enquires. </h3>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="carousel-item">
      <div class="row" style="height: 100%;">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div style="height: 100%; margin-top: 10%; ">
                 <img src="staffs/staff1.JPG"> 
                 <br>
                 <br>
             </div>
          
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top:50px; font-family: Georgia; margin-bottom: 10px;">
                <h1 style="font-size: 18pt;"> DEDICATED STAFF</h1>
                <hr class="hr-primary">
                <div>
                    <h3 style="color: rgba(255, 192, 10, 1); padding: 5%; font-size: 22px;"> We love and we care. <br>Love and care is our nature, culture, and philosophy, we live it. <br>We show love and give care naturally - just the way you would do to your child.  </h3>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="carousel-item">
      <div class="row" style="height: 100%;">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div style="height: 100%; margin-top: 10%; ">
                 <img src="staffs/staff3.JPG"> 
                 <br>
                 <br>
             </div>
          
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12" style="margin-top:50px; font-family: Georgia; margin-bottom: 10px;">
                <h1 style="font-size: 18pt;">SERENE ENVIRONMENT</h1>
                <hr class="hr-primary">
                <div>
                    <h3 style="color: rgba(255, 192, 10, 1); padding: 5%; font-size: 22px;"> Our environment is child friendly &#128109;.<br> Entering into Wellbeing Kids Care reveals you are in the right place for your child's school foundation. </h3>
                </div>
                
            </div>
            
        </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#important_info" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#important_info" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>
</div>
<!-- Courses Area End -->
<!-- Event Area Start -->
<div class="event-area one text-center pt-140 pb-150" id="event">
<div class="container">
<div class="row">
<div class="col-xs-12">
    <div class="section-title">
        <img src="img/icon/section.png" alt="section-title">
        <h2>UPCOMING EVENTS</h2>
    </div>
</div>
</div>
<div class="row">
    <?php 
        $query_events = mysqli_query($connection, "SELECT * FROM events");
        while ($event=mysqli_fetch_array($query_events)) {
            switch (substr($event['eventDate'], 5,2)) {
                case "01":
                    $eventDate = 'Jan';
                    break;
                case "02":
                    $eventDate = 'Feb';
                    break;
                case "03":
                    $eventDate = 'Mar';
                    break;
                case "04":
                    $eventDate = 'April';
                    break;
                case "05":
                    $eventDate = 'May';
                    break;
                case "06":
                    $eventDate = 'June';
                    break;
                case "07":
                    $eventDate = 'July';
                    break;
                case "08":
                    $eventDate = 'Aug';
                    break;
                case "09":
                    $eventDate = 'Sept';
                    break;
                case "10":
                    $eventDate = 'October';
                    break;
                case "11":
                    $eventDate = 'Nov';
                    break;
                default:
                    $eventDate = 'Dec';
            }
            if ($event['eventDate']>=date('Y-m-d')) {
               echo '<div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-event mb-35">
                    <div class="event-date">
                        <h3>'.substr($event['eventDate'], 8).' <span>'.$eventDate.'</span></h3>
                    </div>
                    <div class="event-content text-left">
                        <div class="event-content-left">
                            <h4>'.$event['event'].'</h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>'.$event['startTime'].' - '.$event['endTime'].'</li>
                                <li><i class="fa fa-map-marker"></i>'.$event['location'].'</li>
                            </ul>
                        </div> </div>
                </div></div>';
            }
            
        }
      ?>
    
 
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <a class="default-btn" href="add_event.php">Add New Event</a>
    </div>
</div>
</div>
</div>
<!-- Event Area End -->
<!-- Testimonial Area Start -->
<div class="testimonial-area pt-110 pb-105 text-center">
<div class="container">
<div class="row">
<div class="testimonial-owl owl-theme owl-carousel">
        <div class="single-testimonial">
            <h1 style="color: white; padding-bottom: 50px;">Gallery</h1>
                <div class="row">
        <?php 
            $query_gallery = mysqli_query($connection, "SELECT * FROM gallary");
            while ($gallery=mysqli_fetch_array($query_gallery)) {
                echo '<div class="col-md-4 col-sm-6 col-xs-3">
                             <img src="'.$gallery['picture'].'" class="img-responsive img-rounded" alt="Cinque Terre" style="height: 200px; margin-top:10px;">
                         </div>';
            }
        ?>
                   
              <button class="btn btn-primary col-md-3 col-sm-10 col-xs-10" onclick="openForm()" style="margin-top: 5%; margin-left: 20%;"> <i class="zmdi zmdi-plus"></i>
                </button>
         </div>
                    

    </div>
       
        
    </div>
    
</div>
</div>
</div>
<br>

            <!-- message form -->
        <div class="form-popup" id="myForm">
            <form action="" class="form-container" method="POST" enctype="multipart/form-data">
            <h1>Insert Galary</h1>
            <hr>
            <label for="picture" class="label-input100">Picture</label>
            
            <input type="file" name="picture" class="input100">
            <label for="picAbout" class="label-input100">About the Picture</label>
            <input type="text" name="picAbout">
            <label for="picAbout" class="label-input100">Class ID</label>
            <input type="text" name="classPic">
            <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit" name="postPic">
                            Post
                        </button>
                        <button type="button" class="contact100-form-btn cancel" onclick="closeForm()">Close</button>
                    </div>
            </div>
            <div>
            </div>
            <!-- To do list form -->
          </form>
          
        </div>

<!-- Subscribe Start -->
<div class="subscribe-area pt-60 pb-70">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="subscribe-content section-title text-center">
        <h2>subscribe our newsletter</h2>
        <p>I must explain to you how all this mistaken idea </p>
    </div>
    <div class="newsletter-form mc_embed_signup">
        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll" class="mc-form">
                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your e-mail address" required>
                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                <button id="mc-embedded-subscribe" class="default-btn" type="submit" name="subscribe"><span>subscribe</span></button>
            </div>
        </form>
        <!-- mailchimp-alerts Start -->
        <div class="mailchimp-alerts">
            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
        </div>
        <!-- mailchimp-alerts end -->
    </div>
</div>
</div>
</div>
</div>
<!-- Subscribe End -->
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
<!-- Footer End -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/ajax-mail.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.mb.YTPlayer.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script>
    // read more script
    document.getElementById("more").style.display = "none";
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");
        
        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }</script>
    <script type="text/javascript">
        function openForm() {
                document.getElementById("myForm").style.display = "block";
                document.getElementById("myTodo").style.display = "none";
        }

        function closeForm() {
              document.getElementById("myForm").style.display = "none";
        }
</script>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>