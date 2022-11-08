<?php





include("db_connection.php");

$comp=$_POST['compy'];
$comp1=$_POST['compy1'];
		
 $sqllas = "SELECT * FROM hotels WHERE name='$comp' && country='$comp1'";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();


echo "<option>Select Address</option><br>";
while($row=mysqli_fetch_assoc($result)){
    
     echo "<option>".$row['location']."</option><br>";
}


echo json_encode("<option>Select Adress</option><br>"+$data);
?>