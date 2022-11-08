<?php


require_once('db_connection.php');


include('header.php');


$hotelnaam=$_SESSION['hotelname'];
$countrynaam=$_SESSION['countryname'];
$locationnaam=$_SESSION['locationname'];



if (isset($_POST['submit'])) {
	
	
	$types=array();
	$typesdes=array();

	
		// receive all data in an array
$roomtypes = $_POST['types'];
$roomtypesdes = $_POST['typesdes'];


// output / process all data
foreach ($roomtypes as $value) {
	
	array_push($types,$value);
 
  
}

foreach ($roomtypesdes as $value) {
	
	array_push($typesdes,$value);
 
  
}


$n=1;
foreach ($types as $value) {
	
	//echo "<script>alert('a');</script>";
	
		mkdir("Room Uploads/".$value, 0755, true);	
		
		 $uploadsDir = "Room Uploads/".$value."/";
        $allowedFileType = array('jpg','png','jpeg');
		
	
	
	
	
	
	$img=array();
	
	
	
	$imgs=$_FILES['images'.$n]['name'];
	
	
	  
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['images'.$n]['name'][$id];
                $tempLocation    = $_FILES['images'.$n]['tmp_name'][$id];
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
                    $insert = $conn->query("INSERT INTO roomimages (hotel, country,location,room,image) VALUES ('$hotelnaam', '$countrynaam', '$locationnaam', '$value','$fileName')");
                    
                    
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









$sqlTpl = "INSERT INTO roomtypes ( hotel,country,location,name, description)
           VALUES (%s )";
		   
$sqlArr = array();

foreach( $types as $k => $v )

  $sqlArr[] = '"'.$hotelnaam.'","'.$countrynaam.'","'.$locationnaam.'","'.$types[$k].'","'.$typesdes[$k].'" ';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );





 $result = $conn->query($sqlStr);


if ($result === TRUE) {
  echo "New record created successfully";
  
  

echo "<script>location.replace('roomnumbers.php');</script>";

  
  


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}














	
}

?>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">







<label style="float:right;" id="a" class="name btn btn-dark" onclick="textBoxCreate()">New Room Type</label> 


<form method="POST" enctype="multipart/form-data">
<p id="myForm">

</p>

<input type="submit" value="submit" name="submit">
</form>

<script>
var nam=1;

$("#a").click(function() {
   
    //alert(nam);
	nam=nam+1;
});
 
   
function textBoxCreate(){
	 
var line = document.createElement("hr");
var l = document.createElement("label");
l.innerHTML="Name: ";

var y = document.createElement("INPUT");
y.setAttribute("type", "text");
y.setAttribute("class", "form-control");
y.setAttribute("id","types[]");
y.setAttribute("Name", "types[]");

document.getElementById("myForm").appendChild(line);
document.getElementById("myForm").appendChild(l);
document.getElementById("myForm").appendChild(y);







var line = document.createElement("hr");
var l = document.createElement("label");
l.innerHTML="Description: ";

var y = document.createElement("INPUT");
y.setAttribute("type", "text");
y.setAttribute("class", "form-control");
y.setAttribute("id","typesdes[]");
y.setAttribute("Name", "typesdes[]");

document.getElementById("myForm").appendChild(line);
document.getElementById("myForm").appendChild(l);
document.getElementById("myForm").appendChild(y);







var line = document.createElement("hr");
var l = document.createElement("images");
l.innerHTML="Upload Images: ";

var y = document.createElement("INPUT");
y.setAttribute("type", "file");
y.setAttribute("class", "form-control");
y.setAttribute("id","images"+nam+"[]");
y.setAttribute("Name", "images"+nam+"[]");
y.setAttribute("multiple","true");
y.setAttribute("accept","image/*");

document.getElementById("myForm").appendChild(line);
document.getElementById("myForm").appendChild(l);
document.getElementById("myForm").appendChild(y);



}



</script>


</main>