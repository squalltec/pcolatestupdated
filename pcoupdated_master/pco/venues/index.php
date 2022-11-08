
<?php
session_start();
$_SESSION['meme'] ='';
  require_once('db_connection.php');
		 


function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

//echo $user_ip;











































function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}












 


$countrytocheck= ip_info("Visitor", "Country"); 











if (isset($_POST['submit'])) {
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$result = mysqli_query($conn, "SELECT * FROM loginforvenues WHERE email = '" . $email. "' and password = '" . $password. "'");
if(!empty($result)){
    
     
if ($row = mysqli_fetch_array($result)) {
    
    
    
	$_SESSION['meme'] ='';
	$_SESSION['step']='';
		$_SESSION['loggedin'] ='1';
		
			$_SESSION['hotel'] =$row['name'];
			$_SESSION['country'] =$row['country'];
			$_SESSION['city'] =$row['city'];
			$_SESSION['star'] =$row['star'];
			$_SESSION['email'] =$row['email'];
			$_SESSION['password'] =$row['password'];
			




			
			
			
		$date = date('d-m-y');
		$time = date('h:i');
			
	$sql = "INSERT INTO logs (hotel, country, city,role,date,time,ipaddress,fromm,ipadd)
VALUES ('".$row['name']."', '".$row['country']."', '".$row['city']."','admin','$date','$time','$countrytocheck','Venue Location','$user_ip')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
}		
			
			
			
			
			
			
			
			
			
			
			
			
			
	header("Location: multiplevenues.php");
	
	

	
	
}

else{
    
    
    
    
  $result2 = mysqli_query($conn, "SELECT * FROM venueusers WHERE email = '" . $email. "' and password = '" . $password. "'");
if(!empty($result2)){
    
     
if ($row2 = mysqli_fetch_array($result2)) {
    
    
    
	$_SESSION['meme'] ='';
	$_SESSION['step']='';
		$_SESSION['loggedin'] ='1';
		
			$_SESSION['hotel'] =$row2['hotel'];
			$_SESSION['country'] =$row2['country'];
			$_SESSION['city'] =$row2['city'];
			$_SESSION['star'] =$row2['star'];
			$_SESSION['email'] =$row2['email'];
			$_SESSION['password'] =$row2['password'];
			
				$_SESSION['roler'] =$row2['role'];
			
			

			
			
			
		$date = date('d-m-y');
		$time = date('h:i');
			
	$sql = "INSERT INTO logs (hotel,country,city,role,date,time,ipaddress,fromm,fname,lname,designation,ipadd)
VALUES ('".$row2['hotel']."', '".$row2['country']."', '".$row2['city']."','".$row2['role']."','$date','$time','$countrytocheck','venue Location', '".$row2['fname']."', '".$row2['lname']."', '".$row2['designation']."','$user_ip')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
 // echo "Error: " . $sql . "<br>" . $conn->error;
}		
					
			
			
			
			
	header("Location: setup.php");
	
	

	
	
}
    
}
else{
    
      
    
    
    
	
	
	$_SESSION['meme'] ='Invalid Email or Password';
	
	
}
	
	
}

    
}




} 



?>


















<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/onedash/demo/ltr/authentication-signin-with-header-footer.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Apr 2022 01:18:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="logo.png" type="image/png" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

  <title>PCO Connect</title>
</head>

<body class="bg-surface">

  <!--start wrapper-->
  <div class="wrapper">

       <header>
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded-0 border-bottom">
            <div class="container">
              <a class="navbar-brand" href="#"><img src="logo.png" width="20%" alt=""/></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
               

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                      English
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Arabic</a></li>
                      <li><a class="dropdown-item" href="#">Russian</a></li>
                     
                    </ul>
                  </li>
                 
                </ul>
                <div class="d-flex ms-3 gap-3">
                  <a href="login.php" class="btn btn-primary btn-sm px-4 radius-30">Login</a>
                  
                </div>
              </div>
            </div>
          </nav>
       </header>
    
       <!--start content-->
       <main class="authentication-content">
        <div class="container">
          <div class="mt-4">
            <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
              <div class="row g-0">
                <div class="col-12 order-1 col-xl-8 d-flex align-items-center justify-content-center border-end">
                  <img src="assets/images/error/auth-img-7.png" class="img-fluid" alt="">
                </div>
                <div class="col-12 col-xl-4 order-xl-2">
                  <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title">Sign In</h5>
                   <br/>
					
					
                     <form method='POST' action='#' class="form-body">
                      
                        <div class="row g-3">
                          <div class="col-12">
                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                              <input type="email" class="form-control radius-30 ps-5" name='email' id="inputEmailAddress" placeholder="Email">
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                            <div class="ms-auto position-relative">
                              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-lock-fill"></i></div>
                              <input type="password" name='password' class="form-control radius-30 ps-5" id="inputChoosePassword" placeholder="Password">
                            </div>
                          </div>
						  
						  <h3 style="color:red;"><?php echo $_SESSION['meme'];?></h3>
                          <div class="col-6">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                              <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                            </div>
                          </div>
                         
                          </div>
                          <div class="col-12">
                            <div class="d-grid">
                             <input type='submit' name='submit' value='Sign in' class="btn btn-primary radius-30"> 
                            </div>
                          </div>
                         
                          <div class="col-12 text-center">
                           
                          </div>
                        </div>
                    </form>
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </main>
        
       <!--end page main-->

       <footer class="bg-white border-top p-3 text-center fixed-bottom">
        <p class="mb-0">Copyright © 2022. All right reserved.</p>
      </footer>

  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/pace.min.js"></script>


</body>


</html>