<?php
require_once('db_connection.php');


include('header.php');



$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





if (isset($_POST['submit'])) {
    
	 
$event=$_POST['event'];	
$sdate=$_POST['sdate'];	
$edate=$_POST['edate'];	
$room=$_POST['room'];	
$number=$_POST['number'];	
$release=$_POST['release'];		
$minimumstay=$_POST['minimumstay'];	
$single=$_POST['single'];	
$double=$_POST['double'];





$n=0;
foreach ($number as $value) {
if($value=='' || $value=='0'){
    
}

else{









$sqll ="SELECT * FROM events WHERE hotel='$hotel' && country='$country' && location='$city' && event='$event'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
}
else{	  

$sql = "INSERT INTO events (hotel,country,location,event,price,pricedbl,sdate,edate,minimumstay,numberofrooms,roomname)
           VALUES ('$hotel','$country','$city','$event','$single[$n]','$double[$n]','$sdate','$edate','$minimumstay[$n]','$number[$n]','$room[$n]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	
}

}






$sql2 = "INSERT INTO setprices (hotel,country,location,name,sellprice,dblsellprice,sdate,edate,event)
           VALUES ('$hotel','$country','$city','$room[$n]','$single[$n]','$double[$n]','$sdate','$edate','$event')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}

$date = date('Y-m-d');
$newdate = date('Y-m-d', strtotime($date.' + '.$release[$n]. 'days'));


$sql2 = "INSERT INTO roomnumbers (hotel,country,location,name,number,releasedate,dates,sdate,edate,minimumstay)
           VALUES ('$hotel','$country','$city','$room[$n]','$number[$n]','$release[$n]','$newdate','$sdate','$edate','$minimumstay[$n]')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

$_SESSION['alertme']='1';

$_SESSION['decision']='1';
	
}


}


$n=$n+1;
}









  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add Prices</h1>
              
              <input style='display:none;' value='<?php echo $_SESSION['decision']?>' id='decision'>
<form action="#" method="post" enctype="multipart/form-data">





 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Event Name</label>
       <select id='event' name='event' class='form-control'>
          <option>Select Event</option>
           <?php
           
           
$sqll ="SELECT * FROM newevents";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
      ?>
      
      <option><?php echo $roww['name'];?></option>
     
     
     
     <?php
	  
  }
}
           
           
           ?>
       </select>
       
       
        </div>
           </div>
           </div>
        
        
        <br/></br/>
         
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Starting Date</label>
         <input type='date' required class='form-control' id='sdate' name='sdate' value='<?php echo ''; ?>'>
         
         </div>
         
         <div class="col-sm">
         <label>Ending Date</label>
         <input type='date' required class='form-control' id='edate' name='edate' value='<?php echo ''; ?>'>
         
         </div>
         
         </div>
         </div>
      
       
      
        
        <br/></br/>
        
        
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Pricing</label>
         
         
         
         
         <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table>
  <tr>
    <th>Room Type</th>
    <th>Number of Rooms</th>
    <th>Release Days</th>
    <th>Minimum Stay</th>
     <th>Single Price</th>
      <th>Double Price</th>
  </tr>
  
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
     
           <?php
           
           
$sqlzl ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY type";
		$resultzt = $conn->query($sqlzl);

if ($resultzt->num_rows > 0) {
  // output data of each row
  while($rowwz = $resultzt->fetch_assoc()) {
      ?>
      
     <tr>
         <td><input type='text' readonly name='room[]' class='form-control' value='<?php echo $rowwz['type'];?>'></td>
            <td><input type='number' min='0' name='number[]' class='form-control'></td>
            <td><input type='number' min='0' name='release[]' class='form-control'></td>
            <td><input type='number' min='0' name='minimumstay[]' class='form-control'></td>
              <td><input type='number' min='0' name='single[]' class='form-control'></td>
                <td><input type='number' min='0' name='double[]' class='form-control'></td>
     </tr>
     <?php
	  
  }
}
           
           
           ?>
      
       
            </div> </div> </div>  


</table>
<br/><br/>
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
  <br/><br/><br/>
</form>
<br/><br/><br/>




        
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  
  
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


























<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    var dec=document.getElementById("decision").value;
    if(dec=='1'){
       
    <?php 
    $_SESSION['decision']='0';
    ?>
    
    
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'More Prices?',
  text: "You want to add more prices?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
      
    location.replace('add_new_prices.php');
    
    
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    
    
    location.replace('managerestaurants.php');
    
    
    
    
    
  }
})
    
    
    
    
    
    
    
    
    
    
    }
    
</script>








 












<script>
    
    
    
	
$("#event").on('change', function() {
    
    
  const event = document.getElementById('event').value;
	
	var compy1=event;
	
	  $.ajax({
	      
              
			  type:'POST',
              url:'geteventdates.php',
              data:{'compy1':compy1},
			  
              success:function(result){
			
				
		
		result = jQuery.parseJSON(result);
				
				
				for(i=0; i<result.length; i++){

					sdate=result[i].sdate;
					edate=result[i].edate;
					
					

				}
				
				
				
				$("#sdate").val(sdate);
				$("#edate").val(edate);
	
		
			 
              
                 
              }
			  
          }); 
		  
		  
		
	
})

    
</script>







</main>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

