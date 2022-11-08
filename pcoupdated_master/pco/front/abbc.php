<?php





include("db_connection.php");

$comp=$_POST['compy'];
		
 $sqllas = "SELECT * FROM hotels WHERE name='$comp' GROUP BY country";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();

echo "<option>Select Country</option><br>";
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['country']."</option><br>";
}


echo json_encode($data);
?>