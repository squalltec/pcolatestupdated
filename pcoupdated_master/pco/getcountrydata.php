<?php

//it doesnot work on hostinger.
//you will have to keep this script on domain.com or any other hosting and then call it!!



//$countryname='United Arab Emirates';
//$cityn='Lahore';

$countryname=$_POST['countryname'];


$cntn=str_replace(' ', '_', $countryname);



 $return_arr = array();
					
					


	include "simple_html_dom.php";
$country='https://en.wikipedia.org/wiki/'.$cntn;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $country);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	//echo $response;
	curl_close($ch);

	$html = new simple_html_dom();
	$html->load($response);
$capital=array();
	$aa=$html->find('td[class=infobox-data]');
	

	$cap=$aa[0]->children(0)->plaintext;
	
	

			
					
					
		
			
			
			
			//echo $aa[1]->children(0)->plaintext;
			
			
			
				//echo 'Largest City';echo '<br/>';
			
			$largest=$aa[1]->children(0)->plaintext;
			
			//echo '<br/>';
			//echo '<br/>';
			
			
			
			//echo 'Official Language';echo '<br/>';
			
			$officiallanguage=$aa[2]->children(0)->plaintext;
			
			
			
			
			
			$htt = new simple_html_dom();
	$htt->load($response);
				
				$avc='';
				
				foreach($htt->find('td[class=infobox-data]') as $ul) {
					
    foreach($ul->find('div[class=hlist hlist-separated]') as $div){
		foreach($div->find('ul') as $ull){
		
		 foreach($ull->find('li') as $li){
			 foreach($li->find('a') as $ah)
			
				//echo $ah->innertext . '<br>';
				$avc=$ah->innertext;
			
				
			
		 }
		}
	}
}
if($avc==''){
$comlang= $aa[3]->children(0)->plaintext;
}
else{
	$comlang='-';
}

			
			
			
			
			
			$cur=array();
				foreach($htt->find('tr') as $tr){
				foreach($tr->find('th[class=infobox-label]') as $th) {
					
				array_push($cur,$th->plaintext);
			
				}
				}
				
				
				$curr=array();
			foreach($htt->find('tr') as $trr){
				foreach($trr->find('td[class=infobox-data]') as $tdd) {
					
				array_push($curr,$tdd->plaintext);
			
				}
			}
				
				
				
				
				$n=0;
				for ($x = 0; $x < count($cur); $x++) {
					
					if($cur[$n]=="Currency"){
			
						$currency= $curr[$n];
			
			//echo "<br/>";
					}
				else{
					
				}
				$n=$n+1;
				
				}
				
				
			
			
			
			
			
			
			//calling
			
				
			
			
			
			
		//	echo 'Calling Code';echo '<br/>';
				
				$cur2=array();
				foreach($htt->find('tr') as $tr2){
				foreach($tr2->find('th[class=infobox-label]') as $th2) {
					
				array_push($cur2,$th2->plaintext);
			
				}
				}
				
				
				$curr2=array();
			foreach($htt->find('tr') as $trr2){
				foreach($trr2->find('td[class=infobox-data]') as $tdd2) {
					
				array_push($curr2,$tdd2->plaintext);
			
				}
			}
				
				
				
				
				
				for ($x = 0; $x < count($cur2); $x++) {
					
					if($cur[$x]=="Calling code"){
			//echo $cur2[$x];
				$callercode=$curr2[$x];
			
			//echo "<br/>";
					}
				else{
					
				}
			
				
				}
			
			
			
			
			
			
			//demonym
			
			
			//echo 'Demonym';echo '<br/>';
				
				$cur2=array();
				foreach($htt->find('tr') as $tr2){
				foreach($tr2->find('th[class=infobox-label]') as $th2) {
					
				array_push($cur2,$th2->plaintext);
			
				}
				}
				
				
				$curr2=array();
				
			foreach($htt->find('tr') as $trr2){
				if (strpos($trr2, 'Demonym(s)') !== false) {
				
					//echo $trr2;
				foreach($trr2->find('td[class=infobox-data]') as $tdd2) {
					
					foreach($tdd2->find('a') as $a2) {
				array_push($curr2,$a2->plaintext);
				
					}
					}
					
			
				}
			}
				$demon=$curr2[0];
				
				
				
			//driving



			//echo 'Driving Side';echo '<br/>';
				
				$cur2=array();
				foreach($htt->find('tr') as $tr2){
				foreach($tr2->find('th[class=infobox-label]') as $th2) {
					
				array_push($cur2,$th2->plaintext);
			
				}
				}
				
				
				$curr2=array();
				
			foreach($htt->find('tr') as $trr2){
				if (strpos($trr2, 'Driving side') !== false) {
				
					//echo $trr2;
				foreach($trr2->find('td[class=infobox-data]') as $tdd2) {
					array_push($curr2,$tdd2->plaintext);
					
					}
					
			
				}
			}
			
			
			
			
			
			$updated=$curr2[0];
				for($a=0; $a<9; $a++){
					$ar=strval($a);
					
			$updated= str_replace($ar, '', $updated);
		
				}
			
			$drivingside=$updated;
				
							
			
			//about
			
			
			
			
			
			$aaz=$html->find('p');
			
			$para=array();
			foreach($aaz as $p){
			array_push($para, $p->plaintext);
			}
			
			$updated=$para[2];

				
			$updated= str_replace('#', '', $updated);
			$updated= str_replace('&', '', $updated);
			$updated= str_replace(';', '', $updated);
			
			$updated= str_replace('91a93', '', $updated);
			$updated= str_replace('91b93', '', $updated);
			$updated= str_replace('91c93', '', $updated);
			$updated= str_replace('91d93', '', $updated);
			$updated= str_replace('91e93', '', $updated);
			$updated= str_replace('91f93', '', $updated);
			$updated= str_replace('91g93', '', $updated);
			$updated= str_replace('91h93', '', $updated);
			$updated= str_replace('91i93', '', $updated);
			$updated= str_replace('91j93', '', $updated);
			$updated= str_replace('91k93', '', $updated);
			$updated= str_replace('91l93', '', $updated);
			$updated= str_replace('91m93', '', $updated);
			$updated= str_replace('91n93', '', $updated);
			$updated= str_replace('91o93', '', $updated);
			
			
			for($a; $a<100; $a++){
				$ar=strval($a);
				
				$updated= str_replace('91'.$ar.'93', '', $updated);
			}
			
			
			
			
			$about=$updated;
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			//iso
			
			$cur2=array();
				foreach($htt->find('tr') as $tr2){
				foreach($tr2->find('th[class=infobox-label]') as $th2) {
					
				array_push($cur2,$th2->plaintext);
			
				}
				}
				
				
				$curr2=array();
			foreach($htt->find('tr') as $trr2){
				foreach($trr2->find('td[class=infobox-data]') as $tdd2) {
					
				array_push($curr2,$tdd2->plaintext);
			
				}
			}
				
				
				
				$city='';
				
				for ($x = 0; $x < count($cur2); $x++) {
					
					if($cur[$x]=="ISO 3166 code"){
			//echo $cur2[$x];
						$iso=$curr2[$x];
						$city=$curr2[$x];
			
			//echo "<br/>";
					}
				else{
					
				}
			
				
				}
				
			
			
			//flag
			
			
			$imgs=array();
			foreach($htt->find('a[class=image]') as $imi){
			
			array_push($imgs,$imi);
			
			}
			
			//echo $imgs[0];
			
			
				
			if($countryname=='United Arab Emirates'){
				$facode='the_United_Arab_Emirates';
			}
			else{
				$facode=$cntn;
			}
			
			
			
			
			
			
			//cities
			
		$ctz=array();
			
	$ct='https://en.wikipedia.org/wiki/List_of_cities_in_'.$facode;
	$ch22c = curl_init();
	curl_setopt($ch22c, CURLOPT_URL, $ct);
	curl_setopt($ch22c, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch22c, CURLOPT_RETURNTRANSFER, 1);
	$response22c = curl_exec($ch22c);
	//echo $response22c;
	curl_close($ch22c);

	$html22c = new simple_html_dom();
	$html22c->load($response22c);
			
				$citiesarray=array();
				
			$tables=array();	
			foreach($html22c->find('table[class=sortable]') as $tbl2c){	
			   array_push($tables,$tbl2c);
				
			}
			
		$table0=$tables[0];
		
		
			$cur2c=array();
				foreach($table0->find('tr') as $tr2c){
				foreach($tr2c->find('th') as $th2c) {
					
				array_push($cur2c,$th2c->plaintext);
			
				}
				}
			
			$idc=array();
				
				
				for ($x = 0; $x < count($cur2c); $x++) {
					
				if (strpos($cur2c[$x], 'City') !== false) {
			//echo $cur2[$x];
			//echo $cur2[$x];
			array_push($idc,$x);
		
						//echo $curr2[$x];
						
			
			//echo "<br/>";
					}
					
					
					
				else{
					
				}
			
				
				}
				
			foreach($table0->find('tr') as $trx2c){
				$abcc=array();
				foreach($trx2c->find('td') as $tdx2c) {
					
					array_push($abcc,$tdx2c);
					
				}
				
				 if (array_key_exists($idc[0], $abcc))
				 {
				$updatedc=$abcc[$idc[0]]->plaintext;
				
				for($a=0; $a<9; $a++){
					$arc=strval($a);
					
			$updatedc= str_replace($arc, '', $updatedc);
		
				}
			
		
			array_push($citiesarray,$updatedc);
			//	echo '<br/>';
			
				
				
				
				
				
				
				
				 
			}
				
			}
			
			
			
			
				$citiesstring = implode(", ", $citiesarray);
			
			
			
			
			
			//AIRPORT
			
			
			
			
			
			
		
			
			$airports=array();
			
			$fa='https://en.wikipedia.org/wiki/List_of_airports_in_'.$facode;
	$ch22 = curl_init();
	curl_setopt($ch22, CURLOPT_URL, $fa);
	curl_setopt($ch22, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch22, CURLOPT_RETURNTRANSFER, 1);
	$response22 = curl_exec($ch22);
	//echo $response22;
	curl_close($ch22);

	$html22 = new simple_html_dom();
	$html22->load($response22);
			
			$air=array();
			//echo 'Airports';echo '<br/>';
		

				
				$cur2=array();
				foreach($html22->find('tr') as $tr2){
				foreach($tr2->find('th') as $th2) {
					
				array_push($cur2,$th2->plaintext);
			
				}
				}
				
				
				$curr2=array();
			
				
				
				$id=0;
				
				
				for ($x = 0; $x < count($cur2); $x++) {
					
				if (strpos($cur2[$x], 'name') !== false) {
			//echo $cur2[$x];
			//echo $cur2[$x];
			$id=$x;
						//echo $curr2[$x];
						
			
			//echo "<br/>";
					}
					
					
					
				else{
					
				}
			
				
				}
			
			
			
			foreach($html22->find('tr') as $trx2){
				$abc=array();
				foreach($trx2->find('td') as $tdx2) {
					
					array_push($abc,$tdx2);
					
				}
				 if (array_key_exists($id, $abc))
				 {
				$updated=$abc[$id]->plaintext;
				
				for($a=0; $a<9; $a++){
					$ar=strval($a);
					
			$updated= str_replace($ar, '', $updated);
		
				}
			
			if(strpos($updated, 'International') !== false){
			array_push($airports,$updated);
				//echo '<br/>';
			}
				
				
				
				
				
				
				
				 
			}
				
			}
			
			
			$airports_string = implode(", ", $airports);
			
			
			
			
			
			
			
			
			
			 $return_arr = array("capital" => $cap,"largest" => $largest,"officiallanguage" => $officiallanguage,"commonlanguage" => $comlang,"currency" => $currency,"callercode" => $callercode,"demonym" => $demon,"drivingside" => $drivingside,"iso" => $iso,"about" => $about,"airports"=>$airports_string,"cities"=>$citiesstring);
			
			echo json_encode($return_arr);	
			
			
			?>