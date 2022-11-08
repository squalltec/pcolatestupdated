<?php

session_start();
include 'db_connection.php';
















//transfer values



      
   $title2= $_SESSION['title2'];
     $fname2= $_SESSION['fname2'];
      $lname2= $_SESSION['lname2'];
       $email2= $_SESSION['email2'];
       $phone2=  $_SESSION['phone2'];
       $nationality2=  $_SESSION['nationality2'];
       $remarks2=  $_SESSION['remarks2'];
 
 
 $triptype=$_SESSION['triptype'];
  
  
  
  
  
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
 
    
    
    
    
    $airline1= $_SESSION['airline1'];  
  $flightnumber1= $_SESSION['flightnumber1'];  
  $time1= $_SESSION['time1'];  
  
  
  
  $airline2= $_SESSION['airline2']; 
  $flightnumber2= $_SESSION['flightnumber2'];  
  $time2= $_SESSION['time2'];   
    
    
    
    
    
    
    
    
    
    
    
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
    
    
    
    
    
    
    
    $airline1= $_SESSION['airline1'];  
  $flightnumber1= $_SESSION['flightnumber1'];  
  $time1= $_SESSION['time1'];  
    
    
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
    
    



 $airline2= $_SESSION['airline2']; 
  $flightnumber2= $_SESSION['flightnumber2'];  
  $time2= $_SESSION['time2'];       
    

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

  
  
  
  
  
  
  
  
  $taxed=intval($total)/100*5;
 $totalfull=intval($total)+(intval($total)/100*5);
  
  $_SESSION['totalfull']=$totalfull;
  
  
  




//transfervalues end























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


$uniquenumber=$_SESSION['uniqueidq'];

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
   
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
if (isset($_POST['submit'])) {
    
    $taxed=intval($total)/100*5;
 $totalfull=intval($total)+(intval($total)/100*5);
 
 

$uniquenumber=$_SESSION['uniqueidq'];

//echo $_SESSION['uniqueidq'];
$_SESSION['bookingnumber']=$uniquenumber;



  
  $_SESSION['totalfull']=$totalfull;
  
    
     $title2= $_SESSION['title2'];
     $fname2= $_SESSION['fname2'];
      $lname2= $_SESSION['lname2'];
       $email2= $_SESSION['email2'];
       $phone2=  $_SESSION['phone2'];
       $nationality2=  $_SESSION['nationality2'];
       $remarks2=  $_SESSION['remarks2'];
    
    
    
    
   
  
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
 
    
    
    
    
    $airline1= $_SESSION['airline1'];  
  $flightnumber1= $_SESSION['flightnumber1'];  
  $time1= $_SESSION['time1'];  
  
  
  
  $airline2= $_SESSION['airline2']; 
  $flightnumber2= $_SESSION['flightnumber2'];  
  $time2= $_SESSION['time2'];   
    
    
    
    
    
    
    
    
    
    
    
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
    
    
    
    
    
    
    
    $airline1= $_SESSION['airline1'];  
  $flightnumber1= $_SESSION['flightnumber1'];  
  $time1= $_SESSION['time1'];  
    
    
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
    
    



 $airline2= $_SESSION['airline2']; 
  $flightnumber2= $_SESSION['flightnumber2'];  
  $time2= $_SESSION['time2'];       
    

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

  
    
    
    
    
    
    
    
    
    $sqlt = "INSERT INTO fullbookingtransfernew (uniquenumber,total,tax)
           VALUES ('$uniquenumber','$total','$taxed')";
		  
 $resultat = $conn->query($sqlt);


if ($resultat === TRUE) {

}
    
    
    
    
    
    
    
    if($triptype=='round')
    {
    
    $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,arrivalprice,departureprice,uniquenumber,remarks,carida,arrivalfromlocation,arrivaldate,arrivaltime,arrivaltolocation,departuredate,departuretime,caridd,triptype,departurefromlocation,departuretolocation,tax,pax,arrivalcarsneeded,departurecarsneeded,airlinearrival,airlinedeparture,flightnumberarrival,flightnumberdeparture,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$arrivalprice','$departureprice','$uniquenumber','$remarks2','$arrivalcar','$fromlocation1','$arrivaldate','$time1','$tolocation1','$departuredate','$time2','$departurecar','$triptype','$fromlocation2','$tolocation2','$taxed','$pax','$arrivalcarsneeded','$departurecarsneeded','$airline1','$airline2','$flightnumber1','$flightnumber2','$country','$city')";
		  
 $resultata = $conn->query($sqlta);


if ($resultata === TRUE) {

}
    }
    
   
   
   
   
   
   
    
    if($triptype=='From Airport to Hotel')
    {
    
    $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,arrivalprice,uniquenumber,remarks,carida,arrivalfromlocation,arrivaldate,arrivaltime,arrivaltolocation,triptype,tax,pax,arrivalcarsneeded,airlinearrival,flightnumberarrival,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$arrivalprice','$uniquenumber','$remarks2','$arrivalcar','$fromlocation1','$arrivaldate','$time1','$tolocation1','$triptype','$taxed','$pax','$arrivalcarsneeded','$airline1','$flightnumber1','$country','$city')";
		  
 $resultata = $conn->query($sqlta);


if ($resultata === TRUE) {

}
    }
   
   
   
  
    
    if($triptype=='From Hotel to Airport')
    {
    
    $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,departureprice,uniquenumber,remarks,departuredate,departuretime,caridd,triptype,departurefromlocation,departuretolocation,tax,pax,departurecarsneeded,airlinedeparture,flightnumberdeparture,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$departureprice','$uniquenumber','$remarks2','$departuredate','$time2','$departurecar','$triptype','$fromlocation2','$tolocation2','$taxed','$pax','$departurecarsneeded','$airline2','$flightnumber2','$country','$city')";
		  
 $resultata = $conn->query($sqlta);


if ($resultata === TRUE) {

}
    } 
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
  
  
  //HOTE SUBMIT
  
  
  
  
  
  
  



//Hotel Submit









 $idza=$_SESSION['subtractid'];
   $n=0;
   foreach($idza as $id)
   {
      
      
$sqlnewx="SELECT * FROM roomnumbers WHERE sameid='$id'";
	
		$resultnewx = $conn->query($sqlnewx);

if ($resultnewx->num_rows > 0) {
  // output data of each row
  while($rownewx = $resultnewx->fetch_assoc()) {
      
     $newid= $rownewx['id'];
     $number= $rownewx['number'];
     
    
     
$newnumber=intval($number)-1;

    $sqlmx = "UPDATE roomnumbers SET number='$newnumber' WHERE id='$newid'";
		  
 $resultamx = $conn->query($sqlmx);


if ($resultamx === TRUE) {

}   
       
       
       
     
     
      
  }
}
       
       
    $n=$n+1;   
   }














$tax=$_SESSION['tax'];

$hotel= $_SESSION['hotel'];
$country= $_SESSION['country'];
$city= $_SESSION['city'];
$sdate= $_SESSION['sdate'];
$edate= $_SESSION['edate'];

$showpaisay=$_SESSION['showpaisay'];



$totaldays= $_SESSION['totaldays'];

     $nationality= $_SESSION['nationality']; 
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
     $totalamount=$_SESSION['totalamounty'];

$remarks=$_SESSION['remarks'];   

   
$xx=0;
foreach($roomtypesall as $rtp){


$sqlae = "INSERT INTO bookings (title,fname,lname,email,phone,nationality,hotel,country,location,roomtype,checkin,checkout,days,price,uniquenumber,adults,children,breakfast,lunch,dinner,extrabed,remarks)
           VALUES ('$title[$xx]','$fname[$xx]','$lname[$xx]','$email[$xx]','$phone[$xx]','$nationality[$xx]','$hotel','$country','$city','$roomtypesall[$xx]','$sdate','$edate','$totaldays','$showpaisay[$xx]','$uniquenumber','$alladults[$xx]','$allchildren[$xx]','$bfincluded[$xx]','$lunincluded[$xx]','$dinincluded[$xx]','$bedincluded[$xx]','$remarks[$xx]')";
		  
 $resultaae = $conn->query($sqlae);


if ($resultaae === TRUE) {

}

$xx=$xx+1;
}








$sqltar = "INSERT INTO fullbooking (uniquenumber,total,tax)
           VALUES ('$uniquenumber','$totalamount','$tax')";
		  
 $resultatar = $conn->query($sqltar);


if ($resultatar === TRUE) {
    
   

}





   
   
   
   
   
   
   echo "<script>location.replace('transferandhotelbookingconfirmed.php');</script>";
    
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
    <title>Booking Invoice</title>
</head>
<body>
    
    
    
    
    <?php
    include 'header.php';
    ?>
    
    
    
    
    
    
    
    
    
    
    
    
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
                    
                    
                    
                    
                  <!--YAHAN SE TRANSFER-->  
                    
                    
                    
                    
                    
                    <h4 align='center'>Transfer Booking</h4>
                    
                    <div class = "invoice-tbl my-4">
                        <div class = "invoice-tbl-h text-center">
                            <div>Particulars</div>
                            <div>Pickup Location</div>
                            <div>DropOff Location</div>
                           
                            <div>Flight Details</div>
                            
                            <div>Total AED</div>
                        </div>
    
                          <div class = "invoice-tbl-b">
                            <div class = "invoice-tbl-item">
                                <div class = "d-block invoice-tbl-item-title px-4">Car: </div>
                              
                              
                       
                                <div class = "row invoice-tbl-item-dat">
                                  
                                  
                                    <div>
                                        
                                        
                                  
                    <?php
                if($triptype=='round')
                {
                    echo 'Arrival:<br/>';
                    echo $car1;
                    echo '<br/>';
                     echo $arrivaldate;
                      echo '<br/>'; echo '<br/>';
                       echo 'Departure:<br/>';
                    echo $car2;
                    echo '<br/>';
                     echo $departuredate;
                     echo '<br/>';
                   
                    
                    
                }
                                    
                                    
                          ?>          
                          
                          <?php
                if($triptype=='From Airport to Hotel')
                {
                    echo 'Arrival:<br/>';
                    echo $car1;
                    echo '<br/>';
                     echo $arrivaldate;
                     echo '<br/>';
                   
                    
                    
                }
                                    
                                    
                          ?>    
                                 
                                 
                                 <?php
                if($triptype=='From Hotel to Airport')
                {
                    
                       echo 'Departure:<br/>';
                    echo $car2;
                   echo '<br/>';
                     echo $departuredate;
                     echo '<br/>';
                   
                    
                }
                                    
                                    
                          ?>       
                                    </div>
                                    
                                   <div class = "px-3">
                               
                               
                                <?php
                if($triptype=='round')
                {
                    echo 'Arrival From:<br/>';
                    echo $fromlocation1;
                    echo '<br/>';
                    echo '<br/>';
                    
                       echo 'Departure From:<br/>';
                    echo $fromlocation2;
                    echo '<br/>';
                   
                   
                    
                    
                }
                                    
                                    
                          ?>          
                          
                          <?php
                if($triptype=='From Airport to Hotel')
                {
                    echo 'Arrival From:<br/>';
                    echo $fromlocation1;
                  
                     echo '<br/>';
                   
                    
                    
                }
                                    
                                    
                          ?>    
                                 
                                 
                                 <?php
                if($triptype=='From Hotel to Airport')
                {
                    
                       echo 'Departure From:<br/>';
                    echo $fromlocation2;
                  
                     echo '<br/>';
                   
                    
                }
                                    
                                    
                          ?>         
                               
                               
                               
                               
                               
                               
                               
                               
                                        
        
        </div>
                                  
                                  
                                  
                                  
                                  
                                  
                                    <div class = "px-3">
                                     
                                     
                                     
         
                               
                                <?php
                if($triptype=='round')
                {
                    echo 'Arrival To:<br/>';
                    echo $tolocation1;
                    echo '<br/>';
                    echo '<br/>';
                    
                       echo 'Departure To:<br/>';
                    echo $tolocation2;
                    echo '<br/>';
                   
                   
                    
                    
                }
                                    
                                    
                          ?>          
                          
                          <?php
                if($triptype=='From Airport to Hotel')
                {
                    echo 'Arrival To:<br/>';
                    echo $tolocation1;
                  
                     echo '<br/>';
                   
                    
                    
                }
                                    
                                    
                          ?>    
                                 
                                 
                                 <?php
                if($triptype=='From Hotel to Airport')
                {
                    
                       echo 'Departure To:<br/>';
                    echo $tolocation2;
                  
                     echo '<br/>';
                   
                    
                }
                                    
                                    
                          ?>         
                               
                               
                               
                               
                                                           
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                    </div>
                                    
                                    
                                 
                                        
                                        
                                        
                                    
                                       <div class = "">
                                        
                                        <?php 
                                        if($triptype=='round' || $triptype='From Airport to Hotel')
                                        {
                                            
                                            echo 'Arrival:<br/>'.''.$airline1.'<br/>'.''.$flightnumber1.'<br/>'.$time1;
                                            
                                        }
                                        if($triptype=='round' || $triptype='From Hote to Airport')
                                        {
                                            
                                         echo '<br/><br/>Departure:<br/>'.''.$airline2.'<br/>'.''.$flightnumber2.'<br/>'.$time2;
                                       
                                        }
                                        ?>
                                        </div>
                                        <div class = "text-center">
                                        <?php echo 'AED '.$total;?>
                                        </div>
                                </div>
                                
                     
                            </div>
    
                            
                        </div>
    
                        <div class = "invoice-tbl-f text-center">
                            <div><span class = "fw-bold">In Words: </span>
                            <?php
echo numberTowords("$totalfull");?></div>
                            <div class = "fw-bold">Grand Total <br/></div>
                            <div class = "fw-bold"><?php 
                           
                            echo 'AED '. $totalfull;
                            ?>
                           
                           </div>
                        </div>
                        
                         <?php
                            
                                    echo '<small style="float:right;">VAT 5% Applicable</small>';
                               
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
        <form action='#' method='POST'>
        <input type='submit' name='submit' style='margin-right:100px; float:right; width:200px;' class = "btn theme_btn active btn-secondary" value='Continue'>
        </form>
       <br/><br/><br/>
    </section>


    
    
    
    
    <?php
    
    include 'footer.php';
    ?>



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