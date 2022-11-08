<?php
session_start();
require_once('db_connection.php');


session_start();

$hotel=$_SESSION['hotel'];
$country=$_SESSION['country'];
$city=$_SESSION['city'];

 
 ?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Manage Venues
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
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


                <a href='editplanner22New.php?hotel=<?php echo $rowwa['hotel'] ?>&venue=<?php echo $rowwa['venue'] ?>&country=<?php echo $rowwa['country'] ?>&city=<?php echo $rowwa['city'] ?>'>
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
<?php endblock() ?>

<?php startblock('FooterText') ?>
    Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>


<?php endblock();?>	
