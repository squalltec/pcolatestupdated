<?php
session_start();
include 'db_connection.php';

$checkin=$_SESSION['sdate'];
$checkout=$_SESSION['edate'];

$country=$_SESSION['country'];

$city=$_SESSION['city'];



$ab=$_GET['nam'];




$sqllm ="SELECT * FROM hotels WHERE name='$ab'";
		$resulttm = $conn->query($sqllm);

if ($resulttm->num_rows > 0) {
  // output data of each row
  while($rowwm = $resulttm->fetch_assoc()) {
      
      $dems=$rowwm['description'];
      $caty=$rowwm['category'];
	  
	
	
  }
}


$rtsname=array();
$rtsdes=array();


$sqllmz ="SELECT * FROM roomtypes WHERE hotel='$ab' && country='$country' && location='$city'";
		$resulttmz = $conn->query($sqllmz);

if ($resulttmz->num_rows > 0) {
  // output data of each row
  while($rowwmz = $resulttmz->fetch_assoc()) {
      
   array_push($rtsname,$rowwmz['name']);
    array_push($rtsdes,$rowwmz['description']);
   
	  
	
	
  }
}













?>


<link rel="stylesheet" href="css/grid_16_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
<style type="text/css">
body { background: none !important; height: 438px; width: 960px; margin: 0 auto; border: 1px solid #999; }
.hotels-details-box { position: relative; background: #CCC; font-size: 12px; }
.hotels-details-box .left-section { background: #c1c1c1; width: 280px; float: left; }
.hotels-details-box .left-section .address { padding: 20px; font-weight: bold; }
.hotels-details-box .left-section .details-table { padding: 20px; }
.hotels-details-box .right-section { width: 680px; height: 438px; float: right; }
.hotels-details-box .right-section .detail-header { background: #dfdfdf; border-bottom: 1px solid #CCC; }
.hotels-details-box .right-section .detail-footer { background: #dfdfdf; border-top: 1px solid #CCC; }
.hotels-details-box .right-section .detail-header h1 { padding: 20px 0; padding-left: 25px; }
.hotels-details-box .right-section .tab-content { padding: 0px 25px; min-height: 311px; max-height: 311px; height: 311px; overflow-y: auto; width: auto; }
.hotels-details-box .left-section .idTabs { background: #d1d1d1; margin: 0; padding: 0; }
.hotels-details-box .left-section .idTabs li { display: block;margin: 0; border-bottom: 1px solid #999; }
.hotels-details-box .left-section .idTabs li a { display: block; color: #666; text-decoration: none; font-weight: bold; font-size: 15px; padding: 11px 0px; text-indent:20px; }
.hotels-details-box .left-section .idTabs li a:hover { background: #000;width: 106%; border-radius: 0px 90px 90px 0px}
.hotels-details-box .left-section .idTabs li a.selected { color: #FFF;background: #000;width: 106%; border-radius: 0px 90px 90px 0px}
.hotels-details-box .left-section .details-table td { border-bottom: 1px solid #666; padding: 5px 0; font-size: 13px; }
.hotels-details-box .left-section .details-table .left { text-align: left; padding-right: 15px; }
.hotels-details-box .left-section .details-table .right { font-weight: bold; }
.hotel-rooms-details {  margin-bottom:20px;}
.hotel-rooms-details table { padding:0; margin:0;}
.hotel-rooms-details td { vertical-align: top; background:#f2f2f2; padding:5px 10px; }
.hotel-rooms-details td .image { width: 200px; height: 120px; float:left; margin-right:15px; border:1px solid #c7c7c7; }
.hotel-rooms-details .left { width: 450px; margin-bottom:15px;}
.hotel-rooms-details .right { width: 140px; margin-bottom:15px; text-align:right; vertical-align:central; padding-top:50px;}
.hotel-rooms-details .right del { font-size:16px;}
.hotel-rooms-details .right .title { font-weight:bold; font-size:25px;}
.hotel-gallery-list{ margin:0; padding:0;}
.hotel-gallery-list img{ width:80px; height:50px; margin:3px; padding:3px; border:1px solid #999;}
.hotel-gallery-list li{ display:inline-block;}
.hotel-gallery-list li a{ display:block;}
#collapse-content { margin: 0 auto; padding-bottom: 10px; overflow: hidden }
.collapse-container { position: relative; overflow: hidden }
.collapse-container p {color:#333; padding:5px 0px;}
.collapse p { padding:5px 0px; }
.expand { padding-bottom: .75em }
/**
* @ Gallery Images
*/
#gallery-image {overflow:hidden; overflow-y:auto; min-height: 316px;}
.gallery-thumbs {width: 192px; float: left; margin-right:12px; }
#gallery-feature {width: 620px;}
#gallery-feature img {width:394px; height:256px;  margin:3px; padding:3px; border:1px solid #999;}
.gallery-thumb{border: 4px solid #ccc; margin: 4px;}

/**
* @ Links
*/
a:link, a:visited { border: 1px dotted #ccc; border-width: 0; text-decoration: none;}
a:hover, a:active, a:focus { border-style: solid; outline: 0 none;}
a:active, a:focus { color: red; }
.expand a { display: block;}
.expand a:link, .expand a:visited {background-image:url(img/arrow-down.gif); background-repeat: no-repeat; background-position: 98% 50%; color:#666; }
.expand a:hover, .expand a:active, .expand a:focus {}
.expand a.open:link, .expand a.open:visited { border-style: solid; background: #eee url(img/arrow-up.gif) no-repeat 98% 50%; }
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/vendor/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/expand.js"></script>
<script type="text/javascript">
$(function() {
	$("#collapse-content p.expand").toggler();
});
  $("#usual1").idTabs(); 
</script>
<script>
$(document).ready(function() {
	$(".galImg").click(function() {
		var image = $(this).attr("rel");
		$('#gallery-feature').fadeOut('slow');
		$('#gallery-feature').html('<img src="' + image + '"/>');
		$('#gallery-feature').fadeIn('slow');
		return false;
	});
});
</script>
<div class="hotels-details-box">
  <div class="left-section">
    <table width="100%" class="details-table" cellpadding="0" cellspacing="0">
      <tr>
        <td class="left">Check-in</td>
        <td class="right">:<?php echo $checkin;?></td>
      </tr>
      <tr>
        <td class="left">Check-out</td>
        <td class="right">: <?php echo $checkout;?></td>
      </tr>
   
    </table>
    <div id="nav-container">
      <ul id="usual1" class="idTabs">
        <li class="selected"><a href="#tab1" data-toggle="tab">&raquo; Description</a></li>
        <li><a href="#tab2" data-toggle="tab">&raquo; Rooms</a></li>
        <li><a href="#tab3" data-toggle="tab">&raquo; Amenities</a></li>
       <!-- <li><a href="#tab4" data-toggle="tab">&raquo; Photos</a></li>-->
        <li><a href="#tab5" data-toggle="tab">&raquo; Map</a></li>
      </ul>
    </div>
    <div class="address" align="center"><?php echo $country.', '.$city; ?></div>
  </div>
  <!-- /end left-nav -->
  <div class="right-section">
    <div class="detail-header">
      <h1 class="color-1"><?php echo $ab;?> <span>
          <?php
           $ct=intval($caty);
          for($i=0;$i<$ct;$i++){
            
          ?>
          
          <img src="img/star-ratings.png" alt="star-rating">
          <?php
          
          }
          
          ?>
          </span></h1>
    </div>
    <div class="tab-content">
      <div class="tab-pane" id="tab1">
        <h1 class="color-1">Description</h1>
        <p><?php echo $dems; ?> </p>
      </div> <!-- End /tab1 -->
      <div class="tab-pane" id="tab2">
        <h1 class="color-1">Room Types</h1>
        
           
            <?php
           
            $leng=count($rtsname);
           for($x=0; $x<$leng; $x++)
           {
            ?>
        <table class="hotel-rooms-details" cellpadding="0" cellspacing="0">
          <tr>
         
         
         
         
         <?php
         
         
$rtsimages=array();


$sqllmzb ="SELECT * FROM roomimages WHERE hotel='$ab' && country='$country' && location='$city' && room='$rtsname[$x]'";
		$resulttmzb = $conn->query($sqllmzb);

if ($resulttmzb->num_rows > 0) {
  // output data of each row
  while($rowwmzb= $resulttmzb->fetch_assoc()) {
      $imr=$rowwmzb['image'];
   array_push($rtsimages,$imr);
   

	
  }
}
         
         
         ?>
         
         
         
         
         
         
         
         
         
         
         
            
            <td class="left"><h3><?php echo $rtsname[$x]; ?></h3>
              <img src="../Room Uploads/<?php echo $ab;?>/<?php echo $rtsname[$x];?>/<?php echo $rtsimages[0];?>" class="image">
              <p><?php echo $rtsdes[$x]; ?></p>
            <!--  <div id="collapse-content">
                <div class="collapse-container">
                  <p class="expand">+ More Info</p>
                  <div class="collapse">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,. sed do eiusmod tempor incididunt ut labore 
                      et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip 
                      ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
                      eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
                      qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div>
              </div>--></td>
              
       
              
              
              
              
              
              
            <td class="right">
           <!-- <del class="gray">AED 5,940</del>
            <p class="title gray">AED&nbsp;2,970</p>
              <p><a href="#" class="btn btn-custom-darken">Book Now</a></p>--></td>
          </tr>
        </table>
        
            <?php
           
           }
           
           ?>
              
      </div> <!-- End /tab2 -->
      <div class="tab-pane" id="tab3">
        <h1 class="color-1">Amenities</h1>
        <p>Prices are per foom 20% VAT included in price</p>
      </div> <!-- End /tab3 -->
   
   
   
   <!--
   
      <div class="tab-pane" id="tab4">
        <h1 class="color-1">Photo</h1>        
        <div id="gallery-image">
          <ul class="gallery-thumbs hotel-gallery-list">
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
              <li><a href="#" rel="images/hotels/hotel-results.jpg" class="galImg"><img src="images/hotels/hotel-results.jpg" class="gallery-thumb" border="0"/></a></li>
          </ul>
          <div id="gallery-feature"><img src="images/hotels/hotel-results.jpg" border="0"/></div>
        </div>
      </div>
      
      -->
      <!-- End /tab4 -->
      <div class="tab-pane" id="tab5">
        <h2 class="dashed-1">Map</h2>
        <p><iframe width="630" height="235" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?hl=en&amp;q=pearl+of+arabia&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;t=m&amp;iwloc=A&amp;ll=25.278975,55.304596&amp;spn=0.006295,0.006295&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?hl=en&amp;q=pearl+of+arabia&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;t=m&amp;iwloc=A&amp;ll=25.278975,55.304596&amp;spn=0.006295,0.006295&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small></p>
      </div>
      <!-- End /tab5 --> 
    </div>
    <div class="detail-footer">
      <table width="100%" style="padding:7px 20px; padding-bottom:8px;">
       <!-- <tr>
          <td><h1 class="color-1">USD 470.95</h1></td>
          <td><div align="right"><a href="#" class="btn btn-custom-darken">Book Now</a></div></td>
        </tr>-->
      </table>
    </div>
  </div>
</div>
<!-- /end hotels-details-box -->