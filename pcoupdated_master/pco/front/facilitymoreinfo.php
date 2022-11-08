<?php
session_start();
include 'db_connection.php';

$country=$_SESSION['country'];

$city=$_SESSION['city'];



$ab=$_GET['nam'];
$facility=$_GET['facility'];


$rtsimages=array();


$sqllmz ="SELECT * FROM facilitiesimages WHERE hotel='$ab' && country='$country' && location='$city' && facilities='$facility'";
		$resulttmz = $conn->query($sqllmz);

if ($resulttmz->num_rows > 0) {
  // output data of each row
  while($rowwmz = $resulttmz->fetch_assoc()) {
      
   array_push($rtsimages,$rowwmz['image']);
   
   
	
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
<h2 algin='center'>Description:</h2>
<p align='center'>
   <?php 
$sqllmzz ="SELECT * FROM facilities WHERE hotel='$ab' && country='$country' && location='$city' && facilities='$facility'";
		$resulttmzz = $conn->query($sqllmzz);

if ($resulttmzz->num_rows > 0) {
  // output data of each row
  while($rowwmzz = $resulttmzz->fetch_assoc()) {
    
    echo $rowwmzz['description'];
    
  }
}
    ?></p>

 <h1 align="center">
     
     <?php
     for($i=0; $i<count($rtsimages); $i++)
     {
     
     ?>
     <img style="width:300px;" src="../Facilities Images/<?php echo $ab;?>/<?php echo $facility;?>/<?php echo $rtsimages[$i];?>">
     
     <?php
     }
     ?>
     
     
     
     </h1>

<!-- /end hotels-details-box -->