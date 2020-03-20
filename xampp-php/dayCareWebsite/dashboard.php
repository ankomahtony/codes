<html>
	<head>
		<title>
			Daycare-Dashboard
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
                     <h1 style="font-size: 30pt;"> <a href="index.php"> <span style="color: darkviolet;">We</span><span style="color: gold;">ll</span><span style="color: deepskyblue;">be</span><span style="color: green;">ing</span> <span style="color: gold;">K</span><span style="color: red;">i</span><span style="color: deepskyblue;">d</span><span style="color: darkviolet;">s</span> <span style="color: red;">C</span><span style="color: deepskyblue;">a</span><span style="color: green;">r</span><span style="color: darkviolet;">e</span> </a>
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
		<div class="col-lg-6 bigDiv">
			<?php
				$time=date('H');
				if ($time < 12) {
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Morning &#127773; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to StoreApp  </h2>
						</div>';
				}elseif ($time <16) {
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Afternoon &#127774; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to StoreApp  </h2>
						</div>';
				}else{
					echo '<div class="welcomeDiv">
							<br><br>
							<h1>&#128522; Good Evening &#127770; ! </h1>
							<br>
							<h2> A Big Welcome <span style="font-size:100px;"> <img src="images/welcome_new.png" class="emoji"></span> to StoreApp  </h2>
						</div>';
				}
			?>	
			<br><br><br>
			<div class="clickable" id="nextToCom" onclick="javascrpit:selectTab(2)">Next To Enjoy &#10145;</div>	
		</div>
		<div class="col-lg-5 left-aside">
			<img src="images/hpbg2.jpg" class="left-aside-img">
		</div>
	</div>
	<div class="row" id="tab2Content">
		<div class="col-lg-6 bigDiv">
			<div class="selectDiv clickable" id="tab4" onclick="javascrpit:selectTab(4)">Create Company</div>
			<div class="selectDiv clickable" onclick="javascrpit:selectCom()">Open Company</div>
			<div class="selectDiv clickable" id="removeCom" onclick="javascrpit:selectTab(3)">Remove Company</div>
		</div>
		<div class="col-lg-5 left-aside">
		<img src="images/hpbg1.jpg" class="left-aside-img">
			<div id="openCom" class="centered">
				<h1 style="text-align: center;color: darkblue; background-color: snow;"><b> SELECT COMPANY </b></h1>
				<hr>
				<?php $com_query= mysqli_query($connection, "SELECT * FROM company order by id desc limit 5");

				while ($row=mysqli_fetch_array($com_query)){
					echo '<a href="index_new.php?id='.$row['id'].'" style="color:white;"><h2 class="clickable">'.$row['name'].'</h2></a>';
				}
				 ?>
			</div>
		</div>
	</div>
	<div class="row" id="tab4Content">
		<div class="col-lg-6 bigDiv">
			<div class="row"> 
				<div class="col-12 form-title">
					New Comapny
				</div>

			</div>

			<form action="" method="post">
				<input type="text" name="cid" class="form-input" placeholder ="Enter Company ID">

				<input type="text" name="com_name" class="form-input" placeholder ="Enter Name of the Company">
				<br>
				<input type="text" name="com_address" placeholder="Enter Address" class="form-input">
				<input type="text" name="tel_number" placeholder="Enter Telephone number" class="form-input">
				<input type="date" name="start_date" placeholder="Enter Start Date" class="form-input">
				<input type="date" name="end_date" placeholder="Enter End Date" class="form-input">
				<button type="submit" class="btn btn-primary" name="create_com"><span>Create</span></button>
			</form>
		</div>
		<div class="col-lg-5 left-aside">
			<img src="images/com.jpg" class="left-aside-img">
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
			document.getElementById('tab4Content').style.display = "none";

			document.getElementById('tab'+tabIndex+'Content').style.display="block";

			if (tabIndex==1) {
				document.getElementById('tab1').style.display = "block";
				document.getElementById('tab2').style.display = "none";
			}else{
				document.getElementById('tab1').style.display = "block";
				document.getElementById('tab2').style.display = "block";
			}
		}
	function selectCom(){
		document.getElementById('openCom').style.display = "block";
	}

	function closing(closeIndex){
		document.getElementById("close"+closeIndex).click();
	}
	</script>

</html>
