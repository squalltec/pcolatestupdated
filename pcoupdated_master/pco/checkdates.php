<?php

$dates=array();
$roomrelease = array("10", "20", "30");

	foreach ($roomrelease as $value) {
	
		$Date1 = date('y-m-d');
		$Date2 = date('y-m-d', strtotime($Date1 . " + $value day"));
		
		array_push($dates,$Date2);
 
  
}



?>