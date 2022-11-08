<?php

//it doesnot work on hostinger.
//you will have to keep this script on domain.com or any other hosting and then call it!!

$countryname=$_POST['countryname'];
$cityn=$_POST['cityname'];
$cntn=str_replace(' ', '_', $countryname);
$cityname=str_replace(' ', '_', $cityn);




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
	

	echo 'Capital City';echo '<br/>';
			echo $aa[0]->children(0)->plaintext;
			echo '<br/>';
			echo '<br/>';
			
			
			
			echo 'Largest City';echo '<br/>';
			echo $aa[1]->children(0)->plaintext;
			echo '<br/>';
			echo '<br/>';
			
			echo 'Official Language';echo '<br/>';
			
			echo $aa[2]->children(0)->plaintext;
			
				echo '<br/>';echo '<br/>';
				
				
				
				
				
				echo 'Common Languages';echo '<br/>';
				
				$htt = new simple_html_dom();
	$htt->load($response);
				
				$avc='';
				
				foreach($htt->find('td[class=infobox-data]') as $ul) {
					
    foreach($ul->find('div[class=hlist hlist-separated]') as $div){
		foreach($div->find('ul') as $ull){
		
		 foreach($ull->find('li') as $li){
			 foreach($li->find('a') as $ah)
			
				echo $ah->innertext . '<br>';
				$avc=$ah->innertext;
			
				
			
		 }
		}
	}
}
if($avc==''){
echo $aa[3]->children(0)->plaintext;
}


				
					
			echo '<br/>';echo '<br/>';
			
			
			
			
			
			
			
			
			
			
			
			
			echo 'Currency';echo '<br/>';
				
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
			
						echo $curr[$n];
			
			echo "<br/>";
					}
				else{
					
				}
				$n=$n+1;
				
				}
			//echo array_search('Currency',$cur,true);
			
			//echo $cur[33];
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			//CALLING CODE
			
			
			
			
			
			echo 'Calling Code';echo '<br/>';
				
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
						echo $curr2[$x];
			
			echo "<br/>";
					}
				else{
					
				}
			
				
				}
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
			
			
			
			//Demonym(s)
			
			
			echo 'Demonym';echo '<br/>';
				
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
				echo $curr2[0];
				
				
				
				
				
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
			
			
			
			//Driving
			
			
			echo 'Driving Side';echo '<br/>';
				
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
			
			echo $updated;
				
				
				
				
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
				echo '<br/>';echo '<br/>';
				
			echo 'About Country';echo '<br/>';
			
			
			
			
			
			
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
			
			
			
			
			echo $updated;
			
			echo '<br/>';echo '<br/>';
			
	


			
			
			//ISO CODE
			
			
			
			
			
			echo 'ISO Code';echo '<br/>';
				
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
						echo $curr2[$x];
						$city=$curr2[$x];
			
			echo "<br/>";
					}
				else{
					
				}
			
				
				}
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
			
			echo 'Flag';echo '<br/>';
			
			$imgs=array();
			foreach($htt->find('a[class=image]') as $imi){
			
			array_push($imgs,$imi);
			
			}
			echo $imgs[0];
			
			echo '<br/>';echo '<br/>';
			
			
			
			
			
			
		
			
			
			
			$cities='https://www.google.com/search?q=cities+of+'.$city;
	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_URL, $cities);
	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	$response2 = curl_exec($ch2);
	//echo $response2;
	curl_close($ch2);

	$html2 = new simple_html_dom();
	$html2->load($response2);
			
			echo 'Cities';echo '<br/>';
			foreach($html2->find('div[class=RWuggc kCrYT]') as $cts){
				
				echo $cts;
				
			}
			
			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
			
			
			
			
			if($countryname=='United Arab Emirates'){
				$facode='the_United_Arab_Emirates';
			}
			else{
				$facode=$cntn;
			}
			
			
			
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
			echo 'Airports';echo '<br/>';
		

				
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
						
			
			echo "<br/>";
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
			
			echo $updated;
				echo '<br/>';
				
				
				
				
				
				
				
				
				 
			}
				
			}
			
			
			
			
			
			
			echo "<br/>";echo "<br/>";
			
			






			
			echo "<br/>";echo "<br/>";
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	
			
			
			
			
			
			$citys='https://www.trip.com/travel-guide/search/?keyword='.$cityname;
	$ch223 = curl_init();
	curl_setopt($ch223, CURLOPT_URL, $citys);
	curl_setopt($ch223, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch223, CURLOPT_RETURNTRANSFER, 1);
	$response223 = curl_exec($ch223);
	echo '<style>.gl-cpt-breadcrumb-search{display:none;} .page-title{display:none;}</style>';
	echo '<nonsense style="display:none;">'.$response223.'</nonsense>';
	curl_close($ch223);

	$html223 = new simple_html_dom();
	$html223->load($response223);
			
			echo 'Tourist Places';echo '<br/>';
		
		
		$divs=array();

foreach($html223->find('div[class=gl-search-result_list]') as $cts){
				
				array_push($divs, $cts);
				
			}
			
			
			foreach($divs[1]->find('div[class=gl-search-result_list-title]') as $ctss){
			
			echo $ctss;
			}
			
			
			
			
			
			
			echo "<br/>";echo "<br/>";
			
			






			
			echo "<br/>";echo "<br/>";
					
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				echo '<br/>';echo '<br/>';
				
			echo 'National Anthem';echo '<br/>';
			
			$aaz=$html->find('audio[id=mwe_player_0]');
			
			echo $aaz[0];
			
			
			
	
			

?>


<style>
audio::-webkit-media-controls-panel {
  background-color: #56AEFF;
  width:1000px;
}
</style>