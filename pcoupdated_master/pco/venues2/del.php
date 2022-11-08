<?php
 session_start();
include('db_connection.php');

$table=$_GET['tbl'];
$iduser=$_GET['aid'];
echo $table;
echo $iduser;

$sql = "DELETE FROM $table WHERE id='$iduser'";

if ($conn->query($sql) === TRUE) {
  header("Location:" . $_SERVER['HTTP_REFERER']);
  
} else {
     header("Location:" . $_SERVER['HTTP_REFERER']);
 
}

$conn->close();
?>