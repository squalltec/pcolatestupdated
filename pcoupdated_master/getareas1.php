<?php

session_start();

$ct=$_SESSION['pickuplocation'];


include("db_connection.php");

$country=$_SESSION['country'];
$city=$_SESSION['city'];
		
 $sqllas = "SELECT * FROM rentacarareas WHERE country='$country' && city='$city' GROUP BY area";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();



 
while($row=mysqli_fetch_assoc($result)){
    
    if($ct==$row['area'])
    {
        echo "<option selected>".$row['area']."</option><br>";
    }
    else{
     echo "<option>".$row['area']."</option><br>";
    }
}


?>