<?php

include 'db_connection.php';


$country=$_POST['country'];
$city=$_POST['city'];
$star=$_POST['star'];


$sqlla ="SELECT * FROM taxnames WHERE country='$country' && city='$city' && star='$star'";
		$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
      
      
      echo json_encode($rowwa);
      
      
  }
  
}

else{
    echo 'doesnot exist';
}



?>
	