
<?php
session_start();
require_once('db_connection.php');





$standardprice=100;

$numberofdays=0;
$totalprice=0;


$roomtype=$_SESSION['roomtypee'];

$rt=$_SESSION['roomtypee'];

$_SESSION['rt']=$rt;


$sd=$_SESSION['sdate'];
$ed=$_SESSION['edate'];
$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];


$sstt=$_SESSION['sdate'];
$eedd=$_SESSION['edate'];

$start=date($sstt);
$end=date($eedd);
	  	  
$rooms=$_SESSION['roomnmb'];
$adults=$_SESSION['adults'];
$children=$_SESSION['children'];


$adult0=$_SESSION['adults'];
$children0=$_SESSION['children'];

$adult1=$_SESSION['adult1'];
$children1=$_SESSION['children1'];

$adult2=$_SESSION['adult2'];
$children2=$_SESSION['children2'];

$adult3=$_SESSION['adult3'];
$children3=$_SESSION['children3'];

$adult4=$_SESSION['adult4'];
$children4=$_SESSION['children4'];

$adult5=$_SESSION['adult5'];
$children5=$_SESSION['children5'];

$adult6=$_SESSION['adult6'];
$children6=$_SESSION['children6'];

$adult7=$_SESSION['adult7'];
$children7=$_SESSION['children7'];

$adult8=$_SESSION['adult8'];
$children8=$_SESSION['children8'];

$adult9=$_SESSION['adult9'];
$children9=$_SESSION['children9'];




$a0= (int)$adult0+(int)$children0;
$a1= (int)$adult1+(int)$children1;
$a2= (int)$adult2+(int)$children2;
$a3= (int)$adult3+(int)$children3;
$a4= (int)$adult4+(int)$children4;
$a5= (int)$adult5+(int)$children5;
$a6= (int)$adult6+(int)$children6;
$a7= (int)$adult7+(int)$children7;
$a8= (int)$adult8+(int)$children8;
$a9= (int)$adult9+(int)$children9;



$nm=array();

array_push($nm, $a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9);










		
$sqllaaw ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";

		$resulttaaw = $conn->query($sqllaaw);

	
if ($resulttaaw->num_rows > 0) {
  // output data of each row
  while($rowwaw = $resulttaaw->fetch_assoc()) {
	  
	  
	  $meal=$rowwaw['mealplan'];
	  
  }
}














$aaa=array();

	$price='';
	$tadults=(int)$adults+(int)$adult1+(int)$adult2+(int)$adult3+(int)$adult4+(int)$adult5+(int)$adult6+(int)$adult7+(int)$adult8+(int)$adult9;
	$tchildren=(int)$children+(int)$children1+(int)$children2+(int)$children3+(int)$children4+(int)$children5+(int)$children6+(int)$children7+(int)$children8+(int)$children9;
	
	$max=$tadults+$tchildren;
	
	
	
	
	$avalues=array();
	array_push($avalues, $adult0, $adult1, $adult2, $adult3, $adult4, $adult5, $adult6, $adult7, $adult8, $adult9);
	
	$cvalues=array();
	array_push($cvalues, $children0, $children1, $children2, $children3, $children4, $children5, $children6, $children7, $children8, $children9);
	
	
	
		

	  

	  
	  for($i=0;$i<10;$i++){
		  
		  
		  

  if($nm[$i]>0 && $nm[$i]<2)
	{



$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";

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
	


array_push($aaa,$tp);

		


	}	










if($nm[$i]>1 && $nm[$i]<3)
	{


$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";

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
	


array_push($aaa,$tp);

	



	}

 if($nm[$i]>2 && $nm[$i]<4)
	{


$tp=0;

			
$sqllaa ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt'";

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
	


array_push($aaa,$tp);

		
	
	



	}	
  
	



	
	  
	  
	  
	  }
	  
 
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
$startTimeStamp = strtotime($sd);
			$endTimeStamp = strtotime($ed);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
	
	
	
	
	
	if($numberDays> $numberofdays){
		
		$nas=$numberDays-$numberofdays;
		
		$additionalprice=$nas*$standardprice;
		
		$totalprice=$totalprice+$additionalprice;
		
		
		
	}
	
	
	
	
	
	
	
	
	
					   
$sql ="SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt' && sdate<='$sd' && edate>='$ed'";
		$result = $conn->query($sql);





	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	  
	  
	  
	  if($max>2 && $max<4)
	{
		
		$price=$row['dblsellprice'];
		
	}
	
	else if($max>3)
	{
		
		$price=$row['trplsellprice'];
		
	}
	
	else{
		
		$price=$row['sellprice'];
		
	}
	
	  
	  
	  
	  
	  
	  
	  
	  
	  
	
  }
}




	
	
	
	
	
	

if (isset($_POST['submit'])) {
	
	
	$title=array();
	$fname=array();
	$lname=array();
	$phone=array();
	$email=array();
	$price=array();
	
	$gettitle=$_POST['title'];
	$getfname=$_POST['firstname'];
	$getlname=$_POST['lastname'];
	$getphone=$_POST['phone'];
	$getemail=$_POST['email'];
	$getprice=$_POST['price'];
	
	
	
	
	foreach ($gettitle as $value) {
	
	array_push($title,$value);
 
  
}

foreach ($getfname as $value) {
	
	array_push($fname,$value);
 
  
}
foreach ($getlname as $value) {
	
	array_push($lname,$value);
 
  
}

foreach ($getphone as $value) {
	
	array_push($phone,$value);
 
  
}
foreach ($getemail as $value) {
	
	array_push($email,$value);
 
  
}

foreach ($getprice as $value) {
	
	array_push($price,$value);
 
  
}


	
	$_SESSION['ctitle']=$title;
	$_SESSION['cfname']=$fname;
	$_SESSION['clname']=$lname;
	$_SESSION['cphone']=$phone;
	$_SESSION['cemail']=$email;
	$_SESSION['cprice']=$price;
	$_SESSION['mealplan']=$_POST['meal'];
	
	$_SESSION['numberofdays']=$numberDays;
	
	$_SESSION['totalprice']=$totalprice;
	
		
	echo "<script>location.replace('ask.php');</script>";
		
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
<?php include_once("includes/header.php"); ?>
	<div class="secondary-pages-background">
    <div class="container_16">
        <div class="grid_16">
            <h1>My Bookings</h1>
        </div>
   </div>
</div> <!-- /end secondary-pages-background  -->
	<div class="extra-pages-container">
    <div class="container_16">
        <div class="grid_16">
		
        <form action="#.php" method="POST">
        	<div class="package-container-box clearfix">
            	<div class="package-header"><h1 class="color-1"><?php echo $roomtype;?> <span class="float-right"><small style="color:black;">Total: </small> AED <?php echo $totalprice;?></span></h1><hr /></div>
                <table width="100%">
                	<tr>
                		<td class="grid_2">No. of Rooms  
						</td>
                		<td class="grid_5"><span>:  <strong><?php echo $rooms;?></strong></span></td>
                		<td class="grid_3">Check in</td>
                		<td class="grid_5"><span>: <strong><?php echo $sd;?></strong></span></td>
                	</tr>
                    <tr>
                		<td class="grid_2">Check Out</td>
                		<td class="grid_5"><span>: <strong><?php echo $ed;?></strong></span></td>
                		<td class="grid_3">Room Type</td>
                		<td class="grid_5"><span>: <strong><?php echo $rt;?></strong></span></td>
                	</tr>
                    <tr>
                		<td class="grid_2">Days</td>
                		<td class="grid_5"><span>: <strong><?php echo $numberDays;?></strong></span></td>
                		<td class="grid_3">Total Guests</td>
                		<td class="grid_5"><span>: <strong><?php echo $max;?></strong><small>&nbsp; &nbsp;&nbsp;Adults: <?php echo "  ".$tadults;?></small><small>&nbsp; &nbsp;&nbsp;Children: <?php echo "  ".$tchildren;?></small></span></td>
                	</tr>
                </table>
                
				
				
				
				
				
				
				
				
				
				<?php
				for($populate=1; $populate<=$rooms; $populate++)
					
					{
						$minus=$populate-1;
						
						?>
				
				
				
				
				<br/><br/>
				<div class="rooms-booking-details clearfix">
                    <!--<h1 class="dashed-1"><span class="color-1">Room 1:</span> Standard Room City View (Double)</h1><hr />-->
					<br/><br/>
                    <div class="container_16">
					
					<div><h3>Room # <?php echo $populate."  ";?> <small style="margin-right:10%; float:right;">Adults: <?php 
					
					
					
					
					echo $avalues[$minus]."  ";
					
					?>
					
					 Children: <?php 
					
					echo $cvalues[$minus]."  ";
					
					?>
					</small>
					</h3>
					<h3 style="margin-right:10%; float:right;"><small>Price: AED <?php 
							
							
							echo $aaa[$minus];
							
							
							?></small></h3>
							<br/><br/>
							
							
					
					</div>
					<input name='meal' value='<?php echo $meal; ?>' style="display:none;" type='text'>
					<input name='price[]'type='text' style='display:none;' value="<?php echo $aaa[$minus]; ?>" >
                        <div class="grid_3">
                        <label for="title">Title:</label>
                        <div class="custom_select">
                            <select name="title[]" id="title">
                            <option>Mr.</option>
                            <option>Mrs.</option>
                            <option>Ms.</option>
							 <option>Dr.</option>
                        </select>
                                <div class="custom_select_bg"></div>
                                <div class="custom_select_arrows"></div>
                            </div>
                        </div>
                        <div class="grid_6">
                        <label for="fname">First Name:</label>
                        <input type="text" required name="firstname[]" id="fname" class="span12" placeholder="eg. John">
                        </div>
                        <div class="grid_6">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lastname[]" id="lname" class="span12" placeholder="eg. Doe">
                        </div>
						
						<div class="grid_6">
                        <label for="email">Phone</label>
                        <input required type="number" name="phone[]" id="phone" class="span12">
                        </div>
						
						<div class="grid_6">
                        <label for="email">Email</label>
                        <input required type="email" name="email[]" id="lname" class="span12" placeholder="eg. john@example.com">
                        </div>
                    </div>
                </div><!-- /end rooms-booking-details -->
				
				
				
				
				
				<?php
					
					}
				
				?>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
            </div><!-- /end package-container-box /Hotel -->
        	     
        	
        	
            <button style="float:right;" type='submit' id='subr' name='submit' class="btn" style="width:250px; margin:0 auto;">MAKE MY BOOKING</button><br />
        </form>
       
        </div>
   </div>   
    
  </div><!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>

</body>
</html>