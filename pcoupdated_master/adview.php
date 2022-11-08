<?php

include 'db_connection.php';

$company=$_POST['company'];
$country=$_POST['country'];
$side=$_POST['side'];
$date=$_POST['datee'];
$time=$_POST['timee'];


date_default_timezone_set('Asia/Dubai');



$sql = "INSERT INTO adsviewed (company,country,side,date,time)
           VALUES ('$company','$country','$side','$date','$time')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {
echo 'done';
}










?>