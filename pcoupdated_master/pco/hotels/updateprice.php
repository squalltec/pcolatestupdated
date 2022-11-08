<?php
session_start();
require_once('db_connection.php');

$getevent = $_GET['event'];
$getroom = $_GET['room'];
$getsdate = $_GET['sdate'];
$getedate = $_GET['edate'];


$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];





if (isset($_POST['submit'])) {

  $event = $_POST['event'];
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];
  $room = $_POST['room'];
  $number = $_POST['number'];
  $release = $_POST['release'];
  $minimumstay = $_POST['minimumstay'];
  $single = $_POST['single'];
  $double = $_POST['double'];

  $setpricesid = $_SESSION['setpricesid'];

  $sql2 = "UPDATE setprices SET hotel='$hotel',country='$country',location='$city',name='$room',sellprice='$single',dblsellprice='$double',sdate='$sdate',edate='$edate',event='$event' ,approved='' WHERE id='$setpricesid'";

  $resulta2 = $conn->query($sql2);


  if ($resulta2 === TRUE) {
  }





  $roomnumbersid = $_SESSION['roomnumbersid'];

  $date = date('Y-m-d');
  $newdate = date('Y-m-d', strtotime($date . ' + ' . $release . 'days'));


  $sql2 = "UPDATE roomnumbers SET hotel='$hotel',country='$country',location='$city',name='$room',number='$number',releasedate='$release',dates='$newdate' WHERE id='$roomnumbersid'";

  $resulta2 = $conn->query($sql2);


  if ($resulta2 === TRUE) {
  }
}



?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Update Event Prices
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
  .swal2-confirm {
    background-color: #dc3545 !important;
  }
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="ps-3">
    <h2 class="text-dark">Edit Price</h2>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <form action="#" method="post" enctype="multipart/form-data">

      <div class='row'>
        <div class="col-sm">
          <label>Event Name</label>
          <input id='event' name='event' readonly value='<?php echo $getevent; ?>' class='form-control'>
        </div>
      </div>

      <div class='row'>
        <div class="col-sm">
          <label>Starting Date</label>
          <input type='date' readonly value='<?php echo $getsdate; ?>' required class='form-control' id='sdate' name='sdate' value='<?php echo ''; ?>'>
        </div>
        <div class="col-sm">
          <label>Ending Date</label>
          <input type='date' readonly value='<?php echo $getedate; ?>' required class='form-control' id='edate' name='edate' value='<?php echo ''; ?>'>
        </div>
      </div>

      <div class='row'>
        <div class="col-sm">
          <label>Room Type</label>
          <input readonly value='<?php echo $getroom; ?>' name='room' class='form-control'>


        </div>



        <?php


        $sqllvr = "SELECT * FROM roomnumbers WHERE hotel='$hotel' && country='$country' && location='$city' && name='$getroom' && sdate='$getsdate' && edate='$getedate'";
        $resulttvr = $conn->query($sqllvr);

        if ($resulttvr->num_rows > 0) {
          // output data of each row
          while ($rowwvr = $resulttvr->fetch_assoc()) {


            $_SESSION['roomnumbersid'] = $rowwvr['id'];

            $nmr = $rowwvr['number'];
            $rls = $rowwvr['releasedate'];
            $min = $rowwvr['minimumstay'];
          }
        }



        $sqllvrz = "SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$getroom' && sdate='$getsdate' && edate='$getedate' && event='$getevent'";
        $resulttvrz = $conn->query($sqllvrz);

        if ($resulttvrz->num_rows > 0) {
          // output data of each row
          while ($rowwvrz = $resulttvrz->fetch_assoc()) {

            $_SESSION['setpricesid'] = $rowwvrz['id'];


            $singlez = $rowwvrz['sellprice'];
            $doublez = $rowwvrz['dblsellprice'];
            $tripplez = $rowwvrz['trplsellprice'];
            $ml = $rowwvrz['mealplan'];
          }
        }






        $sqllvrzx = "SELECT * FROM basiccharges WHERE hotel='$hotel' && country='$country' && location='$city' && roomname='$getroom' && sdate='$getsdate' && edate='$getedate' && event='$getevent'";
        $resulttvrzx = $conn->query($sqllvrzx);

        if ($resulttvrzx->num_rows > 0) {
          // output data of each row
          while ($rowwvrzx = $resulttvrzx->fetch_assoc()) {

            $_SESSION['basicchargesid'] = $rowwvrzx['id'];


            $abf = $rowwvrzx['breakfast'];
            $al = $rowwvrzx['lunch'];
            $ad = $rowwvrzx['dinner'];
            $ebp = $rowwvrzx['extrabed'];
            $cbp = $rowwvrzx['childbed'];
            $bcp = $rowwvrzx['babycot'];


            $eb = $rowwvrzx['extrabedallowed'];
            $cb = $rowwvrzx['childbedallowed'];
            $bc = $rowwvrzx['babycotallowed'];


            $check1 = $rowwvrzx['additionalbreakfastwithextrabed'];
            $check2 = $rowwvrzx['additionalbreakfastwithchildbed'];
            $check3 = $rowwvrzx['additionalbreakfastwithbabycot'];
          }
        }









        ?>








        <div class="col-sm">
          <label>Allotment</label>
          <input class='form-control' required value='<?php echo $nmr; ?>' name='number' placeholder='Number of Rooms' min='0' type='number'>
        </div>



        <div class="col-sm">
          <label>Release Days</label>
          <input class='form-control' value='<?php echo $rls; ?>' required name='release' placeholder='Release Days' min='0' type='number'>
        </div>

        <div class="col-sm">

          <label>Minimum Stay</label>
          <input class='form-control' value='<?php echo $min; ?>' name='minimumstay' placeholder='Minimum Stay' min='0' type='number'>

        </div>







      </div>
      <div class='row'>


        <div class="col-sm">

          <label>Single Price</label>
          <input class='form-control' value='<?php echo $singlez; ?>' required id='single' name='single' placeholder='Single Price' min='0' type='number'>
          <input style='display:none;' class='form-control' value='<?php echo $singlez; ?>' id='singlecheck' name='singlecheck' placeholder='Single Price' min='0' type='number'>
        </div>


        <div class="col-sm">

          <label>Double Price</label>
          <input class='form-control' value='<?php echo $doublez; ?>' id='double' name='double' placeholder='Double Price' min='0' type='number'>


          <input style='display:none;' class='form-control' value='<?php echo $doublez; ?>' id='doublecheck' name='doublecheck' placeholder='Double Price' min='0' type='number'>

        </div>



      </div>
      <div class="row mt-2">
        <div class="form-group">
          <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
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

<script>
  $("#single").on('change', function() {
    var sin = document.getElementById('single').value;
    var max = document.getElementById('singlecheck').value;
    if (parseInt(sin) > parseInt(max)) {
      swal.fire('Price Cannot be increased!');
      document.getElementById('single').value = max;
    }
  });
  $("#double").on('change', function() {
    var sin = document.getElementById('double').value;
    var max = document.getElementById('doublecheck').value;
    if (parseInt(sin) > parseInt(max)) {
      swal.fire('Price Cannot be increased!');
      document.getElementById('double').value = max;
    }
  });
  $("#event").on('change', function() {
    const event = document.getElementById('event').value;
    var compy1 = event;
    $.ajax({
      type: 'POST',
      url: 'geteventdates.php',
      data: {
        'compy1': compy1
      },
      success: function(result) {
        result = jQuery.parseJSON(result);
        for (i = 0; i < result.length; i++) {
          sdate = result[i].sdate;
          edate = result[i].edate;
        }
        $("#sdate").val(sdate);
        $("#edate").val(edate);
      }
    });
  })
</script>



<?php endblock(); ?>