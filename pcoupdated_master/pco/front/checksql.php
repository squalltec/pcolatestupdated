<?php

session_start();
require_once('db_connection.php');


$STANDARDPRICE='100';

$numberofdays=0;
$totalprice=0;


$rt=$_SESSION['rt'];
$sd=$_SESSION['sdate'];
$ed=$_SESSION['edate'];
$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];


	
			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";

		$resulttaa = $conn->query($sqllaa);

	
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwa = $resulttaa->fetch_assoc()) {
	  
	 	
		  
		  }
		  }
		  
		  ?>