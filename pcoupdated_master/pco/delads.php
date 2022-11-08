<?php
include 'db_connection.php';

$aid=$_POST['aid'];

$sql = "DELETE FROM adscompany WHERE id='$aid'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}



?>