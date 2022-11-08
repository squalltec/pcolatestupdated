<?php

include 'db_connection.php';

$country=$_POST['countryname'];
$city=$_POST['cityname'];

$sqlla ="SELECT * FROM destination WHERE country='$country' && city='$city'";
		$resultta = $conn->query($sqlla);
		

if ($resultta->num_rows > 0) {
  // output data of each row
  
 
  while($rowwa = $resultta->fetch_array()) {
      
	  echo json_encode($rowwa);
	  
  }
}



?>