<?php

session_start();
require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];


if (isset($_POST['submit'])) {

  $event = $_POST['event'];



  $sqll = "SELECT * FROM contracts WHERE hotel='$hotel' && country='$country' && city='$city' && event='$event'";
  $resultt = $conn->query($sqll);

  if ($resultt->num_rows > 0) {





    if (!empty($_FILES['contract']['name'])) {


      mkdir("../Contracts/" . $hotel . "/" . $event, 0755, true);

      $filename2 = $_FILES['contract']['name'];
      $destination2 = '../Contracts/' . $hotel . '/' . $event . '/' . $filename2;
      $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
      $file2 = $_FILES['contract']['tmp_name'];

      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file2, $destination2)) {

        $sqlx = "UPDATE contracts SET contract='$filename2' WHERE hotel='$hotel' && country='$country' && city='$city' && event='$event'";

        $resultx = $conn->query($sqlx);


        if ($resultx === TRUE) {
          // echo "Category created successfully";
          $_SESSION['alertme'] = 1;
        } else {
          echo "Error: " . $sqlx . "<br>" . $conn->error;
        }
      }
    }
  } else {









    if (!empty($_FILES['contract']['name'])) {


      mkdir("../Contracts/" . $hotel . "/" . $event, 0755, true);

      $filename2 = $_FILES['contract']['name'];
      $destination2 = '../Contracts/' . $hotel . '/' . $event . '/' . $filename2;
      $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
      $file2 = $_FILES['contract']['tmp_name'];

      // move the uploaded (temporary) file to the specified destination
      if (move_uploaded_file($file2, $destination2)) {

        $sqlx = "INSERT INTO contracts (hotel,country,city,event, contract) VALUES ('$hotel', '$country', '$city','$event', '$filename2')";

        $resultx = $conn->query($sqlx);


        if ($resultx === TRUE) {
          // echo "Category created successfully";
          $_SESSION['alertme'] = 1;
        } else {
          echo "Error: " . $sqlx . "<br>" . $conn->error;
        }
      }
    }
  }
}

?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Manage Contracts
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Contracts</div>

  <div class="ms-auto">
    <div class="btn-group">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addContractModal"><i class="bi bi-plus"></i> Add New</button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="d-flex align-items-center">
      <h5 class="mb-0">Contracts</h5>
      <form class="ms-auto position-relative">
        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
        <input class="form-control ps-5" type="text" placeholder="search">
      </form>
    </div>
    <div class="table-responsive mt-3">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Proposed Contract</th>
            <th>Approved Contract</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>


          <?php

          $n = 0;


          $sqll = "SELECT * FROM contracts WHERE hotel='$hotel' && country='$country' && city='$city'";
          $resultt = $conn->query($sqll);

          if ($resultt->num_rows > 0) {
            // output data of each row
            while ($roww = $resultt->fetch_assoc()) {

          ?>
              <tr>
                <td><?php echo $roww['id']; ?></td>
                <td><?php echo $roww['event']; ?></td>
                <td>
                  <a href='../Contracts/<?php echo $hotel; ?>/<?php echo $roww['event']; ?>/<?php echo $roww['contract']; ?>'>
                    <button type="button" class="btn btn-outline-danger px-3"><i class="bi bi-cloud-arrow-down-fill"></i> Download</button>
                  </a>
                </td>
                <td>
                  <?php
                  if ($roww['approvedcontract'] != '') {
                  ?>
                    <a href='../Approved Contracts/<?php echo $hotel; ?>/<?php echo $roww['event']; ?>/<?php echo $roww['approvedcontract']; ?>' download><button type="button" class="btn btn-outline-danger px-3"><i class="bi bi-cloud-arrow-down-fill"></i> Download</button></a>
                  <?php
                  } else {
                    echo '<span class="badge bg-light-warning text-warning " style="width:70px !important;">Waiting</span>';
                  }
                  ?>

                </td>

                <td>
                  <?php
                  if ($roww['approvedcontract'] != '') {
                  ?>
                    <span class="badge bg-light-success text-success text-success " style="width:70px !important;">Approved</span>
                  <?php
                  } else {
                    echo '<span class="badge bg-light-warning text-warning " style="width:70px !important;">Pending</span>';
                  }
                  ?>
                </td>

              </tr>

          <?php
            }
          }
          ?>


        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="addContractModal" tabindex="-1" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Add New Contract</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class='row p-2'>
            <label>Event</label>
            <select class='form-control' name='event'>
              <option>Select Event</option>

              <?php

              $sqll = "SELECT * FROM newevents";
              $resultt = $conn->query($sqll);

              if ($resultt->num_rows > 0) {
                // output data of each row
                while ($roww = $resultt->fetch_assoc()) {

                  echo '<option>' . $roww['name'] . '</option>';
                }
              }
              ?>

            </select>
          </div>
          <div class="row p-2">
            <label>Upload Contract</label>
            <input type='file' accept="application/pdf" required class='form-control' name='contract'>
          </div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type='submit' name='submit' value="Save changes" required class='btn btn-danger'>
          <!-- <button type="submit" required name='submit' class="btn btn-danger"></button> -->
        </div>
      </form>
    </div>
  </div>
</div>




<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
  document.getElementById("addact2").addEventListener("click", function(event) {
    event.preventDefault()
  });




  var n = 1;

  function myFunction2() {
    var act = document.getElementById("aacctt2");

    var dv = document.createElement("div");

    dv.setAttribute("class", "col-sm");

    var yc = document.createElement("INPUT");

    yc.setAttribute("class", "form-control");
    yc.setAttribute("Name", "restaurantsname[]");
    yc.setAttribute("type", "text");
    yc.setAttribute("placeholder", "Restaurant Name");


    var yc2 = document.createElement("textarea");

    yc2.setAttribute("class", "form-control");
    yc2.setAttribute("Name", "restaurantsdes[]");
    yc2.setAttribute("placeholder", "Restaurant Description");



    var yc3 = document.createElement("INPUT");

    yc3.setAttribute("class", "form-control");
    yc3.setAttribute("Name", "cuisine[]");
    yc3.setAttribute("type", "text");
    yc3.setAttribute("placeholder", "Cuisine");



    var yc4 = document.createElement("INPUT");

    yc4.setAttribute("class", "form-control");
    yc4.setAttribute("Name", "fileres" + n);
    yc4.setAttribute("type", "file");



    dv.appendChild(yc);
    dv.appendChild(yc3);
    dv.appendChild(yc2);
    dv.appendChild(yc4);


    act.appendChild(dv);


    n = n + 1;

  }
</script>




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $.ajax({

    type: 'POST',

    url: 'getalertme.php',
    success: function(result) {


      if (result.includes('exists')) {
        Swal.fire('Updated Successfully')
      }



    }

  });
</script>

<?php endblock(); ?>