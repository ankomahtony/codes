<?php 
ob_start();
include("connection.php");
include("functions.php");
 $id = $_GET['id'];
 $date_returned = date('Y-m-d');
$user = $_SESSION['user'];
$full_name = $user['full_name'];
$time = date("H:i A");

 $query_return = mysqli_query($connection,"UPDATE exeat SET remark ='Yes',date_returned = '$date_returned',time_returned = '$time', confirm_by ='$full_name' WHERE id='$id' ");

 $query_std = mysqli_query($connection, "SELECT * FROM exeat WHERE id='$id'");
 $std = mysqli_fetch_assoc($query_std);
  	$name1=$std['guardian'];
    $name2=$std['name_of_student'];
    $number = $std['contact'];

 if ($query_return){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Noted </div>';
            	include('sendMsg2.php');
            	header("refresh:1; url='user_panel.php'");
        }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops,Cancelled!</div>';
 }
 ?>