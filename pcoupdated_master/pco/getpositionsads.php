<?php

include 'db_connection.php';

$bb='';
$countr=$_POST['countr'];
		
		
		
$sqll ="SELECT * FROM adscompany";
		$resultt = $conn->query($sqll);

	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      
      if(strpos($roww['country'], $countr)!==false)
      {
          $bb=$bb.$roww['position'];
             
             
      }
	  
  }
  
  
}



  echo $bb;
?>