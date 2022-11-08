<?php
require_once('db_connection.php');


include('header.php');








if (isset($_POST['submit'])) {
    
$event=$_POST['event'];
$city=$_POST['city'];
$country=$_POST['country'];
$hotel=$_POST['hotel'];




if(!empty($_FILES['contract']['name'])){
		
		
		mkdir("Approved Contracts/".$hotel."/".$event, 0755, true);	
	
		$filename2 = $_FILES['contract']['name'];
	  $destination2 = 'Approved Contracts/'.$hotel.'/'.$event.'/'. $filename2;
	  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
	  $file2 = $_FILES['contract']['tmp_name'];

 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {

$sqlx ="UPDATE contracts SET approvedcontract='$filename2' WHERE hotel='$hotel' && country='$country' && city='$city' && event='$event'";

 $resultx = $conn->query($sqlx);


if ($resultx === TRUE) {
 // echo "Category created successfully";
} else {
  echo "Error: " . $sqlx . "<br>" . $conn->error;
}

			
		}

}


    
}




 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Manage Contracts</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Contracts</h5>
                    <div class="my-3 border-top"></div>
                    
                    <div class="accordion" id="accordionExample">
                    
                    
                        <?php
                    
                    $nn=0;
                   
                    
$sqllc ="SELECT * FROM hotelsdatabase";
		$resulttc = $conn->query($sqllc);

if ($resulttc->num_rows > 0) {
  // output data of each row
  while($rowwc = $resulttc->fetch_assoc()) {
	  
	?>
        
                    
                    
                      <div class="accordion-item">
                    
                   <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseaa<?php echo $nn;?>" aria-expanded="true" aria-controls="collapseaa<?php echo $nn;?>">
                           <label>Hotel:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $rowwc['name'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                        
                        
                        
                        
                       <div id="collapseaa<?php echo $nn;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">         
                              
                        
                    
                    
                    
                    
                    
                    
                    
                    <?php
                    
                    $n=0;
                  $ht= $rowwc['name'];
                   $cy=$rowwc['country'];
                   $ct=$rowwc['city'];
                    
$sqll ="SELECT * FROM contracts WHERE hotel='$ht' && country='$cy' && city='$ct'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	?>
             <form action="#" method="post" enctype="multipart/form-data">       
                    <input style='display:none;' name='iad' value='<?php echo $roww['id'];?>'>
                      <div class="accordion-item">
                          
                                   
                          
                   <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsea<?php echo $n;?>" aria-expanded="true" aria-controls="collapsea<?php echo $n;?>">
                           <label>EVENT:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $roww['event'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                      
                      
                      
                        <div id="collapsea<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                          <div class="accordion-body">         
                          
                          
                          
                            
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
             <label>Recieved Contract</label><br/>
             <a href='Contracts/<?php echo $ht;?>/<?php echo $roww['event'];?>/<?php echo $roww['contract'];?>'>Download</a>
             </div>
             
             
              <div class="col-sm">
             <label>Approved Contract</label><br/>
             <?php
             if($roww['approvedcontract']!=''){
             ?>
              <a href='Approved Contracts/<?php echo $ht;?>/<?php echo $roww['event'];?>/<?php echo $roww['approvedcontract'];?>' download>Download</a>
              <?php
              }
              else{
                  echo 'Not Approved Yet';
              }
              ?>
             </div>
             
             
             
              <div class="col-sm">
                    <label>Update Approved Contract</label>
             <input type='file' accept="application/pdf" required class='form-control' name='contract'>
             
              <input type='text' style="display:none;" class='form-control' value='<?php echo $ht ;?>' name='hotel'>
              <input type='text' style="display:none;" class='form-control' value='<?php echo $cy ;?>' name='country'>
              <input type='text' style="display:none;" class='form-control' value='<?php echo $ct ;?>' name='city'>
              <input type='text' style="display:none;" class='form-control' value='<?php echo $roww['event'];?>' name='event'>
                  </div>
             
             
             
             
             </div>
             </div>
                          
                        <br/>  
                        <input style='float:right;' type='submit' class='btn btn-primary' name='submit'>
                        <br/>  
                          
                      </div>
                        
                      
                      
                      
                      
                      
                      
                </div>

                </div>
              
                
                </form>
                
                <?php
                $n=$n+1;
  }
  }
  ?>




</div>
</div>
</div>

<?php
 $nn=$nn+1;
}
}
?>







              </div>
          </div><!--end row-->
         
     
     
     
     

     
     
     
     
     
     
    </div>


   
     
     <br/>
     <br/>


  </div>

</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>









<br/>
<br/>
<br/>
<br/>




</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

