<?php
session_start();
include("db_connection.php");


$days=$_SESSION['totaldays'];

$country=$_SESSION['country'];
$city=$_SESSION['city'];
$hotel=$_SESSION['hotel'];
$meal=$_POST['meal'];

$adults=$_POST['adults'];
$children=$_POST['children'];


$totalpax=intval($adults)+intval($children);

//$meal='lunch';

 $sqllas = "SELECT * FROM basiccharges WHERE location='$city' && country='$country' && hotel='$hotel'";
 
 
 $result=$conn->query($sqllas);


 
while($row=mysqli_fetch_assoc($result)){
    
    if($meal=='lunch')
    {
        //echo $row['lunch'];
         $show=intval($days)*intval($row['lunch']);
        
        echo $show*$totalpax;
    }
    
    else if($meal=='dinner')
    {
        //echo $row['dinner'];
         $show=intval($days)*intval($row['dinner']);
        
        echo $show*$totalpax;
    }
    
    else if($meal=='breakfast')
    {
        //echo $row['breakfast'];
        $show=intval($days)*intval($row['breakfast']);
        
        echo $show*$totalpax;
    }
     else if($meal=='bed')
    {
        //echo $row['extrabed'];
        
         $show=intval($days)*intval($row['extrabed']);
        
        echo $show;
    }
    
        else if($meal=='childbed')
    {
        //echo $row['extrabed'];
        
         $show=intval($days)*intval($row['childbed']);
        
        echo $show;
    }
     else if($meal=='babycot')
    {
        //echo $row['extrabed'];
        
         $show=intval($days)*intval($row['babycot']);
        
        echo $show;
    }
    
}


?>