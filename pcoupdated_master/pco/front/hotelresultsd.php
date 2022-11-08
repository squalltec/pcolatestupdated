<?php
session_start();
include 'db_connection.php';

$hn=$_SESSION['hotel'];
$cn=$_SESSION['country'];
$ln=$_SESSION['city'];

$eve=$_SESSION['event'];


$sqll ="SELECT * FROM hotels WHERE name='$hn' && country='$cn' && location='$ln'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      $des=$roww['description'];
       $img=$roww['image'];
       $caty=$roww['category'];
	  
	
  }
}





if (isset($_POST['submit'])) {
	
	$name=$_POST['naz'];
	$_SESSION['hotel']=$name;
	echo "<script>location.replace('roomresults3.php');</script>";
	
}








?>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="cssi/main.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>PCO Connect</title>
        
        <?php include_once("includes/headiframe.php"); ?>
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
                                    <li class="nav-item ">
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
                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">                 
                            
                            
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                            
                   

<div id='slider' >
                
                 <div style='' id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol style=''  class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
   
  </ol>
  <div style='max-height:400px;' class="carousel-inner">

    <div class="carousel-item active">
      <img class="d-block w-100" src="ho1.jpg" alt="Second slide">

    </div>
   <div class="carousel-item">
      <img class="d-block w-100" src="ho2.jpg" alt="First slide">
   
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
            
            
            
            <section>
                
                <style>
                    .column1 {
  float: left;
  width: 20%;
    background-color: rgba(0, 0, 0, .2);
 
}

  .column2 {
  float: left;
  width: 80%;

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
                </style>
                
                <div style='padding:30px;' class='row'>
                    
                    
                    
                <div style='border-radius:10px;  align-text:center;' class='column1'>
                   <div style='background-color:rgba(174,31,37,1);'class='title'><h3 align='center' style='color:white; padding:10px;'>Modify Search</h3></div>
                   
                   <div style='padding-left:3px; padding-right:3px;'>
                   
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
<option selected value="United Arab Emirates">United Arab Emirates</option>
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
                   
                     <div class="form-group">
                                                            
                                                           
                                                           <select class='form-control' name="city" id="city">
                            
								<option value="0">Select City</option>
						
<option selected value="Dubai">Dubai</option>
<option value="Abu Dhabi">Abu Dhabi</option>
<option value="Sharjah">Sharjah</option>
<option value="Ajman">Ajman</option>
   
                          </select>
                          </div>
                   
                          
                     <div class="form-group">
                                                            
                                                           
                                                           <select class='form-control' name="hotel" id="hotel">
                            
								<option value="0">Select Hotel</option>
						
<option selected value="Mariott">Mariott</option>

   
                          </select>
                          </div>  
                   
                   
                   
                            <div class="form-group">
                                                            
                                                           
                                                           <select class='form-control' name="star" id="star">
                            
								<option value="0">Select Star Rating</option>
						
<option selected value="5">5 Star</option>
<option value="4">4 Star</option>
<option value="3">3 Star</option>
<option value="2">2 Star</option>
<option value="1">1 Star</option>

   
                          </select>
                          </div>  
                   
                   
                   
                  <div class="form-group">
                      
                     <label>Check In</label> <input name='checkin' class='form-control' type='date'>
                      
                      </div> 
                   
                   <div class="form-group">
                      
                     <label>Check Out</label> <input name='checkout' class='form-control' type='date'>
                      
                      </div> 
                   
                  <div class="form-group">
                      
                     <label>Rooms</label>                                        
                     <select class='form-control' name="rooms" id="rooms">
                            
								<option value="0">Select Rooms</option>
						
<option selected value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>


   
                          </select>
                      
                      </div>   
                      
                      
                      
                      
                     <label>Room 1</label>  
                     
                      <div class='row'>
                        <div class="col-md-6">
                             <label>Adults</label>  
                          <div class="form-group">
                     <select class='form-control' name="pax" id="pax">
                            
								<option value="0">Select Pax</option>
						
<option selected value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>



   
                          </select>
                      </div>
                      </div>
                       <div class="col-md-6">
                               <label>Children</label>  
                          <div class="form-group">
                     <select class='form-control' name="pax" id="pax">
                            
								<option value="0">Select Pax</option>
						
<option selected value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>



   
                          </select>
                      </div>
                      </div>
                      
                      </div>
                      
                      
                      
                   
                   </div>
                   
                         <div style=' margin-right:10px; margin-bottom:10px; float:right;'>
                                                   
                                                        <button style='color:white; background-color:rgba(174,31,37,1);' type="submit" id='submitbutton' name='submit' class="btn">Search</button>
                                                    </div>
                                                    <br/>
                </div>
                
        
        
        
        
        
        
        
        
        
        
        
        
         <div style='padding-left:10px; border-radius:10px;  align-text:center;' class='column2'>
                  
                  
                  
                  
                   <div style='background-color:rgba(174,31,37,1);'class='title'><h3 align='left' style='color:white; padding:10px;'>Search Results</h3></div>
        
        
        
        
        
        
        
        
        
        
        
        <div class="container_16">
    <div>
        <ul id="products" class="list clearfix">
            
      <li>
        <div style='height:500px;' class="results-container clearfix">
<div class="results-image"><img style='max-width:200px;'src="../Hotel Images/<?php echo $hn;?>/<?php echo $img;?>" alt="hotel-image"></div><!-- /end results-container-image -->
          <div class="results-inside">
            <h1 class="color-1"><?php echo $_SESSION['hotel'];?>
            
            
            <?php
            $lim=intval($caty);
            for ($x = 0; $x < $lim; $x++) {
            ?>
            <img src='img/star-ratings.png'>
            <?php
            }
            ?>
             </h1> 
             
             <p class="address"><?php echo $_SESSION['country'];?></p>
              <div id='distances'>
                  aosjdoadadoaiodiaosdoasdoiasioduasiodasdoasuoidoiasda
            </div>
             <h6>
                 
                 
                 
                 
            <?php
        
        
$sqllv ="SELECT * FROM facilities WHERE hotel='$hn' && country='$cn' && location='$ln'";
		$resulttv = $conn->query($sqllv);

if ($resulttv->num_rows > 0) {
  
  while($rowwv = $resulttv->fetch_assoc()) {
      
     ?><a href="facilitymoreinfo.php?nam=<?php echo $_SESSION['hotel'];?>&facility=<?php echo $rowwv['facilities'];?>" class="color-1 hover-normal fancybox fancybox.iframe"><input style='font-size:1.3vh; width:100px;' class='btn color-1 hover-normal' type='button' value='<?php echo $rowwv['facilities'];?>'></a>
     
   <?php   
  }
}
        ?>      
                 
                 
                 
                 
                 
                 
                 
             </h6>
            <hr />
            
            <p class="description"><?php echo $des;?></p>
            <input style='display:none;' id='hotelnameforajax' value='<?php echo $hn;?>'>
            <br/>
           
            
            
            
            <i><a href="hotelmoreinfo.php?nam=<?php echo $_SESSION['hotel'];?>" class="color-1 hover-normal fancybox fancybox.iframe">More info</a></i> </div><!-- /end results-container-inside -->
       
       
       
       
          <div style='height:220px; max-height:220px;' class="results-rate" align="center">
             <p style='margin-top:-10px;'> <?php echo $_SESSION['country'];?>,
              <?php echo $_SESSION['city'];?><br/><br/></p>
      <img style='width:20px; margin-top:-10px;' src='aeroplaneicon.png'> 10 KM
       <img style='width:20px; margin-top:-10px;' src='trainicon.png'> 1 KM<br/><br/>
        <img style='width:20px; margin-top:-10px;' src='worldtradecentericon.png'> 5 KM
        <form action='#' method='POST'>
        <input name="naz" style="display:none;" id="n0" value="<?php echo $_SESSION['hotel'];?>"> 
        
        <br/>
        <button style='margin-top:-10px;' type="submit" name="submit" class="btn color-1 hover-normal">Select</button>
        
        
       <!--  <h1 class="ac" data-name='<?php //echo $hn;?>'>   <a class="btn color-1 hover-normal fancybox fancybox.iframe" id="button" href="hotelmoreinfo.php">Select</a></h1>-->
         
         </form>
         
         
         </div><!-- /end results-container-inside-rate -->
            <iframe src="roomsiframe.php" style=" width:100%; height: 300px;"></iframe>
    
    
          </div>
          
      </li>
     
    
     
    </ul>
    
    
  
    
  
    
    
    
    
    
    </div>
</div> <!-- /end extra-featured-container -->

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                    
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
            
            
            
            
           
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
            <script>
             const elem = document.getElementById('distances');
             const hotel = document.getElementById('hotelnameforajax').value;
             
                
 $.ajax({
              type:'POST',
              url:'../loginExample.php',
              data:{'loc1':'Dubai Airport','loc2':'hotel'},
             
                    
             

			 success:function(result){
                
               var objJSON = JSON.parse(result);
                
                 
                elem.innerHTML=objJSON[0]+" "+objJSON[1] +" from Airport";
               
                      
                  }
                 
                 
          }); 


		
            </script>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <script type='text/javascript' src='js/jquery-ui-1.10.3.custom.js'></script> 
<script type="text/javascript" src="js/grid-list.js"></script> 
<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="js/plugins.js"></script> 
        
