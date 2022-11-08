<?php
include 'db_connection.php';

$cancel=$_POST['cancel'];
$bookingnumber=$_POST['bookingnumber'];



if($cancel=='accept')
{
$sql2 = "UPDATE bookings SET cancellationconfirmed='Confirmed' WHERE uniquenumber='$bookingnumber'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

}

}

else if($cancel=='reject')
{
$sql2 = "UPDATE bookings SET cancellationconfirmed='' ,cancellationapplied='' WHERE uniquenumber='$bookingnumber'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

}

}

?>