<?php
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'podca');


$podca_query = mysqli_query($connection, "SELECT * FROM `blog` WHERE 1");
$podca = mysqli_fetch_assoc($podca_query);

if (isset($_POST['post'])) {
	$seasonName = $_POST['seasonName'];
	$episodeNumber = $_POST['episodeNumber'];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$datePosted = date('d M Y');
	$timePosted = date('H:i');
	$content = $_POST['content'];

	// Handle the Photo
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
	                $picNameNew = $seasonName.$episodeNumber.'.'.$actualPicExt;
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
	    // end the Photo
	   	// Handle the Audio
	    $audio  = $_FILES['audio'];
	    $audName = $audio['name'];
	    $audTemName = $audio['tmp_name'];
	    $audSize = $audio['size'];
	    $audError = $audio['error'];
	    $audType = $audio['type'];
	    $audNameSplit = explode('.', $audName);
	    $actualAudExt = end($audNameSplit);
	    $audExt_low = strtolower($actualAudExt);
	    $allowed_aud_Ext = array('mp3','acc','wma');

	    if(in_array($audExt_low, $allowed_aud_Ext)){
	        if($audError ===0){
	            if ($audSize < 1000000000) {
	                $audNameNew = $seasonName.$episodeNumber.'.'.$actualAudExt;
	                $audDestination = 'audios/'.$audNameNew;
	                move_uploaded_file($audTemName, $audDestination); 
	            }else{
	                echo "Audio is too big must be less than 100mb";
	            }
	        }else{
	            echo "There is error uploading the audio";
	        }
	    }else{
	        echo "Audio must has in mp3,acc or wma extention";
	    }
	    // end the audio

	    $query = mysqli_query($connection, "INSERT INTO blog (seasonName, episodeNumber, title, author, datePosted,timePosted, audio, picture,content) VALUES( '$seasonName','$episodeNumber', '$title', '$author', '$datePosted', '$timePosted', '$audDestination', '$picDestination','$content')");

	    if ($query) {
	    	echo "Successfully Posted";
	    	header("Location:index.php");
	    }else{
	    	echo "Something is wrong somewhere";
	    }


}
?>