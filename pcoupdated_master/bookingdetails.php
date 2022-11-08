<?php
include 'db_connection.php';

session_start();



$biggest=$_SESSION['biggest'];

$aallowed=$_SESSION['aallowed'];
$callowed=$_SESSION['callowed'];
$eballowed=$_SESSION['eballowed'];


	
	$a0=(int)$_SESSION['adults'];
	$c0=(int)$_SESSION['children'];
	
	$a1=(int)$_SESSION['adults1'];
	$c1=(int)$_SESSION['children1'];
	
	$a2=(int)$_SESSION['adults2'];
	$c2=(int)$_SESSION['children2'];
	
	$a3=(int)$_SESSION['adults3'];
	$c3=(int)$_SESSION['children3'];
	
	$a4=(int)$_SESSION['adults4'];
	$c4=(int)$_SESSION['children4'];
	
	$a5=(int)$_SESSION['adults5'];
	$c5=(int)$_SESSION['children5'];
	
	$a6=(int)$_SESSION['adults6'];
	$c6=(int)$_SESSION['children6'];
	
	$a7=(int)$_SESSION['adults7'];
	$c7=(int)$_SESSION['children7'];
	
	$a8=(int)$_SESSION['adults8'];
	$c8=(int)$_SESSION['children8'];
	
	$a9=(int)$_SESSION['adults9'];
	$c9=(int)$_SESSION['children9'];
	
	$max0=$a0+$c0;
	$max1=$a1+$c1;
	$max2=$a2+$c2;
	$max3=$a3+$c3;
	$max4=$a4+$c4;
	$max5=$a5+$c5;
	$max6=$a6+$c6;
	$max7=$a7+$c7;
	$max8=$a8+$c8;
	$max9=$a9+$c9;


$adz=array();
$chz=array();


if($a0!='0' || $c0!='0'){
    
    array_push($adz,$a0);
    array_push($chz,$c0);
   
    
}


if($a1!='0' || $c1!='0'){
    
    array_push($adz,$a1);
    array_push($chz,$c1);
   
    
}


if($a2!='0' || $c2!='0'){
    
    array_push($adz,$a2);
    array_push($chz,$c2);
   
    
}



if($a3!='0' || $c3!='0'){
    
    array_push($adz,$a3);
    array_push($chz,$c3);
   
    
}




if($a4!='0' || $c4!='0'){
    
    array_push($adz,$a4);
    array_push($chz,$c4);
   
    
}



if($a5!='0' || $c5!='0'){
    
    array_push($adz,$a5);
    array_push($chz,$c5);
   
    
}


if($a6!='0' || $c6!='0'){
    
    array_push($adz,$a6);
    array_push($chz,$c6);
   
    
}
if($a7!='0' || $c7!='0'){
    
    array_push($adz,$a7);
    array_push($chz,$c7);
   
    
}

if($a8!='0' || $c8!='0'){
    
    array_push($adz,$a8);
    array_push($chz,$c8);
   
    
}

if($a9!='0' || $c9!='0'){
    
    array_push($adz,$a9);
    array_push($chz,$c9);
   
    
}




//echo $totalguests;
$breakfastt= $_SESSION['breakfastincluded'];


$hotel=$_SESSION['hotel'];
$country=$_SESSION['country'];
$city=$_SESSION['city'];
$star=$_SESSION['sendcategory'];
$totalpaisay=$_SESSION['totalpaisay'];






$roomseachtype=$_SESSION['roomseachtype'];
$eachtype=$_SESSION['eachtype'];








$numberofadults=$_SESSION['numberofadults'];
$numberofchildren= $_SESSION['numberofchildren'];



//send these in sessions in the end
$allbreakfasts=array();


$allroomtypes=array();
$alladults=array();
$allchildren=array();

$allowedad=array();
$allowedch=array();
$allowedeb=array();


$roomsss=array();

$i=0;
foreach ($roomseachtype as $rms)
{
 if($rms=='0')
 {
     
 }
 
 else{
     array_push($allroomtypes,$eachtype[$i]);
     array_push($roomsss,$roomseachtype[$i]);
     
     
   
     
     
     array_push($alladults,$numberofadults[$i]);
     array_push($allchildren,$numberofchildren[$i]);
     array_push($allowedad,$aallowed[$i]);
      array_push($allowedch,$callowed[$i]);
       array_push($allowedeb,$eballowed[$i]);
       
       
         for($b=0; $b<intval($roomseachtype[$i]); $b++)
     {
         
     array_push($allbreakfasts,$breakfastt[$i]);
     
     }
       
       
       
       
       
 }
 
 $i=$i+1;
    
}


$_SESSION['allroomtypes']=$allroomtypes;


$_SESSION['allbreakfasts']=$allbreakfasts;


$totaldays= $_SESSION['totaldays'];
$sdate= $_SESSION['sdate'];
$edate= $_SESSION['edate'];
$sendroomnumbers= $_SESSION['sendroomnumbers'];

$totaladults=0;
$totalchildren=0;

for ($x = 0; $x <count($numberofadults); $x++) {
    if($roomseachtype[$x]!='0')
    {
    $totaladults=$totaladults+intval($numberofadults[$x]);
    }
    
}
for ($x = 0; $x <count($numberofchildren); $x++) {
     if($roomseachtype[$x]!='0')
    {
    $totalchildren=$totalchildren+intval($numberofchildren[$x]);
    }
}

$totalguests=$totaladults+$totalchildren;







if (isset($_POST['submit'])) {
    
     $_SESSION['nationality']=$_POST['nationality'];
    $_SESSION['title']=$_POST['title'];
     $_SESSION['fname']=$_POST['fname'];
      $_SESSION['lname']=$_POST['lname'];
       $_SESSION['email']=$_POST['email'];
        $_SESSION['phone']=$_POST['phone'];
        
        $_SESSION['showpaisay']=$_POST['showpaisay'];
           
            
        $_SESSION['allchildren']= $_POST['childrenperroom'];
         $_SESSION['roomtypesall']= $_POST['rtp'];
         $_SESSION['totalamount']= $_POST['ttl'];
      $_SESSION['alladults']= $_POST['adultsperroom'];
    
   
 echo "<script>location.replace('bs.php');</script>";   
    
}

if (isset($_POST['transfer'])) {
    
    $_SESSION['nationality']=$_POST['nationality'];
       $_SESSION['title']=$_POST['title'];
     $_SESSION['fname']=$_POST['fname'];
      $_SESSION['lname']=$_POST['lname'];
       $_SESSION['email']=$_POST['email'];
        $_SESSION['phone']=$_POST['phone'];
        
       $_SESSION['showpaisay']=$_POST['showpaisay'];
           
            
        $_SESSION['allchildren']= $_POST['childrenperroom'];
         $_SESSION['roomtypesall']= $_POST['rtp'];
         $_SESSION['totalamount']= $_POST['ttl'];
      $_SESSION['alladults']= $_POST['adultsperroom'];
    
   
    
 echo "<script>location.replace('transfer.php');</script>";   
    
    
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
<div style='' class="se-pre-con"> <center><img style='width:150px; margin-top:300px;' src='hotelloader.gif'></center> </div>-->




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>


    
    
    
    <title>PCO Connect - Booking Details</title>
</head>
<body>
   
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
        
        
    <div class = "main-holder">
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

                 <!-- <div class = "navbar-contact-info">
                     <a href='tel:+971507142748'> <img src = "img/header-contact-img.png"></a>
                  </div>-->
              </div>
            </div>
          </nav>
    </header>
    
    
    <section class="page_title">
        <div class="container">
            <h1>Booking Details</h1>
            <input style='display:none;' id='biggest' value='<?php echo $biggest;?>'>
        </div>
    </section>
    
    <input style='display:none;' id='sdate' value='<?php echo $sdate;?>'>
    <input style='display:none;' id='edate' value='<?php echo $edate;?>'>
    <section class="details_page">
        <div class="container">
            <div class="dp_title">
                <h2>Room Information</h2>
                <span>* All Fields are mandatory</span>
            </div>
            <div class="dp_boxes">
                <div class="dp_box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="dp_inner_box">
                                <div class="item_details">
                                    <div class="item_main_title">
                                        <h2><?php echo $hotel;?></h2>
                                    </div>
                                    <div class="reviews">
                                        <ul class="rating">
                                            <?php
                                            for ($x = 0; $x <$star; $x++) {
                                                ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                            
                                            <?php
                                            }
                                            ?>
                                            
                                        </ul>
                                        <span><?php echo $star;?> Star Hotel</span>
                                    </div>
                                    <span class="item_address"><i class="bi bi-geo-alt"></i><?php echo $city;?>, <?php echo $country;?></span>
                                </div>
                             <!--   <div class="dp_aminities">
                                    <h6 class = "pt-3 text-black-50">Amenities</h6>
                                    <ul class = "mb-0 mt-3">
                                        <li>Dinner</li>
                                        <li>Breakfast</li>
                                        <li>AC</li>
                                        <li>TV</li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="dp_room_feature">
                                <table>
                                    <tr>
                                        
                                        
                                        
                                        <td class="text-right">No. Of Rooms: </td>
                                        <td class="text-left"><b><?php echo $sendroomnumbers;?></b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Check in Date: </td>
                                        <td class="text-left"><b><?php 
                                        
                                        $radate = new DateTime($sdate);
                                        echo $radate->format('d-m-Y');
                                        
                                        ?></b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Check out Date: </td>
                                        <td class="text-left"><b><?php 
                                        
                                        $ra2date = new DateTime($edate);
                                        echo $ra2date->format('d-m-Y');
                                        
                                        ?></b></td>
                                    </tr>
                                    <tr>
                                        
                                        
                                        
                                        
                                       <?php
                                       
                                       
                                       			
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);

                                       
                                       
                                       
                                       ?> 
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <td class="text-right">Total Days: </td>
                                        <td class="text-left"><b><?php echo $numberDays;?></b></td>
                                    </tr>
                                    <!--<tr>
                                        <td class="text-right">Total Guest: </td>
                                        <td class="text-left"><b><?php echo $totalguests;?></b></td>
                                    </tr>-->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <form class='notranslate' action='#' method='POST'>
                <div class="dp_box_details">
                    <h4>Personal Information</h4>
                    
                   
                    
                    
                    <?php
                    $ab=0;
                    $ab2=0;
                   
                    for ($x = 0; $x <count($allroomtypes); $x++) {
                        //echo $allroomtypes[$x];
                      for ($z = 0; $z <$roomsss[$x]; $z++) {
                          
                          $ab=$ab+1;
                    ?>
                    
                    <div class="dp_item_box">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="dp_room_info">
                                    <span>Room #<?php echo $ab;?></span>
                                    <h3><?php echo $allroomtypes[$x];?></h3>
                                    
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <input style='display:none;' name='rtp[]' class='rtp' value='<?php echo $allroomtypes[$x];?>'>
                                    
                                    <input style='display:none;' name='prici[]' class='prici' value=''>
                                    <ul>
                                        <li>Adults: </li>
                                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Children: </li>
                                    </ul>
                                    <input class='aallowed' style='display:none;' value='<?php echo $allowedad[$x];?>'>
                                    <input class='callowed' style='display:none;' value='<?php echo $allowedch[$x];?>'>
                                    <input class='eballowed' style='display:none;' value='<?php echo $allowedeb[$x];?>'>
                                     <ul>
                                        <li>
                                       
                                        <input style='width:100px;' id='ad' onclick='checkadultoccupancy(this)' min='0'  type='number' class='adult form-control' name='adultsperroom[]' value='<?php 
                                       
                                       
                                        if($adz[$ab2]==''){
                                            echo '0';
                                        }
                                        else{
                                        echo $adz[$ab2];
                                        }
                                        ?>'></li>
                                        <li><input style='width:100px;' id='ch' min='0' onclick='checkadultoccupancy(this)' type='number' class='children form-control' name='childrenperroom[]' value='<?php 
                                        if($chz[$ab2]==''){
                                            echo '0';
                                        }
                                        else{
                                        echo $chz[$ab2];
                                        }
                                        ?>'></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="dp_item_form">
                                    <div class = "pt-3">
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                
                                                <input class='showpaisay' style='display:none;' name='showpaisay[]' id='showpaisay'>
                                                <select name='title[]' id="inputState" class="form-select">
                                                    
                                                    <option>Mr.</option>
                                                    <option>Mrs.</option>
                                                    <option>Miss.</option>
                                                    <option>Dr.</option>
                                                    <option>Prof.</option>
                                                  </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input class="form-control" name='fname[]' type="text" placeholder="First Name" aria-label="default input example">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <input class="form-control" name='lname[]'  type="text" placeholder="Last Name" aria-label="default input example">
                                            </div>
                                            
                                            <div class="col-md-4 mb-3">
                                                <input class="form-control"  name='nationality[]' type="text" placeholder="Nationality" aria-label="default input example">
                                            </div>
                                            
                                             <div class="col-md-4">
                                                <input class="form-control"  name='email[]' type="email" placeholder="Email Address" aria-label="default input example">
                                            </div>
                                            
                                            <div class="col-md-4 mb-3">
                                                <input class="form-control"  name='phone[]' type="phone" placeholder="Contact Number" aria-label="default input example">
                                            </div>
                                           
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <?php
                     $ab2=$ab2+1;
                      }
                      
                      
                    }
                    ?>
                    
                    
                    
                    
                    
                    
                </div>
                
                <div class="total_amt">
                    <div class="t_amt_title">
                        <h2>Total</h2>
                        <!--<span>(Inclusive Of all Taxes)</span>-->
                        
                        
                       
                        
                        
                        
                    </div>
                    <h2 class="t_amt">
                        AED <nonsense id='ttl'><?php echo $totalpaisay;?></nonsense>
                        <input name='ttl' style='display:none;' id='ttl2'>
                    </h2>
                </div>
            </div>
            <div class="button_container">
                <!--<button class="btn theme_btn btn-outline-primary me-2 btn-white">Back</button>-->
                <input type='' class="btn theme_btn active btn-primary" value='Continue' id="handleclick">
                <input style='display:none;' type='submit' name='submit' class="btn theme_btn active btn-primary" value='Continue' id='btnyes'>
                <input style='display:none;' type='submit' name='transfer' class="btn theme_btn active btn-primary" value='Continue' id='btnno'>
            </div>
        </div>
        </form>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/main.js"></script>

    <script>
        $('#handleclick').on("click", function(){
            
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
var ok=[];

       for(var i = 0; i < adult.length; i++) {
            if(parseInt(adult[i].value)+parseInt(children[i].value)==0){
               
             ok.push('no');
            }
            else{
                ok.push('ok');
            }
       }
       
       if(ok.includes('no')){
         Swal.fire('Occupancy for a Room cannot be "0"'); 
            
       }
       else{
              
               
          
          
          document.getElementById("btnyes").click();
          
         
            
       }
           
            
            
        });
    </script>


  <script>
    
    
    
    $("[type='number']").keypress(function (evt) {
   // evt.preventDefault();
});

</script>


<script>
    
    function checkadultoccupancy($this){
       
        
           var idd = $this.id;
            
            
       
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");

var max=document.getElementById("biggest").value;

var amax=document.getElementsByClassName("aallowed");
var cmax=document.getElementsByClassName("callowed");
var ebmax=document.getElementsByClassName("eballowed");









       for(var i = 0; i < adult.length; i++) {
           if(children[i].value=='')
           {
               children[i].value='0';
           }
           if(adult[i].value=='')
           {
               adult[i].value='0';
           }
          
          var maxy=parseInt(amax[i].value)+parseInt(cmax[i].value)+parseInt(ebmax[i].value);
           
           if(parseInt(adult[i].value)+parseInt(children[i].value)>maxy){
              
            
                   if(idd=='ad'){
                   adult[i].value=parseInt(adult[i].value)-1;
                   Swal.fire('Max Occupancy Reached for this Room');
                    
                   }
                   else if(idd=='ch'){
                     children[i].value=parseInt(children[i].value)-1;
                   Swal.fire('Max Occupancy Reached for this Room');   
                   }
                   
               }
               
               
           
           
           
           
            
           
       }
     
        
        
      
        
    }
    
    
</script>











    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    



<script>
     var checktotal=0;
     const paisay = [];
setInterval(function () {
      
        var total=0;
        var getnumber=1;
      

<?php
 unset($_SESSION['subtractid']);
$_SESSION['subtractid']=array();
?>
      
       
       
      
       
        var sd = document.getElementById("sdate").value;
        var ed = document.getElementById("edate").value;
        
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
        
        var rtp = document.getElementsByClassName("rtp");
        
        var pricing = document.getElementsByClassName("prici");
      
      
         var cnt=0;
         
       for(var i = 0; i < adult.length; i++) {
           

     
          var adultz=adult[cnt].value;
          var childrenz=children[cnt].value;
          var romsn='1';
          var rtpp=rtp[cnt].value;
          
          
         
          //alert(adultz);
           
           var ttl2 = document.getElementById("ttl2");
          var abc=0;
          
            $.ajax({
              
			  type:'POST',
              url:'getpricing.php',
              data:{'adult':adultz,'children':childrenz,'sdate':sd,'edate':ed,'roomtype':rtpp,'rooms':romsn,'getnumber':getnumber},
			  
              success:function(result){
                  
                  
                  if(paisay[abc]==result.toString()){
                      
                  }
                  else{
                  paisay.push(result.toString());
                  
                  
                   //alert(paisay);
                  }
                  var pricing = document.getElementsByClassName("prici");
                  pricing[abc].value=result;
                 
                 
                  abc=abc+1;
                  
                  
                  total=total+parseInt(result);
                //alert(total);
                //alert(total);
				ttl2.value=total;
			//	alert(result);
                  
              }
			  
          }); 
          
          var showpaisay=document.getElementById('showpaisay');
         
          
        cnt=cnt+1;    
        getnumber=getnumber+1;
           
       }
        
         
        
  //  var totalpaisay = document.getElementById("totalpaisay");
	var ttl = document.getElementById("ttl");
   var ttll = document.getElementById("ttl2").value;
    
  if(checktotal!=ttll){
                checktotal=ttll;
				ttl.innerHTML=ttll;
//				totalpaisay.value=ttll;
  }



var paisay2 = document.getElementsByClassName("showpaisay");

for(var i = 0; i < paisay2.length; i++) {
    
    paisay2[i].value=paisay[i];
}


//alert(paisay);



}, 600);
        
</script>




</body>
</html>