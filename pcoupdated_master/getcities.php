<?php

include("db_connection.php");

$country=$_POST['country'];
		
 $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$country' GROUP BY city";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();

echo "<option selected disabled value='0'>Select City</option><br>";
 //echo '<option value="All">All</option>';
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['city']."</option><br>";
}


?>