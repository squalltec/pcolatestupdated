
<?php



include("db_connection.php");

$city=$_POST['city'];

 $sqllasz = "SELECT * FROM hotelsdatabase WHERE city='$city'";
 
 
 $resultz=$conn->query($sqllasz);

echo '<option>Select Hotel</option>';
while($rowz=mysqli_fetch_assoc($resultz)){
    
 echo "<option>".$rowz['name']."</option><br>";   
  
    //echo '<option>'.$id.'</option>';
}









?>