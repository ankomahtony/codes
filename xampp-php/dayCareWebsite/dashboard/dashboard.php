<?php
include("../functions.php");

if (!isset($_SESSION['user'])) {
	header("Location: ../login.php");
}

?>

<html>
	<head>
		<title>
			DayCare -DashBoard
		</title>
		<link href="style.css" rel="stylesheet">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link href="../css/font-face.css" rel="stylesheet" media="all">
	    <link href="../css/font-awesome.min.css" rel="stylesheet" media="all">
	    <link href="../css/fontawesome-all.min.css" rel="stylesheet" media="all">
			
	</head>
	<body style="background-color: rgba(120,120,120,0.4);" >
	<div class="row">
		<div class="col-2 navDiv clickable" id="tab1" onclick="javascrpit:selectTab(1)">
			<div class="row">
                     <h1 style="font-size: 30pt;"> <a href="../index.php"> <span style="color: darkviolet;">We</span><span style="color: gold;">ll</span><span style="color: deepskyblue;">be</span><span style="color: green;">ing</span> <span style="color: gold;">K</span><span style="color: red;">i</span><span style="color: deepskyblue;">d</span><span style="color: darkviolet;">s</span> <span style="color: red;">C</span><span style="color: deepskyblue;">a</span><span style="color: green;">r</span><span style="color: darkviolet;">e</span> </a>
                     </h1>
                 </div>
                 <div class="row">
                        <p><span style="color: red;">Love </span><span style="color: gold;">& </span><span style="color: darkviolet;"> Care</span> </p>  
                            
                </div>
		</div>
		<div class="navDiv1">
			<button class='btn btn-primary navBtn' onclick="javascrpit:closing(1)">&#128694; Log Out</button>
			<button class='btn btn-danger navBtn ' onclick="javascrpit:closing(2)">&#10006; Exit</button>
		</div>
		
	</div>
	<hr class="hr-primary">
	
	<!-- SELECTING A COMPANY SECTION -->
	<div class="row" id="tab1Content">
		<div class="col-md-6 bigDiv">
			<?php
				$time=date('H');
				if ($time < 12) {
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Morning &#127773; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to Wellbeing  Kids DashBoard</h2>
						</div>';
				}elseif ($time <16) {
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Afternoon &#127774; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to Wellbeing Kids DashBoard</h2>
						</div>';
				}else{
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Evening &#127770; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to Wellbeing Kids DashBoard</h2>
						</div>';
				}
			?>	
			<br><br><br>
			<div class="clickable" id="nextToCom" onclick="javascrpit:selectTab(2)">Next To Enjoy &#10145;</div>	
		</div>
		<div class="col-md-5 left-aside">
			<img src="images/hpbg2.jpg" class="left-aside-img">
		</div>
	</div>
	<div class="row" id="tab2Content">
		<div class="col-md-6 bigDiv">
			<div class="selectDiv clickable" id="tab4" onclick="javascrpit:addUser()">Create User</div>
			<div class="selectDiv clickable" onclick="javascrpit:addClass()">Create Class</div>
			<div class="selectDiv clickable" id="removeCom" onclick="javascrpit:addStaff()">Add Staff</div>
		</div>
		<div class="col-md-5 left-aside">
		<img src="images/hpbg1.jpg" class="left-aside-img">
			<a href="../addClass.php" id="addClass" style="display: none;"></a>
			<a href="../addStaff.php" id="addStaff" style="display: none;"></a>
			<a href="../create_user.php" id="addUser" style="display: none;"></a>
		</div>
	</div>

	<form id="hidden-logout" method="post">
		<button id="close1" name="logout" type="submit">logout</button>
		<button id="close2" name="exit" type="submit">exit</button>
	</form>

	</body>
	<script type="text/javascrpit" src="js/bootstrap.min.js"></script>
	<script type="text/javascrip" src="js/bootstrap.js"></script>
	<script type="text/javascrip" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		document.getElementById("tab1").click();
		function selectTab(tabIndex) {
			document.getElementById('tab1Content').style.display = "none";
			document.getElementById('tab2Content').style.display = "none";
			document.getElementById('tab'+tabIndex+'Content').style.display="block";

			if (tabIndex==1) {
				document.getElementById('tab1').style.display = "block";
				document.getElementById('tab2').style.display = "none";
			}else{
				document.getElementById('tab1').style.display = "block";
				document.getElementById('tab2').style.display = "block";
			}
		}
	function addClass(){
		document.getElementById('addClass').click();
	}
	function addStaff(){
		document.getElementById('addStaff').click();
	}
	function addUser(){
		document.getElementById('addUser').click();
	}

	function closing(closeIndex){
		document.getElementById("close"+closeIndex).click();
	}
	</script>

</html>
