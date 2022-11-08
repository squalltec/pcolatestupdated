<?php

session_start();




$hotel=$_GET['hotel'];
$country=$_GET['country'];
$city=$_GET['city'];
$star=$_GET['star'];


$_SESSION['hotel']=$hotel;
$_SESSION['country']=$country;
$_SESSION['city']=$city;
$_SESSION['sendcategory']=$star;


echo "<script>location.replace('bookingdetails.php');</script>";


?>