<?php
session_start();
include("db_connection.php");

$country=$_POST['country'];
		
 $sqllas = "SELECT * FROM countries WHERE country='$country'";
 $result=$conn->query($sqllas);

echo "<option disabled value='0'>Select City</option><br>";
 
while($row=mysqli_fetch_assoc($result)){
    
    $iso2=$row['iso2'];
    
    $sqllas2 = "SELECT * FROM cities WHERE country_code='$iso2'";
 $result2=$conn->query($sqllas2);
 while($row2=mysqli_fetch_assoc($result2)){
     
     if($row2['name']==$_SESSION['city'])
     {
     echo "<option selected>".$row2['name']."</option><br>";
     }
     else
     {
      echo "<option>".$row2['name']."</option><br>";
     }
 }
    
    
}


?>