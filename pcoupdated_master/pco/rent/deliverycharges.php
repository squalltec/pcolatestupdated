

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

  $hotel = $_SESSION['hotel'];

  $country = $_SESSION['country'];

  $city = $_SESSION['city'];

  /*    
    $delsql="DELETE from newvehicleprices WHERE name='$hotel' && country='$country' && city='$city'";
    if ($conn->query($delsql) === TRUE) {
 // echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
  */



  $areasactual = $_POST['areasactual'];
  $brands = $_POST['brands'];
  $models = $_POST['models'];
  $price = $_POST['pricess'];


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



      $sqlz2z = "SELECT * FROM newrentacardelivery WHERE name='$hotel'&& country='$country'&& city='$city'&& area='$area'&& model='$models[$a]' && brand='$brand'";

      $resultz2z = $conn->query($sqlz2z);

      if ($resultz2z->num_rows > 0) {

        while ($row2za = $resultz2z->fetch_assoc()) {

          $pp = $row2za['price'];

          if ($pp == $price[$n]) {
            $sql = "UPDATE newrentacardelivery SET price='$price[$n]' WHERE id='$idz[$n]'";

            $result = $conn->query($sql);


            if ($result === TRUE) {
              // echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          } else {
            $sql = "UPDATE newrentacardelivery SET price='$price[$n]' ,approved='' WHERE id='$idz[$n]'";

            $result = $conn->query($sql);


            if ($result === TRUE) {
              // echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        }
      } else {


        $sqla = "INSERT INTO newrentacardelivery (name,country,city,area,model,brand,price,fuel,chaffeur,insurance,salik,vat,waitingtime)
           VALUES ('$hotel','$country','$city','$area','$models[$a]','$brand','$price[$n]','$fuel','$chaffeur','$insurance','$salik','$vat','$waitingtime')";

        $resulta = $conn->query($sqla);


        if ($resulta === TRUE) {
        }
      }









      $a = $a + 1;
      $n = $n + 1;
    }
  }



  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");






  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Rentacar Delivery Charges')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}






?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Delivery Charges
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<h6 class="mb-0 text-uppercase"><?php echo $hotel; ?></h6>
    <hr />
    <form action='#' method='POST'>

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">



            <table id="example2" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <h4>Delivery Charges</h4>
                  <input placeholder='Apply to All' id='applyingall' class='form-control' type='number'>
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
                  <th>Delivery From <?php echo $city; ?> To</th>
                  <?php

                  $bds = array();
                  $mds = array();
                  $yrsa = array();

                  $acount = 0;
                  $sql = "SELECT * FROM rentacarInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";

                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $acount = $acount + 1;
                      array_push($bds, $row['brand']);
                      array_push($mds, $row['model']);
                      array_push($yrsa, $row['year']);

                  ?>

                      <th><?php echo $row['brand'] . ' ' . $row['model'] . ' (' . $row['year'] . ') ' . '(AED)'; ?></th>

                      <input style='display:none;' name='brands[]' value='<?php echo $row['brand']; ?>'>
                      <input style='display:none;' name='models[]' value='<?php echo $row['model']; ?>'>
                      <input style='display:none;' name='yrsa[]' value='<?php echo $row['year']; ?>'>
                  <?php



                    }
                  }


                  ?>


                </tr>


              </thead>

              <tbody>





                <?php


                $sqlz = "SELECT * FROM destination WHERE country='$country' && city='$city'";

                $resultz = $conn->query($sqlz);

                if ($resultz->num_rows > 0) {
                  // output data of each row
                  while ($rowz = $resultz->fetch_assoc()) {


                    $areasall = $rowz['areas'];
                  }
                }

                $areasactual2 = array();
                $areasactual = explode(',', $areasall);


                $sqlz2z = "SELECT * FROM countries WHERE country='$country'";

                $resultz2z = $conn->query($sqlz2z);

                if ($resultz2z->num_rows > 0) {
                  // output data of each row
                  while ($rowz2z = $resultz2z->fetch_assoc()) {

                    $iso2 = $rowz2z['iso2'];
                  }
                }



                $sqlz2 = "SELECT * FROM cities WHERE country_code='$iso2'";

                $resultz2 = $conn->query($sqlz2);

                if ($resultz2->num_rows > 0) {
                  // output data of each row
                  while ($rowz2 = $resultz2->fetch_assoc()) {
                    $nnam = $rowz2['name'];
                    if ($nnam != $city) {
                      array_push($areasactual, $rowz2['name']);
                    }
                  }
                }




                ?>









                <?php









                $an = 0;
                foreach ($areasactual as $ar) {
                ?>
                  <input style='display:none;' name='areasactual[]' value='<?php echo $ar; ?>'>

                  <tr>
                    <td></td>
                    <td><?php echo $ar; ?></td>

                    <?php
                    for ($i = 0; $i < $acount; $i++) {
                    ?>
                      <td>
                        <?php

                        $sqlz2c = "SELECT * FROM newrentacardelivery WHERE name='$hotel' && country='$country' && city='$city' && area='$ar' && model='$mds[$i]' && brand='$bds[$i]'";

                        $resultz2c = $conn->query($sqlz2c);

                        if ($resultz2c->num_rows > 0) {

                          // output data of each row
                          while ($rowz2c = $resultz2c->fetch_assoc()) {

                        ?>

                            <input name='idz[]' style='display:none;' value='<?php echo $rowz2c['id']; ?>'>
                            <input type='number' name='pricess[]' data-max='<?php echo $rowz2c['price']; ?>' onchange='checkmax(this)' value='<?php echo $rowz2c['price']; ?>' class='fc form-control'>
                          <?php
                          }
                        } else {
                          ?>
                          <input type='number' name='pricess[]' class='fc form-control'>
                        <?php
                        }
                        ?>






                      </td>
                    <?php
                      $an = $an + 1;
                    }
                    ?>


                  </tr>




                <?php

                }
                ?>
























              </tbody>
              <tfoot>

              </tfoot>
            </table>


          </div>
        </div>
      </div>










      </div>

      </div>
      </div>

      <br /><br />

      <input style='float:right;' name='submit' type='submit' class='btn btn-danger'>

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
        alert('Increasing Price is Not Allowed');

        $this.value = max;

      }
    }
  </script>
<script>
  $("#applyingall").on('keyup', function() {


    var ap = document.getElementById('applyingall').value;
    const collection = document.getElementsByClassName("fc");
    for (let i = 0; i < collection.length; i++) {
      collection[i].value = ap;
    }
  });
</script>

<?php endblock();?>	
