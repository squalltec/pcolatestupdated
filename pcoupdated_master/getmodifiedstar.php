<?php

include("db_connection.php");

$country=$_POST['country'];
$city=$_POST['city'];
$hotel=$_POST['hotel'];



 $sqllas = "SELECT * FROM hotelsdatabase WHERE city='$city' && country='$country' && name='$hotel'";
 

 $result=$conn->query($sqllas);

while($row=mysqli_fetch_assoc($result)){
    
    
    echo $row['star'];
    
     
}


?>