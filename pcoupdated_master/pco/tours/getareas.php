
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











 $sqllas2 = "SELECT * FROM destination WHERE country like '$country' && city like '$city'";
 
 
 $result2=$conn->query($sqllas2);


while($row2=mysqli_fetch_assoc($result2)){
    
    $ar=explode(",", $row2['airports']);
    
    for($x=0; $x<count($ar); $x++){
        if(strpos($ar[$x], $city)!==false)
        {
 echo "<option>".$ar[$x]."</option>";
        }
    }
}







 $sqllas3 = "SELECT * FROM destination WHERE country like '$country' && city like '$city'";
 
 
 $result3=$conn->query($sqllas3);


while($row3=mysqli_fetch_assoc($result3)){
    
    $ar=explode(",", $row3['attractions']);
    
    for($x=0; $x<count($ar); $x++){
 echo "<option>".$ar[$x]."</option>";
    }
}




?>