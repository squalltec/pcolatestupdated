<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	






if (isset($_POST['addnew'])) {
    
   
   
   
   
$restaurantsname=$_POST['restaurantsname'];
$restaurantsdes=$_POST['restaurantsdes'];


  
$n=0;
foreach ($restaurantsname as $value) {
    
		mkdir("../Club Images/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir2 = "../Club Images/".$hotel."/".$value."/";
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
                    $insert = $conn->query("INSERT INTO hotelsdatabaseclubsimages (hotel, country,city,club,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");
                    
                    
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


$sqlTpl1 = "INSERT INTO hotelsdatabaseclubs (hotel,country,city,name,description) VALUES (%s )";
		   
$sqlArr1 = array();

foreach($restaurantsname as $k => $v )

  $sqlArr1[] = '"'.$hotel.'","'.$country.'","'.$city.'","'.$restaurantsname[$k].'","'.$restaurantsdes[$k].'"';
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


$id=$_POST['iad'];	


$des=mysqli_real_escape_string($conn, $_POST['des']);	



		mkdir("../Club Images/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir = "../Club Images/".$hotel."/".$value."/";
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
                    $insert = $conn->query("INSERT INTO hotelsdatabaseclubsimages (hotel, country,city,club,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");
                    
                    
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
		



















$sql ="UPDATE hotelsdatabaseclubs SET description='$des' WHERE id='$id'";

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


<h2 style='margin-top:-50px;' align='center'>Manage Clubs</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Clubs</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                    
                    
                    
                    <?php
                    
                    $n=0;
                    
$sqll ="SELECT * FROM hotelsdatabaseclubs WHERE hotel='$hotel' && country='$country' && city='$city'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	?>
             <form action="#" method="post" enctype="multipart/form-data">       
                    <input style='display:none;' name='iad' value='<?php echo $roww['id'];?>'>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $n;?>" aria-expanded="true" aria-controls="collapse<?php echo $n;?>">
                           <label>Club:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $roww['name'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                        <div id="collapse<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                         
                            <label>Club Description:</label>
                             <textarea required class='form-control' id='des' name='des'><?php echo $roww['description'];?></textarea>
                             <br/><br/>
                            
                           <label>Club Images:</label><br/>
                           
                           <?php 
                           
                           $tpe=$roww['name'];
                                               
$sqllv ="SELECT * FROM hotelsdatabaseclubsimages WHERE hotel='$hotel' && country='$country' && city='$city' && club='$tpe'";
		$resulttv = $conn->query($sqllv);

if ($resulttv->num_rows > 0) {
  // output data of each row
  while($rowwv = $resulttv->fetch_assoc()) {
	  $aid=$rowwv['id'];

                           ?>
                           
                            <a href='del.php?tbl=hotelsdatabaseclubsimages&aid=<?php echo $aid;?>'><b><span style='font-size:2em; position:absolute; z-index:1; color:red;'>&times;</span></b> </a>
                           
                           <img style="width:100px;" src='../Club Images/<?php echo $hotel;?>/<?php echo $tpe;?>/<?php echo $rowwv['image'];?>'>
                           
                           <?php
                           
  }
}
?><br/><br/>
                
                  <label>Add More Images:</label><br/>
               
            <input type="file" multiple='true' class="form-control" name="files[]">
    
               
               
               
               
               
                                       <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Update</button>
  </div>
           <br/>
          
                           
                          </div>
                          
                             </div>
                      </div>
                    

  </form>
                    
                    
                    <?php
                    $n=$n+1;
  }
}
?>
                      <input style='display:none;' name='counter' value='<?php echo $n; ?>'>
                      
                    </div>
                  </div>
                </div>

                

              </div>
          </div><!--end row-->
         
     
     
     
     
     
     
     
     
     
    </div>






  </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>









<br/>
<br/>
<br/>
<br/>






<form action="#" method="post" enctype="multipart/form-data">


<div class="container">
       <div class='row'>
        <label>Add More Clubs</label>
        <div id='aacctt2'>
           <div class="col-sm">
               
                  <input type='text' placeholder='Club Name' class="form-control" id='restaurantsname[]' name='restaurantsname[]'>
                  
                  
                  <textarea class="form-control" placeholder='Club Description' id='restaurantsdes[]' name='restaurantsdes[]'></textarea>
                  
                  
                  <input type='file' class="form-control" id='fileres[]' name='fileres0'>
        
          </div>
          
              </div>
               <div class="col-sm">
               
                <h1 align='center'><button class='btn btn-primary' id='addact2' onclick="myFunction2()">+</button></h1> 
        </div>  
        
        
        
        
        
        
        
            
     </div>
          </div>



   <div class="form-group">
 <button style="float:right;"type="submit" name='addnew' class="btn btn-primary">Add New</button>
  </div>
  


</form>






<br/>
<br/>
<br/>
<br/>
<br/>
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
yc.setAttribute("placeholder", "Club Name");


var yc2 = document.createElement("textarea");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "restaurantsdes[]");
yc2.setAttribute("placeholder", "Club Description");


var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "fileres"+n);
yc4.setAttribute("type", "file");



dv.appendChild(yc);
dv.appendChild(yc2);
dv.appendChild(yc4);


act.appendChild(dv);


 n=n+1;
 
}





</script>











<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

