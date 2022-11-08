<?php
require_once('db_connection.php');


include('header.php');


    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];


$singledouble=$_SESSION['singledouble'];








$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);





























if (isset($_POST['submit'])) {
    
    

$twin=$_POST['twin'];
$convertible=$_POST['convertible'];
$determination=$_POST['determination'];
    
$rn=$_POST['rn'];
$accessibility=$_POST['accessibility'];
$location=$_POST['location'];
    
    
    
    
    $bar=0;
    
    foreach($rn as $ar)
    
{
    

$sql2lau = "INSERT INTO disabletwindetail (hotel,city,country,roomtype,roomnumber,accessibility,location)
           VALUES ('$hotel','$city','$country','$roomtype','$rn[$bar]','$accessibility[$bar]','$location[$bar]')";
		  
 $resulta2lau = $conn->query($sql2lau);


if ($resulta2lau === TRUE) {


}


$bar=$bar+1;
        
} 
    
    
    
    
    
    
    
    
    
    
    

$sql2la = "INSERT INTO disabletwin (hotel,location,country,roomtype,twin,convertible,disablefriendly)
           VALUES ('$hotel','$city','$country','$roomtype','$twin','$convertible','$determination')";
		  
 $resulta2la = $conn->query($sql2la);


if ($resulta2la === TRUE) {




}
    
    
    

$roomtypedes=mysqli_real_escape_string($conn, $_POST['desfacilitiess']);




    $checker=$_POST['checkerdes'];
    
    if($checker=='on'){
        $_SESSION['dupdes']=$roomtypedes;
    }
    else{
        $_SESSION['dupdes']='';
    }
    
$sql = "UPDATE hotelsInventorydatabase SET singledescription='$roomtypedes' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";


		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

  
	    $_SESSION['alertme']=1;
	    
	    
	    
	
if (isset($_POST['desfacilitiess2']))
{
  $des2=$_POST['desfacilitiess2'];
 
 
$sql = "UPDATE hotelsInventorydatabase SET doubledescription='$des2' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {
   
   
   
   
   
   
}
 

}







	    
	    
	    
	    
	    
	  
    
	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);





	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('addinventory3.php');</script>";
	
}

else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	    $_SESSION['roomnamecount']=0;
	   echo "<script>location.replace('addinventory6.php');</script>";
    
}



	    
	
	
	
	
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
            <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
            
          
<form action="#" method="post" enctype="multipart/form-data">


<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

<br/>

<!--
<div class="container">
      <div class='row'>
    <div class="col-sm">
        <label>Room Size</label>
        <input type='text' class='form-control' name='roomsize' placeholder='Room Size' id='size'>
        </div>
        
        </div>
        </div>
     -->   
        
          

        
     <?php
       if($singledouble[$counter]!='on')
            {
           
            ?>
            
             <div class="container">
      <div class='row'>
    <div class="col-sm">
       
<label>Room Description (Single)</label>
        <textarea class='form-control' required name='desfacilitiess' placeholder='Description'></textarea>
        
        </div>
         </div>
        </div>
        <br/>
        
      <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Room Description (Double)</label>
        <textarea class='form-control' required name='desfacilitiess2' placeholder='Description'></textarea>
       
        </div>
         </div>
        </div>
     
       
              <?php
            }
            
            else{
                ?>
                
                 <div class="container">
      <div class='row'>
    <div class="col-sm">
       
<label>Room Description (Suite)</label>
        <textarea class='form-control' required name='desfacilitiess' placeholder='Description'></textarea>
        
        </div>
         </div>
        </div>
        <br/>
                <?php
            }
              ?>
     
     
     

<br/>
     <div class='container'>
         <div class='row'>
             <h4 align='center'>Number of Rooms:</h4>
             <br/>
             <div class='col-sm'>
                 <label>(<?php echo $roomtype;?>) Total Twin Rooms at Hotel</label>
                 <input name='twin' class='form-control' placeholder='Twin Rooms'>
             </div>
             <div class='col-sm'>
                <label>No. of Double Rooms - Convertible to Twin</label>
                 <input name='convertible' class='form-control' placeholder='Convertible'>
             </div>
             <div class='col-sm'>
                 <label>Disable Friendly</label>
                 <input name='determination' id='deter' type='number' class='form-control' placeholder='Disable Friendly'>
             </div>
             
             
             
         </div>
     </div>
     
     
     <datalist style='display:none;' id='accesses'>
                     <option>Lift</option>
                     <option>Ramp</option>
                 </datalist>
              
                 <div class='container'>
                     <br/>
                     <label style='display:none; font-weight:bold;' id='df'>Disable Friendly List:</label>
                     
                     <div class='row'>
                     <div id='a1' class='col-sm'>
                        
                     </div>
                         <div id='a2' class='col-sm'>
                         
                     </div>
                         <div id='a3' class='col-sm'>
                         
                     </div>
                     
                     </div>
                 </div>
                 
                 
                 <nonsense id='populater'>
                     
                 </nonsense>
                 
                 
                 
              
     
     <!--   
        <h4 align='center'>Maximum Occupancy</h4>
         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Adults</label>
        <input type='number' min='0' class='form-control' required name='adults' placeholder='Adults'>
        </div>
          <div class="col-sm">
         <label>Children</label>
        <input type='number' min='0' class='form-control' required name='children' placeholder='Children'>
        </div>
         </div>
        </div>
        
<br/>
        
<div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Extra Beds Allowed</label>
         <input type='number' min='0' class='form-control' required name='extrabedsallowed' placeholder='Extra Beds Allowed'>
        </div>
         </div>
        </div>
-->



<br/>
<br/>

   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  
  
  
  
     $("#deter").on('change', function() {
        var deter= document.getElementById('deter').value;
        var populater= document.getElementById('populater');
        
        var a1= document.getElementById('a1');
        var a2= document.getElementById('a2');
        var a3= document.getElementById('a3');
       
       if(deter>0)
       {
          
           a1.innerHTML= 'Room Number';
            a2.innerHTML= 'Accessibility Through';
             a3.innerHTML= 'Location';
           
        document.getElementById('df').style.display='block';
         populater.innerHTML='';
        
        for(let i=0; i<deter; i++){
            
            
           var container=document.createElement('div');
            container.classList.add('container');
           
           var row=document.createElement('div');
            row.classList.add('row');
            
            
            
            var col1=document.createElement('div');
            col1.classList.add('col-sm');
            var col2=document.createElement('div');
            col2.classList.add('col-sm');
            var col3=document.createElement('div');
            col3.classList.add('col-sm');
            
            
            
            var rn=document.createElement('INPUT');
            rn.setAttribute('class','form-control');
            rn.setAttribute('placeholder','Room Number');
            rn.setAttribute('name','rn[]');
            
            var rn2=document.createElement('INPUT');
            rn2.setAttribute('class','form-control');
            rn2.setAttribute('placeholder','Accessibility');
            rn2.setAttribute('list','accesses');
            rn2.setAttribute('name','accessibility[]');
            
            
             var rn3=document.createElement('INPUT');
            rn3.setAttribute('class','form-control');
            rn3.setAttribute('placeholder','Location');
            rn3.setAttribute('name','location[]');
            
            
            
            
            col1.appendChild(rn);
            
            col2.appendChild(rn2);
            
            col3.appendChild(rn3);
            
            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);
            
            container.appendChild(row);
            
           
            populater.appendChild(container);
            
        }
        
        
        
        
        
        
        
        
        
        
        
       }
       else{
           a1.innerHTML='';
           a2.innerHTML='';
           a3.innerHTML='';
            populater.innerHTML='';
        document.getElementById('df').style.display='none';
       }
         
         
     });
  
  
  
  
  
  
  
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










</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

