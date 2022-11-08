<?php
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];
$sqll = "SELECT * FROM hotelsdatabase WHERE name='$hotel'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  echo "<script>location.replace('dashboard.php');</script>";
}
if (isset($_POST['submit'])) {



  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $hotel = mysqli_real_escape_string($conn, $_POST['hotel']);
  $star = mysqli_real_escape_string($conn, $_POST['star']);
  $gps = mysqli_real_escape_string($conn, $_POST['gps']);
  $type = mysqli_real_escape_string($conn, $_POST['type']);
  $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
  $area = mysqli_real_escape_string($conn, $_POST['area']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  //singles
  $view = mysqli_real_escape_string($conn, $_POST['view']);
  $pool = mysqli_real_escape_string($conn, $_POST['pool']);
  $renovatedon = mysqli_real_escape_string($conn, $_POST['renovatedon']);
  $built = mysqli_real_escape_string($conn, $_POST['built']);
  if (isset($_POST["poolname"])) {
    $poolname = $_POST["poolname"];
  } else {
    $ppz = array();
    $poolname = $ppz;
  }
  if (isset($_POST["poollocation"])) {
    $poollocation = $_POST["poollocation"];
  } else {
    $pp = array();
    $poollocation = $pp;
  }

  if (isset($_POST["inout"])) {
    $inorout = $_POST["inout"];
  } else {
    $ii = array();
    $inorout = $ii;
  }

  $highlights = mysqli_real_escape_string($conn, $_POST['highlights']);

  if ($type == 'Beach') {
    $beach = mysqli_real_escape_string($conn, $_POST['beach']);
  } else {
    $beach = '';
  }


  $ce = 0;
  foreach ($poollocation as $value) {
    $sqlrr = "INSERT INTO pools (hotel,country,city, poollocation,inorout,poolname) VALUES ('$hotel', '$country', '$city', '$value', '$inorout[$ce]', '$poolname[$ce]')";
    $resultrr = $conn->query($sqlrr);
    if ($resultrr === TRUE) {
      // echo "Category created successfully";
      mkdir("../Pool Images/" . $country . "/" . $city . "/" . $hotel . "/" . $poolname[$ce], 0755, true);
      $uploadsDir = "../Pool Images/" . $country . "/" . $city . "/" . $hotel . "/" . $poolname[$ce] . "/";
      //$allowedFileType = array('jpg','png','jpeg');
      $img = array();
      $imgs = $_FILES['poolimages' . $ce]['name'];
      // Velidate if files exist
      if (!empty(array_filter($imgs))) {
        // Loop through file items
        foreach ($imgs as $id => $val) {
          // Get files upload path
          $fileName        = $_FILES['poolimages' . $ce]['name'][$id];
          $tempLocation    = $_FILES['poolimages' . $ce]['tmp_name'][$id];
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
            $insert = $conn->query("INSERT INTO poolimages (hotel, country,city,poolname,image) VALUES ('$hotel', '$country', '$city','$poolname[$ce]','$fileName')");


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
      //enter pool images code
    } else {
      echo "Error: " . $sqlrr . "<br>" . $conn->error;
    }
    $ce = $ce + 1;
  }
  /*

  if(!empty($_FILES['planner']['name'])){
      
      
      mkdir("../HotelandBanquet Planners/".$hotel, 0755, true);	
    
      $filename22 = $_FILES['planner']['name'];
      $destination22 = '../HotelandBanquet Planners/'.$hotel.'/'. $filename22;
      $extension22 = pathinfo($filename22, PATHINFO_EXTENSION);
      $file22 = $_FILES['planner']['tmp_name'];

  // move the uploaded (temporary) file to the specified destination
          if (move_uploaded_file($file22, $destination22)) {

  $sqlxx ="INSERT INTO planners (hotel,country,city, planner) VALUES ('$hotel', '$country', '$city', '$filename22')";

  $resultxx = $conn->query($sqlxx);


  if ($resultxx === TRUE) {
  // echo "Category created successfully";
  } else {
    echo "Error: " . $sqlxx . "<br>" . $conn->error;
  }

        
		}

}


*/
  if (!empty($_FILES['logo']['name'])) {


    mkdir("../Hotel Logos/" . $hotel, 0755, true);

    $filename2 = $_FILES['logo']['name'];
    $destination2 = '../Hotel Logos/' . $hotel . '/' . $filename2;
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
    $file2 = $_FILES['logo']['tmp_name'];

    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file2, $destination2)) {

      $sqlx = "INSERT INTO logos (hotel,country,city, image) VALUES ('$hotel', '$country', '$city', '$filename2')";

      $resultx = $conn->query($sqlx);


      if ($resultx === TRUE) {
        // echo "Category created successfully";
      } else {
        echo "Error: " . $sqlx . "<br>" . $conn->error;
      }
    }
  }

  mkdir("../Hotel Images/" . $hotel, 0755, true);

  $uploadsDir = "../Hotel Images/" . $hotel . "/";
  // $allowedFileType = array('jpg','png','jpeg');

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



  $sql = "INSERT INTO hotelsdatabase (name, star,country,city,type,gps,telephone,area,description,address,view,pool,highlights,beach,renovatedon,built) VALUES ('$hotel', '$star', '$country', '$city', '$type', '$gps', '$telephone', '$area', '$description', '$address','$view','$pool','$highlights','$beach','$renovatedon','$built')";

  $result = $conn->query($sql);


  if ($result === TRUE) {

    $_SESSION['alertme'] = 2;
    echo "<script>location.replace('managegeneralfacilities.php');</script>";


    //echo "<script>location.replace('dashboard.php');</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Setup
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
</style>
<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>

<h2 class="text-dark">Setup Hotel</h2>
<div>
  <div class="row">
    <div class="col-md-8">
      <div class="card" style="height: 100%;">
        <div class="card-body">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm">
                <input type="text" readonly id='country' class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
              </div>
              <div class="col-sm">
                <input type="text" readonly id='city' class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
              </div>
              <div class="col-sm">
                <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Hotel">
              </div>
            </div>
            <div class='row mt-2'>
              <div class="col-sm">
                <div class="form-group">
                  <input type="text" readonly class="form-control" value='<?php echo $_SESSION['star']; ?>' name='star' placeholder="Star Rating">
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <select id='type' class="form-control" name='type' placeholder="Hotel Type">
                    <option>Select Type</option>
                    <option>City</option>
                    <option value='Beach'>Beach</option>
                    <option>Desert</option>
                    <option>Boutique</option>
                    <option>Island</option>
                  </select>
                </div>
              </div>

              <div id='popme'>
              </div>
            </div>

            <div class='row mt-2'>
              <div class="col-sm">
                <div class="form-group">
                  <input type="text" class="form-control" required name='view' placeholder="Hotel View">
                </div>
              </div>
              <div class="col-sm">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id='demo' class="form-control" readonly required name="gps" value="<?php echo $roww['gps']; ?>">
                  <button class="btn btn-outline-secondary primaryButtonCustom" type="button" id='mez' onclick="getLocation()" class="btn btn-danger"><i class="bi bi-geo"></i></button>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <input type="number" class="form-control" name='telephone' placeholder="00971-xxxxxxxx">
                </div>
              </div>
            </div>


            <div class='row mt-2'>
              <div class="col-sm">
                <div class="form-group">
                  <select id='area' class="form-control" name='area' placeholder="Area">
                  </select>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <input type="text" class="form-control" name='address' placeholder="Address">
                </div>
              </div>
            </div>

            <div class='row mt-2'>
              <div class="col-sm">
                <input type="text" class="form-control" required name='built' placeholder="Hotel Built Year">
              </div>
              <div class="col-sm">
                <input type="date" class="form-control" name='renovatedon' placeholder="Last Renovated On">
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-sm">
                <textarea class="form-control" required name="description" cols='6' placeholder="Description (Max 200 words)"></textarea>
              </div>
            </div>

            <div class='row'>
              <div class="col-sm">
                <div class="form-group">
                  <label>Property Highlights</label>
                  <textarea class="form-control" required name="highlights" cols='3' placeholder="Highlights (Unique Selling Point) (Max 50 words)"></textarea>
                </div>
              </div>
            </div>



            <div class='row'>
              <div class="col-sm">
                <div class="form-group">
                  <label>Pool</label>
                  <select class="form-control" id='pool' name='pool'>
                    <option disabled selected>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
              </div>

              <div style='display:none;' class="col-sm" id='numberofpoolsdiv'>
                <label>Number of Pools</label>
                <input id='numberofpools' min="0" class='form-control' type='number'>

              </div>
            </div>

            <div id='poppool'>
            </div>
            <div id='poppool2'>
            </div>

            <!-- <div class='row mt-2'>
              <div class="col-sm">
                <div class="form-group">
                  <label>Min Age Restriction for Check In</label>
                  <input type="number" class="form-control" required name='agerestriction' placeholder="Minimum Age Restriction for Checking In">
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label>Room Service Timing (From)</label>
                  <input type='time' class="form-control" required name='roomservicefrom'>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label>Room Service Timing (To)</label>
                  <input type="time" class="form-control" required name='roomserviceto'>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class="col-sm">
                <div class="form-group">
                  <label>Cards Accepted</label>
                  <select class="form-control" id='cards' name='cards'>
                    <option>No</option>
                    <option>Yes</option>
                  </select>
                </div>
              </div>
            </div>

            <div style='display:none;' id='cardslist'>
              <div class='row mt-2'>
                <label>Cards</label>
                <hr/>
                <div class="col-md-3 d-flex justify-content-left">
                  <input id='all' name='all' type='checkbox'>
                  <label for='all'>&nbsp; Select All</label>
                </div>
                <?php
                $sqlv = "SELECT * FROM paymentcards";
                $resultv = $conn->query($sqlv);
                if ($resultv->num_rows > 0) {
                  // output data of each row
                  while ($rowv = $resultv->fetch_assoc()) {
                ?>
                 <div class="col-md-3 d-flex justify-content-left">
                  <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>
                    <label for='<?php echo $rowv['name']; ?>'> &nbsp;<?php echo $rowv['name']; ?></label>
                    
                  </div>
                <?php
                  }
                }
                ?>

                <nonsense id='addnc' class="row">

                </nonsense>

                <div class="col-md-2 mt-2">
                  <input type='submit' id='pds' class="btn btn-danger" onclick='addcardnew()' value='Add More Cards'>
                </div>
              </div>
            </div>
          
          

            <script>
              $("#cards").change(function(event) {
                const crd = document.getElementById('cards').value;

                if (crd == 'Yes') {
                  const elem = document.getElementById('cardslist');
                  elem.style.display = 'block';
                } else if (crd == 'No') {
                  const elem = document.getElementById('cardslist');
                  elem.style.display = 'none';
                }

              });

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
              var nam = 1;
            </script>
            <div class='row'>
              <div class="col-sm">

                <div class="form-group">
                  <label>Parking</label>
                  <select class="form-control" id='parking' name='parking'>
                    <option disabled selected>Select</option>
                    <option>Yes</option>
                    <option>No</option>

                  </select>
                </div>
              </div>

              <div id='parkingg'>
              </div>

              <div style='display:none;' class='col-sm' id='parkingdes'>

                <label>Parking Rates</label>
                <textarea class='form-control' name='parkingcharges' placeholder='Parking Rates'></textarea>

              </div>
            </div>
            <div class='row'>
              <div class="col-sm">
                <div class="form-group">
                  <label>ATM Distance (in KM)</label>
                  <input type='text' placeholder='ATM Distance' class="form-control" id='atm' name='atm'>
                </div>
              </div>
            </div> -->



        </div>


      </div>
    </div>

    <div class="col-md-4">
      <div class="card" style="height: 100%;">
        <div class="card-body">

          <div class='row'>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Upload Logo</label><br />

                <input class='form-control' required accept="image/png" name="logo" type="file" id="logo" />
                <small>Must be in PNG format</small>
              </div>

            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Upload FACADE Images (Multiple/ Single)</label><br />

                <input class='form-control' required accept="image/*" name="myfile[]" type="file" id="files" multiple='true' />
                <small>Max 2mb (1000px x 1000px)</small>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row p-2 d-flex justify-content-end">
    <div class="col-md-2">
      <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Next</button>
    </div>
  </div>
</div>
</form>
<?php endblock() ?>

<?php startblock('FooterText') ?>

<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script>
  document.getElementById("pds").addEventListener("click", function(event) {
    event.preventDefault()
  });

  function addcardnew() {

    var CardElementHtml = '<div class="col-md-3 mt-2 d-flex justify-content-left"><input name="cards[]" class="form-control"></div>';
    // var parent = document.getElementById("addnc");
    // var cardElement = document.createElement("div");
    // cardElement.classList.add('col-md-3');
    // var inpt = document.createElement('INPUT');
    // inpt.setAttribute('name', 'cards[]');
    $('#addnc').append(CardElementHtml);

  }
</script>
<script>
  setInterval(function() {


    $("#cnc").change(function(event) {
      var apa = document.getElementById("cnc").value;
      if (apa == 'Charged') {

        document.getElementById("parkingdes").style.display = "block";
      } else {

        document.getElementById("parkingdes").style.display = "none";
      }


    });

  }, 1000);





  var nd = 1;



  var n = 1;























  var x = document.getElementById("demo");









  $("#parking").change(function(event) {
    var parking = document.getElementById("parking").value;
    if (parking == 'Yes') {

      var parkingg = document.getElementById("parkingg");
      parkingg.classList.add("col-sm");



      var ymm = document.createElement("div");

      ymm.setAttribute("class", "form-group");

      var yll = document.createElement("label");

      yll.innerHTML = "Charged / Free";


      ymm.appendChild(yll);






      var yii = document.createElement("SELECT");

      yii.setAttribute("class", "form-control");
      yii.setAttribute("Name", "chargednotcharged");
      yii.setAttribute("id", "cnc");


      var yii13 = document.createElement("option");
      var yii1 = document.createElement("option");
      var yii2 = document.createElement("option");

      yii13.setAttribute("label", "Select");
      yii13.setAttribute("text", "");
      yii13.setAttribute("value", "");

      yii1.setAttribute("label", "Charged");
      yii1.setAttribute("text", "Charged");
      yii1.setAttribute("value", "Charged");


      yii2.setAttribute("label", "Free");
      yii2.setAttribute("text", "Free");
      yii2.setAttribute("value", "Free");


      yii.appendChild(yii13);

      yii.appendChild(yii1);

      yii.appendChild(yii2);


      ymm.appendChild(yii);
















      parkingg.appendChild(ymm);













    } else {

      document.getElementById("parkingdes").style.display = "none";

      var parkingg = document.getElementById("parkingg");
      parkingg.classList.remove("col-sm");

      parkingg.innerHTML = '';

    }


  });








  $("#pool").change(function(event) {
    var pool = document.getElementById("pool").value;

    if (pool == 'Yes') {


      var ylabel = document.getElementById("numberofpoolsdiv");

      ylabel.style.display = 'block';





    } else {

      var ylabel = document.getElementById("numberofpoolsdiv");
      ylabel.style.display = 'none';

      var nmbinput = document.getElementById("numberofpools");
      nmbinput.value = '';

      var poppool = document.getElementById("poppool");
      poppool.classList.remove("col-sm");
      poppool.innerHTML = '';
      var poppool2 = document.getElementById("poppool2");
      poppool2.classList.remove("col-sm");
      poppool2.innerHTML = '';

    }











  });





















  $("#type").change(function(event) {
    var type = document.getElementById("type").value;



    if (type == 'Beach') {

      var pop = document.getElementById("popme");

      pop.classList.add("col-sm");



      var ym = document.createElement("div");

      ym.setAttribute("class", "form-group");




      var yi = document.createElement("INPUT");

      yi.setAttribute("class", "form-control");
      yi.setAttribute("Name", "beach");
      yi.setAttribute("Placeholder", "Beach Type");
      yi.setAttribute("type", "text");
      yi.setAttribute("list", "beaches");
      yi.setAttribute("id", "beach");






      var y = document.createElement("datalist");

      y.setAttribute("class", "form-control");
      y.setAttribute("Name", "beaches");
      y.setAttribute("type", "text");
      y.style.display = 'none';
      y.setAttribute("id", "beaches");

      var y2 = document.createElement("option");
      y2.setAttribute("text", "Private");
      y2.setAttribute("value", "Private");
      y2.setAttribute("label", "Private");

      var y22 = document.createElement("option");
      y22.setAttribute("text", "First Line");
      y22.setAttribute("value", "First Line");
      y22.setAttribute("label", "First Line");

      var y222 = document.createElement("option");
      y222.setAttribute("text", "Second Line");
      y222.setAttribute("value", "Second Line");
      y222.setAttribute("label", "Second Line");

      y.appendChild(y2);
      y.appendChild(y22);
      y.appendChild(y222);

      ym.appendChild(yi);
      ym.appendChild(y);


      pop.appendChild(ym);


    } else {



      var pop = document.getElementById("popme");

      pop.classList.remove("col-sm");
      pop.innerHTML = '';






    }

  });



  $("#numberofpools").keyup(function(event) {
    var nmbpool = document.getElementById("numberofpools").value;

    var poppool = document.getElementById("poppool");

    poppool.innerHTML = '';

    ncounter = 0;
    for (let i = 0; i < nmbpool; i++) {

      // var ycnt = document.createElement("div");
      var yrow = document.createElement("div");
      // ycnt.setAttribute("class", "container");
      yrow.setAttribute("class", "row mt-2");
      var ymmv = document.createElement("div");
      ymmv.setAttribute("class", "col-sm-4 form-group");
      // var yllv = document.createElement("label");
      // yllv.innerHTML = "Pool Name";
      // ymmv.appendChild(yllv);
      var yiiv = document.createElement("INPUT");

      yiiv.setAttribute("class", "form-control");
      yiiv.setAttribute("Name", "poolname[]");
      yiiv.setAttribute("type", "text");
      yiiv.setAttribute("id", "poolname");
      yiiv.setAttribute("placeholder", "Pool Name");
      ymmv.appendChild(yiiv);

      yrow.appendChild(ymmv);
      var ymm = document.createElement("div");
      ymm.setAttribute("class", "col-sm-4 form-group");
      // var yll = document.createElement("label");
      // yll.innerHTML = "Pool Location";
      // ymm.appendChild(yll);
      var yii = document.createElement("INPUT");
      yii.setAttribute("class", "form-control");
      yii.setAttribute("Name", "poollocation[]");
      yii.setAttribute("type", "text");
      yii.setAttribute("id", "poollocation");
      yii.setAttribute("required", "true");
      yii.setAttribute("placeholder", "Pool Location");
      ymm.appendChild(yii);

      yrow.appendChild(ymm);
      var ymm2maj = document.createElement("div");
      ymm2maj.setAttribute("class", "col-sm-4");
      var ymm2 = document.createElement("div");
      ymm2.setAttribute("class", "form-group");
      // var yll2 = document.createElement("label");
      // yll2.innerHTML = "Pool Type";
      // ymm2.appendChild(yll2);
      var ys = document.createElement("SELECT");
      ys.setAttribute("class", "form-control");
      ys.setAttribute("Name", "inout[]");
      ys.setAttribute("id", "inout");
      var y2s = document.createElement("option");
      y2s.setAttribute("text", "Indoor");
      y2s.setAttribute("value", "Indoor");
      y2s.setAttribute("label", "Indoor");
      var y22s = document.createElement("option");
      y22s.setAttribute("text", "Outdoor");
      y22s.setAttribute("value", "Outdoor");
      y22s.setAttribute("label", "Outdoor");
      ys.appendChild(y2s);
      ys.appendChild(y22s);
      ymm2.appendChild(ys);
      var coldiv = document.createElement("div");
      coldiv.setAttribute("class", "col-sm-12 mt-2");
      var formdiv = document.createElement("div");
      formdiv.setAttribute("class", "form-group");
      // var formlabel = document.createElement("label");
      // formlabel.innerHTML = "Pool Images";
      // formdiv.appendChild(formlabel);
      var poolimages = document.createElement("INPUT");
      poolimages.setAttribute("class", "form-control");
      poolimages.setAttribute("Name", "poolimages" + ncounter + "[]");
      poolimages.setAttribute("type", "file");
      poolimages.setAttribute("multiple", "true");
      poolimages.setAttribute("accept", "image/*");
      formdiv.appendChild(poolimages);
      coldiv.appendChild(formdiv);
      ymm2maj.appendChild(ymm2);
      yrow.appendChild(ymm2maj);
      yrow.appendChild(coldiv);
      // yrow.appendChild(yrow);
      poppool.appendChild(yrow);




      ncounter = ncounter + 1;


    }



  });


  setInterval(function() {


    $("#beach").change(function(event) {



    });

  }, 1000);


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
    $('#demo').val( position.coords.latitude +
      "," + position.coords.longitude);
    
  }
</script>



<script>
  var country = document.getElementById('country').value;
  var city = document.getElementById('city').value;



  $.ajax({

    type: 'POST',

    url: 'getareasnew.php',
    data: {
      'country': country,
      'city': city
    },
    success: function(result) {

      var to = document.getElementById('area');
      to.innerHTML = result;


    }

  });
</script>

<?php endblock(); ?>