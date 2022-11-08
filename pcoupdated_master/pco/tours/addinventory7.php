<?php
require_once('db_connection.php');


include('header.php');







$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	





$counter=$_SESSION['roomnamecount'];






$colors=$_SESSION['color'.$counter];
$registrationnumber=$_SESSION['registrationnumber'.$counter];





$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];


$brand=$_SESSION['brands'];

$brandd=$brand[$counter];







	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);













if (isset($_POST['submit'])) {
    

$nn=0;
foreach($registrationnumber as $value){


	mkdir("../Car Images/".$hotel."/".$brandd."/".$roomtype, 0755, true);	
		
		 $uploadsDir = "../Car Images/".$hotel."/".$brandd."/".$roomtype."/";
        $allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['filesfacilitiess'.$nn]['name'];
	

	  
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['filesfacilitiess'.$nn]['name'][$id];
                $tempLocation    = $_FILES['filesfacilitiess'.$nn]['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(in_array($fileType, $allowedFileType)){
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
                    $insert = $conn->query("INSERT INTO carsimages (hotel, country,city,brand,model,registration,color,image) VALUES ('$hotel', '$country', '$city', '$brandd', '$roomtype', '$value', '$colors[$nn]','$fileName')");
                    
                    
                    if($insert) {
                        
                        
                        
 $_SESSION['alertme']=1;
 
 
 
 
 
 
 
 
 
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('addinventory7.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('managevehicles.php');</script>";
    
}

	    
                        
                        
                        
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



      $nn=$nn+1;

}

}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
  
<form action="#" method="post" enctype="multipart/form-data">

  <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
              <h1 align='center'>Add Images</h1>
<style>
    .box {
  float: left;
  height: 20px;
  width: 20px;
  margin-bottom: 15px;
  border: 1px solid black;
  clear: both;
}
</style>

<?php

   for ($x = 0; $x < count($registrationnumber); $x++) 
   {
      
      ?>
      
         <div class="container">
      <div class='row'>
    <div class="col-sm">
        
         Registration Number: <?php echo $registrationnumber[$x]?><br/>
        <label style='float:left;'> Color: </label>
         <div class='box' style='background-color:<?php echo $colors[$x]?>;'></div>
 <input type="file" accept="image/*" required multiple='true' class="form-control" name="filesfacilitiess<?php echo $x;?>[]">
        </div>
         </div>
        </div>
  
  
  <br/><br/>
 <?php
   }
   ?>
   
   
  <button type='submit' name='submit' class='btn btn-primary' style='float:right;'>Submit</button>
  
  </form>
  
  
  <br/>
  <br/>
  <br/>
  
  
  



















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

