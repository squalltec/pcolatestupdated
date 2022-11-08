<?php
session_start();
include '../db_connection.php';




if (isset($_POST['submit'])) {
	
	$_SESSION['arrivalcar']=$_POST['acar'];
$_SESSION['departurecar']=$_POST['dcar'];


$arrivalcar=$_POST['acar'];
$departurecar=$_POST['dcar'];
$triptype=$_SESSION['triptype'];
$hotelname=$_SESSION['hotelname'];
$airportname=$_SESSION['airportname'];
$arrivalairline=$_SESSION['arrivalairline'];
$departureairline=$_SESSION['departureairline'];
$arrivalairline=$_SESSION['arrivalairline'];
$departureflightnumber=$_SESSION['departureflightnumber'];
$arrivalflightnumber=$_SESSION['arrivalflightnumber'];
$departuredate=$_SESSION['departuredate'];
$arrivaldate=$_SESSION['arrivaldate'];
$departuretime=$_SESSION['departuretime'];
$arrivaltime=$_SESSION['arrivaltime'];
$departurepax=$_SESSION['departurepax'];
$arrivalpax=$_SESSION['arrivalpax'];
$departurevehicle=$_SESSION['departurevehicle'];
$arrivalvehicle=$_SESSION['arrivalvehicle'];

$title=$_SESSION['ctitle'];
$fname=$_SESSION['cfname'];
$lname=$_SESSION['clname'];
$phone=$_SESSION['cphone'];
$email=$_SESSION['cemail'];

$a=	$_SESSION['uniquenumber'];

if($a==''){
	$uniquenumber =  random_int(10000, 1000000000);
	
	$_SESSION['uniquenumber']=$uniquenumber;	
}
else{
   $uniquenumber =  	$_SESSION['uniquenumber'];
}

if(is_array($title)){
    
    
$ttitle=$title[0];
$ffname=$fname[0];
$llname=$lname[0];
$pphone=$phone[0];
$eemail=$email[0];
    
}
else{
$ttitle=$title;
$ffname=$fname;
$llname=$lname;
$pphone=$phone;
$eemail=$email;
    
}




if($arrivalcar!=''){
    
         
$sql2 ="SELECT * FROM vehicles WHERE id='$arrivalcar'";
		$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
      
      
        $maxu=intval($row2['maximum']);
	  
	  $need=intval($_SESSION['arrivalpax']);
	  
	  
	  $cars=$need/$maxu;
	  $bb=strval($cars);
	
	if(strpos($bb, '.') !== false){

    $nn=intval($bb)+1;
    echo $nn;
	  
	  }
	  else{
	     $nn=intval($bb); 
	     echo $nn;
	  }
	  
      
      
      
  }
}
    
    
}
    
else{
    $nn='';
}

















if($departurecar!=''){
    
         
$sql2 ="SELECT * FROM vehicles WHERE id='$departurecar'";
		$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
      
      
        $maxu2=intval($row2['maximum']);
	  
	  $need2=intval($_SESSION['arrivalpax']);
	  
	  
	  $cars2=$need2/$maxu2;
	  $bb2=strval($cars2);
	
	if(strpos($bb2, '.') !== false){

    $nn2=intval($bb2)+1;
   
	  
	  }
	  else{
	     $nn2=intval($bb2); 
	    
	  }
	  
      
      
      
  }
}
    
    
}
    
else{
    $nn2='';
}
	
	

$sqle ="INSERT INTO vehiclebooking (title,fname,lname,phone,email,arrivalcar, departurecar,triptype,hotelname,airportname,arrivalairline,departureairline,departureflightnumber,arrivalflightnumber,departuredate,arrivaldate,departuretime,arrivaltime,departurepax,arrivalpax,departurevehicle,arrivalvehicle,uniquenumber,arrivalcarsnumber,departurecarsnumber) VALUES ('$ttitle','$ffname','$llname','$pphone','$eemail','$arrivalcar','$departurecar','$triptype','$hotelname','$airportname','$arrivalairline','$departureairline','$departureflightnumber','$arrivalflightnumber','$departuredate','$arrivaldate','$departuretime','$arrivaltime','$departurepax','$arrivalpax','$departurevehicle','$arrivalvehicle','$uniquenumber','$nn','$nn2')";

 $resulte = $conn->query($sqle);


if ($resulte === TRUE) {
//header("Location: confirmation_transport.php");
header("Location: confirmation_transport.php");
} else {
  echo "Error: " . $sqle . "<br>" . $conn->error;
}



	
	
	
	
	
	
	
	
	
	
	



























	
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
<title>Professional Congress Organizer - PCO Connect - Transfers Search Results</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
<link rel="stylesheet" href="css/datepicker.css">
</head>
<body>
<?php include_once("includes/header.php"); ?>

<br/><br/><br/><br/><br/>
<div class="container_16">
    <form action='#' method='POST'>
    <div>
        
        
        <style>
            .column {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
        </style>
        <style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>

        <div  class='row'>
            
            
            <style>
                .dsim{
                    width:220px !important; 
                    height:144px !important; 
                }
            </style>
            
            <?php
            $ad=$_SESSION['arrivalvehicle'];
            if($ad!='')
            {
           
            ?>
            
            
        
            <div style="overflow-y:scroll; height:500px;" class='column'>
                <h2 align='center'>Select Arrival Vehicle (<?php echo $_SESSION['arrivalvehicle'];?>)</h2>
    <ul id="products" class="list clearfix">
        <?php
        
        
$sql ="SELECT * FROM vehicles WHERE type='$ad'";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  $maxu=intval($row['maximum']);
	  
	  $need=intval($_SESSION['arrivalpax']);
	  
	  
	  $cars=$need/$maxu;
	  $bb=strval($cars);
	
	if(strpos($bb, '.') !== false){

    $nn=intval($bb)+1;
	  
	  }
	  else{
	     $nn=intval($bb); 
	  }
	  
	 
	  
	   $_SESSION['numberofarrivalcars']=$nn;
	
        ?>
        
        
     <li style=' width:50%; margin: 0 auto;'>
      
            <div class=" dsim results-image"><img style='width:100%;' src="../Vehicle Images/<?php echo $row['name'];?>/<?php echo $row['image'];?>" alt="Car Result Image"></div>
            <!-- /end transfer-results-container-image -->
           
            <h1 style='text-align:center;' class="color-1"><?php echo $row['name'];?></h1>
           
             <img width="14" height="14" align="absmiddle" src="images/checkbox.png"><span style="margin-bottom:4px;"> Maximum <?php echo $row['maximum'];?> Persons allowed.</span><br>
                <img width="14" height="14" align="absmiddle" src="images/checkbox.png"> <?php echo $row['luggages'];?> Luggages allowed.<br>
                <img width="14" height="14" align="absmiddle" src="images/checkbox.png"> Seating Capacity: <?php echo $row['capacity'];?> Seater.<br>
              
            
            <!-- /end transfer-results-container-inside -->
         
            <p style="text-align:center;'text-decoration:blink !important; color:#F00;">*Price for 1 car per KM</p>
           <h1 style='text-align:center;'  class="color-1">  AED <?php echo $row['price'];?></h1><br/>
            <h3 style='text-align:center;'  class="color-1"><?php echo $nn;?> Car Needed for <?php echo $_SESSION['arrivalpax'];?> Persons</h3><br/>
           
             <h1 style='text-align:center;'  class="color-1">   <a align='center' class="btn" id="button"> <label><input type='radio' value='<?php echo $row['id'];?>' name='acar'>&nbsp;SELECT</label></a></h1>
            <!-- /end transfer-results-container-inside-rate --> 
         
      </li>
      <br/>
        <?php
            }
}?>
     
    </ul>
    </div>
    
    
    <?php
        
}
            ?>
    
    
    
    
    
    
         
            <?php
            $dd=$_SESSION['departurevehicle'];
            if($dd!='')
            {
           
            ?>
    
     <div style="overflow-y:scroll; height:500px;" class='column'>
         <h2 align='center'>Select Departure Vehicle  (<?php echo $_SESSION['departurevehicle'];?>)</h2>
    <ul id="products" class="list clearfix">
    
    <?php
        
        
$sql ="SELECT * FROM vehicles WHERE type='$dd'";
		$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  
	  
	  
	   $maxu2=intval($row['maximum']);
	  
	  $need2=intval($_SESSION['arrivalpax']);
	  
	  
	  $cars2=$need2/$maxu2;
	  $bb2=strval($cars2);
	
	if(strpos($bb2, '.') !== false){

    $nn2=intval($bb2)+1;
	  
	  }
	  else{
	     $nn2=intval($bb2); 
	  }
	  
	 
	  
	  
	  
	  
	  
	  
	  $_SESSION['numberofdeparturecars']=$nn2;
	  
	  
	
        ?>
        
        
     <li style=' width:50%; margin: 0 auto;'>
      
            <div class=" dsim results-image"><img style='width:100%;' src="../Vehicle Images/<?php echo $row['name'];?>/<?php echo $row['image'];?>" alt="Car Result Image"></div>
            <!-- /end transfer-results-container-image -->
           
            <h1 style='text-align:center;' class="color-1"><?php echo $row['name'];?></h1>
           
             <img width="14" height="14" align="absmiddle" src="images/checkbox.png"><span style="margin-bottom:4px;"> Maximum <?php echo $row['maximum'];?> Persons allowed.</span><br>
                <img width="14" height="14" align="absmiddle" src="images/checkbox.png"> <?php echo $row['luggages'];?> Luggages allowed.<br>
                <img width="14" height="14" align="absmiddle" src="images/checkbox.png"> Seating Capacity: <?php echo $row['capacity'];?> Seater.<br>
              
            
            <!-- /end transfer-results-container-inside -->
         
            <p style="text-align:center;'text-decoration:blink !important; color:#F00;">*Price for 1 car per KM</p>
           <h1 style='text-align:center;'  class="color-1">  AED <?php echo $row['price'];?></h1><br/>
            <h3 style='text-align:center;'  class="color-1"><?php echo $nn2;?> Car Needed for <?php echo $_SESSION['arrivalpax'];?> Persons</h3><br/>
                 
             <h1 style='text-align:center;'  class="color-1">   <a align='center' class="btn" id="button"> <label><input type='radio' value='<?php echo $row['id'];?>' name='dcar'>&nbsp;SELECT</label></a></h1>
            <!-- /end transfer-results-container-inside-rate --> 
         
      </li>
       <?php
            }
}?>
     
    </ul>
    </div>
    
    
   <?php
}
            ?>
    
    
    
    
    
    </div>
    
    
    <br /><br />
    
    
    
    
     <button style="float:right;" type='submit' name='submit' class="btn" >Proceed</button><br />
    
    </form>
    
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
