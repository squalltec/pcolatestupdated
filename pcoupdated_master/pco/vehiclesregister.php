<?php
require_once('db_connection.php');


include('header.php');



if (isset($_POST['submit'])) {
	
$country=$_POST['country'];
$city=$_POST['city'];
$name=$_POST['name'];

$email=$_POST['email'];
$password=$_POST['password'];	

$email2=$_POST['email'];




$_SESSION['countryc']=$_POST['country'];
$_SESSION['cityc']=$_POST['city'];
$_SESSION['hotelc']=$_POST['name'];
$_SESSION['emailc']=$_POST['email'];
$_SESSION['passwordc']=$_POST['password'];	











ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

$to = $email2; 
$from = 'md@travelsynergies.com'; 
$fromName = 'PCO Connect'; 
$subject = "PCO Connect Credentials";
$em=$email;
$pas=$password;
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

Access System: <a href="https://squalltec.com/pcoupdated_master/pco/vehicles/">Click Here</a><br/><br/>

 

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

  




















			
$sql ="INSERT INTO loginforvehicles (country, city,name,email,password) VALUES ('$country', '$city', '$name', '$email', '$password')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  echo "<script>location.replace('registervehiclesemp.php');</script>";
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






}


 
 ?>
 
 



<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
    <form method="POST" enctype="multipart/form-data" action="#">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Create Transport Company</h2>

</div>
<div>
    
    
    
    
    
  <div class="form-group">
    <label>Country</label>
    <select name='country' id='country' class="form-control">
        <option>Select Country</option>
        <?php
        
        
$sqll ="SELECT * FROM countries";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      echo '<option>'.$roww['country'].'</option>';
	  
  }
}
        
        
        ?>
        
        
        
        
        
        </select>
  </div>
    
    
    
  <div class="form-group">
    <label>City</label>
    <select id='city' name='city' class="form-control">
       
        
        </select>
  </div>
    
    
    
    
    
<div class="form-group">
    <label>Company Name</label>
    <input type="text" class="form-control" name='name' placeholder="Hotel Name">
  </div>

  
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name='email' id='email' type='email' required placeholder="xxxxx@example.com">
  </div>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
 
  
            <div class="form-group">
    <label>Password</label>
    <i style='font-size:1.2em; position:absolute; margin-top:40px;  margin-right:50px; right:0;' class="fa fa-eye" id="togglePassword"></i>
    <input type="password" class="form-control" id='password' name='password' required >
    
  </div>
  
  
  
  <script>
        const togglePassword = document.querySelector("#togglePassword");
        
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>


   
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Next</button>
  </div>
  
  </div>
</form>


</main>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        
          $("#email").on('change', function() {
       var email= document.getElementById('email').value;
          
             $.ajax({
              type:'POST',
              url:'validateemailvehicle.php',
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

