<?php
session_start();

$_SESSION['fromhotel'] = '0';

include 'db_connection.php';

$bookingnumber = $_SESSION['bookingnumber'];

$uniquenumber = $_SESSION['bookingnumber'];







$aid = $_SESSION['aid'];

$sqlcar = "SELECT * from rentacarInventorydatabase where id = $aid";
$resultcar = $conn->query($sqlcar);
$rowCar = $resultcar -> fetch_array(MYSQLI_ASSOC);



$rowCarsUUIDSArray = explode(',',$rowCar['uuid']);
$rowCarsAvailableForBookingArray = explode(',',$rowCar['availableforbooking']);
$carIndexForBooking = array_search('1', $rowCarsAvailableForBookingArray);

$rowCarsAvailableForBookingArrayNew = $rowCarsAvailableForBookingArray;

$rowCarsAvailableForBookingArrayNew[$carIndexForBooking] = 0;

$rowCarsAvailableForBookingString = implode(',',$rowCarsAvailableForBookingArrayNew);

$carsUuid = $rowCarsUUIDSArray[$carIndexForBooking];


$totaldays = $_SESSION['totaldaysrent'];


$title = $_SESSION['title2'];
$fname = $_SESSION['fname2'];
$lname = $_SESSION['lname2'];
$email = $_SESSION['email2'];
$phone =  $_SESSION['phone2'];
$nationality =  $_SESSION['nationality2'];
$remarks =  $_SESSION['remarks2'];

$totalpricewithvat = $_SESSION['totalpricewithvat2'];


$dropofflocation = $_SESSION['dropofflocation'];
$dropofftime = $_SESSION['dropofftime'];
$dropoffdate = $_SESSION['dropoffdate'];
$pickuplocation = $_SESSION['pickuplocation'];
$pickupdate = $_SESSION['pickupdate'];
$pickuptime = $_SESSION['pickuptime'];








$sql = "INSERT INTO rentacarbookings (title,fname,lname,email,phone,nationality,carid,pickuplocation,pickupdate,pickuptime,dropofflocation,dropofftime,dropoffdate,days,price,uniquenumber,remarks,pickordelivery,flightnumb1,flightnumb2,carsuuid)
           VALUES ('$title','$fname','$lname','$email','$phone','$nationality','$aid','$pickuplocation','$pickupdate','$pickuptime','$dropofflocation','$dropofftime','$dropoffdate','$totaldays','$totalpricewithvat','$uniquenumber','$remarks','$pickordelivery','$flightnumb1','$flightnumb2','$carsUuid')";

$resulta = $conn->query($sql);

$sqlUpdate = "UPDATE rentacarInventorydatabase set availableforbooking = '$rowCarsAvailableForBookingString' WHERE id  = $aid";
if($result = $conn->query($sqlUpdate)){

}else{
    echo $sqlUpdate;

    die('error while updating cars booking string');
}



if ($resulta === TRUE) {
}











?>
<?php include 'header.php'; ?>
<section class="page_title">
    <div class="container">
        <h1>Booking Success</h1>
    </div>
</section>

<div class="container px-3">
    <div class="confirmed_booking w-100">
        <div class="booking_card mx-auto">
            <div class="banner_card">
                <i class="bi bi-check-circle-fill"></i>
                <h2>Thank You.</h2>
                <p>Your Rent a Car Booking is Confirmed</p>
            </div>
            <div class="card_meta">
                <!--  <a href="" class = "mb-5"><i class="bi bi-printer"></i>&nbsp;Print Booking</a>-->
                <div class="booking_num py-4">Booking number: <?php echo $bookingnumber;


                                                                ?></div>
                <span class="mt-5 d-block">We wish you a pleasant journey
                    PCO-connect team</span>
            </div>
        </div>
        <a href="index.php" class="back_to">Back to Homepage</a>
    </div>
</div>

<?php include 'footer.php'; ?>

</div>





<script>








</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="js/main.js"></script>

</body>

</html>