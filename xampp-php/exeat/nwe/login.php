
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

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

</head>
<?php
$server         = "localhost";
$username       = "root";
$password       = "";
$dbname         = "exeat_card";


$connection = mysqli_connect($server, $username, $password, $dbname);

if ($connection){
    //echo "Database connect successfull";
}else{
    echo "Database connect not successfull" .mysql_error($connection);
    
    die($connection);
}
?>
<?php
$warning = '';
if(isset($_POST['submit'])){
    $username   = $_POST['username'];
    $password   = mysqli_real_escape_string($connection,$_POST['password']);
    $password  = md5($password);
    $query      = "SELECT * FROM users WHERE username = '$username' AND password='$password'";
    $select_user_query = mysqli_query($connection,$query);

    if ($select_user_query && mysqli_num_rows($select_user_query)==1) {
        $row = mysqli_fetch_assoc($select_user_query);
        header("Location:index.php?username=".$username);
    }else{
       $warning = 'Check Username or Password'; 
    }

    if (mysqli_num_rows($select_user_query)==0){
            
            echo '<div class="alert alert-dander alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Login Failed.</div>';
            
            mysqli_close($connection);
        }
}
?>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.php">
                                <img src="static/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <div class="form-group">
                                    <label>username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <p style="color: red;"><?php echo $warning; ?></p>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

</body>

</html>
<!-- end document-->