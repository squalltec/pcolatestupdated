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


$ipcountry = $xml->geoplugin_countryName;

$ipad = getRealIpAddr();
$ndate = date('d/m/Y');
$ntime = date("h:i:sa");















$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];




if (isset($_POST['submit'])) {




  $policies = $_POST['policies'];
  $priordays = $_POST['priordays'];
  $deductionprice = $_POST['deductionprice'];



  $pols = implode('_@_', $policies);

  //echo $pols;


  $numberofrooms = $_POST['numbs'];

  $singleadults = $_POST['singleadults'];
  $singlechildren = $_POST['singlechildren'];

  $doubleadults = $_POST['doubleadults'];
  $doublechildren = $_POST['doublechildren'];







  $value = $_POST['type'];
  $roomtype = $_POST['type'];

  $id = $_POST['iad'];

  $singledes = mysqli_real_escape_string($conn, $_POST['singledes']);
  $doubledes = mysqli_real_escape_string($conn, $_POST['doubledes']);







  //general facilities


  $inroomfacilities = implode(", ", $_POST['cards']);


  $arraycards = $_POST['cards'];



  foreach ($arraycards as $valuec) {




    $sql1 = "SELECT * FROM hotelsdatabaseinroomfacilities WHERE name='$valuec'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseinroomfacilities (name) VALUES ('$valuec')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }










  //kitchen facilities


  $kitchen = implode(", ", $_POST['cards2']);


  $arraycards2 = $_POST['cards2'];



  foreach ($arraycards2 as $valuec2) {




    $sql1 = "SELECT * FROM hotelsdatabasekitchenfacilities WHERE name='$valuec2'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasekitchenfacilities (name) VALUES ('$valuec2')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }


















  //Private Bathroom facilities


  $privatebathroom = implode(", ", $_POST['cards3']);


  $arraycards3 = $_POST['cards3'];



  foreach ($arraycards3 as $valuec3) {




    $sql1 = "SELECT * FROM hotelsdatabaseprivatebathroomfacilities WHERE name='$valuec3'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseprivatebathroomfacilities (name) VALUES ('$valuec3')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }





  //Discounted facilities
  /*

 $discounted = implode(", ", $_POST['cards4']);
    
    
    $arraycards4=$_POST['cards4'];
    
    
    
foreach ($arraycards4 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasediscountedfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasediscountedfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
   */



  //Complimentary facilities


  $complimentary = implode(", ", $_POST['cards5']);


  $arraycards5 = $_POST['cards5'];



  foreach ($arraycards5 as $valuec5) {




    $sql1 = "SELECT * FROM hotelsdatabasecomplimentaryfacilities WHERE name='$valuec5'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasecomplimentaryfacilities (name) VALUES ('$valuec5')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }




















//Accessibility facilities


  $accessibility = implode(", ", $_POST['cards6']);


  $arraycards6 = $_POST['cards6'];



  foreach ($arraycards6 as $valuec6) {




    $sql1 = "SELECT * FROM hotelsdatabaseaccessibilityfacilities WHERE name='$valuec6'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseaccessibilityfacilities (name) VALUES ('$valuec6')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }
























  $changerr = 'Change in Room: ' . $roomtype;

  /*                    
$sqlo ="UPDATE hotelsInventorydatabase SET inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',discountedfacilities='$discounted',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
*/



  $sqlo = "UPDATE hotelsInventorydatabase SET cancellationdays='$priordays',cancellationpercentage='$deductionprice',cancellationpolicy='$pols',inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',complimentaryfacilities='$complimentary', accessibilityfacilities='$accessibility' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";


  $resulto = $conn->query($sqlo);


  if ($resulto === TRUE) {

    $_SESSION['alertme'] = 1;
  }































  mkdir("../Room Uploads/" . $hotel . "/" . $value, 0755, true);

  $uploadsDir = "../Room Uploads/" . $hotel . "/" . $value . "/";
  //$allowedFileType = array('jpg','png','jpeg','webp');

  $img = array();



  $imgs = $_FILES['files']['name'];



  // Velidate if files exist
  if (!empty(array_filter($imgs))) {

    // Loop through file items
    foreach ($imgs as $id => $val) {
      // Get files upload path
      $fileName        = $_FILES['files']['name'][$id];
      $tempLocation    = $_FILES['files']['tmp_name'][$id];
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
        $insert = $conn->query("INSERT INTO hotelsInventoryImagesdatabase (hotel, country,location,type,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");


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




















  $sql = "UPDATE hotelsInventorydatabase SET singledescription='$singledes',doubledescription='$doubledes', singleadultoccupancy='$singleadults', singlechildoccupancy='$singlechildren',doubleadultoccupancy='$doubleadults', doublechildoccupancy='$doublechildren',numberofrooms='$numberofrooms' WHERE id='$id'";

  $result = $conn->query($sql);


  if ($result === TRUE) {
    $_SESSION['alertme'] = 1;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }























  $sqlvzar = "INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','$changerr')";

  $resultvzar = $conn->query($sqlvzar);


  if ($resultvzar === TRUE) {
  }



  $delsql = "DELETE FROM disabletwindetail WHERE hotel='$hotel'&& city='$city' && country='$country' && roomtype='$roomtype'";
  if ($conn->query($delsql) === TRUE) {
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }






  $delsql2 = "DELETE FROM disabletwin WHERE hotel='$hotel'&& location='$city' && country='$country' && roomtype='$roomtype'";
  if ($conn->query($delsql2) === TRUE) {
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }






  $twin = $_POST['twin'];
  $convertible = $_POST['convertible'];
  $disablefriendly = $_POST['disablefriendly'];

  $rn = $_POST['rn'];

  $accessibility = $_POST['accessibility'];

  $location = $_POST['location'];


  $bar = 0;

  foreach ($rn as $ar) {


    $sql2lau = "INSERT INTO disabletwindetail (hotel,city,country,roomtype,roomnumber,accessibility,location)
           VALUES ('$hotel','$city','$country','$roomtype','$rn[$bar]','$accessibility[$bar]','$location[$bar]')";

    $resulta2lau = $conn->query($sql2lau);


    if ($resulta2lau === TRUE) {
    }


    $bar = $bar + 1;
  }











  $sql2la = "INSERT INTO disabletwin (hotel,location,country,roomtype,twin,convertible,disablefriendly)
           VALUES ('$hotel','$city','$country','$roomtype','$twin','$convertible','$disablefriendly')";

  $resulta2la = $conn->query($sql2la);


  if ($resulta2la === TRUE) {
  }
}

?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Manage Inventory
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
  .accordion-button,
  .accordion-button:not(.collapsed) {
    color: #ce3435;
    background-color: #fff;
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
  }

  .accordion-button:after {
    color: #ce3435 !important;
    transform: rotate(0deg) !important;
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




<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

  <div class="ps-3">
    <h2 class="text-dark">View & Edit Inventory</h2>
  </div>
  <div class="ms-auto">
    <div class="btn-group">
      <a href='addinventoryNew.php' class="mx-2"><button class='btn btn-danger'><i class="bi bi-plus"></i> Add More Rooms</button>
        <a href='listofrooms.php'><button class='btn btn-danger'><i class="bi bi-list"></i> List Rooms</button></a>
    </div>
  </div>
</div>


<div>
  <div class="row">
    <?php

    $n = 0;

    $sqll = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {
      // output data of each row
      while ($roww = $resultt->fetch_assoc()) {
        $delid = $roww['id'];
        $tpname = $roww['type'];
    ?>
        <div class="col-md-3">
          <div class="card" style="position:relative;">

            <?php

            $tpe = $roww['type'];

            $sqllv = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$tpe'";
            $resulttv = $conn->query($sqllv);

            if ($resulttv->num_rows > 0) {
              // output data of each row
              while ($rowwv = $resulttv->fetch_assoc()) {
                $aid = $rowwv['id'];

            ?>
                <!-- <a href='del.php?tbl=hotelsInventoryImagesdatabase&aid=<?php echo $aid; ?>'><b><span style='font-size:2em; position:absolute; z-index:1; color:red;'>&times;</span></b> </a> -->

                <img class="card-img-top" style="height: 200px; object-fit:cover" src='../Room Uploads/<?php echo $hotel; ?>/<?php echo $tpe; ?>/<?php echo $rowwv['image']; ?>'>


            <?php
                break;
              }
            }
            ?>

            <div class="card-body">
              <h5 class="card-title"><?php echo $roww['type']; ?></h5>
              <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
              <a onclick="EditRoomModal('<?= $delid ?>','<?= $tpname ?>','<?= $hotel ?>','<?= $country ?>','<?= $city ?>',)" class="btn btn-danger" style="position:absolute; top:10px; right:10px; padding: 0px 4px 0px 0px;"><i class="bi bi-pencil-square"></i></a>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>

  <!-- 
  <div class="modal fade" id="EditRoomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body EditRoomModalContent">
       
    </div>
  </div>
</div> -->

  <div class="modal fade" id="EditRoomModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="position: relative; width: 80% !important; max-width: 100% !important;">
     
      <div class="modal-content pt-3" id="EditRoomModalContent">
        
      </div>
    </div>
  </div>










</div>






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
  $("#disablefriendly").change(function() {

    var friend = document.getElementById("disablefriendly").value;
    if (friend == 'Yes') {

      var dfr = document.getElementById("dfr");

      dfr.classList.add("col-sm");


      var y = document.createElement("label");
      y.innerHTML = 'No. of Disable Friendly Rooms';

      dfr.appendChild(y);

      var y2 = document.createElement("INPUT");
      y2.setAttribute('name', 'disablerooms');
      y2.setAttribute('class', 'form-control');

      dfr.appendChild(y2);





    } else {

      var dfr = document.getElementById("dfr");
      dfr.innerHTML = '';
      dfr.classList.remove("col-sm");



    }






  });

  $("#streaming").change(function() {

    var starm = document.getElementById("streaming").value;

    if (starm == 'Yes') {
      var strm = document.getElementById("strm");
      strm.classList.add("col-sm");



      var y = document.createElement("label");
      y.innerHTML = 'Streaming Source';

      strm.appendChild(y);

      var y2 = document.createElement("SELECT");
      y2.setAttribute('name', 'source');
      y2.setAttribute('class', 'form-control');


      var y3 = document.createElement("option");
      y3.setAttribute('label', 'Netflix');
      y3.setAttribute('text', 'Netflix');
      y3.setAttribute('value', 'Netflix');
      y2.appendChild(y3);




      var y4 = document.createElement("option");
      y4.setAttribute('label', 'Amazon Prime');
      y4.setAttribute('text', 'Amazon Prime');
      y4.setAttribute('value', 'Amazon Prime');
      y2.appendChild(y4);


      var y5 = document.createElement("option");
      y5.setAttribute('label', 'Local Cable');
      y5.setAttribute('text', 'Local Cable');
      y5.setAttribute('value', 'Local Cable');
      y2.appendChild(y5);


      var y6 = document.createElement("option");
      y6.setAttribute('label', 'Youtube');
      y6.setAttribute('text', 'Youtube');
      y6.setAttribute('value', 'Youtube');
      y2.appendChild(y6);








      strm.appendChild(y2);
    }

    if (starm == 'No') {

      var strm = document.getElementById("strm");
      strm.innerHTML = '';
      strm.classList.remove("col-sm");
    }


  });



  var nam = 1;
  $("#a").click(function() {
    nam = nam + 1;

    var y = document.createElement("INPUT");
    y.setAttribute("placeholder", "Room Type");
    y.setAttribute("class", "getadi form-control");
    y.setAttribute("Name", "facilitiess[]");
    y.setAttribute("id", "fac" + nam);
    y.setAttribute("data-id", nam);
    y.setAttribute("required", "true");

    var y2 = document.createElement("INPUT");
    y2.setAttribute("placeholder", "Room Type Description");
    y2.setAttribute("class", "form-control");
    y2.setAttribute("Name", "desfacilitiess[]");
    y2.setAttribute("required", "true");


    var y3 = document.createElement("INPUT");
    y3.setAttribute("type", "file");
    y3.setAttribute("class", "form-control");
    y3.setAttribute("Name", "filesfacilitiess" + nam + "[]");
    y3.setAttribute("multiple", "true");
    y3.setAttribute("required", "true");


    var y4 = document.createElement("tr");
    var y5 = document.createElement("td");
    var y6 = document.createElement("td");
    y4.appendChild(y5);
    y4.appendChild(y6);


    var y33 = document.createElement("INPUT");
    y33.setAttribute("class", "form-control");
    y33.setAttribute("Name", "type" + nam + "[]");
    y33.setAttribute("id", "type" + nam);
    y33.setAttribute("readonly", "true");


    var y34 = document.createElement("INPUT");
    y34.setAttribute("class", "form-control");
    y34.setAttribute("Name", "numbs[]");
    y34.setAttribute("id", "numbs" + nam);
    y34.setAttribute("required", "true");
    y34.setAttribute("min", "0");
    y34.setAttribute("type", "number");




    y5.appendChild(y33);
    y6.appendChild(y34);


    document.getElementById("myForm").appendChild(y);
    document.getElementById("myForm").appendChild(y2);
    document.getElementById("myForm").appendChild(y3);


    document.getElementById("lis").appendChild(y4);





  });
</script>

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

<!--kitchen-->
<script>
  document.getElementById("pds2").addEventListener("click", function(event) {
    event.preventDefault()
  });



  function addcardnew2() {
    var parent = document.getElementById("addnc2");

    var inpt = document.createElement('INPUT');
    inpt.setAttribute('name', 'cards2[]');


    parent.appendChild(inpt);

  }

  $("#all2").click(function(event) {

    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard2']");

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


<!--bathroom-->
<script>
  document.getElementById("pds3").addEventListener("click", function(event) {
    event.preventDefault()
  });



  function addcardnew3() {
    var parent = document.getElementById("addnc3");

    var inpt = document.createElement('INPUT');
    inpt.setAttribute('name', 'cards3[]');


    parent.appendChild(inpt);

  }

  $("#all3").click(function(event) {

    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard3']");

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

<!--discounted-->
<script>
  document.getElementById("pds4").addEventListener("click", function(event) {
    event.preventDefault()
  });


  /*
  function addcardnew4(){
     var parent=document.getElementById("addnc4");
     
     var inpt=document.createElement('INPUT');
     inpt.setAttribute('name','cards4[]');
     
     
     parent.appendChild(inpt);
      
  }*/

  $("#all4").click(function(event) {

    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard4']");

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

<!--Complimentary-->
<script>
  document.getElementById("pds5").addEventListener("click", function(event) {
    event.preventDefault()
  });



  function addcardnew5() {
    var parent = document.getElementById("addnc5");

    var inpt = document.createElement('INPUT');
    inpt.setAttribute('name', 'cards5[]');


    parent.appendChild(inpt);

  }

  $("#all5").click(function(event) {

    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard5']");

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




<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  function EditRoomModal(hotelID, typeName, hotel, country, city) {
    $('.loading').show();

    axios({
        method: 'get',
        url: './Ajax/getHotelRoomsModal.php?hotelID=' + hotelID + '&roomType=' + typeName + '&hotel=' + hotel + '&country=' + country + '&city=' + city + '',
        responseType: 'stream'
      })
      .then(function(response) {
        // alert(response);
        $('#EditRoomModalContent').html(response.data);
        setTimeout(function() {
          $('.loading').hide();
          $('#EditRoomModal').modal('show');
        }, 1000);


        // console.log(response);
      });
    // $('#EditRoomModal').modal('toggle');
  }
</script>
<?php endblock(); ?>