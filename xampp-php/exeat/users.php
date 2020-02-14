<?php
include ("connection.php");
include("functions.php");
$user = $_SESSION['user'];
$username = $user['username'];
$user_query=mysqli_query($connection,"SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_assoc($user_query);
$search_result = mysqli_query($connection,"SELECT * FROM `users` ORDER BY full_name ASC");

if(isset($_POST['submit'])){
    $valueToSearch  = $_POST['valueToSearch'];
    $query          = "SELECT * FROM `users` WHERE CONCAT(`full_name`) LIKE '%".$valueToSearch."%' OR gender='$valueToSearch'";
    $search_result  = filterTable($query);
    
    
}else{
    $query          = "SELECT * FROM `users`";
    //$search_result  = filterTable($query);
  
}

function filterTable($query){
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "exeat_card";

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    $filter_result  = mysqli_query($connection, $query);
    return $filter_result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Exeat -Homepage</title>
   
    <!-- Fontfaces CSS-->
    <link href="static/css/font-face.css" rel="stylesheet" media="all">
    <link href="static/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="static/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="static/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="static/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="static/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="static/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="static/css/theme.css" rel="stylesheet" media="all">

    <style>

hr {
    height: 4px;
    margin-left: 15px;
}
.hr-primary {
    background-image: -webkit-linear-gradient(left, rgba(66,133,244,.8), rgba(66, 133, 244,.6), rgba(0,0,0,0)); 
}
.welcomeDiv {
    background-color: lightblue;
    float: left;
    margin-right: 10px;
    padding: 10px;
    border: 2px;
    box-shadow: 8px 8px 5px #888888;
    margin-top: -10px;
    border: 2px solid #009;
    outline-color: red;
    border-radius: 5px;
}
.rightDiv {
    background-color: transparent;
    /* border: 2px solid; */
    width: 95%;
    float: right;
    height: auto;
    padding: 20px;
    box-shadow: 8px 8px 5px #888888;
}
.td1{
    width: 5px;
}
        </style>
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="admin_panel.html">Home Page</a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" style="background-color: lightblue;">
            <div class="logo">
                <a  href="user_panel.php">
                    <img src="static/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php 
                        if ($user['user_type']=='admin') {
                            echo ' <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="students.php">
                                <i class="fas fa-users"></i>Students</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="users.php">
                                <i class="fas fa-users"></i>Users</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="user_panel.php#message">
                                <i class="fas fa-envelope"></i>Messages</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="user_panel.php#message">
                                <i class="fas fa-envelope"></i>Alerts</a>
                        </li>'
                        ;

                        }else{
                            echo '<li class="active has-sub rightDiv">
                            <a class="js-arrow" href="students.php">
                                <i class="zmdi zmdi-plus"></i>Issue Exeat</a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="#message">
                                <i class="fas fa-envelope"></i>Messages</a>
                        </li>
                        <hr/>';
                        }

                         ?>

                        
                    </ul>
                    
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
             <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="valueToSearch" placeholder="Search for Users"/>
                                <button class="au-btn--submit" type="submit" name="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <?php 
                            $query_msg = mysqli_query($connection,"SELECT * FROM messages");
                            $n=mysqli_num_rows($query_msg);
                            while ($message_item=mysqli_fetch_array($query_msg)) {
                                                    $author = $message_item['author'];
                                                    $query_author = mysqli_query($connection, "SELECT * FROM users WHERE username = '$author' ");
                                                    $author_details = mysqli_fetch_assoc($query_author);
                                echo '<span class="quantity">'.$n.'</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have '.$n.' news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="'.$author_details['picture'].'" alt='.$username.'>
                                                </div>
                                                <div class="content">
                                                    <h6>'.$author_details['full_name'].'</h6>
                                                    <p>'.$message_item['message'].'</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#message">View all messages</a>
                                            </div>
                                        </div>';
                                                }
                                                 ?>
                                        
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-check"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Emma has returned</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="fas fa-exclamation"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Emma must returned today</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Emma has overspent 2 days</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <?php echo "<img src=".$row['picture']." alt=".$row['username']." />"; ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php $row['username'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php echo "<img src=".$row['picture']." alt=".$row['username']." />"; ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $row['username']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $row['email']; ?></span>
                                                </div>
                                            </div>
                                    
                                            <div class="account-dropdown__footer">
                                                <a href="login.php?logout='1'">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Users</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                        <a href="create_user.php" style="color:white;"><i class="zmdi zmdi-plus">Add User</i></a></button>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-primary">
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                 <th>Full Name</th>
                                                <th>Username</th>
                                                <th>E mail</th>
                                                <th>Mobile Number</th>
                                                <th class="text-right">Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                                $count     = 1;
                                         while($row = mysqli_fetch_array($search_result)):?>
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <td><?php echo $row['full_name'];?></td>
                                                <td><?php echo $row['username'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['mobile_number'];?></td>
                                             <?php echo '
                                            <td><a href="edit_user.php?id='.$row['id'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="fas fa-edit" aria-hidden="true"></span></a>
                                                <a href="allusers_delete.php?id='.$row['id'].'" title="Delete Data" onclick="return confirm(\'You are sure to delete the data '.$row['full_name'].'?\')" class="btn btn-danger btn-sm"><span class="fas fa-trash" aria-hidden="true"></span></a>
                                            </td>
                                        </tr>
                                        ';?>
                                        
                                            <?php 
                                            $count++;
                                            endwhile;?>
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-primary">
                        <div class="row">
                            <!-- <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

    <!-- Jquery JS-->
    <script src="static/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="static/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="static/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="static/vendor/slick/slick.min.js">
    </script>
    <script src="static/vendor/wow/wow.min.js"></script>
    <script src="static/vendor/animsition/animsition.min.js"></script>
    <script src="static/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="static/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="static/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="static/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="static/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="static/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="static/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="static/js/main.js"></script>


