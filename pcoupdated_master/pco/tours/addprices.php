<?php
require_once('db_connection.php');


include('header.php');



$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





if (isset($_POST['submit'])) {
    
$meal=$_POST['meal'];	 
$event=$_POST['event'];	
$sdate=$_POST['sdate'];	
$edate=$_POST['edate'];	
$room=$_POST['room'];	
$number=$_POST['number'];	
$release=$_POST['release'];		
$minimumstay=$_POST['minimumstay'];	
$single=$_POST['single'];	
$double=$_POST['double'];	
$tripple=$_POST['tripple'];	



$sqll ="SELECT * FROM events WHERE hotel='$hotel' && country='$country' && location='$city' && event='$event'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
    
}
else{	  

$sql = "INSERT INTO events (hotel,country,location,event,price,pricedbl,pricetrpl,sdate,edate,minimumstay,numberofrooms,roomname)
           VALUES ('$hotel','$country','$city','$event','$single','$double','$tripple','$sdate','$edate','$minimumstay','$number','$room')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	
}

}






$sql2 = "INSERT INTO setprices (hotel,country,location,name,sellprice,dblsellprice,trplsellprice,sdate,edate,mealplan,event)
           VALUES ('$hotel','$country','$city','$room','$single','$double','$tripple','$sdate','$edate','$meal','$event')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}

$date = date('Y-m-d');
$newdate = date('Y-m-d', strtotime($date.' + '.$release. 'days'));


$sql2 = "INSERT INTO roomnumbers (hotel,country,location,name,number,releasedate,dates,sdate,edate,minimumstay)
           VALUES ('$hotel','$country','$city','$room','$number','$release','$newdate','$sdate','$edate','$minimumstay')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}








$additionalbreakfast=$_POST['additionalbreakfast'];
$additionallunch=$_POST['additionallunch'];
$additionaldinner=$_POST['additionaldinner'];


$extrabed=$_POST['extrabed'];
$extrabedprice=$_POST['extrabedprice'];
$additionalbreakfastwithextrabed=$_POST['additionalbreakfastwithextrabed'];

$childbed=$_POST['childbed'];
$childbedprice=$_POST['childbedprice'];
$additionalbreakfastwithchildbed=$_POST['additionalbreakfastwithchildbed'];

$babycot=$_POST['babycot'];
$babycotprice=$_POST['babycotprice'];
$additionalbreakfastwithbabycot=$_POST['additionalbreakfastwithbabycot'];



$sql2z = "INSERT INTO basiccharges (hotel,country,location,roomname,event,breakfast,lunch,dinner,extrabedallowed,childbedallowed,babycotallowed,extrabed,childbed,babycot,additionalbreakfastwithextrabed,additionalbreakfastwithchildbed,additionalbreakfastwithbabycot,sdate,edate)
           VALUES ('$hotel','$country','$city','$room','$event','$additionalbreakfast','$additionallunch','$additionaldinner','$extrabed','$childbed','$babycot','$extrabedprice','$childbedprice','$babycotprice','$additionalbreakfastwithextrabed','$additionalbreakfastwithchildbed','$additionalbreakfastwithbabycot','$sdate','$edate')";
		  
 $resulta2z = $conn->query($sql2z);


if ($resulta2z === TRUE) {
    
    	$_SESSION['alertme']=1;


	
}















  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add Prices</h1>
              
              
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
         <label>Room Type</label>
       <select name='room' class='form-control'>
           <?php
           
           
$sqlzl ="SELECT * FROM hotelsInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY type";
		$resultzt = $conn->query($sqlzl);

if ($resultzt->num_rows > 0) {
  // output data of each row
  while($rowwz = $resultzt->fetch_assoc()) {
      ?>
      
      <option><?php echo $rowwz['type'];?></option>
     
     
     
     <?php
	  
  }
}
           
           
           ?>
       </select>
       
               </div>
               
             <div class="col-sm">
                 <label>Number of Rooms</label>
                 <input class='form-control' required name='number' placeholder='Number of Rooms' min='0' type='number'>
                 </div>    
               
               
               
               <div class="col-sm">
                 <label>Release Days</label>
                 <input class='form-control' required name='release' placeholder='Release Days' min='0' type='number'>
                 </div>    
               
               <div class="col-sm">
             
              <label>Minimum Stay</label>
                 <input class='form-control' name='minimumstay' placeholder='Minimum Stay' min='0' type='number'>
             
             </div>
               
               
               
               
               
               
               
       </div>
        </div>
        
        <br/></br/>
        
           
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
             
              <label>Single Price</label>
                 <input class='form-control' required name='single' placeholder='Single Price' min='0' type='number'>
             
             </div>
             
             
             <div class="col-sm">
             
              <label>Double Price</label>
                 <input class='form-control' name='double' placeholder='Double Price' min='0' type='number'>
             
             </div>
             
             <div class="col-sm">
             
              <label>Tripple Price</label>
                 <input class='form-control' name='tripple' placeholder='Tripple Price' min='0' type='number'>
             
             </div>
             
             </div>
             </div>
        
        
        <br/></br/>
          <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
        <label>Meal Plan</label>
        <select class='form-control' name='meal'>
             <option>Room Only</option>
	  <option>Bed and Breakfast</option>
	  <option>Half Board (Bed + Breakfast + Lunch)</option>
	  <option>Full Board (Breakfast + Lunch + Dinner)</option>
	  <option>All Inclusive</option>
            
            
        </select>
                 
                 
                 
             </div>
             </div>
             </div>
             
             <br/><br/>
             
             
            
               <div class="container">
      <div class='row'>
             
             
                <div class="col-sm">
                  
              <label>Additional Breakfast Price</label>
                 <input class='form-control' name='additionalbreakfast' placeholder='Additional Breakfast Price' min='0' type='number'>   
             </div>
             
             
             <div class="col-sm">
                  
              <label>Additional Lunch Price</label>
                 <input class='form-control' name='additionallunch' placeholder='Additional Lunch Price' min='0' type='number'>   
             </div>
             
             
             <div class="col-sm">
                  
              <label>Additional Dinner Price</label>
                 <input class='form-control' name='additionaldinner' placeholder='Additional Dinner Price' min='0' type='number'>   
             </div>
             
             
             </div>
             </div>
             
             
             
             <br/><br/>
             
             
               <div class="container">
      <div class='row'>
             
                <div class="col-sm">
             
              <label>Extra Beds Allowed</label>
                 <input class='form-control' name='extrabed' placeholder='Extra Beds' min='0' type='number'>
             
             </div>
             
              <div class="col-sm">
             
              <label>Extra Bed Price Each</label>
                 <input class='form-control' name='extrabedprice' placeholder='Extra Bed Price' min='0' type='number'>
             <input type='checkbox' name='additionalbreakfastwithextrabed'>&nbsp; with Additional Breakfast
             </div>
             
             
             </div>
             </div>
<br/><br/>

<div class="container">
      <div class='row'>
             
                <div class="col-sm">
             
              <label>Child Beds Allowed</label>
                 <input class='form-control' name='childbed' placeholder='Child Beds' min='0' type='number'>
             
             </div>
             
              <div class="col-sm">
             
              <label>Child Bed Price Each</label>
                 <input class='form-control' name='childbedprice' placeholder='Child Bed Price' min='0' type='number'>
              <input type='checkbox' name='additionalbreakfastwithchildbed'>&nbsp; with Additional Breakfast
             </div>
             
             
             </div>
             </div>
             
             <br/><br/>
             
             <div class="container">
      <div class='row'>
             
                <div class="col-sm">
             
              <label>Baby Cots Allowed</label>
                 <input class='form-control' name='babycot' placeholder='Baby Cots' min='0' type='number'>
             
             </div>
             
              <div class="col-sm">
             
              <label>Baby Cot Price Each</label>
                 <input class='form-control' name='babycotprice' placeholder='Baby Cot Price' min='0' type='number'>
              <input type='checkbox' name='additionalbreakfastwithbabycot'>&nbsp; with Additional Breakfast
             </div>
             
             
             </div>
             </div>
<br/>


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

