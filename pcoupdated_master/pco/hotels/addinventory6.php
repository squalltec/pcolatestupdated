<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);












if (isset($_POST['submit'])) {
    
    
//general facilities


 $inroomfacilities = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabaseinroomfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabaseinroomfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    


  



//kitchen facilities


 $kitchen = implode(", ", $_POST['cards2']);
    
    
    $arraycards2=$_POST['cards2'];
    
    
    
foreach ($arraycards2 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasekitchenfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasekitchenfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  
  
  
  
  
  
  
  






//Private Bathroom facilities


 $privatebathroom = implode(", ", $_POST['cards3']);
    
    
    $arraycards3=$_POST['cards3'];
    
    
    
foreach ($arraycards3 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabaseprivatebathroomfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabaseprivatebathroomfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  

//Discounted facilities


 $discounted = implode(", ", $_POST['cards4']);
    
    
    $arraycards4=$_POST['cards4'];
    
    
    
foreach ($arraycards4 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasediscountedfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasediscountedfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  
  
//Complimentary facilities


 $complimentary = implode(", ", $_POST['cards5']);
    
    
    $arraycards5=$_POST['cards5'];
    
    
    
foreach ($arraycards5 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasecomplimentaryfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasecomplimentaryfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  












                     
$sqlo ="UPDATE hotelsInventorydatabase SET inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',discountedfacilities='$discounted',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";

 $resulto = $conn->query($sqlo);


if ($resulto === TRUE) {
 
 $_SESSION['alertme']=1;
 
 
 
 
 
 
 
 
 
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('addinventory6.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('addinventory5.php');</script>";
    
}

	    
	
	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
} else {
  echo "Error: " . $sqlo . "<br>" . $conn->error;
}   
       






}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
  
  <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
              <h1 align='center'>Facilities</h1>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">



<style>

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}


/* Mark input boxes that gets an error on validation: */


/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #dc3545;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #dc3545;
}
</style>

<br/>
<br/>



<form method='POST' action='#'>


  
     <div class='container'>
         <div style='padding:10px; border-radius:10px; border:1px solid grey;' class='row'>
             
             <div class='col-sm'>
                 <h6>In-Room Facilities:</h6>
  <div id='cardslist' class="container">
      <div class='row'>
          
    <div style='border-right:1px solid grey;' class="col-sm">
  
   <div class="form-group">
      
            
       <input id='all' name='all' type='checkbox'>&nbsp;&nbsp;<label for='all'>Select All</label><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabaseinroomfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <br/>
       <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>&nbsp;&nbsp;<label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label><br/>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>
<br/>
<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
             </div>
             <div style='border-right:1px solid grey;' class='col-sm'>
                    <h6>Kitchen Facilities:</h6>
  <div id='cardslist' class="container">
      <div class='row'>
          
    <div  class="col-sm">
  
   <div class="form-group">
      
             <input id='all2' name='all' type='checkbox'>&nbsp;&nbsp;<label for='all2'>Select All</label>
      <br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabasekitchenfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
      
      <br/> <input id="alertcard2" name='cards2[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>&nbsp;&nbsp;  <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label><br/>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>
<br/>
<nonsense id='addnc2'>
    
</nonsense>


<input type='submit' id='pds2' onclick='addcardnew2()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
             </div>
             
             
             <div style='border-right:1px solid grey;' class='col-sm'>
                   
      <h6>Private Bathroom Facilities</h6>
    <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            
       <input id='all3' name='all' type='checkbox'>&nbsp;&nbsp;<label for='all3'>Select All</label><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabaseprivatebathroomfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <br/>
       <input id="alertcard3" name='cards3[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>&nbsp;&nbsp;<label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label><br/>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>
<br/>
<nonsense id='addnc3'>
    
</nonsense>


<input type='submit' id='pds3' onclick='addcardnew3()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
             </div>
             
             
             <div class='col-sm'>
                 
                 <h6>Complimentary Facilities</h6>
      <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            
       <input id='all5' name='all' type='checkbox'>&nbsp;&nbsp;<label for='all5'>Select All</label><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabasecomplimentaryfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       
      <br/> <input id="alertcard5" name='cards5[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>&nbsp;&nbsp;<label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label><br/>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>
<br/>
<nonsense id='addnc5'>
    
</nonsense>


<input type='submit' id='pds5' onclick='addcardnew5()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
       
                 
                 
             </div>
             
         </div>
     </div>
  
  
  
  
  
  
  
<button type='submit' name='submit' id='smbt' class='btn btn-danger' style='display:block; float:right;'>Submit</button>
</form>



  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
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





<!--kitchen-->




<script>
    document.getElementById("pds2").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew2(){
   var parent=document.getElementById("addnc2");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards2[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all2").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard2']");
 
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
















<!--bathroom-->




<script>
    document.getElementById("pds3").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew3(){
   var parent=document.getElementById("addnc3");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards3[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all3").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard3']");
 
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






<!--discounted-->




<script>
    document.getElementById("pds4").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew4(){
   var parent=document.getElementById("addnc4");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards4[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all4").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard4']");
 
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










<!--Complimentary-->




<script>
    document.getElementById("pds5").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew5(){
   var parent=document.getElementById("addnc5");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards5[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all5").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard5']");
 
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

<script>

</script>













</main>




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
		  
</script>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

