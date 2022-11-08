<?php

session_start();
require_once('db_connection.php');





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




if (isset($_POST['submit'])) {









  $atm = $_POST['atm'];
  $agerestriction = $_POST['agerestriction'];
  $roomservicefrom = $_POST['roomservicefrom'];
  $roomserviceto = $_POST['roomserviceto'];
  $pets = $_POST['pets'];
  $parking = $_POST['parking'];

  if (isset($_POST['chargednotcharged'])) {
    $chargednotcharged = $_POST['chargednotcharged'];
  } else {
    $chargednotcharged = '';
  }








  //general facilities


  $acceptedcardslist = implode(", ", $_POST['cards']);


  $arraycards = $_POST['cards'];




  foreach ($arraycards as $value) {




    $sql1 = "SELECT * FROM hotelsdatabasegeneralfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasegeneralfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }




  //cards





  $acceptedcardscards = implode(", ", $_POST['cardscards']);


  $arraycardscards = $_POST['cardscards'];



  foreach ($arraycardscards as $value) {




    $sql1s = "SELECT * FROM paymentcards WHERE name='$value'";
    $result1s = $conn->query($sql1s);

    if ($result1s->num_rows > 0) {
    } else {



      $sqlbbs = "INSERT INTO paymentcards (name) VALUES ('$value')";

      $resultbbs = $conn->query($sqlbbs);


      if ($resultbbs === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbs . "<br>" . $conn->error;
      }
    }
  }



















  //pillowmenucards





  $acceptedcardscardspillowmenu = implode(", ", $_POST['cardspillowmenu']);


  $arraycardscardspillowmenu = $_POST['cardspillowmenu'];



  foreach ($arraycardscardspillowmenu as $value) {




    $sql1s = "SELECT * FROM pillowmenufacilities WHERE name='$value'";
    $result1s = $conn->query($sql1s);

    if ($result1s->num_rows > 0) {
    } else {



      $sqlbbs = "INSERT INTO pillowmenufacilities (name) VALUES ('$value')";

      $resultbbs = $conn->query($sqlbbs);


      if ($resultbbs === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbs . "<br>" . $conn->error;
      }
    }
  }











  //wellnesscards





  $acceptedcardscardswellness = implode(", ", $_POST['cardswellness']);


  $arraycardscardswellness = $_POST['cardswellness'];



  foreach ($arraycardscardswellness as $value) {




    $sql1s = "SELECT * FROM wellnessfacilities WHERE name='$value'";
    $result1s = $conn->query($sql1s);

    if ($result1s->num_rows > 0) {
    } else {



      $sqlbbs = "INSERT INTO wellnessfacilities (name) VALUES ('$value')";

      $resultbbs = $conn->query($sqlbbs);


      if ($resultbbs === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbs . "<br>" . $conn->error;
      }
    }
  }








  //visualaidscards





  $acceptedcardscardsvisualaids = implode(", ", $_POST['cardsvisualaids']);


  $arraycardscardsvisualaids = $_POST['cardsvisualaids'];



  foreach ($arraycardscardsvisualaids as $value) {




    $sql1s = "SELECT * FROM visualaidsfacilities WHERE name='$value'";
    $result1s = $conn->query($sql1s);

    if ($result1s->num_rows > 0) {
    } else {



      $sqlbbs = "INSERT INTO visualaidsfacilities (name) VALUES ('$value')";

      $resultbbs = $conn->query($sqlbbs);


      if ($resultbbs === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbs . "<br>" . $conn->error;
      }
    }
  }
















  //main facilities



  $acceptedcardslistt = implode(", ", $_POST['cardss']);


  $arraycardss = $_POST['cardss'];



  foreach ($arraycardss as $value) {




    $sql1s = "SELECT * FROM hotelsdatabasemainfacilities WHERE name='$value'";
    $result1s = $conn->query($sql1s);

    if ($result1s->num_rows > 0) {
    } else {



      $sqlbbs = "INSERT INTO hotelsdatabasemainfacilities (name) VALUES ('$value')";

      $resultbbs = $conn->query($sqlbbs);


      if ($resultbbs === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbs . "<br>" . $conn->error;
      }
    }
  }










  //front desk







  $acceptedcardslisttt = implode(", ", $_POST['cardsss']);


  $arraycardsss = $_POST['cardsss'];



  foreach ($arraycardsss as $value) {




    $sql1ss = "SELECT * FROM hotelsdatabasefrontdeskfacilities WHERE name='$value'";
    $result1ss = $conn->query($sql1ss);

    if ($result1ss->num_rows > 0) {
    } else {



      $sqlbbss = "INSERT INTO hotelsdatabasefrontdeskfacilities (name) VALUES ('$value')";

      $resultbbss = $conn->query($sqlbbss);


      if ($resultbbss === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbss . "<br>" . $conn->error;
      }
    }
  }










  //family






  $acceptedcardslistttt = implode(", ", $_POST['cardssss']);


  $arraycardssss = $_POST['cardssss'];



  foreach ($arraycardssss as $value) {




    $sql1sss = "SELECT * FROM hotelsdatabasefamilyfacilities WHERE name='$value'";
    $result1sss = $conn->query($sql1sss);

    if ($result1sss->num_rows > 0) {
    } else {



      $sqlbbsss = "INSERT INTO hotelsdatabasefamilyfacilities (name) VALUES ('$value')";

      $resultbbsss = $conn->query($sqlbbsss);


      if ($resultbbsss === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss . "<br>" . $conn->error;
      }
    }
  }
















  //sports







  $acceptedcardslistttt2 = implode(", ", $_POST['cardssss2s']);


  $arraycardssss2 = $_POST['cardssss2s'];



  foreach ($arraycardssss2 as $value) {




    $sql1sss2 = "SELECT * FROM hotelsdatabasesportsfacilities WHERE name='$value'";
    $result1sss2 = $conn->query($sql1sss2);

    if ($result1sss2->num_rows > 0) {
    } else {



      $sqlbbsss2 = "INSERT INTO hotelsdatabasesportsfacilities (name) VALUES ('$value')";

      $resultbbsss2 = $conn->query($sqlbbsss2);


      if ($resultbbsss2 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss2 . "<br>" . $conn->error;
      }
    }
  }













  //cleaning






  $acceptedcardslistttt23mama = implode(", ", $_POST['cardssmama']);


  $arraycardssss23mama = $_POST['cardssmama'];



  foreach ($arraycardssss23mama as $value) {




    $sql1sss23 = "SELECT * FROM hotelsdatabasecleaningfacilities WHERE name='$value'";
    $result1sss23 = $conn->query($sql1sss23);

    if ($result1sss23->num_rows > 0) {
    } else {



      $sqlbbsss23 = "INSERT INTO hotelsdatabasecleaningfacilities (name) VALUES ('$value')";

      $resultbbsss23 = $conn->query($sqlbbsss23);


      if ($resultbbsss23 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss23 . "<br>" . $conn->error;
      }
    }
  }











  //Food







  $acceptedcardslistttt234 = implode(", ", $_POST['cardssss234']);


  $arraycardssss234 = $_POST['cardssss234'];



  foreach ($arraycardssss234 as $value) {




    $sql1sss234 = "SELECT * FROM hotelsdatabasefoodfacilities WHERE name='$value'";
    $result1sss234 = $conn->query($sql1sss234);

    if ($result1sss234->num_rows > 0) {
    } else {



      $sqlbbsss234 = "INSERT INTO hotelsdatabasefoodfacilities (name) VALUES ('$value')";

      $resultbbsss234 = $conn->query($sqlbbsss234);


      if ($resultbbsss234 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss234 . "<br>" . $conn->error;
      }
    }
  }













  //Business





  $acceptedcardslistttt2345 = implode(", ", $_POST['cardssss2345']);


  $arraycardssss2345 = $_POST['cardssss2345'];



  foreach ($arraycardssss2345 as $value) {




    $sql1sss2345 = "SELECT * FROM hotelsdatabasebusinessfacilities WHERE name='$value'";
    $result1sss2345 = $conn->query($sql1sss2345);

    if ($result1sss2345->num_rows > 0) {
    } else {



      $sqlbbsss2345 = "INSERT INTO hotelsdatabasebusinessfacilities (name) VALUES ('$value')";

      $resultbbsss2345 = $conn->query($sqlbbsss2345);


      if ($resultbbsss2345 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss2345 . "<br>" . $conn->error;
      }
    }
  }








  //Internet





  $acceptedcardslistttt23456 = implode(", ", $_POST['cardssss23456']);


  $arraycardssss23456 = $_POST['cardssss23456'];



  foreach ($arraycardssss23456 as $value) {




    $sql1sss23456 = "SELECT * FROM hotelsdatabaseinternetfacilities WHERE name='$value'";
    $result1sss23456 = $conn->query($sql1sss23456);

    if ($result1sss23456->num_rows > 0) {
    } else {



      $sqlbbsss23456 = "INSERT INTO hotelsdatabaseinternetfacilities (name) VALUES ('$value')";

      $resultbbsss23456 = $conn->query($sqlbbsss23456);


      if ($resultbbsss23456 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss23456 . "<br>" . $conn->error;
      }
    }
  }



























  //Parking

  $acceptedcardslistttt234567 = implode(", ", $_POST['cardssss234567']);


  $arraycardssss234567 = $_POST['cardssss234567'];



  foreach ($arraycardssss234567 as $value) {




    $sql1sss234567 = "SELECT * FROM hotelsdatabaseparkingfacilities WHERE name='$value'";
    $result1sss234567 = $conn->query($sql1sss234567);

    if ($result1sss234567->num_rows > 0) {
    } else {



      $sqlbbsss234567 = "INSERT INTO hotelsdatabaseparkingfacilities (name) VALUES ('$value')";

      $resultbbsss234567 = $conn->query($sqlbbsss234567);


      if ($resultbbsss234567 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss234567 . "<br>" . $conn->error;
      }
    }
  }















  //Unique



  $acceptedcardslistttt2345678 = implode(", ", $_POST['cardssss2345678']);


  $arraycardssss2345678 = $_POST['cardssss2345678'];



  foreach ($arraycardssss2345678 as $value) {




    $sql1sss2345678 = "SELECT * FROM hotelsdatabaseuniquefacilities WHERE name='$value'";
    $result1sss2345678 = $conn->query($sql1sss2345678);

    if ($result1sss2345678->num_rows > 0) {
    } else {



      $sqlbbsss2345678 = "INSERT INTO hotelsdatabaseuniquefacilities (name) VALUES ('$value')";

      $resultbbsss2345678 = $conn->query($sqlbbsss2345678);


      if ($resultbbsss2345678 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss2345678 . "<br>" . $conn->error;
      }
    }
  }







  //Safety





  $acceptedcardslistttt23456789 = implode(", ", $_POST['cardssss23456789']);


  $arraycardssss23456789 = $_POST['cardssss23456789'];



  foreach ($arraycardssss23456789 as $value) {




    $sql1sss23456789 = "SELECT * FROM hotelsdatabasesafetyfacilities WHERE name='$value'";
    $result1sss23456789 = $conn->query($sql1sss23456789);

    if ($result1sss23456789->num_rows > 0) {
    } else {



      $sqlbbsss23456789 = "INSERT INTO hotelsdatabasesafetyfacilities (name) VALUES ('$value')";

      $resultbbsss23456789 = $conn->query($sqlbbsss23456789);


      if ($resultbbsss23456789 === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbbsss23456789 . "<br>" . $conn->error;
      }
    }
  }











  /*

  $sqlo = "UPDATE hotelsdatabase SET agerestriction='$agerestriction',roomservicefrom='$roomservicefrom',roomserviceto='$roomserviceto',pets='$pets',parking='$parking',atm='$atm',chargednotcharged='$chargednotcharged',visualaidsfacilities='$acceptedcardscardsvisualaids',wellnessfacilities='$acceptedcardscardswellness',pillowmenufacilities='$acceptedcardscardspillowmenu',generalfacilities='$acceptedcardslist', mainfacilities='$acceptedcardslistt',frontdeskfacilities='$acceptedcardslisttt',familyfacilities='$acceptedcardslistttt',sportsfacilities='$acceptedcardslistttt2',cleaningfacilities='$acceptedcardslistttt23mama',foodfacilities='$acceptedcardslistttt234',businessfacilities='$acceptedcardslistttt2345',internetfacilities='$acceptedcardslistttt23456',parkingfacilities='$acceptedcardslistttt234567',uniquefacilities='$acceptedcardslistttt2345678',safetyfacilities='$acceptedcardslistttt23456789' WHERE name='$hotel' && country='$country' && city='$city'";


*/
  $sqlo = "UPDATE hotelsdatabase SET agerestriction='$agerestriction',roomservicefrom='$roomservicefrom',roomserviceto='$roomserviceto',pets='$pets',parking='$parking',atm='$atm',chargednotcharged='$chargednotcharged',visualaidsfacilities='$acceptedcardscardsvisualaids',wellnessfacilities='$acceptedcardscardswellness',pillowmenufacilities='$acceptedcardscardspillowmenu',generalfacilities='$acceptedcardslist', frontdeskfacilities='$acceptedcardslisttt',familyfacilities='$acceptedcardslistttt',sportsfacilities='$acceptedcardslistttt2',cleaningfacilities='$acceptedcardslistttt23mama',foodfacilities='$acceptedcardslistttt234',businessfacilities='$acceptedcardslistttt2345',internetfacilities='$acceptedcardslistttt23456',parkingfacilities='$acceptedcardslistttt234567',uniquefacilities='$acceptedcardslistttt2345678',safetyfacilities='$acceptedcardslistttt23456789' WHERE name='$hotel' && country='$country' && city='$city'";
  $resulto = $conn->query($sqlo);


  if ($resulto === TRUE) {

    $_SESSION['alertme'] = 1;
    echo "<script>location.replace('addinventoryNew.php');</script>";


    //echo "<script>location.replace('dashboard.php');</script>";

  } else {
    echo "Error: " . $sqlo . "<br>" . $conn->error;
  }


















  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");




  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Hotel Facilities')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}



?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('stylesheethead') ?>
<style>
  .bbTop {
    text-decoration: none;
    list-style: none;
    background-color: #eeeeee;
    padding: 5px 0px;
  }

  .bbTop li {
    display: inline;
  }

  .bb-item,
  .bb-active {
    color: red;
  }

  .card {
    background-color: #eeeeee;
    height: 100%;
  }

  .form-check-input:checked {
    background-color: #ce3435 !important;
    border-color: #ce3435 !important;
  }

  .btn-danger {
    background-color: #ce3435 !important;
  }

  .btn-danger:hover {
    transform: scale(1.1);
  }

  .card-title {
    margin-bottom: 0.5rem;
    background: #ce3435;
    padding: 10px 8px;
    color: white;
    border-radius: 5px;
  }

  .card-body {
    position: relative;
  }

  .addMoreButtom {
    padding: 0px 10px;
    float: right;
    position: absolute;
    bottom: 5px;
    right: 18px;
    background-color: black !important;
    border: 1px solid black !important;
  }

  /* .selectAllRow{
  float:right;

} */
  .selectAllRow {
    display: flex;
    justify-content: end;
  }

  .selectAllRow .form-check .form-check-label {
    font-weight: bold !important;
    color: black;
  }
</style>

<?php
endblock()
?>

<?php startblock('PageTitle') ?>
Manage Facilites
<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php'); ?>

<?php endblock(); ?>



<?php startblock('PageContent') ?>
<!-- <div class="bbTop d-flex align-items-center">
    <ul>
      <li class="bb-item"><a href="#">Home /</a></li>
      <li class="bb-item bb-active" aria-current="page">Data</li>
    </ul>
  </div> -->

<div class="row">
  <div class="col-md-12">
    <h2 class="text-dark">
      Manage Facilities
    </h2>
  </div>
</div>


<?php

$sqll = "SELECT * FROM hotelsdatabase WHERE name='$hotel' && country='$country' && city='$city'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while ($roww = $resultt->fetch_assoc()) {
?>
    <form method='POST' action='#'>

      <div class="row mt-2">
        <!--General-->
        <div class="col-md-4" id='cardslist'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id='all' name='all'>
                  <label class="form-check-label" for='all'><b>Select All</b></label>
                </div>
              </div>

              <?php
              $string = $roww['generalfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlv = "SELECT * FROM hotelsdatabasegeneralfacilities";
              $resultv = $conn->query($sqlv);
              if ($resultv->num_rows > 0) {
                // output data of each row
                while ($rowv = $resultv->fetch_assoc()) {
                  $nmcr = $rowv['name'];
                  if (strpos($string, $nmcr) !== false) {
              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cards[]' type="checkbox" value='<?php echo $rowv['name']; ?>' id="alertcard" checked>
                      <label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
                        <?php echo $rowv['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cards[]' type="checkbox" value='<?php echo $rowv['name']; ?>' id="alertcard">
                      <label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
                        <?php echo $rowv['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addnc'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pds' onclick='addcardnew()' value='+'>
            </div>
          </div>
        </div>
        <!--Facilities-->

        <!--
      <div class="col-md-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Facilities</h5>
            <div class="selectAllRow">
              <div class="form-check">
                <label class="form-check-label" for='alll'>Select All</label>
                <input class="form-check-input" type="checkbox" id='alll' name='alll'>
              </div>
            </div>
            <?php
            $string = $roww['mainfacilities'];
            $str_arr = preg_split("/\,/", $string);
            $sqlv = "SELECT * FROM hotelsdatabasemainfacilities";
            $resultv = $conn->query($sqlv);
            if ($resultv->num_rows > 0) {
              // output data of each row
              while ($rowv = $resultv->fetch_assoc()) {
                $nmcr = $rowv['name'];
                if (strpos($string, $nmcr) !== false) {
            ?>
                  <div class="form-check">
                    <input checked id="alertcardd" class="form-check-input" name='cardss[]' type="checkbox" value='<?php echo $rowv['name']; ?>' >
                    <label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
                      <?php echo $rowv['name']; ?>
                    </label>
                  </div>
                <?php
                } else {
                ?>
                  <div class="form-check">
                    <input id="alertcardd" class="form-check-input" name='cardss[]' type="checkbox" value='<?php echo $rowv['name']; ?>'>
                    <label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
                      <?php echo $rowv['name']; ?>
                    </label>
                  </div>

                <?php
                }

                ?>
            <?php
              }
            } ?>
            <nonsense id='addncc'></nonsense>
            <input class="btn btn-danger addMoreButtom col-sm-2" id='pdss' onclick='addcardneww()' value='+' >
          </div>
        </div>
      </div>
      -->


        <!--frontdesk-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Front Desk Services</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='allll'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='allll' name='allll'>
                </div>
              </div>
              <?php
              $string = $roww['frontdeskfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasefrontdeskfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input checked id="alertcarddd" class="form-check-input" name='cardsss[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcarddd" class="form-check-input" name='cardsss[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addnccc'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdsss' onclick='addcardnewww()' value='+'>
            </div>
          </div>
        </div>

        <!--Family Services-->
        <div class="col-md-4" id='cardslist'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Family Services</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='alllll' name='alllll'>
                </div>
              </div>
              <?php
              $string = $roww['familyfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasefamilyfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss' onclick='addcardnewwww()' value='+'>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-2">

        <!--Sports and Fitness-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sports and Fitness</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll2'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='alllll2' name='alllll2'>
                </div>
              </div>
              <?php
              $string = $roww['sportsfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasesportsfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input checked id="alertcardddd2" class="form-check-input" name='cardssss2s[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcardddd2" class="form-check-input" name='cardssss2s[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc2'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss2' onclick='addcardnewwww2()' value='+'>
            </div>
          </div>
        </div>
        <!--Cleaning Services-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cleaning Services</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll23'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='alllll23' name='alllll23'>
                </div>
              </div>
              <?php
              $string = $roww['cleaningfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasecleaningfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input checked id="alertcardddd23" class="form-check-input" name='cardssmama[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcardddd23" class="form-check-input" name='cardssmama[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addnccmama'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdsssmama' onclick='addcardnewwmama()' value='+'>
            </div>
          </div>
        </div>
        <!--Food Services-->
        <div class="col-md-4" id='cardslist'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Food & Drink</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll234'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='alllll234' name='alllll234'>
                </div>
              </div>
              <?php
              $string = $roww['foodfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasefoodfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss234[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd234" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss234[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd234">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc234'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss234' onclick='addcardnewwww234()' value='+'>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-2">

        <!--Business Facilities-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Business Facilities</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll2345'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='alllll2345' name='alllll2345'>
                </div>
              </div>
              <?php
              $string = $roww['businessfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasebusinessfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {
              ?>
                    <div class="form-check">
                      <input checked id="alertcardddd2345" class="form-check-input" name='cardssss2[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcardddd2345" class="form-check-input" name='cardssss2[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc2345'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss2345' onclick='addcardnewwww2345()' value='+'>
            </div>
          </div>
        </div>
        <!--Parking Services-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Parking</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll234567'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='alllll234567' name='alllll234567'>
                </div>
              </div>
              <?php
              $string = $roww['parkingfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabaseparkingfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input checked id="alertcardddd234567" class="form-check-input" name='cardssss234567[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcardddd234567" class="form-check-input" name='cardssss234567[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc234567'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss234567' onclick='addcardnewwww234567()' value='+'>
            </div>
          </div>
        </div>
        <!--Unique Features-->
        <div class="col-md-4" id='cardslist'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Unique Features</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll2345678'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='alllll2345678' name='alllll2345678'>
                </div>
              </div>
              <?php
              $string = $roww['uniquefacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabaseuniquefacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss2345678[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd2345678" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardssss2345678[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardddd2345678">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc2345678'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss2345678' onclick='addcardnewwww2345678()' value='+'>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-2">







        <!--Safety & Security Features-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Safety & Security Features</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='alllll23456789'>Select All</label>
                  <input class="form-check-input" type="checkbox" id='alllll23456789' name='alllll23456789'>
                </div>
              </div>
              <?php
              $string = $roww['safetyfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM hotelsdatabasesafetyfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input checked id="alertcardddd23456789" class="form-check-input" name='cardssss23456789[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input id="alertcardddd23456789" class="form-check-input" name='cardssss23456789[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccc23456789'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdssss23456789' onclick='addcardnewwww23456789()' value='+'>
            </div>
          </div>
        </div>






        <!--CARDS CARDS-->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Acceptable Cards</h5>
              <div class="selectAllRow">
                <div class="form-check">



                  <label for='allcardscards'>Select All</label>
                  <input class='form-check-input' id='allcardscards' type='checkbox'>


                </div>
              </div>
              <?php
              $string = $roww['acceptedcardslist'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM paymentcards";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">

                      <label for='<?php echo $rowvz['name']; ?>'><?php echo $rowv['name']; ?></label>
                      <input checked id="alertcardcards" name='cardscards[]' type='checkbox' class='form-check-input' value='<?php echo $rowvz['name']; ?>'>


                      <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <label for='<?php echo $rowvz['name']; ?>'><?php echo $rowv['name']; ?></label>
                      <input id="alertcardcards" name='cardscards[]' type='checkbox' class='form-check-input' value='<?php echo $rowvz['name']; ?>'>

                      <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='addncccccardscards'></nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdsssscardscards' onclick='addcardnewwwwcardscards()' value='+'>
            </div>
          </div>
        </div>



        <!--Wellness-->
        <div class="col-md-4" id='wellness'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Wellness & Holistic</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='allwellness'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='allwellness' name='allwellness'>
                </div>
              </div>
              <?php
              $string = $roww['wellnessfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM wellnessfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardswellness[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardwellness" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardswellness[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardwellness">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='adwellness'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdswellness' onclick='addcardnewwellness()' value='+'>
            </div>
          </div>
        </div>














        <script>
          document.getElementById("pdsssscardscards").addEventListener("click", function(event) {
            event.preventDefault()
          });

          function addcardnewwwwcardscards() {

            var parent = document.getElementById("addncccccardscards");

            var inpt = document.createElement('INPUT');
            inpt.setAttribute('name', 'cardscards[]');
            inpt.setAttribute('placeholder', 'New Card');
            inpt.classList.add('form-control');

            parent.appendChild(inpt);

          }
        </script>













        <!--Parking Services-->
        <!-- <div class="col-md-4">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">Parking</h5>
            <div class="form-check">
              <label class="form-check-label" for='alllll234567'>Select All</label>
              <input class="form-check-input" type="checkbox" id='alllll234567' name='alllll234567'>
            </div>
                  <?php
                  $string = $roww['parkingfacilities'];
                  $str_arr = preg_split("/\,/", $string);
                  $sqlvz = "SELECT * FROM hotelsdatabaseparkingfacilities";
                  $resultvz = $conn->query($sqlvz);
                  if ($resultvz->num_rows > 0) {
                    // output data of each row
                    while ($rowvz = $resultvz->fetch_assoc()) {
                      $nmcr = $rowvz['name'];
                      if (strpos($string, $nmcr) !== false) {

                  ?>
                  <div class="form-check">
                    <input checked id="alertcardddd234567" class="form-check-input" name='cardssss234567[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' >
                    <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                      <?php echo $rowvz['name']; ?>
                    </label>
                  </div>
                <?php
                      } else {
                ?>
                  <div class="form-check">
                    <input id="alertcardddd234567" class="form-check-input" name='cardssss234567[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' >
                    <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                      <?php echo $rowvz['name']; ?>
                    </label>
                  </div>

                <?php
                      }

                ?>
            <?php
                    }
                  } ?>
            <nonsense id='addncccc234567'></nonsense>
            <input class="btn btn-danger addMoreButtom col-sm-2" type='submit' id='pdssss234567' onclick='addcardnewwww234567()' value='+' >
          </div>
        </div>
      </div> -->
      </div>

















      <div class="row mt-2">



        <!--Visual Aid-->
        <div class="col-md-4" id='visualaid'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Visual Aids</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='allvisualaids'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='allvisualaids' name='allvisualaids'>
                </div>
              </div>
              <?php
              $string = $roww['visualaidsfacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM visualaidsfacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardsvisualaids[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardvisualaids" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardsvisualaids[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardvisualaids">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }

                  ?>
              <?php
                }
              } ?>
              <nonsense id='advisualaids'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdsvisualaids' onclick='addcardnewvisualaids()' value='+'>
            </div>
          </div>
        </div>











        <!--Pillow Menu-->
        <div class="col-md-4" id='pillowmenu'>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pillow Menu</h5>
              <div class="selectAllRow">
                <div class="form-check">
                  <label class="form-check-label" for='allpillowmenu'>Select All</label>
                  <!-- <input class="form-check-input" id='all' name='all' type='checkbox'> -->
                  <input class="form-check-input" type="checkbox" id='allpillowmenu' name='allpillowmenu'>
                </div>
              </div>
              <?php
              $string = $roww['pillowmenufacilities'];
              $str_arr = preg_split("/\,/", $string);
              $sqlvz = "SELECT * FROM pillowmenufacilities";
              $resultvz = $conn->query($sqlvz);
              if ($resultvz->num_rows > 0) {
                // output data of each row
                while ($rowvz = $resultvz->fetch_assoc()) {
                  $nmcr = $rowvz['name'];
                  if (strpos($string, $nmcr) !== false) {

              ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardspillowmenu[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardpillowmenu" checked>
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" name='cardspillowmenu[]' type="checkbox" value='<?php echo $rowvz['name']; ?>' id="alertcardpillowmenu">
                      <label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
                        <?php echo $rowvz['name']; ?>
                      </label>
                    </div>

                  <?php
                  }
                  ?>
              <?php
                }
              } ?>
              <nonsense id='adpillowmenu'>
              </nonsense>
              <input class="btn btn-danger addMoreButtom col-sm-2" id='pdspillowmenu' onclick='addcardnewpillowmenu()' value='+'>
            </div>
          </div>
        </div>













      </div>



      <script>
        document.getElementById("pdswellness").addEventListener("click", function(event) {
          event.preventDefault()
        });

        function addcardnewwellness() {

          var parent = document.getElementById("adwellness");

          var inpt = document.createElement('INPUT');
          inpt.setAttribute('name', 'cardswellness[]');

          inpt.classList.add('form-control');

          parent.appendChild(inpt);

        }
      </script>

      <script>
        document.getElementById("pdsvisualaids").addEventListener("click", function(event) {
          event.preventDefault()
        });

        function addcardnewvisualaids() {

          var parent = document.getElementById("advisualaids");

          var inpt = document.createElement('INPUT');
          inpt.setAttribute('name', 'cardsvisualaids[]');

          inpt.classList.add('form-control');

          parent.appendChild(inpt);

        }
      </script>





      <script>
        document.getElementById("pdspillowmenu").addEventListener("click", function(event) {
          event.preventDefault()
        });

        function addcardnewpillowmenu() {

          var parent = document.getElementById("adpillowmenu");

          var inpt = document.createElement('INPUT');
          inpt.setAttribute('name', 'cardspillowmenu[]');

          inpt.classList.add('form-control');

          parent.appendChild(inpt);

        }
      </script>




















































      <br />
      <br />



      <div id='popmeplease2' class="form-group">

      </div>

      <div id='popmeplease3' class="form-group">

      </div>



      <div class='card'>
        <div class='card-body'>



          <div class="row">
            <div class="col-md-6">
              <label>Pets</label>
              <select class="form-control" id='pets' name='pets'>
                <?php if ($roww['pets'] == 'Allowed') {
                ?>

                  <option selected>Allowed</option>
                  <option>Not Allowed</option>



                <?php
                } else { ?>

                  <option selected>Not Allowed</option>
                  <option>Allowed</option>
                <?php


                } ?>





              </select>
            </div>
            <div class="col-md-6">
              <label>ATM Distance</label>
              <input type="text" class="form-control" value='<?php echo $roww['atm']; ?>' name='atm'>
            </div>


          </div>

          <div class="row">
            <div class="col-md-4">
              <label>Minimum Age Restriction to Check In</label>
              <input type="number" class="form-control" value='<?php echo $roww['agerestriction']; ?>' name='agerestriction' placeholder="Age Restriction">
            </div>


            <div class="col-md-4">
              <label>Room Service From</label>
              <input type="time" class="form-control" value='<?php echo $roww['roomservicefrom']; ?>' name='roomservicefrom'>
            </div>

            <div class="col-md-4">
              <label>Room Service To</label>
              <input type="time" class="form-control" value='<?php echo $roww['roomserviceto']; ?>' name='roomserviceto'>
            </div>
          </div>








          <div class="row">



            <div class="col-md-6">
              <label>Parking</label>
              <select class="form-control" id='parking' name='parking'>
                <?php if ($roww['parking'] == 'Yes') {
                ?>

                  <option selected>Yes</option>
                  <option>No</option>



                <?php
                } else { ?>

                  <option selected>No</option>
                  <option>Yes</option>
                <?php


                } ?>

              </select>
            </div>

            <input style='display:none;' id='getpark' value='<?php echo $roww['chargednotcharged']; ?>'>
            <div class="col-md-6" id='popmeplease4'>
              <?php if ($roww['parking'] == 'Yes') {
              ?>
                <div id='spare' class="col-sm">
                  <label>Charged / Free</label>
                  <select class="form-control" id='chargednotcharged' name='chargednotcharged' onchange="GetParkingPrices()">
                    <?php if ($roww['chargednotcharged'] == 'Charged') {
                    ?>
                      <option value="Free">Free</option>
                      <option selected value="Charged">Charged</option>
                     



                    <?php
                    } else { ?>
                      <option selected>Free</option>
                      <option>Charged</option>
                    <?php


                    } ?>
                  </select>
                </div>

              <?php

              }
              ?>
            </div>
          </div>

          <div id="ratesDiv" style="display: none;">
             
          </div>



        </div>
      </div>













      <script>
        $("#allwellness").click(function(event) {

          var checkedStatus = this.checked;

          var elms = document.querySelectorAll("[id='alertcardwellness']");

          if (checkedStatus == false) {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = false;
            }

          } else {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = true;
            }

          }
        });
      </script>



      <script>
        $("#allvisualaids").click(function(event) {

          var checkedStatus = this.checked;

          var elms = document.querySelectorAll("[id='alertcardvisualaids']");

          if (checkedStatus == false) {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = false;
            }

          } else {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = true;
            }

          }
        });
      </script>








      <script>
        $("#allpillowmenu").click(function(event) {

          var checkedStatus = this.checked;

          var elms = document.querySelectorAll("[id='alertcardpillowmenu']");

          if (checkedStatus == false) {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = false;
            }

          } else {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = true;
            }

          }
        });
      </script>






      <script>
        $("#allcardscards").click(function(event) {

          var checkedStatus = this.checked;

          var elms = document.querySelectorAll("[id='alertcardcards']");

          if (checkedStatus == false) {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = false;
            }

          } else {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = true;
            }

          }
        });
      </script>











      <script>
        $("#all").click(function(event) {

          var checkedStatus = this.checked;

          var elms = document.querySelectorAll("[id='alertcard']");

          if (checkedStatus == false) {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = false;
            }

          } else {
            for (var i = 0; i < elms.length; i++) {
              elms[i].checked = true;
            }

          }
        });
      </script>

      <script>
        $("#parking").change(function(event) {

          var park = document.getElementById("parking").value;

          var delme = document.getElementById("spare");

          //delme.innerHTML = '';
          //alert();
          var getpark = document.getElementById("getpark").value;

          var popa = document.getElementById("popmeplease4");


          if (park == 'Yes') {

            popa.style.display = 'block';


            const label2 = document.createElement("label");
            label2.innerHTML = 'Charged / Free';
            popa.appendChild(label2);

            const sel = document.createElement("SELECT");
            sel.setAttribute('name', 'chargednotcharged');
            sel.setAttribute('id','chargednotcharged');
            sel.setAttribute('class', 'form-control');
            sel.setAttribute('onchange', 'GetParkingPrices()');


            const op1 = document.createElement("option");
            const op2 = document.createElement("option");

            op1.setAttribute('label', 'Charged');
            op1.setAttribute('value', 'Charged');
            op1.setAttribute('text', 'Charged');

            op2.setAttribute('label', 'Free');
            op2.setAttribute('value', 'Free');
            op2.setAttribute('text', 'Free');

            if (getpark == 'Charged') {
              sel.appendChild(op1);
              sel.appendChild(op2);
            } else {
              sel.appendChild(op2);
              sel.appendChild(op1);
            }
            popa.appendChild(sel);




          } else {
            // popa.style.display = 'none';
            popa.innerHTML = '';
          }





        });

        function GetParkingPrices(){
          var parkValue = $('#chargednotcharged').val();
          var ElementFromHtml = `<div class="row mt-2">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Price Type" name="ParkingPriceName[]">
                </div>
                <div class="col-md-5">
                  <input type="text" class="form-control" placeholder="Price" name="ParkingPrice[]">
                </div>
                <div class="col-md-1">
                  <span class="btn btn-danger" onclick="AddMorePricesFields()"> + </span>
                </div>
              </div>`;
          $('#ratesDiv').slideDown();
          if(parkValue === 'Charged'){
              $('#ratesDiv').append(ElementFromHtml);
          }
        }

        function AddMorePricesFields(){
          var ElementFromHtml = `<div class="row mt-2">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Price Type" name="ParkingPriceName[]">
                </div>
                <div class="col-md-5">
                  <input type="text" class="form-control" placeholder="Price" name="ParkingPrice[]">
                </div>
                <div class="col-md-1">
                  <span class="btn btn-danger" onclick="this.parentNode.parentNode.remove(this.parentNode);"> X </span>
                </div>
              </div>`;

              $('#ratesDiv').append(ElementFromHtml);
        }
        
      </script>



      <br />



      <button type='submit' name='submit' class='btn btn-danger' style='float:right;'>Submit</button>
      <br /> <br />
    </form>



    <div>






      <!--Internet Services-->


      <!-- <div class="form-group">


                        <h2 align='center'>Internet</h2>

                      </div>
                      <div>



                        <div class="container">
                          <div class='row'>

                            <div class="col-sm">

                              <div class="form-group">

                                <label for='alllll23456'>Select All</label>
                                <input id='alllll23456' name='alllll23456' type='checkbox'><br />




                                <?php
                                $string = $roww['internetfacilities'];
                                $str_arr = preg_split("/\,/", $string);


                                $sqlvz = "SELECT * FROM hotelsdatabaseinternetfacilities";
                                $resultvz = $conn->query($sqlvz);

                                if ($resultvz->num_rows > 0) {
                                  // output data of each row
                                  while ($rowvz = $resultvz->fetch_assoc()) {

                                    $nmcr = $rowvz['name'];



                                    if (strpos($string, $nmcr) !== false) {

                                ?>

                                      <label for='<?php echo $rowvz['name']; ?>'><?php echo $rowvz['name']; ?></label>
                                      <input checked id="alertcardddd23456" name='cardssss23456[]' type='checkbox' class='' value='<?php echo $rowvz['name']; ?>'>

                                      &nbsp;&nbsp; &nbsp;&nbsp;




                                    <?php
                                    } else {
                                    ?>


                                      <label for='<?php echo $rowvz['name']; ?>'><?php echo $rowvz['name']; ?></label>
                                      <input id="alertcardddd23456" name='cardssss23456[]' type='checkbox' class='' value='<?php echo $rowvz['name']; ?>'>

                                      &nbsp;&nbsp; &nbsp;&nbsp;





                                    <?php
                                    }

                                    ?>





                                <?php



                                  }
                                } ?>








                                <nonsense id='addncccc23456'>

                                </nonsense>


                                <input type='submit' id='pdssss23456' onclick='addcardnewwww23456()' value='+'>

                              </div>

                            </div>
                          </div>
                        </div> -->














  <?php

  }
}
  ?>
  <?php endblock() ?>

  <?php startblock('FooterText') ?>
  Desgin and Developed by Squalltec
  <?php endblock() ?>

  <?php startblock('scriptBottom') ?>

  <script>
    document.getElementById("pds").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew() {
      var parent = document.getElementById("addnc");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>

  <script>
    document.getElementById("pdss").addEventListener("click", function(event) {
      event.preventDefault()
    });


    function addcardnewwmama() {
      var parent = document.getElementById("addnccmama");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssmama[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }

    function addcardneww() {
      var parent = document.getElementById("addncc");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardss[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alll").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardd']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>





















  <script>
    document.getElementById("pdsss").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewww() {
      var parent = document.getElementById("addnccc");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardsss[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#allll").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcarddd']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>




  <!--Family -->






  <script>
    document.getElementById("pdssss").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww() {
      var parent = document.getElementById("addncccc");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>















  <!--Sports -->






  <script>
    document.getElementById("pdssss2").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww2() {
      var parent = document.getElementById("addncccc2");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss2[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll2").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd2']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>














  <!--Cleaning -->






  <script>
    document.getElementById("pdssss23").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww23() {
      var parent = document.getElementById("addncccc23");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss23[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll23").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd23']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>
















  <!--Food -->






  <script>
    document.getElementById("pdssss234").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww234() {
      var parent = document.getElementById("addncccc234");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss234[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll234").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd234']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>











  <!--Business Facilities -->






  <script>
    document.getElementById("pdssss2345").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww2345() {
      var parent = document.getElementById("addncccc2345");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss2345[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll2345").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd2345']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>










  <!--Internet Facilities -->






  <script>
    document.getElementById("pdssss23456").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww23456() {
      var parent = document.getElementById("addncccc23456");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss23456[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll23456").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd23456']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>









  <!--Parking Facilities -->






  <script>
    document.getElementById("pdssss234567").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww234567() {
      var parent = document.getElementById("addncccc234567");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss234567[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll234567").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd234567']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>















  <!--Unique Facilities -->






  <script>
    document.getElementById("pdssss2345678").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww2345678() {
      var parent = document.getElementById("addncccc2345678");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss2345678[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll2345678").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd2345678']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>










  <!--Safety Facilities -->






  <script>
    document.getElementById("pdssss23456789").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnewwww23456789() {
      var parent = document.getElementById("addncccc23456789");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cardssss23456789[]');
      inpt.setAttribute('class', 'form-control mt-1 mb-1');


      parent.appendChild(inpt);

    }
  </script>



  <script>
    $("#alllll23456789").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcardddd23456789']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>















  <script>
    $("#all").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>
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


  <?php endblock() ?>