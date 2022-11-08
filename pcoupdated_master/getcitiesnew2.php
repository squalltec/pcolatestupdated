<?php

session_start();

$ct=$_SESSION['city'];

include("db_connection.php");

$country=$_POST['country'];
		
 $sqllas = "SELECT * FROM rentacardatabase WHERE country='$country' GROUP BY city";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();



 
while($row=mysqli_fetch_assoc($result)){
    
    if($ct==$row['city'])
    {
        echo "<option selected>".$row['city']."</option><br>";
    }
    else{
     echo "<option>".$row['city']."</option><br>";
    }
}


?>