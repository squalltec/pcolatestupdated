<?php
require_once('db_connection.php');


include('header.php');


    
 
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];


$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

$brand=$_SESSION['brands'];

$brandd=$brand[$counter];


	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);




if (isset($_POST['submit'])) {
    
    
$cancellationpolicy=mysqli_real_escape_string($conn, $_POST['cancellationpolicy']);




    $checker=$_POST['checkerdes'];
    
    if($checker=='on'){
        $_SESSION['cancellationpolicy']=$cancellationpolicy;
    }
    else{
        $_SESSION['cancellationpolicy']='';
    }
    










$sql = "UPDATE vehiclesInventorydatabase SET cancellationpolicy='$cancellationpolicy' WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$brandd' && model='$roomtype'";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('addinventory5.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('managevehicles.php');</script>";
    
}

	    
	
	
	
	
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
                <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
              <h1 align='center'>Inventory</h1>
              
              
<form action="#" method="post" enctype="multipart/form-data">


<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

<br/>




        <br/>


         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Cancellation Policy</label>
        <textarea class='form-control' required name='cancellationpolicy' placeholder='Cancellation Policy'><?php echo  $_SESSION['cancellationpolicy'];?></textarea>
         <label for='abc'>Same Policy for All Cars?</label>
        <input type='checkbox' name='checkerdes' id='abc'>
        
        </div>
         </div>
        </div>
        
        <br/>
        
            
        
        
        

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

