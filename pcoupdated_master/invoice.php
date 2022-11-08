<?php

session_start();
include 'db_connection.php';

// var_dump($_SESSION);



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


<?php

include 'header.php';
?>









    <div class="main-holder invo-pg">
        <section class="page_title">
            <div class="container">
                <h1>Billing Information</h1>
            </div>
        </section>

        <div class="cs-container">
            <div class="cs-invoice cs-style1" style="border:1px solid #de3435">
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
                        <b class="cs-primary_color">Pay To:</b>
                            <p>
                                Biman Airlines <br>
                                237 Roanoke Road, North York, <br>
                                Ontario, Canada <br>
                                demo@email.com
                            </p>
                        </div>
                        <div class="cs-invoice_right cs-text_right">
                            <b class="cs-primary_color">Invoice To:</b>
                                <p>
                                    Sheik Zayad Road, Dubai, UAE <br>Phone: +971-474848993, +971-474848993
                                    <br>
                                    Email: support@pcoconnect.com<br>

                                 </p>
                            
                        </div>
                    </div>
                    <div class="cs-table cs-style1">
                        <div class="cs-round_border">
                            <div class="cs-table_responsive">
                                <div class="invoice-tbl-item">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">
                                                    Particulars
                                                </th>
                                                <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Check In</th>
                                                <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Check Out</th>
                                                <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Nights</th>
                                                <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Avg/Night</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px !important;">
                                            
                                            <?php
                                            $n = 0;
                                            foreach ($roomtypesall as $rts) {
                                            ?>
                                                <tr>
                                                    <td> <b> Hotel:</b> <?php echo $hotel; ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
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
                                    <div class="cs-left_footer" style="width: 100%;  padding-top:50px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="cs-mb0">
                                                    <b class="cs-primary_color">In Word:</b>
                                                    <?php echo numberTowords("$totalamount"); ?>
                                                </p>
                                            </div>
                                            <div class="col-md-6" style="text-align:right;">
                                                <p class="cs-m0">
                                                    <div class="invoice-tbl-f">
                                                        <div class="row">
                                                            <div class="col-md-8 text-right fw-bold">
                                                                VAT: 
                                                            </div>
                                                            <div class="col-md-4">
                                                                 <?php
                                                                        echo 'AED ' . round(((intval($totalamount) / 100) * 5), 0);
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8 text-right fw-bold">
                                                                Grand Total: 
                                                            </div>
                                                            <div class="col-md-4">
                                                                <?php echo 'AED ' . $totalamount; ?>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-8 text-right fw-bold">
                                                                Total Amount: 
                                                            </div>
                                                            <div class="col-md-4 fw-bold">
                                                                <?php echo 'AED ' . $totalamount; ?>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <?php
                                                    if ($tax == '5%') {
                                                        // echo '<small style="float:right;">VAT 5% Applicable</small>';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="cs-invoice_footer">
                                <div class="cs-left_footer">
                                    <div class="cs-right_footer" style="width: 100%;">
                                        <table>
                                            <tbody>
                                                <!-- <tr class="cs-border_none">
                                                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                                                    <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">AED <?php echo $totalamount; ?></td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="cs-note" style="padding:0px 30px 30px 30px;">
                                <div class="cs-note_left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                                        <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                                        <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                    </svg>
                                </div>
                                <div class="cs-note_right ">
                                    <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
                                    <p class="cs-m0">Here we can write a additional notes for the client to get a better understanding of this invoice.</p>
                                </div>
                            </div><!-- .cs-note -->
                        </div>
                        <div class="cs-invoice_btns cs-hide_print">
                            <div class="row" style="width: 100%;">
                                <div class="col-md-6">
                                    <a href="javascript:window.print()" class="cs-invoice_btn btn theme_btn active btn-secondary" style="padding: 14px;border-radius: 5px;width: 190px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                                            <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                                            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                                            <circle cx="392" cy="184" r="24" />
                                        </svg>
                                        <span>Print Invoice</span>
                                    </a> 
                                </div>
                                <div class="col-md-6">
                                    <form action='bookingconfirmed.php' method='POST'>
                                        <input type='submit' name='submit' style='float:right; width:200px;' class="btn theme_btn active btn-secondary" value='Continue'>
                                    </form>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>

                <!-- <section class="invo mt-5 mb-3">
                    <div class="container invo-wrapper px-3 d-flex flex-column">
                        <div class="invo-top d-md-flex align-items-center justify-content-between">
                            <div class="col-left">
                                <img src="img/logo.png" alt="">
                            </div>
                            <div class="col-right">
                                <ul class="list-unstyled mx-0">
                                    <li>Sheik Zayad Road, Dubai, UAE</li>
                                    <li>Phone: +971-474848993, +971-474848993 </li>
                                    <li>Email: support@pcoconnect.com</li>
                                </ul>
                            </div>
                        </div>

                        <div class="html invo-body mt-3">
                            <div class="invo-body-wrapper">
                                

                                <div class="invoice-tbl my-4">
                                    <div class="invoice-tbl-h text-center">
                                        <div>Particulars</div>
                                        <div>Check In</div>
                                        <div>Check Out</div>
                                        <div>Nights</div>
                                        <div>Avg/Night</div>
                                        <div>Total AED</div>
                                    </div>

                                    <div class="invoice-tbl-b">
                                    </div>

                                            <div class="invoice-tbl-f text-center">
                                                <div><span class="fw-bold">In Words: </span>
                                                    <?php
                                                    echo numberTowords("$totalamount"); ?></div>

                                                <div class="fw-bold">VAT <br /> Grand Total <br /></div>
                                                <div class="fw-bold">
                                                    <?php
                                                    echo 'AED ' . round(((intval($totalamount) / 100) * 5), 0);
                                                    echo '<br/>';
                                                    echo 'AED ' . $totalamount;
                                                    ?>

                                                </div>
                                            </div>

                                            <?php
                                            if ($tax == '5%') {
                                                // echo '<small style="float:right;">VAT 5% Applicable</small>';
                                            }
                                            ?>
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


                                ?> -->


                <!-- <div class = "invo-bottom mt-3">
                        <form class = "invo-pay">
                            <div class = "row mx-0">
                                <div class = "col-md-6 col-lg-4 px-0 pe-3">
                                    <div class = "col-left py-4 px-3 h-100">
                                        <p class = "fw-bold">Select a payment method</p>
                                        <div class = "mb-3">
                                            <input type="radio" class="checkbox-round" name = "payment_method" />
                                            <span class = "ms-2 fw-bold">Pay from my Account</span>
                                        </div>
                                        <div class="mb-3">
                                            <input type="radio" class="checkbox-round" name = "payment_method" />
                                            <span class = "ms-2 fw-bold">Pay Later (Bank Transfer)</span>
                                        </div>
                                        <div>
                                            <input type="radio" class="checkbox-round" name = "payment_method" />
                                            <span class = "ms-2 fw-bold">Credit Card</span>
                                        </div>
                                    </div>
                                </div>
                                <div class = "col-md-6 col-lg-8 px-0 ps-3">
                                    <div class = "col-right h-100">
                                        <p class = "fw-bold px-3 py-2 text-white">Select a payment method</p>
                                        <div class = "px-4 pb-3">
                                            <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                                <span>Available Balance:</span>
                                                <span class = "ms-2 fw-bold">AED 576.00</span>
                                            </div>
                                            <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                                <span>Transaction Amount:</span>
                                                <span class = "ms-2 fw-bold">AED 576.00</span>
                                            </div>
                                            <div class = "pay-info-item d-flex align-items-center justify-content-between mb-2 pb-2">
                                                <span>Balance after Payment:</span>
                                                <span class = "ms-2 fw-bold">AED 576.00</span>
                                            </div>
                                            <div class = "form-check mt-3">
                                                <input type = "checkbox" class = "form-check-input"> 
                                                <label class="form-check-label" for="">I agree to pay from my Account</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class = "invo-policy my-5">
                            <h6 class = "mb-4">Cancellation Policy</h6>
                            <div class = "policy-item mb-4">
                                <p class = "fw-bold policy-item-title">1.1 Orders cancellation fee - Standard fee</p>
                                <ul class = "list-unstyled">
                                    <li>1.1.1 Cancelling 45 days or more before departure: the customer is charged a service fee of AUD 20.</li>
                                    <li>1.1.2 Cancelling between 44 and 21 days before departure: the customer is charged a service fee of AUD 40. </li>
                                </ul>
                            </div>
                            <div class = "policy-item mb-4">
                                <p class = "fw-bold policy-item-title">1.2 Orders cancellation fee - Orders with the Timetravels flexible cancellation fee</p>
                                <p>If you have selected the Timetravels flexible cancellation fee when booking the trip, the cancellation fees are:</p>
                                <ul class = "list-unstyled">
                                    <li>1.2.1 Cancelling 45 days or more before departure: the customer is charged a discounted service fee of AUD12.</li>
                                    <li>1.2.2 Cancelling between 44 and 21 days before departure: the customer is charged a discounted service fee of AUD12. </li>
                                    <li>1.2.3 Cancelling between 20 and 7 days before departure: the customer is charged a service fee of 40% of the total order value.</li>
                                    <li>1.2.4a Cancelling between 6 and 3 days before departure: the customer is charged a service fee of 75% of the total order value.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label" for="">I Confirm I have read the Cancellation Policy.</label>
                    </div>
            
            
                -->



                <!-- <br />

                    </div>
                    <a onclick="convert()" href="#" style='margin-left:100px; float:left; width:200px;' class="btn theme_btn active btn-secondary">Print Invoice</a>
                    <form action='bookingconfirmed.php' method='POST'>
                        <input type='submit' name='submit' style='margin-right:100px; float:right; width:200px;' class="btn theme_btn active btn-secondary" value='Continue'>
                    </form>
                    <br /><br /><br />
                </section> -->









            <!-- <section class="footer">
                    <div class="mainfooter">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 px-0">
                                    <div class="footer_col about">
                                        <h2>About</h2>
                                        <p>In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000’s. In those days, no one was using 100% web-based software or “cloud based” as we know it today.
                                            PCO Connect not only survived the “dot com” burst of the early 2000s but steadily grew, Today, PCO Connect has serves over 100,000 customers and companies.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 px-0">
                                    <div class="footer_col m-0">
                                        <h2>Testinomials</h2>
                                        <img src="img/quote.png" alt="">
                                        <p>Excellent pre- and during-event results. Well-planned customer service solved all problems. I'd recommend the Services to any event organizer in Dubai or the Gulf Region. Thanks for attending.</p>
                                        <hr />
                                        <ul class="footerslides owl-carousel">
                                            <li>
                                                <h6>Drew Donavan</h6>
                                                <p>International Telecommuication Union
                                                    Head, Safety and Security Division</p>
                                            </li>

                                            <!--  <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>
                                <li>
                                    <h6>Drew Donavan</h6>
                                    <p>International Telecommuication Union 
                                        Head, Safety and Security Division</p>
                                </li>-->
                        <!-- </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 m-0 px-4">
                                    <div class="footer_col info m-0">
                                        <h2>Connect with us</h2>
                                        <ul class="socialmedia">
                                            <li>
                                                <a href="https://www.facebook.com/Pcoconnect/">
                                                    <img src="img/social/facebook.png" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.linkedin.com/Pcoconnect/?_l=en_US">
                                                    <img src="img/social/linkedin.png" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/Pcoconnect/">
                                                    <img src="img/social/twitter.png" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/Pcoconnect/">
                                                    <img src="img/social/instagram.png" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                        <h6 class="address_title">Travel Synergies Tourism LLC</h6>
                                        <ul class="addresses">
                                            <li>
                                                Al Nassima Towers
                                            </li>
                                            <li>Sheikh Zayed Road
                                            </li>
                                            <li>Dubai, UAE</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="quickLinks">
                        <div class="container px-0">
                            <nav class="nav">
                                <a class="nav-link active" aria-current="page" href="#">About us</a>
                                <a class="nav-link" href="#">Add your property</a>
                                <a class="nav-link" href="#">customer Service</a>
                                <a class="nav-link" href="#">FAQ</a>
                                <a class="nav-link" href="#">Careers</a>
                                <a class="nav-link" href="#">Terms & Conditions</a>
                                <a class="nav-link" href="#">Privacy and Cookies</a>
                            </nav>
                        </div>
                    </div>
                    <div class="copyright">
                        <div class="container">
                            <div class="copylayout">
                                <div class="copy_text">Copyright 2022 PCO Connect | Design and Developed By <img style='width:100px;' src='squlogo.png'></div>
                                <div class="copy_text">A Sub Division Of <img style='width:100px;' src='tslogo.png'></div>
                            </div>
                        </div>
                    </div>
                </section> -->

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


<?php

include 'footer.php';
?>
</body>

</html>