<?php

include 'db_connection.php';




$ct=$_POST['city'];



 $sqllas = "SELECT * FROM allfetchedevents WHERE city='$ct' GROUP BY city";
 
 
 $result=$conn->query($sqllas);
 
 
while($row=mysqli_fetch_assoc($result)){
    
     echo 'exists';
 }



?>