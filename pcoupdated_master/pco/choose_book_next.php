<?php

require_once('db_connection.php');


include('header.php');

	
$hhnn=$_SESSION['hotelname'];
$ccnn=$_SESSION['countryname'];
$aann=$_SESSION['addressname'];




	
		
$sqll ="SELECT * FROM roomtypes WHERE hotel='$hhnn' && country='$ccnn' && location='$aann'";
		$resultt = $conn->query($sqll);

 
	



if (isset($_POST['submit'])) {
	
	
$room=$_POST['room'];

	
	
	
	
	
		$_SESSION['selectedroom']=$room;
		
		
		
echo "<script>location.replace('book.php');</script>";
	
	
	
}


 
 ?>
 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">
		  
<form action="#" method="post" enctype="multipart/form-data">



<input style="display:none;" name="c">
<input style="display:none;" name="p">
<input style="display:none;" name="pp">
<input style="display:none;" name="cr">
<input style="display:none;" name="ps">
<input style="display:none;" name="fr">




								



<div class="form-group">


<h2 align='center'>Choose Room Type</h2>

</div>


<?php
  


if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	 ?>
	
	<label><?php echo $roww['name'];?> </label><input type="radio" value="<?php echo $roww['name']; ?>" name='room'>
							
							
								<br/>
								
								
								
								
	  
	  <?php
	  }  
	  
}
	  
	  
	  ?>


  

							
						
							
							
							
							
							
							
								
								<input type="submit" name="submit" value="Select">






</form>





 </br>
  </br>
   </br>

</main>





