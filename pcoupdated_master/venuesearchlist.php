<?php
session_start();
include 'db_connection.php';



if(isset($_POST['submitme']))
{
   $_SESSION['venueid']=$_POST['venueid'];
   
   
    echo "<script>location.replace('bsvenues.php');</script>";   
}


if(isset($_POST['submit']))
{
$_SESSION['SeatinStyles']=$_POST['seatingstyle'];
$_SESSION['breakout_rooms']=$_POST['breakoutrooms'];
$_SESSION['event_type']=$_POST['event_type'];
$_SESSION['sdate']=$_POST['sdate'];
$_SESSION['edate']=$_POST['edate'];
$_SESSION['event_size']=$_POST['event_size'];
$_SESSION['city']=$_POST['city'];
$_SESSION['country']=$_POST['country'];
}









    
$country=$_SESSION['country'];

$city=$_SESSION['city'];

$event_size=$_SESSION['event_size'];

$sdate=$_SESSION['sdate'];

$edate=$_SESSION['edate'];

$event_type=$_SESSION['event_type'];

$seating_style=$_SESSION['SeatinStyles'];

$breakout_rooms=$_SESSION['breakout_rooms']; 
    
   
   
   
 


   
   
    

$sql = "SELECT * FROM meetingbanquetplanner WHERE country='$country' && city='$city' && $seating_style>=$event_size && breakoutroomsquantity>=$breakout_rooms ORDER by venuerating DESC";
$vanues = $conn->query($sql);



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/app.css">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet"> -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/simple-load-more@1.6.2/jquery.simpleLoadMore.min.js"></script> -->








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

    /* Style buttons */
    .btnNew {
      background-color: #DC3545;
      /* Blue background */
      border: none;
      /* Remove borders */
      color: white;
      /* White text */
      padding: 10px 5px;
      /* Some padding */
      font-size: 12px;
      /* Set a font size */
      cursor: pointer;

    }

    /* Darker background on mouse-over */
    .btnNew:hover {
      background-color: #DC3545;
      border: 1px solid #DC3545;
    }

    ul#menu {
      display: flex;

    }

    ul#menu li {
      display: inline;
      margin-left: 5px;
      margin-right: 5px;

    }

    .item_details {
      position: relative;
      min-width: 28%;
      padding: 0px !important;
      overflow: hidden;

    }

    .bookNewBtn {
      margin-top: 10px;
      margin-bottom: 10px;
      margin-right: 10px;
      position: absolute;
      right: 2px;
      bottom: -4px;

    }

    .bookNewBtnLoadMore {
      margin-top: 10px;
      margin-bottom: 10px;
      margin-right: 10px;
      position: absolute;
      left: 36%;
      bottom: -4px;
      animation: glowing 1300ms infinite;

    }

    .bookNewBtnLoadMoreh {
      margin-top: 10px;
      margin-bottom: 10px;
      margin-right: 10px;
      position: absolute;
      left: 48%;
      animation: glowing 1300ms infinite;
      color: white !important;
      font-size: 14px !important;
    }

    @keyframes glowing {
      0% {
        background-color: #ce3435;
        box-shadow: 0 0 5px #ce3435;
      }

      50% {
        background-color: #ce3435;
        box-shadow: 0 0 20px #ce3435;
      }

      100% {
        background-color: #ce3435;
        box-shadow: 0 0 5px #ce3435;
      }
    }

    .searchlist .searchitem {

      border: none !important;
      margin-bottom: 0px !important;


    }



    @media screen and (max-width: 1000px) {

      .searchlist .searchitem {

        /* display: block !important; */
        margin-top: 20px;

      }
    }

    @media screen and (max-width: 576px) {

      .searchitem {

        padding-bottom: 30px;

      }
      .bookNewBtnLoadMoreh{
        left: 20%;
      }
    }
  </style>
  <style>
    .infoBoxTitle {
      float: left;
      border-right: 2px solid red;
      padding-right: 5px;
      font-size: 15px;
    }

    .infoBoxTitle:hover {
      border-right: 2px solid white;
    }

    .hidedisplay {
      display: none !important;
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

    .daterangepicker .calendar-table th,
    .daterangepicker .calendar-table td {
      padding: 0px !important;
    }

    .daterangepicker {
      border: 1px solid #ce3435 !important;
      padding: 10px;
    }
  </style>
  <style>
    .content2 {
      display: none !important;
    }

    /* #loadMore {
      width: 200px;
      border-radius: 10px;
      background-color: #ce3435;
    } */



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

  <title>Search Result</title>
</head>

<body>


  <script>
    // setInterval(function() {
    //   document.getElementsByClassName("daterangepicker")[0].classList.remove('notranslate');
    //   document.getElementsByClassName("daterangepicker")[0].classList.add('notranslate');

    // }, 1000);
  </script>


  <input style='display:none;' name='contry' id='contry' value='<?php echo $country; ?>'>



  <style>
    .whatsappp {
      position: fixed;
      bottom: 10px;
      right: 0;
      z-index: 1;
      padding-right: 10px;
    }

    .styled-checkbox {
      position: absolute;
      opacity: 0;
    }

    .styled-checkbox+label {
      position: relative;
      cursor: pointer;
      padding: 0;
      font-size: 12px;
    }

    .styled-checkbox+label:before {
      content: "";
      margin-right: 5px;
      margin-top: 3px;
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

    .room-amenities {
      margin-bottom: 30px;
    }

    .styled-checkbox-1 {
      display: flex;
      margin-bottom: 5px;
    }
  </style>

  <a href='https://wa.me/+971506509976'> <img loading="lazy" src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a>


  <div class="main-holder">

    <?php include('header.php');
    ?>



    <style>
      .swal2-confirm {
        background-color: #DC3545 !important;
      }

      @media screen and (max-width: 576px) {
        .CalenderDiv {
          padding: 0px;
          padding-left: 5px;
        }

        .SBtn {
          margin-left: 10px;
        }

        .search_submit {
          margin-left: 0px !important;
          /* width: 100% !important; */
        }

        .other_room_list {
          padding-bottom: 80px;
        }

      }

      @media (min-width: 768px) {
        .CalenderDiv {
          padding: 0px;
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
        height: 420px;
        justify-content: center;
        align-items: center;
        overflow: hidden;

      }

      .mySlidesCss img {
        border-radius: 20px 0px 0px 0px;
        flex-shrink: 0;
        -webkit-flex-shrink: 0;
        height: 100%;
        object-fit: cover;
      }


      /* nexts & previous buttons */
      .prevs,
      .nexts {
        cursor: pointer;
        position: absolute;
        top: 50%;
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
        right: 1px;
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
        background-color: #ce3435;
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
          top: 50%;
        }

        .nexts {
          right: 1px;
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

      .ModalrightDescriptionSection {
        border-radius: 0px 20px;
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
          top: 60%;
        }

        .mySlidesCss {
          height: 200px !important;
        }

        .mySlidesCss img {
          border-radius: 20px 20px 0px 0px;
        }

        .ModalrightDescriptionSection {
          border-radius: 0px 0px;
        }

        .vanueamsModalContent {
          height: 100%;
          overflow: scroll;
        }

        .myCat {
          display: none;
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
        background-color: #ce3435;
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

      *.hidden {
        display: none !important;
      }

      div.loading {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(16, 16, 16, 0.5);
        z-index: 99999;
        display: none;
      }

      @-webkit-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-webkit-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-moz-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-ms-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-moz-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-webkit-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @-o-keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @keyframes uil-ring-anim {
        0% {
          -ms-transform: rotate(0deg);
          -moz-transform: rotate(0deg);
          -webkit-transform: rotate(0deg);
          -o-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -ms-transform: rotate(360deg);
          -moz-transform: rotate(360deg);
          -webkit-transform: rotate(360deg);
          -o-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      .uil-ring-css {
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 200px;
        height: 200px;
      }

      .uil-ring-css>div {
        position: absolute;
        display: block;
        width: 160px;
        height: 160px;
        top: 20px;
        left: 20px;
        border-radius: 80px;
        box-shadow: 0 6px 0 0 #ffffff;
        -ms-animation: uil-ring-anim 1s linear infinite;
        -moz-animation: uil-ring-anim 1s linear infinite;
        -webkit-animation: uil-ring-anim 1s linear infinite;
        -o-animation: uil-ring-anim 1s linear infinite;
        animation: uil-ring-anim 1s linear infinite;
      }

      .thumbnailBox {
        margin-right: 8px;
        width: 98px;
        height: 64px;
        position: relative;
        overflow: hidden;
        border-radius: 4px;
        background-color: rgb(56, 67, 90);
        border: 2px solid rgb(42, 42, 58);
        opacity: 0.6;
      }

      .thumbnailBox img {
        cursor: pointer;
        font-family: "object-fit:cover;object-position:center";
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        -webkit-transition: opacity .3s ease-in;
        transition: opacity .3s ease-in;
        height: 100%;
        width: 100%;

      }


      .activeImage,
      .thumbnailBox:hover {
        /* transform: scale(1.1); */
        border: 2px solid rgb(255, 24, 0);
        opacity: 1;
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
    </style>
    <section class="page_title" style="background: none;">
      <div class="container">
        <section class="page_searchbox" style="background:none; ">
          <div class="container px-0" style="padding-right:24px !important;">
            <div class="search_box" style="padding-left:0.8em;  box-shadow: 0px 15px 39px 0px rgb(165 9 25 / 40%) !important;">
              <div class="row">
                <div class="col-12 mx-auto">
                  <h5 class="ml-lg-2" style="color:black;">Modify Your Search</h5>
                </div>
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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ps-0 pe-0">
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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3 ps-0 pe-0 mb-lg-0">
                      <input type="number" class="form-control" name="event_size" value='<?php echo $event_size;?>' placeholder="Event Size" min="0" style="height: 49px;" />
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

                                var a='<?php echo $sdate;?>';
                                 var b='<?php echo $edate;?>';
                              star_dateFormated = String(today.getDay()).padStart(2, '0') + '/' + String(today.getMonth()).padStart(2, '0') + '/' + today.getFullYear();
                              end_dateFormated = String(today.getDay()).padStart(2, '0') + '/' + String(today.getMonth()).padStart(2, '0') + '/' + today.getFullYear();
                              document.getElementById('sdate').value = a;
                              document.getElementById('edate').value = b;

                              $('input[name="datefilter"]').val(a + ' - ' + b);
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




                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pe-0">
                      <div style='text-align:center;' class='inner-addon left-addon col-sm'>
                        <select style='color:#dc3545; text-align:center;' name='event_type' class="form-select">
                            <?php if($event_type=='Wedding'){
                                echo '<option value="Wedding">Wedding</option>
                          <option value="Gala Dinner">Gala Dinner</option>
                          <option value="Conference">Conference</option>
                          <option value="Exebition">Exhibition</option>';
                            }
                            else if($event_type=='Gala Dinner'){
                                echo '
                          <option value="Gala Dinner">Gala Dinner</option>
                          <option value="Wedding">Wedding</option>
                          <option value="Conference">Conference</option>
                          <option value="Exebition">Exhibition</option>';
                            }
                             else if($event_type=='Conference'){
                                echo '
                                <option value="Conference">Conference</option>
                          <option value="Gala Dinner">Gala Dinner</option>
                          <option value="Wedding">Wedding</option>
                          <option value="Exhibition">Exhibition</option>';
                            }
                                 else if($event_type=='Exhibition'){
                                echo '
                                 <option value="Exebition">Exhibition</option>
                                <option value="Conference">Conference</option>
                          <option value="Gala Dinner">Gala Dinner</option>
                          <option value="Wedding">Wedding</option>
                         ';
                            }
                            else{
                                 echo '
                                 <option disabled selected>Event Type</option>
                          <option value="Gala Dinner">Gala Dinner</option>
                          <option value="Wedding">Wedding</option>
                          <option value="Conference">Conference</option>
                          <option value="Exebition">Exhibition</option>';
                            }
                            ?>
                          
                          
                        </select>
                      </div>
                    </div>


                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0">
                      <input type="number" style=' text-align:center; color:#dc3545; height: 49px;' class='form-control ' name='breakoutrooms' value='<?php echo $breakout_rooms;?>' placeholder='Breakout Rooms'>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0">
                      <select style='color:#dc3545; text-align:center;' name='seatingstyle' class="form-select">
                       
                       <?php
                       if($seating_style=='ushape')
                       {
                           echo' 
                       <option value="ushape">U Shape</option>
                  <option value="theater">Theater</option>
                  <option value="ampitheatre">Ampitheater</option>
                  <option value="classroom">Class room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                       else  if($seating_style=='theater')
                       {
                           echo' 
                       
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  <option value="ampitheatre">Ampitheater</option>
                  <option value="classroom">Class room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                       else  if($seating_style=='ampitheatre')
                       {
                           echo' 
                       <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                  <option value="classroom">Class room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                        else  if($seating_style=='classroom')
                       {
                           echo' 
                           <option value="classroom">Class room</option>
                       <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                  
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                       else  if($seating_style=='cabaret')
                       {
                           echo' 
                           <option value="cabaret">Cabaret</option>
                           <option value="classroom">Class room</option>
                       <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                  
                  
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                        else  if($seating_style=='boardroom')
                       {
                           echo' 
                           <option value="boardroom">Board Room</option>
                           <option value="cabaret">Cabaret</option>
                           <option value="classroom">Class room</option>
                       <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                  
                  
                  
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                            else  if($seating_style=='banquetdinner')
                       {
                           echo' 
                           <option value="banquetdinner">Banquet Dinner</option>
                           <option value="boardroom">Board Room</option>
                           <option value="cabaret">Cabaret</option>
                           <option value="classroom">Class room</option>
                       <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                        else  if($seating_style=='cocktailreception')
                       {
                           echo' 
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="boardroom">Board Room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="classroom">Class room</option>
                  <option value="ampitheatre">Ampitheater</option>
                  <option value="theater">Theater</option>
                  <option value="ushape">U Shape</option>
                  
                 
                  <option value="roundtable">Round Table</option>
                  '; 
                       }
                           else  if($seating_style=='roundtable')
                       {
                           echo' 
                           <option value="roundtable">Round Table</option>
                           <option value="cocktailreception">Cocktail Reception</option>
                           <option value="banquetdinner">Banquet Dinner</option>
                           <option value="boardroom">Board Room</option>
                           <option value="cabaret">Cabaret</option>
                           <option value="classroom">Class room</option>
                           <option value="ampitheatre">Ampitheater</option>
                           <option value="theater">Theater</option>
                           <option value="ushape">U Shape</option>
                  '; 
                       }
                       else{
                       echo' <option disabled selected>Seating Style</option>
                       <option value="ushape">U Shape</option>
                  <option value="theater">Theater</option>
                  <option value="ampitheatre">Ampitheater</option>
                  <option value="classroom">Class room</option>
                  <option value="cabaret">Cabaret</option>
                  <option value="boardroom">Board Room</option>
                  <option value="banquetdinner">Banquet Dinner</option>
                  <option value="cocktailreception">Cocktail Reception</option>
                  <option value="roundtable">Round Table</option>
                  ';
                        }
                        ?>
                      </select>
                    </div>


                  </div>

                  <div class="row">
                    <!-- <div class="col-lg-5 col-md-4 col-sm-6 col-xs-12 mb-3 mb-lg-0 pe-0 pt-2" style="position:relative">
                      
                    </div> -->





                  </div>
                  <div class="row pt-2" style="    justify-content: right;">

                    <input type='submit' name='submit' class="applyBtn btn btnba btn-primary btn-lg border-0 " style="padding:18px 48px !important; color:white" value='Search'>

                  </div>









                </div>
              </form>
            </div>
          </div>
        </section>
        <!-- <h1>Search Result</h1>

                <a style='display:none;' href="#" id='popalert' data-bs-toggle="modal" data-bs-target=".alertModal">pop</a> -->
      </div>
    </section>
    <div class="loading">
      <div class='uil-ring-css' style='transform:scale(0.79);'>
        <div>

        </div>
      </div>
    </div>













    <style>
      .filterCardHead {
        background-color: #ce3435;
        cursor: pointer;
        padding: 0px;
      }

      .FilterTabLink {
        text-align: left;
        text-decoration: none;
        color: white;
        font-size: 14px;
      }

      .FilterTabLink:hover {
        color: white;
      }

      .reviews {
        display: flex !important;
        color: #DC3545 !important;
        font-weight: 700 !important;
        font-size: 12px !important;
        line-height: 15px !important;
        color: #DC3545;
        margin-bottom: .5em !important;
      }

      .reviews .rating {
        margin-bottom: 0 !important;
        list-style: none !important;
        padding-left: 0 !important;
        display: flex !important;
      }

      .reviews .rating li {
        font-size: 15px !important;
        padding-right: 5px !important;
      }

      .reviews span {
        padding-left: 10px !important;
      }

      .item_address {
        font-weight: 400 !important;
        font-size: 12px !important;
        line-height: 15px !important;
        color: #000000 !important;
        opacity: 0.5 !important;
      }

      .venue_box_img {
        border-radius: 7px 0px 0px 7px !important;
        overflow: hidden;
        height: 227.5px;
        max-height: 235.5px;
        position: relative;
      }

      .venue_box_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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



      .opt1text {
        font-size: 12px;
      }

      .opt2text {
        font-size: 12px;
      }

      .red-tooltip+.tooltip>.tooltip-inner {
        background-color: #ce3435 !important;
      }

      .venueDetailBox {
        margin-bottom: 10px;
        width: 100%;
        font-size: 13px;
        padding: 13px;
        border: 1px solid rgba(0, 0, 0, .3);
        border-radius: 0px 10px 10px 0px;
        height: 227.5px;
        max-height: 235.5px;
        overflow-y: auto;
      }

      @media screen and (max-width: 420px) {
        .searchlist .item_details {
          padding-bottom: 30px !important;
        }

        .RoomSection {
          padding-left: 0px;
        }

        .searchlist .item_details {
          padding-bottom: 0px !important;
          padding-right: 0px !important;
          padding-left: 0px !important;
        }

        .venue_box_img {
          border-radius: 7px 7px 0px 0px !important;
        }

      }

      @media screen and (max-width: 1200px) {

        .venue_box_img {
          border-radius: 7px 7px 0px 0px !important;
        }

        .venueDetailBox {
          border-radius: 0px 0px 10px 10px;
        }

      }

      .scrollbar {
        margin-left: 30px;
        float: left;
        height: 300px;
        width: 65px;
        background: #fff;
        overflow-y: scroll;
        margin-bottom: 25px;
      }

      #style-3::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
      }

      #style-3::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
      }

      #style-3::-webkit-scrollbar-thumb {
        background-color: #ce3435;
      }

      .price-range-slider {
        width: 100% !important;
        float: left !important;
        padding: 0px 0px 25px 0px !important;
      }

      .price-range-slider .range-value {
        margin: 0 !important;
      }

      .price-range-slider .range-value input {
        width: 100% !important;
        background: none !important;
        color: #000 !important;
        font-size: 12px !important;
        font-weight: initial !important;
        box-shadow: none !important;
        border: none !important;
        margin: 20px 0 20px 0 !important;
      }

      .price-range-slider .range-bar {
        border: none !important;
        background: #000 !important;
        height: 3px !important;
        width: 96% !important;
        margin-left: 8px !important;
      }

      .price-range-slider .range-bar .ui-slider-range {
        background: #ce3435 !important;
      }

      .price-range-slider .range-bar .ui-slider-handle {
        border: none !important;
        border-radius: 25px !important;
        background: #fff !important;
        border: 2px solid #ce3435 !important;
        height: 17px !important;
        width: 17px !important;
        top: -0.52em !important;
        cursor: pointer !important;
      }

      .price-range-slider .range-bar .ui-slider-handle+span {
        background: #ce3435 !important;
      }
    </style>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <section class='smry ' style='padding-top:15px;'>



      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding:0 !important; margin:0px;">
            <div id="accordion">
              <div class="card filterCard">
                <div class="card-header filterCardHead" id="priceRangeOne">
                  <h5 class="mb-0">
                    <span class="btn btn-link FilterTabLink">
                      Price Range
                    </span>
                  </h5>
                </div>

                <div id="priceRange" class="show">
                  <div class="card-body" style="padding-top: 3px;">
                    <div class="price-range-slider">
                      <p class="range-value">
                        <input type="text" id="amount" readonly>
                      </p>
                      <div id="slider-range" class="range-bar"></div>

                    </div>
                    <script>
                      $(function() {
                        $("#slider-range").slider({
                          range: true,
                          min: 100,
                          max: 5000,
                          values: [100, 800],
                          slide: function(event, ui) {
                            $("#amount").val("AED " + ui.values[0] + " - AED " + ui.values[1]);
                          }
                        });
                        $("#amount").val("AED " + $("#slider-range").slider("values", 0) +
                          " - AED " + $("#slider-range").slider("values", 1));
                      });
                    </script>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header filterCardHead" id="headingOne" data-toggle="collapse" data-target="#popularFilters" aria-expanded="true" aria-controls="collapseOne">
                  <h5 class="mb-0">
                    <span class="btn btn-link FilterTabLink">
                      Popular Filters
                    </span>
                  </h5>
                </div>

                <div id="popularFilters" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                      <span>
                        
                        <!--
                        
                        <input id='romantic' type='checkbox' onclick='filters();' value='Romantic' class="hotelfil  styled-checkbox"> <label for='romantic' class="styled-checkbox-1">Romantic Getaways</label>
                        <input id='sustain' type='checkbox' onclick='filters();' value='sustainability' class="hotelfil styled-checkbox"> <label for='sustain' class="styled-checkbox-1">Sustainability</label>
                        
                        -->
                      </span>
                    </li>
                  </div>
                </div>
              </div>
            
            
            <!--  <div class="card">
                <div class="card-header filterCardHead" id="headingTwo" data-toggle="collapse" data-target="#Facilities" aria-expanded="false" aria-controls="collapseTwo">
                  <h5 class="mb-0">
                    <span class="btn btn-link collapsed FilterTabLink">
                      Facilities
                    </span>
                  </h5>
                </div>
                <div id="Facilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">


                      <span>
                        <input id='airportshuttle' onclick='filters();' value='airport' type='checkbox' class="hotelfil styled-checkbox">

                        <label for='airportshuttle' class=" styled-checkbox-1">Free Airport Shuttle</label>
                        <input id='pets' type='checkbox' onclick='filters();' value='pets' class="hotelfil styled-checkbox"> <label for='pets' class="styled-checkbox-1">Pets Allowed</label>
                        <input id='electric' type='checkbox' onclick='filters();' value='electric vehicle' class="hotelfil styled-checkbox">
                        <label for='electric' class=" styled-checkbox-1">E-Vehicle Charging</label>
                        <input id='family' type='checkbox' onclick='filters();' value='family rooms' class="hotelfil styled-checkbox"> <label for='family' class="styled-checkbox-1">Family Rooms</label>
                        <input id='freewifi' type='checkbox' onclick='filters();' value='wifi' class="hotelfil styled-checkbox"> <label for='freewifi' class="styled-checkbox-1">Free Wifi</label>
                        <input id='roomservice' type='checkbox' onclick='filters();' value='room service' class="hotelfil styled-checkbox"> <label for='roomservice' class="styled-checkbox-1">Room Service</label>
                      </span>


                    </li>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header filterCardHead" id="headingThree" data-toggle="collapse" data-target="#roomPreference" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0">
                    <span class="btn btn-link collapsed FilterTabLink">
                      Room Preference
                    </span>
                  </h5>
                </div>
                <div id="roomPreference" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">


                      <span>
                        <input id='ac' type='checkbox' onclick='filters();' value='Air Conditioning' class="roomfil styled-checkbox"> <label for='ac' class="styled-checkbox-1">Air Conditioning</label>
                        <input id='pillow' type='checkbox' onclick='filters();' value='Pillow Menu' class="hotelfil styled-checkbox"> <label for='pillow' class="styled-checkbox-1">Pillow Menu</label>
                        <input id='bed' type='checkbox' onclick='filters();' value='Bed Preference' class="roomfil styled-checkbox"> <label for='bed' class="styled-checkbox-1">Bed Preference</label>

                        <input id='balcony' onclick='filters();' value='balcony' type='checkbox' class="roomfil styled-checkbox">

                        <label for='balcony' class="styled-checkbox-1">Balcony</label>
                        <input id='nonsmoking' type='checkbox' onclick='filters();' value='Non Smoking' class="roomfil styled-checkbox">

                        <label for='nonsmoking' class="styled-checkbox-1">Non Smoking Rooms</label>
                        <input id='kitchen' type='checkbox' onclick='filters();' value='kitchen' class="roomfil styled-checkbox"> <label for='kitchen' class="styled-checkbox-1">Kitchen/ Kitchenette</label>
                        <input id='jacuzi' type='checkbox' onclick='filters();' value='jacuzi' class="roomfil styled-checkbox"> <label for='jacuzi' class="styled-checkbox-1">Private Jacuzi</label>
                        <input id='pool' type='checkbox' onclick='filters();' value='pool' class="roomfil styled-checkbox"> <label for='pool' class="styled-checkbox-1">Private Pool</label>
                      </span>



                    </li>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header filterCardHead" id="headingThree" data-toggle="collapse" data-target="#Accessibility" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0">
                    <span class="btn btn-link collapsed FilterTabLink">
                      Accessibility
                    </span>
                  </h5>
                </div>
                <div id="Accessibility" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">

                      <span>

                        <input id='wheelchair' type='checkbox' onclick='filters();' value='wheelchair' class="roomfil styled-checkbox"> <label for='wheelchair' class="styled-checkbox-1">Wheelchair Accessible</label>
                        <input id='grabrails' type='checkbox' onclick='filters();' value='grab rails' class="roomfil styled-checkbox"> <label for='grabrails' class="styled-checkbox-1">Toilet with Grab Rails</label>
                        <input id='higherleveltoilet' type='checkbox' onclick='filters();' value='Higher Level Toilet' class="roomfil styled-checkbox"> <label for='higherleveltoilet' class="styled-checkbox-1">Higher Level Toilet</label>
                        <input id='lowerbathroomsink' type='checkbox' onclick='filters();' value='Lower Bathroom Sink' class="roomfil styled-checkbox"> <label for='lowerbathroomsink' class="styled-checkbox-1">Lower Bathroom Sink</label>
                        <input id='emergencycord' type='checkbox' onclick='filters();' value='Emergency Cord' class="hotelfil styled-checkbox"> <label for='emergencycord' class="styled-checkbox-1">Emergency Cord</label>
                        <input id='braille' type='checkbox' onclick='filters();' value='Braille' class="hotelfil styled-checkbox"> <label for='braille' class="styled-checkbox-1">Visual Aid: Braille</label>


                        <input id='tactile' type='checkbox' onclick='filters();' value='Tactile' class="roomfil styled-checkbox">


                        <label for='tactile' class="styled-checkbox-1">Visual Aid: Tactile Signs</label>



                        <input id='auditory' type='checkbox' onclick='filters();' value='auditory guidance' class="hotelfil styled-checkbox"> <label for='auditory' class="styled-checkbox-1">Auditory Guidance</label>
                        <input id='Entire_unit_located_on_ground_floor' type='checkbox' onclick='filters();' value='located on ground floor' class="roomfil styled-checkbox"> <label for='Entire_unit_located_on_ground_floor' class="styled-checkbox-1">Unit located on ground floor</label>
                        <input id='Upper_floors_accessible_by_elevator' type='checkbox' onclick='filters();' value='accessible by elevator' class="roomfil styled-checkbox"> <label for='Upper_floors_accessible_by_elevator' class="styled-checkbox-1">Upper floor access by elevator</label>

                        <input id='Adapted_bath' type='checkbox' onclick='filters();' value='Adapted bath' class="roomfil styled-checkbox"> <label for='Adapted_bath' class="styled-checkbox-1">Adapted bath</label>
                        <input id='Roll_in_shower' type='checkbox' onclick='filters();' value='Roll-in shower' class="roomfil styled-checkbox"> <label for='Roll_in_shower' class="styled-checkbox-1">Roll-in shower</label>
                        <input id='Walk_in_shower' type='checkbox' onclick='filters();' value='Walk-in shower' class="roomfil styled-checkbox"> <label for='Walk_in_shower' class="styled-checkbox-1">Walk-in shower</label>
                        <input id='Raised_toilet' type='checkbox' onclick='filters();' value='Raised toilet' class="roomfil styled-checkbox"> <label for='Raised_toilet' class="styled-checkbox-1">Raised toilet</label>

                        <input id='Emergency_cord_in_bathroom' type='checkbox' onclick='filters();' value='Emergency cord in bathroom' class="roomfil styled-checkbox"> <label for='Emergency_cord_in_bathroom' class="styled-checkbox-1">Emergency cord in bathroom</label>
                        <input id='Shower_chair' type='checkbox' onclick='filters();' value='Shower chair' class="roomfil styled-checkbox"> <label for='Shower_chair' class="styled-checkbox-1">Shower chair</label>
                      </span>


                    </li>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header filterCardHead" id="headingThree" data-toggle="collapse" data-target="#SportandFitnessGym" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0">
                    <span class="btn btn-link collapsed FilterTabLink">
                      Sport and Fitness Gym
                    </span>
                  </h5>
                </div>
                <div id="SportandFitnessGym" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">

                      <span>
                        <input id='Olympicsizepool' type='checkbox' onclick='filters();' value='olympic size pool' class="hotelfil styled-checkbox"> <label for='Olympicsizepool' class="styled-checkbox-1">Olympic size pool</label>
                        <input id='Basketballcourt' type='checkbox' onclick='filters();' value='basketball' class="hotelfil styled-checkbox"> <label for='Basketballcourt' class="styled-checkbox-1">Basketball court</label>
                        <input id='Tennis' type='checkbox' onclick='filters();' value='tennis' class="hotelfil styled-checkbox"> <label for='Tennis' class="styled-checkbox-1">Tennis</label>
                        <input id='PaddleTennis' type='checkbox' onclick='filters();' value='paddle tennis' class="hotelfil styled-checkbox"> <label for='PaddleTennis' class="styled-checkbox-1">Paddle Tennis</label>
                        <input id='FootballGround' type='checkbox' onclick='filters();' value='football ground' class="hotelfil styled-checkbox"> <label for='FootballGround' class="styled-checkbox-1">Football Ground</label>
                      </span>


                    </li>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header filterCardHead" id="headingThree" data-toggle="collapse" data-target="#HealthandWellness" aria-expanded="false" aria-controls="collapseThree">
                  <h5 class="mb-0">
                    <span class="btn btn-link collapsed FilterTabLink">
                      Health and Wellness
                    </span>
                  </h5>
                </div>
                <div id="HealthandWellness" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                    <li class="my-2 pb-2 d-flex align-items-center justify-content-between">

                      <span>
                        <input id='Olympicsizepool' type='checkbox' onclick='filters();' value='olympic size pool' class="hotelfil styled-checkbox"> <label for='Olympicsizepool' class="styled-checkbox-1">Olympic size pool</label>
                        <input id='Basketballcourt' type='checkbox' onclick='filters();' value='basketball' class="hotelfil styled-checkbox"> <label for='Basketballcourt' class="styled-checkbox-1">Basketball court</label>
                        <input id='Tennis' type='checkbox' onclick='filters();' value='tennis' class="hotelfil styled-checkbox"> <label for='Tennis' class="styled-checkbox-1">Tennis</label>
                        <input id='PaddleTennis' type='checkbox' onclick='filters();' value='paddle tennis' class="hotelfil styled-checkbox"> <label for='PaddleTennis' class="styled-checkbox-1">Paddle Tennis</label>
                        <input id='FootballGround' type='checkbox' onclick='filters();' value='football ground' class="hotelfil styled-checkbox"> <label for='FootballGround' class="styled-checkbox-1">Football Ground</label>
                      </span>


                    </li>
                  </div>
                </div>
              </div>
              
              -->
            </div>


          </div>

          <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 d-flex flex-nowrap RoomSection">
            <section style='margin-top:-65px; position:relative;' class="searchlist">
              <div class='row'>
                <div>
                  <div class="container p-0">
                    <!--hotel item start-->
                    <?php
                    $index = 0;
                    $imageNames = ['event1.webp', 'event2.webp', 'event3.webp', 'event4.webp', 'event5.webp'];
                    
    


                    
                    
                    
                    
                    
                    if ($vanues->num_rows > 0) {


                      while ($van = $vanues->fetch_assoc()) {
                        $keys = array_rand($imageNames);
                        
                        
          
$sqlfp = "SELECT * FROM floorplanimages WHERE country='$country' && city='$city' && hotel='".$van['hotel']."' && venue='".$van['venue']."'";
$vanuesfp = $conn->query($sqlfp);



  if ($vanuesfp->num_rows > 0) {
      
      $floorplansexist='Yes';
      
  }
  else{
      $floorplansexist='No';
  }



                    
$sql2 = "SELECT * FROM venuedatabase WHERE country='$country' && city='$city' && name='".$van['hotel']."'";
$vanues2 = $conn->query($sql2);



  if ($vanues2->num_rows > 0) {


                      while ($van2 = $vanues2->fetch_assoc()) {
                          
                          $area=$van2['area'];
                          
                          
                      }
  }
  else{
                       
$sql2 = "SELECT * FROM hotelsdatabase WHERE country='$country' && city='$city' && name='".$van['hotel']."'";
$vanues2 = $conn->query($sql2);



  if ($vanues2->num_rows > 0) {


                      while ($van2 = $vanues2->fetch_assoc()) {
                          
                          $area=$van2['area'];
                         
                          
                      }
  }
      
  }



            $vanimages=array();          
$sqlimg = "SELECT * FROM meetingplannerimages WHERE country='$country' && city='$city' && hotel='".$van['hotel']."' && venue='".$van['venue']."' && (type='theater'||type='classroom'||type='cabaret'||type='boardroom'||type='ushape'||type='banquet'||type='cocktail'||type='ampitheatre')    ";
$vanuesimg = $conn->query($sqlimg);



  if ($vanuesimg->num_rows > 0) {


                      while ($vanimg = $vanuesimg->fetch_assoc()) {
                          
                          array_push($vanimages,$vanimg['image']);
                          
                      }
  }


                    ?>
                    

                        <!-- Old One-->
                        <div style='border-radius:25px; position:relative; display: none;' class="searchitem">

                         <!--
                            <div class="ribbon-featured">
                              <span>Featured</span>
                            </div>
                         -->
                         
                          <div class="item_details" style=" padding-top: 15px; padding-left:22px; padding-right:22px;">
                            <div class="venue_box_img" onclick="loadModalContent(<?php echo $van['id'];?>)">
                              <!-- <img src="img/placeholders/roomImage.png" alt="" class="img-fluid"> -->
                              <img src="pco/Venue Original Images/<?php echo $van['hotel']?>/<?php echo $van['venue']?>/<?php echo $vanimages[0]; ?>" alt="" class="img-fluid">
                              <span class=" viewEyeIcon"><i class="bi bi-eye "></i></span>

                            </div>
                          </div>

                          <div class='row d-flex venueDetailBox ' id="style-3">
                            <div class='row d-flex px-0' style="margin-bottom:10px; width:100%;  ">
                              <div class='col-lg-8 col-md-12 col-sm-8 order-1 order-md-0 order-1 order-0  p-0'>
                                <div class="row px-0">
                                  <div class="item_main_title px-0">
                                    <h2 style='font-weight:500; color:black; float:left;'><?= $van['venue'] ?>&nbsp;&nbsp;</h2>
                                  </div>
                                  <div class="reviews px-0">
                                    <ul class="rating">
                                        <?php 
                                        $rat=$van['venuerating'];
                                        for($a=0; $a<intval($rat); $a++)
                                        {
                                        ?>
                                      <li><i class="bi bi-star-fill"></i></li>
                                     <?php
                                        }
                                     ?>
                                      
                                    </ul>
                                    
                                  </div>
                                  <span class="item_address px-0"><i class="bi bi-geo-alt me-1"></i><?= $van['city'] ?>, <?= $van['country'] ?></span>
                                </div>
                              
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-12 order-0">
                               <!-- <span class="badge-success" data-toggle="tooltip" data-placement="top" title="Award Winning"><i class="bi bi-trophy"></i></span>
                                <span class="badge-danger " data-toggle="tooltip" data-placement="top" title="Top Meeting Hotel"><i class="bi bi-bar-chart"></i></span>
                                -->
                                <?php if(intval($rat)>=5)
                                {?>
                                <div class='row'>
                                    <div class='col-sm'>
                                <span class="badge-warning" style='float:right;' data-toggle="tooltip" data-placement="top" title="Top Rated"><i class="bi bi-star"></i></span>
                               </div>
                             
                             <div class='col-sm'>
                                 
                                 
                                 <form action='#' method='POST'>
                                     <input style='display:none;' name='venueid' value='<?php echo $van['id']; ?>'>
                                 
                                  <button type='submit' name='submitme' class='btn btn-danger'>Book</button>
                                 
                                  </form>
                              </div>
                              </div>
                                <?php
                                }
                                ?>
                                
                              </div>
                            </div>
 
                            <div class='col-md order-1 order-md-0 order-lg-0 p-0'>
                                  <div class="row">
                                       <div class="col-md px-0">
                                  <span class="opt1text">Chain :</span> <span class="opt2text"><?php echo $van['hotel'];?></span>
                                </div>
                                 </div>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Location :</span> <span class="opt2text"><?php echo $van['location'];?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Area :</span> <span class="opt2text"><?php echo $area;?></span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Dimension :</span> <span class="opt2text"><?php echo $van['dimension'];?></span>
                                </div>
                              </div>

                            </div>
                            
                            
                            
                     
                            
                            
                            
                          <!--  <div class='col-md order-1 order-md-0 order-lg-0 p-0'>
                              <div class="row ">
                                <div class="col-md px-0">
                                  <span class="opt1text">Meeting rooms :</span> <span class="opt2text">07</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Total Area :</span> <span class="opt2text">12,809 sqf</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Largest room :</span> <span class="opt2text">3,229 sqt</span>
                                </div>
                              </div>
                            </div>-->
                          
                           
                            <div class='col-md order-1 order-md-0 order-lg-0 p-0'>
                            
                            <?php if($van['theater']!=='0' ||$van['theater']!=='' ) 
                            {
                            ?>
                            <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Theater :</span> <span class="opt2text"><?php echo $van['theater'];?></span>
                                </div>
                              </div>
                              <?php
                            }
                            ?>
                              <?php if($van['classroom']!=0 ||$van['classroom']!='' ) 
                            {
                            ?>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Classroom :</span> <span class="opt2text"><?php echo $van['classroom'];?></span>
                                </div>
                              </div>
                                 <?php
                            }
                            ?>
                            
                              <?php if($van['cabaret']!=0 ||$van['cabaret']!='' ) 
                            {
                            ?>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Cabaret :</span> <span class="opt2text"><?php echo $van['cabaret'];?></span>
                                </div>
                              </div>
                                    <?php
                            }
                            ?>
                            
                              <?php if($van['boardroom']!=0 ||$van['boardroom']!='' ) 
                            {
                            ?>
                               <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Boardroom :</span> <span class="opt2text"><?php echo $van['boardroom'];?></span>
                                </div>
                              </div>
                                            <?php
                            }
                            ?>
                            
                            </div>
                            
                             <div class='col-md order-1 order-md-0 order-lg-0 p-0'>
                            
                                     
                            
                              <?php if($van['ampitheatre']!=0 || $van['ampitheatre']!="") 
                            {
                            ?>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Ampitheater :</span> <span class="opt2text"><?php echo $van['ampitheatre'];?></span>
                                </div>
                              </div>
                              
                                            <?php
                            }
                            ?>
                            
                            
                            
                              <?php if($van['ushape']!=0 ||$van['ushape']!='' ) 
                            {
                            ?>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">U Shape :</span> <span class="opt2text"><?php echo $van['ushape'];?></span>
                                </div>
                              </div>
                                                <?php
                            }
                            ?>
                            
                              <?php if($van['banquetdinner']!=0 ||$van['banquetdinner']!='' ) 
                            {
                            ?>
                              <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Banquet Dinner :</span> <span class="opt2text"><?php echo $van['banquetdinner'];?></span>
                                </div>
                              </div>
                              
                                                <?php
                            }
                            ?>
                            
                              <?php if($van['cocktailreception']!=0 ||$van['cocktailreception']!='' ) 
                            {
                            ?>
                               <div class="row">
                                <div class="col-md px-0">
                                  <span class="opt1text">Cocktail Reception :</span> <span class="opt2text"><?php echo $van['cocktailreception'];?></span>
                                </div>
                              </div>
                                                     <?php
                            }
                            ?>
                            </div>

                            <div class='row d-flex px-0' style="width:100%; font-size:10px;">
                           
                              <?php if($van['smoking']!=''){
                                  echo '<span class="badge">'.$van["smoking"].'</span>';
                              }
                              ?>
                              
                              
                               <?php if($van['outdoorindoor']=='Outdoor' || $van['outdoorindoor']=='Indoor'){
                                  echo '<span class="badge">'.$van["outdoorindoor"].' Venue</span>';
                              }
                              ?>
                              
                              
                                <?php if($floorplansexist=='Yes'){
                                  echo '<span class="badge">Floor Plan</span>';
                              }
                              ?>
                             
                             
                              <?php if($van['stage']=='Yes'){
                                  echo '<span class="badge">Stage</span>';
                              }
                              ?>
                               <?php if($van['carlaunch']=='Yes'){
                                  echo '<span class="badge">Car Launch</span>';
                              }
                              ?>
                              
                                <?php if($van['mixer']=='Yes'){
                                  echo '<span class="badge">Mixer</span>';
                              }
                              ?>
                              
                                <?php if($van['projector']=='Yes'){
                                  echo '<span class="badge">Projector</span>';
                              }
                              ?>
                              
                                    <?php if($van['dancefloor']=='Yes'){
                                  echo '<span class="badge">Dance Floor</span>';
                              }
                              ?>
                                    <?php if($van['hangingpoints']=='Yes'){
                                  echo '<span class="badge">Hanging Points</span>';
                              }
                              ?>
                              
                              
 <br/>
  <br/>
                              
                            </div>
                            
                            
                              
                          </div>
                          
                          
                          
                          
                        
                        </div>
                    <?php
                        $index++;
                      }
                    } else {
                      if ($_SESSION['hotel'] != '') {
                        echo 'No Venue Available for These Specifications';
                      }
                    }
                    if($index > 2){
                      ?>
                    <button class="theme_btnNew btn  bookNewBtnLoadMoreh" style="border-radius: 20px; padding: 7px 12px;" id="loadMoreh">Load More Venues <i class="bi bi-chevron-down"></i></button>
                    <button class="theme_btnNew btn  bookNewBtnLoadMoreh" style="border-radius: 20px; padding: 7px 12px; display:none;" id="loadMorehu">Show Less Venues <i class="bi bi-chevron-up"></i></button>
                      <?php
                    }
                    ?>

                  </div>

                  <!-- hotel details modal -->
                  <div class="modal fade detailsModal modal-dialog-scrollable" tabindex="-1" aria-labelledby="detailsModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="detailsModal"><?php //echo $ghotel;
                                                                    ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="item_details">
                            <div class="item_main_title">
                              <h2><?php echo $ghotel; ?></h2>

                              <!--    <a href=""><i class="bi bi-heart"></i></a>-->

                            </div>
                            <div class="reviews">
                              <ul class="rating">
                                <?php
                                for ($x = 0; $x < $gsendcategory; $x++) {

                                ?>
                                  <li><i class="bi bi-star-fill"></i></li>
                                <?php
                                }
                                ?>
                              </ul>
                              <span><?php echo $gsendcategory; ?> Star Hotel</span>
                            </div>
                            <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $gcity; ?>, <?php echo $gcountry; ?></span>

                            <div class="room_galary">


                              <?php
                              for ($x = 0; $x < count($images); $x++) {
                              ?>


                                <a href="pco/Hotel Images/<?php echo $ghotel; ?>/<?php echo $images[$x]; ?>" data-lightbox="room_gal_1">
                                  <img loading="lazy" src="pco/Hotel Images/<?php echo $ghotel; ?>/<?php echo $images[$x]; ?>" alt="">
                                </a>
                              <?php
                              }
                              ?>



                            </div>

                            <!--
                                                <div class="customer_review">
                                                        <span class="room_meta_title">Customer Reviews</span>
                                                        <ul class="c_reviewlist">
                                                            <li><i class="bi bi-heart-fill"></i></li>
                                                            <li><i class="bi bi-heart-fill"></i></li>
                                                            <li><i class="bi bi-heart-fill"></i></li>
                                                            <li><i class="bi bi-heart-fill"></i></li>
                                                            <li><i class="bi bi-heart"></i></li>
                                                        </ul>
                                                    </div>
                                                    -->



                            <div>
                              <h6>About Hotel:</h6>

                              <?php echo $des; ?>

                            </div>
                            <br /><br />



                            <div class='container'>
                              <div class='row'>


                                <h5 align=center>Facilities</h5><br /><br />

                                <?php
                                if ($generalf != '') {
                                ?>
                                  <div class='col-sm'>
                                    <label>General:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $generalf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>

                                        <li class="my-2"><?php echo $gf[$x]; ?></li>

                                      <?php

                                      }
                                      ?>
                                    </ul>
                                  </div>


                                <?php
                                }

                                if ($mainf != '') {
                                ?>
                                  <div class='col-sm'>
                                    <label>Main:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $mainf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>

                                        <li class="my-2"><?php echo $gf[$x]; ?></li>

                                      <?php
                                      }

                                      ?>


                                    </ul>
                                  </div>
                                <?php
                                }

                                if ($frontf != '') {
                                ?>
                                  <div class='col-sm'>
                                    <label>Front Desk:</label>
                                    <ul class="small text-black-50">
                                      <?php

                                      $gf = explode(",", $frontf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($familyf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Family:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $familyf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>


                                    </ul>
                                  </div>


                                <?php
                                }

                                if ($sportsf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Sports:</label>
                                    <ul class="small text-black-50">
                                      <?php

                                      $gf = explode(",", $sportsf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>


                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($cleaningf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Cleaning:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $cleaningf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>


                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($foodf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Food:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $foodf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>


                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($businessf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Business:</label>
                                    <ul class="small text-black-50">


                                      <?php

                                      $gf = explode(",", $businessf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($internetf != '') {
                                ?>



                                  <div class='col-sm'>
                                    <label>Internet:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $internetf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>

                                <?php
                                }

                                if ($parkingf != '') {
                                ?>

                                  <div class='col-sm'>
                                    <label>Parking:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $parkingf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>


                                <?php
                                }

                                if ($uniquef != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Unique:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $uniquef);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>


                                <?php
                                }

                                if ($safetyf != '') {
                                ?>


                                  <div class='col-sm'>
                                    <label>Safety:</label>
                                    <ul class="small text-black-50">

                                      <?php

                                      $gf = explode(",", $safetyf);

                                      for ($x = 0; $x < count($gf); $x++) {
                                      ?>


                                        <li class="my-2"><?php echo $gf[$x]; ?></li>
                                      <?php
                                      }

                                      ?>

                                    </ul>
                                  </div>

                                <?php
                                }
                                ?>



                              </div>
                            </div>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end of hotel details modal -->




                  <!--hotel item end-->

                  <div id="beforeModalOpenLoader"></div>

                  <div class="modal fade roomamsModal" tabindex="-1" aria-labelledby="vanueamsModal" id="vanueamsModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl " style="margin-top:auto; margin-bottom:auto;">
                      <div class="modal-content vanueamsModalContent" style="border-radius:25px; background:black;" id="VenueModalContent">

                      </div>
                    </div>
                  </div>


                  <!--SUGGESTIONS END-->


            </section>
          </div>
        </div>
      </div>



    </section>



    <?php include_once('footer.php'); ?>




    <!-- terms and condition modal -->
    <div class="modal fade alertModal" tabindex="-1" aria-labelledby="alertModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select Hotel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <h2>Please Select Hotel</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of terms and condition modal -->













    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->









<script>
      var country = document.getElementById("contry").value;
       
        $.ajax({

          type: 'POST',
          url: 'getcitiesnewevents.php',
          data: {
           
            'country': country
          },

          success: function(result) {


            $("#city2").html(result);

           

            }

          });
</script>

    <script>
      var ac = document.getElementsByClassName('applyBtn');

      for (let ia = 0; ia < ac.length; ia++) {
        ac[ia].classList.remove('btn-primary');

      }
    </script>













    <script>
      $('[data-toggle="tooltip"]').tooltip();

      $(document).ready(function() {
        $(".searchitem").slice(0, 2).show();
        $("#loadMoreh").on("click", function(e) {
          e.preventDefault();
          $(".searchitem:hidden").slice(0, 2).slideDown();
          if ($(".searchitem:hidden").length == 0) {
            $("#loadMoreh").css("display", 'none');
            $("#loadMorehu").css("display", 'block');
          }
        });

        $("#loadMorehu").on("click", function(e) {
          e.preventDefault();
          //$(".content2<?= $gals ?>").setAttribute("style",'');
          $(".searchitem").hide();
          $(".searchitem").slice(0, 2).show();
          $("#loadMoreh").css("display", 'block');
          $("#loadMorehu").css("display", 'none');
          window.scrollTo({
            top: 20,
            behavior: 'smooth'
          });

        });

      });
    </script>











    <script>
      function loadmerrm($this) {
        // this.preventDefault();
        var gals = $this.getAttribute('data-id');

        var cn = $(".content2" + gals + ":hidden");
        // for(var i = 0; i<cn.length; i++){
        //     cn[i].slideDown();
        // }


        // $(".content2" + gals + ":hidden").forEach(function(e){
        //     console.log(e);
        // });


        $(".content2" + gals + ":hidden").slice(0, cn.length).slideDown();

        if ($(".content2" + gals + ":hidden").length == 0) {
          $("#loadMore" + gals).css("display", 'none');
          $('#loadMoreu' + gals).css("display", 'block');
        }




      }

      function loadless($this) {

        var gals = $this.getAttribute('data-id');
        var cg = document.getElementsByClassName('content2' + gals);
        for (let i = 0; i < cg.length; i++) {
          cg[i].setAttribute('style', ' margin-bottom:10px; display:none !important;');
        }

        $(".content2" + gals).slice(0, 2).show();
        $("#loadMore" + gals).css("display", 'block');
        $('#loadMoreu' + gals).css("display", 'none');
      }
    </script>





    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->

    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>

  </div>
  <script>
    let slideIndex = 0;
    showSlides(slideIndex);
    let catIndex = 0;
    showCat(catIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function currentCat(n) {
      showCat(catIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("thumbnailBox");
      let captionText = document.getElementById("caption");
      let imagesCaptionsCount = document.getElementsByClassName('numbertext');


      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < imagesCaptionsCount.length; i++) {
        imagesCaptionsCount[i].style.display = 'none';
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("  activeImage", "");
      }
      slides[slideIndex - 1].style.display = "block";
      imagesCaptionsCount[slideIndex - 1].style.display = 'block';

      dots[slideIndex - 1].className += "  activeImage";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }

    function showCat(n) {
      let i;
      let catlist = document.getElementsByClassName("myCat");
      let actlist = document.getElementsByClassName("list");
      if (n > catlist.length) {
        catIndex = 1
      }
      if (n < 1) {
        catIndex = catlist.length
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function loadModalContent(id) {
      // const axios = require('axios');
      // Make a request for a user with a given ID
      $('.loading').show();

      axios({
          method: 'get',
          url: '/Ajax/venuemodaldata.php?ID='+id,
          responseType: 'stream'
        })
        .then(function(response) {
          // alert(response);
          $('#VenueModalContent').html(response.data);
          setTimeout(function() {
            $('.loading').hide();
            $('#vanueamsModal').modal('show');

          }, 1000);
          showSlides(0);

          // console.log(response);
        });
    }
  </script>
</body>

</html>