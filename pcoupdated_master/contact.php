<?php

session_start();
include 'db_connection.php';

include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/app.css">
    <title>PCO Connect || Contact</title>
</head>
<body>
    <div class = "main-holder retrieve-pg" style="background: url(../img/webp/newbgpic.webp);
    background-size: cover; min-height:600px;" >
  

    
    
    <section class="retrieve my-5 py-2">
        <div class="container col-md-8" style="color:white; padding: 20px; padding-bottom: 74px; border-radius: 12px; margin-top:3%;">
            <div class="container text-center" >
                <h1 style="color:white;">Contact Us</h1>
            </div>
            <p>
            Contact our data protection officer at <span style="color:#ce3435 !important;">office@travelsynergies.com</span> if you have inquiries, requests, or concerns about how we handle your personal data, or if you would like to make use of any of your rights under this Privacy Statement. We address privacy specific questions, requests and concerns that are reported to us using internal policies and procedures based on applicable privacy laws, regulations and guidance. We revisit and enhance these policies and procedures regularly, also taking into account Business Partner feedback.
            </p>
           
        </div>
    </section>
   
 






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>







<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function abc()
{
    var ema=document.getElementById('ema').value;
    var retrieve=document.getElementById('retrieve').value;




if(ema=='' && retrieve=='')
{
   Swal.fire({
  icon: 'error',
  title: 'Please Enter Details...',
  text: 'Please provied details!'
}) 
}

else if(ema=='' && retrieve!='')
{
   Swal.fire({
  icon: 'error',
  title: 'Please Enter Email...',
  text: 'Please provied Email!'
}) 
}

else if(ema!='' && retrieve=='')
{
   Swal.fire({
  icon: 'error',
  title: 'Please Enter Booking Number...',
  text: 'Please provied booking number!'
}) 
}
else{

//alert(ema);
//alert(retrieve);

  $.ajax({
              type:'POST',
              url:'rta.php',
              data:{'ema':ema,'retrieve':retrieve},
             
              success:function(result){
                 
                 
                
            if(result.includes('no'))
             {
 

    Swal.fire({
  icon: 'error',
  title: 'Wrong Details Entered...',
  text: 'Please provied correct details!'
})
document.getElementById('ema').value='';
document.getElementById('retrieve').value='';

             }
             
             
             
             
             
                   
            if(result.includes('yes'))
             {
 
window.location.replace('invoice2.php');

             }
             
             
             
             
             
             
        
                 }
              
                
              }); 

}

}













</script>


















    </div>
  
<?php
include 'footer.php';
?>
</body>
</html>