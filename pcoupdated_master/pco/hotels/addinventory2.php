<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
   $numberofrooms=$_POST['numberofrooms']; 
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$roomtype=$_POST['facilitiess'];


$singlesize=$_POST['singlesize'];
$doublesize=$_POST['doublesize'];

$singleadultssleep=$_POST['singleadultssleep'];
$singlechildrensleep=$_POST['singlechildrensleep'];
$singleextrabedsleep=$_POST['singleextrabedsleep'];

$doubleadultssleep=$_POST['doubleadultssleep'];
$doublechildrensleep=$_POST['doublechildrensleep'];
$doubleextrabedsleep=$_POST['doubleextrabedsleep'];

$view=$_POST['view'];

$numberofrooms=$_POST['numberofrooms'];



$singledouble=array();


$nn=0;
foreach ($roomtype as $value) {


if($singlesize[$nn]=='' ||$singlesize[$nn]=='-' ||$singlesize[$nn]=='0'|| $doublesize[$nn]=='' ||$doublesize[$nn]=='0'||$doublesize[$nn]=='-')
{
    array_push($singledouble,'on');
    $sd='on';
}
else{
    array_push($singledouble,'');
    $sd='';
}

$sql = "INSERT INTO hotelsInventorydatabase (hotel,country,city,type,suite,numberofrooms,roomsize,roomsizedouble,singleadultoccupancy,singlechildoccupancy,singleextrabedsallowed,doubleadultoccupancy,doublechildoccupancy,doubleextrabedsallowed,view)
           VALUES ('$hotel','$country','$city','$value','$sd','$numberofrooms[$nn]','$singlesize[$nn]','$doublesize[$nn]','$singleadultssleep[$nn]','$singlechildrensleep[$nn]','$singleextrabedsleep[$nn]','$doubleadultssleep[$nn]','$doublechildrensleep[$nn]','$doubleextrabedsleep[$nn]','$view[$nn]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//images
	
	
	
 
 mkdir("../Room Uploads/".$hotel."/".$value, 0755, true);	

 $uploadsDir = "../Room Uploads/".$hotel."/".$value."/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['photos'.$nn]['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['photos'.$nn]['name'][$id];
                $tempLocation    = $_FILES['photos'.$nn]['tmp_name'][$id];
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
		
 
 
 
 
	
	
	
	//images end
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}








/*
$sql2 = "INSERT INTO disabletwin (hotel,location,country,roomtype,twin,convertible,disablefriendly)
           VALUES ('$hotel','$city','$country','$value','$twin[$nn]','$convertible[$nn]','$determination[$nn]')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {




}

*/




$nn=$nn+1;
}


$_SESSION['roomname']=$roomtype;


$_SESSION['singledouble']=$singledouble;



$_SESSION['roomnamecount']='0';
	
	
echo "<script>location.replace('addinventory3.php');</script>";



  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1  align='center'>Add Inventory</h1>
<form action="#" method="post" enctype="multipart/form-data">
     <h3  align='center'>Room Names</h3>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     <!-- NEW START -->
   <style>
       #example2_info{
        display:none;   
       }
       .dt-buttons{
         display:none;  
       }
   </style>
				
			
				<div class="card">
					<div class="card-body">
						<div style='width:100%;'  class="table-responsive">
						
					
							<table data-paging='false' id="example2" class="table table-striped table-bordered">
								<thead>
								
									<tr align="center" >
										<th style='' rowspan="2">Room Type</th>
									
									
										<th style=''  colspan='2'>Room Size </th >
										        
										        
										        
										<th style=''  colspan='6'>Sleeps</th>
									
									
									
										<th style='' rowspan="2">View</th>
										<th style='min-width:100px;' rowspan="2">Photos</th>
										<th style='' rowspan="2">Total Rooms</th>
									</tr>
									<tr align="center" >
									    
									    <td style='' >Single</td>
									    <td style='' >Double</td>
									    
									     <td style='' colspan='3'>Single</td>
									    <td style='' colspan='3'>Double</td>
									   
									    	
									</tr>
								<tr  align="center">
								    <td></td>
								    <td></td>
								    <td></td>
								    
								    <td>Adults</td>
									    <td>Children</td>
									     <td>Extra Bed</td>
									     <td>Adults</td>
									    <td>Children</td>
									     <td>Extra Bed</td>
									     <td></td>
								    <td></td>
								    <td></td>
								    
									     
								</tr>
							
								</thead>
								
								<style>
								    #example2_filter{
								        float:right;
								        margin-right:5px;
								    }
								</style>
								<tbody id="populateme">
							
									<tr  >
									
									
									<td>
									<input class="form-control" required="" name="facilitiess[]" placeholder="Room Name">
<input align="left" type="checkbox" style='display:none;' name="singledouble[]"><label style='display:none;'> Doesn't Have Double?</label>
									</td>
									<td>
							<input class="form-control"  name="singlesize[]" placeholder="Single Size">			    
									</td>
									<td>
					<input class="form-control"  name="doublesize[]" placeholder="Double Size">
									</td>
									<td>
									    	<input class="form-control"  name="singleadultssleep[]" placeholder="Single Adults Sleeps">
									</td>
									<td>
									   <input class="form-control"  name="singlechildrensleep[]" placeholder="Single Children Sleeps">
									</td>
									<td>
		<input class="form-control" name="singleextrabedsleep[]" placeholder="Single Extra Beds">
									</td>
									<td>
									    	<input class="form-control"  name="doubleadultssleep[]" placeholder="Double Adults Sleeps">
									</td>
									<td>
									   <input class="form-control"  name="doublechildrensleep[]" placeholder="Double Children Sleeps">
									</td>
									<td>
		<input class="form-control"  name="doubleextrabedsleep[]" placeholder="Double Extra Beds">
									</td>
									<td>
					<input class="form-control"  name="view[]" placeholder="View">
									</td>
									<td>
	<input type='file' class="form-control" multiple='true'  name="photos0[]" placeholder="Photos">
									</td>
									<td>
									   <input class="form-control" type="number" name="numberofrooms[]" placeholder="Total Rooms">
									</td>
									
									
									
									
									
									</tr>
								</tbody>
								
							
							</table>
							   
 <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 
						</div>
					</div>
				</div>
		



  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>
	
     <!--NEW END -->
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     <!--
     
     
     
      <div class="card">
					<div class="card-body">
						<div class="table-responsive">
						    
							<table id="example2" class="table table-striped table-bordered">
							  
								<thead>
									<tr id='populateme2'>
									    
										
										    <th>Room Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Twin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Convertible (to Twin)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>With Determination&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Total Rooms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								
								
									</tr>
								
									
								</thead>
									     


								<tbody id="populateme">
								    
								    
								    
									<tr>
									  
			<td> <input class='form-control' required name='facilitiess[]' placeholder='Room Name' >
			
        <input type='checkbox' name='singledouble[]'><label>  Doesn't Have Double?</label></td>
										
										<td> <input class='form-control' type='number' name='twin[]' placeholder='Twin Rooms' ></td>
										<td><input class='form-control' type='number' name='convertible[]' placeholder='Convertible Rooms' ></td>
										<td><input class='form-control' type='number' name='determination[]' placeholder='Rooms for People with Detemination' ></td>
										<td> <input class='form-control' type='number' name='numberofrooms[]' placeholder='Total Rooms' ></td>
								
																	
									</tr>
							
								
								</tbody>
							
						
							</table>
						</div>
					</div>
				</div>
        
        
        
     
     
     
     -->
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
<style>
    .delbtn{
        font-size:10px; 
        right:30px; 
        position:absolute;
    }
</style>


     <!--   <br/>
        <div>
        <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>
        <input class='form-control' required name='facilitiess[]' placeholder='Room Name' >
        <input type='checkbox' name='singledouble[]'><label>  Doesn't Have Single or Double?</label>
       
        </div>
        
        
        <div id='aacctt2'>
            
        </div>
        -->
        
 



<br/>
<br/>
<br/>


   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Next</button>
  </div>
  
  </div>
</form>
<br/><br/><br/>


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
var counting=1;
function myFunction2() {
    
 var populateme = document.getElementById("populateme");    
    
  var tr=   document.createElement("tr"); 
  
  var td1=   document.createElement("td"); 
  var td2=   document.createElement("td"); 
  var td3=   document.createElement("td"); 
  var td4=   document.createElement("td"); 
  var td5=   document.createElement("td"); 
  var td6=   document.createElement("td"); 
    
  var tda1=   document.createElement("td"); 
  var tda2=   document.createElement("td"); 
  var tda3=   document.createElement("td"); 
  var tda4=   document.createElement("td"); 
  var tda5=   document.createElement("td"); 
  var tda6=   document.createElement("td"); 
  var tda7=   document.createElement("td"); 


var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "facilitiess[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Room Name");

var ycbtn = document.createElement("BUTTON");
ycbtn.setAttribute('name','delbtn');
ycbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);')
ycbtn.innerHTML='X';
ycbtn.setAttribute('class','delbtn');


var ych = document.createElement("INPUT");


ych.setAttribute("Name", "singledouble[]");
ych.setAttribute("type", "checkbox");
ych.style.display='none';

var ychl = document.createElement("label");


ychl.innerHTML="Doesn't Have Double?";
ychl.style.display='none';


td1.appendChild(yc);
//td1.appendChild(ycbtn);
td1.appendChild(ych);
td1.appendChild(ychl);






var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "singlesize[]");
yc1.setAttribute("placeholder", "Single Size");

td2.appendChild(yc1);


var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "doublesize[]");

yc2.setAttribute("placeholder", "Double Size");

td3.appendChild(yc2);

var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "singleadultssleep[]");
yc3.setAttribute("placeholder", "Single Adults Sleep");

td4.appendChild(yc3);


//asjkdjaskjdaskdasd



var yca1 = document.createElement("INPUT");

yca1.setAttribute("class", "form-control");
yca1.setAttribute("Name", "singlechildrensleep[]");
yca1.setAttribute("placeholder", "Single Children Sleep");

tda1.appendChild(yca1);


var yca2 = document.createElement("INPUT");

yca2.setAttribute("class", "form-control");
yca2.setAttribute("Name", "singleextrabedsleep[]");
yca2.setAttribute("placeholder", "Single Extra Beds Sleep");

tda2.appendChild(yca2);



var yca3 = document.createElement("INPUT");

yca3.setAttribute("class", "form-control");
yca3.setAttribute("Name", "doubleadultssleep[]");
yca3.setAttribute("placeholder", "Double Adults Sleep");

tda3.appendChild(yca3);






var yca4 = document.createElement("INPUT");

yca4.setAttribute("class", "form-control");
yca4.setAttribute("Name", "doublechildrensleep[]");
yca4.setAttribute("placeholder", "Double Children Sleep");

tda4.appendChild(yca4);


var yca5 = document.createElement("INPUT");

yca5.setAttribute("class", "form-control");
yca5.setAttribute("Name", "doubleextrabedsleep[]");
yca5.setAttribute("placeholder", "Double Extra Beds Sleep");

tda5.appendChild(yca5);




var yca6 = document.createElement("INPUT");

yca6.setAttribute("class", "form-control");
yca6.setAttribute("Name", "view[]");
yca6.setAttribute("placeholder", "View");

tda6.appendChild(yca6);


var yca7 = document.createElement("INPUT");

yca7.setAttribute("class", "form-control");
yca7.setAttribute("Name", "photos"+counting+"[]");
yca7.setAttribute("type", "file");
yca7.setAttribute("multiple", "true");
yca7.setAttribute("accept", "image/*");

tda7.appendChild(yca7);





//asidhjuasdkiasdkashdksad


var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "numberofrooms[]");
yc4.setAttribute("type", "number");
yc4.setAttribute("placeholder", "Total Rooms");

td5.appendChild(yc4);


/*
var yc5 = document.createElement("INPUT");

yc5.setAttribute("class", "form-control");
yc5.setAttribute("Name", "size[]");
yc5.setAttribute("type", "text");
yc5.setAttribute("placeholder", "Room Size");

td6.appendChild(yc5);


*/





tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);



tr.appendChild(tda1);
tr.appendChild(tda2);
tr.appendChild(tda3);
tr.appendChild(tda4);
tr.appendChild(tda5);

tr.appendChild(tda6);

tr.appendChild(tda7);



tr.appendChild(td5);
//tr.appendChild(td6);


populateme.appendChild(tr);






 n=n+1;
 counting=counting+1;
 
}

</script>










<style>

</style>



</main>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

