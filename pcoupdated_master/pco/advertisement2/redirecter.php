<?php 
session_start();



	$_SESSION['hotel'] =$_GET['hotel'];
			$_SESSION['country'] =$_GET['country'];
			$_SESSION['city'] =$_GET['city'];
			$_SESSION['star'] =$_GET['star'];
			
			echo "<script>location.replace('dashboard.php');</script>";



?>