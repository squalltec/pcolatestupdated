<?php
session_start();
include("db_connection.php");



$country=$_POST['country'];
		
 $sqllas = "SELECT * FROM meetingbanquetplanner WHERE country='$country' GROUP BY city";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();

echo "<option disabled value='0'>Select City</option><br>";
 
while($row=mysqli_fetch_assoc($result)){
    if($_SESSION['city']==$row['city'])
    {
     echo "<option selected>".$row['city']."</option><br>";
    }
    else{
        echo "<option>".$row['city']."</option><br>";
    }
}


?>