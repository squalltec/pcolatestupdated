<?php

session_start();
include 'db_connection.php';



$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());







function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



















$ipcountry= $xml->geoplugin_countryName ;


if($ipcountry=='United Arab Emirates')
{
$tax='20%';
}
else{
    $tax='';
}


$uniquenumber=rand(10,100000000);

$hotel= $_SESSION['hotel'];
$sendcategory= $_SESSION['sendcategory'];
$country= $_SESSION['country'];
$city= $_SESSION['city'];
$sdate= $_SESSION['sdate'];
$edate= $_SESSION['edate'];

$_SESSION['bookingnumber']=$uniquenumber;

$showpaisay=$_SESSION['showpaisay'];



$totaldays= $_SESSION['totaldays'];

      
   $title= $_SESSION['title'];
    $fname= $_SESSION['fname'];
     $lname= $_SESSION['lname'];
      $email= $_SESSION['email'];
      $phone=  $_SESSION['phone'];
        
       
           
            
       $alladults= $_SESSION['alladults'];
        $roomtypesall= $_SESSION['roomtypesall'];
         $totalamountt=$_SESSION['totalamount'];
     $allchildren= $_SESSION['allchildren'];
     


if($tax=='20%')
{
    
     
     $taxvalue=intval($totalamountt)/100*20;
   
     $totalamount=intval($totalamountt)+intval($taxvalue);
}
else{
    $totalamount=$totalamountt;
}
     
     
   
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/app.css">
    <title>FCO Connect</title>
</head>
<body>
    <div class = "main-holder summary-pg">
   
   
       <style>
.whatsappp {

  position: fixed;
  bottom: 10px;
   right: 0;
z-index:1;
  padding-right: 10px;
}
</style>
        
      <a href='https://wa.me/+971506509976'> <img src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a> 
        
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="index.php">
                  <img src="img/logo.png" />
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mx-auto mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                  </ul>

                  <div class = "navbar-contact-info">
                     <a href='tel:+971507142748'> <img src = "img/header-contact-img.png"></a>
                  </div>
              </div>
            </div>
          </nav>
    </header>
    
    <section class="page_title">
        <div class="container">
            <h1>My Booking Summary</h1>
        </div>
    </section>
    
    <section class="summary my-5">
        <div class="container">
          
            <div class = "summary-block summary-block-2 py-3">
                <div class = "summary-block-item mb-5">
                    <div class = "border-block">
                        <legend>Hotel Information</legend>
                        <div class = "summary-block-head">
                            <div class = "d-flex align-items-center flex-wrap">
                                <h3 class = "me-3 mb-0"><?php echo $hotel;?></h3>
                                <ul class = "mx-0 list-unstyled d-flex me-2 mb-0">
                                    <?php
                                    for($i=0;$i<intval($sendcategory);$i++)
                                    {
                                    ?>
                                    <li class = "me-1"><i class="bi bi-star-fill"></i></li>
                                   <?php
                                    }
                                    ?>
                                </ul>
                                <span class = 'text-danger'><?php echo $sendcategory;?> Star Hotel</span>
                            </div>
                            <div class = "small mt-2">
                                <span class = "me-1"><i class="bi bi-geo-alt"></i></span>
                                <span><?php echo $city;?>, <?php echo $country;?></span>
                            </div>
                        </div>

                        <div class = "summary-items">
                            
                            
                            
                            
                            
                            
                            <?php
                            $n=0;
                            foreach ($roomtypesall as $room)
                            {
                                $count=$n+1;
                            ?>
                            
                            
                            
                            
                            <div class = "summary-item p-4 position-relative mt-5">
                                <span class = "summary-pills position-absolute">Room #<?php echo $count; ?></span>
                                <div class = "row">
                                    <div class = "col-left col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Type</span>
                                                <span>: <?php echo $room;?></span>
                                            </li>
                                            <li>
                                                <span>Nights</span>
                                                <span>: <?php echo $totaldays;?></span>
                                            </li>
                                            <li>
                                                <span>Check In</span>
                                                <span>: <?php echo $sdate;?></span>
                                            </li>
                                            <li>
                                                <span>Check Out</span>
                                                <span>: <?php echo $edate;?></span>
                                            </li>
                                            <li>
                                                <span>Adults:</span>
                                                <span>: <?php echo $alladults[$n];?></span>
                                                &nbsp;
                                                 <span>Children:</span>
                                                 
                                                <span>: <?php echo $allchildren[$n];?></span>
                                            </li>
                                        </ul>
                                    </div> 

                                    <div class = "col-mid col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Full Name</span>
                                                <span>: <?php echo $title[$n].' ';?><?php echo $fname[$n].' ';?><?php echo $lname[$n];?></span>
                                            </li>
                                            <li>
                                                <span>Contact</span>
                                                <span>: <?php echo $phone[$n];?></span>
                                            </li>
                                            <li>
                                                <span>Email</span>
                                                <span>: <?php echo $email[$n];?></span>
                                            </li>
                                        </ul>
                                    </div>



                                    <div class = "col-right col-md-6 col-lg-2 d-flex align-items-center mt-2 mt-lg-0">
                                        <div class = "d-flex">
                                            
                                            
                                           AED <?php echo $showpaisay[$n];?>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <!--
                                            <a href = "#" class = "btn d-inline-flex justify-content-center align-items-center me-3">Modify</a>
                                            <a href = "#" class = "btn-sm-icon d-flex align-items-center justify-content-center text-white">
                                                <i class="bi bi-trash3"></i> 
                                            </a>
                                            -->
                                        </div>
                                    </div> 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>
                            
                            
                            
                        <?php
                        $n=$n+1;
                       }
                       ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>

                        <div class = "summary-block-foot">
                            <div class = "p-4 d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span class = "text-uppercase">AED <?php echo $totalamountt;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
               <!-- 
                
                <div class = "summary-block-item mb-5">
                    <div class = "border-block">
                        <legend>Transfer Information</legend>
                        <div class = "summary-items">
                            <div class = "summary-item p-4 position-relative mt-2">
                                <span class = "summary-pills position-absolute">Trip  #1</span>
                                <div class = "row">
                                    <div class = "col-left col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Pick Up</span>
                                                <span>: Abu Dhabi Airport</span>
                                            </li>
                                            <li>
                                                <span>Drop Off</span>
                                                <span>: Dubai Marina</span>
                                            </li>
                                            <li>
                                                <span>Total Pax</span>
                                                <span>: 1</span>
                                            </li>
                                            <li>
                                                <span>No of Vehicle</span>
                                                <span>: Single</span>
                                            </li>
                                            <li>
                                                <span>Trip Type</span>
                                                <span>: One Way</span>
                                            </li>
                                        </ul>
                                    </div> 

                                    <div class = "col-mid col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Arrival Date</span>
                                                <span>: 21 Sep, 2022</span>
                                            </li>
                                            <li>
                                                <span>No of Car(s)</span>
                                                <span>: 1</span>
                                            </li>
                                            <li>
                                                <span>Seating Capacity</span>
                                                <span>: 4 Seater</span>
                                            </li>
                                            <li>
                                                <span>Minimum Require</span>
                                                <span>: 3 Persons</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class = "col-right col-md-6 col-lg-2 d-flex align-items-center mt-2 mt-lg-0">
                                        <div class = "d-flex">
                                            <a href = "#" class = "btn d-inline-flex justify-content-center align-items-center me-3">Modify</a>
                                            <a href = "#" class = "btn-sm-icon d-flex align-items-center justify-content-center text-white">
                                                <i class="bi bi-trash3"></i> 
                                            </a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class = "summary-item p-4 position-relative mt-5">
                                <span class = "summary-pills position-absolute">Trip  #2</span>
                                <div class = "row">
                                    <div class = "col-left col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Type</span>
                                                <span>: Deluxe Room</span>
                                            </li>
                                            <li>
                                                <span>Nights</span>
                                                <span>: 5</span>
                                            </li>
                                            <li>
                                                <span>Check In</span>
                                                <span>: 14 Aug, 2022</span>
                                            </li>
                                            <li>
                                                <span>Check Out</span>
                                                <span>: 19 Aug, 2022</span>
                                            </li>
                                            <li>
                                                <span>Kids</span>
                                                <span>: 0</span>
                                            </li>
                                        </ul>
                                    </div> 

                                    <div class = "col-mid col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Full Name</span>
                                                <span>: Mr. John Doe</span>
                                            </li>
                                            <li>
                                                <span>Contact</span>
                                                <span>: +91 533874783</span>
                                            </li>
                                            <li>
                                                <span>Email</span>
                                                <span>: johndoe@gmail.com</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class = "col-right col-md-6 col-lg-2 d-flex align-items-center mt-2 mt-lg-0">
                                        <div class = "d-flex">
                                            <a href = "#" class = "btn d-inline-flex justify-content-center align-items-center me-3">Modify</a>
                                            <a href = "#" class = "btn-sm-icon d-flex align-items-center justify-content-center text-white">
                                                <i class="bi bi-trash3"></i> 
                                            </a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class = "summary-block-foot">
                            <div class = "p-4 d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span class = "text-uppercase">aed 500</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "summary-block-item">
                    <div class = "border-block">
                        <legend>Tours Information</legend>
                        <div class = "summary-items">
                            <div class = "summary-item p-4 position-relative mt-2">
                                <span class = "summary-pills position-absolute">Tour  #1</span>
                                <div class = "row">
                                    <div class = "col-left col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Tour</span>
                                                <span>: Atlantis - Aquaventure</span>
                                            </li>
                                            <li>
                                                <span>Category</span>
                                                <span>: Altantis Marina</span>
                                            </li>
                                            <li>
                                                <span>Pickup Point</span>
                                                <span>: Abjar Hotel</span>
                                            </li>
                                            <li>
                                                <span>Adults</span>
                                                <span>: 3</span>
                                            </li>
                                            <li>
                                                <span>Childern</span>
                                                <span>: 0</span>
                                            </li>
                                        </ul>
                                    </div> 

                                    <div class = "col-mid col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Arrival Date</span>
                                                <span>: 21 Sep, 2022</span>
                                            </li>
                                            <li>
                                                <span>No of Cars</span>
                                                <span>: 1</span>
                                            </li>
                                            <li>
                                                <span>Transfer Type</span>
                                                <span>: Private 5 Seater</span>
                                            </li>
                                            <li>
                                                <span>Guide</span>
                                                <span>: German</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class = "col-right col-md-6 col-lg-2 d-flex align-items-center mt-2 mt-lg-0">
                                        <div class = "d-flex">
                                            <a href = "#" class = "btn d-inline-flex justify-content-center align-items-center me-3">Modify</a>
                                            <a href = "#" class = "btn-sm-icon d-flex align-items-center justify-content-center text-white">
                                                <i class="bi bi-trash3"></i> 
                                            </a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class = "summary-item p-4 position-relative mt-5">
                                <span class = "summary-pills position-absolute">Trip  #2</span>
                                <div class = "row">
                                    <div class = "col-left col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Type</span>
                                                <span>: Deluxe Room</span>
                                            </li>
                                            <li>
                                                <span>Nights</span>
                                                <span>: 5</span>
                                            </li>
                                            <li>
                                                <span>Check In</span>
                                                <span>: 14 Aug, 2022</span>
                                            </li>
                                            <li>
                                                <span>Check Out</span>
                                                <span>: 19 Aug, 2022</span>
                                            </li>
                                            <li>
                                                <span>Kids</span>
                                                <span>: 0</span>
                                            </li>
                                        </ul>
                                    </div> 

                                    <div class = "col-mid col-md-6 col-lg-5 mb-3 mb-lg-0">
                                        <ul class = "list-unstyled mx-0 mb-0">
                                            <li>
                                                <span>Full Name</span>
                                                <span>: Mr. John Doe</span>
                                            </li>
                                            <li>
                                                <span>Contact</span>
                                                <span>: +91 533874783</span>
                                            </li>
                                            <li>
                                                <span>Email</span>
                                                <span>: johndoe@gmail.com</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class = "col-right col-md-6 col-lg-2 d-flex align-items-center mt-2 mt-lg-0">
                                        <div class = "d-flex">
                                            <a href = "#" class = "btn d-inline-flex justify-content-center align-items-center me-3">Modify</a>
                                            <a href = "#" class = "btn-sm-icon d-flex align-items-center justify-content-center text-white">
                                                <i class="bi bi-trash3"></i> 
                                            </a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class = "summary-block-foot">
                            <div class = "p-4 d-flex align-items-center justify-content-between">
                                <span>Total</span>
                                <span class = "text-uppercase">aed 500</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            -->

            <div class = "text-white d-flex align-items-center justify-content-between summary-block-3 px-4">
                <div class = "col-left">
                    <p class = "mb-0">Grand Total <span>(Inclusive of all taxes)<?php if($tax=='20%'){ echo ' (20%)';}?></span></p>
                </div>
                <div class = "col-right">
                    <p class = "mb-0">AED <?php echo $totalamount;?></p>
                </div>
            </div>
            <div class = "mt-5 d-flex justify-content-center">
                <a href = "invoice.php" class = "btn theme_btn btn-secondary active">Complete My Booking</a> 
            </div>
        </div>
    </section>

    
   
   
   
   
   
    <section class="footer">
        <div class="mainfooter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 px-0">
                        <div class="footer_col about">
                            <h2>About</h2>
                            <p>In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000’s. In those days, no one was using 100% web-based software or “cloud based” as we know it today.
                                PCO Connect not only survived the “dot com” burst of the early 2000s but steadily grew, Today, PCO Connect has serves over 100,000 customers and companies.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 px-0">
                        <div class="footer_col m-0">
                            <h2>Testinomials</h2>
                            <img src="img/quote.png" alt="">
                            <p>Excellent pre- and during-event results. Well-planned customer service solved all problems. I'd recommend the Services to any event organizer in Dubai or the Gulf Region. Thanks for attending.</p>
                            <hr/>
                            <ul class="footerslides owl-carousel">
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                              
                              <!--  <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 m-0 px-4">
                        <div class="footer_col info m-0">
                            <h2>Connect with us</h2>
                            <ul class="socialmedia">
                                <li>
                                    <a href="https://www.facebook.com/Pcoconnect/">
                                        <img src="img/social/facebook.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/Pcoconnect/?_l=en_US">
                                        <img src="img/social/linkedin.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/Pcoconnect/">
                                        <img src="img/social/twitter.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/Pcoconnect/">
                                        <img src="img/social/instagram.png" alt="">
                                    </a>
                                </li>
                            </ul>
                            <h6 class="address_title">Travel Synergies Tourism LLC</h6>
                            <ul class="addresses">
                                <li>
                                    Al Nassima Towers
                                </li>
                                <li>Sheikh Zayed Road
                                </li>
                                <li>Dubai, UAE</li>
                            </ul>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="quickLinks">
            <div class="container px-0">
                <nav class="nav">
                    <a class="nav-link active" aria-current="page" href="#">About us</a>
                    <a class="nav-link" href="#">Add your property</a>
                    <a class="nav-link" href="#">customer Service</a>
                    <a class="nav-link" href="#">FAQ</a>
                    <a class="nav-link" href="#">Careers</a>
                    <a class="nav-link" href="#">Terms & Conditions</a>
                    <a class="nav-link" href="#">Privacy and Cookies</a>
                </nav>
            </div>
        </div>
      <div class="copyright">
            <div class="container">
                <div class="copylayout">
                    <div class="copy_text">Copyright 2022 PCO Connect | Design and Developed By <img style='width:100px;' src='squlogo.png'></div>
                    <div class="copy_text">A Sub Division Of <img style='width:100px;' src='tslogo.png'></div>
                </div>
            </div>
        </div>
    </section>

   
   
   
   
   
   
   
   
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</body>
</html>