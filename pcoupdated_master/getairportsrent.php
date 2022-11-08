   <?php
   
   
    include 'db_connection.php';
    
$country=$_POST['country'];
$city=$_POST['city'];


//$country='United Arab Emirates';
//$city='Dubai';

$sql ="SELECT * FROM countrydata WHERE country='$country'";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      $air=$row['airports'];
      
     $airr= explode(",",$air);
     
     foreach($airr as $ai)
      {
         
      if(strpos($ai, $city)!==false)
      {
      echo '<option>'.$ai.'</option>';
      }
      }
      
      
      
  }
}
      ?>
                              