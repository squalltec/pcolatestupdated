
<?php

include("db_connection.php");

$country=$_POST['country'];
$city=$_POST['city'];
		
 $sqllas = "SELECT * FROM contactshotels WHERE country='$country' && city='$city'";
 
 
 
 
 $result=$conn->query($sqllas);



while($row=mysqli_fetch_assoc($result)){
    
 echo "<option>".$row['hotel']."</option><br>";
}




?>