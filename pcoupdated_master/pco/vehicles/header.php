
<?php
session_start();
require_once('db_connection.php');
	
	
if($_SESSION['loggedin']!='1'){
    header("Location: index.php");
}	 


$hotel=$_SESSION['hotel'];
$roler=$_SESSION['roler'];

?>


<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="logo.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>PCO Connect</title>
</head>

<body>




 <style>
       input[type='checkbox'] {
    accent-color: red;
}


.sidebar-wrapper .metismenu .mm-active>a, .sidebar-wrapper .metismenu a:active, .sidebar-wrapper .metismenu a:focus, .sidebar-wrapper .metismenu a:hover {
   color:red;
   border-left:4px solid red;
}

.nav-link{
    color:red;
}


a:active{
    color:red !important;
}
a:hover{
    color:red !important;
}
.swal2-confirm{
    background-color:red;
}
.swal2-styled{
     background-color:red;
}
   </style> 
    










<!--hide increment decrement buttons from input number-->
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>




  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">        
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3">
              
           <div style='  width: 35px;
  height: 2px;
  background-color: black;
  margin: 6px 0;'></div>
    <div style='  width: 35px;
  height: 2px;
  background-color: black;
  margin: 6px 0;'></div>
    <div style='  width: 35px;
  height: 2px;
  background-color: black;
  margin: 6px 0;'></div>
  
  
            </div>
            <form class="searchbar">
                <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                <input class="form-control" type="text" placeholder="Type here to search">
                <div class="position-absolute top-50 translate-middle-y search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
			
			
			

<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                      English
                    </a>
					
			 <select class="notranslate dropdown-menu" id="selectBox" onchange="changeFunc();">
   
    <option class="dropdown-item" value="en">English</option>
	<option class="dropdown-item"value="ru">Russian</option>
    <option class="dropdown-item"value="ar">عربي</option>
</select>
                    
                  </li>
                 
                </ul>
			
			
			
<style>
.VIpgJd-suEOdc{
  display:none !important;   
    
}

.goog-logo-link {
    display:none !important;
} 
    
.goog-te-gadget{
    color: transparent !important;
}

.goog-te-banner-frame.skiptranslate {
    display: none !important;
	
    } 
	body {
    top: 0px !important; 
    }
	
	.goog-te-combo
	{
	
	background-color:white;
	color:black;
	
	}
	
	
		.goog-te-combo option { color: black; }
		.goog-te-combo select { color: black; }
	
	
</style>








<script>
    
    function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    	changeLanguage(selectedValue);
   
   }
    
</script>



<script>

function googleTranslateInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ru,ar', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate');
}

/**
 * This will fire the event on target element
 * @param element
 * @param event
 * @returns {boolean}
 */
function fireEvent(element,event){
  console.log("in Fire Event");
  if (document.createEventObject){
    // dispatch for IE
    //console.log("in IE FireEvent");
    var evt = document.createEventObject();
    return element.fireEvent('on'+event,evt)
  }
  else{
    // dispatch for firefox + others
    //console.log("In HTML5 dispatchEvent");
    var evt = document.createEvent("HTMLEvents");
    evt.initEvent(event, true, true ); // event type,bubbling,cancelable
    return !element.dispatchEvent(evt);
  }
}

/**
 * This will set the language and fire the event
 * @param lang
 * e.g onclick="changeLanguage('bn')"
 */
function changeLanguage(lang) {
  var jObj = $('.goog-te-combo');
  var db = jObj.get(0);
  jObj.val(lang);
  fireEvent(db, 'change');
}

 </script>




            
            
            
            
            
            				    <!--GOOGLE TRANSLATE-->
					
					<div style="display:none" align="center" id="google_translate_element"></div>
	
	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: '', includedLanguages:'en,ru,ar'},
				'google_translate_element'
			);
		}
	</script>
	
	<script type="text/javascript" src=
"https://translate.google.com/translate_a/element.js?
		cb=googleTranslateElementInit">
	</script>
					
					<!--GOOGLE TRANSLATE END-->
            
          


    
			
			
			
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
                    <img src="../logo.png" class="user-img" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="../logo.png" alt="" class="rounded-circle" width="54" height="54">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION['name'];?></h6>
                         
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                 
                   
                    
                    <li><hr class="dropdown-divider"></li>
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
          <div class="sidebar-header">
            <div>
              <img src="../logo-icon.png" style="width:67px;" class="logo-icon" alt="logo icon">
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
              <a href="dashboard.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
              
            </li>
                
               <li>
              <a href="specifyregions.php" >
                <div class="parent-icon"><i class="bi bi-r-circle"></i>
                </div>
                <div class="menu-title">Specify Regions</div>
              </a>
              
            </li>
              
              
			<?php
			if($roler==''|| $roler=='admin')
			{
			?>
			
				 <?php
				
$sqll ="SELECT * FROM vehiclesdatabase WHERE name='$hotel'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
?>	


<li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Users</div>
              </a>
              <ul>
		
			<li>
              <a href="createuser.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Create User</div>
              </a>
              
            </li>
           	<li>
              <a href="listallusers.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">View User</div>
              </a>
              
            </li>
           
           
            </ul>
            </li>



			<li>
              <a href="managegeneralinfovehicles.php" >
                <div class="parent-icon"><i class="bi bi-kanban"></i>
                </div>
                <div class="menu-title">Manage General</div>
              </a>
              
            </li>
            
            	<li>
              <a href="managevehicles.php" >
                <div class="parent-icon"><i class="bi bi-car-front"></i>
                </div>
                <div class="menu-title">Manage Vehicles</div>
              </a>
              
            </li>
			
            
            	<li>
              <a href="listvehicles.php" >
                <div class="parent-icon"><i class="bi bi-patch-plus"></i>
                </div>
                <div class="menu-title">Manage Prices</div>
              </a>
              
            </li>
			
			
				<li>
              <a href="bookings.php" >
                <div class="parent-icon"><i class="bi bi-calendar-week"></i>
                </div>
                <div class="menu-title">Bookings</div>
              </a>
              
            </li>
            
            <?php
}
?>


<?php
}
?>

	<?php
			if(strpos($roler, 'accounts')!==false)
			{
			?>



<?php
}
?>


<?php
			if(strpos($roler, 'management')!==false)
			{
			?>

	<li>
              <a href="managegeneralinfovehicles.php" >
                <div class="parent-icon"><i class="bi bi-kanban"></i>
                </div>
                <div class="menu-title">Manage General</div>
              </a>
              
            </li>
            
            	<li>
              <a href="managevehicles.php" >
                <div class="parent-icon"><i class="bi bi-car-front"></i>
                </div>
                <div class="menu-title">Manage Vehicles</div>
              </a>
              
            </li>
			
            
            
			

<?php
}
?>


<?php
			if(strpos($roler, 'revenue')!==false)
			{
			   
			?>
			

	<li>
              <a href="listvehicles.php" >
                <div class="parent-icon"><i class="bi bi-patch-plus"></i>
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

       <!--start content-->
          <main class="page-content">
              
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  <script>
			  $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
			  </script>
			  

          </main>
       <!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

       <!--start switcher-->
       <div class="switcher-body">
        <button class="btn btn-danger btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
        <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
          <div class="offcanvas-header border-bottom">
            
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
        
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
              <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2">
              <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
              <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
           
            
          </div>
        </div>
       </div>
       <!--end switcher-->

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/js/pace.min.js"></script>
  <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
  <!--app-->
  <script src="assets/js/app.js"></script>
  <script src="assets/js/index.js"></script>
  <script>
    new PerfectScrollbar(".best-product")
 </script>


</body>

</html>