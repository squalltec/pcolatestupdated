

<?php
session_start();
require_once('db_connection.php');

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
<title>Professional Congress Organizer - PCO Connect - Additional Services</title>
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
        	<form method="POST" action="#">
			
			
			
			
			<?php
			$hn=$_SESSION['hotel'];
			$cn=$_SESSION['country'];
			$ln=$_SESSION['city'];

$sqll ="SELECT * FROM roomtypes WHERE hotel='$hn' && country='$cn' && location='$ln' ";
		$resultt = $conn->query($sqll);


	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
			
			
			?>
			
			
			
        	<div class="package-container-box clearfix">
            	<div class="package-header"><h1 class="color-1"><?php echo $roww['name']; ?></h1><hr /></div>
                <table width="100%">
                	<tr>
                		<td class="grid_2">Address</td>
                		<td class="grid_5"><span>:  <strong><?php echo $roww['location']; ?></strong></span></td>
                		<td class="grid_3">Check in</td>
                		<td class="grid_5"><span>: <strong><?php echo $_SESSION['sdate']; ?></strong></span></td>
                	</tr>
                    <tr>
                		<td class="grid_2">Check Out</td>
                		<td class="grid_5"><span>: <strong><?php echo $_SESSION['edate']; ?></strong></span></td>
                		<td class="grid_3">Rooms Available</td>
                		<td class="grid_5"><span>: <strong>1</strong></span></td>
                	</tr>
                    <tr>
                		<td class="grid_2">Rate</td>
                		<td class="grid_5"><span>: <strong>Per Day</strong></span></td>
                		<td class="grid_3">Booking Status</td>
                		<td class="grid_5"><span>: <strong>ON REQUEST</strong></span></td>
                	</tr>
                </table>
                <div class="booking-banner-btn">
                    <img alt="Hotels" src="images/hotels.jpg">
                    <div class="booking-banner-btn-header">
                    <h3 class="padding-right-20"><a href="#" id="button" class="btn">BOOK NOW</a></h3></div>

                </div><!-- /end booking-banner-btn -->
            </div><!-- /end package-container-box /Hotel -->
        	
			
        
		
		<?php
  }
}
?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        
        	
            <button class="btn" style="width:250px; margin:0 auto;">CONTINUE MY BOOKING</button><br />
            </form>
        </div>
   </div>   
  </div><!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>
</body>
</html>