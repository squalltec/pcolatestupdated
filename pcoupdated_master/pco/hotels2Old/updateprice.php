<?php
require_once('db_connection.php');


include('header.php');

$getevent=$_GET['event'];
$getroom=$_GET['room'];
$getsdate=$_GET['sdate'];
$getedate=$_GET['edate'];


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

$setpricesid=$_SESSION['setpricesid'];

$sql2 = "UPDATE setprices SET hotel='$hotel',country='$country',location='$city',name='$room',sellprice='$single',dblsellprice='$double',sdate='$sdate',edate='$edate',event='$event' ,approved='' WHERE id='$setpricesid'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}





$roomnumbersid=$_SESSION['roomnumbersid'];

$date = date('Y-m-d');
$newdate = date('Y-m-d', strtotime($date.' + '.$release. 'days'));


$sql2 = "UPDATE roomnumbers SET hotel='$hotel',country='$country',location='$city',name='$room',number='$number',releasedate='$release',dates='$newdate' WHERE id='$roomnumbersid'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {


	
}




 
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Edit Price</h1>
              
        <style>
        .swal2-confirm{
            background-color:#dc3545 !important;
        }
    </style>         
<form action="#" method="post" enctype="multipart/form-data">





 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Event Name</label>
       <input id='event' name='event' readonly value='<?php echo $getevent;?>' class='form-control'>
         
       
        </div>
           </div>
           </div>
        
        
        <br/></br/>
         
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Starting Date</label>
         <input type='date' readonly value='<?php echo $getsdate;?>' required class='form-control' id='sdate' name='sdate' value='<?php echo ''; ?>'>
         
         </div>
         
         <div class="col-sm">
         <label>Ending Date</label>
         <input type='date' readonly value='<?php echo $getedate;?>' required class='form-control' id='edate' name='edate' value='<?php echo ''; ?>'>
         
         </div>
         
         </div>
         </div>
        
       
      
        
        <br/></br/>
        
        
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Room Type</label>
       <input readonly value='<?php echo $getroom;?>' name='room' class='form-control'>
        
       
               </div>
               
               
               
               <?php
              
               
$sqllvr="SELECT * FROM roomnumbers WHERE hotel='$hotel' && country='$country' && location='$city' && name='$getroom' && sdate='$getsdate' && edate='$getedate'";
		$resulttvr = $conn->query($sqllvr);

if ($resulttvr->num_rows > 0) {
  // output data of each row
  while($rowwvr = $resulttvr->fetch_assoc()) {
      
      
      $_SESSION['roomnumbersid']=$rowwvr['id'];
	  
	  $nmr=$rowwvr['number'];
	   $rls=$rowwvr['releasedate'];
	  $min=$rowwvr['minimumstay'];
	
              
  }
}
          
          
            
$sqllvrz="SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && name='$getroom' && sdate='$getsdate' && edate='$getedate' && event='$getevent'";
		$resulttvrz = $conn->query($sqllvrz);

if ($resulttvrz->num_rows > 0) {
  // output data of each row
  while($rowwvrz = $resulttvrz->fetch_assoc()) {
	  
	   $_SESSION['setpricesid']=$rowwvrz['id'];
	   
	   
	  $singlez=$rowwvrz['sellprice'];
	   $doublez=$rowwvrz['dblsellprice'];
	  $tripplez=$rowwvrz['trplsellprice'];
	   $ml=$rowwvrz['mealplan'];
	
              
  }
}    
          
          
          
          
          
              
$sqllvrzx="SELECT * FROM basiccharges WHERE hotel='$hotel' && country='$country' && location='$city' && roomname='$getroom' && sdate='$getsdate' && edate='$getedate' && event='$getevent'";
		$resulttvrzx = $conn->query($sqllvrzx);

if ($resulttvrzx->num_rows > 0) {
  // output data of each row
  while($rowwvrzx = $resulttvrzx->fetch_assoc()) {
	  
	   $_SESSION['basicchargesid']=$rowwvrzx['id'];
	   
	   
	  $abf=$rowwvrzx['breakfast'];
	   $al=$rowwvrzx['lunch'];
	  $ad=$rowwvrzx['dinner'];
	   $ebp=$rowwvrzx['extrabed'];
	   $cbp=$rowwvrzx['childbed'];
	   $bcp=$rowwvrzx['babycot'];
	   
	   
	    $eb=$rowwvrzx['extrabedallowed'];
	   $cb=$rowwvrzx['childbedallowed'];
	   $bc=$rowwvrzx['babycotallowed'];
	
	
	$check1=$rowwvrzx['additionalbreakfastwithextrabed'];
		$check2=$rowwvrzx['additionalbreakfastwithchildbed'];
			$check3=$rowwvrzx['additionalbreakfastwithbabycot'];
	

              
  }
}    
          
           
          
          
          
          
          
          
               
               ?>
               
               
               
               
               
               
               
               
             <div class="col-sm">
                 <label>Allotment</label>
                 <input class='form-control' required value='<?php echo $nmr;?>' name='number' placeholder='Number of Rooms' min='0' type='number'>
                 </div>    
               
               
               
               <div class="col-sm">
                 <label>Release Days</label>
                 <input class='form-control'  value='<?php echo $rls;?>' required name='release' placeholder='Release Days' min='0' type='number'>
                 </div>    
               
               <div class="col-sm">
             
              <label>Minimum Stay</label>
                 <input class='form-control'  value='<?php echo $min;?>' name='minimumstay' placeholder='Minimum Stay' min='0' type='number'>
             
             </div>
               
               
               
               
               
               
               
       </div>
        </div>
        
        <br/></br/>
        
           
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
             
              <label>Single Price</label>
                 <input class='form-control' value='<?php echo $singlez;?>' required id='single' name='single' placeholder='Single Price' min='0' type='number'>
             <input style='display:none;' class='form-control' value='<?php echo $singlez;?>' id='singlecheck' name='singlecheck' placeholder='Single Price' min='0' type='number'>
             </div>
             
             
             <div class="col-sm">
             
              <label>Double Price</label>
                 <input class='form-control' value='<?php echo $doublez;?>' id='double' name='double' placeholder='Double Price' min='0' type='number'>
                 
                 
            <input style='display:none;' class='form-control' value='<?php echo $doublez;?>' id='doublecheck' name='doublecheck' placeholder='Double Price' min='0' type='number'>      
             
             </div>
             
           
             
             </div>
             </div>
        
        
        <br/></br/>
          
            
              
  
           
<br/>


   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Submit</button>
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
    
      
    $("#single").on('change', function() {
    
    
    var sin=document.getElementById('single').value;
    var max=document.getElementById('singlecheck').value;
    
   
    if(parseInt(sin)>parseInt(max)){
       swal.fire('Price Cannot be increased!');
        document.getElementById('single').value=max;
    }
    
    
    });
    
    
    
    
     $("#double").on('change', function() {
    
    
    var sin=document.getElementById('double').value;
    var max=document.getElementById('doublecheck').value;
    
   
    if(parseInt(sin)>parseInt(max)){
       swal.fire('Price Cannot be increased!');
        document.getElementById('double').value=max;
    }
    
    
    });
    
    
    
    
	
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

