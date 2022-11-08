<?php
session_start();
include 'db_connection.php';



$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];      


 $countvenues=$_SESSION['counting'];
 $venues=$_SESSION['venues'];
 

if(isset($_FILES['file']) and !$_FILES['file']['error']){
    $fname = $venues[$countvenues] . ".png";




mkdir("../Venue FloorPlan Images/".$hotel."/".$venues[$countvenues], 0755, true);	
		

 $uploadsDir = "../Venue FloorPlan Images/".$hotel."/".$venues[$countvenues]."/";



    move_uploaded_file($_FILES['file']['tmp_name'], $uploadsDir.$fname);
    
   
}
?>