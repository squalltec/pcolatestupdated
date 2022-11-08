<?php
session_start();

include 'db_connection.php';



$hotel= $_SESSION['hotel'];
$country= $_SESSION['country'];
$city= $_SESSION['city'];







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








$sqlnew="DELETE FROM favourites WHERE country='$country' && city='$city' && hotel='$hotel' && ipaddress='$ipadr'";
	
		$resultnew = $conn->query($sqlnew);

if ($resultnew->num_rows > 0) {
 
}








?>