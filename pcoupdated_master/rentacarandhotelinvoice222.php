<?php

session_start();
include 'db_connection.php';



  
$flightnumb1 = $_SESSION['flightnumb1'];
$flightnumb2 = $_SESSION['flightnumb2'];
$pickordelivery = $_SESSION['pickordelivery'];




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









$tax='5%';

$ipcountry= $xml->geoplugin_countryName ;


if($ipcountry=='United Arab Emirates')
{
//$tax='20%';
}
else{
   // $tax='';
}


$uniquenumber=rand(10,100000000);

$hotel= $_SESSION['hotel'];
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
 
 $bfincluded=  $_SESSION['bfincluded'];
 $lunincluded=  $_SESSION['lunincluded'];
 $dinincluded=  $_SESSION['dinincluded'];
 $bedincluded=  $_SESSION['bedincluded'];
                             
               
       
           
            
       $alladults= $_SESSION['alladults'];
        $roomtypesall= $_SESSION['roomtypesall'];
         $totalamountt=$_SESSION['totalamount'];
     $allchildren= $_SESSION['allchildren'];
     


if($tax=='5%')
{
    
     $_SESSION['tax']='5%';
     $taxvalue=intval($totalamountt)/100*5;
   
     $totalamount=intval($totalamountt)+intval($taxvalue);
     
     $_SESSION['totalamounty']=$totalamount;
}
else{
    
     $_SESSION['tax']='0%';
    $totalamount=$totalamountt;
    $_SESSION['totalamounty']=$totalamount;
}
     
     
     
   
   
   
   
   
   
   
   $idza= $_SESSION['subtractid'];
   
   foreach($idza as $id)
   {
       //echo $id;
   }
   
   //$idza= array_unique($_SESSION['subtractid']);
   
   
   
   //$_SESSION['subtractid']= $idza;
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  //Rent a Car
  
  
  
  
  
  
 $aid=$_SESSION['aid'];

 $totaldaysrent= $_SESSION['totaldaysrent'];

      
   $titlerent= $_SESSION['title2'];
     $fnamerent= $_SESSION['fname2'];
      $lnamerent= $_SESSION['lname2'];
       $emailrent= $_SESSION['email2'];
       $phonerent=  $_SESSION['phone2'];
       $nationalityrent=  $_SESSION['nationality2'];
       $remarksrent=  $_SESSION['remarks2'];
 
 $totalpricewithvatrent=$_SESSION['totalpricewithvat2'];

  
 $dropofflocation=$_SESSION['dropofflocation'];
 $dropofftime=$_SESSION['dropofftime'];
 $dropoffdate=$_SESSION['dropoffdate'];
 $pickuplocation=$_SESSION['pickuplocation'];
 $pickupdate=$_SESSION['pickupdate'];
 $pickuptime=$_SESSION['pickuptime'];
  
  
  
  
  
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
    <title>Booking Invoice</title>
</head>
<body>
    
    
    
    
    
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

                  <div class = "navbar-contact-info">
                     <a href='tel:+971507142748'> <img src = "img/header-contact-img.png"></a>
                  </div>
              </div>
            </div>
          </nav>
    </header>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <div class = "main-holder invo-pg">
    <section class="page_title">
        <div class="container">
            <h1>Billing Information</h1>
        </div>
    </section>
    
    <section class="invo mt-5 mb-3">
        <div class="container invo-wrapper px-3 d-flex flex-column">
            <div class = "invo-top d-md-flex align-items-center justify-content-between">
                <div class = "col-left">
                    <img src = "img/logo.png" alt = "">
                </div>
                <div class = "col-right">
                    <ul class = "list-unstyled mx-0">
                        <li>Sheik Zayad Road, Dubai, UAE</li>
                        <li>Phone: +971-474848993, +971-474848993 </li>
                        <li>Email: support@pcoconnect.com</li>
                    </ul>
                </div>
            </div>

            <div class = "html invo-body mt-3">
                <div class = "invo-body-wrapper">
                    <div class = "invoice-top d-flex justify-content-between align-items-center py-3">
                        <div class = "col-left">
                            <p class = "mb-0"><span class = "fw-bold">Invoice Number:</span> <span><?php echo $uniquenumber;?></span></p>
                        </div>
                        <div class = "col-mid">
                            <p class = "fw-bold text-uppercase mb-0">proforma invoice</p>
                        </div>
                        <div class = "col-right">
                            <p class = "mb-0"><span class = "fw-bold">Issue Date:</span> <span><?php echo date("d/m/Y");?></span></p>
                        </div>
                    </div>
    <h4 align='center'>Hotel Booking</h4>
                    
                    
                    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Check In</div>
                            <div>Check Out</div>
                            <div>Nights</div>
                            <div>Avg/Night</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Hotel: <?php echo $hotel;?></div>
                              
                              
                        <?php
                        $n=0;
                        foreach($roomtypesall as $rts)
                        {
                        ?>
                             
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <?php echo $rts;?><br>
                                        <?php
                                       
                                            echo 'Adults: '.$alladults[$n].'&nbsp;&nbsp;&nbsp;';
                                        
                                       
                                            echo 'Children: '.$allchildren[$n];
                                        
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                        
                                        <?php
                                        
                                        if($bfincluded!='')
                                        {?>
                                        <br/><?php
                                            echo 'Breakfast: '.$bfincluded[$n];
                                        }
                                        ?>
                                       
                                        <?php
                                        
                                        if($lunincluded!='')
                                        {?>
                                        <br/><?php
                                            echo 'Lunch: '.$lunincluded[$n];
                                        }
                                        ?>
                                       
                                        <?php
                                        
                                        if($dinincluded!='')
                                        {?>
                                        <br/><?php
                                            echo 'Dinner: '.$dinincluded[$n];
                                        }
                                        ?>
                                       
                                        <?php
                                        
                                        if($bedincluded!='')
                                        {
                                            ?>
                                        <br/><?php
                                            echo 'Extra Bed: '.$bedincluded[$n];
                                        }
                                        ?>
                                    </div>
                                    
                                  
                                        
                                        
                                        
                                    <div class = "text-center"><?php echo $sdate;?></div>
                                    <div class = "text-center"><?php echo $edate;?></div>
                                    <div class = "text-center"><?php echo $totaldays;?></div>
                                    <div class = "text-center"><?php echo intval($showpaisay[$n])/intval($totaldays);?></div>
                                    <div class = "text-center"><?php echo $showpaisay[$n];?></div>
                                </div>
                                
                                <?php
                                
                                $n=$n+1;
                        }
                        ?>
                                
                            </div>
    
              <!--          
              
              <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Transfer: 7 Seater Car</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>From:</b> Dubai Airport </span>
                                        <span><b>To:</b> Hotel Hyatt Regency</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Tours: Miracle Garden</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Trip:</b>  Miracle garden with ticket</span>
                                        <span><b>Packs:</b> 7</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Meet & Greet</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Packs: </b>   Family Pack Service (Marhabba) on Arrival</span>
                                        <span><b>Packs:</b> Family Pack Service (Marhabba) on Departure</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
                            
                            -->
                            
                            
                        </div>
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words: </span>
                            <?php
echo numberTowords("$totalamount");?></div>
                            <div class = "fw-bold">Grand Total <br/></div>
                            <div class = "fw-bold"><?php 
                           
                            echo 'AED '. $totalamount;
                            ?>
                           
                           </div>
                        </div>
                        
                         <?php
                             if($tax=='5%')
                                {
                                    echo '<small style="float:right;">VAT 5% Applicable</small>';
                                }
                            ?>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <h4 align='center'>Rent a Car Booking</h4>
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Pickup Location/Date/Time</div>
                            <div>Dropoff Location/Date/Time</div>
                            <div>Days</div>
                            <div>Avg/Day</div>
                            <div>Total AED</div>
                        </div>
    
                        <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Car: </div>
                              
                              
                       
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                    <?php echo 'Brand: '.$_SESSION['brand'].'<br/>Model: '.$_SESSION['model'].'<br/>Year: ('.$_SESSION['year'].')';?>    
                                    </div>
                                    
                                  
                                        
                                        
                                        
                                    <div class = "text-center"><?php echo $_SESSION['pickuplocation'].'<br/>'.$_SESSION['pickupdate'].'<br/>'.$_SESSION['pickuptime'];?></div>
                                    <div class = "text-center">
                                        <?php echo $_SESSION['dropofflocation'].'<br/>'.$_SESSION['dropoffdate'].'<br/>'.$_SESSION['dropofftime'];?>
                                    </div>
                                    <div class = "text-center"><?php echo $totaldays;?></div>
                                    <div class = "text-center"><?php echo intval($_SESSION['totalpricewithvat'])/intval($totaldays);?></div>
                                    <div class = "text-center"><?php echo $_SESSION['totalpricewithvat2'];?></div>
                                </div>
                                
                     
                            </div>
    
              <!--          
              
              <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Transfer: 7 Seater Car</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>From:</b> Dubai Airport </span>
                                        <span><b>To:</b> Hotel Hyatt Regency</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Tours: Miracle Garden</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Trip:</b>  Miracle garden with ticket</span>
                                        <span><b>Packs:</b> 7</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
    
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Meet & Greet</div>
                                <div class = "invoice-tbl-item-dat">
                                    <div>
                                        <span><b>Packs: </b>   Family Pack Service (Marhabba) on Arrival</span>
                                        <span><b>Packs:</b> Family Pack Service (Marhabba) on Departure</span> 
                                    </div>
                                    <div class = "text-center">25 Jul, 2022</div>
                                    <div class = "text-center">5 Aug, 2022</div>
                                    <div class = "text-center">4</div>
                                    <div class = "text-center">500.00</div>
                                    <div class = "text-center">2000.00</div>
                                </div>
                            </div>
                            
                            -->
                            
                            
                        </div>
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words: </span>
                            <?php
                            $totalpricewithvat2=$_SESSION['totalpricewithvat2'];
echo numberTowords("$totalpricewithvat2");?></div>
                            <div class = "fw-bold">Grand Total <br/></div>
                            <div class = "fw-bold"><?php 
                           
                            echo 'AED '. $totalpricewithvat2;
                            ?>
                           
                           </div>
                        </div>
                        
                         <?php
                             if($tax=='5%')
                                {
                                    echo '<small style="float:right;">VAT 5% Applicable</small>';
                                }
                            ?>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div> 





<?php

function numberTowords($num)
{

$ones = array(
0 =>"ZERO",
1 => "ONE",
2 => "TWO",
3 => "THREE",
4 => "FOUR",
5 => "FIVE",
6 => "SIX",
7 => "SEVEN",
8 => "EIGHT",
9 => "NINE",
10 => "TEN",
11 => "ELEVEN",
12 => "TWELVE",
13 => "THIRTEEN",
14 => "FOURTEEN",
15 => "FIFTEEN",
16 => "SIXTEEN",
17 => "SEVENTEEN",
18 => "EIGHTEEN",
19 => "NINETEEN",
"014" => "FOURTEEN"
);
$tens = array( 
0 => "ZERO",
1 => "TEN",
2 => "TWENTY",
3 => "THIRTY", 
4 => "FORTY", 
5 => "FIFTY", 
6 => "SIXTY", 
7 => "SEVENTY", 
8 => "EIGHTY", 
9 => "NINETY" 
); 
$hundreds = array( 
"HUNDRED", 
"THOUSAND", 
"MILLION", 
"BILLION", 
"TRILLION", 
"QUARDRILLION" 
); /*limit t quadrillion */
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr,1); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){
	
while(substr($i,0,1)=="0")
		$i=substr($i,1,5);
if($i < 20){ 
/* echo "getting:".$i; */
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
}
} 
if($decnum > 0){
$rettxt .= " and ";
if($decnum < 20){
$rettxt .= $ones[$decnum];
}elseif($decnum < 100){
$rettxt .= $tens[substr($decnum,0,1)];
$rettxt .= " ".$ones[substr($decnum,1,1)];
}
}
return $rettxt;
}


?>















           <!-- <div class = "invo-bottom mt-3">
                <form class = "invo-pay">
                    <div class = "row mx-0">
                        <div class = "col-md-6 col-lg-4 px-0 pe-3">
                            <div class = "col-left py-4 px-3 h-100">
                                <p class = "fw-bold">Select a payment method</p>
                                <div class = "mb-3">
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Pay from my Account</span>
                                </div>
                                <div class="mb-3">
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Pay Later (Bank Transfer)</span>
                                </div>
                                <div>
                                    <input type="radio" class="checkbox-round" name = "payment_method" />
                                    <span class = "ms-2 fw-bold">Credit Card</span>
                                </div>
                            </div>
                        </div>
                        <div class = "col-md-6 col-lg-8 px-0 ps-3">
                            <div class = "col-right h-100">
                                <p class = "fw-bold px-3 py-2 text-white">Select a payment method</p>
                                <div class = "px-4 pb-3">
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Available Balance:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Transaction Amount:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                        <span>Balance after Payment:</span>
                                        <span class = "ms-2 fw-bold">AED 576.00</span>
                                    </div>
                                    <div class = "form-check mt-3">
                                        <input type = "checkbox" class = "form-check-input"> 
                                        <label class="form-check-label" for="">I agree to pay from my Account</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class = "invo-policy my-5">
                    <h6 class = "mb-4">Cancellation Policy</h6>
                    <div class = "policy-item mb-4">
                        <p class = "fw-bold policy-item-title">1.1 Orders cancellation fee - Standard fee</p>
                        <ul class = "list-unstyled">
                            <li>1.1.1 Cancelling 45 days or more before departure: the customer is charged a service fee of AUD 20.</li>
                            <li>1.1.2 Cancelling between 44 and 21 days before departure: the customer is charged a service fee of AUD 40. </li>
                        </ul>
                    </div>
                    <div class = "policy-item mb-4">
                        <p class = "fw-bold policy-item-title">1.2 Orders cancellation fee - Orders with the Timetravels flexible cancellation fee</p>
                        <p>If you have selected the Timetravels flexible cancellation fee when booking the trip, the cancellation fees are:</p>
                        <ul class = "list-unstyled">
                            <li>1.2.1 Cancelling 45 days or more before departure: the customer is charged a discounted service fee of AUD12.</li>
                            <li>1.2.2 Cancelling between 44 and 21 days before departure: the customer is charged a discounted service fee of AUD12. </li>
                            <li>1.2.3 Cancelling between 20 and 7 days before departure: the customer is charged a service fee of 40% of the total order value.</li>
                            <li>1.2.4a Cancelling between 6 and 3 days before departure: the customer is charged a service fee of 75% of the total order value.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label" for="">I Confirm I have read the Cancellation Policy.</label>
            </div>
            
            
            -->
            
            
            
            <br/>
            
        </div>
         <a onclick="convert()" href = "#" style='margin-left:100px; float:left; width:200px;' class = "btn theme_btn active btn-secondary">Print Invoice</a>
        <form action='bookingconfirmedhotelandrentacar.php' method='POST'>
        <input type='submit' name='submit' style='margin-right:100px; float:right; width:200px;' class = "btn theme_btn active btn-secondary" value='Continue'>
        </form>
       <br/><br/><br/>
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
 




<!--html2canvas-->

    <script src="  https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>
   
    <style>
        .result {
            display: none;
        }
 
        canvas {
            border: 2px solid blue;
        }
    </style>

  
        
   
    <div class="result">
        <a id='myCheck' href="">abc</a>
        <hr>
 
    </div>
    <script>
        const div = document.querySelector(".html");
        const result = document.querySelector(".result");
 
        function convert() {
            html2canvas(div).then(function (canvas) {
                result.appendChild(canvas);
                let cvs = document.querySelector("canvas");
                let dataURI = cvs.toDataURL("image/jpeg");
                let downloadLink = document.querySelector(".result>a");
                downloadLink.href = dataURI;
                downloadLink.download = "div2canvasimage.jpg";
                //console.log(dataURI);
                document.getElementById("myCheck").click();
            });
            //result.style.display='block';
            //document.getElementById("myCheck").click();
         //document.getElementById("downloadmee").click();
 
        }
    </script>

<!--end-->
    
    
    
    
    
    
    </div>
    
    
    
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>

</body>
</html>