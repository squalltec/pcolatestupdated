
<?php
include 'db_connection.php';
include 'header.php';






if(isset($_POST['del']))
{
    
    
$aid=$_POST['aid'];
$companyi=$_POST['companyi'];
$imag=$_POST['imag'];
$sql = "DELETE FROM adscompany WHERE id='$aid'";

if ($conn->query($sql) === TRUE) {
  
 //unlink('ads/'.$companyi.'/'.$imag);

  
} else {
  echo "Error deleting record: " . $conn->error;
}



}

if(isset($_POST['submit']))
{
    
 
 
$except=$_POST['except'];
    
$company=$_POST['company'];
$selected=$_POST['country'];
$position=$_POST['position'];

$links=$_POST['link'];


$exceptcountries=implode(',',$except);



if(!empty($_FILES['myfile']['name'])){
		
		
		mkdir("ads/".$company);	
			
			
	
	 $filename = $_FILES['myfile']['name'];
	  $destination = 'ads/'. $company .'/'. $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['myfile']['tmp_name'];

  if (move_uploaded_file($file, $destination)) {
      
      
      
      $man=0;
      
 foreach($selected as $s)     
      {
      

$sql ="INSERT INTO adscompany (name,country,position,image,exceptcountries,link) VALUES ('$company', '$selected[$man]', '$position[$man]','$filename','$exceptcountries','$links[$man]')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$man=$man+1;
}













}
}












}
?>





<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  
  
  
  
  
  
  
  
  
  
  
  <style>
  .choices__list--multiple .choices__item {
        background-color:red !important;
        border: 1px solid red !important;
    }
</style>
  
  
  
  
  
  
               <?php
					$bb='';			   
$sql ="SELECT * FROM adscompany";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	if($row['position']=='Both')
	{ 
	    
	    $bb='Both';
	    
	}
	if($row['position']=='Left')
	{ 
	    
	    $bb=$bb.'Left';
	    
	}
	if($row['position']=='Right')
	{ 
	    
	    $bb=$bb.'Right';
	    
	}
  }
}
  ?>



     <main class="page-content">


<h1 align='center'>Ads Management</h1>
<br/>

<form action='#' method='POST' enctype="multipart/form-data" >
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   <div class='row'>
       
        <div class='col-sm'>
  <label>Company Name</label>
  
  
  
  <select required style='height:47.25px;' class='form-control' name='company'>
      
     
 <?php
								   
$sql ="SELECT * FROM loginforads";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      echo '<option>'.$row['name'].'</option>';
      
  }
}
	
	?>

     
     
     
     
     </select>
  

  
  
  
  
  </div>
  
       <div class='col-sm'>
           <label>Countries</label>
 <select id='country0' data-id='0' onchange='changer(this)' required style='height:47.7px;' class='form-control' name='country[]' placeholder="Select Country">
       <option  disabled selected>Select Country</option>
       <option>All World</option>
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
        
        
        
        
           <div class='col-sm'>
           <label>Position</label>
           <select required style='height:47.25px;'  data-id='0' onchange='verify(this)' class='form-control' id='position0' name='position[]'>
             
                
                
              
                </select>
           </div>
           <div class='col-sm'>
               <label>Upload Ad</label>
               <input required accept="image/*"  style='height:47.25px;' name="myfile" type="file" class="form-control">
          
           </div>
           
             <div class='col-sm'>
               <label>Link</label>
               <input required style='height:47.25px;' name="link[]" type="text" class="form-control">
          
           </div>
           
           
           
           
           
           
           
   <div style='display:none;' id='bbab' class='col-sm'>
           <label>Except Countries</label>
 <select class='form-control'  id="choices-multiple-remove-button" name='except[]' placeholder="Select Countries" multiple>
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
<style>
    .cent{
        align:center;
        text-align:center;
        margin:0 auto;
    }
</style>

<nonsense id='adddata'>
    
</nonsense>
<br/><br/>
<h1 align='center'><button class='cent btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 








<br/><br/>
<button type='submit' name='submit' style='float:right;' class='btn btn-danger'> Submit </button>

</form>












<br/>
<br/>
<br/>
<br/>






	<table id="example2" style='text-align:center;' class="table table-striped table-bordered">
								<thead>
								<tr>
									    <th>Company</th>
									    <th>Countries</th>
									    <th>Position</th>
									    <th>Ad</th>
									    <th>Exception</th>
									    <th>Link</th>
									    <th>Delete</th>
									    </tr>
									    
									    </thead>
									    
									    
									    <tbody>
									        


 <?php
								   
$sql ="SELECT * FROM adscompany";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>

									        
									        	    <tr>
									          <td><?php echo $row['name'];?></td>  
									          <td><?php echo $row['country'];?></td>  
									          <td><?php echo $row['position'];?></td>  
									           <td><a target="_blank" href='ads/<?php echo $row['name']."/".$row['image'];?>'>View</a></td> 
									           
								  <td><?php echo $row['exceptcountries'];?></td>  
								   <td><a target="_blank" href='<?php echo $row['link'];?>'>Visit</a></td> 
									           
									           
						<td>	<form action='#' method='POST'>
						    <input style='display:none;' name='aid' value='<?php echo $row['id'];?>'>
						     <input style='display:none;' name='companyi' value='<?php echo $row['name'];?>'>
						     
						      <input style='display:none;' name='imag' value='<?php echo $row['image'];?>'>
						    <button type='submit' name='del' class='btn btn-danger'>X</button></form></td>
									        </tr>
									        
									        <?php
  }
}
?>
									    </tbody>
									    
									    </table>


















</main>



		


  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>
	



<script>
    document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});
</script>











<script>
var n=1;
    function myFunction2(){
        
        
        
        var pos=document.getElementById('position0').value;
        var con=document.getElementById('country0').value;
       
        if(pos=='Left' && con=='All World')
        {
            
               document.getElementById('addact2').style.display='none';
           var non= document.getElementById('adddata');
       
       
       var divr=document.createElement('div');
       divr.classList.add('row');
       
         var divc=document.createElement('div');
        divc.classList.add('col-sm');
        
       var divc1=document.createElement('div');
        divc1.classList.add('col-sm');
        
        var divc2=document.createElement('div');
        divc2.classList.add('col-sm');
        
        
        var divc3=document.createElement('div');
        divc3.classList.add('col-sm');
       
       
       
         var divcempty=document.createElement('div');
        divcempty.classList.add('col-sm');
          var divcempty2=document.createElement('div');
        divcempty2.classList.add('col-sm');
       
       
       
       
       
       
       
       
       
       var country=document.createElement('SELECT');
       country.classList.add('form-select');
       country.setAttribute('id','country1');
       country.setAttribute('onchange','changer(this)');
       country.setAttribute('data-id','1');
       country.setAttribute('name','country[]');
       
       
       country.innerHTML='<option>All World</option>';
       
       
       divc1.appendChild(country);
       
       
         var position=document.createElement('SELECT');
       position.classList.add('form-select');
       position.setAttribute('id','position1');
        position.setAttribute('name','position[]');
       
       position.innerHTML='<option>Right</option>'
       
          divc2.appendChild(position); 
       
       
       
       
       
       var link=document.createElement('INPUT');
       link.classList.add('form-control');
        link.setAttribute('name','link[]');
       link.setAttribute('type','text');
          divcempty.appendChild(link); 
       
       
       
       
       
       
       
       
       
       
       
        divr.appendChild(divc);
        divr.appendChild(divc1);
         divr.appendChild(divc2);
          divr.appendChild(divc3);
        divr.appendChild(divcempty);
        
       
       
       
       
       
       
       
       non.appendChild(divr);  
            
            
            
            
            
           n=n+1; 
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        }
        
        
        
        
        
        
        
        
        
        
        else if(pos=='Right' && con=='All World')
        {
            
               document.getElementById('addact2').style.display='none';
           var non= document.getElementById('adddata');
       
       
       var divr=document.createElement('div');
       divr.classList.add('row');
       
         var divc=document.createElement('div');
        divc.classList.add('col-sm');
        
       var divc1=document.createElement('div');
        divc1.classList.add('col-sm');
        
        var divc2=document.createElement('div');
        divc2.classList.add('col-sm');
        
        var divc3=document.createElement('div');
        divc3.classList.add('col-sm');
       
       
       
       
         var divcempty=document.createElement('div');
        divcempty.classList.add('col-sm');
          var divcempty2=document.createElement('div');
        divcempty2.classList.add('col-sm');
       
       
       
       
       
       
       
       
       
       var country=document.createElement('SELECT');
       country.classList.add('form-select');
       country.setAttribute('id','country1');
       country.setAttribute('onchange','changer(this)');
       country.setAttribute('data-id','1');
       country.setAttribute('name','country[]');
       
       
       country.innerHTML='<option>All World</option>';
       
       
       divc1.appendChild(country);
       
       
         var position=document.createElement('SELECT');
       position.classList.add('form-select');
       position.setAttribute('id','position1');
        position.setAttribute('name','position[]');
       
       position.innerHTML='<option>Left</option>'
       
          divc2.appendChild(position); 
       
       
       
       
       
        
       var link=document.createElement('INPUT');
       link.classList.add('form-control');
        link.setAttribute('name','link[]');
       link.setAttribute('type','text');
          divcempty.appendChild(link); 
       
       
       
       
        divr.appendChild(divc);
        divr.appendChild(divc1);
         divr.appendChild(divc2);
          divr.appendChild(divc3);
        divr.appendChild(divcempty);
       
       non.appendChild(divr);  
            
            
            
            
            
           n=n+1; 
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        } 
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        else{
       var non= document.getElementById('adddata');
       
       
       var divr=document.createElement('div');
       divr.classList.add('row');
       
         var divc=document.createElement('div');
        divc.classList.add('col-sm');
        
       var divc1=document.createElement('div');
        divc1.classList.add('col-sm');
        
        var divc2=document.createElement('div');
        divc2.classList.add('col-sm');
        
        var divc3=document.createElement('div');
        divc3.classList.add('col-sm');
       
       
       
       
       
       
       
         var divcempty=document.createElement('div');
        divcempty.classList.add('col-sm');
          var divcempty2=document.createElement('div');
        divcempty2.classList.add('col-sm');
       
       
       
       
       
       
       
       
       
       var country=document.createElement('SELECT');
       country.classList.add('form-select');
       country.setAttribute('id','country'+n);
       country.setAttribute('onchange','changer(this)');
       country.setAttribute('data-id',n);
       country.setAttribute('name','country[]');
       
       
       country.innerHTML='<option disabled selected>Select Country</option><option value="United States">United States</option><option value="Canada">Canada</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua">Antigua</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijani">Azerbaijani</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Netherlands">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia-Hercegovina">Bosnia-Hercegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British IOT">British IOT</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Rep">Central African Rep</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Faeroe Islands">Faeroe Islands</option><option value="Falkland Islands">Falkland Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern">French Southern</option><option value="French Southern Ter">French Southern Ter</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard">Heard</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="MNP">MNP</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="NER">NER</option><option value="Netherlands">Netherlands</option><option value="Neutral Zone">Neutral Zone</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="North Korea">North Korea</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion">Reunion</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre">Saint Pierre</option><option value="Saint Vincent">Saint Vincent</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Scotland">Scotland</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovak Republic">Slovak Republic</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somali Democratic">Somali Democratic</option><option value="South Africa">South Africa</option><option value="South Georgia">South Georgia</option><option value="South Korea">South Korea</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St. Kitts and Nevis">St. Kitts and Nevis</option><option value="STP">STP</option><option value="Suriname">Suriname</option><option value="Svalbard">Svalbard</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="TCA">TCA</option><option value="Thailand">Thailand</option><option value="Toga">Toga</option><option value="Togolese">Togolese</option><option value="Tokelau">Tokelau</option><option value="Tongo">Tongo</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Upper Volta">Upper Volta</option><option value="Uruguay">Uruguay</option><option value="USSR(Former)">USSR(Former)</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="VI, British">VI, British</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, USA">Virgin Islands, USA</option><option value="Western Sahara">Western Sahara</option><option value="WLF">WLF</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option>';
       
       
       divc1.appendChild(country);
       
       
         var position=document.createElement('SELECT');
       position.classList.add('form-select');
       position.setAttribute('id','position'+n);
        position.setAttribute('name','position[]');
       
       
       
          divc2.appendChild(position); 
       
       
       
       
        
       var link=document.createElement('INPUT');
       link.classList.add('form-control');
        link.setAttribute('name','link[]');
       link.setAttribute('type','text');
          divcempty.appendChild(link); 
       
       
       
       
       
       
        divr.appendChild(divc);
        divr.appendChild(divc1);
         divr.appendChild(divc2);
          divr.appendChild(divc3);
         divr.appendChild(divcempty);
        
         
       non.appendChild(divr);
       
       
       
       n=n+1;
        }
       
    }
</script>





<script>

$('#country0').on('change', function() {
    
    if(document.getElementById('country0').value!='All World')
    {
         document.getElementById('bbab').style.display='none';  
        
      document.getElementById('addact2').style.display='block';  
    }
    
     if(document.getElementById('country0').value=='All World')
    {
       document.getElementById('bbab').style.display='block';  
        
    }
    
    
});

$('#position0').on('change', function() {
   
    
    var positionvalue=document.getElementById('position0').value;
    
    var countryvalue=document.getElementById('country0').value;
    
    if(countryvalue=='All World' && positionvalue=='Both')
    {
        document.getElementById('addact2').style.display='none';
        
        document.getElementById('adddata').innerHTML='';
        
        
    }
    
     if(countryvalue=='All World' && positionvalue=='Left')
    {
        document.getElementById('addact2').style.display='block';
        
        
        document.getElementById('position1').innerHTML='<option selected>Right</option>'
        
        
    }
         if(countryvalue=='All World' && positionvalue=='Right')
    {
        
        
        document.getElementById('addact2').style.display='block';
         document.getElementById('position1').innerHTML='<option selected>Left</option>'
    } 
  
  
    
    
});



function changer($this) {
      
      
      var od=$this.getAttribute('data-id');
      
   var countr= document.getElementById('country'+od).value;

 




 $.ajax({
              type:'POST',
              url:'getpositionsads.php',
              data:{'countr':countr},
             
              success:function(result){
                 
                 if(result.includes('Left'))
               {
               document.getElementById('position'+od).innerHTML="<option>Right</option>";
                     
               }
              
               else if(result.includes('Right'))
               {
               document.getElementById('position'+od).innerHTML="<option>Left</option>";
                     
               }
                
            else if(result.includes('Both'))
               {
               document.getElementById('position'+od).innerHTML="";
                     
               }
                
                
                 else if(result.includes('LeftRight'))
               {
               document.getElementById('position'+od).innerHTML="";
                     
               }
               
                else if(result.includes('RightLeft'))
               {
               document.getElementById('position'+od).innerHTML="";
                     
               }
             
                else
               {
               document.getElementById('position'+od).innerHTML="<option>Left</option><option>Right</option><option>Both</option>";
                     
               }
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
          var posit=document.getElementById('position'+od).value;      
                

    
 $.ajax({
              type:'POST',
              url:'verifyadspositioning.php',
              data:{'count':countr, 'posit':posit},
             
              success:function(result)
              {
                  
                 if(result.includes('exist'))
                 {
                    
                    swal.fire('Ad already running');
                   document.getElementById('position'+od).innerHTML='';
                   document.getElementById('country'+od).selectedIndex='0';
                    
                    
                    
                 }
                  
              }
              
              
 });
      

                
                
                
                
                
                
                
                
                
                
                
                
                
                
              }
                
              });    
      
       































      
  }
</script>




<script>
    $(document).ready(function(){
    
     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:100,
        searchResultLimit:5,
        renderChoiceLimit:5
      }); 
     
     
 });
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
