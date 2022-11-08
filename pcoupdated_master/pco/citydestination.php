<?php
require_once('db_connection.php');


include('header.php');


if (isset($_POST['atsupdatebtn'])) {
    
    
    
$country=$_POST['ctry'];
$city=$_POST['ct'];
$area=$_POST['atsupdate'];


   $arr = array_filter($area, 'strlen');

$areastring=implode(",",$arr);
    
 
 $sql ="UPDATE destination SET attractions='$areastring' WHERE country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
    
   
}   


    
    
}


if (isset($_POST['airupdatebtn'])) {
    
    
    
    
$country=$_POST['ctry'];
$area=$_POST['airupdate'];



 $arr = array_filter($area, 'strlen');

$areastring=implode(",",$arr);
    
 
 $sql ="UPDATE countrydata SET airports='$areastring' WHERE country='$country'";

 $result = $conn->query($sql);


if ($result === TRUE) {
    
   
}   


    
    
    
    
    
    
}


if (isset($_POST['areaupdatebtn'])) {
    
    
    
$country=$_POST['ctry'];
$city=$_POST['ct'];
$area=$_POST['areaupdate'];


   $arr = array_filter($area, 'strlen');

$areastring=implode(",",$arr);
    
 
 $sql ="UPDATE destination SET areas='$areastring' WHERE country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
    
   
}   


    
}



if (isset($_POST['submit2'])) {
	
$country=$_POST['country'];
$city=$_POST['city'];

$area=$_POST['area'];


   $arr = array_filter($area, 'strlen');

$areastring=implode(",",$arr);


$sqll ="SELECT * FROM destination WHERE country='$country' && city='$city'";
		$resultt = $conn->query($sqll);


if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      $dd=$roww['attractions'];
      
  }
}


$combined=$dd.','.$areastring;
			
$sql ="UPDATE destination SET attractions='$combined' WHERE country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
    
   
}
    





}





if (isset($_POST['submit'])) {
	
$country=$_POST['country'];
$city=$_POST['city'];

$area=$_POST['area'];


   $arr = array_filter($area, 'strlen');

$areastring=implode(",",$arr);


$sqll ="SELECT * FROM destination WHERE country='$country' && city='$city'";
		$resultt = $conn->query($sqll);


if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      
      $dd=$roww['areas'];
      
  }
}


$combined=$dd.','.$areastring;
			
$sql ="UPDATE destination SET areas='$combined' WHERE country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
    
   
}
    





}








?>
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">

<style>
    .delbtn{
        font-size:10px; 
        right:30px; 
        position:absolute;
    }
</style>

<br/><br/>
  <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Destinations</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     
                     
                     
                     
<?php
$n=0;
$nn=1000;
$nn2=4000;
$nn3=6000;
$nn4=8000;
 $nnn=50000;
 
 $clr=0;
 
 
$sqlla ="SELECT * FROM destination GROUP BY country";
		$resultta = $conn->query($sqlla);
		

if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
     
	  
	  
	  ?>
                     
                     
                     
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $n;?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo $rowwa['country'];?>
                          </button>
                        </h2>
                        
                        <div id="collapseOne<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample<?php echo $n;?>">
                          <div class="accordion-body">
                              
                              
                              
                              
                              <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $nnn;?>" aria-expanded="true" aria-controls="collapseOne">
                              Airports
                          </button>
                        </h2>
                              
                              
                               <div id="collapseOne<?php echo $nnn;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample<?php echo $nnn;?>">
                          <div class="accordion-body">
                              
                              
                              
                              
                              
                              
                               <form action='#' method='POST'>
                                  
                                  
                                <input style='display:none;' name='ctry' value='<?php echo $rowwa['country'];?>'>
                              
                                  
                                  
                            <ul>
                              
                               <?php
                              $cntr=$rowwa['country'];
                             

$sqllanz ="SELECT * FROM countrydata WHERE country='$cntr'";
		$resulttanz = $conn->query($sqllanz);
		

if ($resulttanz->num_rows > 0) {
  // output data of each row
  while($rowwanz = $resulttanz->fetch_assoc()) {
      
      $clr=$clr+1;
      
      
	  $att=$rowwanz['airports'];
	  
	  $aa= explode(",",$att);
	  
	   
	  foreach ($aa as $value) {
	 
	  ?>
                              
                               <div>
                                  <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
                             
                              <input name='airupdate[]' class='form-control notranslate' value='<?php echo $value;?>'>
                              
            

                            </div>
                             
                            
                              
                              
                             <?php
	  }
  }
}
                           ?>   
                            <nonsense id='addncairportss<?php echo $clr;?>'>
    
</nonsense>

<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="airupdate[]" class="form-control notranslate" placeholder="Airport">
</div>
<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="airupdate[]" class="form-control notranslate" placeholder="Airport">
</div>
<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="airupdate[]" class="form-control notranslate" placeholder="Airport">
</div>
                                </ul>
                            <input style='margin-bottom:20px; float:right;' class='btn btn-primary' name='airupdatebtn' type='submit'>
                             </form>
                             
                             <input type='submit' style='float:left;' class='btn btn-primary' id='pds2' onclick='addcardnewairportss("<?php echo $clr?>")' data-id='<?php echo $clr;?>' value='+'>
                             
                           
                               
                           
                           
                           
                           
                           
                           
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              </div>
                              </div>
                              
                              
                              
                              
                              <?php
                              $nnn=$nnn+1;
                              
                              ?>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              <?php
                              $cntr=$rowwa['country'];


$sqllan ="SELECT * FROM destination WHERE country='$cntr'";
		$resulttan = $conn->query($sqllan);
		

if ($resulttan->num_rows > 0) {
  // output data of each row
  while($rowwan = $resulttan->fetch_assoc()) {
	  
	   $clr=$clr+1;
	  ?>
                              
                              
                                  <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $nn;?>" aria-expanded="true" aria-controls="collapseOne">
                            <?php echo $rowwan['city'];?>
                          </button>
                        </h2>
                              
                              
                               <div id="collapseOne<?php echo $nn;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample<?php echo $nn;?>">
                          <div class="accordion-body">
                              
                              
                           
                           
                           
                           <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $nn2;?>" aria-expanded="true" aria-controls="collapseOne">
                            Attractions
                          </button>
                        </h2>
                           
                                <div id="collapseOne<?php echo $nn2;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample<?php echo $nn;?>">
                          <div class="accordion-body">
                              
                           <form action='#' method='POST'>
                               
                               
                               
                               <input style='display:none;' name='ctry' value='<?php echo $rowwa['country'];?>'>
                               <input style='display:none;' name='ct' value='<?php echo $rowwan['city'];?>'>
                               
                               
                            <ul>
                              
                               <?php
                              $cntr=$rowwa['country'];
                              $cta=$rowwan['city'];

$sqllanz ="SELECT * FROM destination WHERE country='$cntr' && city='$cta'";
		$resulttanz = $conn->query($sqllanz);
		

if ($resulttanz->num_rows > 0) {
  // output data of each row
  while($rowwanz = $resulttanz->fetch_assoc()) {
	  $att=$rowwanz['attractions'];
	  
	  $aa= explode(",",$att);
	  
	   
	  foreach ($aa as $value) {
	 
	  ?>
                              
                              <div>
                                  <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
                             
                              <input name='atsupdate[]' class='form-control notranslate' value='<?php echo $value;?>'>
                              
                            </div>
                              
                              
                             <?php
	  }
  }
}
                           ?>   
                                        <nonsense id='addnc2<?php echo $clr;?>'>
    
</nonsense>

<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="atsupdate[]" class="form-control notranslate" placeholder="Attraction">
</div>
<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="atsupdate[]" class="form-control notranslate" placeholder="Attraction">
</div>
<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="atsupdate[]" class="form-control notranslate" placeholder="Attraction">
</div>


                                </ul>
                                <input style='margin-bottom:20px; float:right;' class='btn btn-primary' name='atsupdatebtn' type='submit'>
                                </form>
                                
                           <input type='submit' style='float:left;' class='btn btn-primary' id='pds2' onclick='addcardnew2("<?php echo $clr?>")' data-id='<?php echo $clr;?>' value='+'>
                           </div></div>
                           
                           
                           
                           
                           
                                     <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $nn3;?>" aria-expanded="true" aria-controls="collapseOne">
                            Areas
                          </button>
                        </h2>
                           
                                <div id="collapseOne<?php echo $nn3;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample<?php echo $nn;?>">
                          <div class="accordion-body">
                              
                               <form action='#' method='POST'>
                                   
                                  <input style='display:none;' name='ctry' value='<?php echo $rowwa['country'];?>'>
                               <input style='display:none;' name='ct' value='<?php echo $rowwan['city'];?>'> 
                                   
                                   
                            <ul>
                              
                               <?php
                              $cntr=$rowwa['country'];
                              $cta=$rowwan['city'];

$sqllanz ="SELECT * FROM destination WHERE country='$cntr' && city='$cta'";
		$resulttanz = $conn->query($sqllanz);
		

if ($resulttanz->num_rows > 0) {
  // output data of each row
  while($rowwanz = $resulttanz->fetch_assoc()) {
      
       $clr=$clr+1;
       
	  $att=$rowwanz['areas'];
	  
	  $aa= explode(",",$att);
	  
	   
	  foreach ($aa as $value) {
	 
	  ?>
                              
                                <div>
                                  <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
                             
                              <input name='areaupdate[]' class='form-control notranslate' value='<?php echo $value;?>'>
                              
                             
                              
                            </div>
                             
                              
                              
                             <?php
	  }
  }
}
                           ?>   
                           
                            <nonsense id='addnc<?php echo $clr;?>'>
    
</nonsense>


<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="areaupdate[]" class="form-control notranslate" placeholder="Area">
</div>

<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="areaupdate[]" class="form-control notranslate" placeholder="Area">
</div>

<div>
<button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
<input name="areaupdate[]" class="form-control notranslate" placeholder="Area">
</div>



                                </ul>
                           
                             <input style='margin-bottom:20px; float:right;' class='btn btn-primary' name='areaupdatebtn' type='submit'>
                                </form>
                                                      
<input type='submit' style='float:left;' class='btn btn-primary' id='pds' onclick='addcardnew("<?php echo $clr?>")' data-id='<?php echo $clr;?>' value='+'>
               
                           </div></div>
                           
                
                           
                           
                           
                           
                           
                           
                           
                             
                             
                             
                             
                              </div>
                              </div>
                              
                              
                              
                              
                              
                              
                           <?php
                           
                           $nn=$nn+1;
  }
}
?>
                              
                              
                              
                              
           
                          </div>
                        </div>
                      </div>
                      
                      
                     
                     
            <?php
            $n=$n+1;
            
            $clr=$clr+1;
  }
}
?>
                      
                      
                      
                      
                      
                      
                      
                      


</div>
</div>
</div>
</div>
</div>


<br/>
<!--
<h2 align='center'>Add Areas</h2>

<form method='POST' action='#'>
<div class='container'><div class='row'>

<div class='col-sm'>
<div class="form-group">
    <label>Country</label>
    <select name='country' id='country' class="form-control">
       
       <option disabled selected>Select Country</option>
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
    
    
    <div class='col-sm'>
    <div class="form-group">
    <label>City</label>
    <select name='city' id='city' class='form-control'>
    
    </select>
    </div>
    
    
    </div>
    
    
    </div></div>
    
    
    
    <div class='container'>
        <div class='row'>

<div class='col-sm'>
    

</div>
    
    
    </div></div> 
    
    
      <div class='container'>
        <div class='row'>
<h4 align='center'>
<nonsense id='addnc'>
    
</nonsense>
</h4>

</div></div> 

<button type='submit' class='btn btn-primary' style='float:right;' name='submit'>Submit</button>
</form>


<h1 align='center'>
    
    
<input type='submit' class='btn btn-primary' id='pds' onclick='addcardnew()' value='+'>
</h1>

-->















<!--

<br/>
<h2 align='center'>Add Attractions</h2>

<form method='POST' action='#'>
<div class='container'><div class='row'>

<div class='col-sm'>
<div class="form-group">
    <label>Country</label>
    <select name='country' id='country2' class="form-control">
       
       <option disabled selected>Select Country</option>
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
    
    
    <div class='col-sm'>
    <div class="form-group">
    <label>City</label>
    <select name='city' id='city2' class='form-control'>
    
    </select>
    </div>
    
    
    </div>
    
    
    </div></div>
    
    
    
    <div class='container'>
        <div class='row'>

<div class='col-sm'>
    

</div>
    
    
    </div></div> 
    
    
      <div class='container'>
        <div class='row'>
<h4 align='center'>
<nonsense id='addnc2'>
    
</nonsense>
</h4>

</div></div> 

<button type='submit' class='btn btn-primary' style='float:right;' name='submit2'>Submit</button>
</form>


<h1 align='center'>
<input type='submit' class='btn btn-primary' id='pds2' onclick='addcardnew2()' value='+'>
</h1>


-->












<br/><br/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script>
    	  document.getElementById("pdsairy").addEventListener("click", function(event){
  event.preventDefault()
});

 document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});

 document.getElementById("pds2").addEventListener("click", function(event){
  event.preventDefault()
});



</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


 function addcardnewairportss(abc){
     
   var parent=document.getElementById("addncairportss"+abc);
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','airupdate[]');
   inpt.setAttribute('placeholder','Airport');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
    
    
}














    function addcardnew(abc){
   var parent=document.getElementById("addnc"+abc);
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','areaupdate[]');
   inpt.setAttribute('placeholder','Area');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
    
    
}


 function addcardnew2(abc){
   var parent=document.getElementById("addnc2"+abc);
   
   
   
   
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','atsupdate[]');
   inpt.setAttribute('placeholder','Attraction');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
   
   
   
   
   
   
   
   
   
   
    
}
   
    
</script>


<script>
    

   $("#country").on('change', function() {
       
 
	var country= $("#country").val();

 $.ajax({
              type:'POST',
              url:'getcityforareass.php',
              data:{'country':country},
             
              success:function(result){
                
                 
                  $("#city").html(result);
              }
                
              });
   });

     
</script>





<script>
    

   $("#country2").on('change', function() {
       
 
	var country= $("#country2").val();

 $.ajax({
              type:'POST',
              url:'getcityforareass.php',
              data:{'country':country},
             
              success:function(result){
                
                 
                  $("#city2").html(result);
              }
                
              });
   });

     
</script>






</main>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

