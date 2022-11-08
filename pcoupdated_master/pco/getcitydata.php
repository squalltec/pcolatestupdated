<?php

//it doesnot work on hostinger.
//you will have to keep this script on domain.com or any other hosting and then call it!!



//$countryname='United Arab Emirates';
//$cityn='Lahore';

$countryname=$_POST['countryname'];
$cityn=$_POST['cityname'];

$cntn=str_replace(' ', '_', $countryname);

$cityname=str_replace(' ', '_', $cityn);



 $return_arr = array();
					
					


	include "simple_html_dom.php";

			//Attractions
			
			$citys='https://www.trip.com/travel-guide/search/?keyword='.$cityname;
	$ch223 = curl_init();
	curl_setopt($ch223, CURLOPT_URL, $citys);
	curl_setopt($ch223, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch223, CURLOPT_RETURNTRANSFER, 1);
	$response223 = curl_exec($ch223);
	//echo '<style>.gl-cpt-breadcrumb-search{display:none;} .page-title{display:none;}</style>';
	//echo '<nonsense style="display:none;">'.$response223.'</nonsense>';
	curl_close($ch223);

	$html223 = new simple_html_dom();
	$html223->load($response223);
			
			//echo 'Tourist Places';echo '<br/>';
		
		
		$divs=array();

foreach($html223->find('div[class=gl-search-result_list]') as $cts){
				
				array_push($divs, $cts);
				
			}
			
			
			$attractionss=array();
			foreach($divs[1]->find('div[class=gl-search-result_list-title]') as $ctss){
			
			array_push($attractionss,$ctss->plaintext);
			}
			
			
				
			$attractions = implode(", ", $attractionss);
			
			
			
			
			//echo $attractions;
			
			
			
			 $return_arr = array("attractions"=>$attractions);
			
			echo json_encode($return_arr);	
			
			
			?>