<?php

session_start();
include 'db_connection.php';

$country=$_POST['country'];
$city=$_POST['city'];
$hotel=$_POST['hotelname'];

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];	
$phone=$_POST['phone'];	
$nationality=$_POST['nationality'];	
$birthday=$_POST['birthday'];	

$designation=$_POST['designation'];	


$department=$_POST['department'];	

$outlet=$_POST['outlet'];	




$desis=array();

$sqlla ="SELECT * FROM designationshotels";
$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
      
      array_push($desis,$rowwa['designations']);
      
      
  }
}


if (in_array($designation, $desis)) {
    
    
   	
 
}

else{
    	
$sql ="INSERT INTO designationshotels (designations) VALUES ('$designation')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}
	





$sql ="INSERT INTO contactsevents (hotel,country,city,fname,lname,email,designation,department,outlet,phone,nationality,birthday) VALUES ('$hotel','$country','$city','$fname','$lname','$email','$designation','$department','$outlet','$phone','$nationality','$birthday')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
   
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>