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


include 'header.php';

     
   
   ?>


<style>
    .tabs-section {
        overflow: hidden;
        /* background-color: #333; */
        padding: 60px 0px;
    }

    .tabs-section .feature-img {
        max-height: 255px;
        overflow: hidden;
        border-radius: 10px;
        border: 3px solid #fff;
    }

    .tabs-section .nav-tabs {
        border: 0;
    }

    .tabs-section .nav-link {
        border: 0;
        padding: 11px 15px;
        transition: 0.3s;
        color: #ce3435;
        border-radius: 0;
        border-right: 2px solid #ce3435 !important;
        font-weight: 600;
        font-size: 15px;
    }

    .tabs-section .nav-link:hover {
        color: #ce3435;
    }

    .tabs-section .nav-link.active {
        color: white;
        background: #ce3435;
    }

    .tabs-section .nav-link:hover {
        border-right: 4px solid #ce3435;
    }

    .tabs-section .tab-pane.active {
        -webkit-animation: fadeIn 0.5s ease-out;
        animation: fadeIn 0.5s ease-out;
    }

    .tabs-section .details h3 {
        font-size: 26px;
        color: #ce3435;
    }

    .tabs-section .details p {
        color: #aaaaaa;
    }

    /* 
    .panel {
        border-bottom: 1px solid #ce3435;
        border-left: 1px solid #ce3435;
        border-right: 1px solid #ce3435;
        margin-bottom: 5px;
    } */

    .panel-heading {
        /* background-color: #ce3435; */
        background-color: #fff;
        color: #ce3435;
        border: 1px solid #ce3435 !important;
        margin-bottom: 5px;
        padding: 5px 15px;
    }

    .panel-heading .panel-title a {
        /* color: white; */
        color: #ce3435;
        font-size: 15px;

    }

    .panel-heading {
        padding: 0;
        border: 0;
    }

    .panel-title {
        margin-bottom: 0px;
    }

    .panel-title>a,
    .panel-title>a:active {
        display: block;
        padding: 15px;
        /* color: #555; */
        color: #ce3435;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        word-spacing: 3px;
        text-decoration: none;
    }

    .roomChevronIcon {
        float: right;
    }

    .panel-heading .roomChevronIcon:before {
        /* font-family: 'Glyphicons Halflings';
        content: "\F112"; */
        /* float: right; */
        transition: all 0.5s;
    }

    .panel-heading.active .roomChevronIcon:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .panel-heading:active{
        background-color: #ce3435;
    }

    .panel-body {
        color: black;
        padding: 10px;
    }

    .rating {
        color: #dc3545;
        font-size: 12px;
    }

    .styled-checkbox {
        position: absolute;
        opacity: 0;
    }

    .styled-checkbox+label {
        position: relative;
        cursor: pointer;
        padding: 0;
    }

    .styled-checkbox+label:before {
        content: "";
        margin-right: 5px;
        margin-top: 1px;
        display: inline-block;
        vertical-align: text-top;
        width: 15px;
        height: 15px;
        background: white;
        border: 1px solid red;
    }

    .styled-checkbox:hover+label:before {
        background: #DC3545;
    }

    .styled-checkbox:focus+label:before {
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
    }

    .styled-checkbox:checked+label:before {
        background: #DC3545;
    }

    .styled-checkbox:disabled+label {
        color: #b8b8b8;
        cursor: auto;
    }

    .styled-checkbox:disabled+label:before {
        box-shadow: none;
        background: #ddd;

    }

    .styled-checkbox:checked+label:after {
        content: "";
        position: absolute;
        left: 2px;
        top: 7px;
        background: white;
        width: 2px;
        height: 2px;
        box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
        transform: rotate(45deg);
    }

    .form-check {
        padding-left: 0px;
    }

    .badge-primary {
        color: #fff !important;
        background-color: #ce3435 !important;
    }

    .badge-pill {
        padding-right: 0.6em !important;
        padding-left: 0.6em !important;
        border-radius: 10rem !important;
    }

    .badge {
        display: inline-block !important;
        padding: 0.25em 0.4em !important;
        font-size: 75% !important;
        font-weight: 700 !important;
        line-height: 1 !important;
        text-align: center !important;
        white-space: nowrap !important;
        vertical-align: baseline !important;
        border-radius: 0.25rem !important;
    }

    .gTotal_foot {
        /* border: 1px solid #0000004D; */
        background: #ce3435;
        color: white;
        padding: 11px 15px;
        ;
    }

    .d_block {
        font-size: 10px;
    }

    .default_color {
        color: #000;
    }
    .hotelSummeryTop{
        border: 1px solid #ce3435;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .text-bold{
        font-weight: bold;
    }
    .all-text-black{
        color:black;
    }
    .theme-color{
        color:#ce3435;
    }
    .form-control{
        border: 1px solid #ce3435;

    }
    .panel-heading:active a{
        background-color: #ce3435;
        color: white;
    }
    .panel-heading:hover{
        background-color: #ce3435;
    }
    .panel-heading:hover a{
        color: white;
    }
</style>
<section class="tabs-section text-white">

    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-lg-3">
                <hr style="height:3px; color:#DC3545; margin-top: 0px;">
                <div class="col-md-12">
                    <ul class="nav nav-tabs flex-column mb-3">
                  
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#Transfers">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
                                    <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
                                </svg>
                                Transfers
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <hr style="height:3px; color:#DC3545;">
                <div class="col-md-12">
                  
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                      <?php if($triptype=='round')
                                                 {
                                                 ?>
                                                
                                                   <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Arrival:</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $arrivalprice;?></p>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Departure:</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $departureprice;?></p>
                        </div>
                    </div>
                    
                                               
                                               
                                                
                                               <?php
                                               }
                                               ?>
                                                
                                                
                                                
                                                 <?php if($triptype=='From Airport to Hotel')
                                                 {
                                                 ?>
                                                
                                                                                 <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Arrival:</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $arrivalprice;?></p>
                        </div>
                    </div>
                    
                                               
                                              
                                                
                                               <?php
                                               }
                                               ?>  
                                                
                                                
                                                   <?php if($triptype=='From Hotel to Airport')
                                                 {
                                                 ?>
                                                
                                                
                                               
                                             <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Departure:</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $departureprice;?></p>
                        </div>
                    </div>
                                                
                                               <?php
                                               }
                                               ?>
                                                
                                                
                                                
                                                
                                                
                                                                      
                                             <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Total:</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $total;?></p>
                        </div>
                    </div>    
                                                
                               <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>VAT (5%):</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $total/100*5;?></p>
                        </div>
                    </div>                      
                                           
                                                  
                                             
                                             
                                             
                                       
                                             
                                             
                                          
                   
            
                    <div class="gTotal_foot">
                        <div class="d-flex align-items-center justify-content-between w-100">
                         <div class="col-lg-8 d-flex justify-content-left">
                            <p>Grand Total</p>
                        </div>
                           <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <?php echo $total+($total/100*5);?></p>
                        </div>
                        </div>
                    </div>


                </div>



            </div>
            <div class="col-sm-7 col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane active show" id="HotelsBooking">
                        <div class="row">
                            <div class="col-md-12 mb-2 hotelSummeryTop">
                                <div class="row">
                                    
                                    
                                    
                                    <div class="col-md-12 all-text-black" style="background: lightgray; padding-top: 20px;">
                                        
                                        
                                        
                                        
                                      
                                        
                                        
                                        
                                        
                                    
                                                    <div class = "row px-4">
                                                      
                                                        
                                        
                                                       
                                                   <?php if($triptype=='round')
                                                 {
                                                 ?>
                                                     
                                                        <div class = "col-6 pe-4">
                                                             <h6>Arrival</h6>
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Car</span>
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
                                                              <h6>Departure</h6>
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Car</span>
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
                                                      <h6>Arrival</h6>
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Car</span>
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
                                                     <h6>Departure</h6>
                                                        
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Car</span>
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
                                                                    <span>Date</span>
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
                                                                    <span>Date</span>
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
                                                                    <span>Date</span>
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
                                                                    <span>Date</span>
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
                                                                    <span>Car Type</span>
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
                                                                    <span>Type</span>
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
                                                                    <span>Type</span>
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
                                                                    <span>Type</span>
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
                                                                    <span>From</span>
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
                                                                    <span>From</span>
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
                                                                    <span>From</span>
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
                                                                    <span>From</span>
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
                                                                    <span>To</span>
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
                                                                    <span>To</span>
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
                                                                    <span>To</span>
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
                                                                    <span>To</span>
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
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0" >
                                <div class="panel-group" id="accordion">
                                    
                                    
                                    
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title ">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#roomColl1">
                                                    Details
                                                    <i class="bi bi-chevron-down roomChevronIcon"></i>
                                                </a>


                                            </h4>
                                        </div>
                                        <div id="roomColl1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" name="noofadults" placeholder="No Of Adults" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-6 col-md-4 col-sm-12">
                                                            <input type="text" name="noofchildrens" placeholder="No Of Children " class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" name="title" placeholder="Title" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name="fname" placeholder="First Name" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name="lname" placeholder="Last Name" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" name="phone" placeholder="Phone" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name="email" placeholder="Email" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name="nationality" placeholder="Nationality" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                              

                                            </div>
                                        </div>
                                    </div>
                                   
                                   
                                   
                                   
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="Transfers">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                Transfers
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="RentACar">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                Rent A Car
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('.panel-collapse').on('show.bs.collapse', function() {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).siblings('.panel-heading').removeClass('active');
    });
</script>

<?php
include_once('footer.php');
?>