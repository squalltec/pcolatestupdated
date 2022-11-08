<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
   $numberofrooms=$_POST['numberofrooms']; 
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	

$roomtype=$_POST['facilitiess'];


$twin=$_POST['twin'];
$convertible=$_POST['convertible'];
$determination=$_POST['determination'];







$singledouble=$_POST['singledouble'];


$nn=0;
foreach ($roomtype as $value) {


$sql = "INSERT INTO hotelsInventorydatabase (hotel,country,city,type,suite,numberofrooms)
           VALUES ('$hotel','$country','$city','$value','$singledouble[$nn]','$numberofrooms[$nn]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;

}









$sql2 = "INSERT INTO disabletwin (hotel,location,country,roomtype,twin,convertible,disablefriendly)
           VALUES ('$hotel','$city','$country','$value','$twin[$nn]','$convertible[$nn]','$determination[$nn]')";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {




}






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
									<!--	<th>Room Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>-->
										
									
										
									<!--   <th><button class='btn btn-danger' id='addact22' onclick="myFunction22()">+</button></th> -->
						    
										
								
									</tr>
								
									
								</thead>
									     


								<tbody id="populateme">
								    
								    
								    
									<tr>
									   <!-- <button class='delbtn' onclick="this.parentNode.parentNode.removeChild(this.parentNode);">X</button>-->
			<td> <input class='form-control' required name='facilitiess[]' placeholder='Room Name' >
			
        <input type='checkbox' name='singledouble[]'><label>  Doesn't Have Double?</label></td>
										
										<td> <input class='form-control' type='number' name='twin[]' placeholder='Twin Rooms' ></td>
										<td><input class='form-control' type='number' name='convertible[]' placeholder='Convertible Rooms' ></td>
										<td><input class='form-control' type='number' name='determination[]' placeholder='Rooms for People with Detemination' ></td>
										<td> <input class='form-control' type='number' name='numberofrooms[]' placeholder='Total Rooms' ></td>
									<!--	<td> <input class='form-control' name='size[]' placeholder='Room Size' ></td>-->
									
																	
									</tr>
							
								
								</tbody>
							
							<!--	<tfoot>
									<tr>
											<th>Venue</th>
										<th>Area SQ. M</th>
										<th>Dimension</th>
										<th>Location</th>
										<th>Theater</th>
										<th>Class Room</th>
											<th>Cabaret</th>
										<th>Board Room</th>
										<th>U Shape</th>
										<th>Banquet Dinner</th>
										<th>Cocktail Reception</th>
										
									</tr>
								</tfoot> -->
							</table>
						</div>
					</div>
				</div>
        
        
        
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
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
        
        
 <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 




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













<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});



var n=1;

function myFunction2() {
    
 var populateme = document.getElementById("populateme");    
    
  var tr=   document.createElement("tr"); 
  
  var td1=   document.createElement("td"); 
  var td2=   document.createElement("td"); 
  var td3=   document.createElement("td"); 
  var td4=   document.createElement("td"); 
  var td5=   document.createElement("td"); 
  var td6=   document.createElement("td"); 
    
 


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

var ychl = document.createElement("label");


ychl.innerHTML="Doesn't Have Double?";



td1.appendChild(yc);
//td1.appendChild(ycbtn);
td1.appendChild(ych);
td1.appendChild(ychl);






var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "twin[]");
yc1.setAttribute("type", "number");
yc1.setAttribute("placeholder", "Twin Rooms");

td2.appendChild(yc1);


var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "convertible[]");
yc2.setAttribute("type", "number");
yc2.setAttribute("placeholder", "Convertible Rooms");

td3.appendChild(yc2);

var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "determination[]");
yc3.setAttribute("type", "number");
yc3.setAttribute("placeholder", "Rooms for People with Determination");

td4.appendChild(yc3);


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
tr.appendChild(td5);
//tr.appendChild(td6);


populateme.appendChild(tr);






 n=n+1;
 
}

</script>














</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

