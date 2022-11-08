<?php
require_once('db_connection.php');

include('header.php');

    

   
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];      


if (isset($_POST['submit'])) {
    
    
    
    $venues=$_POST['venue'];
    $area=$_POST['area'];
    $dimension=$_POST['dimension'];
    
    $location=$_POST['location'];
    $theater=$_POST['theater'];
    $classroom=$_POST['classroom'];
    $cabaret=$_POST['cabaret'];
    $boardroom=$_POST['boardroom'];
    $ushape=$_POST['ushape'];
    $banquetdinner=$_POST['banquetdinner'];
    $cocktailreception=$_POST['cocktailreception'];
    
    
    $nn=0;
    
    foreach ($venues as $venue)
    {
    
    $sql="INSERT INTO meetingbanquetplanner (hotel,country,city,venue,area,dimension,location,theater,classroom,cabaret,boardroom,ushape,banquetdinner,cocktailreception) VALUES ('$hotel','$country','$city','$venue','$area[$nn]','$dimension[$nn]','$location[$nn]','$theater[$nn]','$classroom[$nn]','$cabaret[$nn]','$boardroom[$nn]','$ushape[$nn]','$banquetdinner[$nn]','$cocktailreception[$nn]')";
    
    
    
    
     $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;

}
    
    
    
    $nn+1;
    }
    
   
   
   echo "<script>location.replace('generalfacilities.php');</script>"; 
    
}



 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1  align='center'>Add Meeting and Banquet Planner</h1>
<form action="#" method="post" enctype="multipart/form-data">
     <h3  align='center'>Ball & Meeting Rooms Dimension/ Capacities</h3>
<style>
    .delbtn{
        font-size:10px; 
        right:30px; 
        position:absolute;
    }
</style>


        <br/>
        
        
        
        
        
       
        <div class="card">
					<div class="card-body">
						<div class="table-responsive">
						    
							<table id="example2" class="table table-striped table-bordered">
							  
								<thead>
									<tr id='populateme2'>
									    
										
										    <th>Venue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Area SQ. M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Dimension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Theater&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Class Room&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
											<th>Cabaret&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Board Room&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>U Shape&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Banquet Dinner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
										<th>Cocktail Reception&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
									
										
									<!--   <th><button class='btn btn-danger' id='addact22' onclick="myFunction22()">+</button></th> -->
						    
										
								
									</tr>
								
									
								</thead>
									     


								<tbody id="populateme">
								    
								    
								    
									<tr>
										<td><input class='form-control' name='venue[]' placeholder='Venue' ></td>
										<td> <input class='form-control' name='area[]' placeholder='Area SQ. M' ></td>
										<td> <input class='form-control' name='dimension[]' placeholder='Dimension' ></td>
										<td><input class='form-control' name='location[]' placeholder='Location' ></td>
										<td><input class='form-control' name='theater[]' placeholder='Theater' ></td>
										<td> <input class='form-control' name='classroom[]' placeholder='Class Room' ></td>
										<td><input class='form-control' name='cabaret[]' placeholder='Cabaret' ></td>
											<td> <input class='form-control' name='boardroom[]' placeholder='Board Room' ></td>
												<td><input class='form-control' name='ushape[]' placeholder='U Shape' ></td>
													<td><input class='form-control' name='banquetdinner[]' placeholder='Banquet Dinner' ></td>
														<td><input class='form-control' name='cocktailreception[]' placeholder='Cocktail Reception' ></td>
																	
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
        
        
        
        
        
 <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">Add New</button></h1> 




<br/>


<br/>
<br/>


   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Save</button>
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

document.getElementById("addact22").addEventListener("click", function(event){
  event.preventDefault()
});

var n=1;




function myFunction22() {
    
 var act2 = document.getElementById("populateme2"); 
  
 
 var th=document.createElement('th');
 
 th.innerHTML='abc';
 
 act2.appendChild(th);
 
 
 
 
 
}















function myFunction2() {
    
 var act = document.getElementById("populateme"); 
 
  var tr = document.createElement("tr"); 
  
  var td1 = document.createElement("td"); 
  var td2 = document.createElement("td"); 
  var td3 = document.createElement("td"); 
  var td4 = document.createElement("td"); 
  var td5 = document.createElement("td"); 
  var td6 = document.createElement("td"); 
  var td7 = document.createElement("td"); 
  var td8 = document.createElement("td"); 
  var td9 = document.createElement("td"); 
  var td10 = document.createElement("td"); 
  var td11 = document.createElement("td"); 
 
 

var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "venue[]");
yc1.setAttribute("type", "text");
yc1.setAttribute("placeholder", "Venue");



var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "area[]");
yc2.setAttribute("type", "text");
yc2.setAttribute("placeholder", "Area SQ. M");


var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "dimension[]");
yc3.setAttribute("type", "text");
yc3.setAttribute("placeholder", "Dimension");

var yc4 = document.createElement("INPUT");

yc4.setAttribute("class", "form-control");
yc4.setAttribute("Name", "location[]");
yc4.setAttribute("type", "text");
yc4.setAttribute("placeholder", "Location");


var yc5 = document.createElement("INPUT");

yc5.setAttribute("class", "form-control");
yc5.setAttribute("Name", "theater[]");
yc5.setAttribute("type", "text");
yc5.setAttribute("placeholder", "Theater");

var yc6 = document.createElement("INPUT");

yc6.setAttribute("class", "form-control");
yc6.setAttribute("Name", "classroom[]");
yc6.setAttribute("type", "text");
yc6.setAttribute("placeholder", "Class Room");

var yc7 = document.createElement("INPUT");

yc7.setAttribute("class", "form-control");
yc7.setAttribute("Name", "cabaret[]");
yc7.setAttribute("type", "text");
yc7.setAttribute("placeholder", "Cabaret");

var yc8 = document.createElement("INPUT");

yc8.setAttribute("class", "form-control");
yc8.setAttribute("Name", "boardroom[]");
yc8.setAttribute("type", "text");
yc8.setAttribute("placeholder", "Board Room");

var yc9 = document.createElement("INPUT");

yc9.setAttribute("class", "form-control");
yc9.setAttribute("Name", "ushape[]");
yc9.setAttribute("type", "text");
yc9.setAttribute("placeholder", "U Shape");

var yc10 = document.createElement("INPUT");

yc10.setAttribute("class", "form-control");
yc10.setAttribute("Name", "banquetdinner[]");
yc10.setAttribute("type", "text");
yc10.setAttribute("placeholder", "Banquet Dinner");

var yc11 = document.createElement("INPUT");

yc11.setAttribute("class", "form-control");
yc11.setAttribute("Name", "cocktailreception[]");
yc11.setAttribute("type", "text");
yc11.setAttribute("placeholder", "Cocktail Reception");


td1.appendChild(yc1);
td2.appendChild(yc2);
td3.appendChild(yc3);
td4.appendChild(yc4);
td5.appendChild(yc5);
td6.appendChild(yc6);
td7.appendChild(yc7);
td8.appendChild(yc8);
td9.appendChild(yc9);
td10.appendChild(yc10);
td11.appendChild(yc11);






tr.appendChild(td1);

tr.appendChild(td2);

tr.appendChild(td3);

tr.appendChild(td4);

tr.appendChild(td5);

tr.appendChild(td6);

tr.appendChild(td7);

tr.appendChild(td8);

tr.appendChild(td9);

tr.appendChild(td10);

tr.appendChild(td11);





var ycbtn = document.createElement("BUTTON");
ycbtn.setAttribute('name','delbtn');
ycbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);')
ycbtn.innerHTML='X';
ycbtn.setAttribute('class','delbtn');


//tr.appendChild(ycbtn);

act.appendChild(tr);

 n=n+1;
 
}

</script>














</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

