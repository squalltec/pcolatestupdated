<?php

//it doesnot work on hostinger.
//you will have to keep this script on domain.com or any other hosting and then call it!!

	include "simple_html_dom.php";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=sharjah+to+ajman&sxsrf=ALiCzsbYiH2ahkTOZtBs6W6IS6ciCVrmJw%3A1656651715930&source=hp&ei=w3--YpjbNsSQhbIPv8OpwAw&iflsig=AJiK0e8AAAAAYr6N092NUnFqyHuleZzrho2h06Htkmo2&ved=0ahUKEwjYyKvI9Nb4AhVESEEAHb9hCsgQ4dUDCAc&uact=5&oq=sharjah+to+ajman&gs_lcp=Cgdnd3Mtd2l6EAMyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEOg0ILhDHARDRAxDqAhAnOgcIIxDqAhAnOgQIIxAnOgsIABCABBCxAxCDAToRCC4QgAQQsQMQgwEQxwEQ0QM6BQgAELEDOgsILhCABBCxAxCDAToICAAQgAQQsQM6CwguEIAEELEDENQCOhEILhCABBCxAxCDARDHARCvAToICC4QgAQQsQM6EQguEIAEELEDEIMBEMcBEKMCOggILhCxAxCDAToOCC4QgAQQsQMQxwEQrwE6CAgAEIAEEMkDOgQIABANOgYIABAeEA1QnAFY2hpg5BtoBnAAeAGAAYcDiAGiIpIBBjItMTQuM5gBAKABAbABCg&sclient=gws-wiz");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	echo $response;
	curl_close($ch);

	$html = new simple_html_dom();
	$html->load($response);

	foreach($html->find('div[class=BNeawe deIvCb AP7Wnd]') as $link)
		
			echo $link->innertext . "<br>";
			

?>
