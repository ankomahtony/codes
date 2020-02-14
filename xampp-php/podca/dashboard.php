<?php 
	include('insertPodca.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<link rel="stylesheet" type="text/css" href="dash_style.css">
</head>
<body style="background-color: lightblue;">
	<form method="post" enctype="multipart/form-data">
		<label class=" form-title">Insert a Podcast</label>
		<br>
		<br>
		<input type="text" name="seasonName" class="form-control border-secondary text-white bg-transparent" placeholder ="Enter Name of the Season">
		<input type="number" name="episodeNumber" class="create-form-input" placeholder ="Enter Episode Number">
		<input type="text" name="title" class="form-control border-secondary text-white bg-transparent" placeholder ="Enter Title">
		<input type="text" name="content" placeholder="Write a short note on the podcast">

		<input type="text" name="author" class="create-form-input" placeholder ="The Author Name">
		<br>
		<input type="file" name="audio" accept="audios/*">
		<input type="file" name="picture" accept="images/*" class="create-form-input">
		<button type="submit" name="post" class="btn btn-primary"><span>Post</span></button>
	</form>
</body>
</html>