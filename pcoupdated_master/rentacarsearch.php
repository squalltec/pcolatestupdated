<?php

session_start();

include 'db_connection.php';
include 'header.php';
// var_dump($_SESSION);



$flightnumb1 = $_SESSION['flightnumb1'];
$flightnumb2 = $_SESSION['flightnumb2'];
$pickordelivery = $_SESSION['pickordelivery'];




$country = $_SESSION['country'];
$city = $_SESSION['city'];
$dropofflocation = $_SESSION['dropofflocation'];
$dropofftime = $_SESSION['dropofftime'];
$dropoffdate = $_SESSION['dropoffdate'];
$pickuplocation = $_SESSION['pickuplocation'];
$pickupdate = $_SESSION['pickupdate'];
$pickuptime = $_SESSION['pickuptime'];
$vehicle_type = $_SESSION['vehicle_type'];

$sdate = $_SESSION['pickupdate'];
$edate = $_SESSION['dropoffdate'];



$to_time = strtotime($pickuptime);
$from_time = strtotime($dropofftime);





$startTimeStamp = date($pickupdate);
$endTimeStamp = date($dropoffdate);



$timeDiff = $endTimeStamp - $startTimeStamp;

$numberDayszul = $timeDiff;  // 86400 seconds in one day


//echo $numberDayszul;
//echo '<br/><br/><br/><br/>';



if ($pickuptime > $dropofftime) {
} else {

  $numberDayszul = $numberDayszul + 1;
}


// echo $pickuptime;

// echo $pickupdate;

// echo $dropofftime;

// echo $dropoffdate;
//echo $numberDayszul;

$totaldays = $numberDayszul;



if (isset($_POST['modify'])) {







  $_SESSION['flightnumb1'] = $_POST['flightnumb1'];
  $_SESSION['flightnumb2'] = $_POST['flightnumb2'];
  $_SESSION['pickordelivery'] = $_POST['pickordelivery'];



  $_SESSION['country'] = $_POST['country'];
  $_SESSION['city'] = $_POST['city'];
  $_SESSION['dropofflocation'] = $_POST['dropofflocation'];
  $_SESSION['dropofftime'] = $_POST['dropofftimen'];
  $_SESSION['dropoffdate'] = $_POST['dropoffdate'];
  $_SESSION['pickuplocation'] = $_POST['pickuplocation'];
  $_SESSION['pickupdate'] = $_POST['pickupdate'];
  $_SESSION['pickuptime'] = $_POST['pickuptimen'];






  $startTimeStamp = date($pickupdate);
  $endTimeStamp = date($dropoffdate);



  $timeDiff = $endTimeStamp - $startTimeStamp;

  $numberDayszul = $timeDiff;  // 86400 seconds in one day


  //echo $numberDayszul;
  //echo '<br/><br/><br/><br/>';



  if ($pickuptime > $dropofftime) {
  } else {

    $numberDayszul = $numberDayszul + 1;
  }



  $totaldays = $numberDayszul;
  $_SESSION['totaldaysrent'] = $totaldays;

  echo "<script>location.replace('rentacarsearch.php');</script>";
}



if (isset($_POST['submit'])) {
  $_SESSION['aid'] = $_POST['aid'];
  $_SESSION['brand'] = $_POST['brand'];
  $_SESSION['model'] = $_POST['model'];
  $_SESSION['year'] = $_POST['year'];
  $_SESSION['singleprice'] = $_POST['singleprice'];
  $_SESSION['totalprice'] = $_POST['totalprice'];

  $_SESSION['deliveryperday'] = $_POST['deliveryperday'];



  $startTimeStamp = date($pickupdate);
  $endTimeStamp = date($dropoffdate);



  $timeDiff = $endTimeStamp - $startTimeStamp;

  $numberDayszul = $timeDiff;  // 86400 seconds in one day


  //echo $numberDayszul;
  //echo '<br/><br/><br/><br/>';



  if ($pickuptime > $dropofftime) {
  } else {

    $numberDayszul = $numberDayszul + 1;
  }



  $totaldays = $numberDayszul;
  $_SESSION['totaldaysrent'] = $totaldays;













  if ($_SESSION['fromhotel'] == '1') {
    echo "<script>location.replace('rentacarbookingsummarynew.php');</script>";
  } else {
    echo "<script>location.replace('rentacarbookingsummary.php');</script>";
  }
}







$hotornot = true;

$dhotornot = true;

$parea = '';

$darea = '';









if ($_SESSION['pickordelivery'] == 'Delivery') {


  $dpl = $_SESSION['dropofflocation'];

  $pul = $_SESSION['pickuplocation'];




  $sql = "SELECT * FROM destination WHERE country='$country' && city='$city'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      $aras = $row['areas'];
      $araras = explode(',', $aras);

      foreach ($araras as $rr) {

        if ($rr == $pul) {
          // echo 'asdasdasd';

          $hotornot = false;

          $parea = $rr;
        }
      }
    }
  }








  if ($hotornot != false) {



    $sql = "SELECT * FROM hotelsdatabase WHERE country='$country' && city='$city' && name='$pul'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {


        $parea = $row['area'];
      }
    }
  }

  //dropoffffffff









  $sql = "SELECT * FROM destination WHERE country='$country' && city='$city'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      $aras = $row['areas'];
      $araras = explode(',', $aras);

      foreach ($araras as $rr) {


        if ($rr == $dpl) {


          $dhotornot = false;

          $darea = $rr;
        }
      }
    }
  }








  if ($dhotornot != false) {



    $sql = "SELECT * FROM hotelsdatabase WHERE country='$country' && city='$city' && name='$dpl'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {


        $darea = $row['area'];
      }
    }
  }
}











?>



<link rel="icon" type="image/x-icon" href="img/logo.png">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="styles/appp.css"> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">     -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
<link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">

<script>
  $(window).load(function() {
    // Animate loader off screen
    // $(".se-pre-con").fadeOut("slow");;
  });
</script>

<style>
  /* Paste this css to your style sheet file or under head tag */

  /* This only works with JavaScript, 
          if it's not present, don't show loader */
  *:not(.stylenotneeded) {
    font-family: sans-serif !important;
    font-weight: normal !important;
  }

  .no-js #loader {
    display: none;
  }

  .js #loader {
    display: block;
    position: absolute;
    left: 100px;
    top: 0;
  }

  .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
  }

  /* Muazzam's CSS NEW */

  .page_searchbox {
    background-color: white !important;
  }



  .styled-checkbox {
    position: absolute;
    opacity: 0;
  }

  .styled-checkbox+label {
    position: relative;
    cursor: pointer;
    padding: 0;
  }

  .styled-checkbox+label:before {
    content: "";
    margin-right: 5px;
    margin-top: 0;
    display: inline-block;
    vertical-align: text-top;
    width: 14px;
    height: 14px;
    background: white;
    border: 1px solid red;
  }

  .styled-checkbox:hover+label:before {
    background: #DC3545;
  }

  .styled-checkbox:focus+label:before {
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
  }

  .styled-checkbox:checked+label:before {
    background: #DC3545;
  }

  .styled-checkbox:disabled+label {
    color: #b8b8b8;
    cursor: auto;
  }

  .styled-checkbox:disabled+label:before {
    box-shadow: none;
    background: #ddd;

  }

  .styled-checkbox:checked+label:after {
    content: "";
    position: absolute;
    left: 2px;
    top: 7px;
    background: white;
    width: 2px;
    height: 2px;
    box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
    transform: rotate(45deg);
  }

  .search_submit_rent_a_car {
    padding-top: 25px;
    position: relative;
  }

  .carsList {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px 0px;
    width: 100%;
    margin-bottom: 10px;
  }

  .carsList:hover {
    box-shadow: 1px 5px 19px -2px rgb(165 9 25 / 40%);
  }

  .room_box_img {
    border-radius: 7px;
    overflow: hidden;
    width: 234px;
    height: 160px;
    position: relative;
  }

  .room_box_img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  @media screen and (max-width: 992px) {
    .page_searchbox .search_submit {
      width: 100%;
      margin-top: 0 !important;
      padding-left: 0 !important;
      margin-left: 2px !important;
      padding-bottom: 20px;
    }

    .btnCarSearch {
      width: 98% !important;
    }

    #datessy {
      width: 103% !important;
    }

    .imageBox {
      padding-bottom: 20px;
    }
  }

  .daterangepicker select.hourselect,
  .daterangepicker select.minuteselect,
  .daterangepicker select.secondselect,
  .daterangepicker select.ampmselect {

    width: 50px;
    margin: 0 auto;
    background: #DE3545;
    border: 1px solid #eee;
    padding: 2px;
    outline: 0;
    font-size: 12px;
    color: white;
  }

  .imageBox {
    min-width: 240px;
    border-right: 1px solid #ddd;
  }

  .priceSec {
    border-left: 1px solid #ddd;
    padding-top: 20px;
  }

  .colorIcon {
    height: 25px;
    width: 25px;
    border: 1px solid #ce3435;
    border-radius: 50%;
    margin-right: 5px;
  }

  .colorIcon:hover {
    box-shadow: 1px 5px 19px -2px rgb(165 9 25 / 40%);
  }

  .ModelBox {
    color: red;
    border: 1px solid #ce3435;
    width: 90px;
    /* padding: 5px; */
    text-align: center;
    /* margin-top: 5px; */
    margin-top: 5px;
    margin-left: 13px;
    margin-bottom: 5px;
  }

  .ModelBox:hover {
    background: red;
    color: white;
  }

  .bi-check-circle-fill {
    color: red;
  }

  .bookNewBtn {
    background-color: #DC3545;
    /* Blue background */
    border: none;
    /* Remove borders */
    color: white;
    /* White text */
    padding: 10px 10px;
    /* Some padding */
    font-size: 15px;
    /* Set a font size */
    cursor: pointer;
  }

  .bookNewBtn:hover {
    background-color: white !important;
    border: 1px solid #DC3545;
  }

  .viewEyeIcon {
    position: absolute;
    right: 5px;
    color: white;
    font-size: 20px;
    background-color: rgba(255, 0, 0, 0.4) !important;
    padding-left: 5px !important;
    padding-right: 5px !important;
    border-radius: 5px !important;
    bottom: 5px !important;
  }

  .viewEyeIcon:hover {
    background: rgba(255, 255, 255, 0.9) !important;
    color: #ce3435;
    font-size: 22px;
    cursor: pointer;
  }
</style>



<!-- <div style='background-color:black;' class="se-pre-con"> <center><img style='width:400px; margin-top:400px;' src='loadme.gif'></center> </div> -->


<!--main part-->

<div class="container" id="app">

  <section class="page_searchbox">



















    <div class=" px-3">
      <div class="search_box">
        <form class='notranslate' method="POST" action='#'>



          <style>
            .switch {
              position: relative;
              display: inline-block;
              width: 50px;
              height: 25px;
            }

            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }

            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: black;
              -webkit-transition: .4s;
              transition: .4s;
            }

            .slider:before {
              position: absolute;
              content: "";
              height: 16px;
              width: 16px;
              left: 4px;
              bottom: 5px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }

            input:checked+.slider {
              background-color: #dc3545;
            }

            input:focus+.slider {
              box-shadow: 0 0 1px #2196F3;
            }

            input:checked+.slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }

            .slider.round:before {
              border-radius: 50%;
            }

            .clockpicker-tick.active,
            .clockpicker-tick:hover {
              background-color: #ce3435 !important;
              color: white;
            }

            .clockpicker-tick.active+.clockpicker-canvas-bg {
              background-color: rgba(255, 0, 0, 0.4);
            }

            .clockpicker-canvas line {
              stroke: #ce3435 !important;

            }

            .clockpicker-canvas-bearing,
            .clockpicker-canvas-fg {
              stroke: none;
              fill: #ce3435;
            }

            .daterangepick {
              padding-right: 50px !important;
              padding-left: 45px !important;
            }

            .page_searchbox .search_box .form-select {
              height: 38px !important;
              width: 100%;
            }
          </style>



          <div style='position:inline; margin-top:-20px; margin-bottom:20px; text-align:center;'>
            <span id='dela1' style='display:none; color:#dc3545;'>*Deliveries are only limited to hotels*</span>
            Pick Up
            &nbsp;&nbsp;
            <label style='margin:0 auto;' class="switch">

              <?php

              if ($pickordelivery == 'Delivery') {
              ?>
                <input value='round' checked id='sldr' onchange='changeways(this)' type="checkbox">
              <?php
              } else {
              ?>
                <input value='round' id='sldr' onchange='changeways(this)' type="checkbox">
              <?php
              }
              ?>


              <span class="slider round"></span>

            </label>
            &nbsp;&nbsp;
            Delivery


          </div>



          <input style='display:none;' value='<?php echo $pickordelivery; ?>' name='pickordelivery' id='pickordelivery'>
          <div class="c">
            <div class="row">


              <div class="col-md col-sm mb-3 mb-lg-0 pe-0">
                <select id="country" name='country' class="form-select">
                  <option selected><?php echo $_SESSION['country']; ?></option>

                </select>
              </div>
              <input id='cita' style='display:none;' value='<?php echo $_SESSION['city']; ?>'>
              <input id='countra' style='display:none;' value='<?php echo $_SESSION['country']; ?>'>
              <div class="col-md col-sm mb-3 mb-lg-0 pe-0">
                <select id="city" name='city' class="form-select">
                  <option selected value=''><?php echo $_SESSION['city']; ?></option>
                </select>
              </div>
            </div>




            <div class="row pt-2">
              <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 mb-3 mb-lg-0  CalenderDiv">
                <style>
                  .drp-selected {
                    border: 1px solid #dc3545;
                    border-radius: 25px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    padding-left: 2px;
                    padding-right: 2px;
                    float: left;

                  }

                  .month {
                    background-color: #dc3545;
                    color: white;
                  }

                  .start-date {
                    background-color: #dc3545 !important;
                  }

                  .end-date {
                    background-color: #dc3545 !important;
                  }
                </style>
                <!-- <label style='color: gray;'>Pickup - Drop Off Date</label> -->
                <!-- <label style='color: gray;'></label> -->
                <div style='text-align:center;' class='col-sm calender'>

                  <style>
                    .applyBtn {
                      background-image: linear-gradient(45deg, #dc3545 0%, black 100%) !important;
                      float: right;
                      max-width: 200px !important;
                      font-size: 16px;
                      font-family: "Poppins", sans-serif;
                      text-transform: capitalize;
                      padding: 18px 45px;
                      border-radius: 45px;
                      font-weight: 500;
                      border: 1px solid;
                      /* position: relative; */
                      z-index: 1;
                      transition: .3s ease-in;
                      overflow: hidden;
                    }
                  </style>

                  <!--<label >Check In - Check Out</label>-->
                  <!--  <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-calendar iconzz "></i> -->

                  <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text" value='<?php echo $_SESSION['pickupdate'] . "-" . $_SESSION['pickupdate']; ?>' placeholder='Check In - Check Out' name="datefilter" />
                  <script>
                    $(function() {

                      setTimeout(() => {
                        var today = new Date();

                        var Star_Date = document.getElementById('pickupdate').value;
                        var End_Date = document.getElementById('dropoffdate').value;


                        // star_dateFormated = String(today.getDay()).padStart(2, '0') + '/' + String(today.getMonth()).padStart(2, '0') + '/' + today.getFullYear();
                        // document.getElementById('pickupdate').value = star_dateFormated;
                        // document.getElementById('dropoffdate').value = end_dateFormated;


                        $('input[name="datefilter"]').val(Star_Date + ' - ' + End_Date);
                        $('input[name="datefilter"]').daterangepicker({
                          opens: 'left',
                          autoUpdateInput: false,
                          // timePicker: true,
                          timePickerIncrement: 30,
                          startDate: Star_Date,
                          endDate: End_Date,
                          locale: {
                            format: 'DD/MM/YYYY',
                            cancelLabel: 'Clear'
                          }
                        }, function(start, end, label) {
                          //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));




                        });
                      }, 1000);

                    });
                  </script>


                  <script type="text/javascript">
                    $(function() {

                      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                        var sd = picker.startDate.format('DD/MM/YYYY');
                        var ed = picker.endDate.format('DD/MM/YYYY');

                        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

                        document.getElementById('pickupdate').value = sd;

                        document.getElementById('dropoffdate').value = ed;


                        // $.ajax({

                        //     type: 'POST',
                        //     url: 'calculatedays.php',
                        //     data: {
                        //         'sdt': picker.startDate.format('DD-MM-YYYY'),
                        //         'edt': picker.endDate.format('DD-MM-YYYY')
                        //     },

                        //     success: function(result) {
                        //         // alert(result);
                        //         document.getElementById('nights').value = result;

                        //     }

                        // });

                      });

                      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                      });

                    });
                  </script>

                </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 mb-3 mb-lg-0 ">
                <!-- <label style='color: gray;'>Pickup Time</label> -->
                <!-- <label style='color: gray;'></label> -->
                <input type="text" name="pickuptimen" class="form-control" placeholder="" value="<?= $_SESSION['pickuptime'] ?>">


                <script>
                  $("input[name=pickuptimen]").clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    default: 'now',
                    donetext: "Select",
                    init: function() {
                      console.log("colorpicker initiated");
                    },
                    beforeShow: function() {
                      console.log("before show");
                    },
                    afterShow: function() {
                      console.log("after show");
                    },
                    beforeHide: function() {
                      console.log("before hide");
                    },
                    afterHide: function() {
                      console.log("after hide");
                    },
                    beforeHourSelect: function() {
                      console.log("before hour selected");
                    },
                    afterHourSelect: function() {
                      console.log("after hour selected");
                    },
                    beforeDone: function() {
                      console.log("before done");
                    },
                    afterDone: function() {
                      console.log("after done");
                    }
                  });
                </script><!-- <div id="timePicker"></div> -->
                <!-- <input style='text-align:center;  color:#dc3545;' type="time" name='pickuptime' class='form-control' placeholder='Pickup Time'> -->
              </div>

              <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 mb-3 mb-lg-0 pe-0">
                <!-- <i style='font-size:1.2em; margin-top:10px; margin-left:10px;' class="stylenotneeded fa fa-search"></i> -->
                <!-- <label style='color: gray;'>Drop off Time</label> -->
                <!-- <label style='color: gray;'></label> -->
                <!-- <div id="timePicker2"></div> -->
                <input type="text" name="dropofftimen" class="form-control" placeholder="" value="<?= $_SESSION['dropofftime'] ?>">


                <script>
                  $("input[name=dropofftimen]").clockpicker({
                    placement: 'bottom',
                    align: 'left',
                    autoclose: true,
                    default: 'now',
                    donetext: "Select",
                    init: function() {
                      // console.log("colorpicker initiated");
                    },
                    beforeShow: function() {
                      // console.log("before show");
                    },
                    afterShow: function() {
                      // console.log("after show");
                    },
                    beforeHide: function() {
                      // console.log("before hide");
                    },
                    afterHide: function() {
                      // console.log("after hide");
                    },
                    beforeHourSelect: function() {
                      // console.log("before hour selected");
                    },
                    afterHourSelect: function() {
                      // console.log("after hour selected");
                    },
                    beforeDone: function() {
                      // console.log("before done");
                    },
                    afterDone: function() {
                      // console.log("after done");
                    }
                  });
                </script>
                <!-- <input style='text-align:center; color:#dc3545;' type="time" name='dropofftime' class='form-control'  placeholder='Drop Off time'> -->
              </div>

              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding-right: 0px;">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                  <!-- <label style='color: gray;'>Select Type</label> -->
                  <!-- <label style='color: gray;'></label> -->
                  <select style='color:#dc3545; text-align:center;' id="city2" name='vehicle_type' class="form-select">
                    <option disabled selected>Vehicle Type</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Sports Car">Sports Car</option>
                    <option value="Station Wagon">Station Wagon</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Convertable">Convertable</option>
                    <option value="SUV">SUV</option>
                    <option value="Mini van">Mini van</option>
                    <option value="Busses">Busses</option>
                  </select>
                </div>
              </div>


            </div>
            <div class="row pt-2">
              <div class="col-md col-sm mb-3 mb-lg-0 pe-0">
                <input list='locations' id="pickmeup" name='pickuplocation' value='<?php echo $_SESSION['pickuplocation']; ?>' class="form-select">
                <datalist id='locations'>
                </datalist>
              </div>


              <div class="col-md col-sm mb-3 mb-lg-0 pe-0 ">

                <input id="flightnumb1" name='flightnumb1' placeholder='Flight #' value='<?php echo $flightnumb1; ?>' class="form-select">

              </div>

              <div class="col-md col-sm mb-3 mb-lg-0 pe-0">

                <input list='locations' id="dropmeup" name='dropofflocation' value='<?php echo $_SESSION['dropofflocation']; ?>' class="form-select">

              </div>

              <div class="col-md col-sm mb-3 mb-lg-0 pe-0">

                <input id="flightnumb2" name='flightnumb2' placeholder='Flight #' value='<?php echo $flightnumb2; ?>' class="form-select">


              </div>









              <div class="col-lg-1 col-md-6 col-sm-12 col-xs-12 mb-3 mb-lg-0 search_submit search_submit_rent_a_car">
                <button style='position:absolute; right:0; bottom: 0px;width: 90%;height: 38px; padding: 0px;' id='donotclick' onclick="myFunction()" class="btn btn-primary btnCarSearch"><i class="bi bi-search"></i></button>

                <button style='display:none;' id='clickmodify' type="submit" name='modify' class="btn btn-primary"><i class="bi bi-search"></i></button>

              </div>
            </div>
          </div>
          <div class='row' style="display:none;">
            <div class="col-4 col-sm-2 mb-3 mb-lg-0 pe-0">
              <label style='color:#D3D3D3;'>Date</label>
              <input style='height:49px;' id="pickupdate" name='pickupdate' value='<?php echo $_SESSION['pickupdate']; ?>' class='form-control'>
            </div>
            <div class="col-4 col-sm-2 mb-3 mb-lg-0 pe-0">
              <label style='color:#D3D3D3;'>Time</label>
              <input style='height:49px;' id="pickuptime" name='pickuptime' value='<?php echo $_SESSION['pickuptime']; ?>' class='form-control'>
            </div>

            <div class="col-4 col-sm-2 mb-3 mb-lg-0 pe-0">
              <label style='color:#D3D3D3;'>Date</label>
              <input style='height:49px;' id="dropoffdate" name='dropoffdate' value='<?php echo $_SESSION['dropoffdate']; ?>' class='form-control'>
            </div>

            <div class="col-4 col-sm-2 mb-3 mb-lg-0 pe-0">
              <label style='color:#D3D3D3;'>Time</label>
              <input style='height:49px;' id="dropofftime" name='dropofftime' value='<?php echo $_SESSION['dropofftime']; ?>' class='form-control'>
            </div>




          </div>



        </form>
      </div>
    </div>
  </section>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
  .ribbonDiscount {
    width: 150px;
    height: 150px;
    overflow: hidden;
    position: absolute;
  }

  .ribbonDiscount::before,
  .ribbonDiscount::after {
    position: absolute;
    z-index: -1;
    content: '';
    display: block;
    border: 5px solid #c33435;
  }

  .ribbonDiscount span {
    position: absolute;
    display: block;
    width: 225px;
    padding: 15px 0;
    background-color: #c33435;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    color: #fff;
    font: 700 18px/1 'Lato', sans-serif;
    text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
    text-transform: uppercase;
    text-align: center;
  }

  /* top left*/
  .ribbon-top-left {
    top: -10px;
    left: -10px;
  }

  .ribbon-top-left::before,
  .ribbon-top-left::after {
    border-top-color: transparent;
    border-left-color: transparent;
  }

  .ribbon-top-left::before {
    top: 0;
    right: 0;
  }

  .ribbon-top-left::after {
    bottom: 0;
    left: 0;
  }

  .ribbon-top-left span {
    right: -25px;
    top: 30px;
    transform: rotate(-45deg);
  }

  /* top right*/
  .ribbon-top-right {
    top: -10px;
    right: -10px;
  }

  .ribbon-top-right::before,
  .ribbon-top-right::after {
    border-top-color: transparent;
    border-right-color: transparent;
  }

  .ribbon-top-right::before {
    top: 0;
    left: 0;
  }

  .ribbon-top-right::after {
    bottom: 0;
    right: 0;
  }

  .ribbon-top-right span {
    left: -25px;
    top: 30px;
    transform: rotate(45deg);
  }

  /* bottom left*/
  .ribbon-bottom-left {
    bottom: -10px;
    left: -10px;
  }

  .ribbon-bottom-left::before,
  .ribbon-bottom-left::after {
    border-bottom-color: transparent;
    border-left-color: transparent;
  }

  .ribbon-bottom-left::before {
    bottom: 0;
    right: 0;
  }

  .ribbon-bottom-left::after {
    top: 0;
    left: 0;
  }

  .ribbon-bottom-left span {
    right: -25px;
    bottom: 30px;
    transform: rotate(225deg);
  }

  /* bottom right*/
  .ribbon-bottom-right {
    bottom: -10px;
    right: -10px;
  }

  .ribbon-bottom-right::before,
  .ribbon-bottom-right::after {
    border-bottom-color: transparent;
    border-right-color: transparent;
  }

  .ribbon-bottom-right::before {
    bottom: 0;
    left: 0;
  }

  .ribbon-bottom-right::after {
    top: 0;
    right: 0;
  }

  .ribbon-bottom-right span {
    left: -25px;
    bottom: 30px;
    transform: rotate(-225deg);
  }

  .daterangepicker .calendar-table th,
  .daterangepicker .calendar-table td {
    padding: 0px;
  }
</style>
<style>
  .ribbon {
    position: absolute;
    right: var(--right, 10px);
    top: var(--top, -3px);
    filter: drop-shadow(2px 3px 2px rgba(0, 0, 0, 0.5));
  }

  .ribbon>.content {
    color: white;
    font-size: 1.25rem;
    text-align: center;
    font-weight: 400;
    background: var(--color, #2ca7d8) linear-gradient(45deg, rgba(0, 0, 0, 0) 0%, rgba(255, 255, 255, 0.25) 100%);
    padding: 8px 2px 4px;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 100%, 0 100%);
    width: var(--width, 40px);
    min-height: var(--height, 36px);
    transition: clip-path 1s, padding 1s, background 1s;
  }

  .ribbon.slant-up>.content {
    clip-path: polygon(0 0, 100% 0, 100% calc(100% - 12px), 50% calc(100% - 6px), 0 100%);
  }

  .ribbon.slant-down>.content {
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% calc(100% - 6px), 0 calc(100% - 12px));
  }

  .ribbon.down>.content {
    clip-path: polygon(0 0, 100% 0, 100% calc(100% - 8px), 50% 100%, 0 calc(100% - 8px));
  }

  .ribbon.up>.content {
    clip-path: polygon(0 0, 100% 0, 100% 100%, 50% calc(100% - 8px), 0 100%);
  }

  .ribbon.check>.content {
    clip-path: polygon(0 0, 100% 0, 100% calc(100% - 20px), 40% 100%, 0 calc(100% - 12px));
  }
</style>
<style>
  .content2 {
    display: none;
  }

  #loadMore {
    width: 200px;
    border-radius: 10px;
    background-color: #ce3435;
  }



  .content2 {
    animation: fadeIn 2s ease-out;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }

  @keyframes blur {
    from {
      text-shadow: 0px 0px 10px #fff,
        0px 0px 10px #fff,
        0px 0px 25px #fff,
        0px 0px 25px #fff,
        0px 0px 25px #fff,
        0px 0px 25px #fff,
        0px 0px 25px #fff,
        0px 0px 25px #fff,
        0px 0px 50px #fff,
        0px 0px 50px #fff,
        0px 0px 50px #fff,
        0px 0px 150px #fff,
        0px 10px 100px #fff,
        0px 10px 100px #fff,
        0px 10px 100px #fff,
        0px 10px 100px #fff,
        0px -10px 100px #fff,
        0px -10px 100px #fff;
    }
  }
</style>
<style>
  /* img {
                                                    vertical-align: middle;
                                                    } */

  /* Position the image container (needed to position the left and right arrows) */
  /* .container {
                                                    position: relative;
                                                    } */

  /* Hide the images by default */
  .mySlidesCss {
    /* display: none; */
    max-height: 420px;
    justify-content: center;
    align-items: center;
    overflow: hidden;

  }

  .mySlidesCss img {
    border-radius: 20px 0px 0px 0px;
    flex-shrink: 0;
    -webkit-flex-shrink: 0;
  }


  /* nexts & previous buttons */
  .prevs,
  .nexts {
    cursor: pointer;
    position: absolute;
    top: 45%;
    width: auto;
    padding: 5px 15px 5px 12px;
    margin-top: -50px;
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 20px;
    user-select: none;
    -webkit-user-select: none;
    background-color: rgba(255, 0, 0, 0.4);
    ;
  }

  .prevs:hover,
  .nexts:hover {
    background-color: rgba(255, 0, 0, 0.4);
    color: #ce3435;

  }

  /* Position the "nexts button" to the right */
  .nexts {
    right: 33.5%;
    border-radius: 50;
  }

  .prevs {
    left: 1px;
  }

  .cat {
    cursor: pointer;
  }

  /* On hover, add a black background color with a little bit see-through */


  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 1rem;
    padding: 8px 12px;
    float: right;
    /* position: absolute; */
    /* right: 36%; */
    /* top:0; */

  }

  /* Container for image text */
  .caption-container {
    background-color: white;
    padding: 2px 16px 1px 16px;
    color: black;
  }

  .caption {
    padding-top: 10px;
  }

  .row {
    display: flex;
  }

  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Six columns side by side */
  .column {
    float: left;
    width: 10%;
    min-width: 100px;
  }

  /* Add a transparency effect for thumnbail images */
  .demo {
    opacity: 0.6;
    padding: 10px;
  }

  .active,
  .demo:hover {
    opacity: 1;
  }

  .list-c {
    list-style-type: none;
    display: flex;
    margin: 0;
    padding-left: 10px;
    padding-right: 10px;

  }

  .list-c-main {
    margin-top: -50px;
    width: 66%;
  }

  .list-c li {
    margin: 5px 10px;
    color: rgb(195, 195, 205);
    line-height: 40px;

  }

  .contentcat .list-c li a {
    text-decoration: none;
    color: #fff;
  }

  .list-c .list.active1 {
    border-bottom: 3px solid #fff;
    color: #fff;
    padding-bottom: 1px;
  }

  #exampleModal .modal-content {
    background: transparent;
    border: none;
  }

  .contentcat {
    background: rgb(42, 42, 58);
    border-radius: 20px;
  }

  .column-9 {
    width: 75%;
  }

  .column-3 {
    width: 25%;
    padding: 10px 20px;
  }

  .sidebar {
    padding: 0 10px;
  }

  .sidebar h3 {
    margin: 5px 0;
    font-size: 16px;
  }

  .sidebar p {
    font-size: 12px;
    margin: 3px 0px;
  }

  .sidebar .sidebar-cont p {
    font-size: 12px;
    margin: 7px 0px;
  }

  .sidebar-cont {
    display: flex;
    justify-content: space-between;
  }

  #sideright {
    overflow-y: auto;
    max-height: 379px;
    min-height: 379px;
    padding: 20px 10px;
    /* font-family: "Lucida Console", "Courier New", monospace; */
  }

  #sideright::-webkit-scrollbar {
    width: 5px;
    height: 20px;
  }

  #sideright::-webkit-scrollbar-thumb {
    background: #eee;
  }

  .btn-primary {
    position: relative;
    border: none;
    user-select: none;
    padding: 12px 20px;
    border-radius: 4px;
    background-color: rgb(62, 108, 234);
    color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 20%) 0px 1px 3px 1px;
    transition: all 0.15s ease-in-out 0s;
    width: 100%;
  }

  .btn-danger {
    position: relative;
    border: none;
    user-select: none;
    padding: 12px 20px;
    border-radius: 4px;
    background-color: #fc2b2b;
    color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 20%) 0px 1px 3px 1px;
    transition: all 0.15s ease-in-out 0s;
    width: 100%;
  }

  .btn-bg {
    background: #fff;
    padding: 10px;
  }

  .col-lg-3.bg-white {
    border-top-right-radius: 20px;
  }

  @media (max-width: 1024px) {
    #sideright {
      overflow-y: auto;
      height: 80%;
    }

    .prevs,
    .nexts {
      top: 27%;
    }

    .nexts {
      right: 3%;
    }
  }

  @media (max-width: 800px) {
    .col-lg-3.bg-white {
      border-top-right-radius: 0;
    }

    .demo {
      opacity: 0.6;
      padding: 2px;
      height: 50px;
    }

  }

  @media (max-width: 600px) {
    .column-9 {
      width: 100%;
    }

    .column-3 {
      width: 100%;
      padding: 10px 20px;
    }

    .row {
      display: block;
      max-height: 100% !important;
    }

    .prevs,
    .nexts {
      cursor: pointer;
      position: absolute;
      top: 23%;
      width: auto;
      font-size: 12px;

      padding: 5px 10px 5px 10px;
    }

    .nexts {
      right: 30px;

    }

  }

  .modal-content .container-lg,
  .modal-content .row .row>*,
  .modal-content .row>* {
    padding-right: 0;
    padding-left: 0;
  }

  .modal-content .row {
    margin-right: 0;
    margin-left: 0;
  }

  .modal-content .myCatCss,
  .modal-content .list-c {
    padding-left: 10px;
    padding-right: 10px;
    /* padding-bottom: 10px; */
  }

  .nav-tabs .nav-item .nav-link {
    background-color: transparent;
    color: black !important;
  }

  .nav-tabs .nav-item .nav-link.active {
    background-color: #fc2b2b;
    color: #FFF !important;
  }

  /* .tab-content {
                                                    border: 1px solid #dee2e6;
                                                    border-top: transparent;
                                                    padding: 15px;
                                                    } */

  .tab-content .tab-pane {
    background-color: #FFF;
    min-height: 200px;
    height: auto;
  }

  .infoBox {
    border: 2px solid #DC3545;
    color: black;
    padding: 6px;
    text-align: center;
    margin-right: 10px;

  }

  .infoBox:hover {
    border: 2px solid white;
    color: white;
    background: #DC3545;
    padding: 6px;


  }
</style>

<section class="smry">
  <div class="container" style='padding:20px;'>
    <div class="row" style="padding-left:10px;">
      <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding:0 !important; margin:0px; ">
        <div class="list-group">
          <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample" style='color:white; background-color:#DC3545;' class="list-group-item list-group-item-action">
            Filter By
          </a>


          <div class="collapse show" id="collapseExample">
            <a class="list-group-item list-group-item-action">
              <ul class="list-unstyled mx-0 mb-0 unstyled">
                <h6 style='font-weight:bold;'>Vehicle Type </h6>
                <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                  <span>
                    <input id='sustain' type='checkbox' class="styled-checkbox" value="Sedan"> <label class="styled-checkbox-1" for='sustain'>Sedan</label>
                    <br />
                    <input id='romantic' type='checkbox' class="styled-checkbox" value="Coupe"> <label class="styled-checkbox-1" for='romantic'>Coupe</label>
                    <br />
                    <input id='sup' type='checkbox' class="styled-checkbox" value="Sports Car"> <label class="styled-checkbox-1" for='sup'>Sports Car</label>
                    <br />
                    <input id='sup' type='checkbox' class="styled-checkbox" value="Station Wagon"> <label class="styled-checkbox-1" for='sup'>Station Wagon</label>
                    <br />
                    <input id='sup' type='checkbox' class="styled-checkbox" value="Hatchback"> <label class="styled-checkbox-1" for='sup'>Hatchback</lable>
                      <br />
                      <input id='sup' type='checkbox' class="styled-checkbox" value="Convertable"> <label class="styled-checkbox-1" for='sup'>Convertable</lable>
                        <br />
                        <input id='sup' type='checkbox' class="styled-checkbox" value="SUV"> <label class="styled-checkbox-1" for='sup'>SUV</lable>
                          <br />
                          <input id='sup' type='checkbox' class="styled-checkbox" value="Mini van"> <label class="styled-checkbox-1" for='sup'>Mini van</lable>
                            <br />
                            <input id='sup' type='checkbox' class="styled-checkbox" value="Busses"> <label class="styled-checkbox-1" for='sup'>Busses</lable>
                  </span>
                </li>
              </ul>
            </a>
          </div>




        </div>

      </div>
      <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12">
        <?php
        $abc = 1;
        $sql = "SELECT * FROM rentacarInventorydatabase WHERE country='$country' && city='$city'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {

            $availableforbooking = $row['availableforbooking'];
            $uuids = explode(',',$row['uuid']);

            $availableforbookingArray = explode(',',$availableforbooking);
            $showCar = false;
            $totalCarsAvailable = 0;
            if(count($availableforbookingArray) > 0){
              foreach($availableforbookingArray as $afb){
                if($afb == 1){
                  $showCar = true;
                  $totalCarsAvailable++;
                }
              }
            }

            
            if($showCar){

        ?>
            <form action='#' method='POST'>
              <input style='display:none;' name='totaldays' value='<?php echo $totaldays; ?>'>
              <input style='display:none;' name='aid' value='<?php echo $row['id']; ?>'>
              <section class="carsList content2" style="position: relative;">
                <div class="row ">

                  <div class="col-lg-3 col-md-3 col-sm-6 order-1 order-md-0 order-lg-0 col-xs-12 imageBox imageBox">
                    <div class="room_box_img">

                      <?php
                      $sql2z = "SELECT * FROM rentacarcarsimages WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && hotel='" . $row['hotel'] . "' GROUP BY model && year && brand";
                      $result2z = $conn->query($sql2z);
                      if ($result2z->num_rows > 0) {
                        while ($row2z = $result2z->fetch_assoc()) {
                          if (file_exists('pco/RentacarCar Images/' . $row2z['hotel'] . '/' . $row2z['brand'] . '/' . $row2z['model'] . '/' . $row2z['year'] . '/' . $row2z['image'])) {
                      ?>

                            <a href='#' data-bs-toggle="modal" data-bs-target=".roomamsModal<?php echo $abc; ?>">
                              <!-- <img src="/pco/RentacarCar Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" alt="" class="img-fluid"> -->

                              <img src="pco/RentacarCar Images/<?php echo $row2z['hotel']; ?>/<?php echo $row2z['brand']; ?>/<?php echo $row2z['model']; ?>/<?php echo $row2z['year']; ?>/<?php echo $row2z['image']; ?>" alt="" class="img-fluid">
                            </a>
                          <?php
                          } else {
                          ?>

                            <img src="img/placeholders/roomImage.png" alt="" class="img-fluid">



                      <?php

                          }
                        }
                      }
                      ?>
                      <a href='#' data-bs-toggle="modal" data-bs-target=".roomamsModal<?php echo $abc; ?>">
                        <span class=" viewEyeIcon"><i class="bi bi-eye "></i></span>
                      </a>
                    </div>
                    <div style="margin-top:5px;">


                      <div class="row p-2">
                        <?php
                        $sql2 = "SELECT * FROM rentacarcarsimages WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && hotel='" . $row['hotel'] . "' GROUP BY color";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                          while ($row2 = $result2->fetch_assoc()) {
                        ?>
                            <span class="colorIcon" style="background-color:<?php echo $row2['color'] ?>;"></span>

                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-12 order-2 order-sm-2 order-md-2 order-lg-1 DetailsSection">
                    <div class="row">
                      <div class="col-md-12">
                        <h4 class="mb-0"><?php echo $row['brand'] . ' ' . $row['model']; ?> </h4>
                       

                      </div>
                    </div>
                    <div class="row">
                      <span class="ModelBox">M <?php echo $row['year']; ?></span>
                      <!-- <h6>Type: <?php echo $row['type']; ?></h6>    -->
                      <!-- <p> <?php echo $row['description']; ?></p> -->

                      <ul class="list-unstyled mx-0 mb-0">
                        <li>
                          <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                          <span>Maximum <?php echo $row['maximum']; ?> person allowed.</span>
                        </li>
                        <li>
                          <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                          <span><?php echo $row['doors']; ?> doors</span>
                        </li>
                        <?php if ($row['inclusivefree'] != '') {
                        ?>
                          <li>
                            <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                            <span><?php echo $row['inclusivefree']; ?></span>
                          </li>
                        <?php
                        }
                        ?>
                        <li>
                          <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                          <span>Luggages <?php echo $row['luggages']; ?> allowed.</span>
                          <small>(Large: <?php echo $row['large']; ?>&nbsp;&nbsp; Small: <?php echo $row['small']; ?>)</small>
                        </li>
                      </ul>
                    </div>



                  </div>
                  <div class="col-lg-2 col-md-4 order-0 order-sm-1 order-md-1 order-lg-2 priceSec text-center">
                    <h4 style='color:#DC3545; font-size:30px; font-weight:bold !important;'>
                      AED
                    </h4>
                    <h4 style='color:#DC3545; font-size:30px; font-weight:bold !important;'>








                      <?php

                      /*
                            $sqll ="SELECT * FROM newrentacarprices WHERE country='$country' && city='$city' && brand='".$row['brand']."' && model='".$row['model']."' && year='".$row['year']."' && name='".$row['hotel']."'";
                            $resultl = $conn->query($sqll);

                            if ($resultl->num_rows > 0) {
                                while($rowl = $resultl->fetch_assoc()) {
                                                                                            
                                                                                            
                        ?>
                                                                                            
                        <input style='display:none;' name='singleprice' value='<?php echo $rowl['price'];?>' >
                        <?php
                          $tot=intval($totaldays)*intval($rowl['price']);
                          echo $tot;
                        ?>
                        <input style='display:none;' name='totalprice' value='<?php echo $tot;?>' >
                        <?php
                                                                                            
                                  }
                              }
                              */
                      ?>





                      <input name='model' style='display:none;' value='<?php echo $row['model']; ?>'>
                      <input name='brand' style='display:none;' value='<?php echo $row['brand']; ?>'>
                      <input name='year' style='display:none;' value='<?php echo $row['year']; ?>'>

                      <?php


                      $sqll = "SELECT * FROM newrentacarprices WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && year='" . $row['year'] . "' && name='" . $row['hotel'] . "'";
                      $resultl = $conn->query($sqll);

                      if ($resultl->num_rows > 0) {
                        while ($rowl = $resultl->fetch_assoc()) {


                      ?>




                          <?php

                          $printtotal = 0;

                          $totalpri = 0;
                          $singlepri = 0;

                          $totaldisc = '';
                          $tpp = 0;


                          $disca1 = 0;
                          $disca2 = 0;

                          $totaldaysz = $totaldays;
                          $leftdaysz = 0;
                          $leftdaysz2 = 0;
                          //$sad=date();
                          //$ead=date();



                          //$sad=date($pickupdate);
                          //$ead=date($dropoffdate);


                          $ds = explode("/", $dropoffdate);

                          $ps = explode("/", $pickupdate);

                          $sadd = '';
                          $eadd = '';

                          $nan = 0;
                          foreach (array_reverse($ps) as $p) {
                            $nan = $nan + 1;
                            if ($nan < count($ps)) {
                              $sadd = $sadd . $p . '/';
                            } else {
                              $sadd = $sadd . $p;
                            }
                          }




                          $nan2 = 0;
                          foreach (array_reverse($ds) as $d) {
                            $nan2 = $nan2 + 1;
                            if ($nan2 < count($ds)) {
                              $eadd = $eadd . $d . '/';
                            } else {
                              $eadd = $eadd . $d;
                            }
                          }



                          $sad = date($sadd);
                          $ead = date($eadd);

                          $prep = 0;


                          //echo 'ajuosdhkjsadhjksahdkjsahdjksahdkhsakjdhaskjdhsa';



                          $sqllu = "SELECT * FROM newrentacarpricesdis WHERE aidi='" . $rowl['id'] . "' && (sdates<='$sad' && edates>='$ead')";


                          //echo $sqllu;


                          $resultlu = $conn->query($sqllu);
                          if ($resultlu->num_rows > 0) {
                            while ($rowlu = $resultlu->fetch_assoc()) {




                          ?>






                              <?php
                              if ($rowlu['amorper'] == 'Amount') {




                                $showt = intval($rowlu['dprice']) + intval($rowlu['markup']);
                                $singlepri = intval($showt);
                                $disc = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));





                                $tot = intval($showt);

                                $totalpri = intval($totaldays) * $tot;

                                $totaldisc = $disc;

                                $prep = intval($rowlu['price']);
                              } else if ($rowlu['amorper'] == 'Percentage') {






                                $da = (intval($rowlu['dprice']) / 100) * intval($rowlu['markup']);



                                $showt = intval($rowlu['dprice']) + intval($da);
                                $disc = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));


                                $singlepri = intval($showt);

                                $tot = intval($showt);

                                $totalpri = intval($totaldays) * $tot;
                                $prep = intval($rowlu['price']);
                                $totaldisc = $disc;
                              }
                              ?>






                              <?php
                            }
                          } else {


                            $sqllu = "SELECT * FROM newrentacarpricesdis WHERE aidi='" . $rowl['id'] . "' && (sdates<='$sad' && edates>='$sad')";



                            $resultlu = $conn->query($sqllu);
                            if ($resultlu->num_rows > 0) {
                              while ($rowlu = $resultlu->fetch_assoc()) {



                                $date1 = new DateTime($sad);
                                $date2 = new DateTime($rowlu['edates']);
                                $days  = $date2->diff($date1)->format('%a');


                                $leftdaysz = intval($totaldays) - intval($days);



                                if ($rowlu['amorper'] == 'Amount') {





                                  $showt = intval($rowlu['dprice']) + intval($rowlu['markup']);
                                  //$singlepri=intval($showt);
                                  $disca1 = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));
                                  $tot = intval($showt);
                                  $prep = intval($rowlu['price']);
                                  $tpp = intval($showt);
                                } else if ($rowlu['amorper'] == 'Percentage') {
                                  $da = (intval($rowlu['dprice']) / 100) * intval($rowlu['markup']);



                                  $showt = intval($rowlu['dprice']) + intval($da);
                                  $disca1 = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));


                                  //$singlepri=intval($showt);
                                  $tpp = intval($showt);

                                  $tot = intval($showt);

                                  $totalpri = intval($totaldays) * $tot;
                                  $prep = intval($rowlu['price']);
                                  $totaldisc = $disc;
                                }






                              ?>








                              <?php
                              }

                              $printtotal = $leftdaysz * $tpp;

                              $sqllu = "SELECT * FROM newrentacarpricesdis WHERE aidi='" . $rowl['id'] . "' && (edates>='$ead' && sdates<'$ead')";



                              $resultlu = $conn->query($sqllu);
                              if ($resultlu->num_rows > 0) {
                                while ($rowlu = $resultlu->fetch_assoc()) {

                                  if ($rowlu['sdates'] > $sad) {
                                    //echo $rowlu['sdates'];
                                    //echo $rowlu['edates'];

                                    $date1 = new DateTime($ead);
                                    $date2 = new DateTime($rowlu['sdates']);

                                    $days  = $date1->diff($date2)->format('%a');
                                    // echo $rowlu['sdates'];


                                    if ((intval($leftdaysz) + intval($days)) >= $totaldays) {

                                      $leftdaysz2 = $totaldaysz - $leftdaysz;
                                      $leftdaysz = $leftdaysz2 + $leftdaysz;


                                      if ($rowlu['amorper'] == 'Amount') {
                                        $showt = intval($rowlu['dprice']) + intval($rowlu['markup']);
                                        //$singlepri=intval($showt);
                                        $disca2 = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));
                                        $tot = intval($showt);
                                        $prep = intval($rowlu['price']);
                                        $tpp = intval($showt);
                                      } else if ($rowlu['amorper'] == 'Percentage') {
                                        $da = (intval($rowlu['dprice']) / 100) * intval($rowlu['markup']);



                                        $showt = intval($rowlu['dprice']) + intval($da);
                                        $disca2 = (100 - ((intval($showt) / intval($rowlu['price'])) * 100));
                                        //$singlepri=intval($showt);
                                        $tpp = intval($showt);
                                        $tot = intval($showt);
                                        $prep = intval($rowlu['price']);
                                      }
                                    } else {
                                      $leftdaysz = intval($leftdaysz) + intval($days);
                                    }
                                  }
                                }

                                $printtotal = $printtotal + ($leftdaysz2 * $tpp);
                              }

                              if ($leftdaysz == $totaldays) {
                                //$singlepri=$tpp;

                                $tot = $tpp;

                                $totalpri = $printtotal;
                                $totaldisc = $disca1 + $disca2;

                                $totaldisc = $totaldisc / 2;
                              } else {


                                $leftover = $totaldays - $leftdaysz;




                                $singleprimm = intval($rowl['pricem']);

                                $totmm = intval($rowl['pricem']);

                                $totalprimm = intval($leftover) * $tot;

                                $prep = intval($rowlu['pricem']);

                                //$singlepri=$tpp+$singleprimm;

                                $tot = $tpp + $totmm;

                                $totalpri = $printtotal + $totalprimm;

                                echo 'other';
                              }
                            } else {
                              ?>



                              <?php


                              $singlepri = intval($rowl['pricem']);

                              $tot = intval($rowl['pricem']);

                              $totalpri = intval($totaldays) * $tot;


                              ?>


                      <?php
                            }
                          }
                        }
                      }

                      ?>


                      <?php

                      echo $totalpri;





                      echo '<br/>';

                      if ($totaldisc != '') {


                        echo '<span style="text-decoration: line-through;"><h4> AED ' . $prep * intval($totaldays) . '</h4></span>';


                      ?>

                        <input style='display:none;' name='singleprice' value='<?php echo $totalpri / $totaldays; ?>'>
                      <?php

                      } else {
                      ?>
                        <input style='display:none;' name='singleprice' value='<?php echo $singlepri; ?>'>
                      <?php
                      }
                      ?>
                      <input style='display:none;' name='totalprice' value='<?php echo $totalpri; ?>'>







                    </h4>

                    <p>

                      For <?php echo $totaldays; ?> <?php if ($totaldays > 1) { ?>Days<?php } else { ?>Day<?php } ?>


                      <?php


                      if ($pickordelivery == 'Delivery') {
                        echo '<br/>';
                        $pd = '';
                        $dd = '';
                        echo '<small style="color:#DC3545;">*Delivery Charges*</small>';
                        echo '<br/>';
                        $nar = $row['hotel'];
                        $mod = $row['model'];
                        $bran = $row['brand'];

                        $sqldelivery1 = "SELECT * FROM newrentacardelivery WHERE country='$country' && city='$city' && name='$nar' && area='$parea' && model='$mod' && brand='$bran' ";
                        $resultdelivery1 = $conn->query($sqldelivery1);

                        if ($resultdelivery1->num_rows > 0) {
                          // output data of each row
                          while ($rowdelivery1 = $resultdelivery1->fetch_assoc()) {

                            $pd = $rowdelivery1['price'];
                          }
                        }



                        $sqldelivery2 = "SELECT * FROM newrentacardelivery WHERE country='$country' && city='$city' && name='$nar' && area='$darea' && model='$mod' && brand='$bran' ";
                        $resultdelivery2 = $conn->query($sqldelivery2);

                        if ($resultdelivery2->num_rows > 0) {
                          // output data of each row
                          while ($rowdelivery2 = $resultdelivery2->fetch_assoc()) {

                            $dd = $rowdelivery2['price'];
                          }
                        }

                        if ((intval($pd) + intval($dd)) == 0 || (intval($pd) + intval($dd)) == null || (intval($pd) + intval($dd)) == 'undefined') {
                          echo 'Free';
                      ?>
                          <input style='display:none;' name='deliveryperday' value='0'>
                        <?php
                        } else {
                          echo '<small>AED ' . (intval($pd) + intval($dd)) . ' </small>';
                        ?>
                          <input style='display:none;' name='deliveryperday' value='<?php echo intval($pd) + intval($dd); ?>'>
                      <?php
                        }
                      }

                      ?>
















                    </p>

                    <button style='  background-color:#DC3545;' type='submit' name='submit' href="#" class="btn bookNewBtn active text-capitalize">book now</button>
                  </div>


                </div>
                <?php
                if ($totaldisc != '') {
                ?>

                  <div class="ribbon down" style="--color: #ce3435;">
                    <div class="content"><?php echo round((100 - ((intval($totalpri) / intval($prep * intval($totaldays))) * 100)), 1) . '% Off'; ?></div>
                  </div>
                  <!-- <div class="ribbonDiscount ribbon-top-right"><span></span></div> -->
                <?php } ?>
              </section>
            </form>
            <div class="modal fade roomamsModal<?php echo $abc; ?>" tabindex="-1" aria-labelledby="roomamsModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl " style="margin-top:auto; margin-bottom:auto;">
                <div class="modal-content" style="border-radius:25px; background:black;">
                  <div class="container-lg contentcat" style="background: rgb(42, 42, 58);">
                    <div class="row">
                      <div class="col-lg-8">
                        <?php
                        $sql2z = "SELECT * FROM rentacarcarsimages WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && hotel='" . $row['hotel'] . "' GROUP BY model && year && brand";
                        $result2z = $conn->query($sql2z);
                        if ($result2z->num_rows > 0) {
                          $popupImageIndex = 0;
                          while ($row2z = $result2z->fetch_assoc()) {
                        ?>
                            <div class="mySlidesCss mySlides<?php echo $popupImageIndex ?>">
                              <!-- <img src="/pco/RentacarCar Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" alt="" class="img-fluid"> -->
                              <img src="pco/RentacarCar Images/<?php echo $row2z['hotel']; ?>/<?php echo $row2z['brand']; ?>/<?php echo $row2z['model']; ?>/<?php echo $row2z['year']; ?>/<?php echo $row2z['image']; ?>" alt="" class="img-fluid" style="width:100%; object-fill:cover;">
                            </div>
                        <?php

                          }
                          $popupImageIndex++;
                        }
                        ?>

                        <a class="prevs" onclick="plusSlides<?php echo $abc ?>(-1)">❮</a>
                        <a class="nexts" onclick="plusSlides<?php echo $abc ?>(1)">❯</a>
                        <!-- <div class="caption-container">
                                                                                <p id="caption<?php echo $ban ?>"></p>
                                                                                </div> -->
                      </div>
                      <div class="col-lg-4 bg-white" style="border-radius:0px 20px;">
                        <div class="text-end">
                          <button type="button" style="font-size: 10px;" class="btn-close m-2 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="">
                          <div id="sideright">
                            <!-- <div class="sidebar"> -->
                            <ul style="margin-top: -20px;" class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home<?php echo $abc; ?>" type="button" role="tab" aria-controls="home" style='color:red;' aria-selected="true">Description</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile<?php echo $abc; ?>" type="button" role="tab" aria-controls="profile" style='color:red;' aria-selected="false">Features</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact<?php echo $abc; ?>" type="button" role="tab" aria-controls="contact" style='color:red;' aria-selected="false">Policies</button>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home<?php echo $abc; ?>" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row pt-2">
                                  <div class="col-md-6">

                                    <p class="infoBox">
                                      <?php echo $row['brand'] . ' ' . $row['model']; ?>

                                    </p>

                                  </div>
                                  <div class="col-md-6">
                                    <p class="infoBox">
                                      <?php echo $row['year']; ?>
                                    </p>


                                  </div>
                                  <?php echo $row['description']; ?>
                                </div>











                                <br />


                                <?php
                                if ($row['break'] !== '') {
                                  echo '<img style="max-width:20px;" src="./img/icons/brake.png">' . '&nbsp;&nbsp;' . $row['break'] . '<br/>';
                                }
                                if ($row['horsepower'] !== '') {
                                  echo '<img style="max-width:20px;" src="./img/icons/horsepower.png">' . '&nbsp;&nbsp;' . $row['horsepower'] . ' hp' . '<br/>';
                                }
                                if ($row['transmission'] !== '') {
                                  echo '<img style="max-width:20px;" src="./img/icons/transmission.webp">' . '&nbsp;&nbsp;' . $row['transmission'] . '<br/>';
                                }

                                ?>

                                <!-- <h6><?php

                                          foreach ($allroomtypessdesc[$cnna] as $bn) {
                                            echo $bn;
                                          }





                                          ?></h6> -->





                              </div>
                              <div class="tab-pane fade" id="profile<?php echo $abc; ?>" role="tabpanel" aria-labelledby="profile-tab">
                                <br />



                                <?php

                                $fer = explode(',', $row['features']);
                                ?>


                                <ul class="list-unstyled mx-0 mb-0">
                                  <?php
                                  foreach ($fer as $f) {
                                  ?>
                                    <li>
                                      <span class="me-2"><i class="bi bi-check-circle-fill"></i></span>
                                      <span><?php echo $f; ?></span>
                                    </li>
                                  <?php
                                  }
                                  ?>

                                </ul>



                              </div>
                              <div class="tab-pane fade" id="contact<?php echo $abc; ?>" role="tabpanel" aria-labelledby="contact-tab">
                                <br />

                                <div class='row'>

                                  <?php
                                  if ($row['deposit'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Deposit<br/>' . '<small> AED</small> ' . ' ' . $row['deposit']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($row['maxkm'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Max KM<br/> ' . ' ' . $row['maxkm']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>



                                <div class='row'>

                                  <?php
                                  if ($row['ageforsuper'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Age<br/> ' . ' ' . $row['ageforsuper']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($row['excesskm'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Excess KM<br/> ' . ' ' . $row['excesskm']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>




                                <div class='row'>

                                  <?php
                                  if ($row['accident'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Accident<br/> ' . '<small>AED</small>' . ' ' . $row['accident']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($row['loss'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Loss<br/> ' . '<small>AED</small>' . ' ' . $row['loss']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>





                                <div class='row'>

                                  <?php
                                  if ($row['cdw'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'CDW<br/> ' . '<small>AED</small>' . ' ' . $row['cdw']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  if ($row['pai'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'PAI<br/> ' . '<small>AED</small>' . ' ' . $row['pai']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>






                                <div class='row'>

                                  <?php
                                  if ($row['childsafety'] != '') {
                                  ?>
                                    <div class='col-sm'>
                                      <p class="infoBox">
                                        <?php echo 'Child Safety<br/> ' . '<small>AED</small>' . ' ' . $row['childsafety']; ?>

                                      </p>
                                    </div>
                                  <?php
                                  }
                                  ?>

                                </div>


                                <br />
                                <?php
                                if ($row['cancellationpolicy'] != '') {
                                  echo '<h6>Cancellation Policy</h6>';
                                  echo '<p>' . $row['cancellationpolicy'] . '</p>';
                                }
                                ?>
                                <?php
                                if ($row['dropoffterms'] != '') {
                                  echo '<h6>Dropoff Terms</h6>';
                                  echo '<p>' . $row['dropoffterms'] . '</p>';
                                }
                                ?>
                                <?php
                                if ($row['depositinfo'] != '') {
                                  echo '<h6>Deposit Info</h6>';
                                  echo '<p>' . $row['depositinfo'] . '</p>';
                                }
                                ?>


                              </div>
                            </div>


                            <!-- </div> -->
                          </div>

                          <div class="btn-bg">
                            <a href='hotelsingle.php?hotel=<?php echo $opp; ?>&city=<?php echo $selectedcities[$cnna]; ?>&country=<?php echo $selectedcountries[$cnna]; ?>&sendcategory=<?php echo $selectedstars[$cnna]; ?>'>

                              <button class="btn btn-danger" type="button">View Car </button></a>

                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="row col-md-12 list-c-main">
                        <div class="col-md-10">
                          <ul class="list-c">
                            <li class="list active1">
                              <a class="cat" onclick="showCat<?php echo $abc ?>(1)">All</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-md-2">
                          <!-- <?php
                                foreach ($imagesforlisting as $iga1) {

                                  foreach ($iga1[$opp . $baba] as $index => $aa) {
                                ?>
                              <div class="numbertext" id="numbertext<?= $index ?>"> <?= $index + 1 ?> / <?= count($iga1[$opp . $baba]) ?></div>
                          <?php

                                  }
                                }
                          ?> -->

                        </div>
                      </div>
                    </div>

                    <div style="padding:10px;" class="row myCat<?php echo $abc ?>" onclick="currentCat<?php echo $abc ?>(1)">
                      <?php
                      $sql2z = "SELECT * FROM rentacarcarsimages WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && hotel='" . $row['hotel'] . "' GROUP BY model && year && brand";
                      $result2z = $conn->query($sql2z);
                      if ($result2z->num_rows > 0) {
                        $popupImageIndex = 0;
                        while ($row2z = $result2z->fetch_assoc()) {
                      ?>
                          <div class="column" style="height: 57px; width:100px; overflow:hidden; margin-right: 10px; ">

                            <!-- <img src="/pco/RentacarCar Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" alt="" class="img-fluid"> -->
                            <img src="pco/RentacarCar Images/<?php echo $row2z['hotel']; ?>/<?php echo $row2z['brand']; ?>/<?php echo $row2z['model']; ?>/<?php echo $row2z['year']; ?>/<?php echo $row2z['image']; ?>" alt="" class="img-fluid">
                          </div>
                      <?php

                        }
                        $popupImageIndex++;
                      }
                      ?>

                    </div>
                    <div clsss="contentcat">

                    </div>

                  </div>
                </div>
              </div>
            </div>
            <script>
              var images_count<?php echo $abc  ?> = 0;
            </script>
            <?php
            $sql2z = "SELECT * FROM rentacarcarsimages WHERE country='$country' && city='$city' && brand='" . $row['brand'] . "' && model='" . $row['model'] . "' && hotel='" . $row['hotel'] . "' GROUP BY model && year && brand";
            $result2z = $conn->query($sql2z);
            if ($result2z->num_rows > 0) {
              $popupImageIndex = 0;
              while ($row2z = $result2z->fetch_assoc()) {
            ?>
                <script>
                  images_count<?php echo $abc  ?> = images_count<?php echo $abc  ?> + 1;
                </script>
            <?php

              }
              $popupImageIndex++;
            }
            ?>

            <script>
              let slideIndex<?php echo $abc ?> = 0;
              showSlides<?php echo $abc ?>(slideIndex<?php echo $abc ?>);
              let catIndex<?php echo $abc ?> = 0;
              showCat<?php echo $abc ?>(catIndex<?php echo $abc ?>);

              function plusSlides<?php echo $abc ?>(n) {
                showSlides<?php echo $abc ?>(slideIndex<?php echo $abc ?> += n);
              }

              function currentSlide<?php echo $abc ?>(n) {
                showSlides<?php echo $abc ?>(slideIndex<?php echo $abc ?> = n);
              }

              function currentCat<?php echo $abc ?>(n) {
                showCat<?php echo $abc ?>(catIndex<?php echo $abc ?> = n);
              }

              function showSlides<?php echo $abc ?>(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides<?php echo $abc ?>");
                let dots = document.getElementsByClassName("demo<?php echo $abc ?>");
                let captionText = document.getElementById("caption<?php echo $abc ?>");
                let imagesCaptionsCount = document.getElementsByClassName('numbertext');

                let counts = images_count<?php echo $abc  ?>;;

                if (n > slides.length) {
                  slideIndex<?php echo $abc ?> = 1
                }
                if (n < 1) {
                  slideIndex<?php echo $abc ?> = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
                }
                for (i = 0; i < imagesCaptionsCount.length; i++) {
                  imagesCaptionsCount[i].style.display = 'none';
                }
                for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex<?php echo $abc ?> - 1].style.display = "block";
                imagesCaptionsCount[slideIndex<?php echo $abc ?> - 1].style.display = 'block';

                dots[slideIndex<?php echo $abc ?> - 1].className += " active";
                captionText.innerHTML = dots[slideIndex<?php echo $abc ?> - 1].alt;
              }

              function showCat<?php echo $abc ?>(n) {
                let i;
                let catlist = document.getElementsByClassName("myCat<?php echo $abc ?>");
                let actlist = document.getElementsByClassName("list<?php echo $abc ?>");
                if (n > catlist.length) {
                  catIndex<?php echo $abc ?> = 1
                }
                if (n < 1) {
                  catIndex<?php echo $abc ?> = catlist.length
                }
                for (i = 0; i < catlist.length; i++) {
                  catlist[i].style.display = "none";
                }
                for (i = 0; i < actlist.length; i++) {
                  actlist[i].addEventListener("click", function() {
                    var current = document.getElementsByClassName("active1");
                    current[0].className = current[0].className.replace(" active1", "");
                    this.className += " active1";
                  });
                }
                catlist[n - 1].style.display = "block";
              }
            </script>

        <?php
            $abc = $abc + 1;
            }
          }
        }
        ?>
        <?php
        if ($abc > 4) {


        ?>
          <p align='center'><a href="#" class='btn btn-secondary theme_btn active text-capitalize' id="loadMore"> Load More </a></p>
        <?php

        }
        ?>






        <style>
          span {
            font-size: 1.8vh;
          }
        </style>

        <style>
          small {
            font-size: 1.5vh;
          }

          p {
            font-size: 1.8vh;
          }
        </style>













        <!-- <script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
        <script>
          $(document).ready(function() {
            $(".content2").slice(0, 4).show();
            $("#loadMore").on("click", function(e) {
              e.preventDefault();
              $(".content2:hidden").slice(0, 4).slideDown();
              if ($(".content2:hidden").length == 0) {
                $("#loadMore").text("No More").addClass("noContent");
              }
            });
          })
        </script>
      </div>
    </div>
  </div>
  <section>






    <!--main part ENDS-->







    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Select Language</h5>
            <button style='display:none;' id='clme' type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span id='clickclose' aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="notranslate modal-body">
            <div class='container'>
              <div class='row'>
                <div data-val='en' onclick='selectl(this)' class='col-sm'>
                  <img src='flags/united-kingdom.png' style='max-width:50px;'>
                  <p>English</p>
                </div>


                <div data-val='ar' onclick='selectl(this)' class='col-sm'>
                  <img src='flags/united-arab-emirates.png' style='max-width:50px;'>
                  <p>Arabic</p>
                </div>


                <div data-val='de' onclick='selectl(this)' class='col-sm'>
                  <img src='flags/germany.png' style='max-width:50px;'>
                  <p>German</p>
                </div>

                <div data-val='ru' onclick='selectl(this)' class='col-sm'>
                  <img src='flags/russia.png' style='margin-left:5px; max-width:50px;'>
                  <p>Russian</p>
                </div>

                <div data-val='sv' onclick='selectl(this)' class='col-sm'>
                  <img src='flags/sweden.png' style='margin-left:5px; max-width:50px;'>
                  <p>Swedish</p>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Select Currency</h5>
            <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <span id='clickclose' aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="notranslate modal-body">
            <div class='container'>
              <div class='row'>
                <div data-val='AED' onclick='selectl2(this)' class='col-sm'>

                  <button class='form-control'>AED</button>
                </div>



              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
          </div>
        </div>
      </div>
    </div>



    <label style='display:none;' id='warnmeok' data-toggle="modal" data-target="#exampleModalCenterwarn">Warn</label>

    <!-- ModalWarn -->
    <div class="modal fade" id="exampleModalCenterwarn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div style='background-color:#dc3545;' class="modal-header">
            <h5 style='color:white;' class="modal-title" id="exampleModalLongTitle">Notice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span id='clickcloseme' aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="notranslate modal-body">
            <div class='container'>
              <div class='row'>

                <p align='center'>Should you require more than 5 rooms at a time. <br />Please register as a corporate account to avail special discounts and add ons.</p>





              </div>
            </div>
          </div>
          <div style='max-height:50px;' class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
            <button type="button" style='max-width:150px;' class="btn btn-primary">Register</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal3 -->
    <div style='max-width:100%;' class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div style='max-width:1000px;' class="modal-dialog modal-dialog-centered" role="document">
        <div style='max-width:1000px;' class="modal-content">
          <div style='max-width:1000px;' class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
            <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <span id='clickclose' aria-hidden="true">&times;</span>
            </button>
          </div>
          <div style='max-width:1000px;' class="notranslate modal-body">





            <!--popup checker-->

            <style>
              /* style the container */
              .containern {
                position: relative;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px 0 30px 0;
              }

              /* style inputs and link buttons */
              .input,
              .btnn {
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 4px;
                margin: 5px 0;
                opacity: 0.85;
                display: inline-block;
                font-size: 17px;
                line-height: 20px;
                text-decoration: none;
                /* remove underline from anchors */
              }

              .btnn:hover {
                color: black !important;
              }

              .input:hover,
              .btn:hover {
                opacity: 1;

              }

              /* add appropriate colors to fb, twitter and google buttons */
              .fb {
                background-color: #3B5998;
                color: white;
              }

              .twitter {
                background-color: #55ACEE;
                color: white;
              }

              .google {
                background-color: #dd4b39;
                color: white;
              }

              /* style the submit button */
              .input[type=submit] {
                background-color: #04AA6D;
                color: white;
                cursor: pointer;
              }

              .input[type=submit]:hover {
                background-color: #45a049;
              }

              /* Two-column layout */
              .col {
                float: left;
                width: 50%;
                margin: auto;
                padding: 0 50px;
                margin-top: 6px;
              }

              .row {
                margin-left: 0 !important;
                margin-right: 0 !important;
              }

              /* Clear floats after the columns */
              .rown:after {
                content: "";
                display: table;
                clear: both;
              }

              /* vertical line */
              .vl {
                position: absolute;
                left: 50%;
                transform: translate(-50%);
                border: 2px solid #ddd;
                height: 175px;
              }

              /* text inside the vertical line */
              .vl-innertext {
                position: absolute;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #f1f1f1;
                border: 1px solid #ccc;
                border-radius: 50%;
                padding: 8px 10px;
              }

              /* hide some text on medium and large screens */
              .hide-md-lg {
                display: none;
              }

              /* bottom container */
              .bottom-container {
                text-align: center;
                background-color: #666;
                border-radius: 0px 0px 4px 4px;
              }

              /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
              @media screen and (max-width: 650px) {
                .col {
                  width: 100%;
                  margin-top: 0;
                }

                /* hide the vertical line */
                .vl {
                  display: none;
                }

                /* show the hidden text on small screens */
                .hide-md-lg {
                  display: block;
                  text-align: center;
                }
              }
            </style>


            <div class="containern">

              <div class="rown">

                <div class="vl">
                  <span class="vl-innertext">or</span>
                </div>

                <div class="col">
                  <a href="#" class="fb btnn">
                    <i class="fa fa-facebook fa-fw"></i>Facebook
                  </a>
                  <a href="#" class="twitter btnn">
                    <i class="fa fa-twitter fa-fw"></i>Twitter
                  </a>
                  <a href="#" class="google btnn"><i class="fa fa-google fa-fw">
                    </i>Google+
                  </a>
                </div>

                <div class="col">
                  <div class="hide-md-lg">
                    <p>Or sign in manually:</p>
                  </div>

                  <input class='input' type="text" name="username" placeholder="Username" required>
                  <input class='input' type="password" name="password" placeholder="Password" required>

                  <h4 align='center'><input style='margin-top:20px;' class='theme_btn btn btn-outline-primary' type="submit" value="Login"></h4>
                </div>

              </div>

            </div>





            <!--end-->











          </div>

        </div>
      </div>
    </div>
    <script>
      function selectl($this) {
        var value = $this.getAttribute('data-val');
        var selectBox = document.getElementById('selectBox');

        if (value == 'en') {
          document.getElementById('langimg').src = 'flags/united-kingdom.png';
          document.getElementById('clme').click();
        }

        if (value == 'ar') {
          document.getElementById('langimg').src = 'flags/united-arab-emirates.png';
          document.getElementById('clme').click();
        }

        if (value == 'de') {
          document.getElementById('langimg').src = 'flags/germany.png';
          document.getElementById('clme').click();
        }

        if (value == 'ru') {
          document.getElementById('langimg').src = 'flags/russia.png';
          document.getElementById('clme').click();
        }

        if (value == 'sv') {
          document.getElementById('langimg').src = 'flags/sweden.png';
          document.getElementById('clme').click();
        }


        changeLanguage(value);


      }
    </script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->



    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

    <script>
      var country = document.getElementById('country').value;

      $.ajax({

        type: 'POST',
        url: 'getcitiesnew2.php',
        data: {
          'country': country
        },

        success: function(result) {



          $("#city").html(result);



        }

      });
    </script>
    <script>
      var country = document.getElementById('country').value;
      var city = document.getElementById('city').value;
      $.ajax({

        type: 'POST',
        url: 'getareas1.php',
        data: {
          'country': country,
          'city': city
        },

        success: function(result) {



          $("#pickup").html(result);



        }

      });




      $.ajax({

        type: 'POST',
        url: 'getareas2.php',
        data: {
          'country': country,
          'city': city
        },

        success: function(result) {




          $("#dropoff").html(result);



        }

      });
    </script>

    <script>
      document.getElementById("donotclick").addEventListener("click", function(event) {
        event.preventDefault()
      });

      function myFunction() {

        document.getElementById("clickmodify").click();

      }
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->



    <!-- <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> -->

    <script>
      var alloww = false;




      var sld = document.getElementById('sldr');
      var country = document.getElementById('countra').value;
      var city = document.getElementById('cita').value;

      if (sld.checked) {


        alloww = false;

        $('#pickmeup').on("keydown", function(e) {
          // console.log("handled by the child - stop bubbling please");
          if (alloww == true) {
            e.preventDefault();
          }
          //e.stopPropagation();
        });

        $('#dropmeup').on("keydown", function(e) {
          // console.log("handled by the child - stop bubbling please");
          if (alloww == true) {
            e.preventDefault();
          }
          //e.stopPropagation();
        });



        document.getElementById('dela1').style.display = 'block';
        // document.getElementById('dela2').style.display='none';

        document.getElementById('pickmeup').placeholder = 'Pickup Hotel';
        document.getElementById('dropmeup').placeholder = 'Dropoff Hotel';

        //var pickordelivery=document.getElementById('pickordelivery').value='Delivery';



        $.ajax({

          type: 'POST',
          url: 'getareasrent.php',
          data: {
            'country': country,
            'city': city
          },

          success: function(result) {


            $("#locations").html(result);



          }

        });


      } else {








        alloww = true;


        $('#pickmeup').on("keydown", function(e) {
          // console.log("handled by the child - stop bubbling please");
          if (alloww == true) {
            e.preventDefault();
          }
          //e.stopPropagation();
        });

        $('#dropmeup').on("keydown", function(e) {
          // console.log("handled by the child - stop bubbling please");
          if (alloww == true) {
            e.preventDefault();
          }
          //e.stopPropagation();
        });



        document.getElementById('pickmeup').placeholder = 'Pickup Location';
        document.getElementById('dropmeup').placeholder = 'Dropoff Location';

        document.getElementById('dela1').style.display = 'none';
        //  document.getElementById('dela2').style.display='block';

        // var pickordelivery=document.getElementById('pickordelivery').value='Pick Up';         
        $.ajax({

          type: 'POST',
          url: 'getairportsrent.php',
          data: {
            'country': country,
            'city': city
          },

          success: function(result) {


            $("#locations").html(result);



          }

        });
      }








      function changeways($this) {


        var country = document.getElementById('country').value;
        var city = document.getElementById('city').value;

        document.getElementById('pickmeup').value = '';
        document.getElementById('dropmeup').value = '';



        if ($this.checked) {




          alloww = false;

          $('#pickmeup').on("keydown", function(e) {
            // console.log("handled by the child - stop bubbling please");
            if (alloww == true) {
              e.preventDefault();
            }
            //e.stopPropagation();
          });

          $('#dropmeup').on("keydown", function(e) {
            // console.log("handled by the child - stop bubbling please");
            if (alloww == true) {
              e.preventDefault();
            }
            //e.stopPropagation();
          });



          document.getElementById('dela1').style.display = 'block';
          // document.getElementById('dela2').style.display='none';

          document.getElementById('pickmeup').placeholder = 'Pickup Hotel';
          document.getElementById('dropmeup').placeholder = 'Dropoff Hotel';

          var pickordelivery = document.getElementById('pickordelivery').value = 'Delivery';



          $.ajax({

            type: 'POST',
            url: 'getareasrent.php',
            data: {
              'country': country,
              'city': city
            },

            success: function(result) {


              $("#locations").html(result);



            }

          });


        } else {








          alloww = true;


          $('#pickmeup').on("keydown", function(e) {
            // console.log("handled by the child - stop bubbling please");
            if (alloww == true) {
              e.preventDefault();
            }
            //e.stopPropagation();
          });

          $('#dropmeup').on("keydown", function(e) {
            // console.log("handled by the child - stop bubbling please");
            if (alloww == true) {
              e.preventDefault();
            }
            //e.stopPropagation();
          });



          document.getElementById('pickmeup').placeholder = 'Pickup Location';
          document.getElementById('dropmeup').placeholder = 'Dropoff Location';

          document.getElementById('dela1').style.display = 'none';
          //  document.getElementById('dela2').style.display='block';

          var pickordelivery = document.getElementById('pickordelivery').value = 'Pick Up';
          $.ajax({

            type: 'POST',
            url: 'getairportsrent.php',
            data: {
              'country': country,
              'city': city
            },

            success: function(result) {


              $("#locations").html(result);



            }

          });
        }

      }
    </script>


    <script>
      $("#city").on('change', function() {

            var country = document.getElementById('country').value;
            var city = document.getElementById('city').value;

            document.getElementById('pickmeup').value = '';
            document.getElementById('dropmeup').value = '';

            var sldr = document.getElementById('sldr');

            if (sldr.checked) {




              alloww = false;

              $('#pickmeup').on("keydown", function(e) {
                // console.log("handled by the child - stop bubbling please");
                if (alloww == true) {
                  e.preventDefault();
                }
                //e.stopPropagation();
              });

              $('#dropmeup').on("keydown", function(e) {
                // console.log("handled by the child - stop bubbling please");
                if (alloww == true) {
                  e.preventDefault();
                }
                //e.stopPropagation();
              });



              document.getElementById('dela1').style.display = 'block';
              // document.getElementById('dela2').style.display='none';

              document.getElementById('pickmeup').placeholder = 'Pickup Hotel';
              document.getElementById('dropmeup').placeholder = 'Dropoff Hotel';

              var pickordelivery = document.getElementById('pickordelivery').value = 'Delivery';



              $.ajax({

                type: 'POST',
                url: 'getareasrent.php',
                data: {
                  'country': country,
                  'city': city
                },

                success: function(result) {


                  $("#locations").html(result);



                }

              });


            } else {








              alloww = true;


              $('#pickmeup').on("keydown", function(e) {
                // console.log("handled by the child - stop bubbling please");
                if (alloww == true) {
                  e.preventDefault();
                }
                //e.stopPropagation();
              });

              $('#dropmeup').on("keydown", function(e) {
                // console.log("handled by the child - stop bubbling please");
                if (alloww == true) {
                  e.preventDefault();
                }
                //e.stopPropagation();
              });



              document.getElementById('pickmeup').placeholder = 'Pickup Location';
              document.getElementById('dropmeup').placeholder = 'Dropoff Location';

              document.getElementById('dela1').style.display = 'none';
              //  document.getElementById('dela2').style.display='block';

              var pickordelivery = document.getElementById('pickordelivery').value = 'Pick Up';
              $.ajax({

                type: 'POST',
                url: 'getairportsrent.php',
                data: {
                  'country': country,
                  'city': city
                },

                success: function(result) {


                  $("#locations").html(result);



                }

              });
            }
          }
    </script>
    <?php

    include 'footer.php';
    ?>