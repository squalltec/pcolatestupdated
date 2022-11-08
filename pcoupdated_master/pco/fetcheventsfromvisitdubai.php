<?php
	include "simple_html_dom.php";
$country='https://allevents.in/dubai/music?ref=calendar-bluebar';


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $country);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
echo $response;
	
	
	
	curl_close($ch);


	$html = new simple_html_dom();
	$html->load($response);
	$capital=array();
	$aa=$html->find('div[class=mw-search-result-heading]');
	
//foreach($aa as $a){
//    echo $a->plaintext;
//    echo '<br/>';
//}

//echo $aa[3];
//	$cap=$aa->plaintext;
//	echo $cap;
	
	?>
