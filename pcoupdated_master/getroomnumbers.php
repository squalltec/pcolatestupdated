<?php

include("db_connection.php");

$country=$_POST['country'];
$city=$_POST['city'];
$hotel=$_POST['hotel'];

$rn=0;

//$country='United Arab Emirates';
//$city='Dubai';

 $today=date("Y-m-d");

    $sqllasx = "SELECT * FROM roomnumbers WHERE location='$city' && country='$country' && hotel='$hotel'";
     $resultx=$conn->query($sqllasx);
    
    
while($rowx=mysqli_fetch_assoc($resultx)){
    
    $datex=$rowx['dates'];
    $date=$datex;
   
 
    
    
    if($date>=$today){
      
    $rn=$rn+(int)$rowx['number'];
        
    }
}
    
    
    echo $rn; 
     
     


?>