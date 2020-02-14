<?php 
include("functions.php");
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
include("exeat_count.php");
$user = $_SESSION['user'];
$username = $user['username'];
$user_query=mysqli_query($connection,"SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_assoc($user_query);

$today = date('Y-m-d');
$query_alert = mysqli_query($connection, "SELECT * FROM exeat WHERE (remark='No') OR (remark='Yes' AND date_returned = '$today') ORDER by time_returned DESC");
$alert_count_1 = mysqli_num_rows($query_alert);


$return_alerts = mysqli_query($connection, "SELECT * FROM exeat WHERE remark='Yes' and date_returned = '$today' ORDER by date_returned DESC");
$alert_count_2 = mysqli_num_rows($return_alerts);
$alert_count = $alert_count_1 + $alert_count_2;
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
   
    <link href="static/css/addMsg.css" rel="stylesheet" media="all">
     <!--   ==============-->
    <link rel="stylesheet" type="text/css" href="exeat_form/css/util.css">
    <link rel="stylesheet" type="text/css" href="exeat_form/css/main.css">
    <!--=======================================-->
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

hr{
    height: 10px;
    margin: 30px;
}
.hr-primary {
    background-image: -webkit-linear-gradient(left, rgba(66,133,244,.0), rgba(66, 133, 244,.9), rgba(66,133,244,0.0)); 
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

.box_item{
    color: #004c70;
    font-family: sans-serif;
}
* {
  font-family: sans-serif; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
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
                        <a class="logo" href="user_panel.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
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
                            <a class="js-arrow" href="students.php">
                                <i class="fas fa-plus"></i>Issue Exeat</a>
                        </li>
                        <li>
                            <a href="#message">
                                <i class="fas fa-envelope"></i>Messages
                            </a>
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
                    <img src="static/images/icon/sbis_n.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php 
                        if ($user['user_type']=='admin') {
                            echo ' <li class="active has-sub rightDiv" id="tab2">
                            <a class="js-arrow" href="students.php">
                                <i class="fas fa-users"></i>Students</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="users.php">
                                <i class="fas fa-users"></i>Users</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="#message">
                                <i class="fas fa-envelope"></i>Messages</a>
                        </li>
                        <li class="active has-sub rightDiv">
                            <a class="js-arrow" href="#message">
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
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
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
                                        <?php echo '<span class="quantity">'.$alert_count.'</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">';?>
                                                <?php echo '<p>You have '.$alert_count.'Notifications</p>';?> 
                                                
                                            </div>
                                            <?php 
                                    while ($alert_not=mysqli_fetch_array($query_alert)) {
                                    if ($alert_not['remark']=='Yes') {
                                        echo '<div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-check"></i>
                                                </div>
                                                <div class="content">
                                                    <p>'.$alert_not['name_of_student'].' has returned Today</p>
                                                    <span class="date"> AT'.$alert_not['date_returned'].''.$alert_not['time_returned'].'</span>
                                                </div>
                                            </div>';
                                    }else{
                                        $your_date = strtotime($alert_not['date_of_returning']);
                                                $now = time();
                                                $date_diff = $your_date -$now;
                                                $date_diff_round= ceil($date_diff/(60*60*24));
                                                if ($date_diff_round==0) {
                                                    echo '<div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="fas fa-exclamation"></i>
                                                </div>
                                                <div class="content">
                                                    <p>'.$alert_not['name_of_student'].' must return <b>Today</b></p>
                                                    <span class="date">BY 5:00 PM</span>
                                                </div>
                                            </div>';
                                                }elseif($date_diff_round<0){
                                                    echo '<div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </div>
                                                <div class="content">
                                                    <p>'.$alert_not['name_of_student'].'</p>
                                                    <span class="date"> have overstayed '.abs($date_diff_round).' day(s)</span>
                                                </div>
                                            </div>';
                                                }
                                        }
                                        }
                                        ?>
                                            <div class="notifi__footer">
                                                <a href="#task">All notifications</a>
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
                        <div id="demo"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Exeat</h2>
                                    <span id="js" style="font-family:auto;color:black;font-size:20pt" class="welcomeDiv"></span>
                                    <a href="students.php">
                                    <button class="au-btn au-btn-icon au-btn--blue welcomeDiv" style="color:red;">
                                        <i class="zmdi zmdi-plus" style="color:orange;"></i>Issue Exeat
                                        </button>
                                    </a>
                                    <?php 
                                    $month = Date('m');
                                    $year = Date('Y');
                                    if ($month<9) {
                                        $other_year = $year - 1;
                                        $acad_year = $other_year."|".$year;
                                    }else{
                                        $other_year = $year + 1;
                                        $acad_year = $year.'|'.$other_year;
                                    }
                                        if ($user['user_type']=='admin') {
                                            echo '<button class="welcomeDiv au-btn au-btn-icon au-btn--blue" >
                                        <a href="#" style="color:orange;"><i class="zmdi zmdi-calendar" style="color:red;"></i> '.$acad_year.'</a></button>';
                                        }

                                    if ($month>9) {
                                        $current_term = 'First Term';
                                    }elseif($month<5){
                                        $current_term = 'Second Term';
                                    }else{
                                        $current_term = 'Third Term';
                                    }

                                     ?>
                                     <!-- <form>
                                        <div class="welcomeDiv au-btn au-btn-icon au-btn--blue">
                                           <select style="background-color:transparent; border-style: none; color: black;">
                                             <option>First term</option>
                                             <option>Second term</option>
                                             <option>Third term</option>
                                         </select> 
                                        </div>
                                         
                                     </form> -->
                                     <button class="welcomeDiv au-btn au-btn-icon au-btn--blue">
                                        <a href="#" style="color:black;"><i class="zmdi zmdi-chart"> </i><?php echo $current_term ?></a></button>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4 col-md-4 rightDiv">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-home" style="font-size: 50px;"></i>
                                            </div>
                                            <div class="text">
                                                <h4 class="box_item">Town Exeat </h4>
                                                <hr>
                                                <p><span>Student Left: <?php echo $town_exeat;?></span></p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-md-4 rightDiv">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-road" style="font-size: 40px;"></i>
                                        </div>
                                                <div class="text">
                                                   <h4 class="box_item">Dist. Exeat </h4> <hr>
                                                   <p><span>Student Left: <?php echo $distance_exeat;?></span></p>
                                                    <br>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-lg-4 col-md-4 rightDiv">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note" style="font-size: 50px;"></i>
                                            </div>
                                            <div class="text">
                                                <h4 class="box_item"> Suspended </h4>
                                                <hr>
                                                <p><span>Student Left: <?php echo $suspended;?></span></p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-primary">
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <h4 style="color: #0000cd; cursor: pointer;"><a href="allexeatstudents.php">See All</a></h4>
                                    <table class="table table-bordered table-hover table-sm table-striped content-table">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th class="td1">SN</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                                <th class="text-left">Destination</th>
                                                <th class="text-left">Date Issued</th>
                                                <th class="text-left">Date to Return</th>
                                                <th class="text-left">Issuer</th>
                                                <th class="text-left"> Days Left</th>
                                                <th class="text-left">confirm student returns</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                $query_exeat = mysqli_query($connection, "SELECT * FROM exeat WHERE remark = 'No' limit 10");
                                                $count = 1;
                                    while ($row = mysqli_fetch_array($query_exeat)) {
                                                 $your_date = strtotime($row['date_of_returning']);
                                                $now = time();
                                                $date_diff = $your_date -$now;
                                                $date_diff_round= ceil($date_diff/(60*60*24));
                                                if ($date_diff_round==-0) {
                                                    $days_left = "Today";
                                                }elseif($date_diff_round==1){
                                                    $days_left = 'a Day';
                                                }else{
                                                    $days_left = $date_diff_round." days"; 
                                                }
                                               
                                            echo  '<tr>
                                                <td class="td1">'.$count.'</td>
                                                <td>'.$row['name_of_student'].'</td>
                                                <td>'.$row['current_class'].'</td>
                                                <td>'.$row['destination'].'</td>
                                                <td>'.$row['date_of_issue'].'</td>
                                                <td>'.$row['date_of_returning'].'</td>
                                                <td>'.$row['issuer'].'</td>
                                                <td>'.$days_left.'</td>
                                                <td><a href="return_exeat.php?id='.$row['id'].'" title="Return Exeat" onclick="openReturn()" class="btn btn-success btn-sm"><span class="zmdi zmdi-plus" aria-hidden="true"></span></a>
                                                  </td>
                                            </tr> ';
                                                $count++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="hr-primary">
                        <div class="row">
                            <div class="col-lg-6" id="task">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-c2"></div>
                                        <h3>
                                <i class="zmdi zmdi-account-calendar"></i><?php echo date('d M,Y; H:i A'); ?></h3>
                                <!-- <button class="au-btn-plus" onclick="openToDoForm()">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button> -->
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task__title">
                                            <p><?php echo $username; ?> Stickers</p>
                                        </div>
                                        <div class="au-task-list js-scrollbar3">
                                            <?php
                                 $query_alert = mysqli_query($connection, "SELECT * FROM exeat WHERE (remark='No') OR (remark='Yes' AND date_returned = '$today') ORDER by date_returned,date_of_returning desc, time_returned desc");          
                                while ($alert_exeat = mysqli_fetch_array($query_alert)) {
                                    if ($alert_exeat['remark']=='Yes') {
                                        $time_returned = $alert_exeat['time_returned'];
                                                   echo '<div class="au-task__item au-task__item--success">
                                                        <div class="au-task__item-inner">
                                                            <h5 class="task">
                                                                <a href="#">'.$alert_exeat['name_of_student'].' has returned</a>
                                                            </h5>
                                                            <span class="time"> AT '.$time_returned.' <Today </span>
                                                        </div>
                                                    </div>';
                                    }else{
                                        $your_date = strtotime($alert_exeat['date_of_returning']);
                                                $now = time();
                                                $date_diff = $your_date -$now;
                                                $date_diff_round= ceil($date_diff/(60*60*24));
                                                if ($date_diff_round==0) {
                                                   echo '<div class="au-task__item au-task__item--warning">
                                                        <div class="au-task__item-inner">
                                                            <h5 class="task">
                                                                <a href="#">'.$alert_exeat['name_of_student'].' must return today</a>
                                                            </h5>
                                                            <span class="time"> by 5:00 PM</span>
                                                        </div>
                                                    </div>';
                                                }elseif($date_diff_round<0){
                                                    if ($date_diff_round<-2) {
                                                    echo '<div class="au-task__item au-task__item--danger js-load-item">
                                                        <div class="au-task__item-inner">
                                                            <h5 class="task">
                                                                <a href="#">'.$alert_exeat['name_of_student'].' has overspent'.$date_diff_round.'day(s) </a>
                                                            </h5>
                                                            <span class="time"> by 5:00 PM</span>
                                                        </div>
                                                    </div>';
                                                }else{
                                                    echo '<div class="au-task__item au-task__item--danger">
                                                        <div class="au-task__item-inner">
                                                            <h5 class="task">
                                                                <a href="#">'.$alert_exeat['name_of_student'].' has overspent '.$date_diff_round.' '. ' day(s) </a>
                                                            </h5>
                                                            <span class="time"> by 5:00 PM</span>
                                                        </div>
                                                    </div>';
                                                }
                                                    
                                                }

                                    }
                                                
                                                
                                            }
                                                
    

                                            ?>
                                            
                                            
                                        </div>
                                        <div class="au-task__footer">
                                            <button class="au-btn au-btn-load js-load-btn overview-item--c2" style="height: 50px;">load more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- messages -->
                            <div class="col-lg-6" id="message">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                                        <button class="au-btn-plus" onclick="openForm()">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <p>You Have
                                                    <span><?php echo $n;?></span>

                                                    new messages
                                                </p>
                                            </div>
                                            <div class="au-message-list">
                            <?php 
                            $query_msg = mysqli_query($connection,"SELECT * FROM messages ORDER BY id DESC");
                            while ($message_item=mysqli_fetch_array($query_msg)) {
                                                    $author = $message_item['author'];
                                                    $query_author = mysqli_query($connection, "SELECT * FROM users WHERE username = '$author' ");
                                                    $author_details = mysqli_fetch_assoc($query_author);

                                                    echo '<div class="au-message__item unread">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="'.$author_details['picture'].'" alt="John Smith">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">'.$author_details['full_name'].'</h5>
                                                                <p>'.$message_item['message'].'</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>'.$message_item['msg_time'].'</span>
                                                        </div>
                                                    </div>
                                                </div>';
                                                }
                                                 ?>
                                                <!-- <div class="au-message__item js-load-item">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="images/icon/avatar-05.jpg" alt="Michelle Sims">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">Michelle Sims</h5>
                                                                <p>Purus feugiat finibus</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>Sunday</span>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="au-message__footer" >
                                                <button class="au-btn au-btn-load js-load-btn overview-item--c1" style="height: 50px;"><span >load more</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            <!-- message form -->
        <div class="form-popup" id="myForm">
            <?php
            echo '<form action="message.php?username='.$username.'" class="form-container" method="POST">';
          ?>
            <h1>Message Box</h1>
            <hr>
            <label for="message" class="label-input100"><b>Message</b></label>
            <textarea class="input100" placeholder="Your Message" name="message" required></textarea>
            <!-- <div class="form-group">
                <label>Recepient</label>
                <input class="au-input au-input--full" type="text" name="receiver" placeholder="Enter Recepient" required>
            </div> -->
            <div class="form-group">
                <label>Recepient</label>
                <select style="height: 60px;" name="receiver" class="au-input au-input--full">
                    <option value="" selected disabled>---</option>
                    <?php
                    $query_user = mysqli_query($connection, "SELECT * FROM users WHERE username != '$username'");
                    while ($recepient= mysqli_fetch_array($query_user)) {
                      echo '<option value="'.$recepient['username'].'">'.$recepient['username'].'</option>';  
                    }
                    
                    ?>
                </select>
            </div>
            <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit" name="send">
                            Send
                        </button>
                        <button type="button" class="contact100-form-btn cancel" onclick="closeForm()">Close</button>
                    </div>
                </div>
            <div>
            </div>
            <!-- To do list form -->
          </form>
          
        </div>
        <div class="form-popup" id="myTodo">
            <?php
            echo '<form action="message.php?username='.$username.'" class="form-container" method="POST">';
          ?>
            <h1>To Do Item</h1>
            <hr>
            <label for="tasks" class="label-input100"><b>Task</b></label>
            <textarea class="input100" placeholder="Your Task" name="task" required></textarea>
            <div class="form-group">
                <label>Time</label>
                <input class="au-input au-input--full" type="time" name="time" placeholder="Time for the task" required>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="au-input au-input--full" type="date" name="date" placeholder="Date for the task" required>
            </div>
            <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn" type="submit" name="post">
                            Post
                        </button>
                        <button type="button" class="contact100-form-btn cancel" onclick="closeToDoForm()">Close</button>
                    </div>
                </div>
            <div>
            </div>
            
          </form>
        </div>

    </div>

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
<!-- for messages -->
<script type="text/javascript">
    function openReturn(){
        var txt;
        let r = confirm("Are you sure ".$username." has return ");
        if(r == true){
            txt = "You pressed OK!";
        }else{
            txt = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>
<script type="text/javascript">
function openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("myTodo").style.display = "none";
}

function closeForm() {
      document.getElementById("myForm").style.display = "none";
}
</script>
<script type="text/javascript">
function openToDoForm() {
        document.getElementById("myTodo").style.display = "block";
        document.getElementById("myForm").style.display = "none";
}

function closeToDoForm() {
      document.getElementById("myTodo").style.display = "none";
}
</script>

    <!-- Main JS-->
    <script src="static/js/main.js"></script>

     <!-- Js for current time -->
    <script src="js/time.js"></script>


