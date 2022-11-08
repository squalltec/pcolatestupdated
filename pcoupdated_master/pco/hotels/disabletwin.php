<?php

require_once('db_connection.php');


include('header.php');



    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






$sqll ="SELECT * FROM disabletwin WHERE hotel='$hotel' && location='$city' && country='$country'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	 
   $tw=$roww['twin'];
   
   $cble=$roww['convertible'];
   
   
   $disablefri=$roww['disablefriendly'];
    
   
}

    
    
}
















if (isset($_POST['submit'])) {
    
    
    

$twin =$_POST['ab'];
$convertible =$_POST['al'];
$disablefriendly =$_POST['ad'];





















$sqll ="SELECT * FROM disabletwin WHERE hotel='$hotel' && location='$city' && country='$country'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
    
    
    $sql = "UPDATE disabletwin SET hotel='$hotel',country='$country',location='$city',twin='$twin',convertible='$convertible',disablefriendly='$disablefriendly'WHERE hotel='$hotel' && location='$city' && country='$country'";
    
    
    
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
		echo "<script>location.replace('disabletwin.php');</script>";
	
	
}

    
    
    
    
    
    
    
    
}


else{
$sql = "INSERT INTO disabletwin (hotel,country,location,twin,convertible,disablefriendly)
           VALUES ('$hotel','$country','$city','$twin','$convertible','$disablefriendly')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
	echo "<script>location.replace('additionalcharges.php');</script>";
	
	
}

}
  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Twin Rooms</h1>
<form action="#" method="post" enctype="multipart/form-data">



<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
       
        <input class='form-control' required name='ab' value='<?php echo $tw;?>' placeholder='Twin Rooms' >
        </div>
         </div>
        </div>

<br/>
<h1 style='' align='center'>Convertible  <br/><small style="font-size:0.4em;">Maximum Number of Rooms convertible to Twin Rooms by Placing an Extra Bed</small></h1>


 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
        
        <input class='form-control' required name='al' value='<?php echo $cble;?>' placeholder='Convertible' >
        </div>
         </div>
        </div>

<br/>

<h1 style='' align='center'>Rooms for People with Determination</h1>
 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
        
        <input class='form-control' required name='ad' value='<?php echo $disablefri;?>' placeholder='Disable Friendly' >
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

