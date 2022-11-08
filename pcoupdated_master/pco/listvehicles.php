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


include "../simple_html_dom.php";


$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];






$sqlm = "SELECT * FROM rentacardatabase WHERE name='$hotel' && country='$country' && city='$city'";

$resultm = $conn->query($sqlm);

if ($resultm->num_rows > 0) {
  // output data of each row
  while ($rowm = $resultm->fetch_assoc()) {
    $gpos = $rowm['gps'];
  }
}


//echo $gpos;





if (isset($_POST['submit'])) {





  $hotel = $_SESSION['hotel'];

  $country = $_SESSION['country'];

  $city = $_SESSION['city'];

  /*   
    $delsql="DELETE from newrentacarprices WHERE name='$hotel' && country='$country' && city='$city'";
    if ($conn->query($delsql) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
  */

  $areasactual = $_POST['areasactual'];
  $brands = $_POST['brands'];
  $years = $_POST['years'];
  $models = $_POST['models'];
  $price = $_POST['pricess'];

  $priceweekly = $_POST['pricessweekly'];
  $pricemonthly = $_POST['pricessmonthly'];


  $fuel = $_POST['fuel'];
  $chaffeur = $_POST['chaffeur'];
  $insurance = $_POST['insurance'];
  $salik = $_POST['salik'];
  $vat = $_POST['vat'];
  $waitingtime = $_POST['waitingtime'];

  $idz = $_POST['idz'];


  $n = 0;
  foreach ($areasactual as $area) {
    $a = 0;
    foreach ($brands as $brand) {






      $sqlz2z = "SELECT * FROM newrentacarprices WHERE name='$hotel'&& country='$country'&& city='$city' && model='$models[$a]' && brand='$brand' && year='$years[$a]'";

      $resultz2z = $conn->query($sqlz2z);

      if ($resultz2z->num_rows > 0) {

        while ($row2za = $resultz2z->fetch_assoc()) {


          $pp = $row2za['price'];
          $ppw = $row2za['priceweekly'];
          $ppm = $row2za['pricemonthly'];

          if ($pp == $price[$n] && $ppw == $priceweekly[$n] && $ppm == $pricemonthly[$n]) {
            $sql = "UPDATE newrentacarprices SET price='$price[$n]',priceweekly='$priceweekly[$n]',pricemonthly='$pricemonthly[$n]' WHERE id='$idz[$n]'";

            $result = $conn->query($sql);


            if ($result === TRUE) {
              // echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else {
            $sql = "UPDATE newrentacarprices SET price='$price[$n]' ,priceweekly='$priceweekly[$n]' ,pricemonthly='$pricemonthly[$n]' ,approved='' WHERE id='$idz[$n]'";

            $result = $conn->query($sql);


            if ($result === TRUE) {
              // echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        }
      } else {


        $sqla = "INSERT INTO newrentacarprices (name,country,city,area,model,brand,price,priceweekly,pricemonthly,fuel,chaffeur,insurance,salik,vat,waitingtime,year)
           VALUES ('$hotel','$country','$city','$area','$models[$a]','$brand','$price[$n]','$priceweekly[$n]','$pricemonthly[$n]','$fuel','$chaffeur','$insurance','$salik','$vat','$waitingtime','$years[$a]')";

        $resulta = $conn->query($sqla);


        if ($resulta === TRUE) {
        }
      }







      /* $sqla = "INSERT INTO newrentacarprices (name,country,city,area,model,brand,price,priceweekly,pricemonthly,fuel,chaffeur,insurance,salik,vat,waitingtime,year)
           VALUES ('$hotel','$country','$city','$area','$models[$a]','$brand','$price[$n]','$priceweekly[$n]','$pricemonthly[$n]','$fuel','$chaffeur','$insurance','$salik','$vat','$waitingtime','$years[$a]')";
		  
 $resulta = $conn->query($sqla);


if ($resulta === TRUE) {

}
       
      */



      $a = $a + 1;
      $n = $n + 1;
    }
  }




  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");






  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Rentacar Prices')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}






?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || List Vehicle
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="ps-3">
    <h2 class="text-dark"><?php echo $hotel; ?></h2>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href='discountlist.php'>
        <h1 align='center'><label class='btn btn-danger'>Add Discounts Individually</label></h1>
      </a>

      <a href='adddisttoall.php'>
        <h1 align='center'><label class='btn btn-danger'>Add Discounts to Multiple Cars</label></h1>
      </a>

      <a href='deliverycharges.php'>
        <h1 align='center'><label class='btn btn-danger'>Manage/Add Delivery Charges</label></h1>
      </a>
      
    </div>
  </div>
</div>

<hr />
<form action='#' method='POST'>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <h4>Trade Rate</h4>
            </tr>

            <tr>
              <th>
                <?php

                $sql1 = "SELECT * FROM rentacarlogos WHERE hotel='$hotel' && country='$country' && city='$city'";

                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                  // output data of each row
                  while ($row1 = $result1->fetch_assoc()) {
                ?>

                    <img src='../Rentacar Logos/<?php echo $hotel; ?>/<?php echo $row1['image']; ?>' style='width:50px; height:auto;'>

                <?php
                  }
                }
                ?>


              </th>

              <?php

              $bds = array();
              $mds = array();

              $acount = 0;
              $sql = "SELECT * FROM rentacarInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY model";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $acount = $acount + 1;
                  array_push($bds, $row['brand']);
                  array_push($mds, $row['model']);
              ?>

                  <th><?php echo $row['brand'] . ' ' . $row['model'] . ' (' . $row['year'] . ') ' . '(AED)'; ?></th>
                  <input style='display:none;' name='years[]' value='<?php echo $row['year']; ?>'>
                  <input style='display:none;' name='brands[]' value='<?php echo $row['brand']; ?>'>
                  <input style='display:none;' name='models[]' value='<?php echo $row['model']; ?>'>
              <?php



                }
              }


              ?>


            </tr>


          </thead>

          <tbody>

            <?php









            $an = 0;

            ?>
            <input style='display:none;' name='areasactual[]' value='<?php echo $ar; ?>'>

            <tr>
              <td> <b>DAILY RATES</b> </td>

              <?php
              for ($i = 0; $i < $acount; $i++) {
              ?>


                <td>
                  <?php

                  $sqlz2c = "SELECT * FROM newrentacarprices WHERE name='$hotel' && country='$country' && city='$city' && model='$mds[$i]' && brand='$bds[$i]'";

                  $resultz2c = $conn->query($sqlz2c);

                  if ($resultz2c->num_rows > 0) {

                    // output data of each row
                    while ($rowz2c = $resultz2c->fetch_assoc()) {

                      if ($rowz2c['price'] != '') {
                  ?>



                        <input type='number' name='pricess[]' data-max='<?php echo $rowz2c['price']; ?>' onchange='checkmax(this)' value='<?php echo $rowz2c['price']; ?>' class='form-control'>
                      <?php
                      } else {
                      ?>
                        <input type='number' name='pricess[]' class='form-control'>
                    <?php
                      }
                    }
                  } else {
                    ?>
                    <input type='number' name='pricess[]' class='form-control'>
                  <?php
                  }
                  ?>






                </td>
              <?php
                $an = $an + 1;
              }
              ?>


            </tr>


            <!--WEEKLY-->





            <tr>
              <td><b> WEEKLY RATES </b></td>

              <?php
              for ($i = 0; $i < $acount; $i++) {
              ?>


                <td>
                  <?php

                  $sqlz2c = "SELECT * FROM newrentacarprices WHERE name='$hotel' && country='$country' && city='$city' && model='$mds[$i]' && brand='$bds[$i]'";

                  $resultz2c = $conn->query($sqlz2c);

                  if ($resultz2c->num_rows > 0) {

                    // output data of each row
                    while ($rowz2c = $resultz2c->fetch_assoc()) {

                      if ($rowz2c['priceweekly'] != '') {
                  ?>

                        <input type='number' name='pricessweekly[]' data-max='<?php echo $rowz2c['priceweekly']; ?>' onchange='checkmax(this)' value='<?php echo $rowz2c['priceweekly']; ?>' class='form-control'>
                      <?php
                      } else {
                      ?>
                        <input type='number' name='pricessweekly[]' class='form-control'>
                    <?php
                      }
                    }
                  } else {
                    ?>
                    <input type='number' name='pricessweekly[]' class='form-control'>
                  <?php
                  }
                  ?>






                </td>
              <?php
                $an = $an + 1;
              }
              ?>


            </tr>






            <!--MONTHLY-->





            <tr>
              <td> <b>MONTHLY RATES</b> </td>

              <?php
              for ($i = 0; $i < $acount; $i++) {
              ?>


                <td>
                  <?php

                  $sqlz2c = "SELECT * FROM newrentacarprices WHERE name='$hotel' && country='$country' && city='$city' && model='$mds[$i]' && brand='$bds[$i]'";

                  $resultz2c = $conn->query($sqlz2c);

                  if ($resultz2c->num_rows > 0) {

                    // output data of each row
                    while ($rowz2c = $resultz2c->fetch_assoc()) {

                      if ($rowz2c['pricemonthly'] != '') {

                  ?>
                        <input name='idz[]' style='display:none;' value='<?php echo $rowz2c['id']; ?>'>
                        <input type='number' name='pricessmonthly[]' data-max='<?php echo $rowz2c['pricemonthly']; ?>' onchange='checkmax(this)' value='<?php echo $rowz2c['pricemonthly']; ?>' class='form-control'>
                      <?php
                      } else {
                      ?>
                        <input type='number' name='pricessmonthly[]' class='form-control'>
                    <?php
                      }
                    }
                  } else {
                    ?>
                    <input type='number' name='pricessmonthly[]' class='form-control'>
                  <?php
                  }
                  ?>






                </td>
              <?php
                $an = $an + 1;
              }
              ?>


            </tr>















          </tbody>
          <tfoot>

          </tfoot>
        </table>


      </div>
    </div>
  </div>











  </div>

  <br /><br />

  <input style='float:right;' name='submit' type='submit' class='btn btn-danger'>

  <br /><br />
  <a href='discountlist.php'>
    <h1 align='center'><label class='btn btn-danger'>Add Discounts Individually</label></h1>
  </a>

  <a href='adddisttoall.php'>
    <h1 align='center'><label class='btn btn-danger'>Add Discounts to Multiple Cars</label></h1>
  </a>

  <a href='deliverycharges.php'>
    <h1 align='center'><label class='btn btn-danger'>Manage/Add Delivery Charges</label></h1>
  </a>

  <br /><br /><br /><br />


</form>
<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
  function checkmax($this) {
    var changed = $this.value;
    var max = $this.getAttribute('data-max');
    if (changed > max) {
      alert('Increasing Price Not Allowed');

      $this.value = max;

    }
  }
</script>


<?php endblock(); ?>