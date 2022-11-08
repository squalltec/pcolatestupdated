<?php
session_start();

$gethotel=$_GET['hotel'];


$hotel=$_GET['hotel'];
$country=$_GET['country'];
$city=$_GET['city'];
$sendcategory=$_GET['sendcategory'];







include 'db_connection.php';




$sqlall2="SELECT * FROM hotelsdatabase WHERE name='$gethotel' && country='$country' && city='$city'";
	
		$resultall2 = $conn->query($sqlall2);

if ($resultall2->num_rows > 0) {
  // output data of each row
  while($rowall2 = $resultall2->fetch_assoc()) {
      
      $areaa=$rowall2['area'];
      
      $gpsvalue=$rowall2['gps'];
      
  }
}

$gpsarray=explode(",",$gpsvalue);

$lat=$gpsarray[0];
$long=$gpsarray[1];

$areafull=str_replace(" ","+",$areaa);

$areafull=$areafull.'+'.$city;

//echo $areafull;






	include "simple_html_dom.php";


$cityzz=$areafull;

	$postFields = array(
		
		"gotdata" => $cityzz
		
	);
	
	
	
	
	
	
	
	
	
	
	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/nearby.php");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	$response = curl_exec($ch);
    //echo $response;
	curl_close($ch);
	
	
	
	$html = new simple_html_dom();
	$html->load($response);
	
	$aa=$html->find('div[class=BNeawe deIvCb AP7Wnd]');
	




	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/nearbymetro.php");
	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch2, CURLOPT_POST, 1);
	curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($postFields));
	curl_setopt($ch2, CURLOPT_COOKIEJAR, "cookie.txt");
	$response2 = curl_exec($ch2);
    //echo $response;
	curl_close($ch2);
	
	
	
	$html2 = new simple_html_dom();
	$html2->load($response2);
	
	$aa2=$html2->find('div[class=BNeawe deIvCb AP7Wnd]');
	










$images=array();


$sqlall="SELECT * FROM hotelsdatabase WHERE name='$gethotel' && country='$country' && city='$city'";
	
		$resultall = $conn->query($sqlall);

if ($resultall->num_rows > 0) {
  // output data of each row
  while($rowall = $resultall->fetch_assoc()) {
      
      $about=$rowall['description'];
      
      
      $stra=$rowall['star'];
      $gpps=$rowall['gps'];
      
      
      $generalf=$rowall['generalfacilities']; 
      $mainf=$rowall['mainfacilities'];
       $frontf=$rowall['frontdeskfacilities'];
        $sportsf=$rowall['sportsfacilities'];
         $familyf=$rowall['familyfacilities'];
         $cleaningf=$rowall['cleaningfacilities'];
         $foodf=$rowall['foodfacilities'];
         $businessf=$rowall['businessfacilities'];
          $internetf=$rowall['internetfacilities'];
           $parkingf=$rowall['parkingfacilities'];
            $uniquef=$rowall['uniquefacilities'];
            $safetyf=$rowall['safetyfacilities']; 
      
      
      $parking=$rowall['parking']; 
       $parkingcharges=$rowall['parkingcharges']; 
      $atm=$rowall['atm'];
      $chargednotcharged=$rowall['chargednotcharged'];
      
      $atm=$rowall['atm']; 
      
      $view=$rowall['view'];
      
      $pool=$rowall['pool'];
      $cards=$rowall['acceptedcardslist'];
      
      $highlights=$rowall['highlights'];
      $roomservicefrom=$rowall['roomservicefrom'];
      $roomserviceto=$rowall['roomserviceto'];
      
      $agerestriction=$rowall['agerestriction'];
      
      $address=$rowall['address'];
      
  }
}


$sql="SELECT * FROM hotelsdatabaseimages WHERE name='$gethotel' && country='$country' && city='$city'";
	
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
     array_push($images,$row['image']);
      
      
  }
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
    <title>PCO Connect</title>
</head>
<body>
    
    
    
    
    <div class = "main-holder hd-pg">
    
    
      <style>
.whatsappp {

  position: fixed;
  bottom: 30px;
   right: 0;
z-index:1;
  margin-right: 30px;
}
</style>
        
      <a href='hotelsearch.php'> <button style='' class='whatsappp theme_btn btn btn-outline-primary'>Continue</button> 
        
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
                        <a class="nav-link" href="#">About Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li style='right:0;'>
                                            
<select class="navbar-contact-info form-control selectpicker notranslate" id="selectBox" onchange="changeFunc();" data-width="fit">
    <option value="en" data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
     <option value="ar" data-content='<span class="flag-icon flag-icon-ae"></span> عربي '>عربي</option>
    <option value="de" data-content='<span class="flag-icon flag-icon-de"></span> German'>German</option>
    <option value="ru" data-content='<span class="flag-icon flag-icon-ru"></span> Russian'>Russian</option>
      <option value="sv" data-content='<span class="flag-icon flag-icon-se"></span> Swedish'>Swedish</option>
  </select>  
  
  
  
  
  
  


                
        <script>
            var chooseLang = function() {
  $('.selectpicker').selectpicker();
};

chooseLang();
        </script>     




<style>
.VIpgJd-suEOdc{
  display:none !important;   
    
}

.goog-logo-link {
    display:none !important;
} 
    
.goog-te-gadget{
    color: transparent !important;
}

.goog-te-banner-frame.skiptranslate {
    display: none !important;
	
    } 
	body {
    top: 0px !important; 
    }
	
	.goog-te-combo
	{
	
	background-color:white;
	color:black;
	
	}
	
	
		.goog-te-combo option { color: black; }
		.goog-te-combo select { color: black; }
	
	
</style>








<script>
    
    function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	changeLanguage(selectedValue);
   
   }
    
</script>



<script>

function googleTranslateInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ar,ru,de,sv', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate');
}

/**
 * This will fire the event on target element
 * @param element
 * @param event
 * @returns {boolean}
 */
function fireEvent(element,event){
  console.log("in Fire Event");
  if (document.createEventObject){
    // dispatch for IE
    //console.log("in IE FireEvent");
    var evt = document.createEventObject();
    return element.fireEvent('on'+event,evt)
  }
  else{
    // dispatch for firefox + others
    //console.log("In HTML5 dispatchEvent");
    var evt = document.createEvent("HTMLEvents");
    evt.initEvent(event, true, true ); // event type,bubbling,cancelable
    return !element.dispatchEvent(evt);
  }
}

/**
 * This will set the language and fire the event
 * @param lang
 * e.g onclick="changeLanguage('bn')"
 */
function changeLanguage(lang) {
  var jObj = $('.goog-te-combo');
  var db = jObj.get(0);
  jObj.val(lang);
  fireEvent(db, 'change');
}

 </script>


  <!--GOOGLE TRANSLATE-->
					
					<div style="display:none" align="center" id="google_translate_element"></div>
	
	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: '', includedLanguages:'en,ar,ru,de,sv'},
				'google_translate_element'
			);
		}
	</script>
	
		<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
		
	</script>
				
	
	
					<!--GOOGLE TRANSLATE END-->
            

    
    
    
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
            <h1><?php echo $gethotel;?></h1>
            
        </div>
    </section>
    
    <section class="hd-details">
        <div class="container">
            <div class = "hd-content">
                <div class = "hd-block-1 mt-4">
                    <div class = "hd-block-1-item py-4">
                       <!-- <h2 class = "fw-bold hd-title mb-3"><?php //echo $gethotel;?></h2>-->
                        <div class = "fw-bold hd-title mb-3 d-flex align-items-center hd-rating mt-1 mb-2">
                            <ul class = "list-unstyled d-flex me-2 mb-0">
                                <?php
                                for($i=0; $i<intval($sendcategory); $i++)
                                {
                                ?>
                                <li class = "me-1"><i class="bi bi-star-fill"></i></li>
                                
                                <?php
                                }
                                ?>
                            </ul>
                            <span><?php echo $stra;?> Star Hotel</span>
                        </div>
                        <div class = "d-flex align-items-center text-black-50 small">
                            <span class = "me-2">
                                <i class="bi bi-geo-alt"></i>
                            </span>
                            <span><?php echo $city;?>, <?php echo $country;?></span> <span> &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-danger">Explore the Destination</button>
</span>
                        </div>
                    </div>

                    <div class = "hd-block-1-item">
                        <div class = "hd-gallery">
                            <div class = "row px-0 mx-0">
                                
                                
                                
                                <div class = "col-md-6 px-0">
                                    
                                    
                                    
                                    <a href = "pco/Hotel Images/<?php echo $gethotel;?>/<?php echo $images[0];?>" data-lightbox = "hotelimgs" class = "hd-gallery-item d-block h-100 p-1">
                                        <img src = "pco/Hotel Images/<?php echo $gethotel;?>/<?php echo $images[0];?>" alt = "">
                                    </a>
                                </div>
                                
                                
                                
                                <div class = "col-md-6 px-0">
                                    <div class = "row px-0 mx-0">
                                        
                                        
                                        <?php
                                        for($i=1; $i<count($images); $i++)
                                        {
                                        ?>
                                        <div class = "col-6 px-0">
                                            <a href = "pco/Hotel Images/<?php echo $gethotel;?>/<?php echo $images[$i];?>" data-lightbox = "hotelimgs" class = "hd-gallery-item d-block p-1">
                                                <img src = "pco/Hotel Images/<?php echo $gethotel;?>/<?php echo $images[$i];?>" alt = "">
                                            </a>
                                        </div>
                                        
                                       <?php
                                        }
                                        ?>
                                       
                                       
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <!-- <div class = "hd-block-2 mt-4 d-flex align-items-center">
                    <div class = "hd-block-1-item w-100">
                        <ul class = "list-unstyled m-0 px-2 d-flex">
                            <li><a href = "#overview">Overview</a></li>
                            <li><a href = "#amenities">Amenities</a></li>
                            <li><a href = "#facilities">Facilities</a></li>
                            <!--<li><a href = "#location">Location</a></li>
                            <li><a href = "#">Rooms</a></li>
                            <li><a href = "#">Policies</a></li>
                        </ul>
                    </div>
                </div>-->

                <div class = "abc hd-block-3 my-3 p-4" id = "overview">
                    <div class = "hd-block-3-item">
                        <div class = "row">
                            <div class = "col-left col-lg-8">
                                <h4 class = "hd-block-item-title">About Hotel</h4>
                                <p>
                                   
                                   <?php echo $about;?>
                                   </p>
                            </div>
                            <div class = "col-right col-lg-4">
                                <div class = "ps-2 ps-lg-4">
                                    <span class = "d-block"><i class="bi bi-geo-fill me-2"></i><?php echo $city;?>, <?php echo $country.'  ';?></span>
                                    <span class = "d-block"><i class="bi bi-geo-fill me-2"></i><?php echo $address;?></span>
                                   <!-- <span class = "d-block"><i class="bi bi-geo-fill me-2"></i>Near by Abu Dhabi International Airport</span>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





<style>
.co{
    margin: 0 auto;
  width: 50%;
}
.aa{
    
}
    .abc{
        outline-color:#DC3545;
        outline-style: solid;
        
       
      
    }
    .styleme{
       margin-left:-20px;
        margin-top:50px;
    }
</style>

















                <div class = "hd-block-7 my-3" id = "location">
                    <div class = "hd-block-7-item py-4">
                       <!-- <h4 class = "hd-block-item-title">Policies</h4>-->
                        <div class = "hd-policies row">
                            <div class = "col-md-12 mb-4">
                                <div class = "  hd-policies-item p-3 h-100">
                                    <div class = "row">
                                        
                                            <span align='center' style='font-size:1.2em;' class = "fw-bold mb-2" >Highlights</span>
                                        
                                       
                                            <br/><br/><br/>
                                         <h4 align='center'> <q style='font-family:Snell Roundhand, cursive;'>  <?php echo $highlights;?></q></h4>
                                        
                                    </div>
                                </div>
                            </div>

                           
                            














               




                <div class = "hd-block-5 my-3 py-4" id = "amenities">
                    <div class = "hd-block-5-item">
                        <h4 class = "hd-block-item-title">Amenities</h4>
                       
                       <div class = "hd-amenities d-flex flex-wrap">
                        <!--<div class = "hd-amenities d-flex flex-wrap">-->
                            
                           
                           <!-- <div class = "d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/swimming-pool.png">
                                </span>
                                <span class = "hd-block-item-text">Swimming Pool</span>
                            </div>
                            <div class = "d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/air-conditioner.png">
                                </span>
                                <span class = "hd-block-item-text">Air conditioning</span>
                            </div>
                            <div class = "d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/wifi.png">
                                </span>
                                <span class = "hd-block-item-text">Free WiFi</span>
                            </div>
                            <div class = "d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/spa.png">
                                </span>
                                <span class = "hd-block-item-text">Spa</span>
                            </div>
                            -->
                            
                            <?php
                            if($parking=='Yes')
                            {
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/parking.png">
                                </span>
                                <span class = "hd-block-item-text">Parking</span><br/><br/><br/><br/>
                                <nonsense style='margin-top:-0px;' class='styleme'>
                                <?php
                                if($chargednotcharged=='Charged')
                                {
                                ?>
                                <br/><br/>
                                <?php echo $parkingcharges;?>
                                <?php
                                }
                                else if($chargednotcharged=='Free'){
                                 ?>
                                <br/><br/>
                                <?php echo 'Free'?>
                                <?php
                                }
                                ?>
                                </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
                            
                            
                            
                            
                            
                            
                            <?php
                            if($atm!='')
                            {
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/atm.png">
                                </span>
                                <span class = "hd-block-item-text">ATM</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                <?php echo $atm;?>
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
                            
                            
                            
                            
                            <?php
                            if($view!='')
                            {
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/window.png">
                                </span>
                                <span class = "hd-block-item-text">View</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                <?php echo $view;?>
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
                            
                            
                            
                            
                            
                            
                             <?php
                            if($pool=='Yes')
                            {
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/swimming-pool.png">
                                </span>
                                <span class = "hd-block-item-text">Pool</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                Yes
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
                            
                            
                            
                            <?php
                            
                            if(strpos($internetf, 'Wifi') !== false){
                           
                           
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/wifi.png">
                                </span>
                                <span class = "hd-block-item-text">WIFI</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                Yes
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>  
                            
                            
                            
                            
                            
                            
                             <?php
                            
                            if($cards!=''){
                           
                           
                            ?>
                            
                            <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/card.png">
                                </span>
                                <span class = "hd-block-item-text">Cards Accepted</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                Yes
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>  
                            
                            <?php 
                            if($agerestriction!='')
                            {
                                ?>
                             <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/age.png">
                                </span>
                                <span class = "hd-block-item-text">Age Restriction</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                <?php echo $agerestriction ."  Years";?>
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
                            
  <?php 
                            if($agerestriction!='')
                            {
                                ?>
                             <div class = "abc d-flex align-items-center">
                                <span class = "hd-block-item-icon me-1">
                                    <img src = "img/hotel-single/icons/roomservice.png">
                                </span>
                                <span class = "hd-block-item-text">Room Service</span><br/><br/><br/><br/>
                                 <nonsense class='styleme'>
                                From: <?php echo $roomservicefrom.' &nbsp;&nbsp;&nbsp;&nbsp; To: '.$roomserviceto;?>
                               </nonsense>
                            </div>
                            
                            <?php
                            }
                            ?>
                            
 
 
 

                            
</div>



                            
                            
                            
                            
                            
                            
                            
                            <!--
                            
                            <div class = "d-flex align-items-center">
                                <span class = "hd-block-item-icon me-2">
                                    <img src = "img/hotel-single/icons/restaurant.png">
                                </span>
                                <span class = "hd-block-item-text">Restaurant</span>
                            </div> 
                            -->
                       <!-- </div>-->
                    </div>

                    <div class = "hd-block-5-item p-4 mt-4">
                        <div class = "row mx-0 p-3">
                          
                          
                          
                          
                          
                           <?php
     if($generalf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">General Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$generalf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                           <?php
     if($mainf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Main Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$mainf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                        
                        
                        
                        
                        
                        
                        
                        
                        
                           <?php
     if($frontf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Front Desk</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$frontf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                        
               
                           <?php
     if($familyf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Family Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$familyf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                           
                        
                        
                  
                  
                  
                  
                  
                  
                           <?php
     if($sportsf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Sports Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$sportsf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                  
                           <?php
     if($cleaningf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Cleaning Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$cleaningf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                           <?php
     if($foodf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Food & Drinks</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$foodf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                           <?php
     if($businessf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Business Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$businessf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                           <?php
     if($internetf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Internet</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$internetf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                  
                  
                           <?php
     if($parkingf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Parking</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$parkingf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                  
                           <?php
     if($uniquef!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Unique Facilities</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$uniquef);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                           <?php
     if($safetyf!=''){
         ?>
                          
     
     
     
     
     
     
     
     <div class = "col-md-3 mb-2 px-0">
                                <div class = "hd-amenities-single me-5">
                                    <h6 class = "fw-bold mb-2">Safety & Security</h6>
                                    <ul class = "list-unstyled lh-lg">
                                        
     
     <?php
   
     $gf=explode(",",$safetyf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php if($x==0){echo ' ';}?><?php echo $gf[$x];?></li>
                                        
                                    
                     
                     <?php
     
     }
                     ?>
                          
                            

                        
                        </ul>
                                </div>
                            </div>
                            
                            <?php
     }
     ?>
                  
                  
                  
                  
                  
                  
                        
                        
                        
                        </div>
                    </div>
                </div>












                <div class = "abc hd-block-4 my-3 p-4">
                     <h4>Nearest</h4>
                    <div   class = "hd-block-4-item">
                        <div style='margin-left:35%;' class = "row gy-4">
                           
                            <div class = "col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-0 d-flex flex-column align-items-center text-center">
                                <div class = "hd-block-4-item-img">
                                    <img src = "img/hotel-single/vehicles.png" alt = "">
                                </div>
                                <span class = "small fw-bold mt-2 w-300"><?php echo $aa2[0]->plaintext;?>
                                
                                <?php 
                                if(strpos($aa2[0]->plaintext, 'Metro'))
                                {
                                    echo '';
                                }
                                else{
                                     echo 'Metro Station';
                                }
                                ?>
                                
                                </span>
                            </div>
                           
                         <!--   <div class = "col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-0 d-flex flex-column align-items-center text-center">
                                <div class = "hd-block-4-item-img">
                                    <img src = "img/hotel-single/map-icon.png" alt = "">
                                </div>
                                <span class = "small fw-bold mt-2 w-50">Located in heart of UAE</span>
                            </div>
                            -->
                            <div class = "col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-0 d-flex flex-column align-items-center text-center">
                                <div class = "hd-block-4-item-img">
                                    <img src = "img/hotel-single/airport.png" alt = "">
                                </div>
                                <span class = "small fw-bold mt-2 w-50"><?php echo $aa[0]->plaintext;?></span>
                            </div>
                         
                          <!--  <div class = "col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-0 d-flex flex-column align-items-center text-center">
                                <div class = "hd-block-4-item-img">
                                    <img src = "img/hotel-single/information-desk.png" alt = "">
                                </div>
                                <span class = "small fw-bold mt-2 w-50">Front desk [24-hour]</span>
                            </div>
                            <div class = "col-sm-6 col-lg-4 col-xl-3 col-xxl-2 px-0 d-flex flex-column align-items-center text-center">
                                <div class = "hd-block-4-item-img">
                                    <img src = "img/hotel-single/breakfast.png" alt = "">
                                </div>
                                <span class = "small fw-bold mt-2 w-50">Excellent breakfast</span>
                            </div>-->
                            
                        </div>
                    </div>
                </div>


















               <div class = "hd-block-6 my-3" id = "location">
                    <h4 class = "hd-block-item-title">Places to Visit</h4>
                    <div class = "hd-block-6-item p-4">
                        <div class = "row align-items-center justify-content-between">
                            <div class = "col-left col-lg-4 mb-4 mb-lg-0">
                                
                                
                                <!--asodad-->
            <style>  
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: white;

}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  
  font-size: 17px;

}

/* Change background color of buttons on hover */
.tab button:hover {
 
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #DC3545;
   color: white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


<div class="row tab">
 <div  style='text-align:left;' class='col-sm'> <button class="tablinks" onclick="openCity(event, 'London')">Attractions</button></div>
 <div  style='text-align:center;' class='col-sm'>   <button class="tablinks" onclick="openCity(event, 'Paris')">Areas</button></div>
   <div  style='text-align:right;'  class='col-sm'> <button class="tablinks" onclick="openCity(event, 'Tokyo')">Airports</button></div>
</div>
<div class='row'>
<div id="London" style='display:block;' class="active tabcontent">
    <ul class = "hd-nearby list-unstyled mx-0">
                     
                                
                                   
                                   <?php
                                   
$sqlb="SELECT * FROM destination WHERE country='$country' && city='$city'";
	
		$resultb = $conn->query($sqlb);

if ($resultb->num_rows > 0) {
  // output data of each row
  while($rowb = $resultb->fetch_assoc()) {
      
     
                            $atra=$rowb['attractions'];       
                                                                     
  }
}

$ultimateattractions=explode(",",$atra);



foreach($ultimateattractions as $vals)
{
    
    
    $aff2=str_replace(" ","+",$vals);
    
$aff=str_replace(" ","+",$vals);

$aff=$aff.'+'.$city;
   
   
   
                                   
$sqlb2="SELECT * FROM placesdistance WHERE fromm='$areafull' && name='$aff2'";
	
		$resultb2 = $conn->query($sqlb2);

if ($resultb2->num_rows > 0) {
    
  // output data of each row
  while($rowb2 = $resultb2->fetch_assoc()) {
      
      
       $sho=str_replace("+"," ",$rowb2['name']);
      
     ?>
     
        <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $sho;?>
                                        <p>
                                        <span><?php echo $rowb2['distance'];?></span>
                                    </li>
                                    
                                    
     <?php
               
                                                                     
  }
  
  
  
  
} 
    
    else
    
    {
    
    
	$postFields2= array(
		
		"loc1" => $areafull,
		"loc2" => $aff
		
	);


	$ch3 = curl_init();
	curl_setopt($ch3, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getattractions.php");
	curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch3, CURLOPT_POST, 1);
	curl_setopt($ch3, CURLOPT_POSTFIELDS, http_build_query($postFields2));
	curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie.txt");
	$response3 = curl_exec($ch3);
    //echo $response3;
	

    
    
    
         
			
$sqlnn ="INSERT INTO placesdistance (fromm,name, distance) VALUES ('$areafull','$aff2','$response3')";

 $resultnn = $conn->query($sqlnn);


if ($resultnn === TRUE) {
  
} else {
  echo "Error: " . $sqlnn . "<br>" . $conn->error;
}
    
    
    
    
    
    
   
    
    
    
?>
                               
                                    
       
                                    <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $vals;?>
                                        <p>
                                        <span><?php echo $response3;?></span>
                                    </li>
                                    
                                    
                                    <?php
    }
}
                                    ?>
                             
                                </ul>
</div>

<div id="Paris" class="tabcontent">
  <ul class = "hd-nearby list-unstyled mx-0">
                     
                                
                                   
                                   <?php
                                   
$sqlb="SELECT * FROM destination WHERE country='$country' && city='$city'";
	
		$resultb = $conn->query($sqlb);

if ($resultb->num_rows > 0) {
  // output data of each row
  while($rowb = $resultb->fetch_assoc()) {
      
     
                            $atra=$rowb['areas'];       
                                                                     
  }
}

$ultimateattractions=explode(",",$atra);



foreach($ultimateattractions as $vals)
{
    
    
    $aff2=str_replace(" ","+",$vals);
    
$aff=str_replace(" ","+",$vals);

$aff=$aff.'+'.$city;
   
   
   
                                   
$sqlb2="SELECT * FROM placesdistance WHERE fromm='$areafull' && name='$aff2'";
	
		$resultb2 = $conn->query($sqlb2);

if ($resultb2->num_rows > 0) {
    
  // output data of each row
  while($rowb2 = $resultb2->fetch_assoc()) {
      
      
       $sho=str_replace("+"," ",$rowb2['name']);
      
     ?>
     
        <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $sho;?>
                                        <p>
                                        <span><?php echo $rowb2['distance'];?></span>
                                    </li>
                                    
                                    
     <?php
               
                                                                     
  }
  
  
  
  
} 
    
    else
    
    {
    
    
	$postFields2= array(
		
		"loc1" => $areafull,
		"loc2" => $aff
		
	);


	$ch3 = curl_init();
	curl_setopt($ch3, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getattractions.php");
	curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch3, CURLOPT_POST, 1);
	curl_setopt($ch3, CURLOPT_POSTFIELDS, http_build_query($postFields2));
	curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie.txt");
	$response3 = curl_exec($ch3);
    //echo $response3;
	

    
    
    
         
			
$sqlnn ="INSERT INTO placesdistance (fromm,name, distance) VALUES ('$areafull','$aff2','$response3')";

 $resultnn = $conn->query($sqlnn);


if ($resultnn === TRUE) {
  
} else {
  echo "Error: " . $sqlnn . "<br>" . $conn->error;
}
    
    
    
    
    
    
   
    
    
    
?>
                               
                                    
       
                                    <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $vals;?>
                                        <p>
                                        <span><?php echo $response3;?></span>
                                    </li>
                                    
                                    
                                    <?php
    }
}
                                    ?>
                             
                                </ul>
</div>

<div id="Tokyo" class="tabcontent">
 <ul class = "hd-nearby list-unstyled mx-0">
                     
                                
                                   
                                   <?php
                                   
$sqlb="SELECT * FROM countrydata WHERE country='$country'";
	
		$resultb = $conn->query($sqlb);

if ($resultb->num_rows > 0) {
  // output data of each row
  while($rowb = $resultb->fetch_assoc()) {
      
     
                            $atra=$rowb['airports'];       
                                                                     
  }
}

$ultimateattractions=explode(",",$atra);



foreach($ultimateattractions as $vals)
{
    
    
    $aff2=str_replace(" ","+",$vals);
    
$aff=str_replace(" ","+",$vals);

$aff=$aff.'+'.$city;
   
   
   
                                   
$sqlb2="SELECT * FROM placesdistance WHERE fromm='$areafull' && name='$aff2'";
	
		$resultb2 = $conn->query($sqlb2);

if ($resultb2->num_rows > 0) {
    
  // output data of each row
  while($rowb2 = $resultb2->fetch_assoc()) {
      
      
       $sho=str_replace("+"," ",$rowb2['name']);
      
     ?>
     
        <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $sho;?>
                                        <p>
                                        <span><?php echo $rowb2['distance'];?></span>
                                    </li>
                                    
                                    
     <?php
               
                                                                     
  }
  
  
  
  
} 
    
    else
    
    {
    
    
	$postFields2= array(
		
		"loc1" => $areafull,
		"loc2" => $aff
		
	);


	$ch3 = curl_init();
	curl_setopt($ch3, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getattractions.php");
	curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch3, CURLOPT_POST, 1);
	curl_setopt($ch3, CURLOPT_POSTFIELDS, http_build_query($postFields2));
	curl_setopt($ch3, CURLOPT_COOKIEJAR, "cookie.txt");
	$response3 = curl_exec($ch3);
    //echo $response3;
	

    
    
    
         
			
$sqlnn ="INSERT INTO placesdistance (fromm,name, distance) VALUES ('$areafull','$aff2','$response3')";

 $resultnn = $conn->query($sqlnn);


if ($resultnn === TRUE) {
  
} else {
  echo "Error: " . $sqlnn . "<br>" . $conn->error;
}
    
    
    
    
    
    
   
    
    
    
?>
                               
                                    
       
                                    <li class = "d-flex align-items-center justify-content-between small pb-2">
                                        <p class = "mb-0">
                                            <span class = "me-2"><i class="bi bi-geo-alt-fill"></i></span> <?php echo $vals;?>
                                        <p>
                                        <span><?php echo $response3;?></span>
                                    </li>
                                    
                                    
                                    <?php
    }
}
                                    ?>
                             
                                </ul>
</div>


</div>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
                                <!--akjsdsadjsadjasd-->
                             
                                
                                
                                
                                
                                
                                
                                
                                
                            </div>
                            <?php// echo $responsemap;?>
                            <div class = "col-right col-lg-6">
                                
                                <div class = "hd-map">
                                  
                                  <style>
                                      iframe {
                                          
                                      }
                                  </style>
                                  <div style='text-align:center;' id='lda'>
                                  <img style='width:50px;' src='loadingmap.gif'>
                                  <h5>Loading Map...</h5>
                                  </div>
                               <a href='https://www.google.com/maps/place/<?php echo $gpps;?>' target="_blank" rel="noopener"> <iframe id='ifr' scrolling="no" src="checkiframe.php?hotel=<?php echo $hotel;?>&&country=<?php echo $country;?>&&city=<?php echo $city;?>" style='display:none; pointer-events: none; width:100%; height:300px;'></iframe></a>
                                 
                                <!-- <a href='#' id='speechOutputLink'> <h2 style='color:white;' align='center' id='mapy' onclick='mapy()'>Show Map</h2></a>-->
                                
                                
                                
                                <script>
const myTimeout = setTimeout(myGreeting, 5000);

function myGreeting() {
    
   document.getElementById("lda").style.display='none';
  document.getElementById("ifr").style.display='block';
}
</script>

                                
                                
                                  
                             <script>
                                 $('a#speechOutputLink').on('click', function(e) {
    e.preventDefault();

});
                             </script>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                


 <?php
                            if($pool=='Yes')
                            {
                            ?>

 <h4 class = "hd-block-item-title">Pools</h4>
 
 <ul class = "list-unstyled lh-lg">
 <?php
 
 
 
$sqlpool="SELECT * FROM pools WHERE hotel='$gethotel' && country='$country' && city='$city'";
	
		$resultpool = $conn->query($sqlpool);

if ($resultpool->num_rows > 0) {
  // output data of each row
  while($rowpool = $resultpool->fetch_assoc()) {
      ?>
      
        
                           <li><span class = "me-3"><i class="bi bi-check-circle-fill"></i></span><?php echo $rowpool['poolname'].'  ('.$rowpool['inorout'].')';?></li>
                           
      <?php
      
      
  }
}
 
 
 ?>

</ul>

<?php
}
?>











<!--

<section class="searchlist">
    <h4 class = "hd-block-item-title">Rooms</h4>
        <div class="container p-0">
           
            <div class="searchitem">
              
                <div  style="overflow:scroll; height:400px;" class="other_room_list">
                    
                    
                    
                <?php
                $n=0;
                
$sqlr="SELECT * FROM hotelsInventorydatabase WHERE hotel='$gethotel' && country='$country' && city='$city'";
	
		$resultr = $conn->query($sqlr);

if ($resultr->num_rows > 0) {
  // output data of each row
  while($rowr = $resultr->fetch_assoc()) {
      
     $roomscancellation=$rowr['cancellationpolicy'];
     $inroomf=$rowr['inroomfacilities'];
     $kitchenf=$rowr['kitchenfacilities'];
     $privatebathroomf=$rowr['privatebathroomfacilities'];
     $discountedf=$rowr['discountedfacilities'];
     $complimentaryf=$rowr['complimentaryfacilities'];
     
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
                ?>
                    
                    
                    
                    <div class="room_box">
                       
                       
                             
                <?php
                $rt=$rowr['type'];
                
                
$sqlrm="SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$gethotel' && country='$country' && location='$city' &&type='$rt'";
	
		$resultrm = $conn->query($sqlrm);

if ($resultrm->num_rows > 0) {
  // output data of each row
  while($rowrm = $resultrm->fetch_assoc()) {
      $img=$rowrm['image'];
      
                ?>
                   
                       
                       
                        <div style='height:100px; width:100px;' class = "room_box_img">
                         
                         
                  <a href = "pco/Room Uploads/<?php echo $gethotel;?>/<?php echo $rt;?>/<?php echo $img;?>" data-lightbox = "hotelimgs" class = "hd-gallery-item d-block h-100 p-1">
                                        <img src = "pco/Room Uploads/<?php echo $gethotel;?>/<?php echo $rt;?>/<?php echo $img;?>" alt = "">
                                    </a>          
                         
                         
                         
                         
                           
                        </div>
                        
                        
                        <?php
  }
}
?>
                        
                        
                        <div class="inner_room_meta">
                            <div class="room_metas">
                                <div class="room_type">
                                    <a href = "#" class = "text-black" data-bs-toggle = "modal" data-bs-target = ".detailsModal"><?php echo $rowr['type'];?></a>
                                </div>
                                <span class="status text-capitalize mt-2">available</span>
                                <form class="row g-3">
                                    <br/>
                                   <?php echo $rowr['singledescription'];?>
                                </form>
            <a href='#' style='float:right;' class='theme_btn btn active btn-outline-primary' data-bs-toggle = "modal" data-bs-target = ".detailsModalR<?php echo $n;?>">Amenities</a>
                            </div>
                          
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
    <div class="modal fade detailsModalR<?php echo $n;?>" tabindex="-1" aria-labelledby="detailsModalR" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Amenities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                      
                      
                       <div class='container'><div class='row'>
                            
                            
                             <?php
     if($inroomf!=''){
         ?>
                            <div class='col-sm'>
                                <label>In Room:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$inroomf);
     
     for ($p = 0; $p < count($gf); $p++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$p];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                        
                        
                         <?php
                         }
                          if($kitchenf!=''){
         ?>
                            <div class='col-sm'>
                                <label>Kitchen:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$kitchenf);
     
     for ($p = 0; $p < count($gf); $p++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$p];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                         
                         <?php
                         }
                          if($privatebathroomf!=''){
                         ?>
                         
                         
                         
                          <div class='col-sm'>
                                <label>Private Bathroom:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$privatebathroomf);
     
     for ($p = 0; $p < count($gf); $p++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$p];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                         
                         <?php
                         }
                     if($discountedf!=''){      
                         ?>
                         
                        <div class='col-sm'>
                                <label>Discounts:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$discountedf);
     
     for ($p = 0; $p < count($gf); $p++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$p];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                           <?php
                         }
                     if($complimentaryf!=''){      
                         ?>
                         
                         
                          
                        <div class='col-sm'>
                                <label>Complimentary:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$complimentaryf);
     
     for ($p = 0; $p < count($gf); $p++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$p];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                           <?php
                         }
                         ?>
                         
                         
                         
                         
                         
                         
                         
                         
                         </div></div>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
           
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php
                    
                    $n=$n+1;
  }
}
?>
                    
                    
                    
                    
                    
                    
                    
                    
                  
                </div>
            </div>
           
        </div>
    </section>
-->



























                            
                            
                            
                        </div>
                    </div>
                </div>
                
                
                
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

     <style>
                        
    
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #DC3545; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
                    </style>
   
   
</div>

     <script>
                                      
                                      

function mapy() {
   // alert();
    
    var ifr=document.getElementById('ifr');
    ifr.style.display='block';
    var mapy=document.getElementById('mapy');
    mapy.remove();
    
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