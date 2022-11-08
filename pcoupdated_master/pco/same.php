<?php
session_start();
$_SESSION['regionalinfo']='All';

echo "<script>location.replace('setprices.php');</script>";

?>