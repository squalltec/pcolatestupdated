
<?php

session_start();

include 'db_connection.php';
include "simple_html_dom.php";

    
$city = $_POST['city'];

$city=str_replace(' ', '%20', $city);
    
$start= $_POST['start'];
    

$_SESSION['response']='';


$country='https://sayanigroupholdings.com/scrp/events.php?city='.$city.'&start='.$start;


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $country);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$ress =curl_exec($ch);

    	curl_close($ch);
    	

  

if($ress=='')
{
    
}

else{
    
    
    
    
    


$html = new simple_html_dom();
	$html->load($ress);
	$at=$html->find('div[class=evetitle]');
	$av=$html->find('div[class=evevenue]');
	$am=$html->find('div[class=evemonth]');
	$ad=$html->find('div[class=eveday]');
	$ai=$html->find('img[class=event-banner-image]');
	$ades=$html->find('div[class=event-description-html]');
	

	
	$nomb=0;
	foreach($at as $val){
	    
	    	
$replaced1 = preg_replace('/\s\s+/', ' ', ltrim($at[$nomb]->plaintext));
$replaced2 = preg_replace('/\s\s+/', ' ', ltrim($av[$nomb]->plaintext));
$replaced3 = preg_replace('/\s\s+/', ' ', ltrim($ad[$nomb]->plaintext));
$replaced4 = preg_replace('/\s\s+/', ' ', ltrim($am[$nomb]->plaintext));
$replaced5 = preg_replace('/\s\s+/', ' ', ltrim($ades[$nomb]->plaintext));



if (strpos($replaced4, 'Jan') !== false) {
    $replaced4='01';
}
if (strpos($replaced4, 'Feb') !== false) {
    $replaced4='02';
}
if (strpos($replaced4, 'Mar') !== false) {
    $replaced4='03';
}
if (strpos($replaced4, 'Apr') !== false) {
    $replaced4='04';
}
if (strpos($replaced4, 'May') !== false) {
    $replaced4='05';
}
if (strpos($replaced4, 'Jun') !== false) {
    $replaced4='06';
}
if (strpos($replaced4, 'Jul') !== false) {
    $replaced4='07';
}
if (strpos($replaced4, 'Aug') !== false) {
    $replaced4='08';
}
if (strpos($replaced4, 'Sep') !== false) {
    $replaced4='09';
}

if (strpos($replaced4, 'Oct') !== false) {
    $replaced4='10';
}


if (strpos($replaced4, 'Nov') !== false) {
    $replaced4='11';
}

if (strpos($replaced4, 'Dec') !== false) {
    $replaced4='12';
}




$replaced3=rtrim($replaced3);




if (strpos($replaced3, '-') !== false) {
    
    
    

   $ranger=true; 
    
    
   
$date = date('d-m-y');

$y=date("Y");

$m=date('m');

if($m>$replaced4)
{
  $y=$y+1;  
}

    
    $arr = explode("-", $replaced3);
    $first = $arr[0];
     $second = $arr[1];
    
    
    
    $f1date=$replaced4.'/'.$first.'/'.$y;
    $f2date=$replaced4.'/'.$second.'/'.$y;
   
}

else
{
    
    
    $ranger=false;
    
$date = date('d-m-y');

$y=date("Y");

$m=date('m');

if($m>$replaced4)
{
  $y=$y+1;  
}

$fdate=$y.'/'.$replaced4.'/'.$replaced3;

}

$lank=$ai[$nomb]->src;
$date = date('d-m-y');


	   if($ranger)
	   {
	     
	    
$fdate=$f1date." - ".$f2date;

  $sql ="INSERT INTO allfetchedevents (city,name, venue,day,month,imagelink,description,fulldate,fetcheddate) VALUES ('$city','$replaced1', '$replaced2', '$replaced3', '$replaced4', '$lank', '$replaced5','$fdate','$date')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  //echo "New record created successfully";
  
  //echo $start;
   
}

 
	    

	   }
	   else{
	   

  $sql ="INSERT INTO allfetchedevents (city, name, venue,day,month,imagelink,description,fulldate,fetcheddate) VALUES ('$city','$replaced1', '$replaced2', '$replaced3', '$replaced4', '$lank', '$replaced5','$fdate','$date')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  //echo "New record created successfully";
  
   
}


	  
	   }
	
	    
	    $nomb=$nomb+1;
	}
        





 
 
    
    
    
}
 
 echo 'Page '.$start.' Events Added';
 
 
 ?>