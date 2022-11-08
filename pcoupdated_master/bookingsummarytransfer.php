<?php

session_start();

include 'db_connection.php';



 


$triptype=$_SESSION['triptype'];

 $uniquenumber=rand(10,100000000);
$_SESSION['uniqueidq']=$uniquenumber;
    


if (isset($_POST['submit'])) {
    
    
    

    
   $_SESSION['title2']= $_POST['title'];
   $_SESSION['fname2']= $_POST['fname'];
   $_SESSION['lname2']= $_POST['lname'];
   $_SESSION['email2']= $_POST['email'];
   $_SESSION['phone2']= $_POST['phone'];
   $_SESSION['nationality2']= $_POST['nationality'];
   $_SESSION['remarks2']= $_POST['remarks'];
   
   
   
   

if($triptype=='round')
{
  
  $_SESSION['airline1']= $_POST['airline1'];  
  $_SESSION['flightnumber1']= $_POST['flightnumber1'];  
  $_SESSION['time1']= $_POST['time1'];  
  
  $_SESSION['airline2']= $_POST['airline2']; 
  $_SESSION['flightnumber2']= $_POST['flightnumber2'];  
  $_SESSION['time2']= $_POST['time2'];  
    
}
   
 if($triptype=='From Airport to Hotel')
{
  
  $_SESSION['airline1']= $_POST['airline1'];  
  $_SESSION['flightnumber1']= $_POST['flightnumber1'];  
  $_SESSION['time1']= $_POST['time1'];  
  
  
 
}
     
   
   
   if($triptype=='Hotel to Airport')
{
  
  $_SESSION['airline2']= $_POST['airline2']; 
  $_SESSION['flightnumber2']= $_POST['flightnumber2'];  
  $_SESSION['time2']= $_POST['time2'];  
    
}
   
   
   
   
   
   
   
   if($_SESSION['fromhotel']=='1')
   
   {
        echo "<script>location.replace('transferandhotelinvoice.php');</script>"; 
   }
   else{
       echo "<script>location.replace('transferinvoice.php');</script>";  
       
   }
   
 
  
   
   
   
   
  
    
}












if($triptype=='round')
{
    
    
    
    
   
 $country=$_SESSION['country'];
 $city=$_SESSION['city'];
 $pax=$_SESSION['pax'];
 $arrivaldate=$_SESSION['arrivaldate'];
 $departuredate=$_SESSION['departuredate'];
 $fromlocation1=$_SESSION['fromlocation1'];
 $tolocation1=$_SESSION['tolocation1'];
 $fromlocation2=$_SESSION['fromlocation2'];
 $tolocation2=$_SESSION['tolocation2'];
 $type1=$_SESSION['type1'];
 $type2=$_SESSION['type2'];
 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$arrivalcar= $_SESSION['carida'];
$arrivalcarsneeded= $_SESSION['carsneededa'];
$departurecar= $_SESSION['caridd'];
$departurecarsneeded= $_SESSION['carsneededd'];
$arrivalprice= $_SESSION['pricearrival'];
$departureprice= $_SESSION['pricedeparture'];

$car1= $_SESSION['car1'];
$car2= $_SESSION['car2'];

$total=intval($arrivalprice)+intval($departureprice);




}


if($triptype=='From Airport to Hotel')
{
    
    
    
    
 $country=$_SESSION['country'];
 $city=$_SESSION['city'];
 $pax=$_SESSION['pax'];
 $arrivaldate=$_SESSION['arrivaldate'];
 
 $fromlocation1=$_SESSION['fromlocation1'];
 $tolocation1=$_SESSION['tolocation1'];

 $type1=$_SESSION['type1'];
 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$arrivalcar= $_SESSION['carida'];
$arrivalcarsneeded= $_SESSION['carsneededa'];
$arrivalprice= $_SESSION['pricearrival'];
$departurecarsneeded=0;

$total=intval($arrivalprice);

$car1= $_SESSION['car1'];


}

if($triptype=='From Hotel to Airport')
{
    
    
    
    

 $country=$_SESSION['country'];
 $city=$_SESSION['city'];
 $pax=$_SESSION['pax'];
 
 $departuredate=$_SESSION['departuredate'];

 $fromlocation2=$_SESSION['fromlocation2'];
 $tolocation2=$_SESSION['tolocation2'];

 $type2=$_SESSION['type2'];
    
    
    
    
    
    
    
    
    
$arrivalcar= $_SESSION['caridd'];
$arrivalcarsneeded= $_SESSION['carsneededd'];
$departureprice= $_SESSION['pricedeparture'];
$arrivalcarsneeded=0;

$total=intval($departureprice);

$car2= $_SESSION['car2'];
}


include 'headernew.php';

     
   
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
    
    
    
    
    
    
    


<style>
    /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
}
</style>


<!--
<div style='' class="se-pre-con"> <center><img style='width:150px; margin-top:300px;' src='hotelloader.gif'></center> </div>
-->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


    
    
    
    
    
    
    <title>PCO Connect</title>
</head>
<body>
    <div class = "main-holder smry-pg">
   
   <style>
       
.arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}

.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}

.up {
  transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
}

.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}
</style>
   
       <style>
.whatsappp {

   position: fixed;
  bottom: 30px;
   right: 0;
z-index:1;
  margin-right: 30px;
}
</style>
        
    <!--  <a href='https://wa.me/+971506509976'> <img src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a> -->
        
  
    <section class="page_title">
        <div class="container">
            <h1>Booking Summary</h1>
        </div>
    </section>
    
    <main>
        <form class='notranslate' action='#' method='POST'>
        <section class="smry my-5 py-3">
            <div class="container">
                <!-- main guest block -->
                <div class = "smry-main-block-1 smry-main-block">
                    <!--<div class = "smry-main-block-head mx-1">
                        <span>Guest # 1</span>
                    </div>-->
                    <div class = "smry-row row">
                        <div class = "col-xxl-3 px-2 order-1 order-xxl-0">
                            <!-- booking total -->
                            <div class = "row mx-0 align-items-stretch mt-5 mt-xxl-0">
                                <div class = "col-12 px-0">
                                    <div class = "smry-block-2 smry-block">
                                        <div class = "smry-block-head">
                                            <h6>Total Booking Price</h6>
                                        </div>
                                        <div class = "smry-block-content">
                                            <ul class = "list-unstyled mx-0 mb-0">
                                                 
                                                 <?php if($triptype=='round')
                                                 {
                                                 ?>
                                                
                                                 <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                     <span>Arrival:</span> <span>AED <?php echo $arrivalprice;?></span> 
                                               </li>
                                               
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                      <span>Departure:</span> <span>AED <?php echo $departureprice;?></span> 
                                               </li>
                                                
                                               <?php
                                               }
                                               ?>
                                                
                                                
                                                
                                                 <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?>
                                                
                                                 <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                     <span>Arrival:</span> <span>AED <?php echo $arrivalprice;?></span> 
                                               </li>
                                               
                                              
                                                
                                               <?php
                                               }
                                               ?>  
                                                
                                                
                                                   <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?>
                                                
                                                
                                               
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                      <span>Departure:</span> <span>AED <?php echo $departureprice;?></span> 
                                               </li>
                                                
                                               <?php
                                               }
                                               ?>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                    <span>Total<br/><small>VAT (5%)</small></span>
                                                    <span>AED <nonsense id='totale'><?php echo $total;?></nonsense><br/>AED <nonsense id='vatc'><?php echo $total/100*5;?></nonsense></span>
                                                </li>
                                                  
                                             
                                             
                                             
                                       
                                             
                                             
                                            
                                            </ul>
                                        </div>
                                        <div class = "smry-block-foot">
                                            <div class = "d-flex align-items-center justify-content-between w-100">
                                                <p class = "mb-0">Grand Total <span class = "d-block">(Inclusive of 5% VAT)</span></p>
                                                <span>AED <nonsense id='gt'><?php echo $total+($total/100*5);?></nonsense></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of booking total -->
                        </div>
        
                        <div class = "col-xxl-9 px-2">
                            <div class = "smry-block-3 smry-block mb-5">
                                <div class = "smry-block-head row mx-0 align-items-center justify-content-between">
                                    <div class = "col-6 px-0">
                                        <h6>Transfer Booking</h6>
                                    </div>
                                    <div class = "col-6 px-0 d-flex justify-content-end">
                                       <!-- <div class = "smry-block-head-btns">
                                            <a href = "#" class = "btn-text d-inline-block me-2">Modify</a>
                                            <a href = "#" class = "btn-icon d-inline-flex align-items-center justify-content-center"><i class="bi bi-trash"></i></a>
                                        </div>-->
                                    </div>
                                </div>
                                <div class = "smry-block-content smry-block-scrollable">
                                    <div class = "smry-block-scrollable-wrapper">
                                      
            
            
            
            
            <!-- ROOMS -->
            
            
                            
            
                                        <div class = "smry-block-item position-relative mb-5">
                                            <div class = "row">
                                                
                                                
                                                
                                                <div class = "smry-info col-12 my-3">
                                                    <div class = "smry-info-head">
                                                        <h6 class = "mb-0">Booking Information</h6>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Title</label>
                                                                
                                           <select id='title' name='title' class='form-select'>
                                               <?php
                                               if($_SESSION['title[0]']=='Mr.')
                                               {
                                                  echo '<option selected>Mr.</option>';
                                               }
                                               else{
                                                    echo '<option>Mr.</option>';
                                               }
                                               ?>
                                               
                                               
                                                 <?php
                                               if($_SESSION['title[0]']=='Mrs.')
                                               {
                                                  echo '<option selected>Mrs.</option>';
                                               }
                                               else{
                                                    echo '<option>Mrs.</option>';
                                               }
                                               ?>
                                                <?php
                                               if($_SESSION['title[0]']=='Miss.')
                                               {
                                                  echo '<option selected>Miss.</option>';
                                               }
                                               else{
                                                    echo '<option>Miss.</option>';
                                               }
                                               ?>
                                                <?php
                                               if($_SESSION['title[0]']=='Dr.')
                                               {
                                                  echo '<option selected>Dr.</option>';
                                               }
                                               else{
                                                    echo '<option>Dr.</option>';
                                               }
                                               ?>
                                               
                                                <?php
                                               if($_SESSION['title[0]']=='Prof.')
                                               {
                                                  echo '<option selected>Prof.</option>';
                                               }
                                               else{
                                                    echo '<option>Prof.</option>';
                                               }
                                               ?>
                                           </select>                     
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                          <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">First Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='fname' value = "<?php echo $_SESSION['fname'][0];?>">
                                                            </div>
                                                        </div>
                                                          <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Last Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='lname' value = "<?php echo $_SESSION['lname'][0];?>">
                                                            </div>
                                                        </div>
                                                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Phone</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='phone' value = "<?php echo $_SESSION['phone'][0];?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Email</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='email' value = "<?php echo $_SESSION['email'][0];?>">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Nationality</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='nationality' value = "<?php echo $_SESSION['nationality'][0];?>">
                                                            </div>
                                                        </div>
                                                        
                                                        
                         <?php
                         if ($triptype=='round' || $triptype=='From Airport to Hotel')
                            {
                                
                            ?>             
                            <h6 align='center'>Arrival Details</h6>
                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Airline Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='airline1'>
                                                            </div>
                                                        </div>
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Flight Number</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='flightnumber1'>
                                                            </div>
                                                        </div>
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Time</label>
                                                                <input type = "time" class = "form-control" placeholder="" name='time1'>
                                                            </div>
                                                        </div>
                                                     
                                                     
                                                     <?php
                            }
                            ?>
                                                     
                                                     
                                                     
                                                     
                     <?php
                         if ($triptype=='round' || $triptype=='From Hotel to Airport')
                            {
                                
                            ?>     
                            <h6 align='center'>Departure Details</h6>
                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Airline Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='airline2'>
                                                            </div>
                                                        </div>
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Flight Number</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='flightnumber2'>
                                                            </div>
                                                        </div>
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Time</label>
                                                                <input type = "time" class = "form-control" placeholder="" name='time2'>
                                                            </div>
                                                        </div>
                                                     
                                                     
                                                     <?php
                            }
                            ?>
                                                     
                                                     
                                                                                
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                
                                                  
             <div>
                                    <textarea name='remarks' class='form-control' placeholder='Write Remarks/ Special Requests'></textarea>
                                </div>                                      
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                        
                                                    </div>
                                                </div>
                                              
                                                <div class = "col-10 px-0 col-left pe-1 pe-md-3 pe-lg-4 pe-xl-3">
                                                    <div class = "row px-4">
                                                      
                                                      
                                                       
                                                   <?php if($triptype=='round')
                                                 {
                                                 ?>
                                                      
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Car</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php 
                                                                    echo $car1;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Car</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $car2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                 }
                                                 ?>
                                                 
                                                 
                                                 
                                       
                                                   <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?>
                                                      
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Car</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php 
                                                                    echo $car1;
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                             
                                                        <?php
                                                 }
                                                 ?>                    
                                                 
                                                 
                                                 
                                
                                                   <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?>
                                                     
                                                        
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Car</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $car2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                 }
                                                 ?>                           
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                 
                                                    </div>
            
                                                    <div class = "row px-4">
                                                        
                                                        
                                                          <?php if($triptype=='round')
                                                 {
                                                 ?> 
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $arrivaldate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $departuredate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                         
                                                          <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?> 
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $arrivaldate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                  
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                 
                                                 
                                                  
                                                          <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?> 
                                                       
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $departuredate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                    </div>
            
            
            
            
            
            
            
                                                    <div class = "row px-4">
                                                       
                                                       
                                                       
                                                          
                                                          <?php if($triptype=='round')
                                                 {
                                                 ?> 
                                                       
                                                        <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Car Type</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $_SESSION['arrivalvehicletype'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Car Type</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                       <?php echo $_SESSION['departurevehicletype'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                     
                                                               
                                                          <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?> 
                                                       
                                                        <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival Car Type</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                     <?php echo $_SESSION['arrivalvehicletype'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                                  
                                                          <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?> 
                                               
                                                        
                                                        <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure Car Type</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                      <?php echo $_SESSION['departurevehicletype'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                           
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
               <!-- neww added -->
               
               
               
               
               
                                                    <div class = "row px-4">
                                                       
                                                       
                                                       
                                                          
                                                          <?php if($triptype=='round')
                                                 {
                                                 ?> 
                                                       
                                                        <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival From Location</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $fromlocation1;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure From Location</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                      <?php echo $fromlocation2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                     
                                                               
                                                          <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?> 
                                                       
                                                             <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival From Location</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $fromlocation1;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                                  
                                                          <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?> 
                                               
                                                        
                                                    <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure From Location</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                      <?php echo $fromlocation2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                           
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                         
                                                    
                                                    
               <!-- neww added -->
               
               
               
               
               
                                                    <div class = "row px-4">
                                                       
                                                       
                                                       
                                                          
                                                          <?php if($triptype=='round')
                                                 {
                                                 ?> 
                                                       
                                                        <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival To</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $tolocation1;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure To</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                      <?php echo $tolocation2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                     
                                                               
                                                          <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?> 
                                                       
                                                             <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Arrival To</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $tolocation1;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                        
                                                        
                                                                  
                                                          <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?> 
                                               
                                                        
                                                    <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Departure To</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                      <?php echo $tolocation2;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <?php
                                                 }
                                                 ?>
                                                           
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                                          
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                                <div class = "col-2 px-3 col-right d-flex align-items-center justify-content-center mt-xxl-0 pe-xxl-0">
                                                    <div class = "price-tag text-uppercase text-white d-flex align-items-center justify-content-center">AED<?php echo ' ';?> <nonsense id='roomprice<?php echo $n;?>'><?php echo '&nbsp;'. $total;?></nonsense></div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
            
           
            
            
                                        
                                    </div>
                                </div>
                                
                                
                                
                          <!--     
                                <div class = "smry-block-foot">
                                    <div class = "d-flex align-items-center justify-content-between w-100">
                                        <p class = "mb-0">Total</p>
                                        <span>AED <nonsense id='totalee'><?php echo $totalamountt;?></nonsense></span>
                                    </div>
                                </div>
                                
                                -->
                                
                            </div>
        
        
        
                           
        
                            <!-- <div class = "d-flex align-items-center justify-content-center mt-5">
                                <a href = "#" class = "btn theme_btn btn-secondary active">Complete My Booking</a>
                            </div> -->
                        </div> 
                    </div>
                </div>
                <!-- end of main guest block -->
                <!-- main guest block -->
                
                <!-- end of main guest block -->
            </div>
            <div class = "d-flex align-items-center justify-content-center mt-5">
                
                <!--<input type = "submit" name='submit' style='color:white !important;' class = "btn theme_btn btn-secondary" value='Complete My Booking'>-->
            </div>
        </section>
        
         <button id='btnyes' style='display:none;' type='submit' name='submit' style='margin-right:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Complete My Booking   </button> 
         <input style='display:none;' type='submit' name='transfer' class="btn theme_btn active btn-primary" value='Continue' id='btnno'>
        </form>
        <button onclick='navigate()' type='submit' name='submit' style='margin-right:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Complete My Booking   </button> 
    </main>
   
    
    

</div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    


<script>
    function addprice($this){
        
        var meal=$this.getAttribute('data-meal');
        var aid=$this.getAttribute('data-id');
        var roomprice=document.getElementById('roomprice'+aid).innerHTML;
        var gp=document.getElementById('gp'+aid).innerHTML;
        var gt=document.getElementById('gt').innerHTML;
        
        var totale=document.getElementById('totale').innerHTML;
        var totalee=document.getElementById('totalee').innerHTML;
        
        
        if($this.getAttribute('data-added')=='0')
        {
            $this.setAttribute("data-added", "1");
            var doit='plus';
            
            
            
            
            $.ajax({
              
			  type:'POST',
              url:'getmeals.php',
              data:{'meal':meal},
			  
              success:function(result){
                  
                  var pr=parseInt(roomprice)+parseInt(result);
                 
                 
                  document.getElementById('newpaisay'+aid).value=pr;
                 
                 
                 
                 
                  
                  document.getElementById('totale').innerHTML=parseInt(totale)+parseInt(result);
                  
                  
                  
                  var prc=parseInt(totale)+parseInt(result);
                  
                   document.getElementById('totalnewpaisay').value=prc;
                  
                  
                  
                  var va=prc/100*5;
                  document.getElementById('vatc').innerHTML=va;
                  
                  
                   document.getElementById('gt').innerHTML=prc+va;
                  
                  
                  
                  
                  document.getElementById('totalee').innerHTML=parseInt(totalee)+parseInt(result);
                  
                  
                  document.getElementById('roomprice'+aid).innerHTML=pr;
                  document.getElementById('gp'+aid).innerHTML=pr;
                  
                  
                  
                  
                  
                  
              }
			  
          }); 
            
            
            
            
            
            
            
            
            
            
            
        }
        else if($this.getAttribute('data-added')=='1')
        {
            
            
            $this.setAttribute("data-added", "0");
            var doit='minus';
            
            
             $.ajax({
              
			  type:'POST',
              url:'getmeals.php',
              data:{'meal':meal},
			  
              success:function(result){
                  
                 var pr=parseInt(roomprice)-parseInt(result);
                 
                 
                   document.getElementById('newpaisay'+aid).value=pr;
                 
                       document.getElementById('gt').innerHTML=parseInt(gt)-parseInt(result);
                       
                        document.getElementById('totale').innerHTML=parseInt(totale)-parseInt(result);
                        
                        
                        var prc=parseInt(totale)-parseInt(result);
                        
                        
                        document.getElementById('totalnewpaisay').value=prc;
                        
                        
                        
                  
                   var va=prc/100*5;
                  document.getElementById('vatc').innerHTML=va;
                  
                  
                   document.getElementById('gt').innerHTML=prc+va;
                        
                        
                        
                  document.getElementById('totalee').innerHTML=parseInt(totalee)-parseInt(result);
                       
                       
                  document.getElementById('roomprice'+aid).innerHTML=pr;
                  document.getElementById('gp'+aid).innerHTML=pr;
              }
			  
          }); 
            
            
            
        }
        
        
        
        
        
    }
</script>








<script>
function showp($this){
    
    var aid=$this.getAttribute('data-id');
   
   var sh=document.getElementById('abcshow'+aid);
  
   var da=document.getElementById('da'+aid);
   
   if(sh.style.display === 'block')
   {
   sh.style.display='none';
   da.classList.replace("up", "down");
   
}
  else
   {
   sh.style.display='block';
  da.classList.replace("down", "up");
}
    
    
}
</script>
<script>
    function navigate(){
        
        
        
                     document.getElementById("btnyes").click();
                
            
        
    }
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</body>
</html>






















    
<?php
include 'footer.php';
?>
</div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    


<script>
    function addprice($this){
        
        var meal=$this.getAttribute('data-meal');
        var aid=$this.getAttribute('data-id');
        var roomprice=document.getElementById('roomprice'+aid).innerHTML;
        var gp=document.getElementById('gp'+aid).innerHTML;
        var gt=document.getElementById('gt').innerHTML;
        
        var totale=document.getElementById('totale').innerHTML;
        var totalee=document.getElementById('totalee').innerHTML;
        
        
        if($this.getAttribute('data-added')=='0')
        {
            $this.setAttribute("data-added", "1");
            var doit='plus';
            
            
            
            
            $.ajax({
              
			  type:'POST',
              url:'getmeals.php',
              data:{'meal':meal},
			  
              success:function(result){
                  
                  var pr=parseInt(roomprice)+parseInt(result);
                 
                 
                  document.getElementById('newpaisay'+aid).value=pr;
                 
                 
                 
                 
                  
                  document.getElementById('totale').innerHTML=parseInt(totale)+parseInt(result);
                  
                  
                  
                  var prc=parseInt(totale)+parseInt(result);
                  
                   document.getElementById('totalnewpaisay').value=prc;
                  
                  
                  
                  var va=prc/100*5;
                  document.getElementById('vatc').innerHTML=va;
                  
                  
                   document.getElementById('gt').innerHTML=prc+va;
                  
                  
                  
                  
                  document.getElementById('totalee').innerHTML=parseInt(totalee)+parseInt(result);
                  
                  
                  document.getElementById('roomprice'+aid).innerHTML=pr;
                  document.getElementById('gp'+aid).innerHTML=pr;
                  
                  
                  
                  
                  
                  
              }
			  
          }); 
            
            
            
            
            
            
            
            
            
            
            
        }
        else if($this.getAttribute('data-added')=='1')
        {
            
            
            $this.setAttribute("data-added", "0");
            var doit='minus';
            
            
             $.ajax({
              
			  type:'POST',
              url:'getmeals.php',
              data:{'meal':meal},
			  
              success:function(result){
                  
                 var pr=parseInt(roomprice)-parseInt(result);
                 
                 
                   document.getElementById('newpaisay'+aid).value=pr;
                 
                       document.getElementById('gt').innerHTML=parseInt(gt)-parseInt(result);
                       
                        document.getElementById('totale').innerHTML=parseInt(totale)-parseInt(result);
                        
                        
                        var prc=parseInt(totale)-parseInt(result);
                        
                        
                        document.getElementById('totalnewpaisay').value=prc;
                        
                        
                        
                  
                   var va=prc/100*5;
                  document.getElementById('vatc').innerHTML=va;
                  
                  
                   document.getElementById('gt').innerHTML=prc+va;
                        
                        
                        
                  document.getElementById('totalee').innerHTML=parseInt(totalee)-parseInt(result);
                       
                       
                  document.getElementById('roomprice'+aid).innerHTML=pr;
                  document.getElementById('gp'+aid).innerHTML=pr;
              }
			  
          }); 
            
            
            
        }
        
        
        
        
        
    }
</script>








<script>
function showp($this){
    
    var aid=$this.getAttribute('data-id');
   
   var sh=document.getElementById('abcshow'+aid);
  
   var da=document.getElementById('da'+aid);
   
   if(sh.style.display === 'block')
   {
   sh.style.display='none';
   da.classList.replace("up", "down");
   
}
  else
   {
   sh.style.display='block';
  da.classList.replace("down", "up");
}
    
    
}
</script>
<script>
    function navigate(){
        
        
      
                     document.getElementById("btnyes").click();
                
            
        
    }
</script>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</body>
</html>