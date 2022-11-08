
<?php

include("db_connection.php");


		
 $sqllas = "SELECT * FROM newevents";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();


while($row=mysqli_fetch_assoc($result)){
    
 echo "<option>".$row['name']."</option><br>";
}

echo json_encode($data);




?>