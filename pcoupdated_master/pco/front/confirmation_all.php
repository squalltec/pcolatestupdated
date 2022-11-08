<?php


session_start();
require_once('db_connection.php');

$bookinginfo=$_SESSION['uniquenumber'] ;

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Professional Congress Organizer - PCO Connect - Confirmation</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
</head>
<body>
<?php include_once("includes/header.php"); ?>
	<div class="secondary-pages-background">
    <div class="container_16">
        <div class="grid_16">
            <h1>Confirmation</h1>
        </div>
   </div>
</div> <!-- /end secondary-pages-background  -->
	<div class="extra-pages-container">
    <div class="container_16">
        <form class="booking" action="booking" method="post" id="booking">
        <fieldset>
            <div class="grid_16">
            <h4 class="float-left" style="padding:10px 20px; border:3px solid #090; color:#090; font-weight:bold; margin-bottom:10px;">Thank you. Your Hotel & Transport booking is now confirmed.</h4>
            <div align="right" style="padding-top:10px;"><a onclick="printpage()" title="Print booking" class="btn" href="#">Print booking</a></div>
          </div>
            
			 <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
            <table align='center' width="100%" class="confirmation-table">
            	  <tr>
            	    <td class="color-1 grid_5"><h2><b>Booking number:</b></h2></td>
            	    <td class="grid_11"><h2><?php echo $bookinginfo?></h2></td>
            	  </tr>
                 
                  <tr>
            	    
            	    
            	  </tr>
            	  
            	</table>
           
		   <br/>
		    <br/> <br/> <br/> <br/> <br/>
		   <div class="grid_16">
           
            <p><strong>We wish you a pleasant Stay & Journey</strong><br>
                <i>PCO-connect team</i></p>
          </div>
          </fieldset>
      </form>
    </div>
  </div> <!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>
<script type="text/javascript">
	function printpage()
	{window.print()}
</script>
</body>
</html>
