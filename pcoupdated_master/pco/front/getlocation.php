<?php





include("db_connection.php");

$comp=$_POST['compy1'];
		
 $sqllas = "SELECT * FROM hotels WHERE country='$comp' GROUP BY location";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();

echo "<option>Select City</option><br>";
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['location']."</option><br>";
}


?>