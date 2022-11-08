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

$roler = $_SESSION['roler'];

if (isset($_POST['submit'])) {


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












  $sqlo = "UPDATE venuedatabase SET generalfacilities='$acceptedcardslist' WHERE name='$hotel' && country='$country' && city='$city'";

  $resulto = $conn->query($sqlo);


  if ($resulto === TRUE) {

    $_SESSION['alertme'] = 1;
    echo "<script>location.replace('managegeneralfacilities.php');</script>";
  } else {
    echo "Error: " . $sqlo . "<br>" . $conn->error;
  }

















  $ipcountry = $xml->geoplugin_countryName;

  $ipad = getRealIpAddr();
  $ndate = date('d/m/Y');
  $ntime = date("h:i:sa");




  $sqlvz = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Venue Location Facilities')";

  $resultvz = $conn->query($sqlvz);


  if ($resultvz === TRUE) {
  }
}



?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
PCO Connect || Manage Facilities
<?php endblock() ?>
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

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div class="row">
  <div class="col-md-12">
    <h1>Manage Facilities</h1>
  </div>
</div>

<div class="card">
  <div class="card-body">



    <?php

    $sqll = "SELECT * FROM venuedatabase WHERE name='$hotel' && country='$country' && city='$city'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {
      // output data of each row
      while ($roww = $resultt->fetch_assoc()) {



    ?>


        <form method='POST' action='#'>

          <div id='cardslist' class="container">
            <div class='row'>
              <div class="col-sm-3 d-flex justify-content-left my-auto ">
                <input id='all' class="form-check-input" name='all' type='checkbox'> &nbsp;&nbsp;
                <label for='all' class="form-check-label">Select All</label>

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
                    <div class="col-sm-3 d-flex justify-content-left my-auto ">
                      <input checked id="alertcard" name='cards[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'>&nbsp;&nbsp;
                      <label for='<?php echo $rowv['name']; ?>' class="form-check-label"><?php echo $rowv['name']; ?></label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="col-sm-3 d-flex justify-content-left my-auto ">
                      <input id="alertcard" name='cards[]' type='checkbox' class="form-check-input" value='<?php echo $rowv['name']; ?>'> &nbsp;&nbsp;
                      <label for='<?php echo $rowv['name']; ?>' class="form-check-label"><?php echo $rowv['name']; ?></label>
                    </div>

                  <?php
                  }

                  ?>





              <?php



                }
              } ?>


            </div>
            <div class="row" id='addnc'>

            </div>
            <div class="row mt-3">
              <div class="col-md-12 d-flex justify-content-end">
                <input type='submit' id='pds' class="btn btn-danger col-sm-1" onclick='addcardnew()' value='+'>
              </div>
            </div>
          </div>
         
  </div>
</div>



<?php

      }
    }
?>


<button type='submit' name='submit' class='btn btn-danger col-md-2' style='float:right;'>Submit</button>

</form>

</div>
</div>


<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>

<script>
  document.getElementById("pds").addEventListener("click", function(event) {
    event.preventDefault()
  });



  function addcardnew() {
    var parent = document.getElementById("addnc");

    var ElementHTML = '<div class="col-sm-3 mt-2 d-flex justify-content-left my-auto "><input type="text" id="alertcard" name="cards[]" placeholder="Add New" class="form-control"></div>';

    // var inpt = document.createElement('INPUT');
    // inpt.setAttribute('name', 'cards[]');
    $('#addnc').append(ElementHTML);

  }
</script>

<script>
  document.getElementById("pdss").addEventListener("click", function(event) {
    event.preventDefault()
  });



  function addcardneww() {
    var parent = document.getElementById("addncc");

    var inpt = document.createElement('INPUT');
    inpt.setAttribute('name', 'cardss[]');


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
<?php endblock(); ?>