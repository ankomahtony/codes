<?php
include("connection.php");
$warning = '';
$user_warning = '';
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
//    $id                                 = $_POST["id"];
    $full_name                    = $_POST["full_name"];
    $username                     = $_POST["username"];
    $email                        = $_POST["email"];
    $mobile_number                = $_POST["mobile_number"];
    $password                     = $_POST["password"];
    $confirm_password             = $_POST["confirm_password"];

      // Handle the student Photo
    $picture  = $_FILES['picture'];
    $picName = $picture['name'];
    $picTemName = $picture['tmp_name'];
    $picSize = $picture['size'];
    $picError = $picture['error'];
    $picType = $picture['type'];
    $picNameSplit = explode('.', $picName);
    $actualPicExt = end($picNameSplit);
    $picExt_low = strtolower($actualPicExt);
    $allowed_pic_Ext = array('jpg','jpeg','png');

    if(in_array($picExt_low, $allowed_pic_Ext)){
        if($picError ===0){
            if ($picSize < 100000000) {
                $picNameNew = $username.'.'.$actualPicExt;
                $picDestination = 'images/'.$picNameNew;
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

     $user_query = mysqli_query($connection,"SELECT * FROM users");
     $users = array();
     while ($user = mysqli_fetch_array($user_query)) {
         $users[] = $user['username'];
     }
    
    if (in_array($username, $users)) {
         $user_warning = $username." Exists, Choose Different Username";
    }elseif($password != $confirm_password){
         $warning = "Password must match";
    }else{
        $password = md5($password);
        $query     = mysqli_query($connection, "INSERT INTO users (full_name, username,email,mobile_number, password, picture) VALUES ('$full_name', '$username', '$email', '$mobile_number', '$password', '$picDestination')");

            if ($query){
            
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> '.$username .' Registered Successfully. with password: </div>'.$password;
                header("refresh:1; url='login.php'");
        }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Registration Failed !</div>';
            }
        
        mysqli_close($connection); 
    } 
    
    }
?>
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
    <title>Sign Up</title>

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

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bgf7">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="/">
                                <h3> House Master Registration </h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="au-input au-input--full" type="text" name="full_name" placeholder="Enter Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Enter Username" required>
                                    <p class="alert-danger"><?php echo $user_warning;  ?><p>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                 <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input class="au-input au-input--full" type="text" name="mobile_number" placeholder="Enter Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label> Picture</label>
                                    <div>
                                        <input type="file" name="picture" accept="image/*">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label>Comfirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirm_password" placeholder="Password">
                                    <p class="alert-danger"><?php echo $warning;  ?><p>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign Up</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

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