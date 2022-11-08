<?php


require_once('db_connection.php');


include('header.php');

$rt=$_SESSION['selectedroom'];

$numberofdays=0;
$totalprice=0;


	
$hhnn=$_SESSION['hotelname'];
$ccnn=$_SESSION['countryname'];
$aann=$_SESSION['addressname'];


if (isset($_POST['submit'])) {
	
	
	
	
$start=$_POST['startdate'];
$end=$_POST['enddate'];

		
		
$sqll ="SELECT * FROM setprices WHERE hotel='$hhnn' && country='$ccnn' && location='$aann' && name='$rt'";

		$resultt = $conn->query($sqll);

	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	 	  
	  
	  $sdate=$roww['sdate'];
	  $edate=$roww['edate'];
	  
	  	  

$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
			
			
		$price=$roww['price'];
		$tprice=$price*$numberDays;
	
			
			
			
			
			
			
			if($start >=$sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$roww['price'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	
					
				}
			
			
			
			else if($start >=$sdate && $end >$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($start);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$roww['price'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	
					
				}
			
			
			
			else if($start < $sdate && $end <=$edate)
				
				
				{
					
					
					
					
$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($end);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays)+1;
		
			
				
					
				
				$numberofdays=$numberofdays+$numberDays;
				$p=$roww['price'];
				$pri=$numberDays*$p;
				$totalprice= $totalprice+$pri;
	
					
				}
			
			
			
			
			
			
			
			
			
	//echo "total days initial: ".$numberDays;
	//echo "<br/>";
	//echo "total Price initial: ".$tprice;
	//echo "<br/>";




  }


}
}

?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">
		  

Book <?php echo $_SESSION['selectedroom'];?> Room

<br/>
<br/>


<form method="POST" >

<label>Start</label>
<input type="date" name="startdate">
<label>END</label>
<input type="date" name="enddate">

<input type="submit" name="submit" value="SUBMIT">

</form>


 </br>
  </br>
   </br>
   
   
	<?php
	echo "Number of Days: ".$numberofdays;
	echo "<br/>";
	echo "<br/>";
	echo "Price: ". $totalprice;
	?>


</main>



