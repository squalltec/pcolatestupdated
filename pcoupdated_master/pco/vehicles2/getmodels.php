
<?php

include 'db_connection.php';
$brand=$_POST['brand'];

$sqllas = "SELECT * FROM vehiclesInventorydatabase WHERE brand = '$brand' Group By model";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
   
 echo "<option>".$row['model']."</option>";
    }


?>