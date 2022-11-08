
<?php
session_start();
require_once('db_connection.php');

$nmbrooms=$_SESSION['sendroomnumbers'];



	$rooms=$_SESSION['roomnmb'];
		
	$a0=(int)$_SESSION['adults'];
	$c0=(int)$_SESSION['children'];
	
	$a1=(int)$_SESSION['adult1'];
	$c1=(int)$_SESSION['children1'];
	
	$a2=(int)$_SESSION['adult2'];
	$c2=(int)$_SESSION['children2'];
	
	$a3=(int)$_SESSION['adult3'];
	$c3=(int)$_SESSION['children3'];
	
	$a4=(int)$_SESSION['adult4'];
	$c4=(int)$_SESSION['children4'];
	
	$a5=(int)$_SESSION['adult5'];
	$c5=(int)$_SESSION['children5'];
	
	$a6=(int)$_SESSION['adult6'];
	$c6=(int)$_SESSION['children6'];
	
	$a7=(int)$_SESSION['adult7'];
	$c7=(int)$_SESSION['children7'];
	
	$a8=(int)$_SESSION['adult8'];
	$c8=(int)$_SESSION['children8'];
	
	$a9=(int)$_SESSION['adult9'];
	$c9=(int)$_SESSION['children9'];
	
	$max0=$a0+$c0;
	$max1=$a1+$c1;
	$max2=$a2+$c2;
	$max3=$a3+$c3;
	$max4=$a4+$c4;
	$max5=$a5+$c5;
	$max6=$a6+$c6;
	$max7=$a7+$c7;
	$max8=$a8+$c8;
	$max9=$a9+$c9;




$sd=$_SESSION['sdate'];
$ed=$_SESSION['edate'];

$start=$_SESSION['sdate'];
$end=$_SESSION['edate'];

$pri=array();



$hn=$_SESSION['hotel'];
			$cn=$_SESSION['country'];
			$ln=$_SESSION['city'];
			
			
			
			
			
			
	if (isset($_POST['selection'])) {
	
$_SESSION['hotel']=$_POST['hotel'];	
$_SESSION['country']=$_POST['country'];
$_SESSION['city']=$_POST['location'];
$_SESSION['roomtypee']=$_POST['roomtype'];
			
		echo "<script>location.replace('prices.php');</script>";	
			
			
	}	
	
	if (isset($_POST['submit'])) {
	    
	   

$_SESSION['roomnmbs']=$_POST['nmbs'];

$nmbr=$_POST['nmbs'];
$nmaa=count($_POST['nmbs']);
$roomy=$_POST['roomytype'];
$totalroomtypes=array();			
			
		for ($x = 0; $x < $nmaa; $x++) {	
		    
		    $asi=$nmbr[$x];
		    
		    for ($a = 0; $a < $asi; $a++) {	
		    
		    array_push($totalroomtypes, $roomy[$x]);
		    
		    
		    
		    }
			
		}
		
$_SESSION['roomytypee']=$totalroomtypes;			
	
	    
	    echo "<script>location.replace('pricesnew.php');</script>";
	    
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
<title>Professional Congress Organizer - PCO Connect - Hotel Search Results</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head.php"); ?>
<link rel="stylesheet" href="css/datepicker.css">
</head>
<body>
    
    <input style='display:none;' id='totalroomss' value='<?php echo $nmbrooms;?>'>
<?php include_once("includes/header.php"); ?>

<br/><br/><br/>

<div>

<!--<h2 style="margin-left:10%; float:left;">Check in: <?php //echo $_SESSION['sdate']; ?></h2><h2 style="margin-right:10%;  float:right;">Check Out: <?php //echo $_SESSION['edate']; ?></h2>
-->






</div>
<br/><br/><br/>
<div class="container_16">
    <div>

	
        <ul id="products" class="list clearfix">
		<form action="#" method='POST'>
		
		
		<?php






$sqll ="SELECT * FROM roomtypes WHERE hotel='$hn' && country='$cn' && location='$ln' ";
		$resultt = $conn->query($sqll);

$i=0;
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  $aata=$roww['name'];
	  
	  $rt=$aata;
	  
	  
	  
	  
	  
	  



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
			
			
			
			
			<?php
		

	

			
			
			
			
			
			$sqllsa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rt' ";
		$resulttsa = $conn->query($sqllsa);

 $found = false;
	
if ($resulttsa->num_rows > 0) {
  // output data of each row
  while($rowwsa = $resulttsa->fetch_assoc()) {
	  
	  
	  
	  if($max0<=(int)$rowwsa['max'] && $max1<=(int)$rowwsa['max'] && $max2<=(int)$rowwsa['max'] && $max3<=(int)$rowwsa['max'] && $max4<=(int)$rowwsa['max'] && $max5<=(int)$rowwsa['max'] && $max6<=(int)$rowwsa['max'] && $max7<=(int)$rowwsa['max'] && $max8<=(int)$rowwsa['max'] && $max9<=(int)$rowwsa['max'])
	  {
		 
		 $found = true;
		 
		 
		 
		 
		 
		 ?>
		 
		 
		 
		 
		 
		    <li>
        <div class="results-container clearfix">
		    <div class="results-image"><img src="../Room Uploads/<?php echo $hn;?>/<?php echo $rt;?>/<?php echo $imgs[0];?>" alt="hotel-image"></div><!-- /end results-container-image -->
        



		<div class="results-inside">
            <h1 class="color-1"><?php echo $roww['name']; ?></h1>
            <hr />
            <p class="address"><?php echo $roww['location']; ?></p>
			
            <p class="description"><?php echo $roww['description']; ?></p>
			
			
            <i><a href="hotelmoreinfo.php" class="color-1 hover-normal fancybox fancybox.iframe"></a></i> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">
            <p>Room / Night <br/><small>starts from</small></p>
            <h1 class="color-1">AED <?php echo $pri[$i];?></h1>
          
          
            
               <input style='display:none;' name='roomytype[]' value="<?php echo $roww['name'];?>"> 
            <input required value='0' name='nmbs[]' class='nmbb' type='number'>
         
            </div><!-- /end results-container-inside-rate -->
          </div>
      </li>
	  
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 <?php
		 
	  
		  
	  }
	  
	  
	
  }
  
  
  




}


?>
		
       
	  
	  
	  
	  <?php
	  
	  $i=$i+1;
	  
  }
}





if($found==false)
{
   ?>
    <li>
      
         <?php  echo "<h2 align='center'>No Room Available for this much Occupancy in this Hotel</h2>";?>
      </li>
      <br/><br/><br/><br/><br/><br/>
	  <?php
	  
	  
	  
	  
	 
	  
	  
	  
$sqllsa ="SELECT * FROM hotels WHERE country='$cn' && location='$ln'";
		$resulttsa = $conn->query($sqllsa);

if ($resulttsa->num_rows > 0) {
  // output data of each row
  while($rowwsa = $resulttsa->fetch_assoc()) {
	 
	  
	  $hotelnaam=$rowwsa['name'];
	  
	  
	  
	  $sqllsaa ="SELECT * FROM allowedpersons WHERE hotel='$hotelnaam' && country='$cn' && location='$ln' && max>=$max0 && max>=$max1 && max>=$max2 && max>=$max3 && max>=$max4 && max>=$max5 && max>=$max6 && max>=$max7 && max>=$max8 && max>=$max9";
		$resulttsaa = $conn->query($sqllsaa);

if ($resulttsaa->num_rows > 0) {
    
     echo "There is other suitable options available below, for this much occupancy";
  // output data of each row
  while($rowwsaa = $resulttsaa->fetch_assoc()) {
	 


 
 $hhnn=$rowwsaa['hotel'];
 $ccnn=$rowwsaa['country'];
 $llnn=$rowwsaa['location'];
 $romtype= $rowwsaa['name'];
 
	

	  	  $sqlr ="SELECT * FROM setprices WHERE hotel='$hhnn' && country='$ccnn' && location='$llnn' && name='$romtype'";
		$resultr = $conn->query($sqlr);


if ($resultr->num_rows > 0) {
  // output data of each row
  while($rowr = $resultr->fetch_assoc()) {
	 
	 
	 
	
	 
	 ?>
	 
	 
	 
	 
	 
	  <li>
        <div class="results-container clearfix">
		    <div class="results-image"><img src="../Room Uploads/<?php echo $rt;?>/<?php echo $imgs[0];?>" alt="hotel-image"></div><!-- /end results-container-image -->
        



		<div class="results-inside">
           <form method='POST' action="#">
               
              
                <input style='display:none;' name='hotel' value='<?php echo $hhnn; ?>'>
               <input style='display:none;'  name='location' value='<?php echo $llnn; ?>'>
               <input style='display:none;'  name='country' value='<?php echo $ccnn; ?>'>
               <input style='display:none;'  name='roomtype' value='<?php echo $romtype; ?>'>
               
                
               
               
               
               
            <h1 class="color-1"><?php echo $hhnn; ?></h1>
            <hr />
            <p><?php echo $romtype;?></p>
            <p class="address"><?php echo $llnn; ?>, <?php echo $ccnn; ?></p>
			
           
			
			
            <i><a href="hotelmoreinfo.php" class="color-1 hover-normal fancybox fancybox.iframe"></a></i> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">
            <p>Room / Night <br/><small>starts from</small></p>
            <h1 class="color-1">AED <?php echo $rowr['price']; ?></h1>
            
            
            <button type='submit' name='selection' class="btn" id="button">Select</button>
            
            <form/>
            
            </div><!-- /end results-container-inside-rate -->
          </div>
      </li>
	 
	 
	 
	 <?php
	 
	 
	 
	 
	 
	 
	 
	 
	 
  }
    
}
	  
	  
	  
	  
	 
	  
	  
	  
	  
  }
}
	  
	  
	  
	  
	  
	  
  }
}
	  
	  
	  
	  
	   
}
	 
		




	  ?>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	    
	   <button style='display:none;' class="btn" type='submit' name='submit' id="button">Book</button>
            
            </form>
            
             <button class="btn" onclick='checka()'>Book</button>
    </ul>
    
    
    
    
    
    
    
    
    
    
    </div>
</div> <!-- /end extra-featured-container -->
<?php include_once("includes/secondary-footer.php"); ?>
<?php include_once("includes/footer.php"); ?>

<script>


    setInterval(function () {
        var countsum=0;
       const nm = document.getElementById('totalroomss').value;
      
      
       const vals = document.getElementsByClassName("nmbb");
      
      
      
       
    for (let i = 0; i < vals.length; i++) {
         
         var a=vals[i].value;
         if(a==""){
             a=0;
         }
         countsum=parseInt(countsum)+parseInt(a);
        
        if(countsum>nm)
         {
             vals[i].value='0';
             
         }
    }
         
         
        
        
    }, 1000);
    
    
    
    
    
    
    
function checka(){
    
     const nma = document.getElementById('totalroomss').value;
     
       const valss = document.getElementsByClassName("nmbb");
      var ginti=0;
        for (let i = 0; i < valss.length; i++) {

         var aa=valss[i].value;
         
        
          ginti=parseInt(ginti)+parseInt(aa);
        }
      
       if(ginti<nma)
         {
             alert('Please Select Room Type for All Rooms');
             
         }
         else{
             $('#button').click();
         }

         
    
    
}
    
    
    
    
    
    
    
    
    
</script>





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
