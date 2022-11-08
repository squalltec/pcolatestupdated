<?php 
session_start();

$alert=$_SESSION['alertme'];

if($alert=='1'){
echo 'exists';

$_SESSION['alertme']='0';

}
?>