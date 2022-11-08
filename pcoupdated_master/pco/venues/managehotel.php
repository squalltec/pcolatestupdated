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

$star = $_SESSION['star'];
$roler = $_SESSION['roler'];




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

















  $atm = $_POST['atm'];
  $highlights = mysqli_real_escape_string($conn, $_POST['highlights']);

  $parking = $_POST['parking'];
  if (isset($_POST['chargednotcharged'])) {
    $chargednotcharged = $_POST['chargednotcharged'];
  } else {
    $chargednotcharged = '';
  }







  $gps = $_POST['gps'];


  $telephone = $_POST['telephone'];

  $area = $_POST['area'];




  $description = mysqli_real_escape_string($conn, $_POST['description']);


  mkdir("../Venue Location Images/" . $hotel, 0755, true);


  $uploadsDir = "../Venue Location Images/" . $hotel . "/";
  //$allowedFileType = array('jpg','png','jpeg');

  $img = array();

  $imgs = $_FILES['myfile']['name'];

  // Velidate if files exist
  if (!empty(array_filter($imgs))) {

    // Loop through file items
    foreach ($imgs as $id => $val) {
      // Get files upload path
      $fileName        = $_FILES['myfile']['name'][$id];
      $tempLocation    = $_FILES['myfile']['tmp_name'][$id];
      $targetFilePath  = $uploadsDir . $fileName;
      $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
      $uploadDate      = date('Y-m-d H:i:s');
      $uploadOk = 1;
      if (true) {
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
        $insert = $conn->query("INSERT INTO venuedatabaseimages (name, country,city,image) VALUES ('$hotel', '$country', '$city','$fileName')");


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









  $sql = "UPDATE venuedatabase SET name='$hotel',country='$country',city='$city',gps='$gps',telephone='$telephone',area='$area',description='$description',parking='$parking',chargednotcharged='$chargednotcharged',atm='$atm',highlights='$highlights' WHERE name='$hotel' && country='$country' && city='$city'";

  $result = $conn->query($sql);


  if ($result === TRUE) {
    $_SESSION['alertme'] = 1;


    // echo "<script>location.replace('managehotel.php');</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }













  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");




  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Venue Location Info')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}

?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Manage Hotels
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
  .primaryButtonCustom {
    background-color: #ce3435 !important;
    color: white;
  }

  .primaryButtonCustom:hover {
    background-color: white !important;
    color: #ce3435;
  }

  .form-control::file-selector-button {
    color: #fff !important;
    background-color: #ce3435 !important;
  }
  .form-check-input:checked {
    background-color: #ce3435 !important;
    border-color: #ce3435 !important;
  }
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<?php

$sqll = "SELECT * FROM venuedatabase WHERE name='$hotel' && country='$country' && city='$city'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while ($roww = $resultt->fetch_assoc()) {



?>


    <form action="#" method="post" enctype="multipart/form-data">


      <div class="form-group">


        <h2 >Manage Location</h2>

      </div>
      <div>


        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" id='country' readonly class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
                  </div>
                  <div class="col-md-4">
                    <input type="text" readonly id='city' class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
                  </div>
                  <div class="col-md-4">
                    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Hotel">
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-4">

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id="demo" readonly="" required="" name="gps" value="<?php echo $roww['gps']; ?>">
                      <button class="btn btn-outline-secondary primaryButtonCustom" type="button" id="mez" onclick="getLocation()"><i class="bi bi-geo"></i></button>
                    </div>
                    <!-- <label>Location GPS</label>
                    <button id='mez' onclick="getLocation()">Get Your Location</button>
                    <textarea id='demo' class="form-control" readonly required name="gps" rows="1" placeholder="GPS"><?php echo $roww['gps']; ?></textarea> -->
                  </div>
                  <div class="col-md-4">
                    <input type="number" class="form-control" value='<?php echo $roww['telephone']; ?>' name='telephone' placeholder="00971-xxxxxxxx">
                  </div>
                  <div class="col-md-4">
                    <select id='area' class="form-control" name='area'>
                      <option selected><?php echo $roww['area']; ?></option>


                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">
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

                  <div id='popmeplease4' class="col-sm" style="display: none;">

                  </div>
                  <input style='display:none;' id='getpark' value='<?php echo $roww['chargednotcharged']; ?>'>

                  <?php if ($roww['parking'] == 'Yes') {
                  ?>
                    <div id='spare' class="col-sm">
                      <select class="form-control" id='chargednotcharged' name='chargednotcharged'>
                        <?php if ($roww['chargednotcharged'] == 'Charged') {
                        ?>

                          <option selected>Charged</option>
                          <option>Free</option>



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




                  <div class="col-sm">
                    <select class="form-control" id='bathtub' name='bathtub'>
                      <option disabled>Bath Tub</option>
                      <?php if ($roww['bathtub'] == 'Yes') {
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

                  <div class="col-sm">
                    <input type="text" class="form-control" placeholder="ATM Distance" value='<?php echo $roww['atm']; ?>' name='atm'>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-12">
                    <label>Accept Cards</label>
                    <select class="form-control" id='cards' name='cards'>
                      <?php if ($roww['cards'] == 'Yes') {
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

                  <div class="col-md-12">
                    <div class="row">
                      <label>Cards</label>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <input id='all' name='all' class="form-check-input" type='checkbox'>
                        <label for='all' class="form-check-label">Select All</label>
                      </div>
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
                            <div class="col-md-3">
                              <input checked id="alertcard" name='cards[]' type='checkbox'  class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                              <label for='<?php echo $rowv['name']; ?>' class="form-check-label"><?php echo $rowv['name']; ?></label>
                            </div>

                          <?php
                          } else {
                          ?>
                            <div class="col-md-3">
                              <input id="alertcard" name='cards[]' type='checkbox'  class="form-check-input" value='<?php echo $rowv['name']; ?>'>
                              <label for='<?php echo $rowv['name']; ?>' class="form-check-label"><?php echo $rowv['name']; ?></label>
                            </div>
                          <?php
                          }

                          ?>





                      <?php



                        }
                      }
                      ?>

                    </div>
                  </div>
                  <div class="row" id='addnc'>

                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12 d-flex justify-content-end">
                      <input type='submit' id='pds' class="btn btn-danger col-md-3" onclick='addcardnew()' value='Add More Cards'>
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-sm">
                    <label for="exampleFormControlTextarea1">Property Highlights</label>
                    <textarea class="form-control" required name="highlights" rows="3" placeholder="Highlights (Unique Selling Point)"><?php echo $roww['highlights']; ?></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" required name="description" rows="3" placeholder="Description"><?php echo $roww['description']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4" style="">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <label for="exampleFormControlTextarea1">(Cover Images)</label><br />

                  <?php
                  $sqlo = "SELECT * FROM venuedatabaseimages WHERE name='$hotel' && country='$country' && city='$city'";
                  $resulto = $conn->query($sqlo);

                  if ($resulto->num_rows > 0) {
                    // output data of each row
                    while ($rowo = $resulto->fetch_assoc()) {
                      $aid = $rowo['id'];
                  ?>
                    <span class="col-md-3 mb-1 p-0" style="position:relative; ">
                      <a href='del.php?tbl=venuedatabaseimages&aid=<?php echo $aid; ?>'>
                      <b>
                        <span style='font-size:2em; position:absolute; z-index:1; color:red;right: 10px;top: -8px;'>&times;</span>
                      </b> 
                      </a>

                      <img class="img-thumbnail rounded" style=" position: relative; " src='../Venue Location Images/<?php echo $hotel; ?>/<?php echo $rowo['image']; ?>'>
                    </span>

                  <?php
                    }
                  }
                  ?>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label>Upload More Images</label>
                    <input class='form-control' accept="image/*" name="myfile[]" type="file" id="files" multiple='true' />
                  </div>
                  
                </div>

                <div class="row mt-2">
                  <div class="col-md-12">
                    <button style="float:right;" type="submit" name='submit' class="btn btn-danger col-md-3">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById("pds").addEventListener("click", function(event) {
    event.preventDefault()
  });

  function addcardnew() {
    var parent = document.getElementById("addnc");
    // parent.setAttribute('class','row');
    var ElementHtml = ` <div class="col-md-3 mt-2">
                              <input type="text" id="alertcard" name='cards[]' class='form-control' placeholder="Add New">
                            </div>`;
    // var inpt = document.createElement('INPUT');
    // inpt.setAttribute('name', 'cards[]');
    // inpt.setAttribute('class', 'form-control col-md-3 mt-2');


    $('#addnc').append(ElementHtml);

  }
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
      // popa.appendChild(label2);

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
      $('#spare').hide();
      $('#popmeplease4').show()




















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
    x.innerHTML = position.coords.latitude +
      "," + position.coords.longitude;
  }
</script>


<script>


</script>



<script>
  var country = document.getElementById('country').value;
  var city = document.getElementById('city').value;



  $.ajax({

    type: 'POST',

    url: 'getareas.php',
    data: {
      'country': country,
      'city': city
    },
    success: function(result) {

      var to = document.getElementById('area');
      to.innerHTML = to.innerHTML + result;


    }

  });
</script>





<?php endblock(); ?>