<?php

include 'db_connection.php';

$cancel=$_POST['cancel'];
$bookingnumber=$_POST['bookingnumber'];
$dedcutedprice=$_POST['dedcutedprice'];



if($cancel=='hotel')
{
$sql2 = "UPDATE bookings SET cancellationapplied='Applied', deduction='$dedcutedprice' WHERE uniquenumber='$bookingnumber'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

}

}




?>