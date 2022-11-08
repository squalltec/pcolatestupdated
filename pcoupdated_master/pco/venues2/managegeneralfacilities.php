<?php
require_once('db_connection.php');


include('header.php');






$xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
      
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

date_default_timezone_set('Asia/Dubai');


















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
 echo "<script>location.replace('managegeneralfacilities.php');</script>"; 


 
 
} else {
  echo "Error: " . $sqlo . "<br>" . $conn->error;
}   
       
















$ipcountry= $xml->geoplugin_countryName ;

$ipad= getRealIpAddr();
$ndate= date('d/m/Y');
$ntime= date("h:i:sa");

        

                     
$sqlvz ="INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Venue Location Facilities')";

 $resultvz = $conn->query($sqlvz);


if ($resultvz === TRUE) {
    
}






}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">

<h1 style='margin-top:-50px;' align='center'>Manage Facilities</h1>



 <?php

$sqll ="SELECT * FROM venuedatabase WHERE name='$hotel' && country='$country' && city='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	

?>





<div class="form-group">


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
        $string = $roww['generalfacilities']; 
$str_arr = preg_split ("/\,/", $string); 

       
       $sqlv ="SELECT * FROM hotelsdatabasegeneralfacilities";
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
}?>

         
            
      
<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <button type='submit' name='submit' class='btn btn-danger' style='float:right;'>Submit</button>
  
  </form>
  
  
  
<?php
      
  }
}
?>
  
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

