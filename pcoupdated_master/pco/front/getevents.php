<?php


include("db_connection.php");

$comp=$_POST['compy1'];
$comp1=$_POST['compy2'];
		
 $sqllas = "SELECT * FROM events WHERE country='$comp1' && location='$comp'";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();

echo "<option>Select the Event</option><br>";

while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['event']."</option><br>";
}


?>