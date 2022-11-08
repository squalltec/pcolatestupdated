<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	


if (isset($_POST['submit'])) {
    
$event=$_POST['event'];



$sqll ="SELECT * FROM contracts WHERE hotel='$hotel' && country='$country' && city='$city' && event='$event'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
    
    


if(!empty($_FILES['contract']['name'])){
		
		
		mkdir("../Contracts/".$hotel."/".$event, 0755, true);	
	
		$filename2 = $_FILES['contract']['name'];
	  $destination2 = '../Contracts/'.$hotel.'/'.$event.'/'. $filename2;
	  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
	  $file2 = $_FILES['contract']['tmp_name'];

 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {

$sqlx ="UPDATE contracts SET contract='$filename2' WHERE hotel='$hotel' && country='$country' && city='$city' && event='$event'";

 $resultx = $conn->query($sqlx);


if ($resultx === TRUE) {
 // echo "Category created successfully";
 $_SESSION['alertme']=1;
} else {
  echo "Error: " . $sqlx . "<br>" . $conn->error;
}

			
		}

}


    
    
    
 
}


else{
	  
	







if(!empty($_FILES['contract']['name'])){
		
		
		mkdir("../Contracts/".$hotel."/".$event, 0755, true);	
	
		$filename2 = $_FILES['contract']['name'];
	  $destination2 = '../Contracts/'.$hotel.'/'.$event.'/'. $filename2;
	  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
	  $file2 = $_FILES['contract']['tmp_name'];

 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {

$sqlx ="INSERT INTO contracts (hotel,country,city,event, contract) VALUES ('$hotel', '$country', '$city','$event', '$filename2')";

 $resultx = $conn->query($sqlx);


if ($resultx === TRUE) {
 // echo "Category created successfully";
 $_SESSION['alertme']=1;
} else {
  echo "Error: " . $sqlx . "<br>" . $conn->error;
}

			
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
                    
                    $n=0;
                   
                    
$sqll ="SELECT * FROM contracts WHERE hotel='$hotel' && country='$country' && city='$city'";
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
                      
                      
                      
                        <div id="collapsea<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">         
                          
                          
                          
                            
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
             <label>Sent Contract</label><br/>
             <a href='../Contracts/<?php echo $hotel;?>/<?php echo $roww['event'];?>/<?php echo $roww['contract'];?>'>Download</a>
             </div>
             
             
              <div class="col-sm">
             <label>Approved Contract</label><br/>
             <?php
             if($roww['approvedcontract']!=''){
             ?>
              <a href='../Approved Contracts/<?php echo $hotel;?>/<?php echo $roww['event'];?>/<?php echo $roww['approvedcontract'];?>' download>Download</a>
              <?php
              }
              else{
                  echo 'Not Approved Yet';
              }
              ?>
             </div>
             
             
             
             
             
             
             
             
             </div>
             </div>
                          
                          
                          
                          
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
          </div><!--end row-->
         
     
     
     
     

     
     
     
     
     
     
    </div>


     <br/><br/><br/>
      <br/><br/><br/>
     
       
     <h3 align='center'>Add New Contract</h3>

<form action="#" method="post" enctype="multipart/form-data">

 <div class="container">
      <div class='row'>
        
         <div class="col-sm">
             <label>Event</label>
            <select class='form-control' name='event'>
                <option>Select Event</option>
                
                <?php
                
$sqll ="SELECT * FROM newevents";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      echo '<option>'.$roww['name'].'</option>';
	  
  }
}
                ?>
                
            </select>
             </div>
              </div>
             </div>
             <br/>
              <div class="container">
      <div class='row'>
        
         <div class="col-sm">
             <label>Upload Contract</label>
             <input type='file' accept="application/pdf" required class='form-control' name='contract'>
             </div>
             
             </div>
             </div>
     
     
     <br/>
     
     <input type='submit' name='submit' required class='btn btn-primary' style='float:right; margin-right:10px;'>
     
     
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



<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



    
var n=1;

function myFunction2() {
 var act = document.getElementById("aacctt2"); 
 
 var dv = document.createElement("div");

dv.setAttribute("class", "col-sm");

var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "restaurantsname[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Restaurant Name");


var yc2 = document.createElement("textarea");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "restaurantsdes[]");
yc2.setAttribute("placeholder", "Restaurant Description");



var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "cuisine[]");
yc3.setAttribute("type", "text");
yc3.setAttribute("placeholder", "Cuisine");



var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "fileres"+n);
yc4.setAttribute("type", "file");



dv.appendChild(yc);
dv.appendChild(yc3);
dv.appendChild(yc2);
dv.appendChild(yc4);


act.appendChild(dv);


 n=n+1;
 
}





</script>




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






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

