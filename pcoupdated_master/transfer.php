<?php
session_start();
require_once('db_connection.php');



$adults = $_SESSION['alladults'];
$children = $_SESSION['allchildren'];

$sdate= $_SESSION['sdate'];
$edate= $_SESSION['edate'];



$totalpax = 0;
$totalas = 0;
$totalcs = 0;

foreach ($adults as $a) {
  $totalpax = $totalpax + intval($a);
  $totalas=$totalas+intval($a);
}

foreach ($children as $c) {
  $totalpax = $totalpax + intval($c);
  $totalcs=$totalcs+ intval($c);
}












$hn = $_SESSION['hotel'];

$title = $_SESSION['ctitle'];
$fname = $_SESSION['cfname'];
$lname = $_SESSION['clname'];
$phone = $_SESSION['cphone'];
$email = $_SESSION['cemail'];


$uniquenumber = $_SESSION['uniquenumber'];


if ($uniquenumber == '') {


  $uniquenumber =  random_int(10000, 1000000000);

  $_SESSION['uniquenumber'] = $uniquenumber;
}







if (
isset($_POST['submit'])) {


  if (isset($_POST['country'])) {
    $country = $_POST['country'];
  } else {
    $country = '';
  }

  if (isset($_POST['city'])) {
    $city = $_POST['city'];
  } else {
    $city = '';
  }

  if (isset($_POST['adultst'])) {
    $adults = $_POST['adultst'];
  } else {
    $adults = '';
  }
  if (isset($_POST['childt'])) {
    $child = $_POST['childt'];
  } else {
    $child = '';
  }

  if (isset($_POST['tripType'])) {
    $triptype2 = $_POST['tripType'];
  } else {
    $triptype2 = '';
  }

  if (isset($_POST['tripType']) && $_POST['tripType'] == 'single') {
    
    if (isset($_POST['arrivaldates'])) {
      // $aadd = explode('-', $_POST['arrivaldates']);
      // if(count($aadd)>0){
      //   $arrivaldate = $aadd[2].'/'.$aadd[1].'/'.$aadd[0];
      // }else{
        $arrivaldate = $_POST['arrivaldates'];
      // }
      
    } else {
      $arrivaldate = '';
    }


    if (isset($_POST['fromlocation1t'])) {
      $fromlocation1 = $_POST['fromlocation1t'];


      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$fromlocation1' && city='$city' && country='$country'";

      $resultnewb = $conn->query($sqlnewb);

      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {

          $fromlocation1 = $rownewb['area'];
        }
      } else {
        $fromlocation1 = $fromlocation1;
      }
    } else {
      $fromlocation1 = '';
    }



    if (isset($_POST['tolocation1t'])) {
      $tolocation11 = $_POST['tolocation1t'];

      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$tolocation11' && city='$city' && country='$country'";

      $resultnewb = $conn->query($sqlnewb);

      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {

          $tolocation1 = $rownewb['area'];
        }
      } else {
        $tolocation1 = $tolocation11;
      }
    } else {
      $tolocation1 = '';
    }

    if (isset($_POST['vvtype1'])) {
      $arrivalvehicletype = $_POST['vvtype1'];
    } else {
      $arrivalvehicletype = '';
    }

    $_SESSION['country'] =  $country;
    $_SESSION['city'] =  $city;
    $_SESSION['tripType2'] = $triptype2;
    $_SESSION['triptype'] = $triptype2;
    $_SESSION['adultst'] = $adults;
    $_SESSION['pax']= intval($adults)+intval($child);
    $_SESSION['childt'] = $child;
    $_SESSION['arrivaldate'] =  $arrivaldate;
    $_SESSION['fromlocation1'] = $fromlocation1;
    $_SESSION['tolocation1'] = $tolocation1;
    $_SESSION['arrivalvehicletype'] = $arrivalvehicletype;


  }else{

    if (isset($_POST['fromlocation1'])) {
      $fromlocation1 = $_POST['fromlocation1'];


      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$fromlocation1' && city='$city' && country='$country'";

      $resultnewb = $conn->query($sqlnewb);

      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {

          $fromlocation1 = $rownewb['area'];
        }
      } else {
        $fromlocation1 = $fromlocation1;
      }
    } else {
      $fromlocation1 = '';
    }



    if (isset($_POST['tolocation1'])) {
      $tolocation11 = $_POST['tolocation1'];

      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$tolocation11' && city='$city' && country='$country'";

      $resultnewb = $conn->query($sqlnewb);

      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {

          $tolocation1 = $rownewb['area'];
        }
      } else {
        $tolocation1 = $tolocation11;
      }
    } else {
      $tolocation1 = '';
    }

    if (isset($_POST['fromlocation2'])) {
      $fromlocation22 = $_POST['fromlocation2'];
  
      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$fromlocation22' && city='$city' && country='$country'";
  
      $resultnewb = $conn->query($sqlnewb);
  
      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {
  
          $fromlocation2 = $rownewb['area'];
        }
      } else {
        $fromlocation2 = $fromlocation22;
      }
    } else {
      $fromlocation2 = '';
    }
  
    if (isset($_POST['tolocation2'])) {
      $tolocation22 = $_POST['tolocation2'];
  
  
  
  
  
      $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$tolocation22' && city='$city' && country='$country'";
  
      $resultnewb = $conn->query($sqlnewb);
  
      if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {
  
          $tolocation2 = $rownewb['area'];
        }
      } else {
        $tolocation2 = $tolocation22;
      }
    } else {
      $tolocation2 = '';
      
    }

    if (isset($_POST['sdate'])) {
      $arrivaldate = $_POST['sdate'];
    } else {
      $arrivaldate = '';
    }

    if (isset($_POST['edate'])) {
      $departuredate = $_POST['edate'];
    } else {
      $departuredate = '';
    }

    if (isset($_POST['vtype1'])) {
      $arrivalvehicletype = $_POST['vtype1'];
    } else {
      $arrivalvehicletype = '';
    }
  
    if (isset($_POST['vtype2'])) {
      $departurevehicletype = $_POST['vtype2'];
    } else {
      $departurevehicletype = '';
    }
    
    $_SESSION['country'] =  $country;
    $_SESSION['city'] =  $city;
    $_SESSION['tripType2'] = $triptype2;
    $_SESSION['triptype'] = $triptype2;
    $_SESSION['adultst'] = $adults;
    $_SESSION['pax']= intval($adults)+intval($child);
    $_SESSION['childt'] = $child;
    $_SESSION['arrivaldate'] =  $arrivaldate;
    $_SESSION['departuredate'] =  $departuredate;
    $_SESSION['fromlocation1'] = $fromlocation1;
    $_SESSION['tolocation1'] = $tolocation1;
    $_SESSION['fromlocation2'] = $fromlocation2;
    $_SESSION['tolocation2'] = $tolocation2;
    $_SESSION['arrivalvehicletype'] = $arrivalvehicletype;
    $_SESSION['departurevehicletype'] = $departurevehicletype;

  }

  header("Location: selectcar.php");
}



















include 'header.php';

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



  <div class="header-main-slider owl-theme owl-carousel" style="margin-bottom: -150px;;">
    <section class="banner" style="background: url('ca3.jpeg') center/cover no-repeat;">
    </section>
    <section class="banner" style="background: url('ca2.jpeg') center/cover no-repeat;">
    </section>
    <section class="banner" style="background: url('ca1.jpeg') center/cover no-repeat;">
    </section>

  </div>






  <section style='margin-top:75px; margin-bottom:-106px;' class='nomm'>
    <div class='container'>
      <div class='roundme row' style="width: 100%; padding:0px;">

        <!--NEW TOP Toggle box Start-->
        <div style="padding: 0px;">
                        <style>
                             html {
    
                                /* box-sizing: border-box; */
                                --bgColorMenu: #CE3435;
                                --duration: .7s;

                            }
                            .menuBoxNew {

                                margin: 0;
                                display: flex;
                                /* Works well with 100% width  */
                                width: 32.05em;
                                font-size: 1em;
                                padding: 0 2.85em;
                                position: relative;
                                align-items: center;
                                justify-content: center;
                                background-color: var(--bgColorMenu);
                                width:100%;
                                border-radius: 20px 20px 0px 0px;
                                top: -15px;
                                padding-bottom:8px;

                            }

                            .menu__item {

                                all: unset;
                                flex-grow: 1;
                                z-index: 100;
                                display: flex;
                                cursor: pointer;
                                position: relative;
                                border-radius: 50%;
                                align-items: center;
                                will-change: transform;
                                justify-content: center;
                                padding: 0.55em 0 0.85em;
                                transition: transform var(--timeOut, var(--duration));

                            }

                            .menu__item::before {

                                content: "";
                                z-index: -1;
                                width: 4.2em;
                                height: 4.2em;
                                border-radius: 50%;
                                position: absolute;
                                transform: scale(0);
                                transition: background-color var(--duration), transform var(--duration);

                            }


                            .menu__item.active {

                                transform: translate3d(0, -.8em, 0);

                            }
                            

                            .menu__item.active::before {

                                transform: scale(1);
                                background-color: var(--bgColorItem);

                            }
                            .menu__item:hover .menu__border{
                                transform: scale(1);
                            }

                            .icon {

                                width: 2.6em;
                                height: 2.6em;
                                stroke: white;
                                fill: transparent;
                                stroke-width: 1pt;
                                stroke-miterlimit: 10;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-dasharray: 400;

                            }
                            /* .icon:hover {

                                transform: translate3d(0, -.8em, 0);
                                background-color: red;

                                } */
                            .menu__item .icon {

                                color: #ce3435;

                            }

                            .menu__item.active .icon {

                                animation: strok 1.5s reverse;

                            }
                            .menu__item:hover .icon {

                                animation: strok 1.5s reverse;

                            }

                            @keyframes strok {

                                100% {

                                    stroke-dashoffset: 400;

                                }

                            }

                            .menu__border {

                                left: 0;
                                bottom: 99%;
                                width: 10.9em;
                                height: 2.4em;
                                position: absolute;
                                clip-path: url(#menu);
                                will-change: transform;
                                background-color: var(--bgColorMenu);
                                transition: transform var(--timeOut, var(--duration));

                            }

                            .svg-container {

                                width: 0;
                                height: 0;
                            }


                            @media screen and (max-width: 50em) {
                                .menu {
                                    font-size: .8em;
                                }
                            }
                        </style>
                        <div class="menuBoxNew">
                            <div class="row col-md-12   ">
                                <div class="col-md-3">
                                    <div class="row" style="margin-bottom: -10px;">
                                        <span class="menu__item" id="manuItem1" data-UrlPath="/index.php" style="--bgColorItem: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" fill="#fff"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V448c-17.7 0-32 14.3-32 32s14.3 32 32 32H208V448h96v64H480c17.7 0 32-14.3 32-32s-14.3-32-32-32V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zm80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H240c-8.8 0-16-7.2-16-16V112zM368 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM96 208c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V208zm144-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H240c-8.8 0-16-7.2-16-16V208c0-8.8 7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V208zm-3 152.2c3.3 12.8-7.8 23.8-21 23.8H184c-13.3 0-24.3-10.9-21-23.8c10.6-41.5 48.2-72.2 93-72.2s82.5 30.7 93 72.2z"/></svg>
                                        </span>
                                    </div>
                                    <div class="row d-flex justify-content-center" style="color: white;">
                                        Hotels
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="row" style="margin-bottom: -10px;">
                                        <span class="menu__item" id="manuItem2" data-UrlPath="/venues.php" style="--bgColorItem: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30" height="30" fill="#fff"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40z"/></svg>
                                        </span>
                                    </div>
                                    <div class="row  d-flex justify-content-center" style="color: white;">
                                    Venue 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row" style="margin-bottom: -10px;">
                                        <span class="menu__item active" id="manuItem3" data-UrlPath="/transfer.php" style="--bgColorItem: #fff;">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" fill="#ce3435"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z"/></svg>
                                            
                                        </span>
                                    </div>
                                    <div class="row  d-flex justify-content-center" style="color: white;">
                                        Transfers
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row" style="margin-bottom: -10px;">
                                        <span class="menu__item" id="manuItem4" data-UrlPath="/rentacar.php" style="--bgColorItem: #fff;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="30" height="30" fill="#fff"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M171.3 96H224v96H111.3l30.4-75.9C146.5 104 158.2 96 171.3 96zM272 192V96h81.2c9.7 0 18.9 4.4 25 12l67.2 84H272zm256.2 1L428.2 68c-18.2-22.8-45.8-36-75-36H171.3c-39.3 0-74.6 23.9-89.1 60.3L40.6 196.4C16.8 205.8 0 228.9 0 256V368c0 17.7 14.3 32 32 32H65.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H385.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H608c17.7 0 32-14.3 32-32V320c0-65.2-48.8-119-111.8-127zm-2.9 207c-6.6 18.6-24.4 32-45.3 32s-38.7-13.4-45.3-32c-1.8-5-2.7-10.4-2.7-16c0-26.5 21.5-48 48-48s48 21.5 48 48c0 5.6-1 11-2.7 16zM160 432c-20.9 0-38.7-13.4-45.3-32c-1.8-5-2.7-10.4-2.7-16c0-26.5 21.5-48 48-48s48 21.5 48 48c0 5.6-1 11-2.7 16c-6.6 18.6-24.4 32-45.3 32z"/></svg>
                                        </span>
                                    </div>
                                    <div class="row  d-flex justify-content-center" style="color: white;">
                                    Rent A Car 
                                    </div>
                                </div>
                                
                                
                            </div>

                            
                            

                           
                            

                            

                           

                            <div class="menu__border"></div>

                        </div>

                        <div class="svg-container">
                            <svg viewBox="0 0 202.9 45.5">
                                <clipPath id="menu" clipPathUnits="objectBoundingBox" transform="scale(0.0049285362247413 0.021978021978022)">
                                    <path d="M6.7,45.5c5.7,0.1,14.1-0.4,23.3-4c5.7-2.3,9.9-5,18.1-10.5c10.7-7.1,11.8-9.2,20.6-14.3c5-2.9,9.2-5.2,15.2-7 c7.1-2.1,13.3-2.3,17.6-2.1c4.2-0.2,10.5,0.1,17.6,2.1c6.1,1.8,10.2,4.1,15.2,7c8.8,5,9.9,7.1,20.6,14.3c8.3,5.5,12.4,8.2,18.1,10.5 c9.2,3.6,17.6,4.2,23.3,4H6.7z" />
                                </clipPath>
                            </svg>
                        </div>
                        <script>

                            const body = document.body;
                            const bgColorsBody = ["#ffb457", "#ff96bd", "#9999fb", "#ffe797", "#cffff1"];
                            const menu = body.querySelector(".menuBoxNew");
                            const menuItems = menu.querySelectorAll(".menu__item");
                            const menuBorder = menu.querySelector(".menu__border");
                            let activeItem = menu.querySelector(".active");

                            

                            function clickItem(item, index) {
                                item.classList.add("active");
                                menu.style.removeProperty("--timeOut");
                               
                                var svg = item.id;
                                var urlPath = $('#'+item.id).data('urlpath');

                                $('#manuItem1').children().attr('fill','#fff');
                                $('#manuItem2').children().attr('fill','#fff');
                                $('#manuItem3').children().attr('fill','#fff');
                                $('#manuItem4').children().attr('fill','#fff');
                                

                                $('#'+item.id).children().attr('fill','#CE3435');
                                
                                if (activeItem == item) return;
                                
                                if (activeItem) {
                                    activeItem.classList.remove("active");
                                }

                                
                                item.classList.add("active");
                                //body.style.backgroundColor = bgColorsBody[index];
                                activeItem = item;
                                offsetMenuBorder(activeItem, menuBorder);

                                setTimeout(function(){
                                    window.location.assign(urlPath);
                                }, 1000);

                                
                                
                                
                            }

                            // $('.menu__item').mouseover(function(){
                            //     offsetMenuBorder(this, menuBorder, true);
                            // });

                            // $('.menu__item').mouseout(function(){
                            //     console.log('i am out');
                            //     offsetMenuBorder(activeItem, menuBorder, true);
                            // });

                            function offsetMenuBorder(element, menuBorder,first = false) {
                                if(first){
                                    const offsetActiveItem = element.getBoundingClientRect();
                                    const left = Math.floor((offsetActiveItem.left - 1) - menu.offsetLeft - (menuBorder.offsetWidth  - offsetActiveItem.width) / 2) +  "px";
                                    menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;
                                }else{
                                    const offsetActiveItem = element.getBoundingClientRect();
                                    const left = Math.floor(offsetActiveItem.left - menu.offsetLeft - (menuBorder.offsetWidth  - offsetActiveItem.width) / 2) +  "px";
                                    menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;
                                }
                               

                            }

                            offsetMenuBorder(activeItem, menuBorder, true);

                            menuItems.forEach((item, index) => {

                                item.addEventListener("click", () => clickItem(item, index));
                                
                            })

                            window.addEventListener("resize", () => {
                                offsetMenuBorder(activeItem, menuBorder);
                                menu.style.setProperty("--timeOut", "none");
                            });
                        </script>
        </div>

        <!-- NEW TOP Toggle Box Ends-->


      



       

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
        <div style='color:#828282;' class='notranslate  input-iconszz roundme2 row'>
                   
          <div style='margin-top:-20px; margin-bottom:20px; text-align:center;'>
            One Way
            &nbsp;&nbsp;
            <label style='margin:0 auto;' class="switch">

              <input value='round' onchange='changeways(this)' type="checkbox">
              <span class="slider round"></span>

            </label>
            &nbsp;&nbsp;
            Round Trip


          </div>
          <form autocomplete="off" action='#' method='POST'>

            <div class='row'>
           
              <div style='text-align:center;' class='col-lg-4 col-md-4 col-sm-6 col-xs-12 pt-2'>
                <select style='text-align:center;' id="country" name='country' class="form-select">
                  <option selected>United Arab Emirates</option>

                </select>
              </div>


              <div style='text-align:center;' class='col-lg-4 col-md-4 col-sm-6 col-xs-12 pt-2'>
                <select style='text-align:center;' id="city" name='city' class="form-select">
                  <option disabled selected>Select City</option>

                </select>
              </div>



              <div style='text-align:center;' class='col-lg-2 col-md-2 col-sm-6 col-xs-12 pt-2'>
                <input style='text-align:center;'  placeholder='Adults' min='0' type='number' value='<?php echo $totalas;?>' id="pax" name='adultst' class="form-select">
              </div>
              <div style='text-align:center;' class='col-lg-2 col-md-2 col-sm-6 col-xs-12 pt-2'>
                <input style='text-align:center;'  value='<?php echo $totalcs;?>' placeholder='Children' min='0' type='number' id="pax" name='childt' class="form-select">
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
                .daterangepicker .calendar-table th, .daterangepicker .calendar-table td{

                  padding:0px !important;
                }
              </style>

              <input type="hidden" id="formtypefield" name="tripType" value="single">
              <div id='adate' class="row" style="padding-left: 0px; padding-right:0px;">
                <div  style='text-align:center;' class='col-lg-4 col-md-4 col-sm-12 col-xs-12 pt-4'>
                  <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text"  placeholder='Arrival Date' name="datefilter" />
                  <input type="hidden" name="arrivaldates" class="form-control" id="ssdate" value="<?php echo $_SESSION['sdate']; ?>">
                  <input type="hidden" name="sessionssdate" class="form-control" id="sessionssdate" value="<?php echo $_SESSION['sdate']; ?>">
                  <script>
                    $(function() {

                      setTimeout(() => {
                        var dated = new Date();
                        start_dateFormated = String(dated.getDay()).padStart(2, '0') + '/' + String(dated.getMonth()).padStart(2, '0') + '/' + dated.getFullYear();
                        var sessionssdate = $('#sessionssdate').val();
                        
                        var newsdate = '';
                            
                            if(sessionssdate != '' && sessionssdate != null && sessionssdate.length != 0){
                              let ddddds = sessionssdate.split('-');
                              newssdate = ddddds[2]+'/'+ddddds[1]+'/'+ddddds[0];
                              document.getElementById('ssdate').value = newssdate;
                              $('input[name="datefilter"]').val(newssdate);

                            }else{
                              document.getElementById('ssdate').value = start_dateFormated;
                              newssdate = start_dateFormated;
                              $('input[name="datefilter"]').val(start_dateFormated);
                            }

                       
                        
                        $('input[name="datefilter"]').daterangepicker({
                          opens: 'left',
                          autoUpdateInput: false,
                          singleDatePicker: true,
                          // timePicker: true,
                          timePickerIncrement: 30,
                          minYear: 1901,
                          maxYear: parseInt(moment().format('YYYY'), 10),
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
                  <input list='listedareas2' value="" style='text-align:center;' type='text' placeholder='From' name='fromlocation1t' class="form-select">
                </div>
                <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
                  <input list='listedareas' style='text-align:center;' value='<?php echo $_SESSION['hotel']; ?>' placeholder='To' type='text' name='tolocation1t' class="form-select">
                </div> 
                <div class='col-lg-2 col-md-2 col-sm-12 col-xs-12 pt-4'>
                  <select style='text-align:center;' name='vvtype1' class='form-select'>
                    <option>Economy</option>
                    <option>Luxury</option>
                    <option>Super Luxury</option>
                    <option>Bus</option>
                  </select>
                </div> 
              </div>

              <div id="addate" style="display: none; padding-left: 0px; padding-right:0px;">
                <div class="row" style="padding-left: 0px; padding-right:0px;">
                  <div  class='col-lg-4 col-md-4 col-sm-12 col-xs-12 pt-4'>
                      <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text" value='<?php echo $sdate . "-" . $edate; ?>'  name="datefilter2" />
                      <input type="hidden" name="sdate" class="form-control" id="sdate" value="<?php echo $_SESSION['sdate']; ?>">
                      <input type="hidden" name="edate" class="form-control" id="edate" value="<?php echo $_SESSION['edate']; ?>">


                      <input type="hidden" name="sessionsdate" class="form-control" id="sessionsdate" value="<?php echo $_SESSION['sdate']; ?>">
                      <input type="hidden" name="sessionedate" class="form-control" id="sessionedate" value="<?php echo $_SESSION['edate']; ?>">


                      <script>
                        $(function() {
                          setTimeout(() => {
                            var today2 = new Date();
                            var today21 = new Date();
                            today21.setDate(today21.getDate() + 2);

                            start_dateFormated = String(today2.getDay()).padStart(2, '0') + '/' + String(today2.getMonth()).padStart(2, '0') + '/' + today2.getFullYear();
                            endd_dateFormated = String(today21.getDay()).padStart(2, '0') + '/' + String(today21.getMonth()).padStart(2, '0') + '/' + today21.getFullYear();
                           
                            
                            var sessionsdate = $('#sessionsdate').val();
                            var sessionedate = $('#sessionedate').val();

                            var newsdate = '';
                            var newedate = '';

                            var check = false;
                            

                            if(sessionsdate.length != 0){
                              let ddddd = sessionsdate.split('-');
                              newsdate = ddddd[2]+'/'+ddddd[1]+'/'+ddddd[0];
                              document.getElementById('sdate').value = newsdate;
                              check = true;
                            }else{
                              document.getElementById('sdate').value = start_dateFormated;
                              newsdate = start_dateFormated;
                              
                            }


                            if(sessionedate.length != 0){
                              let ddddd2 = sessionedate.split('-');
                              newedate = ddddd2[2]+'/'+ddddd2[1]+'/'+ddddd2[0];
                              document.getElementById('edate').value = newedate;
                              check = true;
                            }else{
                              document.getElementById('edate').value = endd_dateFormated;
                              newedate = endd_dateFormated;
                              
                            }

                            if(check){
                              $('input[name="datefilter2"]').val(newsdate+' - '+newedate);
                            }else{
                              $('input[name="datefilter2"]').val(start_dateFormated+' - '+endd_dateFormated);
                            }



                            // $('input[name="datefilter2"]').val(start_dateFormated + ' - ' + endd_dateFormated);
                           
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
                    <input list='listedareas2' value="" style='text-align:center;' type='text' placeholder='From' name='fromlocation1' class="form-select">
                  </div>
                  <div class='col-lg-3 col-md-2 col-sm-12 col-xs-12 pt-4'>
                    <input list='listedareas' style='text-align:center;' value='<?php echo $_SESSION['hotel']; ?>' placeholder='To' type='text' name='tolocation1' class="form-select">
                  </div> 
                  <div class='col-lg-2 col-md-4 col-sm-12 col-xs-12 pt-4'>
                      <select style='text-align:center;' name='vtype1' class='form-select'>
                        <option>Economy</option>
                        <option>Luxury</option>
                        <option>Super Luxury</option>
                        <option>Bus</option>
                      </select>
                  </div> 
                </div>
                <div class="row" style="padding-left: 0px; padding-right:0px;">
                    <div class='col-lg-5 col-md-2 col-sm-12 col-xs-12 pt-4'>
                      <input list='listedareas2' value="<?php echo $_SESSION['hotel']; ?>" style='text-align:center;' type='text' placeholder='From' name='fromlocation2' class="form-select">
                    </div>
                    <div class='col-lg-5 col-md-2 col-sm-12 col-xs-12 pt-4'>
                      <input list='listedareas' style='text-align:center;' placeholder='To' type='text' name='tolocation2' class="form-select">
                    </div> 
                    <div class='col-lg-2 col-md-4 col-sm-12 col-xs-12 pt-4'>
                        <select style='text-align:center;' name='vtype2' class='form-select'>
                          <option>Economy</option>
                          <option selected>Luxury</option>
                          <option>Super Luxury</option>
                          <option>Bus</option>
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
                <input type='submit' name='submit' style='background-color:#dc3545; float:right;' class="btn btnba btn-primary btn-lg border-0 " value='Search Vehicle'>
              </div>
            </div>






          </form>

        </div>



      </div>



  </section>

  <section class="section-services" style="margin-top: 150px;">
    <div>
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
 
  </section>
  <section class="featured">
    <div class="container">
      <div class="section-title" style="text-align: left; padding-left:20px;">
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Economy Cars</h2>
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
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Luxury Cars</h2>
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
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Super Luxury Cars </h2>
      </div>
      <div class=" featured-block mt-2 featured-slider owl-carousel owl-theme" style="height: 600px;">

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
                              <div class="  cars-card card" style="position: relative;">
                                <div class="geeks">
                                  <img src="https://testing.squalltec.com/pco/RentacarCar%20Images/My%20Ride/Lexus/GS350/2020/lexusred2.jpg" class="iimg card-img-top" width="100%">
                                </div>
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
  <section class="featured" style="margin-top: -80px !important;">
    <div class="container">
      <div class="section-title" style="text-align: right; padding-right:20px;">
        <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-car text-uppercase"></i>&nbsp;Buses</h2>
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
  <script>
    function changeways($this) {
      if($('#formtypefield').val() == 'single'){
        $('#formtypefield').val('round')
        $("#adate").hide();
        $("#addate").show();
      }else{
        $('#formtypefield').val('single')
        $("#adate").show();
        $("#addate").hide();
      }


      return;


      var sdate = document.getElementById('sdate').value;

      var edate = document.getElementById('edate').value;

      var gethotelvalue = document.getElementById('gethotelvalue').value;

      if ($this.value == 'round') {

        if (document.getElementById('changeways').value == 'round') {
          document.getElementById('changeways').value = document.getElementById('onewayselect').value;
          document.getElementById('sh').style.display = 'block';

          const el = document.getElementById('adate');
          el.hide();
          $("#adate :input").attr("disabled", true);

          // if (el !== null) {
          //   el.remove();
          // }
          // const eld = document.getElementById('ddate');

          // if (eld !== null) {
          //   eld.remove();
          // }


          var ppl2 = document.getElementById('populateme2');
          ppl2.innerHTML = '';


          var ppl3 = document.getElementById('populateme3');
          ppl3.innerHTML = '';

          const elzz = document.getElementById('fromlocation1');

          if (elzz !== null) {
            elzz.remove();
          }
          const eldzz = document.getElementById('tolocation1');

          if (eldzz !== null) {
            eldzz.remove();
          }


          const elz = document.getElementById('fromlocation2');

          if (elz !== null) {
            elz.remove();
          }
          const eldz = document.getElementById('tolocation2');

          if (eldz !== null) {
            eldz.remove();
          }


















          if (document.getElementById('onewayselect').value == 'From Airport to Hotel') {






            var lbla = document.createElement('LABEL');
            lbla.innerHTML = 'Arrival';

            var devnew = document.createElement("div");
            devnew.classList.add('col-sm');
            devnew.style.textAlign = 'center';




            var arrivaldatenew = document.createElement('INPUT');
            arrivaldatenew.classList.add('form-control');
            arrivaldatenew.setAttribute('type', 'text');

            arrivaldatenew.setAttribute('name', 'fromlocation1');
            arrivaldatenew.setAttribute('list', 'listedareas2');

            arrivaldatenew.setAttribute('placeholder', 'From');
            arrivaldatenew.style.textAlign = 'center';




            devnew.appendChild(arrivaldatenew);





            var devneww = document.createElement("div");
            devneww.classList.add('col-sm');
            devneww.style.textAlign = 'center';



            var arrivaldateneww = document.createElement('INPUT');
            arrivaldateneww.classList.add('form-control');
            arrivaldateneww.setAttribute('type', 'text');
            arrivaldateneww.value = gethotelvalue;
            arrivaldateneww.setAttribute('name', 'tolocation1');
            arrivaldateneww.setAttribute('list', 'listedareas');
            arrivaldateneww.setAttribute('placeholder', 'To');
            arrivaldateneww.style.textAlign = 'center';




            devneww.appendChild(arrivaldateneww);












            var devnewwa = document.createElement("div");
            devnewwa.classList.add('col-sm');
            devnewwa.style.textAlign = 'center';





            var arrivaldatenewwa = document.createElement('SELECT');
            arrivaldatenewwa.classList.add('form-control');
            arrivaldatenewwa.setAttribute('name', 'type1');
            arrivaldatenewwa.style.textAlign = 'center';


            var op1 = document.createElement("option");
            op1.innerHTML = 'Economy';
            var op2 = document.createElement("option");
            op2.innerHTML = 'Luxury';
            var op3 = document.createElement("option");
            op3.innerHTML = 'Super Luxury';
            var op4 = document.createElement("option");
            op4.innerHTML = 'Bus';

            arrivaldatenewwa.appendChild(op1);
            arrivaldatenewwa.appendChild(op2);
            arrivaldatenewwa.appendChild(op3);
            arrivaldatenewwa.appendChild(op4);


            devnewwa.appendChild(arrivaldatenewwa);











            ppl2.appendChild(lbla);
            ppl2.appendChild(devnew);
            ppl2.appendChild(devneww);
            ppl2.appendChild(devnewwa);















            var ppl = document.getElementById('populatemepl');



            var dev = document.createElement("div");
            dev.classList.add('col-sm');
            dev.style.textAlign = 'center';
            dev.setAttribute('id', 'adate');
            dev.classList.add('pt-4');



            var arrivaldate = document.createElement('INPUT');
            arrivaldate.classList.add('form-control');
            arrivaldate.setAttribute('type', 'date');

            arrivaldate.value = sdate;

            arrivaldate.setAttribute('name', 'arrivaldate');
            arrivaldate.style.textAlign = 'center';




            dev.appendChild(arrivaldate);

            ppl.appendChild(dev);


          }








          if (document.getElementById('onewayselect').value == 'From Hotel to Airport') {























            var lbla3 = document.createElement('LABEL');
            lbla3.innerHTML = 'Departure';

            var devnew3 = document.createElement("div");
            devnew3.classList.add('col-sm');
            devnew3.style.textAlign = 'center';






            var arrivaldatenew3 = document.createElement('INPUT');
            arrivaldatenew3.classList.add('form-control');
            arrivaldatenew3.setAttribute('type', 'text');
            arrivaldatenew3.value = gethotelvalue;
            arrivaldatenew3.setAttribute('name', 'fromlocation2');
            arrivaldatenew3.setAttribute('list', 'listedareas2');
            arrivaldatenew3.setAttribute('placeholder', 'From');
            arrivaldatenew3.style.textAlign = 'center';




            devnew3.appendChild(arrivaldatenew3);





            var devneww3 = document.createElement("div");
            devneww3.classList.add('col-sm');
            devneww3.style.textAlign = 'center';







            var arrivaldateneww3 = document.createElement('INPUT');
            arrivaldateneww3.classList.add('form-control');
            arrivaldateneww3.setAttribute('type', 'text');


            arrivaldateneww3.setAttribute('name', 'tolocation2');
            arrivaldateneww3.setAttribute('list', 'listedareas');
            arrivaldateneww3.setAttribute('placeholder', 'To');
            arrivaldateneww3.style.textAlign = 'center';



            devneww3.appendChild(arrivaldateneww3);







            var devnewwa = document.createElement("div");
            devnewwa.classList.add('col-sm');
            devnewwa.style.textAlign = 'center';





            var arrivaldatenewwa = document.createElement('SELECT');
            arrivaldatenewwa.classList.add('form-control');
            arrivaldatenewwa.setAttribute('name', 'type2');
            arrivaldatenewwa.style.textAlign = 'center';


            var op1 = document.createElement("option");
            op1.innerHTML = 'Economy';
            var op2 = document.createElement("option");
            op2.innerHTML = 'Luxury';
            var op3 = document.createElement("option");
            op3.innerHTML = 'Super Luxury';
            var op4 = document.createElement("option");
            op4.innerHTML = 'Bus';

            arrivaldatenewwa.appendChild(op1);
            arrivaldatenewwa.appendChild(op2);
            arrivaldatenewwa.appendChild(op3);
            arrivaldatenewwa.appendChild(op4);


            devnewwa.appendChild(arrivaldatenewwa);
















            ppl3.appendChild(lbla3);
            ppl3.appendChild(devnew3);
            ppl3.appendChild(devneww3);
            ppl3.appendChild(devnewwa);











            var ppl = document.getElementById('populatemepl');

            var dev2 = document.createElement("div");
            dev2.classList.add('col-sm');
            dev2.style.textAlign = 'center';
            dev2.setAttribute('id', 'ddate');




            var departuredate = document.createElement('INPUT');
            departuredate.classList.add('form-control');
            departuredate.setAttribute('type', 'date');

            departuredate.value = sdate;

            departuredate.setAttribute('name', 'departuredate');
            departuredate.style.textAlign = 'center';




            dev2.appendChild(departuredate);


            ppl.appendChild(dev2);

          }





















        } else {
          document.getElementById('changeways').value = 'round';
          document.getElementById('sh').style.display = 'none';









          // yahan se


          var ppl2 = document.getElementById('populateme2');
          ppl2.innerHTML = '';


          var ppl3 = document.getElementById('populateme3');
          ppl3.innerHTML = '';



          const elzz = document.getElementById('fromlocation1');

          if (elzz !== null) {
            elzz.remove();
          }
          const eldzz = document.getElementById('tolocation1');

          if (eldzz !== null) {
            eldzz.remove();
          }


          const elz = document.getElementById('fromlocation2');

          if (elz !== null) {
            elz.remove();
          }
          const eldz = document.getElementById('tolocation2');

          if (eldz !== null) {
            eldz.remove();
          }











          var lbla = document.createElement('LABEL');
          lbla.innerHTML = 'Arrival';

          var devnew = document.createElement("div");
          devnew.classList.add('col-sm');
          devnew.style.textAlign = 'center';





          var arrivaldatenew = document.createElement('INPUT');
          arrivaldatenew.classList.add('form-control');
          arrivaldatenew.setAttribute('type', 'text');


          arrivaldatenew.setAttribute('name', 'fromlocation1');
          arrivaldatenew.setAttribute('list', 'listedareas2');
          arrivaldatenew.setAttribute('placeholder', 'From');
          arrivaldatenew.style.textAlign = 'center';




          devnew.appendChild(arrivaldatenew);





          var devneww = document.createElement("div");
          devneww.classList.add('col-sm');
          devneww.style.textAlign = 'center';





          var arrivaldateneww = document.createElement('INPUT');
          arrivaldateneww.classList.add('form-control');
          arrivaldateneww.setAttribute('type', 'text');
          arrivaldateneww.value = gethotelvalue;
          arrivaldateneww.setAttribute('name', 'tolocation1');
          arrivaldateneww.setAttribute('list', 'listedareas');
          arrivaldateneww.setAttribute('placeholder', 'To');
          arrivaldateneww.style.textAlign = 'center';




          devneww.appendChild(arrivaldateneww);











          var devnewwa = document.createElement("div");
          devnewwa.classList.add('col-sm');
          devnewwa.style.textAlign = 'center';







          var arrivaldatenewwa = document.createElement('SELECT');
          arrivaldatenewwa.classList.add('form-control');
          arrivaldatenewwa.setAttribute('name', 'type1');
          arrivaldatenewwa.style.textAlign = 'center';


          var op1 = document.createElement("option");
          op1.innerHTML = 'Economy';
          var op2 = document.createElement("option");
          op2.innerHTML = 'Luxury';
          var op3 = document.createElement("option");
          op3.innerHTML = 'Super Luxury';
          var op4 = document.createElement("option");
          op4.innerHTML = 'Bus';

          arrivaldatenewwa.appendChild(op1);
          arrivaldatenewwa.appendChild(op2);
          arrivaldatenewwa.appendChild(op3);
          arrivaldatenewwa.appendChild(op4);


          devnewwa.appendChild(arrivaldatenewwa);

          ppl2.appendChild(lbla);
          ppl2.appendChild(devnew);
          ppl2.appendChild(devneww);
          ppl2.appendChild(devnewwa);





          //yahan tk



          //new yahan se


          var lbla3 = document.createElement('LABEL');
          lbla3.innerHTML = 'Departure';

          var devnew3 = document.createElement("div");
          devnew3.classList.add('col-sm');
          devnew3.style.textAlign = 'center';






          var arrivaldatenew3 = document.createElement('INPUT');
          arrivaldatenew3.classList.add('form-control');
          arrivaldatenew3.setAttribute('type', 'text');
          arrivaldatenew3.value = gethotelvalue;
          arrivaldatenew3.setAttribute('name', 'fromlocation2');
          arrivaldatenew3.setAttribute('list', 'listedareas2');
          arrivaldatenew3.setAttribute('placeholder', 'From');
          arrivaldatenew3.style.textAlign = 'center';




          devnew3.appendChild(arrivaldatenew3);





          var devneww3 = document.createElement("div");
          devneww3.classList.add('col-sm');
          devneww3.style.textAlign = 'center';




          var arrivaldateneww3 = document.createElement('INPUT');
          arrivaldateneww3.classList.add('form-control');
          arrivaldateneww3.setAttribute('type', 'text');


          arrivaldateneww3.setAttribute('name', 'tolocation2');
          arrivaldateneww3.setAttribute('list', 'listedareas');
          arrivaldateneww3.setAttribute('placeholder', 'To');
          arrivaldateneww3.style.textAlign = 'center';




          devneww3.appendChild(arrivaldateneww3);









          var devnewwa2 = document.createElement("div");
          devnewwa2.classList.add('col-sm');
          devnewwa2.style.textAlign = 'center';




          var arrivaldatenewwa2 = document.createElement('SELECT');
          arrivaldatenewwa2.classList.add('form-control');
          arrivaldatenewwa2.setAttribute('name', 'type2');
          arrivaldatenewwa2.style.textAlign = 'center';


          var op12 = document.createElement("option");
          op12.innerHTML = 'Economy';
          var op22 = document.createElement("option");
          op22.innerHTML = 'Luxury';
          var op32 = document.createElement("option");
          op32.innerHTML = 'Super Luxury';
          var op42 = document.createElement("option");
          op42.innerHTML = 'Bus';

          arrivaldatenewwa2.appendChild(op12);
          arrivaldatenewwa2.appendChild(op22);
          arrivaldatenewwa2.appendChild(op32);
          arrivaldatenewwa2.appendChild(op42);


          devnewwa2.appendChild(arrivaldatenewwa2);














          ppl3.appendChild(lbla3);
          ppl3.appendChild(devnew3);
          ppl3.appendChild(devneww3);
          ppl3.appendChild(devnewwa2);




          //end yahan pe






          var ppl = document.getElementById('populatemepl');


          const el = document.getElementById('adate');

          if (el !== null) {
            el.remove();
          }
          const eld = document.getElementById('ddate');

          if (eld !== null) {
            eld.remove();
          }


          var dev = document.createElement("div");
          dev.classList.add('col-sm');
          dev.style.textAlign = 'center';
          dev.setAttribute('id', 'adate');
          dev.classList.add('pt-4');

          var arrivaldate = document.createElement('INPUT');
          arrivaldate.classList.add('form-control');

          arrivaldate.setAttribute('type', 'date');
          arrivaldate.value = sdate;
          arrivaldate.setAttribute('name', 'arrivaldate');
          arrivaldate.style.textAlign = 'center';




          dev.appendChild(arrivaldate);







          var dev2 = document.createElement("div");
          dev2.classList.add('col-sm');
          dev2.style.textAlign = 'center';
          dev2.setAttribute('id', 'ddate');
          dev2.classList.add('pt-4');




          var departuredate = document.createElement('INPUT');
          departuredate.classList.add('form-control');
          departuredate.setAttribute('type', 'date');
          departuredate.value = edate;
          departuredate.setAttribute('name', 'departuredate');
          departuredate.style.textAlign = 'center';




          dev2.appendChild(departuredate);
















          ppl.appendChild(dev);
          ppl.appendChild(dev2);

        }
      } else {
        document.getElementById('changeways').value = $this.value;
      }
    }
  </script>





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
    var country = document.getElementById('country').value;

    $.ajax({

      type: 'POST',
      url: 'getcitiesnew1.php',
      data: {
        'country': country
      },

      success: function(result) {


        $("#city").html(result);





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









      }

    });

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






    $("#city").on('change', function() {
      var country2 = document.getElementById('country').value;
      var city2 = document.getElementById('city').value;
      $.ajax({

        type: 'POST',
        url: 'getareasbycityfortransport.php',
        data: {
          'country': country2,
          'city': city2
        },

        success: function(result) {


          $("#listedareas").html(result);




        }

      });



      $.ajax({

        type: 'POST',
        url: 'getareasbycityfortransport2.php',
        data: {
          'country': country2,
          'city': city2
        },

        success: function(result) {


          $("#listedareas2").html(result);




        }

      });


    });
  </script>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
  <script src="js/main.js"></script>



  <?php
  include 'footer.php';
  ?>