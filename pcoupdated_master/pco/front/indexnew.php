
<?php
session_start();
require_once('db_connection.php');





if (isset($_POST['submit'])) {
	
	$_SESSION['country']=$_POST['country'];
	$_SESSION['city']=$_POST['city'];
	$_SESSION['event']=$_POST['event'];
$_SESSION['hotel']=$_POST['hotel'];
$_SESSION['sdate']=$_POST['sdate'];
$_SESSION['edate']=$_POST['edate'];



echo "<script>location.replace('selectedited.php');</script>";



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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Transfers Booking | Professional Congress Organizer - PCO Connect</title>
<meta name="description" content="Professional Congress Organizer, world conference on international telecommunication, world telecommunication standardization assembly, Internatioal Telecommunication union, Hotel Booking, Tours Booking, Visa Booking, Ground Handling Services in (Dubai, Abu dhabi, Sharjah, Ajman ) United Arab Emirates, Pearl of Arabia Travel and Tourism, Pearl Software Solution, Groups Booking, Incentives, ours Services: Deset Safari, Dhow Cruise, Camel Riding, Lama Services, Flight Booking, Free Transfer, Event Booking in Dubai, Seat in Coach Transfer, Hotel Booking, WTSA, WCIT, ITU, wtsa, wcit, itu, HOTEL, BOOKING, GROUPS, PCO, EVENT, EXHIBITION, DUBAI HOTEL BOOKING, TRANSFER, EXCURSION, DUBAI VISA, VISIT">
<meta name="viewport" content="width=device-width">
<?php include_once("includes/head2.php"); ?>
<link rel="stylesheet" href="css/datepicker.css">
<link rel="stylesheet" href="css/carousel_scrolled.css">
</head>
<body style='background-color:white;'>
    
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
   
   
   
<style>

.navi{
color:grey;
}
.navi:hover{
color:#dc143c !important;
}

.active{
color:#dc143c !important;
}

.box{

  width:91%;
  margin:0 auto;
  margin-top:-6px;
   
}
</style>


<nav style='margin-left:4%; margin-right:4%; background-color:white !important;' class="navbar navbar-light bg-light justify-content-between">
  <img style='float:left;' src='images/logo.png'>
	
	
	<a style='margin-top:20px;' class='navitem' href='#'><h6 class='navi active'>HOME</h6></a> |	<a style='margin-top:20px;'  class='navitem' href='#'><h6 class='navi'>ABOUT US</h6></a> |	<a style='margin-top:20px;' class='navitem' href='#'><h6 class='navi'>SERVICES</h6></a> | <a style='margin-top:20px;' class='navitem' href='#'><h6 class='navi'>CONTACT US</h6></a>

 <img style='margin-top:10px; float:right;' src='images/contact.png'>
</nav>


<div class='banner'>

<h1 align='center'><img style=' z-index:-1; height:60%; width:90%;' src='banner.jpg'></h1>


</div>


















<div class='box' style='margin-top:	-10px; background-color: #f6f6f6;
background-image: linear-gradient(315deg, #f6f6f6 0%, #e9e9e9 74%);'>
    
    
    
    <form method='POST' action="#">
    
    
    
    
    
 <style>
     .column {
          margin: auto;
         padding-left:50px;
          padding-right:50px;
  float: left;
  width: auto;
}

select{
    width:141px;
    height:30px;
    
}


/* Clear floats after the columns */
.row{
    padding:5px;
    margin:0, auto;
}
.row:after {

  content: "";
  display: table;
  clear: both;
}
    
 </style>   
    
    <style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #B23232;
}

.button3:hover {
  background-color: #B23232;
  color: white;
}

</style>
    
    
    <div style='padding-top:20px;  margin: auto;
  width: 50%;'>
        
          
        <button class="button button3">Hotels</button>
         <button class="button button3">Transfers</button>
          <button class="button button3">Visas</button>
           <button class="button button3">Tours</button>
           <button class="button button3">Flights</button>
        
        
        
      
        
        
        
    
    </div>
    
    
    
    <div style='padding-top:20px;' class='row'>
        
        
        <div class='column'>
             <label for="country">Country</label><br/>
	        	      <select name="country" id="country">
                            
							
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
        
        
        
        
        <div class='column'>
            
            
            
                   
	        	                <label for="city">City</label><br/>
	        	     <select name="city" id="city">
                           <option>Select City</option>
						    
						   
						   
						   
                          </select>
                          
                              </div>
        
        
        
        
        <div class='column'>
	        	   <label for="event">Event</label></br>
	        	      <select id="events" name="event">
                            <option>Select Event</option>
                        </select>
	        	   
	        	            
	        	                </div>
        
        
        
    </div>
    
    
    <div style='padding-bottom:30px;' class='row'>
        
        <div class='column'>
            
              <label for="hotel">Hotel</label><br/>
	        	            
	        	             <select name='hotel' id='hotels'>
					  <option>Select Hotel</option>
					  
					  
					  
					  </select>
				
        </div>
        
        
            <div class='column'>
            <label for="checkin">Check In</label><br/>
				
					 <input name='sdate' type="date" id='sdate'>
                      
	        	            
	        	   
            
        </div>
        
            <div class='column'>
                     
	        	           <label for="checkout">Check Out</label><br/>
				
				
				<input name='edate' type="date" id='edate'>
                      
        </div>
        
        
        
        
        
    </div>
    
    
    
    <p align='center'><input type="submit" value="Proceed to Results" class='button button3' name='submit' class="btn"></p> 
    
            </form>

</div>

   
   
   <div class='row'>
       <div class='column'>
           <p style='font-size:1.3em; color:#B23232;'>UPCOMING EVENTS</p>
           <img style='width:200px;' src='e1.jpg'><br/><br/>
            <p style='width:200px; font-size:1em;'><b>3rd GCC Conference & Dinner Event</b></p>
            <p style='width:200px; color:grey; font-size:0.8em;'>Dec 1, 2022 to December 31, 2022<br/>Abu Dhabi</p>
      <br/> </div>
       <div class='column'>
           <p style='font-size:1.3em; color:#B23232;'>REGISTRATION</p>
           <img style='width:200px;' src='e2.jpg'><br/><br/>
              <p style='width:200px; color:grey; font-size:0.8em;'>- No Booking Fees<br/>- Flexible Cancellation Policies<br/>- 24 hour Customer Service<br/>- Like Booking Hotel Direct<br/>- Privacy<br/>- Security<br/></p>
       </div>
       <div class='column'>
           <p style='font-size:1.3em; color:#B23232;'>GALA DINNER</p>
           <img style='width:200px;' src='e3.jpg'><br/><br/>
           <p style='width:200px; color:grey; font-size:0.8em;'>Gala Dinner is a private room reserved for a group to pre order off a set menu and seated in banquet or cabaret style sometimes with dance floor and room for a stage and entertainments.</p>
       </div>
       <div class='column'>
           <p style='font-size:1.3em; color:#B23232;'>Previous DINNER</p>
           <img style='width:200px;' src='e4.jpg'><br/><br/>
             <p style='width:200px; font-size:1em;'><b>3rd GCC Conference & Dinner Event</b></p>
           <p style='width:200px; color:grey; font-size:0.8em;'>Dec 1, 2022 to December 31, 2022<br/>Abu Dhabi</p><br/>
       </div>
     
       
   </div>
   
   <style>
       hr.new4 {
  border: 1px solid #B23232;
}

   </style>
   
   <hr class='new4'>
   
   
   
   
   
   
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
// AJAX call for autocomplete 
$(document).ready(function(){
	
	
$("#country").on('change', function() {
	
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





























	
$("#sdate").on('change', function() {
	
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


  
  
  
  
  
  
  
  
  
  
  
  
  
  

<script type='text/javascript' src='js/jquery-ui-1.10.3.custom.js'></script> 
<script type='text/javascript' src='js/jquery.carouFredSel-6.2.1-packed.js'></script> 
<script src="js/plugins.js"></script> 
<script type="text/javascript">
	$('#carousel').carouFredSel({
		auto: true,
		prev: '#prev2',
		next: '#next2',
		pagination: "#pager2",
		mousewheel: true,
		swipe: {
			onMouse: true,
			onTouch: true
		}
	});
</script>

</body>
</html>
