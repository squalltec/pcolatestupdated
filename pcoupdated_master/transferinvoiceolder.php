<?php

session_start();
include 'db_connection.php';


include 'header.php';



$uniquenumber = $_SESSION['uniqueidq'];

//echo $_SESSION['uniqueidq'];
$_SESSION['bookingnumber'] = $uniquenumber;


$title2 = $_SESSION['title2'];
$fname2 = $_SESSION['fname2'];
$lname2 = $_SESSION['lname2'];
$email2 = $_SESSION['email2'];
$phone2 =  $_SESSION['phone2'];
$nationality2 =  $_SESSION['nationality2'];
$remarks2 =  $_SESSION['remarks2'];


$triptype = $_SESSION['triptype'];





if ($triptype == 'round') {





    $country = $_SESSION['country'];
    $city = $_SESSION['city'];
    $pax = $_SESSION['pax'];
    $arrivaldate = $_SESSION['arrivaldate'];
    $departuredate = $_SESSION['departuredate'];
    $fromlocation1 = $_SESSION['fromlocation1'];
    $tolocation1 = $_SESSION['tolocation1'];
    $fromlocation2 = $_SESSION['fromlocation2'];
    $tolocation2 = $_SESSION['tolocation2'];
    $type1 = $_SESSION['type1'];
    $type2 = $_SESSION['type2'];





    $airline1 = $_SESSION['airline1'];
    $flightnumber1 = $_SESSION['flightnumber1'];
    $time1 = $_SESSION['time1'];



    $airline2 = $_SESSION['airline2'];
    $flightnumber2 = $_SESSION['flightnumber2'];
    $time2 = $_SESSION['time2'];











    $arrivalcar = $_SESSION['carida'];
    $arrivalcarsneeded = $_SESSION['carsneededa'];
    $departurecar = $_SESSION['caridd'];
    $departurecarsneeded = $_SESSION['carsneededd'];
    $arrivalprice = $_SESSION['pricearrival'];
    $departureprice = $_SESSION['pricedeparture'];

    $car1 = $_SESSION['car1'];
    $car2 = $_SESSION['car2'];

    $total = intval($arrivalprice) + intval($departureprice);
}


if ($triptype == 'From Airport to Hotel') {







    $airline1 = $_SESSION['airline1'];
    $flightnumber1 = $_SESSION['flightnumber1'];
    $time1 = $_SESSION['time1'];


    $country = $_SESSION['country'];
    $city = $_SESSION['city'];
    $pax = $_SESSION['pax'];
    $arrivaldate = $_SESSION['arrivaldate'];

    $fromlocation1 = $_SESSION['fromlocation1'];
    $tolocation1 = $_SESSION['tolocation1'];

    $type1 = $_SESSION['type1'];
















    $arrivalcar = $_SESSION['carida'];
    $arrivalcarsneeded = $_SESSION['carsneededa'];
    $arrivalprice = $_SESSION['pricearrival'];
    $departurecarsneeded = 0;

    $total = intval($arrivalprice);

    $car1 = $_SESSION['car1'];
}

if ($triptype == 'From Hotel to Airport') {





    $airline2 = $_SESSION['airline2'];
    $flightnumber2 = $_SESSION['flightnumber2'];
    $time2 = $_SESSION['time2'];


    $country = $_SESSION['country'];
    $city = $_SESSION['city'];
    $pax = $_SESSION['pax'];

    $departuredate = $_SESSION['departuredate'];

    $fromlocation2 = $_SESSION['fromlocation2'];
    $tolocation2 = $_SESSION['tolocation2'];

    $type2 = $_SESSION['type2'];









    $arrivalcar = $_SESSION['caridd'];
    $arrivalcarsneeded = $_SESSION['carsneededd'];
    $departureprice = $_SESSION['pricedeparture'];
    $arrivalcarsneeded = 0;

    $total = intval($departureprice);

    $car2 = $_SESSION['car2'];
}









$taxed = intval($total) / 100 * 5;
$totalfull = intval($total) + (intval($total) / 100 * 5);

$_SESSION['totalfull'] = $totalfull;






if (isset($_POST['submit'])) {

    $taxed = intval($total) / 100 * 5;
    $totalfull = intval($total) + (intval($total) / 100 * 5);



    $uniquenumber = $_SESSION['uniqueidq'];

    //echo $_SESSION['uniqueidq'];
    $_SESSION['bookingnumber'] = $uniquenumber;




    $_SESSION['totalfull'] = $totalfull;


    $title2 = $_SESSION['title2'];
    $fname2 = $_SESSION['fname2'];
    $lname2 = $_SESSION['lname2'];
    $email2 = $_SESSION['email2'];
    $phone2 =  $_SESSION['phone2'];
    $nationality2 =  $_SESSION['nationality2'];
    $remarks2 =  $_SESSION['remarks2'];






    if ($triptype == 'round') {





        $country = $_SESSION['country'];
        $city = $_SESSION['city'];
        $pax = $_SESSION['pax'];
        $arrivaldate = $_SESSION['arrivaldate'];
        $departuredate = $_SESSION['departuredate'];
        $fromlocation1 = $_SESSION['fromlocation1'];
        $tolocation1 = $_SESSION['tolocation1'];
        $fromlocation2 = $_SESSION['fromlocation2'];
        $tolocation2 = $_SESSION['tolocation2'];
        $type1 = $_SESSION['type1'];
        $type2 = $_SESSION['type2'];





        $airline1 = $_SESSION['airline1'];
        $flightnumber1 = $_SESSION['flightnumber1'];
        $time1 = $_SESSION['time1'];



        $airline2 = $_SESSION['airline2'];
        $flightnumber2 = $_SESSION['flightnumber2'];
        $time2 = $_SESSION['time2'];











        $arrivalcar = $_SESSION['carida'];
        $arrivalcarsneeded = $_SESSION['carsneededa'];
        $departurecar = $_SESSION['caridd'];
        $departurecarsneeded = $_SESSION['carsneededd'];
        $arrivalprice = $_SESSION['pricearrival'];
        $departureprice = $_SESSION['pricedeparture'];

        $car1 = $_SESSION['car1'];
        $car2 = $_SESSION['car2'];

        $total = intval($arrivalprice) + intval($departureprice);
    }


    if ($triptype == 'From Airport to Hotel') {







        $airline1 = $_SESSION['airline1'];
        $flightnumber1 = $_SESSION['flightnumber1'];
        $time1 = $_SESSION['time1'];


        $country = $_SESSION['country'];
        $city = $_SESSION['city'];
        $pax = $_SESSION['pax'];
        $arrivaldate = $_SESSION['arrivaldate'];

        $fromlocation1 = $_SESSION['fromlocation1'];
        $tolocation1 = $_SESSION['tolocation1'];

        $type1 = $_SESSION['type1'];
















        $arrivalcar = $_SESSION['carida'];
        $arrivalcarsneeded = $_SESSION['carsneededa'];
        $arrivalprice = $_SESSION['pricearrival'];
        $departurecarsneeded = 0;

        $total = intval($arrivalprice);

        $car1 = $_SESSION['car1'];
    }

    if ($triptype == 'From Hotel to Airport') {





        $airline2 = $_SESSION['airline2'];
        $flightnumber2 = $_SESSION['flightnumber2'];
        $time2 = $_SESSION['time2'];


        $country = $_SESSION['country'];
        $city = $_SESSION['city'];
        $pax = $_SESSION['pax'];

        $departuredate = $_SESSION['departuredate'];

        $fromlocation2 = $_SESSION['fromlocation2'];
        $tolocation2 = $_SESSION['tolocation2'];

        $type2 = $_SESSION['type2'];









        $arrivalcar = $_SESSION['caridd'];
        $arrivalcarsneeded = $_SESSION['carsneededd'];
        $departureprice = $_SESSION['pricedeparture'];
        $arrivalcarsneeded = 0;

        $total = intval($departureprice);

        $car2 = $_SESSION['car2'];
    }










    $sqlt = "INSERT INTO fullbookingtransfernew (uniquenumber,total,tax)
           VALUES ('$uniquenumber','$total','$taxed')";

    $resultat = $conn->query($sqlt);


    if ($resultat === TRUE) {
    }







    if ($triptype == 'round') {

        $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,arrivalprice,departureprice,uniquenumber,remarks,carida,arrivalfromlocation,arrivaldate,arrivaltime,arrivaltolocation,departuredate,departuretime,caridd,triptype,departurefromlocation,departuretolocation,tax,pax,arrivalcarsneeded,departurecarsneeded,airlinearrival,airlinedeparture,flightnumberarrival,flightnumberdeparture,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$arrivalprice','$departureprice','$uniquenumber','$remarks2','$arrivalcar','$fromlocation1','$arrivaldate','$time1','$tolocation1','$departuredate','$time2','$departurecar','$triptype','$fromlocation2','$tolocation2','$taxed','$pax','$arrivalcarsneeded','$departurecarsneeded','$airline1','$airline2','$flightnumber1','$flightnumber2','$country','$city')";

        $resultata = $conn->query($sqlta);


        if ($resultata === TRUE) {
        }
    }








    if ($triptype == 'From Airport to Hotel') {

        $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,arrivalprice,uniquenumber,remarks,carida,arrivalfromlocation,arrivaldate,arrivaltime,arrivaltolocation,triptype,tax,pax,arrivalcarsneeded,airlinearrival,flightnumberarrival,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$arrivalprice','$uniquenumber','$remarks2','$arrivalcar','$fromlocation1','$arrivaldate','$time1','$tolocation1','$triptype','$taxed','$pax','$arrivalcarsneeded','$airline1','$flightnumber1','$country','$city')";

        $resultata = $conn->query($sqlta);


        if ($resultata === TRUE) {
        }
    }





    if ($triptype == 'From Hotel to Airport') {

        $sqlta = "INSERT INTO transfernewbookingsnew (title,fname,lname,email,phone,nationality,departureprice,uniquenumber,remarks,departuredate,departuretime,caridd,triptype,departurefromlocation,departuretolocation,tax,pax,departurecarsneeded,airlinedeparture,flightnumberdeparture,country,city)
           VALUES ('$title2','$fname2','$lname2','$email2','$phone2','$nationality2','$departureprice','$uniquenumber','$remarks2','$departuredate','$time2','$departurecar','$triptype','$fromlocation2','$tolocation2','$taxed','$pax','$departurecarsneeded','$airline2','$flightnumber2','$country','$city')";

        $resultata = $conn->query($sqlta);


        if ($resultata === TRUE) {
        }
    }




    echo "<script>location.replace('transferbookingconfirmed.php');</script>";
}














?>












<div class="main-holder invo-pg">

    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25">
                    <div class="cs-invoice_left">
                        <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Invoice No:</b> <?php echo $uniquenumber; ?></p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b><?php echo date("d/m/Y"); ?></p>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <div class="cs-logo cs-mb5"><img src="img/logo.png" alt=""></div>
                    </div>
                </div>
                <div class="cs-invoice_head cs-mb10">
                    <div class="cs-invoice_left">
                        <b class="cs-primary_color">Invoice To:</b>
                        <p>
                            Sheik Zayad Road, Dubai, UAE <br>Phone: +971-474848993, +971-474848993
                            <br>
                            Email: support@pcoconnect.com<br>
                        </p>
                    </div>
                    <div class="cs-invoice_right cs-text_right">
                        <b class="cs-primary_color">Pay To:</b>
                        <p>
                            Biman Airlines <br>
                            237 Roanoke Road, North York, <br>
                            Ontario, Canada <br>
                            demo@email.com
                        </p>
                    </div>
                </div>
                <div class="cs-table cs-style1">
                    <div class="cs-round_border">
                        <div class="cs-table_responsive">
                            <div class="d-block invoice-tbl-item-title">Car: <?php  ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Particulars</th>
                                            <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Pickup Location</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Dropoff Location</th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Flight Details</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total AED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cs-width_3"><?php
                                            if ($triptype == 'round') {
                                                echo 'Arrival:<br/>';
                                                echo $car1;
                                                echo '<br/>';
                                                echo $arrivaldate;
                                                echo '<br/>';
                                                echo '<br/>';
                                                echo 'Departure:<br/>';
                                                echo $car2;
                                                echo '<br/>';
                                                echo $departuredate;
                                                echo '<br/>';
                                            }


                                            ?>

                                            <?php
                                            if ($triptype == 'From Airport to Hotel') {
                                                echo 'Arrival:<br/>';
                                                echo $car1;
                                                echo '<br/>';
                                                echo $arrivaldate;
                                                echo '<br/>';
                                            }


                                            ?>


                                            <?php
                                            if ($triptype == 'From Hotel to Airport') {

                                                echo 'Departure:<br/>';
                                                echo $car2;
                                                echo '<br/>';
                                                echo $departuredate;
                                                echo '<br/>';
                                            }


                                            ?></td>
                                            <td class="cs-width_4">
                                            <?php
                                            if ($triptype == 'round') {
                                                echo 'Arrival From:<br/>';
                                                echo $fromlocation1;
                                                echo '<br/>';
                                                echo '<br/>';

                                                echo 'Departure From:<br/>';
                                                echo $fromlocation2;
                                                echo '<br/>';
                                            }


                                            ?>

                                            <?php
                                            if ($triptype == 'From Airport to Hotel') {
                                                echo 'Arrival From:<br/>';
                                                echo $fromlocation1;

                                                echo '<br/>';
                                            }


                                            ?>


                                            <?php
                                            if ($triptype == 'From Hotel to Airport') {

                                                echo 'Departure From:<br/>';
                                                echo $fromlocation2;

                                                echo '<br/>';
                                            }


                                            ?>
                                            </td>
                                            <td class="cs-width_2">
                                            <?php
                                            if ($triptype == 'round') {
                                                echo 'Arrival To:<br/>';
                                                echo $tolocation1;
                                                echo '<br/>';
                                                echo '<br/>';

                                                echo 'Departure To:<br/>';
                                                echo $tolocation2;
                                                echo '<br/>';
                                            }


                                            ?>

                                            <?php
                                            if ($triptype == 'From Airport to Hotel') {
                                                echo 'Arrival To:<br/>';
                                                echo $tolocation1;

                                                echo '<br/>';
                                            }


                                            ?>


                                            <?php
                                            if ($triptype == 'From Hotel to Airport') {

                                                echo 'Departure To:<br/>';
                                                echo $tolocation2;

                                                echo '<br/>';
                                            }


                                            ?>
                                            </td>
                                            <td class="cs-width_1">
                                                <?php
                                                if ($triptype == 'round' || $triptype = 'From Airport to Hotel') {

                                                    echo 'Arrival:<br/>' . '' . $airline1 . '<br/>' . '' . $flightnumber1 . '<br/>' . $time1;
                                                }
                                                if ($triptype == 'round' || $triptype = 'From Hote to Airport') {

                                                    echo '<br/><br/>Departure:<br/>' . '' . $airline2 . '<br/>' . '' . $flightnumber2 . '<br/>' . $time2;
                                                }
                                                ?>
                                            </td>
                                            <td class="cs-width_2 cs-text_right">
                                                <?php echo 'AED ' . $total; ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="cs-invoice_footer cs-border_top">
                                <div class="cs-left_footer cs-mobile_hide">
                                    <p class="cs-mb0"><b class="cs-primary_color">In Word:</b><?php echo numberTowords("$totalpricewithvat"); ?></p>
                                </div>
                                <div class="cs-right_footer">
                                    <table>
                                        <tbody>
                                            <tr class="cs-border_left">
                                                <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Grand Total</td>
                                                <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right"><?php echo 'AED ' . $totalpricewithvat; ?></td>
                                            </tr>
                                            <tr class="cs-border_left">
                                                <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Vat</td>
                                                <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
                                                <?php
                                                    if ($tax == '5%') {
                                                        echo '<small style="float:right;">VAT 5% Applicable</small>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="cs-invoice_btns cs-hide_print">
                    <a href="javascript:window.print()" class="cs-invoice_btn btn theme_btn active btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" />
                        </svg>
                        <span>Print Invoice</span>
                    </a> &nbsp
                    <form action='bookingconfirmed.php' method='POST'>
                        <input type='submit' name='submit' style='margin-right:100px; float:right; width:200px;' class="btn theme_btn active btn-secondary" value='Continue'>
                    </form>
                </div>
            </div>
        </div>
            <?php

            function numberTowords($num)
            {

                $ones = array(
                    0 => "ZERO",
                    1 => "ONE",
                    2 => "TWO",
                    3 => "THREE",
                    4 => "FOUR",
                    5 => "FIVE",
                    6 => "SIX",
                    7 => "SEVEN",
                    8 => "EIGHT",
                    9 => "NINE",
                    10 => "TEN",
                    11 => "ELEVEN",
                    12 => "TWELVE",
                    13 => "THIRTEEN",
                    14 => "FOURTEEN",
                    15 => "FIFTEEN",
                    16 => "SIXTEEN",
                    17 => "SEVENTEEN",
                    18 => "EIGHTEEN",
                    19 => "NINETEEN",
                    "014" => "FOURTEEN"
                );
                $tens = array(
                    0 => "ZERO",
                    1 => "TEN",
                    2 => "TWENTY",
                    3 => "THIRTY",
                    4 => "FORTY",
                    5 => "FIFTY",
                    6 => "SIXTY",
                    7 => "SEVENTY",
                    8 => "EIGHTY",
                    9 => "NINETY"
                );
                $hundreds = array(
                    "HUNDRED",
                    "THOUSAND",
                    "MILLION",
                    "BILLION",
                    "TRILLION",
                    "QUARDRILLION"
                ); /*limit t quadrillion */
                $num = number_format($num, 2, ".", ",");
                $num_arr = explode(".", $num);
                $wholenum = $num_arr[0];
                $decnum = $num_arr[1];
                $whole_arr = array_reverse(explode(",", $wholenum));
                krsort($whole_arr, 1);
                $rettxt = "";
                foreach ($whole_arr as $key => $i) {

                    while (substr($i, 0, 1) == "0")
                        $i = substr($i, 1, 5);
                    if ($i < 20) {
                        /* echo "getting:".$i; */
                        $rettxt .= $ones[$i];
                    } elseif ($i < 100) {
                        if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
                        if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
                    } else {
                        if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                        if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
                        if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
                    }
                    if ($key > 0) {
                        $rettxt .= " " . $hundreds[$key] . " ";
                    }
                }
                if ($decnum > 0) {
                    $rettxt .= " and ";
                    if ($decnum < 20) {
                        $rettxt .= $ones[$decnum];
                    } elseif ($decnum < 100) {
                        $rettxt .= $tens[substr($decnum, 0, 1)];
                        $rettxt .= " " . $ones[substr($decnum, 1, 1)];
                    }
                }
                return $rettxt;
            }


            ?>





        <!--html2canvas-->

        <script src="  https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.0/html2canvas.min.js"></script>

        <style>
            .result {
                display: none;
            }

            canvas {
                border: 2px solid blue;
            }
        </style>




        <div class="result">
            <a id='myCheck' href="">abc</a>
            <hr>

        </div>
        <script>
            const div = document.querySelector(".html");
            const result = document.querySelector(".result");

            function convert() {
                html2canvas(div).then(function(canvas) {
                    result.appendChild(canvas);
                    let cvs = document.querySelector("canvas");
                    let dataURI = cvs.toDataURL("image/jpeg");
                    let downloadLink = document.querySelector(".result>a");
                    downloadLink.href = dataURI;
                    downloadLink.download = "div2canvasimage.jpg";
                    //console.log(dataURI);
                    document.getElementById("myCheck").click();
                });
                //result.style.display='block';
                //document.getElementById("myCheck").click();
                //document.getElementById("downloadmee").click();

            }
        </script>

        <!--end-->






    </div>
    
    
    <?php
    
include 'footer.php';
    
    ?>