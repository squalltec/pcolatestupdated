
<?php
session_start();
require_once('db_connection.php');
		 

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
  <link href="assets/css/style.css" rel="stylesheet" />u
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">
  

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
                    <img src="logo.png" class="user-img" alt="">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                     <a class="dropdown-item" href="#">
                       <div class="d-flex align-items-center">
                          <img src="logo.png" alt="" class="rounded-circle" width="54" height="54">
                          <div class="ms-3">
                            <h6 class="mb-0 dropdown-user-name">Super Admin</h6>
                            <small class="mb-0 dropdown-user-designation text-secondary">admin</small>
                          </div>
                       </div>
                     </a>
                   </li>
                   <li><hr class="dropdown-divider"></li>
                   <li>
                      <a class="dropdown-item" href="pages-user-profile.html">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Profile</span></div>
                         </div>
                       </a>
                    </li>
                    
                    
                        <li>
                      <a class="dropdown-item" href="deletehotels.php">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Delete Hotels</span></div>
                         </div>
                       </a>
                    </li>
                          
                        <li>
                      <a class="dropdown-item" href="deletevehicles.php">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Delete Transport</span></div>
                         </div>
                       </a>
                    </li>
                    
                      <li>
                      <a class="dropdown-item" href="deleterent.php">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-person-fill"></i></div>
                           <div class="ms-3"><span>Delete Rent a Car</span></div>
                         </div>
                       </a>
                    </li>
                    
                    
                    <li>
                      <a class="dropdown-item" href="#">
                         <div class="d-flex align-items-center">
                           <div class=""><i class="bi bi-gear-fill"></i></div>
                           <div class="ms-3"><span>Setting</span></div>
                         </div>
                       </a>
                    </li>
                   
                    
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
              <img src="logo.png" style="width:100%;" class="logo-icon" alt="logo icon">
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
              <a href="contactsDatabase.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Contacts</div>
              </a>
              
            </li>
            
                <li>
              <a href="updatecontactsDatabase.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Contacts</div>
              </a>
              
            </li>
            
            
            
            
            
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Destination</div>
              </a>
              <ul>
             
            
            	<li>
              <a href="sendtest.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Add Destination</div>
              </a>
              
            </li>
            
            
            
            <li>
              <a href="citydestination.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Destination / Add Areas</div>
              </a>
              
            </li>
            
            
            	<li>
              <a href="addtaxes.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Add Taxes</div>
              </a>
              
            </li>
            
            	<li>
              <a href="specifyregions.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Specify Regions</div>
              </a>
              
            </li>
			
            
              </ul>
            </li>
              
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
              <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Events</div>
              </a>
              <ul>
                  
                  
               <li>
              <a href="fetcheventsfromgoogly.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Fetch Events</div>
              </a>
              
            </li>    
               
               
               
                    <li>
              <a href="listedevents.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Edit Events</div>
              </a>
              
            </li>    
               
                  
                  
                         <li>
              <a href="eventsdb.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Database</div>
              </a>
              
            </li>
                  
                  
                  
                  
                  
                  
                  
                  
                  
              	<li>
              <a href="add_event.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Add Event</div>
              </a>
              
            </li>
            
            	<li>
              <a href="listevents.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">View Events</div>
              </a>
              
            </li>
            
            </ul>
            </li>
            
            
            
            
          
               
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Hotels</div>
              </a>
              <ul>
                 
              <li>
              <a href="contactsdb.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Database</div>
              </a>
              
            </li>
            
            <li>
              <a href="hotelsregister.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Hotels Sign Up</div>
              </a>
              
            </li>
            
                 
            
            	<li>
              <a href="managenewhotels.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Hotels</div>
              </a>
              
            </li>
            
            
             	<li>
              <a href="needapprovallist.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Rates Need Approval</div>
              </a>
              
            </li>
            
            	<li>
              <a href="needapprovallist2.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Approved Rates</div>
              </a>
              
            </li>
            
            
            
            
            	<li>
              <a href="topsellinghotels.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Top Selling Hotels</div>
              </a>
              
            </li>
            
            
              </ul>
            </li>
            
            
            
            
                
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Rent a Car</div>
              </a>
              <ul>
                 
               <li>
              <a href="contactsrentacardb.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Database</div>
              </a>
              
            </li>
           
           
            <li>
              <a href="rentacarregister2.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Create Rent A Car Company</div>
              </a>
              
            </li> 
        
            
            
            <li>
              <a href="managenewrentacar.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Rent a Car</div>
              </a>
              
            </li>
           
           
           
           
         
             	<li>
              <a href="needapprovallistrc.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Rates Need Approval</div>
              </a>
              
            </li>
            
            	<li>
              <a href="needapprovallist2rc.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Approved Rates</div>
              </a>
              
            </li>
              
           
                	<li>
              <a href="needapprovallistrcdist.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Discounts Need Approval</div>
              </a>
              
            </li>
           
           
           	<li>
              <a href="approveddiscountsrc.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Approved Discounts</div>
              </a>
              
            </li>
           
           
           
           
           
           
             <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Featured</div>
              </a>
              <ul>
                 
               <li>
              <a href="toppicks.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Top Picks</div>
              </a>
              
            </li>
           
            </ul>
                </li>
           
           
           
              </ul>
            </li>
            
            
            
           
           
           
           
             
            
                
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Transport</div>
              </a>
              <ul>
                 
            
            <li>
              <a href="contactstransportdb.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Database</div>
              </a>
              
            </li>
           
           
           
           
                    <li>
              <a href="vehiclesregister2.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Create Transport Company</div>
              </a>
              
            </li> 
           
            
			
				<li>
              <a href="managenewvehicles.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Transport</div>
              </a>
              
            </li>
            
            
            
            
            
            
             	<li>
              <a href="needapprovallisttr.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Rates Need Approval</div>
              </a>
              
            </li>
            
            	<li>
              <a href="needapprovallist2tr.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Approved Rates</div>
              </a>
              
            </li>
            
            
            
            
            
            
           
              </ul>
            </li>
            
            
           
           
           
           
           
               
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Tours</div>
              </a>
              <ul>
                  
                  
                  
                  
                  
                   <li>
              <a href="contactstourdb.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Database</div>
              </a>
              
            </li>
           
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                 
          
                      <li>
              <a href="toursregister.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Register Tour Company</div>
              </a>
              
            </li> 
            
           
              </ul>
            </li>
            
           
           
            
            
            
            
            
            
               
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Venues</div>
              </a>
              <ul>
                 
          
                      <li>
              <a href="venueregister.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Register Venue</div>
              </a>
              
            </li> 
            
            
            
            
            	<li>
              <a href="managenewvenues.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Venues</div>
              </a>
              
            </li>
            
            
           
              </ul>
            </li>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
			
		
			
		
			
			
		
            
	<!--		<li>
              <a href="view_prices.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">View Prices</div>
              </a>
              
            </li>
			
			
			
			
			
			
			
			
				<li>
              <a href="view_hotels.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">View Hotel</div>
              </a>
              
            </li>
			
			
			
			
			
			
			
			
			
			<li>
              <a href="choose_book.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Book</div>
              </a>
              
            </li>
			
			
			
			
			
			
			
			
			
			
			
				<li>
              <a href="view_rooms.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">View Rooms</div>
              </a>
              
            </li>
			
			
			-->
			
			
				<li>
              <a href="approvehotelcontracts.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Contracts</div>
              </a>
              
            </li>
			
			
			
			
			
			
			
			
			  <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Bookings</div>
              </a>
              <ul>
                 
          
                      <li>
              <a href="bookings.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Hotel Bookings</div>
              </a>
              
            </li> 
            
            
            
                      <li>
              <a href="transferbookings.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Transfer Bookings</div>
              </a>
              
            </li> 
            
            
            
                      <li>
              <a href="rentacarbookings.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Rent a Car Bookings</div>
              </a>
              
            </li> 
           
              </ul>
            </li>
            
           
			
			
			
			
			
			
			
			
			
			
			
			
				
			  <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Traffic</div>
              </a>
              <ul>
                  
                  
                  
          <li>
              <a href="adssignup.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Ad Provider Signup</div>
              </a>
              
            </li>          
                  
                  
                  
           	<li>
              <a href="managenewads.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Manage Ads Provider</div>
              </a>
              
            </li>       
                  
                  
                  
                  
                  
                  
                  
                 
                   <li>
              <a href="specifyads.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Specify Ads</div>
              </a>
              
            </li> 
            
            
          
                      <li>
              <a href="adstraffic.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Ads Traffic</div>
              </a>
              
            </li> 
            
        
           
              </ul>
            </li>
            
           
           
           
           
           
           
            <li>
              <a href="logsmanagement.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Logs</div>
              </a>
              
            </li>
           
             <li>
              <a href="updatelogs.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Updates</div>
              </a>
              
            </li>
           
           
            <li>
              <a href="othersDatabase.php" >
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Others Database</div>
              </a>
              
            </li>
           
           
           
			
			
            
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
        <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button>
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