<?php
require_once('db_connection.php');


include('header.php');

$getid=$_GET['id'];











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





if (isset($_POST['updateimages'])) {
    
   
$hot=$_POST['hotelnaam'];	
$cou=$_POST['countrynaam'];	
$cit=$_POST['citynaam'];	
$bra=$_POST['brandnaam'];	
$mod=$_POST['modelnaam'];	
	













	mkdir("../Car Images/".$hot."/".$bra."/".$mod, 0755, true);	

 $uploadsDir = "../Car Images/".$hot."/".$bra."/".$mod."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['imagescars']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['imagescars']['name'][$id];
                $tempLocation    = $_FILES['imagescars']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO carsimages (hotel, country,city,brand,model,image) VALUES ('$hot', '$cou', '$cit', '$bra', '$mod','$fileName')");
                    
                    
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
		









    
}


















if (isset($_POST['submit'])) {
  
$doors=$_POST['doors'];	
$seating=$_POST['seating'];	
$maximum=$_POST['maximum'];	
$luggages=$_POST['luggages'];	
$description=$_POST['description'];	
$cancellation=$_POST['cancellation'];

$inc=$_POST['cardsss'];

$inca=implode(",",$inc);

$sql2 = "UPDATE vehiclesInventorydatabase SET doors='$doors',seating='$seating',maximum='$maximum',luggages='$luggages',description='$description',cancellationpolicy='$cancellation',inclusivefree='$inca' WHERE id='$getid'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {



$bra=$_POST['brandnaam'];	
$mod=$_POST['modelnaam'];	















$ipcountry= $xml->geoplugin_countryName ;

$ipad= getRealIpAddr();
$ndate= date('d/m/Y');
$ntime= date("h:i:sa");

 
                     
$sqlvz ="INSERT INTO updates (hotel,country,city,changedfromcountry,date,time,ip,changed) VALUES ('$hotel','$country','$city','$ipcountry','$ndate','$ntime','$ipad','Change in Transfer Car $bra $mod')";

 $resultvz = $conn->query($sqlvz);


if ($resultvz === TRUE) {
    
}

 
 
 




























	
}




 
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>View</h1>
              
              



   <?php
              
               
$sqllvr="SELECT * FROM vehiclesInventorydatabase WHERE id='$getid'";
		$resulttvr = $conn->query($sqllvr);

if ($resulttvr->num_rows > 0) {
  // output data of each row
  while($rowwvr = $resulttvr->fetch_assoc()) {
      
      
      $h=$rowwvr['hotel'];
      $co=$rowwvr['country'];
      $c=$rowwvr['city'];
      $b=$rowwvr['brand'];
      $m=$rowwvr['model'];
      $y=$rowwvr['year'];

?>
 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Brand</label>
       <input id='brand' name='brand' readonly value='<?php echo $rowwvr['brand'];?>' class='form-control'>
         
       
        </div>
        <div class="col-sm">
         <label>Model</label>
       <input id='model' name='model' readonly value='<?php echo $rowwvr['model'];?>' class='form-control'>
         
       
        </div>
        <div class="col-sm">
         <label>Year</label>
       <input id='year' name='year' readonly value='<?php echo $rowwvr['year'];?>' class='form-control'>
                 </div>
              
              
               <div class="col-sm">
         <label>Number of Cars</label>
       <input id='cars' name='cars' readonly value='<?php echo $rowwvr['numberofcars'];?>' class='form-control'>
                 </div>   
                 
           </div>
           </div>
           
            <br/></br/>
            

          
          
          
            
        
       <!--  
         <div class="container">
      <div class='row'>
         <div class='col-sm'>
             <label>Registration Number</label>
        <input name='regi' readonly value='<?php echo $reg[$i];?>' class='form-control'>
        </div>
        
         <div class='col-sm'>
               <label>Chassis Number</label>
         <input name='chas' readonly value='<?php echo $che[$i];?>' class='form-control'>
        </div>
        
         <div class='col-sm'>
               <label>Color</label>
             <div style='width:30px; height:30px; background-color:<?php echo $cle[$i];?>;'>
                 
             </div>
        
         
        </div>
        
        
        </div></div>
        -->
        
      <div class="container">
      <div class='row'>
         <div class='col-sm'>
     <label>Images</label><br/><br/>
   <?php
             
$sql1="SELECT * FROM carsimages WHERE hotel='$h' && country='$co' && city='$c' && brand='$b' && model='$m' && year='$y'";
		$result1 = $conn->query($sql1);


if ($result1->num_rows > 0) {
    
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
      $aid=$row1['id'];
     
   ?>
   
 
    <a href='del.php?tbl=carsimages&aid=<?php echo $aid;?>'><b><span style='font-size:2em; position:absolute; z-index:1; color:red;'>&times;</span></b> </a>
   
   <img style="position: relative; width:200px;" src='../Car Images/<?php echo $h;?>/<?php echo $b;?>/<?php echo $m;?>/<?php echo $row1['image']; ?>'>
   
 
   
   
   
   <?php
   
         }
  }
  ?>
  
  </div>
  </div>
  </div>
  <br/>
  <form action="#" method="post" enctype="multipart/form-data">
  <div class="container">
      <div class='row'>
         <div class='col-sm'>
  <label>Upload More Images</label>
  
  
  
  <input style='display:none;' name='hotelnaam' value='<?php echo $h;?>'>
   <input style='display:none;' name='countrynaam' value='<?php echo $co;?>'>
    <input style='display:none;' name='citynaam' value='<?php echo $c;?>'>
    
    <input style='display:none;' name='brandnaam' value='<?php echo $b;?>'>
     <input style='display:none;' name='modelnaam' value='<?php echo $m;?>'>
     
     <input style='display:none;' name='regnaam' value='<?php echo $reg[$i];;?>'>
     
     <input style='display:none;' name='colornaam' value='<?php echo $cle[$i];;?>'>
  
  
  <input type='file' name='imagescars[]' multiple class='form-control'>
  <br/>
  <input type='submit' value='Upload' class='btn btn-danger' style='float:right;' name='updateimages'>
  </div>
  </div></div>
  
  
  </form>
  
        
        
        <br/></br/>
        
        
        <form action="#" method="post" enctype="multipart/form-data">
        
          <div class="container">
      <div class='row'>
         <input style='display:none;' name='brandnaam' value='<?php echo $b;?>'>
     <input style='display:none;' name='modelnaam' value='<?php echo $m;?>'>
        
         <div class="col-sm">
         <label>Doors</label>
       <input class='form-control' name='doors' value='<?php echo $rowwvr['doors'];?>'>
         
         </div>
         
          
         <div class="col-sm">
         <label>Seating</label>
       <input class='form-control' name='seating' value='<?php echo $rowwvr['seating'];?>'>
         
         </div>
         
         
          
         <div class="col-sm">
         <label>Maximum Persons Allowed</label>
       <input class='form-control' name='maximum' value='<?php echo $rowwvr['maximum'];?>'>
         
         </div>
         
          
         <div class="col-sm">
         <label>Luggages Allowed</label>
       <input class='form-control' name='luggages' value='<?php echo $rowwvr['luggages'];?>'>
         
         </div>
         
         
         </div>
         </div>
        
        
        
        
        
                <div class="container">
      <div class='row'>
        
        
         <label>Inclusive</label>
   
         
         <?php
         
           $nmcr=$rowwvr['inclusivefree'];
      
       
          $sqlv ="SELECT * FROM vehiclesinclusive";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       
    $string=$rowv['name'];   
 
if (strpos($nmcr,$string) !== false) 
  {

  ?>
 <label for='<?php echo $string;?>'><?php echo $string;?></label>
       <input checked id="alertcarddd" name='cardsss[]' type='checkbox' class='' value='<?php echo $string;?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;

   
   <?php   
  }
  else{
      ?>
     <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcarddd" name='cardsss[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;

      
  <?php    
  }
  
  
  }
}
    

?>

         
         
         
         
         
         
         
         
         </div>
         </div>
        
        
        
        
        
         
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Description</label>
       <textarea class='form-control' name='description'><?php echo $rowwvr['description'];?></textarea>
         
         </div>
         
         </div>
         </div>
        
       
         <div class="container">
      <div class='row'>
        
        
         <div class="col-sm">
         <label>Cancellation Policy</label>
       <textarea class='form-control' name='cancellation'><?php echo $rowwvr['cancellationpolicy'];?></textarea>
         
         </div>
         
         </div>
         </div>
        
       
              
  
           
<br/>


   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Update</button>
  </div>
  <?php
  }
}
?>
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

