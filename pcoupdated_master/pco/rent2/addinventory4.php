<?php
require_once('db_connection.php');


include('header.php');


    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];

$singledouble=$_SESSION['singledouble'];
$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);






if($singledouble[$counter]=='on'){
	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('addinventory3.php');</script>";
	
}

else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	    $_SESSION['roomnamecount']=0;
	   echo "<script>location.replace('addinventory7.php');</script>";
    
}


}














if (isset($_POST['submit'])) {
    
    
    

$roomtypedes=mysqli_real_escape_string($conn, $_POST['desfacilitiess']);

$adults=$_POST['adults'];
$children=$_POST['children'];
$extrabedsallowed=$_POST['extrabedsallowed'];


$sql = "UPDATE hotelsInventorydatabase SET doubledescription='$roomtypedes', doubleadultoccupancy='$adults', doublechildoccupancy='$children', doubleextrabedsallowed='$extrabedsallowed' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('addinventory3.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	    $_SESSION['roomnamecount']=0;
	   echo "<script>location.replace('addinventory6.php');</script>";
    
}

	    
	
	
	
	
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
                <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
              <h1 align='center'>Double Room</h1>
             
<form action="#" method="post" enctype="multipart/form-data">


<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

<br/>
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Room Description</label>
        <textarea class='form-control' required name='desfacilitiess' placeholder='Description'><?php echo $_SESSION['dupdes'];?></textarea>
        </div>
         </div>
        </div>
        <br/>
        
        <h4 align='center'>Maximum Occupancy</h4>
         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Adults</label>
        <input type='number' min='0' class='form-control' required name='adults' placeholder='Adults'>
        </div>
          <div class="col-sm">
         <label>Children</label>
        <input type='number' min='0' class='form-control' required name='children' placeholder='Children'>
        </div>
         </div>
        </div>
        
<br/>
        
<div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Extra Beds Allowed</label>
         <input type='number' min='0' class='form-control' required name='extrabedsallowed' placeholder='Extra Beds Allowed'>
        </div>
         </div>
        </div>





<br/>
<br/>

   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>


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

