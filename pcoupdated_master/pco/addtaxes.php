<?php
require_once('db_connection.php');


include('header.php');



if (isset($_POST['submit'])) {
	
$name=$_POST['name'];
$choice=$_POST['choice'];
$country=$_POST['cntry'];
$star=$_POST['star'];
$city=$_POST['city'];
$percentage=$_POST['percentage'];

$choicearray=array();

$nameearray=array();
$percentageearray=array();

for ($i=0; $i<count($name); $i++)
{
    
    if($name[$i]!=''){
        array_push($nameearray, $name[$i]);
        array_push($choicearray, $choice[$i]);
        
        array_push($percentageearray, $percentage[$i]);
    }
    
    
}







			
$sqld ="DELETE FROM taxnames WHERE country='$country' && city='$city' && star='$star'";

 $resultd = $conn->query($sqld);


if ($resultd === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sqld . "<br>" . $conn->error;
}

















$namee=implode(',',$nameearray);
$percentagee=implode(',',$percentageearray);
$choicee=implode(',',$choicearray);
			
$sql ="INSERT INTO taxnames (country, city,taxname,percentage,star,choice) VALUES ('$country', '$city', '$namee', '$percentagee','$star','$choicee')";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}





		
}

 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
                   
<style>
    .delbtn{
        font-size:10px; 
        right:210px; 
        position:absolute;
    }
</style>


    <form method="POST" enctype="multipart/form-data" action="#">


<div class="form-group">


<h2 align='center'>Add Taxes</h2>

</div>
<div>
    
    
    
    
    
    
<div class='container'>
    <div class='row'>
        <div class='col-sm'>
            
<select class='form-control' name='cntry' id='cntry'>


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
<option selected value="United Arab Emirates">United Arab Emirates</option>

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
<select class='form-control' name='city' id='city'>
<option disabled selected>Select City</option>
</select>



        </div>



<div class='col-sm'>
<select class='form-control' name='star' id='star'>


<option>5 Star</option>
<option>4 Star</option>
<option>3 Star</option>
<option>2 Star</option>
<option>1 Star</option>


</select>
        </div>
        
        

    </div>
</div>



     

    
    
    
    
    
    
    <br/>
    <br/>
   
    <div style='display:none;' id='labels' class='container'>
        <div class='row'>
            <div class='col-sm'>
                <label>Tax Name</label>
            </div>
            <div class='col-sm'>
                <label>Percentage / Amount</label>
            </div>
             <div class='col-sm'>
                <label>Value</label>
            </div>
        </div>
    </div>
  <nonsense id='populateme'>
      
  </nonsense>
  
  
        
 <h1 id='abtn' style='display:none;' align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 

  
  
  
  
  
  
  
  
   
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>


</main>
 
 
 
 
 
 
 
 
 
<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});




var n=1;

function myFunction2() {
    
 var populateme = document.getElementById("populateme");    
 
    
  var div1=   document.createElement("div"); 
 
 
  var div2=   document.createElement("div"); 
  var div3=   document.createElement("div"); 
  
  var div4=   document.createElement("div"); 
  var div5=   document.createElement("div"); 
   var div6=   document.createElement("div"); 
  
  
var butn=   document.createElement("BUTTON");   
  
butn.setAttribute('class','delbtn');
butn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
butn.innerHTML='X';



div1.setAttribute('class','container');
div2.setAttribute('class','row');

div3.setAttribute('class','col-sm');

div4.setAttribute('class','form-group');


div5.setAttribute('class','col-sm');

div6.setAttribute('class','form-group');









 

var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "name[]");
yc1.setAttribute("type", "text");
yc1.setAttribute("required", 'true');
yc1.setAttribute("placeholder", "Tax Name");

div4.appendChild(yc1);


var ycb = document.createElement("INPUT");

ycb.setAttribute("class", "form-control");
ycb.setAttribute("Name", "percentage[]");
ycb.setAttribute("type", "number");
ycb.setAttribute("required", 'true');
ycb.setAttribute("placeholder", "Value");

div6.appendChild(ycb);








  var div11=   document.createElement("div"); 
   var div12=   document.createElement("div"); 
  

div11.setAttribute('class','col-sm');

div12.setAttribute('class','form-group');
  
  
  

var sel = document.createElement("SELECT");

sel.setAttribute("class", "form-control");
sel.setAttribute("Name", "choice[]");

var op1 = document.createElement("option");
var op2 = document.createElement("option");

op1.innerHTML='Percentage';

op2.innerHTML='Amount';

sel.appendChild(op1);
sel.appendChild(op2);


div12.appendChild(sel);


div11.appendChild(div12);


 
 
 
 
 
div3.appendChild(div4); 
div5.appendChild(div6); 

div2.appendChild(div3);
div2.appendChild(div11);
div2.appendChild(div5);
div1.appendChild(butn);
div1.appendChild(div2);



populateme.appendChild(div1);






 n=n+1;
 
}

</script>


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
	  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





<script>
 var country= $("#cntry").val();
       
        
 $.ajax({
              type:'POST',
              url:'getcitiesforregister.php',
              data:{'country':country},
             
              success:function(result){
                 
                  $("#city").html(result);
              }
                
              });
              
              

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

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
   $("#city").on('change', function() {


var labels=document.getElementById('labels');
                 labels.style.display='block';
                 
var abtn=document.getElementById('abtn');
                 abtn.style.display='block';
                 
var po=document.getElementById('populateme');
po.innerHTML='';
        var country= $("#cntry").val();
       
       var city= $("#city").val();
       var star= $("#star").val();
        
 $.ajax({
              type:'POST',
              url:'gettaxeslist.php',
              data:{'country':country,'city':city,'star':star},
             
              success:function(result){
                 
                 
                 
                 
                 
                if(result.includes("doesnot exist")) 
                 
                 
                 {
                     
                     
                     
                     
                     
                     
                     
                     
                     
                 }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
               var objJSON = JSON.parse(result);
               
        
        const taxnames = objJSON.taxname.split(",");
        const percentage = objJSON.percentage.split(",");
        const choice = objJSON.choice.split(",");
        
       for (let i = 0; i < taxnames.length; i++) {
           
           
          
    
 var populateme = document.getElementById("populateme");    
 
    
  var div1=   document.createElement("div"); 
 
 
  var div2=   document.createElement("div"); 
  var div3=   document.createElement("div"); 
  
  var div4=   document.createElement("div"); 
  var div5=   document.createElement("div"); 
   var div6=   document.createElement("div"); 
  
  
  

  
  
  
  
  
  
var butn=   document.createElement("BUTTON");   
  
butn.setAttribute('class','delbtn');
butn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
butn.innerHTML='X';



div1.setAttribute('class','container');
div2.setAttribute('class','row');

div3.setAttribute('class','col-sm');

div4.setAttribute('class','form-group');


div5.setAttribute('class','col-sm');

div6.setAttribute('class','form-group');








  var div11=   document.createElement("div"); 
   var div12=   document.createElement("div"); 
  

div11.setAttribute('class','col-sm');

div12.setAttribute('class','form-group');
  
  
  

var sel = document.createElement("SELECT");

sel.setAttribute("class", "form-control");
sel.setAttribute("Name", "choice[]");

var op1 = document.createElement("option");
var op2 = document.createElement("option");

op1.innerHTML=choice[i];

if(choice[i]=='Percentage')
{
op2.innerHTML='Amount';
}
else{
  op2.innerHTML='Percentage';  
}


sel.appendChild(op1);
sel.appendChild(op2);


div12.appendChild(sel);


div11.appendChild(div12);










 

var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "name[]");
yc1.setAttribute("type", "text");
yc1.setAttribute("value",taxnames[i] );
yc1.setAttribute("required", 'true');
yc1.setAttribute("placeholder", "Tax Name");

div4.appendChild(yc1);


var ycb = document.createElement("INPUT");

ycb.setAttribute("class", "form-control");
ycb.setAttribute("Name", "percentage[]");

ycb.setAttribute("value", percentage[i]);
ycb.setAttribute("type", "number");
ycb.setAttribute("required", 'true');
ycb.setAttribute("placeholder", "Value");

div6.appendChild(ycb);

 
 
 
 
 
div3.appendChild(div4); 
div5.appendChild(div6); 

div2.appendChild(div3);
div2.appendChild(div11);
div2.appendChild(div5);
div1.appendChild(butn);
div1.appendChild(div2);



populateme.appendChild(div1);


           
           
           
           
           
           
           
           
           
           
       }
        
                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
              
              }
                
              });
   });

	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	  
	  
	  
	  
	  
	  
   $("#star").on('change', function() {


var labels=document.getElementById('labels');
                 labels.style.display='block';
                 
var abtn=document.getElementById('abtn');
                 abtn.style.display='block';
                 
var po=document.getElementById('populateme');
po.innerHTML='';
        var country= $("#cntry").val();
       
       var city= $("#city").val();
       var star= $("#star").val();
        
 $.ajax({
              type:'POST',
              url:'gettaxeslist.php',
              data:{'country':country,'city':city,'star':star},
             
              success:function(result){
                 
                 
                 
                 
                 
                if(result.includes("doesnot exist")) 
                 
                 
                 {
                     
                     
                     
                     
                     
                     
                     
                     
                     
                 }
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
               var objJSON = JSON.parse(result);
               
        
        const taxnames = objJSON.taxname.split(",");
        const percentage = objJSON.percentage.split(",");
        const choice = objJSON.choice.split(",");
        
       for (let i = 0; i < taxnames.length; i++) {
           
           
          
    
 var populateme = document.getElementById("populateme");    
 
    
  var div1=   document.createElement("div"); 
 
 
  var div2=   document.createElement("div"); 
  var div3=   document.createElement("div"); 
  
  var div4=   document.createElement("div"); 
  var div5=   document.createElement("div"); 
   var div6=   document.createElement("div"); 
  
  
var butn=   document.createElement("BUTTON");   
  
butn.setAttribute('class','delbtn');
butn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);');
butn.innerHTML='X';



div1.setAttribute('class','container');
div2.setAttribute('class','row');

div3.setAttribute('class','col-sm');

div4.setAttribute('class','form-group');


div5.setAttribute('class','col-sm');

div6.setAttribute('class','form-group');








  var div11=   document.createElement("div"); 
   var div12=   document.createElement("div"); 
  

div11.setAttribute('class','col-sm');

div12.setAttribute('class','form-group');
  
  
  

var sel = document.createElement("SELECT");

sel.setAttribute("class", "form-control");
sel.setAttribute("Name", "choice[]");

var op1 = document.createElement("option");
var op2 = document.createElement("option");

op1.innerHTML=choice[i];

if(choice[i]=='Percentage')
{
op2.innerHTML='Amount';
}
else{
  op2.innerHTML='Percentage';  
}

sel.appendChild(op1);
sel.appendChild(op2);


div12.appendChild(sel);


div11.appendChild(div12);




 

var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "name[]");
yc1.setAttribute("type", "text");
yc1.setAttribute("value",taxnames[i] );
yc1.setAttribute("required", 'true');
yc1.setAttribute("placeholder", "Tax Name");

div4.appendChild(yc1);


var ycb = document.createElement("INPUT");

ycb.setAttribute("class", "form-control");
ycb.setAttribute("Name", "percentage[]");

ycb.setAttribute("value", percentage[i]);
ycb.setAttribute("type", "number");
ycb.setAttribute("required", 'true');
ycb.setAttribute("placeholder", "Value");

div6.appendChild(ycb);

 
 
 
 
 
div3.appendChild(div4); 
div5.appendChild(div6); 

div2.appendChild(div3);
div2.appendChild(div11);
div2.appendChild(div5);
div1.appendChild(butn);
div1.appendChild(div2);



populateme.appendChild(div1);


           
           
           
           
           
           
           
           
           
           
       }
        
                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
              
              }
                
              });
   });

	 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 
</script>














<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

