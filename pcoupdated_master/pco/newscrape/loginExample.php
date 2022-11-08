<?php
	include "simple_html_dom.php";

$countryname=$_POST['countryname'];
$cityname=$_POST['cityname'];

	$postFields = array(
		
		"countryname" => $countryname,
		"cityname" => $cityname
		
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getdata.php");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	$response = curl_exec($ch);
    echo $response;
	curl_close($ch);
?>
