<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

$brand=$_SESSION['brands'];

$brandd=$brand[$counter];








	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);













if (isset($_POST['submit'])) {
    
    
//general facilities


 $inroomfacilities = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM rentacarinclusive WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO rentacarinclusive (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    


                    
$sqlo ="UPDATE rentacarInventorydatabase SET inclusivefree='$inroomfacilities' WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$brandd' && model='$roomtype'";

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
	   
	   echo "<script>location.replace('addinventory77.php');</script>";
    
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



<div class="form-group">


<h2 style='' align='center'>Inclusive</h2>

</div>
<div>





<form method='POST' action='#'>

   <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='all'>Select All</label>
       <input id='all' name='all' type='checkbox'><br/>
         

       <?php
       $sqlv ="SELECT * FROM vehiclesinclusive";
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
  
  
  
  
  <br/><br/>
  
  
  
  
  
  
  
  
  
  <button type='submit' name='submit' class='btn btn-danger' style='float:right;'>Next</button>
  
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

