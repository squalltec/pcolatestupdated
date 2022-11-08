<?php
require_once('db_connection.php');
use PHPMailer\PHPMailer\PHPMailer;
require "./phpmailer/autoload.php";



include('header.php');



if (isset($_POST['submit'])) {
	
$country=$_POST['country'];
$city=$_POST['city'];
$name=$_POST['name'];


$email=$_POST['email'];
$password=$_POST['password'];	
$email22=$_POST['email2'];









foreach($email22 as $email2)
{











// Login credentials
$server_smtp = "smtp.hostinger.com";
$server_imap = "imap.hostinger.com";
$email_account = "info@travelsynergies.com";
$email_password = "Shaktimaan@29";

// Recipient
$recipient = $email2;
$em=$email;
$pas=$password;
// Stop making changes below this line


$mail = new PHPMailer;
$mail->isSMTP();
//$mail->SMTPDebug = 2;

$mail->Host = $server_smtp;
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Username = $email_account;
$mail->Password = $email_password;

$mail->setFrom($email_account, "");
$mail->addReplyTo($email_account, "");
$mail->addAddress($recipient, "");
$mail->Subject = "PCO Connect Credentials";
$mail->msgHTML('
<html> 
    <head> 
        <title>Welcome to PCO Connect</title> 
    </head> 
    <body> 
    
    
    Dear Partner,<br/><br/>

 

Please find herewith your login details to our Events system <b>PCO Connect</b><br/><br/>

 

Username: '.$em.'<br/>

Password: '.$pas.'<br/>

Access System: <a href="https://squalltec.com/pcoupdated_master/pco/vehicles/">Click Here</a><br/><br/>

 

Please be so kind as to enter all relevant information at your earliest possible convenience.<br/><br/>

 

We look forward to working very closely with you in the coming months and years.<br/><br/>

 

Thanks and best regards<br/>

Your PCO Connect Team
    
    
    
    
    
    
    </body> 
    </html>

');

if (!$mail->send()) {

} else {

}








}




















//$_SESSION['countryc']=$_POST['country'];
//$_SESSION['cityc']=$_POST['city'];
//$_SESSION['hotelc']=$_POST['name'];
//$_SESSION['emailc']=$_POST['email'];
//$_SESSION['passwordc']=$_POST['password'];	











			
$sql ="INSERT INTO loginforvehicles (country, city,name,email,password) VALUES ('$country', '$city', '$name', '$email', '$password')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  
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


<h2 style='margin-top:-50px;' align='center'>Create Transport Company</h2>
<br/><br/>

</div>
<div>
    
    
  <div class='container'>
      <div class='row'>
         
          
          
          <div class='col-sm'>
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
    
          
          
          </div> 
          
       <div class='col-sm'>
           <div class="form-group">
    <label>City</label>
    <select id='city' name='city' class="form-control">
       
        
        </select>
  </div>
      
           
           
       </div>   
          
          
        
         <div class='col-sm'>
              
              <div class="form-group">
    <label>Company Name</label>
    <input type="text" list='listhotels' class="form-control" name='name' id='name' placeholder="Company Name">
    
    <datalist id='listhotels' style='display:none;'>
       
    </datalist>
    
    
    
    
  </div> 
          </div>
            
          
     
          
            
      </div>
  </div>  
    
    
    
    
    
    
    
    
    
   
  
  
    
    
    
  
  
  

  <div class='container'>
      <div class='row'>
          <div class='col-sm'>
                <div class="form-group">
    <label>Send Access To</label>
    
     <input type="text" list='contactlist' class="form-control" name='contactto' id='contactto' placeholder="Contact Person">
    
    
    
    
    
    
    
    <datalist style='display:none;' name='contactlist' id='contactlist' class="form-control">
        
       
        
        </datalist>
    
    
    
    
    
  </div>
          </div>
          
          
          
          
          
          
      <div class='col-sm'>
                <div class="form-group">
    <label>Designation</label>
    
     <input type="text" class="form-control" name='designtaion' id='designation' placeholder="Designation">
    
    
    
    
    
  </div>
          </div>
          
               
          
          
      
           <div class='col-sm'>
                <div class="form-group">
    <label>Contact Email</label>
    <input type="text" class="form-control" name='email2[]' id='email2' type='email' required placeholder="xxxxx@example.com">
  </div>
          </div>    
          
          
          
          <nonsense id='populateme'>
        
    </nonsense>
    
    
    
    
    
<h1 style='display:none;' align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">Add More</button></h1> 
      
          
          
          
          
          
          
          
          
          
          
          
          
          </div>
          </div>
    
    

    
    
    
    
<br/>
  <div class='container'>
      <div class='row'>
          <h3 align='center'>System Credentials</h3>
          <div class='col-sm'>
                <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name='email' id='email' type='email' required placeholder="xxxxx@example.com">
  </div>
          </div>
          
          <div class='col-sm'>
              
              <div class="form-group">
    <label>Password</label>
    <i style='font-size:1.2em; position:absolute; margin-top:40px;  margin-right:50px; right:0;' class="fa fa-eye" id="togglePassword"></i>
    <input type="password" class="form-control" id='password' name='password' required >
    
  </div>
              </div>
          
          
      </div>
  </div>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  
  
  
   
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>


</main>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});
</script>




<script>

var a=0;
    function myFunction2()
{
    
   
    var populateme = document.getElementById("populateme");   
    
    var div1=document.createElement('div');
    div1.setAttribute('class','container');
    
    var div2=document.createElement('div');
    div2.setAttribute('class','row');
    
    
    
    
    
    
    
    
    
    
    
    
    var div3=document.createElement('div');
    div3.setAttribute('class','col-sm');
   
    
    var div5=document.createElement('div');
    div5.setAttribute('class','form-group');
    
    
    
    
    var inp1=document.createElement('INPUT');
    inp1.setAttribute('class','form-control');
    inp1.setAttribute('name','contactto[]');
    inp1.setAttribute('placeholder','Contact Person');
    inp1.setAttribute('list','contactlist');
    inp1.setAttribute('data-id',a);
    inp1.setAttribute('onchange','dep(this)');
   
    
    
    div5.appendChild(inp1);
   
    
    
    
   
    
    
     
    var div4=document.createElement('div');
    div4.setAttribute('class','col-sm');
     div4.setAttribute('id',a);
    
    var div6=document.createElement('div');
    div6.setAttribute('class','form-group');
    
  
   var inp2=document.createElement('INPUT');
    inp2.setAttribute('class','form-control');
    inp2.setAttribute('placeholder','Designation');
    inp2.setAttribute('readonly','true');
    inp2.setAttribute('id','d'+a);
   
  div6.appendChild(inp2);
  
  
  
  
   div3.appendChild(div5);
   div4.appendChild(div6);
   
   
   
   
   
   
   
   
     var div44=document.createElement('div');
    div44.setAttribute('class','col-sm');
     
    
    var div66=document.createElement('div');
    div66.setAttribute('class','form-group');
    
   
    var inp22=document.createElement('INPUT');
    inp22.setAttribute('class','form-control');
    inp22.setAttribute('name','email2[]');
    inp22.setAttribute('id','e'+a);
    inp22.setAttribute('placeholder','Contact Email');
   
  div66.appendChild(inp22);
  
  
   
   
   
   
   
   div44.appendChild(div66);
   
   
   
   
   
   
   
   
   
   
   div2.appendChild(div3);
   div2.appendChild(div4);
   div2.appendChild(div44);
   
   
   div1.appendChild(div2);
   populateme.appendChild(div1);
   
   
   
   
    
    a=a+1;
}

</script>



















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











<script>
    $(document).ready(function() {
        
          $("#email").on('change', function() {
       var email= document.getElementById('email').value;
          
             $.ajax({
              type:'POST',
              url:'validateemailtp.php',
              data:{'email':email},
             
              success:function(result){
                 
             if(result.includes('exists'))
             {
                 
                 /*
                Swal.fire({
  title: 'Error!',
  text: 'Email Already Exists!',
  icon: 'error',
  confirmButtonText: 'OK'
})
document.getElementById('email').value='';
*/
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



<script>



   $("#city").on('change', function() {
       

	var country= $("#country").val();
		var city= $("#city").val();
listhotels=document.getElementById('listhotels');
listhotels.innerHTML='';

 $.ajax({
              type:'POST',
              url:'gettransportsbycityfromcontacts.php',
              data:{'country':country,'city':city},
             
              success:function(result){
                
                listhotels.innerHTML=result; 
                
              }
                
              });
   });





function dep($this){
    
    var aid=$this.getAttribute('data-id');
    var val=$this.value;
    
	var name= $("#name").val();
	var country= $("#country").val();
	var city= $("#city").val();
	var fullname= val;
	
	var email= document.getElementById('e'+aid);

	var designation= document.getElementById('d'+aid);
		
		email.value='';



$.ajax({
              type:'POST',
              url:'getemailofcontact2.php',
              data:{'fullname':fullname,'name':name,'country':country,'city':city},
             
              success:function(result){
                  
                  email.value=result;
                  
                  
              }
              
});



$.ajax({
              type:'POST',
              url:'getdesignationofcontact2.php',
              data:{'fullname':fullname,'name':name,'country':country,'city':city},
             
              success:function(result){
                  
                  designation.value=result;
                  
              }
              
});




    
    
    
    
    
    
    
    
    
    
    
    
}



















   $("#contactto").on('change', function() {
       

	var name= $("#name").val();
	var country= $("#country").val();
	var city= $("#city").val();
	var fullname= $("#contactto").val();
	var email= document.getElementById('email');
	var email2= document.getElementById('email2');
	var designation= document.getElementById('designation');
		
		email.value='';



$.ajax({
              type:'POST',
              url:'getemailofcontact2.php',
              data:{'fullname':fullname,'name':name,'country':country,'city':city},
             
              success:function(result){
                  
                  email.value=result;
                  email2.value=result;
                  
              }
              
});



$.ajax({
              type:'POST',
              url:'getdesignationofcontact2.php',
              data:{'fullname':fullname,'name':name,'country':country,'city':city},
             
              success:function(result){
                  
                  designation.value=result;
                  
              }
              
});










});









     $("#name").on('change', function() {
       

	var name= $("#name").val();
		var country= $("#country").val();
			var city= $("#city").val();

 $.ajax({
              type:'POST',
              url:'validatetransportregistered.php',
              data:{'name':name,'country':country,'city':city},
             
              success:function(result){
                 
                    if(result.includes('exists'))
             {
                Swal.fire({
  title: 'Error!',
  text: 'This Company is Already Registered in this Country and City!',
  icon: 'error',
  confirmButtonText: 'OK'
})
document.getElementById('name').value='';

             }
             else{
                 
                 
                 
              contactlist.innerHTML='';     
                 
                $.ajax({
              type:'POST',
              url:'getcontactslist2.php',
              data:{'name':name,'country':country,'city':city},
             
              success:function(result){
                  
                 var contactlist  = document.getElementById('contactlist');
                            
                    
                    
                    
                    contactlist.innerHTML=result;
                    
                    
                  
                  
                  
              }
                });
                 
                 
                 
                 
                 
                 
                 
                 
     
                 
                 
                 
                 
                 
                 
             }
              }
                
              });
   });
</script>










<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

