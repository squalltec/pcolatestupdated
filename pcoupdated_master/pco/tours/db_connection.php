<?php
    $servername='localhost';
    $username='u534286154_pcoconnect';
    $password='Shaktimaan@29';
    $dbname = "u534286154_pcoconnect";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

