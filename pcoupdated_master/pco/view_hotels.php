<?php
require_once('db_connection.php');


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="card-group">

<?php
$sqll ="SELECT * FROM hotels";
		$resultt = $conn->query($sqll);

 $a=0;
 
	
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	 $a++;
	
	if($a=='3'){
	
		echo "\r\n";
		$a=0;
		
		  
	  }
	
	  ?>
	  

  <div class="card">
    <img style='width:200px;' class="card-img-top" src="Hotel Images/<?php echo $roww['name'];?>/<?php echo $roww['image'];?>" alt="Hotel Logo">
    <div class="card-body">
	
      <h5 class="card-title"><?php echo $roww['name'];?></h5>
      <p class="card-text"><?php echo $roww['description'];?></p>
	  
	  <br/>
	  <h2> Facilities:</h2>
	  
	  
	  
<?php
$h=$roww['name'];
$c=$roww['country'];
$l=$roww['location'];
$sqlla ="SELECT * FROM facilities WHERE hotel='$h' && country='$c' && location='$l' ";
		$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	
	
	echo "<p>";
	echo $rowwa['facilities'];
	
	echo "</p><br/>";
		  
	  }
}
	
	  ?>
	  
	  
	  
	  <h2> Events:</h2>
	  
	  
	  
<?php
$h=$roww['name'];
$c=$roww['country'];
$l=$roww['location'];


$sqlla ="SELECT * FROM events WHERE hotel='$h' && country='$c' && location='$l' ";
		$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	
	
	echo "<p>";
	echo $rowwa['event'];
	
	echo "</p><br/>";
		  
	  }
}
	
	  ?>
	  
	  
     
    </div>
	
	

  </div>
  <br/>
  
  
  
  
  
  <?php
    
  }
}
?>
  
  
  
</div>















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

