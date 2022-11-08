<?php

$onearray=array('100','200','300');
$twoarray=array('1000','2000','3000');

$a=array("DELUXE"=>$onearray);

$a["SUPER DELUXE"]=$twoarray;

echo $a['DELUXE'][0];

?>