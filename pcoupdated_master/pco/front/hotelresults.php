<?php
session_start();
include 'db_connection.php';

$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];

$eve=$_SESSION['event'];


$sqll ="SELECT * FROM hotels WHERE name='$hn' && country='$cn' && location='$ln'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      $des=$roww['description'];
       $img=$roww['image'];
       $caty=$roww['category'];
	  
	
  }
}





if (isset($_POST['submit'])) {
	
	$name=$_POST['naz'];
	$_SESSION['hotel']=$name;
	echo "<script>location.replace('roomresults3.php');</script>";
	
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
<?php include_once("includes/header.php"); ?>
<div class="modify-search">
<div class="container_16">
    <div class="grid_16">
        <form action="hotelresults.php" method="#">
          <table width="940" class="right-search">
              <th align="left"><h1>Modify Results</h1></th>
            <tr>
            <!--  <td class="grid_4 alpha"><label for="hotel_name">Hotel Name</label>
                <br />
                <select id='hotels' name='hotel'>
                    
                    
                    <?php
                    
$sqllz ="SELECT * FROM events WHERE country='$cn' && location='$ln' && event='$eve' GROUP BY hotel";
		$resulttz = $conn->query($sqllz);

if ($resulttz->num_rows > 0) {
  // output data of each row
  while($rowwz = $resulttz->fetch_assoc()) {
      
      echo "<option>".$rowwz['name']."</option>";
	  
	}
	}
	?>
                    
                    
                </select></td>-->
              <td class="grid_2"><label for="star_rating">Star Rating</label>
                <br />
                <div class="custom_select">
                  <select id="stars" name="stars">
                    <option value='all' selected="selected">- Select -</option>
                    <option value="5">5 Star</option>
                    <option value="4">4 Star</option>
                    <option value="3">3 Star</option>
                    <option value="2">2 Star</option>
                    <option value="1">1 Star</option>
                    
                  </select>
                  <div class="custom_select_bg"></div>
                  <div class="custom_select_arrows"></div>
                </div></td>
             <!-- <td class="grid_3"><label for="s_check_in_dt">Check - In </label>
                <br />
                <input type="text" value="" class="icon-calendar datepicker" id="s_check_in_dt" name="check_in_dt" placeholder="mm-dd-yy"></td>
              <td class="grid_3"><label for="check_out_dt">Check - Out </label>
                <br />
                <input type="text" value="" class="icon-calendar datepicker" id="check_out_dt" name="check_out_dt" placeholder="mm-dd-yy"></td>
              <td class="grid_2"><label for="nights">Nights</label>
                <br />
                <div class="custom_select">
                  <select id="nights" name="nights">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                  </select>
                  <div class="custom_select_bg"></div>
                  <div class="custom_select_arrows"></div>
                </div></td>-->
             <!-- <td class="grid_2 omega">&nbsp;
                <input type="submit" class="btn" value="Modify" />
                
               </td>-->
            </tr>
          </table>
        </form>
    </div>
</div>
</div> <!-- /end modify-search -->
<div class="filter-search">
<div class="container_16">
  <!--   <table width="100%" cellspacing="0" cellpadding="0">
    <tr>
   <td class="grid_2"><h1 class="color-1" style="padding:0;">Filter by</h1></td>
      <td class="grid_2">Price Range:</td>
      <td class="grid_3">&nbsp;</td>
      <td class="grid_1"><label for="star-type">Star:</label></td>
      <td class="grid_2"><div class="custom_select">
          <select id="star-type" name="star-type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
          </select>
          <div class="custom_select_bg"></div>
          <div class="custom_select_arrows"></div>
        </div></td>
      <td class="grid_2"><label for="accomontation-type">Room Type</label></td>
      <td class="grid_2"><div class="custom_select">
          <select id="star-type" name="star-type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
          </select>
          <div class="custom_select_bg"></div>
          <div class="custom_select_arrows"></div>
        </div></td>
      <td class="grid_2"><span class="list-style-buttons"> <a href="#" id="gridview" class="switcher"><img src="images/grid-view.png" alt="Grid"></a> <a href="#" id="listview" class="switcher active"><img src="images/list-view-active.png" alt="List"></a> <a href="#" class="map-icon"><img src="img/map-icon.png" alt="Map Icon"></a> </span></td>
    </tr>
  </table>
  <div class="grid_2"> </div>
  <div class="grid_6"> </div>
</div>-->
</div> <!-- /end filter-search -->
<div class="container_16">
    <div>
        <ul id="products" class="list clearfix">
            
      <li>
        <div class="results-container clearfix">
 <a href="checkgallery.php" class="color-1 hover-normal fancybox fancybox.iframe">         <div class="results-image"><img src="../Hotel Images/<?php echo $hn;?>/<?php echo $img;?>" alt="hotel-image"></div></a><!-- /end results-container-image -->
          <div class="results-inside">
            <h1 class="color-1"><?php echo $_SESSION['hotel'];?>
            
            
            <?php
            $lim=intval($caty);
            for ($x = 0; $x < $lim; $x++) {
            ?>
            <img src='img/star-ratings.png'>
            <?php
            }
            ?>
             </h1> 
             
             <p class="address"><?php echo $_SESSION['country'];?></p>
             <h6>
                 
                 
                 
                 
            <?php
        
        
$sqllv ="SELECT * FROM facilities WHERE hotel='$hn' && country='$cn' && location='$ln'";
		$resulttv = $conn->query($sqllv);

if ($resulttv->num_rows > 0) {
  
  while($rowwv = $resulttv->fetch_assoc()) {
      
     ?><a href="facilitymoreinfo.php?nam=<?php echo $_SESSION['hotel'];?>&facility=<?php echo $rowwv['facilities'];?>" class="color-1 hover-normal fancybox fancybox.iframe"><input style='font-size:1.3vh; width:100px;' class='btn color-1 hover-normal' type='button' value='<?php echo $rowwv['facilities'];?>'></a>
     
   <?php   
  }
}
        ?>      
                 
                 
                 
                 
                 
                 
                 
             </h6>
            <hr />
            
            <p class="description"><?php echo $des;?></p>
            <i><a href="hotelmoreinfo.php?nam=<?php echo $_SESSION['hotel'];?>" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i> </div><!-- /end results-container-inside -->
          <div class="results-rate" align="center">
             <p style='margin-top:-10px;'> <?php echo $_SESSION['country'];?>,
              <?php echo $_SESSION['city'];?><br/><br/></p>
      <img style='width:20px;' src='aeroplaneicon.png'> 10 KM
       <img style='width:20px;' src='trainicon.png'> 1 KM<br/><br/>
        <img style='width:20px;' src='worldtradecentericon.png'> 5 KM
        <form action='#' method='POST'>
        <input name="naz" style="display:none;" id="n0" value="<?php echo $_SESSION['hotel'];?>"> 
        
        <br/>
        <button type="submit" name="submit" class="btn color-1 hover-normal">Select</button>
        
        
       <!--  <h1 class="ac" data-name='<?php echo $hn;?>'>   <a class="btn color-1 hover-normal fancybox fancybox.iframe" id="button" href="hotelmoreinfo.php">Select</a></h1>-->
         
         </form>
         
         
         </div><!-- /end results-container-inside-rate -->
          </div>
      </li>
     
     
     
    </ul>
    
    
    
    
    <iframe src="roomsiframe.php" style="margin-left:-20px; width:105%; height: 550px;"></iframe>
    
    
    
    
    
    
    
    
    
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
function ac(){
    var tt=$('#n0').value;
    alert(tt);
}

	$(document).ready(function(){	
		$('.fancybox').fancybox();
	});
</script>
<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
	
	
<script>



$("#stars").on('change', function() {
    
    	var category=$("#stars").val();
    	
     
    

 
    
	 $.ajax({
           
			  type:'POST',
              url:'gethotels2modify.php',
              data:{'category':category},
			  
              success:function(result){
				   
				$("#hotels").html(result);
				
				 
				 
                
                 
              }
			  
          }); 	
          
          
          
         
          
      
    
	 $.ajax({
           
			  type:'POST',
              url:'getallhotelsbystars.php',
              data:{'category':category},
			  
              success:function(result){
				  
				$("#products").html(result);
				
				 
				 
                
                 
              }
			  
          }); 	
              
			  
			 
		 
})

</script>
</body>
</html>
