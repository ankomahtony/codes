<?php 
    session_start();
 // connect to database
 $connection = mysqli_connect('localhost', 'root', '', 'daycare');

 $classID = $_GET['id'];
 $query = mysqli_query($connection,"SELECT * FROM gallary WHERE classPic = $classID");

 $query_class = mysqli_query($connection,"SELECT * FROM classes WHERE classID = $classID");

 $class = mysqli_fetch_assoc($query_class);
// switch ($classID) {
//                 case "1":
//                     $className = 'MariGold';
//                     break;
//                 case "2":
//                     $className = 'Morning Glory';
//                     break;
//                 case "3":
//                     $className = 'Love';
//                     break;
//                 case "4":
//                     $className = 'Peace Maker';
//                     break;
//                 case "5":
//                     $className = 'Motivators';
//                     break;
//                 default:
//                     $className = 'Abundant Life';
//                     break;
//             }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $class['className']; ?> - Gallery</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<header class="top">
            <div class="header-area header-sticky " style="height: 100%; margin-left: 5%;">
                <div class="container">
                    <div class="row">
                     <h1> <a href="../index.php"> <span style="color: darkviolet;">We</span><span style="color: gold;">ll</span><span style="color: deepskyblue;">be</span><span style="color: green;">ing</span> <span style="color: gold;">K</span><span style="color: red;">i</span><span style="color: deepskyblue;">d</span><span style="color: darkviolet;">s</span> <span style="color: red;">C</span><span style="color: deepskyblue;">a</span><span style="color: green;">r</span><span style="color: darkviolet;">e</span> </a>
                     - <span style="color: gold;"><?php echo $class['className'];?></span></h1>
                 </div>
                 <div class="row">
                    <center>
                        <p><span style="color: red;">Love </span><span style="color: gold;">& </span><span style="color: darkviolet;"> Care</span> </p> 
                    </center>
                            
                </div>
            </div>
            </div>
 </header>
    <header class="site-header">
    
    <div class="hamburger-menu">
        <div class="menu-icon">
            <img src="images/menu-icon.png" alt="menu icon">
        </div><!-- .menu-icon -->

        <div class="menu-close-icon">
            <img src="images/x.png" alt="menu close icon">
        </div><!-- .menu-close-icon -->
    </div><!-- .hamburger-menu -->
</header><!-- .site-header -->

<nav class="site-navigation flex flex-column justify-content-between">
    <div class="site-branding d-none d-lg-block ">
        <h1 class="site-title"><a href="../index.php" rel="home"><img src="../wbk-images/new-logo1.png" style="width: 100%;"></a></h1>
    </div><!-- .site-branding -->

    <ul class="main-menu flex flex-column justify-content-center" style="margin-top: -20px;">
        <li class="current-menu-item"><a href="../index.php"><span style="color: darkviolet;">We</span><span style="color: gold;">ll</span><span style="color: deepskyblue;">be</span><span style="color: green;">ing</span> <span style="color: gold;">K</span><span style="color: red;">i</span><span style="color: deepskyblue;">d</span><span style="color: darkviolet;">s</span> <span style="color: red;">C</span><span style="color: deepskyblue;">a</span><span style="color: green;">r</span><span style="color: darkviolet;">e</span> </a></li>
        <li class="current-menu-item"><a href="../index.php"><span style="color: red;">Love </span><span style="color: gold;">& </span><span style="color: darkviolet;"> Care</span> </a></li>
    </ul>

    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>


    <!-- <div class="social-profiles">
        <ul class="flex justify-content-start justify-content-lg-center align-items-center">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        </ul>
    </div>-->
</nav>

<div class="nav-bar-sep d-lg-none"></div>

<div class="outer-container blog-page">
    <div class="container-fluid">
        <div class="row">
            <?php 
                while ($classID = mysqli_fetch_array($query) ){
                    echo '<div class="col-12 col-xl-6 no-padding">
                <div class="blog-content flex">
                    <figure>
                        <a href="#"><img src="../'.$classID['picture'].'" alt=""></a>
                    </figure>

                    <div class="entry-content flex flex-column justify-content-between align-items-start">
                        <header>
                            <br>
                            <h3><a href="#">'.$classID['about'].'</a></h3>
                        </header>

                        <footer class="flex flex-wrap align-items-center">
                            <div class="posted-on"><span style="color:red;"> Posted on </span>'.$classID['datePosted'].'</div>
                        </footer>
                    </div><!-- .entry-content -->
                </div><!-- .blog-content -->
            </div>';
                }
            ?>

        </div><!-- .row -->
    </div><!-- .container-fluid -->

    <div style="color: indigo; padding-left: 20%; font-size: 20pt; background-color: yellow;">Teachers : <?php echo ' &#128073; '.$class['teacher1'].' - '.$class['teacher2'].' - '.$class['teacher3'];?></div>
    <br>
    <div>
        <p style=" font-size: 18pt;line-height: 2; color: black;"><?php echo $class['aboutClass']; ?></p>
    </div>
</div><!-- .outer-container -->

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>