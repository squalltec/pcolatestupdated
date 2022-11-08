<?php
	include "simple_html_dom.php";

$data=array();

$loc1='25.2293563,55.2811886';
$loc2='Lal+Qila+Dubai';

	$postFields = array(
		
		"loc1" => $loc1,
		"loc2" => $loc2
		
	);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://sayanigroupholdings.com/scrp/getGoogle.php");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	$response = curl_exec($ch);
	$response=str_replace("To:","<br/>To:",$response);
	$response=str_replace("via","<br/>via",$response);
	
	//echo $response;
	$pieces = explode(" ", $response);
	
	for ($x = 0; $x < count($pieces); $x++) {
	  
	    

  
    if(strpos($pieces[$x], 'km)') !== false){
        
          array_push($data, $pieces[$x-1]);

      array_push($data,$pieces[$x]);
   
    
  }
  
  
   if(strpos($pieces[$x], 'min') !== false){
//echo ' ';
   
   $min=str_replace('AWuZUe">','',$pieces[$x-1]);
   
   //echo $min;
   
     array_push($data,$min);
   

  // echo $pieces[$x];
   
   
   $min2=$pieces[$x];
   
  
   
     array_push($data,$min2);

   
    
  }
	    
	}
    
    
    
    echo $data[2]; 
    echo '&nbsp;';
   echo $data[3];

//echo json_encode($data);
    
    
	curl_close($ch);
?>
