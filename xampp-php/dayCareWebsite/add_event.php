<?php
session_start();

// connect to database
$connection = mysqli_connect('localhost', 'root', '', 'daycare');

// call the register() function if register_btn is clicked
if (isset($_POST['postEvent'])) {
	postEvent();
}

function postEvent(){
    global $connection;
    $event = $_POST['event'];
    $eventDate = $_POST['eventDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $location = $_POST['location'];

    $query = mysqli_query($connection, "INSERT INTO events (event, eventDate,startTime,endTime, location) VALUES ('$event','$eventDate','$startTime','$endTime','$location')");
    if ($query) {
        header('location: index.php');
    }else{
        echo "Something went wrong somewhere".$event." ".$eventDate." ".$startTime." ".$endTime." ".$location;

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
        <h2> Add Event</h2>
        Event: <input type="text" name="event" >
        Event Date: <input type="date" name="eventDate" >
        Start Time: <input id="appt-time" type="time" name="startTime"
           min="06:00" max="18:00" required
           pattern="[0-9]{2}:[0-9]{2}">
        <span class="validity"></span>
        End Time: <input id="appt-time" type="time" name="endTime"
           min="06:00" max="18:00" required
           pattern="[0-9]{2}:[0-9]{2}">
        <span class="validity"></span>
        Venue : <input type="text" name="location">
        <button type="submit" name="postEvent">Post</button>

    </form>
</body>
</html>