<?php

include 'header.php';


?>


<main class="page-content">
   
    
<?php







	include "simple_html_dom.php";
$country='https://globaldimension.org.uk/calendar/';


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
	$at=$html->find('h3[class=event-card__title]');
	$ad=$html->find('time[class=event-card__date]');
	$as=$html->find('div[class=event-card__standfirst]');
	$al=$html->find('a[class=event-card__link]');
	
	
	
	
	
$n=0;	
foreach($at as $res)
{
  ?>  <input class='form-control' value='<?php echo $res->plaintext;?>'>
  
  <input class='form-control' value='<?php echo $ad[$n]->plaintext;?>'>
  
   <input class='form-control' value='<?php echo $as[$n]->plaintext;?>'>
   
   
   <input class='form-control' value='<?php echo "https://globaldimension.org.uk".$al[$n]->href;?>'>
    
   <?php
   
    echo '<br/>';
  
     echo '<br/>';
   
     echo '<br/>'; 
    
    
    
    
    
    
    
    
    
    $country2='https://globaldimension.org.uk'.$al[$n]->href;


	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_URL, $country2);
	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	$response2 = curl_exec($ch2);
    
  
	curl_close($ch2);


	$html2 = new simple_html_dom();
	$html2->load($response2);
	
	$at2=$html2->find('div[class=teachable-details__overview__text]');
	
	
$nn=0;	
foreach($at2 as $res2)
{
   ?> 
   <textarea class='form-control'><?php echo $res2->plaintext; ?></textarea>
  
  <?php  echo '<br/>';
    
    $nn=$nn+1;
}
    
    
    
    
    
    
    
    
    echo '<br/>';echo '<br/>';echo '<br/>';
    $n=$n+1;
}

	
	?>
	
	
	
	
	
</main>

