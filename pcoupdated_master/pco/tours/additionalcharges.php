<?php

require_once('db_connection.php');


include('header.php');



    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






$sqll ="SELECT * FROM basiccharges WHERE hotel='$hotel' && location='$city' && country='$country'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	 
    $bfadditional=$roww['breakfast'];
    $lnadditional=$roww['lunch'];
    $dinadditional=$roww['dinner'];
    $extraadditional=$roww['extrabed'];
    $childadditional=$roww['childbed'];
    $babyadditional=$roww['babycot'];
    
   
}

    
    
}
















if (isset($_POST['submit'])) {
    
    
    

$ab =$_POST['ab'];
$al =$_POST['al'];
$ad =$_POST['ad'];
$eb =$_POST['eb'];
$ecb =$_POST['ecb'];
$ebc =$_POST['ebc'];





















$sqll ="SELECT * FROM basiccharges WHERE hotel='$hotel' && location='$city' && country='$country'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
    
    
    $sql = "UPDATE basiccharges SET hotel='$hotel',country='$country',location='$city',breakfast='$ab',lunch='$al',dinner='$ad',extrabed='$eb', childbed='$ecb', babycot='$ebc' WHERE hotel='$hotel' && location='$city' && country='$country'";
    
    
    
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
		echo "<script>location.replace('additionalcharges.php');</script>";
	
	
}

    
    
    
    
    
    
    
    
}


else{
$sql = "INSERT INTO basiccharges (hotel,country,location,breakfast,lunch,dinner,extrabed, childbed, babycot)
           VALUES ('$hotel','$country','$city','$ab','$al','$ad','$eb','$ecb','$ebc')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
	echo "<script>location.replace('add_new_prices.php');</script>";
	
	
}

}
  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Supplementary Charges</h1>
<form action="#" method="post" enctype="multipart/form-data">



<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Additional Breakfast</label>
        <input class='form-control' required name='ab' value='<?php echo $bfadditional;?>' placeholder='Breakfast Price' >
        </div>
         </div>
        </div>

<br/>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Additional Lunch</label>
        <input class='form-control' required name='al' value='<?php echo $lnadditional;?>' placeholder='Lunch Price' >
        </div>
         </div>
        </div>

<br/>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Additional Dinner</label>
        <input class='form-control' required name='ad' value='<?php echo $dinadditional;?>' placeholder='Dinner Price' >
        </div>
         </div>
        </div>

<br/>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Extra Bed</label>
        <input class='form-control' required name='eb' value='<?php echo $extraadditional;?>' placeholder='Extra Bed Price' >
        </div>
         </div>
        </div>

<br/>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Extra Child Bed</label>
        <input class='form-control' required name='ecb' value='<?php echo $childadditional;?>' placeholder='Child Bed Price' >
        </div>
         </div>
        </div>

<br/>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Baby Cot</label>
        <input class='form-control' required name='ebc' value='<?php echo $babyadditional;?>' placeholder='Baby Cot Price' >
        </div>
         </div>
        </div>

<br/>


<br/>







<br/>
<br/>

   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      $.ajax({
              
			  type:'POST',
			  
              url:'getalertme.php',
              success:function(result){
                  
				
			    if(result.includes('exists')){
			     Swal.fire('Updated Successfully')
			    }
               
               
                 
              }
			  
          }); 
		  
</script>









</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

