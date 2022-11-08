<?php


include("db_connection.php");

$comp=$_POST['compy1'];
$data=array();	
		
 $sqllas = "SELECT * FROM newevents WHERE name='$comp'";
 
 
 
 
 $result=$conn->query($sqllas);
 $data = array();


while($row=mysqli_fetch_assoc($result)){
	
	  array_push($data,$row);
	
}


echo json_encode($data);


?>