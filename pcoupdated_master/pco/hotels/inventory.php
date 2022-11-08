<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$totalrooms=$_POST['totalrooms'];	

$roomtypes=$_POST['facilitiess'];

$roomtypesdes=$_POST['desfacilitiess'];

$indvidualcounts=$_POST['numbs'];


$roomtype=array();
$roomtypedes=array();
$indvidualcount=array();

foreach ($indvidualcounts as $value) {
		
		array_push($indvidualcount,$value);

}



foreach ($roomtypes as $value) {
		
		array_push($roomtype,$value);

}

foreach ($roomtypesdes as $value) {
		
		array_push($roomtypedes,$value);

}



$sqlTpl = "INSERT INTO hotelsInventorydatabase ( hotel,country,city,totalrooms,type,indvidualcount,description)
           VALUES (%s )";
		   
$sqlArr = array();

foreach( $roomtype as $k => $v )

  $sqlArr[] = '"'.$hotel.'","'.$country.'","'.$city.'","'.$totalrooms.'","'.$roomtype[$k].'","'.$indvidualcount[$k].'","'.$roomtypedes[$k].'"';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );

 $resulta = $conn->query($sqlStr);


if ($resulta === TRUE) {
    
    
    
    
    
    
    
    
    
    
    
    
    
    
$n=1;
foreach ($roomtype as $value) {
    

	
	//echo "<script>alert('a');</script>";
	
		mkdir("../Room Uploads/".$hotel."/".$value, 0755, true);	
		
		 $uploadsDir = "../Room Uploads/".$hotel."/".$value."/";
        $allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	
	
	$imgs=$_FILES['filesfacilitiess'.$n]['name'];
	
	
	  
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['filesfacilitiess'.$n]['name'][$id];
                $tempLocation    = $_FILES['filesfacilitiess'.$n]['tmp_name'][$id];
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
		
		
	$n=$n+1;
	
 
  
}











    
    
    
    
    
    
    
    
    
    
    
    
    
  
}
                    
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        


}
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
<form action="#" method="post" enctype="multipart/form-data">


<div class="form-group">


<h2 style='margin-top:-50px;' align='center'>Inventory</h2>

</div>
<div>

 <div class="form-group">
    <label>Total Rooms</label>
    
    <input id='trooms' required class='form-control' placeholder='Total Rooms' name='totalrooms' type='number'>
    
    </div>


<div class="form-group">
    <label for="exampleFormControlTextarea1">Room Types</label>
    <input type="text" required  data-id='1' class="getadi form-control" id="fac1" name="facilitiess[]" placeholder="Room Type">
    <input type="text" required class="form-control" name="desfacilitiess[]" placeholder="Room Type Description">
    <input type="file" required multiple='true' class="form-control" name="filesfacilitiess1[]">
	
	<p id="myForm">

</p>



	<button type="button" id='a' style="background-color:#009CA4;" class="form-control">+ Add Room Type</button>




 <div class="form-group">
     
     <table>
        <tr><th>Room Type</th>
         <th>No. of Rooms</th></tr> 
         <tbody id='lis'>
         <tr>
             <td>
                <input class='form-control' id='type1' name='type1[]' readonly> 
             </td>
             
                 <td>
                <input type='number' required min='0' class='form-control' id='numbs1' name='numbs[]'> 
             </td>
          
         </tr> 
         </tbody>
     </table>
     </div>






   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
</form>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>


const collection = document.getElementsByClassName("getadi");

setInterval(function () {
    var trooms = document.getElementById('trooms').value;
    if(trooms==''){
        trooms=0;
    }
    else{
    trooms=parseInt(trooms);
   
    }
    var alloted=0;
    
    
for (let i = 0; i < collection.length; i++) {
    var dd=i+1;
   
    const ab = document.getElementById('type'+dd);
    const ab2 = document.getElementById('fac'+dd);
    const dms=document.getElementById('numbs'+dd);
    const rms = dms.value;
       
       if(rms==''){
       
     var lms=0;
       }
       else{
          var lms=parseInt(rms);  
       }
  
  alloted=alloted+lms;
    ab.value=ab2.value;

if(alloted>trooms){
    alert('Allotment Cannot Be Higher than Total Rooms');
    dms.value='';
}

}





}, 1000);


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








</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

