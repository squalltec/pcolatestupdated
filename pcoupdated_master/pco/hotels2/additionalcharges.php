<?php

session_start();

require_once('db_connection.php');





$bfadditional = '';


$sbfadditional = '';








$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . getRealIpAddr());

function getRealIpAddr()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
  {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

date_default_timezone_set('Asia/Dubai');











$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];






$sqll = "SELECT * FROM basiccharges WHERE hotel='$hotel' && location='$city' && country='$country'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while ($roww = $resultt->fetch_assoc()) {

    if ($roww['season'] == '') {


      $bfadditional = $roww['breakfast'];
      $lnadditional = $roww['lunch'];
      $dinadditional = $roww['dinner'];


      $rnbf = $roww['rnbf'];
      $rnln = $roww['rnln'];
      $rnd = $roww['rnd'];



      $extraadditional = $roww['extrabed'];
      $childadditional = $roww['childbed'];
      $babyadditional = $roww['babycot'];
    } else if ($roww['season'] == 'Summer') {


      $sbfadditional = $roww['breakfast'];
      $slnadditional = $roww['lunch'];
      $sdinadditional = $roww['dinner'];


      $rnsbf = $roww['rnbf'];
      $rnsln = $roww['rnln'];
      $rnsd = $roww['rnd'];



      $sextraadditional = $roww['extrabed'];
      $schildadditional = $roww['childbed'];
      $sbabyadditional = $roww['babycot'];
    } else if ($roww['season'] == 'Winter') {


      $wbfadditional = $roww['breakfast'];
      $wlnadditional = $roww['lunch'];
      $wdinadditional = $roww['dinner'];

      $rnsbf = $roww['rnbf'];
      $rnsln = $roww['rnln'];
      $rnsd = $roww['rnd'];


      $wextraadditional = $roww['extrabed'];
      $wchildadditional = $roww['childbed'];
      $wbabyadditional = $roww['babycot'];
    }
  }
}









if (isset($_POST['submitsw'])) {




  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");




  $sqlvzz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Additional Charges')";

  $resultvzz = $conn->query($sqlvzz);


  if ($resultvzz === TRUE) {
  }



























  $ab = $_POST['ab'];
  $al = $_POST['al'];
  $ad = $_POST['ad'];
  $eb = $_POST['eb'];
  $ecb = $_POST['ecb'];
  $ebc = $_POST['ebc'];


  $rnbf = $_POST['rnbf'];
  $rnln = $_POST['rnln'];
  $rnd = $_POST['rnd'];



  $seasons = array("Summer", "Winter");


  $n = 0;
  foreach ($seasons as $season) {





    $sqll = "SELECT * FROM basiccharges WHERE hotel='$hotel' && location='$city' && country='$country' && season='$season'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {



      $sql = "UPDATE basiccharges SET hotel='$hotel',country='$country',location='$city',breakfast='$ab[$n]',lunch='$al[$n]',dinner='$ad[$n]',extrabed='$eb[$n]', childbed='$ecb[$n]', babycot='$ebc[$n]', rnbf='$rnbf[$n]', rnln='$rnln[$n]', rnd='$rnd[$n]' WHERE hotel='$hotel' && location='$city' && country='$country' && season='$season'";



      $resulta = $conn->query($sql);


      if ($resulta === TRUE) {


        $_SESSION['alertme'] = 1;
        $_SESSION['ck'] = '1';
        //echo "<script>location.replace('additionalcharges.php');</script>";


      }
    } else {
      $sql = "INSERT INTO basiccharges (hotel,country,location,breakfast,lunch,dinner,extrabed, childbed, babycot,season)
           VALUES ('$hotel','$country','$city','$ab[$n]','$al[$n]','$ad[$n]','$eb[$n]','$ecb[$n]','$ebc[$n]','$season')";

      $resulta = $conn->query($sql);


      if ($resulta === TRUE) {


        $_SESSION['alertme'] = 1;
        $_SESSION['ck'] = '2';

        //echo "<script>location.replace('add_new_prices.php');</script>";


      }
    }


    $n = $n + 1;
  }


  if ($_SESSION['ck'] == '1') {
    echo "<script>location.replace('additionalcharges.php');</script>";
  } else if ($_SESSION['ck'] == '2') {
    echo "<script>location.replace('add_new_prices_outside.php');</script>";
  }
}







if (isset($_POST['submit'])) {




  $ab = $_POST['ab'];
  $al = $_POST['al'];
  $ad = $_POST['ad'];
  $eb = $_POST['eb'];
  $ecb = $_POST['ecb'];
  $ebc = $_POST['ebc'];



  $rnbf = $_POST['rnbf'];
  $rnln = $_POST['rnln'];
  $rnd = $_POST['rnd'];

















  $sqll = "SELECT * FROM basiccharges WHERE hotel='$hotel' && location='$city' && country='$country'";
  $resultt = $conn->query($sqll);

  if ($resultt->num_rows > 0) {



    $sql = "UPDATE basiccharges SET hotel='$hotel',country='$country',location='$city',breakfast='$ab',lunch='$al',dinner='$ad',extrabed='$eb', childbed='$ecb', babycot='$ebc' , rnbf='$rnbf' , rnln='$rnln' , rnd='$rnd' WHERE hotel='$hotel' && location='$city' && country='$country'";



    $resulta = $conn->query($sql);


    if ($resulta === TRUE) {


      $_SESSION['alertme'] = 1;

      echo "<script>location.replace('additionalcharges.php');</script>";
    }
  } else {
    $sql = "INSERT INTO basiccharges (hotel,country,location,breakfast,lunch,dinner,extrabed, childbed, babycot)
           VALUES ('$hotel','$country','$city','$ab','$al','$ad','$eb','$ecb','$ebc')";

    $resulta = $conn->query($sql);


    if ($resulta === TRUE) {


      $_SESSION['alertme'] = 1;

      echo "<script>location.replace('add_new_prices_outside.php');</script>";
    }
  }
}



?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Additional Charges
<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="breadcrumb-title pe-3">Supplementary Charges</div>

  <div class="ms-auto">
    <!-- <div class="btn-group">
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addRestaurantsModal"><i class="bi bi-plus"></i> Add New</button>
    </div> -->
  </div>
</div>



<div class="card">
  <div class="card-body">
      <div class="row">
        <h5>Throughout the Year</h5>
      </div>
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <label>Breakfast Price</label>
            <input class='form-control' required name='ab' value='<?php echo $bfadditional; ?>' placeholder='Breakfast Price'>
          </div>
          <div class="col-md-4">
            <label>Restaurant Name</label>
            <input class='form-control' name='rnbf' value='<?php echo $rnbf; ?>' placeholder='Restaurant Name'>
          </div>
          <div class="col-md-4">
            <label>Lunch  Price</label>
            <input class='form-control' required name='al' value='<?php echo $lnadditional; ?>' placeholder='Lunch Price'>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label>Restaurant Name</label>
            <input class='form-control' name='rnln' value='<?php echo $rnln; ?>' placeholder='Restaurant Name'>
          </div>
          <div class="col-md-4">
            <label>Dinner  Price</label>
            <input class='form-control' required name='ad' value='<?php echo $dinadditional; ?>' placeholder='Dinner Price'>
          </div>
          <div class="col-md-4">
            <label>Restaurant Name</label>
            <input class='form-control' name='rnd' value='<?php echo $rnd; ?>' placeholder='Restaurant Name'>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label>Extra Bed</label>
            <input class='form-control' required name='eb' value='<?php echo $extraadditional; ?>' placeholder='Extra Bed Price'>
          </div>
          <div class="col-md-4">
            <label>Extra Child Bed</label>
            <input class='form-control' required name='ecb' value='<?php echo $childadditional; ?>' placeholder='Child Bed Price'>
          </div>
          <div class="col-md-4">
            <label>Baby Cot</label>
            <input class='form-control' required name='ebc' value='<?php echo $babyadditional; ?>' placeholder='Baby Cot Price'>
          </div>
        </div>
        <div class="form-group mt-2">
          <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Submit</button>
        </div>
      </form>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <h5>Winter / Summer <small>(Separate)</small></h5>
    </div>
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="row">
          <div class="col-md-4">
            <label>Breakfast  Price</label>
            <input class='form-control' required name='ab[]' value='<?php echo $sbfadditional; ?>' placeholder='Breakfast Price'>
          </div>
          <div class="col-md-4">
            <label>Additional Breakfast</label>
            <input class='form-control' required name='ab[]' value='<?php echo $wbfadditional; ?>' placeholder='Breakfast Price'>
          </div>

          <div class="col-md-4">
            <label>Restaurant Name</label>
            <input class='form-control' name='rnbf[]' value='<?php echo $rnsbf; ?>' placeholder='Restaurant Name'>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <label>Lunch  Price</label>
            <input class='form-control' required name='al[]' value='<?php echo $slnadditional; ?>' placeholder='Lunch Price'>
          </div>
          <div class="col-md-4">
            <label >Additional Lunch</label>
            <input class='form-control' required name='al[]' value='<?php echo $wlnadditional; ?>' placeholder='Lunch Price'>
          </div>

          <div class="col-md-4">
            <label >Restaurant Name</label>
            <input class='form-control' required name='rnln[]' value='<?php echo $rnsln; ?>' placeholder='Restaurant Name'>
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <label>Dinner  Price</label>
            <input class='form-control' required name='ad[]' value='<?php echo $sdinadditional; ?>' placeholder='Dinner Price'>
          </div>

          <div class="col-md-4">
            <label >Additional Dinner</label>
            <input class='form-control' required name='ad[]' value='<?php echo $wdinadditional; ?>' placeholder='Dinner Price'>
          </div>


          <div class="col-md-4">
            <label >Restaurant Name</label>
            <input class='form-control' required name='rnd[]' value='<?php echo $rnsd; ?>' placeholder='Restaurant Name'>
          </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <label>Extra Bed</label>
            <input class='form-control' required name='eb[]' value='<?php echo $sextraadditional; ?>' placeholder='Extra Bed Price'>
        </div>
        <div class="col-md-4">
            <label >Extra Bed</label>
            <input class='form-control' required name='eb[]' value='<?php echo $wextraadditional; ?>' placeholder='Extra Bed Price'>
        </div>
        <div class="col-md-4">
            <label>Extra Child Bed</label>
            <input class='form-control' required name='ecb[]' value='<?php echo $schildadditional; ?>' placeholder='Child Bed Price'>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <label>Extra Child Bed</label>
            <input class='form-control' required name='ecb[]' value='<?php echo $wchildadditional; ?>' placeholder='Child Bed Price'>
        </div>
        <div class="col-md-4">
            <label>Baby Cot</label>
            <input class='form-control' required name='ebc[]' value='<?php echo $sbabyadditional; ?>' placeholder='Baby Cot Price'>
        </div>
        <div class="col-md-4">
            <label>Baby Cot</label>
            <input class='form-control' required name='ebc[]' value='<?php echo $wbabyadditional; ?>' placeholder='Baby Cot Price'>
        </div>
      </div>
      <div class="form-group mt-2">
        <button style="float:right;" type="submit" name='submitsw' class="btn btn-danger">Submit</button>
      </div>
    </form>
  </div>
</div>
<div style="display: none;">
<h1 style='margin-top:-60px;' align='center'>Supplementary Charges</h1>
<style>
  body {
    font-family: Arial;
  }

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }

  /* Style the close button */
  .topright {
    float: right;
    cursor: pointer;
    font-size: 28px;
  }

  .topright:hover {
    color: red;
  }
</style>

<div align='center' class="tab">
  <div class='container'>
    <div class='row'>
      <div class='col-sm'>

        <?php if ($bfadditional != '') {

        ?>

          <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Throughout the Year</button>
        <?php
        } else {
        ?>
          <button class="tablinks" onclick="openCity(event, 'London')">Throughout the Year</button>

        <?php

        }

        ?>


      </div>

      <div class='col-sm'>

        <?php if ($sbfadditional != '') {

        ?>


          <button class="tablinks" onclick="openCity(event, 'Paris') " id="defaultOpen">Winter / Summer <small>(Separate)</small></button>

        <?php
        } else {
        ?>

          <button class="tablinks" onclick="openCity(event, 'Paris')">Winter / Summer <small>(Separate)</small></button>

        <?php

        }

        ?>


      </div>

    </div>
  </div>


</div>

<div id="London" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>








  <form action="#" method="post" enctype="multipart/form-data">



    <input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme']; ?>'>


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Breakfast</label>
          <input class='form-control' required name='ab' value='<?php echo $bfadditional; ?>' placeholder='Breakfast Price'>
        </div>


        <div class="col-sm">
          <label>Restaurant Name</label>
          <input class='form-control' name='rnbf' value='<?php echo $rnbf; ?>' placeholder='Restaurant Name'>
        </div>




      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Lunch</label>
          <input class='form-control' required name='al' value='<?php echo $lnadditional; ?>' placeholder='Lunch Price'>
        </div>



        <div class="col-sm">
          <label>Restaurant Name</label>
          <input class='form-control' name='rnln' value='<?php echo $rnln; ?>' placeholder='Restaurant Name'>
        </div>


      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Dinner</label>
          <input class='form-control' required name='ad' value='<?php echo $dinadditional; ?>' placeholder='Dinner Price'>
        </div>

        <div class="col-sm">
          <label>Restaurant Name</label>
          <input class='form-control' name='rnd' value='<?php echo $rnd; ?>' placeholder='Restaurant Name'>
        </div>


      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Extra Bed</label>
          <input class='form-control' required name='eb' value='<?php echo $extraadditional; ?>' placeholder='Extra Bed Price'>
        </div>
      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Extra Child Bed</label>
          <input class='form-control' required name='ecb' value='<?php echo $childadditional; ?>' placeholder='Child Bed Price'>
        </div>
      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Baby Cot</label>
          <input class='form-control' required name='ebc' value='<?php echo $babyadditional; ?>' placeholder='Baby Cot Price'>
        </div>
      </div>
    </div>
    <br />
    <br />
    <br />
    <br />

    <div class="form-group">
      <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Submit</button>
    </div>

</div>
</form>










</div>

<div id="Paris" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>

  <form action="#" method="post" enctype="multipart/form-data">

    <div class='container'>
      <div class='row'>
        <div class='col-sm'>
          <h2> Summer </h2>
        </div>
        <div class='col-sm'>
          <h2> Winter</h2>
        </div>


      </div>
    </div>
    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Breakfast</label>
          <input class='form-control' required name='ab[]' value='<?php echo $sbfadditional; ?>' placeholder='Breakfast Price'>
        </div>
        <div class="col-sm">
          <label style='color:white;'>Additional Breakfast</label>
          <input class='form-control' required name='ab[]' value='<?php echo $wbfadditional; ?>' placeholder='Breakfast Price'>
        </div>

        <div class="col-sm">
          <label style='color:white;'>Restaurant Name</label>
          <input class='form-control' name='rnbf[]' value='<?php echo $rnsbf; ?>' placeholder='Restaurant Name'>
        </div>


      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Lunch</label>
          <input class='form-control' required name='al[]' value='<?php echo $slnadditional; ?>' placeholder='Lunch Price'>
        </div>
        <div class="col-sm">
          <label style='color:white;'>Additional Lunch</label>
          <input class='form-control' required name='al[]' value='<?php echo $wlnadditional; ?>' placeholder='Lunch Price'>
        </div>

        <div class="col-sm">
          <label style='color:white;'>Restaurant Name</label>
          <input class='form-control' required name='rnln[]' value='<?php echo $rnsln; ?>' placeholder='Restaurant Name'>
        </div>

      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Buffet Dinner</label>
          <input class='form-control' required name='ad[]' value='<?php echo $sdinadditional; ?>' placeholder='Dinner Price'>
        </div>

        <div class="col-sm">
          <label style='color:white;'>Additional Dinner</label>
          <input class='form-control' required name='ad[]' value='<?php echo $wdinadditional; ?>' placeholder='Dinner Price'>
        </div>


        <div class="col-sm">
          <label style='color:white;'>Restaurant Name</label>
          <input class='form-control' required name='rnd[]' value='<?php echo $rnsd; ?>' placeholder='Restaurant Name'>
        </div>


      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Extra Bed</label>
          <input class='form-control' required name='eb[]' value='<?php echo $sextraadditional; ?>' placeholder='Extra Bed Price'>
        </div>
        <div class="col-sm">
          <label style='color:white;'>Extra Bed</label>
          <input class='form-control' required name='eb[]' value='<?php echo $wextraadditional; ?>' placeholder='Extra Bed Price'>
        </div>
      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Extra Child Bed</label>
          <input class='form-control' required name='ecb[]' value='<?php echo $schildadditional; ?>' placeholder='Child Bed Price'>
        </div>

        <div class="col-sm">
          <label style='color:white;'>Extra Child Bed</label>
          <input class='form-control' required name='ecb[]' value='<?php echo $wchildadditional; ?>' placeholder='Child Bed Price'>
        </div>
      </div>
    </div>

    <br />


    <div class="container">
      <div class='row'>
        <div class="col-sm">
          <label>Baby Cot</label>
          <input class='form-control' required name='ebc[]' value='<?php echo $sbabyadditional; ?>' placeholder='Baby Cot Price'>
        </div>

        <div class="col-sm">
          <label style='color:white;'>Baby Cot</label>
          <input class='form-control' required name='ebc[]' value='<?php echo $wbabyadditional; ?>' placeholder='Baby Cot Price'>
        </div>
      </div>
    </div>

    <br />


    <br />







    <br />
    <br />

    <div class="form-group">
      <button style="float:right;" type="submit" name='submitsw' class="btn btn-danger">Submit</button>
    </div>

</div>
</form>
</div>
</div>

<?php endblock() ?>

<?php startblock('FooterText') ?>

<?php endblock() ?>


<?php startblock('scriptBottom') ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>
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
<?php endblock() ?>