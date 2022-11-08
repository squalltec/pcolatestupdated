<?php
session_start();
include 'header.php';
include 'db_connection.php';

if(isset($_POST['submit'])){
    
  
  
  
  
  
  
$_SESSION['country']=$_POST['country'];

$_SESSION['city']=$_POST['city'];

$_SESSION['event_size']=$_POST['event_size'];

$_SESSION['sdate']=$_POST['sdate'];

$_SESSION['edate']=$_POST['edate'];

$_SESSION['event_type']=$_POST['event_type'];

$_SESSION['SeatinStyles']=$_POST['SeatinStyles'];

$_SESSION['breakout_rooms']=$_POST['breakout_rooms'];   
  
  
  
  
  
  
  
    
$country=$_POST['country'];

$city=$_POST['city'];

$event_size=$_POST['event_size'];

$sdate=$_POST['sdate'];

$edate=$_POST['edate'];

$event_type=$_POST['event_type'];

$SeatinStyles=$_POST['SeatinStyles'];

$breakout_rooms=$_POST['breakout_rooms']; 
    
    
    
    
  echo "<script>location.replace('venuesearchlist.php');</script>";
}

?>


<link rel="icon" type="image/x-icon" href="img/logo.png">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="./js/jquery-time-picker2.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
<link rel="stylesheet" href="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>








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


  <div class="header-main-slider owl-theme owl-carousel" style="margin-bottom: -150px;">
    <!-- <section class="banner" style="background: url('img/webp/vanues/banner1.webp') center/cover no-repeat;">
    </section> -->
    <!-- <section class="banner" style="background: url('img/webp/vanues/banner2.webp') center/cover no-repeat;">
    </section> -->
    
    <section class="banner" style="background: url('img/webp/vanues/banner12.webp') center/cover no-repeat;">
    </section>
    <section class="banner" style="background: url('img/webp/vanues/venueHall-min-newsize-updated.jpg') center/cover no-repeat; background-position:top;">
    </section>
    <section class="banner" style="background: url('img/webp/vanues/concert.jpg') center/cover no-repeat; background-position:top;">
    </section>
    <section class="banner" style="background: url('img/webp/vanues/confrence-min.jpg') center/cover no-repeat; background-position:top;">
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
              width: 100%;
              border-radius: 20px 20px 0px 0px;
              top: -15px;
              padding-bottom: 8px;

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

            .menu__item:hover .menu__border {
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" fill="#fff">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path d="M32 0C14.3 0 0 14.3 0 32S14.3 64 32 64V448c-17.7 0-32 14.3-32 32s14.3 32 32 32H208V448h96v64H480c17.7 0 32-14.3 32-32s-14.3-32-32-32V64c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zm80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H240c-8.8 0-16-7.2-16-16V112zM368 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM96 208c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H112c-8.8 0-16-7.2-16-16V208zm144-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H240c-8.8 0-16-7.2-16-16V208c0-8.8 7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16V208zm-3 152.2c3.3 12.8-7.8 23.8-21 23.8H184c-13.3 0-24.3-10.9-21-23.8c10.6-41.5 48.2-72.2 93-72.2s82.5 30.7 93 72.2z" />
                    </svg>
                  </span>
                </div>
                <div class="row d-flex justify-content-center" style="color: white;">
                  Hotels
                </div>

              </div>
              <div class="col-md-3">
                <div class="row" style="margin-bottom: -10px;">
                  <span class="menu__item active" id="manuItem2" data-UrlPath="/venues.php" style="--bgColorItem: #fff;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="30" height="30" fill="#ce3435">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40z" />
                    </svg>
                  </span>
                </div>
                <div class="row  d-flex justify-content-center" style="color: white;">
                  Venue
                </div>
              </div>
              <div class="col-md-3">
                <div class="row" style="margin-bottom: -10px;">
                  <span class="menu__item " id="manuItem3" data-UrlPath="/transfer.php" style="--bgColorItem: #fff;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" fill="#fff">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" />
                    </svg>

                  </span>
                </div>
                <div class="row  d-flex justify-content-center" style="color: white;">
                  Transfers
                </div>
              </div>
              <div class="col-md-3">
                <div class="row" style="margin-bottom: -10px;">
                  <span class="menu__item " id="manuItem4" data-UrlPath="/rentacar.php" style="--bgColorItem: #fff;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="30" height="30" fill="#fff">
                      <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                      <path d="M171.3 96H224v96H111.3l30.4-75.9C146.5 104 158.2 96 171.3 96zM272 192V96h81.2c9.7 0 18.9 4.4 25 12l67.2 84H272zm256.2 1L428.2 68c-18.2-22.8-45.8-36-75-36H171.3c-39.3 0-74.6 23.9-89.1 60.3L40.6 196.4C16.8 205.8 0 228.9 0 256V368c0 17.7 14.3 32 32 32H65.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H385.3c7.6 45.4 47.1 80 94.7 80s87.1-34.6 94.7-80H608c17.7 0 32-14.3 32-32V320c0-65.2-48.8-119-111.8-127zm-2.9 207c-6.6 18.6-24.4 32-45.3 32s-38.7-13.4-45.3-32c-1.8-5-2.7-10.4-2.7-16c0-26.5 21.5-48 48-48s48 21.5 48 48c0 5.6-1 11-2.7 16zM160 432c-20.9 0-38.7-13.4-45.3-32c-1.8-5-2.7-10.4-2.7-16c0-26.5 21.5-48 48-48s48 21.5 48 48c0 5.6-1 11-2.7 16c-6.6 18.6-24.4 32-45.3 32z" />
                    </svg>
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
              var urlPath = $('#' + item.id).data('urlpath');

              $('#manuItem1').children().attr('fill', '#fff');
              $('#manuItem2').children().attr('fill', '#fff');
              $('#manuItem3').children().attr('fill', '#fff');
              $('#manuItem4').children().attr('fill', '#fff');


              $('#' + item.id).children().attr('fill', '#CE3435');

              if (activeItem == item) return;

              if (activeItem) {
                activeItem.classList.remove("active");
              }


              item.classList.add("active");
              //body.style.backgroundColor = bgColorsBody[index];
              activeItem = item;
              offsetMenuBorder(activeItem, menuBorder);

              setTimeout(function() {
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

            function offsetMenuBorder(element, menuBorder, first = false) {
              if (first) {
                const offsetActiveItem = element.getBoundingClientRect();
                const left = Math.floor((offsetActiveItem.left - 1) - menu.offsetLeft - (menuBorder.offsetWidth - offsetActiveItem.width) / 2) + "px";
                menuBorder.style.transform = `translate3d(${left}, 0 , 0)`;
              } else {
                const offsetActiveItem = element.getBoundingClientRect();
                const left = Math.floor(offsetActiveItem.left - menu.offsetLeft - (menuBorder.offsetWidth - offsetActiveItem.width) / 2) + "px";
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
            padding: 15px 0px 15px 0px;
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

          <div style='color:#828282;' class='input-iconszz roundme2 row'>
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
              .theme_btn_sm {
                    position: absolute;
                    right: 0 !important;
                    border: 1px solid #ce3435;
              }

              .theme_btn_sm:hover {
                    color: white !important;
                    background-color: #ce3435 !important;

                }
            </style>



            <div class='row'>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pe-0">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
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
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                  <select style='color:#dc3545; text-align:center;' id="city2" name='city' class="form-select">
                    <option disabled selected>Select City</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3 pe-0 mb-lg-0">
                  <input type="number" class="form-control" name="event_size"  placeholder="Event Size" min="0"/>
              </div>


            </div>

            <div class="row pt-2">
              <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3 mb-lg-0   CalenderDiv" style="padding-right: 0px;">
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
             



              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                  <select style='color:#dc3545; text-align:center;' name='event_type' class="form-select">
                    <option disabled selected>Event Type</option>
                    <option value="Wedding">Wedding</option>
                    <option value="Gala Dinner">Gala Dinner</option>
                    <option value="Conference">Conference</option>
                    <option value="Exhibition">Exhibition</option>
                  </select>
                </div>
              </div>

              
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0">
                <input type="number" style=' text-align:center; color:#dc3545;' class='form-control' name='breakout_rooms' placeholder='Breakout Rooms'>
              </div>

              <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0">
                <select style='color:#dc3545; text-align:center;' name='SeatinStyles' class="form-select">
                  <option disabled selected>Seating Style</option>
                  <option value="ushape">U Shape</option>
                  <option value="theater">Theater</option>
                  <option value="ampitheatre">Ampitheater</option>
                  <option value="classroom">Class room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                </select>
              </div>


            </div>

            <div class="row">
              <!-- <div class="col-lg-5 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0 pt-2" style="position:relative">
                
              </div> -->





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

  <!--TOP HOTELS SECTION START -->
  <section style='margin-top:30px;'>
    <div class='container'>

      <div class="tours-search-block-2 py-5 d-flex flex-column">
        <div class="tours-search-cards row g-5">

          <h2><i style='color:#dc3545;' class="stylenotneeded fas fa-hotel"></i>&nbsp;Our Top Selling Hotels</h2>



          <div class="col-md-6 col-lg-4">
            <div class="tours-card card ">
              <img src="/img/webp/newphotos/h11.webp" class="card-img-top" alt="...">
              <div class="card-body d-flex flex-column px-4">
                <h5 class="card-title mt-3">
                  JA Palm Tree Court testing
                </h5>
                <h6 class="card-sub-title">Experience World-class Service</h6>
                <p class="card-text flex-fill cardTextLimit">JA Palm Tree Court features a 732 m private beach and is surrounded by lush gardens, peaceful water features and…</p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>





          <div class="col-md-6 col-lg-4">
            <div class="tours-card card">
              <img src="/img/webp/newphotos/h22.webp" class="card-img-top" alt="...">
              <div class="card-body px-4 d-flex flex-column">
                <h5 class="card-title mt-3">Grand Millenium</h5>
                <h6 class="card-sub-title">Business Bay</h6>
                <p class="card-text flex-fill cardTextLimit">Grand Millennium Business Bay provides accommodations with a restaurant, free private parking...</p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>





          <div class="col-md-6 col-lg-4">
            <div class="tours-card card">
              <img src="/img/webp/newphotos/h33.webp" class="card-img-top" alt="...">
              <div class="card-body px-4 d-flex flex-column">
                <h5 class="card-title mt-3">Grand Hyatt</h5>
                <h6 class="card-sub-title">At West Corniche district of Abu Dhabi</h6>
                <p class="card-text flex-fill cardTextLimit">Grand Hyatt Abu Dhabi Hotel and Residences Emirates Pearl offers luxurious...</p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>












        </div>



      </div>

    </div>
  </section>
  <!--TOP HOTELS SECTION END -->


  <!--Restaurants SECTION START-->
  <section style='margin-top:-60px;'>
    <div class='container'>
      <div class="tours-search-block-2 py-5 d-flex flex-column">
        <div class="tours-search-cards row g-5">
          <h2 align='right'><i style='color:#dc3545;' class="stylenotneeded fas fa-utensils"></i>&nbsp;Restaurants</h2>
          <div class="col-md-6 col-lg-4">
            <div class="tours-card card ">
              <img src="/img/webp/newphotos/r11.webp" class="card-img-top" alt="...">
              <div class="card-body d-flex flex-column px-4">
                <h5 class="card-title mt-3">
                  Masti Restaurant
                </h5>
                <h6 class="card-sub-title">
                  INDIAN INSPIRED GLOBAL CUISINE
                </h6>
                <p class="card-text flex-fill cardTextLimit">
                  Multi award winning Masti, which translates to ‘fun and mischief’ infuses modern with tradition and colour with flavour, creating an…
                </p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--  <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="tours-card card">
              <img src="/img/webp/newphotos/r22.webp" class="card-img-top" alt="...">
              <div class="card-body px-4 d-flex flex-column">
                <h5 class="card-title mt-3">
                  MODERN GASTROPUB
                </h5>
                <h6 class="card-sub-title">
                  MODERN GASTROPUB
                </h6>
                <p class="card-text flex-fill cardTextLimit">
                  Soak up the relaxed atmosphere of this friendly neighbourhood gastro pub with an outdoor terrace. Take in the unique design…
                </p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--   <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="tours-card card">
              <img src="img/webp/newphotos/abcnew.webp" class="card-img-top" alt="...">
              <div class="card-body px-4 d-flex flex-column">
                <h5 class="card-title mt-3">
                  The Pods Restaurant
                </h5>
                <h6 class="card-sub-title">
                  A UNIQUE DINING EXPERIENCE
                </h6>
                <p class="card-text flex-fill cardTextLimit">
                  Discover delicious Pan Asian cuisine and cocktails with a flair for the dramatic. Located in the heart of Bluewater’s Island, in close proximity to Ain Dubai...
                </p>

                <div class="card-body-bottom d-flex align-items-center justify-content-between mb-2 mt-4">
                  <!--    <p class = "price-tag d-flex align-items-center mb-0">$ 150 <span class = "ms-2">per person</span></p>-->
                  <a href="#" style='margin-right:5px;' class="stylenotneeded btn btn-outline-secondary theme_btn_sm bg-white">Select</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
 

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
      url: 'getcitiesnewevents.php',
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