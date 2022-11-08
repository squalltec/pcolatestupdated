<?php

include 'db_connection.php';
include 'header.php';




 $countvenues=$_SESSION['counting'];
 $venues=$_SESSION['venues'];
 
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];      

if(isset($_POST['submit']))
{
  
  
  
  
mkdir("../Venue FloorPlan Images/".$hotel."/".$venues[$countvenues], 0755, true);	
		

 $uploadsDir = "../Venue FloorPlan Images/".$hotel."/".$venues[$countvenues]."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['upload']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['upload']['name'][$id];
                $tempLocation    = $_FILES['upload']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO floorplanimages (hotel, country,city,venue,image,type) VALUES ('$hotel', '$country', '$city','$venues[$countvenues]','$fileName','floorplan')");
                    
                    
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
		
  

$babzq=intval($_SESSION['counting'])+1;
    
   
  if(count($venues)>$babzq) 
  {
      $_SESSION['counting']=intval($_SESSION['counting'])+1;
      echo "<script>location.replace('uploadorfp.php');</script>"; 
  }
  else{
      $_SESSION['counting']='0';
      echo "<script>location.replace('addplanner3.php');</script>"; 
  }
   
   
}
?>

  <main class="page-content">
      
      
      
      
      <h4 align='center'>Floor Plan for <?php echo $venues[$countvenues];?></h4>
      
      
      
      
      
      <h4 align='center'>Upload Floor Plan</h4>
       <form action='#' method='POST' enctype="multipart/form-data">
      <div class='row'>
         
          <div class='col-sm-11'>
              
<input required class='form-control' accept='application/pdf,image/x-png,image/jpg,image/jpeg' name='upload[]' type='file' multiple='true'>
<small style='color:red;'>*format png/jpg/pdf*</small>

</div>

<div class='col-sm'>
<input class='btn btn-danger' type='submit' name='submit'value='Upload'>
</div>



</div>
</form>
 <h4 align='center'>or</h4>

<a href='floorplan.php'><h4 align='center'><input class='btn btn-danger' type='submit' value='Create Floor Plan'></h4></a>
</main>