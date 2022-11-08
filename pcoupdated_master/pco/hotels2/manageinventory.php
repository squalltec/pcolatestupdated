<?php
require_once('db_connection.php');


include('header.php');








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















  $changerr = 'Change in Room: ' . $roomtype;

  /*                    
$sqlo ="UPDATE hotelsInventorydatabase SET inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',discountedfacilities='$discounted',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
*/



  $sqlo = "UPDATE hotelsInventorydatabase SET cancellationdays='$priordays',cancellationpercentage='$deductionprice',cancellationpolicy='$pols',inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";


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






<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--start content-->
<main class="page-content">



  <div class="form-group">


    <h2 style='margin-top:-50px;' align='center'>Manage Inventory</h2>


  </div>
  <div>

    <div class="form-group">










      <div class="row">
        <div class="col col-lg-9 mx-auto">

          <div class="card radius-10">
            <div class="card-body">
              <h5 class="card-title">Rooms</h5>
              <div class="my-3 border-top"></div>
              <div class="accordion" id="accordionExample">



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
                    <form action="#" method="post" enctype="multipart/form-data">



                      <input style='display:none;' name='iad' value='<?php echo $roww['id']; ?>'>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                            <label>Room:&nbsp; </label><br />
                            <input class='form-control' readonly value='<?php echo $roww['type']; ?>' id='type' name='type'>

                          </button>
                        </h2>
                        <div id="collapse<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">


                            <div class='container'>
                              <div class='row'>
                                <div class='col-sm'>

                                  <label>No. of Rooms:</label>
                                  <input type='number' value='<?php echo $roww['numberofrooms']; ?>' required min='0' class='form-control' id='numbs' name='numbs'>

                                </div>





                                <?php

                                $sqllra = "SELECT * FROM disabletwin WHERE hotel='$hotel' && country='$country' && location='$city'  && roomtype='$tpname'";
                                $resulttra = $conn->query($sqllra);

                                if ($resulttra->num_rows > 0) {
                                  // output data of each row
                                  while ($rowwra = $resulttra->fetch_assoc()) {

                                    $twin = $rowwra['twin'];
                                    $convertible = $rowwra['convertible'];
                                    $disablefriendly = $rowwra['disablefriendly'];
                                  }
                                }
                                ?>


                                <div class='col-sm'>

                                  <label>Total Twin Rooms:</label>
                                  <input type='number' value='<?php echo $twin; ?>' required min='0' class='form-control' id='' name='twin'>

                                </div>

                                <div class='col-sm'>

                                  <label>Convertible to Twin:</label>
                                  <input type='number' value='<?php echo $convertible; ?>' required min='0' class='form-control' id='' name='convertible'>

                                </div>

                                <div class='col-sm'>

                                  <label>Disable Friendly:</label>
                                  <input type='number' value='<?php echo $disablefriendly; ?>' required min='0' class='form-control' id='' name='disablefriendly'>

                                </div>


                              </div>
                            </div>











                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                <?php
                                if ($roww['suite'] != 'on') {
                                ?> <label>Single </label><br />
                                <?php
                                } else {
                                ?>
                                  <label>Details</label>
                                <?php
                                }
                                ?>

                              </button>
                            </h2>



                            <div id="collapseal<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample22">
                              <div class="accordion-body">


                                <label>Room Description:</label>
                                <textarea required class='form-control' id='des' name='singledes'><?php echo $roww['singledescription']; ?></textarea>
                                <br /><br />


                                <div class="container">
                                  <div class='row'>
                                    <div class="col-sm">
                                      <label>Maximum Occupancy</label><br />
                                      <label>Adults:</label>
                                      <input class='form-control' type='number' required name='singleadults' value='<?php echo $roww['singleadultoccupancy']; ?>' placeholder='Adults'>
                                    </div>

                                    <div class="col-sm">
                                      <label style='color:white;'>Maximum Occupancy</label><br />
                                      <label>Children:</label>

                                      <input class='form-control' type='number' name='singlechildren' value='<?php echo $roww['singlechildoccupancy']; ?>' placeholder='Children'>
                                    </div>
                                  </div>
                                </div>


                                <br />





                              </div>
                            </div>





                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal23<?php echo $n; ?>" aria-expanded="false" aria-controls="collapse<?php echo $n; ?>">
                                <label>Disable Friendly Rooms</label><br />

                              </button>
                            </h2>

                            <div id="collapseal23<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample222">
                              <div class="accordion-body">

                                <?php

                                $sqllraza = "SELECT * FROM disabletwindetail WHERE hotel='$hotel' && country='$country' && city='$city'  && roomtype='$tpname'";
                                $resulttraza = $conn->query($sqllraza);

                                if ($resulttraza->num_rows > 0) {
                                ?>
                                  <div class='row'>
                                    <div class='col-sm'>
                                      <label>
                                        Room Number
                                      </label>
                                    </div>
                                    <div class='col-sm'>
                                      <label>
                                        Accessibility
                                      </label>
                                    </div>
                                    <div class='col-sm'>
                                      <label>
                                        Location
                                      </label>
                                    </div>
                                  </div>
                                  <?php
                                  // output data of each row
                                  while ($rowwraza = $resulttraza->fetch_assoc()) {
                                  ?>


                                    <div class='row'>
                                      <div class='col-sm'>
                                        <input class='form-control' name='rn[]' value='<?php echo $rowwraza['roomnumber']; ?>'>

                                      </div>
                                      <div class='col-sm'>
                                        <input class='form-control' name='accessibility[]' value='<?php echo $rowwraza['accessibility']; ?>'>
                                      </div>
                                      <div class='col-sm'>
                                        <input class='form-control' name='location[]' value='<?php echo $rowwraza['location']; ?>'>
                                      </div>
                                    </div>


                                <?php
                                  }
                                }
                                ?>




                              </div>
                            </div>








                            <?php
                            if ($roww['suite'] != 'on') {
                            ?>

                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                  <label>Double</label><br />

                                </button>
                              </h2>
                            <?php
                            }
                            ?>



                            <div id="collapseal2<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample222">
                              <div class="accordion-body">







                                <label>Room Description:</label>
                                <textarea required class='form-control' id='des' name='doubledes'><?php echo $roww['doubledescription']; ?></textarea>
                                <br /><br />


                                <div class="container">
                                  <div class='row'>
                                    <div class="col-sm">
                                      <label>Maximum Occupancy</label><br />
                                      <label>Adults:</label>
                                      <input class='form-control' type='number' required name='doubleadults' value='<?php echo $roww['doubleadultoccupancy']; ?>' placeholder='Adults'>
                                    </div>

                                    <div class="col-sm">
                                      <label style='color:white;'>Maximum Occupancy</label><br />
                                      <label>Children:</label>

                                      <input class='form-control' type='number' name='doublechildren' value='<?php echo $roww['doublechildoccupancy']; ?>' placeholder='Children'>
                                    </div>
                                  </div>
                                </div>


                                <br />
















                              </div>
                            </div>

                            <!--  //extras end-->







                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal22<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                <label>Amenities</label><br />

                              </button>
                            </h2>





                            <div id="collapseal22<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                              <div class="accordion-body">

                                <h2 style='' align='center'>In Room Facilities</h2>

                                <div>


                                  <div id='cardslist' class="container">
                                    <div class='row'>

                                      <div class="col-sm">

                                        <div class="form-group">

                                          <label for='all'>Select All</label>
                                          <input id='all' name='all' type='checkbox'><br />




                                          <?php
                                          $string = $roww['inroomfacilities'];
                                          $str_arr = preg_split("/\,/", $string);


                                          $sqlv = "SELECT * FROM hotelsdatabaseinroomfacilities";
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
                                          } ?>



                                          <nonsense id='addnc'>

                                          </nonsense>


                                          <input type='submit' id='pds' onclick='addcardnew()' value='+'>

                                        </div>

                                      </div>
                                    </div>
                                  </div>






                                  <br /><br />




                                  <h2 align='center'>Kitchen Facilities</h2>
                                  <div id='cardslist' class="container">
                                    <div class='row'>

                                      <div class="col-sm">

                                        <div class="form-group">

                                          <label for='all2'>Select All</label>
                                          <input id='all2' name='all' type='checkbox'><br />



                                          <?php
                                          $string = $roww['kitchenfacilities'];
                                          $str_arr = preg_split("/\,/", $string);


                                          $sqlv = "SELECT * FROM hotelsdatabasekitchenfacilities";
                                          $resultv = $conn->query($sqlv);

                                          if ($resultv->num_rows > 0) {
                                            // output data of each row
                                            while ($rowv = $resultv->fetch_assoc()) {

                                              $nmcr = $rowv['name'];



                                              if (strpos($string, $nmcr) !== false) {

                                          ?>
                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input checked id="alertcard2" name='cards2[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;



                                              <?php
                                              } else {
                                              ?>
                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input id="alertcard2" name='cards2[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;


                                              <?php
                                              }

                                              ?>





                                          <?php



                                            }
                                          } ?>






                                          <nonsense id='addnc2'>

                                          </nonsense>


                                          <input type='submit' id='pds2' onclick='addcardnew2()' value='+'>

                                        </div>

                                      </div>
                                    </div>
                                  </div>






                                  <br /><br />




                                  <h2 align='center'>Private Bathroom Facilities</h2>
                                  <div id='cardslist' class="container">
                                    <div class='row'>

                                      <div class="col-sm">

                                        <div class="form-group">

                                          <label for='all3'>Select All</label>
                                          <input id='all3' name='all' type='checkbox'><br />

                                          <?php
                                          $string = $roww['privatebathroomfacilities'];
                                          $str_arr = preg_split("/\,/", $string);


                                          $sqlv = "SELECT * FROM hotelsdatabaseprivatebathroomfacilities";
                                          $resultv = $conn->query($sqlv);

                                          if ($resultv->num_rows > 0) {
                                            // output data of each row
                                            while ($rowv = $resultv->fetch_assoc()) {

                                              $nmcr = $rowv['name'];



                                              if (strpos($string, $nmcr) !== false) {

                                          ?>

                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input checked id="alertcard3" name='cards3[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;



                                              <?php
                                              } else {
                                              ?>

                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input id="alertcard3" name='cards3[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;



                                              <?php
                                              }

                                              ?>





                                          <?php



                                            }
                                          } ?>





                                          <nonsense id='addnc3'>

                                          </nonsense>


                                          <input type='submit' id='pds3' onclick='addcardnew3()' value='+'>

                                        </div>

                                      </div>
                                    </div>
                                  </div>















                                  <br /><br />


                                  <!--
  <h2 align='center'>Discounted Facilities</h2>
     <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='all4'>Select All</label>
       <input id='all4' name='all' type='checkbox'><br/>
         

 <?php
                    $string = $roww['discountedfacilities'];
                    $str_arr = preg_split("/\,/", $string);


                    $sqlv = "SELECT * FROM hotelsdatabasediscountedfacilities";
                    $resultv = $conn->query($sqlv);

                    if ($resultv->num_rows > 0) {
                      // output data of each row
                      while ($rowv = $resultv->fetch_assoc()) {

                        $nmcr = $rowv['name'];



                        if (strpos($string, $nmcr) !== false) {

  ?>

  <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
       <input checked id="alertcard4" name='cards4[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
   
   <?php
                        } else {
    ?>
     
      <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
       <input id="alertcard4" name='cards4[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       
      
  <?php
                        }

  ?>

 



<?php



                      }
                    } ?>

      
       
     

<nonsense id='addnc4'>
    
</nonsense>


<input type='submit' id='pds4' onclick='addcardnew4()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  <br/><br/>
  
  -->








                                  <h2 align='center'>Complimentary Facilities</h2>
                                  <div id='cardslist' class="container">
                                    <div class='row'>

                                      <div class="col-sm">

                                        <div class="form-group">

                                          <label for='all5'>Select All</label>
                                          <input id='all5' name='all' type='checkbox'><br />




                                          <?php
                                          $string = $roww['complimentaryfacilities'];
                                          $str_arr = preg_split("/\,/", $string);


                                          $sqlv = "SELECT * FROM hotelsdatabasecomplimentaryfacilities";
                                          $resultv = $conn->query($sqlv);

                                          if ($resultv->num_rows > 0) {
                                            // output data of each row
                                            while ($rowv = $resultv->fetch_assoc()) {

                                              $nmcr = $rowv['name'];



                                              if (strpos($string, $nmcr) !== false) {

                                          ?>

                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input checked id="alertcard5" name='cards5[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;

                                              <?php
                                              } else {
                                              ?>

                                                <label for='<?php echo $rowv['name']; ?>'><?php echo $rowv['name']; ?></label>
                                                <input id="alertcard5" name='cards5[]' type='checkbox' class='' value='<?php echo $rowv['name']; ?>'>

                                                &nbsp;&nbsp; &nbsp;&nbsp;


                                              <?php
                                              }

                                              ?>





                                          <?php



                                            }
                                          } ?>







                                          <nonsense id='addnc5'>

                                          </nonsense>


                                          <input type='submit' id='pds5' onclick='addcardnew5()' value='+'>

                                        </div>

                                      </div>
                                    </div>
                                  </div>




                                  <br /><br />











                                </div>
                              </div>





                            </div>




                            <!--Cancellation Policies-->










                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal2o2<?php echo $n; ?>" aria-expanded="true" aria-controls="collapse<?php echo $n; ?>">
                                <label>Cancellation Policy</label><br />

                              </button>
                            </h2>





                            <div id="collapseal2o2<?php echo $n; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2222">
                              <div class="accordion-body">

                                <?php

                                $priordays = $roww['cancellationdays'];
                                $deductionprice = $roww['cancellationpercentage'];



                                $names = explode('_@_', $roww['cancellationpoliciesnames']);
                                $policies = explode('_@_', $roww['cancellationpolicy']);
                                $o = 0;
                                ?>
                                <label>Cancellation Prior Days</label>
                                <input name='priordays' class='form-control' value='<?php echo $priordays; ?>'>
                                <label>Cancellation Percentage Deduction</label>
                                <input name='deductionprice' class='form-control' value='<?php echo $deductionprice; ?>'>
                                <?php
                                foreach ($names as $n) {
                                ?>
                                  <label><?php echo $n; ?></label>
                                  <textarea class='form-control' name='policies[]' placeholder='Cancellation Policy'><?php echo $policies[$o]; ?></textarea>
                                <?php
                                  $o = $o + 1;
                                }
                                ?>

                              </div>
                            </div>
















                            <br />

                            <label>Room Images:</label><br />

                            <?php

                            $tpe = $roww['type'];

                            $sqllv = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hotel' && country='$country' && location='$city' && type='$tpe'";
                            $resulttv = $conn->query($sqllv);

                            if ($resulttv->num_rows > 0) {
                              // output data of each row
                              while ($rowwv = $resulttv->fetch_assoc()) {
                                $aid = $rowwv['id'];

                            ?>

                                <a href='del.php?tbl=hotelsInventoryImagesdatabase&aid=<?php echo $aid; ?>'><b><span style='font-size:2em; position:absolute; z-index:1; color:red;'>&times;</span></b> </a>

                                <img style="width:100px;" src='../Room Uploads/<?php echo $hotel; ?>/<?php echo $tpe; ?>/<?php echo $rowwv['image']; ?>'>

                            <?php

                              }
                            }
                            ?><br /><br />

                            <label>Add More Images:</label><br />

                            <input type="file" multiple='true' class="form-control" name="files[]">






                            <div class="form-group">
                              <br /><br />
                              <a href='del.php?tbl=hotelsInventorydatabase&aid=<?php echo $delid; ?>'><button style="float:left;" class="btn btn-danger">Delete</button></a>


                              <button style="float:right;" type="submit" name='submit' class="btn btn-danger">Update</button>
                            </div>
                            <br />


                          </div>

                        </div>
                      </div>


                    </form>


                <?php
                    $n = $n + 1;
                  }
                }
                ?>
                <input style='display:none;' name='counter' value='<?php echo $n; ?>'>

              </div>
            </div>
          </div>



        </div>
      </div>
      <!--end row-->










    </div>






  </div>






  <br />
  <br />
  <p align='center'><a href='addinventoryNew.php'><button class='btn btn-danger'>Add More Rooms</button></a></p>
  <p align='center'><a href='listofrooms.php'><button class='btn btn-danger'>List Rooms</button></a></p>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <script>

  </script>







  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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























  













</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>