<?php 
ob_start();
include("../connection.php");
include("../functions.php");
$user = $_SESSION['user'];
$username = $user['username'];
$std_id=$_GET['id'];
$query_student = mysqli_query($connection,"SELECT * FROM student_details WHERE id='$std_id'");
$student = mysqli_fetch_assoc($query_student);

$std_class = $student['class'];
$std_prog = $student['program_of_study'];
$current_class = substr($std_class, -1, 1).' '.substr($std_prog,0, 3);
$month = Date('m');
$year = Date('Y');
if ($month<9) {
    $other_year = $year - 1;
    $acad_year = $other_year."/".$year;
}else{
    $other_year = $year + 1;
    $acad_year = $year.'/'.$other_year;
}
if ($month>9) {
    $current_term = 1;
}elseif($month<5){
    $current_term = 2;
}else{
    $current_term = 3;
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
//    $id                                 = $_POST["id"];
    $name_of_student              = $_POST["name_of_student"];
    $type_of_exeat				        = $_POST['type_exeat'];
    $current_class                = $_POST['current_class'];
    $date_of_issue                = $_POST["date_of_issue"];
    $date_of_returning            = $_POST["date_of_returning"];
    $destination             	    = $_POST["destination"];
    $guardian                     = $_POST["guardian"];
    $contact       				        = $_POST["contact"];
    $reason             	 	      = $_POST["reason"];
    $issuer 					            =	$_POST['issuer'];
    $remark						            = "No";
    $date_returned				        = "N/A";
    $confirm_by                   = "N/A";
    $time_returned                 = "N/A";


  $save_exeat= mysqli_query($connection, "INSERT INTO exeat (name_of_student, current_class,type_of_exeat,date_of_issue,date_of_returning, destination, guardian, contact,issuer,reason,remark, date_returned, confirm_by, time_returned, academic_year,term) VALUES ('$name_of_student', '$current_class','$type_of_exeat','$date_of_issue', '$date_of_returning', '$destination', '$guardian', '$contact','$issuer','$reason','$remark','$date_returned','$confirm_by','$time_returned','$acad_year','$current_term')");

    $name1=$guardian;
    $name2=$name_of_student;
    $reason=$reason;
    $date_r = $date_of_returning;
    $number = $contact;

    if ($save_exeat){
            
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Exeat Issued Successfully to: '.$name_of_student.'</div>';
                include('../sendMsg.php');
                header("refresh:1; url='../user_panel.php'");
        }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Oops,Failed to Issue Exeat !</div>';
            }
        
        mysqli_close($connection); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Exeat Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="css/util.css">
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<div> <a href="../students.php">Back</a></div>
			<form class="contact100-form validate-form" method="POST" action="exeat_form.php">
        <div class="row">
            <span class="contact100-form-title">
              Issuing of Exeat
            </span>
          
          
        </div>
        <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
          <a href="#">
                <?php echo "<img src="."../".$student['student_photo']." alt="."no pic"." style='height: 100px; width: 150px;' />"; ?>
            </a>
        </div>
        

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Name of The Student *</span>
					<?php 
          echo '<input id="myInput" class="input100" type="text" name="name_of_student" value="'.$student['name_of_student'].'">'; ?>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Class is required">
					<span class="label-input100">Current Class *</span>
					<?php echo '<input class="input100" type="text" name="current_class" value="'.$current_class.'">'; ?>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid Date is required: 31/01/2019">
					<span class="label-input100">Date of Issue *</span>
          <?php
          $hour = Date('H')-1;
          $min = Date('i');
          echo '<input class="input100" type="text" name="date_of_issue" value="'.date('d-m-Y ').$hour.':'.$min.' '.Date('A').'">';
          ?>
					
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid Date is required: 31/01/2019">
					<span class="label-input100">Date of Returning *</span>
					<input class="input100" type="date" name="date_of_returning" placeholder="Enter Today's Date">
				</div>

				<div class="wrap-input100 rs1-wrap-input100">
					<span class="label-input100">Destination</span>
					<input class="input100" type="text" name="destination" placeholder="Destination">
				</div>
				<div class="wrap-input100 rs1-wrap-input100">
					<span class="label-input100">Contact</span>
          <?php 
          echo '<input class="input100" type="text" name="contact" value="'.$student['emergency_contact_1'].'">'; ?>
				</div>
        <div class="wrap-input100 rs1-wrap-input100">
          <span class="label-input100">Guardian</span>
          <?php 
          echo '<input class="input100" type="text" name="guardian" value="'.$student['emergency_contact_name'].'">'; ?>
        </div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Issuer *</span>
          <?php
					echo '<input id="myInput" class="input100" type="text" name="issuer" value="'.$user['full_name'].'" readonly>';
				  ?>
        </div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type of Exeat">
					<span class="label-input100">Type of Exeat *</span>

					<select style="height: 60px;" name="type_exeat" class="input100" required>
						<option value="" selected disabled> ----- </option>
						<option value="Town Exeat" >Town Exeat</option>
						<option value="Distance Exeat">Distance Exeat</option>
		                <option value="Suspended">Suspended</option>
					</select>				
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Reason</span>
					<textarea class="input100" name="reason" placeholder="Reason here..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="submit">
							Submit
						</button>
					</div>
				</div>
			</form>
		</div>

		<span class="contact100-more">
				Call us on +233 540 73 1665 / +233 206646949 
		</span>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script type="text/javascript">
	function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
</script>
<script>
autocomplete(document.getElementById("myInput"), $students);
</script>
</body>
</html>
