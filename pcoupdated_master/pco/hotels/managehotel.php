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


if (isset($_POST['submit'])) {


$restauranttype=$_POST['restauranttype'];
  
  $highlights = mysqli_real_escape_string($conn, $_POST['highlights']);
 
 



  $view = $_POST['view'];

  $gps = $_POST['gps'];


  $type = $_POST['type'];

  $telephone = $_POST['telephone'];

  $area = $_POST['area'];



  if (!empty($_POST["beach"])) {
    $beach = $_POST['beach'];
  } else {
    $beach = '';
  }



  $description = mysqli_real_escape_string($conn, $_POST['description']);


  mkdir("../Hotel Images/" . $hotel, 0755, true);


  $uploadsDir = "../Hotel Images/" . $hotel . "/";
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
        $insert = $conn->query("INSERT INTO hotelsdatabaseimages (name, country,city,image) VALUES ('$hotel', '$country', '$city','$fileName')");


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



  mkdir("../Hotel Logos/" . $hotel, 0755, true);




  $filename = $_FILES['logo']['name'];
  $destination = '../Hotel Logos/' . $hotel . '/' . $filename;
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $file = $_FILES['logo']['tmp_name'];


  // move the uploaded (temporary) file to the specified destination
  if (move_uploaded_file($file, $destination)) {




    $sql = "UPDATE logos SET image='$filename' WHERE hotel='$hotel' && country='$country' && city='$city'";

    $result = $conn->query($sql);


    if ($result === TRUE) {
      // echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }



  $sql = "UPDATE hotelsdatabase SET restauranttype='$restauranttype', name='$hotel', star='$star',country='$country',city='$city',type='$type',gps='$gps',telephone='$telephone',area='$area',description='$description', beach='$beach', view='$view', highlights='$highlights' WHERE name='$hotel' && country='$country' && city='$city' && star='$star'";

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




  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Hotel Info')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}

?>

<?php include './BaseFiles/base.php' ?>

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
<?php
endblock()
?>

<?php startblock('PageTitle') ?>
Manage Hotels
<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php'); ?>

<?php endblock(); ?>



<?php startblock('PageContent') ?>
<?php

$sqll = "SELECT * FROM hotelsdatabase WHERE name='$hotel' && country='$country' && city='$city' && star='$star'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while ($roww = $resultt->fetch_assoc()) {



?>


    <h2 class="text-dark">Manage Hotel</h2>
    <form action="#" method="post" enctype="multipart/form-data">



      <div>
        <div class="row">
          <div class="col-md-8">
            <div class="card" style="height: 100%;">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <!-- <label>Country</label> -->
                    <input type="text" id='country' readonly class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>City</label> -->
                    <input type="text" readonly id='city' class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>Hotel Name</label> -->
                    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Hotel">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-2">
                    <!-- <label>Star Rating</label> -->
                    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['star']; ?>' name='star' placeholder="Star Rating">
                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>Hotel Type</label> -->
                    <select class="form-control" id='type' name='type'>
                      <option selected><?php echo $roww['type']; ?></option>
                      <option>City</option>
                      <option>Beach</option>
                      <option>Desert</option>
                      <option>Boutique</option>
                      <option>Island</option>

                    </select>
                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>Star Rating</label> -->
                    <input type="text" class="form-control" value='<?php echo $roww['restauranttype']; ?>' name='restauranttype' placeholder="Restaurant Type">
                  </div>
                  <div class="col-md-4 mb-2">
                    <div id='antim'>
                      <?php
                      if ($roww['type'] == 'Beach') {
                      ?>

                        <!-- <label>Beach Type</label> -->
                        <select class="form-control" id='beach' name='beach'>
                          <option selected><?php echo $roww['beach']; ?></option>
                          <option>Private</option>
                          <option>First Line</option>
                          <option>Second Line</option>

                        </select>



                      <?php
                      }
                      ?>


                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-2">
                    <!-- <label>Hotel View</label> -->
                    <input type="text" class="form-control" value='<?php echo $roww['view']; ?>' name='view' placeholder="Hotel View">
                    <input style='display:none;' id='getbeach' value='<?php echo $roww['beach']; ?>'>
                    <div id='popmeplease'>

                    </div>
                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>Location GPS</label> -->

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" id='demo' class="form-control" readonly required name="gps" value="<?php echo $roww['gps']; ?>">
                      <button class="btn btn-outline-secondary primaryButtonCustom" type="button" id='mez' onclick="getLocation()" class="btn btn-danger"><i class="bi bi-geo"></i></button>
                    </div>

                    <!-- <span ></i></span> -->

                    <!-- <textarea id='demo' class="form-control" readonly required name="gps" rows="1" placeholder="GPS"><?php echo $roww['gps']; ?></textarea> -->

                  </div>
                  <div class="col-md-4 mb-2">
                    <!-- <label>Telephone</label> -->
                    <input type="tel" class="form-control" value='<?php echo $roww['telephone']; ?>' name='telephone' placeholder="00971-xxxxxxxx">
                  </div>
                </div>








                <div class="form-group mb-2">
                  <!-- <label>Area</label> -->
                  <select id='area' class="form-control" name='area'>
                    <option selected><?php echo $roww['area']; ?></option>


                  </select>
                </div>
               



                <div class="form-group mb-2">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" required name="description" rows="5" placeholder="Description"><?php echo $roww['description']; ?></textarea>
                </div>

               

                <div class="col-md-12 mb-2">
                  <label for="exampleFormControlTextarea1">Property Highlights</label>
                  <textarea class="form-control" required name="highlights" rows="3" placeholder="Highlights (Unique Selling Point)"><?php echo $roww['highlights']; ?></textarea>
                </div>
                
                
                
                
                
                
                


        <div id='popmeplease2' class="form-group">

        </div>

        <div id='popmeplease3' class="form-group">

        </div>











     
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
          <div class="card" style="height: 100%;">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Logo</label><br />

              <?php
              $sqloz = "SELECT * FROM logos WHERE hotel='$hotel' && country='$country' && city='$city'";
              $resultoz = $conn->query($sqloz);

              if ($resultoz->num_rows > 0) {
                // output data of each row
                while ($rowoz = $resultoz->fetch_assoc()) {

              ?>
                  <img style='width:100px;' src='../Hotel Logos/<?php echo $hotel; ?>/<?php echo $rowoz['image']; ?>'>


              <?php
                }
              }
              ?>
            </div>


            <div class="form-group">
              <label>Change Logo</label>
              <input class='form-control ' accept="image/png" name="logo" type="file" />
            </div>
            <br />

            <div class="form-group">
              <label for="exampleFormControlTextarea1">FACADE (Cover Images)</label><br />
              <div class="row">
              <?php
              $sqlo = "SELECT * FROM hotelsdatabaseimages WHERE name='$hotel' && country='$country' && city='$city'";
              $resulto = $conn->query($sqlo);

              if ($resulto->num_rows > 0) {
                // output data of each row
                while ($rowo = $resulto->fetch_assoc()) {
                  $aid = $rowo['id'];
              ?>
                  <span class="col-md-3 mb-1 p-0" style="position:relative; ">
                    <a href='del.php?tbl=hotelsdatabaseimages&aid=<?php echo $aid; ?>' style="position:absolute; top: -5px; left: 7px; z-index:1;"><span style='font-size:1.5em;  z-index:1; color:red;'>&times;</span> </a>
                    <img class="img-thumbnail rounded" style=" position: relative; "  src='../Hotel Images/<?php echo $hotel; ?>/<?php echo $rowo['image']; ?>'>
                  </span>

              <?php
                }
              }
              ?>
              </div>
            </div>

            <div class="form-group">
              <label>Upload More Images</label>
              <input class='form-control' accept="image/*" name="myfile[]" type="file" id="files" multiple='true' />
            </div>
          </div>
        </div>
          </div>
        </div>

       

        

        <div class="row p-2 d-flex justify-content-end">
          <div class="col-md-2">
            <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Update</button>
          </div>
        </div>





    </form>

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

popa.style.display='block';




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
        popa.style.display='none';
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
<?php endblock() ?>