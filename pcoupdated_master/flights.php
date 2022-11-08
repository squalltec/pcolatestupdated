
<?php
session_start();
require_once('db_connection.php');
$hn=$_SESSION['hotel'];

$title=$_SESSION['ctitle'];
$fname=$_SESSION['cfname'];
$lname=$_SESSION['clname'];
$phone=$_SESSION['cphone'];
$email=$_SESSION['cemail'];


$uniquenumber=$_SESSION['uniquenumber'];


if($uniquenumber==''){

    
    $uniquenumber =  random_int(10000, 1000000000);
	
	$_SESSION['uniquenumber']=$uniquenumber;
    
    
}
















if (isset($_POST['submit']))
{
    
    
    
    
     $_SESSION['cctitle']=$_POST['title'];
     $_SESSION['ccfname']=$_POST['fname'];
     $_SESSION['cclname']=$_POST['lname'];
     $_SESSION['ccphone']=$_POST['phone'];
     $_SESSION['ccemail']=$_POST['email'];
    
    
    
    
  
if (isset($_POST['trip']))
{
  $triptype=$_POST['trip'];
 

}
else{
    $triptype='';
}
  
    
    
    
if (isset($_POST['arrivalpax']))
{
  $arrivalpax=$_POST['arrivalpax'];
 

}
else{
    $arrivalpax='';
}
  
  
if (isset($_POST['departurepax']))
{
  $departurepax=$_POST['departurepax'];
 

}
else{
    $departurepax='';
}
  
    
    
    
    
    
    
    
       
if (isset($_POST['arrivalvehicle']))
{
  $arrivalvehicle=$_POST['arrivalvehicle'];
 

}
else{
    $arrivalvehicle='';
}
  
  
if (isset($_POST['departurevehicle']))
{
  $departurevehicle=$_POST['departurevehicle'];
 

}
else{
    $departurevehicle='';
}
  
    
    
    
    
    
    
    
    
    
    
    


if (isset($_POST['hotelname']))
{
  $hotelname=$_POST['hotelname'];

}
else{
    $hotelname='';
}


if (isset($_POST['airportname']))
{
  $airportname=$_POST['airportname'];

}
else{
    $airportname='';
}



if (isset($_POST['arrivalairline']))
{
  $arrivalairline=$_POST['arrivalairline'];

}
else{
    $arrivalairline='';
}


if (isset($_POST['departureairline']))
{
  $departureairline=$_POST['departureairline'];

}
else{
    $departureairline='';
}



if (isset($_POST['departureflightnumber']))
{
  $departureflightnumber=$_POST['departureflightnumber'];

}
else{
    $departureflightnumber='';
}





if (isset($_POST['arrivalflightnumber']))
{
  $arrivalflightnumber=$_POST['arrivalflightnumber'];

}
else{
    $arrivalflightnumber='';
}



if (isset($_POST['arrivaldate']))
{
  $arrivaldate=$_POST['arrivaldate'];

}
else{
    $arrivaldate='';
}

if (isset($_POST['departuredate']))
{
  $departuredate=$_POST['departuredate'];

}
else{
    $departuredate='';
}





if (isset($_POST['arrivaltime']))
{
  $arrivaltime=$_POST['arrivaltime'];

}
else{
    $arrivaltime='';
}

if (isset($_POST['departuretime']))
{
  $departuretime=$_POST['departuretime'];

}
else{
    $departuretime='';
}



$_SESSION['triptype']=$triptype;

$_SESSION['hotelname']=$hotelname;
$_SESSION['airportname']=$airportname;
$_SESSION['arrivalairline']=$arrivalairline;
$_SESSION['departureairline']=$departureairline;
$_SESSION['arrivalairline']=$arrivalairline;
$_SESSION['departureflightnumber']=$departureflightnumber;
$_SESSION['arrivalflightnumber']=$arrivalflightnumber;
$_SESSION['departuredate']=$departuredate;
$_SESSION['arrivaldate']=$arrivaldate;
$_SESSION['departuretime']=$departuretime;
$_SESSION['arrivaltime']=$arrivaltime;


$_SESSION['departurepax']=$departurepax;
$_SESSION['arrivalpax']=$arrivalpax;
$_SESSION['departurevehicle']=$departurevehicle;
$_SESSION['arrivalvehicle']=$arrivalvehicle;



header("Location: selectcar.php");

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
            <h1>Transfer</h1>
        </div>
   </div>
</div> <!-- /end secondary-pages-background  -->
	<div class="extra-pages-container">
    <div class="container_16">
        <div class="grid_16">
		
        <form action="#" method="POST">
        	<div class="package-container-box clearfix">
            
				<div style='width:80%; margin:0 auto; text-align:center;' class="rooms-booking-details clearfix">
				    
				    
                        <label for="email">Trip</label>
                        <select style=' text-align:center;' required name="trip" id="trip" class="span12">
                            <option>One Way from Airport to Hotel</option>
                             <option>One Way from Hotel to Airport</option>
                             <option>Round</option>
                            </select>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <h1>Personal Info</h1>
                        <br/>
                        
                        <div class="grid_6"><label for="email">Title</label><select name="title" id="title" class="span12"><option><?php echo $title[0]; ?></option><option>Mr</option><option>Mrs</option><option>Miss</option><option>Dr</option><option>Prof</option> </select>
                        </div>
                        <div class="grid_6"><label for="email">First Name</label><input required type="text" name="fname" value="<?php echo $fname[0];?>"  id="fname" class="span12"></div>  
                        
                        
                             <div class="grid_6"><label for="email">Last Name</label><input required type="text" name="lname" value="<?php echo $lname[0];?>"  id="lname" class="span12"></div>  
                        
                              <div class="grid_6"><label for="email">Phone</label><input required type="text" name="phone" value="<?php echo $phone[0];?>"  id="phone" class="span12"></div>  
                              
                                    <div class="grid_6"><label for="email">Email</label><input required type="text" name="email" value="<?php echo $email[0];?>"  id="email" class="span12"></div>  
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        
                        
                        <div style='' id='populatefields'>
                        
                 
                 
                        
                        </div>
                        
                    </div>
                </div><!-- /end rooms-booking-details -->
				
				
				
				
		
				
				
            </div><!-- /end package-container-box /Hotel -->
        	     
        	
        	
            <button style="float:right;" type='submit' name='submit' class="btn" style="width:250px; margin:0 auto;">MAKE MY BOOKING</button><br />
        </form>
        </div>
   </div>   
    
  </div><!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>


<script>  
     
        const elem = document.getElementById('trip').value;
  if(elem.includes('from Airport')){
        
       
        $("#populatefields").html('<h1>Arrival Details</h1><br/><div class="grid_6"><label for="email">Airport Name</label><input required type="text" name="airportname" id="airline" class="span12"></div><div class="grid_6"><label for="email">Hotel Name</label><input required type="text" name="hotelname" value="<?php echo $hn;?>"  id="flightnumber" class="span12"></div>  <div class="grid_6"><label for="email">Airline Name</label><input required type="text" name="arrivalairline" id="airline" class="span12"></div><div class="grid_6"><label for="email">Flight Number</label><input required type="text" name="arrivalflightnumber" id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Arrival Date</label><input required type="date" name="arrivaldate" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Arrival Time</label><input required type="time" name="arrivaltime" id="arrivaltime" class="span12"></div>   <div class="grid_6"><label for="email">Pax</label><input required type="number" name="arrivalpax" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Vehicle Type</label><select required name="arrivalvehicle" id="arrivaltime" class="span12"><option>Standard</option><option>Luxury</option><option>Limousine</option></select></div>');
						
						
						
						
						
					
                        
                        
       
   }
   
   
   
   
   $("#trip").on("change", function(){
       const elem = document.getElementById('trip').value;
   if(elem=='Round'){
       $("#populatefields").html('<div class="grid_6"><label for="email">Airport Name</label><input required type="text" name="airportname" id="airline" class="span12"></div><div class="grid_6"><label for="email">Hotel Name</label><input required type="text" name="hotelname" value="<?php echo $hn;?>"  id="flightnumber" class="span12"></div><h1>Arrival Details</h1><br/><div class="grid_6"><label for="email">Airline Name</label><input required type="text" name="arrivalairline" id="airline" class="span12"></div><div class="grid_6"><label for="email">Flight Number</label><input required type="text" name="arrivalflightnumber" id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Arrival Date</label><input required type="date" name="arrivaldate" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Arrival Time</label><input required type="time" name="arrivaltime" id="arrivaltime" class="span12"></div> <div class="grid_6"><label for="email">Pax</label><input required type="number" name="arrivalpax" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Vehicle Type</label><select required name="arrivalvehicle" id="arrivaltime" class="span12"><option>Standard</option><option>Luxury</option><option>Limousine</option></select></div> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h1>Departure Details</h1><br/><div class="grid_6"><label for="email">Airline Name</label><input required type="text" name="departureairline" id="airline" class="span12"></div><div class="grid_6"><label for="email">Flight Number</label><input required type="text" name="departureflightnumber" id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Departure Date</label><input required type="date" name="departuredate" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Departure Time</label><input required type="time" name="departuretime" id="arrivaltime" class="span12"></div>  <div class="grid_6"><label for="email">Pax</label><input required type="number" name="departurepax" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Vehicle Type</label><select required name="departurevehicle" id="arrivaltime" class="span12"><option>Standard</option><option>Luxury</option><option>Limousine</option></select></div> ');
       
       
					
       
   }
   
    else if(elem.includes('to Airport')){
         $("#populatefields").html('<h1>Departure Details</h1><br/><div class="grid_6"><label for="email">Airport Name</label><input required type="text" name="airportname" id="airline" class="span12"></div><div class="grid_6"><label for="email">Hotel Name</label><input required type="text" name="hotelname" value="<?php echo $hn;?>"  id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Airline Name</label><input required type="text" name="departureairline" id="airline" class="span12"></div><div class="grid_6"><label for="email">Flight Number</label><input required type="text" name="departureflightnumber" id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Arrival Date</label><input required type="date" name="departuredate" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Arrival Time</label><input required type="time" name="departuretime" id="arrivaltime" class="span12"></div> <div class="grid_6"><label for="email">Pax</label><input required type="number" name="departurepax" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Vehicle Type</label><select required name="departurevehicle" id="arrivaltime" class="span12"><option>Standard</option><option>Luxury</option><option>Limousine</option></select></div> ');
					
       
   }
   
   
   
     else if(elem.includes('to Hotel')){
         $("#populatefields").html('<h1>Arrival Details</h1><br/><div class="grid_6"><label for="email">Airport Name</label><input required type="text" name="airportname" id="airline" class="span12"></div><div class="grid_6"><label for="email">Hotel Name</label><input required type="text" name="hotelname" value="<?php echo $hn;?>"  id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Airline Name</label><input required type="text" name="arrivalairline" id="airline" class="span12"></div><div class="grid_6"><label for="email">Flight Number</label><input required type="text" name="arrivalflightnumber" id="flightnumber" class="span12"></div><div class="grid_6"><label for="email">Arrival Date</label><input required type="date" name="arrivaldate" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Arrival Time</label><input required type="time" name="arrivaltime" id="arrivaltime" class="span12"></div> <div class="grid_6"><label for="email">Pax</label><input required type="number" name="arrivalpax" id="arrivaldate" class="span12"></div><div class="grid_6"><label for="email">Vehicle Type</label><select required name="arrivalvehicle" id="arrivaltime" class="span12"><option>Standard</option><option>Luxury</option><option>Limousine</option></select></div>');
					
       
   }
   
   
   
   
   });
    
</script>
</body>
</html>