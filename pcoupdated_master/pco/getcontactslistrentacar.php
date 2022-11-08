
<?php

$hotel=$_POST['name'];
$country=$_POST['country'];
$city=$_POST['city'];

include("db_connection.php");



 $sqllas = "SELECT * FROM contactsrentacar WHERE company='$hotel' && country='$country' && city='$city'";
 
 
 $result=$conn->query($sqllas);
 
 
while($row=mysqli_fetch_assoc($result)){
    
     echo '<option>'.$row['fname'].' '.$row['lname'].'</option>';
 }





?>