<?php
session_start();
require_once('db_connection.php');

$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];


?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Rooms List
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
  .bi-check-square{
    color:#ce3435 !important;
  }
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center">
  <div class="breadcrumb-title pe-3 ">Rooms List</div>
  <div class="ms-auto">
    <div class="btn-group">

      <a href='addinventoryNew.php'><button class='btn btn-danger'>Add More Rooms</button></a>
    </div>
  </div>

</div>
<!--end breadcrumb-->

<div class="card mt-2">
  <div class="card-body">
    <div class="d-flex align-items-center">
      <h5 class="mb-0">Rooms List</h5>
      <form class="ms-auto position-relative">
        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
        <input class="form-control ps-5" id="RoomsTableSearchInput" type="text" placeholder="search">
      </form>
    </div>
    <div class="table-responsive mt-3">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Room Types</th>
            <th>Pictures</th>
            
            <th>Room Size(Single)</th>
            <th>Room Size(Double)</th>
            <th>Room Description(Single)</th>
            <th>Room Description(Double)</th>
            <!-- <th>Amenities</th> -->
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="RoomsTable">
          <?php

          $modalcount = 0;
          $modalcountfacilities = 0;

          $sqll = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";
          $resultt = $conn->query($sqll);

          if ($resultt->num_rows > 0) {
            // output data of each row
            while ($roww = $resultt->fetch_assoc()) {
          ?>

              <tr>
                <td><?php echo $roww['type']; ?></td>
                <td>
                  <?php
                  $rmtype = $roww['type'];
                  $sqllm = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$rmtype'";
                  $resulttm = $conn->query($sqllm);

                  if ($resulttm->num_rows > 0) {
                    // output data of each row
                    while ($rowwm = $resulttm->fetch_assoc()) {

                  ?>
                      <img class="product-img-2" style="display: inline;" src='../Room Uploads/<?php echo $hotel; ?>/<?php echo $rmtype; ?>/<?php echo $rowwm['image']; ?>' alt="<?php echo $roww['type']; ?>">
                  <?php
                    }
                  }
                  ?>

                </td>
                <td><?php echo $roww['roomsize']; ?></td>
                <td><?php if($roww['roomsizedouble']==''){echo '-';}
                else{echo $roww['roomsizedouble'];} ?></td>
                <td><?php echo substr($roww['singledescription'], 50); ?>...</td>
                 <td><?php echo substr($roww['doubledescription'], 50); ?>...</td>
                <!-- <td>Amenities</td> -->
                <td>
                  <div class="table-actions d-flex align-items-center gap-3 fs-6">
                    <span data-bs-toggle="modal" data-bs-target="#ViewRoomModal<?php echo $modalcount; ?>" title="Views"><i class="bi bi-eye-fill text-warning"></i></span>
                    <a href="javascript:;" class="text-danger" title="Delete"><i class="bi bi-trash-fill"></i></a>
                  </div>
                </td>
              </tr>

          <?php
              $modalcount = $modalcount + 1;
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<?php

$modalcount = 0;

$sqll = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while ($roww = $resultt->fetch_assoc()) {
?>
    <div class="modal fade" id="ViewRoomModal<?php echo $modalcount; ?>" tabindex="-1" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?php echo $roww['type']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm">
                Room Size : <?php echo $roww['roomsize']; ?>
              </div>
              
            </div>
            <div class="row mt-2">
              <label><b>Description</b></label>
              <p>
                <?php echo $roww['singledescription'];  ?>
              </p>
            </div>

            <label><b>Amenities</b></label>
            <div class='row'>
              <div class='col-sm'>
                <?php
                if ($roww['inroomfacilities'] !== '') {
                  $rm = explode(',', $roww['inroomfacilities']);

                  echo '<h5>In Room Facilities:</h5>';
                  foreach ($rm as $r) {
                    echo '<i class="bi bi-check-square"></i> '.$r . '<br/>';
                  }
                }

                ?>
              </div>


              <div class='col-sm'>
                <?php
                if ($roww['kitchenfacilities'] !== '') {
                  $rm = explode(',', $roww['kitchenfacilities']);

                  echo '<h5>Kitchen Facilities:</h5>';
                  foreach ($rm as $r) {
                    echo '<i class="bi bi-check-square"></i> '.$r . '<br/>';
                  }
                }

                ?>
              </div>

            </div>

            <div class='row'>

              <div class='col-sm'>
                <?php
                if ($roww['privatebathroomfacilities'] !== '') {
                  $rm = explode(',', $roww['privatebathroomfacilities']);

                  echo '<h5>Private Bathroom Facilities:</h5>';
                  foreach ($rm as $r) {
                    echo '<i class="bi bi-check-square"></i> '.$r . '<br/>';
                  }
                }

                ?>
              </div>


              <div class='col-sm'>
                <?php
                if ($roww['complimentaryfacilities'] !== '') {
                  $rm = explode(',', $roww['complimentaryfacilities']);

                  echo '<h5>Complimentary Facilities:</h5>';
                  foreach ($rm as $r) {
                    echo '<i class="bi bi-check-square"></i> '.$r . '<br/>';
                  }
                }

                ?>
              </div>

            </div>
            <div class="row mt-2">

              <?php
              $rmtype = $roww['type'];
              $sqllm = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$rmtype'";
              $resulttm = $conn->query($sqllm);

              if ($resulttm->num_rows > 0) {
                // output data of each row
                while ($rowwm = $resulttm->fetch_assoc()) {

              ?>
                  <div class="col-2"><img style="width: 100%; height:100%;" src='../Room Uploads/<?php echo $hotel; ?>/<?php echo $rmtype; ?>/<?php echo $rowwm['image']; ?>' alt="<?php echo $roww['type']; ?>" class="product-img-2" alt="product img"></div>

              <?php
                }
              }
              ?>



            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<?php
    $modalcount = $modalcount + 1;
  }
}
?>



<?php endblock() ?>

<?php startblock('FooterText') ?>

<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>

$(document).ready(function(){
  $("#RoomsTableSearchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#RoomsTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

  $.ajax({

    type: 'POST',

    url: 'getalertme.php',
    success: function(result) {


      if (result.includes('exists')) {
        Swal.fire('Updated Successfully')
      }
    }

  });

  function ViewRoom() {
    $('#ViewRoomModal').modal('show');
  }
</script>

<?php endblock(); ?>