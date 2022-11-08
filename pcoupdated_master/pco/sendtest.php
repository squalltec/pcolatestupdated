<?php
require_once('db_connection.php');


include('header.php');








if (isset($_POST['attractions'])) {
    
   	
$country=$_POST['country'];
	
$city=$_POST['city'];

$attractionsy=$_POST['attys'];



 
   $arr = array_filter($attractionsy, 'strlen');
    
    
    $attractions=implode(",", $arr);
    $attractions=mysqli_real_escape_string($conn, $attractions);
    
    
    
    
    
    
    
  
$sqlla ="SELECT * FROM destination WHERE country='$country' && city='$city'";
		$resultta = $conn->query($sqlla);
		

if ($resultta->num_rows > 0) {



			
$sql ="UPDATE destination SET attractions='$attractions' WHERE country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  //echo "<script>location.replace('registeremp.php');</script>";
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}














}

else
{
			
$sql ="INSERT INTO destination (country,city,attractions) VALUES ('$country','$city','$attractions')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  //echo "<script>location.replace('registeremp.php');</script>";
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




}






    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}




if (isset($_POST['submit'])) {
	
$country=$_POST['cont'];

	
$capital=mysqli_real_escape_string($conn, $_POST['capital']);
$largest=mysqli_real_escape_string($conn, $_POST['largest']);
$official=mysqli_real_escape_string($conn, $_POST['officiallanguage']);
$common=mysqli_real_escape_string($conn, $_POST['commonlanguage']);

$currency=mysqli_real_escape_string($conn, $_POST['currency']);

$demonym=mysqli_real_escape_string($conn, $_POST['demonym']);

$countrycode=mysqli_real_escape_string($conn, $_POST['callercode']);
$drivingside=mysqli_real_escape_string($conn, $_POST['drivingside']);
$iso=mysqli_real_escape_string($conn, $_POST['iso']);
$about=mysqli_real_escape_string($conn, $_POST['about']);

$citys=$_POST['citys'];
$airportys=$_POST['airportys'];



$arr1 = array_filter($citys, 'strlen');
$arr2 = array_filter($airportys, 'strlen');

$cities=implode(",", $arr1);
$airports=implode(",", $arr2);

$cities=mysqli_real_escape_string($conn, $cities);
$airports=mysqli_real_escape_string($conn, $airports);







$sqlla ="SELECT * FROM countrydata WHERE country='$country'";
		$resultta = $conn->query($sqlla);
		

if ($resultta->num_rows > 0) {



			
$sql ="UPDATE countrydata SET country='$country',capital='$capital',largest='$largest',official='$official',common='$common',currency='$currency',demonym='$demonym',countrycode='$countrycode',drivingside='$drivingside',iso='$iso',about='$about',cities='$cities',airports='$airports' WHERE country='$country'";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  //echo "<script>location.replace('registeremp.php');</script>";
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}














}

else
{
			
$sql ="INSERT INTO countrydata (country,capital,largest,official,common,currency,demonym,countrycode,drivingside,iso,about,cities,airports) VALUES ('$country','$capital','$largest','$official','$common','$currency','$demonym','$countrycode','$drivingside','$iso','$about','$cities','$airports')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  
  
  //echo "<script>location.replace('registeremp.php');</script>";
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




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

  
  
  

<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            
<select class='form-control' name='cntry' id='cntry'>
<option disabled selected>Select Country</option>

<!--
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
<option value="Ukraine">Ukraine</option>-->
<option value="United Arab Emirates">United Arab Emirates</option>

<!--<option value="United Kingdom">United Kingdom</option>
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
-->
</select>
</div>

<div class='col-sm'>
<button id='fetch' class='btn btn-primary' style='float:right;'>Fetch Country Data</button>
</div>

    </div>
</div>





<div style='display:none;' id='hideme'>


<br/><br/>
 <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Country Data</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">





 <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Data
                          </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                          
                                         
                          
                          
                          
                          











             
<form action="#" method="post" enctype="multipart/form-data">                              



<input style='display:none;' id='cont' name='cont' type='text'>

<input style='display:none;' id='cty' name='cty' type='text'>


<div class='container'>
    
    <div class='row'>
        
        
        <div class='col-sm'>
 <label>Capital City</label>           
<input class='form-control' required name='capital' id='capital'>
</div>

   <div class='col-sm'>
  <label>Largest City</label>             
<input class='form-control' name='largest' id='largest'>
</div>

 </div>
</div>






<div class='container'>
    <div class='row'>
        
        
        <div class='col-sm'>
 <label>Official Language</label>           
<input class='form-control' name='officiallanguage' id='officiallanguage'>
</div>

   <div class='col-sm'>
  <label>Common Language</label>             
<input class='form-control' name='commonlanguage' id='commonlanguage'>
</div>

 </div>
</div>





<div class='container'>
    <div class='row'>
        
        
        <div class='col-sm'>
 <label>Currency</label>           
<input class='form-control' required name='currency' id='currency'>
</div>

   <div class='col-sm'>
  <label>Country Code</label>             
<input class='form-control' name='callercode' id='callercode'>
</div>

 </div>
</div>




<div class='container'>
    <div class='row'>
        
        
        <div class='col-sm'>
 <label>Demonym</label>           
<input class='form-control' name='demonym' id='demonym'>
</div>

   <div class='col-sm'>
  <label>Driving Side</label>             
<input class='form-control' name='drivingside' id='drivingside'>
</div>

 </div>
</div>

<div class='container'>
    <div class='row'>
      
   <div class='col-sm'>
  <label>ISO Code</label>             
<input readonly class='form-control' name='iso' id='iso'>
</div>
 </div>
</div>


<div class='container'>
    <div class='row'>
      
   <div class='col-sm'>
  <label>About Country</label>             
<textarea rows='6'; class='form-control' name='about' id='about'></textarea>
</div>
 </div>
</div>






<br/><br/>
<label>Cities</label> 
<div id='listcities'>
    
</div>
 <nonsense id='addnccity'>
    
</nonsense>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="citys[]" placeholder="City">
</div>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="citys[]" placeholder="City">
</div>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="citys[]" placeholder="City">
</div>

 <input type='submit' style='float:left;' class='btn btn-primary' id='pdscity' onclick='addcardnewcity()' value='+'>
<br/><br/>
<label>Airports</label> 
<div id='listairports'>
    
</div>
 <nonsense id='addncairport'>
    
</nonsense>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="airportys[]" placeholder="Airport">
</div>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="airportys[]" placeholder="Airport">
</div>
<div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
    <input class="form-control" name="airportys[]" placeholder="Airport">
</div>

 <input type='submit' style='float:left;' class='btn btn-primary' id='pdsairport' onclick='addcardnewairport()' value='+'>

<br/><br/>


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>
       
                          
      



                          
                          
                          
                          </div>
                        </div>
                      </div>

</div>
</div>
</div>
</div>
</div>










</div>




<br/>
<br/>
<br/>

<div class='container'>
    <div class='row'>
        
<div class='col-sm'>
<select class='form-control' name='city' id='city'>
<option disabled selected>Select City</option>
</select>



        </div>
        
        
<div class='col-sm'>
<button id='fetch2' class='btn btn-primary' style='float:right;'>Fetch Attractions</button>
</div>

    </div>
</div>



<form action='#' method='POST'>

<div style='display:none;' id='hideme2'>
    <input style='display:none;'  name='country' id='coatt'> 
    <input style='display:none;'  name='city' id='cityatt'> 
<br/><br/>
  <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">City Attractions</h5>
                    <div class="my-3 border-top"></div>
                 
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwoo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoo" aria-expanded="false" aria-controls="collapseTwoo">
                            Attractions
                          </button>
                        </h2>
                        <div id="collapseTwoo" class="accordion-collapse collapse" aria-labelledby="headingTwoo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">

                            <div id='listattractions'>
    
                                </div>
                                
                                 <nonsense id='addnc'>
    
</nonsense>
                    
                    <div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
     <input class="form-control" name="attys[]" placeholder='Attraction'>
</div>
 <div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
     <input class="form-control" name="attys[]" placeholder='Attraction'>
</div>
 <div>
    <button class="delbtn" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
     <input class="form-control" name="attys[]" placeholder='Attraction'>
</div>
                    
                         
                          <br/>
                           <div class="form-group">
 <button style="float:right;"type="submit" name='attractions'class="btn btn-primary">Submit</button>
 <input type='submit' style='float:left;' class='btn btn-primary' id='pds' onclick='addcardnew()' value='+'>
  </div>
                          
                          
                          
                          
                          
                          </div>
                        </div>
                      </div>
					  
</form>


</div>
</div>
</div>
</div>
</div>
</div>





<script>


 function addcardnewairport(){
   var parent=document.getElementById("addncairport");
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','airportys[]');
   inpt.setAttribute('placeholder','Airport');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
    
    
}





 function addcardnewcity(){
   var parent=document.getElementById("addnccity");
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','citys[]');
   inpt.setAttribute('placeholder','City');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
    
    
}















    
 function addcardnew(){
   var parent=document.getElementById("addnc");
   
   var div=document.createElement('div');
   
 
   var inptbtn=document.createElement('BUTTON');
     inptbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
      inptbtn.setAttribute('class','delbtn');
       inptbtn.innerHTML='X';
    div.appendChild(inptbtn);
    
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','attys[]');
   inpt.setAttribute('placeholder','Attraction');
   inpt.setAttribute('class','form-control');
   
  
   div.appendChild(inpt);
   
     
  
    parent.appendChild(div);
    
    
}
</script>





</main>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	  <script>
	  
	  document.getElementById("fetch").addEventListener("click", function(event){
  event.preventDefault()
});


 document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});


 document.getElementById("pdscity").addEventListener("click", function(event){
  event.preventDefault()
});


 document.getElementById("pdsairport").addEventListener("click", function(event){
  event.preventDefault()
});









	
	
	  $("#city").on('change', function() {
	      var cctt2=document.getElementById('city');
	      var cctt=document.getElementById('cityatt');
	      
	      cctt.value=cctt2.value;
	      
	      var hideme2=document.getElementById('hideme2');
	      
	      	hideme2.style.display='none';
	      	
	      
	      
	      
	      
	      
	      
	      	   var listattractions=document.getElementById("listattractions");
			  
			 
				listattractions.innerHTML='';
			
			
				var countryname=document.getElementById("cntry").value;
	
			var city=document.getElementById("city").value;


 $.ajax({
              type:'POST',
              url:'getcitydatadatabase.php',
              data:{'countryname':countryname,'cityname':city},
             

			 success:function(result){
                
				 var data = $.parseJSON(result);
				 
				
			
				
				hideme2.style.display='block';
				
				
				
				
				var atstring=data.attractions;
				const atarray = atstring.split(",");
				
				//alert(ctarray.length);
				
				var listattractions=document.getElementById("listattractions");
			for (let i = 0; i < atarray.length; i++) {
			   
			    
			    var div=document.createElement("div");
			    var del=document.createElement("BUTTON");
			  
			      
			  
			    
			    var aty=document.createElement("INPUT");
			    aty.setAttribute('class','form-control');
			    aty.setAttribute('name','attys[]');
			    aty.setAttribute('value',atarray[i]);
			    
			     del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(aty);
			    
			    listattractions.appendChild(div);
			    
			    
			    
			    
			}
			
              
                      
                  }
                 
                 
          }); 


			
	         
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	  });















	  
	  
	  
	  
   $("#cntry").on('change', function() {
       
       var country= $("#cntry").val();
       
        
	      var cctt=document.getElementById('coatt');
	      
	      cctt.value=country;
       
       
       
     var elements = document.querySelectorAll('[id=cont]');

for(var i=0; i<elements.length; i++) {
    
    elements[i].value=country;
}  
       
       
       
       
       
       
       
       
       

	

 $.ajax({
              type:'POST',
              url:'getcitiesforregister.php',
              data:{'country':country},
             
              success:function(result){
                 
                  $("#city").html(result);
              }
                
              });
   });

	  
	  
	  










	  
	  
	  
	     $("#fetch2").on('click', function() {
	         
	         
	         
	      
	      var hideme2=document.getElementById('hideme2');
	      
	      	hideme2.style.display='none';
	      	
	      	
	      	
	      	
	      	
	      	
	       let timerInterval
Swal.fire({
  title: 'Fetching!',
  html: 'I will close in <b></b> milliseconds.',
  timer: 20000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
	       
	       
	      
			  
			   var listattractions=document.getElementById("listattractions");
			  
			 
				listattractions.innerHTML='';
			
			
				var countryname=document.getElementById("cntry").value;
	
			var city=document.getElementById("city").value;


 $.ajax({
              type:'POST',
              url:'getcitydata.php',
              data:{'countryname':countryname,'cityname':city},
             

			 success:function(result){
                
				 var data = $.parseJSON(result);
				 
				
				
				
				hideme2.style.display='block';
				
				
				
				
				var atstring=data.attractions;
				const atarray = atstring.split(",");
				
				//alert(ctarray.length);
				
				var listattractions=document.getElementById("listattractions");
			for (let i = 0; i < atarray.length; i++) {
			    
			 
			      
			    var aty=document.createElement("INPUT");
			    aty.setAttribute('class','form-control');
			    aty.setAttribute('name','attys[]');
			    aty.setAttribute('value',atarray[i]);
			    
			    
			        var div=document.createElement("div");
			      var del=document.createElement("BUTTON");
			      
			       del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(aty);
			    listattractions.appendChild(div);
			    
			}
			
              
                      
                  }
                 
                 
          }); 


			
	         
	         
	         
	         
	     });
	  
	  
	  
	  
	  
	  
	  
	   $("#fetch").on('click', function() {
	       
	       var hideme=document.getElementById("hideme");
	       
	       
	       let timerInterval
Swal.fire({
  title: 'Fetching!',
  html: 'I will close in <b></b> milliseconds.',
  timer: 20000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
	       
	       
	       
	       
	       
	       
	       
	       
	       
	       
		
		var countryname=document.getElementById("cntry").value;
	
		


 $.ajax({
              type:'POST',
              url:'getcountrydata.php',
              data:{'countryname':countryname},
             

			 success:function(result){
                
				 var data = $.parseJSON(result);
				 
              var capital=document.getElementById("capital");
			  
			  var largest=document.getElementById("largest");
			  
			  var officiallanguage=document.getElementById("officiallanguage");
			  
			  var commonlanguage=document.getElementById("commonlanguage");
			  
			  var currency=document.getElementById("currency");
			  
			  var callercode=document.getElementById("callercode");
			  
			  var demonym=document.getElementById("demonym");
			  
			  var drivingside=document.getElementById("drivingside");
			  
			  var iso=document.getElementById("iso");
			  
			  var about=document.getElementById("about");
			  
			 	var listcities=document.getElementById("listcities");
				var listairports=document.getElementById("listairports");  
			  
			 listcities.innerHTML='';
			  listairports.innerHTML='';
			  
			  capital.value='';
			  largest.value='';
			officiallanguage.value='';
			commonlanguage.value='';
			currency.value='';
			callercode.value='';
			demonym.value='';
			iso.value='';
			drivingside.value='';
			about.value='';
		
		
			
				capital.value=data.capital;
				largest.value=data.largest;
				officiallanguage.value=data.officiallanguage;
				commonlanguage.value=data.commonlanguage;
				currency.value=data.currency;
				callercode.value=data.callercode;
				demonym.value=data.demonym;
				iso.value=data.iso;
				drivingside.value=data.drivingside;
				about.value=data.about;
				
				
				hideme.style.display='block';
				
				
				var ctstring=data.cities;
				const ctarray = ctstring.split(",");
				
				//alert(ctarray.length);
				
				var listcities=document.getElementById("listcities");
			for (let i = 0; i < ctarray.length; i++) {
			    
			    var cty=document.createElement("INPUT");
			    cty.setAttribute('class','form-control');
			    cty.setAttribute('name','citys[]');
			    cty.setAttribute('value',ctarray[i]);
			    
			    
			       var div=document.createElement("div");
			      var del=document.createElement("BUTTON");
			      
			       del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(cty);
			    
			    listcities.appendChild(div);
			    
			}
				
				
				
				
			    air=data.airports;
			
				var airstring=air.replace(/&#9;/g, "");
				const airarray = airstring.split(",");
				
			
				
				var listairports=document.getElementById("listairports");
			for (let i = 0; i < airarray.length; i++) {
			    
			    var airy=document.createElement("INPUT");
			    airy.setAttribute('class','form-control');
			    airy.setAttribute('name','airportys[]');
			    airy.setAttribute('value',airarray[i]);
			    
			    
			    
			       var div=document.createElement("div");
			      var del=document.createElement("BUTTON");
			      
			       del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(airy);
			    
			    listairports.appendChild(div);
			    
			}
				
			
			
			
			
			  
			
			
			
			
				
				
              
                      
                  }
                 
                 
          }); 


		
		  
		  
		
	});
	
	
	
	
	
	  $("#cntry").on('change', function() {
	      
	      var hideme=document.getElementById("hideme");
	      
	         var capital=document.getElementById("capital");
			  
			  var largest=document.getElementById("largest");
			  
			  var officiallanguage=document.getElementById("officiallanguage");
			  
			  var commonlanguage=document.getElementById("commonlanguage");
			  
			  var currency=document.getElementById("currency");
			  
			  var callercode=document.getElementById("callercode");
			  
			  var demonym=document.getElementById("demonym");
			  
			  var drivingside=document.getElementById("drivingside");
			  
			  var iso=document.getElementById("iso");
			  
			  var about=document.getElementById("about");
			  
			  	var listairports=document.getElementById("listairports");
				var listcities=document.getElementById("listcities");
			   
		
			  
			  
			  capital.value='';
			  largest.value='';
			officiallanguage.value='';
			commonlanguage.value='';
			currency.value='';
			callercode.value='';
			demonym.value='';
			iso.value='';
			drivingside.value='';
			about.value='';
		listairports.innerHTML='';
		listcities.innerHTML='';
		
		hideme.style.display='none';
		
		
		
	      
	      	var listcities=document.getElementById("listcities");
	      	listcities.innerHTML='';
	      	var countryname=document.getElementById("cntry").value;
	      	
	     

 $.ajax({
              type:'POST',
              url:'predatacountry.php',
              data:{'countryname':countryname},
             

			 success:function(result){
			    
			     
                var data = $.parseJSON(result);
                
                
                
              
              
              
             
			
				capital.value=data.capital;
				largest.value=data.largest;
				officiallanguage.value=data.official;
				commonlanguage.value=data.common;
				currency.value=data.currency;
				callercode.value=data.countrycode;
				demonym.value=data.demonym;
				iso.value=data.iso;
				drivingside.value=data.drivingside;
				about.value=data.about;
				
				hideme.style.display='block';
				
				
				var ctstring=data.cities;
				const ctarray = ctstring.split(",");
				
				//alert(ctarray.length);
			
			for (let i = 0; i < ctarray.length; i++) {
			    
			    var cty=document.createElement("INPUT");
			    cty.setAttribute('class','form-control');
			    cty.setAttribute('name','citys[]');
			    cty.setAttribute('value',ctarray[i]);
			    
			    
			       var div=document.createElement("div");
			      var del=document.createElement("BUTTON");
			      
			       del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(cty);
			    
			    listcities.appendChild(div);
			    
			}
				
				
				
				
			    air=data.airports;
			
				var airstring=air.replace(/&#9;/g, "");
				const airarray = airstring.split(",");
				
			
				
				
			for (let i = 0; i < airarray.length; i++) {
			    
			    var airy=document.createElement("INPUT");
			    airy.setAttribute('class','form-control');
			    airy.setAttribute('name','airportys[]');
			    airy.setAttribute('value',airarray[i]);
			    
			    
			       var div=document.createElement("div");
			      var del=document.createElement("BUTTON");
			      
			       del.setAttribute('class','delbtn');
			     del.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
			    del.innerHTML='X';
			    
			    div.appendChild(del);
			    div.appendChild(airy);
			    
			    listairports.appendChild(div);
			    
			}
				
			
			
			
			
			  
			
			
              
              
              
              
              
              
              
              
              
			 }
			 
			 
			 
			 
			 
 });
	    
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
	      
	      
	  });
	  </script>