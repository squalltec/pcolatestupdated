<?php
require_once('db_connection.php');


include('header.php');


$country=$_SESSION['countryc'];
$city=$_SESSION['cityc'];
$hotel=$_SESSION['hotelc'];
$emailc=$_SESSION['emailc'];
$passwordc=$_SESSION['passwordc'];



if (isset($_POST['submit'])) {
	

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];	

$designation=$_POST['designation'];	



$desis=array();

$sqlla ="SELECT * FROM designationshotels";
$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
      
      array_push($desis,$rowwa['designations']);
      
      
  }
}


if (in_array($designation, $desis)) {
    
    
   	
 
}

else{
    	
$sql ="INSERT INTO designationshotels (designations) VALUES ('$designation')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



}
	


















ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$to = $email; 
$from = 'md@travelsynergies.com'; 
$fromName = 'PCO Connect'; 
$subject = "PCO Connect Credentials";
$em=$emailc;
$pas=$passwordc;
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to PCO Connect</title> 
    </head> 
    <body> 
    
    
    Dear Partner,<br/><br/>

 

Please find herewith your login details to our Events system “PCO Connect”<br/><br/>

 

Username: '.$em.'<br/>

Password: '.$pas.'<br/>
Access System: <a href="https://squalltec.com/pco_master/hotels/">Click Here</a><br/><br/>

 

Please be so kind as to enter all relevant information at your earliest possible convenience.<br/><br/>

 

We look forward to working very closely with you in the coming months and years.<br/><br/>

 

Thanks and best regards<br/>

Your PCO Connect Team
    
    
    
    
    
    
    
    
    
    
    </body> 
    </html>'; 
 

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$fromName.'<'.$from.'>' . "\r\n" .
"Reply-To: md@travelsynergies.com" . "\r\n" .
"X-Mailer: PHP/" . phpversion();


// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
   
   
       
      
}else{ 
   echo 'Email sending failed.'; 
}

  

















$sql ="INSERT INTO hotelscontactdatabase (hotel,country,city,fname,lname,email,designation) VALUES ('$hotel','$country','$city','$fname','$lname','$email','$designation')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  $_SESSION['alertme']='1';
  
   
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}









}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
    <form method="POST" enctype="multipart/form-data" action="#">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Register User</h2>

</div>
<div>
    
    <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
                
     <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name='fname' id='fname' required placeholder="First Name">
  </div>
    
    </div>
    
     <div class='col-sm'>
                
     <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name='lname' id='lname' required placeholder="Last Name">
  </div>
    
    </div>
    
    
    
    
    
    
        </div>
    </div>
    
    
    
    
    <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
                
     <div class="form-group">
    <label>Designation</label>
    <input list='abc' autocomplete="false" class='form-control' name='designation'>
   <datalist id='abc' style='display:none;'class='form-control'>
      <?php
         
					   $sqllas = "SELECT * FROM designationshotels";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    
      ?>
       
       <option><?php echo $row['designations'];?></option>
       <?php
}
?>

   </datalist>
  </div>
    
    </div>
  
    
    
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
      <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
  
  <div class="form-group">
    <label>Email</label>
    <input class="form-control" name='email' id='email' type='email' required value='<?php echo $_SESSION['emailc'];?>' placeholder="xxxxx@example.com">
  </div>
  
 
      </div>
    
    
     <div class='col-sm'>
  
  <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" name='phone' id='phone' required placeholder="+971xxxxxxxx">
  </div>
  
 
      </div>
    
        </div>
    </div>
  
   
   
   
   <div class='container'>
        <div class='row'>
            
            
            <div class='col-sm'>
  
  <div class="form-group">
    <label>Nationality</label>
    <input class="form-control" name='nationality' id='nationality' type='text'>
  </div>
  
 
      </div>
    
    
     <div class='col-sm'>
  
  <div class="form-group">
    <label>Birthday</label>
    <input type="date" class="form-control" name='birthday' id='birthday'>
  </div>
  
 
      </div>
    
        </div>
    </div>
    
    
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>


</main>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  
  
  
  
  
  
  
      $.ajax({
              
			  type:'POST',
			  
              url:'getalertme.php',
              success:function(result){
                  
				
			    if(result.includes('exists')){
			     Swal.fire('Created Successfully')
			    }
               
               
                 
              }
			  
          }); 
		  
</script>



















<script>
    $(document).ready(function() {
        
          $("#email").on('change', function() {
       var email= document.getElementById('email').value;
          
             $.ajax({
              type:'POST',
              url:'validateemailhotel.php',
              data:{'email':email},
             
              success:function(result){
                 
             if(result.includes('exists'))
             {
                Swal.fire({
  title: 'Error!',
  text: 'Email Already Exists!',
  icon: 'error',
  confirmButtonText: 'OK'
})
document.getElementById('email').value='';

             }
        
                 }
              
                
              }); 
              
       
          });	       
        
        
        
        
        
        
        
        

   $("#country").on('change', function() {
       

	var country= $("#country").val();

 $.ajax({
              type:'POST',
              url:'getcitiesforregister.php',
              data:{'country':country},
             
              success:function(result){
                 
                  $("#city").html(result);
              }
                
              });
   });

        });	
</script>














<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

