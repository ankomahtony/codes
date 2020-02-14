<?php
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'daycare');

// call the register() function if register_btn is clicked
if (isset($_POST['addClass'])) {
	addClass();
}

function addClass(){
    global $connection;
    $classID  = $_POST['classID'];
    $className = $_POST['className'];
    $noOfKids = $_POST['noOfKids'];
    $teacher1 = $_POST['teacher1'];
    $teacher2 = $_POST['teacher2'];
    $teacher3 = $_POST['teacher3'];

    $query = mysqli_query($connection, "INSERT INTO classes (classID,className, noOfKids,teacher1,teacher2, teacher3) VALUES ('$classID','$className','$noOfKids','$teacher1','$teacher2','$teacher3')");
    if ($query) {
        header('location: index.php');
    }else{
        echo "Something went wrong somewhere".$className." ".$noOfKids." ".$teacher1." ".$teacher2." ".$teacher3;

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h2> Add Class</h2>
        Class ID: <input type="number" name="classID" >
        Class Name: <input type="text" name="className" >
        Number Of Kids: <input type="number" name="noOfKids" >
        Teacher1 : <input type="text" name="teacher1">
        Teacher2 : <input type="text" name="teacher2">
        Teacher3 : <input type="text" name="teacher3">
        <button type="submit" name="addClass">Add</button>

    </form>
</body>
</html>