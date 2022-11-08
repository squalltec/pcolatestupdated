<?php

session_start();
include("db_connection.php");
$idz=array();

$start=$_POST['compy1'];
$end=$_POST['compy2'];
$country=$_POST['compy3'];
$city=$_POST['compy4'];






$repetition='';

$data=array();	
$sqllas = "SELECT * FROM setprices WHERE country='$country' && location='$city'";
 
 $result=$conn->query($sqllas);
 

while($row=mysqli_fetch_assoc($result)){
    
	
	
	
	
	 $sdate=$row['sdate'];
	  $edate=$row['edate'];
	
	
	
		
			if($start >=$sdate && $end <=$edate)
				
				
				{
					if($repetition==$row['hotel']){
						
						
						
					}
					else{
					$repetition=$row['hotel'];
					array_push($idz,$row['id']);
					
					echo "<option>".$row['hotel']."</option>";
					}
				}
	
	
				else if($start >=$sdate && $start <$edate)
				
				
				{
					$s=$row['sdate'];
					
							
$sqllasss = "SELECT * FROM setprices WHERE country='$country' && location='$city' && edate='$s' GROUP BY hotel";
 
 $resultss=$conn->query($sqllasss);
 

while($rowss=mysqli_fetch_assoc($resultss)){
    
	
	if($repetition==$rowss['hotel']){
						
						
						
					}
					else{
					$repetition=$rowss['hotel'];
					array_push($idz,$row['id']);
					
					echo "<option>".$rowss['hotel']."</option>";
					}
	
	

}
					
				}
				
				
				
				
				else if($end > $sdate && $end <=$edate)
				
				
				{
					
					$e=$row['edate'];
					
$sqllass = "SELECT * FROM setprices WHERE country='$country' && location='$city' && edate='$e' GROUP BY hotel";
 
 $results=$conn->query($sqllass);
 

while($rows=mysqli_fetch_assoc($results)){
	
	
	if($repetition==$rows['hotel']){
						
						
						
					}
					else{
					$repetition=$rows['hotel'];
					array_push($idz,$row['id']);
					
					echo "<option>".$rows['hotel']."</option>";
					}
    
	
	

}
					
					
				}
				



	
	
	
	
	
	
	
	
	
	
	
	
	
	
}


	
	
	
	





?>