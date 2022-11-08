
<?php
session_start();
require_once('db_connection.php');
$max='';
$rn='';
$rna='';
$rnc='';
$roomtype=$_GET['typpe'];

$rt=$_GET['typpe'];

$_SESSION['rt']=$rt;
$sd=$_SESSION['sdate'];
$ed=$_SESSION['edate'];
$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];

$edd='';


if (isset($_POST['submit'])) {
	
	
	$_SESSION['roomnmb']=$_POST['rooms'];
		
	$_SESSION['adults']=$_POST['adults'];
	$_SESSION['children']=$_POST['children'];
	
	$_SESSION['adult1']=$_POST['adults1'];
	$_SESSION['children1']=$_POST['children1'];
	
	$_SESSION['adult2']=$_POST['adults2'];
	$_SESSION['children2']=$_POST['children2'];
	
	$_SESSION['adult3']=$_POST['adults3'];
	$_SESSION['children3']=$_POST['children3'];
	
	$_SESSION['adult4']=$_POST['adults4'];
	$_SESSION['children4']=$_POST['children4'];
	
	$_SESSION['adult5']=$_POST['adults5'];
	$_SESSION['children5']=$_POST['children5'];
	
	$_SESSION['adult6']=$_POST['adults6'];
	$_SESSION['children6']=$_POST['children6'];
	
	$_SESSION['adult7']=$_POST['adults7'];
	$_SESSION['children7']=$_POST['children7'];
	
	$_SESSION['adult8']=$_POST['adults8'];
	$_SESSION['children8']=$_POST['children8'];
	
	$_SESSION['adult9']=$_POST['adults9'];
	$_SESSION['children9']=$_POST['children9'];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo "<script>location.replace('prices.php');</script>";
	
	
	
}












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
<title>Professional Congress Organizer - PCO Connect - Checkout</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
</head>
<body>
<?php 



include_once("includes/header.php"); 

?>
</br></br></br>
	<div class="extra-pages-container">
    <div class="container_16">
        <div class="grid_16">
        <form action="#" method="POST">
        	<div class="package-container-box clearfix">
            	<div class="package-header"><h1 class="color-1"><?php echo $roomtype;?> </h1><hr /></div>
                
                <div class="rooms-booking-details clearfix">
                   
                    <div class="container_16">
                        <div class="grid_3">
                        <label for="title">Rooms:</label>
                        <div class="custom_select">
                            <select name="rooms" id="rooms">
                          




						 
						   
						   
                        </select>
                                <div class="custom_select_bg"></div>
                                <div class="custom_select_arrows"></div>
                            </div>
                        </div>
						
						
						
						
                    </div>
					
					
					
					
					
					
					
					
			<div id="ok">


						
						
                        <div class="grid_6">
                       
					   <label for="fname">Adults / Room:</label>
						
                         <select name="adults" id="adults">
                           
						   
						   
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label for="lname">Children / Room</label>
						
                         <select name="children" id="children">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
						
						
                        </div>
						
						
						
						
						
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la1' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults1" id="adults1">
                           <option>0</option>
						   
						   
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc1' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children1" id="children1">
                           
						    
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la2' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults2" id="adults2">
                           
						   
						    <option>0</option>
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label   style="display:none;" id='lc2' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children2" id="children2">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						
						
						
					  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la3' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults3" id="adults3">
                           
						   
						   
						   
						    <option>0</option>
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc3' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children3" id="children3">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>	
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la4' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults4" id="adults4">
                           
						    <option>0</option>
						   
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc4' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children4" id="children4">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						
						
						
						
						
						
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la5' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults5" id="adults5">
                            <option>0</option>
						   
						   
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc5' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children5" id="children5">
                            
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la6' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults6" id="adults6">
                           
						   
						    <option>0</option>
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc6' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children6" id="children6">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la7' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults7" id="adults7">
                           
						    <option>0</option>
						   
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;"  id='lc7' for="lname">Children / Room</label>
						
                         <select  style="display:none;"  name="children7" id="children7">
                           
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;"  id='la8' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;"  name="adults8" id="adults8">
                           
						   
						    <option>0</option>
						   
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;" id='lc8' for="lname">Children / Room</label>
						
                         <select  style="display:none;" name="children8" id="children8">
                           
						  
						   
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						  <div class="grid_6">
                       
					   <label  style="display:none;" id='la9' for="fname">Adults / Room:</label>
						
                         <select  style="display:none;" name="adults9" id="adults9">
                           
						   
						   
						    <option>0</option>
						   
						   
						    <?php
						   
						  
						   
$sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaa = $conn->query($sqllsaa);


	
if ($resulttsaa->num_rows > 0) {
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rna=$rowwsaa['adults'];
	 
	 
  }
  
 
}


for($i=1; $i<=$rna; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
                        </select>
                        </div>
						
						
						
						
						
                        <div class="grid_6">
                        <label  style="display:none;" id='lc9' for="lname">Children / Room</label>
						
                         <select  style="display:none;" name="children9" id="children9">
                           
						   
						    
						   
						    <?php
						   
						  
						   
$sqllsaaa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";
		$resulttsaaa = $conn->query($sqllsaaa);


	
if ($resulttsaaa->num_rows > 0) {
  // output data of each row
  while($rowwsaaa = $resulttsaaa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rnc=$rowwsaaa['children'];
	 
	 
  }
  
 
}

if($rnc=='0'){
		echo "<option>0</option>";
}
for($i=0; $i<=$rnc; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   
						   
						   
                        </select>
						
                        </div>
						
						
						
						
						
						
						
						
						
						
						


</div>			
			
			
					
					
					
					
					
					
					
					
					
					
					
                </div><!-- /end rooms-booking-details -->
            </div><!-- /end package-container-box /Hotel -->
        	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            <button class="btn" name='submit' type="submit" style="float:right; width:250px; margin:0 auto;">CONTINUE MY BOOKING</button><br />
        </form>
        </div>
   </div>   
    
  </div><!-- /end extra-featured-container -->
  
  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>
  
  
  
  $(document).ready(function(){
	
	

	
	  $.ajax({
              
			  type:'POST',
              url:'getroomnumbers.php',
             
              success:function(result){
                  
				
				$("#rooms").html(result);
				  
                
                 
              }
			  
          }); 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		
$("#rooms").on('change', function() {
	
	
	var compy1=$("#rooms").val();
	
	
for(i=1; i<10; i++){
	document.getElementById("adults"+i).selectedIndex = "0";
	document.getElementById("la"+i).style.display = "none";
	document.getElementById("adults"+i).style.display = "none";
	document.getElementById("lc"+i).style.display = "none";
	document.getElementById("children"+i).style.display = "none";
	document.getElementById("children"+i).selectedIndex = "0";
	
	
	
}
		
	
	
	
	for(i=1; i<compy1; i++){
		
	document.getElementById("la"+i).style.display = "block";
		
	document.getElementById("adults"+i).style.display = "block";
	
	document.getElementById("lc"+i).style.display = "block";
	
	document.getElementById("children"+i).style.display = "block";
	
	
		  
	}
		
	
})
  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		
	


  });
  </script>
  
  
  
  
  
  
  
  
  
  
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>
</body>
</html>