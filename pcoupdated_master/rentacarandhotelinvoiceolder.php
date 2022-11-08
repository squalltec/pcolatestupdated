<?php

session_start();
include 'db_connection.php';

include 'header.php';


$flightnumb1 = $_SESSION['flightnumb1'];
$flightnumb2 = $_SESSION['flightnumb2'];
$pickordelivery = $_SESSION['pickordelivery'];




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
    //$tax='20%';
} else {
    // $tax='';
}


$uniquenumber = rand(10, 100000000);

$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$sdate = $_SESSION['sdate'];
$edate = $_SESSION['edate'];

$_SESSION['bookingnumber'] = $uniquenumber;



$showpaisay = $_SESSION['showpaisay'];



$totaldays = $_SESSION['totaldays'];


$title = $_SESSION['title'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone =  $_SESSION['phone'];

$bfincluded =  $_SESSION['bfincluded'];
$lunincluded =  $_SESSION['lunincluded'];
$dinincluded =  $_SESSION['dinincluded'];
$bedincluded =  $_SESSION['bedincluded'];





$alladults = $_SESSION['alladults'];
$roomtypesall = $_SESSION['roomtypesall'];
$totalamountt = $_SESSION['totalamount'];
$allchildren = $_SESSION['allchildren'];



if ($tax == '5%') {

    $_SESSION['tax'] = '5%';
    $taxvalue = intval($totalamountt) / 100 * 5;

    $totalamount = intval($totalamountt) + intval($taxvalue);

    $_SESSION['totalamounty'] = $totalamount;
} else {

    $_SESSION['tax'] = '0%';
    $totalamount = $totalamountt;
    $_SESSION['totalamounty'] = $totalamount;
}










$idza = $_SESSION['subtractid'];

foreach ($idza as $id) {
    //echo $id;
}

//$idza= array_unique($_SESSION['subtractid']);



//$_SESSION['subtractid']= $idza;
















//Rent a Car






$aid = $_SESSION['aid'];

$totaldaysrent = $_SESSION['totaldaysrent'];


$titlerent = $_SESSION['title2'];
$fnamerent = $_SESSION['fname2'];
$lnamerent = $_SESSION['lname2'];
$emailrent = $_SESSION['email2'];
$phonerent =  $_SESSION['phone2'];
$nationalityrent =  $_SESSION['nationality2'];
$remarksrent =  $_SESSION['remarks2'];

$totalpricewithvatrent = $_SESSION['totalpricewithvat2'];


$dropofflocation = $_SESSION['dropofflocation'];
$dropofftime = $_SESSION['dropofftime'];
$dropoffdate = $_SESSION['dropoffdate'];
$pickuplocation = $_SESSION['pickuplocation'];
$pickupdate = $_SESSION['pickupdate'];
$pickuptime = $_SESSION['pickuptime'];





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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/app.css">
    <link rel="stylesheet" href="styles/style2.css">
    <title>Booking Invoice</title>
</head>

<body>

















    <div class="main-holder invo-pg">
        <section class="page_title">
            <div class="container">
                <h1>Billing Information</h1>
            </div>
        </section>


        <div class="cs-container">
            <div class="cs-invoice cs-style1">
                <div class="cs-invoice_in" id="download_section">
                    <div class="cs-invoice_head cs-type1 cs-mb25">
                        <div class="cs-invoice_left">
                            <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Invoice No:</b> <?php echo $uniquenumber; ?></p>
                            <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date: </b><?php echo date("d/m/Y"); ?></p>
                        </div>
                        <p class="fw-bold text-uppercase mb-0">proforma invoice</p>
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
                        <h4 align='center'>Hotel Booking</h4>
                        <div class="cs-round_border">
                            <div class="cs-table_responsive">
                            <div class="d-block invoice-tbl-item-title">Hotel: <?php  ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Particulars</th>
                                            <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Check In</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Check Out</th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Nights</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Avg/Night</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total AED</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px !important;">
                                            <?php
                                            $n = 0;
                                            foreach ($roomtypesall as $rts) {
                                            ?>
                                                <tr>
                                                    <td class="cs-width_3">
                                                        <?php echo $rts; ?><br>
                                                        <?php

                                                        echo 'Adults: ' . $alladults[$n] . '&nbsp;&nbsp;&nbsp;';


                                                        echo 'Children: ' . $allchildren[$n];






                                                        ?>

                                                        <?php

                                                        if ($bfincluded != '') { ?>
                                                            <br /><?php
                                                                    echo 'Breakfast: ' . $bfincluded[$n];
                                                                }
                                                                    ?>

                                                        <?php

                                                        if ($lunincluded != '') { ?>
                                                            <br /><?php
                                                                    echo 'Lunch: ' . $lunincluded[$n];
                                                                }
                                                                    ?>

                                                        <?php

                                                        if ($dinincluded != '') { ?>
                                                            <br /><?php
                                                                    echo 'Dinner: ' . $dinincluded[$n];
                                                                }
                                                                    ?>

                                                        <?php

                                                        if ($bedincluded != '') {
                                                        ?>
                                                            <br /><?php
                                                                    echo 'Extra Bed: ' . $bedincluded[$n];
                                                                }
                                                                    ?>
                                                    </td>
                                                    <td class="cs-width_4"><?php echo $sdate; ?></td>
                                                    <td class="cs-width_2"><?php echo $edate; ?></td>
                                                    <td class="cs-width_1"><?php echo $totaldays; ?></td>
                                                    <td class="cs-width_2"><?php echo intval($showpaisay[$n]) / intval($totaldays); ?></td>

                                                </tr>
                                            <?php

                                                $n = $n + 1;
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                            <div class="cs-invoice_footer cs-border_top">
                                <div class="cs-left_footer cs-mobile_hide">
                                    <p class="cs-mb0"><b class="cs-primary_color">In Word:</b> <?php echo numberTowords("$totalamount"); ?></p>
                                    
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
                    <br>
                    <br>
                    <div class="cs-table cs-style1">
                        <h4 align='center'>Rent a Car Booking</h4>
                        <div class="cs-round_border">
                            <div class="cs-table_responsive">
                                <div class="d-block invoice-tbl-item-title">Hotel: <?php  ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Particulars</th>
                                            <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Pickup Location/Date/Time</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Dropoff Location/Date/Time</th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Days</th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Avg/Day</th>
                                            <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Total AED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cs-width_3"><?php echo 'Brand: ' . $_SESSION['brand'] . '<br/>Model: ' . $_SESSION['model'] . '<br/>Year: (' . $_SESSION['year'] . ')'; ?></td>
                                            <td class="cs-width_4"><?php echo $_SESSION['pickuplocation'] . '<br/>' . $_SESSION['pickupdate'] . '<br/>' . $_SESSION['pickuptime']; ?></td>
                                            <td class="cs-width_2"><?php echo $_SESSION['dropofflocation'] . '<br/>' . $_SESSION['dropoffdate'] . '<br/>' . $_SESSION['dropofftime']; ?></td>
                                            <td class="cs-width_1"><?php echo $totaldays; ?></td>
                                            <td class="cs-width_2"><?php echo intval($_SESSION['totalpricewithvat']) / intval($totaldays); ?></td>
                                            <td class="cs-width_2 cs-text_right"><?php echo $_SESSION['totalpricewithvat']; ?></td>
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


        <section class="">
                
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



                <br />

            
            
        </section>









        




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







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
    <script src="js/main.js"></script>
    
    

</body>
<?php
include 'footer.php';
?>

</html>