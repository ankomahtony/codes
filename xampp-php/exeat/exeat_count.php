<?php 
include("connection.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exeat count</title>
</head>
<body>
   <?php

    $sql_town        = "SELECT * FROM  exeat WHERE type_of_exeat = 'Town Exeat' and remark='No'";    
    $result_town     = mysqli_query($connection, $sql_town);
    $town_exeat     = mysqli_num_rows($result_town);
    
    $sql_dist        = "SELECT * FROM  exeat WHERE type_of_exeat = 'Distance Exeat' and remark='No'";
    $result_dist     = mysqli_query($connection, $sql_dist);
    $distance_exeat     = mysqli_num_rows($result_dist);
    
    $sql_sus        = "SELECT * FROM  exeat WHERE type_of_exeat = 'Suspended' and remark='No'";    
    $result_sus     = mysqli_query($connection, $sql_sus);
    $suspended     = mysqli_num_rows($result_sus);
    
    // echo $suspended;
    
    
    ?> 
</body>
</html>