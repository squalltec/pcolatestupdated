<?php

$hotel=$_POST['name'];
$country=$_POST['country'];
$city=$_POST['city'];
$fullname=$_POST['fullname'];

$arraynames = explode(' ', $fullname, 2);

$fname=$arraynames[0];
$lname=$arraynames[1];

include("db_connection.php");



 $sqllas = "SELECT * FROM contactsrentacar WHERE company='$hotel' && country='$country' && city='$city' && fname='$fname' && lname='$lname'";
 
 
 $result=$conn->query($sqllas);
 
 
while($row=mysqli_fetch_assoc($result)){
    
     echo $row['email'];
 }





?>