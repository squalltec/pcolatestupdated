<?php

session_start();
require_once('db_connection.php');


$standardprice=100;

$numberofdays=0;
$totalprice=0;

$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];

$sstt=$_SESSION['sdate'];
$eedd=$_SESSION['edate'];

$start=date($sstt);
$end=date($eedd);




$max=$_POST['max'];
$getroomname=$_POST['getroomname'];

$pax=intval($max);




if($pax==0){
    echo '0';
}







		  

  if($pax>0 && $pax<3)
	{
$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$getroomname'";

		$resulttaa = $conn->query($sqllaa);

	
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwa = $resulttaa->fetch_assoc()) {
	  
	 	  $aloo=$rowwa['price'];
	  
	  $sdate=$rowwa['sdate'];
	  $edate=$rowwa['edate'];
	  
	  $sdate=date($sdate);
	  $edate=date($edate);






		if($start >=$sdate && $end <=$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['sellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
	
					
				}
				
				
				
				
				
				
				//problem starts from here
				
				
				
				
				
				
				
				
				
				
				
			


	
				
		else {
			
			
			
			
			
			
	if($start >=$sdate && $start < $edate && $end >$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['sellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	$tp=$tp+$pri;
				
				
					
				}
				
				
else if($start <= $sdate && $end >= $sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['sellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
					
				}













		}
			





	
	

 }
}
	


echo $tp;

		


	}	





if($pax>2 && $pax<4)
	{


$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$getroomname'";

		$resulttaa = $conn->query($sqllaa);

	
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwa = $resulttaa->fetch_assoc()) {
	  
	 	  $aloo=$rowwa['price'];
	  
	  $sdate=$rowwa['sdate'];
	  $edate=$rowwa['edate'];
	  
	  $sdate=date($sdate);
	  $edate=date($edate);


	

		if($start >=$sdate && $end <=$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['dblsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
$tp=$tp+$pri;
				
	
					
				}
				
				
				
				
				
				
				//problem starts from here
				
				
				
				
				
				
				
				
				
				
				
			


	
				
		else {
			
			
			
			
			
			
	if($start >=$sdate && $start < $edate && $end >$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['dblsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	$tp=$tp+$pri;
				
				
					
				}
				
				
else if($start <= $sdate && $end >= $sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['dblsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
					
				}













		}
			





	


 }
}
	


echo $tp;

	



	}
	
	
	
	






















 if($pax>3 && $pax<5)
	{


$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$getroomname'";

		$resulttaa = $conn->query($sqllaa);

	
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwa = $resulttaa->fetch_assoc()) {
	  
	  
		
	  
	  
	 	  $aloo=$rowwa['price'];
	  
	  $sdate=$rowwa['sdate'];
	  $edate=$rowwa['edate'];
	  
	  $sdate=date($sdate);
	  $edate=date($edate);




		if($start >=$sdate && $end <=$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
	
					
				}
				
				
				
				
				
				
				//problem starts from here
				
				
				
				
				
				
				
				
				
				
				
			


	
				
		else {
			
			
			
			
			
			
	if($start >=$sdate && $start < $edate && $end >$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	$tp=$tp+$pri;
				
				
					
				}
				
				
else if($start <= $sdate && $end >= $sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
					
				}













		}
			





	




 }
}
	


echo $tp;
		
	
	



	}	
  
	














 if($pax>4)
	{

$more=$pax-4;


$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$getroomname'";

		$resulttaa = $conn->query($sqllaa);

	
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwa = $resulttaa->fetch_assoc()) {
	  
	  
		
	  
	  
	 	  $aloo=$rowwa['price'];
	  
	  $sdate=$rowwa['sdate'];
	  $edate=$rowwa['edate'];
	  
	  $sdate=date($sdate);
	  $edate=date($edate);




		if($start >=$sdate && $end <=$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
	
					
				}
				
				
				
				
				
				
				//problem starts from here
				
				
				
				
				
				
				
				
				
				
				
			


	
				
		else {
			
			
			
			
			
			
	if($start >=$sdate && $start < $edate && $end >$edate)
				
				
				{
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	$tp=$tp+$pri;
				
				
					
				}
				
				
else if($start <= $sdate && $end >= $sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$rowwa['trplsellprice'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
				$tp=$tp+$pri;
				
					
				}













		}
			





	




 }
}
	







			
$sqllaar ="SELECT * FROM basiccharges WHERE hotel='$hn' && country='$cn' && location='$ln'";

		$resulttaar = $conn->query($sqllaar);

	
if ($resulttaar->num_rows > 0) {
  // output data of each row
  while($rowwar = $resulttaar->fetch_assoc()) {
	  
	  $extra=$rowwar['extrabed'];

}
}

$ex=$extra*$more;
echo $tp+$ex;
		
	
	



	}	
  
	


	
	


?>