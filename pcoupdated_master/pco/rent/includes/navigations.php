<?php
if ($_SESSION['loggedin'] != '1') {
  header("Location: index.php");
}

$hotel = $_SESSION['hotel'];
$roler = $_SESSION['roler'];

?>
<style>
  /* div */
  .search-box {
    background: #fff;
    height: 40px;
    border-radius: 50px;
    padding: 0px 10px;
  }

  /* input */
  .search-input {
    outline: none;
    border: none;
    background: none;
    width: 0;
    padding: 0;
    color: #ce3435;
    float: left;
    font-size: 16px;
    transition: .3s;
    line-height: 40px;
  }

  .search-input::placeholder {
    color: #ce3435;
  }

  /* icon */
  .search-btn {
    color: #ce3435;
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    transition: .3s;
  }

  .search-input:focus,
  .search-input:not(:placeholder-shown) {
    width: 240px;
    padding: 0 6px;
  }

  .search-box:hover>.search-input {
    width: 240px;
    padding: 0 6px;
  }

  .search-box:hover>.search-btn,
  .search-input:focus+.search-btn,
  .search-input:not(:placeholder-shown)+.search-btn {
    background: #fff;
    color: #ce3435;
  }
</style>
<!--start top header-->
<header class="top-header">
  <nav class="navbar navbar-expand gap-3" style="background-color: #000;">
    <div class="mobile-toggle-icon fs-3">
      <i class="bi bi-list"></i>
    </div>

    <!-- <form class="searchbar">
       <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
       <input class="form-control" type="text" placeholder="Type here to search">
       <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
     </form> -->




    <ul class="navbar-nav  mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" style="color:white;" href="#" data-bs-toggle="dropdown">
          English
        </a>

        <select class="notranslate dropdown-menu" id="selectBox" onchange="changeFunc();">

          <option class="dropdown-item" value="en">English</option>
          <option class="dropdown-item" value="ru">Russian</option>
          <option class="dropdown-item" value="ar">عربي</option>
        </select>

      </li>

    </ul>





    <style>
      .VIpgJd-suEOdc {
        display: none !important;

      }

      .goog-logo-link {
        display: none !important;
      }

      .goog-te-gadget {
        color: transparent !important;
      }

      .goog-te-banner-frame.skiptranslate {
        display: none !important;

      }

      body {
        top: 0px !important;
      }

      .goog-te-combo {

        background-color: white;
        color: black;

      }


      .goog-te-combo option {
        color: black;
      }

      .goog-te-combo select {
        color: black;
      }
    </style>















    <style>
      .btn-switcher {
        top: 100px;
      }
    </style>

    <div class="search-box">
      <input type="text" class="search-input" placeholder="Start Looking For Something!" id="mySearchBox">
      <a class="search-btn" href="#">
        <i class="bi bi-search"></i>
      </a>
    </div>

    <div class="top-navbar-right ms-auto">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item search-toggle-icon">
          <a class="nav-link" href="#">
            <div class="">
              <i class="bi bi-search"></i>
            </div>
          </a>
        </li>
        <li class="nav-item dropdown dropdown-user-setting">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
            <div class="user-setting d-flex align-items-center">
              <img src="../logo-icon.png" class="user-img" alt="" width="100">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex align-items-center">
                  <img src="../logo-icon.png" alt="" class="rounded-circle" width="54" height="54">
                  <div class="ms-3">
                    <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION['name']; ?></h6>

                  </div>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="logout.php">
                <div class="d-flex align-items-center">
                  <div class=""><i class="bi bi-lock-fill"></i></div>
                  <div class="ms-3"><span>Logout</span></div>
                </div>
              </a>
            </li>
          </ul>
        </li>



      </ul>
    </div>
  </nav>
</header>
<!--end top header-->

<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header" style="background-color: #000;">
    <div>
      <img src="../logo-icon.png" class="logo-icon" alt="logo icon" style="width: 67px;">
    </div>
    <div>
      <!--<h4 class="logo-text">PCO Connect</h4>-->
    </div>
    <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="dashboard.php">
        <div class="parent-icon"><i class="bi bi-house-fill"></i>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>

    </li>


    <li>
      <a href="specifyregions.php">
        <div class="parent-icon"><i class="bi bi-geo-alt"></i>
        </div>
        <div class="menu-title">Specify Regions</div>
      </a>

    </li>




    <?php if ($roler == '' || $roler == 'admin') {
    ?>

      <?php

      $sqll = "SELECT * FROM rentacardatabase WHERE name='$hotel'";
      $resultt = $conn->query($sqll);

      if ($resultt->num_rows > 0) {
      ?>


        <li>
          <a href="createuserNew.php">
            <div class="parent-icon">
              <i class="bi bi-people"></i>
            </div>
            <div class="menu-title">Users</div>
          </a>
        </li>



        <li>
          <a href="managegeneralinfovehicles.php">
            <div class="parent-icon"><i class="bi bi-building"></i>
            </div>
            <div class="menu-title">Manage General</div>
          </a>

        </li>

        <li>
          <a href="managevehicles.php">
            <div class="parent-icon"><i class="bi bi-truck-front"></i>
            </div>
            <div class="menu-title">Manage Vehicles</div>
          </a>

        </li>


        <li>
          <a href="listvehicles.php">
            <div class="parent-icon"><i class="bi bi-tag"></i>
            </div>
            <div class="menu-title">Manage Prices</div>
          </a>

        </li>


        <li>
          <a href="bookings.php">
            <div class="parent-icon"><i class="bi bi-bookmark-plus"></i>
            </div>
            <div class="menu-title">Bookings</div>
          </a>

        </li>


        <li>
          <a href="addarea.php">
            <div class="parent-icon"><i class="bi bi-badge-ad"></i>
            </div>
            <div class="menu-title">Add Areas</div>
          </a>

        </li>


      <?php
      }
      ?>

    <?php
    }
    ?>


    <?php if (strpos($roler, 'accounts') !== false) {

    ?>


    <?php
    }
    ?>





    <?php if (strpos($roler, 'management') !== false) {

    ?>
      <li>
        <a href="managegeneralinfovehicles.php">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Manage General</div>
        </a>

      </li>

      <li>
        <a href="managevehicles.php">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Manage Vehicles</div>
        </a>

      </li>
      <li>
        <a href="bookings.php">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Bookings</div>
        </a>

      </li>


      <li>
        <a href="addarea.php">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Add Areas</div>
        </a>

      </li>

    <?php
    }
    ?>


    <?php if (strpos($roler, 'revenue') !== false) {

    ?>


      <li>
        <a href="listvehicles.php">
          <div class="parent-icon"><i class="bi bi-house-fill"></i>
          </div>
          <div class="menu-title">Manage Prices</div>
        </a>

      </li>

    <?php
    }
    ?>


  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->