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
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"  style="color:white;" href="#" data-bs-toggle="dropdown">
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

    <div class="search-box" >
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


    <?php

    $sqll = "SELECT * FROM hotelsdatabase WHERE name='$hotel'";
    $resultt = $conn->query($sqll);

    if ($resultt->num_rows > 0) {
    ?>
      <li>
        <a href="createuserNew.php">
          <div class="parent-icon"><i class="bi bi-people"></i>
          </div>
          <div class="menu-title">Users</div>
        </a>
      </li>
      <li>
        <a href="bookings.php">
          <div class="parent-icon"><i class="bi bi-calendar-week"></i>
          </div>
          <div class="menu-title">Bookings</div>
        </a>

      </li>
      <li>
        <a href="managehotel.php">
          <div class="parent-icon"><i class="bi bi-building"></i>
          </div>
          <div class="menu-title">General Hotel Info</div>
        </a>

      </li>

      <li>
        <a href="managegeneralfacilities.php">
          <div class="parent-icon"><i class="bi bi-hospital-fill"></i>
          </div>
          <div class="menu-title">Manage Facilities</div>
        </a>

      </li>
    
      <li>
        <a href="editinventory.php">
          <div class="parent-icon"><i class="bi bi-pencil"></i>
          </div>
          <div class="menu-title">Add & View/Edit Inventory</div>
        </a>

      </li>

      <li>
        <a href="managepricesFIT.php">
          <div class="parent-icon"><i class="bi bi-window-plus"></i>
          </div>
          <div class="menu-title">FIT Rates</div>
        </a>

      </li>
      <li>
        <a href="managepricesEvents.php">
          <div class="parent-icon"><i class="bi bi-window-plus"></i>
          </div>
          <div class="menu-title">Event Rates</div>
        </a>

      </li>
      <li>
        <a href="additionalcharges.php">
          <div class="parent-icon"><i class="bi bi-patch-plus"></i>
          </div>
          <div class="menu-title">Additional Charges</div>
        </a>

      </li>
      <!-- <li>
        <a href="managerestaurants.php">
          <div class="parent-icon"><i class="bi bi-ui-checks"></i>
          </div>
          <div class="menu-title">Manage Restaurant</div>
        </a>

      </li> -->
      <!-- <li>
        <a href="manageclubs.php">
          <div class="parent-icon"><i class="bi bi-kanban"></i>
          </div>
          <div class="menu-title">Manage Clubs</div>
        </a>

      </li>

      <li>
        <a href="manageactivities.php">
          <div class="parent-icon"><i class="bi bi-ui-checks-grid"></i>
          </div>
          <div class="menu-title">Manage Activities</div>
        </a>

      </li> -->


      <li>
        <a href="addplanner11New.php">
          <div class="parent-icon"><i class="bi bi-building"></i>
          </div>
          <div class="menu-title">Add Banquet and Meeting Rooms</div>
        </a>

      </li>

      <li>
        <a href="managevenues.php">
          <div class="parent-icon"><i class="bi bi-building"></i>
          </div>
          <div class="menu-title">Manage Banquet and Meeting Rooms</div>
        </a>

      </li>

      <li>
        <a href="uploadcontract.php">
          <div class="parent-icon"><i class="bi bi-file-earmark-medical"></i>
          </div>
          <div class="menu-title">Contracts</div>
        </a>

      </li>

      <li>
        <a href="reports.php">
          <div class="parent-icon"><i class="bi bi-file-earmark-medical"></i>
          </div>
          <div class="menu-title">Reports</div>
        </a>

      </li>



    <?php
    }
    ?>
  </ul>
  <!--end navigation-->
</aside>
<!--end sidebar -->