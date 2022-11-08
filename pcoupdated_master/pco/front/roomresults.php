
<?php
session_start();
require_once('db_connection.php');
$sd=$_SESSION['sdate'];
$ed=$_SESSION['edate'];

$start=$_SESSION['sdate'];
$end=$_SESSION['edate'];

$pri=array();



$hn=$_SESSION['hotel'];
			$cn=$_SESSION['country'];
			$ln=$_SESSION['city'];
?>



<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Professional Congress Organizer - PCO Connect - Hotel Search Results</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
<link rel="stylesheet" href="css/datepicker.css">
</head>
<body>
<?php include_once("includes/header.php"); ?>

<br/><br/><br/>

<div>

<h2 style="margin-left:10%; float:left;">Check in: <?php echo $_SESSION['sdate']; ?></h2><h2 style="margin-right:10%;  float:right;">Check Out: <?php echo $_SESSION['edate']; ?></h2>







</div>
<br/><br/><br/>
<div class="container_16">
    <div>
	
	
        <ul id="products" class="list clearfix">
		
		
		
		<?php
			

$sqll ="SELECT * FROM roomtypes WHERE hotel='$hn' && country='$cn' && location='$ln' ";
		$resultt = $conn->query($sqll);

$i=0;
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  
	  
	  $rt=$roww['name'];
	  
	  
	  
	  
	  
	  
	  
	  


$sqlla ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln'";
		$resultta = $conn->query($sqlla);

if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	  
	  
	  
	  $sdate=$rowwa['sdate'];
	  $edate=$rowwa['edate'];
	  
	  if($start >=$sdate && $end <=$edate)
				
				
				{
					
					$p=$rowwa['sellprice'];
					array_push($pri, $p);
					
				}
	  
	  else if($start >=$sdate && $end >$edate)
				
				
				{
					
					
					$p=$rowwa['sellprice'];
					array_push($pri, $p);
					
					
				}
	  
	  
	  	else if($start < $sdate && $end <=$edate)
				
				
				{
					
					$p=$rowwa['sellprice'];
					array_push($pri, $p);
					
				}
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 
			
}}



	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
			
			
			?>
		
		
		
		
      <li>
        <div class="results-container clearfix">
		
		<?php
			
			$imgs=array();

$sqlls ="SELECT * FROM roomimages WHERE hotel='$hn' && country='$cn' && location='$ln' && room='$rt' ";
		$resultts = $conn->query($sqlls);


	
if ($resultts->num_rows > 0) {
  // output data of each row
  while($rowws = $resultts->fetch_assoc()) {
	 

	 $im=$rowws['image'];
	  
	  array_push($imgs,$im);
			
  }
}


			?>
			
		
          <div class="results-image"><img src="../Room Uploads/<?php echo $rt;?>/<?php echo $imgs[0];?>" alt="hotel-image"></div><!-- /end results-container-image -->
        



		<div class="results-inside">
            <h1 class="color-1"><?php echo $roww['name']; ?></h1>
            <hr />
            <p class="address"><?php echo $roww['location']; ?></p>
			
            <p class="description"><?php echo $roww['description']; ?></p>
			
			
            <i><a href="hotelmoreinfo.php" class="color-1 hover-normal fancybox fancybox.iframe"></a></i> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">
            <p>Room / Night <br/><small>starts from</small></p>
            <h1 class="color-1">AED <?php echo $pri[$i];?></h1>
            <a class="btn" id="button" href="select.php?typpe=<?php echo $roww['name'];?>">Select</a></div><!-- /end results-container-inside-rate -->
          </div>
      </li>
	  
	  
	  
	  
	  <?php
	  
	  $i=$i+1;
	  
  }
}
	  ?>
	  
	  
    </ul>
    </div>
</div> <!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>
<script type='text/javascript' src='js/jquery-ui-1.10.3.custom.js'></script> 
<script type="text/javascript" src="js/grid-list.js"></script> 
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="js/plugins.js"></script> 
<script>
	$(document).ready(function(){	
		$('.fancybox').fancybox();
	});
</script>
<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
</body>
</html>
