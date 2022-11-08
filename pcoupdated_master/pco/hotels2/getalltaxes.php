
<?php
session_start();

$country=$_POST['country'];
$city=$_POST['city'];
$star=$_POST['star']. ' Star';



include("db_connection.php");

 


 $sqllas = "SELECT * FROM taxnames WHERE country = '$country' && city = '$city' && star = '$star'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
    echo $row['taxname'];
 
 
}







?>