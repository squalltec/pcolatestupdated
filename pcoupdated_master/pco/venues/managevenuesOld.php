<?php
require_once('db_connection.php');


include('header.php');

session_start();

$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];


?>






<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--start content-->
<main class="page-content">




  <div class="row">
    <div class="col col-lg-9 mx-auto">

      <div class="card radius-10">
        <div class="card-body">
          <h5 class="card-title">Hotels</h5>
          <div class="my-3 border-top"></div>
          <div class="accordion" id="accordionExample">



            <?php


            $sqlla = "SELECT * FROM meetingbanquetplanner WHERE hotel='$hotel' && country='$country' && city='$city'";
            $resultta = $conn->query($sqlla);



            if ($resultta->num_rows > 0) {
              // output data of each row
              while ($rowwa = $resultta->fetch_assoc()) {

            ?>


                <a href='updatevenue.php?hotel=<?php echo $rowwa['hotel'] ?>&venue=<?php echo $rowwa['venue'] ?>&country=<?php echo $rowwa['country'] ?>&city=<?php echo $rowwa['city'] ?>'>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#collapse<?php echo $a; ?>' aria-expanded="false" aria-controls="collapseTwo">
                        <?php echo $rowwa['venue']; ?>

                      </button>
                    </h2>
                  </div>
                </a>

            <?php
              }
            }
            ?>



          </div>
          <!--end row-->

        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end row-->
  </div>
  </div>
  <!--end row-->





</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>