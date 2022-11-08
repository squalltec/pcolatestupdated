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
         $totalamount=$_SESSION['totalamount'];
     $allchildren= $_SESSION['allchildren'];
    
   
$xx=0;
foreach($roomtypesall as $rtp){


$sql = "INSERT INTO bookings (title,fname,lname,email,phone,hotel,country,location,roomtype,checkin,checkout,days,price,uniquenumber,adults,children)
           VALUES ('$title[$xx]','$fname[$xx]','$lname[$xx]','$email[$xx]','$phone[$xx]','$hotel','$country','$city','$roomtypesall[$xx]','$sdate','$edate','$totaldays','$showpaisay[$xx]','$uniquenumber','$alladults[$xx]','$allchildren[$xx]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

}

$xx=$xx+1;
}








$sqlt = "INSERT INTO fullbooking (uniquenumber,total,tax)
           VALUES ('$uniquenumber','$totalamount','$tax')";
		  
 $resultat = $conn->query($sqlt);


if ($resultat === TRUE) {

}










echo "<script>location.replace('bookingconfirmed.php');</script>";   

?>