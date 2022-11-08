<?php
session_start();
$_SESSION['regionalinfo']='CIS';

echo "<script>location.replace('setprices.php');</script>";

?>