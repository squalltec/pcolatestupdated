<?php

require_once('db_connection.php');

include('header.php');

$_SESSION['step']='3';

				$count=0;  
$sqlla ="SELECT * FROM hotels";
		$resultta = $conn->query($sqlla);
		
		
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowww = $resultta->fetch_assoc()) {
	  $count=$count+1;
	  
	  
}}
		
		
		


?>






       <!--start content-->
          <main class="page-content">
		  
		  
		  
		  <a href="same.php"><button>Same Pricing for all Regions</button></a>
		 <a href="diff.php"> <button>Different Pricing for all Regions</button></a>
		  
		  
		  
            
</main>