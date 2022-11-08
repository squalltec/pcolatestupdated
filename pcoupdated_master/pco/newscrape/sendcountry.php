<select name='cntry' id='cntry'>
<option disabled selected>Select Country</option>
<option>United Arab Emirates</option>
<option>Pakistan</option>
</select>

<select name='city' id='city'>
<option disabled selected>Select Country</option>
<option>Dubai</option>
<option>Ajman</option>
<option>Sharjah</option>

<option>Lahore</option>

<option>Islamabad</option>

<option>Peshawar</option>

<option>Quetta</option>
</select>

<div>
Capital City:<br/>
<div id='capital'>


</div>
</div>

<div>
Largest City:<br/>
<div id='largest'>


</div>
</div>

<div>
Official Language:<br/>
<div id='officiallanguage'>


</div>
</div>

<div>
Common Language:<br/>
<div id='commonlanguage'>


</div>
</div>

<div>
Currency:<br/>
<div id='currency'>


</div>
</div>

<div>
Country Code:<br/>
<div id='callercode'>


</div>
</div>


<div>
Demonym:<br/>
<div id='demonym'>


</div>
</div>


<div>
Driving:<br/>
<div id='drivingside'>


</div>
</div>

<div>
ISO Code:<br/>
<div id='iso'>


</div>
</div>

<div>
About Country:<br/>
<div id='about'>


</div>
</div>

<div>
Cities:<br/>
<div id='cities'>


</div>
</div>

<div>
Airports:<br/>
<div id='airports'>


</div>
</div>

<div>
Attractions:<br/>
<div id='attractions'>


</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	  <script>
	  
	   $("#city").on('change', function() {
		
		var countryname=document.getElementById("cntry").value;
		var cityname=document.getElementById("city").value;
		
		


 $.ajax({
              type:'POST',
              url:'getdata.php',
              data:{'countryname':countryname,'cityname':cityname},
             

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
			  
			  var cities=document.getElementById("cities");
			  
			  var airports=document.getElementById("airports");
			  
			  var attractions=document.getElementById("attractions");
			  
			  
			  
			  capital.innerHTML='';
			  largest.innerHTML='';
			  officiallanguage.innerHTML='';
			  commonlanguage.innerHTML='';
			  currency.innerHTML='';
			   callercode.innerHTML='';
			    demonym.innerHTML='';
				drivingside.innerHTML='';
				iso.innerHTML='';
				about.innerHTML='';
				cities.innerHTML='';
				airports.innerHTML='';
				attractions.innerHTML='';
			
			  
				capital.innerHTML=capital.innerHTML+data.capital;
				
				drivingside.innerHTML=drivingside.innerHTML+data.drivingside;
				
				
				largest.innerHTML=largest.innerHTML+data.largest;
          
              
               officiallanguage.innerHTML=officiallanguage.innerHTML+data.officiallanguage;
				
			commonlanguage.innerHTML=commonlanguage.innerHTML+data.commonlanguage;
			
			currency.innerHTML=currency.innerHTML+data.currency;
			
			callercode.innerHTML=callercode.innerHTML+data.callercode;
				
          demonym.innerHTML=demonym.innerHTML+data.demonym;
              
		iso.innerHTML=iso.innerHTML+data.iso;
		
		about.innerHTML=about.innerHTML+data.about;
		
		cities.innerHTML=cities.innerHTML+data.cities;
		
		airports.innerHTML=airports.innerHTML+data.airports;
		
		attractions.innerHTML=attractions.innerHTML+data.attractions;
	            
                      
                  }
                 
                 
          }); 


		
		  
		  
		
	});
	  </script>