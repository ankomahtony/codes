<?php
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'daycare');

// call the register() function if register_btn is clicked
if (isset($_POST['addClass'])) {
	addClass();
}

function addClass(){
    global $connection;
    $classID  = $_POST['classID'];
    $className = $_POST['className'];
    $noOfKids = $_POST['noOfKids'];
    $teacher1 = $_POST['teacher1'];
    $teacher2 = $_POST['teacher2'];
    $teacher3 = $_POST['teacher3'];
    $aboutClass = $_POST['aboutClass'];

    $query = mysqli_query($connection, "INSERT INTO classes (classID,className, noOfKids,teacher1,teacher2, teacher3,aboutClass) VALUES ('$classID','$className','$noOfKids','$teacher1','$teacher2','$teacher3','$aboutClass')");
    if ($query) {
        header('location: index.php');
    }else{
        echo "Something went wrong somewhere".$className." ".$noOfKids." ".$teacher1." ".$teacher2." ".$teacher3;

    }

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
                <h1 class="heading has-text-weight-bold is-size-4">Add New Class </h1>


    <div class="row">

            </div>
            <br>

    <form action="" method="post">
        Class ID: <input type="number" name="classID" class="input">
        Class Name: <input type="text" name="className" class="input">
        Number Of Kids: <input type="number" name="noOfKids" class="input">
        Teacher1 : <input type="text" name="teacher1" class="input">
        Teacher2 : <input type="text" name="teacher2" class="input">
        Teacher3 : <input type="text" name="teacher3" class="input">
        About this Class : <textarea name="aboutClass" class="input"></textarea> 
        <button type="submit" name="addClass" class="btn btn-primary">Add</button>

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