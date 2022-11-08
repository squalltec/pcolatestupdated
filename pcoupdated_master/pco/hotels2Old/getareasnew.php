
<?php

$country=$_POST['country'];
$city=$_POST['city'];

include("db_connection.php");

 


 $sqllas = "SELECT * FROM destination WHERE country like '$country' && city like '$city'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
    $ar=explode(",", $row['areas']);
    
    for($x=0; $x<count($ar); $x++){
 echo "<option>".$ar[$x]."</option>";
    }
}





?>