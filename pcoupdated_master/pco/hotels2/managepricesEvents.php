<?php
session_start();
require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

if (isset($_POST['addnew'])) {





  $restaurantsname = $_POST['restaurantsname'];
  $restaurantsdes = $_POST['restaurantsdes'];
  $cuisine = $_POST['cuisine'];


  $n = 0;
  foreach ($restaurantsname as $value) {

    mkdir("../Restaurant Images/" . $hotel . "/" . $value, 0755, true);

    $uploadsDir2 = "../Restaurant Images/" . $hotel . "/" . $value . "/";
    $allowedFileType = array('jpg', 'png', 'jpeg');

    $fileName        = $_FILES['fileres' . $n]['name'];
    $tempLocation    = $_FILES['fileres' . $n]['tmp_name'];
    $targetFilePath  = $uploadsDir2 . $fileName;
    $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $uploadDate      = date('Y-m-d H:i:s');
    $uploadOk = 1;
    if (in_array($fileType, $allowedFileType)) {
      if (move_uploaded_file($tempLocation, $targetFilePath)) {
        $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
      } else {
        $response = array(
          "status" => "alert-danger",
          "message" => "File coud not be uploaded."
        );
      }
    } else {
      $response = array(
        "status" => "alert-danger",
        "message" => "Only .jpg, .jpeg and .png file formats allowed."
      );
    }
    // Add into MySQL database
    if (!empty($sqlVal)) {
      $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");


      if ($insert) {
        $response = array(
          "status" => "alert-success",
          "message" => "Files successfully uploaded."
        );
      } else {
        $response = array(
          "status" => "alert-danger",
          "message" => "Files coudn't be uploaded due to database error."
        );
      }
    }



    $n = $n + 1;
  }





  //main entry


  $sqlTpl1 = "INSERT INTO hotelsdatabaserestaurants (hotel,country,city,name,description,cuisine) VALUES (%s )";

  $sqlArr1 = array();

  foreach ($restaurantsname as $k => $v)

    $sqlArr1[] = '"' . $hotel . '","' . $country . '","' . $city . '","' . $restaurantsname[$k] . '","' . $restaurantsdes[$k] . '","' . $cuisine[$k] . '"';
  $sqlStr1 = sprintf(
    $sqlTpl1,
    implode(' ) , ( ', $sqlArr1)
  );





  $result1 = $conn->query($sqlStr1);


  if ($result1 === TRUE) {
    // echo "New record created successfully";


    $_SESSION['alertme'] = 1;
  } else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
  }




  //end








}




















if (isset($_POST['submit'])) {


  $value = $_POST['type'];

  $cuisine = mysqli_real_escape_string($conn, $_POST['cuisine']);


  $id = $_POST['iad'];


  $des = mysqli_real_escape_string($conn, $_POST['des']);



  mkdir("../Restaurant Images/" . $hotel . "/" . $value, 0755, true);

  $uploadsDir = "../Restaurant Images/" . $hotel . "/" . $value . "/";
  $allowedFileType = array('jpg', 'png', 'jpeg');

  $img = array();



  $imgs = $_FILES['files']['name'];



  // Velidate if files exist
  if (!empty(array_filter($imgs))) {

    // Loop through file items
    foreach ($imgs as $id => $val) {
      // Get files upload path
      $fileName        = $_FILES['files']['name'][$id];
      $tempLocation    = $_FILES['files']['tmp_name'][$id];
      $targetFilePath  = $uploadsDir . $fileName;
      $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
      $uploadDate      = date('Y-m-d H:i:s');
      $uploadOk = 1;
      if (in_array($fileType, $allowedFileType)) {
        if (move_uploaded_file($tempLocation, $targetFilePath)) {
          $sqlVal = "('" . $fileName . "', '" . $uploadDate . "')";
        } else {
          $response = array(
            "status" => "alert-danger",
            "message" => "File coud not be uploaded."
          );
        }
      } else {
        $response = array(
          "status" => "alert-danger",
          "message" => "Only .jpg, .jpeg and .png file formats allowed."
        );
      }
      // Add into MySQL database
      if (!empty($sqlVal)) {
        $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");


        if ($insert) {
          $response = array(
            "status" => "alert-success",
            "message" => "Files successfully uploaded."
          );
        } else {
          $response = array(
            "status" => "alert-danger",
            "message" => "Files coudn't be uploaded due to database error."
          );
        }
      }
    }
  } else {
    // Error
    $response = array(
      "status" => "alert-danger",
      "message" => "Please select a file to upload."
    );
  }


  $sql = "UPDATE hotelsdatabaserestaurants SET description='$des', cuisine='$cuisine' WHERE id='$id'";

  $result = $conn->query($sql);


  if ($result === TRUE) {
    $_SESSION['alertme'] = 1;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Manage Prices
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
  .accordion-button:not(.collapsed)::after {
    transform: rotate(0);

  }

  .accordion-button::after {
    color: #ce3435 !important;

  }
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="ps-3">
    <h2 class="text-dark">Manage Prices</h2>
  </div>
    <div class="ms-auto">
      <div class="btn-group">
      <a href="add_new_prices.php" class="mx-2"><button class="btn btn-danger"><i class="bi bi-plus"></i> Add Rates</button></a>
    </div>
    <div class="btn-group">
      <a href="viewinventoryNewEvents.php" class="mx-2"><button class="btn btn-danger"><i class="bi bi-eye"></i> View Rates</button></a>
    </div>
  </div>
</div>




<div class="card">
  <div class="card-body">
    <h5 class="card-title">Event Prices</h5>
    <div class="my-3 border-top"></div>
    <div class="accordion" id="accordionExample">



      <?php

      $n = 0;


      $sqll = "SELECT * FROM events WHERE hotel='$hotel' && country='$country' && location='$city'";
      $resultt = $conn->query($sqll);

      if ($resultt->num_rows > 0) {
        // output data of each row
        while ($roww = $resultt->fetch_assoc()) {

      ?>
          <form action="#" method="post" enctype="multipart/form-data">
            <input style='display:none;' name='iad' value='<?php echo $roww['id']; ?>'>
            <div class="accordion-item">
              <h2 class="accordion-header bg-white" id="headingOne">
                <button class="accordion-button bg-white" type="button" style="color:#ce3435;" data-bs-toggle="collapse" data-bs-target="#collapsea<?php echo $n; ?>" aria-expanded="true" aria-controls="collapsea<?php echo $n; ?>">
                  <b>EVENT: </b>&nbsp;
                  <?php echo $roww['event']; ?>

                </button>
              </h2>
              <div id="collapsea<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php

                  $eve = $roww['event'];

                  $nn = 0;
                  $sqllz = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && event='$eve' GROUP BY name";
                  $resulttz = $conn->query($sqllz);

                  if ($resulttz->num_rows > 0) {
                    // output data of each row
                    while ($rowwz = $resulttz->fetch_assoc()) {

                  ?>



                      <h2 class="accordion-header bg-white" id="headingOne">
                        <button class="accordion-button bg-white" type="button" style="color:#ce3435;" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $nn; ?>" aria-expanded="true" aria-controls="collapse<?php echo $nn; ?>">
                          <b>Room:&nbsp;</b><?php echo $rowwz['name']; ?>
                        </button>

                      </h2>




                      <div id="collapse<?php echo $nn; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                        <div class="accordion-body">



                          <?php
                          $ramnam = $rowwz['name'];
                          $nnn = 0;
                          $sqllza = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && event='$eve' && name='$ramnam'";
                          $resulttza = $conn->query($sqllza);

                          if ($resulttza->num_rows > 0) {
                            // output data of each row
                            while ($rowwza = $resulttza->fetch_assoc()) {

                          ?>


                              <a href='updateprice.php?event=<?php echo $roww['event']; ?>&room=<?php echo $rowwz['name']; ?>&sdate=<?php echo $rowwza['sdate']; ?>&edate=<?php echo $rowwza['edate']; ?>'>


                                <h2 class="accordion-header bg-white" id="headingOne">
                                  <button class="accordion-button bg-white" type="button" style="color:#ce3435;" data-bs-toggle="collapse" data-bs-target="#collapseaaa<?php echo $nnn; ?>" aria-expanded="true" aria-controls="collapse<?php echo $nnn; ?>">

                                    <h6>From: <?php echo $rowwza['sdate']; ?> To: <?php echo $rowwza['edate']; ?> </h6>


                                  </button>

                                </h2>

                              </a>












                          <?php
                              $nnn = $nnn + 1;
                            }
                          } ?>






                        </div>
                      </div>
















                  <?php
                      $nn = $nn + 1;
                    }
                  }
                  ?>









                </div>
              </div>

            </div>

          </form>

      <?php
          $n = $n + 1;
        }
      }
      ?>

    </div>
  </div>
</div>


<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>


<?php endblock(); ?>