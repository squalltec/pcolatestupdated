<?php

//it doesnot work on hostinger.
//you will have to keep this script on domain.com or any other hosting and then call it!!

	include "simple_html_dom.php";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=Emirates+City+Ajman+to+Natural+Fragrances+Sharjah");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	//echo $response;
	curl_close($ch);

	$html = new simple_html_dom();
	$html->load($response);

	foreach($html->find('div[class=BNeawe deIvCb AP7Wnd]') as $link)
		
			echo $link->innertext . "<br>";
			

?>
