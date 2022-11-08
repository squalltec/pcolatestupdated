
<?php
session_start();
require_once('db_connection.php');
$max='';
$rn='';
$rna='';
$rnc='';


$sd=$_POST['sdate'];
$ed=$_POST['edate'];
$hn=$_POST['hotel'];
$cn=$_POST['country'];
$ln=$_POST['city'];

$edd='';

$edd=new DateTime($ed);
						   
$sqllsa ="SELECT * FROM roomnumbers WHERE hotel='$hn' && country='$cn' && location='$ln' && dates>='$ed'";
		$resulttsa = $conn->query($sqllsa);


	
if ($resulttsa->num_rows > 0) {
  // output data of each row
  while($rowwsa = $resulttsa->fetch_assoc()) {
	  
	  
	  
	  

	  
	  $rn=$rowwsa['number'];
	 
	 
  }
  
  if($rn>=10){
	  $max='10';
  }
  else{
	 $max=$rn; 
  }
}


for($i=1; $i<=$max; $i++)
{
	echo "<option>".$i."</option>";
}
						   
						   ?>
						   