<?php

session_start();
// session_destroy();


include 'db_connection.php';
include 'header.php';




if (isset($_POST['modify'])) {

  $tt = $_POST['tripType2'];
  // var_dump($_POST);
  if ($tt == 'round') {

    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['adultst'] = $_POST['adults'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);
    $_SESSION['childt'] = $_POST['child'];
    $_SESSION['arrivaldate'] = $_POST['sdate'];
    $_SESSION['departuredate'] = $_POST['edate'];
    $_SESSION['fromlocation1'] = $_POST['fromlocation1'];
    $_SESSION['tolocation1'] = $_POST['tolocation1'];
    $_SESSION['fromlocation2'] = $_POST['fromlocation2'];
    $_SESSION['tolocation2'] = $_POST['tolocation2'];
    $_SESSION['arrivalvehicletype'] = $_POST['vtype1'];
    $_SESSION['departurevehicletype'] = $_POST['vtype2'];
    $_SESSION['tripType2'] = $_POST['tripType2'];
    $_SESSION['triptype'] = $_POST['tripType2'];
  }

  if ($tt == 'single') {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['adultst'] = $_POST['adults'];
    $_SESSION['childt'] = $_POST['child'];
    $_SESSION['arrivaldate'] = $_POST['datefilter'];
    $_SESSION['departuredate'] = $_POST['departuredate'];
    $_SESSION['fromlocation1s'] = $_POST['fromlocation1s'];
    $_SESSION['tolocation1s'] = $_POST['tolocation1s'];
    $_SESSION['fromlocation1'] = $_POST['fromlocation1'];
    $_SESSION['tolocation1'] = $_POST['tolocation1'];
    $_SESSION['fromlocation2'] = $_POST['fromlocation2'];
    $_SESSION['tolocation2'] = $_POST['tolocation2'];
    $_SESSION['arrivalvehicletype'] = $_POST['vvtype1'];
    $_SESSION['tripType2'] = $_POST['tripType2'];
    $_SESSION['triptype'] = $_POST['tripType2'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);
  }
  if ($tt == 'From Hotel to Airport') {


    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);

    $_SESSION['departuredate'] = $_POST['departuredate'];

    $_SESSION['fromlocation2'] = $_POST['fromlocation2'];
    $_SESSION['tolocation2'] = $_POST['tolocation2'];

    $_SESSION['type2'] = $_POST['type2'];
    $_SESSION['triptype'] = $_POST['triptype'];
  }

  if ($tt == 'From Airport to Hotel') {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);
    $_SESSION['arrivaldate'] = $_POST['arrivaldate'];

    $_SESSION['fromlocation1'] = $_POST['fromlocation1'];
    $_SESSION['tolocation1'] = $_POST['tolocation1'];

    $_SESSION['type1'] = $_POST['type1'];

    $_SESSION['triptype'] = $_POST['triptype'];
  }




  header("Location: selectcar.php");
}


if (isset($_POST['submit'])) {

  $tt = $_POST['triptype'];

  if ($tt == 'round') {

    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);
    $_SESSION['arrivaldate'] = $_POST['arrivaldate'];
    $_SESSION['departuredate'] = $_POST['departuredate'];
    $_SESSION['fromlocation1'] = $_POST['fromlocation1'];
    $_SESSION['tolocation1'] = $_POST['tolocation1'];
    $_SESSION['fromlocation2'] = $_POST['fromlocation2'];
    $_SESSION['tolocation2'] = $_POST['tolocation2'];
    $_SESSION['type1'] = $_POST['type1'];
    $_SESSION['type2'] = $_POST['type2'];
    $_SESSION['triptype'] = $_POST['triptype'];

    $_SESSION['car1'] = $_POST['car1'];
    $_SESSION['car2'] = $_POST['car2'];
  }
  if ($tt == 'From Hotel to Airport') {


    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);

    $_SESSION['departuredate'] = $_POST['departuredate'];

    $_SESSION['fromlocation2'] = $_POST['fromlocation2'];
    $_SESSION['tolocation2'] = $_POST['tolocation2'];

    $_SESSION['type2'] = $_POST['type2'];
    $_SESSION['triptype'] = $_POST['triptype'];


    $_SESSION['car2'] = $_POST['car2'];
  }

  if ($tt == 'From Airport to Hotel') {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['pax'] = intval($_POST['adults']) + intval($_POST['child']);
    $_SESSION['arrivaldate'] = $_POST['arrivaldate'];

    $_SESSION['fromlocation1'] = $_POST['fromlocation1'];
    $_SESSION['tolocation1'] = $_POST['tolocation1'];

    $_SESSION['type1'] = $_POST['type1'];

    $_SESSION['triptype'] = $_POST['triptype'];

    $_SESSION['car1'] = $_POST['car1'];
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
<link rel="stylesheet" href="styles/appp.css">







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">



<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> -->


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>
  .btnba {
    background: linear-gradient(45deg, #dc3545 0%, black 100%);
    font-size: 16px;
    font-family: "Poppins", sans-serif;
    text-transform: capitalize;
    padding: 18px 45px;
    border-radius: 45px;
    font-weight: 500;
    border: 1px solid;
    position: relative;
    z-index: 1;
    transition: .3s ease-in;
    overflow: hidden;
    margin-top: 10px;
    width: 200px !important;
    border-radius: 45px !important;
    padding: 19px !important;


  }


  .btnba:hover {
    background: linear-gradient(90deg, #dc3545 0%, black 100%);
    box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .5),
      -4px -4px 6px 0 rgba(116, 125, 136, .2),
      inset -4px -4px 6px 0 rgba(255, 255, 255, .5),
      inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
    color: #fff;
  }
</style>
















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

<!-- Modal2 -->
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
      <!--<div style='max-width:1000px;' class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
      <!--  <span id='clickclose' aria-hidden="true">&times;</span>
        </button>
      </div>-->
      <div style='margin:0 auto;' class="notranslate modal-body">





        <!--nEW pOPuP-->







        <!--nEW eNDS-->

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Login</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Sign Up</button>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


            <button style='border-radius:20px;'><img src='googlelogo.png'>Sign in with Google</button>


            <input name='email' class='form-control' placeholder='Email'>
            <input name='password' class='form-control' placeholder='Password'>



          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>

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

<style>
  .page_searchbox_container {
    padding: 30px 10px !important;
    border: 1px solid lightgray;
    border-radius: 15px;
    margin-top: 20px;
  }
</style>
<!--start-->

<div class="container p-0 page_searchbox_container">
  <div style='margin-top:-20px; margin-bottom:20px; text-align:center;'>
    One Way
    &nbsp;&nbsp;
    <label style='margin:0 auto;' class="switch">

      <input value='round' onchange='changeways(this)' <?php if (isset($_SESSION['tripType2']) && $_SESSION['tripType2'] == 'round') {
                                                          echo 'checked';
                                                        } ?> type="checkbox">
      <span class="slider round"></span>

    </label>
    &nbsp;&nbsp;
    Round Trip


  </div>
  <form autocomplete="off" action='#' method='POST'>

    <div class='row'>

      <div style='text-align:center;' class='col-lg-4 col-md-4 col-sm-6 col-xs-12 pt-2'>
        <select style='text-align:center;' id="country" value=' <?php if (isset($_SESSION['country'])) {
                                                                  echo $_SESSION['country'];
                                                                } ?>' name='country' class="form-select">
          <option selected>United Arab Emirates</option>

        </select>
      </div>


      <div style='text-align:center;' class='col-lg-4 col-md-4 col-sm-6 col-xs-12 pt-2'>
        <select style='text-align:center;' id="city" value=' <?php if (isset($_SESSION['city'])) {
                                                                echo $_SESSION['city'];
                                                              } ?>' name='city' class="form-select">
          <option disabled selected>Select City</option>

        </select>
      </div>



      <div style='text-align:center;' class='col-lg-2 col-md-2 col-sm-6 col-xs-12 pt-2'>
        <input style='text-align:center;' placeholder='Adults' min='1' value='<?php if (isset($_SESSION['adultst'])) {
                                                                                echo $_SESSION['adultst'];
                                                                              } ?>' type='number' id="pax" name='adults' class="form-select">
      </div>
      <div style='text-align:center;' class='col-lg-2 col-md-2 col-sm-6 col-xs-12 pt-2'>
        <input style='text-align:center;' placeholder='Children' min='1' value='<?php if (isset($_SESSION['childt'])) {
                                                                                  echo $_SESSION['childt'];
                                                                                } ?>' type='number' id="pax" name='child' class="form-select">
      </div>
      <datalist style='display:none;' id='listedareas'>
      </datalist>
      <datalist style='display:none;' id='listedareas2'>
      </datalist>
    </div>







    <div id='populatemepl' class='row'>
      <input id='changeways' name='changewaysz' style='display:none;' type='text' value='From Airport to Hotel'>
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

        .daterangepicker .calendar-table th,
        .daterangepicker .calendar-table td {
          padding: 0px;
        }
      </style>
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

      <input type="hidden" id="formtypefield" name="tripType2" value='<?php if (isset($_SESSION['tripType2'])) {
                                                                        echo $_SESSION['tripType2'];
                                                                      } elseif (isset($_SESSION['triptype'])) {
                                                                        echo $_SESSION['triptype'];
                                                                      } ?>' value="single">
      <div id='adate' class="row" style="padding-left: 0px; padding-right:0px;">
        <div style='text-align:center;' class='col-lg-4 col-md-4 col-sm-12 col-xs-12 pt-4'>
          <input id='datessy' style='text-align:center;' style=" color: #D3D3D3;" class='notranslate form-select' type="text" placeholder='Arrival Date' name="datefilter" value='<?php if (isset($_SESSION['arrivaldate'])) {
                                                                                                                                                                                    echo $_SESSION['arrivaldate'];
                                                                                                                                                                                  } ?>' />
          <input type="hidden" name="arrivaldate" class="form-control" id="ssdate" value='<?php if (isset($_SESSION['arrivaldate'])) {
                                                                                            echo $_SESSION['arrivaldate'];
                                                                                          } ?>'>
          <script>
            $(function() {

              setTimeout(() => {

                var newdate = $('#ssdate').val();

                // $('input[name="datefilter"]').val(star_dateFormated);
                $('input[name="datefilter"]').daterangepicker({
                  opens: 'left',
                  autoUpdateInput: false,
                  singleDatePicker: true,
                  // timePicker: true,
                  timePickerIncrement: 30,
                  minYear: 1901,
                  locale: {
                    format: 'DD/MM/YYYY',
                    cancelLabel: 'Clear'
                  }
                }, function(start, end, label) {
                  $('input[name="datefilter"]').val(start.format('DD/MM/YYYY'));
                  $('#ssdate').val(start.format('DD/MM/YYYY'));
                  //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
              }, 1000);

            });
          </script>

          <!-- <input style='text-align:center;' value='<?php echo $_SESSION['sdate']; ?>' type='date' name='arrivaldate' class="form-select"> -->
        </div>
        <input value="<?php echo $_SESSION['hotel']; ?>" id='gethotelvalue' style='display:none;'>
        <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
          <input list='listedareas2' style='text-align:center;' type='text' placeholder='From' name='fromlocation1s' value="<?php if (isset($_SESSION['fromlocation1s'])) {
                                                                                                                              echo $_SESSION['fromlocation1s'];
                                                                                                                            } else if (isset($_SESSION['fromlocation1'])) {
                                                                                                                              echo $_SESSION['fromlocation1'];
                                                                                                                            } else {
                                                                                                                              echo $_SESSION['hotel'];
                                                                                                                            } ?>" class="form-select">
        </div>
        <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
          <input list='listedareas' style='text-align:center;' placeholder='To' type='text' name='tolocation1s' class="form-select" value="<?php if (isset($_SESSION['tolocation1s'])) {
                                                                                                                                              echo $_SESSION['tolocation1s'];
                                                                                                                                            } else if (isset($_SESSION['tolocation1'])) {
                                                                                                                                              echo $_SESSION['tolocation1'];
                                                                                                                                            } else {
                                                                                                                                              echo $_SESSION['hotel'];
                                                                                                                                            } ?>">
        </div>
        <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12 pt-4'>
          <select style='text-align:center;' name='vvtype1' value="<?php if (isset($_SESSION['arrivalvehicletype'])) {
                                                                      echo $_SESSION['arrivalvehicletype'];
                                                                    } ?>" class='form-select'>
            <option <?php if ($_SESSION['arrivalvehicletype'] == 'Economy') {
                      echo 'selected';
                    } ?>>Economy</option>
            <option <?php if ($_SESSION['arrivalvehicletype'] == 'Luxury') {
                      echo 'selected';
                    } ?>>Luxury</option>
            <option <?php if ($_SESSION['arrivalvehicletype'] == 'Super Luxury') {
                      echo 'selected';
                    } ?>>Super Luxury</option>
            <option <?php if ($_SESSION['arrivalvehicletype'] == 'Bus') {
                      echo 'selected';
                    } ?>>Bus</option>
          </select>
        </div>
      </div>

      <div id="addate" style="display: none; padding-left: 0px; padding-right:0px;">
        <div class="row" style="padding-left: 0px; padding-right:0px;">
          <div class='col-lg-4 col-md-4 col-sm-12 col-xs-12 pt-4'>
            <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text" value='<?php echo $_SESSION['arrivaldate'] . "-" . $_SESSION['departuredate']; ?>' placeholder='Arrival - Departure Date' name="datefilter2" />
            <input type="hidden" name="sdate" class="form-control" id="sdate" value="<?php if (isset($_SESSION['arrivaldate'])) {
                                                                                        echo $_SESSION['arrivaldate'];
                                                                                      } ?>">
            <input type="hidden" name="edate" class="form-control" id="edate" value="<?php if (isset($_SESSION['departuredate'])) {
                                                                                        echo $_SESSION['departuredate'];
                                                                                      } ?>">
            <input type="hidden" name="sessionsdate" class="form-control" id="sessionsdate" value="<?php if (isset($_SESSION['arrivaldate'])) {
                                                                                                      echo $_SESSION['arrivaldate'];
                                                                                                    } ?>">
            <input type="hidden" name="sessionedate" class="form-control" id="sessionedate" value="<?php if (isset($_SESSION['departuredate'])) {
                                                                                                      echo $_SESSION['departuredate'];
                                                                                                    } ?>">

            <script>
              $(function() {
                setTimeout(() => {
                  var today2 = new Date();

                  start_dateFormated = String(today2.getDay()).padStart(2, '0') + '/' + String(today2.getMonth()).padStart(2, '0') + '/' + today2.getFullYear();
                  endd_dateFormated = String(today2.getDay()).padStart(2, '0') + '/' + String(today2.getMonth()).padStart(2, '0') + '/' + today2.getFullYear();
                  // document.getElementById('sdate').value = start_dateFormated;
                  // document.getElementById('edate').value = endd_dateFormated;

                  // $('input[name="datefilter2"]').val(start_dateFormated + ' - ' + endd_dateFormated);
                  // $('input[name="datefilter2"]').val('Arrival Date - Departure Date');

                  var sessionsdate = $('#sessionsdate').val();
                  var sessionedate = $('#sessionedate').val();

                  var newsdate = '';
                  var newedate = '';

                  var check = false;


                  if (sessionsdate.length != 0) {
                    let ddddd = sessionsdate.split('-');

                    if (ddddd.length > 1) {
                      newsdate = ddddd[2] + '/' + ddddd[1] + '/' + ddddd[0];
                    } else {
                      newsdate = sessionsdate;
                    }
                    document.getElementById('sdate').value = newsdate;
                    check = true;
                  } else {
                    document.getElementById('sdate').value = start_dateFormated;
                    newsdate = start_dateFormated;

                  }

                  if (sessionedate.length != 0) {
                    let ddddd2 = sessionedate.split('-');
                    if (ddddd2.length > 1) {
                      newedate = ddddd2[2] + '/' + ddddd2[1] + '/' + ddddd2[0];
                    } else {
                      newedate = sessionedate;
                    }
                    document.getElementById('edate').value = newedate;
                    check = true;
                  } else {
                    document.getElementById('edate').value = endd_dateFormated;
                    newedate = endd_dateFormated;

                  }

                  if (check) {
                    $('input[name="datefilter2"]').val(newsdate + ' - ' + newedate);
                  } else {
                    $('input[name="datefilter2"]').val(start_dateFormated + ' - ' + endd_dateFormated);
                  }

                  $('input[name="datefilter2"]').daterangepicker({
                    opens: 'left',
                    autoUpdateInput: false,
                    // timePicker: true,
                    timePickerIncrement: 30,
                    startDate: newsdate,
                    endDate: newedate,
                    locale: {
                      format: 'DD/MM/YYYY',
                      cancelLabel: 'Clear'
                    }
                  }, function(start, end, label) {
                    // document.getElementById('sdate').value = start_dateFormated;
                    // document.getElementById('edate').value = endd_dateFormated;
                    //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));




                  });
                }, 1000);

              });
            </script>
            <script type="text/javascript">
              $(function() {

                $('input[name="datefilter2"]').on('apply.daterangepicker', function(ev, picker) {
                  var sd = picker.startDate.format('DD/MM/YYYY');
                  var ed = picker.endDate.format('DD/MM/YYYY');

                  $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

                  document.getElementById('sdate').value = sd;

                  document.getElementById('edate').value = ed;

                });
                $('input[name="datefilter2"]').on('cancel.daterangepicker', function(ev, picker) {
                  $(this).val('');
                });

              });
            </script>
          </div>
          <input value="<?php echo $_SESSION['hotel']; ?>" id='gethotelvalue' style='display:none;'>
          <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
            <input list='listedareas2' style='text-align:center;' type='text' placeholder='From' name='fromlocation1' value="<?php if (isset($_SESSION['fromlocation1'])) {
                                                                                                                                echo $_SESSION['fromlocation1'];
                                                                                                                              } else {
                                                                                                                                echo $_SESSION['hotel'];
                                                                                                                              } ?>" class="form-select">
          </div>
          <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
            <input list='listedareas' style='text-align:center;' placeholder='To' type='text' name='tolocation1' value="<?php if (isset($_SESSION['tolocation1'])) {
                                                                                                                          echo $_SESSION['tolocation1'];
                                                                                                                        } ?>" class="form-select">
          </div>
          <div class='col-lg-2 col-md-4 col-sm-12 col-xs-12 pt-4'>
            <select style='text-align:center;' name='vtype1' class='form-select'>
              <option <?php if ($_SESSION['arrivalvehicletype'] == 'Economy') {
                        echo 'selected';
                      } ?>>Economy</option>
              <option <?php if ($_SESSION['arrivalvehicletype'] == 'Luxury') {
                        echo 'selected';
                      } ?>>Luxury</option>
              <option <?php if ($_SESSION['arrivalvehicletype'] == 'Super Luxury') {
                        echo 'selected';
                      } ?>>Super Luxury</option>
              <option <?php if ($_SESSION['arrivalvehicletype'] == 'Bus') {
                        echo 'selected';
                      } ?>>Bus</option>
            </select>
          </div>
        </div>
        <div class="row" style="padding-left: 0px; padding-right:0px;">
          <div class='col-lg-5 col-md-2 col-sm-12 col-xs-12 pt-4'>
            <input list='listedareas2' style='text-align:center;' type='text' value="<?php if (isset($_SESSION['fromlocation2'])) {
                                                                                        echo $_SESSION['fromlocation2'];
                                                                                      } else {
                                                                                        echo $_SESSION['hotel'];
                                                                                      } ?>" placeholder='From' name='fromlocation2' class="form-select">
          </div>
          <div class='col-lg-5 col-md-2 col-sm-12 col-xs-12 pt-4'>
            <input list='listedareas' style='text-align:center;' placeholder='To' type='text' name='tolocation2' value="<?php if (isset($_SESSION['tolocation2'])) {
                                                                                                                          echo $_SESSION['tolocation2'];
                                                                                                                        } ?>" class="form-select">
          </div>
          <div class='col-lg-2 col-md-4 col-sm-12 col-xs-12 pt-4'>
            <select style='text-align:center;' name='vtype2' value="<?php if (isset($_SESSION['departurevehicletype'])) {
                                                                      echo $_SESSION['departurevehicletype'];
                                                                    } ?>" class='form-select'>
              <option <?php if ($_SESSION['departurevehicletype'] == 'Economy') {
                        echo 'selected';
                      } ?>>Economy</option>
              <option <?php if ($_SESSION['departurevehicletype'] == 'Luxury') {
                        echo 'selected';
                      } ?>>Luxury</option>
              <option <?php if ($_SESSION['departurevehicletype'] == 'Super Luxury') {
                        echo 'selected';
                      } ?>>Super Luxury</option>
              <option <?php if ($_SESSION['departurevehicletype'] == 'Bus') {
                        echo 'selected';
                      } ?>>Bus</option>
            </select>
          </div>
        </div>
      </div>






    </div>






    <div id='populateme2' style="display: none;" class='row'>

      <label>Arrival</label>
      <div id='fromlocation1' style='text-align:center;' class='col-sm'>
        <input list='listedareas2' value="<?php echo $_SESSION['hotel']; ?>" style='text-align:center;' type='text' placeholder='From' name='fromlocation123' class="form-select">

      </div>

      <div id='tolocation1' style='text-align:center;' class='col-sm'>
        <input list='listedareas' style='text-align:center;' placeholder='To' type='text' name='tolocation123' class="form-select">
      </div>





      <div class='col-sm'>
        <select style='text-align:center;' name='vtype123' class='form-select'>
          <option>Economy</option>
          <option>Luxury</option>
          <option>Super Luxury</option>
          <option>Bus</option>
        </select>
      </div>






    </div>






    <div id='populateme3' class='row'>


    </div>
    <div class='row'>
      <div style='float:right; margin-top:15px;' class='col-sm-12'>
        <input type='submit' name='modify' style='background-color:#dc3545; float:right;' class="btn btnba btn-primary btn-lg border-0 " value='Search Vehicle'>
      </div>
    </div>






  </form>
</div>


<div class="main-holder smry-pg">



  <main>

    <section class="smry my-5 py-3">
      <div class="">




        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
          .input-iconszz i {
            position: absolute;

          }

          .input-iconszz {
            width: 100%;
            margin-bottom: 10px;
          }

          .iconzz {
            padding: 10px;
            margin-top: 3px;


          }
        </style>
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
        </style>




        <datalist id='listedareas'>

        </datalist>
        <datalist id='listedareas2'>

        </datalist>

        <!-- main guest block -->
        <div class="smry-main-block-1 smry-main-block">

          <div class="container">

            <div class="col-lg-12 col-md-12 col-sm-12 px-2">





              <style>
                .content {


                  display: none;
                }

                #loadMore {
                  width: 200px;


                  border-radius: 10px;


                }



                .content {

                  animation: blur .7s ease-out;

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
                      0px 0px 50px #7B96B8,
                      0px 0px 150px #7B96B8,
                      0px 10px 100px #7B96B8,
                      0px 10px 100px #7B96B8,
                      0px 10px 100px #7B96B8,
                      0px 10px 100px #7B96B8,
                      0px -10px 100px #7B96B8,
                      0px -10px 100px #7B96B8;
                  }
                }
              </style>



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

                .car_box_img {
                  border-right: 1px solid lightgrey;
                }

                .car_box_img {
                  border-radius: 7px;
                  overflow: hidden;
                  width: 300px;
                  height: 200px;
                  position: relative;
                  /* border: 1px solid red; */
                }

                .car_box_img img {
                  width: 100%;
                  height: 100%;
                  object-fit: cover;
                }

                .me-2 {
                  color: #dc3545;
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




              <input style='display:none;' id='car1' name='car1'>

              <input style='display:none;' id='car2' name='car2'>










              <?php
              if ($_SESSION['triptype'] == 'From Airport to Hotel' || $_SESSION['triptype'] == 'round') {
              ?>
                <label>Arrival Car Selected: <b id='arrivalcarlabel'></b></label> &nbsp; &nbsp;<?php
                                                                                              } ?>

                <?php
                if ($_SESSION['triptype'] == 'From Hotel to Airport' || $_SESSION['triptype'] == 'round') {
                ?><label>Departure Car Selected: <b id='departurecarlabel'></b></label>
                <?php
                }
                ?>
                <br />
                <?php
                $cntry = $_SESSION['country'];
                $cty = $_SESSION['city'];
                $increment = 6000;

             





                  $sqlar = "SELECT * FROM vehiclesInventorydatabase WHERE country='$cntry' && city='$cty' && (type='" . $_SESSION['arrivalvehicletype'] . "' || type='" . $_SESSION['departurevehicletype'] . "') ORDER BY id DESC";
                  $result = $conn->query($sqlar);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $cmp = $row['hotel'];
                    $brand = $row['brand'];
                    $model = $row['model'];
                    $year = $row['year'];
                    $img = $row['image'];
                    
                    
                    
                       $sqlar2zara = "SELECT * FROM newvehicleprices WHERE country='$cntry' && city='$cty' && name='$cmp' && brand='$brand' && model='$model'";
                $result2zara = $conn->query($sqlar2zara);

                if ($result2zara->num_rows > 0) {



                ?>
                    <div class="row carsList content2 " style="padding-left: 10px; display:none;">
                      <a href='#' data-bs-toggle="modal" data-bs-target=".carsModal<?php echo $increment; ?>">
                        <div class="col-lg-3 car_box_img">
                          <?php
                          $cmp = $row['hotel'];
                          $brand = $row['brand'];
                          $model = $row['model'];
                          $year = $row['year'];

                          $sqlar2 = "SELECT * FROM carsimages WHERE country='$cntry' && city='$cty' && hotel='$cmp' && brand='$brand' && model='$model' && year='$year'";
                          $result2 = $conn->query($sqlar2);

                          while ($row2 = mysqli_fetch_assoc($result2)) {

                            $img = $row2['image'];
                          }
                          ?>

                          <img style='width:100%; border-radius:10px;' src='pco/Car Images/<?php echo $cmp; ?>/<?php echo $brand; ?>/<?php echo $model; ?>/<?php echo $img; ?>'>








                          <a href='#' data-bs-toggle="modal" data-bs-target=".carsModal<?php echo $increment; ?>">
                            <span class="viewEyeIcon"><i class="bi bi-eye "></i></span>
                          </a>
                        </div>
                      </a>
                      <div class="col-lg-5">
                        <div class="row">
                          <h5> <?= $row['brand']; ?> <?= $row['model'];  ?> (<?= $row['year'] ?>)</h5>
                        </div>
                        <div class="row d-flex">
                          <div class="col-sm">
                            <i style='color: #dc3545;' class="stylenotneeded fas fa-suitcase"></i> 2
                            <i style='color: #dc3545;' class="stylenotneeded fas fa-user"></i> 4
                          </div>
                        </div>
                        <div class="row mt-4">
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
                      <div class="col-lg-4" style="border-left:1px solid lightgray;<?php if ($_SESSION['triptype'] == !'round') {
                                                                                      echo 'padding-top:33px;';
                                                                                    } ?>">
                        <div class='row'>
                          <?php
                          $sqlar2z = "SELECT * FROM newvehicleprices WHERE country='$cntry' && city='$cty' && name='$cmp' && brand='$brand' && model='$model'";
                          $result2z = $conn->query($sqlar2z);

                          while ($row2z = mysqli_fetch_assoc($result2z)) {
                          ?>
                            <?php
                            if ($_SESSION['triptype'] == 'round') {
                            ?>
                              <?php
                              if ($row2z['area'] == $_SESSION['tolocation1']) {

                                if ($_SESSION['arrivalvehicletype'] == $row['type']) {
                              ?>


                                  <div style='text-align:center' class='col-sm'>
                                    <h5>Arrival Rate</h5>
                                    <h3 align='center' style='color:#dc3545;'>AED
                                      <?php


                                      $banday = $_SESSION['pax'];
                                      $allow = $row['maximum'];

                                      $need = intval($banday) / intval($allow);

                                      if (strpos($need, '.') != FALSE) {
                                        $need = intval($need) + 1;
                                      } else {
                                        $need = intval($need);
                                      }

                                      $carprice = intval($row2z['price']) * $need;

                                      echo $carprice;



                                      ?>
                                    </h3>
                                  </div>







                              <?php
                                }
                              }
                              ?>
                              <?php
                              if ($row2z['area'] == $_SESSION['tolocation2']) {

                                if ($_SESSION['departurevehicletype'] == $row['type']) {
                              ?>
                                  <div style='text-align:center' class='col-sm'>
                                    <h5>Departure Rate</h5>
                                    <h3 align='center' style='color:#dc3545;'>AED
                                      <?php
                                      $banday = $_SESSION['pax'];
                                      $allow = $row['maximum'];

                                      $need = intval($banday) / intval($allow);

                                      if (strpos($need, '.') != FALSE) {
                                        $need = intval($need) + 1;
                                      } else {
                                        $need = intval($need);
                                      }

                                      $carprice2 = intval($row2z['price']) * $need;

                                      echo $carprice2;


                                      ?>
                                    </h3>
                                  </div>

                              <?php
                                }
                              }
                              ?>




                            <?php
                            } else {

                            ?>


                              <div class='row'>


                                <?php
                                if ($_SESSION['triptype'] == 'single') {

                                  if ($row2z['area'] == $_SESSION['tolocation1']) {

                                    if ($_SESSION['arrivalvehicletype'] == $row['type']) {
                                ?>
                                      <div style='text-align:center' class='col-sm'>
                                        <h5>Arrival Rate</h5>
                                        <h3 align='center' style='color:#dc3545;'>AED
                                          <?php


                                          $banday = $_SESSION['pax'];
                                          $allow = $row['maximum'];

                                          $need = intval($banday) / intval($allow);

                                          if (strpos($need, '.') != FALSE) {
                                            $need = intval($need) + 1;
                                          } else {
                                            $need = intval($need);
                                          }

                                          $carprice = intval($row2z['price']) * $need;

                                          echo $carprice;
                                          ?></h3>
                                        <input style='display:none;' name='carprice' value='<?php echo $carprice; ?>'>
                                      </div>
                                <?php
                                    }
                                  }
                                }
                                ?>



                                <?php
                                if ($_SESSION['triptype'] == 'From Hotel to Airport') {

                                  if ($row2z['area'] == $_SESSION['tolocation2']) {
                                    if ($_SESSION['departurevehicletype'] == $row['type']) {
                                ?>
                                      <div style='text-align:center' class='col-sm'>
                                        <h5>Departure Rate</h5>
                                        <h3 align='center' style='color:#dc3545;'>AED
                                          <?php


                                          $banday = $_SESSION['pax'];
                                          $allow = $row['maximum'];

                                          $need = intval($banday) / intval($allow);

                                          if (strpos($need, '.') != FALSE) {
                                            $need = intval($need) + 1;
                                          } else {
                                            $need = intval($need);
                                          }

                                          $carprice2 = intval($row2z['price']) * $need;

                                          echo $carprice2;


                                          ?></h3>
                                      </div>

                                <?php
                                    }
                                  }
                                }
                                ?>



                              </div>



                            <?php




                            }



                            ?>



                          <?php

                          }
                          ?>
                        </div>
                        <h3 align='center'> <i style='color: #dc3545;' class="stylenotneeded fas fa-car"></i><i style='color: #dc3545;' class="stylenotneeded fas fa-car"></i></h3>
                        <h6 align='center'>
                          <?php

                          $banday = $_SESSION['pax'];
                          $allow = $row['maximum'];

                          $need3 = intval($banday) / intval($allow);

                          if (strpos($need3, '.') != FALSE) {
                            $need3 = intval($need3) + 1;
                            echo intval($need3);
                          } else {
                            $need3 = intval($need3);
                            echo intval($need3);
                          }
                          ?> cars Needed for <?php echo $_SESSION['pax']; ?> persons</h6>

                        <h6 align='center'>
                          <button id='<?php echo $row['id']; ?>' data-id='<?php echo $row['id']; ?>' data-cars-needed='<?php echo $need3; ?>' data-price-arrival='<?php echo $carprice; ?>' data-car-departure='<?php echo $row['brand'] . ' ' . $row['model'] . ' ' . $row['year']; ?>' data-car-arrival='<?php echo $row['brand'] . ' ' . $row['model'] . ' ' . $row['year']; ?>' data-price-departure='<?php echo $carprice2; ?>' onclick='sendlistvalue(this)' class='changename btn theme_btn btn-secondary active'> Select </button>
                        </h6>
                        <button id='pressmepop<?php echo $row['id']; ?>' style='display:none;' data-toggle="modal" data-target="#exampleModalCentercar<?php echo $row['id']; ?>"> Select </button>

                      </div>
                    </div>
                    <div class="modal fade carsModal<?php echo $increment; ?>" tabindex="-1" aria-labelledby="carssModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl " style="margin-top:auto; margin-bottom:auto;">
                        <div class="modal-content" style="border-radius:25px; background:black;">
                          <div class="container-lg contentcat" style="background: rgb(42, 42, 58);">
                            <div class="row">
                              <div class="col-lg-8">


                                <?php
                                $sql2z = "SELECT * FROM carsimages WHERE country='$cntry' && city='$cty' && hotel='$cmp' && brand='$brand' && model='$model' && year='$year'";
                                $result2z = $conn->query($sql2z);
                                if ($result2z->num_rows > 0) {
                                  $popupImageIndex = 0;
                                  while ($row2z = $result2z->fetch_assoc()) {
                                ?>


                                    <div class="mySlidesCss mySlides<?php echo $increment ?>">
                                      <!-- <img src="/pco/RentacarCar Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" alt="" class="img-fluid"> -->

                                      <img alt="" class="img-fluid" style="width:100%; object-fill:cover;" src='pco/Car Images/<?php echo $cmp; ?>/<?php echo $brand; ?>/<?php echo $model; ?>/<?php echo $row2z['image']; ?>'>
                                    </div>



                                <?php
                                    $popupImageIndex++;
                                  }
                                }
                                ?>





                                <a class="prevs" onclick="plusSlides<?php echo $increment ?>(-1)">❮</a>
                                <a class="nexts" onclick="plusSlides<?php echo $increment ?>(1)">❯</a>
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
                                              M <?php echo $row['year']; ?>
                                            </p>


                                          </div>
                                          <?php echo $row['description']; ?>
                                        </div>












                                        <!-- <h6><?php

                                                  foreach ($allroomtypessdesc[$cnna] as $bn) {
                                                    echo $bn;
                                                  }





                                                  ?></h6> -->


                                      </div>
                                    
                                      <div class="tab-pane fade" id="contact<?php echo $abc; ?>" role="tabpanel" aria-labelledby="contact-tab">
                                        <br />
                                        Hi

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

                            <div style="padding:10px;" class="row myCat<?php echo $increment ?>" onclick="currentCat<?php echo $increment ?>(1)">


                              <?php
                              $sql2z = "SELECT * FROM carsimages WHERE country='$cntry' && city='$cty' && hotel='$cmp' && brand='$brand' && model='$model' && year='$year'";
                              $result2z = $conn->query($sql2z);
                              if ($result2z->num_rows > 0) {
                                $popupImageIndex = 0;
                                while ($row2z = $result2z->fetch_assoc()) {

                              ?>
                                  <div class="column" style="height: 57px; width:100px; overflow:hidden; margin-right: 10px; ">

                                    <!-- <img src="/pco/RentacarCar Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" alt="" class="img-fluid"> -->
                                    <img src="pco/Car Images/<?php echo $cmp; ?>/<?php echo $brand; ?>/<?php echo $model; ?>/<?php echo $row2z['image']; ?>" alt="" class="img-fluid">
                                  </div>
                              <?php
                                  $popupImageIndex++;
                                }
                              }
                              ?>

                            </div>
                            <div clsss="contentcat">

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>





                    <?php
                    $ban = $increment;

                    ?>
                    <script>
                      var images_count<?php echo $ban  ?> = 0;
                    </script>
                    <?php
                    $sql2z = "SELECT * FROM carsimages WHERE country='$cntry' && city='$cty' && hotel='$cmp' && brand='$brand' && model='$model' && year='$year'";
                    $result2z = $conn->query($sql2z);
                    if ($result2z->num_rows > 0) {
                      $popupImageIndex = 0;
                      while ($row2z = $result2z->fetch_assoc()) {
                    ?>


                        <script>
                          images_count<?php echo $ban  ?> = images_count<?php echo $ban  ?> + 1;
                        </script>



                    <?php
                        $popupImageIndex++;
                      }
                    }
                    ?>




                    <script>
                      let slideIndex<?php echo $ban ?> = 1;
                      showSlides<?php echo $ban ?>(slideIndex<?php echo $ban ?>);
                      let catIndex<?php echo $ban ?> = 1;
                      showCat<?php echo $ban ?>(catIndex<?php echo $ban ?>);

                      function plusSlides<?php echo $ban ?>(n) {
                        showSlides<?php echo $ban ?>(slideIndex<?php echo $ban ?> += n);
                      }

                      function currentSlide<?php echo $ban ?>(n) {
                        showSlides<?php echo $ban ?>(slideIndex<?php echo $ban ?> = n);
                      }

                      function currentCat<?php echo $ban ?>(n) {
                        showCat<?php echo $ban ?>(catIndex<?php echo $ban ?> = n);
                      }

                      function showSlides<?php echo $ban ?>(n) {

                        let i;
                        let slides = document.getElementsByClassName("mySlides<?php echo $ban ?>");
                        console.log(slides);
                        let dots = document.getElementsByClassName("demo<?php echo $ban ?>");
                        let captionText = document.getElementById("caption<?php echo $ban ?>");
                        let imagesCaptionsCount = document.getElementsByClassName('numbertext');

                        let counts = images_count<?php echo $ban  ?>;;

                        if (n > slides.length) {
                          slideIndex<?php echo $ban ?> = 1
                        }
                        if (n < 1) {
                          slideIndex<?php echo $ban ?> = slides.length
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
                        slides[slideIndex<?php echo $ban ?> - 1].style.display = "block";
                        imagesCaptionsCount[slideIndex<?php echo $ban ?> - 1].style.display = 'block';

                        dots[slideIndex<?php echo $ban ?> - 1].className += " active";
                        captionText.innerHTML = dots[slideIndex<?php echo $ban ?> - 1].alt;
                      }

                      function showCat<?php echo $ban ?>(n) {
                        let i;
                        let catlist = document.getElementsByClassName("myCat<?php echo $ban ?>");
                        let actlist = document.getElementsByClassName("list<?php echo $ban ?>");
                        if (n > catlist.length) {
                          catIndex<?php echo $ban ?> = 1
                        }
                        if (n < 1) {
                          catIndex<?php echo $ban ?> = catlist.length
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




                    <!-- CAR SELECT-->



                    <!-- Modal3 -->
                    <div class="modal fade" id="exampleModalCentercar<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content p-4">
                          <div class="row">
                            <h5 class="modal-title" id="exampleModalLongTitle">Select For</h5>
                          </div>
                          <button style='display:none;' type="button" id='dimissme<?php echo $row['id']; ?>' class="close" data-dismiss="modal" aria-label="Close">X</button>


                          <style>
                            input[type=radio] {
                              display: none;
                            }

                            input[type=radio]:not(:checked)+label {
                              background-color: white;
                              color: black;
                            }

                            input[type=radio]:checked+label {
                              background-color: #b5373e;

                            }
                          </style>
                          <div style='margin:0 auto; position:inline;'>
                            <?php
                            if ($_SESSION['triptype'] == 'From Airport to Hotel' || $_SESSION['triptype'] == 'round') {
                              if ($_SESSION['arrivalvehicletype'] == $row['type']) {
                            ?>
                                <input type="radio" data-label='arrival' data-company='<?php echo $row['hotel']; ?>' data-brand='<?php echo $row['brand']; ?>' data-model='<?php echo $row['model']; ?>' data-image='<?php echo $img; ?>' data-car='<?php echo $row['brand'] . " " . $row['model'] . " " . $row['year']; ?>' data-id='<?php echo $row['id']; ?>' data-paxcount='<?php echo $_SESSION['pax']; ?>' data-carscount='<?php echo $need3; ?>' data-pricecounta='<?php echo $carprice; ?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment; ?>">
                                <label for="radio_<?php echo $increment; ?>" class="btn-lg btn-primary ">Arrival</label>

                            <?php
                              }
                            }
                            ?>


                            <?php
                            if ($_SESSION['triptype'] == 'From Hotel to Airport' || $_SESSION['triptype'] == 'round') {

                              if ($_SESSION['departurevehicletype'] == $row['type']) {


                            ?>
                                <input type="radio" data-label='departure' data-company='<?php echo $row['hotel']; ?>' data-brand='<?php echo $row['brand']; ?>' data-model='<?php echo $row['model']; ?>' data-image='<?php echo $img; ?>' data-id='<?php echo $row['id']; ?>' data-car='<?php echo $row['brand'] . " " . $row['model'] . " " . $row['year']; ?>' data-paxcount='<?php echo $_SESSION['pax']; ?>' data-carscount='<?php echo $need3; ?>' data-pricecountd='<?php echo $carprice2; ?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment + 1; ?>">
                                <label for="radio_<?php echo $increment + 1; ?>" class="btn-lg btn-primary">Departure</label>

                            <?php
                              }
                            }
                            ?>

                            <?php
                            if ($_SESSION['triptype'] == 'round') {

                              if ($_SESSION['arrivalvehicletype'] == $row['type'] && $_SESSION['departurevehicletype'] == $row['type']) {

                            ?>
                                <input type="radio" data-label='both' data-company='<?php echo $row['hotel']; ?>' data-brand='<?php echo $row['brand']; ?>' data-model='<?php echo $row['model']; ?>' data-image='<?php echo $img; ?>' data-car='<?php echo $row['brand'] . " " . $row['model'] . " " . $row['year']; ?>' data-id='<?php echo $row['id']; ?>' data-paxcount='<?php echo $_SESSION['pax']; ?>' data-carscount='<?php echo $need3; ?>' data-pricecounta='<?php echo $carprice; ?>' data-pricecountd='<?php echo $carprice2; ?>' onclick='selectedcar(this)' name="something" id="radio_<?php echo $increment + 2; ?>">


                                <label for="radio_<?php echo $increment + 2; ?>" class="btn-lg btn-primary btn-block">Both</label>


                            <?php
                              }
                            }
                            ?>

                            <?php $increment = $increment + 3; ?>
                          </div>
                          <br />










                        </div>
                      </div>
                    </div>
                    <!-- CAR SELECT END-->
                    <br />

                <?php
                  }
                }

                ?>











                <input style="display:none;" name='arrivalcar' id='arrivalcar' value="<?= $_SESSION[''] ?>">
                <input style="display:none;" name='departurecar' id='departurecar' value="<?= $_SESSION[''] ?>">


                <input style="display:none;" name='arrivalcarid' id='arrivalcarid'>
                <input style="display:none;" name='departurecarid' id='departurecarid'>




                <br />

                <p align='center'><a href="#" class='btn btn-secondary theme_btn active text-capitalize' id="loadMore"> Load More </a></p>



                <script>
                  $(document).ready(function() {
                    $(".content2").slice(0, 4).show();
                    $("#loadMore").on("click", function(e) {
                      e.preventDefault();
                      $(".content2:hidden").slice(0, 4).slideDown();
                      if ($(".content2:hidden").length == 0) {
                        $("#loadMore").text("No More").addClass("noContent");
                        $("#loadMore").hide();

                      }
                    });
                  })
                </script>
                <style>
                  .swal2-confirm {
                    background-color: #b5373e !important;
                  }
                </style>
                <br />
            </div>
          </div>
        </div>
        <!-- end of main guest block -->
      </div>
      <!--   <div class = "d-flex align-items-center justify-content-center mt-5">
                <a href = "#" class = "btn theme_btn btn-secondary active">Complete My Booking</a>
            </div>-->
    </section>
  </main>

  <?php
  if ($_SESSION['triptype'] == 'round') {
  ?>

    <button onclick='navigate()' type='submit' name='submit' style=' max-width:200px; left:0; margin-left:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Continue </button>
  <?php
  }
  ?>

</div>

<input id='triptypecheck' style='display:none;' value='<?php echo $_SESSION['tripType2']; ?>'>

<input style='display:none;' id='paxcount'>

<input style='display:none;' id='carscount1'>
<input style='display:none;' id='carscount2'>

<input style='display:none;' id='pricecounta'>
<input style='display:none;' id='pricecountd'>







<script>
  function navigate() {

    var ar = document.getElementById('arrivalcar').value;
    var dp = document.getElementById('departurecar').value;
    var tp = document.getElementById('triptypecheck').value;
    var aid = document.getElementById('arrivalcarid').value;
    var did = document.getElementById('departurecarid').value;
    var acarsneeded = document.getElementById('carscount1').value;
    var dcarsneeded = document.getElementById('carscount2').value;
    var pricea = document.getElementById('pricecounta').value;
    var priced = document.getElementById('pricecountd').value;

    var car1 = document.getElementById('car1').value;
    var car2 = document.getElementById('car2').value;

    if (tp == 'round') {
      if (ar == '' || dp == '') {
        swal.fire('Please Select Both Cars');
      } else {


        $.ajax({

          type: 'POST',
          url: 'submitformtransfer2.php',
          data: {
            'carida': aid,
            'carsneededa': acarsneeded,
            'caridd': did,
            'carsneededd': dcarsneeded,
            'pricearrival': pricea,
            'pricedeparture': priced,
            'car1': car1,
            'car2': car2
          },

          success: function(result) {

            location.replace("bookingsummarytransfer.php");




          }

        });




      }
    }




  }




  function sendlistvalue($this) {

    // alert('hello');

    var tp = document.getElementById('triptypecheck').value;
    var carid = $this.getAttribute('data-id');
    var carsneeded = $this.getAttribute('data-cars-needed');
    var pricearrival = $this.getAttribute('data-price-arrival');
    var pricedeparture = $this.getAttribute('data-price-departure');







    if (tp == 'From Hotel to Airport') {
      document.getElementById('car2').value = $this.getAttribute('data-car-departure');
      var car2 = document.getElementById('car2').value;


      $.ajax({

        type: 'POST',
        url: 'submitformtransfer.php',
        data: {
          'carid': carid,
          'carsneeded': carsneeded,
          'pricearrival': pricearrival,
          'pricedeparture': pricedeparture,
          'car2': car2
        },

        success: function(result) {

          location.replace("bookingsummarytransfer.php");




        }

      });
    }
    if (tp == 'From Airport to Hotel') {
      document.getElementById('car1').value = $this.getAttribute('data-car-arrival');

      var car1 = document.getElementById('car1').value;



      $.ajax({

        type: 'POST',
        url: 'submitformtransfer.php',
        data: {
          'carid': carid,
          'carsneeded': carsneeded,
          'pricearrival': pricearrival,
          'pricedeparture': pricedeparture,
          'car1': car1
        },

        success: function(result) {

          location.replace("bookingsummarytransfer.php");




        }

      });
    }
    if (tp == 'round') {
      document.getElementById('pressmepop' + carid).click();
    }
    //alert($this.getAttribute('data-id'));
  }





  function selectedcar($this) {

    var label = $this.getAttribute('data-label');
    var id = $this.getAttribute('data-id');

    var carinfo = $this.getAttribute('data-car');
    var company = $this.getAttribute('data-company');
    var model = $this.getAttribute('data-model');
    var brand = $this.getAttribute('data-brand');
    var image = $this.getAttribute('data-image');

    var paxcount = $this.getAttribute('data-paxcount');
    var carscount = $this.getAttribute('data-carscount');
    var pricecounta = $this.getAttribute('data-pricecounta');
    var pricecountd = $this.getAttribute('data-pricecountd');





    if (label == 'arrival') {




      document.getElementById('paxcount').value = paxcount;
      document.getElementById('carscount1').value = carscount;
      document.getElementById('pricecounta').value = pricecounta;





      document.getElementById('arrivalcar').value = carinfo;

      document.getElementById('arrivalcarlabel').innerHTML = carinfo;

      document.getElementById('car1').value = carinfo;

      document.getElementById('arrivalcarid').value = id;







      document.getElementById('dimissme' + id).click();




      Swal.fire({
        title: 'Selected Car for Arrival',
        icon: 'info',
        html: carinfo + '<br/><img style="max-width:200px;" src="pco/Car Images/' + company + '/' + brand + '/' + model + '/' + image + '">',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!'
      })
















    } else if (label == 'departure') {


      document.getElementById('paxcount').value = paxcount;
      document.getElementById('carscount2').value = carscount;
      document.getElementById('pricecountd').value = pricecountd;



      document.getElementById('departurecar').value = carinfo;
      document.getElementById('departurecarlabel').innerHTML = carinfo;
      document.getElementById('departurecarid').value = id;

      document.getElementById('car2').value = carinfo;


      document.getElementById('dimissme' + id).click();


      Swal.fire({
        title: 'Selected Car for Departure',
        icon: 'info',
        html: carinfo + '<br/><img style="max-width:200px;" src="pco/Car Images/' + company + '/' + brand + '/' + model + '/' + image + '">',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!'
      })






    } else if (label == 'both') {

      document.getElementById('paxcount').value = paxcount;
      document.getElementById('carscount1').value = carscount;

      document.getElementById('carscount2').value = carscount;

      document.getElementById('pricecounta').value = pricecounta;
      document.getElementById('pricecountd').value = pricecountd;


      document.getElementById('arrivalcar').value = carinfo;
      document.getElementById('arrivalcarlabel').innerHTML = carinfo;
      document.getElementById('arrivalcarid').value = id;
      document.getElementById('departurecar').value = carinfo;
      document.getElementById('departurecarlabel').innerHTML = carinfo;
      document.getElementById('departurecarid').value = id;

      document.getElementById('car1').value = carinfo;
      document.getElementById('car2').value = carinfo;


      document.getElementById('dimissme' + id).click();




      Swal.fire({
        title: 'Selected Car for Round Trip',
        icon: 'info',
        html: carinfo + '<br/><img style="max-width:200px;" src="pco/Car Images/' + company + '/' + brand + '/' + model + '/' + image + '">',
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="stylenotneeded fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!'
      })


    }



  }
</script>








<script>
  $(document).ready(function() {

    if ($('#formtypefield').val() == 'round') {
      // $("#singleTripSection :input").attr("disabled", true);
      $("#adate").hide();
      $("#addate").show();


    } else {
      $("#adate").show();
      $("#addate").hide();
      // $("#roundTripSection :input").attr("disabled", true);

    }
  });
  // $(document).ready(function() {

  //   if ($('#TripType').val() == 'round') {
  //     $('#TripType').val('round')
  //     $("#singleTripSection :input").attr("disabled", true);
  //     $('#singleTripSection').hide();


  //   } else {
  //     $('#TripType').val('single')
  //     $('#roundTripSection').hide();
  //     $("#roundTripSection :input").attr("disabled", true);
  //   }
  // });

  function changewaysNew($this) {
    if ($('#TripType').val() == 'round') {
      $('#TripType').val('single');
      $('#roundTripSection').hide();
      $('#singleTripSection').show();
      $("#roundTripSection :input").attr("disabled", true);
      $("#singleTripSection :input").attr("disabled", false);
    } else {
      $('#TripType').val('round');
      $("#singleTripSection :input").attr("disabled", true);
      $("#roundTripSection :input").attr("disabled", false);
      $('#singleTripSection').hide();
      $('#roundTripSection').show();
    }

  }

  function changeways($this) {

    if ($('#formtypefield').val() == 'single') {
      $('#formtypefield').val('round')
      $("#adate").hide();
      $("#addate").show();
    } else {
      $('#formtypefield').val('single')
      $("#adate").show();
      $("#addate").hide();
    }
    return;
    if ($this.value == 'round') {


      var gett = document.getElementById('tripptype').value;
      if (gett == 'round') {

        document.getElementById('tripptype').value = document.getElementById('onewayselect').value;
        document.getElementById('onewayselectnew').style.display = 'block';

        var vala = document.getElementById('onewayselect').value;


        if (vala == 'From Airport to Hotel') {
          document.getElementById('depdate').style.display = 'none';
          document.getElementById('arrdate').style.display = 'block';

          document.getElementById('dc').style.display = 'none';
          document.getElementById('ac').style.display = 'block';
          document.getElementById('adetails').style.display = 'block';
          document.getElementById('ddetails').style.display = 'none';
        }
        if (vala == 'From Hotel to Airport') {
          document.getElementById('depdate').style.display = 'block';

          document.getElementById('arrdate').style.display = 'none';


          document.getElementById('dc').style.display = 'block';
          document.getElementById('ac').style.display = 'none';
          document.getElementById('adetails').style.display = 'none';
          document.getElementById('ddetails').style.display = 'block';


        }

      } else {
        document.getElementById('tripptype').value = 'round';
        document.getElementById('onewayselectnew').style.display = 'none';

        document.getElementById('depdate').style.display = 'block';
        document.getElementById('arrdate').style.display = 'block';

        document.getElementById('dc').style.display = 'block';
        document.getElementById('ac').style.display = 'block';
        document.getElementById('adetails').style.display = 'block';
        document.getElementById('ddetails').style.display = 'block';



      }
    }



  }






  $("#onewayselect").on('change', function() {


    var va = document.getElementById('onewayselect').value;
    document.getElementById('tripptype').value = va;

    if (va == 'From Hotel to Airport') {
      document.getElementById('depdate').style.display = 'block';

      document.getElementById('arrdate').style.display = 'none';


      document.getElementById('ddetails').style.display = 'block';

      document.getElementById('adetails').style.display = 'none';

      document.getElementById('dc').style.display = 'block';

      document.getElementById('ac').style.display = 'none';



    }
    if (va == 'From Airport to Hotel')

    {
      document.getElementById('depdate').style.display = 'none';
      document.getElementById('arrdate').style.display = 'block';

      document.getElementById('ddetails').style.display = 'none';

      document.getElementById('adetails').style.display = 'block';

      document.getElementById('dc').style.display = 'none';

      document.getElementById('ac').style.display = 'block';



    }



  });
</script>



<script>
  function pressedme() {
    $('#ModifyForm').submit();
    // document.getElementById('modifybutton').click();
    return;
    var value = document.getElementById('tripptype').value;

    var country = document.getElementById('country').value;

    var city = document.getElementById('city').value;
    var pax = document.getElementById('pax').value;
    var arrivaldate = document.getElementById('arrivaldate').value;
    var departuredate = document.getElementById('departuredate').value;
    var fromlocation1 = document.getElementById('fromlocation1').value;
    var tolocation1 = document.getElementById('tolocation1').value;
    var fromlocation2 = document.getElementById('fromlocation2').value;
    var tolocation2 = document.getElementById('tolocation2').value;
    var type1 = document.getElementById('type1').value;
    var type2 = document.getElementById('type2').value;




    if (value == 'round') {
      if (country == '' || city == 'All' || pax == '' || arrivaldate == '' || departuredate == '' || fromlocation1 == '' || tolocation1 == '' || fromlocation2 == '' || tolocation2 == '' || type1 == '' || type2 == '') {
        swal.fire('Please Fill All Information');
      } else {
        document.getElementById('modifybutton').click();
      }
    } else if (value == 'From Airport to Hotel') {
      if (country == '' || city == 'All' || pax == '' || arrivaldate == '' || fromlocation1 == '' || tolocation1 == '' || type1 == '') {
        swal.fire('Please Fill All Information');
      } else {
        document.getElementById('modifybutton').click();
      }
    } else if (value == 'From Hotel to Airport') {
      if (country == '' || city == 'All' || pax == '' || departuredate == '' || fromlocation2 == '' || tolocation2 == '' || type2 == '') {
        swal.fire('Please Fill All Information');
      } else {
        document.getElementById('modifybutton').click();
      }
    }



  }
</script>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/main.js"></script>







<!--end-->



<script>
  var country = document.getElementById('country').value;

  $.ajax({

    type: 'POST',
    url: 'getcityforsearchoftransfer.php',
    data: {
      'country': country
    },

    success: function(result) {


      $("#city").html(result);




    }

  });
</script>




<script>
  $("#city").on('change', function() {


    var country = document.getElementById('country').value;
    var city = document.getElementById('city').value;

    $.ajax({

      type: 'POST',
      url: 'getareasbycityfortransport.php',
      data: {
        'country': country,
        'city': city
      },

      success: function(result) {


        $("#listedareas").html(result);




      }

    });


    $.ajax({

      type: 'POST',
      url: 'getareasbycityfortransport2.php',
      data: {
        'country': country,
        'city': city
      },

      success: function(result) {


        $("#listedareas2").html(result);




      }

    });


  });

  $(document).ready(function() {

    var country = "<?php echo $_SESSION['country']; ?>";
    var city = "<?php echo $_SESSION['city']; ?>";

    $.ajax({

      type: 'POST',
      url: 'getareasbycityfortransport.php',
      data: {
        'country': country,
        'city': city
      },

      success: function(result) {


        $("#listedareas").html(result);




      }

    });


    $.ajax({

      type: 'POST',
      url: 'getareasbycityfortransport2.php',
      data: {
        'country': country,
        'city': city
      },

      success: function(result) {


        $("#listedareas2").html(result);




      }

    });

  });
</script>




<?php
include 'footer.php';
?>