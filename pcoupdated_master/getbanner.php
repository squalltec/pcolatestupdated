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
    
    $backcolor= $row['backcolor'];
    $color= $row['color'];
    
    
	//echo "url('../eventbanners/$eventname/$ban')";
	//$values['banner'] = "url('pco/eventbanners/$eventname/$ban')";
	$values['banner'] = "pco/eventbanners/$eventname/$ban";
	$values['title'] = $tit;	
	$values['descriptionn'] = $des;	
    $values['highimg'] ='pco/eventhighlights/'.$eventname.'/'.$himg ;	
    
    
    $values['backcolor'] = $backcolor;
    $values['color'] = $color;
    
    
	echo json_encode($values);
	
}



?>