<?php
session_start();
include 'db_connection.php';





$roomsrecieved = $_SESSION['sendroomnumbers'];


$gcountry = $_SESSION['country'];

$eve = $_SESSION['event'];
$gevent = $_SESSION['event'];
$ghotel = $_SESSION['hotel'];
$cn = $_SESSION['country'];
$hn = $_SESSION['hotel'];
$ln = $_SESSION['city'];
$gcity = $_SESSION['city'];
$gsendcategory = $_SESSION['sendcategory'];






if($ghotel!='' || $ghotel!='All')
{
  
  
$sqlman = "SELECT * FROM hotelsdatabase WHERE name='$ghotel'";


$resultman = $conn->query($sqlman);



while ($rowman = mysqli_fetch_assoc($resultman)) {

 if($gcity!=$rowman['city'] && ($gcity!='All' || $gcity!=''))
    {
        $ghotel='';
        $_SESSION['hotel']=''; 
        
    }
    else{

   if($gsendcategory!=$rowman['star'] && ($gsendcategory!='All' || $gsendcategory!=''))
    {
       $ghotel='';
       $_SESSION['hotel']=''; 
        $ln = 'All';
        $gcity = 'All';
        $_SESSION['city']='All';
    }
    else
    {
  
    
    if($gcity=='All' || $gcity=='')
    {
        $ln = $rowman['city'];
        $gcity = $rowman['city'];
        $_SESSION['city']=$rowman['city'];
    }
    
    
     if($gsendcategory=='All' || $gsendcategory=='')
    {
          $gsendcategory = $rowman['star'];
          $_SESSION['sendcategory']=$rowman['star'];
        
    }
    }
 
    }
    
    
}
    
    
    
    
    
    
    
    
    
}


















$gsdate = $_SESSION['sdate'];

$gedate = $_SESSION['edate'];


$sdate = $_SESSION['sdate'];

$edate = $_SESSION['edate'];


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

$hotfilters = $_POST['hotelfil'];
$roomfilters = $_POST['roomfil'];


$habc = '%';

$hotfilters1 = array_filter(explode(",", $hotfilters));
$fil = '%';







if (count($hotfilters1) == 0) {
    $habc = " CONCAT(generalfacilities,',',mainfacilities,',',frontdeskfacilities,',',familyfacilities,',',sportsfacilities,',',cleaningfacilities,',',foodfacilities,',',businessfacilities,',',internetfacilities,',',parkingfacilities,',',uniquefacilities,',',safetyfacilities) LIKE '%' ";
}



$cp = 0;
foreach ($hotfilters1 as $hotfil) {
    $cp = $cp + 1;

    $fil = $fil . $hotfil . '%';




    //echo $hotfil.'%';




    if (count($hotfilters1) == 1) {
        $habc = " CONCAT(generalfacilities,',',mainfacilities,',',frontdeskfacilities,',',familyfacilities,',',sportsfacilities,',',cleaningfacilities,',',foodfacilities,',',businessfacilities,',',internetfacilities,',',parkingfacilities,',',uniquefacilities,',',safetyfacilities) LIKE '%$hotfil%' ";
    }



    if (count($hotfilters1) > 1) {




        if ($cp == 1) {
            $habc = " (CONCAT(generalfacilities,',',mainfacilities,',',frontdeskfacilities,',',familyfacilities,',',sportsfacilities,',',cleaningfacilities,',',foodfacilities,',',businessfacilities,',',internetfacilities,',',parkingfacilities,',',uniquefacilities,',',safetyfacilities) LIKE '%$hotfil%' && ";
        }




        if ($cp > 1 && $cp < count($hotfilters1)) {
            $habc = $habc . "CONCAT(generalfacilities,',',mainfacilities,',',frontdeskfacilities,',',familyfacilities,',',sportsfacilities,',',cleaningfacilities,',',foodfacilities,',',businessfacilities,',',internetfacilities,',',parkingfacilities,',',uniquefacilities,',',safetyfacilities) LIKE '%$hotfil%' && ";
        }



        if ($cp == count($hotfilters1)) {
            $habc = $habc . "CONCAT(generalfacilities,',',mainfacilities,',',frontdeskfacilities,',',familyfacilities,',',sportsfacilities,',',cleaningfacilities,',',foodfacilities,',',businessfacilities,',',internetfacilities,',',parkingfacilities,',',uniquefacilities,',',safetyfacilities) LIKE '%$hotfil%' ) ";
        }
    }
}





$rabc = '';
$roomfilters1 = array_filter(explode(",", $roomfilters));
$roomfil = '%';



if (count($roomfilters1) == 0) {
    $rabc = " CONCAT(inroomfacilities,',',kitchenfacilities,',',privatebathroomfacilities,',',discountedfacilities,',',complimentaryfacilities,',',suite) LIKE  '%' ";
}


$ep = 0;
foreach ($roomfilters1 as $roomfill) {

    $ep = $ep + 1;


    if (count($roomfilters1) == 1) {


        $rabc = " CONCAT(inroomfacilities,',',kitchenfacilities,',',privatebathroomfacilities,',',discountedfacilities,',',complimentaryfacilities,',',suite) LIKE '%$roomfill%' ";
    }






    if (count($roomfilters1) > 1) {




        if ($ep == 1) {


            $rabc = " ( CONCAT(inroomfacilities,',',kitchenfacilities,',',privatebathroomfacilities,',',discountedfacilities,',',complimentaryfacilities,',',suite) LIKE '%$roomfill%' && ";
        }




        if ($ep > 1 && $ep < count($roomfilters1)) {
            $rabc = $rabc . "CONCAT(inroomfacilities,',',kitchenfacilities,',',privatebathroomfacilities,',',discountedfacilities,',',complimentaryfacilities,',',suite) LIKE '%$roomfill%' && ";
        }





        if ($ep == count($roomfilters1)) {
            $rabc = $rabc . "CONCAT(inroomfacilities,',',kitchenfacilities,',',privatebathroomfacilities,',',discountedfacilities,',',complimentaryfacilities,',',suite) LIKE '%$roomfill%' ) ";
        }
    }


    $roomfil = $roomfil . $roomfill . '%';
}



//$hotfilters='airport smoking';
//$fil='%'.$hotfilters.'%';


//echo $hotfilters;



















if (($ln != '' || $ln != 'All') && ($gsendcategory != '' || $gsendcategory != 'All')) {


    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && star='$gsendcategory' &&  $habc";
}  if (($ln != '' ||$ln != 'All') && ($gsendcategory == ''|| $gsendcategory == 'All')) {

    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && city='$ln' && $habc";
}  if (($ln == '' ||$ln == 'All') && ($gsendcategory != '' ||$gsendcategory != 'All')) {

    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn' && star='$gsendcategory'  && $habc";
}  if (($ln == '' || $ln == 'All') && ($gsendcategory == '' ||$gsendcategory == 'All')) {




    $sqlnew = "SELECT * FROM hotelsdatabase WHERE country='$cn'  && $habc";
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

$imagesforlisting = array();














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

        $sqlrooms2 = "SELECT * FROM hotelsInventorydatabase WHERE hotel='$hot' && country='$allcountries[$nde]' && city='$allcities[$nde]' && $rabc";

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











                    $sqlapproved2 = "SELECT * FROM setprices WHERE hotel='$hot' && country='$allcountries[$nde]' && location='$allcities[$nde]' && name='$approvedornotroom2' && ((sdate<='$adate2' && edate>='$bdate2') || (sdate<='$adate2' && edate>'$adate2') && (sdate>'$bdate2' && edate<='$bdate2')) && approved='approved'";





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



                            if ($rowrooms2['doubleadultoccupancy'] == '' || $rowrooms2['doubleadultoccupancy'] == '0') {
                                array_push($adultsallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['singleadultoccupancy']));

                                array_push($childrenallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['singlechildoccupancy']));

                                array_push($extrabedsallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['singleextrabedsallowed']));
                            } else {
                                array_push($adultsallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['doubleadultoccupancy']));

                                array_push($childrenallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['doublechildoccupancy']));

                                array_push($extrabedsallowednew, array($hot . $rowrooms2['type'] => $rowrooms2['doubleextrabedsallowed']));
                            }
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




                            //echo json_encode($imagesforlisting);








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


?>


























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

        <div style='border-radius:25px; display:none;' class="searchitem">

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
                                <?php
                                if (file_exists('pco/Hotel Images/'.$dd.'/'.$zi)) {
                                ?>
                                    <img loading="lazy" src="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi; ?>" alt="" loading="lazy">
                                <?php
                                } else {
                                ?>
                                    <img loading="lazy" src="img/placeholders/HotelImageSmall.png" alt="" loading="lazy">
                                <?php
                                }
                                ?>
                                <!-- <img src="pco/Hotel Images/<?php echo $dd; ?>/<?php echo $zi; ?>" alt=""> -->
                            </a>
                    <?php
                        }
                    }
                    ?>





                </div>





                <div class='room-amenities'>
                    <?php echo mb_strimwidth($selecteddesi[$nds], 0, 190, "..."); ?>
                    <a href='hotelsingle.php?hotel=<?php echo $dd; ?>&city=<?php echo $selectedcities[$nds]; ?>&country=<?php echo $selectedcountries[$nds]; ?>&sendcategory=<?php echo $selectedstars[$nds]; ?>'>See More</a>
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

                <div class="row">
                    <div style='display:flex; border: none !important; padding-top:15px; padding-bottom:65px;' class="other_room_list">

                        <div class="RoomsList<?= $gals ?>" style="min-width:100%; height:auto; ">
                            <?php
                            $newroomsgals = 90000;
                            $countRooms = 0;


                            foreach ($allroomtypess as $ff) {
                                foreach ($ff[$dd] as $index => $bb) {

                                    $newroomsgals = $newroomsgals + 1;
                                    $millionaire = $millionaire + 1;
                            ?>



                                    <div class='row d-flex content2<?= $gals ?>' style="margin-bottom:10px; <?php if ($index > 1) {
                                                                                                                echo "display:none !important;";
                                                                                                            } ?>">


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
                                                    <?php
                                                    if (file_exists('pco/Room Uploads/' . $dd . '/' . $rmvs . '/' . $ig[0])) {
                                                    ?>
                                                        <img loading="lazy" src="pco/Room Uploads/<?php echo $dd; ?>/<?php echo $rmvs; ?>/<?php echo $ig[0]; ?>" alt="" loading="lazy">

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <img loading="lazy" src="/img/placeholders/roomImage.png" alt="" loading="lazy">
                                                    <?php

                                                    }
                                                    ?>
                                                </a>
                                            </div>

                                        </div>



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

                                        <div style='border:1px solid #E8E8E8;' class='col-lg-6 col-md-12 col-sm-12 order-2 order-sm-2 order-md-2 order-lg-1'>

                                            <style>

                                            </style>
                                            <div style='padding:10px !important; border-bottom:0px;' class="room_box">
                                                <div style='padding:0 !important;' class="inner_room_meta">
                                                    <div class="room_metas">

                                                        <div class="room_type">
                                                            <nonsense><?php echo $bb; ?></nonsense>
                                                            <span class="status text-capitalize">available</span>
                                                        </div>
                                                        <div class="room_type" style="padding-bottom:10px; padding-top:10px;">
                                                            <span class="hotelsIconSection"><i class="bi bi-wifi"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-fan"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-basket2"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-bicycle"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-wifi"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-fan"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-basket2"></i></span>
                                                            <span class="hotelsIconSection"><i class="bi bi-bicycle"></i></span>
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



                                        <div style='border:1px solid #E8E8E8;<?php if ($index == 0) {
                                                                                    echo "border-radius:0px 20px 0px 0px";
                                                                                } ?>' class='col-lg-2 col-md-4 col-sm-4 order-0 order-sm-1 order-md-1 order-lg-2'>



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
                                    $countRooms++;
                                }
                            }




                            ?>
                            <?php
                            if ($countRooms == 1) {
                            ?>
                                <div class="row d-flex">
                                    <img src="img/webp/banners/bannersize.png" height="155" style="padding: 0px; padding-left: 9px;" />
                                </div>
                            <?php
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

                    .theme_btnNew:hover {
                        color: black;
                        border-color: #DC3545;
                        padding: 0.8em 3em;
                        background-color: white;
                    }
                </style>
                <script>
                    $(document).ready(function() {
                        $(".content2<?= $gals ?>").slice(0, 2).show();
                        $("#loadMore<?= $gals ?>").on("click", function(e) {
                            e.preventDefault();
                            $(".content2<?= $gals ?>:hidden").slice(0, 2).slideDown();

                            if ($(".content2<?= $gals ?>:hidden").length == 0) {
                                $("#loadMore<?= $gals ?>").css("display", 'none');
                                $('#loadMoreu<?= $gals ?>').css("display", 'block');
                            }
                        });
                        $("#loadMoreu<?= $gals ?>").on("click", function(e) {
                            e.preventDefault();
                            //$(".content2<?= $gals ?>").setAttribute("style",'');

                            var cg = document.getElementsByClassName('content2<?= $gals ?>');
                            for (let i = 0; i < cg.length; i++) {
                                cg[i].setAttribute('style', ' margin-bottom:10px; display:none !important;');
                            }

                            $(".content2<?= $gals ?>").slice(0, 1).show();
                            $("#loadMore<?= $gals ?>").css("display", 'block');
                            $('#loadMoreu<?= $gals ?>').css("display", 'none');

                        });
                    });
                </script>
                <?php
                if ($index > 1) {
                ?>
                    <label class="theme_btnNew btn  bookNewBtnLoadMore" data-id='<?php echo $gals ?>' onclick='loadmerrm(this)' style="border-radius: 50%; padding: 7px 12px;" id="loadMore<?= $gals ?>"><i class="bi bi-chevron-down"></i></label>

                    <label data-id='<?php echo $gals ?>' onclick='loadless(this)' class="theme_btnNew btn  bookNewBtnLoadMore" style="border-radius: 50%; padding: 7px 12px; display:none;" id="loadMoreu<?= $gals ?>"><i class="bi bi-chevron-up"></i></label>
                <?php
                } ?>
                <input type='submit' name='submit' class="theme_btnNew btn  bookNewBtn" value='Book Now'>

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

<?php

if ($nds >= 1) {
?>
    <button class="theme_btnNew btn  bookNewBtnLoadMoreh" style="border-radius: 20px; padding: 7px 12px;" id="loadMoreh">Load More Hotels <i class="bi bi-chevron-down"></i></button>
    <button class="theme_btnNew btn  bookNewBtnLoadMoreh" style="border-radius: 20px; padding: 7px 12px; display:none;" id="loadMorehu">Show Less Hotels <i class="bi bi-chevron-up"></i></button>
<?php
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
        background-color: rgba(255, 0, 0, 0.4);
        ;
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
                <?php

                ?>


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
                                                                <span class="infoBoxTitle">
                                                                    Sleeps
                                                                </span>
                                                                <span>
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
                                            <a href='hotelsingle.php?hotel=<?php echo $opp; ?>&city=<?php echo $selectedcities[$cnna]; ?>&country=<?php echo $selectedcountries[$cnna]; ?>&sendcategory=<?php echo $selectedstars[$cnna]; ?>'>

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