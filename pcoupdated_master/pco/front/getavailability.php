<?php
session_start();
include 'db_connection.php';

$hn=$_POST['hotel'];
$cn=$_POST['country'];
$ln=$_POST['location'];


$max0=$_POST['max0'];
$max1=$_POST['max1'];
$max2=$_POST['max2'];
$max3=$_POST['max3'];
$max4=$_POST['max4'];
$max5=$_POST['max5'];
$max6=$_POST['max6'];
$max7=$_POST['max7'];
$max8=$_POST['max8'];
$max9=$_POST['max9'];

$disp='';



$sqllsa ="SELECT * FROM allowedpersons WHERE hotel='$hn' && country='$cn' && location='$ln'";
$resulttsa = $conn->query($sqllsa);

$found = false;
	
if ($resulttsa->num_rows > 0) {
  // output data of each row
  while($rowwsa = $resulttsa->fetch_assoc()) {
	  
	  
	  
	  if($max0<=(int)$rowwsa['max'] && $max1<=(int)$rowwsa['max'] && $max2<=(int)$rowwsa['max'] && $max3<=(int)$rowwsa['max'] && $max4<=(int)$rowwsa['max'] && $max5<=(int)$rowwsa['max'] && $max6<=(int)$rowwsa['max'] && $max7<=(int)$rowwsa['max'] && $max8<=(int)$rowwsa['max'] && $max9<=(int)$rowwsa['max'])
	  {

            $disp= 'exists';
            


}


echo $disp;




}


}
?>