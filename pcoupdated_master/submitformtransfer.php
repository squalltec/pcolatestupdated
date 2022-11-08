<?php

session_start();


$pp=$_SESSION['triptype'];



if($pp=='From Airport to Hotel')
{
$_SESSION['carida']=$_POST['carid'];
$_SESSION['carsneededa']=$_POST['carsneeded'];
$_SESSION['pricearrival']=$_POST['pricearrival'];

$_SESSION['car1']=$_POST['car1'];
}



if($pp=='From Hotel to Airport')
{
$_SESSION['caridd']=$_POST['carid'];
$_SESSION['carsneededd']=$_POST['carsneeded'];
$_SESSION['pricedeparture']=$_POST['pricedeparture'];

$_SESSION['car2']=$_POST['car2'];
}

?>