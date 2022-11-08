
<?php
session_start();
require_once('db_connection.php');





if (isset($_POST['submit'])) {
    
    $_SESSION['checkflow']='yes';
    
    
    
	
	$_SESSION['country']=$_POST['country'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['event']=$_POST['event'];
$_SESSION['hotel']=$_POST['hotel'];
$_SESSION['sdate']=$_POST['sdate'];
$_SESSION['edate']=$_POST['edate'];

$_SESSION['sendroomnumbers']=$_POST['rooms'];

$_SESSION['counter']=1;

$_SESSION['sendcategory']=$_POST['stars'];




  $ad= $_POST['adults'];
   $chi= $_POST['children'];
	
	if($ad==''){
	   	$_SESSION['adults']='0'; 
	}
	
	else{
	$_SESSION['adults']=$_POST['adults'];

	}
	
		if($chi==''){
	  	$_SESSION['children']='0'; 
	}
	else{
	    	$_SESSION['children']=$_POST['children'];
	}
	
	$_SESSION['roomnmb']=$_POST['rooms'];
		

	
	$_SESSION['adult1']=$_POST['adults1'];
	$_SESSION['children1']=$_POST['children1'];
	
	$_SESSION['adult2']=$_POST['adults2'];
	$_SESSION['children2']=$_POST['children2'];
	
	$_SESSION['adult3']=$_POST['adults3'];
	$_SESSION['children3']=$_POST['children3'];
	
	$_SESSION['adult4']=$_POST['adults4'];
	$_SESSION['children4']=$_POST['children4'];
	
	$_SESSION['adult5']=$_POST['adults5'];
	$_SESSION['children5']=$_POST['children5'];
	
	$_SESSION['adult6']=$_POST['adults6'];
	$_SESSION['children6']=$_POST['children6'];
	
	$_SESSION['adult7']=$_POST['adults7'];
	$_SESSION['children7']=$_POST['children7'];
	
	$_SESSION['adult8']=$_POST['adults8'];
	$_SESSION['children8']=$_POST['children8'];
	
	$_SESSION['adult9']=$_POST['adults9'];
	$_SESSION['children9']=$_POST['children9'];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo "<script>location.replace('hotelresultsd.php');</script>";
	
	
















}





















$sqll ="SELECT * FROM hotels";
		$resultt = $conn->query($sqll);


	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {

}
}

	
	  ?>
	  










<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="cssi/main.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>PCO Connect</title>
    </head>
    <body>
        
        <style>
.whatsappp {

  position: fixed;
  bottom: 10px;
   right: 0;
z-index:1;
  padding-right: 10px;
}
</style>
        
      <a href='https://wa.me/+971506509976'> <img src='whatsappicon.png' style='max-width:80px;' class='whatsappp'></a> 
        
        
        <div class="wrapper">
            <section class="header bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-light d-lg-flex">
                                <a class="navbar-brand mr-0 py-0" href="index.php">
                                    <img src="imgi/logo.png" alt="PCO CONNECT" width="200px">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                  <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-lg-center" id="navbarNav">
                                  <ul class="navbar-nav active">
                                    <li class="nav-item active">
                                      <a class="nav-link border-left-0" href="index.php">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#">Services</a>
                                    </li>
                                 
                                    <li class="nav-item">
                                      <a class="nav-link" href="#">Contact</a>
                                    </li>
                                    <li class="nav-item py-lg-0 py-3">
                                        <a class="cta-phone d-block d-lg-none" href="tel:+971507142748">
                                            <img src="imgi/header-right.png" alt="+971 507142748" width="150px">
                                        </a>
                                    </li>
                                  </ul>
                                </div>
                                <a class="cta-phone d-none d-lg-block" href="tel:+971507142748">
                                    <img src="imgi/header-right.png" alt="+971 507142748" width="150px">
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
              <section style='z-index:1;' class="search">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-12">
                           
          
                             
                                    <div style='text-align:center; margin-top:-60px;' class="row">
                                        <div style='background-color: rgba(0, 0, 0, 0.3);' class="col-lg-10 mx-auto p-4 rounded">
                                            <form action='#' method='POST'>
                                                <div class="row">
                                                    <div style="text-align:center; " class="col-md-4">
                                                        <div class="form-group">
                                                            
                                                           
                                                           <select class='form-control' name="country" id="country">
                            
								<option value="0">Select Country</option>
						
<option value="United States">United States</option>
<option value="Canada">Canada</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua">Antigua</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijani">Azerbaijani</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Netherlands">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia-Hercegovina">Bosnia-Hercegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British IOT">British IOT</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Rep">Central African Rep</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croatia">Croatia</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Faeroe Islands">Faeroe Islands</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern">French Southern</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard">Heard</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="MNP">MNP</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="NER">NER</option>
<option value="Netherlands">Netherlands</option>
<option value="Neutral Zone">Neutral Zone</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="North Korea">North Korea</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Pierre">Saint Pierre</option>
<option value="Saint Vincent">Saint Vincent</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Scotland">Scotland</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovak Republic">Slovak Republic</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somali Democratic">Somali Democratic</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia">South Georgia</option>
<option value="South Korea">South Korea</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
<option value="STP">STP</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard">Svalbard</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="TCA">TCA</option>
<option value="Thailand">Thailand</option>
<option value="Toga">Toga</option>
<option value="Togolese">Togolese</option>
<option value="Tokelau">Tokelau</option>
<option value="Tongo">Tongo</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="Upper Volta">Upper Volta</option>
<option value="Uruguay">Uruguay</option>
<option value="USSR(Former)">USSR(Former)</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City">Vatican City</option>
<option value="Venezuela">Venezuela</option>
<option value="VI, British">VI, British</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, USA">Virgin Islands, USA</option>
<option value="Western Sahara">Western Sahara</option>
<option value="WLF">WLF</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
   
                          </select>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                         
                                                        </div>
                                                    </div>
                                                    <div style="text-align:center; " class="col-md-4">
                                                        <div class="form-group">
                                                             
                                                            <select class='form-control' name="city" id="city">
                           
						    <option>Select City</option>
						   
						   
						   
                          </select>                     
                                                         
                                                          
                                                        </div>
                                                    </div>
                                                    <div style="text-align:center; " class="col-md-4">
                                                        <div class="form-group">
                                                            
                                                             
                                                         
                                                         
	        	      <select class='form-control' id="events" name="event">
                            <option>Select Event</option>
                        </select>
	        	        
                     
                                     
                                                        </div>
                                                    </div>
                                                    
                                                    
                                            </div>
                                            
                                            
                                    </div>
                   
                                </div>
                                
                                
                                
                                
                            </div></div></div>
                            </section>
                            
                            
                            
                            
                            
                            
                            
                            
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">                 
                            
                            
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                            
                            
                            
             
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!--slider end-->
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
              <section style='display:none; margin-top:-130px;' id='bg-banner' class="banner bg-banner">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 py-5 my-5">
                        <br/><br/>   <br/><br/>   <br/><br/>   <br/><br/>   <br/><br/>   <br/><br/>   <br/> 
                            <br/>
                        </div>
                    </div>
                </div>
            </section>                  
                            
                            
                            
                            
         <div style='margin-top:-130px;' id='slider' >
                
                 <div style='z-index:-1; ' id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol style='z-index:1; '  class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div style='max-height:700px;' class="carousel-inner">

    <div class="carousel-item active">
      <img class="d-block w-100" src="../africa event images/afr1.jpg" alt="Second slide">
      <div style='top:200px; left:100px;'  class="carousel-caption d-none d-md-block">
          <br/>
    <h1 align='left'>Live Perfomances</h1>
    <h3 align='left'>from International <br/>& Local Artists</h3>
  </div>
    </div>
   <div class="carousel-item">
      <img class="d-block w-100" src="../africa event images/afr3.jpg" alt="First slide">
      <div style='top:200px; left:100px;' class="carousel-caption d-none d-md-block">
  <h1 align='left'>See Africa in all her beautiful <br/>and unique expressions</h1>
    <h3 align='left'>27th-29th Oct 2022<br/>Dubai, UAE, Burj Park By Emar</h3>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
              
            </div>
            
            
            
            
            <section style='margin-top:-30px;' class="search">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-12">
                           
                            
                            
                               <div class="scroll-mobile">
                                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                   
                                   
                                     <li class="nav-item">
                                         <a class="nav-link" id="pills-visas-tab" data-toggle="pill" href="#pills-visas" role="tab" aria-controls="pills-visas" aria-selected="false">EVENT REGISTRATION</a>
                                    </li>
                                   
                                   
                                    <li class="nav-item">
                                      <a class="nav-link active" id="pills-hotels-tab" data-toggle="pill" href="#pills-hotels" role="tab" aria-controls="pills-hotels" aria-selected="true">HOTELS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-transfers-tab" href="flights.php">TRANSFERS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-visas-tab" data-toggle="pill" href="#pills-visas" role="tab" aria-controls="pills-visas" aria-selected="false">VISAS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-tours-tab" data-toggle="pill" href="#pills-tours" role="tab" aria-controls="pills-tours" aria-selected="false">TOURS</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="pills-flights-tab" data-toggle="pill" href="#pills-flights" role="tab" aria-controls="pills-flights" aria-selected="false">RESTAURANTS</a>
                                    </li>
                                </ul>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="tab-content" id="pills-tabContent">
                              
                                <div class="tab-pane fade show active" id="pills-hotels" role="tabpanel" aria-labelledby="pills-hotels-tab">
                                    
                                   <div style='margin-left:-100px; position:absolute;'>
                            <img style="height:269px;" id='img1' src='../sponsors/s1.jpeg'>        
                       
                        
                                          </div>
                                          
                                          
                                    <div class="row">
                                        <div class="col-lg-10 bg-light mx-auto p-4 rounded">
                                            <form action='#' method='POST'>
                                                <div class="row">
                                                    
                                                <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label for="hotel"><b>Star Rating</b></label>
                                                              <select class='form-control' name='stars' id='stars'>
					  <option value='all'>All</option>
					  <option>5</option>
					  <option>4</option>
					  <option>3</option>
					  <option>2</option>
					  <option>1</option>
					  
					  
					  </select>
                                                        </div> </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                 <div class="col-md-4">
                                                        <div class="form-group">
                                                          <label for="hotel"><b>Hotel Name</b></label>
                                                              <select class='form-control' name='hotel' id='hotels'>
					  
					  
					  
					  
					  </select>
                                                        </div>
                                                    </div>                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label for="hotel"><b>Rooms</b></label>
                                                              <select class='form-control' name='rooms' id='rooms'>
					  
					  <option>1</option>
					  <option>2</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					  <option>6</option>
					  <option>7</option>
					  <option>8</option>
					  <option>9</option>
					  <option>10</option>
					  
					  </select>
                                                        </div>
                                                    </div>           
                                                    
                                                    
                                                    
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label for="checkin"><b>Check in</b></label>
                                                         	 <input class='form-control' name='sdate' type="date" id='sdate'>
				
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label for="checkout"><b>Check out</b></label>
                                                         <input class='form-control' name='edate' type="date" id='edate'>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                        
				
                                       
                                       
                                       
                                       
                                       
						
                         <div class="col-md-6">  <div class="form-group">
                       
					   <label for="fname"><b>Room 1:</b></label>
						
                         <input type='number' class='aad form-control' max='8' min='0' placeholder="Adults"  name="adults" id="adults">
                           
						   
                        </div></div>
						
						
						
						
						
                         <div class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room 1</label>
						 
                         <input type='number' class='aac form-control' max='4' min='0'  placeholder="Children"  name="children" id="children">
                           
						   
                        </div></div>
						
						
						
						
						
						
						
						
						   <div style="display:none;"  id='la1' class="col-md-6">  <div class="form-group">
                       
					   <label  for="fname">Room 2:</label>
						
                         <input type='number' class='aad form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults1" id="adults1">
                          
                        </div></div>
						
						
						
						
						
                         <div  style="display:none;"  id='lc1' class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room  2</label>
						
                         <input type='number' class='aac form-control' min='0' max='4'  style="display:none;"  placeholder="Children"  name="children1" id="children1">
                           
						    
						   
						   
                        </div></div>
						
						
						
						
						
						
						
						   <div style="display:none;"  id='la2'  class="col-md-6">  <div class="form-group">
                       
					   <label for="fname">Room  3:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults2" id="adults2">
                           
						   
						    
                        </div></div>
						
						
						
						
						
                         <div style="display:none;" id='lc2' class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room  3</label>
						
                         <input type='number' class='form-control' min='0' max='4'  style="display:none;"  placeholder="Children"  name="children2" id="children2">
                           
						   
						   
						
                        </div></div>
						
						
						
						
						
						
					   <div  style="display:none;" id='la3'  class="col-md-6">  <div class="form-group">
                       
					   <label for="fname">Room  4:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults3" id="adults3">
                           
						   
						   
                        </div></div>
						
						
						
						
						
                         <div   style="display:none;"  id='lc3' class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room  4</label>
						
                         <input type='number' class='form-control' min='0' max='4'  style="display:none;"  placeholder="Children"  name="children3" id="children3">
                           
						   
						   
						   
                        </div></div>	
						
						
						   <div style="display:none;"  id='la4'  class="col-md-6">  <div class="form-group">
                       
					   <label  for="fname">Room  5:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults4" id="adults4">
                           
						    
                        </div></div>
						
						
						
						
						
                         <div  style="display:none;"  id='lc4' class="col-md-6">  <div class="form-group">
                        <label  style='color:#EEEEEE;' for="lname">Room  5</label>
						
                         <input type='number' class='form-control' min='0'  max='4' style="display:none;"  placeholder="Children"  name="children4" id="children4">
                           
						   
						   
						   
						
                        </div></div>
						
						
						
						
						
						
						
						
						
						
						
						
						   <div style="display:none;"  id='la5' class="col-md-6">  <div class="form-group">
                       
					   <label  for="fname">Room  6:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults5" id="adults5">
                            
                        </div></div>
						
						
						
						
						
                         <div style="display:none;"  class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' id='lc5' for="lname">Room  6</label>
						
                         <input type='number' class='form-control' min='0'  max='4' style="display:none;"  placeholder="Children"  name="children5" id="children5">
                            
						   
                        </div></div>
						
						
						
						   <div  style="display:none;" class="col-md-6">  <div class="form-group">
                       
					   <label id='la6' for="fname">Room  7:</label>
						
                         <input type='number' class='form-control' max='8' min='0'   style="display:none;"  placeholder="Adults"  name="adults6" id="adults6">
                           
						   
                        </div></div>
						
						
						
						
						
                         <div   style="display:none;" class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' id='lc6' for="lname">Room  7</label>
						
                         <input type='number' class='form-control' min='0' max='4' style="display:none;"  placeholder="Children"  name="children6" id="children6">
                           
						   
						   
						   
						
                        </div></div>
						
						
						
						   <div  style="display:none;"   class="col-md-6">  <div class="form-group">
                       
					   <label id='la7' for="fname">Room  8:</label>
						
                         <input type='number' class='form-control' max='8' min='0'   style="display:none;"  placeholder="Adults"  name="adults7" id="adults7">
                           
						    
                        </div></div>
						
						
						
						
						
                         <div  style="display:none;"  class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' id='lc7' for="lname">Room  8</label>
						
                         <input type='number' class='form-control' min='0' max='4' style="display:none;"  placeholder="Children"  name="children7" id="children7">
                           
						   
						   
						   
						    
                        </div></div>
						
						
						   <div style="display:none;"  class="col-md-6">  <div class="form-group">
                       
					   <label  id='la8' for="fname">Room  9:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;"  placeholder="Adults"  name="adults8" id="adults8">
                           
						   
                        </div></div>
						
						
						
						
						
                         <div  style="display:none;" id='lc8' class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room  9</label>
						
                         <input type='number' class='form-control' min='0'  max='4' style="display:none;" placeholder="Children"  name="children8" id="children8">
                           
						  
						   
						
                        </div></div>
						
						
						
						   <div style="display:none;" id='la9' class="col-md-6">  <div class="form-group">
                       
					   <label  for="fname">Room  10:</label>
						
                         <input type='number' class='form-control' max='8' min='0'  style="display:none;" placeholder="Adults"  name="adults9" id="adults9">
                           
						   
						   
                        </div></div>
						
						
						
						
						
                         <div   style="display:none;" id='lc9' class="col-md-6">  <div class="form-group">
                        <label style='color:#EEEEEE;' for="lname">Room  10</label>
						
                         <input type='number' class='form-control' min='0' max='4' style="display:none;" placeholder="Children"  name="children9" id="children9">
                           
						   
						    
						
                        </div></div>
						
                                                    <div class="col-md-4 ml-auto text-right mt-2">
                                                   
                                                        <button style='display:none;' type="submit" id='submitbutton' name='submit' class="btn btn-primary">Search</button>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                          
                                                </div>
                                                
                                                
                                              </form>
                                              
                                                    <button style='color:white; background-color:#bf1e2e; float:right;' onclick='checkavail()' class="btn">Search</button>
                                                    
                                                    
                                            </div>
                                         
                                             <div style='margin-top:-70px; right:-90px; position:absolute;'><br/><br/><br/>
                             <img style="height:269px;" id='img1' src='../sponsors/s2.jpeg'>        
                    
                        
                                          </div>
                                            
                                            
                                    </div>
                                    
                                    
                                </div>
                                <div class="tab-pane fade" id="pills-transfers" role="tabpanel" aria-labelledby="pills-transfers-tab">...</div>
                                <div class="tab-pane fade" id="pills-visas" role="tabpanel" aria-labelledby="pills-visas-tab">...</div>
                                <div class="tab-pane fade" id="pills-tours" role="tabpanel" aria-labelledby="pills-tours-tab">...</div>
                                <div class="tab-pane fade" id="pills-flights" role="tabpanel" aria-labelledby="pills-flights-tab">...</div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                
                
                
            </section>
            
            
            <section>
                
                <div style='padding-left:20%; padding-right:20%;'>
                   <div align='center' id='ei'>
                   <h3 align='center' style='color:#bf1e2e;'>ABOUT US</h3><br/><p align='center'>Africa has many sides to her story and we want to share these with you. Come and experience a 3 day event starting from 1300 - 2200hrs daily ( 27-29 October'2022 ) at the Burj Park.<br/><br/>An Event not to be missed, showcasing the best of Africa - Live performances from local and international artists, Dance expressions, fashion shows, unique attractions, kiddies are, food and beverage stands. There is something for everyone.<br/><br/><b>Come see Africa in all her splendor.</p></b>
                   
                    </div>
                </div>
                
                
            </section>
            
            
            
            
            
            
            
                                     
                            
                            
              <section id='ban22' class="">
                  <img src="../africa event images/bann22.png">
               
            </section>                  
                          
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <section class="grid bg-light">
                <div class="container py-5">
                    <div class="row">
                        <div style='height:420px !important;' class="card-grid col-lg-3 col-md-6 col-12">
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
    <style>
    
      .mySlides {
        display: none
      }
      
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }
      /* Next & previous buttons */
      .prev,
      .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }
      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover,
      .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
      }
      /* Caption text */
      .text {
        color: #ffffff;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }
      /* Number text (1/3 etc) */
      .numbertext {
        color: #ffffff;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }
      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #999999;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }
      .active,
      .dot:hover {
       
      }
      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 10s;
        animation-name: fade;
        animation-duration: 10s;
      }
      @-webkit-keyframes fade {
        from {
          opacity: 1
        }
        to {
          opacity: 1
        }
      }
      @keyframes fade {
        from {
          opacity: 1
        }
        to {
          opacity: 1
        }
      }
      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev,
        .next,
        .text {
          font-size: 11px
        }
      }
    </style>
  
    <div class="slideshow-container">
    
    <?php
    

$sqllx ="SELECT * FROM newevents";
		$resulttx = $conn->query($sqllx);


	
if ($resulttx->num_rows > 0) {
  // output data of each row
  while($rowwx = $resulttx->fetch_assoc()) {

?>
    
      <div class="mySlides fade">
           <h2>Upcoming Events</h2>
            <img style='max-height:170px !important; min-height:170px !important; max-width:255px !important; min-width:255px !important;' class="img-fluid mb-3" src="../eventhighlights/<?php echo $rowwx['name'];?>/<?php echo $rowwx['highimg'];?>" alt="Upcoming Event">
            <h5><?php echo $rowwx['title'];?></h5>
            <p><?php echo $rowwx['descr'];?></p>
      </div>
       
       
     <?php
  }
}
     ?> 
      
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
   
    <script>
      var slideIndex = 0;
      showSlides();
      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for(i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if(slideIndex > slides.length) {
          slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
      }
    </script>
 
                            
             
                        </div>
                        <div class="card-grid col-lg-3 col-md-6 col-12">
                            <h2>ADA Compliant</h2>
                            <img class="img-fluid mb-3" src="e2.jpg" alt="Upcoming Event">
                            <p>
                                - No booking fees <br>
                                - Flexible cancellation policies <br>
                                - 24 hour customer service <br>
                                - Like booking hotel direct <br>
                                - Privacy <br>
                                - Security
                            </p>
                        </div>
                        <div class="card-grid col-lg-3 col-md-6 col-12">
                            <h2 id='galadinner'>Event Highlight</h2>
                            <img style='max-height:170px !important; min-height:170px !important; max-width:255px !important; min-width:255px !important;' id='imghighlight' class="img-fluid mb-3" src="e3.jpg" alt="Upcoming Event">
                            <p id='galadinnerdescription'></p>
                        </div>
                        <div class="card-grid col-lg-3 col-md-6 col-12">
                            <h2>Previous Events</h2>
                            <img class="img-fluid mb-3" src="e4.jpg" alt="Upcoming Event">
                            <h5>World Conference on International Telecommunications (WCIT)</h5>
                            <p>December 3, 2012 to December 13, 2012 <br>Dhabi, UAE</p>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="widgets">
                <div class="container">
                    <div class="row py-3">
                        <div class="col-lg-5 col-md-4">
                            <h2>About Us</h2>
                            <p>In 2009, founder & CEO Dilan Fernando saw the need for a simpler more streamlined, secure and optimal way for Congress organizers to book and manage events. His vision was a simple but powerful one to create a tool for professionals to access, manage, and share event information from anywhere in real time. Not a novel concept today, but it was for the early 2000’s. In those days, no one was using 100% web-based software or “cloud based” as we know it today.<br/>PCO Connect not only survived the “dot com” burst of the early 2000s but steadily grew, 
Today, PCO Connect has serves over 100,000 customers and companies.
</p>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <h2>Testimonials</h2>
                            <p>The professional services and results that they provided to our Organization both pre-event and during the events was fantastic. All challenges were met with with viable solutions through a very well thought-out client service approach. 
I would recommend the Services to any Organizing Committee that is considering to run a domestic or international event in Dubai or elsewhere in that Gulf Region. 
Thanks again for your valued support that helped make our events a success.</p>
                            <p><b>Drew Donovan - Head, Safety and Security Division at International Telecommuication Union</b></p>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <h2>Connect with us</h2>
                           
                            <div class="social">
                                <a href="https://www.facebook.com/Pcoconnect/" class=""><img style='max-width:30px;' class="" src="imgi/fb.png" alt="facebook"></a>
                                
                                <a href="https://www.linkedin.com/Pcoconnect/" class=""><img  style='max-width:30px;'class="" src="imgi/ln.png" alt="linkedin"></a>
                                
                                
                                <a href="https://www.twitter.com/Pcoconnect/" class=""><img  style='max-width:30px;'class="" src="imgi/tw.png" alt="twitter"></a>
                                
                                  <a href="https://www.instagram.com/Pcoconnect/" class=""><img  style='max-width:30px;'class="" src="imgi/in.png" alt="instagram"></a>
                               
                            </div>
                            <br/>  
                            <p>
                                  Travel Synergies Tourism LLC<br/>Al Nassima Towers<br/>Sheikh Zayed Road</br>Dubai, UAE
                          
                            </p>  <br/> 
                            <img class="mt-2" src="imgi/logo.png" alt="logo" width="150px">
                        </div>
                    </div>
                </div>
            </footer>
            <section class="cta-links">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-12">
                            <a class="link-item" href="#">About Us</a>
                            <a class="link-item" href="#">Add your property</a>
                            <a class="link-item" href="#">Customer Service</a>
                            <a class="link-item" href="#">FAQ</a>
                            <a class="link-item" href="#">Careers</a>
                            <a class="link-item" href="#">Terms & Conditions</a>
                            <a class="link-item" href="#">Privacy & Cookies</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="copyrights">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb-0">
                                2003 www.pcoconnect.com <br>
                                Designed & Developed by <b><a href='https://www.squalltec.com'><b style="color:red !important;"><img style='max-width:100px;' src='squlogo.png'></b></a></b>
                            </p>
                        </div>
                        <div class="col-md-4 ml-auto text-right">
                            <p class="mb-0 d-inline-block">A sub division of &nbsp; </p>
                         <p  class='mb-0 d-inline-block'><a  href='https://www.travelsynergies.com' > <b style="color:red !important;"><img style="max-width:120px;" src='tslogo.png'></b></a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        
        
        
        
        
        
        
        
        
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


$("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});


function checkavail(){
    
    var maxa0=$("#adults").val();
    var maxc0=$("#children").val();
    
     var maxa1=$("#adults1").val();
    var maxc1=$("#children1").val();
    
     var maxa2=$("#adults2").val();
    var maxc2=$("#children2").val();
    
     var maxa3=$("#adults3").val();
    var maxc3=$("#children3").val();
    
     var maxa4=$("#adults4").val();
    var maxc4=$("#children4").val();
    
     var maxa5=$("#adults5").val();
    var maxc5=$("#children5").val();
    
     var maxa6=$("#adults6").val();
    var maxc6=$("#children6").val();
    
     var maxa7=$("#adults7").val();
    var maxc7=$("#children7").val();
    
     var maxa8=$("#adults8").val();
    var maxc8=$("#children8").val();
    
     var maxa9=$("#adults9").val();
    var maxc9=$("#children9").val();
    
    
    
     if (maxa0=='') {maxa0 = 0;}
     if (maxc0=='') {maxc0 = 0;}
     
     if (maxa1=='') {maxa1 = 0;}
     if (maxc1=='') {maxc1 = 0;}
     
      if (maxa2=='') {maxa2 = 0;}
     if (maxc2=='') {maxc2 = 0;}
     
      if (maxa3=='') {maxa3 = 0;}
     if (maxc3=='') {maxc3 = 0;}
     
      if (maxa4=='') {maxa4 = 0;}
     if (maxc4=='') {maxc4 = 0;}
     
      if (maxa5=='') {maxa5 = 0;}
     if (maxc5=='') {maxc5 = 0;}
     
      if (maxa6=='') {maxa6 = 0;}
     if (maxc6=='') {maxc6 = 0;}
     
      if (maxa7=='') {maxa7 = 0;}
     if (maxc7=='') {maxc7 = 0;}
     
      if (maxa8=='') {maxa8 = 0;}
     if (maxc8=='') {maxc8 = 0;}
    
    
     if (maxa9=='') {maxa9 = 0;}
     if (maxc9==''){ maxc9 = 0;}
    
    
    
   var max0=parseInt(maxa0)+parseInt(maxc0); 
   var max1=parseInt(maxa1)+parseInt(maxc1); 
   var max2=parseInt(maxa2)+parseInt(maxc2); 
   var max3=parseInt(maxa3)+parseInt(maxc3); 
   var max4=parseInt(maxa4)+parseInt(maxc4); 
   var max5=parseInt(maxa5)+parseInt(maxc5); 
   var max6=parseInt(maxa6)+parseInt(maxc6); 
   var max7=parseInt(maxa7)+parseInt(maxc7); 
   var max8=parseInt(maxa8)+parseInt(maxc8); 
   var max9=parseInt(maxa9)+parseInt(maxc9); 
    
    var hotel=$("#hotels").val();
    var country=$("#country").val();
    var location=$("#city").val();
    
 
    $.ajax({
              
			  type:'POST',
			  
              url:'getavailability.php',
               data:{'hotel':hotel,'country':country,'location':location,'max0':max0,'max1':max1,'max2':max2,'max3':max3,'max4':max4,'max5':max5,'max6':max6,'max7':max7,'max8':max8,'max9':max9},
             
              success:function(result){
                  
				
			    if(result.includes('exists')){
			    $("#submitbutton").click();
			    }
               
               else{
                    $("#submitbutton").click();




               }
                 
              }
			  
          }); 
		  
    
    
    
}



 var checkhotel='';
 var checksdate='';
 var checkedate='';
 var checkcity='';
 var checkcountry='';
setInterval(function () {
    
    
    
    
    
    
    
    
    
    
 
  
  
   	var sdate=$("#sdate").val();
	var edate=$("#edate").val();
	var hotel=$("#hotels").val();
	var city=$("#city").val();
	var country=$("#country").val();
  
  if(checkhotel!=hotel || checksdate!=sdate || checkedate!=edate || checkcity!=city || checkcountry!=country)

  {
	

	  $.ajax({
              
			  type:'POST',
			  
              url:'getroomnumbers.php',
               data:{'sdate':sdate,'edate':edate,'hotel':hotel,'city':city,'country':country},
             
              success:function(result){
                  
				
				$("#rooms").html(result);
				  
			
				checkhotel=hotel;  
				checksdate=sdate;  
				checkedate=edate;  
				checkcity=city;  
				checkcountry=country;  
               
                 
              }
			  
          }); 
		  
		  
		  
  }
	
    
}, 1000);







// AJAX call for autocomplete 
$(document).ready(function(){
    
    
    
    
    
    
$("#rooms").on('change', function() {

	var compzy1=$("#rooms").val();
	


	
for(i=1; i<10; i++){
    
	document.getElementById("adults"+i).value="";
	document.getElementById("la"+i).style.display = "none";
	document.getElementById("adults"+i).style.display = "none";
	document.getElementById("lc"+i).style.display = "none";
	document.getElementById("children"+i).style.display = "none";
	document.getElementById("children"+i).value="";
	
	
	
}
		
	
	
	
	for(i=1; i<compzy1; i++){
	    
	  
		
	document.getElementById("la"+i).style.display = "block";
		
	document.getElementById("adults"+i).style.display = "block";
	
	document.getElementById("lc"+i).style.display = "block";
	
	document.getElementById("children"+i).style.display = "block";
	
	
		  
	}
});	
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

$("#country").on('change', function() {
    
     const $selectstars = document.querySelector('#stars');
  $selectstars.value = 'all'
	
	var compy1=$("#country").val();
	
	$("#hotels").html("");
	$("#events").html("");
	$("#star").html("");
	
	  $.ajax({
              
			  type:'POST',
              url:'getlocation.php',
              data:{'compy1':compy1},
			  
              success:function(result){
                  
				
				$("#city").html(result);
				  
                
                 
              }
			  
          }); 
		  
		  
		
	
})







	


	
$("#city").on('change', function() {
	
	var compy1=$("#city").val();
	var compy2=$("#country").val();
	
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getevents.php',
              data:{'compy1':compy1, 'compy2':compy2},
			  
              success:function(result){
				  
				
				$("#events").html(result);
				
				 
                
                 
              }
			  
          }); 
		  
		  
		
	
})







$("#city").on('change', function() {
    
    
  const $selectstars = document.querySelector('#stars');
  $selectstars.value = 'all'
	
	var compy1=$("#events").val();
	
	
	
	var compy11='';
	var compy22='';
	var compy33='';
	var compy44='';
	
	
	
	
	var sdate='';
	var edate='';
	
	  $.ajax({
              
			  type:'POST',
              url:'getdates.php',
              data:{'compy1':compy1},
			  
              success:function(result){
				  
				  
				  
				  
				  if(result.length>0)
				  {
					  
				result = jQuery.parseJSON(result);
				
				
				for(i=0; i<result.length; i++){

					sdate=result[i].sdate;
					edate=result[i].edate;
					
					

				}
				
				
			
				
				
				
				
				$("#sdate").val(sdate);
				$("#edate").val(edate);
				
				
				compy11=$("#sdate").val();
	compy22=$("#edate").val();
	compy33=$("#country").val();
	compy44=$("#city").val();
				
				
				
				  }		

			  
			  
			    


	 $.ajax({
              
			  
	
	
			  type:'POST',
              url:'gethotels.php',
              data:{'compy1':compy11, 'compy2':compy22, 'compy3':compy33, 'compy4':compy44},
			  
              success:function(result){
				  
				
			
				$("#hotels").html(result);
				
				 
                
                 
              }
			  
          }); 	
			  
			  
			  
			 
				  
				   
              }
			  
			  
			  
			  
			  

			  
          }); 
		  
		 
})











$("#events").on('change', function() {
	
	 const $selectstars = document.querySelector('#stars');
  $selectstars.value = 'all'
	
	
	var compy1=$("#events").val();
	
	var category='';
	
	var compy11='';
	var compy22='';
	var compy33='';
	var compy44='';
	
	
	
	
	var sdate='';
	var edate='';
	
	
	if(compy1.includes('Africa'))
	
	{ 
	    var ec=document.getElementById("bg-banner");
ec.style.display='none';

  var bc=document.getElementById("ban22");
bc.style.display='block';


  var et=document.getElementById("slider");
et.style.display='block';




	    var ban2=document.getElementById("bg-banner");
			    
			
				ban2.style.backgroundImage="url('../africa event images/afr1.jpg')";
				ban2.style.backgroundImage="url('../africa event images/afr2.jpg')";
				ban2.style.backgroundImage="url('../africa event images/afr3.jpg')";
				ban2.style.backgroundImage="url('../africa event images/afr4.jpg')";
				
				
					var ei=document.getElementById("ei");
			    	ei.innerHTML="<h3 align='center' style='color:#bf1e2e;'>ABOUT US</h3><br/>Africa has many sides to her story and we want to share these with you. Come and experience a 3 day event starting from 1300 - 2200hrs daily ( 27-29 October'2022 ) at the Burj Park.<br/><br/>An Event not to be missed, showcasing the best of Africa - Live performances from local and international artists, Dance expressions, fashion shows, unique attractions, kiddies are, food and beverage stands. There is something for everyone.<br/><br/><b>Come see Africa in all her splendor.</b>";
			
	    
	}
	
	else{
	    
var ec=document.getElementById("bg-banner");
ec.style.display='block';

  var et=document.getElementById("slider");
et.style.display='none';

  var bc=document.getElementById("ban22");
bc.style.display='none';


	 $.ajax({
              
			  
	
	
			  type:'POST',
              url:'getbanner.php',
              dataType:'json', /*most important**/ 
              data:{'compy1':compy1},
			  
              success:function(result){
				 var eet=document.getElementById("galadinner"); 
				 var eed=document.getElementById("galadinnerdescription"); 
				 var eei=document.getElementById("imghighlight"); 
		
		eei.src = result.highimg;
		eet.innerHTML=result.title;
			eed.innerHTML=result.descriptionn;
				
			var ee=document.getElementById("bg-banner");
				var ei=document.getElementById("ei");
			    
			
				ee.style.backgroundImage=result.banner;
				ei.innerHTML="<h3 align='center' style=''>About Us</h3><br/>"+result.descriptionn;
				
			
                
                 
              }
			  
          }); 
	
	
	}
	
	
	
	
	
	
	
	  $.ajax({
              
			  type:'POST',
              url:'getdates.php',
              data:{'compy1':compy1},
			  
              success:function(result){
				  
				  
				  
				  
				  if(result.length>0)
				  {
					  
				result = jQuery.parseJSON(result);
				
				
				for(i=0; i<result.length; i++){

					sdate=result[i].sdate;
					edate=result[i].edate;
					
					

				}
				
				
			
				
				
				
				
				$("#sdate").val(sdate);
				$("#edate").val(edate);
				
				$("#hotels").val('');
			
					
				compy11=$("#sdate").val();
	compy22=$("#edate").val();
	compy33=$("#country").val();
	compy44=$("#city").val();
				
				
				
				  }		

			  
			  
			    


	 $.ajax({
              
			  
	
	
			  type:'POST',
              url:'gethotels.php',
              data:{'compy1':compy11, 'compy2':compy22, 'compy3':compy33, 'compy4':compy44},
			  
              success:function(result){
				  
				
			
				$("#hotels").html(result);
				
				 
                
                 
              }
			  
          }); 	
			  
			  
			  
			 
				  
				   
              }
			  
			  
			  
			  
			  

			  
          }); 
		  
		 
})



















$("#stars").on('change', function() {
	
	var compy1=$("#events").val();
	
	var category='';
	
	var compy11='';
	var compy22='';
	var compy33='';
	var compy44='';
	
	var sdate='';
	var edate='';
	
	
		$("#hotels").val('');
		compy11=$("#sdate").val();
	    compy22=$("#edate").val();
    	compy33=$("#country").val();
    	compy44=$("#city").val();
    	category=$("#stars").val();
		
	 $.ajax({
              
			  type:'POST',
              url:'gethotels2.php',
              data:{'compy1':compy11, 'compy2':compy22, 'compy3':compy33, 'compy4':compy44, 'category':category},
			  
              success:function(result){
				  
				$("#hotels").html(result);
				
				 
				 
                
                 
              }
			  
          }); 	
			  
			 
		 
})




















	
$("#sdate").on('change', function() {
    
     const $selectstars = document.querySelector('#stars');
  $selectstars.value = 'all'
	
	var compy1=$("#sdate").val();
	var compy2=$("#edate").val();
	var compy3=$("#country").val();
	var compy4=$("#city").val();
	
	
	
	
	  $.ajax({
              
			  type:'POST',
              url:'gethotels.php',
              data:{'compy1':compy1, 'compy2':compy2, 'compy3':compy3, 'compy4':compy4},
			  
              success:function(result){
				  
				
			
			
				$("#hotels").html(result);
				
				 
                
                 
              }
			  
          }); 
		  
		  
		
	
})







	
$("#edate").on('change', function() {
    
     const $selectstars = document.querySelector('#stars');
  $selectstars.value = 'all'
	
	var compy1=$("#sdate").val();
	var compy2=$("#edate").val();
	var compy3=$("#country").val();
	var compy4=$("#city").val();
	
	

	  $.ajax({
              
			  type:'POST',
              url:'gethotels.php',
              data:{'compy1':compy1, 'compy2':compy2, 'compy3':compy3, 'compy4':compy4},
			  
              success:function(result){
				  
				
			
				$("#hotels").html(result);
				
				 
                
                 
              }
			  
          }); 
		  
		  
		
	
})










});

</script>


  
        
        
        
        
    </body>
</html>