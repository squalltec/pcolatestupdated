<?php

$sdate=$_POST['sdt'];
$edate=$_POST['edt'];


$startTimeStamp = strtotime($sdate);
			$endTimeStamp = strtotime($edate);
			
			
			
$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);


echo $numberDays;
?>
