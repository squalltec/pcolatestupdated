
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
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$hotel = $_SESSION['hotel'];
if (isset($_POST['submit'])) {
  $acceptedcardslist = implode(", ", $_POST['cards']);
  $arraycards = $_POST['cards'];
  foreach ($arraycards as $value) {
    $sql1 = "SELECT * FROM paymentcards WHERE name='$value'";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
    } else {
      $sqlbb = "INSERT INTO paymentcards (name) VALUES ('$value')";
      $resultbb = $conn->query($sqlbb);
      if ($resultbb === TRUE) {
        //echo "Category created successfully";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $gps = mysqli_real_escape_string($conn, $_POST['gps']);
  mkdir("../Rentacar Logos/" . $hotel, 0755, true);
  $filename = $_FILES['logo']['name'];
  $destination = '../Rentacar Logos/' . $hotel . '/' . $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $file = $_FILES['logo']['tmp_name'];
  // move the uploaded (temporary) file to the specified destination
  if (move_uploaded_file($file, $destination)) {
    $sql = "UPDATE rentacarlogos SET image='$filename' WHERE hotel='$hotel' && country='$country' && city='$city'";
    $result = $conn->query($sql);
    if ($result === TRUE) {
      // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  mkdir("../Rentacar Lisences/" . $hotel, 0755, true);
  $filename = $_FILES['lisence']['name'];
  $destination = '../Rentacar Lisences/' . $hotel . '/' . $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $file = $_FILES['lisence']['tmp_name'];
  // move the uploaded (temporary) file to the specified destination
  if (move_uploaded_file($file, $destination)) {
    $sql = "UPDATE rentacarlisences SET lisence='$filename' WHERE hotel='$hotel' && country='$country' && city='$city'";
    $result = $conn->query($sql);
    if ($result === TRUE) {
      // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $sql = "UPDATE rentacardatabase SET name='$hotel',country='$country',city='$city',gps='$gps',telephone='$telephone',description='$description',acceptedcardslist='$acceptedcardslist' WHERE name='$hotel' && country='$country' && city='$city'";

  $result = $conn->query($sql);


  if ($result === TRUE) {
    $_SESSION['alertme'] = 1;




    $ipcountry = $xml->geoplugin_countryName;

    $ipad = getRealIpAddr();
    $ndate = date('d/m/Y');
    $ntime = date("h:i:sa");






    $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Rentacar General Info')";

    $resultvz = $conn->query($sqlvz);


    if ($resultvz === TRUE) {
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Manage Vehicles
<?php endblock() ?>
<?php startblock('stylesheethead') ?>

<style>
  .primaryButtonCustom{
    background-color: #ce3435 !important;
    color: white;
  }
  .primaryButtonCustom:hover{
    background-color: white !important;
    color:#ce3435;
  }
  .form-control::file-selector-button{
    color: #fff !important;
    background-color: #ce3435 !important;  
  }

</style>
<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
  <div class="ps-3">
    <h2 class="text-dark">Manage General Information</h2>
  </div>
</div>

  <?php

  $sqll = "SELECT * FROM rentacardatabase WHERE name='$hotel' && country='$country' && city='$city'";
  $resultt = $conn->query($sqll);

  if ($resultt->num_rows > 0) {
    // output data of each row
    while ($roww = $resultt->fetch_assoc()) {



  ?>




      <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
                  </div>
                  <div class="col-md-4">
                    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
                  </div>
                  <div class="col-md-4">
                  <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Company Name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mt-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="demo" readonly="" required="" name="gps"   placeholder="GPS" value="">
                        <button class="btn btn-outline-secondary primaryButtonCustom" type="button" id="mez" onclick="getLocation()"><i class="bi bi-geo"></i></button>
                    </div>
                    </div>
                  <div class="col-md-4 mt-2">
                      <input type="number" class="form-control" value='<?php echo $roww['telephone']; ?>' name='telephone' placeholder="00971-xxxxxxxx">
                  </div>
                  <div class="col-md-4 mt-2"></div>
                </div>
                <div class="row">
                  <div class="col-md-12 mt-2">
                  <textarea class="form-control" required name="description" rows="3" placeholder="Description"><?php echo $roww['description']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>

        <div>

          

          


          <label>Cards</label><br />
          <label for='all'>Select All</label>
          <input id='all' name='all' type='checkbox'><br />




          <?php
          $string = $roww['acceptedcardslist'];
          $str_arr = preg_split("/\,/", $string);


          $sqlv = "SELECT * FROM paymentcards";
          $resultv = $conn->query($sqlv);

          if ($resultv->num_rows > 0) {
            // output data of each row
            while ($rowv = $resultv->fetch_assoc()) {

              $nmcr = $rowv['name'];



              if (strpos($string, $nmcr) !== false) {

          ?>
                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                <input checked id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                &nbsp;&nbsp; &nbsp;&nbsp;


              <?php
              } else {
              ?>
                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                &nbsp;&nbsp; &nbsp;&nbsp;


              <?php
              }

              ?>





          <?php



            }
          }
          ?>

          <nonsense id='addnc'>

          </nonsense>


          <input type='submit' id='pds' onclick='addcardnew()' value='Add More Cards'>










          <script>
            document.getElementById("pds").addEventListener("click", function(event) {
              event.preventDefault()
            });

            function addcardnew() {
              var parent = document.getElementById("addnc");

              var inpt = document.createElement('INPUT');
              inpt.setAttribute('name', 'cards[]');


              parent.appendChild(inpt);

            }
          </script>












          <div class="form-group">
            <label for="exampleFormControlTextarea1">Logo</label><br />

            <?php
            $sqloz = "SELECT * FROM rentacarlogos WHERE hotel='$hotel' && country='$country' && city='$city'";
            $resultoz = $conn->query($sqloz);

            if ($resultoz->num_rows > 0) {
              // output data of each row
              while ($rowoz = $resultoz->fetch_assoc()) {

            ?>
                <img style='width:100px;' src='../Rentacar Logos/<?php echo $hotel; ?>/<?php echo $rowoz['image']; ?>'>


            <?php
              }
            }
            ?>
          </div>



          <div class="form-group">
            <label>Change Logo</label>
            <input class='form-control' accept="image/png" name="logo" type="file" />
          </div>












          <div class="form-group">
            <label for="exampleFormControlTextarea1">Lisence</label><br />

            <?php
            $sqlozx = "SELECT * FROM rentacarlisences WHERE hotel='$hotel' && country='$country' && city='$city'";
            $resultozx = $conn->query($sqlozx);

            if ($resultozx->num_rows > 0) {
              // output data of each row
              while ($rowozx = $resultozx->fetch_assoc()) {

            ?>
                <a download href='../Rentacar Lisences/<?php echo $hotel; ?>/<?php echo $rowozx['lisence']; ?>'>Download</a>


            <?php
              }
            }
            ?>
          </div>



          <div class="form-group">
            <label>Change Lisence</label>
            <input class='form-control' accept="application/pdf" name="lisence" type="file" />
          </div>






          <br />







          <div class="form-group">
            <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Update</button>
            <br /><br />
          </div>

        </div>
      </form>

  <?php
    }
  }
  ?>





 





<?php endblock() ?>

<?php startblock('FooterText') ?>
    Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
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







    $("#parking").change(function(event) {
      var park = document.getElementById("parking").value;
      var delme = document.getElementById("spare");
      delme.innerHTML = '';

      var getpark = document.getElementById("getpark").value;

      var popa = document.getElementById("popmeplease4");


      if (park == 'Yes') {






        const label2 = document.createElement("label");
        label2.innerHTML = 'Charged / Free';
        popa.appendChild(label2);

        const sel = document.createElement("SELECT");
        sel.setAttribute('name', 'chargednotcharged')
        sel.setAttribute('class', 'form-control')


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
        popa.innerHTML = '';
      }





    });





    $("#pool").change(function(event) {

      var delme = document.getElementById("antim2");
      delme.innerHTML = '';

      var pl = document.getElementById("pool").value;
      var x = document.getElementById("popmeplease2");
      var xx = document.getElementById("popmeplease3");


      var plo = document.getElementById("getpoollocation").value;
      var io = document.getElementById("getinorout").value;






      if (pl == 'Yes') {
        x.innerHTML = '';
        xx.innerHTML = '';


        const label = document.createElement("label");
        label.innerHTML = 'Pool Location';
        x.appendChild(label);

        const inp = document.createElement("INPUT");
        inp.setAttribute('name', 'poollocation')
        inp.setAttribute('value', plo)
        inp.setAttribute('class', 'form-control')
        x.appendChild(inp);



        const label2 = document.createElement("label");
        label2.innerHTML = 'Pool Type';
        xx.appendChild(label2);

        const sel = document.createElement("SELECT");
        sel.setAttribute('name', 'inorout')
        sel.setAttribute('class', 'form-control')

        const op0 = document.createElement("option");
        const op1 = document.createElement("option");
        const op2 = document.createElement("option");

        op0.setAttribute('label', io);
        op0.setAttribute('value', io);
        op0.setAttribute('text', io);


        op1.setAttribute('label', 'Indoor');
        op1.setAttribute('value', 'Indoor');
        op1.setAttribute('text', 'Indoor');

        op2.setAttribute('label', 'Outdoor');
        op2.setAttribute('value', 'Outdoor');
        op2.setAttribute('text', 'Outdoor');

        sel.appendChild(op0);
        sel.appendChild(op1);
        sel.appendChild(op2);

        xx.appendChild(sel);


      } else {
        x.innerHTML = '';
        xx.innerHTML = '';
      }


    });





    $("#type").change(function(event) {

      var delme = document.getElementById("antim");
      delme.innerHTML = '';

      var ty = document.getElementById("type");
      var x = document.getElementById("popmeplease");

      var beachvalue = document.getElementById("getbeach").value;

      if (ty.value == 'Beach') {

        x.innerHTML = '';

        const label = document.createElement("label");
        label.innerHTML = 'Beach Type';

        const select = document.createElement("SELECT");
        select.setAttribute('class', 'form-control');
        select.setAttribute('name', 'beach');

        const option0 = document.createElement("option");
        option0.setAttribute('label', beachvalue);
        option0.setAttribute('value', beachvalue);
        option0.setAttribute('text', beachvalue);
        option0.setAttribute('disabled', true);
        option0.setAttribute('selected', true);


        const option = document.createElement("option");
        option.setAttribute('label', 'Private');
        option.setAttribute('value', 'Private');
        option.setAttribute('text', 'Private');

        const option2 = document.createElement("option");
        option2.setAttribute('label', 'Frist Line');
        option2.setAttribute('value', 'Frist Line');
        option2.setAttribute('text', 'Frist Line');

        const option3 = document.createElement("option");
        option3.setAttribute('label', 'Second Line');
        option3.setAttribute('value', 'Second Line');
        option3.setAttribute('text', 'Second Line');

        select.appendChild(option0);
        select.appendChild(option);
        select.appendChild(option2);
        select.appendChild(option3);


        x.appendChild(label);
        x.appendChild(select);

      } else {
        var antim = document.getElementById("antim");

        x.innerHTML = '';
        antim.innerHTML = '';
      }








    });










    var x = document.getElementById("demo");




    $("#mez").click(function(event) {
      event.preventDefault(); // cancel default behavior

      //... rest of add logic
    });








    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      $('#demo').val("Latitude: " + position.coords.latitude +
        " Longitude: " + position.coords.longitude);
    }
  </script>

<?php endblock();?>	
