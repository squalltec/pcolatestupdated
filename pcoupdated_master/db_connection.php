<?php
    $servername='localhost';
    $username='u534286154_pcoconnectnew';
    $password='Shaktimaan@29';
    $dbname = "u534286154_pcoconnectnew";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>

