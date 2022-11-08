<?php
session_start();

include 'db_connection.php';



include 'header.php';


 $_SESSION['fromhotel']='0';

 $idza=$_SESSION['sameider'];
 
 
 //echo json_encode($idza);
 
   $n=0;
   foreach($idza as $id)
   {
      //echo $id;
      
$sqlnewx="SELECT * FROM roomnumbers WHERE sameid='$id'";
	
		$resultnewx = $conn->query($sqlnewx);

if ($resultnewx->num_rows > 0) {
  // output data of each row
  while($rownewx = $resultnewx->fetch_assoc()) {
      
     $newid= $rownewx['id'];
     $number= $rownewx['number'];
     
    
     
$newnumber=intval($number)-1;

    $sqlmx = "UPDATE roomnumbers SET number='$newnumber' WHERE id='$newid'";
		  
 $resultamx = $conn->query($sqlmx);


if ($resultamx === TRUE) {

}   
       
       
       
     
     
      
  }
}
       
       
    $n=$n+1;   
   }














$tax=$_SESSION['tax'];


$bookingnumber=$_SESSION['bookingnumber'];

$uniquenumber=$_SESSION['bookingnumber'];


$hotel= $_SESSION['hotel'];
$country= $_SESSION['country'];
$city= $_SESSION['city'];
$sdate= $_SESSION['sdate'];
$edate= $_SESSION['edate'];

$showpaisay=$_SESSION['showpaisay'];



$totaldays= $_SESSION['totaldays'];

     $nationality= $_SESSION['nationality']; 
   $title= $_SESSION['title'];
    $fname= $_SESSION['fname'];
     $lname= $_SESSION['lname'];
      $email= $_SESSION['email'];
      $phone=  $_SESSION['phone'];
        
 $bfincluded=  $_SESSION['bfincluded'];
 $lunincluded=  $_SESSION['lunincluded'];
 $dinincluded=  $_SESSION['dinincluded'];
  $bedincluded=  $_SESSION['bedincluded'];         
            
       $alladults= $_SESSION['alladults'];
        $roomtypesall= $_SESSION['roomtypesall'];
         $totalamountt=$_SESSION['totalamount'];
     $allchildren= $_SESSION['allchildren'];
     $totalamount=$_SESSION['totalamounty'];

$remarks=$_SESSION['remarks'];   
     
 if (isset($_POST['submit'])) {    
    
   
$xx=0;
foreach($roomtypesall as $rtp){


$sql = "INSERT INTO bookings (title,fname,lname,email,phone,nationality,hotel,country,location,roomtype,checkin,checkout,days,price,uniquenumber,adults,children,breakfast,lunch,dinner,extrabed,remarks)
           VALUES ('$title[$xx]','$fname[$xx]','$lname[$xx]','$email[$xx]','$phone[$xx]','$nationality[$xx]','$hotel','$country','$city','$roomtypesall[$xx]','$sdate','$edate','$totaldays','$showpaisay[$xx]','$uniquenumber','$alladults[$xx]','$allchildren[$xx]','$bfincluded[$xx]','$lunincluded[$xx]','$dinincluded[$xx]','$bedincluded[$xx]','$remarks[$xx]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

}

$xx=$xx+1;
}








$sqlt = "INSERT INTO fullbooking (uniquenumber,total,tax)
           VALUES ('$uniquenumber','$totalamount','$tax')";
		  
 $resultat = $conn->query($sqlt);


if ($resultat === TRUE) {
    
   

}







}














?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <link rel="stylesheet" href="styles/app.css">
    <title>Confirmed</title>
</head>
<body>
    <div class = "main-holder">
  
    <section class="page_title">
        <div class="container">
            <h1>Hotel Booking Success</h1>
        </div>
    </section>
    
    <div class = "container px-3">
        <div class="confirmed_booking w-100">
            <div class="booking_card mx-auto">
                <div class="banner_card">
                    <i class="bi bi-check-circle-fill"></i>
                    <h2>Thank You.</h2>
                    <p>Your Hotel Booking Confirmed</p>
                </div>
                <div class="card_meta">
                  <!--  <a href="" class = "mb-5"><i class="bi bi-printer"></i>&nbsp;Print Booking</a>-->
                    <div class="booking_num py-4">Booking number: <?php echo $bookingnumber; 
                    
                   
                    ?></div>
                    <span class = "mt-5 d-block">We wish you a pleasant journey
                        PCO-connect team</span>
                </div>
            </div>
            <a href="index.php" class="back_to">Back to Homepage</a>
        </div>
    </div>
    
    </div>
    
    
      
      
      
    <script>
      
      
      
      
      
    
      
      
    </script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>

</body>


<?php


include 'footer.php';
?>


</html>