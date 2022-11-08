<?php

include("db_connection.php");

$country=$_POST['country'];
$city=$_POST['city'];


 $sqllas = "SELECT * FROM newevents WHERE country='$country' && city='$city'";
 
 $result=$conn->query($sqllas);
 $data = array();

echo "<option style='color:red;' selected value='0'>Select Event</option><br>";
 
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['name']."</option><br>";
}


?>