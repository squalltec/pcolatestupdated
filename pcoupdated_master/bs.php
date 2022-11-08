<?php
session_start();
include_once('header.php');


include 'db_connection.php';

$ho=$_SESSION['hotel'];

$co=$_SESSION['country'];

$ci=$_SESSION['city'];





 $sqlnewb = "SELECT * FROM hotelsdatabase WHERE name='$ho' && city='$ci' && country='$co'";

    $resultnewb = $conn->query($sqlnewb);

    if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {
            $restauranttype=$rownewb['restauranttype'];
    
        }
    }








$biggest = $_SESSION['biggest'];

$saaki= $_SESSION['hotel'];


$aallowed = $_SESSION['aallowed'];
$callowed = $_SESSION['callowed'];
$eballowed = $_SESSION['eballowed'];




$a0 = (int)$_SESSION['adults'];
$c0 = (int)$_SESSION['children'];

$a1 = (int)$_SESSION['adults1'];
$c1 = (int)$_SESSION['children1'];

$a2 = (int)$_SESSION['adults2'];
$c2 = (int)$_SESSION['children2'];

$a3 = (int)$_SESSION['adults3'];
$c3 = (int)$_SESSION['children3'];

$a4 = (int)$_SESSION['adults4'];
$c4 = (int)$_SESSION['children4'];

$a5 = (int)$_SESSION['adults5'];
$c5 = (int)$_SESSION['children5'];

$a6 = (int)$_SESSION['adults6'];
$c6 = (int)$_SESSION['children6'];

$a7 = (int)$_SESSION['adults7'];
$c7 = (int)$_SESSION['children7'];

$a8 = (int)$_SESSION['adults8'];
$c8 = (int)$_SESSION['children8'];

$a9 = (int)$_SESSION['adults9'];
$c9 = (int)$_SESSION['children9'];

$max0 = $a0 + $c0;
$max1 = $a1 + $c1;
$max2 = $a2 + $c2;
$max3 = $a3 + $c3;
$max4 = $a4 + $c4;
$max5 = $a5 + $c5;
$max6 = $a6 + $c6;
$max7 = $a7 + $c7;
$max8 = $a8 + $c8;
$max9 = $a9 + $c9;


$adz = array();
$chz = array();




if ($a0 != '0')
{
 array_push($adz, $a0);   
}

if($c0 != '0') {

    
    array_push($chz, $c0);
}



if ($a1 != '0')
{
 array_push($adz, $a1);   
}

if($c1 != '0') {

    
    array_push($chz, $c1);
}



if ($a2 != '0')
{
 array_push($adz, $a2);   
}

if($c2 != '0') {

    
    array_push($chz, $c2);
}



if ($a3 != '0')
{
 array_push($adz, $a3);   
}

if($c3 != '0') {

    
    array_push($chz, $c3);
}



if ($a4 != '0')
{
 array_push($adz, $a4);   
}

if($c4 != '0') {

    
    array_push($chz, $c4);
}



if ($a5 != '0')
{
 array_push($adz, $a5);   
}

if($c5 != '0') {

    
    array_push($chz, $c5);
}



if ($a6 != '0')
{
 array_push($adz, $a6);   
}

if($c6 != '0') {

    
    array_push($chz, $c6);
}



if ($a7 != '0')
{
 array_push($adz, $a7);   
}

if($c7 != '0') {

    
    array_push($chz, $c7);
}


if ($a8 != '0')
{
 array_push($adz, $a8);   
}

if($c8 != '0') {

    
    array_push($chz, $c8);
}


if ($a9 != '0')
{
 array_push($adz, $a9);   
}

if($c9 != '0') {

    
    array_push($chz, $c9);
}


//echo $totalguests;
$breakfastt = $_SESSION['breakfastincluded'];


$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$star = $_SESSION['sendcategory'];
$totalpaisay = $_SESSION['totalpaisay'];






$roomseachtype = $_SESSION['roomseachtype'];
$eachtype = $_SESSION['eachtype'];








$numberofadults = $_SESSION['numberofadults'];
$numberofchildren = $_SESSION['numberofchildren'];



//send these in sessions in the end
$allbreakfasts = array();


$allroomtypes = array();
$alladults = array();
$allchildren = array();

$allowedad = array();
$allowedch = array();
$allowedeb = array();


$roomsss = array();

$i = 0;
foreach ($roomseachtype as $rms) {
    if ($rms == '0') {
    } else {
        array_push($allroomtypes, $eachtype[$i]);
        array_push($roomsss, $roomseachtype[$i]);





        array_push($alladults, $numberofadults[$i]);
        array_push($allchildren, $numberofchildren[$i]);
        array_push($allowedad, $aallowed[$i]);
        array_push($allowedch, $callowed[$i]);
        array_push($allowedeb, $eballowed[$i]);


        for ($b = 0; $b < intval($roomseachtype[$i]); $b++) {

            array_push($allbreakfasts, $breakfastt[$i]);
        }
    }

    $i = $i + 1;
}








$_SESSION['allroomtypes'] = $allroomtypes;


$_SESSION['allbreakfasts'] = $allbreakfasts;


$totaldays = $_SESSION['totaldays'];
$sdate = $_SESSION['sdate'];
$edate = $_SESSION['edate'];
$sendroomnumbers = $_SESSION['sendroomnumbers'];

$totaladults = 0;
$totalchildren = 0;

for ($x = 0; $x < count($numberofadults); $x++) {
    if ($roomseachtype[$x] != '0') {
        $totaladults = $totaladults + intval($numberofadults[$x]);
    }
}
for ($x = 0; $x < count($numberofchildren); $x++) {
    if ($roomseachtype[$x] != '0') {
        $totalchildren = $totalchildren + intval($numberofchildren[$x]);
    }
}

$totalguests = $totaladults + $totalchildren;


$_SESSION['roomtypesall'] = $allroomtypes;



































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














$tax = '5%';




$ipcountry = $xml->geoplugin_countryName;


if ($ipcountry == 'United Arab Emirates') {
    //$tax='5%';
} else {
    // $tax='';
}


$uniquenumber = rand(10, 100000000);

$hotel = $_SESSION['hotel'];
$sendcategory = $_SESSION['sendcategory'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$sdate = $_SESSION['sdate'];
$edate = $_SESSION['edate'];

$_SESSION['bookingnumber'] = $uniquenumber;

$showpaisay = $_SESSION['showpaisay'];



$totaldays = $_SESSION['totaldays'];

$nationality = $_SESSION['nationality'];
$title = $_SESSION['title'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone =  $_SESSION['phone'];




$alladults = $_SESSION['alladults'];
$roomtypesall = $_SESSION['roomtypesall'];
$totalamountt = $_SESSION['totalamount'];
$allchildren = $_SESSION['allchildren'];



if ($tax == '5%') {


    $taxvalue = intval($totalamountt) / 100 * 5;

    $totalamount = intval($totalamountt) + intval($taxvalue);
} else {
    $totalamount = $totalamountt;
}





if (isset($_POST['submit'])) {



$_SESSION['roomtypesall']= $_POST['selectedtypesforinvoice'];


    $_SESSION['fromhotel'] = '0';

    $_SESSION['nationality'] = $_POST['nationality'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];

    $_SESSION['showpaisay'] = $_POST['newpaisay'];
    $_SESSION['totalamount'] = $_POST['totalnewpaisay'];


    $_SESSION['bfincluded'] = $_POST['bfincluded'];
    $_SESSION['lunincluded'] = $_POST['lunincluded'];
    $_SESSION['dinincluded'] = $_POST['dinincluded'];

    $_SESSION['bedincluded'] = $_POST['bedincluded'];
    $_SESSION['remarks'] = $_POST['remarks'];



    $_SESSION['alladults'] = $_POST['adultsperroom'];
    $_SESSION['allchildren'] = $_POST['childrenperroom'];



    echo "<script>location.replace('invoice.php');</script>";
}




if (isset($_POST['transfer'])) {

    $_SESSION['fromhotel'] = '1';
    $_SESSION['nationality'] = $_POST['nationality'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];


    $_SESSION['bfincluded'] = $_POST['bfincluded'];
    $_SESSION['lunincluded'] = $_POST['lunincluded'];
    $_SESSION['dinincluded'] = $_POST['dinincluded'];

    $_SESSION['bedincluded'] = $_POST['bedincluded'];

    $_SESSION['remarks'] = $_POST['remarks'];

    $_SESSION['showpaisay'] = $_POST['newpaisay'];
    $_SESSION['totalamount'] = $_POST['totalnewpaisay'];



    $_SESSION['alladults'] = $_POST['adultsperroom'];
    $_SESSION['allchildren'] = $_POST['childrenperroom'];



    echo "<script>location.replace('transfer.php');</script>";
}









if (isset($_POST['rentacar'])) {

    $_SESSION['fromhotel'] = '1';
    $_SESSION['nationality'] = $_POST['nationality'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];


    $_SESSION['bfincluded'] = $_POST['bfincluded'];
    $_SESSION['lunincluded'] = $_POST['lunincluded'];
    $_SESSION['dinincluded'] = $_POST['dinincluded'];

    $_SESSION['bedincluded'] = $_POST['bedincluded'];

    $_SESSION['remarks'] = $_POST['remarks'];

    $_SESSION['showpaisay'] = $_POST['newpaisay'];
    $_SESSION['totalamount'] = $_POST['totalnewpaisay'];



    $_SESSION['alladults'] = $_POST['adultsperroom'];
    $_SESSION['allchildren'] = $_POST['childrenperroom'];



    echo "<script>location.replace('rentacar.php');</script>";
}





























          
          $bfprice=0;
          $lunprice=0;
          $dinprice=0;
           $ebprice=0;
           
       $sqlnewb = "SELECT * FROM basiccharges WHERE country='$country' && location='$city' && hotel='$hotel'";

    $resultnewb = $conn->query($sqlnewb);

    if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {
            
             $bfasprice= $rownewb['breakfast'];
            $lunasprice= $rownewb['lunch'];
             $dinasprice= $rownewb['dinner'];
             
                $bfrn= $rownewb['rnbf'];
            $lunrn= $rownewb['rnln'];
             $dinrn= $rownewb['rnd'];
             
             $babycotasprice= $rownewb['babycot'];
             $childbedasprice= $rownewb['childbed'];
             
             
             $ebasprice= $rownewb['extrabed'];
        }
    }
           
           
           
           
           
           
           
           
     
?>


<style>
    .tabs-section {
        overflow: hidden;
        /* background-color: #333; */
        padding: 60px 0px;
    }

    .tabs-section .feature-img {
        max-height: 255px;
        overflow: hidden;
        border-radius: 10px;
        border: 3px solid #fff;
    }

    .tabs-section .nav-tabs {
        border: 0;
    }

    .tabs-section .nav-link {
        border: 0;
        padding: 11px 15px;
        transition: 0.3s;
        color: #ce3435;
        border-radius: 0;
        border-right: 2px solid #ce3435 !important;
        font-weight: 600;
        font-size: 15px;
    }

    .tabs-section .nav-link:hover {
        color: #ce3435;
    }

    .tabs-section .nav-link.active {
        color: white;
        background: #ce3435;
    }

    .tabs-section .nav-link:hover {
        border-right: 4px solid #ce3435;
    }

    .tabs-section .tab-pane.active {
        -webkit-animation: fadeIn 0.5s ease-out;
        animation: fadeIn 0.5s ease-out;
    }

    .tabs-section .details h3 {
        font-size: 26px;
        color: #ce3435;
    }

    .tabs-section .details p {
        color: #aaaaaa;
    }

    /* 
    .panel {
        border-bottom: 1px solid #ce3435;
        border-left: 1px solid #ce3435;
        border-right: 1px solid #ce3435;
        margin-bottom: 5px;
    } */

    .panel-heading {
        /* background-color: #ce3435; */
        background-color: #fff;
        color: #ce3435;
        border: 1px solid #ce3435 !important;
        margin-bottom: 5px;
        padding: 5px 15px;
    }

    .panel-heading .panel-title a {
        /* color: white; */
        color: #ce3435;
        font-size: 15px;

    }

    .panel-heading {
        padding: 0;
        border: 0;
    }

    .panel-title {
        margin-bottom: 0px;
    }

    .panel-title>a,
    .panel-title>a:active {
        display: block;
        padding: 15px;
        /* color: #555; */
        color: #ce3435;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        word-spacing: 3px;
        text-decoration: none;
    }

    .roomChevronIcon {
        float: right;
    }

    .panel-heading .roomChevronIcon:before {
        /* font-family: 'Glyphicons Halflings';
        content: "\F112"; */
        /* float: right; */
        transition: all 0.5s;
    }

    .panel-heading.active .roomChevronIcon:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .panel-heading:active{
        background-color: #ce3435;
    }

    .panel-body {
        color: black;
        padding: 10px;
    }

    .rating {
        color: #dc3545;
        font-size: 12px;
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
        margin-top: 1px;
        display: inline-block;
        vertical-align: text-top;
        width: 15px;
        height: 15px;
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

    .form-check {
        padding-left: 0px;
    }

    .badge-primary {
        color: #fff !important;
        background-color: #ce3435 !important;
    }

    .badge-pill {
        padding-right: 0.6em !important;
        padding-left: 0.6em !important;
        border-radius: 10rem !important;
    }

    .badge {
        display: inline-block !important;
        padding: 0.25em 0.4em !important;
        font-size: 75% !important;
        font-weight: 700 !important;
        line-height: 1 !important;
        text-align: center !important;
        white-space: nowrap !important;
        vertical-align: baseline !important;
        border-radius: 0.25rem !important;
    }

    .gTotal_foot {
        /* border: 1px solid #0000004D; */
        background: #ce3435;
        color: white;
        padding: 11px 15px;
        ;
    }

    .d_block {
        font-size: 10px;
    }

    .default_color {
        color: #000;
    }
    .hotelSummeryTop{
        border: 1px solid #ce3435;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .text-bold{
        font-weight: bold;
    }
    .all-text-black{
        color:black;
    }
    .theme-color{
        color:#ce3435;
    }
    .form-control{
        border: 1px solid #ce3435;

    }
    .panel-heading:active a{
        background-color: #ce3435;
        color: white;
    }
    .panel-heading:hover{
        background-color: #ce3435;
    }
    .panel-heading:hover a{
        color: white;
    }
</style>
<section class="tabs-section text-white">

    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-lg-3">
                <hr style="height:3px; color:#DC3545; margin-top: 0px;">
                <div class="col-md-12">
                    <ul class="nav nav-tabs flex-column mb-3">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#HotelsBooking"><i class="bi bi-building"></i> Hotel Booking</a>
                        </li>
                      
                      <!--
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Transfers">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
                                    <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
                                </svg>
                                Transfers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#RentACar">
                                <i class="bi bi-car"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                                    <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0ZM7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1c.213 0 .458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7V3Z" />
                                </svg>

                                Rent A Car
                            </a>
                        </li>
                        
                        -->
                        
                        
                    </ul>
                </div>
                <hr style="height:3px; color:#DC3545;">
                <div class="col-md-12">
                    <div class="row" style="background-color: #ce3435; color:white; padding:12px;" data-toggle="collapse" data-target="#BookingTotalPriceBox">
                        Total Booking Price
                    </div>
                    <div id="BookingTotalPriceBox" class="collapse out">

                        <!---Booking Price Loop Content Start -->


 <?php
                                        $adx=0;
                                        $ad=0;
                                        foreach ($roomtypesall as $val) {
                                        for($p=1; $p<=$roomsss[$adx]; $p++)
 
                                                        {
                                                            
                                                            
                                                            ?>
                        <div>
                            <div class="row" style="color:black; padding-top:10px; padding-left:0px; padding-right:0px;">
                                <div class="col-lg-8 d-flex justify-content-left">
              
                                    <p>Room #<?php echo $ad + 1; ?> (<?php echo $val; ?>)</p>
                                   
                                   
                                   
                                 
                                </div>
                                <div class="col-lg-4 d-flex justify-content-right">
                                    <p style="font-weight: bold !important;">AED <nonsense id='gp<?php echo $ad; ?>'></nonsense></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title ">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#PriceBreakdown<?php echo $ad;?>">
                                                Price Break Down
                                                <i class="bi bi-chevron-down roomChevronIcon"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="PriceBreakdown<?php echo $ad;?>" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-group">
                                                
<?php
                                                                    $avba = 1;

                                                                    $countme = 1;
                                                                    for ($iq = 0; $iq < $totaldays; $iq++) {
?>

                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    Day <?php echo $avba;?>
                                                    <span class="singleprices<?php echo $ad;?> badge badge-primary badge-pill">AED </span>
                                                </li>
                                                <?php
                                                 $avba = $avba + 1;
                                                                    }
                                                                    ?>
                                                                    
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!---Booking Price Loop Content End-->

 <?php
                                                            
                                                            
                                                            
                                                           $ad=$ad+1; 
                                                        }
                                                        echo '<br/>';
                                                        $adx=$adx+1;
                                        }
                                                            ?>

                    </div>
                    <hr style="height:3px; color:#DC3545;">

                    <div class="row" style="color: black;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>AED <nonsense id='totaleold'></nonsense></p>
                            
                            <textarea style='display:none;' id='totale'></textarea>
                            
                        </div>
                    </div>
                    <div class="row" style="color: rgba(0, 0, 0, 0.75); font-size:13px;">
                        <div class="col-lg-8 d-flex justify-content-left">
                            <p>VAT</p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-right">
                            <p>(<nonsense id='vatc'></nonsense>) 5%</p>
                        </div>
                    </div>
                    <div class="gTotal_foot">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <p class="mb-0">Grand Total</p>
                          
                            <span>AED <nonsense id="gt"></nonsense></span>
                        </div>
                    </div>


                </div>



            </div>
            
            <div class="col-sm-7 col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane active show" id="HotelsBooking">
                        <div class="row">
                            <div class="col-md-12 mb-2 hotelSummeryTop">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 style="color:black;"><?php echo $hotel;?></h5>
                                        <p class="mb-0 pb-1" style="font-size: 12px;color: rgba(0,0,0,.5);">
                                            <span><i class="bi bi-geo-alt"></i></span>
                                            <span><?php echo $city;?>, <?php echo $country;?></span>
                                        </p>
                                        <ul class="rating list-unstyled mx-0 mb-4 d-flex">
                                            <?php
                                            for($i=0; $i<intval($_SESSION['sendcategory']); $i++)
                                            {
                                            ?>
                                            <li class="me-1"><i class="bi bi-star-fill"></i></li>
                                           <?php
                                            }
                                            ?>

                                            <li class="me-2"> Star Hotel</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 all-text-black" style="border-left:1px solid #dc3545; background: white; padding-top: 20px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-start">Nights:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"> <?php echo $totaldays; ?></div>
                                                    <input style='display:none;' id='gettotaldays' value='<?php echo $totaldays; ?>'>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                  
                                                  <!-- write anything-->
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">    
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-start">Check In:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"> <?php 
                                                    
                                                    $sadate = new DateTime($sdate);
                                                    echo $sadate->format('d-m-Y');
                                                    
                                                    ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">Check Out:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"> <?php   $eadate = new DateTime($edate);
                                                    echo $eadate->format('d-m-Y'); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0" >
                                <form action='#' method='POST'>
                                <div class="panel-group" id="accordion">
                                    
                                      <input style='display:none;' id='sdate' value='<?php echo $sdate; ?>'>
        <input style='display:none;' id='edate' value='<?php echo $edate; ?>'>
        <input style='display:none;' id='biggest' value='<?php echo $biggest; ?>'>

                                    
<?php
     $n = 0;
                   
                                        $pn=0;
                                        
                                        $adx=0;
                                        $ad=0;
                                        $kholo=1;
                                        echo json_encode($roomsss);
                                        foreach ($roomtypesall as $val) {
                                            
                                        for($p=1; $p<=$roomsss[$adx]; $p++)

                                                        {  
                                                           
                                                            ?>
                                    
                                    
           <!-- hidden fields-->
           
           
                                                                    <input class='aallowed' style='display:none;' value='<?php 
                                                                    if(count($_SESSION['aallowed'])==0)
{
       foreach($_SESSION['aallowednew'] as $ar)
    {
        
       echo $ar[$_SESSION['hotel'].$room];
       
    }                                                      
}
else{
    echo $allowedad[$pn];
    
   
            
}
                                                                    
                                                                    ?>'>
                                                                    <input class='callowed' style='display:none;' value='<?php 
                                                                    
                                                                      if(count($_SESSION['callowed'])==0)
{
       foreach($_SESSION['callowednew'] as $ar)
    {
        
       echo $ar[$_SESSION['hotel'].$room];
    }                                                      
}
else{
   echo $allowedch[$pn];
   
            
}
                                                                    
                                                                    
                                                                     ?>'>
                                                                    <input class='eballowed' style='display:none;' value='<?php 
                                                                    
                                                                      if(count($_SESSION['eballowed'])==0)
{
    
       foreach($_SESSION['eballowednew'] as $ar)
    {
       
      
       echo $ar[$_SESSION['hotel'].$room];
        
    }                                            
    
}
else{
  echo $allowedeb[$pn];  
            
}
                                                                    
                                                                    
    ?>'>
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
       
                                                                       
                                                                       
                                                                  
                                                                      
                                                                      
                                                                      
                                                                   





                                                              



                                                                   
                                                                        
                                                               
           <!--hidden fields end-->
                                    
                                    
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title ">
                                              <?php if($kholo==1){
                                                  ?>
                                                  
                                                <a data-toggle="collapse" id='kholome' data-parent="#accordion" class='' href="#roomColl<?php echo $kholo;?>">
                                                    Room <?php echo $kholo.' ';?>
                                                     <?php echo '<nonsense style="color:black !important;">('.$val.')</nonsense>';?>
                                                    <i class="bi bi-chevron-down roomChevronIcon"></i>
                                                </a>
                                                <?php
                                              }
                                        
                                              else
                                              {
                                                  ?>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#roomColl<?php echo $kholo;?>">
                                                    Room <?php echo $kholo.' ';?>
                                                     <?php echo '<nonsense style="color:black !important;">('.$val.')</nonsense>';?>
                                                    <i class="bi bi-chevron-down roomChevronIcon"></i>
                                                </a>
                                                <?php
                                              }
                                              ?>
  <input style='display:none;' name='selectedtypesforinvoice[]' value='<?php echo $val; ?>'>

                                            </h4>
                                        </div>
                                        <div id="roomColl<?php echo $kholo;?>" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        
                                                        
                                                        
                             <!--hidden Fields-->
                             
<input style='display:none;' id='rtp<?php echo $n; ?>' name='rtp[]' class='rtp' value='<?php echo $allroomtypes[$pn]; ?>'>
<input style='display:none;' id='prici<?php echo $n; ?>' name='prici[]' class='prici' value=''>

                             <!-- hidden fields-->
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-lg-6 col-md-4 col-sm-12" style="padding: 0px;">
                                                          
                                                          
                                                          
        <input data-getid='<?php echo $n; ?>' data-newid='adulta<?php echo $n; ?>' data-actualid='ad' data-prev-value="0" id='ad<?php echo $n; ?>' onchange='checkadultoccupancy(this)' min='0' type='number' class='spinner adult form-control' name='adultsperroom[]' value='<?php if ($adz[$n] == '') { echo '0';} else { echo $adz[$n]; }?>'>
                                               </div>
                                                    
                                                        <div class="col-lg-6 col-md-4 col-sm-12">
                                                            
<input data-newid='childrena<?php echo $n; ?>' data-getid='<?php echo $n; ?>' data-actualid='ch' data-prev-value="0" id='ch<?php echo $n; ?>' min='0' onchange='checkadultoccupancy(this)' type='number' class='spinner children form-control' name='childrenperroom[]' value='<?php if ($chz[$n] == '') { echo '0'; } else { echo $chz[$n]; } ?>'>

</div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" name='title[]' value='<?php echo $title[$n]; ?>' placeholder="Title" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name='fname[]' value="<?php echo $fname[$n]; ?>" placeholder="First Name" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name='lname[]' value="<?php echo $lname[$n]; ?>" placeholder="Last Name" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" name='phone[]' value="<?php echo $phone[$n]; ?>" placeholder="Phone" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name='email[]' value="<?php echo $email[$n]; ?>" placeholder="Email" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" name='nationality[]' value="<?php echo $nationality[$n]; ?>" placeholder="Nationality" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div style='position:relative;' class="col-md-4">
                                                        
                                                       
                                                        
                                                        <h5>Meals</h5> 
                                                            <div class="form-check form-check-inline">
                                                                
                                                                
                                                                
                                                               
                                                                
                                                         <?php
                                                                            if ($_SESSION['allbreakfasts'][$n] == 'included') {
                                                                            ?>
                                                                            
                                                                            
                                                                            
                                                     
        <input style='display:none;' id='barfibf<?php echo $n; ?>' value='included'>
 
 
<input id='fbi<?php echo $n; ?>' class="form-check-inpu styled-checkbox" onclick="return false;" checked type='checkbox' value='included' name='bfincluded[]'>

<label class="form-check-label styled-checkbox-1" for='fbi<?php echo $n; ?>'><?php echo $restauranttype;?> Breakfast&nbsp;<span style="float:right;" class="badge badge-primary badge-pill"><?php echo 'AED '.$bfasprice;?></span>

   <?php
          if($bfrn!=$lunrn && $bfrn!=$dinrn)
                                                                {
                                                                ?>
<br/>
<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($bfrn==''){echo'<br/>';}echo $bfrn;?></small>
<?php
}
?>
</label>
         
                                                                            <?php

                                                                            } else {
                                                                            ?>

                                                                               
                                                                                <input style='display:none;' id='barfibf<?php echo $n; ?>' value=''>
                                                                                
     <input class="form-check-inpu styled-checkbox" id='fbi<?php echo $n; ?>' type='checkbox' data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='breakfast' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' value='included' name='bfincluded[]'>
     
      <label class="form-check-label styled-checkbox-1" for='fbi<?php echo $n; ?>'><?php echo $restauranttype;?> Breakfast?&nbsp;<span class="badge badge-primary badge-pill"><?php echo 'AED '.$bfasprice;?></span>
      
          <?php
          if($bfrn!=$lunrn && $bfrn!=$dinrn)
                                                                {
                                                                ?>
<br/>
<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($bfrn==''){echo'<br/>';}echo $bfrn;?></small>
<?php
}
?>
      </label>
                                                                            <?php
                                                                            }
                                                                            ?>                       
                                                                
                                                                
                                                                
                                                            </div>
                                                           
                                                           
                                <div class="form-check form-check-inline">
                
    <input data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='lunch' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' id='lun<?php echo $n; ?>' class="form-check-inpu styled-checkbox" type="checkbox"  value='included' name='lunincluded[]'>
    
    
    
                       
        <label class="form-check-label styled-checkbox-1" for='lun<?php echo $n; ?>'><?php echo $restauranttype;?> Lunch? <span class="badge badge-primary badge-pill"><?php echo 'AED '.$lunasprice;?></span>
        <?php
          if($bfrn!=$lunrn && $bfrn!=$dinrn)
                                                                {
                                                                ?>
<br/>
<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($lunrn==''){echo'<br/>';}echo $lunrn;?></small>
<?php
}
?>
        </label>
                                                            </div>                            
                                                           
                                                           
                                                           
                                                     
                                                           
                               <div class="form-check form-check-inline">
       <input data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='dinner' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' id='din<?php echo $n; ?>' class="form-check-input styled-checkbox" type="checkbox"  value='included' name='dinincluded[]'>
                                                         
                                                                <label class="form-check-label styled-checkbox-1" for='din<?php echo $n; ?>'><?php echo $restauranttype;?> Dinner? <span class="badge badge-primary badge-pill"><?php echo 'AED '.$dinasprice;?></span>
                                                                <?php 
                                                                if($bfrn!=$lunrn && $bfrn!=$dinrn)
                                                                {
                                                                ?>
<br/>
<small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($dinrn==''){echo'<br/>';}echo $dinrn;?></small>
<?php
}
?>
</label>
                                                            </div>
                                                                                                       
                                                           
                                                         
                                                                     
                                                            
                           
         <?php            
             if($bfrn==$lunrn && $bfrn==$dinrn)    
             {
             ?>
           <small> Restaurant: <?php echo $bfrn;?>      </small>                                          
                                                            
                 <?php
             }
             ?>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                        </div>
                                                       
                                                       
                                                       
                                                       
                                                        <div class="col-md-4">
                                                       <h5>Supplements</h5>   
                                                          
                                     
                     <div class="form-check form-check-inline">
                                                         
                                                         
   
                    <input data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='bed' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' id='bed<?php echo $n; ?>' class="form-check-input styled-checkbox" type="checkbox"  value='included' name='bedincluded[]'>
                              
                                        <label class="form-check-label styled-checkbox-1" for='bed<?php echo $n; ?>'>Extra Bed? <span class="badge badge-primary badge-pill"><?php echo 'AED '.$ebasprice;?></span></label>
                                                            </div>                 
                                     
                                                 
                                       
    <div class="form-check form-check-inline">
                                                         
                    <input data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='childbed' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' id='childbed<?php echo $n; ?>' class="form-check-input styled-checkbox" type="checkbox"  value='included' name='childbedincluded[]'>
                              
                                        <label class="form-check-label styled-checkbox-1" for='childbed<?php echo $n; ?>'>Child Bed? <span class="badge badge-primary badge-pill"><?php echo 'AED '.$childbedasprice;?></span></label>
                                                         
                                            </div>
                                            
                                                <div class="form-check form-check-inline">
                                                         
                                                         
   
                    <input data-adults='<?php echo $alladults[$n]; ?>' data-children='<?php echo $allchildren[$n]; ?>' data-id='<?php echo $n; ?>' data-meal='babycot' data-added='0' data-room='<?php echo $room; ?>' onclick='addprice(this)' id='babycot<?php echo $n; ?>' class="form-check-input styled-checkbox" type="checkbox"  value='included' name='babycotincluded[]'>
                              
                                        <label class="form-check-label styled-checkbox-1" for='babycot<?php echo $n; ?>'>BabyCot? <span class="badge badge-primary badge-pill"><?php echo 'AED '.$babycotasprice;?></span></label>
                                                            </div>   

                                            
                                            
                                            
                                                       
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
         <div style=" margin: auto; " class="col-md-4">
                       
                                                      
<h3 align='center'>   <span style='min-height:100px;' class="badge badge-primary badge-pill">AED <p id='roompriceold<?php echo $n; ?>'></p></span></h3>  
                                                         
                                                           <textarea style='display:none;' id='roomprice<?php echo $n; ?>'></textarea>
                                                         
                                                         
                                                          
                                                            
                                                        </div>                                               
                                                        
                                                        
                                                        
                                                        
                                                        
                   <input style='display:none;' name='newpaisay[]' id='newpaisay<?php echo $n; ?>' value=''>                                     
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    </div>
 <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <textarea rows='5' name='remarks[]' class='remar form-control' placeholder='Write Remarks/ Special Requests' style=" border: 1px solid #ccc !important;border-radius: 10px !important;box-sizing: border-box !important;"></textarea>
                                                          
                                              <?php
                                              if($n==0)
                                              {?>
                                                     <nonsense style='float:right;'>      
                                <input onclick='applytoallremarks(this)' style="accent-color: #dc3545;" id='applyall' type='checkbox'>
                                    <label style='color:black;' for='applyall'>Apply for all rooms</label> </nonsense>
                                                           <br/>
                                           <?php   }
                                                       ?>    
                                                           
                                                            </div>
                                                            
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                   
                                   
                               <?php
                               $kholo=$kholo+1;
                               
                               
                               $n=$n+1;
                               
                               
                               
                                                        }
                                                        $pn=$pn+1;
                                                        $adx=$adx+1;
                                        }
                                        ?>
                               
                               
                               
                               
                               
     
<span style='display:none;' >AED <nonsense id='totalee'></nonsense></span>




 <input class='showpaisay' style='display:none;' name='showpaisay[]' id='showpaisay'>

                                        <input name='ttl' style='display:none;' id='ttl2'>

                                        <nonsense id='ttl'><?php echo $totalpaisay; ?></nonsense>                          
                               
                               
                               
                               
                               
                               
                               
                               
                               
                                </div>
                                  <button id='btnyes' style='display:none;' type='submit' name='submit' style='margin-right:20px; margin-bottom:20px;' class='whatsappp btn theme_btn btn-secondary active'>Complete My Booking </button>
                <input style='display:none;' type='submit' name='transfer' class="btn theme_btn active btn-primary" value='Continue' id='btnno'>
                <input style='display:none;' type='submit' name='rentacar' class="btn theme_btn active btn-primary" value='Continue' id='btnno2'>
            
                            </div>
                        </div>
                    </div>
                      <input style='display:none;' name='totalnewpaisay' value='' id='totalnewpaisay'>
                                
                                </form>
            <br/>
             <br/>
              <br/>
            <button onclick='navigate()' type='submit' name='submit' style='float:right !important;margin-right:20px; margin-bottom:20px;' class=' btn theme_btn btn-secondary active' >Complete My Booking </button>
                               
                               
                               
                               
                              
                    
                    <!--
                    <div class="tab-pane" id="Transfers">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                Transfers
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="RentACar">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                Rent A Car
                            </div>
                        </div>
                    </div>
                    -->
                    
                    
                    
                    
                    
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
    function applytoallremarks($this)
    {
      if($this.checked)
        {
           var remar=document.getElementsByClassName('remar');
           
           for(let m=0; m<remar.length; m++)
           {
             rem=remar[0].value;
               remar[m].value=rem;
           }
           
        }
        else{
             var remar=document.getElementsByClassName('remar');
           
           for(let m=0; m<remar.length; m++)
           {
               if(m==0)
               {
                   
               }
               else{
               remar[m].value='';
               }
           }
        }  
    }
</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <input name='minuspluser' style='display:none;' id='minuspluser'>








    <script>
    
   
    
        function callmeformeals(abc) {



            plusminer(abc);

            //aljsdasjldjkashdkashkdjhkajsd













        }



        function plusminer(abc) {


            var minuspluser = document.getElementById('minuspluser').value;


            if (minuspluser == 'plus') {


                bf(abc);



            } else if (minuspluser == 'minus') {


                //MINUSSSSSSS


                bf(abc);




                //MINUSSSSSSS


            }


        }


        function bf(abc) {

            var alu = document.getElementById('barfibf' + abc).value;


            if (alu == 'included') {
                lun(abc);
            } else {
                var checkBox3 = document.getElementById('fbi' + abc);
                if (checkBox3.checked == true) {

                    var meal = 'breakfast';
                    var aid = abc;

                    var adults = document.getElementById('ad' + aid).value;
                    var children = document.getElementById('ch' + aid).value;



                    var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                      var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                    var gp = document.getElementById('gp' + aid).innerHTML;
                    var gt = document.getElementById('gt').innerHTML;

                    var totale = document.getElementById('totale').innerHTML;
                    var totaleold = document.getElementById('totaleold').innerHTML;
                    var totalee = document.getElementById('totalee').innerHTML;


                    $.ajax({

                        type: 'POST',
                        url: 'getmeals.php',
                        data: {
                            'meal': meal,
                            'adults': adults,
                            'children': children
                        },

                        success: function(result) {

                            var pr = parseInt(roomprice) + parseInt(result);


                            document.getElementById('newpaisay' + aid).value = pr;


                            var singleprices = document.getElementsByClassName("singleprices" + aid);
                            var totaldays = document.getElementById('gettotaldays').value;
                            for (let o = 0; o < singleprices.length; o++) {
                                singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                            }













                            document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                            document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                            document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                            var prc = parseInt(totale) + parseInt(result);

                            document.getElementById('totalnewpaisay').value = prc;



                            var va = prc / 100 * 5;
                            document.getElementById('vatc').innerHTML = parseInt(va);


                            document.getElementById('gt').innerHTML = prc + parseInt(va);







                            document.getElementById('roomprice' + aid).innerHTML = pr;
                            document.getElementById('roompriceold' + aid).innerHTML = pr;
                            document.getElementById('gp' + aid).innerHTML = pr;






                        },
                        complete: function() {


                            var totaq = 0;
                            const adq = document.getElementsByClassName("adult");

                            for (let b = 0; b < adq.length; b++) {
                                totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                            }

                            document.getElementById('totale').innerHTML = totaq;
                              document.getElementById('totaleold').innerHTML = totaq;
                            document.getElementById('totalee').innerHTML = totaq;
                            document.getElementById('totalnewpaisay').value = totaq;
                            document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);
                            document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;

                            lun(abc);
                        }

                    });




                } else {
                    lun(abc);
                }
            }

        }

        function lun(abc) {


            var checkBox2 = document.getElementById('lun' + abc);
            if (checkBox2.checked == true) {

                var meal = 'lunch';
                var aid = abc;

                var adults = document.getElementById('ad' + aid).value;
                var children = document.getElementById('ch' + aid).value;



                var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                 var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                var gp = document.getElementById('gp' + aid).innerHTML;
                var gt = document.getElementById('gt').innerHTML;

                var totale = document.getElementById('totale').innerHTML;
                 var totaleold = document.getElementById('totaleold').innerHTML;
                var totalee = document.getElementById('totalee').innerHTML;


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {

                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                        document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;






                    },
                    complete: function() {


                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                         document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);
                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;

                        din(abc);
                    }

                });




            } else {
                din(abc);
            }

        }

        function din(abc) {

            var checkBox = document.getElementById('din' + abc);
            if (checkBox.checked == true) {

                var meal = 'dinner';
                var aid = abc;

                var adults = document.getElementById('ad' + aid).value;
                var children = document.getElementById('ch' + aid).value;



                var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                var gp = document.getElementById('gp' + aid).innerHTML;
                var gt = document.getElementById('gt').innerHTML;

                var totale = document.getElementById('totale').innerHTML;
                 var totaleold = document.getElementById('totaleold').innerHTML;
                var totalee = document.getElementById('totalee').innerHTML;


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {



                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                         document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);

                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                        document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;







                    },
                    complete: function() {


                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);
                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;
                        bed(abc);

                    }

                });




            } else {
                bed(abc);
            }


        }

        function bed(abc) {

            var checkBox = document.getElementById('bed' + abc);
            if (checkBox.checked == true) {

                var meal = 'bed';
                var aid = abc;

                var adults = document.getElementById('ad' + aid).value;
                var children = document.getElementById('ch' + aid).value;



                var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                  var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                var gp = document.getElementById('gp' + aid).innerHTML;
                var gt = document.getElementById('gt').innerHTML;

                var totale = document.getElementById('totale').innerHTML;
                 var totaleold = document.getElementById('totaleold').innerHTML;
                var totalee = document.getElementById('totalee').innerHTML;


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {

                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                         document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;






                    },
                    complete: function() {


                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);

                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;


                         childbed(abc);


                    }

                });




            }
            else{
                 childbed(abc);
            }

        }













//childbed




 function childbed(abc) {

            var checkBox = document.getElementById('bed' + abc);
            if (checkBox.checked == true) {

                var meal = 'childbed';
                var aid = abc;

                var adults = document.getElementById('ad' + aid).value;
                var children = document.getElementById('ch' + aid).value;



                var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                 var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                var gp = document.getElementById('gp' + aid).innerHTML;
                var gt = document.getElementById('gt').innerHTML;

                var totale = document.getElementById('totale').innerHTML;
                var totaleold = document.getElementById('totaleold').innerHTML;
                var totalee = document.getElementById('totalee').innerHTML;


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {

                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                        document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;






                    },
                    complete: function() {


                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                         document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);

                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;


                         babycot(abc);


                    }

                });




            }
            else{
                 babycot(abc);
            }

        }





//childbedend



//babycott

 function babycot(abc) {

            var checkBox = document.getElementById('babycot' + abc);
            if (checkBox.checked == true) {

                var meal = 'babycot';
                var aid = abc;

                var adults = document.getElementById('ad' + aid).value;
                var children = document.getElementById('ch' + aid).value;



                var roomprice = document.getElementById('roomprice' + aid).innerHTML;
                  var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
                var gp = document.getElementById('gp' + aid).innerHTML;
                var gt = document.getElementById('gt').innerHTML;

                var totale = document.getElementById('totale').innerHTML;
                var totale = document.getElementById('totaleold').innerHTML;
                var totalee = document.getElementById('totalee').innerHTML;


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {




                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                         document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                         document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;






                    },
                    complete: function() {


                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);

                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;


                       


                    }

                });




            }
         

        }


//babycott end













        function addprice($this) {





            //addprice details    












            var meal = $this.getAttribute('data-meal');
            var aid = $this.getAttribute('data-id');



            var adults = document.getElementById('ad' + aid).value;
            var children = document.getElementById('ch' + aid).value;



            var roomprice = document.getElementById('roomprice' + aid).innerHTML;
            var roompriceold = document.getElementById('roompriceold' + aid).innerHTML;
            var gp = document.getElementById('gp' + aid).innerHTML;
            var gt = document.getElementById('gt').innerHTML;

            var totale = document.getElementById('totale').innerHTML;
            var totaleold = document.getElementById('totaleold').innerHTML;
            var totalee = document.getElementById('totalee').innerHTML;


            if ($this.getAttribute('data-added') == '0') {
                $this.setAttribute("data-added", "1");
                var doit = 'plus';




                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {



                        var pr = parseInt(roomprice) + parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;


                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }













                        document.getElementById('totale').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totaleold').innerHTML = parseInt(totale) + parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) + parseInt(result);


                        var prc = parseInt(totale) + parseInt(result);

                        document.getElementById('totalnewpaisay').value = prc;



                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);







                        document.getElementById('roomprice' + aid).innerHTML = pr;
                        document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;






                    }

                });











            } else if ($this.getAttribute('data-added') == '1') {


                $this.setAttribute("data-added", "0");
                var doit = 'minus';


                $.ajax({

                    type: 'POST',
                    url: 'getmeals.php',
                    data: {
                        'meal': meal,
                        'adults': adults,
                        'children': children
                    },

                    success: function(result) {

                        var pr = parseInt(roomprice) - parseInt(result);


                        document.getElementById('newpaisay' + aid).value = pr;




                        var singleprices = document.getElementsByClassName("singleprices" + aid);
                        var totaldays = document.getElementById('gettotaldays').value;
                        for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(pr) / parseInt(totaldays);
                        }







                        document.getElementById('gt').innerHTML = parseInt(gt) - parseInt(result);

                        document.getElementById('totale').innerHTML = parseInt(totale) - parseInt(result);
                        document.getElementById('totaleold').innerHTML = parseInt(totale) - parseInt(result);
                        document.getElementById('totalee').innerHTML = parseInt(totale) - parseInt(result);

                        var prc = parseInt(totale) - parseInt(result);


                        document.getElementById('totalnewpaisay').value = prc;




                        var va = prc / 100 * 5;
                        document.getElementById('vatc').innerHTML = parseInt(va);


                        document.getElementById('gt').innerHTML = prc + parseInt(va);





                        document.getElementById('roomprice' + aid).innerHTML = pr;
                        document.getElementById('roompriceold' + aid).innerHTML = pr;
                        document.getElementById('gp' + aid).innerHTML = pr;
                    }

                });



            }





        }
    </script>


    <script>
        function navigate() {


            /*    Swal.fire({
                       title: 'Want Transfer?',
                       text: "Do you want transfer as well?",
                       icon: 'warning',
                       showCancelButton: true,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Yes',
                       }).then((result) => {
                       if (result.isConfirmed) {
                           document.getElementById("btnno").click();
                          
                       }
                       else{
                            document.getElementById("btnyes").click();
                       }
                   });
                   */







            Swal.fire({
                title: 'Do you want Transfer or Rent a Car?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Transfer',
                denyButtonText: 'Rent a Car',
                customClass: {
                    actions: 'my-actions',
                    cancelButton: 'order-1 right-gap',
                    confirmButton: 'order-2',
                    denyButton: 'order-3',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("btnno").click();
                } else if (result.isDenied) {
                    document.getElementById("btnno2").click();
                } else {
                    document.getElementById("btnyes").click();
                }
            })


        }
    </script>

    <!--sajdjasldjalsdjalsdjlasd-->


    <script>
    
   //INITIAL CALL
   
   
   initial();
   
   
   
   
   
   
   
   
   function initial(){
   
        var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
 
        var max = document.getElementById("biggest").value;
        var sd = document.getElementById("sdate").value;
        var ed = document.getElementById("edate").value;
        
        var checktotal = 0;
        const paisay = [];

        var total = 0;
        var getnumber = 1;




        var valz1 = [];
        var total = 0;
        

if (sd=='') {
    
  initial();
     
     }
     else{
         startme();    
         
        
     
         
     }
 



}



function startme(){

    
 var adult = document.getElementsByClassName("adult");
        var children = document.getElementsByClassName("children");
 
        var max = document.getElementById("biggest").value;

    var sd = document.getElementById("sdate").value;
        var ed = document.getElementById("edate").value;
        
var totaqa=0;
        //var getid = 0;
        
        
        
        
        
        
        
        for (let getid = 0; getid < adult.length; ++getid) {
           
         
            var i = getid;



            var rtp = document.getElementById("rtp" + getid);

   
        var checktotal = 0;
        const paisay = [];

        
        var getnumber = 1;
var valz1 = [];
        var total = 0;
        
            var cnt = 0;
            var adultz = adult[getid].value;
            var childrenz = children[getid].value;
            var romsn = '1';
            var rtpp = rtp.value;

          


            // var badpricing = document.getElementById("prici"+getid);
            $.ajax({

                type: 'POST',
                url: 'getpricing.php',
                data: {
                    'adult': adultz,
                    'children': childrenz,
                    'sdate': sd,
                    'edate': ed,
                    'roomtype': rtpp,
                    'rooms': romsn,
                    'getnumber': getnumber
                },


                success: function(result) {

                  var badpricing = document.getElementById("prici" + getid);
                        var newpaisay = document.getElementById("newpaisay" + getid);
                        var roomprice = document.getElementById("roomprice" + getid);
                        var roompriceold = document.getElementById("roompriceold" + getid);
                        var gp = document.getElementById("gp" + getid);

 var singleprices = document.getElementsByClassName("singleprices" + getid);
                            var totaldays = document.getElementById('gettotaldays').value;
                            for (let o = 0; o < singleprices.length; o++) {
                            singleprices[o].innerHTML = 'AED ' + parseInt(result) / parseInt(totaldays);
                            }

                            gp.innerHTML = result;
                            badpricing.value = result;
                            newpaisay.value = result;
                            roomprice.innerHTML = result;
                            roompriceold.innerHTML = result;
                      
                      
                      
                      
                      
                       var totaq = 0;
                    const adq = document.getElementsByClassName("adult");

                    for (let b = 0; b < adq.length; b++) {

                        totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                    }

                      
                      
                      
                      
                            
                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;
                        
                        
                        document.getElementById('totalnewpaisay').value = totaq;
                        document.getElementById('vatc').innerHTML = (parseInt(totaq) / 100) * 5;
                        document.getElementById('gt').innerHTML = ((parseInt(totaq) / 100) * 5) + totaq;

                }

             
                

            });





        }
        
 
        
   }
   
   
   
   
   
   
   
   
    </script>

    <script>
    
        function abacaa() {


            var adult = document.getElementsByClassName("adult");
            var children = document.getElementsByClassName("children");

            var max = document.getElementById("biggest").value;



            var checktotal = 0;
            const paisay = [];

            var total = 0;
            var getnumber = 1;



            












            var sd = document.getElementById("sdate").value;
            var ed = document.getElementById("edate").value;

            var valz1 = [];
            var total = 0;


            var getid = 0;
            for (let getid = 0; getid < adult.length; ++getid) {
                var i = getid;



                var rtp = document.getElementById("rtp" + getid);



                var cnt = 0;
                var adultz = adult[getid].value;
                var childrenz = children[getid].value;
                var romsn = '1';
                var rtpp = rtp.value;

                // var badpricing = document.getElementById("prici"+getid);
                $.ajax({

                    type: 'POST',
                    url: 'getpricing.php',
                    data: {
                        'adult': adultz,
                        'children': childrenz,
                        'sdate': sd,
                        'edate': ed,
                        'roomtype': rtpp,
                        'rooms': romsn,
                        'getnumber': getnumber
                    },


                    success: function(result) {


                        valz1.push(result);

                        total = total + parseInt(result);
                        

                    },

                    complete: function() {
                        var badpricing = document.getElementById("prici" + getid);
                        var newpaisay = document.getElementById("newpaisay" + getid);
                        var roomprice = document.getElementById("roomprice" + getid);
                        var roompriceold = document.getElementById("roompriceold" + getid);
                        var gp = document.getElementById("gp" + getid);



                            var singleprices = document.getElementsByClassName("singleprices" + getid);
                            //alert(valz1[getid]);
                            var totaldays = document.getElementById('gettotaldays').value;
                            
                            
                            
                            
                            
                            for (let o = 0; o < singleprices.length; o++) {
                                singleprices[o].innerHTML = 'AED ' + parseInt(valz1[getid]) / parseInt(totaldays);
                            }



                            gp.innerHTML = valz1[getid];
                            badpricing.value = valz1[getid];
                            newpaisay.value = valz1[getid];

                            roomprice.innerHTML = valz1[getid];
                             roompriceold.innerHTML = valz1[getid];






                    }


                });

               

                    var totaq = 0;
                    const adq = document.getElementsByClassName("adult");

                    for (let b = 0; b < adq.length; b++) {

                        totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                    }

                    document.getElementById('totale').innerHTML = totaq;
                    document.getElementById('totaleold').innerHTML = totaq;
                    document.getElementById('totalee').innerHTML = totaq;
                    document.getElementById('totalnewpaisay').value = totaq;
                    document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);

                    document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;

               


            }





        }
   
   
    </script>

    <script>
        $('.spinner').on('change', (e) => {
            let direction = e.target.value > parseInt(e.target.dataset.prevValue) ? 'up' : 'down'
            e.target.dataset.prevValue = e.target.value;

            if (direction == 'up') {
                document.getElementById('minuspluser').value = 'plus';
            }
            if (direction == 'down') {
                document.getElementById('minuspluser').value = 'minus';
            }

        })




        function checkadultoccupancy($this) {


            var valz1 = '';

            var idd = $this.getAttribute('data-actualid');
            var getid = $this.getAttribute('data-getid');





            var adult = document.getElementsByClassName("adult");
            var children = document.getElementsByClassName("children");

            var max = document.getElementById("biggest").value;

            var amax = document.getElementsByClassName("aallowed");
            var cmax = document.getElementsByClassName("callowed");
            var ebmax = document.getElementsByClassName("eballowed");


            var checktotal = 0;
            const paisay = [];

            var total = 0;
            var getnumber = 1;



           




            var sd = document.getElementById("sdate").value;
            var ed = document.getElementById("edate").value;


            var rtp = document.getElementById("rtp" + getid);

            //alert('asd');

            var pricing = document.getElementById("prici" + getid);







            var cnt = 0;



            var i = getid;



















            if (children[i].value == '') {
                children[i].value = '0';
            }
            if (adult[i].value == '') {
                adult[i].value = '0';
            }

            var maxy = parseInt(amax[i].value) + parseInt(cmax[i].value) + parseInt(ebmax[i].value);


            if (parseInt(adult[i].value) + parseInt(children[i].value) > maxy) {


                if (idd == 'ad') {
                    adult[i].value = parseInt(adult[i].value) - 1;
                    swal.fire('Max Occupancy Reached for this Room');

                } else if (idd == 'ch') {
                    children[i].value = parseInt(children[i].value) - 1;
                    swal.fire('Max Occupancy Reached for this Room');
                }


            }


            var adultz = adult[i].value;

            var childrenz = children[i].value;
            var romsn = '1';
            var rtpp = rtp.value;



            // var ttl2 = document.getElementById("ttl2");

            $.ajax({

                type: 'POST',
                url: 'getpricing.php',
                data: {
                    'adult': adultz,
                    'children': childrenz,
                    'sdate': sd,
                    'edate': ed,
                    'roomtype': rtpp,
                    'rooms': romsn,
                    'getnumber': getnumber
                },

                success: function(result) {



                    if (paisay[i] == result.toString()) {

                    } else {
                        paisay.push(result.toString());


                        //alert(paisay);
                    }

                    valz1 = result;

                },


                complete: function() {


                  
                  
                  
                  
                  
                    var singleprices = document.getElementsByClassName("singleprices" + getid);
                    var totaldays = document.getElementById('gettotaldays').value;
                    for (let o = 0; o < singleprices.length; o++) {
                        singleprices[o].innerHTML = 'AED ' + parseInt(valz1) / parseInt(totaldays);
                    }



                    var pricing = document.getElementById("prici" + getid);
                    var newpaisay = document.getElementById("newpaisay" + getid);
                    var roomprice = document.getElementById("roomprice" + getid);
                    var roompriceold = document.getElementById("roompriceold" + getid);
                    var gp = document.getElementById("gp" + getid);

                    newpaisay.value = valz1;
                    pricing.value = valz1;

                    var din = document.getElementById('din' + getid);

                    var fib = document.getElementById('fbi' + getid);

                    var lun = document.getElementById('lun' + getid);

                    var bed = document.getElementById('bed' + getid);

                    if (din.checked == false && fib.checked == false && lun.checked == false && bed.checked == false) {

                        gp.innerHTML = valz1;
                        roomprice.innerHTML = valz1;
                         roompriceold.innerHTML = valz1;





                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;

                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);
                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;
                        document.getElementById('totalnewpaisay').value = totaq;

                    }


                    if (din.checked == true || fib.checked == true || lun.checked == true || bed.checked == true) {
                        gp.innerHTML = valz1;
                        roomprice.innerHTML = valz1;
                         roompriceold.innerHTML = valz1;





                        var totaq = 0;
                        const adq = document.getElementsByClassName("adult");

                        for (let b = 0; b < adq.length; b++) {
                            totaq = totaq + parseInt(document.getElementById('newpaisay' + b).value);
                        }

                        document.getElementById('totale').innerHTML = totaq;
                        document.getElementById('totaleold').innerHTML = totaq;
                        document.getElementById('totalee').innerHTML = totaq;

                        document.getElementById('vatc').innerHTML = parseInt((parseInt(totaq) / 100) * 5);
                        document.getElementById('gt').innerHTML = (parseInt((parseInt(totaq) / 100) * 5)) + totaq;

                        document.getElementById('totalnewpaisay').value = totaq;


                        callmeformeals(getid);

                    }







                }


            });








        }
    </script>

    <!--sajdjasldjalsdjalsdjlasd-->
















<script>
$( document ).ready(function() {
    document.getElementById('kholome').click();
});
</script>




<script>
    $('.panel-collapse').on('show.bs.collapse', function() {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).siblings('.panel-heading').removeClass('active');
    });
</script>

<?php
include_once('footer.php');
?>