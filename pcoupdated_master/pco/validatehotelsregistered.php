
<?php

$name=$_POST['name'];
$country=$_POST['country'];
$city=$_POST['city'];

include("db_connection.php");



 $sqllas = "SELECT * FROM hotelsdatabase WHERE name='$name' && country='$country' && city='$city'";
 
 
 $result=$conn->query($sqllas);
 
 
while($row=mysqli_fetch_assoc($result)){
    
     echo 'exists';
 }





?>