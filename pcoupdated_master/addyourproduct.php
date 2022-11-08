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
    <title>PCO Connect || Privacy Policy</title>
</head>
<body>
    <div class = "main-holder retrieve-pg"  >
  
    <section class="retrieve my-5 py-1">
        <div class="container col-md-8" style=" padding: 20px; padding-bottom: 74px; border-radius: 12px; ">
            <div class="container text-center" >
                <h1 >Privacy Policy</h1>
                <h4>Welcome to PCO Connect!</h4>
            </div>

            <p>PCO CONNECT respects each individual’s right to personal privacy. We will collect and use information through our Web site only in the ways disclosed in this statement. </p>

              <p>This statement applies solely to information collected at Travel Synergies Website.</p>

              <p><span style="color:#ce3435 !important;">Part I</span> Information Collection. PCO CONNECT collects information through our Web site at several points. We collect the following information about primary visitors: Name, address, email, phone, and company name when a reservation is made with us.</p>

              <p>Hotel Reservations do not actively market to children, and we never knowingly ask a child under 13 to divulge personal information.</p>
              We employ cookies. A cookie is a small text file that our Web server places on a user’s computer hard drive to be a unique identifier. Cookies enable Travel Synergies to track usage patterns and deliver customized content to users. Our cookies do not collect personally identifiable information.

              <p><span style="color:#ce3435 !important;">Part II</span> Information Usage. The personal information that we gather is used solely for identification and reservation purposes and for managing online accounts. Hotel Reservations do not sell or otherwise exploit personal information. Hotel Reservations may gather generic and non-identifying information for marketing purposes for use by Travel Synergies and, in some</p>
              instances, by our affiliates. Information about your activity on the site may be automatically collected when you log in and is used for the sole purpose of improving the Travel Synergies Website.

              <p>We offer links to other Web sites. Please note: When you click on links to other Web sites, we encourage you to read their privacy policies. Their standards may differ from ours. If our policy on information collection or uses changes, we will advise you by updating this policy on our web site.</p>

              <p><span style="color:#ce3435 !important;">Part III</span> Access to Information. Travel Synergies strives to maintain the accuracy of our information. Users may access their own personal information and contact us about inaccuracies they may find by contacting us at the email address below. Users may also delete their information from our database by contacting us at the same address. In both cases, please contact us using the email address we have on file for you.</p>

              <p><span style="color:#ce3435 !important;">Part IV</span> Problem Resolution. If problems arise; users may contact Travel Synergies through the email address below. We are committed to resolving disputes within one week.</p>

              <p><span style="color:#ce3435 !important;">Part V</span> Data Storage and Security. Travel Synergies protects user information with the following security measures: we utilize the best encryption software in the industry to provide the highest level of protection for all transmitted personal and financial data. Travel Synergies protects your personal information by using the most sophisticated encryption software on the market.</p>
              <p>Through the encryption process, the information that you enter is converted into bits of code, thereby enabling your information to be securely transmitted over the Internet. Once we receive your information, it is returned to its original form and stored in our database. In-house, state-of-the- art servers ensure complete control over all systems.</p>

              <p>If you have any further questions about privacy or security, please contact us by sending an email to: <span style="color:#ce3435 !important;">office@travelsynergies.com</span>.</p>

            
           
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