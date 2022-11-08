<?php
session_start();
require_once('db_connection.php');


if ($_SESSION['loggedin'] != '1') {
  header("Location: index.php");
}


$hotel = $_SESSION['hotel'];

?>

<?php include './BaseFiles/base.php' ?>
<?php startblock('stylesheethead')?>

<?php endblock() ?>
<?php startblock('PageTitle') ?>
Hotels Dashboard
<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php'); ?>

<?php endblock(); ?>



<?php startblock('PageContent') ?>

<?php

require_once('db_connection.php');


$count = 0;
$rcount = 0;
$tcount = 0;
$sqlla = "SELECT * FROM loginforhotels";
$resultta = $conn->query($sqlla);


if ($resultta->num_rows > 0) {
  // output data of each row
  while ($rowww = $resultta->fetch_assoc()) {
    $count = $count + 1;
  }
}






$sqlla = "SELECT * FROM loginforvehicles";
$resultta = $conn->query($sqlla);


if ($resultta->num_rows > 0) {
  // output data of each row
  while ($rowww = $resultta->fetch_assoc()) {
    $tcount = $tcount + 1;
  }
}






$sqlla = "SELECT * FROM loginforrentacar";
$resultta = $conn->query($sqlla);


if ($resultta->num_rows > 0) {
  // output data of each row
  while ($rowww = $resultta->fetch_assoc()) {
    $rcount = $rcount + 1;
  }
}



?>
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">

    <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body">
                <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                    <div class="w-50">
                        <p><b>Hotels</b> </p>
                        <br />
                        <h4 class=""><?php echo $count; ?></h4>
                    </div>
                    <div class="w-50">
                        <p class="mb-3 float-end text-success">+ 1 <i class="bi bi-arrow-up"></i></p>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body">
                <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                    <div class="w-50">
                        <p><b>Transport Companies</b></p>

                        <h4 class=""><?php echo $tcount; ?></h4>
                    </div>
                    <div class="w-50">
                        <p class="mb-3 float-end text-success">+ 1 <i class="bi bi-arrow-up"></i></p>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card overflow-hidden radius-10">
            <div class="card-body">
                <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                    <div class="w-50">
                        <p><b> Rent a Car Companies</b></p>

                        <h4 class=""><?php echo $rcount; ?></h4>
                    </div>
                    <div class="w-50">
                        <p class="mb-3 float-end text-success">+ 1 <i class="bi bi-arrow-up"></i></p>
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-12 col-lg-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h6 class="mb-0">Revenue</h6>
                    <div class="fs-5 ms-auto dropdown">
                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div id="chart5"></div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h6 class="mb-0">By Device</h6>
                    <div class="fs-5 ms-auto dropdown">
                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-3 mt-2 align-items-center">
                    <div class="col-lg-7 col-xl-7 col-xxl-8">
                        <div class="by-device-container">
                            <div class="piechart-legend">
                                <h2 class="mb-1">85%</h2>
                                <h6 class="mb-0">Total Visitors</h6>
                            </div>
                            <canvas id="chart6"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-5 col-xxl-4">
                        <div class="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                    <i class="bi bi-tablet-landscape-fill me-2 text-primary"></i> <span>Tablet - </span> <span>22.5%</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                    <i class="bi bi-phone-fill me-2 text-primary-2"></i> <span>Mobile - </span> <span>62.3%</span>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between border-0">
                                    <i class="bi bi-display-fill me-2 text-primary-3"></i> <span>Desktop - </span> <span>15.2%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('scriptBottom')?>
<script src="./assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="./assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="./assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <script src="./assets/js/index.js"></script>
<?php endblock() ?>

<?php startblock('FooterText') ?>
  Desgin and Developed by Squalltec
<?php endblock() ?>