<?php
session_start();
include 'db_connection.php';


$_SESSION['checkingroomtype']=array();

$_SESSION['subtractid']=array();

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







$ipadr=getRealIpAddr();





















$roomsrecieved=$_SESSION['sendroomnumbers'];

$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];

$eve=$_SESSION['event'];






























$gcountry=$_SESSION['country'];
$gcity=$_SESSION['city'];
$gevent=$_SESSION['event'];
$ghotel=$_SESSION['hotel'];
$gsdate=$_SESSION['sdate'];
$gedate=$_SESSION['edate'];

$gsendroomnumbers=$_SESSION['sendroomnumbers'];

$gcounter=$_SESSION['counter'];

$gsendcategory=$_SESSION['sendcategory'];




if($gsendcategory=='')
{
    
   


$sqlnewb="SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && name='$hn'";
	
		$resultnewb = $conn->query($sqlnewb);

if ($resultnewb->num_rows > 0) {
  // output data of each row
  while($rownewb = $resultnewb->fetch_assoc()) {
      
      $gsendcategory=$rownewb['star'];
      $_SESSION['sendcategory']=$rownewb['star'];
      
  }
}
    
}

















        
        
        
          $st=$_SESSION['sendcategory'].' '.'star';
$sqltax = "SELECT * FROM taxnames WHERE country='$cn' && city='$ln' && star='$st' ";
 
 
 $resulttax=$conn->query($sqltax);
 

 
while($rowtax=mysqli_fetch_assoc($resulttax)){
    
    $taxnametax=explode(",",$rowtax['taxname']);
    $percentagetax=explode(",",$rowtax['percentage']);
    $choicetax=explode(",",$rowtax['choice']);
    
}
















$nmbrooms=$_SESSION['sendroomnumbers'];



	$rooms=$_SESSION['roomnmb'];
		
	$a0=(int)$_SESSION['adults'];
	$c0=(int)$_SESSION['children'];
	
	$a1=(int)$_SESSION['adult1'];
	$c1=(int)$_SESSION['children1'];
	
	$a2=(int)$_SESSION['adult2'];
	$c2=(int)$_SESSION['children2'];
	
	$a3=(int)$_SESSION['adult3'];
	$c3=(int)$_SESSION['children3'];
	
	$a4=(int)$_SESSION['adult4'];
	$c4=(int)$_SESSION['children4'];
	
	$a5=(int)$_SESSION['adult5'];
	$c5=(int)$_SESSION['children5'];
	
	$a6=(int)$_SESSION['adult6'];
	$c6=(int)$_SESSION['children6'];
	
	$a7=(int)$_SESSION['adult7'];
	$c7=(int)$_SESSION['children7'];
	
	$a8=(int)$_SESSION['adult8'];
	$c8=(int)$_SESSION['children8'];
	
	$a9=(int)$_SESSION['adult9'];
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
	
	
	$biggest=0;
	
	
	
	
	
	
	
	
	if($max0>$biggest){
	    $biggest=$max0;
	}
		if($max1>$biggest){
	    $biggest=$max1;
	}	if($max2>$biggest){
	    $biggest=$max2;
	}	if($max3>$biggest){
	    $biggest=$max3;
	}	if($max4>$biggest){
	    $biggest=$max4;
	}	if($max5>$biggest){
	    $biggest=$max5;
	}	if($max6>$biggest){
	    $biggest=$max6;
	}	if($max7>$biggest){
	    $biggest=$max7;
	}	if($max8>$biggest){
	    $biggest=$max8;
	}	if($max9>$biggest){
	    $biggest=$max9;
	}
	
	
	
	$_SESSION['biggest']=$biggest;



$today=date("Y-m-d");

$roomsnames=array();
$breakfastt=array();





$roomsnumbers=array();
$roomsdoubledescription=array();
$roomssingledescription=array();
$roomsimages='';

$roomscancellationnames=array();
$roomscancellation=array();
$inroomf=array();
$kitchenf=array();
$privatebathroomf=array();
$discountedf=array();
$complimentaryf=array();

$adultsallowed=array();
$childrenallowed=array();
$extrabedsallowed=array();


$allhotels=array();
$allcountries=array();
$allcities=array();
$selectedhotels=array();
$selectedcountries=array();
$selectedcities=array();
$allstars=array();
$selectedstars=array();
$selecteddesi=array();

$alldesi=array();



if($cn!='' && $ln!='' && $gsendcategory!='')
{
    

$sqlnew="SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && star='$gsendcategory'";


}

else if($cn!='' && $ln!='' && $gsendcategory=='')
{
    
    $sqlnew="SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln'";
}


else if($cn!='' && $ln=='' && $gsendcategory!='')
{
    
    
    
    
    
    $sqlnew="SELECT * FROM hotelsdatabase WHERE country='$cn' && star='$gsendcategory'";
}


else if($cn!='' && $ln=='' && $gsendcategory=='')
{
    
    
    
    
    $sqlnew="SELECT * FROM hotelsdatabase WHERE country='$cn'";
}

//$sqlnew="SELECT * FROM hotelsdatabase WHERE (country='$cn' && city='$ln' && star='$gsendcategory') || (country='$cn' && star='$gsendcategory') || (country='$cn' && city='$ln')";









	
		$resultnew = $conn->query($sqlnew);

if ($resultnew->num_rows > 0) {
  // output data of each row
  while($rownew = $resultnew->fetch_assoc()) {
      
      array_push($allcountries, $rownew['country']);
      array_push($allcities, $rownew['city']);
      
      array_push($allhotels, $rownew['name']);
      array_push($alldesi, $rownew['description']);
       array_push($allstars, $rownew['star']);
      
  }
}


$nz=0;


$allroomtypess=array();
$nde=0;
foreach($allhotels as $hot){
    
    if($hot==$_SESSION['hotel'])
    {
        
    }
    
    else
    {
    
    
    
    
    
    
  $typess=array();

  
    $hotyes=0;
    
    
 
$sqlrooms2 ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hot' && country='$allcountries[$nde]' && city='$allcities[$nde]'";
	
		$resultrooms2 = $conn->query($sqlrooms2);

if ($resultrooms2->num_rows > 0) {
  // output data of each row
  while($rowrooms2 = $resultrooms2->fetch_assoc()) {
      
      
      $countrums2=0;
      $rname2=$rowrooms2['type'];
      
     
      $sqlavail2 ="SELECT * FROM roomnumbers WHERE hotel='$hot' && country='$allcountries[$nde]' && location='$allcities[$nde]' && name='$rname2' && dates>=$today";
	
		$resultavail2 = $conn->query($sqlavail2);

if ($resultavail2->num_rows > 0) {
  // output data of each row
  while($rowavail2 = $resultavail2->fetch_assoc()) {
      
      
      $countrums2=$countrums2+(int)$rowavail2['number'];
     
     
      
      
      
  }
}
if($countrums2>0){
    
    $ao2=intval($rowrooms2['doubleadultoccupancy']);
    $co2=intval($rowrooms2['doublechildoccupancy']);
    $seb2=intval($rowrooms2['doubleextrabedsallowed']);
   
   $addme2=$ao2+$co2+$seb2;
    if($biggest<=$addme2){
        
        
        
        $hotyes=1;
        
        
        
  array_push($typess , $rowrooms2['type']);         
    
   
        
        
        
        
        
        
        
        
        
        
    
   //  array_push($roomsnames,$rowrooms['type']);  
       //   array_push($roomssingledescription,$rowrooms['singledescription']); 
     
     
     
        //   array_push($adultsallowed,$rowrooms['doubleadultoccupancy']);  
         //   array_push($childrenallowed,$rowrooms['doublechildoccupancy']);  
          //   array_push($extrabedsallowed,$rowrooms['doubleextrabedsallowed']);  
     
     
     
     
     
       //   array_push($roomscancellation,$rowrooms['cancellationpolicy']);
     //     array_push($inroomf,$rowrooms['inroomfacilities']);
      //    array_push($kitchenf,$rowrooms['kitchenfacilities']);
      //    array_push($privatebathroomf,$rowrooms['privatebathroomfacilities']);
      //    array_push($discountedf,$rowrooms['discountedfacilities']);
      //    array_push($complimentaryf,$rowrooms['complimentaryfacilities']);
     
     
     
       //   array_push($roomsnumbers,$countrums); 
     
     
       //   $bvb=$rowrooms['type'];
     
          
     
    }   
}
    
  
  }
}




  


if($hotyes==1){
    
    
   //echo $allcountries[$nde];
    
    
    array_push($selectedhotels,$hot);
    array_push($selectedcountries,$allcountries[$nde]);
    array_push($selectedcities,$allcities[$nde]);
    array_push($selecteddesi,$alldesi[$nde]);
    array_push($selectedstars,$allstars[$nde]);
    array_push($allroomtypess,array($hot =>  $typess));
 
    
 
 
 
}
 
 
 
 
 
 

$nz=$nz+1;    

}
    $nde=$nde+1;
}








//actual

$sqlrooms ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hn' && country='$cn' && city='$ln'";
	
		$resultrooms = $conn->query($sqlrooms);

if ($resultrooms->num_rows > 0) {
  // output data of each row
  while($rowrooms = $resultrooms->fetch_assoc()) {
      
      $countrums=0;
      $rname=$rowrooms['type'];
     
      $sqlavail ="SELECT * FROM roomnumbers WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rname' && dates>=$today";
	
		$resultavail = $conn->query($sqlavail);

if ($resultavail->num_rows > 0) {
  // output data of each row
  while($rowavail = $resultavail->fetch_assoc()) {
      
      
      $countrums=$countrums+(int)$rowavail['number'];
     
      
      
      
  }
}
if($countrums>0){
    
    $ao=intval($rowrooms['doubleadultoccupancy']);
    $co=intval($rowrooms['doublechildoccupancy']);
    $seb=intval($rowrooms['doubleextrabedsallowed']);
   
   $addme=$ao+$co+$seb;
    if($biggest<=$addme){
    
     array_push($roomsnames,$rowrooms['type']);  
     
     array_push($roomssingledescription,$rowrooms['singledescription']); 
     
     
     
      array_push($adultsallowed,$rowrooms['doubleadultoccupancy']);  
       array_push($childrenallowed,$rowrooms['doublechildoccupancy']);  
        array_push($extrabedsallowed,$rowrooms['doubleextrabedsallowed']);  
     
     
     
     
     array_push($roomscancellationnames,$rowrooms['cancellationpoliciesnames']);
     array_push($roomscancellation,$rowrooms['cancellationpolicy']);
     array_push($inroomf,$rowrooms['inroomfacilities']);
     array_push($kitchenf,$rowrooms['kitchenfacilities']);
     array_push($privatebathroomf,$rowrooms['privatebathroomfacilities']);
     array_push($discountedf,$rowrooms['discountedfacilities']);
     array_push($complimentaryf,$rowrooms['complimentaryfacilities']);
     
     
     
     array_push($roomsnumbers,$countrums); 
     
     
     $bvb=$rowrooms['type'];
     
          
     
    }   
}
      
  }
}











$images=array();

$sqllg ="SELECT * FROM hotelsdatabaseimages WHERE name='$hn' && country='$cn' && city='$ln'";
		$resulttg = $conn->query($sqllg);

if ($resulttg->num_rows > 0) {
  // output data of each row
  while($rowwg = $resulttg->fetch_assoc()) {
      
      array_push($images,$rowwg['image']);
      
  }
}







$sqll ="SELECT * FROM hotelsdatabase WHERE name='$hn' && country='$cn' && city='$ln'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      $des=$roww['description'];
       
     $generalf=$roww['generalfacilities']; 
      $mainf=$roww['mainfacilities'];
       $frontf=$roww['frontdeskfacilities'];
        $sportsf=$roww['sportsfacilities'];
         $familyf=$roww['familyfacilities'];
         $cleaningf=$roww['cleaningfacilities'];
         $foodf=$roww['foodfacilities'];
         $businessf=$roww['businessfacilities'];
          $internetf=$roww['internetfacilities'];
           $parkingf=$roww['parkingfacilities'];
            $uniquef=$roww['uniquefacilities'];
            $safetyf=$roww['safetyfacilities'];
	  
	
  }
}






if (isset($_POST['changehotel'])) {
  
  $changehotel=$_POST['changehotelinput'];
  $changestar=$_POST['changestarinput'];
  $changecity=$_POST['changecityinput'];
  //echo $chagehotel;
  $_SESSION['hotel']=$changehotel;
  $_SESSION['sendcategory']=$changestar;
  $_SESSION['city']=$changecity;
  
  echo "<script>location.replace('hotelsearch.php');</script>";   
  
  
}


if (isset($_POST['modify'])) {
    
    
    //if($_POST['hotel'] !='')
   // {
    
    
$_SESSION['hotel']=$_POST['hotel'];
$_SESSION['city']=$_POST['city'];

$_SESSION['sendcategory']=$_POST['star'];

$_SESSION['sdate']=$_POST['sdate'];

$_SESSION['edate']=$_POST['edate'];

$_SESSION['sendroomnumbers']=$_POST['roomnumberschange'];



//}



 echo "<script>location.replace('hotelsearch.php');</script>";   
    
}














if (isset($_POST['submit'])) {
	
	$_SESSION['numberofadults']=$_POST['adultsnumber'];
	$_SESSION['numberofchildren']=$_POST['childrennumber'];
    $_SESSION['sendroomnumbers']=$_POST['roomsrecieved'];
    
     $_SESSION['totalpaisay']=$_POST['totalpaisay'];
    
     $_SESSION['roomseachtype']=$_POST['roomseachtype'];
     
     
     
     
     $_SESSION['breakfastincluded']=$_POST['breakfastt'];
     
     
     
     
     $_SESSION['eachtype']=$_POST['eachtype'];
    
    $_SESSION['aallowed']=$adultsallowed;
    $_SESSION['callowed']=$childrenallowed;
    $_SESSION['eballowed']=$extrabedsallowed;
    
    
    
	echo "<script>location.replace('bookingdetails.php');</script>";
	
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
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/app.css">
    <title>Search Result</title>
</head>
<body>
    
    
    <input style='display:none;' name='contry' id='contry' value='<?php echo $cn;?>'>
    
    
    
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
     <option value="ar" data-content='<span class="flag-icon flag-icon-ae"></span> ???????? '>????????</option>
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
    
    <style>
        .swal2-confirm{
            background-color: #DC3545 !important;
        }
    </style>
    <section class="page_title">
        <div class="container">
            <h1>Search Result</h1>
            
            <a style='display:none;' href = "#" id='popalert' data-bs-toggle = "modal" data-bs-target = ".alertModal">pop</a>
        </div>
    </section>
    <section class="page_searchbox">
        <div class="container px-0">
            <div class="search_box">
                <h5>Modify Your Search</h5>
                
                <form class='notranslate' method="POST" action='#' class="row g-3">
                    <div class="col-md-11">
                        <div class="row">
                            
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                <label style='color:#D3D3D3;'>City <?php $roomsnames[0];?></label>
                                <select id="city" name='city' class="form-select">
                                    
                                    <option value=''><?php echo 'All'?></option>
                                  
                                  <?php
                                  if($gcity!='')
                                  {
                                  ?>
                                    <option selected><?php echo $gcity;?></option>
                                    
                                    <?php
                                  }
                                    ?>
                                    
                                    <?php
                                    
        $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$cn' GROUP BY city";
 
 
 

 $result=$conn->query($sqllas);
 


 
while($row=mysqli_fetch_assoc($result)){
    $checkcity=$row['city'];
    if($checkcity!=$ln){
     echo "<option>".$row['city']."</option><br>";
    }
}

                                    
                                    ?>
                                    
                                     
                                    
                                  </select>
                            </div>
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                  <label style='color:#D3D3D3;'>Hotel</label>
                                <select id="hotel" name='hotel' class="form-select">
                                    
                                    <option value=''><?php echo 'All'?></option>
                                    
                                      <?php
                                  if($ghotel!='')
                                  {
                                  ?>
                                    <option selected><?php echo $ghotel;?></option>
                                    
                                    <?php
                                  }
                                    ?>
                                   
                                    
                                    
                                    
                                    
        <?php
                                    
        $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && star='$gsendcategory'";
 
 
 

 $result=$conn->query($sqllas);
 


 
while($row=mysqli_fetch_assoc($result)){
    $checkhotels=$row['name'];
    if($checkhotels!=$hn){
     echo "<option>".$row['name']."</option><br>";
    }
}

                                    
                                    ?>
                                                                 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                  </select>
                            </div>
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                  <label style='color:#D3D3D3;'>Star Rating</label>
                                <select id="star" name='star' class="form-select">
                                    
                                    
                                    
                                    <option value=''><?php echo 'All'?></option>
                                    
                                    
                                           <?php
                                  if($gsendcategory!='')
                                  {
                                  ?>
                                    <option selected><?php echo $gsendcategory;?></option>
                                    
                                    <?php
                                  }
                                    ?>
                                    
                                    
                                    
                                    <?php
                                    
                                    for ($x = 5; $x > 0; $x--) {
                                        if($x!=$gsendcategory){
                                        echo '<option>'.$x.'</option>';
                                        }
                                    }
                                    ?>
                                    
                                    
                                    
                                    
                                  </select>
                            </div>
                        
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                  <label style='color:#D3D3D3;'>Check In</label>
                                <input id="sdate" name='sdate' value='<?php echo $gsdate;?>' type='date' class="form-select">
                                    
                            </div>
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                  <label style='color:#D3D3D3;'>Check Out</label>
                        <input id="edate" name='edate' value='<?php echo $gedate;?>' type='date' class="form-select">
                            </div>
                            
                            <div class="col-4 col-lg-2 mb-3 mb-lg-0 pe-0">
                                  <label style='color:#D3D3D3;'>Rooms</label>
                        <input id="roomnumberschange" name='roomnumberschange' value='<?php 
                        if($gsendroomnumbers=='')
                        {
                        echo '0';
                        } else{echo $gsendroomnumbers;}?>' type='number' class="form-select">
                            </div>
                            
                            
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-1 search_submit">
                        <br/>
                      <button id='donotclick' onclick="myFunction()" class="btn btn-primary"><i class="bi bi-search"></i></button>
                      
                      <button style='display:none;' id='clickmodify' type="submit" name='modify' class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                    
                    
                  </form>
            </div>
        </div>
    </section>














    <div class = "main-holder smry-pg">
   
    

    
   
        <section class="smry my-5 py-3">
            <div class="">
                <!-- main guest block -->
                <div class = "smry-main-block-1 smry-main-block">
                    <!--<div class = "smry-main-block-head mx-1">
                        <span>Guest # 1</span>
                    </div>-->
                    
                    
                    <div class = "smry-row row">
                        
                        <style>
                            
                          
                            
                        </style>
                        
                        <div class = "col-xxl-2 px-2 order-1 order-xxl-0">
                            <!-- booking total -->
                            <div class = "row mx-0 align-items-stretch mt-5 mt-xxl-0">
                                <div class = "col-12 px-0">
                                    <div class = "smry-block-2 smry-block">
                                        <div class = "smry-block-head">
                                            <h6>Filter By</h6>
                                        </div>
                                        <div style='text-align:left;' class = "smry-block-content">
                                            <ul class = "list-unstyled mx-0 mb-0">
                                                
                                             
                                              Popular Filters  
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                     <span>
                                                        <input id='sustain' type='checkbox'> <label for='sustain'>Sustainability</label>
                                                    <br/>
                                                        <input id='romantic' type='checkbox'> <label for='romantic'>Romantic Getaways</label>
                                                    </span>
                                                   
                                                  
                                                    
                                                    
                                                    
                                                    
                                                   
                                                   
                                                </li>
                                                  
                                            </ul>
                                            
                                            <hr/>
                                            
                                            
                                            
                                            
                                            
                                            
                                              <ul class = "list-unstyled mx-0 mb-0">
                                                
                                             
                                              Facilities 
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                    
                                                   
                                                    <span>
                                                        <input id='airportshuttle' type='checkbox'> <label for='airportshuttle'>Free Airport Shuttle</label>
                                                    <br/>
                                                        <input id='pets' type='checkbox'>  <label for='pets'>Pets Allowed</label>
                                                         <br/>
                                                        <input id='electric' type='checkbox'> <label for='electric'>Electric Vehicle Charging</label> 
                                                         <br/>
                                                        <input id='family' type='checkbox'> <label for='family'>Family Rooms</label>
                                                         <br/>
                                                        <input id='freewifi' type='checkbox'> <label for='freewifi'>Free Wifi</label>
                                                         <br/>
                                                        <input id='roomservice' type='checkbox'> <label for='roomservice'>Room Service</label>
                                                    </span>
                                                    
                                                  
                                                </li>
                                                  
                                            </ul>
                                            
                                            <hr/>
                                           <ul class = "list-unstyled mx-0 mb-0">
                                                
                                             
                                              Room Preference 
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                    
                                                 
                                                    <span>
                                                        <input id='ac' type='checkbox'> <label for='ac'>Air Conditioning</label>
                                                    <br/>
                                                        <input id='pillow' type='checkbox'> <label for='pillow'>Pillow Menu</label>
                                                         <br/>
                                                        <input id='bed' type='checkbox'> <label for='bed'>Bed Preference</label>
                                                        <br/>
                                                        <input id='balcony' type='checkbox'> <label for='balcony'>Balcony</label>
                                                        <br/>
                                                        <input id='nonsmoking' type='checkbox'> <label for='nonsmoking'>Non Smoking Rooms</label>
                                                         <br/>
                                                        <input id='kitchen' type='checkbox'> <label for='kitchen'>Kitchen/ Kitchenette</label>
                                                         <br/>
                                                        <input id='jacuzi' type='checkbox'> <label for='jacuzi'>Private Jacuzi</label>
                                                           <br/>
                                                        <input id='pool' type='checkbox'> <label for='pool'>Private Pool</label>
                                                    </span>
                                                    
                                                    
                                                     
                                                </li>
                                                  
                                            </ul>  
                                            <hr/>
                                            
                                            
                                            
                                            
                                            
                                             <ul class = "list-unstyled mx-0 mb-0">
                                                
                                             
                                              Accessibility
                                                <li class = "my-2 pb-2 d-flex align-items-center justify-content-between">
                                                    
                                                   
                                                    <span>
                                                        <input id='wheelchair' type='checkbox'>  <label for='wheelchair'>Wheelchair Accessible</label>
                                                    <br/>
                                                        <input id='grabrails' type='checkbox'> <label for='grabrails'>Toilet with Grab Rails</label>
                                                         <br/>
                                                        <input id='higherleveltoilet' type='checkbox'> <label for='higherleveltoilet'>Higher Level Toilet</label>
                                                        <br/>
                                                        <input id='lowerbathroomsink' type='checkbox'> <label for='lowerbathroomsink'>Lower Bathroom Sink</label>
                                                        <br/>
                                                        <input id='emergencycord' type='checkbox'>  <label for='emergencycord'>Emergency Cord in Bathroom</label>
                                                         <br/>
                                                        <input id='braille' type='checkbox'> <label for='braille'>Visual Aid: Braille</label>
                                                         <br/>
                                                        <input id='tactile' type='checkbox'> <label for='tactile'>Visual Aid: Tactile Signs</label>
                                                           <br/>
                                                        <input id='auditory' type='checkbox'> <label for='auditory'>Auditory Guidance</label>
                                                    </span>
                                                    
                                                   
                                                </li>
                                                  
                                            </ul> 
                                            
                                            
                                        </div>
                                      <!--  <div class = "smry-block-foot">
                                            <div class = "d-flex align-items-center justify-content-between w-100">
                                                <p class = "mb-0">Grand Total <span class = "d-block">(Inclusive of 5% VAT)</span></p>
                                                <span>AED <nonsense id='gt'><?php echo $totalamount;?></nonsense></span>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- end of booking total -->
                        </div>
        
                        <div class = "col-xxl-9 px-2">
                            <div class = "smry-block-3 smry-block mb-5">
                             
                                
                                
                                
                                
                                
                                
             <!-- add hotel search here -->                   
                                
                                
                                
                                
                                             
                           
    <section style='margin-top:-60px;' class="searchlist">
        
        <div class='row'>

         <div class='col-sm'>
        
        <div class="container p-0">
            
            
            
            
            
            <!--hotel item start-->
            
            <?php
             if(count($roomsnames)>0)
                     {
                     ?>
            
            
            
            
            <div class="searchitem">
                <div class="item_details">
                    <div class="item_main_title">
                        
                        
            
            
                        <a href='hotelsingle.php?hotel=<?php echo $ghotel;?>'><span><h2 style='float:left;'><?php echo $ghotel;?>&nbsp;&nbsp;</h2><i style='float:right;' class="bi bi-info-circle"></i></span></a>
                        
                        
                       
                          
                          
                          
                          
                          
                                      
                    
                    
                     <?php
                                  
                                      
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                  
$sqllasm = "SELECT * FROM favourites WHERE hotel='$hn' && country='$cn' && city='$ln' && ipaddress='$ipadr'";
 
 


 $resultasm=$conn->query($sqllasm);
 
 
 
 if ($resultasm->num_rows > 0) {
 
                        
                        ?>
                        <a href="javascript:void(0);" onclick='like()'><i id='like' style='color:red; font-size:18pt;' class="bi bi-heart-fill"></i></a>
                        
                        <?php
}
else{
?>
<a href="javascript:void(0);" onclick='like()'><i id='like' style='color:red; font-size:18pt;' class="bi bi-heart"></i></a>
      <?php
}
?>
                        
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
                    </div>
                    
                    <div class="reviews">
                        <ul class="rating">
                           <?php 
                           for ($x = 0; $x < $gsendcategory; $x++) {
                          
                          ?>
                            <li><i class="bi bi-star-fill"></i></li>
                            <?php
                           }
                           ?>
                            
                        </ul>
                        <span><?php echo $gsendcategory;?> Star Hotel</span>
                    </div>
                    <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $gcity;?>, <?php echo $gcountry;?></span>
                    
                     <br/>
                    <div class="room_galary">
                        <?php 
                        for ($x = 0; $x <count($images); $x++) {
                        ?>
                        
                        
                        <a href="pco/Hotel Images/<?php echo $ghotel;?>/<?php echo $images[$x];?>" data-lightbox="room_gal_1">
                            <img src="pco/Hotel Images/<?php echo $ghotel;?>/<?php echo $images[$x];?>" alt="">
                        </a>
                        <?php
                        }
                        ?>
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                 
                       
                        <br/>
                    
                    
                    
                    
                   
                    <?php
                    
                  echo mb_strimwidth($des, 0, 200, "...");    
                    
                    ?>
                    
                    
                
                    
                    
                    
                    
                    <div class="room_aminities">
                       <!-- <span class="room_meta_title">Amenities Includes:</span>
                        <ul>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".detailsModal">
                                    <img src="img/aminities/dinner.svg" alt="">
                                    <span>Dinner</span>
                                </a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".detailsModal">
                                    <img src="img/aminities/fork.svg" alt="">
                                    <span>Breakfast</span>
                                </a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".detailsModal">
                                    <img src="img/aminities/ac.svg" alt="">
                                    <span>AC</span>
                                </a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".detailsModal">
                                    <img src="img/aminities/tv.svg" alt="">
                                    <span>TV</span>
                                </a>
                            </li>
                        </ul>-->
                        <a href = "#" class="see_more_btn" data-bs-toggle = "modal" data-bs-target = ".detailsModal" >See More</a>
                    </div>
                  
                 <!-- 
                    <div class="customer_review">
                        <span class="room_meta_title">Customer Reviews</span>
                        <ul class="c_reviewlist">
                            <li><i class="bi bi-heart-fill"></i></li>
                            <li><i class="bi bi-heart-fill"></i></li>
                            <li><i class="bi bi-heart-fill"></i></li>
                            <li><i class="bi bi-heart-fill"></i></li>
                            <li><i class="bi bi-heart"></i></li>
                        </ul>
                    </div>
                    -->
                    
                   
                   
                  <!--hotel terms copied from here--> 
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                </div>
                
                <form class='notranslate' action='#' method='POST'>
                    <input style='display:none;' name='roomsrecieved' id='roomsrecieved' value='<?php echo $roomsrecieved;?>'>
                <div class="other_room_list">
                    
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
                  <div style="overflow-y: scroll; height:400px;">
                    
                    
                    
                    
                    <?php
                    
                    $xv=1000;
                    $xvv=3000;
                    for ($x = 0; $x <count($roomsnames); $x++) {
                       
                        
                    ?>
                    
                    <div style='max-height:180px;' class="room_box">
                        
                        <div style='max-width:150px; max-height:130px;' class = "room_box_img">
                            <a href = "#" class="see_more_btn" data-bs-toggle = "modal" data-bs-target = ".detailsModalR<?php echo $x;?>">

                                
                                 <?php
                                 $ig=array();
                           $rmvs=$roomsnames[$x];
                           
                           $rcont=0;
                           $sqlimgsv ="SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hn' && country='$cn' && location='$ln' && type='$rmvs'";
	
		$resultimgsv = $conn->query($sqlimgsv);

if ($resultimgsv->num_rows > 0) {
  // output data of each row
  while($rowimgsv = $resultimgsv->fetch_assoc()) {
    
    array_push($ig,$rowimgsv['image']);
    $rcont=$rcont+1;
  }
}


?>




<style>
.containerzz {
 position: relative;
  text-align: center;
  color: white;
}

.text-blockzz2 {
position: absolute;
  bottom: 12px;
  right: 16px;
  width:20px;
 
   background-color: black;
   border-radius:10px;
  color: white;
  
}
</style>
<div class='containerzz'>
               <img src="pco/Room Uploads/<?php echo $ghotel;?>/<?php echo $rmvs;?>/<?php echo $ig[0];?>" alt="">               
            
  <div class="text-blockzz2">
    <?php echo $rcont;?>
  </div>
  </div>
               
               
                            </a>
                        </div>
                      
                        <div class="inner_room_meta">
                            <div class="room_metas">
                                <div class="room_type"><nonsense><?php echo $roomsnames[$x];?></nonsense> &nbsp;&nbsp;<span class="status text-capitalize">available</span></div>
                                
                        <input class='rtp' style='display:none;' name='eachtype[]' value="<?php echo $roomsnames[$x];?>">        
                                
                                
                                <nonsense class="row g-3">
                                   <!--      <div class="col-md-6">
                                      
                                      
                                        <div class="form-control_input">
                                       <input onclick='checkadultoccupancy(this)' name='adultsnumber[]' type="number" min='0' id="ad" class="adult form-control" value="0">
                                            
                                           <input class='adultsallowed' style='display:none;' value="<?php echo $adultsallowed[$x];?>">
                                           <input class='childrenallowed' style='display:none;' value="<?php echo $childrenallowed[$x];?>">
                                           <input class='extrabedsallowed' style='display:none;' value="<?php echo $extrabedsallowed[$x];?>">
                                            
                                            
                                            <div class="pre_value"><i class="bi bi-people"></i>Adults:</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-control_input">
                                            <input onclick='checkadultoccupancy(this)' name='childrennumber[]' id='ch' type="number" min='0' class="children form-control" value="0">
                                            <div class="pre_value"><i class="bi bi-people"></i>Children:</div>
                                        </div>
                                    </div>-->
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-control_input">
                                            <input data-id='<?php echo $x;?>' onchange='increaseprice(this)' onclick='totall()' type="number" name='roomseachtype[]' min='0' max='<?php echo $roomsnumbers[$x];?>' class="roms form-control" value="0">
                                            <div class="pre_value"><i class="bi bi-people"></i>Rooms:</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <div class="hotel_info">
                                            <!--<span><i class="bi bi-info-circle"></i>Deluxe is a Luxury...</span>-->
                                           <!-- <span><i class="bi bi-info-circle"></i>Available: <?php //echo $roomsnumbers[$x];?> Rooms</span>-->
                                            
                                            <input class='ava' style='display:none;' value='<?php echo $roomsnumbers[$x];?>'>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                 <div style='margin-left:100px; margin-top:-30px; margin-bottom:-30px;' class='item_details'>
                             <div class="hotel_terms">
                       
                        <ul>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $x;?>"><img src = "img/terms/terms_icon_1.png"></a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $xv;?>"><img src = "img/terms/terms_icon_2.png"></a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $xvv;?>"><img src = "img/terms/terms_icon_3.png"></a>
                            </li>
                        </ul>
                    </div>
                            
                            
                         </div>  
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                        
                                 
                         
                                      
                                      
                                      
                                      
                                       
                                          
                                    </div>
                                    
                                            
                                    <div style='margin-top:-10px;'>
                           <a href = "#" data-bs-toggle = "modal" data-bs-target = ".roomamsModal<?php echo $x;?>">   <span style='float:right;'>Room Amenities...</span></a>
                         </div>  
                                </nonsense>
                                
                            </div>
                            <div class="price_details">
                                <span>Starts as low as</span>
                                
                                <?php
                                $pricecompare='Select Dates';
                                $abc='';
                                  $sqlprice = "SELECT * FROM setprices WHERE country='$cn'&& location='$ln' && hotel='$hn' && name='$roomsnames[$x]' && (class='FIT' || class='')";
 
 
 

 $resultprice=$conn->query($sqlprice);
 

if ($resultprice->num_rows > 0) {
 
while($rowprice=mysqli_fetch_assoc($resultprice)){
    
    
    
    
    
    
    //Included Breakfast or Not Start From here when you return
    
   
    
    
    // END
    
    
    
    
    
    
    
 $period = new DatePeriod(new DateTime($gsdate), new DateInterval('P1D'), new DateTime($gedate));
 
 $check='0';
    foreach ($period as $date) {
        $dt=$date->format("Y-m-d");
   
   
   if(($dt>=$rowprice['sdate'] && $dt<=$rowprice['edate']) || $rowprice['sdate']='0000-00-00')
   {
       
 
    if($pricecompare>$rowprice['sellprice']){
        $pricecompare=$rowprice['sellprice'];
        
        
        
        $string= $rowprice['including'];
        

        for($i=0;$i<count($taxnametax); $i++)
           {
              
               
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pricecompare/100*intval($percentagetax[$i]);
                   $pricecompare=$pricecompare+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pricecompare=$pricecompare+$abc;
               }
               }
           } 
           }
    

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
        
    }
    $check='0';
   }
    }
    
 $atbab= $rowprice['breakfast'];

    
    
    
    
    }
}

else{
     $pricecompare='Price Unavailable';
}



if(intval($pricecompare)==0){
    
}

else{
    //$pricecompare='aaa';
    
$startTimeStampzul = strtotime($gsdate);
			$endTimeStampzul = strtotime($gedate);
			
			
			
$timeDiffzul = abs($endTimeStampzul - $startTimeStampzul);

$numberDayszul = $timeDiffzul/86400;  // 86400 seconds in one day
    
     $pricecompare=intval($pricecompare)*$numberDayszul;
    
}

?>
            <input name='breakfastt[]' value='<?php echo $atbab?>' style='display:none;'>                    
            <input style='display:none;' id="pricevalz<?php echo $x;?>" value="<?php echo $pricecompare;?>">
                                
                                <div style='position:inline;'><h2 style='float:left; margin-left:10px;'>
                                <?php 
                                if($gsdate=='' || $gedate=='')
                                {
                                }
                                else
                                {
                                ?>
                                AED
                                <?php
                                }
                                ?></h2><h2  id='prc<?php echo $x;?>' style='margin-right:20px; float:right;'><?php echo $pricecompare;?></h2>
                               </div>
                               
                              
                                <span>For <?php echo $numberDayszul;?> Nights</span>
                                <!--<button class="theme_btn_sm btn btn-outline-primary">Select</button>-->
                                
                                
                                
                     <!--           <div style='margin-top:-30px; margin-bottom:-30px;' class='item_details'>
                             <div class="hotel_terms">
                       
                        <ul>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $x;?>"><img src = "img/terms/terms_icon_1.png"></a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $xv;?>"><img src = "img/terms/terms_icon_2.png"></a>
                            </li>
                            <li>
                                <a href = "#" data-bs-toggle = "modal" data-bs-target = ".termsModal<?php echo $xvv;?>"><img src = "img/terms/terms_icon_3.png"></a>
                            </li>
                        </ul>
                    </div>
                            
                            
                         </div>   
                         
                         
                         
                         <div style='margin-bottom:-30px;'>
                           <a href = "#" data-bs-toggle = "modal" data-bs-target = ".roomamsModal<?php echo $x;?>">   <span>Room Amenities...</span></a>
                         </div>
                         
                         -->
                         
                            </div>
                            
                            
                            
                            
                           
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        
                        
                       
                        
                        
                            
                            
                           
                        
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                     <!-- room ams modal -->
    <div class="modal fade roomamsModal<?php echo $x;?>" tabindex="-1" aria-labelledby="roomamsModal" aria-hidden="true">
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
     if($inroomf[$x]!=''){
         ?>
                            <div class='col-sm'>
                                <label>In Room:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$inroomf[$x]);
     
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
                          if($kitchenf[$x]!=''){
         ?>
                            <div class='col-sm'>
                                <label>Kitchen:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$kitchenf[$x]);
     
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
                          if($privatebathroomf[$x]!=''){
                         ?>
                         
                         
                         
                          <div class='col-sm'>
                                <label>Private Bathroom:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$privatebathroomf[$x]);
     
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
                     if($discountedf[$x]!=''){      
                         ?>
                         
                        <div class='col-sm'>
                                <label>Discounts:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$discountedf[$x]);
     
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
                     if($complimentaryf[$x]!=''){      
                         ?>
                         
                         
                          
                        <div class='col-sm'>
                                <label>Complimentary:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$complimentaryf[$x]);
     
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
    <!-- end of room ams modal -->

                
                    
                    
                    
                    
                    
  
  
  
  
                  
                    
                    
    <!-- terms and condition modal -->
    <div class="modal fade termsModal<?php echo $xv;?>" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Max Adults Allowed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        
                      <?php 
                      echo $adultsallowed[$x];
                      ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of terms and condition modal -->

            
  
  
  
   <!-- terms and condition modal -->
    <div class="modal fade termsModal<?php echo $xvv;?>" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Max Children Allowed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        
                      <?php 
                      echo $childrenallowed[$x];
                      ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of terms and condition modal -->

            
  
  
  
  
  
  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
    <!-- terms and condition modal -->
    <div class="modal fade termsModal<?php echo $x;?>" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        
                        <?php 
                        $exp=explode('_@_',$roomscancellationnames[$x]);
                        $expcp=explode('_@_',$roomscancellation[$x]);
                       $bas=0;
                       foreach($exp as $e)
                       {
                           ?>
                           <h5>
                               
                               <?php
                        echo $exp[$bas];
                        
                        ?>
                        </h5>
                        <p class = "small text-black-50 lh-base">
                            
                            <?php echo $expcp[$bas];?>
                            </p>
                        <?php
                        $bas=$bas+1;
                       }
                        
                        ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of terms and condition modal -->

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!--rooms modal-->
                    
                    
                    
    <div class="modal fade detailsModalR<?php echo $x;?> modal-dialog-scrollable" tabindex="-1" aria-labelledby="detailsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="detailsModal"><?php echo $ghotel;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                   
                        <div class="item_main_title">
                            <h2><?php echo $roomsnames[$x];?></h2>
                          
                        </div>
                 
                       
                         <div class="item_details">
                        <div class="room_galary">
                            
                           
                           <?php
                           $rms=$roomsnames[$x];
                           
                           $sqlimgs ="SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hn' && country='$cn' && location='$ln' && type='$rms'";
	
		$resultimgs = $conn->query($sqlimgs);

if ($resultimgs->num_rows > 0) {
  // output data of each row
  while($rowimgs = $resultimgs->fetch_assoc()) {
   
    ?>
     <a style='min-width:60px;' href="pco/Room Uploads/<?php echo $ghotel;?>/<?php echo $rms;?>/<?php echo $rowimgs['image'];?>" data-lightbox="room_gal_1">
                            <img src="pco/Room Uploads/<?php echo $ghotel;?>/<?php echo $rms;?>/<?php echo $rowimgs['image'];?>" alt="">
                        </a>
    <?php
    
     
     
  }
}

                           
                           
                   ?>        
                        
                           
                            
                        </div>
                      
                     </div>
                        
                        <div>
                            <h6><?php echo $roomssingledescription[$x];?></h6>
                          
                        
                          
                        </div>
                        
                        
                        <br/><br/>
                        
                        
                
                        
                        
                   
                </div>
            </div>
        </div>
    </div>
                    
                    
                    
                    
                    
                    <!--rooms modal end-->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php
                    
                    $xv=$xv+1;
                    $xvv=$xvv+1;
                    }
                    
                    
                    
                    
                 
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    </div>
                    
                    
                  <!--  <hr/>-->
                    <div class="total_costing">
                       <div>
                           <!-- <h2>Total</h2>
                            <span class="room_meta_title">(inclusive of all taxes)</span>-->
                        </div>
                        <div class="ttal_amt">
                         <!-- <h2>AED&nbsp;</h2><h2 id='ttl'>0</h2><input class='form-control' style='display:none;' id='ttl2'><input class='form-control' style='display:none;'  name='totalpaisay' id='totalpaisay'>-->
                         <br/>
                            <input type='submit' name='submit' class="theme_btn btn active btn-outline-primary" value='Continue'>
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
            
            
            
            <?php
                     }
                     else{
                         if($_SESSION['hotel']!='')
                         {
                        echo 'No Room Available for These Specifications';
                         }
                        
                     }
                     ?>
            
            
            
            
             <!-- hotel details modal -->
    <div class="modal fade detailsModal modal-dialog-scrollable" tabindex="-1" aria-labelledby="detailsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="detailsModal"><?php //echo $ghotel;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="item_details">
                        <div class="item_main_title">
                            <h2><?php echo $ghotel;?></h2>
                          
                        <!--    <a href=""><i class="bi bi-heart"></i></a>-->
                            
                        </div>
                        <div class="reviews">
                            <ul class="rating">
                                 <?php 
                           for ($x = 0; $x < $gsendcategory; $x++) {
                          
                          ?>
                                <li><i class="bi bi-star-fill"></i></li>
                               <?php
                           }
                           ?>
                            </ul>
                            <span><?php echo $gsendcategory;?> Star Hotel</span>
                        </div>
                        <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $gcity;?>, <?php echo $gcountry;?></span>
                        
                        <div class="room_galary">
                            
                            
                              <?php 
                        for ($x = 0; $x <count($images); $x++) {
                        ?>
                        
                        
                        <a href="pco/Hotel Images/<?php echo $ghotel;?>/<?php echo $images[$x];?>" data-lightbox="room_gal_1">
                            <img src="pco/Hotel Images/<?php echo $ghotel;?>/<?php echo $images[$x];?>" alt="">
                        </a>
                        <?php
                        }
                        ?>
                            
                           
                            
                        </div>
                      
                       <!--
                       <div class="customer_review">
                            <span class="room_meta_title">Customer Reviews</span>
                            <ul class="c_reviewlist">
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart"></i></li>
                            </ul>
                        </div>
                        -->
                        
                        
                        
                        <div>
                            <h6>About Hotel:</h6>
                          
                          <?php echo $des;?>
                          
                        </div>
                        <br/><br/>
                       
                       
                       
                        <div class='container'><div class='row'>
                            
                            
                            <h5 align=center>Facilities</h5><br/><br/>
                            
                             <?php
     if($generalf!=''){
         ?>
                            <div class='col-sm'>
                                <label>General:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$generalf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                        
                        
                         <?php
                         }
                         
     if($mainf!=''){
         ?>
                         <div class='col-sm'>
                                <label>Main:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$mainf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                     
                     <?php
     }
    
                     ?>
                           
                            
                        </ul>
                        </div>
                         <?php
                         }
                         
     if($frontf!=''){
         ?>
                          <div class='col-sm'>
                                <label>Front Desk:</label>
                        <ul class = "small text-black-50">
                              <?php
   
     $gf=explode(",",$frontf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                                            <?php
                         }
                         
     if($familyf!=''){
         ?>
               
                        
                          <div class='col-sm'>
                                <label>Family:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$familyf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                        
                                            <?php
                         }
                         
     if($sportsf!=''){
         ?>
               
                        
                          <div class='col-sm'>
                                <label>Sports:</label>
                        <ul class = "small text-black-50">
                            <?php
   
     $gf=explode(",",$sportsf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                         <?php
                         }
                         
     if($cleaningf!=''){
         ?>
                        
                        
                          <div class='col-sm'>
                                <label>Cleaning:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$cleaningf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($foodf!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Food:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$foodf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                         <?php
                         }
                         
     if($businessf!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Business:</label>
                        <ul class = "small text-black-50">
                            
                             
                           <?php
   
     $gf=explode(",",$businessf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($internetf!=''){
         ?>
                        
                        
                          
                          <div class='col-sm'>
                                <label>Internet:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$internetf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($parkingf!=''){
         ?>
                          
                          <div class='col-sm'>
                                <label>Parking:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$parkingf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                        
                         <?php
                         }
                         
     if($uniquef!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Unique:</label>
                        <ul class = "small text-black-50">
                            
                             <?php
   
     $gf=explode(",",$uniquef);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                         
                         <?php
                         }
                         
     if($safetyf!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Safety:</label>
                        <ul class = "small text-black-50">
                            
                         <?php
   
     $gf=explode(",",$safetyf);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
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
    <!-- end of hotel details modal -->



















    <!-- amenities modal -->
    <div class="modal fade amenitiesModal" tabindex="-1" aria-labelledby="amenitiesModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="amenitiesModal">Amenities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <p class = "small text-black-50 lh-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, ut! Deleniti, sed. Exercitationem, a hic dolorum quod deleniti iusto delectus sint voluptate, tempora repellat animi aspernatur accusamus, laborum accusantium? Aspernatur.</p>
                    </div>
                    <ul class = "small">
                        <li class = "my-2 text-black-75">24-Hour room service</li>
                        <li class = "my-2 text-black-75">Free wireless internet access</li>
                        <li class = "my-2 text-black-75">Complimentary use of hotel bicycle</li>
                        <li class = "my-2 text-black-75">Laundry service</li>
                        <li class = "my-2 text-black-75">Tour & excursions</li>
                        <li class = "my-2 text-black-75">24 Hour concierge</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end of amenities modal -->

            
            
            
            
            
            
            
            
            
           
           
           
           
           
           
           <!--hotel item end--> 
            
            
            
            
            
      <!--      
            <div class="pagination_wrap">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="hotelsearch.html" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="hotelsearch.html">1</a></li>
                      <li class="page-item"><a class="page-link" href="hotelsearch2.html">2</a></li>
                      <li class="page-item"><a class="page-link" href="hotelsearch3.html">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="hotelsearch2.html" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
            -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           <!-- SUGGESTIONS-->
           
           <?php
           if(!empty($selectedhotels))
           {
    
    
    
    
    
              if($_SESSION['hotel']!='')
                         {   
           ?>
           
           <br/><br/>
           
           <h4>Other Available Hotels:</h4>
           
           
           
           
           <?php
                         }
                    $detailss=0;
                    $nds=0;
             foreach($selectedhotels as $dd)
{
    ?>
             <div class="searchitem">
                <div class="item_details">
                    <div class="item_main_title">
                        <a href='hotelsingle.php?hotel=<?php echo $dd;?>'><h2 style='float:left;'><?php echo $dd;?>&nbsp;&nbsp;</h2><i style='float:right;' class="bi bi-info-circle"></i></a></span>
                        
                    </div>
                    <div class="reviews">
                        <ul class="rating">
                           <?php 
                           for ($x = 0; $x < $selectedstars[$nds]; $x++) {
                          
                          ?>
                            <li><i class="bi bi-star-fill"></i></li>
                            <?php
                           }
                           ?>
                            
                        </ul>
                        <span><?php echo $selectedstars[$nds];?> Star Hotel</span>
                    </div>
                    <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $selectedcities[$nds];?>, <?php echo $selectedcountries[$nds];?></span>
                    <div class="room_galary">
                        <?php 
                      
                      
                      
                      
                      
                      $sqllgz ="SELECT * FROM hotelsdatabaseimages WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
		$resulttgz = $conn->query($sqllgz);

if ($resulttgz->num_rows > 0) {
  // output data of each row
  while($rowwgz = $resulttgz->fetch_assoc()) {
      
      $zi=$rowwgz['image'];
?>
                        
                        
                        <a href="pco/Hotel Images/<?php echo $dd;?>/<?php echo $zi;?>" data-lightbox="room_gal_1">
                            
                            <img src="pco/Hotel Images/<?php echo $dd;?>/<?php echo $zi;?>" alt="">
                        </a>
                        <?php
                        }
}
                        ?>
                        
                        
                        
                        
                        
                    </div>
                <div class='room-amenities'>
                    <?php  echo mb_strimwidth($selecteddesi[$nds], 0, 100, "..."); ?>
                 <a href = "#" class="see_more_btn" data-bs-toggle = "modal" data-bs-target = ".detailsModal<?php echo  $detailss;?>">See More</a>
                   </div>
                </div>
                
                
                
                
                
               
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <form class='notranslate' action='#' method='POST'>
                    
                    <input style='display:none;' name='changecityinput' id='changehotel' value='<?php echo $selectedcities[$nds];?>'>
                    <input style='display:none;' name='changestarinput' id='changehotel' value='<?php echo $selectedstars[$nds];?>'>
                    
                    <input style='display:none;' name='changehotelinput' id='changehotel' value='<?php echo $dd;?>'>
                    <input style='display:none;' name='roomsrecieved' id='roomsrecieved' value='<?php echo $roomsrecieved;?>'>
                <div class="other_room_list">
                    
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
                    
                    
                    
                    
             
                    
                    
                    
                  <div style="overflow-y: scroll; height:200px;">
                    
                    
                    
                    
                    <?php
                    
                    
                    
                    
                         
                    
                    
                    foreach ($allroomtypess as $ff) {
                       foreach($ff[$dd] as $bb){
        
                   
                        
                    ?>
                    
                    <div style='height:110px;' class="room_box">
                        
                        <div style='max-width:50px; max-height:50px;' class = "room_box_img">
                            <a href = "#" class="see_more_btn" data-bs-toggle = "modal" data-bs-target = ".detailsModalR<?php echo $x;?>">

                                
                                 <?php
                                 $ig=array();
                           $rmvs=$bb;
                           
                           
                           
                           
                           
    
  
                           
                           
                           
                           
                           $sqlimgsv ="SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$dd' && country='$selectedcountries[$nds]' && location='$selectedcities[$nds]' && type='$rmvs'";
	
		$resultimgsv = $conn->query($sqlimgsv);

if ($resultimgsv->num_rows > 0) {
  // output data of each row
  while($rowimgsv = $resultimgsv->fetch_assoc()) {
    
    array_push($ig,$rowimgsv['image']);
  }
}
?>

 <a href="pco/Room Uploads/<?php echo $dd;?>/<?php echo $rmvs;?>/<?php echo $ig[0];?>" data-lightbox="room_gal_1">
               <img src="pco/Room Uploads/<?php echo $dd;?>/<?php echo $rmvs;?>/<?php echo $ig[0];?>" alt="">                 
                            </a>
                        </div>
                      
                        <div class="inner_room_meta">
                            <div class="room_metas">
                                <div class="room_type"><nonsense><?php echo $bb;?></nonsense>&nbsp;&nbsp;<span class="status text-capitalize">available</span></div>
                                
                        <input class='rtp' style='display:none;' name='eachtype[]' value="<?php echo $bb?>">        
                                
                                
                                <nonsense class="row g-3">
                                    <div class="col-md-6">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    
                                    
                             
                                </nonsense>
                            </div>
                            <div style='height:80px;' class="price_details">
                                <span>Starts as low as</span>
                                
                                <?php
                                $pricecompare='Select Dates';
                                  $sqlprice = "SELECT * FROM setprices WHERE country='$selectedcountries[$nds]' && location='$selectedcities[$nds]' && hotel='$dd' && name='$bb' && (class='FIT' || class='')";
 
 
 

 $resultprice=$conn->query($sqlprice);
 

if ($resultprice->num_rows > 0) {
 
while($rowprice=mysqli_fetch_assoc($resultprice)){
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 $period = new DatePeriod(new DateTime($gsdate), new DateInterval('P1D'), new DateTime($gedate));
 
 $check='0';
    foreach ($period as $date) {
        $dt=$date->format("Y-m-d");
   
   
   if(($dt>=$rowprice['sdate'] && $dt<=$rowprice['edate']) || $rowprice['sdate']='0000-00-00')
   {
       
 
    if($pricecompare>$rowprice['sellprice']){
        $pricecompare=$rowprice['sellprice'];
        
        
        
        
        
        
        
        
         $string= $rowprice['including'];
        

        for($i=0;$i<count($taxnametax); $i++)
           {
              
               
               $abe=$taxnametax[$i];
               if (strpos($string, $abe) !== false) 
               {
               }
               
               else
               {
               if($choicetax[$i]=='Percentage')
               {
                   $abc=$pricecompare/100*intval($percentagetax[$i]);
                   $pricecompare=$pricecompare+$abc;
               }
               else{
                    if($choicetax[$i]=='Amount')
               {
                  $abc=intval($percentagetax[$i]);
                   $pricecompare=$pricecompare+$abc;
               }
               }
           } 
           }
    
        
        
        
        
        
        
        
        
        
        
    }
    $check='0';
   }
    }
    
    
    
    
    
    
    
    
    
    
    
    }
}

else{
     $pricecompare='Unavailable';
}


if(intval($pricecompare)==0){
    
}

else{
    //$pricecompare='aaa';
    
$startTimeStampzul = strtotime($gsdate);
			$endTimeStampzul = strtotime($gedate);
			
			
			
$timeDiffzul = abs($endTimeStampzul - $startTimeStampzul);

$numberDayszul = $timeDiffzul/86400;  // 86400 seconds in one day
    
     $pricecompare=intval($pricecompare)*$numberDayszul;
    
}

?>
                                
                                <h2><?php 
                                
                                if($gsdate=='' || $gedate=='')
                                {
                                }
                                else
                                {
                            
                                echo 'AED ';
                                
                                }
                                 echo $pricecompare;?></h2>
                                <span>For <?php echo $numberDayszul;?> Nights</span>
                                
                                
                                
                                
                                
                                
                         
                         
                        
                         
                         
                            </div>
                            
                            
                            
                            
                           
                            
                            
                            
                            
                            
                            
                        </div>
                        
                        
                        
                       
                        
                        
                            
                            
                           
                        
                        
                        
                        
                        
                    </div>
                    
                    
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                       
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php
                    
}
}
                    
                    
                    
                 
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    </div>
                    
                    
                    <hr/>
                 
                </div>
                 <input type='submit' style='float:right; margin-bottom:10px; margin-right:10px;' name='changehotel' class="theme_btn btn active btn-outline-primary" value='Select'>
                    
                </form>
            </div>
            
           
           
           
           
           
           
           
           
           
           
           
           
            <!-- HOTEL MODEL DETAILSS-->
                
                
                 <!-- hotel details modal -->
    <div class="modal fade detailsModal<?php echo $detailss;?> modal-dialog-scrollable" tabindex="-1" aria-labelledby="detailsModal<?php echo $detailss;?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="detailsModal"><?php echo $dd;?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="item_details">
                        <div class="item_main_title">
                            <h2><?php echo $dd;?></h2>
                          
                        <!--    <a href=""><i class="bi bi-heart"></i></a>-->
                            
                        </div>
                        <div class="reviews">
                            <ul class="rating">
                                 <?php 
                           for ($x = 0; $x < $gsendcategory; $x++) {
                          
                          ?>
                                <li><i class="bi bi-star-fill"></i></li>
                               <?php
                           }
                           ?>
                            </ul>
                            <span><?php echo $gsendcategory;?> Star Hotel</span>
                        </div>
                        <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $gcity;?>, <?php echo $gcountry;?></span>
                        
                        <div class="room_galary">
                            
                            
                              <?php 
                       
                       
                         
                      
                      $sqllgz2 ="SELECT * FROM hotelsdatabaseimages WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
		$resulttgz2 = $conn->query($sqllgz2);

if ($resulttgz2->num_rows > 0) {
  // output data of each row
  while($rowwgz2 = $resulttgz2->fetch_assoc()) {
      
      $zi2=$rowwgz2['image'];
                       
                       
                       
                       
                       
                       
                       
                       
                        ?>
                        
                        
                        <a href="pco/Hotel Images/<?php echo $dd;?>/<?php echo $zi2;?>" data-lightbox="room_gal_1">
                            <img src="pco/Hotel Images/<?php echo $dd;?>/<?php echo $zi2;?>" alt="">
                        </a>
                        <?php
                        }
}
                        ?>
                            
                           
                            
                        </div>
                      
                       <!--
                       <div class="customer_review">
                            <span class="room_meta_title">Customer Reviews</span>
                            <ul class="c_reviewlist">
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart-fill"></i></li>
                                <li><i class="bi bi-heart"></i></li>
                            </ul>
                        </div>
                        -->
                        
                        
                        
                        <div>
                            
                  <?php
                  $sqldes ="SELECT * FROM hotelsdatabase WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
		$resultdes = $conn->query($sqldes);

if ($resultdes->num_rows > 0) {
  // output data of each row
  while($rowdes = $resultdes->fetch_assoc()) {
                  ?>          
                            
                            
                            
                            <h6>About Hotel:</h6>
                      
                          <?php 
                          echo $rowdes['description'];
                          
                          $generalf2=$rowdes['generalfacilities'];
                          
                          $mainf2=$rowdes['mainfacilities'];
      
                          $frontf2=$rowdes['frontdeskfacilities'];
      
                          $familyf2=$rowdes['familyfacilities'];
                          $sportsf2=$rowdes['sportsfacilities'];
                          $cleaningf2=$rowdes['cleaningfacilities'];
                          
                          $foodf2=$rowdes['foodfacilities'];
                          $businessf2=$rowdes['businessfacilities'];
                          $internetf2=$rowdes['internetfacilities'];
                          $parkingf2=$rowdes['parkingfacilities'];
                          
                          $uniquef2=$rowdes['uniquefacilities'];
                          $safetyf2=$rowdes['safetyfacilities'];
                          
                          
                          
                          
                          
                          
  }
}
                          
                          ?>
                          
                          
                          
                          
                        </div>
                        <br/><br/>
                       
                       
                       
                        <div class='container'><div class='row'>
                            
                            
                            <h5 align=center>Facilities</h5><br/><br/>
                            
                             <?php
     if($generalf2!=''){
         ?>
                            <div class='col-sm'>
                                <label>General:</label>
                        <ul class = "small text-black-50">
     
     <?php
   
     $gf=explode(",",$generalf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                     
                     <?php
     
     }
                     ?>
                        </ul>
                        </div>
                        
                        
                         <?php
                         }
                         
     if($mainf2!=''){
         ?>
                         <div class='col-sm'>
                                <label>Main:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$mainf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                     
                     <?php
     }
    
                     ?>
                           
                            
                        </ul>
                        </div>
                         <?php
                         }
                         
     if($frontf2!=''){
         ?>
                          <div class='col-sm'>
                                <label>Front Desk:</label>
                        <ul class = "small text-black-50">
                              <?php
   
     $gf=explode(",",$frontf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                                            <?php
                         }
                         
     if($familyf2!=''){
         ?>
               
                        
                          <div class='col-sm'>
                                <label>Family:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$familyf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                        
                                            <?php
                         }
                         
     if($sportsf2!=''){
         ?>
               
                        
                          <div class='col-sm'>
                                <label>Sports:</label>
                        <ul class = "small text-black-50">
                            <?php
   
     $gf=explode(",",$sportsf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                         <?php
                         }
                         
     if($cleaningf2!=''){
         ?>
                        
                        
                          <div class='col-sm'>
                                <label>Cleaning:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$cleaningf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($foodf2!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Food:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$foodf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                           
                            
                        </ul>
                        </div>
                        
                         <?php
                         }
                         
     if($businessf2!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Business:</label>
                        <ul class = "small text-black-50">
                            
                             
                           <?php
   
     $gf=explode(",",$businessf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($internetf2!=''){
         ?>
                        
                        
                          
                          <div class='col-sm'>
                                <label>Internet:</label>
                        <ul class = "small text-black-50">
                            
                           <?php
   
     $gf=explode(",",$internetf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                          <?php
                         }
                         
     if($parkingf2!=''){
         ?>
                          
                          <div class='col-sm'>
                                <label>Parking:</label>
                        <ul class = "small text-black-50">
                            
                            <?php
   
     $gf=explode(",",$parkingf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                        
                         <?php
                         }
                         
     if($uniquef2!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Unique:</label>
                        <ul class = "small text-black-50">
                            
                             <?php
   
     $gf=explode(",",$uniquef2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
                              <?php
     }
    
                     ?>  
                            
                        </ul>
                        </div>
                        
                         
                         <?php
                         }
                         
     if($safetyf2!=''){
         ?>
                        
                          
                          <div class='col-sm'>
                                <label>Safety:</label>
                        <ul class = "small text-black-50">
                            
                         <?php
   
     $gf=explode(",",$safetyf2);
     
     for ($x = 0; $x < count($gf); $x++) {
     ?>
     
                           
                            <li class = "my-2"><?php echo $gf[$x];?></li>
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
    <!-- end of hotel details modal -->

                
                
                <!--END-->
                
                
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           <?php
           $nds=$nds+1;
           }
           }
           ?>
           
           <!--SUGGESTIONS END-->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
    </section>
            
                                
                                
                                
                                
                                
                                
                                
                              
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
        
        
       
   

</div>


















































                           
                           
     
                           
                           
                           
                           
                           
                           
                           
                           
                 







    
    
    
    
    
    
    
    
    

    <section class="footer">
        <div class="mainfooter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 px-0">
                        <div class="footer_col about">
                            <h2>About</h2>
                            <p>In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000???s. In those days, no one was using 100% web-based software or ???cloud based??? as we know it today.
                                PCO Connect not only survived the ???dot com??? burst of the early 2000s but steadily grew, Today, PCO Connect has serves over 100,000 customers and companies.</p>
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




 <!-- terms and condition modal -->
    <div class="modal fade alertModal" tabindex="-1" aria-labelledby="alertModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Select Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                      <h2>Please Select Hotel</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of terms and condition modal -->













    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    
    
    
    
    
    <script>
    
    function checkadultoccupancy($this){
        
           var idd = $this.id;
       
       
         
        var total=0;
        
        
        var sd = document.getElementById("sdate").value;
        var ed = document.getElementById("edate").value;
        
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
        
        var rtp = document.getElementsByClassName("rtp");
        var romsy = document.getElementsByClassName("roms");
        
        
        var adultsallowed = document.getElementsByClassName("adultsallowed");
        var childrenallowed = document.getElementsByClassName("childrenallowed");
        var extrabedsallowed = document.getElementsByClassName("extrabedsallowed");
         
       for(var i = 0; i < adult.length; i++) {
           
           var max= parseInt(adultsallowed[i].value)+parseInt(childrenallowed[i].value)+parseInt(extrabedsallowed[i].value);
           
           
           if(parseInt(adult[i].value)+parseInt(children[i].value)>max){
              
            
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
    
    
    
    
    
    
    
    
    
    function totall(){
        
      
        
    }
    
    
    
    
    
     var checktotal=0;
    
    
    setInterval(function () {
      
        
        
        
        
      
        var total=0;
        
        
        var sd = document.getElementById("sdate").value;
        var ed = document.getElementById("edate").value;
        
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
        
        var rtp = document.getElementsByClassName("rtp");
        var romsy = document.getElementsByClassName("roms");
        
        
        var adultsallowed = document.getElementsByClassName("adultsallowed");
        var childrenallowed = document.getElementsByClassName("childrenallowed");
        var extrabedsallowed = document.getElementsByClassName("extrabedsallowed");
         
       for(var i = 0; i < adult.length; i++) {
           
          // var max= parseInt(adultsallowed[i].value)+parseInt(childrenallowed[i].value)+parseInt(extrabedsallowed[i].value);
           
           
          // if(parseInt(adult[i].value)+parseInt(children[i].value)>max){
               
            //   if(adult[i].value=='0' || adult[i].value==''){
                   
                 //  children[i].value=parseInt(children[i].value)-1;
                 //  Swal.fire('Max Occupancy Reached for this Room');
              // }
             //  else{
                 //  adult[i].value=parseInt(adult[i].value)-1;
                 //  Swal.fire('Max Occupancy Reached for this Room');
               //}
               
               
          // }
           
           
           
           
          var adultz=adult[i].value;
          var childrenz=children[i].value;
          var romsn=romsy[i].value;
          var rtpp=rtp[i].value;
          
         
          
           
           var ttl2 = document.getElementById("ttl2");
          
            $.ajax({
              
			  type:'POST',
              url:'getpricing.php',
              data:{'adult':adultz,'children':childrenz,'sdate':sd,'edate':ed,'roomtype':rtpp,'rooms':romsn},
			  
              success:function(result){
                  
                  total=total+parseInt(result);
                
				ttl2.value=total;
                  
              }
			  
          }); 
          
            
           
       }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    var roomsrecieved = document.getElementById("roomsrecieved").value;
    
        var roms = document.getElementsByClassName("roms");
        var tot=0;
       var bb=0;
for(var i = 0; i < roms.length; i++) {
    
    
    if(roms[i].value.includes("-"))
    {
      roms[i].value=0;  
    }
    
    
    
    
   tot=tot+parseInt(roms[i].value);
 
   if(tot>parseInt(roomsrecieved)){
      roms[i].value=parseInt(roms[i].value)-1; 
      tot=tot-1;
        
        bb=i;
      
    const { value: text }= Swal.fire({
  title: 'Rooms Exceeded!',
  input: 'number',
  inputPlaceholder:'Number of Rooms',
  inputLabel:'Want to Add more Rooms?',
  
  placeholder:'Number of Rooms',
  inputAttributes: {
    autocapitalize: 'on'
  },
  showCancelButton: true,
  confirmButtonText: 'Add',
  showLoaderOnConfirm: true,
 
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.isConfirmed) {
   
   if(result.value==''){
       result.value=0;
   }
  
   var ava = document.getElementsByClassName("ava");
       
var az=parseInt(result.value)+parseInt(roms[bb].value);

    if(az>parseInt(ava[bb].value))
    {
     Swal.fire(az+' Rooms are not Available');
    }
    else{
    
   var roomsrecieved2 = document.getElementById("roomsrecieved"); 
   roomsrecieved2.value=parseInt(roomsrecieved2.value)+parseInt(result.value);
  Swal.fire('Total Rooms Allowed: '+roomsrecieved2.value);
}
    
    
    
    
    
    
  }

})
      
      
      
      
      
      
      
   }
   
}
 

    var totalpaisay = document.getElementById("totalpaisay");
	var ttl = document.getElementById("ttl");
    var ttll = document.getElementById("ttl2").value;
    
  if(checktotal!=ttll){
                  checktotal=ttll;
				ttl.innerHTML=ttll;
				totalpaisay.value=ttll;
  }









}, 600);

    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
    
    
        document.getElementById("donotclick").addEventListener("click", function(event){
  event.preventDefault()
});


    function myFunction() {
        var ht= document.getElementById("hotel").value;
        
       /* if(ht!='')
        {
        */
        
 document.getElementById("clickmodify").click();
       
       
       
       /* }
 
 else{
    document.getElementById("popalert").click(); 
 }*/
 
 
}
    
    
    
    
    
    
    
    
    
    
    
    $("[type='number']").keypress(function (evt) {
    //evt.preventDefault();
});




$("#city").on('change', function() {
   
    var country=$("#contry").val();
    var city=$("#city").val();
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getmodifiedhotels.php',
              data:{'city':city,'country':country},
			  
              success:function(result){
                  
				
				$("#hotel").html(result);
				
				const st = document.getElementById('star');
				st.innerHTML='';
				
				for (let i = 5; i > 0; i--) {
                
                  	       
                  	 
                  	 
                  	 st.innerHTML=st.innerHTML+'<option>'+i+'</option>';
                  	 
                  	 
                  	 
                  	 
                  	    
                }
                
				  
                
                 
              }
			  
          }); 
          
          
		
	
})










$("#star").on('change', function() {
   
    var country=$("#contry").val();
    var city=$("#city").val();
    var star=$("#star").val();
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getmodifiedhotelsbystar.php',
              data:{'city':city,'country':country,'star':star},
			  
              success:function(result){
                  
				
				$("#hotel").html(result);
				  
                
                 
              }
			  
          }); 
          
          
		
	
})

















$("#hotel").on('change', function() {
   
    var country=$("#contry").val();
    var city=$("#city").val();
    var hotel=$("#hotel").val();
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getmodifiedstar.php',
              data:{'city':city,'country':country,'hotel':hotel},
			  
              success:function(result){
                  $("#star").html('');
                 
                 var sel='<option>'+result+'</option>';
                
               if (!$.trim(result)){
                  
                }
                else{
                   	$("#star").html(sel); 
                }
                
                
                for (let i = 5; i > 0; i--) {
                
                   if(result!=i){
                  	       
                  	 const st = document.getElementById('star');
                  	 
                  	 st.innerHTML=st.innerHTML+'<option>'+i+'</option>';
                  	 
                  	 
                  	 
                  	 
                  	    }	
                  
                  	    
                }
                
                 
              }
			  
          }); 
          
          
		
	
})













</script>




<script>
    function like(){
        
        
var element = document.getElementById("like");
if(element.classList.contains("bi-heart"))
{
    element.classList.remove("bi-heart");
  element.classList.add("bi-heart-fill");
  
  
    $.ajax({
              
			  type:'POST',
              url:'addfavourite.php',
              
              
              success:function(result){
                 
              }
    });
  
  
  
  
  
  
  
  
}
else{
    element.classList.remove("bi-heart-fill");
   element.classList.add("bi-heart"); 
   
   
   
    $.ajax({
              
			  type:'POST',
              url:'removefavourite.php',
              
              
              success:function(result){
                  
              }
    });
  
   
   
   
   
   
   
   
}
        
        
      
        
        
        
        
    }
</script>


<script>


        


    function increaseprice($this){
        
         var roomsrecieved = document.getElementById("roomsrecieved").value;
         
        var aid=$this.getAttribute('data-id');
        var vall=$this.value;
        
        
        if(vall=='0')
        {
            var rms=1;
        }
        else{
            var rms=parseInt(vall);
        }
        
        
        
        var pri=document.getElementById('prc'+aid);
        
        var actualprice=document.getElementById('pricevalz'+aid);
        
        
        var price=parseInt(actualprice.value);
        //alert(price);
        
       
        
       if(parseInt(roomsrecieved)>=rms)
       {
        
       pri.innerHTML=price*rms;
       }
        
        
    }
    
    
</script>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
</div>
</body>
</html>