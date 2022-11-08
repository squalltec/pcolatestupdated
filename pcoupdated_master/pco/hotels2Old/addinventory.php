<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
    
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$adults =$_POST['adults'];
$children =$_POST['children'];
$balcony =$_POST['balcony'];
$ac =$_POST['ac'];
$attachedbath =$_POST['attachedbathroom'];
$flatscreen =$_POST['flatscreen'];
$coffeemachine =$_POST['coffeemachine'];
$minibar =$_POST['minibar'];
$freewifi =$_POST['freewifi'];
$toiletries =$_POST['toiletries'];
$bathrobe =$_POST['bathrobe'];
$safe =$_POST['safe'];
$bidae =$_POST['bidae'];
$desk =$_POST['desk'];
$slippers =$_POST['slippers'];
$iron =$_POST['iron'];
$hairdryer =$_POST['hairdryer'];
$kettle =$_POST['kettle'];
$alarm =$_POST['alarm'];
$wardrobe =$_POST['wardrobe'];
$closet =$_POST['closet'];
$sanatizer =$_POST['sanatizer'];
$sofabed =$_POST['sofabed'];
$streaming =$_POST['streaming'];
$source =$_POST['source'];
$bath =$_POST['bath'];
$flooring =$_POST['floor'];
$towels =$_POST['towels'];
$linen =$_POST['linen'];
$sockets =$_POST['sockets'];
$disablefriendly =$_POST['disablefriendly'];
$disablerooms=$_POST['disablerooms'];


$roomtype=mysqli_real_escape_string($conn, $_POST['facilitiess']);

$roomtypedes=mysqli_real_escape_string($conn, $_POST['desfacilitiess']);

$indvidualcount=$_POST['numbs'];



$sql = "INSERT INTO hotelsInventorydatabase (hotel,country,city,type,indvidualcount,description,adults, children, balcony, ac, attachedbath, flatscreen, coffeemachine, minibar, freewifi, toiletries, bathrobe, safe, bidae, desk, slippers, iron, hairdryer, kettle, alarm, wardrobe, closet, sanatizer, sofabed, streaming, source, bath, flooring, towels, linen, sockets, disablefriendly, disablerooms)
           VALUES ('$hotel','$country','$city','$roomtype','$indvidualcount','$roomtypedes','$adults','$children','$balcony','$ac','$attachedbath','$flatscreen','$coffeemachine','$minibar','$freewifi','$toiletries','$bathrobe','$safe','$bidae','$desk','$slippers','$iron','$hairdryer','$kettle','$alarm','$wardrobe','$closet','$sanatizer','$sofabed','$streaming','$source','$bath','$flooring','$towels','$linen','$sockets','$disablefriendly','$disablerooms')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
	
		mkdir("../Room Uploads/".$hotel."/".$roomtype, 0755, true);	
		
		 $uploadsDir = "../Room Uploads/".$hotel."/".$roomtype."/";
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
                    $insert = $conn->query("INSERT INTO hotelsInventoryImagesdatabase (hotel, country,location,type,image) VALUES ('$hotel', '$country', '$city', '$roomtype','$fileName')");
                    
                    
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


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1 style='margin-top:-60px;' align='center'>Add Inventory</h1>
<form action="#" method="post" enctype="multipart/form-data">



<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

 
 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Room Name</label>
        <input class='form-control' required name='facilitiess' placeholder='Room Name' >
        </div>
         </div>
        </div>

<br/>



<div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Number of Rooms</label>
        <input class='form-control' required name='numbs' placeholder='Rooms Quantity' >
        </div>
         </div>
        </div>

<br/>

 <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Room Description</label>
        <textarea class='form-control' required name='desfacilitiess' placeholder='Description'></textarea>
        </div>
         </div>
        </div>
        
<br/>
        

	

<br/>
        
        
         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Maximum Occupancy</label><br/>
         <label>Adults:</label>
 <input class='form-control' type='number' required name='adults' placeholder='Adults' >
        </div>
        
         <div class="col-sm">
       <label style='color:white;'>Maximum Occupancy</label><br/>
         <label>Children:</label>
         
 <input class='form-control' type='number' name='children' placeholder='Children' >
        </div>
         </div>
        </div>


<br/>

 
         <div class="container">
      <div class='row'>
    <div class="col-sm">

  <label>Balcony</label>
 
    <select class="form-control" id='balcony' name='balcony'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
        <div class="col-sm">

  <label>AC Controller</label>
 
    <select class="form-control" id='ac' name='ac'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
            <div class="col-sm">

  <label>Attached Bath</label>
 
    <select class="form-control" id='attachedbathroom' name='attachedbathroom'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
                <div class="col-sm">

  <label>Flat Screen TV</label>
 
    <select class="form-control" id='flatscreen' name='flatscreen'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
        
                <div class="col-sm">

  <label>Coffee Machine</label>
 
    <select class="form-control" id='coffeemachine' name='coffeemachine'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
            
                <div class="col-sm">

  <label>Mini Bar</label>
 
    <select class="form-control" id='minibar' name='minibar'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
         
                <div class="col-sm">

  <label>Free Wifi</label>
 
    <select class="form-control" id='freewifi' name='freewifi'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
         </div>
        </div>

<br/>




 
 <div class="container">
      <div class='row'>


   <div class="col-sm">

  <label>Free Tolietries</label>
 
    <select class="form-control" id='toiletries' name='toiletries'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
      <div class="col-sm">

  <label>Bath Robe</label>
 
    <select class="form-control" id='bathrobe' name='bathrobe'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
    
    
          <div class="col-sm">

  <label>Safe</label>
 
    <select class="form-control" id='safe' name='safe'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
        
          <div class="col-sm">

  <label>Bidae</label>
 
    <select class="form-control" id='bidae' name='bidae'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
    
    
    
          <div class="col-sm">

  <label>Private Desk</label>
 
    <select class="form-control" id='desk' name='desk'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
    
    
    
          <div class="col-sm">

  <label>Slippers</label>
 
    <select class="form-control" id='slippers' name='slippers'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
          <div class="col-sm">

  <label>Iron Facility</label>
 
    <select class="form-control" id='iron' name='iron'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
        </div>
    
    </div>













<br/>




 <div class="container">
      <div class='row'>

    
        
    
          <div class="col-sm">

  <label>Hair Dryer</label>
 
    <select class="form-control" id='hairdryer' name='hairdryer'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
              <div class="col-sm">

  <label>Electric Kettle</label>
 
    <select class="form-control" id='kettle' name='kettle'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
    
    
    
    
    
        
              <div class="col-sm">

  <label>Alarm Clock</label>
 
    <select class="form-control" id='alarm' name='alarm'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
     <div class="col-sm">

  <label>Wardrobe</label>
 
    <select class="form-control" id='wardrobe' name='wardrobe'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
      <div class="col-sm">

  <label>Closet</label>
 
    <select class="form-control" id='closet' name='closet'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
       
     <div class="col-sm">

  <label>Sanatizer</label>
 
    <select class="form-control" id='sanatizer' name='sanatizer'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
       
     <div class="col-sm">

  <label>Sofa Bed</label>
 
    <select class="form-control" id='sofabed' name='sofabed'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
    </div>
    
    </div>








<br/>




 <div class="container">
      <div class='row'>
          
      
      
            <div class="col-sm">
                
      <label>Streaming</label>
 
    <select class="form-control" id='streaming' name='streaming'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
          <div id='strm' class="col-sm">
                
      <label>Streaming Source</label>
 
    <select class="form-control" id='source' name='source'>
        
        <option>Netflix</option>
        <option>Amazon Prime</option>
        <option>Local Cable</option>
        <option>Youtube</option>
       
        </select>

    </div>
    
    
    
    
            <div class="col-sm">
                
      <label>Bath</label>
 
    <select class="form-control" id='bath' name='bath'>
        
        <option>Bath Tub</option>
        <option>Shower</option>
       
        </select>

    </div>
    
    
    
    
    
     <div class="col-sm">
                
      <label>Flooring</label>
 
    <input class='form-control' name='floor' placeholder='Flooring' >

    </div>
    
    
    
     <div class="col-sm">
                
      <label>Towels</label>
 
   <input class='form-control' name='towels' placeholder='Towels' >

    </div>
    
    
    <div class="col-sm">
                
      <label>Linen</label>
 
   <input class='form-control' name='linen' placeholder='Linen' >

    </div>
    
    
    
     <div class="col-sm">
                
      <label>Sockets</label>
 
   <input class='form-control' name='sockets' placeholder='Sockets near Bed' >

    </div>
    
    
    
    
          </div>
          </div>




<br/>
 <div class="container">
      <div class='row'>
          
      
      
            <div class="col-sm">
                
      <label>Disable Friendly</label>
 
    <select class="form-control" id='disablefriendly' name='disablefriendly'>
        
        <option>Yes</option>
        <option>No</option>
       
        </select>

    </div>
    
    
    
    
      <div id='dfr' class="col-sm">
                
      <label>No. of Disable Friendly Rooms</label>
 
    <input class="form-control" id='disablerooms' name='disablerooms' type='text'>
        

    </div>
    
    
    
    
    
    
    
    
    
    
    </div>
    </div>

<br/><br/>

        
         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Room Images</label>
 <input type="file" accept="image/*" required multiple='true' class="form-control" name="filesfacilitiess[]">
        </div>
         </div>
        </div>

   
<br/>








<br/>
<br/>

   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

var alertme= document.getElementById('alertme').value;
  
  if(alertme=='1'){
    Swal.fire('Submitted Successfully')
   
    <?php
    $_SESSION['alertme']=0;
    ?>
  }
  
   else if(alertme=='2'){
    Swal.fire('Setup Completed')
   
    <?php
    $_SESSION['alertme']=0;
    ?>
  }
  





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








</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

