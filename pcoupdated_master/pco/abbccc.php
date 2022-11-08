<?php





include("db_connection.php");

$comp='Radison';
$comp1='United Arab';
$comp2='Dubai';
		
 $sqllas = "SELECT * FROM hotels WHERE name='$comp' && country='$comp1' && location='$comp2'";
 
 
 
 
 $result=$conn->query($sqllas);
 
 $data = array();


while($row=mysqli_fetch_assoc($result)){

    
     echo $row['c'];
	 echo $row['p'];
	 echo $row['pp'];
	 echo $row['cr'];
	 echo $row['ps'];
	 echo $row['fr'];
}


echo json_encode("<option>Select Adress</option><br>"+$data);

?>