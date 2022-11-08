<?php
session_start();

include 'db_connection.php';

$country=$_POST['country'];
$city=$_SESSION['city'];



$sql3="SELECT * FROM countries WHERE country='$country'";

 $result3=$conn->query($sql3);

while($row3=mysqli_fetch_assoc($result3)){
    
    $iso=$row3['iso2'];
    
$sql33="SELECT * FROM cities WHERE country_code='$iso'";

 $result33=$conn->query($sql33);

while($row33=mysqli_fetch_assoc($result33)){
    
    if($row33['name']==$city)
    {
       echo '<option selected>'.$row33['name'].'</option>'; 
    }
    else{
    echo '<option>'.$row33['name'].'</option>';
    }
    
    
}
       
  
    
}
















?>