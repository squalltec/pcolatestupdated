<?php
session_start();
include 'db_connection.php';


$_SESSION['checkingroomtype'] = array();


$imagesforlisting = array();



$_SESSION['subtractid'] = array();

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







$ipadr = getRealIpAddr();





















$roomsrecieved = $_SESSION['sendroomnumbers'];

$hn = $_SESSION['hotel'];
$cn = $_SESSION['country'];
$ln = $_SESSION['city'];

$eve = $_SESSION['event'];






























$gcountry = $_SESSION['country'];
$gcity = $_SESSION['city'];
$gevent = $_SESSION['event'];
$ghotel = $_SESSION['hotel'];
$gsdate = $_SESSION['sdate'];
$gedate = $_SESSION['edate'];

$gsendroomnumbers = $_SESSION['sendroomnumbers'];

$gcounter = $_SESSION['counter'];

$gsendcategory = $_SESSION['sendcategory'];




if ($gsendcategory == '') {




    $sqlnewb = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && name='$hn'";

    $resultnewb = $conn->query($sqlnewb);

    if ($resultnewb->num_rows > 0) {
        // output data of each row
        while ($rownewb = $resultnewb->fetch_assoc()) {

            $gsendcategory = $rownewb['star'];
            $_SESSION['sendcategory'] = $rownewb['star'];
        }
    }
}




















$st = $_SESSION['sendcategory'] . ' ' . 'star';
$sqltax = "SELECT * FROM taxnames WHERE country='$cn' && city='$ln' && star='$st' ";


$resulttax = $conn->query($sqltax);



while ($rowtax = mysqli_fetch_assoc($resulttax)) {

    $taxnametax = explode(",", $rowtax['taxname']);
    $percentagetax = explode(",", $rowtax['percentage']);
    $choicetax = explode(",", $rowtax['choice']);
}
















$nmbrooms = $_SESSION['sendroomnumbers'];



$rooms = $_SESSION['roomnmb'];

$a0 = (int)$_SESSION['adults'];
$c0 = (int)$_SESSION['children'];

$a1 = (int)$_SESSION['adult1'];
$c1 = (int)$_SESSION['children1'];

$a2 = (int)$_SESSION['adult2'];
$c2 = (int)$_SESSION['children2'];

$a3 = (int)$_SESSION['adult3'];
$c3 = (int)$_SESSION['children3'];

$a4 = (int)$_SESSION['adult4'];
$c4 = (int)$_SESSION['children4'];

$a5 = (int)$_SESSION['adult5'];
$c5 = (int)$_SESSION['children5'];

$a6 = (int)$_SESSION['adult6'];
$c6 = (int)$_SESSION['children6'];

$a7 = (int)$_SESSION['adult7'];
$c7 = (int)$_SESSION['children7'];

$a8 = (int)$_SESSION['adult8'];
$c8 = (int)$_SESSION['children8'];

$a9 = (int)$_SESSION['adult9'];
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


$biggest = 0;








if ($max0 > $biggest) {
    $biggest = $max0;
}
if ($max1 > $biggest) {
    $biggest = $max1;
}
if ($max2 > $biggest) {
    $biggest = $max2;
}
if ($max3 > $biggest) {
    $biggest = $max3;
}
if ($max4 > $biggest) {
    $biggest = $max4;
}
if ($max5 > $biggest) {
    $biggest = $max5;
}
if ($max6 > $biggest) {
    $biggest = $max6;
}
if ($max7 > $biggest) {
    $biggest = $max7;
}
if ($max8 > $biggest) {
    $biggest = $max8;
}
if ($max9 > $biggest) {
    $biggest = $max9;
}



$_SESSION['biggest'] = $biggest;



$today = date("Y-m-d");

$roomsnames = array();
$roomssizes = array();
$breakfastt = array();





$roomsnumbers = array();
$roomsdoubledescription = array();
$roomssingledescription = array();
$roomsimages = '';

$roomscancellationnames = array();
$roomscancellation = array();
$inroomf = array();
$kitchenf = array();
$privatebathroomf = array();
$discountedf = array();
$complimentaryf = array();

$adultsallowed = array();
$childrenallowed = array();
$extrabedsallowed = array();


$adultsallowednew = array();
$childrenallowednew = array();
$extrabedsallowednew = array();

$roomsizesnew = array();

$allhotels = array();
$allcountries = array();
$allcities = array();
$selectedhotels = array();
$selectedcountries = array();
$selectedcities = array();
$allstars = array();
$selectedstars = array();
$selecteddesi = array();

$alldesi = array();



if ($cn != '' && $ln != '' && $gsendcategory != '') {


    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && star='$gsendcategory'";
} else if ($cn != '' && $ln != '' && $gsendcategory == '') {

    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln'";
} else if ($cn != '' && $ln == '' && $gsendcategory != '') {





    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && star='$gsendcategory'";
} else if ($cn != '' && $ln == '' && $gsendcategory == '') {




    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn'";
}

//$sqlnew="SELECT * FROM hotelsdatabase WHERE (country='$cn' && city='$ln' && star='$gsendcategory') || (country='$cn' && star='$gsendcategory') || (country='$cn' && city='$ln')";










$resultnew = $conn->query($sqlnew);

if ($resultnew->num_rows > 0) {
    // output data of each row
    while ($rownew = $resultnew->fetch_assoc()) {

        array_push($allcountries, $rownew['country']);
        array_push($allcities, $rownew['city']);

        array_push($allhotels, $rownew['name']);
        array_push($alldesi, $rownew['description']);
        array_push($allstars, $rownew['star']);
    }
}


$nz = 0;


$allroomtypess = array();

$allroomtypesscancellation = array();
$allroomtypesscancellationnames = array();

$allroomtypessinroomf = array();
$allroomtypesskitchenf = array();
$allroomtypessprivatebathroomfities = array();
$allroomtypessdiscountedf = array();
$allroomtypesscomplimentaryfies = array();
















$allroomtypessdesc = array();
$nde = 0;
foreach ($allhotels as $hot) {

    if ($hot == $_SESSION['hotel']) {
    } else {






        $typess = array();
        $typessdesc = array();


        $imqa = array();



        $hotyes = 0;
        $manaza = 0;
        $mana = 'a0';

        $sqlrooms2 = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hot' && country='$allcountries[$nde]' && city='$allcities[$nde]'";

        $resultrooms2 = $conn->query($sqlrooms2);

        if ($resultrooms2->num_rows > 0) {
            // output data of each row
            while ($rowrooms2 = $resultrooms2->fetch_assoc()) {


                $countrums2 = 0;
                $rname2 = $rowrooms2['type'];


                $sqlavail2 = "SELECT * FROM roomnumbers WHERE hotel='$hot' && country='$allcountries[$nde]' && location='$allcities[$nde]' && name='$rname2' && dates>=$today";

                $resultavail2 = $conn->query($sqlavail2);

                if ($resultavail2->num_rows > 0) {
                    // output data of each row
                    while ($rowavail2 = $resultavail2->fetch_assoc()) {


                        $countrums2 = $countrums2 + (int)$rowavail2['number'];
                    }
                }
                if ($countrums2 > 0) {





                    $approvedornotroom2 = $rowrooms2['type'];

                    $approvedprices2 = false;

                    $adate2 = date($gsdate);
                    $bdate2 = date($gedate);



                    $sqlapproved2 = "SELECT * FROM setprices WHERE hotel='$hot' && country='$allcountries[$nde]' && location='$allcities[$nde]' && name='$approvedornotroom2' && ((sdate<='$adate' && edate>='$bdate2') ||(sdate<='$adate2' || edate>'$adate2') || (sdate>'$bdate2' || edate<='$bdate2')) && approved='approved'";

                    $resultapproved2 = $conn->query($sqlapproved2);

                    if ($resultapproved2->num_rows > 0) {
                        // output data of each row
                        while ($rowapproved2 = $resultapproved2->fetch_assoc()) {

                            $approvedprices2 = true;
                        }
                    }
                    if ($approvedprices2 == true) {





                        $ao2 = intval($rowrooms2['doubleadultoccupancy']);
                        $co2 = intval($rowrooms2['doublechildoccupancy']);
                        $seb2 = intval($rowrooms2['doubleextrabedsallowed']);

                        $addme2 = $ao2 + $co2 + $seb2;
                        if ($biggest <= $addme2) {



                            $hotyes = 1;



                            array_push($typess, $rowrooms2['type']);

                            array_push($typessdesc, $rowrooms2['singledescription']);





                            array_push($adultsallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['doubleadultoccupancy']));
                            array_push($childrenallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['doublechildoccupancy']));

                            array_push($roomsizesnew, array($hot . $rowrooms2['type'] => $rowrooms2['roomsize']));



                            array_push($allroomtypessdesc, array($hot . $rowrooms2['type'] =>  $rowrooms2['singledescription']));
                            array_push($allroomtypesscancellation, array($hot . $rowrooms2['type'] =>  $rowrooms2['cancellationpolicy']));
                            array_push($allroomtypesscancellationnames, array($hot . $rowrooms2['type'] =>  $rowrooms2['cancellationpoliciesnames']));

                            array_push($allroomtypessinroomf, array($hot . $rowrooms2['type'] =>  $rowrooms2['inroomfacilities']));
                            array_push($allroomtypesskitchenf, array($hot . $rowrooms2['type'] =>  $rowrooms2['kitchenfacilities']));
                            array_push($allroomtypessprivatebathroomfities, array($hot . $rowrooms2['type'] =>  $rowrooms2['privatebathroomfacilities']));
                            array_push($allroomtypessdiscountedf, array($hot . $rowrooms2['type'] =>  $rowrooms2['discountedfacilities']));
                            array_push($allroomtypesscomplimentaryfies, array($hot . $rowrooms2['type'] =>  $rowrooms2['complimentaryfacilities']));



                            $typeforas = $rowrooms2['type'];





                            $sqlswa = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hot' && country='$allcountries[$nde]' && location='$allcities[$nde]' && type='$typeforas'";

                            $resultswa = $conn->query($sqlswa);

                            if ($resultswa->num_rows > 0) {
                                // output data of each row
                                while ($rowswa = $resultswa->fetch_assoc()) {

                                    array_push($imqa, $rowswa['image']);
                                }
                            }

                            array_push($imagesforlisting, array($hot . $rowrooms2['type'] =>  $imqa));














                            //  array_push($roomsnames,$rowrooms['type']);  
                            //   array_push($roomssingledescription,$rowrooms['singledescription']); 



                            //   array_push($adultsallowed,$rowrooms['doubleadultoccupancy']);  
                            //   array_push($childrenallowed,$rowrooms['doublechildoccupancy']);  
                            //   array_push($extrabedsallowed,$rowrooms['doubleextrabedsallowed']);  





                            //   array_push($roomscancellation,$rowrooms['cancellationpolicy']);
                            //     array_push($inroomf,$rowrooms['inroomfacilities']);
                            //    array_push($kitchenf,$rowrooms['kitchenfacilities']);
                            //    array_push($privatebathroomf,$rowrooms['privatebathroomfacilities']);
                            //    array_push($discountedf,$rowrooms['discountedfacilities']);
                            //    array_push($complimentaryf,$rowrooms['complimentaryfacilities']);



                            //   array_push($roomsnumbers,$countrums); 


                            //   $bvb=$rowrooms['type'];

                            $mana = $mana + 1;
                            $manaza = $manaza + 1;
                        }
                    }
                }
            }
        }







        if ($hotyes == 1) {


            //echo $allcountries[$nde];


            array_push($selectedhotels, $hot);
            array_push($selectedcountries, $allcountries[$nde]);
            array_push($selectedcities, $allcities[$nde]);
            array_push($selecteddesi, $alldesi[$nde]);
            array_push($selectedstars, $allstars[$nde]);
            array_push($allroomtypess, array($hot =>  $typess));
        }







        $nz = $nz + 1;
    }
    $nde = $nde + 1;
}








//actual

$sqlrooms = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hn' && country='$cn' && city='$ln'";

$resultrooms = $conn->query($sqlrooms);

if ($resultrooms->num_rows > 0) {
    // output data of each row
    while ($rowrooms = $resultrooms->fetch_assoc()) {

        $countrums = 0;
        $rname = $rowrooms['type'];

        $sqlavail = "SELECT * FROM roomnumbers WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$rname' && dates>=$today";

        $resultavail = $conn->query($sqlavail);

        if ($resultavail->num_rows > 0) {
            // output data of each row
            while ($rowavail = $resultavail->fetch_assoc()) {


                $countrums = $countrums + (int)$rowavail['number'];
            }
        }
        if ($countrums > 0) {





            $approvedornotroom = $rowrooms['type'];

            $approvedprices = false;

            $adate = date($gsdate);
            $bdate = date($gedate);



            $sqlapproved = "SELECT * FROM setprices WHERE hotel='$hn' && country='$cn' && location='$ln' && name='$approvedornotroom' && ((sdate<='$adate' && edate>='$bdate') ||(sdate<='$adate' || edate>'$adate') || (sdate>'$bdate' || edate<='$bdate')) && approved='approved'";

            $resultapproved = $conn->query($sqlapproved);

            if ($resultapproved->num_rows > 0) {
                // output data of each row
                while ($rowapproved = $resultapproved->fetch_assoc()) {

                    $approvedprices = true;
                }
            }
            if ($approvedprices == true) {


                $ao = intval($rowrooms['doubleadultoccupancy']);
                $co = intval($rowrooms['doublechildoccupancy']);
                $seb = intval($rowrooms['doubleextrabedsallowed']);

                $addme = $ao + $co + $seb;
                if ($biggest <= $addme) {

                    array_push($roomsnames, $rowrooms['type']);

                    array_push($roomssizes, $rowrooms['roomsize']);

                    array_push($roomssingledescription, $rowrooms['singledescription']);



                    array_push($adultsallowed, $rowrooms['doubleadultoccupancy']);
                    array_push($childrenallowed, $rowrooms['doublechildoccupancy']);
                    array_push($extrabedsallowed, $rowrooms['doubleextrabedsallowed']);




                    array_push($roomscancellationnames, $rowrooms['cancellationpoliciesnames']);
                    array_push($roomscancellation, $rowrooms['cancellationpolicy']);
                    array_push($inroomf, $rowrooms['inroomfacilities']);
                    array_push($kitchenf, $rowrooms['kitchenfacilities']);
                    array_push($privatebathroomf, $rowrooms['privatebathroomfacilities']);
                    array_push($discountedf, $rowrooms['discountedfacilities']);
                    array_push($complimentaryf, $rowrooms['complimentaryfacilities']);



                    array_push($roomsnumbers, $countrums);


                    $bvb = $rowrooms['type'];
                }
            }
        }
    }
}











$images = array();

$sqllg = "SELECT * FROM hotelsdatabaseimages WHERE name='$hn' && country='$cn' && city='$ln'";
$resulttg = $conn->query($sqllg);

if ($resulttg->num_rows > 0) {
    // output data of each row
    while ($rowwg = $resulttg->fetch_assoc()) {

        array_push($images, $rowwg['image']);
    }
}







$sqll = "SELECT * FROM hotelsdatabase WHERE name='$hn' && country='$cn' && city='$ln'";
$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    // output data of each row
    while ($roww = $resultt->fetch_assoc()) {

        $des = $roww['description'];

        $generalf = $roww['generalfacilities'];
        $mainf = $roww['mainfacilities'];
        $frontf = $roww['frontdeskfacilities'];
        $sportsf = $roww['sportsfacilities'];
        $familyf = $roww['familyfacilities'];
        $cleaningf = $roww['cleaningfacilities'];
        $foodf = $roww['foodfacilities'];
        $businessf = $roww['businessfacilities'];
        $internetf = $roww['internetfacilities'];
        $parkingf = $roww['parkingfacilities'];
        $uniquef = $roww['uniquefacilities'];
        $safetyf = $roww['safetyfacilities'];
    }
}






if (isset($_POST['changehotel'])) {

    $changehotel = $_POST['changehotelinput'];
    $changestar = $_POST['changestarinput'];
    $changecity = $_POST['changecityinput'];
    //echo $chagehotel;
    $_SESSION['hotel'] = $changehotel;
    $_SESSION['sendcategory'] = $changestar;
    $_SESSION['city'] = $changecity;

    echo "<script>location.replace('hotelsearch.php');</script>";
}


if (isset($_POST['modify'])) {


    //if($_POST['hotel'] !='')
    // {


    $_SESSION['hotel'] = $_POST['hotel'];
    $_SESSION['city'] = $_POST['city'];

    $_SESSION['sendcategory'] = $_POST['star'];

    $_SESSION['sdate'] = $_POST['sdate'];

    $_SESSION['edate'] = $_POST['edate'];

    $_SESSION['sendroomnumbers'] = $_POST['roomnumberschange'];



    //}



    echo "<script>location.replace('hotelsearch.php');</script>";
}














if (isset($_POST['submit'])) {

    $_SESSION['hotel'] = $_POST['ghotelss'];

    $_SESSION['city'] = $_POST['gamagama'];
    $_SESSION['sendcategory'] = $_POST['gamagamastar'];




    $_SESSION['numberofadults'] = $_POST['adultsnumber'];
    $_SESSION['numberofchildren'] = $_POST['childrennumber'];
    $_SESSION['sendroomnumbers'] = $_POST['roomsrecieved'];

    $_SESSION['totalpaisay'] = $_POST['totalpaisay'];

    $_SESSION['roomseachtype'] = $_POST['roomseachtype'];




    $_SESSION['breakfastincluded'] = $_POST['breakfastt'];




    $_SESSION['eachtype'] = $_POST['eachtype'];

    $_SESSION['aallowed'] = $adultsallowed;
    $_SESSION['callowed'] = $childrenallowed;
    $_SESSION['eballowed'] = $extrabedsallowed;




    echo "<script>location.replace('bs.php');</script>";
}








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
            background-color: #DC3545; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 10px 5px; /* Some padding */
            font-size: 12px; /* Set a font size */
            cursor: pointer;
           
        }

        /* Darker background on mouse-over */
        .btnNew:hover {
            background-color: #DC3545;
            border:1px solid #DC3545;
        }
    
        ul#menu {
            display:flex;
           
        }
        ul#menu li {
            display:inline;
            margin-left:5px;
            margin-right:5px;

        }
        .item_details {

            position: relative;

        }
        .bookNewBtn{
            margin-top:10px; 
            margin-bottom:10px;
            margin-right:10px; 
            position: absolute;
            right:2px;
            bottom:-4px;
            
        }
        @media screen and (max-width: 1000px) {

            .searchlist .searchitem {

                display: block !important;
                margin-top: 20px;
                
            }
        }
        @media screen and (max-width: 576px) {

             .searchitem {

                padding-bottom: 30px;
                
            }
        }

    </style>



    <!--<div style='' class="se-pre-con"> <center><img style='width:150px; margin-top:300px;' src='hotelloader.gif'></center> </div>-->




    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>





    <title>Search Result</title>
</head>

<body>
    
    
     <script>
                        setInterval(function() {
                            document.getElementsByClassName("daterangepicker")[0].classList.remove('notranslate');
                            document.getElementsByClassName("daterangepicker")[0].classList.add('notranslate');

                        }, 1000);
                    </script>


    <input style='display:none;' name='contry' id='contry' value='<?php echo $cn; ?>'>



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
        .styled-checkbox + label {
            position: relative;
            cursor: pointer;
            padding: 0;
        }
        .styled-checkbox + label:before {
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
        .styled-checkbox:hover + label:before {
            background: #DC3545;
        }
        .styled-checkbox:focus + label:before {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
        }
        .styled-checkbox:checked + label:before {
            background: #DC3545;
        }
        .styled-checkbox:disabled + label {
            color: #b8b8b8;
            cursor: auto;
        }
        .styled-checkbox:disabled + label:before {
            box-shadow: none;
            background: #ddd;

        }
        .styled-checkbox:checked + label:after {
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
        .room-amenities{
            margin-bottom: 30px;
        }
        

            

        
        
    </style>

    <a href='https://wa.me/+971506509976'> <img src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a>


    <div class="main-holder">

        <?php include('header.php'); 
        ?>



        <style>
            .swal2-confirm {
                background-color: #DC3545 !important;
            }
            @media screen and (max-width: 576px) {
                .CalenderDiv{
                    padding: 0px;
                    padding-left: 5px;
                  }
                  .SBtn{
                    margin-left: 10px;
                  }
                  .search_submit{
                    margin-left: 0px!important;
                    /* width: 100% !important; */
                  }
                  .other_room_list{
                      padding-bottom:80px;
                  }
                  
            }
            @media (min-width: 768px){
                .CalenderDiv{
                    padding: 0px;
                  }
            }

            @media screen and (max-width: 420px){
                .searchlist .item_details {
                    padding-bottom: 30px !important;
                }
                .RoomSection{
                    padding-left:0px;
                }
            }
            

            
            
        </style>
        <section class="page_title" style="background: none;">
            <div class="container">
            <section class="page_searchbox" style="background:none; " >
                <div class="container px-0" style="padding-right:24px !important;">
                    <div class="search_box" style="padding-left:0.8em;  box-shadow: 0px 15px 39px 0px rgb(165 9 25 / 40%) !important;">
                        <div class="row">
                            <div class="col-12 mx-auto">
                                <h5 class="ml-lg-2" style="color:black;">Modify Your Search</h5>
                            </div>
                        </div>
                        

                        <form class='notranslate' method="POST" action='#' class="row ">
                            <div class="row col-12">
                                <style>
                                    select{
                                        color: #D3D3D3 !important;
                                    }
                                </style>

                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 mb-3 mb-lg-0 pe-0">
                                        <label style='color: gray;'>City <?php $roomsnames[0]; ?></label>
                                        <select id="city" name='city' class="form-select">

                                            <option value=''><?php echo 'All' ?></option>

                                            <?php
                                            if ($gcity != '') {
                                            ?>
                                                <option selected><?php echo $gcity; ?></option>

                                            <?php
                                            }
                                            ?>

                                            <?php

                                            $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$cn' GROUP BY city";




                                            $result = $conn->query($sqllas);




                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $checkcity = $row['city'];
                                                if ($checkcity != $ln) {
                                                    echo "<option>" . $row['city'] . "</option><br>";
                                                }
                                            }


                                            ?>



                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 mb-3 mb-lg-0 pe-0">
                                        <label style='color: gray;'>Hotel</label>
                                        <select id="hotel" name='hotel' class="form-select">

                                            <option value=''><?php echo 'All' ?></option>

                                            <?php
                                            if ($ghotel != '') {
                                            ?>
                                                <option selected><?php echo $ghotel; ?></option>

                                            <?php
                                            }
                                            ?>





                                            <?php

                                            $sqllas = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && star='$gsendcategory'";




                                            $result = $conn->query($sqllas);




                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $checkhotels = $row['name'];
                                                if ($checkhotels != $hn) {
                                                    echo "<option>" . $row['name'] . "</option><br>";
                                                }
                                            }


                                            ?>

















                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 mb-3 mb-lg-0 pe-0">
                                        <label style='color: gray;'>Star Rating</label>
                                        <select id="star" name='star' class="form-select">



                                            <option value=''><?php echo 'All' ?></option>


                                            <?php
                                            if ($gsendcategory != '') {
                                            ?>
                                                <option selected><?php echo $gsendcategory; ?></option>

                                            <?php
                                            }
                                            ?>



                                            <?php

                                            for ($x = 5; $x > 0; $x--) {
                                                if ($x != $gsendcategory) {
                                                    echo '<option>' . $x . '</option>';
                                                }
                                            }
                                            ?>




                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-8 col-sm-12 col-xs-12 mb-3 mb-lg-0  CalenderDiv" style="padding-left: 10px;">
                                        <style>
                                                .drp-selected {
                                                    border:1px solid #dc3545;
                                                    border-radius:25px;
                                                    padding-top:10px;
                                                    padding-bottom:10px;
                                                    padding-left:2px;
                                                    padding-right:2px;
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
                                        <label style='color: gray;'>Check In - Check Out</label>
                                        <div style='text-align:center;' class='col-sm calender'>
                                            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                                            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                                            
                                            <style>
                                                .applyBtn{
                                                    background-image:linear-gradient(45deg, #dc3545 0%, black 100%) !important;
                                                    float:right;
                                                    max-width:100px !important;
                                                }
                                            </style>

                                            <!--<label >Check In - Check Out</label>-->
                                            <i style='opacity:50%; color:#dc3545;' class="stylenotneeded fa fa-calendar iconzz "></i>
                                            
                                            <input id='datessy' style='text-align:center;' style="    color: #D3D3D3;" class='notranslate form-select' type="text" value='<?php echo $sdate. "-" .$edate;?>' placeholder='Check In - Check Out' name="datefilter" value="" />





                                            <script>
                                               
                                                
                                                
                                                $(function() {

                                                    setTimeout(() => {  
                                                        start_date = document.getElementById('ssdate').value;
                                                        sDateArray = start_date.split('-');
                                                        star_dateFormated = sDateArray[2]+'/'+sDateArray[1]+'/'+sDateArray[0];
                                                        end_date = document.getElementById('eedate').value;
                                                        eDateArray = end_date.split('-');
                                                        end_dateFormated = eDateArray[2]+'/'+eDateArray[1]+'/'+eDateArray[0];

                                                        $('input[name="datefilter"]').val( star_dateFormated + ' - ' + end_dateFormated);
                                                        $('input[name="datefilter"]').daterangepicker({
                                                        opens: 'left',
                                                        autoUpdateInput: false,
                                                        startDate:star_dateFormated,
                                                        endDate:end_dateFormated,
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

                                                        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

                                                        document.getElementById('ssdate').value = picker.startDate.format('YYYY-MM-DD');
                                                        document.getElementById('eedate').value = picker.endDate.format('YYYY-MM-DD');
                                                        // document.getElementById("sdate").value = "2014-02-09";

                                                        // alert(picker.startDate.format('DD-MM-YYYY'));
                                                        //alert(picker.endDate.format('DD-MM-YYYY'));

                                                        $.ajax({

                                                            type: 'POST',
                                                            url: 'calculatedays.php',
                                                            data: {
                                                                'sdt': picker.startDate.format('DD-MM-YYYY'),
                                                                'edt': picker.endDate.format('DD-MM-YYYY')
                                                            },

                                                            success: function(result) {
                                                                // alert(result);
                                                                document.getElementById('nights').value = result;

                                                            }

                                                        });

                                                    });

                                                    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                                                        $(this).val('');
                                                    });

                                                });
                                            </script>







                                            </div>




                                           

                                            <div style='display:none; text-align:center;' class='col-sm'>

                                                <label>Check In</label>

                                                <input id="ssdate" type='date'value='<?php echo $_SESSION['sdate'];?>' name='sdate' class="form-control">
                                            </div>

                                            <div style='display:none; text-align:center;' class='col-sm'>
                                                <label>Check Out</label>
                                                <input id="eedate" type='date' value='<?php echo $_SESSION['edate'];?>' name='edate' class="form-control">
                                            </div>

                                    
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12 mb-lg-0 pe-0">
                                        <label style='color: gray;'>Rooms</label>
                                        <input id="roomnumberschange" name='roomnumberschange' value='<?php
                                                                                                        if ($gsendroomnumbers == '') {
                                                                                                            echo '0';
                                                                                                        } else {
                                                                                                            echo $gsendroomnumbers;
                                                                                                        } ?>' type='number' class="form-select">
                                    </div>

                                    <div class="col-lg-1 col-md-4 col-sm-12 col-xs-12 mb-3 mb-lg-0 pe-0 text-right  search_submit">
                                        <label></label>
                                        <button id='donotclick' onclick="myFunction()" class="btn btn-primary SBtn float-sm-rigth float-md-left"><i class="bi bi-search"></i></button>

                                        <button style='display:none;' id='clickmodify' type="submit" name='modify' class="btn btn-primary"><i class="bi bi-search"></i></button>

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
       













        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <section class='smry ' style='padding-top:15px;'>



            <div class="container" >
                <div class="row" >
                    <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12" style="padding:0 !important; margin:0px;">
                        <div class="list-group">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style='color:white; background-color:#DC3545;' class="list-group-item list-group-item-action">
                                Filter By
                            </a>


                            <div class="collapse show"  id="collapseExample">


                                <style>
                                    .align-items-center label {
                                        font-size: 0.9em !important;



                                    }
                                </style>

                                <a class="list-group-item list-group-item-action">


                                    <ul class="list-unstyled mx-0 mb-0 unstyled">


                                        <h6 style='font-weight:bold;'>Popular Filters </h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                                            <span>
                                                <input id='sustain' type='checkbox' class="styled-checkbox"> <label for='sustain' class="styled-checkbox-1">Sustainability</label>
                                                <br />
                                                <input id='romantic' type='checkbox' class="styled-checkbox"> <label for='romantic' class="styled-checkbox-1">Romantic Getaways</label>
                                            </span>








                                        </li>

                                    </ul>


                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Facilities </h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">


                                            <span>
                                                <input id='airportshuttle' type='checkbox' class="styled-checkbox"> <label for='airportshuttle' class="styled-checkbox-1">Free Airport Shuttle</label>
                                                <br />
                                                <input id='pets' type='checkbox'class="styled-checkbox"> <label for='pets'class="styled-checkbox-1">Pets Allowed</label>
                                                <br />
                                                <input id='electric' type='checkbox'class="styled-checkbox"> <label for='electric'class="styled-checkbox-1">E-Vehicle Charging</label>
                                                <br />
                                                <input id='family' type='checkbox' class="styled-checkbox"> <label for='family' class="styled-checkbox-1">Family Rooms</label>
                                                <br />
                                                <input id='freewifi' type='checkbox' class="styled-checkbox"> <label for='freewifi' class="styled-checkbox-1">Free Wifi</label>
                                                <br />
                                                <input id='roomservice' type='checkbox' class="styled-checkbox"> <label for='roomservice' class="styled-checkbox-1">Room Service</label>
                                            </span>


                                        </li>

                                    </ul>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Room Preference </h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">


                                            <span>
                                                <input id='ac' type='checkbox' class="styled-checkbox"> <label for='ac' class="styled-checkbox-1">Air Conditioning</label>
                                                <br />
                                                <input id='pillow' type='checkbox' class="styled-checkbox"> <label for='pillow' class="styled-checkbox-1">Pillow Menu</label>
                                                <br />
                                                <input id='bed' type='checkbox' class="styled-checkbox"> <label for='bed' class="styled-checkbox-1">Bed Preference</label>
                                                <br />
                                                <input id='balcony' type='checkbox' class="styled-checkbox"> <label for='balcony' class="styled-checkbox-1">Balcony</label>
                                                <br />
                                                <input id='nonsmoking' type='checkbox' class="styled-checkbox"> <label for='nonsmoking' class="styled-checkbox-1">Non Smoking Rooms</label>
                                                <br />
                                                <input id='kitchen' type='checkbox' class="styled-checkbox"> <label for='kitchen' class="styled-checkbox-1">Kitchen/ Kitchenette</label>
                                                <br />
                                                <input id='jacuzi' type='checkbox' class="styled-checkbox"> <label for='jacuzi' class="styled-checkbox-1">Private Jacuzi</label>
                                                <br />
                                                <input id='pool' type='checkbox' class="styled-checkbox"> <label for='pool' class="styled-checkbox-1">Private Pool</label>
                                            </span>



                                        </li>

                                    </ul>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Accessibility</h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                                       
                                            <span>
                                                <input id='wheelchair' type='checkbox' class="styled-checkbox"> <label for='wheelchair' class="styled-checkbox-1">Wheelchair Accessible</label>
                                                <br />
                                                <input id='grabrails' type='checkbox' class="styled-checkbox"> <label for='grabrails' class="styled-checkbox-1">Toilet with Grab Rails</label>
                                                <br />
                                                <input id='higherleveltoilet' type='checkbox' class="styled-checkbox"> <label for='higherleveltoilet' class="styled-checkbox-1">Higher Level Toilet</label>
                                                <br />
                                                <input id='lowerbathroomsink' type='checkbox' class="styled-checkbox"> <label for='lowerbathroomsink' class="styled-checkbox-1">Lower Bathroom Sink</label>
                                                <br />
                                                <input id='emergencycord' type='checkbox' class="styled-checkbox"> <label for='emergencycord' class="styled-checkbox-1">Emergency Cord</label>
                                                <br />
                                                <input id='braille' type='checkbox' class="styled-checkbox"> <label for='braille' class="styled-checkbox-1">Visual Aid: Braille</label>
                                                <br />
                                                <input id='tactile' type='checkbox' class="styled-checkbox"> <label for='tactile' class="styled-checkbox-1">Visual Aid: Tactile Signs</label>
                                                <br />
                                                <input id='auditory' type='checkbox' class="styled-checkbox"> <label for='auditory' class="styled-checkbox-1">Auditory Guidance</label>
                                                <br />
                                                <input id='Entire_unit_located_on_ground_floor' type='checkbox' class="styled-checkbox"> <label for='Entire_unit_located_on_ground_floor' class="styled-checkbox-1">Entire unit located on ground floor</label>
                                                <br />
                                                <input id='Upper_floors_accessible_by_elevator' type='checkbox' class="styled-checkbox"> <label for='Upper_floors_accessible_by_elevator' class="styled-checkbox-1">Upper floors accessible by elevator</label>
                                                <br />
                                                <input id='Entire_unit_wheelchair_accessible' type='checkbox' class="styled-checkbox"> <label for='Entire_unit_wheelchair_accessible' class="styled-checkbox-1">Entire unit wheelchair accessible</label>
                                                <br />
                                                <input id='Toilet_with_grab_rails' type='checkbox' class="styled-checkbox"> <label for='Toilet_with _rab_rails' class="styled-checkbox-1">Toilet with grab rails</label>
                                                <br />
                                                <input id='Adapted_bath' type='checkbox' class="styled-checkbox"> <label for='Adapted_bath' class="styled-checkbox-1">Adapted bath</label>
                                                <br />
                                                <input id='Roll_in_shower' type='checkbox' class="styled-checkbox"> <label for='Roll_in_shower' class="styled-checkbox-1">Roll-in shower</label>
                                                <br />
                                                <input id='Walk_in_shower' type='checkbox' class="styled-checkbox"> <label for='Walk_in_shower' class="styled-checkbox-1">Walk-in shower</label>
                                                <br />
                                                <input id='Raised_toilet' type='checkbox' class="styled-checkbox"> <label for='Raised_toilet' class="styled-checkbox-1">Raised toilet</label>
                                                <br />
                                                <input id='Lowered_sink' type='checkbox' class="styled-checkbox"> <label for='Lowered_sink' class="styled-checkbox-1">Lowered sink</label>
                                                <br />
                                                <input id='Emergency_cord_in_bathroom' type='checkbox' class="styled-checkbox"> <label for='Emergency_cord_in_bathroom' class="styled-checkbox-1">Emergency cord in bathroom</label>
                                                <br />
                                                <input id='Shower_chair' type='checkbox' class="styled-checkbox"> <label for='Shower_chair' class="styled-checkbox-1">Shower chair</label>
                                            </span>


                                        </li>

                                    </ul>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Sport and Fitness Gym</h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                                       
                                            <span>
                                                <input id='Olympicsizepool' type='checkbox' class="styled-checkbox"> <label for='Olympicsizepool' class="styled-checkbox-1">Olympic size pool</label>
                                                <br />
                                                <input id='Basketballcourt' type='checkbox' class="styled-checkbox"> <label for='Basketballcourt' class="styled-checkbox-1">Basketball court</label>
                                                <br />
                                                <input id='Tennis' type='checkbox' class="styled-checkbox"> <label for='Tennis' class="styled-checkbox-1">Tennis</label>
                                                <br />
                                                <input id='PaddleTennis' type='checkbox' class="styled-checkbox"> <label for='PaddleTennis' class="styled-checkbox-1">Paddle Tennis</label>
                                                <br />
                                                <input id='FootballGround' type='checkbox' class="styled-checkbox"> <label for='FootballGround' class="styled-checkbox-1">Football Ground</label>
                                            </span>


                                        </li>

                                    </ul>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Health and Wellness</h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                                       
                                            <span>
                                                <input id='Spa' type='checkbox' class="styled-checkbox"> <label for='Spa' class="styled-checkbox-1">Spa</label>
                                                <br />
                                                <input id='Sauna' type='checkbox' class="styled-checkbox"> <label for='Sauna' class="styled-checkbox-1">Sauna</label>
                                                <br />
                                                <input id='AyurvedicTreatments' type='checkbox' class="styled-checkbox"> <label for='AyurvedicTreatments' class="styled-checkbox-1">Ayurvedic Treatments</label>
                                            </span>


                                        </li>

                                    </ul>
                                </a>
                                <a class="list-group-item list-group-item-action">
                                    <ul class="list-unstyled mx-0 mb-0">


                                        <h6 style='font-weight:bold;'>Meals</h6>
                                        <li class="my-2 pb-2 d-flex align-items-center justify-content-between">
                                       
                                            <span>
                                                <input id='RoomOnly' type='checkbox' class="styled-checkbox"> <label for='RoomOnly' class="styled-checkbox-1" title="Breakfast+ Lunch or Dinner Included">Room Only</label>
                                                <br />
                                                <input id='H/B' type='checkbox' class="styled-checkbox"> <label for='H/B' class="styled-checkbox-1" title="Breakfast+ Lunch or Dinner Included">H/B</label>
                                                <br />
                                                <input id='F/B' type='checkbox' class="styled-checkbox"> <label for='F/B' class="styled-checkbox-1" title="Breakfast+Lunch+Dinner included">F/B</label>
                                                </br>
                                                <input id='F/B+' type='checkbox' class="styled-checkbox"> <label for='F/B+' class="styled-checkbox-1" title="Breakfast+Lunch+Dinner+Alcoholic beverages included during meals">F/B+</label>
                                                <br /> 
                                                <input id='AllInclusive' type='checkbox' class="styled-checkbox"> <label for='AllInclusive' class="styled-checkbox-1" title="Breakfast+Lunch+Dinner+Alcoholic beverages+snacks included) Please read and note each hotels house rules prior to booking.">All Inclusive</label>
                                                <br />
                                                <input id='ServesVegan' type='checkbox' class="styled-checkbox"> <label for='ServesVegan' class="styled-checkbox-1">Serves Vegan</label>
                                                <br />
                                                <input id='ServesHalal' type='checkbox' class="styled-checkbox"> <label for='ServesHalal' class="styled-checkbox-1">Serves Halal</label>
                                                <br />
                                                
                                            </span>
                                            








                                        </li>

                                    </ul>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 d-flex flex-nowrap RoomSection">
                        <section style='margin-top:-65px;' class="searchlist">
                            <div class='row'>
                                <div>
                                    <div class="container p-0">
                                        <!--hotel item start-->
                                        <?php
                                        if (count($roomsnames) > 0) {
                                        ?>
                                            
                                            <!-- Old One-->
                                            <div style='border-radius:25px;' class="searchitem ">
                                                

                                                <div class="item_details" style="border-right: 1px solid rgba(0, 0, 0, 0.3);  padding-top: 15px; padding-left:22px; padding-right:22px; min-width:32.3%;">
                                                    <div class="item_main_title">
                                                        <h2 style='font-weight:500; color:black; float:left;'><?php echo $ghotel; ?>&nbsp;&nbsp;</h2>
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
                                                                <a href="pco/Hotel Images/<?php echo $ghotel; ?>/<?php echo $images[$x]; ?>" data-lightbox="room_gal_<?php echo $gals; ?>">

                                                                    <img src="pco/Hotel Images/<?php echo $ghotel; ?>/<?php echo $images[$x]; ?>" alt="">
                                                                </a>
                                                        <?php
                                                            }
                                                        
                                                        ?>





                                                    </div>
                                                    <div class='room-amenities'>
                                                        <?php echo mb_strimwidth($des, 0, 190, "..."); ?>
                                                        <a  href='hotelsingle.php?hotel=<?php echo $dd; ?>&city=<?php echo $gcity;?>&country=<?php echo $gcountry;?>&sendcategory=<?php echo $gsendcategory; ?>'>See More</a>
                                                    </div>

                                                    <div class="row col-md-12" style="position:absolute; bottom:0;">
                                                        
                                                        <ul id="menu" style="padding:0px; ">

                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Resturant&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Spa&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Activites&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Other&nbsp;&nbsp;</span></li>
                                                        </ul>
                                                        
                                                    </div>
                                                    
                                                </div>


                                                <?php $gals = $gals + 1; ?>

                                                <form class='notranslate' action='#' method='POST' style="position:relative;     width: 100%;">
                                                    <input style='display:none;' name='ghotelss' value='<?php echo $ghotel; ?>'>
                                                    <input style='display:none;' name='gamagama' value='<?php echo $gcity; ?>'>
                                                    <input style='display:none;' name='gamagamastar' value='<?php echo $gsendcategory; ?>'>
                                                    <input style='display:none;' name='roomsrecieved' id='roomsrecieved' value='<?php echo $roomsrecieved; ?>'>

                                                    <div class="row" >
                                                        <div style='display:flex; border: none !important; padding-top:15px; padding-bottom:65px;' class="other_room_list" >
                                                            <div style="min-width:100%; height:auto;">
                                                                <?php
                                                                    $xv = 1000;
                                                                    $xvv = 3000;
                                                                    for ($x = 0; $x < count($roomsnames); $x++) {
                                                                ?>
                                                                        <div class='row d-flex ' style="margin-bottom:10px;">
                                                                            <div class='col-lg-4 col-md-8 col-sm-8 order-1 order-md-0 order-lg-0  p-0'>

                                                                                <?php
                                                                                    $ig = array();
                                                                                    $rmvs = $roomsnames[$x];

                                                                                    $rcont = 0;
                                                                                    $sqlimgsv = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$hn' && country='$cn' && location='$ln' && type='$rmvs'";

                                                                                    $resultimgsv = $conn->query($sqlimgsv);

                                                                                    if ($resultimgsv->num_rows > 0) {
                                                                                        // output data of each row
                                                                                        while ($rowimgsv = $resultimgsv->fetch_assoc()) {

                                                                                            array_push($ig, $rowimgsv['image']);
                                                                                            $rcont = $rcont + 1;
                                                                                        }
                                                                                    }
                                                                                ?>

                                                                                <div style=' margin:0 auto;  ' class="room_box_img">
                                                                                    <a href='#' data-bs-toggle="modal" data-bs-target=".roomamsModalSH<?php echo $x; ?>">
                                                                                        <img src="pco/Room Uploads/<?php echo $ghotel; ?>/<?php echo $rmvs; ?>/<?php echo $ig[0]; ?>" alt="" >
                                                                                    </a>
                                                                                </div>
                                                                                <div class="modal fade roomamsModalSH<?php echo $x; ?>" tabindex="-1" aria-labelledby="roomamsModal" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-dialog-centered modal-xl " style="margin-top:auto; margin-bottom:auto;">
                                                                                        <div class="modal-content" style="border-radius:25px; background:black;">
                                                                                            <div class="container-lg contentcat" style="background: rgb(42, 42, 58);">
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-8">

                                                                                                    <?php
                                                                                                        for ($ximg = 0; $ximg < count($images); $ximg++) {
                                                                                                        ?>
                                                                                                                <div class="mySlidesCss mySlides<?php echo $ximg ?>">
                                                                                                                    <img src="pco/Room Uploads/<?php echo $ghotel; ?>/<?php echo $rmvs; ?>/<?php echo $images[$ximg]; ?>" style="width:100%">

                                                                                                                </div>
                                                                                                                
                                                                                                        <?php
                                                                                                            }
                                                                                                        
                                                                                                        ?>
                                                                                                       
                                                                                                        <a class="prevs" onclick="plusSlides<?php echo $ban ?>(-1)">❮</a>
                                                                                                        <a class="nexts" onclick="plusSlides<?php echo $ban ?>(1)">❯</a>
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
                                                                                                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home<?php echo $ban; ?>" type="button" role="tab" aria-controls="home" style='color:red;' aria-selected="true">Description</button>
                                                                                                                    </li>
                                                                                                                    <li class="nav-item" role="presentation">
                                                                                                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile<?php echo $ban; ?>" type="button" role="tab" aria-controls="profile" style='color:red;' aria-selected="false">Amenities</button>
                                                                                                                    </li>
                                                                                                                    <li class="nav-item" role="presentation">
                                                                                                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact<?php echo $ban; ?>" type="button" role="tab" aria-controls="contact" style='color:red;' aria-selected="false">Policies</button>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                                <div class="tab-content" id="myTabContent">
                                                                                                                    <div class="tab-pane fade show active" id="home<?php echo $ban; ?>" role="tabpanel" aria-labelledby="home-tab">
                                                                                                                        <div class="row pt-2">
                                                                                                                            <div class="col-md-6">
                                                                                                                                <p class="infoBox">
                                                                                                                                    <span style="float:left;">
                                                                                                                                        Sleeps
                                                                                                                                    </span>  
                                                                                                                                    <span >  
                                                                                                                                    <?php
                                                                                                                                    

                                                                                                                                    foreach ($adultsallowednew as $abc) {
                                                                                                                                        $adultsforu = $abc[$opp . $baba];
                                                                                                                                        for ($ac = 0; $ac < intval($adultsforu); $ac++) {
                                                                                                                                    ?>
                                                                                                                                            <img style='max-width:8px;' src="img/terms/terms_icon_22.png">

                                                                                                                                        <?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    foreach ($childrenallowednew as $abc2) {
                                                                                                                                        $childrenforu = $abc2[$dd . $rmvs];
                                                                                                                                        for ($ac = 0; $ac < intval($childrenforu); $ac++) {
                                                                                                                                        ?>
                                                                                                                                            <img style='max-width:8px;' src="img/terms/terms_icon_3333.png">
                                                                                                                                    <?php
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?></span>  

                                                                                                                                </p>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <p class="infoBox"> 
                                                                                                                                    <span style="float:left;">
                                                                                                                                        Room Size
                                                                                                                                    </span>
                                                                                                                                    <span>                                                           
                                                                                                                                    <?php

                                                                                                                                    foreach ($roomsizesnew as $abbc2) {
                                                                                                                                        $roomsizesn = $abbc2[$opp . $baba];
                                                                                                                                        if ($roomsizesn != '') {
                                                                                                                                            for ($ac = 0; $ac < count($roomsizesn); $ac++) {
                                                                                                                                    ?>
                                                                                                                                    <nonsense style='font-size:14px; '><?php echo $roomsizesn; ?></nonsense>
                                                                                                                                    <?php
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>
                                                                                                                                    </span>
                                                                                                                                </p>


                                                                                                                            </div>
                                                                                                                        </div>












                                                                                                                        <h6><?php

                                                                                                                            foreach ($allroomtypessdesc[$cnna] as $bn) {
                                                                                                                                echo $bn;
                                                                                                                            }





                                                                                                                            ?></h6>


                                                                                                                    </div>
                                                                                                                    <div class="tab-pane fade" id="profile<?php echo $ban; ?>" role="tabpanel" aria-labelledby="profile-tab">


                                                                                                                        <br />

                                                                                                                        <div>


                                                                                                                            <div class='container'>
                                                                                                                                <div class='row'>



                                                                                                                                    <?php
                                                                                                                                    foreach ($allroomtypessinroomf as $inroom) {
                                                                                                                                        if (!empty($inroom[$opp . $baba])) {
                                                                                                                                    ?>


                                                                                                                                            <div class='col-sm'>
                                                                                                                                                <label>In Room:</label>
                                                                                                                                                <ul class="small text-black-50">

                                                                                                                                                    <?php

                                                                                                                                                    $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                                                    for ($p = 0; $p < count($gf); $p++) {
                                                                                                                                                    ?>

                                                                                                                                                        <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                                                    <?php

                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                </ul>
                                                                                                                                            </div>



                                                                                                                                    <?php



                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>






                                                                                                                                    <?php
                                                                                                                                    foreach ($allroomtypesskitchenf as $inroom) {
                                                                                                                                        if (!empty($inroom[$opp . $baba])) {
                                                                                                                                    ?>


                                                                                                                                            <div class='col-sm'>
                                                                                                                                                <label>Kitchen:</label>
                                                                                                                                                <ul class="small text-black-50">

                                                                                                                                                    <?php

                                                                                                                                                    $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                                                    for ($p = 0; $p < count($gf); $p++) {
                                                                                                                                                    ?>

                                                                                                                                                        <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                                                    <?php

                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                </ul>
                                                                                                                                            </div>



                                                                                                                                    <?php



                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>





                                                                                                                                    <?php
                                                                                                                                    foreach ($allroomtypessprivatebathroomfities as $inroom) {
                                                                                                                                        if (!empty($inroom[$opp . $baba])) {
                                                                                                                                    ?>


                                                                                                                                            <div class='col-sm'>
                                                                                                                                                <label>Private Bathroom:</label>
                                                                                                                                                <ul class="small text-black-50">

                                                                                                                                                    <?php

                                                                                                                                                    $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                                                    for ($p = 0; $p < count($gf); $p++) {
                                                                                                                                                    ?>

                                                                                                                                                        <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                                                    <?php

                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                </ul>
                                                                                                                                            </div>



                                                                                                                                    <?php



                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>








                                                                                                                                    <?php
                                                                                                                                    foreach ($allroomtypessdiscountedf as $inroom) {
                                                                                                                                        if (!empty($inroom[$opp . $baba])) {
                                                                                                                                    ?>


                                                                                                                                            <div class='col-sm'>
                                                                                                                                                <label>Discounts:</label>
                                                                                                                                                <ul class="small text-black-50">

                                                                                                                                                    <?php

                                                                                                                                                    $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                                                    for ($p = 0; $p < count($gf); $p++) {
                                                                                                                                                    ?>

                                                                                                                                                        <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                                                    <?php

                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                </ul>
                                                                                                                                            </div>



                                                                                                                                    <?php



                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>





                                                                                                                                    <?php
                                                                                                                                    foreach ($allroomtypesscomplimentaryfies as $inroom) {
                                                                                                                                        if (!empty($inroom[$opp . $baba])) {
                                                                                                                                    ?>


                                                                                                                                            <div class='col-sm'>
                                                                                                                                                <label>Complementary:</label>
                                                                                                                                                <ul class="small text-black-50">

                                                                                                                                                    <?php

                                                                                                                                                    $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                                                    for ($p = 0; $p < count($gf); $p++) {
                                                                                                                                                    ?>

                                                                                                                                                        <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                                                    <?php

                                                                                                                                                    }
                                                                                                                                                    ?>
                                                                                                                                                </ul>
                                                                                                                                            </div>



                                                                                                                                    <?php



                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>






                                                                                                                                </div>
                                                                                                                            </div>






                                                                                                                        </div>











                                                                                                                    </div>
                                                                                                                    <div class="tab-pane fade" id="contact<?php echo $ban; ?>" role="tabpanel" aria-labelledby="contact-tab">
                                                                                                                        <br />
                                                                                                                        <?php


                                                                                                                        $anotherarray = array();
                                                                                                                        $anotherarray2 = array();



                                                                                                                        foreach ($allroomtypesscancellationnames as $mkm) {


                                                                                                                            if (!empty($mkm[$opp . $baba])) {
                                                                                                                                array_push($anotherarray, $mkm[$opp . $baba]);
                                                                                                                            }
                                                                                                                        }

                                                                                                                        foreach ($allroomtypesscancellation as $mkma) {

                                                                                                                            if (!empty($mkma[$opp . $baba])) {
                                                                                                                                array_push($anotherarray2, $mkma[$opp . $baba]);
                                                                                                                            }
                                                                                                                        }



                                                                                                                        $o1 = explode('_@_', $anotherarray[0]);
                                                                                                                        $o2 = explode('_@_', $anotherarray2[0]);




                                                                                                                        $he = 0;

                                                                                                                        for ($u = 0; $u < count($o1); $u++) {


                                                                                                                            echo '<h4>' . $o1[$he] . '</h4>';

                                                                                                                            echo '<p>' . $o2[$he] . '</p>';
                                                                                                                            echo '<br/>';


                                                                                                                            $he = $he + 1;
                                                                                                                        }

                                                                                                                        ?>



                                                                                                                    </div>
                                                                                                                </div>


                                                                                                                <!-- </div> -->
                                                                                                            </div>

                                                                                                            <div class="btn-bg">
                                                                                                            <a  href='hotelsingle.php?hotel=<?php echo $opp; ?>&city=<?php echo $selectedcities[$cnna];?>&country=<?php echo $selectedcountries[$cnna];?>&sendcategory=<?php echo $selectedstars[$cnna]; ?>'>
                                                                                                                
                                                                                                                <button class="btn btn-danger" type="button">View Property </button></a>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div class="row col-md-12 list-c-main">
                                                                                                        <div class="col-md-10">
                                                                                                            <ul class="list-c">
                                                                                                                <li class="list active1">
                                                                                                                    <a class="cat" onclick="showCat<?php echo $ban ?>(1)">All</a>
                                                                                                                </li>
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                        <div class="col-md-2">
                                                                                                            <?php
                                                                                                            foreach ($imagesforlisting as $iga1) {

                                                                                                                foreach ($iga1[$opp . $baba] as $index => $aa) {
                                                                                                            ?>
                                                                                                                    <div class="numbertext" id="numbertext<?= $index ?>"> <?= $index + 1 ?> / <?= count($iga1[$opp . $baba]) ?></div>
                                                                                                            <?php

                                                                                                                }
                                                                                                            }
                                                                                                            ?>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>


                                                                                                    <!-- <li class="list ">
                                                                                                    <a class="cat" onclick="showCat<?php echo $x ?>(2)">Room</a>
                                                                                                    </li>
                                                                                                    <li class="list ">
                                                                                                    <a class="cat" onclick="showCat<?php echo $x ?>(3)">Property</a>
                                                                                                    </li> -->

                                                                                                <div style="padding:10px;" class="row myCat<?php echo $x ?>" onclick="currentCat<?php echo $x ?>(1)">
                                                                                                    <?php
                                                                                                    foreach ($imagesforlisting as $iga1) {

                                                                                                        foreach ($iga1[$opp . $baba] as $index => $aa) {
                                                                                                    ?>
                                                                                                            <div class="column" style="height: 57px; width:100px; overflow:hidden; margin-right: 10px; ">
                                                                                                                <img class="demo<?php echo $ban ?> cursor" src="pco/Room Uploads/<?php echo $opp; ?>/<?php echo $baba; ?>/<?php echo $aa; ?>" style="width:100%" onclick="currentSlide<?php echo $ban ?>(<?= $index ?>)" alt="" style="<?php if ($index == 0) {
                                                                                                                                                                                                                                                                                                                                            echo 'border-radius:5px 5px 0px 0px';
                                                                                                                                                                                                                                                                                                                                        } ?>">
                                                                                                            </div>
                                                                                                    <?php

                                                                                                        }
                                                                                                    }
                                                                                                    ?>

                                                                                                </div>
                                                                                                <!-- <div class="row myCat" onclick="currentCat(2)">
                                                                                                <div class="column">
                                                                                                    <img class="demo cursor" src="img/img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                                                                                                </div>
                                                                                                <div class="column">
                                                                                                    <img class="demo cursor" src="img/img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row myCat" onclick="currentCat(3)">
                                                                                                <div class="column">
                                                                                                    <img class="demo cursor" src="img/img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
                                                                                                </div>    
                                                                                                <div class="column">
                                                                                                    <img class="demo cursor" src="img/img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
                                                                                                </div>
                                                                                            </div> -->
                                                                                            </div>
                                                                                            <div clsss="contentcat">

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <script>
                                                                                    let slideIndex<?php echo $x ?> = 1;
                                                                                    showSlides<?php echo $x ?>(slideIndex<?php echo $x ?>);
                                                                                    let catIndex<?php echo $x ?> = 1;
                                                                                    showCat<?php echo $x ?>(catIndex<?php echo $x ?>);

                                                                                    function plusSlides<?php echo $x ?>(n) {
                                                                                        showSlides<?php echo $x ?>(slideIndex<?php echo $x ?> += n);
                                                                                    }

                                                                                    function currentSlide<?php echo $x ?>(n) {
                                                                                        showSlides<?php echo $x ?>(slideIndex<?php echo $x ?> = n);
                                                                                    }

                                                                                    function currentCat<?php echo $x ?>(n) {
                                                                                        showCat<?php echo $x ?>(catIndex<?php echo $x ?> = n);
                                                                                    }

                                                                                    function showSlides<?php echo $x ?>(n) {
                                                                                        let i;
                                                                                        let slides = document.getElementsByClassName("mySlides<?php echo $x ?>");
                                                                                        let dots = document.getElementsByClassName("demo<?php echo $x ?>");
                                                                                        let captionText = document.getElementById("caption<?php echo $x ?>");
                                                                                        let imagesCaptionsCount = document.getElementsByClassName('numbertext');

                                                                                        let counts = images_count<?php echo $x  ?>;;

                                                                                        if (n > slides.length) {
                                                                                            slideIndex<?php echo $x ?> = 1
                                                                                        }
                                                                                        if (n < 1) {
                                                                                            slideIndex<?php echo $x ?> = slides.length
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
                                                                                        slides[slideIndex<?php echo $x ?> - 1].style.display = "block";
                                                                                        imagesCaptionsCount[slideIndex<?php echo $x ?> - 1].style.display = 'block';

                                                                                        dots[slideIndex<?php echo $x ?> - 1].className += " active";
                                                                                        captionText.innerHTML = dots[slideIndex<?php echo $x ?> - 1].alt;
                                                                                    }

                                                                                    function showCat<?php echo $x ?>(n) {
                                                                                        let i;
                                                                                        let catlist = document.getElementsByClassName("myCat<?php echo $x ?>");
                                                                                        let actlist = document.getElementsByClassName("list<?php echo $x ?>");
                                                                                        if (n > catlist.length) {
                                                                                            catIndex<?php echo $x ?> = 1
                                                                                        }
                                                                                        if (n < 1) {
                                                                                            catIndex<?php echo $x ?> = catlist.length
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

                                                                            </div>





                                                                            <div style='border:1px solid #E8E8E8;' class='col-lg-6 col-md-12 col-sm-12 order-2 order-sm-2 order-md-2 order-lg-1'>

                                                                                <style>

                                                                                </style>
                                                                                <div style='padding:10px !important; border-bottom:0px;' class="room_box">
                                                                                    <div style='padding:0 !important;' class="inner_room_meta">
                                                                                        <div class="room_metas">

                                                                                            <div class="room_type">
                                                                                                <nonsense><?php echo $roomsnames[$x]; ?></nonsense>
                                                                                            </div>
                                                                                            <div class="room_type">
                                                                                                <span class="status text-capitalize">available</span>
                                                                                            </div>

                                                                                            <input class='rtp' style='display:none;' name='eachtype[]' value="<?php echo $roomsnames[$x]; ?>">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-control_input">
                                                                                                    <input data-ad='98888888888888888888888888888' data-id='<?php echo $x; ?>' onchange='increaseprice(this); totall(this);' type="number" name='roomseachtype[]' min='0' max='<?php echo $roomsnumbers[$x]; ?>' class="roms98888888888888888888888888888 form-control" value="0">
                                                                                                    <div class="pre_value"><i class="bi bi-people"></i>Rooms:</div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <input class='ava' style='display:none;' value='<?php echo $roomsnumbers[$x]; ?>'/>








                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div style='border:1px solid #E8E8E8; padding-top:22px;<?php if($index == 0 ){echo "border-radius:0px 20px 0px 0px";}?>' class='col-lg-2 col-md-4 col-sm-4 order-0 order-sm-1 order-md-1 order-lg-2' >

                                                                                <?php
                                                                                    $pricecompare = 'Select Dates';
                                                                                    $abc = '';
                                                                                    $sqlprice = "SELECT * FROM setprices WHERE country='$cn'&& location='$ln' && hotel='$hn' && name='$roomsnames[$x]' && (class='FIT' || class='')";
                                                                                    $resultprice = $conn->query($sqlprice);


                                                                                    if ($resultprice->num_rows > 0) {

                                                                                        while ($rowprice = mysqli_fetch_assoc($resultprice)) {
                                                                                            //Included Breakfast or Not Start From here when you return
                                                                                            // END
                                                                                            $period = new DatePeriod(new DateTime($gsdate), new DateInterval('P1D'), new DateTime($gedate));

                                                                                            $check = '0';
                                                                                            foreach ($period as $date) {
                                                                                                $dt = $date->format("Y-m-d");
                                                                                                if (($dt >= $rowprice['sdate'] && $dt <= $rowprice['edate']) || $rowprice['sdate'] = '0000-00-00') {
                                                                                                    //singleprice
                                                                                                    $abashi = $rowprice['sellprice'];

                                                                                                    if ($abashi == '') {


                                                                                                        if ($pricecompare > $rowprice['dblsellprice']) {
                                                                                                            $pricecompare = $rowprice['dblsellprice'];
                                                                                                            $string = $rowprice['including'];


                                                                                                            for ($i = 0; $i < count($taxnametax); $i++) {


                                                                                                                $abe = $taxnametax[$i];
                                                                                                                if (strpos($string, $abe) !== false) {
                                                                                                                } else {
                                                                                                                    if ($choicetax[$i] == 'Percentage') {
                                                                                                                        $abc = $pricecompare / 100 * intval($percentagetax[$i]);
                                                                                                                        $pricecompare = $pricecompare + $abc;
                                                                                                                    } else {
                                                                                                                        if ($choicetax[$i] == 'Amount') {
                                                                                                                            $abc = intval($percentagetax[$i]);
                                                                                                                            $pricecompare = $pricecompare + $abc;
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }    //DOUBLEPRICE
                                                                                                    else {

                                                                                                        if ($pricecompare > $rowprice['sellprice']) {
                                                                                                            $pricecompare = $rowprice['sellprice'];



                                                                                                            $string = $rowprice['including'];


                                                                                                            for ($i = 0; $i < count($taxnametax); $i++) {


                                                                                                                $abe = $taxnametax[$i];
                                                                                                                if (strpos($string, $abe) !== false) {
                                                                                                                } else {
                                                                                                                    if ($choicetax[$i] == 'Percentage') {
                                                                                                                        $abc = $pricecompare / 100 * intval($percentagetax[$i]);
                                                                                                                        $pricecompare = $pricecompare + $abc;
                                                                                                                    } else {
                                                                                                                        if ($choicetax[$i] == 'Amount') {
                                                                                                                            $abc = intval($percentagetax[$i]);
                                                                                                                            $pricecompare = $pricecompare + $abc;
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }

                                                                                                    $check = '0';
                                                                                                }
                                                                                            }

                                                                                            $atbab = $rowprice['breakfast'];
                                                                                        }
                                                                                    } else {
                                                                                        $pricecompare = 'Price Unavailable';
                                                                                    }



                                                                                    if (intval($pricecompare) == 0) {
                                                                                    } else {
                                                                                        //$pricecompare='aaa';

                                                                                        $startTimeStampzul = strtotime($gsdate);
                                                                                        $endTimeStampzul = strtotime($gedate);



                                                                                        $timeDiffzul = abs($endTimeStampzul - $startTimeStampzul);

                                                                                        $numberDayszul = $timeDiffzul / 86400;  // 86400 seconds in one day

                                                                                        $pricecompare = intval($pricecompare) * $numberDayszul;
                                                                                    }

                                                                                ?>

                                                                            
                                                                                <input name='breakfastt[]' value='<?php echo $atbab ?>' style='display:none;'>
                                                                                <input style='display:none;' id="pricevalz<?php echo $x; ?>" value="<?php echo $pricecompare; ?>">

                                                                                <h4 align='center' style='color:#DC3545; font-size:30px; font-weight:bold !important;'><?php

                                                                                                                            if ($gsdate == '' || $gedate == '') {
                                                                                                                            } else {

                                                                                                                                echo 'AED ';
                                                                                                                            }
                                                                                                                            ?></h4>
                                                                                <h4 align='center' style='color:#DC3545; font-size:30px; font-weight:bold !important;' id='prc<?php echo $x; ?>'><?php echo $pricecompare; ?></h4>
                                                                                <p align='center'> <span align='center' style='font-size:14px; color:#696969;'><?php echo $numberDayszul; ?> Nights</span></p>




                                                                            </div>




                                                                        </div>


                                                                <?php
                                                                        $adios = $adios + 1;
                                                                    
                                                                }




                                                                ?>


                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <?php $acb = $acb + 1; ?>
                                                                <style>
                                                                    .theme_btnNew {
                                                                        color: white; 
                                                                        border-color: white;
                                                                        padding: 0.8em 3em;
                                                                        background-color: #DC3545;
                                                                    }
                                                                    .theme_btnNew:hover{
                                                                        color: black; 
                                                                        border-color: #DC3545;
                                                                        padding: 0.8em 3em;
                                                                        background-color: white;
                                                                    }
                                                                </style>
                                                        <input type='submit' name='submit'  class="theme_btnNew btn  bookNewBtn" value='Book Now'>           
                                                
                                                </form>
                                                </div>

                                        <?php
                                        } else {
                                            if ($_SESSION['hotel'] != '') {
                                                echo 'No Room Available for These Specifications';
                                            }
                                        }
                                        ?>
                                        


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
                                                                        <img src="pco/Hotel Images/<?php echo $ghotel; ?>/<?php echo $images[$x]; ?>" alt="">
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


                                        <!-- amenities modal -->
                                        <div class="modal fade amenitiesModal" tabindex="-1" aria-labelledby="amenitiesModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="amenitiesModal">Amenities</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <p class="small text-black-50 lh-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, ut! Deleniti, sed. Exercitationem, a hic dolorum quod deleniti iusto delectus sint voluptate, tempora repellat animi aspernatur accusamus, laborum accusantium? Aspernatur.</p>
                                                        </div>
                                                        <ul class="small">
                                                            <li class="my-2 text-black-75">24-Hour room service</li>
                                                            <li class="my-2 text-black-75">Free wireless internet access</li>
                                                            <li class="my-2 text-black-75">Complimentary use of hotel bicycle</li>
                                                            <li class="my-2 text-black-75">Laundry service</li>
                                                            <li class="my-2 text-black-75">Tour & excursions</li>
                                                            <li class="my-2 text-black-75">24 Hour concierge</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of amenities modal -->


                                        <!--hotel item end-->

                                        
                                        <!-- SUGGESTIONS-->

                                        <?php
                                        $adios = 42000;
                                        $acb = 47378342833;
                                        $millionaire = 59999;
                                        if (!empty($selectedhotels)) {


                                            if ($_SESSION['hotel'] != '') {
                                        ?>

                                                <br /><br />

                                                <h4>Other Available Hotels:</h4>


                                            

                                            <?php
                                            }
                                            $detailss = 0;
                                            $nds = 0;
                                            $gals = 4000;
                                            foreach ($selectedhotels as $dd) {
                                            ?>

                                                <div style='border-radius:25px;' class="searchitem">

                                                    <div class="item_details" style="border-right: 1px solid rgba(0, 0, 0, 0.3);  padding-top: 15px; padding-left:22px; padding-right:22px;">
                                                        <div class="item_main_title">
                                                            <h2 style='font-weight:500; color:black; float:left;'><?php echo $dd; ?>&nbsp;&nbsp;</h2>

                                                        </div>
                                                        <div class="reviews">
                                                            <ul class="rating">
                                                                <?php
                                                                for ($x = 0; $x < $selectedstars[$nds]; $x++) {

                                                                ?>
                                                                    <li><i class="bi bi-star-fill"></i></li>
                                                                <?php
                                                                }
                                                                ?>

                                                            </ul>
                                                            <span><?php echo $selectedstars[$nds]; ?> Star Hotel</span>


                                                        </div>
                                                        <span class="item_address"><i class="bi bi-geo-alt me-1"></i><?php echo $selectedcities[$nds]; ?>, <?php echo $selectedcountries[$nds]; ?></span>
                                                        <div class="room_galary">
                                                            <?php





                                                            $sqllgz = "SELECT * FROM hotelsdatabaseimages WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
                                                            $resulttgz = $conn->query($sqllgz);

                                                            if ($resulttgz->num_rows > 0) {
                                                                // output data of each row
                                                                while ($rowwgz = $resulttgz->fetch_assoc()) {

                                                                    $zi = $rowwgz['image'];
                                                            ?>


                                                                    <a href="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi; ?>" data-lightbox="room_gal_<?php echo $gals; ?>">

                                                                        <img src="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi; ?>" alt="">
                                                                    </a>
                                                            <?php
                                                                }
                                                            }
                                                            ?>





                                                        </div>
                                                        <div class='room-amenities'>
                                                            <?php echo mb_strimwidth($selecteddesi[$nds], 0, 190, "..."); ?>
                                                            <a  href='hotelsingle.php?hotel=<?php echo $dd; ?>&city=<?php echo $selectedcities[$nds];?>&country=<?php echo $selectedcountries[$nds];?>&sendcategory=<?php echo $selectedstars[$nds]; ?>'>See More</a>
                                                        </div>
                                                        

                                                       
                                                        <div class="row col-md-12" style="position:absolute; bottom:0;">
                                                            


                                                            
                                                            
                                                        <ul id="menu" style="padding:0px; ">

                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Resturant&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Spa&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Activites&nbsp;&nbsp;</span></li>
                                                            <li><span class="btnNew"><i class="fa fa-home"></i> &nbsp;&nbsp;Other&nbsp;&nbsp;</span></li>
                                                        </ul>
                                                           
                                                            
                                                            
                                                            
                                                           
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    




















                                                    <?php $gals = $gals + 1; ?>




                                                    <form class='notranslate' action='#' method='POST' style="position:relative;">


                                                        <input style='display:none;' name='ghotelss' value='<?php echo $dd; ?>'>

                                                        <input style='display:none;' name='gamagama' value='<?php echo $selectedcities[$nds]; ?>'>
                                                        <input style='display:none;' name='gamagamastar' value='<?php echo $selectedstars[$nds]; ?>'>


                                                        <input style='display:none;' name='changecityinput' id='changehotel' value='<?php echo $selectedcities[$nds]; ?>'>
                                                        <input style='display:none;' name='changestarinput' id='changehotel' value='<?php echo $selectedstars[$nds]; ?>'>

                                                        <input style='display:none;' name='changehotelinput' id='changehotel' value='<?php echo $dd; ?>'>
                                                        <input style='display:none;' name='roomsrecieved' id='roomsrecieved' value='<?php echo $roomsrecieved; ?>'>

                                                        <div class="row" >
                                                            <div style='display:flex; border: none !important; padding-top:15px; padding-bottom:65px;' class="other_room_list" >

                                                                <div style="min-width:100%; height:auto;">
                                                                    <?php
                                                                    $newroomsgals = 90000;

                                                                    foreach ($allroomtypess as $ff) {
                                                                        foreach ($ff[$dd] as $index=>$bb) {

                                                                            $newroomsgals = $newroomsgals + 1;
                                                                            $millionaire = $millionaire + 1;
                                                                    ?>



                                                                            <div class='row d-flex ' style="margin-bottom:10px;">


                                                                                <div class='col-lg-4 col-md-8 col-sm-8 order-1 order-md-0 order-lg-0  p-0'>



                                                                                    <?php
                                                                                    $ig = array();
                                                                                    $rmvs = $bb;
                                                                                    $sqlimgsv = "SELECT * FROM hotelsInventoryImagesdatabase WHERE hotel='$dd' && country='$selectedcountries[$nds]' && location='$selectedcities[$nds]' && type='$rmvs'";

                                                                                    $resultimgsv = $conn->query($sqlimgsv);

                                                                                    if ($resultimgsv->num_rows > 0) {
                                                                                        // output data of each row
                                                                                        while ($rowimgsv = $resultimgsv->fetch_assoc()) {

                                                                                            array_push($ig, $rowimgsv['image']);
                                                                                        }
                                                                                    }
                                                                                    ?>

                                                                                    <div style=' margin:0 auto;  ' class="room_box_img">
                                                                                     <a href='#' data-bs-toggle="modal" data-bs-target=".roomamsModal<?php echo $millionaire; ?>">
                                                                                            <img src="pco/Room Uploads/<?php echo $dd; ?>/<?php echo $rmvs; ?>/<?php echo $ig[0]; ?>" alt="" >
                                                                                        </a>
                                                                                    </div>

                                                                                </div>





                                                                                <div style='border:1px solid #E8E8E8;' class='col-lg-6 col-md-12 col-sm-12 order-2 order-sm-2 order-md-2 order-lg-1'>

                                                                                    <style>

                                                                                    </style>
                                                                                    <div style='padding:10px !important; border-bottom:0px;' class="room_box">
                                                                                        <div style='padding:0 !important;' class="inner_room_meta">
                                                                                            <div class="room_metas">

                                                                                                <div class="room_type">
                                                                                                    <nonsense><?php echo $bb; ?></nonsense>
                                                                                                </div>
                                                                                                <div class="room_type">
                                                                                                    <span class="status text-capitalize">available</span>
                                                                                                </div>

                                                                                                <input class='rtp' style='display:none;' name='eachtype[]' value="<?php echo $bb ?>">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-control_input">
                                                                                                        <input data-ad='<?php echo $acb; ?>' data-id='<?php echo $adios; ?>' onchange='increaseprice(this); totall(this);' type="number" name='roomseachtype[]' min='0' max='<?php echo $roomsnumbers[$adios]; ?>' class="roms<?php echo $acb; ?> form-control" value="0">
                                                                                                        <div class="pre_value"><i class="bi bi-people"></i>Rooms:</div>
                                                                                                    </div>
                                                                                                </div>








                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>



                                                                                <div style='border:1px solid #E8E8E8;<?php if($index == 0 ){echo "border-radius:0px 20px 0px 0px";}?>' class='col-lg-2 col-md-4 col-sm-4 order-0 order-sm-1 order-md-1 order-lg-2' >



                                                                                    <?php
                                                                                    $pricecompare = 'Select Dates';
                                                                                    $sqlprice = "SELECT * FROM setprices WHERE country='$selectedcountries[$nds]' && location='$selectedcities[$nds]' && hotel='$dd' && name='$bb' && (class='FIT' || class='')";




                                                                                    $resultprice = $conn->query($sqlprice);


                                                                                    if ($resultprice->num_rows > 0) {

                                                                                        while ($rowprice = mysqli_fetch_assoc($resultprice)) {

















                                                                                            $period = new DatePeriod(new DateTime($gsdate), new DateInterval('P1D'), new DateTime($gedate));

                                                                                            $check = '0';
                                                                                            foreach ($period as $date) {
                                                                                                $dt = $date->format("Y-m-d");


                                                                                                if (($dt >= $rowprice['sdate'] && $dt <= $rowprice['edate']) || $rowprice['sdate'] = '0000-00-00') {

                                                                                                    //SINGLE

                                                                                                    $abashi = $rowprice['sellprice'];


                                                                                                    if ($abashi == '') {

                                                                                                        if ($pricecompare > $rowprice['dblsellprice']) {
                                                                                                            $pricecompare = $rowprice['dblsellprice'];








                                                                                                            $string = $rowprice['including'];


                                                                                                            for ($i = 0; $i < count($taxnametax); $i++) {


                                                                                                                $abe = $taxnametax[$i];
                                                                                                                if (strpos($string, $abe) !== false) {
                                                                                                                } else {
                                                                                                                    if ($choicetax[$i] == 'Percentage') {
                                                                                                                        $abc = $pricecompare / 100 * intval($percentagetax[$i]);
                                                                                                                        $pricecompare = $pricecompare + $abc;
                                                                                                                    } else {
                                                                                                                        if ($choicetax[$i] == 'Amount') {
                                                                                                                            $abc = intval($percentagetax[$i]);
                                                                                                                            $pricecompare = $pricecompare + $abc;
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }





                                                                                                    //DOUBLE
                                                                                                    else {


                                                                                                        if ($pricecompare > $rowprice['sellprice']) {
                                                                                                            $pricecompare = $rowprice['sellprice'];








                                                                                                            $string = $rowprice['including'];


                                                                                                            for ($i = 0; $i < count($taxnametax); $i++) {


                                                                                                                $abe = $taxnametax[$i];
                                                                                                                if (strpos($string, $abe) !== false) {
                                                                                                                } else {
                                                                                                                    if ($choicetax[$i] == 'Percentage') {
                                                                                                                        $abc = $pricecompare / 100 * intval($percentagetax[$i]);
                                                                                                                        $pricecompare = $pricecompare + $abc;
                                                                                                                    } else {
                                                                                                                        if ($choicetax[$i] == 'Amount') {
                                                                                                                            $abc = intval($percentagetax[$i]);
                                                                                                                            $pricecompare = $pricecompare + $abc;
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }




                                                                                                    $check = '0';
                                                                                                }
                                                                                            }







                                                                                            $atbab = $rowprice['breakfast'];
                                                                                        }
                                                                                    } else {
                                                                                        $pricecompare = 'Unavailable';
                                                                                    }


                                                                                    if (intval($pricecompare) == 0) {
                                                                                    } else {
                                                                                        //$pricecompare='aaa';

                                                                                        $startTimeStampzul = strtotime($gsdate);
                                                                                        $endTimeStampzul = strtotime($gedate);



                                                                                        $timeDiffzul = abs($endTimeStampzul - $startTimeStampzul);

                                                                                        $numberDayszul = $timeDiffzul / 86400;  // 86400 seconds in one day

                                                                                        $pricecompare = intval($pricecompare) * $numberDayszul;
                                                                                    }

                                                                                    ?>
                                                                                    <input name='breakfastt[]' value='<?php echo $atbab ?>' style='display:none;'>
                                                                                    <br />
                                                                                    <h4 align='center' style='color:#DC3545; font-size:30px; font-weight:bold !important;'><?php

                                                                                                                                if ($gsdate == '' || $gedate == '') {
                                                                                                                                } else {

                                                                                                                                    echo 'AED ';
                                                                                                                                }
                                                                                                                                ?></h4>
                                                                                    <h4 align='center' style='color:#DC3545; font-size:30px; font-weight:bold !important;' id='prc<?php echo $adios; ?>'><?php echo $pricecompare; ?></h4>
                                                                                    <p align='center'> <span align='center' style='font-size:14px; color:#696969;'><?php echo $numberDayszul; ?> Nights</span></p>

                                                                                    <input style='display:none;' type='text' value='<?php echo $pricecompare; ?>' id='pricevalz<?php echo $adios; ?>'>




                                                                                </div>




                                                                            </div>


                                                                    <?php
                                                                            $adios = $adios + 1;
                                                                        }
                                                                    }




                                                                    ?>


                                                                </div>


                                                            </div>
                                                        </div>

                                                        
                                                        <?php $acb = $acb + 1; ?>
                                                                    <style>
                                                                        .theme_btnNew {
                                                                            color: white; 
                                                                            border-color: white;
                                                                            padding: 0.8em 3em;
                                                                            background-color: #DC3545;
                                                                        }
                                                                        .theme_btnNew:hover{
                                                                            color: black; 
                                                                            border-color: #DC3545;
                                                                            padding: 0.8em 3em;
                                                                            background-color: white;
                                                                        }
                                                                    </style>
                                                             <input type='submit' name='submit'  class="theme_btnNew btn  bookNewBtn" value='Book Now'>           
                                                       
                                                    </form>
                                                </div>













                                                <!-- HOTEL MODEL DETAILSS-->


                                                <!-- hotel details modal -->
                                                <div class="modal fade detailsModal<?php echo $detailss; ?> modal-dialog-scrollable" tabindex="-1" aria-labelledby="detailsModal<?php echo $detailss; ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailsModal"><?php echo $dd; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="item_details">
                                                                    <div class="item_main_title">
                                                                        <h2><?php echo $dd; ?></h2>

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




                                                                        $sqllgz2 = "SELECT * FROM hotelsdatabaseimages WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
                                                                        $resulttgz2 = $conn->query($sqllgz2);

                                                                        if ($resulttgz2->num_rows > 0) {
                                                                            // output data of each row
                                                                            while ($rowwgz2 = $resulttgz2->fetch_assoc()) {

                                                                                $zi2 = $rowwgz2['image'];








                                                                        ?>


                                                                                <a href="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi2; ?>" data-lightbox="room_gal_1">
                                                                                    <img src="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi2; ?>" alt="">
                                                                                </a>
                                                                        <?php
                                                                            }
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

                                                                        <?php
                                                                        $sqldes = "SELECT * FROM hotelsdatabase WHERE name='$dd' && country='$selectedcountries[$nds]' && city='$selectedcities[$nds]'";
                                                                        $resultdes = $conn->query($sqldes);

                                                                        if ($resultdes->num_rows > 0) {
                                                                            // output data of each row
                                                                            while ($rowdes = $resultdes->fetch_assoc()) {
                                                                        ?>



                                                                                <h6>About Hotel:</h6>

                                                                        <?php
                                                                                echo $rowdes['description'];

                                                                                $generalf2 = $rowdes['generalfacilities'];

                                                                                $mainf2 = $rowdes['mainfacilities'];

                                                                                $frontf2 = $rowdes['frontdeskfacilities'];

                                                                                $familyf2 = $rowdes['familyfacilities'];
                                                                                $sportsf2 = $rowdes['sportsfacilities'];
                                                                                $cleaningf2 = $rowdes['cleaningfacilities'];

                                                                                $foodf2 = $rowdes['foodfacilities'];
                                                                                $businessf2 = $rowdes['businessfacilities'];
                                                                                $internetf2 = $rowdes['internetfacilities'];
                                                                                $parkingf2 = $rowdes['parkingfacilities'];

                                                                                $uniquef2 = $rowdes['uniquefacilities'];
                                                                                $safetyf2 = $rowdes['safetyfacilities'];
                                                                            }
                                                                        }

                                                                        ?>




                                                                    </div>
                                                                    <br /><br />



                                                                    <div class='container'>
                                                                        <div class='row'>


                                                                            <h5 align=center>Facilities</h5><br /><br />

                                                                            <?php
                                                                            if ($generalf2 != '') {
                                                                            ?>
                                                                                <div class='col-sm'>
                                                                                    <label>General:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $generalf2);

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

                                                                            if ($mainf2 != '') {
                                                                            ?>
                                                                                <div class='col-sm'>
                                                                                    <label>Main:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $mainf2);

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

                                                                            if ($frontf2 != '') {
                                                                            ?>
                                                                                <div class='col-sm'>
                                                                                    <label>Front Desk:</label>
                                                                                    <ul class="small text-black-50">
                                                                                        <?php

                                                                                        $gf = explode(",", $frontf2);

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

                                                                            if ($familyf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Family:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $familyf2);

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

                                                                            if ($sportsf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Sports:</label>
                                                                                    <ul class="small text-black-50">
                                                                                        <?php

                                                                                        $gf = explode(",", $sportsf2);

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

                                                                            if ($cleaningf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Cleaning:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $cleaningf2);

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

                                                                            if ($foodf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Food:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $foodf2);

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

                                                                            if ($businessf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Business:</label>
                                                                                    <ul class="small text-black-50">


                                                                                        <?php

                                                                                        $gf = explode(",", $businessf2);

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

                                                                            if ($internetf2 != '') {
                                                                            ?>



                                                                                <div class='col-sm'>
                                                                                    <label>Internet:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $internetf2);

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

                                                                            if ($parkingf2 != '') {
                                                                            ?>

                                                                                <div class='col-sm'>
                                                                                    <label>Parking:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $parkingf2);

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

                                                                            if ($uniquef2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Unique:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $uniquef2);

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

                                                                            if ($safetyf2 != '') {
                                                                            ?>


                                                                                <div class='col-sm'>
                                                                                    <label>Safety:</label>
                                                                                    <ul class="small text-black-50">

                                                                                        <?php

                                                                                        $gf = explode(",", $safetyf2);

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



                                                <!--END-->
















                                        <?php
                                                $nds = $nds + 1;
                                            }
                                        }
                                        ?>



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
                                                display: none;
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
                                                background-color: rgba(255, 0, 0, 0.4);;
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
                                            .infoBox{
                                                border:2px solid #DC3545;
                                                color:black;
                                                padding:6px;
                                                text-align: center;
                                                margin-right:10px;

                                            }
                                            .infoBox:hover{
                                                border:2px solid white;
                                                color:white;
                                                background: #DC3545;
                                                padding:6px;
                                                
                                                
                                            }
                                        </style>





                                        <?php
                                        $cnna = 0;
                                        $ida = -1;
                                        $ban = 60000;
                                        $jg = 0;
                                        foreach ($selectedhotels as $opp) {

                                            foreach ($allroomtypess as $fafa) {
                                                foreach ($fafa[$opp] as $baba) {

                                                    $ida = $ida + 1;
                                        ?>


                                                    <div class="modal fade roomamsModal<?php echo $ban; ?>" tabindex="-1" aria-labelledby="roomamsModal" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl " style="margin-top:auto; margin-bottom:auto;">
                                                            <div class="modal-content" style="border-radius:25px; background:black;">
                                                                <div class="container-lg contentcat" style="background: rgb(42, 42, 58);">
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
                                                                            <?php
                                                                            foreach ($imagesforlisting as $iga1) {

                                                                                foreach ($iga1[$opp . $baba] as $index => $aa) {
                                                                            ?>
                                                                                    <div class="mySlidesCss mySlides<?php echo $ban ?>">
                                                                                        <img src="pco/Room Uploads/<?php echo $opp; ?>/<?php echo $baba; ?>/<?php echo $aa; ?>" style="width:100%">

                                                                                    </div>
                                                                            <?php

                                                                                }
                                                                            }
                                                                            ?>
                                                                            <a class="prevs" onclick="plusSlides<?php echo $ban ?>(-1)">❮</a>
                                                                            <a class="nexts" onclick="plusSlides<?php echo $ban ?>(1)">❯</a>
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
                                                                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home<?php echo $ban; ?>" type="button" role="tab" aria-controls="home" style='color:red;' aria-selected="true">Description</button>
                                                                                        </li>
                                                                                        <li class="nav-item" role="presentation">
                                                                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile<?php echo $ban; ?>" type="button" role="tab" aria-controls="profile" style='color:red;' aria-selected="false">Amenities</button>
                                                                                        </li>
                                                                                        <li class="nav-item" role="presentation">
                                                                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact<?php echo $ban; ?>" type="button" role="tab" aria-controls="contact" style='color:red;' aria-selected="false">Policies</button>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <div class="tab-content" id="myTabContent">
                                                                                        <div class="tab-pane fade show active" id="home<?php echo $ban; ?>" role="tabpanel" aria-labelledby="home-tab">
                                                                                            <div class="row pt-2">
                                                                                                <div class="col-md-6">
                                                                                                    <p class="infoBox">
                                                                                                        <span style="float:left;">
                                                                                                            Sleeps
                                                                                                        </span>  
                                                                                                        <span >  
                                                                                                        <?php
                                                                                                        

                                                                                                        foreach ($adultsallowednew as $abc) {
                                                                                                            $adultsforu = $abc[$opp . $baba];
                                                                                                            for ($ac = 0; $ac < intval($adultsforu); $ac++) {
                                                                                                        ?>
                                                                                                                <img style='max-width:8px;' src="img/terms/terms_icon_22.png">

                                                                                                            <?php
                                                                                                            }
                                                                                                        }
                                                                                                        foreach ($childrenallowednew as $abc2) {
                                                                                                            $childrenforu = $abc2[$dd . $rmvs];
                                                                                                            for ($ac = 0; $ac < intval($childrenforu); $ac++) {
                                                                                                            ?>
                                                                                                                <img style='max-width:8px;' src="img/terms/terms_icon_3333.png">
                                                                                                        <?php
                                                                                                            }
                                                                                                        }
                                                                                                        ?></span>  

                                                                                                    </p>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <p class="infoBox"> 
                                                                                                        <span style="float:left;">
                                                                                                            Room Size
                                                                                                        </span>
                                                                                                        <span>                                                           
                                                                                                        <?php

                                                                                                        foreach ($roomsizesnew as $abbc2) {
                                                                                                            $roomsizesn = $abbc2[$opp . $baba];
                                                                                                            if ($roomsizesn != '') {
                                                                                                                for ($ac = 0; $ac < count($roomsizesn); $ac++) {
                                                                                                        ?>
                                                                                                        <nonsense style='font-size:14px; '><?php echo $roomsizesn; ?></nonsense>
                                                                                                        <?php
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                        ?>
                                                                                                        </span>
                                                                                                    </p>


                                                                                                </div>
                                                                                            </div>












                                                                                            <h6><?php

                                                                                                foreach ($allroomtypessdesc[$cnna] as $bn) {
                                                                                                    echo $bn;
                                                                                                }





                                                                                                ?></h6>


                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="profile<?php echo $ban; ?>" role="tabpanel" aria-labelledby="profile-tab">


                                                                                            <br />

                                                                                            <div>


                                                                                                <div class='container'>
                                                                                                    <div class='row'>



                                                                                                        <?php
                                                                                                        foreach ($allroomtypessinroomf as $inroom) {
                                                                                                            if (!empty($inroom[$opp . $baba])) {
                                                                                                        ?>


                                                                                                                <div class='col-sm'>
                                                                                                                    <label>In Room:</label>
                                                                                                                    <ul class="small text-black-50">

                                                                                                                        <?php

                                                                                                                        $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                        for ($p = 0; $p < count($gf); $p++) {
                                                                                                                        ?>

                                                                                                                            <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                        <?php

                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>



                                                                                                        <?php



                                                                                                            }
                                                                                                        }
                                                                                                        ?>






                                                                                                        <?php
                                                                                                        foreach ($allroomtypesskitchenf as $inroom) {
                                                                                                            if (!empty($inroom[$opp . $baba])) {
                                                                                                        ?>


                                                                                                                <div class='col-sm'>
                                                                                                                    <label>Kitchen:</label>
                                                                                                                    <ul class="small text-black-50">

                                                                                                                        <?php

                                                                                                                        $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                        for ($p = 0; $p < count($gf); $p++) {
                                                                                                                        ?>

                                                                                                                            <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                        <?php

                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>



                                                                                                        <?php



                                                                                                            }
                                                                                                        }
                                                                                                        ?>





                                                                                                        <?php
                                                                                                        foreach ($allroomtypessprivatebathroomfities as $inroom) {
                                                                                                            if (!empty($inroom[$opp . $baba])) {
                                                                                                        ?>


                                                                                                                <div class='col-sm'>
                                                                                                                    <label>Private Bathroom:</label>
                                                                                                                    <ul class="small text-black-50">

                                                                                                                        <?php

                                                                                                                        $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                        for ($p = 0; $p < count($gf); $p++) {
                                                                                                                        ?>

                                                                                                                            <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                        <?php

                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>



                                                                                                        <?php



                                                                                                            }
                                                                                                        }
                                                                                                        ?>








                                                                                                        <?php
                                                                                                        foreach ($allroomtypessdiscountedf as $inroom) {
                                                                                                            if (!empty($inroom[$opp . $baba])) {
                                                                                                        ?>


                                                                                                                <div class='col-sm'>
                                                                                                                    <label>Discounts:</label>
                                                                                                                    <ul class="small text-black-50">

                                                                                                                        <?php

                                                                                                                        $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                        for ($p = 0; $p < count($gf); $p++) {
                                                                                                                        ?>

                                                                                                                            <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                        <?php

                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>



                                                                                                        <?php



                                                                                                            }
                                                                                                        }
                                                                                                        ?>





                                                                                                        <?php
                                                                                                        foreach ($allroomtypesscomplimentaryfies as $inroom) {
                                                                                                            if (!empty($inroom[$opp . $baba])) {
                                                                                                        ?>


                                                                                                                <div class='col-sm'>
                                                                                                                    <label>Complementary:</label>
                                                                                                                    <ul class="small text-black-50">

                                                                                                                        <?php

                                                                                                                        $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                                        for ($p = 0; $p < count($gf); $p++) {
                                                                                                                        ?>

                                                                                                                            <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                                        <?php

                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>



                                                                                                        <?php



                                                                                                            }
                                                                                                        }
                                                                                                        ?>






                                                                                                    </div>
                                                                                                </div>






                                                                                            </div>











                                                                                        </div>
                                                                                        <div class="tab-pane fade" id="contact<?php echo $ban; ?>" role="tabpanel" aria-labelledby="contact-tab">
                                                                                            <br />
                                                                                            <?php


                                                                                            $anotherarray = array();
                                                                                            $anotherarray2 = array();



                                                                                            foreach ($allroomtypesscancellationnames as $mkm) {


                                                                                                if (!empty($mkm[$opp . $baba])) {
                                                                                                    array_push($anotherarray, $mkm[$opp . $baba]);
                                                                                                }
                                                                                            }

                                                                                            foreach ($allroomtypesscancellation as $mkma) {

                                                                                                if (!empty($mkma[$opp . $baba])) {
                                                                                                    array_push($anotherarray2, $mkma[$opp . $baba]);
                                                                                                }
                                                                                            }



                                                                                            $o1 = explode('_@_', $anotherarray[0]);
                                                                                            $o2 = explode('_@_', $anotherarray2[0]);




                                                                                            $he = 0;

                                                                                            for ($u = 0; $u < count($o1); $u++) {


                                                                                                echo '<h4>' . $o1[$he] . '</h4>';

                                                                                                echo '<p>' . $o2[$he] . '</p>';
                                                                                                echo '<br/>';


                                                                                                $he = $he + 1;
                                                                                            }

                                                                                            ?>



                                                                                        </div>
                                                                                    </div>


                                                                                    <!-- </div> -->
                                                                                </div>

                                                                                <div class="btn-bg">
                                                                                <a  href='hotelsingle.php?hotel=<?php echo $opp; ?>&city=<?php echo $selectedcities[$cnna];?>&country=<?php echo $selectedcountries[$cnna];?>&sendcategory=<?php echo $selectedstars[$cnna]; ?>'>
                                                                                    
                                                                                    <button class="btn btn-danger" type="button">View Property </button></a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="row col-md-12 list-c-main">
                                                                            <div class="col-md-10">
                                                                                <ul class="list-c">
                                                                                    <li class="list active1">
                                                                                        <a class="cat" onclick="showCat<?php echo $ban ?>(1)">All</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <?php
                                                                                foreach ($imagesforlisting as $iga1) {

                                                                                    foreach ($iga1[$opp . $baba] as $index => $aa) {
                                                                                ?>
                                                                                        <div class="numbertext" id="numbertext<?= $index ?>"> <?= $index + 1 ?> / <?= count($iga1[$opp . $baba]) ?></div>
                                                                                <?php

                                                                                    }
                                                                                }
                                                                                ?>

                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- <li class="list ">
                                                                <a class="cat" onclick="showCat<?php echo $ban ?>(2)">Room</a>
                                                                </li>
                                                                <li class="list ">
                                                                <a class="cat" onclick="showCat<?php echo $ban ?>(3)">Property</a>
                                                                </li> -->

                                                                    <div style="padding:10px;" class="row myCat<?php echo $ban ?>" onclick="currentCat<?php echo $ban ?>(1)">
                                                                        <?php
                                                                        foreach ($imagesforlisting as $iga1) {

                                                                            foreach ($iga1[$opp . $baba] as $index => $aa) {
                                                                        ?>
                                                                                <div class="column" style="height: 57px; width:100px; overflow:hidden; margin-right: 10px; ">
                                                                                    <img class="demo<?php echo $ban ?> cursor" src="pco/Room Uploads/<?php echo $opp; ?>/<?php echo $baba; ?>/<?php echo $aa; ?>" style="width:100%" onclick="currentSlide<?php echo $ban ?>(<?= $index ?>)" alt="" style="<?php if ($index == 0) {
                                                                                                                                                                                                                                                                                                                echo 'border-radius:5px 5px 0px 0px';
                                                                                                                                                                                                                                                                                                            } ?>">
                                                                                </div>
                                                                        <?php

                                                                            }
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                    <!-- <div class="row myCat" onclick="currentCat(2)">
                                                                    <div class="column">
                                                                        <img class="demo cursor" src="img/img_mountains.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                                                                    </div>
                                                                    <div class="column">
                                                                        <img class="demo cursor" src="img/img_lights.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                                                                    </div>
                                                                </div>
                                                                <div class="row myCat" onclick="currentCat(3)">
                                                                    <div class="column">
                                                                        <img class="demo cursor" src="img/img_nature.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
                                                                    </div>    
                                                                    <div class="column">
                                                                        <img class="demo cursor" src="img/img_snow.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
                                                                    </div>
                                                                </div> -->
                                                                </div>
                                                                <div clsss="contentcat">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                    </div>
                                    <script>
                                        var images_count<?php echo $ban  ?> = 0;
                                    </script>
                                    <?php
                                                    foreach ($imagesforlisting as $iga1) {

                                                        foreach ($iga1[$opp . $baba] as $index => $aa) {
                                    ?>
                                            <script>
                                                images_count<?php echo $ban  ?> = images_count<?php echo $ban  ?> + 1;
                                            </script>
                                    <?php

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

                                        <!-- room ams modal -->
                                        <!-- <div class="modal fade roomamsModal<?php echo $ban; ?>" tabindex="-1" aria-labelledby="roomamsModal" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">




                                                                            <?php echo $roomsnames[$x]; ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <style>
                                                                            li .active {
                                                                                color: black !important;
                                                                            }
                                                                        </style>

                                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home<?php echo $ban; ?>" type="button" role="tab" aria-controls="home" style='color:red;' aria-selected="true">Description</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile<?php echo $ban; ?>" type="button" role="tab" aria-controls="profile" style='color:red;' aria-selected="false">Amenities</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact<?php echo $ban; ?>" type="button" role="tab" aria-controls="contact" style='color:red;' aria-selected="false">Policies</button>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content" id="myTabContent">
                                                                            <div class="tab-pane fade show active" id="home<?php echo $ban; ?>" role="tabpanel" aria-labelledby="home-tab">

                                                                                <br />



                                                                                <?php


                                                                                foreach ($imagesforlisting as $iga1) {

                                                                                    foreach ($iga1[$opp . $baba] as $aa) {
                                                                                        echo $aa;
                                                                                    }
                                                                                }
                                                                                ?>


                                                                                <h6><?php

                                                                                    foreach ($allroomtypessdesc[$cnna] as $bn) {
                                                                                        echo $bn;
                                                                                    }





                                                                                    ?></h6>


                                                                            </div>
                                                                            <div class="tab-pane fade" id="profile<?php echo $ban; ?>" role="tabpanel" aria-labelledby="profile-tab">


                                                                                <br />

                                                                                <div>













                                                                                    <div class='container'>
                                                                                        <div class='row'>



                                                                                            <?php
                                                                                            foreach ($allroomtypessinroomf as $inroom) {
                                                                                                if (!empty($inroom[$opp . $baba])) {
                                                                                            ?>


                                                                                                    <div class='col-sm'>
                                                                                                        <label>In Room:</label>
                                                                                                        <ul class="small text-black-50">

                                                                                                            <?php

                                                                                                            $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                            for ($p = 0; $p < count($gf); $p++) {
                                                                                                            ?>

                                                                                                                <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                            <?php

                                                                                                            }
                                                                                                            ?>
                                                                                                        </ul>
                                                                                                    </div>



                                                                                            <?php



                                                                                                }
                                                                                            }
                                                                                            ?>






                                                                                            <?php
                                                                                            foreach ($allroomtypesskitchenf as $inroom) {
                                                                                                if (!empty($inroom[$opp . $baba])) {
                                                                                            ?>


                                                                                                    <div class='col-sm'>
                                                                                                        <label>Kitchen:</label>
                                                                                                        <ul class="small text-black-50">

                                                                                                            <?php

                                                                                                            $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                            for ($p = 0; $p < count($gf); $p++) {
                                                                                                            ?>

                                                                                                                <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                            <?php

                                                                                                            }
                                                                                                            ?>
                                                                                                        </ul>
                                                                                                    </div>



                                                                                            <?php



                                                                                                }
                                                                                            }
                                                                                            ?>





                                                                                            <?php
                                                                                            foreach ($allroomtypessprivatebathroomfities as $inroom) {
                                                                                                if (!empty($inroom[$opp . $baba])) {
                                                                                            ?>


                                                                                                    <div class='col-sm'>
                                                                                                        <label>Private Bathroom:</label>
                                                                                                        <ul class="small text-black-50">

                                                                                                            <?php

                                                                                                            $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                            for ($p = 0; $p < count($gf); $p++) {
                                                                                                            ?>

                                                                                                                <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                            <?php

                                                                                                            }
                                                                                                            ?>
                                                                                                        </ul>
                                                                                                    </div>



                                                                                            <?php



                                                                                                }
                                                                                            }
                                                                                            ?>








                                                                                            <?php
                                                                                            foreach ($allroomtypessdiscountedf as $inroom) {
                                                                                                if (!empty($inroom[$opp . $baba])) {
                                                                                            ?>


                                                                                                    <div class='col-sm'>
                                                                                                        <label>Discounts:</label>
                                                                                                        <ul class="small text-black-50">

                                                                                                            <?php

                                                                                                            $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                            for ($p = 0; $p < count($gf); $p++) {
                                                                                                            ?>

                                                                                                                <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                            <?php

                                                                                                            }
                                                                                                            ?>
                                                                                                        </ul>
                                                                                                    </div>



                                                                                            <?php



                                                                                                }
                                                                                            }
                                                                                            ?>





                                                                                            <?php
                                                                                            foreach ($allroomtypesscomplimentaryfies as $inroom) {
                                                                                                if (!empty($inroom[$opp . $baba])) {
                                                                                            ?>


                                                                                                    <div class='col-sm'>
                                                                                                        <label>Complementary:</label>
                                                                                                        <ul class="small text-black-50">

                                                                                                            <?php

                                                                                                            $gf = explode(",", $inroom[$opp . $baba]);

                                                                                                            for ($p = 0; $p < count($gf); $p++) {
                                                                                                            ?>

                                                                                                                <li class="my-2"><?php echo $gf[$p]; ?></li>

                                                                                                            <?php

                                                                                                            }
                                                                                                            ?>
                                                                                                        </ul>
                                                                                                    </div>



                                                                                            <?php



                                                                                                }
                                                                                            }
                                                                                            ?>






                                                                                        </div>
                                                                                    </div>






                                                                                </div>











                                                                            </div>
                                                                            <div class="tab-pane fade" id="contact<?php echo $ban; ?>" role="tabpanel" aria-labelledby="contact-tab">
                                                                                <br />
                                                                                <?php


                                                                                $anotherarray = array();
                                                                                $anotherarray2 = array();



                                                                                foreach ($allroomtypesscancellationnames as $mkm) {


                                                                                    if (!empty($mkm[$opp . $baba])) {
                                                                                        array_push($anotherarray, $mkm[$opp . $baba]);
                                                                                    }
                                                                                }

                                                                                foreach ($allroomtypesscancellation as $mkma) {

                                                                                    if (!empty($mkma[$opp . $baba])) {
                                                                                        array_push($anotherarray2, $mkma[$opp . $baba]);
                                                                                    }
                                                                                }



                                                                                $o1 = explode('_@_', $anotherarray[0]);
                                                                                $o2 = explode('_@_', $anotherarray2[0]);




                                                                                $he = 0;

                                                                                for ($u = 0; $u < count($o1); $u++) {


                                                                                    echo '<h4>' . $o1[$he] . '</h4>';

                                                                                    echo '<p>' . $o2[$he] . '</p>';
                                                                                    echo '<br/>';


                                                                                    $he = $he + 1;
                                                                                }

                                                                                ?>



                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                        <!-- end of room ams modal -->



                                        <?php
                                                                    $cnna = $cnna + 1;

                                                                    $ban = $ban + 1;
                                                                }
                                                            }
                                                        }
                                        ?>

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
            function checkadultoccupancy($this) {

                var idd = $this.id;



                var total = 0;


                var sd = document.getElementById("sdate").value;
                var ed = document.getElementById("edate").value;

                var adult = document.getElementsByClassName("adult");
                var children = document.getElementsByClassName("children");

                var rtp = document.getElementsByClassName("rtp");
                var romsy = document.getElementsByClassName("roms");


                var adultsallowed = document.getElementsByClassName("adultsallowed");
                var childrenallowed = document.getElementsByClassName("childrenallowed");
                var extrabedsallowed = document.getElementsByClassName("extrabedsallowed");

                for (var i = 0; i < adult.length; i++) {

                    var max = parseInt(adultsallowed[i].value) + parseInt(childrenallowed[i].value) + parseInt(extrabedsallowed[i].value);


                    if (parseInt(adult[i].value) + parseInt(children[i].value) > max) {


                        if (idd == 'ad') {
                            adult[i].value = parseInt(adult[i].value) - 1;
                            Swal.fire('Max Occupancy Reached for this Room');

                        } else if (idd == 'ch') {
                            children[i].value = parseInt(children[i].value) - 1;
                            Swal.fire('Max Occupancy Reached for this Room');
                        }

                    }








                }





            }









            function totall($this) {

                var abc = $this.getAttribute('data-ad');


                var roomsrecieved = document.getElementById("roomsrecieved").value;

                var roms = document.getElementsByClassName("roms" + abc);

                var tot = 0;
                var bb = 0;

                for (let i = 0; i < roms.length; i++)

                {






                    if (roms[i].value.includes("-")) {
                        roms[i].value = 0;
                    }




                    tot = tot + parseInt(roms[i].value);

                    if (tot > parseInt(roomsrecieved)) {
                        var badshah = 0;
                        for (let cc = 0; cc < roms.length; cc++) {
                            if (cc == i) {

                            } else {
                                badshah = badshah + parseInt(roms[cc].value);
                            }
                        }

                        var bsjh = parseInt(roomsrecieved) - badshah;



                        roms[i].value = bsjh;





                        tot = tot - 1;

                        bb = i;

                        const {
                            value: text
                        } = Swal.fire({
                            title: 'Rooms Exceeded!',
                            input: 'number',
                            inputPlaceholder: 'Number of Rooms',
                            inputLabel: 'Want to Add more Rooms?',

                            placeholder: 'Number of Rooms',
                            inputAttributes: {
                                autocapitalize: 'on'
                            },
                            showCancelButton: true,
                            confirmButtonText: 'Add',
                            showLoaderOnConfirm: true,

                            allowOutsideClick: () => !Swal.isLoading()
                        }).then((result) => {
                            if (result.isConfirmed) {

                                if (result.value == '') {
                                    result.value = 0;
                                }


                                var ava = document.getElementsByClassName("ava");

                                var az = parseInt(result.value) + parseInt(roms[bb].value);




                                // if(az>parseInt(ava[bb].value))
                                //  {
                                //  Swal.fire(az+' Rooms are not Available');
                                // }
                                // else{

                                var roomsrecieved2 = document.getElementById("roomsrecieved");
                                roomsrecieved2.value = parseInt(roomsrecieved2.value) + parseInt(result.value);
                                Swal.fire('Total Rooms Allowed: ' + roomsrecieved2.value);
                                //}






                            }

                        })







                    }




                }














            }





            var checktotal = 0;


            setInterval(function() {






                var total = 0;


                var sd = document.getElementById("sdate").value;
                var ed = document.getElementById("edate").value;

                var adult = document.getElementsByClassName("adult");
                var children = document.getElementsByClassName("children");

                var rtp = document.getElementsByClassName("rtp");
                var romsy = document.getElementsByClassName("roms");


                var adultsallowed = document.getElementsByClassName("adultsallowed");
                var childrenallowed = document.getElementsByClassName("childrenallowed");
                var extrabedsallowed = document.getElementsByClassName("extrabedsallowed");

                for (var i = 0; i < adult.length; i++) {

                    // var max= parseInt(adultsallowed[i].value)+parseInt(childrenallowed[i].value)+parseInt(extrabedsallowed[i].value);


                    // if(parseInt(adult[i].value)+parseInt(children[i].value)>max){

                    //   if(adult[i].value=='0' || adult[i].value==''){

                    //  children[i].value=parseInt(children[i].value)-1;
                    //  Swal.fire('Max Occupancy Reached for this Room');
                    // }
                    //  else{
                    //  adult[i].value=parseInt(adult[i].value)-1;
                    //  Swal.fire('Max Occupancy Reached for this Room');
                    //}


                    // }




                    var adultz = adult[i].value;
                    var childrenz = children[i].value;
                    var romsn = romsy[i].value;
                    var rtpp = rtp[i].value;




                    var ttl2 = document.getElementById("ttl2");

                    $.ajax({

                        type: 'POST',
                        url: 'getpricing.php',
                        data: {
                            'adult': adultz,
                            'children': childrenz,
                            'sdate': sd,
                            'edate': ed,
                            'roomtype': rtpp,
                            'rooms': romsn
                        },

                        success: function(result) {

                            total = total + parseInt(result);

                            ttl2.value = total;

                        }

                    });



                }



















                var totalpaisay = document.getElementById("totalpaisay");
                var ttl = document.getElementById("ttl");
                var ttll = document.getElementById("ttl2").value;

                if (checktotal != ttll) {
                    checktotal = ttll;
                    ttl.innerHTML = ttll;
                    totalpaisay.value = ttll;
                }









            }, 600);
        </script>














        <script>
            document.getElementById("donotclick").addEventListener("click", function(event) {
                event.prevsentDefault()
            });


            function myFunction() {
                var ht = document.getElementById("hotel").value;

                /* if(ht!='')
                 {
                 */

                document.getElementById("clickmodify").click();



                /* }
 
 else{
    document.getElementById("popalert").click(); 
 }*/


            }











            $("[type='number']").keypress(function(evt) {
                //evt.prevsentDefault();
            });




            $("#city").on('change', function() {

                var country = $("#contry").val();
                var city = $("#city").val();


                $.ajax({

                    type: 'POST',
                    url: 'getmodifiedhotels.php',
                    data: {
                        'city': city,
                        'country': country
                    },

                    success: function(result) {


                        $("#hotel").html(result);

                        const st = document.getElementById('star');
                        st.innerHTML = '';

                        for (let i = 5; i > 0; i--) {




                            st.innerHTML = st.innerHTML + '<option>' + i + '</option>';





                        }




                    }

                });




            })










            $("#star").on('change', function() {

                var country = $("#contry").val();
                var city = $("#city").val();
                var star = $("#star").val();


                $.ajax({

                    type: 'POST',
                    url: 'getmodifiedhotelsbystar.php',
                    data: {
                        'city': city,
                        'country': country,
                        'star': star
                    },

                    success: function(result) {


                        $("#hotel").html(result);



                    }

                });




            })

















            $("#hotel").on('change', function() {

                var country = $("#contry").val();
                var city = $("#city").val();
                var hotel = $("#hotel").val();


                $.ajax({

                    type: 'POST',
                    url: 'getmodifiedstar.php',
                    data: {
                        'city': city,
                        'country': country,
                        'hotel': hotel
                    },

                    success: function(result) {
                        $("#star").html('');

                        var sel = '<option>' + result + '</option>';

                        if (!$.trim(result)) {

                        } else {
                            $("#star").html(sel);
                        }


                        for (let i = 5; i > 0; i--) {

                            if (result != i) {

                                const st = document.getElementById('star');

                                st.innerHTML = st.innerHTML + '<option>' + i + '</option>';




                            }


                        }


                    }

                });




            })
        </script>




        <script>
            function like() {


                var element = document.getElementById("like");
                if (element.classList.contains("bi-heart")) {
                    element.classList.remove("bi-heart");
                    element.classList.add("bi-heart-fill");


                    $.ajax({

                        type: 'POST',
                        url: 'addfavourite.php',


                        success: function(result) {

                        }
                    });








                } else {
                    element.classList.remove("bi-heart-fill");
                    element.classList.add("bi-heart");



                    $.ajax({

                        type: 'POST',
                        url: 'removefavourite.php',


                        success: function(result) {

                        }
                    });








                }







            }
        </script>


        <script>
            function increaseprice($this) {

                var roomsrecieved = document.getElementById("roomsrecieved").value;

                var aid = $this.getAttribute('data-id');
                var vall = $this.value;


                if (vall == '0') {
                    var rms = 1;
                } else {
                    var rms = parseInt(vall);
                }



                var pri = document.getElementById('prc' + aid);

                var actualprice = document.getElementById('pricevalz' + aid);


                var price = parseInt(actualprice.value);
                //alert(price);



                if (parseInt(roomsrecieved) >= rms) {

                    pri.innerHTML = price * rms;
                }


            }
        </script>
        
        
        
        <script>
            
            var ac=document.getElementsByClassName('applyBtn');
            
            for(let ia=0; ia<ac.length; ia++)
            {
                ac[ia].classList.remove('btn-primary');
                 
            }
            
            
            
            
        </script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
        <script src="js/main.js"></script>
        
    </div>
</body>

</html>