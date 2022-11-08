<?php
session_start();

 $_SESSION['fromhotel']='0';
include 'db_connection.php';

$bookingnumber=$_SESSION['bookingnumber'];

$uniquenumber=$_SESSION['bookingnumber'];












?>
<?php include 'header.php';?>
    <section class="page_title">
        <div class="container">
            <h1>Booking Success</h1>
        </div>
    </section>
    
    <div class = "container px-3">
        <div class="confirmed_booking w-100">
            <div class="booking_card mx-auto">
                <div class="banner_card">
                    <i class="bi bi-check-circle-fill"></i>
                    <h2>Thank You.</h2>
                    <p>Your Transfer and Hotel Booking is Confirmed</p>
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
    
   <?php include 'footer.php';?>

    </div>
    
    
      
      
      
    <script>
      
      
      
      
      
    
      
      
    </script>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
    
    
    
<?php

include 'footer.php';
?>

</body>
</html>