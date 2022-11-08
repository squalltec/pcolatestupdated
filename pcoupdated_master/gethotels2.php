<?php

include("db_connection.php");

$country=$_POST['country'];
$city=$_POST['city'];
$star=$_POST['star'];

//$country='United Arab Emirates';
//$city='Dubai';

$nam='';

 $today=date("Y-m-d");


 $sqllas = "SELECT * FROM hotelsdatabase WHERE city='$city' && country='$country' && star='$star'";
 
 
 

 $result=$conn->query($sqllas);
 $data = array();

echo "<option selected disabled value='0'>Select Hotel</option><br>";
 
while($row=mysqli_fetch_assoc($result)){
    
    $hn=$row['name'];
    
    $sqllasx = "SELECT * FROM roomnumbers WHERE location='$city' && country='$country' && hotel='$hn'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
    
    $datex=$rowx['dates'];
    $date=$datex;
   
 
    
    
    if($date>=$today){
        if($nam!=$rowx['hotel']){
    
    echo "<option>".$rowx['hotel']."</option><br>";
    $nam=$rowx['hotel'];
        }
    }
}
     
     
     
}


?>