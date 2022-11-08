<?php
	include "simple_html_dom.php";

	$postFields = array(
		"getPostsNewDesign" => 1,
		"start" => 2,
		"limit" => 10,
		"q" => "notQ"
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://codingpassiveincome.com/ajax.php");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
	$response = json_decode(curl_exec($ch));
	curl_close($ch);

	$html = new simple_html_dom();
	$html->load($response->recent);

	foreach($html->find('h2[class=box__title]') as $link)
		echo $link->plaintext . "<br>";
?>
