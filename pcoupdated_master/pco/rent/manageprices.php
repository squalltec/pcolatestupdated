<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






if (isset($_POST['addnew'])) {
    
   
   
   
   
$restaurantsname=$_POST['restaurantsname'];
$restaurantsdes=$_POST['restaurantsdes'];
$cuisine=$_POST['cuisine'];

  
$n=0;
foreach ($restaurantsname as $value) {
    
		mkdir("../Restaurant Images/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir2 = "../Restaurant Images/".$hotel."/".$value."/";
        $allowedFileType = array('jpg','png','jpeg');

                $fileName        = $_FILES['fileres'.$n]['name'];
                $tempLocation    = $_FILES['fileres'.$n]['tmp_name'];
                $targetFilePath  = $uploadsDir2 . $fileName;
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
                    $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");
                    
                    
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
            
       
		
	$n=$n+1;
	
 
  
}





//main entry


$sqlTpl1 = "INSERT INTO hotelsdatabaserestaurants (hotel,country,city,name,description,cuisine) VALUES (%s )";
		   
$sqlArr1 = array();

foreach($restaurantsname as $k => $v )

  $sqlArr1[] = '"'.$hotel.'","'.$country.'","'.$city.'","'.$restaurantsname[$k].'","'.$restaurantsdes[$k].'","'.$cuisine[$k].'"';
$sqlStr1 = sprintf( $sqlTpl1 ,
            implode( ' ) , ( ' , $sqlArr1 ) );





 $result1 = $conn->query($sqlStr1);


if ($result1 === TRUE) {
 // echo "New record created successfully";
  
  
	$_SESSION['alertme']=1;
  


} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}




//end
    
    
    
    
    
    
    
    
}




















if (isset($_POST['submit'])) {
    

$value=$_POST['type'];

$cuisine=mysqli_real_escape_string($conn, $_POST['cuisine']);


$id=$_POST['iad'];	


$des=mysqli_real_escape_string($conn, $_POST['des']);	



		mkdir("../Restaurant Images/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir = "../Restaurant Images/".$hotel."/".$value."/";
        $allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	
	
	$imgs=$_FILES['files']['name'];
	
	
	  
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['files']['name'][$id];
                $tempLocation    = $_FILES['files']['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO hotelsdatabaserestaurantsimages (hotel, country,city,restaurant,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");
                    
                    
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
		



















$sql ="UPDATE hotelsdatabaserestaurants SET description='$des', cuisine='$cuisine' WHERE id='$id'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 	$_SESSION['alertme']=1;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

		






}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">



<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Manage Prices</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Prices</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                    
                    
                    
                    <?php
                    
                    $n=0;
                   
                    
$sqll ="SELECT * FROM events WHERE hotel='$hotel' && country='$country' && location='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	?>
             <form action="#" method="post" enctype="multipart/form-data">       
                    <input style='display:none;' name='iad' value='<?php echo $roww['id'];?>'>
                      <div class="accordion-item">
                          
                                   
                          
                   <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsea<?php echo $n;?>" aria-expanded="true" aria-controls="collapsea<?php echo $n;?>">
                           <label>EVENT:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $roww['event'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                        <div id="collapsea<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">         
                          
                          
                      
                           
                      
                      
                         
                    <?php
                    
               $eve=$roww['event'];
                   
                 $nn=0;   
$sqllz ="SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && event='$eve' GROUP BY name";
		$resulttz = $conn->query($sqllz);

if ($resulttz->num_rows > 0) {
  // output data of each row
  while($rowwz = $resulttz->fetch_assoc()) {
	  
	?>    
            
                      
                      
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $nn;?>" aria-expanded="true" aria-controls="collapse<?php echo $nn;?>">
                           <label>Room:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $rowwz['name'];?>' id='type' name='type'> 
               
             
                          </button>
                           
                        </h2>
                        
                        
                        
                        
                          <div id="collapse<?php echo $nn;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                          <div class="accordion-body">         
                          
                          
                          
             <?php
             $ramnam= $rowwz['name'];
             $nnn=0;
             $sqllza ="SELECT * FROM setprices WHERE hotel='$hotel' && country='$country' && location='$city' && event='$eve' && name='$ramnam'";
		$resulttza = $conn->query($sqllza);

if ($resulttza->num_rows > 0) {
  // output data of each row
  while($rowwza = $resulttza->fetch_assoc()) {
	  
	?>    
            
                          
        <a href='updateprice.php?event=<?php echo $roww['event'];?>&room=<?php echo $rowwz['name'];?>&sdate=<?php echo $rowwza['sdate'];?>&edate=<?php echo $rowwza['edate'];?>'>   <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseaaa<?php echo $nnn;?>" aria-expanded="true" aria-controls="collapse<?php echo $nnn;?>">
                           
               <h6>From: <?php echo $rowwza['sdate'];?> To: <?php echo $rowwza['edate'];?> </h6>
               
             
                          </button>
                           
                        </h2>      
                        
                    </a>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                          
                          
                   <?php
                   $nnn=$nnn+1;
  }
}?>
                          
                          
                          
                          
                          
                          
                          </div>
                          </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <?php
                        $nn=$nn+1;
  }
}
?>
                        
                        
                        
                        
                        
                        
                        
                        
                      
                  </div>
                </div>

                </div>
                
                </form>
                
                <?php
                $n=$n+1;
  }
  }
  ?>

              </div>
          </div><!--end row-->
         
     
     
     
     
     
     
     
     
     
    </div>






  </div>



<br/>
<br/>
<p align='center'><a href='add_new_prices.php'><button class='btn btn-danger'>Add More Prices</button></a></p>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>









<br/>
<br/>
<br/>
<br/>















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






<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



    
var n=1;

function myFunction2() {
 var act = document.getElementById("aacctt2"); 
 
 var dv = document.createElement("div");

dv.setAttribute("class", "col-sm");

var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "restaurantsname[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Restaurant Name");


var yc2 = document.createElement("textarea");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "restaurantsdes[]");
yc2.setAttribute("placeholder", "Restaurant Description");



var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "cuisine[]");
yc3.setAttribute("type", "text");
yc3.setAttribute("placeholder", "Cuisine");



var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "fileres"+n);
yc4.setAttribute("type", "file");



dv.appendChild(yc);
dv.appendChild(yc3);
dv.appendChild(yc2);
dv.appendChild(yc4);


act.appendChild(dv);


 n=n+1;
 
}





</script>











<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

