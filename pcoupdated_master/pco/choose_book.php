<?php

require_once('db_connection.php');


include('header.php');
if (isset($_POST['submit'])) {
	
	
	
$_SESSION['hotelname']=$_POST['name'];
$_SESSION['countryname']=$_POST['country'];
$_SESSION['addressname']=$_POST['location'];


echo "<script>location.replace('choose_book_next.php');</script>";



	
}

 
 ?>
 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">
<form action="#" method="post" enctype="multipart/form-data">







<div class="form-group">


<h2 align='center'>Add Booking</h2>

</div>

<div>



<div class="form-group">
    <label>Hotel</label>
    <select id="first" class="form-control" name="name">
	
	<option value="0">Select Hotel</option>
	
<?php

$sqll ="SELECT * FROM hotels GROUP BY name";
		$resultt = $conn->query($sqll);

 
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  ?>
	  
<option value="<?php echo $roww['name'];?>"><?php echo $roww['name'];?></option>
  <?php
  }
}
?>
    </select>
  </div>
  
  
  

<div class="form-group">
    <label>Country Name</label>
    <select class="form-control" id="country" name="country">
	
    </select>
  </div>
  
  
  <div class="form-group">
    <label>Address</label>
    <select class="form-control" id="location" name="location">
	
    </select>
  </div>
  
  
  

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


 
  </br>
   </br>
    </br>
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">NEXT</button>
  </div>
  
  </div>
</form>
 </br>
  </br>
   </br>

</main>





<script>


jQuery(document).ready(function($) {
	
	
	
    $("#first").on('change', function() {
		
	
		
	
	
		var	compy = $("#first").val();
	
	
	
	  $.ajax({
              type:'POST',
              url:'abbc.php',
              data:{'compy':compy},
              success:function(result){
                 
                  $('#country').html(result);
                 
              }
          }); 
	
	
	
	
	
	
	
	
	
	
	
	
	
		
})


$("#country").on('change', function() {
	
	var	compy = $("#first").val();
	var	compy1 = $("#country").val();
	
	
	  $.ajax({
              type:'POST',
              url:'abbcc.php',
              data:{'compy1':compy1, 'compy':compy},
              success:function(result){
                 
                  $('#location').html(result);
                 
              }
          }); 
		  
		  
		
	
})








})


</script>




