<?php
require_once('db_connection.php');


include('header.php');



if (isset($_POST['submit'])) {

$backcolor=$_POST['backcolor'];
$forecolor=$_POST['forecolor'];
	
$name=$_POST['name'];
$descs=$_POST['desc'];
$desc=mysqli_real_escape_string($conn, $descs);
$title=$_POST['title'];

$sdate=$_POST['sdate'];
$edate=$_POST['edate'];

$country=$_POST['country'];
$city=$_POST['city'];

$venuename=$_POST['venuename'];
$venuelocation=$_POST['venuelocation'];
$venueaddress=$_POST['venueaddress'];
$gpslocations=$_POST['gpslocation'];
$gpslocation=mysqli_real_escape_string($conn, $gpslocations);
$venuedirection=$_POST['venuedirection'];

$fb=$_POST['fb'];

$insta=$_POST['insta'];

$twitter=$_POST['twitter'];

$linkedin=$_POST['linkedin'];
$nos=$_POST['nos'];
$eventtype=$_POST['eventtype'];












if (isset($_POST["year"])) {
    $years=$_POST['year'];
    $year=implode(",", $years);
}
else{
    $year='';
}
if (isset($_POST["pax"])) {
    $paxs=$_POST['pax'];
    $pax=implode(",", $paxs);
}
else{
    $pax='';
}
if (isset($_POST["location"])) {
    $locations=$_POST['location'];
    $location=implode(",", $locations);
}
else{
    $location='';
}

$typeofevent=$_POST['typeofevent'];

$guestsregions=$_POST['guestsregions'];











if(!empty($_FILES['myfile']['name']) && !empty($_FILES['myfile2']['name']) && !empty($_FILES['logo']['name']) ){
		
		mkdir("eventbanners/".$name);	
			mkdir("eventhighlights/".$name);
			mkdir("eventlogos/".$name);
	
		$filename = $_FILES['myfile']['name'];
	  $destination = 'eventbanners/'. $name .'/'. $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['myfile']['tmp_name'];
	  
	  
	  
	  	$filename2 = $_FILES['myfile2']['name'];
	  $destination2 = 'eventhighlights/'. $name .'/'. $filename2;
	  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
	  $file2 = $_FILES['myfile2']['tmp_name'];
	  
	  	$filename3 = $_FILES['logo']['name'];
	  $destination3 = 'eventlogos/'. $name .'/'. $filename3;
	  $extension3 = pathinfo($filename3, PATHINFO_EXTENSION);
	  $file3 = $_FILES['logo']['tmp_name'];


 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination) && move_uploaded_file($file2, $destination2) && move_uploaded_file($file3, $destination3)) {
            
            
            
            
            
            
            
            
			
$sql ="INSERT INTO newevents (name,sdate,edate,banner,highimg,descr,title,country,city,backcolor,color,logo,venuename,venuelocation,venueaddress,gpslocation,venuedirection,fb,insta,linkedin,twitter,nos,eventtype,year,pax,location,typeofevent,guestsregions) VALUES ('$name', '$sdate', '$edate', '$filename', '$filename2', '$desc', '$title','$country','$city','$backcolor','$forecolor', '$filename3','$venuename','$venuelocation','$venueaddress','$gpslocation','$venuedirection','$fb','$insta','$linkedin','$twitter','$nos','$eventtype','$year','$pax','$location','$typeofevent','$guestsregions')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}









		
}

 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
    <form method="POST" enctype="multipart/form-data" action="#">


<div class="form-group">


<h2 align='center'>Add Event</h2>

</div>
<div>
    
    
    <div class='row'>
    
 <div class="col-sm form-group">
    <label>Country</label>
    <select id='cntry' class="form-control" name="country">
	
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


  <div class="col-sm form-group">
    <label>City</label>
    <select id='city' name='city' class='form-control'>
        <option disabled selected>Select City</option>
    </select>
  </div>

    
    </div>
    
    
    
     
    <div class='row'>
    
<div class="col-sm form-group">
    <label>Event Name</label>
    <input type="text" class="form-control" name='name' placeholder="Event Name">
  </div>
  
  <div class="col-sm form-group">
      <label>Logo</label>
      <input type='file' name='logo' class='form-control'>
      </div>
      
      
      
  </div>
  
   <div class='row'>
    
<div class="col-sm">
      
      
   <label>Backgorund Color</label>
    <input class="form-control" type="color"  value='#dc3545' name='backcolor'>    
  </div>
  
   <div class="col-sm">
   <label>Foreground Color (Text Color)</label>
    <input class="form-control" type="color"  value='#FFFFFF' name='forecolor' >    
  </div>
  </div>
  
  <div class='row'>
       <div class="col-sm form-group">
    <label>Starting Date</label>
	
   <input required class='form-control' name='sdate' type='date'>
  </div>
  
   <div class="col-sm form-group">
    <label>Ending Date</label>
	
   <input required class='form-control' name='edate' type='date'>
  </div>
  </div>
  
  
  <div class='row'>
       <div class="form-group">
    <label>Event Short Description</label>
    <textarea type="text" cols='30' rows='5' class="form-control" name='desc' placeholder="Short Description"></textarea>
  </div>
  </div>
  
  <div class='row'>
       <div class="form-group">
    <label>Highlight Title</label>
    <input type="text" class="form-control" name='title' placeholder="Title">
  </div>
  </div>
  
  
  
   <div class='row'>
       <div class="col-sm form-group">
           <label>Venue Name</label>
           <input type="text" class="form-control" name='venuename' placeholder="Venue Name">
           </div>
           <div class="col-sm form-group">
           <label>Venue Location</label>
           <input type="text" class="form-control" name='venuelocation' placeholder="Venue Name">
           </div>
           </div>
  
   <div class='row'>
       <div class="col-sm form-group">
           <label>Venue Address</label>
           <input type="text" class="form-control" name='venueaddress' placeholder="Venue Address">
           </div>
           <div class="col-sm form-group">
           <label>GPS Location</label>
           <input type="text" class="form-control" name='gpslocation' placeholder="GPS Location">
           </div>
           </div>
  
  
  
    
  <div class='row'>
       <div class="form-group">
    <label>Venue Directions</label>
    <textarea type="text" cols='30' rows='5' class="form-control" name='venuedirection' placeholder="Venue Directions"></textarea>
  </div>
  </div>
  
  
  
  
  <div class='row'>
  
  <div class="col-sm form-group">
    <label>Banner</label>
    <input required accept="image/*" name="myfile" type="file" id="files" class="form-control">
  </div>
  
   <div class="col-sm form-group">
    <label>Hightlight Image</label>
    <input required accept="image/*" name="myfile2" type="file" id="files2" class="form-control">
  </div>
  
 </div>
  
  <div class='row'>
  <label style='font-weight:bold;' align='center'>Add Social Media Buttons</label>
  <div class="col-sm form-group">
    <label>Facebook</label>
    <input type="text" class="form-control" name='fb' placeholder="https://www.facebook.com/Pcoconnect/">
  </div>
  
   <div class="col-sm form-group">
     <label>Instagram</label>
    <input type="text" class="form-control" name='insta' placeholder="https://www.instagram.com/pcoconnect/?hl=en">
  </div>
    <div class="col-sm form-group">
     <label>Twitter</label>
    <input type="text" class="form-control" name='twitter' placeholder="https://twitter.com/pcoconnect">
  </div>
    <div class="col-sm form-group">
     <label>Linkedin</label>
    <input type="text" class="form-control" name='linkedin' placeholder="https://www.linkedin.com/company/pcoconnect">
  </div>
  
 </div>
  
  
  
  <div class='row'>
      <div class='col-sm'>
          <label>Expected Visitor NOS</label>
<input type="text" class="form-control" name='nos' placeholder="Expected Visitors NOS">
  
      </div>
      
        <div class='col-sm'>
          <label>This Event is</label>
<select id='eventtype' name='eventtype' class='form-select'>
    <option>Annual</option>
    <option>One Time</option>
    <option>Quarterly</option>
    <option>First Time</option>
    <option value='Past Years'>Past Years</option>
</select>
  
      </div>
  </div>
  
  
  
  <div id='pastyears' style='display:none;' class='container'>
  <div class='row'>
      
      
      <table>
          <thead>
          <tr>
          <th>Year</th>
           <th>Pax Attended</th>
            <th>Location</th>
            </tr>
            </thead>
            
            <tbody id='popalme'>
        
            </tbody>
            
            
            
            
      </table>
      <label id='addmore' class='btn btn-danger'>+</label>
      
  </div></div>
  
  
  
  <div class='row'>
      <div class='col-sm'>
          <label>Type of Event</label>
<input type="text" class="form-control" list='types' name='typeofevent' placeholder="Type of Event">
<datalist style='display:none;' class='form-select' id='types'>
    <option>Family</option>
     <option>Conference</option>
      <option>Congress</option>
       <option>Festival</option>
        <option>Concert</option>
         <option>Wedding</option>
          <option>Fashion Show</option>
           <option>Car Clinic</option>
           <option>Car Launch</option>
</datalist>
  
      </div>
      </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <div class='row'>
      <div class='col-sm'>
          <label>Main Guest Arrivals Expected From</label>
<input type="text" class="form-control" list='rgi' name='guestsregions' placeholder="Main Guests Expected From">
<datalist style='display:none;' class='form-select' id='rgi'>
    <option>Asia</option>
     <option>Africa</option>
      <option>Europe</option>
       <option>CIS</option>
        <option>GCC</option>
         <option>ME</option>
          <option>Global</option>
           <option>US</option>
          
</datalist>
  
      </div>
      </div>
  
 <!-- <div class="form-group">
    <label>Region</label>
	
    <select class="form-control" name='region'>
	<option>CIS</option>
	<option>Asia</option>
	<option>Western Europe East</option>
	<option>GCC</option>
	<option>Rest of World</option>
	</select>
  </div>
  -->
  
 
   
  <br/>
  <br/>
  <br/>
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>

</main>








 
	  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
   $("#eventtype").on('change', function() {
     
     var et=document.getElementById('eventtype').value;
     
       if(et=='Past Years')
       {
           
           
           var popalme=document.getElementById('popalme');
           
           var tr= document.createElement('tr');
           var td1=document.createElement('td');
           var td2=document.createElement('td');
           var td3=document.createElement('td');
           
           var iy=document.createElement('INPUT');
           var ip=document.createElement('INPUT');
           var il=document.createElement('INPUT');
           
           iy.classList.add('form-control');
           iy.setAttribute('type','text');
            iy.setAttribute('name','year[]');
           ip.classList.add('form-control');
           ip.setAttribute('type','text');
            ip.setAttribute('name','pax[]');
           il.classList.add('form-control');
           il.setAttribute('type','text');
           il.setAttribute('name','location[]');
           
           
           td1.appendChild(iy);
           td2.appendChild(ip);
           td3.appendChild(il);
           
           tr.appendChild(td1);
           tr.appendChild(td2);
           tr.appendChild(td3);
           popalme.appendChild(tr);
           
           
           
           document.getElementById('pastyears').style.display='block';
       }
       
       
       else{
           document.getElementById('pastyears').style.display='none';
            var popalme=document.getElementById('popalme');
            popalme.innerHTML='';
       }
       
       
   });
   
   
   
   
   
    $("#addmore").on('click', function() {
             
           var popalme=document.getElementById('popalme');
           
           var tr= document.createElement('tr');
           var td1=document.createElement('td');
           var td2=document.createElement('td');
           var td3=document.createElement('td');
           
           var iy=document.createElement('INPUT');
           var ip=document.createElement('INPUT');
           var il=document.createElement('INPUT');
           
           iy.classList.add('form-control');
           iy.setAttribute('type','text');
            iy.setAttribute('name','year[]');
           ip.classList.add('form-control');
           ip.setAttribute('type','text');
            ip.setAttribute('name','pax[]');
           il.classList.add('form-control');
           il.setAttribute('type','text');
           il.setAttribute('name','location[]');
           
           
           td1.appendChild(iy);
           td2.appendChild(ip);
           td3.appendChild(il);
           
           tr.appendChild(td1);
           tr.appendChild(td2);
           tr.appendChild(td3);
           popalme.appendChild(tr);
           
           
    });
   
       </script>

<script>
   $("#cntry").on('change', function() {

       
       var country= $("#cntry").val();
       
      
        
 $.ajax({
              type:'POST',
              url:'getcitiesforregister.php',
              data:{'country':country},
             
              success:function(result){
                 
                  $("#city").html(result);
              }
                
              });
   });
</script>







<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

