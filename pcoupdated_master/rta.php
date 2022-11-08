<?php
session_start();


include 'db_connection.php';


 $number=$_POST['retrieve'];
    
$ema=$_POST['ema'];
   
    
$sqlnew="SELECT * FROM bookings WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew = $conn->query($sqlnew);

if ($resultnew->num_rows > 0) {
    
   
    
     
$sqlnew2="SELECT * FROM transfernewbookingsnew WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew2 = $conn->query($sqlnew2);

if ($resultnew2->num_rows > 0) {
    
    
    
$sqlnew3="SELECT * FROM rentacarbookings WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew3 = $conn->query($sqlnew3);

if ($resultnew3->num_rows > 0) {
    
     echo 'yes';
    $_SESSION['hotelcheck']='htr';
    $_SESSION['book']=$number;
    }
    else{
        
         echo 'yes';
    $_SESSION['hotelcheck']='ht';
    $_SESSION['book']=$number;
    }
    }
    else{
        
        
        
        
    
$sqlnew6="SELECT * FROM rentacarbookings WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew6 = $conn->query($sqlnew6);

if ($resultnew6->num_rows > 0) {
     echo 'yes';
           $_SESSION['hotelcheck']='hr';
    $_SESSION['book']=$number;
}
else{
        
    echo 'yes';
    $_SESSION['hotelcheck']='h';
    $_SESSION['book']=$number;
    }
    }
    
}
   



















else{
    
    
    
    
   $sqlnewp="SELECT * FROM transfernewbookingsnew WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnewp = $conn->query($sqlnewp);

if ($resultnewp->num_rows > 0) {
   
   
$sqlnew6m="SELECT * FROM rentacarbookings WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew6m = $conn->query($sqlnew6m);

if ($resultnew6m->num_rows > 0) {
    
     echo 'yes';
    $_SESSION['hotelcheck']='tr';
    $_SESSION['book']=$number;
    
    
}

else{
     echo 'yes';
    $_SESSION['hotelcheck']='t';
    $_SESSION['book']=$number;
}
   
   
    
} 

else{
    
$sqlnew6k="SELECT * FROM rentacarbookings WHERE uniquenumber='$number' && email='$ema'";
	
		$resultnew6k = $conn->query($sqlnew6k);

if ($resultnew6k->num_rows > 0) {
     echo 'yes';
    $_SESSION['hotelcheck']='r';
    $_SESSION['book']=$number;
}
else{
     echo 'no';
}

}
    
   
}




?>