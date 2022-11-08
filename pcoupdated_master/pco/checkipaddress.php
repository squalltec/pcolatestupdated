<?php


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

date_default_timezone_set('Asia/Dubai');

$ipcountry= $xml->geoplugin_countryName ;

echo getRealIpAddr();
echo $ipcountry;
echo date('d/m/Y');
echo date("h:i:sa");


?>
