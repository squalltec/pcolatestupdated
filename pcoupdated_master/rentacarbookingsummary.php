<?php

session_start();
include 'db_connection.php';


$aid = $_SESSION['aid'];
$brand = $_SESSION['brand'];
$model = $_SESSION['model'];
$year = $_SESSION['year'];
$singleprice = $_SESSION['singleprice'];
$totalprice = $_SESSION['totalprice'];
$totaldays = $_SESSION['totaldaysrent'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$pickuplocation = $_SESSION['pickuplocation'];
$pickupdate = $_SESSION['pickupdate'];
$pickuptime = $_SESSION['pickuptime'];
$dropofflocation = $_SESSION['dropofflocation'];
$dropoffdate = $_SESSION['dropoffdate'];
$dropofftime = $_SESSION['dropofftime'];



$pickordelivery = $_SESSION['pickordelivery'];
$deliveryperday = $_SESSION['deliveryperday'];



$uniquenumber = rand(10, 100000000);

$_SESSION['bookingnumber'] = $uniquenumber;



$taxvalue = intval($totalamountt) / 100 * 5;

$totalamount = intval($totalamountt) + intval($taxvalue);


if (isset($_POST['submit'])) {



    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['nationality'] = $_POST['nationality'];

    $_SESSION['remarks'] = $_POST['remarks'];


    $_SESSION['totalpricewithvat'] = $_POST['grandvatpri'];


    echo "<script>location.replace('rentacarinvoice.php');</script>";
}


include 'header.php';

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

    .panel-heading:active {
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

    .hotelSummeryTop {
        border: 1px solid #ce3435;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .text-bold {
        font-weight: bold;
    }

    .all-text-black {
        color: black;
    }

    .theme-color {
        color: #ce3435;
    }

    .form-control {
        border: 1px solid #ce3435;

    }

    .panel-heading:active a {
        background-color: #ce3435;
        color: white;
    }

    .panel-heading:hover {
        background-color: #ce3435;
    }

    .panel-heading:hover a {
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

                            <a class="nav-link active show" data-toggle="tab" href="#HotelsBooking"> <i class="bi bi-car"></i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-airplane-engines" viewBox="0 0 16 16">
                                    <path d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0ZM7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1c.213 0 .458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7V3Z" />
                                </svg> Rent a Car</a>
                        </li>

                    </ul>
                </div>
                <hr style="height:3px; color:#DC3545;">
                <div class="col-md-12">
                    <div class="row" style="background-color: #ce3435; color:white; padding:12px;" data-toggle="collapse" data-target="#BookingTotalPriceBox">
                        Total Booking Price
                    </div>
                    <div id="BookingTotalPriceBox" class="collapse out">

                        <!---Booking Price Loop Content Start -->

                        <div>
                            <div class="row" style="color:black; padding-top:10px; padding-left:0px; padding-right:0px;">
                                <div class="col-lg-8 d-flex justify-content-left">
                                    <p>Breakdown</p>
                                </div>
                                <div class="col-lg-4 d-flex justify-content-right">
                                    <p style="font-weight: bold !important;"><span class="badge badge-primary badge-pill"><?php echo $totaldays; ?> X AED <?php echo $singleprice; ?></span></p>
                                </div>
                            </div>



                        </div>

                        <!---Booking Price Loop Content End-->



                    </div>
                    <form action='#' method='POST'>
                        <hr style="height:3px; color:#DC3545;">

                        <div class="row" style="color: black;">
                            <div class="col-lg-8 d-flex justify-content-left">
                                <p>Total</p>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-right">
                                <p>AED <?php echo $totalprice; ?></p>
                            </div>



                            <?php if ($pickordelivery == 'Delivery') {
                            ?>
                                <div class="col-lg-8 d-flex justify-content-left">
                                    <p>Delivery</p>
                                </div>



                                <div class="col-lg-4 d-flex justify-content-right">



                                    <?php  }
                                    ?><?php
                                                        $dc = '0';
                                                        if ($pickordelivery == 'Delivery') {
                                                            // echo 'AED '.$totalprice.'<br/>';
                                                            $dc = intval($deliveryperday);
                                                            $totalprice = $totalprice + $dc;
                                                        ?>
                                    AED <?php echo ' ' . $dc; ?>

                                <?php
                                                        }
                                ?>
                                </div>


                                <input style='display:none;' name="grandvatpri" value='<?php echo intval($totalprice) + (intval($totalprice) / 100 * 5); ?>'>

                        </div>
                        <div class="row" style="color: rgba(0, 0, 0, 0.75); font-size:13px;">
                            <div class="col-lg-8 d-flex justify-content-left">
                                <p>VAT</p>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-right">
                                <p>5%</p>
                            </div>
                        </div>
                        <div class="gTotal_foot">
                            <div class="d-flex align-items-center justify-content-between w-100">
                                <p class="mb-0">Grand Total </p>
                                <span>AED <nonsense id="gt"><?php echo (intval($totalprice) / 100 * 5) + intval($totalprice) ?></nonsense></span>
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
                                        <h5 style="color:black;"><?php echo $brand . ' ' . $model . ' ' . $year; ?></h5>
                                        <p class="mb-0 pb-1" style="font-size: 12px;color: rgba(0,0,0,.5);">
                                            <span><i class="bi bi-geo-alt"></i></span>
                                            <span><?php echo $city . ', ' . $country; ?></span><br />
                                            <span><?php echo 'Days: ' . $totaldays; ?></span>
                                        </p>

                                    </div>
                                    <div class="col-md-8 all-text-black" style="border-left:1px solid #ce3435; padding-top: 20px;">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">Pickup Date:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"><?php echo $pickupdate; ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">Dropoff Date:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"><?php echo $dropoffdate; ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">Pickup Time:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"><?php echo $pickuptime; ?></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6 d-flex justify-content-end">Dropoff Time:</div>
                                                    <div class="col-md-6 d-flex justify-content-start text-bold theme-color"><?php echo $dropofftime; ?></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <div class="panel-group" id="accordion">




                                    <div class="panel panel-default">
                                        <div style='background-color:#ce3435; color:white !important;' class="panel-heading">
                                            <h4 class="panel-title ">
                                                <a style='color:white !important;' id='clc' data-toggle="collapse" data-parent="#accordion" href="#roomColl1">
                                                    Car
                                                    <i class="bi bi-chevron-down roomChevronIcon"></i>
                                                </a>


                                            </h4>
                                        </div>


                                        <div id="roomColl1" class="panel-collapse collapse in">
                                            <div class="panel-body">


                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <select type="text" name="title" placeholder="Title" class="form-control">
                                                                <option>Mr.</option>
                                                                <option>Mrs.</option>
                                                                <option>Miss.</option>
                                                                <option>Dr.</option>
                                                                <option>Prof.</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" required name="fname" placeholder="First Name" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" required name="lname" placeholder="Last Name" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-12" style="padding: 0px;">
                                                            <input type="text" required name="phone" placeholder="Phone" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" required name="email" placeholder="Email" class="form-control" />
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                                            <input type="text" required name="nationality" placeholder="Nationality" class="form-control" />
                                                        </div>




                                                        <div style='padding-left:0 !important;' class="col-md-12 mb-2">
                                                            <br />
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                                                                    <textarea name='remarks' class='form-control' placeholder='Write Remarks/ Special Requests'></textarea>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>


                                                </div>



                                            </div>
                                        </div>

                                        <input class='btn btn-danger' type='submit' name='submit' id='subm' style='display:none; float:right; background-color:#ce3435;' value='Complete My Booking'>






















                                        </form>

                                        <input class='btn btn-danger' onclick='terms()' style='float:right; background-color:#ce3435;' value='Complete My Booking'>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>




<script>
    function terms() {
        document.getElementById('popterms').click();
    }
</script>


<!-- Large modal -->
<button type="button" id='popterms' class="btn btn-primary" style='display:none;' data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


    <div class="modal-dialog modal-lg">
        <button style='float:right;' type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <div style='padding:20px; overflow-y: scroll;' class="modal-content">


            <h4 align='center'>Terms & Conditions</h4>

            <b align='center'>General Terms</b><br />
            • The hirer and/or driver holds full responsibility for the vehicle during the rental agreement period, it is recommended not to give access to any valet, car wash or hotel staff. <br />
            • The hirer and/or driver must ensure that the vehicle is parked in a safe and secure location when it’s not in use. Any damages caused to the vehicle including to damages due to acts of nature will be the sole responsibility of the hirer and/or driver.<br />
            • PCO Connect does not give permission to the hirer and/or driver to drive the vehicle outside the U.A.E or sub rent the vehicle to an individual or company.<br />
            • The hirer or driver is not allowed to stick any paper, foil or wrap on the vehicle due to damaging the protection layer on the vehicle.<br />
            • PCO Connect and its suppliers absolves itself from any responsibility to loss of valuable belongings in the vehicle during or after the rental agreement.<br />
            • The hirer and/or driver agrees to pay for all traffic and parking fines. PCO Connect reserves the right within one year after the end of the rental agreement, to claim any unpaid amounts like damages, traffic fines or violations from the hirer or driver. <br />
            • The hirer and/or driver must return the vehicle with a full tank of fuel, all our vehicles are delivered with a full tank and use Super 98 Petrol. If in any case the vehicle returns without a full tank, the hirer and/or driver will be charged for the missing fuel plus a 100 AED Admin fee.<br />
            • For extension of the rental agreement, the hirer and/or driver will put in a written request to PCO Connect to create an amended rental agreement. PCO Connect will approve the request subject to availability. In case of failing to do so, PCO Connect is permitted to increase the daily rental fee up to double the amount due to future loss of business. <br />
            • In case of any cancellation less than 24 hours prior to the booking date and time, the full amount of the invoice will be non-refundable.<br />
            • One-day hire means 24 hours from the hour of receiving the vehicle.<br />
            • One-week hire means 7 days from the day and hour of receiving the vehicle.<br />
            • One-month hire means 30 days from the day and hour of receiving the vehicle.<br />
            • The hirer and/or driver is responsible for the interior and exterior of the hired vehicle. Wet clothing, creams or oils and jewelry may cause damages to the interior of the vehicle. In case of any damages, PCO Connect and its suppliers will charge the hirer and/or driver accordingly for those damages.<br />
            • The deposit of minimum 5000 AED and maximum of 20.000 AED is subject to vehicle, age of hirer and/or driver and duration of rental agreement.<br />
            • The hirer and/or driver is obligated to return the hired vehicle upon the request of PCO Connect and its suppliers due to service, updating documentation or any general requirement.<br />
            • If a tourist hirer and/or a driver starts an agreement on his home country or international license and changes status to resident, then the hirer or driver is obligated to update PCO Connect and its suppliers with their resident driving license and Emirates ID as per UAE Law. The tourist hirer and/or driver must provide PCO Connect and its suppliers with a copy of entry stamp before driving the vehicle.<br /><br />

            <b align='center'>Accidents and Insurance coverage</b><br />
            • In case of an accident caused by the hirer and/or driver, the hirer and/or driver will have to pay the excess fee of………………………..(Subject to vehicle).<br />
            • The daily rental for the amount of days that the vehicle requires to be fully repaired and 20% of the total agency repair invoice due to the effect on the residual value of the vehicle after being repaired. <br />
            • The hirer and/or driver is responsible for the vehicle during the agreed rental period and is responsible for any damages due to carelessness, negligence or intention.<br />
            • In case of any accident, please report to PCO Connect for immediate assistance and contact the police to attend the location for safety and legal procedures. Failing to do so will result in paying for all damages or replacement of the vehicle. <br />
            • The hirer and/or driver is not allowed to repair or modify anything on the hired vehicle without informing PCO Connect under any circumstances (This needs to be confirmed in writing by PCO Connect)<br />
            • Vehicles are not to be used on or in racetracks, flooded areas, off road, desert, safari or any environment which can cause damage to the vehicle. <br />
            • The hirer and/or driver is not allowed to use the hired vehicle to pull, recover or jumpstart any other vehicle. <br />
            • The hirer and/or driver will hold all liabilities as the insurance does not cover the mentioned damages.<br />
            • In the case of any accident is caused due to the hirer and/or driver being under the influence of alcohol, drugs or any substitute that affects the driving ability. The hirer and/or driver will have to pay a full compensation of all damages and rental for the days the vehicle requires to be fully repaired or replaced.<br />
            • The insurance coverage does not apply for the following damages: front windscreen, glass, tires, rims, upholstery, and stone chips during the rental. These will be charged accordingly to the hirer and/or driver with fixed estimated quotations by the PCO Connect and its supplier management with full liability to the hirer and/or driver.<br />
            • It is hereby agreed upon between PCO Connect and the hirer or driver that in the case of a “Total Loss” (vehicle beyond repairs or theft) the hirer or driver will pay up to 30% of the total insured value. <br />
            • The amount of…………………………………………………. (Subject to vehicle) The hirer and/or driver will continue to pay the daily rental for the duration until the insurance pays out the amount.<br />
            • The hirer and/or driver is responsible for the excess insurance liability fee in case of an accident. This amount is calculated accordingly to the make and model of the vehicle and mentioned on the front of this contract.<br />

            <br /><b align='center'>Minimum Age </b><br />
            The minimum age restriction is 21 years for luxury vehicles and 25 years old for sport cars. The hirer and/or driver is not allowed to permit access of the vehicle to any unlicensed person or a person under the age of 21 years old.

            <br /><br /><b align='center'>Non Smoking</b><br />
            All our cars are Non-Smoking due to hygiene and quality standards. If the hirer, driver or passenger decides to smoke in the vehicle, a fee of 2500 AED will be charged for cleaning and sanitization of the car.

            <br /><br /><b align='center'>Max Kms per day</b><br />
            The hirer and/or driver is allowed to drive 250 kms a day and will be charged accordingly for excess kms.
            This will be stated on the front page of this agreement, subject to the vehicle and duration of the agreement.

            <br /><br /><b align='center'>Legal</b><br />
            The hirer and/or driver agrees that PCO Connect and its suppliers are permitted to submit a court file to the judge of urgent matters for a travel ban in the following cases: failing to return the vehicle on the agreed date and time or failing to pay any due amount (rent, fines, tolls or damages).
            The hirer and/or driver agrees by signing this agreement, that diverting from any point made on this agreement will become a breach of contract and results to forfeiting the security deposit and involvement of the local authorities. The hirer or driver will pay all liabilities for courts, lawyers and rental until the case is closed.






            <div style='background-color:white; bottom:-20px; position:sticky;' class="modal-footer">
                <i class="fa fa-print" style="font-size:48px;color:red"></i>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                <button type="button" onclick='clickcomplete()' style='background-color:#006400 !important;' class="btn btn-primary">Accept</button>

            </div>

        </div>

    </div>

</div>




<script>
    function clickcomplete() {
        document.getElementById('subm').click();
    }
</script>



<script>
    $('.panel-collapse').on('show.bs.collapse', function() {
        $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function() {
        $(this).siblings('.panel-heading').removeClass('active');
    });
</script>

<script>
    document.getElementById('clc').click();
</script>

<?php include 'footer.php'; ?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    function showp($this) {

        var aid = $this.getAttribute('data-id');

        var sh = document.getElementById('abcshow' + aid);

        var da = document.getElementById('da' + aid);

        if (sh.style.display === 'block') {
            sh.style.display = 'none';
            da.classList.replace("up", "down");

        } else {
            sh.style.display = 'block';
            da.classList.replace("down", "up");
        }


    }
</script>