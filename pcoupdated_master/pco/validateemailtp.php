
<?php

$email=$_POST['email'];

include("db_connection.php");



 $sqllas = "SELECT * FROM loginforvehicles WHERE email='$email'";
 
 
 $result=$conn->query($sqllas);
 
 
while($row=mysqli_fetch_assoc($result)){
    
     echo 'exists';
 }





?>