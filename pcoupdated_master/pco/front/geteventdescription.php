<?php

session_start();
include("db_connection.php");

$values = array();


$eventname=$_POST['compy1'];

$sqllas = "SELECT * FROM newevents WHERE name='$eventname'";
 
 $result=$conn->query($sqllas);
 

while($row=mysqli_fetch_assoc($result)){
    
    $ban= $row['banner'];
     $himg= $row['highimg'];
    $tit= $row['title'];
    $des= $row['descr'];
    
	//echo "url('../eventbanners/$eventname/$ban')";
	$values['banner'] = "url('../eventbanners/$eventname/$ban')";
	$values['title'] = $tit;	
	$values['descriptionn'] = $des;	
    $values['highimg'] ='../eventhighlights/'.$eventname.'/'.$himg ;	
	echo json_encode($values);
	
}



?>