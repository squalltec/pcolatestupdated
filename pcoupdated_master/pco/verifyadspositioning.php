<?php

include 'db_connection.php';

$bb='';
$count=$_POST['count'];
$posit=$_POST['posit'];		
		
		
$sqll ="SELECT * FROM adscompany WHERE country='$count' && (position='$posit' || position='Both')";
		$resultt = $conn->query($sqll);

	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      
    $bb=',exist';
  }
  
  
}



  echo $bb;
?>