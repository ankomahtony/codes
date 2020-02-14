<?php
include("connection.php");
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
    <title>Register Student</title>

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

<style type="text/css">
	label{
		color: black;
	}
	input{
		border-radius: 5% !important;	}
</style>
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

<body  class="animsition">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand hidden-xs hidden-sm" href="user_panel.php">Home Page</a>
			</div>
			</div>
	</nav>
			
			<hr />

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
//    $id                                 = $_POST["id"];
    $name_of_student                    = $_POST["name_of_student"];
    $gender                             = $_POST["gender"];
    $dob                                = $_POST["dob"];
    $residential_address                = $_POST["residential_address"];
    $town                               = $_POST["town"];
    $region                             = $_POST["region"];
    $program_of_study                   = $_POST["program_of_study"];
    $year_admitted	                    = $_POST["year_admitted"];        
    $house_affiliation                  = $_POST["house_affiliation"]; 
    $status                             = $_POST["status"];    
    $emergency_contact_name             = $_POST["emergency_contact_name"];    
    $emergency_contact_1    			= $_POST["emergency_contact_1"];
    $emergency_contact_2         		= $_POST["emergency_contact_2"];    
    $cut_year_admitted                  = substr($year_admitted, 2, 2); 

    $month = Date('m');
	$year = Date('Y');
	if ($month>9) {
	    $form_num=$year-$year_admitted+1;
	}elseif($month<5){
	    $form_num=$year-$year_admitted;
	}else{
	    $form_num=$year-$year_admitted;
	}

	$class                      		= 'Form '.$form_num;
	
     $last_query =mysqli_query($connection,"SELECT * FROM student_details ORDER BY SN DESC limit 1");
     $last_row  = mysqli_fetch_assoc($last_query);
        if (mysqli_num_rows($last_query)==0){
                $sid                    = 1;
                $sch_id           		= 101;
                $spri_id                = sprintf("%03d", $sid);
                $id                    = "$sch_id"."$spri_id"."$cut_year_admitted";
        }else{
            $sch_id = substr($last_row['id'],0,3);
            if($last_row['sid']==1000){
                $sch_id++;
                $sid =1;
            }else{
            	$pre_sid = $last_row['sid'];
                $sid = $pre_sid+1;   
            }
            $spri_id = sprintf("%03d", $sid);
            $id     = "$sch_id"."$spri_id"."$cut_year_admitted";
                    
        } 


      // Handle the student Photo
    $student_photo	= $_FILES['student_photo'];
    $picName = $student_photo['name'];
    $picTemName = $student_photo['tmp_name'];
    $picSize = $student_photo['size'];
    $picError = $student_photo['error'];
    $picType = $student_photo['type'];
    $picNameSplit = explode('.', $picName);
    $actualPicExt = end($picNameSplit);
    $picExt_low = strtolower($actualPicExt);
    $allowed_pic_Ext = array('jpg','jpeg','png');

    if(in_array($picExt_low, $allowed_pic_Ext)){
    	if($picError ===0){
    		if ($picSize < 100000000) {
    			$picNameNew = $id.'.'.$actualPicExt;
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

    $query     = mysqli_query($connection, "INSERT INTO student_details (sid, sch_id,id,name_of_student, gender, dob, residential_address, town, region, class, program_of_study, year_admitted, house_affiliation, status, emergency_contact_name, emergency_contact_1, emergency_contact_2, student_photo) VALUES ('$sid', '$sch_id', '$id', '$name_of_student', '$gender', '$dob', '$residential_address', '$town', '$region', '$class', '$program_of_study', '$year_admitted','$house_affiliation','$status', '$emergency_contact_name', '$emergency_contact_1', '$emergency_contact_2', '$picDestination')");


    
        if ($query){
            
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> '.$name_of_student .' Registered Successfully.</div>';
            	header("refresh:2; url='students.php'");
        }else{
        		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops, Student Registration Failed !</div>';
        	}
        
        mysqli_close($connection);  
    
    }
?>
  <div class="page-wrapper">
        <div class="page-content--bgf7">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="/">
                                <h1>Student Registration Form</h1>
                            </a>
                        </div>
                        <div class="login-form">

		<form class="form-horizontal" action="" method="post"  style="color:white" enctype="multipart/form-data">
               <div class="row">
                   	<div class="col-md-10">
                   		<div class="form-group">
							<label>Name of student</label>
							<div>
								<input class="au-input au-input--full" type="text" name="name_of_student" class="form-control" placeholder="Enter Full Name of Student" required>
							</div>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<div>
								<select name="gender" class="form-control" required>
									<option value=""> ----- </option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div> 
						<div class="form-group">
							<label>Date of Birth</label>
							<div>
								<input type="date" name="dob" class="au-input au-input--full" date="" data-date-format="dd-mm-yyyy" placeholder="00-00-0000">
							</div>
						</div>
						<div class="form-group">
							<label>Residential Address</label>
							<div>
								<textarea name="residential_address" class="form-control" placeholder="Enter Residential Address"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label>Town of Residence</label>
							<div>
								<input type="text" name="town" class="form-control" placeholder="Enter Town of Residence" required>
							</div>
						</div>
		                <div class="form-group">
							<label>Region of Residence</label>
							<div>
								<select style="" name="region" class="form-control">
									<option value=""> ----- </option>
									<option value="Ahafo Region">Ahafo Region</option>
									<option value="Ashanti Region">Ashanti Region</option>
		                            <option value="Bono Region">Bono Region</option>
									<option value="Bono East Region">Bono East Region</option>
									<option value="Central Region">Central Region</option>
									<option value="Eastern Region">Eastern Region</option>
		                            <option value="Greater Accra Region">Greater Accra Region</option>
									<option value="North East Region">North East Region</option>
									<option value="Northern Region">Northern Region</option>
									<option value="Oti Region">Oti Region</option>
		                            <option value="Savannah Region">Savannah Region</option>
									<option value="Upper east Region">Upper East Region</option>
									<option value="Upper West Region">Upper West Region</option>
									<option value="Volta Region">Volta Region</option>
		                            <option value="Western Region">Western Region</option>
									<option value="Western North Region">Western North Region</option>
								</select>
							</div>
		                </div>
						<!-- <div class="form-group">
							<label>Current Class</label>
							<div>
								<select name="class" class="form-control" required>
									<option value=""> ----- </option>
									<option value="Form 1">Form 1</option>
									<option value="Form 2">Form 2</option>
					                <option value="Form 3">Form 3</option>
					            </select>
							</div>
			     		</div> -->
			     		<div class="form-group">
						<label >Program</label>
						<div >
							<select  name="program_of_study" class="form-control"  required>
							  <option value=""> ----- </option>
							  <option value="General Science">General Science</option>
							  <option value="General Arts">General Arts</option>
				              <option value="Business">Business</option>
				              <option value="Technical">Technical</option>
				              <option value="Home Science">Home Science</option>
				              <option value="Visual Arts">Visual Arts</option>
				              <option value="Agricultural Science">Agricultural Science</option>
				            </select>
						</div>
			        </div>
						<div class="form-group">
							<label >Year Admitted</label>
							<div >
								<input class="au-input--full form-control" type="text" name="year_admitted" placeholder="Enter Year Admitted" required>
							</div>
							<p>first year of the academic year(eg. 20xx of 20xx/20yy)</p>
						</div>
					<div class="form-group">
						<label >House Affiliation</label>
						<div >
							<select name="house_affiliation" class="form-control" >
								<option value=""> ----- </option>
	                            <option value="House 1">House 1</option>
								<option value="House 2">House 2</option>
								<option value="House 3">House 3</option>
								<option value="House 4">House 4</option>
							</select>
						</div>
					</div>				
					<div class="form-group">
						<label>Residential Status</label>
						<div >
							<select name="status" class="form-control" >
								<option value=""> ----- </option>
	                            <option value="Boarding">Boarding</option>
								<option value="Day">Day</option>
							</select>
						</div>
					</div>				
					<div class="form-group">
						<label class="control-label">Name of Guardian</label>
						<div>
							<input type="text" name="emergency_contact_name" class="form-control" placeholder="Enter Name of Guardian">
						</div>
					</div>
					<div class="form-group">
						<label >Guardian Mobile Contact</label>
						<div>
							<input type="text" name="emergency_contact_1" class="form-control" placeholder="Enter Guardian Mobile Contact">
						</div>
					</div>
					<div class="form-group">
						<label>Guardian Home Contact</label>
						<div>
							<input type="tel" name="emergency_contact_2" class="form-control" placeholder="Enter Guardian Home Contact">
						</div>
					</div>
					<div class="form-group">
						<label>Student Photo</label>
						<div>
							<input type="file" name="student_photo" accept="image/*">
						</div>
					</div> 
                  </div>
                </div> 
                <div class="row">        
                    <input style="margin-left:30%; height:70px; width: 40%;" type="submit" name="add" class="btn btn-sm btn-primary item-font" value="Add New Student"> 
                </div>
			</form>
		<div class="register-link">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'yyyy-mm-dd',
	})
	</script>

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
