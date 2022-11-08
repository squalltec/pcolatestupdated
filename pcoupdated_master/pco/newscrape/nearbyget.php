<?php
	include "simple_html_dom.php";


$city='Business+Bay+Dubai';

	$postFields = array(
		
		"gotdata" => $city
		
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
	

	
?>

<input value='<?php echo $aa[0]->plaintext;?>'>
