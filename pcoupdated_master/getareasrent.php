   <?php
   
   
    include 'db_connection.php';
    
    $country=$_POST['country'];
    $city=$_POST['city'];
  
  

    
$sql ="SELECT * FROM hotelsdatabase WHERE country='$country' && city='$city' GROUP By name";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo '<option>'.$row['name'].'</option>';
      
  }
}  
  
  
  
  
  
  
  
  
  
  
  
    
$sql ="SELECT * FROM rentacarareas WHERE country='$country' && city='$city' GROUP By area";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo '<option>'.$row['area'].'</option>';
      
  }
}















      ?>
                              