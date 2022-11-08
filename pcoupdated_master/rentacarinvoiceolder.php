<?php

session_start();
include 'db_connection.php';


include 'header.php';


$uniquenumber = rand(10, 100000000);
$_SESSION['bookingnumber'] = $uniquenumber;

$country = $_SESSION['country'];
$city = $_SESSION['city'];




$aid = $_SESSION['aid'];

$totaldays = $_SESSION['totaldaysrent'];


$title = $_SESSION['title'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$phone =  $_SESSION['phone'];
$nationality =  $_SESSION['nationality'];
$remarks =  $_SESSION['remarks'];

$totalpricewithvat = $_SESSION['totalpricewithvat'];


$dropofflocation = $_SESSION['dropofflocation'];
$dropofftime = $_SESSION['dropofftime'];
$dropoffdate = $_SESSION['dropoffdate'];
$pickuplocation = $_SESSION['pickuplocation'];
$pickupdate = $_SESSION['pickupdate'];
$pickuptime = $_SESSION['pickuptime'];



$flightnumb1 = $_SESSION['flightnumb1'];
$flightnumb2 = $_SESSION['flightnumb2'];
$pickordelivery = $_SESSION['pickordelivery'];







if (isset($_POST['submit'])) {



    $uniquenumber = $_SESSION['bookingnumber'];

    $country = $_SESSION['country'];
    $city = $_SESSION['city'];




    $aid = $_SESSION['aid'];

    $totaldays = $_SESSION['totaldaysrent'];


    $title = $_SESSION['title'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $phone =  $_SESSION['phone'];
    $nationality =  $_SESSION['nationality'];
    $remarks =  $_SESSION['remarks'];

    $totalpricewithvat = $_SESSION['totalpricewithvat'];


    $dropofflocation = $_SESSION['dropofflocation'];
    $dropofftime = $_SESSION['dropofftime'];
    $dropoffdate = $_SESSION['dropoffdate'];
    $pickuplocation = $_SESSION['pickuplocation'];
    $pickupdate = $_SESSION['pickupdate'];
    $pickuptime = $_SESSION['pickuptime'];



    $flightnumb1 = $_SESSION['flightnumb1'];
    $flightnumb2 = $_SESSION['flightnumb2'];
    $pickordelivery = $_SESSION['pickordelivery'];








    $sql = "INSERT INTO rentacarbookings (title,fname,lname,email,phone,nationality,carid,pickuplocation,pickupdate,pickuptime,dropofflocation,dropofftime,dropoffdate,days,price,uniquenumber,remarks,flightnumb1,flightnumb2,pickordelivery)
           VALUES ('$title','$fname','$lname','$email','$phone','$nationality','$aid','$pickuplocation','$pickupdate','$pickuptime','$dropofflocation','$dropofftime','$dropoffdate','$totaldays','$totalpricewithvat','$uniquenumber','$remarks','$flightnumb1','$flightnumb2','$pickordelivery')";

    $resulta = $conn->query($sql);


    if ($resulta === TRUE) {
    }











    echo "<script>location.replace('rentacarbookingconfirmed.php');</script>";
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
                                        <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Pickup Location/Date/Time</th>
                                        <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Dropoff Location/Date/Time</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Days</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Avg/Night</th>
                                        <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Total AED</th>
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
                        <!-- <div class="cs-invoice_footer">
                            <div class="cs-left_footer cs-mobile_hide"></div>
                            <div class="cs-right_footer">
                                <table>
                                    <tbody>
                                        <tr class="cs-border_none">
                                            <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                                            <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">$1160</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
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