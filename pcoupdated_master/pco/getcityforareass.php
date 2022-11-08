
<?php

$country=$_POST['country'];

include("db_connection.php");

 $sqllasz = "SELECT * FROM countries WHERE country='$country'";
 
 
 $resultz=$conn->query($sqllasz);


while($rowz=mysqli_fetch_assoc($resultz)){
    
    $id=$rowz['iso2'];
    //echo '<option>'.$id.'</option>';
}




echo '<option>Select City</option>';


 $sqllas = "SELECT * FROM destination WHERE country='$country'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
 echo "<option>".$row['city']."</option><br>";
}





?>