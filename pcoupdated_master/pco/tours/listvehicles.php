<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	




if (isset($_POST['submit'])) {
    
    
    
    
    
    
    
$numberofrooms =$_POST['numbs'];    
    
$singleadults =$_POST['singleadults'];
$singlechildren =$_POST['singlechildren'];

$doubleadults =$_POST['doubleadults'];
$doublechildren =$_POST['doublechildren'];







$value=$_POST['type'];
$roomtype=$_POST['type'];
   
$id=$_POST['iad'];	

$singledes=mysqli_real_escape_string($conn, $_POST['singledes']);	
$doubledes=mysqli_real_escape_string($conn, $_POST['doubledes']);	




    
    
     
//general facilities


 $inroomfacilities = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabaseinroomfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabaseinroomfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    


  



//kitchen facilities


 $kitchen = implode(", ", $_POST['cards2']);
    
    
    $arraycards2=$_POST['cards2'];
    
    
    
foreach ($arraycards2 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasekitchenfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasekitchenfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  
  
  
  
  
  
  
  






//Private Bathroom facilities


 $privatebathroom = implode(", ", $_POST['cards3']);
    
    
    $arraycards3=$_POST['cards3'];
    
    
    
foreach ($arraycards3 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabaseprivatebathroomfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabaseprivatebathroomfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  

//Discounted facilities


 $discounted = implode(", ", $_POST['cards4']);
    
    
    $arraycards4=$_POST['cards4'];
    
    
    
foreach ($arraycards4 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasediscountedfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasediscountedfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  
  
//Complimentary facilities


 $complimentary = implode(", ", $_POST['cards5']);
    
    
    $arraycards5=$_POST['cards5'];
    
    
    
foreach ($arraycards5 as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasecomplimentaryfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasecomplimentaryfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
  
  












                     
$sqlo ="UPDATE hotelsInventorydatabase SET inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',discountedfacilities='$discounted',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";

 $resulto = $conn->query($sqlo);


if ($resulto === TRUE) {
 
 $_SESSION['alertme']=1;
 
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

		mkdir("../Room Uploads/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir = "../Room Uploads/".$hotel."/".$value."/";
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
                    $insert = $conn->query("INSERT INTO hotelsInventoryImagesdatabase (hotel, country,location,type,image) VALUES ('$hotel', '$country', '$city', '$value','$fileName')");
                    
                    
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
		



















$sql ="UPDATE hotelsInventorydatabase SET singledescription='$singledes',doubledescription='$doubledes', singleadultoccupancy='$singleadults', singlechildoccupancy='$singlechildren',doubleadultoccupancy='$doubleadults', doublechildoccupancy='$doublechildren',numberofrooms='$numberofrooms' WHERE id='$id'";

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


<h2 style='margin-top:-50px;' align='center'>Manage Vehicles</h2>

</div>
<div>

 <div class="form-group">
     
     
     
     
     
     
     
     
     
     
            <div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Vehicles</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                    
                    
                    
                    <?php
                    
                    $n=0;
                    
$sqll ="SELECT * FROM vehiclesInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' GROUP BY brand";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  $delid=$roww['id'];
	?>
             <form action="#" method="post" enctype="multipart/form-data">       
                    <input style='display:none;' name='iad' value='<?php echo $roww['id'];?>'>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $n;?>" aria-expanded="true" aria-controls="collapse<?php echo $n;?>">
                           <label>Brand:&nbsp; </label><br/>
                <input class='form-control' readonly value='<?php echo $roww['brand'];?>' id='type' name='type'> 
             
                          </button>
                        </h2>
                        <div id="collapse<?php echo $n;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              
                              
                               
                    <?php
                    $bra=$roww['brand'];
                    
                  
$sqllz ="SELECT * FROM vehiclesInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$bra' GROUP BY model";
		$resulttz = $conn->query($sqllz);

$nom=1010;
if ($resulttz->num_rows > 0) {
  // output data of each row
  while($rowwz = $resulttz->fetch_assoc()) {
	
	?>
                              
                              
                                <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal<?php echo $nom;?>" aria-expanded="true" aria-controls="collapse<?php echo $n;?>">
                              <?php echo $rowwz['model'];?>
                              </h2>
                            
                            
                            
                              <div id="collapseal<?php echo $nom;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample22">
                          <div class="accordion-body">
                              
                            
                            
                            
                            
                             <?php
                    $mdo=$rowwz['model'];
                    
                   
                    
$sqllzz ="SELECT * FROM vehiclesInventorydatabase WHERE hotel='$hotel' && country='$country' && city='$city' && brand='$bra' && model='$mdo' GROUP BY year";
		$resulttzz = $conn->query($sqllzz);

$nomz=2010;
if ($resulttzz->num_rows > 0) {
  // output data of each row
  while($rowwzz = $resulttzz->fetch_assoc()) {
	
	?>
                            
      <a href='setprices.php?id=<?php echo $rowwzz['id']?>'>                    
               
               
                          <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseal<?php echo $nomz;?>" aria-expanded="true" aria-controls="collapse<?php echo $n;?>">
                              <?php echo $rowwzz['year'];?>
                              </h2>
                              
                         </a>  
                            
                            <?php
                            $nomz=$nomz+1;
                            }
                            }
                            ?>
                            
                            
                            
                            </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                              
                              
                              
                              <?php
                              $nom=$nom+1;
  }
}
?>
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                      
               
               
               
               
                                       <div class="form-group">
                                           <br/><br/>

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






<br/>
<br/>
<p align='center'><a href='addinventory2.php'><button class='btn btn-primary'>Add More Vehicles</button></a></p>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>





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


$("#disablefriendly").change(function() {

var friend= document.getElementById("disablefriendly").value;
if(friend=='Yes'){
      
var dfr= document.getElementById("dfr");         
      
      dfr.classList.add("col-sm");
      
             	
var y = document.createElement("label");
y.innerHTML='No. of Disable Friendly Rooms';

dfr.appendChild(y);  

var y2 = document.createElement("INPUT");
y2.setAttribute('name','disablerooms');
y2.setAttribute('class','form-control');

dfr.appendChild(y2);  




    
}
else{
    
 var dfr= document.getElementById("dfr");   
    dfr.innerHTML='';
    dfr.classList.remove("col-sm");


    
}






});

$("#streaming").change(function() {

var starm= document.getElementById("streaming").value;

if(starm=='Yes'){
     var strm= document.getElementById("strm");
      strm.classList.add("col-sm");
      
      
      	
var y = document.createElement("label");
y.innerHTML='Streaming Source';

strm.appendChild(y);  

var y2 = document.createElement("SELECT");
y2.setAttribute('name','source');
y2.setAttribute('class','form-control');


var y3 = document.createElement("option");
y3.setAttribute('label','Netflix');
y3.setAttribute('text','Netflix');
y3.setAttribute('value','Netflix');
 y2.appendChild(y3);        
 
 
 
 
 var y4 = document.createElement("option");
y4.setAttribute('label','Amazon Prime');
y4.setAttribute('text','Amazon Prime');
y4.setAttribute('value','Amazon Prime');
 y2.appendChild(y4);    
 
 
  var y5 = document.createElement("option");
y5.setAttribute('label','Local Cable');
y5.setAttribute('text','Local Cable');
y5.setAttribute('value','Local Cable');
 y2.appendChild(y5);    
 

  var y6 = document.createElement("option");
y6.setAttribute('label','Youtube');
y6.setAttribute('text','Youtube');
y6.setAttribute('value','Youtube');
 y2.appendChild(y6);    
 
 
 
 
 
 
 
 
 strm.appendChild(y2);     
}

if(starm=='No'){
    
    var strm= document.getElementById("strm");
    strm.innerHTML='';
    strm.classList.remove("col-sm");
}


});






var nam=1;
$("#a").click(function() {
  nam=nam+1;
   
   
   
	
var y = document.createElement("INPUT");
y.setAttribute("placeholder", "Room Type");
y.setAttribute("class", "getadi form-control");
y.setAttribute("Name", "facilitiess[]");
y.setAttribute("id", "fac"+nam);
y.setAttribute("data-id", nam);
y.setAttribute("required", "true");




var y2 = document.createElement("INPUT");
y2.setAttribute("placeholder", "Room Type Description");
y2.setAttribute("class", "form-control");
y2.setAttribute("Name", "desfacilitiess[]");
y2.setAttribute("required", "true");


var y3 = document.createElement("INPUT");
y3.setAttribute("type", "file");
y3.setAttribute("class", "form-control");
y3.setAttribute("Name", "filesfacilitiess"+nam+"[]");
y3.setAttribute("multiple","true");
y3.setAttribute("required", "true");









var y4 = document.createElement("tr");
var y5 = document.createElement("td");
var y6 = document.createElement("td");
y4.appendChild(y5);
y4.appendChild(y6);


var y33 = document.createElement("INPUT");
y33.setAttribute("class", "form-control");
y33.setAttribute("Name", "type"+nam+"[]");
y33.setAttribute("id", "type"+nam);
y33.setAttribute("readonly","true");


var y34 = document.createElement("INPUT");
y34.setAttribute("class", "form-control");
y34.setAttribute("Name", "numbs[]");
y34.setAttribute("id", "numbs"+nam);
y34.setAttribute("required", "true");
y34.setAttribute("min", "0");
y34.setAttribute("type","number");




y5.appendChild(y33);
y6.appendChild(y34);

   
document.getElementById("myForm").appendChild(y);
document.getElementById("myForm").appendChild(y2);
document.getElementById("myForm").appendChild(y3);
	
   
   document.getElementById("lis").appendChild(y4);
  
   
   
   
   
});
</script>




















  
  
  
<script>
    document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew(){
   var parent=document.getElementById("addnc");
   
   
   
 
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards[]');
   
  
   parent.appendChild(inpt);
    
}
    
 $("#all").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>





<!--kitchen-->




<script>
    document.getElementById("pds2").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew2(){
   var parent=document.getElementById("addnc2");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards2[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all2").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard2']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>
















<!--bathroom-->




<script>
    document.getElementById("pds3").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew3(){
   var parent=document.getElementById("addnc3");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards3[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all3").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard3']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>






<!--discounted-->




<script>
    document.getElementById("pds4").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew4(){
   var parent=document.getElementById("addnc4");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards4[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all4").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard4']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>










<!--Complimentary-->




<script>
    document.getElementById("pds5").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew5(){
   var parent=document.getElementById("addnc5");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards5[]');
   
   
   parent.appendChild(inpt);
    
}
    
 $("#all5").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard5']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>













</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

