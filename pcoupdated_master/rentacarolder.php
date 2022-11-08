<?php
session_start();
include 'header.php';
include 'db_connection.php';

if ($_SESSION['fromhotel'] == '1') {
  $countryaf = $_SESSION['country'];
  $cityaf = $_SESSION['city'];
  $hotelaf = $_SESSION['hotel'];


  $sqlr = "SELECT * FROM hotelsdatabase WHERE country='$countryaf' && city='$cityaf' && name='$hotelaf'";
  $resultr = $conn->query($sqlr);

  if ($resultr->num_rows > 0) {
    // output data of each row
    while ($rowr = $resultr->fetch_assoc()) {

      $hotelarea = $rowr['area'];
    }
  } else {
    $hotelarea = '';
  }
} else {
  $hotelarea = '';
}


if (isset($_POST['submit'])) {
  $_SESSION['country'] = $_POST['country'];
  $_SESSION['city'] = $_POST['city'];
  $_SESSION['dropofflocation'] = $_POST['dropoff'];
  $_SESSION['dropofftime'] = $_POST['dropofftime'];
  $_SESSION['dropoffdate'] = $_POST['edate'];
  $_SESSION['pickuplocation'] = $_POST['pickup'];
  $_SESSION['pickupdate'] = $_POST['sdate'];
  $_SESSION['pickuptime'] = $_POST['pickuptime'];
  $_SESSION['vehicle_type'] = $_POST['vehicle_type'];

  $_SESSION['flightnumb1'] = $_POST['flightnumb1'];
  $_SESSION['flightnumb2'] = $_POST['flightnumb2'];
  $_SESSION['pickordelivery'] = $_POST['pickordelivery'];


  echo "<script>location.replace('rentacarsearch.php');</script>";
}
















?>


<link rel="icon" type="image/x-icon" href="img/logo.png">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">








<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">


<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="./js/jquery-time-picker2.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
<link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
<!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->

<style>
  /* Paste this css to your style sheet file or under head tag */
  /* This only works with JavaScript, 
  if it's not present, don't show loader */
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
</style>



<!-- <div style='background-color:black;' class="se-pre-con">
  <center><img style='width:400px; margin-top:400px;' src='loadme.gif'></center>
</div> -->




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script> -->

<script>
  $(window).load(function() {
    // Animate loader off screen
    // $(".se-pre-con").fadeOut("slow");;
  });
</script>








<div class="main-holder transfer-pg">


  <style>
    /* enable absolute positioning */
    .inner-addon {
      position: relative;
    }

    /* style icon */
    .inner-addon .glyphicon {
      position: absolute;
      padding: 10px;
      pointer-events: none;
    }

    /* align icon */
    .left-addon .glyphicon {
      left: 0px;
    }

    .right-addon .glyphicon {
      right: 0px;
    }

    /* add padding  */
    .left-addon input {
      padding-left: 30px;
    }

    .right-addon input {
      padding-right: 30px;
    }
  </style>


  <div class="header-main-slider owl-theme owl-carousel" style="margin-bottom: -150px;;">
    <section class="banner" style="background: url('ca3.jpeg') center/cover no-repeat;">
    </section>
    <section class="banner" style="background: url('ca2.jpeg') center/cover no-repeat;">
    </section>
    <section class="banner" style="background: url('ca1.jpeg') center/cover no-repeat;">
    </section>

  </div>






  <section style='margin-top:50px; margin-bottom:-106px;' class='nomm'>
    <div class='container'>
      <div class='roundme row'>




        <style>
          .lbxx {
            border-radius: 25px;
          }

          .roundme {
            border-radius: 25px;

            padding: 20px 20px;
            z-index: 1;
            width: 100%;


            top: 100px;

            box-shadow: 0px 15px 39px 0px rgba(165, 9, 25, 40%) !important;
          }



          .roundme2 {
            border-radius: 25px;
            padding: 30px 0px 25px 0px;
            z-index: 10;
            width: 100%;


            top: 100px;

            outline-style: outset;
            outline-color: rgba(220, 53, 69, 10%);
          }
        </style>

        <style>
          .nomm:before,
          .nomm:after {
            box-sizing: border-box;
            border-radius: 25px;
          }

          .nomm .iinput {
            position: absolute;
            opacity: 0;
          }

          .radio_wrap {

            padding: 0 !important;
            position: relative;

            overflow: hidden;
            z-index: 0;

            --i: 2;

          }

          .radio_wrap:before {
            border-radius: 25px;
            content: "";
            position: absolute;
            z-index: -1;
            width: calc(100% / 3);

            top: 1px;
            left: calc(var(--i) * (100% / 3));
            height: 100%;
            background: #dc3545;
            transition: .3s ease-in-out;
          }

          .nomm .llabel {
            min-width: calc(100% / 3);
            position: relative;
            z-index: 2;
            float: left;
            text-align: center;
            text-shadow: none;
            padding: 20px;
            /*border: 1px solid #dfe0e4;*/
            color: #dc3545;
            font-size: 14px;
            position: relative;
            transition: color .3s ease-in-out;
          }

          .nomm input:checked+label {
            color: white !important;
          }

          .activea {
            color: white !important;
            background: #dc3545 !important;
          }

          .owl-stage-outer {
            height: 70vh;
          }

          .header-main-slider .owl-nav .owl-next,
          .header-main-slider .owl-nav .owl-prev {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 0, 0, 0.4) !important;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            color: white !important;
          }

          .header-main-slider .owl-nav .owl-prev {
            left: 0;
          }

          .header-main-slider .owl-nav .owl-next {
            right: 0;
          }

          .header-main-slider .owl-nav .owl-prev:hover {
            color: red !important;
          }

          .header-main-slider .owl-nav .owl-next:hover {
            color: red !important;
          }

          .btn-check:checked+.btn-outline-primary,
          .btn-check+.btn-outline-primary {
            border-color: #ce3435;

          }

          .btn-check+.btn-outline-primary {
            color: #ce3435;
          }

          .btn-check:checked+.btn-outline-primary {
            background-color: #ce3435;
          }

          .btn-check:checked+.btn-outline-primary:hover {
            background-color: #ce3435;
          }

          .btn-check+.btn-outline-primary:hover {
            background-color: #ce3435;
            color: white;
          }
        </style>




        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

        <div onclick='changecol()' class="radio_wrap">
          <input onclick='clickedmeee2(); ' type="radio" class='iinput' id="radio1" name="radio1">
          <label data-id='1' id='l1' onclick='icn(this); changecol();' for="radio1" class='llabel lbxx ' data-i="0"><i id='icn1' style='color:#dc3545;' class="stylenotneeded fas fa-hotel"></i>&nbsp;Hotels</label>
          <input type="radio" onclick='clickedmeee()' class='iinput' id="radio2" name="radio1">
          <label data-id='2' id='l2' onclick='icn(this); changecol();' for="radio2" class='llabel lbxx' data-i="1"><i id='icn2' style='color:#dc3545;' class="stylenotneeded fas fa-car-side"></i>&nbsp;Transport</label>
          <input type="radio" class='iinput' id="radio4" name="radio1">
          <label data-id='3' id='l3' onclick='icn(this); changecol();' for="radio3" id='labreaz' class='llabel lbxx' data-i="2"><i id='icn3' style='color:#dc3545;' class="stylenotneeded fas fa-car"></i>&nbsp;Rent a Car</label>

        </div>

        <script>
          document.getElementById('l3').click();
          $('.radio_wrap').attr('style', '--i:2');
          document.getElementById('icn3').style.color = 'white';
          document.getElementById('l3').style.color = 'white';


          $('label').click(function() {
            $('.radio_wrap').attr('style', '--i:' + $(this).data('i'));
          })


          function changecol() {

            document.getElementById('labreaz').classList.remove('activea');
          }
        </script>



















        <script>
          function clickedmeee() {
            window.location.replace('/transfer.php');
          }

          function clickedmeee2() {
            window.location.replace('/index.php');
          }
        </script>


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


          }

          .col-sm {
            text-align: left !important;
          }

          .text-primary {
            color: #ce3435 !important;
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
        </style>



        <div>


        </div>
        <form autocomplete='off' action='#' method='POST' style="padding-left: 0; padding-right:0px;">
















          <div style='color:#828282; margin-top:20px;' class='input-iconszz roundme2 row'>









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



            <div style='position:inline; margin-top:-20px; margin-bottom:20px; text-align:center;'>
              <span id='dela1' style='display:none; color:#dc3545;'>*Deliveries are only limited to hotels*</span>
              Pick Up
              &nbsp;&nbsp;
              <label style='margin:0 auto;' class="switch">

                <input value='round' id='sldr' onchange='changeways(this)' type="checkbox">
                <span class="slider round"></span>

              </label>
              &nbsp;&nbsp;
              Delivery


            </div>

            <script>
              var alloww = false;



              function changeways($this) {

                var country = document.getElementById('country').value;
                var city = document.getElementById('city2').value;

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














            <div class='row'>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                  <!-- <label style='color: gray;'>Select Country</label> -->
                  <!-- <label style='color: gray;'></label> -->
                  <select style='color:#dc3545; text-align:center;' class="form-select" id='country' name='country' aria-label="Default select example">
                    <!--<option value="0" disabled selected>Select Country</option>-->

                    <!--			
                                      <option value="United States">United States</option>
                                      <option value="Canada">Canada</option>
                                      <option value="Albania">Albania</option>
                                      <option value="Algeria">Algeria</option>
                                      <option value="American Samoa">American Samoa</option>
                                      <option value="Andorra">Andorra</option>
                                      <option value="Angola">Angola</option>
                                      <option value="Anguilla">Anguilla</option>
                                      <option value="Antarctica">Antarctica</option>
                                      <option value="Antigua">Antigua</option>
                                      <option value="Argentina">Argentina</option>
                                      <option value="Armenia">Armenia</option>
                                      <option value="Aruba">Aruba</option>
                                      <option value="Australia">Australia</option>
                                      <option value="Austria">Austria</option>
                                      <option value="Azerbaijani">Azerbaijani</option>
                                      <option value="Bahamas">Bahamas</option>
                                      <option value="Bahrain">Bahrain</option>
                                      <option value="Bangladesh">Bangladesh</option>
                                      <option value="Barbados">Barbados</option>
                                      <option value="Belarus">Belarus</option>
                                      <option value="Netherlands">Belgium</option>
                                      <option value="Belize">Belize</option>
                                      <option value="Benin">Benin</option>
                                      <option value="Bermuda">Bermuda</option>
                                      <option value="Bhutan">Bhutan</option>
                                      <option value="Bolivia">Bolivia</option>
                                      <option value="Bosnia-Hercegovina">Bosnia-Hercegovina</option>
                                      <option value="Botswana">Botswana</option>
                                      <option value="Bouvet Island">Bouvet Island</option>
                                      <option value="Brazil">Brazil</option>
                                      <option value="British IOT">British IOT</option>
                                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                                      <option value="Bulgaria">Bulgaria</option>
                                      <option value="Burkina Faso">Burkina Faso</option>
                                      <option value="Burundi">Burundi</option>
                                      <option value="Cambodia">Cambodia</option>
                                      <option value="Cameroon">Cameroon</option>
                                      <option value="Cape Verde">Cape Verde</option>
                                      <option value="Cayman Islands">Cayman Islands</option>
                                      <option value="Central African Rep">Central African Rep</option>
                                      <option value="Chad">Chad</option>
                                      <option value="Chile">Chile</option>
                                      <option value="China">China</option>
                                      <option value="Christmas Island">Christmas Island</option>
                                      <option value="Cocos Islands">Cocos Islands</option>
                                      <option value="Colombia">Colombia</option>
                                      <option value="Comoros">Comoros</option>
                                      <option value="Congo">Congo</option>
                                      <option value="Cook Islands">Cook Islands</option>
                                      <option value="Costa Rica">Costa Rica</option>
                                      <option value="Croatia">Croatia</option>
                                      <option value="Cyprus">Cyprus</option>
                                      <option value="Czech Republic">Czech Republic</option>
                                      <option value="Denmark">Denmark</option>
                                      <option value="Djibouti">Djibouti</option>
                                      <option value="Dominica">Dominica</option>
                                      <option value="Dominican Republic">Dominican Republic</option>
                                      <option value="East Timor">East Timor</option>
                                      <option value="Ecuador">Ecuador</option>
                                      <option value="Egypt">Egypt</option>
                                      <option value="El Salvador">El Salvador</option>
                                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                                      <option value="Eritrea">Eritrea</option>
                                      <option value="Estonia">Estonia</option>
                                      <option value="Ethiopia">Ethiopia</option>
                                      <option value="Faeroe Islands">Faeroe Islands</option>
                                      <option value="Falkland Islands">Falkland Islands</option>
                                      <option value="Fiji">Fiji</option>
                                      <option value="Finland">Finland</option>
                                      <option value="France">France</option>
                                      <option value="French Guiana">French Guiana</option>
                                      <option value="French Polynesia">French Polynesia</option>
                                      <option value="French Southern">French Southern</option>
                                      <option value="French Southern Ter">French Southern Ter</option>
                                      <option value="Gabon">Gabon</option>
                                      <option value="Gambia">Gambia</option>
                                      <option value="Georgia">Georgia</option>
                                      <option value="Germany">Germany</option>
                                      <option value="Ghana">Ghana</option>
                                      <option value="Gibraltar">Gibraltar</option>
                                      <option value="Greece">Greece</option>
                                      <option value="Greenland">Greenland</option>
                                      <option value="Grenada">Grenada</option>
                                      <option value="Guadeloupe">Guadeloupe</option>
                                      <option value="Guam">Guam</option>
                                      <option value="Guatemala">Guatemala</option>
                                      <option value="Guinea">Guinea</option>
                                      <option value="Guinea-Bissau">Guinea-Bissau</option>
                                      <option value="Guyana">Guyana</option>
                                      <option value="Haiti">Haiti</option>
                                      <option value="Heard">Heard</option>
                                      <option value="Honduras">Honduras</option>
                                      <option value="Hong Kong">Hong Kong</option>
                                      <option value="Hungary">Hungary</option>
                                      <option value="Iceland">Iceland</option>
                                      <option value="India">India</option>
                                      <option value="Indonesia">Indonesia</option>
                                      <option value="Ireland">Ireland</option>
                                      <option value="Israel">Israel</option>
                                      <option value="Italy">Italy</option>
                                      <option value="Ivory Coast">Ivory Coast</option>
                                      <option value="Jamaica">Jamaica</option>
                                      <option value="Japan">Japan</option>
                                      <option value="Jordan">Jordan</option>
                                      <option value="Kazakhstan">Kazakhstan</option>
                                      <option value="Kenya">Kenya</option>
                                      <option value="Kiribati">Kiribati</option>
                                      <option value="Kuwait">Kuwait</option>
                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                      <option value="Laos">Laos</option>
                                      <option value="Latvia">Latvia</option>
                                      <option value="Lebanon">Lebanon</option>
                                      <option value="Lesotho">Lesotho</option>
                                      <option value="Liberia">Liberia</option>
                                      <option value="Liechtenstein">Liechtenstein</option>
                                      <option value="Lithuania">Lithuania</option>
                                      <option value="Luxembourg">Luxembourg</option>
                                      <option value="Macau">Macau</option>
                                      <option value="Macedonia">Macedonia</option>
                                      <option value="Madagascar">Madagascar</option>
                                      <option value="Malawi">Malawi</option>
                                      <option value="Malaysia">Malaysia</option>
                                      <option value="Maldives">Maldives</option>
                                      <option value="Mali">Mali</option>
                                      <option value="Malta">Malta</option>
                                      <option value="Marshall Islands">Marshall Islands</option>
                                      <option value="Martinique">Martinique</option>
                                      <option value="Mauritania">Mauritania</option>
                                      <option value="Mauritius">Mauritius</option>
                                      <option value="Mayotte">Mayotte</option>
                                      <option value="Mexico">Mexico</option>
                                      <option value="Micronesia">Micronesia</option>
                                      <option value="MNP">MNP</option>
                                      <option value="Moldova">Moldova</option>
                                      <option value="Monaco">Monaco</option>
                                      <option value="Mongolia">Mongolia</option>
                                      <option value="Montserrat">Montserrat</option>
                                      <option value="Morocco">Morocco</option>
                                      <option value="Mozambique">Mozambique</option>
                                      <option value="Myanmar">Myanmar</option>
                                      <option value="Namibia">Namibia</option>
                                      <option value="Nauru">Nauru</option>
                                      <option value="Nepal">Nepal</option>
                                      <option value="NER">NER</option>
                                      <option value="Netherlands">Netherlands</option>
                                      <option value="Neutral Zone">Neutral Zone</option>
                                      <option value="New Caledonia">New Caledonia</option>
                                      <option value="New Zealand">New Zealand</option>
                                      <option value="Nicaragua">Nicaragua</option>
                                      <option value="Nigeria">Nigeria</option>
                                      <option value="Niue">Niue</option>
                                      <option value="Norfolk Island">Norfolk Island</option>
                                      <option value="North Korea">North Korea</option>
                                      <option value="Norway">Norway</option>
                                      <option value="Oman">Oman</option>
                                      <option value="Pakistan">Pakistan</option>
                                      <option value="Palau">Palau</option>
                                      <option value="Panama">Panama</option>
                                      <option value="Papua New Guinea">Papua New Guinea</option>
                                      <option value="Paraguay">Paraguay</option>
                                      <option value="Peru">Peru</option>
                                      <option value="Philippines">Philippines</option>
                                      <option value="Pitcairn">Pitcairn</option>
                                      <option value="Poland">Poland</option>
                                      <option value="Portugal">Portugal</option>
                                      <option value="Puerto Rico">Puerto Rico</option>
                                      <option value="Qatar">Qatar</option>
                                      <option value="Reunion">Reunion</option>
                                      <option value="Romania">Romania</option>
                                      <option value="Russia">Russia</option>
                                      <option value="Rwanda">Rwanda</option>
                                      <option value="Saint Helena">Saint Helena</option>
                                      <option value="Saint Lucia">Saint Lucia</option>
                                      <option value="Saint Pierre">Saint Pierre</option>
                                      <option value="Saint Vincent">Saint Vincent</option>
                                      <option value="Samoa">Samoa</option>
                                      <option value="San Marino">San Marino</option>
                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                      <option value="Scotland">Scotland</option>
                                      <option value="Senegal">Senegal</option>
                                      <option value="Seychelles">Seychelles</option>
                                      <option value="Sierra Leone">Sierra Leone</option>
                                      <option value="Singapore">Singapore</option>
                                      <option value="Slovak Republic">Slovak Republic</option>
                                      <option value="Slovenia">Slovenia</option>
                                      <option value="Solomon Islands">Solomon Islands</option>
                                      <option value="Somali Democratic">Somali Democratic</option>
                                      <option value="South Africa">South Africa</option>
                                      <option value="South Georgia">South Georgia</option>
                                      <option value="South Korea">South Korea</option>
                                      <option value="Spain">Spain</option>
                                      <option value="Sri Lanka">Sri Lanka</option>
                                      <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
                                      <option value="STP">STP</option>
                                      <option value="Suriname">Suriname</option>
                                      <option value="Svalbard">Svalbard</option>
                                      <option value="Swaziland">Swaziland</option>
                                      <option value="Sweden">Sweden</option>
                                      <option value="Switzerland">Switzerland</option>
                                      <option value="Syria">Syria</option>
                                      <option value="Taiwan">Taiwan</option>
                                      <option value="Tajikistan">Tajikistan</option>
                                      <option value="Tanzania">Tanzania</option>
                                      <option value="TCA">TCA</option>
                                      <option value="Thailand">Thailand</option>
                                      <option value="Toga">Toga</option>
                                      <option value="Togolese">Togolese</option>
                                      <option value="Tokelau">Tokelau</option>
                                      <option value="Tongo">Tongo</option>
                                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                      <option value="Tunisia">Tunisia</option>
                                      <option value="Turkey">Turkey</option>
                                      <option value="Turkmenistan">Turkmenistan</option>
                                      <option value="Tuvalu">Tuvalu</option>
                                      <option value="Uganda">Uganda</option>
                                      <option value="Ukraine">Ukraine</option>-->
                    <option selected value="United Arab Emirates">United Arab Emirates</option>

                    <!--
                                      <option value="United Kingdom">United Kingdom</option>
                                      <option value="Upper Volta">Upper Volta</option>
                                      <option value="Uruguay">Uruguay</option>
                                      <option value="USSR(Former)">USSR(Former)</option>
                                      <option value="Uzbekistan">Uzbekistan</option>
                                      <option value="Vanuatu">Vanuatu</option>
                                      <option value="Vatican City">Vatican City</option>
                                      <option value="Venezuela">Venezuela</option>
                                      <option value="VI, British">VI, British</option>
                                      <option value="Viet Nam">Viet Nam</option>
                                      <option value="Virgin Islands, USA">Virgin Islands, USA</option>
                                      <option value="Western Sahara">Western Sahara</option>
                                      <option value="WLF">WLF</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Yugoslavia">Yugoslavia</option>
                                      <option value="Zaire">Zaire</option>
                                      <option value="Zambia">Zambia</option>
                                      <option value="Zimbabwe">Zimbabwe</option>
                                      -->

                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-right: 0px;">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                  <!-- <label style='color: gray;'>Select City</label> -->
                  <!-- <label style='color: gray;'></label> -->
                  <select style='color:#dc3545; text-align:center;' id="city2" name='city' class="form-select">
                    <option disabled selected>Select City</option>
                  </select>
                </div>
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

                  <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text" value='<?php echo $sdate . "-" . $edate; ?>' placeholder='Check In - Check Out' name="datefilter" />
                  <input type="hidden" name="sdate" class="form-control" id="sdate" value="<?php echo $sdate ?>">
                  <input type="hidden" name="edate" class="form-control" id="edate" value="<?php echo $edate ?>">
                  <script>
                    $(function() {

                      setTimeout(() => {
                        var today = new Date();

                        star_dateFormated = String(today.getDay()).padStart(2, '0') + '/' + String(today.getMonth()).padStart(2, '0') + '/' + today.getFullYear();
                        end_dateFormated = String(today.getDay()).padStart(2, '0') + '/' + String(today.getMonth()).padStart(2, '0') + '/' + today.getFullYear();
                        document.getElementById('sdate').value = star_dateFormated;
                        document.getElementById('edate').value = end_dateFormated;

                        $('input[name="datefilter"]').val(star_dateFormated + ' - ' + end_dateFormated);
                        $('input[name="datefilter"]').daterangepicker({
                          opens: 'left',
                          autoUpdateInput: false,
                          // timePicker: true,
                          timePickerIncrement: 30,
                          startDate: star_dateFormated,
                          endDate: end_dateFormated,
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

                        document.getElementById('sdate').value = sd;

                        document.getElementById('edate').value = ed;


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
                <input type="text" name="pickuptime" class="form-control" placeholder="" value="12:00">


                <script>
                  $("input[name=pickuptime]").clockpicker({
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
                <input type="text" name="dropofftime" class="form-control" placeholder="" value="12:00">


                <script>
                  $("input[name=dropofftime]").clockpicker({
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



            <input style='display:none;' id='pickordelivery' name='pickordelivery' value='Pick Up'>

            <div class="row">
              <div class="col-sm col-md mb-3 mb-lg-0 pe-0 pt-2">
                <!-- <label style='color: gray;'>Pickup Location</label> -->
                <!-- <label style='color: gray;'></label> -->
                <input style='text-align:center;  color:#dc3545;' value='<?php echo $hotelarea; ?>' list='locations' name='pickup' id='pickmeup' class='form-control' placeholder='Pickup Location'>

                <datalist style='color:#dc3545; display:none;' class='form-control' id='locations' name='pickuplocation'>
                </datalist>
              </div>


              <div class="col-sm col-md mb-3 mb-lg-0 pe-0 pt-2">
                <!-- <i style='font-size:1.2em; margin-top:10px; margin-left:10px;' class="stylenotneeded fa fa-search"></i> -->
                <!-- <label style='color: gray;'>Drop off Location</label> -->
                <!-- <label style='color: gray;'></label> -->
                <input style=' text-align:center; color:#dc3545;' name='flightnumb1' id='flightnumb1' class='form-control' value='<?php echo $flightnumber; ?>' placeholder='Flight #'>
              </div>



              <div class="col-sm col-md mb-3 mb-lg-0 pe-0 pt-2">
                <!-- <i style='font-size:1.2em; margin-top:10px; margin-left:10px;' class="stylenotneeded fa fa-search"></i> -->
                <!-- <label style='color: gray;'>Drop off Location</label> -->
                <!-- <label style='color: gray;'></label> -->
                <input style='text-align:center; color:#dc3545;' list='locations' name='dropoff' id='dropmeup' class='form-control' value='<?php echo $hotelarea; ?>' placeholder='Drop Off Location'>
              </div>

              <div class="col-sm col-md mb-3 mb-lg-0 pe-0 pt-2">
                <!-- <i style='font-size:1.2em; margin-top:10px; margin-left:10px;' class="stylenotneeded fa fa-search"></i> -->
                <!-- <label style='color: gray;'>Drop off Location</label> -->
                <!-- <label style='color: gray;'></label> -->
                <input style='text-align:center; color:#dc3545;' name='flightnumb2' id='flightnumb2' class='form-control' value='<?php echo $flightnumber; ?>' placeholder='Flight #'>
              </div>

            </div>
            <div class="row pt-2" style="    justify-content: right;">

              <input type='submit' name='submit' class="applyBtn btn btnba btn-primary btn-lg border-0 " style="padding:18px 48px !important;" value='Search'>

            </div>







          </div>



        </form>











      </div>












    </div>




    <br />
    <br />
    <br />
    <br />
    <br />
    <br />


  </section>

  <section class="section-services">
    <div class="">
      <!--<div class="row justify-content-center text-center">
                  <div class="col-md-10 col-lg-8">
                    <div style='margin-top:-80px;' class="header-section">
                      <h2 class="title">Exclusive <span style='color:#dc3545;'>Service</span></h2>
                    
                    </div>
                  </div>
                </div>-->
      <div class="row">
        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service">
            <div class="part-1">

              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-hand-holding-usd"></i></h1>
              <h3 align='center' class="title">Best Price <br />Guaranteed</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->
        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service ">
            <div class="part-1">

              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fa fa-file"></i></h1>
              <h3 align='center' class="title">Flexible <br />Cancellation</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->
        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service">
            <div class="part-1">
              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fa fa-headset"></i></h1>
              <h3 style='' align='center' class="title">24/7&nbsp;Customer <br />Service</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->
        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service">
            <div class="part-1">

              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-user-shield"></i></h1>
              <h3 align='center' class="title">Secure <br />Payment</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->

        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service">
            <div class="part-1">

              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fab fa-angellist"></i></h1>
              <h3 align='center' class="title">Easy <br />Transactions</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->

        <!-- Start Single Service -->
        <div class="col-md-6 col-lg-2 col-sm-12 col-xs-12">
          <div class="single-service">
            <div class="part-1">

              <h1 align='center'> <i style='color:#dc3545;' class="stylenotneeded fas fa-dollar-sign"></i></h1>
              <h3 align='center' class="title">Price <br />Match</h3>
            </div>
            <!--	<div class="part-2">
							<p class="description">Express delivery inno service effective logistics solution for delivery of small cargo delivery service.</p>
							<a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
						</div>-->
          </div>
        </div>
        <!-- / End Single Service -->

      </div>
    </div>
  </section>
  <style>
    .owl-nav .owl-next,
    .owl-nav .owl-prev {
      width: 40px;
      height: 40px;
      /* background-color: rgba(255, 0, 0, 0.4) !important; */
      background-color: #ce3435 !important;
      border-radius: 5px !important;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: white !important;

    }

    .owl-nav .owl-prev {
      left: 0;
    }

    .owl-nav .owl-next {
      right: 0;
    }

    .owl-nav .owl-prev:hover {
      background-color: white !important;
      color: #ce3435 !important;
    }

    .owl-nav .owl-next:hover {
      background-color: white !important;
      color: #ce3435 !important;
    }

    .section-services {
      /* padding-top: 110px; */
      /* padding-bottom: 20px; */
      margin: 50px 0px 50x 0px;
      font-family: "Poppins", sans-serif;
      background-color: #211f24;
      color: #fff;
    }

    .section-services .header-section {
      margin-bottom: 35px;
    }

    .section-services .header-section .title {
      position: relative;
      margin-bottom: 40px;
      padding-bottom: 25px;
      text-transform: uppercase;
      font-weight: 700;
    }

    .section-services .header-section .title:before {
      content: "";
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 140px;
      height: 1px;
      background-color: #dc3545;
    }

    .section-services .header-section .title:after {
      content: "";
      position: absolute;
      bottom: -1px;
      left: 50%;
      transform: translateX(-50%);
      width: 45px;
      height: 3px;
      background-color: #f70037;
    }

    .section-services .header-section .title span {
      color: #f70037;
    }

    .section-services .header-section .description {
      color: #6f6f71;
    }

    .section-services .single-service {
      margin: 15px 0px;
      padding: 8px;
      background-color: #24252a;
      box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
    }

    .section-services .single-service .part-1 {
      /*padding: 40px 40px 25px;*/
      border-bottom: 2px solid #1d1e23;
    }

    .section-services .single-service .part-1 i {
      /*	margin-bottom: 25px; */
      font-size: 50px;
      color: #f70037;
    }

    .section-services .single-service .part-1 .title {
      font-size: 17px;
      font-weight: 700;
      letter-spacing: 0.02em;
      /*	line-height: 1.8em; */
    }

    .section-services .single-service .part-2 {
      padding: 30px 40px 40px;
    }

    .section-services .single-service .part-2 .description {
      margin-bottom: 22px;
      color: #6f6f71;
      font-size: 14px;
      line-height: 1.8em;
    }

    .section-services .single-service .part-2 a {
      color: #fff;
      font-size: 14px;
      text-decoration: none;
    }

    .section-services .single-service .part-2 a i {
      margin-right: 10px;
      color: #f70037;
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
    $("#timePicker").timepicker({});
    $("#timePicker2").timepicker({});

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
    .card {
      width: 400px;
      border-radius: 10px;
    }

    .card-img-top {
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
    }

    span.text-muted {
      font-size: 12px;
    }

    small.text-muted {
      font-size: 8px;
    }

    h5.mb-0 {
      font-size: 1rem;
    }

    small.ghj {
      font-size: 9px;
    }

    .mid {
      display: flex;
      justify-content: left;
      background: rgba(206, 52, 52, 0.10);
      height: 44px !important;
      /* background: #ce3435;
                color: white; */
    }

    h6.ml-1 {
      font-size: 13px;
    }

    small.key {
      text-decoration: underline;
      font-size: 9px;
      cursor: pointer;
    }

    .btn-danger {
      color: #FFCBD2;
    }

    .btn-danger:focus {
      box-shadow: none;
    }

    small.justify-content-center {
      font-size: 9px;
      cursor: pointer;
      text-decoration: underline;
    }

    @media screen and (max-width:600px) {
      .col-sm-4 {
        margin-bottom: 50px;
      }
    }

    .owl-stage-outer {
      /* overflow: visible !important; */
      height: 700px;
    }

    .featuresli {
      float: left;
      padding: 5px;
      font-size: 12px;
    }

    .featured {
      padding-bottom: 0px !important;
    }
  </style>
  <style>
    .hotelsIconSection {
      padding: 5px;
    }

    .hotelsIconSection:hover {
      border: 1px solid #dc3545;
      border-radius: 10px;
      padding: 5px;
    }

    .hotelsIconSection i:hover {
      color: red;
    }

    .red-tooltip+.tooltip>.tooltip-inner {
      background-color: #ce3435;
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
      width: var(--width, 32px);
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


  <section class="featured">
    <div class="container">
      <div class="section-title" style="text-align: left; padding-left:20px;">
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Our Top Picks</h2>
      </div>

      <div class="featured-block mt-2 featured-slider owl-carousel owl-theme" style="height: 500px;">
        <?php
        $sql = "SELECT * FROM toppicks";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {

            $sql2 = "SELECT * FROM rentacarInventorydatabase WHERE id='" . $row['carid'] . "' ";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
              // output data of each row
              while ($row2 = $result2->fetch_assoc()) {

                $sql3 = "SELECT * FROM rentacarcarsimages WHERE hotel='" . $row2['hotel'] . "' && country='" . $row2['country'] . "' && city='" . $row2['city'] . "' && year='" . $row2['year'] . "' && model='" . $row2['model'] . "' && brand='" . $row2['brand'] . "' GROUP BY model";
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                  // output data of each row
                  while ($row3 = $result3->fetch_assoc()) {
        ?>
                    <div class="col-sm-4" class="featured-item">
                      <div class="cars-card card">


                        <style>
                          .geeks {
                            width: 100%;
                            height: 200px;
                          }

                          .iimg {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;

                          }

                          /* #spinner{
                            width: 100%; height:100%; align-content: center;
                            background-color: red;
                          } */
                        </style>

                        <div class="geeks">
                          <!-- <span id="spinner" ><i class="fas fa-loader"></i></span> -->

                          <img src="pco/RentacarCar Images/<?php echo $row3['hotel']; ?>/<?php echo $row3['brand']; ?>/<?php echo $row3['model']; ?>/<?php echo $row3['year']; ?>/<?php echo $row3['image']; ?>" class="iimg card-img-top">


                        </div>





                        <div class="card-body pt-0 px-0 text-center">
                          <div class="d-flex flex-row justify-content-between mb-0 p-1">
                            <div class="row col-md-12">
                              <div style='text-align:center;' class="">
                                <?php echo $row2['brand'] . ' ' . $row2['model']; ?>
                              </div>

                            </div>

                          </div>
                          <hr class="mt-2 mx-3">
                          <div class="d-flex flex-row justify-content-between px-3 pb-1">
                            <div class="d-flex flex-column"><span class="text-muted">Model</span><small class="text-muted"><?php echo $row2['year']; ?> </small></div>
                            <div class="d-flex flex-column">
                              <h5 class="mb-0"><?php echo $row2['horsepower']; ?></h5><small class="text-muted text-right">(horsepower)</small>
                            </div>
                          </div>
                          <div class="p-2 mid">
                            <?php


                            $fear = explode(',', $row2['features']);

                            foreach ($fear as $f) {
                              if (strpos($f, 'Cruise') !== false) {
                            ?>




                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Cruise Control" class="red-tooltip"><img src="./img/icons/Cruise-Control.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Bluetooth') !== false) {
                              ?>


                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Bluetooth" class="red-tooltip"><img src="./img/icons/Blutooth.png" /></span>
                                </div>


                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Fog') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Fog Lights" class="red-tooltip"><img src="./img/icons/Fog-Lights.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Front Airbags') !== false) {
                              ?>



                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Airbags" class="red-tooltip"><img src="./img/icons/Front-Airbags.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Rear AirBags') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Rear AirBags" class="red-tooltip"><img src="./img/icons/Front-Rear-AirBags.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Leather') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Leather Seats" class="red-tooltip"><img src="./img/icons/Leather-Seats.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Parking') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Parking Sensors" class="red-tooltip"><img src="./img/icons/Parking-Sensors.png" /></span>
                                </div>

                            <?php
                              }
                            }

                            ?>


                            <!-- <div class="d-flex flex-column">
                              <small class="text-muted mb-1">ENGINE</small>
                              <div class="d-flex flex-row">
                                <img src="https://i.pinimg.com/originals/22/df/d6/22dfd62a7e2b161d2312b4c5237b97e9.png" width="30px" height="30px">
                                <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">Bracks</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/brake-icon.png" width="30" height="25px">
                                <h6 class="ml-1" style="padding:5px;">ABS &ast;</h6>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/speedometer-icon.png" width="30" height="25px">
                                <h6 class="ml-1">135 hp&ast;</h6>
                              </div>
                            </div> -->
                          </div>
                          <!-- <div class="d-flex flex-row justify-content-between px-3 pb-1">
                            <div class="row col-md-12">
                              <ul class="featured-item-list list-unstyled mx-0 mb-0 mt-3">
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-1.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Maximum: <?php echo $row2['maximum'] ?></span>
                                </li>
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-2.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Luggage: <?php echo $row2['luggages'] ?></span>
                                </li>
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-3.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Seating: <?php echo $row2['seating'] ?></span>
                                </li>
                              </ul>
                            </div>

                          </div> -->


                          <!-- <small class="text-muted key pl-3">Standard key Features</small> -->
                          <div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block col-md-12"><small>Book Now</small></button></div>
                          <!-- <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small> -->
                        </div>
                      </div>
                    </div>
        <?php
                  }
                }
              }
            }
          }
        }
        ?>

      </div>
    </div>
  </section>
  <section class="featured" style="margin-top: -80px !important;">
    <div class="container">
      <div class="section-title" style="text-align: right; padding-right:20px;">
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Most Booked Vehicles</h2>
      </div>
      <div class="featured-block mt-2 featured-slider owl-carousel owl-theme" style="height: 500px;">
        <?php
        $sql = "SELECT * FROM mostbooked";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {

            $sql2 = "SELECT * FROM rentacarInventorydatabase WHERE id='" . $row['carid'] . "' ";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
              // output data of each row
              while ($row2 = $result2->fetch_assoc()) {

                $sql3 = "SELECT * FROM rentacarcarsimages WHERE hotel='" . $row2['hotel'] . "' && country='" . $row2['country'] . "' && city='" . $row2['city'] . "' && year='" . $row2['year'] . "' && model='" . $row2['model'] . "' && brand='" . $row2['brand'] . "' GROUP BY model";
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                  // output data of each row
                  while ($row3 = $result3->fetch_assoc()) {
        ?>
                    <div class="col-sm-4" class="featured-item">
                      <div class=" cars-card card" style="position: relative;">


                        <style>
                          .geeks {
                            width: 100%;
                            height: 200px;
                          }

                          .iimg {
                            width: 100%;
                            height: 100%;
                          }
                        </style>

                        <div class="geeks">


                          <img src="pco/RentacarCar Images/<?php echo $row3['hotel']; ?>/<?php echo $row3['brand']; ?>/<?php echo $row3['model']; ?>/<?php echo $row3['year']; ?>/<?php echo $row3['image']; ?>" class="iimg card-img-top">


                        </div>





                        <div class="card-body pt-0 px-0 text-center">
                          <div class="d-flex flex-row justify-content-between mb-0 p-1">
                            <div class="row col-md-12">
                              <div style='text-align:center;' class="">
                                <?php echo $row2['brand'] . ' ' . $row2['model']; ?>
                              </div>

                            </div>

                          </div>
                          <hr class="mt-2 mx-3">
                          <div class="d-flex flex-row justify-content-between px-3 pb-1">
                            <div class="d-flex flex-column"><span class="text-muted">Model</span><small class="text-muted"><?php echo $row2['year']; ?> </small></div>
                            <div class="d-flex flex-column">
                              <h5 class="mb-0"><?php echo $row2['horsepower']; ?></h5><small class="text-muted text-right">(horsepower)</small>
                            </div>
                          </div>
                          <div class="p-2 mid">
                            <?php


                            $fear = explode(',', $row2['features']);

                            foreach ($fear as $f) {
                              if (strpos($f, 'Cruise') !== false) {
                            ?>




                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Cruise Control" class="red-tooltip"><img src="./img/icons/Cruise-Control.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Bluetooth') !== false) {
                              ?>


                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Bluetooth" class="red-tooltip"><img src="./img/icons/Blutooth.png" /></span>
                                </div>


                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Fog') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Fog Lights" class="red-tooltip"><img src="./img/icons/Fog-Lights.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Front Airbags') !== false) {
                              ?>



                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Airbags" class="red-tooltip"><img src="./img/icons/Front-Airbags.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Rear AirBags') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Rear AirBags" class="red-tooltip"><img src="./img/icons/Front-Rear-AirBags.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Leather') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Leather Seats" class="red-tooltip"><img src="./img/icons/Leather-Seats.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Parking') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Parking Sensors" class="red-tooltip"><img src="./img/icons/Parking-Sensors.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Power Door Locks') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Door Locks" class="red-tooltip"><img src="./img/icons/Power-Door-Locks.png" /></span>
                                </div>
                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Power Mirrors') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Mirrors" class="red-tooltip"><img src="./img/icons/Power-Mirrors.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Power Seats') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Seats" class="red-tooltip"><img src="./img/icons/Power-Seats.png" /></span>
                                </div>


                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Premium Audio') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Premium Audio" class="red-tooltip"><img src="./img/icons/Premium-Auidio.png" /></span>
                                </div>


                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Push Button Ignition') !== false) {
                              ?>

                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Push Button Ignition" class="red-tooltip"><img src="./img/icons/Push-Button-Ignition.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Reverse Camera') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Reverse Camera" class="red-tooltip"><img src="./img/icons/Reverse-Camera.png" /></span>
                                </div>

                              <?php
                              }
                            }
                            foreach ($fear as $f) {
                              if (strpos($f, 'Two Zone Climate Control') !== false) {
                              ?>
                                <div class="d-flex flex-column">
                                  <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Two Zone Climate Control" class="red-tooltip"><img src="./img/icons/Two-Zone-Climate-Control.png" /></span>
                                </div>



                            <?php
                              }
                            }

                            ?>



                            <!-- <div class="d-flex flex-column">
                              <small class="text-muted mb-1">ENGINE</small>
                              <div class="d-flex flex-row">
                                <img src="https://i.pinimg.com/originals/22/df/d6/22dfd62a7e2b161d2312b4c5237b97e9.png" width="30px" height="30px">
                                <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">Bracks</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/brake-icon.png" width="30" height="25px">
                                <h6 class="ml-1" style="padding:5px;">ABS &ast;</h6>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/speedometer-icon.png" width="30" height="25px">
                                <h6 class="ml-1">135 hp&ast;</h6>
                              </div>
                            </div> -->
                          </div>
                          <!-- <div class="d-flex flex-row justify-content-between px-3 pb-1">
                            <div class="row col-md-12">
                              <ul class="featured-item-list list-unstyled mx-0 mb-0 mt-3">
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-1.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Maximum: <?php echo $row2['maximum'] ?></span>
                                </li>
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-2.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Luggage: <?php echo $row2['luggages'] ?></span>
                                </li>
                                <li class="d-flex align-items-center my-2 featuresli">
                                  <span>
                                    <img src="img/transfer-page/featrered-icon-3.png" alt="" style="padding:5px;">
                                  </span>
                                  <span>Seating: <?php echo $row2['seating'] ?></span>
                                </li>
                              </ul>
                            </div>

                          </div> -->


                          <!-- <small class="text-muted key pl-3">Standard key Features</small> -->
                          <div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block col-md-12"><small>Book Now</small></button></div>
                          <!-- <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small> -->
                        </div>
                        <div class="ribbon down" style="--color: #ce3435;">
                          <div class="content">
                            <svg width="24px" height="24px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                              <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
        <?php
                  }
                }
              }
            }
          }
        }
        ?>

      </div>
    </div>
  </section>
  <section class="featured" style="margin-top: -80px !important;">
    <div class="container">
      <div class="section-title" style="text-align: left; padding-left:20px;">
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Best Deals Of The Month</h2>
      </div>
      <div class="featured-block mt-2 featured-slider owl-carousel owl-theme" style="height: 600px;">

        <?php

        $sql = "SELECT * FROM bestdeal";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {


            $cid = $row['carid'];


            $sqlga = "SELECT * FROM newrentacarpricesdis WHERE id='$cid'";
            $resultga = $conn->query($sqlga);

            if ($resultga->num_rows > 0) {
              // output data of each row
              while ($rowga = $resultga->fetch_assoc()) {





                if ($rowga['amorper'] == 'Amount') {



                  $showt = intval($rowga['dprice']) + intval($rowga['markup']);
                  $singlepri = intval($showt);
                  $disc = (100 - ((intval($showt) / intval($rowga['price'])) * 100));

                  $tot = intval($showt);

                  $totalpri = 1 * $tot;

                  $totaldisc = $disc;

                  $prep = intval($rowga['price']);
                } else if ($rowga['amorper'] == 'Percentage') {






                  $da = (intval($rowga['dprice']) / 100) * intval($rowga['markup']);



                  $showt = intval($rowga['dprice']) + intval($da);
                  $disc = (100 - ((intval($showt) / intval($rowga['price'])) * 100));


                  $singlepri = intval($showt);

                  $tot = intval($showt);

                  $totalpri = 1 * $tot;
                  $prep = intval($rowga['price']);
                  $totaldisc = $disc;
                }








                $opid = $rowga['aidi'];


                $sqlga2 = "SELECT * FROM newrentacarprices WHERE id='$opid'";
                $resultga2 = $conn->query($sqlga2);

                if ($resultga2->num_rows > 0) {
                  // output data of each row
                  while ($rowga2 = $resultga2->fetch_assoc()) {

                    $cc = $rowga2['name'];
                    $bb = $rowga2['brand'];
                    $mm = $rowga2['model'];
                    $yy = $rowga2['year'];
                    $con = $rowga2['country'];
                    $cit = $rowga2['city'];

                    $sql2 = "SELECT * FROM rentacarInventorydatabase WHERE hotel='$cc' && brand='$bb' && model='$mm' && year='$yy' && country='$con' && city='$cit'";



                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                      // output data of each row
                      while ($row2 = $result2->fetch_assoc()) {


                        $sql3 = "SELECT * FROM rentacarcarsimages WHERE hotel='" . $row2['hotel'] . "' && country='" . $row2['country'] . "' && city='" . $row2['city'] . "' && year='" . $row2['year'] . "' && model='" . $row2['model'] . "' && brand='" . $row2['brand'] . "' GROUP BY model";
                        $result3 = $conn->query($sql3);

                        if ($result3->num_rows > 0) {
                          // output data of each row
                          while ($row3 = $result3->fetch_assoc()) {
        ?>
                            <div class="col-sm-4" class="featured-item">
                              <div class=" cars-card card" style="position: relative;">
                                <img src="https://testing.squalltec.com/pco/RentacarCar%20Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" class="card-img-top" width="100%">
                                <div class="card-body pt-0 px-0 text-center">
                                  <div class="d-flex flex-row justify-content-between mb-0 p-1">
                                    <div class="row col-md-12">
                                      <div class="col-md-9 pt-3">
                                        <?php echo $row2['brand'] . ' ' . $row2['model']; ?>
                                      </div>
                                      <div class="col-md-3">
                                        <small class="text-muted mt-1">STARTING AT</small>

                                        <h6>AED <?php echo $totalpri; ?></h6>
                                        <h6 style='color:#dc3545; text-decoration:line-through'>AED <?php echo $prep; ?></h6>


                                      </div>
                                    </div>

                                  </div>
                                  <hr class="mt-2 mx-3">
                                  <div class="d-flex flex-row justify-content-between px-3 pb-1">
                                    <div class="d-flex flex-column"><span class="text-muted">Model</span><small class="text-muted"><?php echo $row2['year']; ?> </small></div>
                                    <div class="d-flex flex-column">
                                      <h5 class="mb-0"><?php echo $row2['horsepower']; ?></h5><small class="text-muted text-right">(horsepower)</small>
                                    </div>
                                  </div>








                                  <div class="p-2 mid">
                                    <?php


                                    $fear = explode(',', $row2['features']);

                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Cruise') !== false) {
                                    ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Cruise Control" class="red-tooltip"><img src="./img/icons/Cruise-Control.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Bluetooth') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Bluetooth" class="red-tooltip"><img src="./img/icons/Blutooth.png" /></span>
                                        </div>
                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Fog') !== false) {
                                      ?>

                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Fog Lights" class="red-tooltip"><img src="./img/icons/Fog-Lights.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Front Airbags') !== false) {
                                      ?>



                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Airbags" class="red-tooltip"><img src="./img/icons/Front-Airbags.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Rear AirBags') !== false) {
                                      ?>

                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Front Rear AirBags" class="red-tooltip"><img src="./img/icons/Front-Rear-AirBags.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Leather') !== false) {
                                      ?>

                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Leather Seats" class="red-tooltip"><img src="./img/icons/Leather-Seats.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Parking') !== false) {
                                      ?>

                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Parking Sensors" class="red-tooltip"><img src="./img/icons/Parking-Sensors.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Power Door Locks') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Door Locks" class="red-tooltip"><img src="./img/icons/Power-Door-Locks.png" /></span>
                                        </div>
                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Power Mirrors') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Mirrors" class="red-tooltip"><img src="./img/icons/Power-Mirrors.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Power Seats') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Power Seats" class="red-tooltip"><img src="./img/icons/Power-Seats.png" /></span>
                                        </div>


                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Premium Audio') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Premium Audio" class="red-tooltip"><img src="./img/icons/Premium-Auidio.png" /></span>
                                        </div>


                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Push Button Ignition') !== false) {
                                      ?>

                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Push Button Ignition" class="red-tooltip"><img src="./img/icons/Push-Button-Ignition.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Reverse Camera') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Reverse Camera" class="red-tooltip"><img src="./img/icons/Reverse-Camera.png" /></span>
                                        </div>

                                      <?php
                                      }
                                    }
                                    foreach ($fear as $f) {
                                      if (strpos($f, 'Two Zone Climate Control') !== false) {
                                      ?>
                                        <div class="d-flex flex-column">
                                          <span class="hotelsIconSection" data-toggle="tooltip" data-placement="top" title="Two Zone Climate Control" class="red-tooltip"><img src="./img/icons/Two-Zone-Climate-Control.png" /></span>
                                        </div>



                                    <?php
                                      }
                                    }

                                    ?>



                                    <!-- <div class="d-flex flex-column">
                              <small class="text-muted mb-1">ENGINE</small>
                              <div class="d-flex flex-row">
                                <img src="https://i.pinimg.com/originals/22/df/d6/22dfd62a7e2b161d2312b4c5237b97e9.png" width="30px" height="30px">
                                <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">Bracks</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/brake-icon.png" width="30" height="25px">
                                <h6 class="ml-1" style="padding:5px;">ABS &ast;</h6>
                              </div>
                            </div>
                            <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                              <div class="d-flex flex-row"><img src="https://uxwing.com/wp-content/themes/uxwing/download/transportation-automotive/speedometer-icon.png" width="30" height="25px">
                                <h6 class="ml-1">135 hp&ast;</h6>
                              </div>
                            </div> -->
                                  </div>













                                  <div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block col-md-12"><small>Book Now</small></button></div>
                                  <!-- <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small> -->
                                </div>
                                <div class="ribbon down" style="--color: #ce3435;">
                                  <div class="content" style="padding:10px !important; width:auto !important;">
                                    <?php echo $totaldisc . '% Off'; ?>
                                  </div>
                                </div>
                              </div>
                            </div>
        <?php
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
        ?>

      </div>
    </div>
  </section>

  <!-- </div> -->



  <script>
    $('.iimg').load(function() {
      $('#spinner').fadeOut();
    });
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $("#city2").on('change', function() {



      var country = document.getElementById('country').value;
      var city = document.getElementById('city2').value;

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

        var pickordelivery = document.getElementById('pickordelivery').value = 'Pick Up';



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


    });
  </script>




  <script>
    $.ajax({

      type: 'POST',
      url: 'getcitiesnew.php',
      data: {
        'country': 'United Arab Emirates'
      },

      success: function(result) {



        $("#city2").html(result);








        var country = document.getElementById('country').value;
        var city = document.getElementById('city2').value;



        var sldr = document.getElementById('sldr');
        document.getElementById('pickmeup').value = '';
        document.getElementById('dropmeup').value = '';

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
          var pickordelivery = document.getElementById('pickordelivery').value = 'Pick Up';






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

    });



















    $("#country").on('change', function() {

      var country = document.getElementById('country').value;







      $.ajax({

        type: 'POST',
        url: 'getcitiesnew.php',
        data: {
          'country': country
        },

        success: function(result) {



          $("#city2").html(result);



        }

      });






    });
  </script>
  <style>
    .subscription.bg-white {
      background: none;
    }

    .bg-white {
      background-color: #fff !important;
    }

    .subscription.bg-white .subscription-wrapper {
      background: #fff;
    }


    @media screen and (max-width: 1000px) {
      .subscription-wrapper {
        margin-left: -20px;
      }
    }



    .subscription-wrapper {
      border-radius: 0% 5% 10% 3%/10% 20% 0% 17%;
      -webkit-transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
      transform: perspective(1800px) rotateY(20deg) skewY(1deg) translateX(50px);
      padding: 70px 50px;
      z-index: 1;
      width: 100%;
      background: linear-gradient(80deg, #0030cc 0%, #00a4db 100%);

      top: 100px;

    }

    .subscription-wrapper {
      box-shadow: 0px 15px 39px 0px rgba(165, 9, 25, 40%) !important;
    }

    .subscription-content {
      -webkit-transform: skewY(-1deg);
      transform: skewY(-1deg);
    }

    h3,
    .h3 {
      font-size: 30px;
    }

    .flex-fill {
      -ms-flex: 1 1 auto !important;
      flex: 1 1 auto !important;
    }

    .subscription.bg-white .form-control {
      border: 1px solid #ebebeb !important;
    }

    .subscription-wrapper .form-control {
      height: 60px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 45px;
    }

    .subscription-wrapper .form-control:focus {
      background: rgba(255, 255, 255, 0.1);
      outline: 0;
      box-shadow: none;
    }

    .btn:not(:disabled):not(.disabled) {
      cursor: pointer;
    }

    .btn-primary {
      border: 0;
      color: #fff;
    }



    .btn:not(.stylenotneeded) {
      font-size: 16px;
      font-family: "Poppins", sans-serif;
      text-transform: capitalize;
      padding: 10px 45px;
      border-radius: 45px;
      font-weight: 500;
      border: 1px solid;
      position: relative;
      z-index: 1;
      transition: .3s ease-in;
      overflow: hidden;
    }

    .btn-primary:after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 102%;
      height: 100%;
      background: linear-gradient(45deg, #dc3545 0%, black 100%);
      z-index: -1;
      transition: ease 0.3s;
    }

    .card-sub-title {
      color: #dc3545;
    }
  </style>
  <style>
    @media screen and (max-width: 1000px) {
      .sbca {
        padding-left: 0;
        margin: 0;
      }
    }

    @media screen and (min-width: 1000px) {
      .sbca {
        padding-left: 5%;
        margin: 0 auto;
      }
    }

    .cardTextLimit {
      min-height: 70px;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      /* number of lines to show */
      -webkit-box-orient: vertical;
    }
  </style>

  <section class="subscription bg-white" style="margin: 5%;">
    <div style='width:90%;' class="sbca">
      <div class="row">
        <div class="col-lg-12">
          <div class="subscription-wrapper">
            <div class="d-flex subscription-content justify-content-between align-items-center flex-column flex-md-row text-center text-md-left">

              <h3 align='left' class="flex-fill">Subscribe to "Hugs" <p style='font-size:2vh;'>Prices Drop, the moment you sign up!</p>
              </h3>

              <form action="#" class="row flex-fill">
                <div class="col-lg-7 my-md-2 my-2">
                  <input type="email" class="form-control px-4 border-0 w-100 text-center text-md-left" id="email" placeholder="Your Email" name="email">
                </div>
                <div class="col-lg-5 my-md-2 my-2">
                  <button id="subr" style="background: linear-gradient(45deg, #dc3545 0%, black 100%); font-size:2.4wh; color:white;" type="submit" class="btn btn-lg border-0 w-100">Subscribe Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
  <script src="js/main.js"></script>



  <?php
  include 'footer.php';
  ?>