<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	




if (isset($_POST['submit'])) {
    
    
//general facilities


 $acceptedcardslist = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasegeneralfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasegeneralfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    












                     
$sqlo ="UPDATE venuedatabase SET generalfacilities='$acceptedcardslist' WHERE name='$hotel' && country='$country' && city='$city'";

 $resulto = $conn->query($sqlo);


if ($resulto === TRUE) {
 
 $_SESSION['alertme']=1;
 echo "<script>location.replace('addinventory2.php');</script>"; 


 //echo "<script>location.replace('dashboard.php');</script>";
 
} else {
  echo "Error: " . $sqlo . "<br>" . $conn->error;
}   
       






}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">

<h1 style='' align='center'>Add Facilities</h1>

<!--tabs start-->





<div>





<form method='POST' action='#'>



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
<body>


  
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><h3>General Facilities:</h3>
   
    <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='all'>Select All</label>
       <input id='all' name='all' type='checkbox'><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabasegeneralfacilities";
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


<input type='submit' id='pds' onclick='addcardnew()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
    <button type='submit' name='submit' class='btn btn-danger' id='smbt' style='display:block; float:right;'>Submit</button>
  </div>

  
  



<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
       document.getElementById("nextBtn").style.display="inline";
   document.getElementById("smbt").style.display="none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    
   document.getElementById("nextBtn").style.display="none";
   document.getElementById("smbt").style.display="inline";
   
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    document.getElementById("nextBtn").type='button'
    document.getElementById("nextBtn").style.display = "inline";
      document.getElementById("smbt").style.display="none";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    //document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>



<!--tabs end-->

  
  
  

  
  </form>
  
  
  <br/>
  <br/>
  <br/>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
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
  
  

























<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>













</main>







<script>
    document.getElementById("pdss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardneww(){
   var parent=document.getElementById("addncc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardd']");
 
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
    document.getElementById("pdsss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewww(){
   var parent=document.getElementById("addnccc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardsss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#allll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcarddd']");
 
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

  
  
  
 <!--Family --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww(){
   var parent=document.getElementById("addncccc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd']");
 
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

  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Sports --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2(){
   var parent=document.getElementById("addncccc2");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2']");
 
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

  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Cleaning --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23(){
   var parent=document.getElementById("addncccc23");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23']");
 
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

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Food --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss234").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww234(){
   var parent=document.getElementById("addncccc234");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss234[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll234").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd234']");
 
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

  
  
  







 <!--Business Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2345").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2345(){
   var parent=document.getElementById("addncccc2345");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2345[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2345").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2345']");
 
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

  
  
  
  
  
  
  
  
  
 <!--Internet Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23456").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23456(){
   var parent=document.getElementById("addncccc23456");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23456[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23456").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23456']");
 
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
  
  
  
  
  
  
  
  
  
 <!--Parking Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss234567").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww234567(){
   var parent=document.getElementById("addncccc234567");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss234567[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll234567").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd234567']");
 
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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 <!--Unique Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2345678").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2345678(){
   var parent=document.getElementById("addncccc2345678");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2345678[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2345678").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2345678']");
 
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
  
  
  
  
  
  
  
  
  
  
   <!--Safety Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23456789").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23456789(){
   var parent=document.getElementById("addncccc23456789");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23456789[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23456789").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23456789']");
 
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

