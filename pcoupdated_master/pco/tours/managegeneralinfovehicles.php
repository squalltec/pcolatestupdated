<?php
require_once('db_connection.php');


include('header.php');


$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$hotel=$_SESSION['hotel'];	



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
    
   

$description=mysqli_real_escape_string($conn, $_POST['description']);	
$telephone=mysqli_real_escape_string($conn, $_POST['telephone']);	
$gps=mysqli_real_escape_string($conn, $_POST['gps']);	


 
 
mkdir("../Vehicles Logos/".$hotel, 0755, true);
		
		
		
		
	  $filename = $_FILES['logo']['name'];
	  $destination = '../Vehicles Logos/'.$hotel . '/' . $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['logo']['tmp_name'];


 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {




$sql ="UPDATE vehicleslogos SET image='$filename' WHERE hotel='$hotel' && country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



		}


 
 
 
 

 
 
 
 
 
 
mkdir("../Vehicles Lisences/".$hotel, 0755, true);
		
		
		
		
	  $filename = $_FILES['lisence']['name'];
	  $destination = '../Vehicles Lisences/'.$hotel . '/' . $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['lisence']['tmp_name'];


 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {




$sql ="UPDATE vehicleslisences SET lisence='$filename' WHERE hotel='$hotel' && country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



		}


 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
                        
                     
                     
                     
                     
$sql ="UPDATE vehiclesdatabase SET name='$hotel',country='$country',city='$city',gps='$gps',telephone='$telephone',description='$description',acceptedcardslist='$acceptedcardslist' WHERE name='$hotel' && country='$country' && city='$city'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 $_SESSION['alertme']=1;
 
 
// echo "<script>location.replace('managehotel.php');</script>";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}   
       


}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              <?php

$sqll ="SELECT * FROM vehiclesdatabase WHERE name='$hotel' && country='$country' && city='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	

?>


<form action="#" method="post" enctype="multipart/form-data">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Manage General Information</h2>

</div>
<div>







 <div class="form-group">
    <label>Country</label>
    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['country']; ?>' name='country' placeholder="Country">
  </div>
  
  <div class="form-group">
    <label>City</label>
    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['city']; ?>' name='city' placeholder="City">
  </div>

<div class="form-group">
    <label>Company Name</label>
    <input type="text" readonly class="form-control" value='<?php echo $_SESSION['hotel']; ?>' name='hotel' placeholder="Hotel">
  </div>
  
 
  
  
    <div class="form-group">
    <label>Location GPS</label>
    <button id='mez' onclick="getLocation()">Get Your Location</button>
<textarea id='demo'  class="form-control" readonly required name="gps" rows="1" placeholder="GPS"><?php echo $roww['gps'];?></textarea>

  </div>
  
  
  <div class="form-group">
    <label>Telephone</label>
    <input type="number" class="form-control" value='<?php echo $roww['telephone'];?>' name='telephone' placeholder="00971-xxxxxxxx">
  </div>
  
  
  
  
 
  
  
  
  
  
  
  
  
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" required name="description" rows="3" placeholder="Description"><?php echo $roww['description'];?></textarea>
  </div>
  
  
  
 
  
  
       <label>Cards</label><br/>
            <label for='all'>Select All</label>
       <input id='all' name='all' type='checkbox'><br/>
         
         
         

       <?php
        $string = $roww['acceptedcardslist']; 
$str_arr = preg_split ("/\,/", $string); 

       
       $sqlv ="SELECT * FROM paymentcards";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
      
     $nmcr=$rowv['name'];
       
        
 
if (strpos($string, $nmcr) !== false) 
  {

  ?>
   <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input checked id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
    
   
   <?php   
  }
  else{
      ?>
     <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
     
      
  <?php    
  }

?>

 



<?php

    

  }
}
?>

<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='Add More Cards'>

      
      
      
      
      
      
      
  
  
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
  
  
  
  
  
  
  
  
  
  
  
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Logo</label><br/>
    
    <?php
$sqloz ="SELECT * FROM vehicleslogos WHERE hotel='$hotel' && country='$country' && city='$city'";
		$resultoz = $conn->query($sqloz);

if ($resultoz->num_rows > 0) {
  // output data of each row
  while($rowoz = $resultoz->fetch_assoc()) {
    
	  ?>
   <img style='width:100px;' src='../Vehicles Logos/<?php echo $hotel;?>/<?php echo $rowoz['image']; ?>'>
   
   
   <?php
  }
}
   ?>
  </div>
  
  
  
     <div class="form-group">
    <label>Change Logo</label>
     <input class='form-control' accept="image/png" name="logo" type="file"/>
</div>



  
  
  
  
  
  
  
  
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Lisence</label><br/>
    
    <?php
$sqlozx ="SELECT * FROM vehicleslisences WHERE hotel='$hotel' && country='$country' && city='$city'";
		$resultozx = $conn->query($sqlozx);

if ($resultozx->num_rows > 0) {
  // output data of each row
  while($rowozx = $resultozx->fetch_assoc()) {
    
	  ?>
   <a download href='../Vehicles Lisences/<?php echo $hotel;?>/<?php echo $rowozx['lisence']; ?>'>Download</a>
   
   
   <?php
  }
}
   ?>
  </div>
  
  
  
     <div class="form-group">
    <label>Change Lisence</label>
     <input class='form-control' accept="application/pdf" name="lisence" type="file"/>
</div>


  
  
  
  
  <br/>
  
  





   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Update</button>
 <br/><br/>
  </div>
  
  </div>
</form>

<?php
}
}
?>





<script>
    
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












<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


      $.ajax({
              
			  type:'POST',
			  
              url:'getalertme.php',
              success:function(result){
                  
				
			    if(result.includes('exists')){
			     Swal.fire('Updated Successfully')
			    }
               
               
                 
              }
			  
          }); 
		  






$("#parking").change(function(event)
  {
      var park = document.getElementById("parking").value;  
     var delme = document.getElementById("spare");  
     delme.innerHTML='';
     
     var getpark = document.getElementById("getpark").value;  
     
     var popa = document.getElementById("popmeplease4");  
     
     
   if(park=='Yes'){
    
    
    
    
    
    
        const label2 = document.createElement("label");
      label2.innerHTML='Charged / Free';
      popa.appendChild(label2);
      
     const sel = document.createElement("SELECT");
    sel.setAttribute('name','chargednotcharged') 
    sel.setAttribute('class','form-control') 
      
      
      const op1 = document.createElement("option");
      const op2 = document.createElement("option");
      
      op1.setAttribute('label','Charged');
      op1.setAttribute('value','Charged');
      op1.setAttribute('text','Charged');
      
      op2.setAttribute('label','Free');
      op2.setAttribute('value','Free');
      op2.setAttribute('text','Free');
      
   if(getpark=='Charged')
   {
      sel.appendChild(op1);
      sel.appendChild(op2);
   }
   else{
       sel.appendChild(op2);
      sel.appendChild(op1); 
   }
      popa.appendChild(sel);
      
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       
   
       
   }
     
     else{
         popa.innerHTML='';
     }
     
     
     
      
      
  });
      




 $("#pool").change(function(event)
  {
      
      var delme = document.getElementById("antim2"); 
      delme.innerHTML='';
     
  var pl = document.getElementById("pool").value;  
  var x = document.getElementById("popmeplease2");
  var xx = document.getElementById("popmeplease3");
  
 
  var plo = document.getElementById("getpoollocation").value;
  var io = document.getElementById("getinorout").value;
  
  
  
  
  

  if(pl=='Yes'){
      x.innerHTML='';
xx.innerHTML='';
      

      const label = document.createElement("label");
      label.innerHTML='Pool Location';
      x.appendChild(label);
      
        const inp = document.createElement("INPUT");
        inp.setAttribute('name','poollocation')
        inp.setAttribute('value',plo)
        inp.setAttribute('class','form-control')
        x.appendChild(inp); 
      
      
      
        const label2 = document.createElement("label");
      label2.innerHTML='Pool Type';
      xx.appendChild(label2);
      
     const sel = document.createElement("SELECT");
    sel.setAttribute('name','inorout') 
    sel.setAttribute('class','form-control') 
      
      const op0 = document.createElement("option");
      const op1 = document.createElement("option");
      const op2 = document.createElement("option");
      
      op0.setAttribute('label',io);
      op0.setAttribute('value',io);
      op0.setAttribute('text',io);
      
      
      op1.setAttribute('label','Indoor');
      op1.setAttribute('value','Indoor');
      op1.setAttribute('text','Indoor');
      
      op2.setAttribute('label','Outdoor');
      op2.setAttribute('value','Outdoor');
      op2.setAttribute('text','Outdoor');
      
      sel.appendChild(op0);
      sel.appendChild(op1);
      sel.appendChild(op2);
      
      xx.appendChild(sel);
      
      
  }
  
  else{
      x.innerHTML='';
      xx.innerHTML='';
  }
  
  
  });





 $("#type").change(function(event)
  {
    
    var delme = document.getElementById("antim"); 
      delme.innerHTML='';
     
  var ty = document.getElementById("type");   
var x = document.getElementById("popmeplease");

var beachvalue = document.getElementById("getbeach").value;

if(ty.value=='Beach')
{
    
    x.innerHTML='';
    
      const label = document.createElement("label");
      label.innerHTML='Beach Type';
    
     const select = document.createElement("SELECT");
     select.setAttribute('class','form-control');
     select.setAttribute('name','beach');
     
      const option0 = document.createElement("option");
     option0.setAttribute('label',beachvalue);
     option0.setAttribute('value',beachvalue);
     option0.setAttribute('text',beachvalue);
     option0.setAttribute('disabled',true);
     option0.setAttribute('selected',true);
     
     
     const option = document.createElement("option");
     option.setAttribute('label','Private');
     option.setAttribute('value','Private');
     option.setAttribute('text','Private');
     
      const option2 = document.createElement("option");
     option2.setAttribute('label','Frist Line');
     option2.setAttribute('value','Frist Line');
     option2.setAttribute('text','Frist Line');
     
      const option3 = document.createElement("option");
     option3.setAttribute('label','Second Line');
     option3.setAttribute('value','Second Line');
     option3.setAttribute('text','Second Line');
     
     select.appendChild(option0);
     select.appendChild(option);
     select.appendChild(option2);
     select.appendChild(option3);
     
     
     x.appendChild(label);
      x.appendChild(select);
    
}

else{
 var antim = document.getElementById("antim");   
    
     x.innerHTML='';
     antim.innerHTML='';
}
  
     
     
     
     
     
     
      
  });

 








var x = document.getElementById("demo");




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
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  " Longitude: " + position.coords.longitude;
}
</script>


<script>


</script>







</main>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

