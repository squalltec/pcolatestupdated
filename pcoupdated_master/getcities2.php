<?php

include("db_connection.php");

$country=$_POST['country'];
		
 $sqllas = "SELECT * FROM newevents WHERE country='$country' GROUP BY city";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();

echo "<option style='color:red;' selected disabled value='0'>Select Event City</option><br>";
 
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['city']."</option><br>";
}


?>