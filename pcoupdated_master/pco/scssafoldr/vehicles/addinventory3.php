<?php
require_once('db_connection.php');


include('header.php');


    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];

$yers=$_SESSION['yer'];

$counter=$_SESSION['roomnamecount'];


$numberofcars=$_SESSION['numberofcars'];

$nc=$numberofcars[$counter];

$roomtypes=$_SESSION['roomname'];
$brand=$_SESSION['brands'];

$roomtype=$roomtypes[$counter];

$brandd=$brand[$counter];
$yer=$yers[$counter];


	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);




if (isset($_POST['submit'])) {
   
   
   
   
   
   /*
$registrationnumber=$_POST['registration'];
$chassis=$_POST['chassis'];
$color=$_POST['color']; 
    
    
    
    
    
    
    
$_SESSION['registrationnumber'.$counter]=$_POST['registration'];
$_SESSION['chassis'.$counter]=$_POST['chassis'];
$_SESSION['color'.$counter]=$_POST['color']; 
    
    
	
		$nn=0;
		foreach($registrationnumber as $vv){
		
		
		
		mkdir("../Insurance Uploads/".$hotel."/".$roomtype, 0755, true);
		
		$filename2 = $_FILES['insurance'.$nn]['name'];
	  $destination2 = "../Insurance Uploads/".$hotel."/".$roomtype."/". $filename2;
	  $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
	  $file2 = $_FILES['insurance'.$nn]['tmp_name'];

 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file2, $destination2)) {

$sqlx ="INSERT INTO vehiclesinsurance (hotel,country,city, insurance,registration) VALUES ('$hotel', '$country', '$city', '$filename2', '$vv')";

 $resultx = $conn->query($sqlx);


if ($resultx === TRUE) {
 // echo "Category created successfully";
} else {
  echo "Error: " . $sqlx . "<br>" . $conn->error;
}

			
		}
		
		$nn=$nn+1;


		}


    
 
    
   $regn= implode(",",$registrationnumber);
    $chas=implode(",",$chassis);
    $col=implode(",",$color);
    
    
    
    */
    
    
    
    
    
    
    
    

$roomtypedes=mysqli_real_escape_string($conn, $_POST['desfacilitiess']);

$type=mysqli_real_escape_string($conn, $_POST['type']);
$doors=mysqli_real_escape_string($conn, $_POST['doors']);
$seating=mysqli_real_escape_string($conn, $_POST['seating']);
$maximum=mysqli_real_escape_string($conn, $_POST['maximum']);
$luggages=mysqli_real_escape_string($conn, $_POST['luggages']);


$large=$_POST['large'];
$small=$_POST['small'];




















	mkdir("../Car Images/".$hotel."/".$brandd."/".$roomtype, 0755, true);	
		
		 $uploadsDir = "../Car Images/".$hotel."/".$brandd."/".$roomtype."/";
        $allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['filesfacilitiess']['name'];
	

	  
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['filesfacilitiess']['name'][$id];
                $tempLocation    = $_FILES['filesfacilitiess']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO carsimages (hotel, country,city,brand,model,image,year) VALUES ('$hotel', '$country', '$city', '$brandd', '$roomtype','$fileName','$yer')");
                    
                    
                    if($insert) {
                        
                        
                        
 $_SESSION['alertme']=1;
 
 
 
	    
                        
                        
                        
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















/*

$sql = "UPDATE vehiclesInventorydatabase SET description='$roomtypedes',registration='$regn',chassis='$chas',color='$col',type='$type',doors='$doors',seating='$seating',maximum='$maximum',luggages='$luggages' WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$brandd' && model='$roomtype'";
*/




$sql = "UPDATE vehiclesInventorydatabase SET large='$large',small='$small',description='$roomtypedes',type='$type',doors='$doors',seating='$seating',maximum='$maximum',luggages='$luggages' WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$brandd' && model='$roomtype'";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {

  
	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	   echo "<script>location.replace('addinventory3.php');</script>";
	
}
else{
	    $_SESSION['alertme']=1;
	    $_SESSION['roomnamecount']='0';
	    
	   echo "<script>location.replace('addinventory6.php');</script>";
}


	    
	
	
	
	
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
            <h2 style='margin-top:-60px;'><?php echo $brandd;?><?php echo " "?><?php echo $roomtype;?> </h2>  
            
           
<form action="#" method="post" enctype="multipart/form-data">


<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>


<!--
<br/>
<div class="container">
      <div class='row'>
          
    <div class="col-sm">
        <label>Registration Numbers</label>
        </div>
           <div class="col-sm">
                <label>Chassis Numbers</label>
        </div>
           <div class="col-sm">
                <label>Colors</label>
        </div>
          <div class="col-sm">
                <label>Insurance Document</label>
        </div>
        
        </div>
        </div>



<?php 

$ncc=intval($nc);

for ($x = 0; $x < $ncc; $x++) {

?>


<div class="container">
      <div class='row'>
          
    <div class="col-sm">
       <input type='text' required placeholder='Registration Number' class='form-control' name='registration[]'>
        </div>
           <div class="col-sm">
                <input type='text' required placeholder='Chassis Number' class='form-control' name='chassis[]'>
        </div>
           <div class="col-sm">
                <input type='color' required class='form-control' name='color[]'>
        </div>
        
          <div class="col-sm">
                <input type='file' required class='form-control' name='insurance<?php echo $x?>'>
        </div>
        
        </div>
        </div>
        
        <br/>
        <?php
            
}
        ?>
        
        
        
-->
<br/>
 <div class="container">
      <div class='row'>
      
      
        <div class="col-sm">
         <label>Type</label>
        <select class='form-control' required name='type'>
            <option>Standard</option>
            <option>Luxury</option>
            <option>Bus</option>
            <option>Limousine</option>
            
        </select>
      
        </div>    
          
          
    <div class="col-sm">
         <label>Doors</label>
        <select class='form-control' required name='doors'>
            <option>5</option>
            <option>4</option>
            <option>3</option>
            <option>2</option>
            <option>1</option>
        </select>
      
        </div>
        
        
        
        
        
         </div>
        </div>
        
        
        
      
<br/>
 <div class="container">
      <div class='row'>
      
      
        <div class="col-sm">
         <label>Seating Capacity</label>
      <input name='seating' type='number' min='0' class='form-control' required> 
      
        </div>    
          
          
    <div class="col-sm">
          <label>Maximum Persons Allowed</label>
      <input name='maximum' type='number' min='0' class='form-control' required> 
      
      
        </div>
        
        
         <div class="col-sm">
          <label>Luggages Allowed</label>
      <input name='luggages' type='number' min='0' class='form-control' required> 
      
      
        </div>
        
        
        
         </div>
        </div>
          
        

<br/>


<div class="container">
      <div class='row'>
      
      
        <div class="col-sm">
         <label>Quantity of Large Bags</label>
      <input name='large' type='number' min='0' class='form-control' value='0' required> 
      
        </div>   
        
          <div class="col-sm">
         <label>Quantity of Small Bags</label>
      <input name='small' type='number' min='0' class='form-control' value='0' required> 
      
        </div>   
        
        
        </div>    
        </div>    
        
        
        
        
<br/>
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Car Description</label>
        <textarea class='form-control' required name='desfacilitiess' placeholder='Description'></textarea>
      
        </div>
         </div>
        </div>
        <br/>
        
        
        <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Car Images</label>
        <input type='file' multiple='true' class='form-control' required name='filesfacilitiess[]' placeholder='Images'>
      
        </div>
         </div>
        </div>
        <br/>




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

