<?php
require_once('db_connection.php');


include('header.php');

$hotel=$_SESSION['hotel'];		 
$sqll ="SELECT * FROM venuedatabase WHERE name='$hotel'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {


echo "<script>location.replace('dashboard.php');</script>";
               
}












if (isset($_POST['submit'])) {
    
    
    
    
    
    
       $acceptedcardslist = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM paymentcards WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO paymentcards (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  //echo "Category created successfully";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

$parkingcharges=mysqli_real_escape_string($conn, $_POST['parkingcharges']);	



$address=mysqli_real_escape_string($conn, $_POST['address']);	
	
$country=mysqli_real_escape_string($conn, $_POST['country']);	

$city=mysqli_real_escape_string($conn, $_POST['city']);	

$hotel=mysqli_real_escape_string($conn, $_POST['hotel']);	

$gps=mysqli_real_escape_string($conn, $_POST['gps']);	


$telephone=mysqli_real_escape_string($conn, $_POST['telephone']);	

$area=mysqli_real_escape_string($conn, $_POST['area']);	

$description=mysqli_real_escape_string($conn, $_POST['description']);	









$cards=mysqli_real_escape_string($conn, $_POST['cards']);

$highlights=mysqli_real_escape_string($conn, $_POST['highlights']);
$parking=mysqli_real_escape_string($conn, $_POST['parking']);
$atm=mysqli_real_escape_string($conn, $_POST['atm']);

if($parking=='Yes'){
$chargednotcharged=mysqli_real_escape_string($conn, $_POST['chargednotcharged']);
}
else{
   $chargednotcharged=''; 
}











mkdir("../Venue Location Images/".$hotel, 0755, true);	

 $uploadsDir = "../Venue Location Images/".$hotel."/";
// $allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['myfile']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['myfile']['name'][$id];
                $tempLocation    = $_FILES['myfile']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(true){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                      $sqlVal = "('".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO venuedatabaseimages (name, country,city,image) VALUES ('$hotel', '$country', '$city','$fileName')");
                    
                    
                    if($insert) {
                        
                       
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                       
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
		

                     
$sql ="INSERT INTO venuedatabase (name,country,city,gps,telephone,area,description,address,cards,highlights,parking,atm,chargednotcharged,acceptedcardslist,parkingcharges) VALUES ('$hotel', '$country', '$city', '$gps', '$telephone', '$area', '$description', '$address','$cards','$highlights','$parking','$atm','$chargednotcharged','$acceptedcardslist','$parkingcharges')";

 $result = $conn->query($sql);


if ($result === TRUE) {
 
 $_SESSION['alertme']=2;
 echo "<script>location.replace('managegeneralfacilities.php');</script>"; 


 //echo "<script>location.replace('dashboard.php');</script>";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}   
       















}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
<form action="#" method="post" enctype="multipart/form-data">


<div class="form-group">


<h2 style='float:left; margin-top:-100px;' align='center'>Location Setup For Venue</h2>

</div>
<div>
 <div class="container">
<div class="form-group">
    <label>Location Name</label>
    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Hotel">
  </div>
 </div> 
 
  <div class="container">
      <div class='row'>
    <div class="col-sm">
     <div class="form-group">
    <label>Country</label>
    <input type="text" readonly id='country' class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
  </div>
    </div>
    
    <div class="col-sm">
       
  <div class="form-group">
    <label>City</label>
    <input type="text" readonly id='city' class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
  </div>
    </div>
    </div>
    </div>
    


  
  
  
  
  
  <div class="container">
      <div class='row'>
    <div class="col-sm">
  
  
    <div class="form-group">
    <label>Location GPS</label>
    <button id='mez' onclick="getLocation()">Get Your Location</button>
<textarea id='demo'  class="form-control" readonly required name="gps" rows="1" placeholder="GPS"></textarea>

  </div>
 
 </div>
  <div class="col-sm">
   <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" name='address' placeholder="Address">
  </div>
  </div>
   
   <div class="col-sm">
  <div class="form-group">
    <label>Telephone</label>
    <input type="number" class="form-control" name='telephone' placeholder="00971-xxxxxxxx">
  </div>
  </div></div></div>
  
  
  
  
  
  
  
  <div class="container">
      <div class='row'>
    <div class="col-sm">
  
  
   <div class="form-group">
    <label>Area</label>
    <select id='area' class="form-control" name='area'>
        
       
        
        </select>
  </div>
  
  </div>
  
  
  
  </div>
  </div></div>
  
        
        
        
  
  
   <div class="container">
       
        <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" required name="description" cols='6' placeholder="Description (Max 200 words)"></textarea>
       
       
       
       
       
       
            <div class='row'>


  <div class="col-sm">
   <div class="form-group">
    <label>Upload Location Images (Multiple/ Single)</label><br/>
     
     <input class='form-control' required accept="image/*" name="myfile[]" type="file" id="files" multiple='true' />
<small>Max 2mb (1000px x 1000px)</small>
</div>

</div>
</div></div>

</div>

  
   
  
   <div class="container">
      <div class='row'>
    
    <div class="col-sm">
  
   <div class="form-group">
    <label>Cards Accepted</label>
    <select class="form-control" id='cards' name='cards'>
        <option>No</option>
        <option>Yes</option>
        
       
        </select>
  </div>
  </div>
  
  </div>
  </div>
  
  
  
   <div style='display:none;' id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
       <label>Cards</label><br/>
            <label for='all'>Select All</label>
       <input id='all' name='all' type='checkbox'><br/>
         

       <?php
       $sqlv ="SELECT * FROM paymentcards";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='Add More Cards'>

       </div> 
  
  </div>
  </div>
  </div>
  
<script>
    document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});

function addcardnew(){
   var parent=document.getElementById("addnc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="container">
      <div class='row'>
      <div class="col-sm">
  
   <div class="form-group">
    <label>Property Highlights</label>
   
  <textarea class="form-control" required name="highlights" cols='3' placeholder="Highlights (Unique Selling Point) (Max 50 words)"></textarea>
  </div>
  </div>
  
  
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  







<script>

 $("#cards").change(function(event)
  { 
       const crd = document.getElementById('cards').value;
      
      if(crd=='Yes'){
       const elem = document.getElementById('cardslist');
  elem.style.display = 'block';
      }
      else if(crd=='No'){
        const elem = document.getElementById('cardslist');
  elem.style.display = 'none';   
      }
      
  });














    
 $("#all").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });
  
    
</script>





<script>


var nam=1;

</script>

   <div class="container">
      <div class='row'>
    <div class="col-sm">
  
   <div class="form-group">
    <label>Parking</label>
    <select class="form-control" id='parking' name='parking'>
         <option disabled selected>Select</option>
        <option>Yes</option>
        <option>No</option>
       
        </select>
  </div>
  </div>
  
  <div id='parkingg'>
      
      
      
      
  </div>

<div style='display:none;' class='col-sm' id='parkingdes'>
      
      <label>Parking Rates</label>
      <textarea class='form-control' name='parkingcharges' placeholder='Parking Rates'></textarea>
      
  </div>
  
  
  </div>
  </div>
  




 <div class="container">
      <div class='row'>

  <div class="col-sm">
  
   <div class="form-group">
    <label>ATM Distance (in KM)</label>
       <input type='text' placeholder='ATM Distance' class="form-control" id='atm' name='atm'>
  </div>
  </div>
  
  
 <!--   <div class="col-sm">
  
   <div class="form-group">
    <label>Meetings & Banquet Planner</label>
         
     <input class='form-control' required accept="application/pdf" name="planner" type="file" id="planner" />
<small>Must be in PDF format</small>
  </div>
  </div>
  -->
  
  
  
  
  
  
  
  </div>
  </div>
  















   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
  

</form>

<br/><br/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>


setInterval(function () {
    
  
$("#cnc").change(function(event)
  {  
var apa=document.getElementById("cnc").value;
if(apa=='Charged'){

  document.getElementById("parkingdes").style.display = "block";
}
else{
      
  document.getElementById("parkingdes").style.display = "none";
}


  }); 
    
}, 1000);





var nd=1;



var n=1;























var x = document.getElementById("demo");









$("#parking").change(function(event)
  {
var parking = document.getElementById("parking").value;
if(parking=='Yes'){
   
var parkingg = document.getElementById("parkingg"); 
  parkingg.classList.add("col-sm");
  

	
var ymm = document.createElement("div");

ymm.setAttribute("class", "form-group");

var yll = document.createElement("label");

yll.innerHTML = "Charged / Free";


ymm.appendChild(yll);






var yii = document.createElement("SELECT");

yii.setAttribute("class", "form-control");
yii.setAttribute("Name", "chargednotcharged");
yii.setAttribute("id", "cnc");


var yii13 = document.createElement("option");
var yii1 = document.createElement("option");
var yii2 = document.createElement("option");

yii13.setAttribute("label", "Select");
yii13.setAttribute("text", "");
yii13.setAttribute("value", "");

yii1.setAttribute("label", "Charged");
yii1.setAttribute("text", "Charged");
yii1.setAttribute("value", "Charged");


yii2.setAttribute("label", "Free");
yii2.setAttribute("text", "Free");
yii2.setAttribute("value", "Free");


yii.appendChild(yii13);

yii.appendChild(yii1);

yii.appendChild(yii2);


ymm.appendChild(yii);
















parkingg.appendChild(ymm);












  
}

else{
    
    document.getElementById("parkingdes").style.display = "none";
   
    var parkingg = document.getElementById("parkingg"); 
  parkingg.classList.remove("col-sm");
  
   parkingg.innerHTML='';
 
}


});








 $("#pool").change(function(event)
  {
var pool = document.getElementById("pool").value;

if(pool=='Yes'){

 
 var ylabel = document.getElementById("numberofpoolsdiv");

   ylabel.style.display='block';
   
   
   
   
    
}



else{
    
    var ylabel = document.getElementById("numberofpoolsdiv");
   ylabel.style.display='none';
    
     var nmbinput = document.getElementById("numberofpools");
     nmbinput.value='';
     
var poppool = document.getElementById("poppool"); 
 poppool.classList.remove("col-sm");
 poppool.innerHTML='';
var poppool2 = document.getElementById("poppool2"); 
poppool2.classList.remove("col-sm");
  poppool2.innerHTML='';
    
}











});





















 $("#type").change(function(event)
  {
var type = document.getElementById("type").value;



if(type=='Beach'){
   
  var pop = document.getElementById("popme"); 
  
  pop.classList.add("col-sm");
   
    
	
var ym = document.createElement("div");

ym.setAttribute("class", "form-group");

var yl = document.createElement("label");

yl.innerHTML = "Beach Type";



var yi = document.createElement("INPUT");

yi.setAttribute("class", "form-control");
yi.setAttribute("Name", "beach");
yi.setAttribute("type", "text");
yi.setAttribute("list", "beaches");
yi.setAttribute("id", "beach");






var y = document.createElement("datalist");

y.setAttribute("class", "form-control");
y.setAttribute("Name", "beaches");
y.setAttribute("type", "text");
y.style.display='none';
y.setAttribute("id", "beaches");

var y2 = document.createElement("option");
y2.setAttribute("text", "Private");
y2.setAttribute("value", "Private");
y2.setAttribute("label", "Private");

var y22 = document.createElement("option");
y22.setAttribute("text", "First Line");
y22.setAttribute("value", "First Line");
y22.setAttribute("label", "First Line");

var y222 = document.createElement("option");
y222.setAttribute("text", "Second Line");
y222.setAttribute("value", "Second Line");
y222.setAttribute("label", "Second Line");

y.appendChild(y2);
y.appendChild(y22);
y.appendChild(y222);
ym.appendChild(yl);
ym.appendChild(yi);
ym.appendChild(y);


pop.appendChild(ym);
 
   
}




else{
    
    
    
  var pop = document.getElementById("popme"); 
  
  pop.classList.remove("col-sm");
    pop.innerHTML='';
    
    
    
    
    
    
}

});



 $("#numberofpools").keyup(function(event)
  {
     var nmbpool=document.getElementById("numberofpools").value;
    
var poppool = document.getElementById("poppool"); 
  
     poppool.innerHTML='';
     
     ncounter=0;
   for (let i = 0; i < nmbpool; i++) {  
     
     
     
 
 
  
 var ycnt = document.createElement("div");
 var yrow = document.createElement("div");
 ycnt.setAttribute("class", "container"); 
 yrow.setAttribute("class", "row");
 
 
 
 
  	
var ymmv = document.createElement("div");

ymmv.setAttribute("class", "col-sm form-group");

var yllv = document.createElement("label");

yllv.innerHTML = "Pool Name";


ymmv.appendChild(yllv);



var yiiv = document.createElement("INPUT");

yiiv.setAttribute("class", "form-control");
yiiv.setAttribute("Name", "poolname[]");
yiiv.setAttribute("type", "text");
yiiv.setAttribute("id", "poolname");
yiiv.setAttribute("placeholder", "Pool Name");
ymmv.appendChild(yiiv);


 
 
 
 
 
 
 
 
 
 
 
 yrow.appendChild(ymmv);
 
 
 
 
 
 
 
 
  	
var ymm = document.createElement("div");

ymm.setAttribute("class", "col-sm form-group");

var yll = document.createElement("label");

yll.innerHTML = "Pool Location";


ymm.appendChild(yll);



var yii = document.createElement("INPUT");

yii.setAttribute("class", "form-control");
yii.setAttribute("Name", "poollocation[]");
yii.setAttribute("type", "text");
yii.setAttribute("id", "poollocation");
yii.setAttribute("required", "true");
yii.setAttribute("placeholder", "Pool Location");
ymm.appendChild(yii);







yrow.appendChild(ymm);

var ymm2maj = document.createElement("div");

ymm2maj.setAttribute("class", "col-sm");

  	
var ymm2 = document.createElement("div");

ymm2.setAttribute("class", "form-group");

var yll2 = document.createElement("label");

yll2.innerHTML = "Pool Type";


ymm2.appendChild(yll2);




var ys = document.createElement("SELECT");

ys.setAttribute("class", "form-control");
ys.setAttribute("Name", "inout[]");
ys.setAttribute("id", "inout");

var y2s = document.createElement("option");
y2s.setAttribute("text", "Indoor");
y2s.setAttribute("value", "Indoor");
y2s.setAttribute("label", "Indoor");

var y22s = document.createElement("option");
y22s.setAttribute("text", "Outdoor");
y22s.setAttribute("value", "Outdoor");
y22s.setAttribute("label", "Outdoor");

ys.appendChild(y2s);
ys.appendChild(y22s);



ymm2.appendChild(ys);











var coldiv = document.createElement("div");

coldiv.setAttribute("class", "col-sm");

  	
var formdiv = document.createElement("div");

formdiv.setAttribute("class", "form-group");

var formlabel = document.createElement("label");

formlabel.innerHTML = "Pool Images";


formdiv.appendChild(formlabel);




var poolimages = document.createElement("INPUT");

poolimages.setAttribute("class", "form-control");
poolimages.setAttribute("Name", "poolimages"+ncounter+"[]");
poolimages.setAttribute("type", "file");
poolimages.setAttribute("multiple", "true");
poolimages.setAttribute("accept", "image/*");


formdiv.appendChild(poolimages);
coldiv.appendChild(formdiv);














ymm2maj.appendChild(ymm2);
yrow.appendChild(ymm2maj);
yrow.appendChild(coldiv);
ycnt.appendChild(yrow); 
poppool.appendChild(ycnt); 

     
     
  
  ncounter=ncounter+1;   
     
     
   }
     
     
     
     
     
     
     
     
     
     
     
      
  });










setInterval(function () {


 $("#beach").change(function(event)
  {
      
    
      
  });
  
}, 1000);













 $("#mez").click(function(event)
  {
    event.preventDefault(); // cancel default behavior

    //... rest of add logic
  });








function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = position.coords.latitude + 
  "," + position.coords.longitude;
}
</script>


<script>


</script>










<script>
 var country=document.getElementById('country').value;
 var city=document.getElementById('city').value;
              
  
  
   $.ajax({
      
			  type:'POST',
			  
              url:'getareasnew.php',
		data:{'country':country,'city':city},
              success:function(result){
                 
				var to=document.getElementById('area');
				to.innerHTML=result;
			
                 
              }
			  
          });
          </script>





</main>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

