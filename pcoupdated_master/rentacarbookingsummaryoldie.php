<?php

session_start();
include 'db_connection.php';


$aid=$_SESSION['aid'];
$brand= $_SESSION['brand'];
$model=$_SESSION['model'];
$year= $_SESSION['year'];
$singleprice=$_SESSION['singleprice'];
$totalprice=$_SESSION['totalprice'];
$totaldays=$_SESSION['totaldaysrent'];
$country=$_SESSION['country'];
$city=$_SESSION['city'];
$pickuplocation=$_SESSION['pickuplocation'];
$pickupdate=$_SESSION['pickupdate'];
$pickuptime=$_SESSION['pickuptime'];
$dropofflocation=$_SESSION['dropofflocation'];
$dropoffdate=$_SESSION['dropoffdate'];
$dropofftime=$_SESSION['dropofftime'];

  
  
$pickordelivery=$_SESSION['pickordelivery'];
$deliveryperday=$_SESSION['deliveryperday'];
  
  

$uniquenumber=rand(10,100000000);

$_SESSION['bookingnumber']=$uniquenumber;


     
     $taxvalue=intval($totalamountt)/100*5;
   
     $totalamount=intval($totalamountt)+intval($taxvalue);
 

if (isset($_POST['submit'])) {
   
    
    
     $_SESSION['fname']=$_POST['fname'];
     $_SESSION['lname']=$_POST['lname'];
     $_SESSION['title']=$_POST['title'];
     $_SESSION['phone']=$_POST['phone'];
     $_SESSION['email']=$_POST['email'];
     $_SESSION['nationality']=$_POST['nationality'];
     
     $_SESSION['remarks']=$_POST['remarks'];
    
    
    $_SESSION['totalpricewithvat']=$_POST['grandvatpri'];
    
    
    echo "<script>location.replace('rentacarinvoice.php');</script>"; 
}
     
       
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/app.css">
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
.whatsappp2 {

   position: fixed;
  bottom: 30px;
   left: 0;
z-index:1;
  margin-right: 30px;
}
</style>
        
    <!--  <a href='https://wa.me/+971506509976'> <img src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a> -->
  
   
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
                                           
                                           <li >
                                               
                                               <span style='float:left;'>Days x Price</span>
                                               <span style='float:right;' ><?php echo $totaldays.' x '.$singleprice;?></span>
                                           </li>
                                    <br/>
                                    <hr style='height:3px; color:#DC3545;'>
                                    <br/>
                                    
                                                
                                                
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                    <span><?php if($pickordelivery=='Delivery')
                                                    {
                                                        ?>
                                                        Car<br/>
                                                        Delivery<br/><br/>
                                                        <?php
                                                    }
                                                    ?>Total<br/><small>VAT (5%)</small></span>
                                                    <span><?php
                                                    $dc='0';
                                                    if($pickordelivery=='Delivery')
                                                    {
                                                        echo 'AED '.$totalprice.'<br/>';
                                                       $dc= intval($deliveryperday);
                                                       $totalprice=$totalprice+$dc;
                                                        ?>
                                                        AED <?php echo ' '.$dc;?>
                                                        <br/><br/>
                                                        <?php
                                                    }
                                                    ?>AED <nonsense id='totale'><?php echo $totalprice;?></nonsense><br/>AED <nonsense id='vatc'><?php echo $totalprice/100*5;?></nonsense></span>
                                                </li>
                                                  
                                             
                                             <input style='display:none;' name='totalnewpaisay' value='<?php echo $totalprice/100*5;?>' id='totalnewpaisay'>
                                             
                                       
                                             
                                             
                                            
                                            </ul>
                                        </div>
                                        <div class = "smry-block-foot">
                                            <div class = "d-flex align-items-center justify-content-between w-100">
                                                <p class = "mb-0">Grand Total <span class = "d-block">(Inclusive of 5% VAT)</span></p>
                                                <span>AED 
                                                
                                                <input name='grandvatpri' style='display:none;' value='<?php echo $totalprice+$totalprice/100*5;?>'>
                                                <nonsense id='gt'><?php echo $totalprice+$totalprice/100*5;?></nonsense></span>
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
                                        <h6>Car Booking</h6>
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
                                        <div class = "smry-block-content-top">
                                            <h5><?php echo $brand.' '.$model.' '.$year;?></h5>
                                            <p class = "mb-0 pb-1">
                                                <span><i class="bi bi-geo-alt"></i></span>
                                                <span><?php echo $city.', '.$country;?></span>
                                                
                                            </p>
                                            <p>
                                                Days: <?php echo $totaldays;?>
                                            </p>
                                  
                                        </div>
            
            
                            <br/> 
            
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
                                                                <select class = "form-control"name='title' value = '<?php echo $title[$n];?>'>
                                                                    
                                                                    <option>Mr.</option>
                                                                     <option>Mrs.</option>
                                                                      <option>Miss.</option>
                                                                       <option>Dr.</option>
                                                                        <option>Prof.</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                          <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">First Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='fname' value = "<?php echo $fname[$n];?>">
                                                            </div>
                                                        </div>
                                                          <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Last Name</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='lname' value = "<?php echo $lname[$n];?>">
                                                            </div>
                                                        </div>
                                                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Phone</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='phone' value = "<?php echo $phone[$n];?>">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Email</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='email' value = "<?php echo $email[$n];?>">
                                                            </div>
                                                        </div>
                                                        
                                                         <div class = "col-6 col-lg-4">
                                                            <div class = "mb-3">
                                                                <label class = "form-label">Nationality</label>
                                                                <input type = "text" class = "form-control" placeholder="" name='nationality' value = "<?php echo $nationality[$n];?>">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    
                                                  
             <div>
                                    <textarea name='remarks' class='form-control' placeholder='Write Remarks/ Special Requests'></textarea>
                                </div>                                      
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                        
                                                    </div>
                                                </div>
                                               
                                                <div class = "col-10 px-0 col-left pe-1 pe-md-3 pe-lg-4 pe-xl-3">
                                                    <div class = "row px-4">
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Pick Up</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $pickuplocation;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Drop Off</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $dropofflocation;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class = "row px-4">
                                                        <div class = "col-6 pe-4">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Pick Up Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $pickupdate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-6">
                                                            <div class = "mb-3 row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Drop Off Date</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $dropoffdate;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class = "row px-4">
                                                        <div class = "col-6 pe-4">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Pickup Time</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                    <?php echo $pickuptime;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "col-6">
                                                            <div class = "row align-items-center">
                                                                <label for = "" class = "col-form-label ps-0 ps-md-2 col-md-4 d-flex align-items-center justify-content-md-between">
                                                                    <span>Drop Off Time</span>
                                                                    <span>:</span>
                                                                </label>
                                                                <div class = "col-md-8 px-0">
                                                                  <?php echo $dropofftime;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "col-2 px-3 col-right d-flex align-items-center justify-content-center mt-xxl-0 pe-xxl-0">
                                                    <div class = "price-tag text-uppercase text-white d-flex align-items-center justify-content-center"> <?php echo ' ';?>
                                                    <br/><nonsense id='roomprice<?php echo $n;?>'><?php echo ''.$totalprice;?></nonsense></div>
                                                    
                                                    
                                                    <input style='display:none;' name='newpaisay[]' id='newpaisay<?php echo $n;?>' value='<?php echo $showpaisay[$n];?>'>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
      
            
            
                                        
                                    </div>
                                </div>
                                
                                
                                
                               
                                <div class = "smry-block-foot">
                                    <div class = "d-flex align-items-center justify-content-between w-100">
                                        <p class = "mb-0">Total</p>
                                        <span>AED <nonsense id='totalee'><?php echo $totalprice+$totalprice/100*5;?></nonsense></span>
                                    </div>
                                </div>
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
        
         <button id='btnyes' style='display:block;' type='submit' name='submit' style='margin-left:20px; margin-bottom:20px;' class='whatsappp2 btn theme_btn btn-secondary active'>Complete My Booking   </button> 
        
        
        </form>
        <!--<button onclick='navigate()' type='submit' name='submit' style='margin-right:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Complete My Booking   </button> -->
    </main>
   
  <?php include 'footer.php';?>

</div>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

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
    
    