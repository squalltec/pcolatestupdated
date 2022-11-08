<?php
require_once('db_connection.php');


include('header.php');

if (isset($_POST['submit'])) {
    
    
$hotel=$_SESSION['hotel'];	

$star=$_SESSION['star'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	


$fname=$_POST['fname'];

$lname=$_POST['lname'];

$designation=$_POST['designation'];

$department=$_POST['department'];

$phone=$_POST['phone'];

$nationality=$_POST['nationality'];

$birthday=$_POST['birthday'];

//$role=$_POST['role'];

$email=$_POST['email'];

$password=$_POST['password'];


$nn=0;
foreach ($fname as $value) {
   
   
   $role = implode(", ", $_POST['rights'.$nn]); 
 
    
   
    echo $role;
    

    

$sql = "INSERT INTO hotelusers (hotel,country,city,star,fname,lname,designation,department,phone,nationality,birthday,role,email,password)
           VALUES ('$hotel','$country','$city','$star','$fname[$nn]','$lname[$nn]','$designation[$nn]','$department[$nn]','$phone[$nn]','$nationality[$nn]','$birthday[$nn]','$role','$email[$nn]','$password[$nn]')";
		  
 $resulta = $conn->query($sql);


if ($resulta === TRUE) {


	$_SESSION['alertme']=1;
	
	
}


$nn=$nn+1;
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
              
              <h1  align='center'>Create User</h1>
<form action="#" method="post" enctype="multipart/form-data">
   
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     <!-- NEW START -->
   <style>
       #example2_info{
        display:none;   
       }
       .dt-buttons{
         display:none;  
       }
   </style>
				
				
			
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
				
			
				
			
				<div class="card">
					<div class="card-body">
						<div style='width:100%;'  class="table-responsive">
						
					
							<table data-paging='false' id="example2" class="table table-striped table-bordered">
								<thead>
								
									<tr align="center" >
										<th>First Name</th>
											<th>Last Name</th>
												<th>Designation</th>
												<th>Department</th>
												<th>Phone</th>
												<th>Nationality</th>
												<th>Birthday</th>
												<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Role&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th>Email</th>
												<th>Password</th>
									
									
									</tr>
							
							
								</thead>
								
								<style>
								    #example2_filter{
								        float:right;
								        margin-right:5px;
								    }
								</style>
								<tbody id="populateme">
							
									<tr>
									
									
									<td>
	<input class="form-control" required="" name="fname[]" placeholder="First Name">
									</td>
		
									<td>
	<input class="form-control" required="" name="lname[]" placeholder="Last Name">
									</td>	
									
		
									<td>
	<input class="form-control" required="" name="designation[]" placeholder="Designation">
									</td>
									
		
									<td>
	<input class="form-control" required="" name="department[]" placeholder="Department">
									</td>
	
		
									<td>
	<input class="form-control" required="" name="phone[]" placeholder="Phone">
									</td>
									
		
									<td>
	<input class="form-control" required="" name="nationality[]" placeholder="Nationality">
									</td>
									
		
									<td>
	<input class="form-control" type='date' required="" name="birthday[]" placeholder="Birthday">
									</td>								
	
	
	
	
	<td>
	    
	    <input name='rights0[]' id='admin0' data-id='0' onclick='dis(this);' value='admin' type='checkbox'><label for 'admin0'>Admin</label><br/>
	    <input name='rights0[]' id='accounts0' value='accounts' type='checkbox'><label for 'accounts0'>Accounts</label><br/>
	    <input name='rights0[]' id='management0' value='management' type='checkbox'><label for 'management0'>Management</label><br/>
	    <input name='rights0[]' id='revenue0' value='revenue' type='checkbox'><label for 'revenue0'>Revenue</label>
	    
<!--
<select name='role[]' class='form-control'>
    <option>Admin</option>
<option>Accounts</option>
<option>Management</option>
<option>Revenue</option>
    </select>
-->
	</td>
	
	
	
		
									<td>
	<input class="form-control" required="" name="email[]" placeholder="Email">
									</td>
									
	
		
									<td>
	<input class="form-control" id='password0' type='password' required="" name="password[]" placeholder="Password">
	<input type="checkbox" id='p0' data-id='0' onclick="password(this)"><label for='p0'>Show Password</label>
									</td>
									
									
									
									
									
									
									
									
									</tr>
								</tbody>
								
							
							</table>
							   <br/><br/>
 <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 
						</div>
					</div>
				</div>
		





<script>
    function dis($this){
        
        
        var aid=$this.getAttribute('data-id');
        
        
        if(document.getElementById('admin'+aid).checked)
        
        {
           document.getElementById('accounts'+aid).checked=false; 
           document.getElementById('accounts'+aid).disabled=true;
            document.getElementById('management'+aid).checked=false; 
           document.getElementById('management'+aid).disabled=true;
            document.getElementById('revenue'+aid).checked=false; 
           document.getElementById('revenue'+aid).disabled=true;
           
           
        }
        else{
           
           
            
           document.getElementById('accounts'+aid).disabled=false;
           document.getElementById('management'+aid).disabled=false;
           document.getElementById('revenue'+aid).disabled=false;
           
           
            
        }
        
    }
</script>


<script>
    function password($this) {
      var aid= $this.getAttribute('data-id');
        
  var x = document.getElementById("password"+aid);
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}







</script>


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
 <button style="float:right;"type="submit" name='submit'class="btn btn-danger">Create</button>
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
yc.setAttribute("Name", "fname[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "First Name");

var ycbtn = document.createElement("BUTTON");
ycbtn.setAttribute('name','delbtn');
ycbtn.setAttribute('onclick','this.parentNode.parentNode.removeChild(this.parentNode);')
ycbtn.innerHTML='X';
ycbtn.setAttribute('class','delbtn');



td1.appendChild(yc);
//td1.appendChild(ycbtn);

var yc1 = document.createElement("INPUT");

yc1.setAttribute("class", "form-control");
yc1.setAttribute("Name", "lname[]");
yc1.setAttribute("placeholder", "Last Name");

td2.appendChild(yc1);


var yc2 = document.createElement("INPUT");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "designation[]");

yc2.setAttribute("placeholder", "Designation");

td3.appendChild(yc2);

var yc3 = document.createElement("INPUT");

yc3.setAttribute("class", "form-control");
yc3.setAttribute("Name", "department[]");
yc3.setAttribute("placeholder", "Department");

td4.appendChild(yc3);


//asjkdjaskjdaskdasd



var yca1 = document.createElement("INPUT");

yca1.setAttribute("class", "form-control");
yca1.setAttribute("Name", "phone[]");
yca1.setAttribute("placeholder", "Phone");

tda1.appendChild(yca1);


var yca2 = document.createElement("INPUT");

yca2.setAttribute("class", "form-control");
yca2.setAttribute("Name", "nationality[]");
yca2.setAttribute("placeholder", "Nationality");

tda2.appendChild(yca2);



var yca3 = document.createElement("INPUT");

yca3.setAttribute("class", "form-control");
yca3.setAttribute("Name", "birthday[]");
yca3.setAttribute("type", "date");

tda3.appendChild(yca3);





/*

var yca36 = document.createElement("SELECT");

yca36.setAttribute("class", "form-control");
yca36.setAttribute("Name", "role[]");


var yca3c6 = document.createElement("OPTION");
yca3c6.innerHTML='Admin';
var yca3c7 = document.createElement("OPTION");
yca3c7.innerHTML='Accounts';
var yca3c8 = document.createElement("OPTION");
yca3c8.innerHTML='Management';
var yca3c9 = document.createElement("OPTION");
yca3c9.innerHTML='Revenue';

yca36.appendChild(yca3c6);
yca36.appendChild(yca3c7);
yca36.appendChild(yca3c8);
yca36.appendChild(yca3c9);

tda6.appendChild(yca36);*/


var yca36 = document.createElement("INPUT");
yca36.setAttribute("name", "rights"+n+"[]");
yca36.setAttribute("id", "admin"+n);
yca36.setAttribute("type", "checkbox");
yca36.setAttribute("onclick", "dis(this)");
yca36.setAttribute("data-id", n);
 
yca36.setAttribute("value", "admin");
var yca36l = document.createElement("LABEL");
yca36l.innerHTML='Admin<br/>';
var yca36b = document.createElement("br");

var yca37 = document.createElement("INPUT");
yca37.setAttribute("name", "rights"+n+"[]");
yca37.setAttribute("id", "accounts"+n);
yca37.setAttribute("type", "checkbox");
yca37.setAttribute("value", "accounts");
var yca37l = document.createElement("LABEL");
yca37l.innerHTML='Accounts<br/>';
var yca37b = document.createElement("br");

var yca38 = document.createElement("INPUT");
yca38.setAttribute("name", "rights"+n+"[]");
yca38.setAttribute("id", "management"+n);
yca38.setAttribute("type", "checkbox");
yca38.setAttribute("value", "management");
var yca38l = document.createElement("LABEL");
yca38l.innerHTML='Management';
var yca38b = document.createElement("br");

var yca39 = document.createElement("INPUT");
yca39.setAttribute("name", "rights"+n+"[]");
yca39.setAttribute("id", "revenue"+n);
yca39.setAttribute("type", "checkbox");
yca39.setAttribute("value", "revenue");
var yca39l = document.createElement("LABEL");
yca39l.innerHTML='Revenue';
var yca39b = document.createElement("br");
 


tda6.appendChild(yca36);
tda6.appendChild(yca36l);
tda6.appendChild(yca36b);
tda6.appendChild(yca37);
tda6.appendChild(yca37l);
tda6.appendChild(yca37b);
tda6.appendChild(yca38);
tda6.appendChild(yca38l);
tda6.appendChild(yca38b);
tda6.appendChild(yca39);
tda6.appendChild(yca39l);
tda6.appendChild(yca39b);






var yca4 = document.createElement("INPUT");

yca4.setAttribute("class", "form-control");
yca4.setAttribute("Name", "email[]");
yca4.setAttribute("placeholder", "Email");
yca4.setAttribute("type", "email");

tda4.appendChild(yca4);


var yca5 = document.createElement("INPUT");

yca5.setAttribute("class", "form-control");
yca5.setAttribute("id", "password"+n);
yca5.setAttribute("Name", "password[]");
yca5.setAttribute("placeholder", "Password");
yca5.setAttribute("type", "password");

tda5.appendChild(yca5);




var yca500 = document.createElement("INPUT");
yca500.setAttribute("id", "p"+n);
yca500.setAttribute("type", "checkbox");
yca500.setAttribute("onclick", "password(this)");
yca500.setAttribute("data-id",n);

tda5.appendChild(yca500);

var yca50 = document.createElement("LABEL");
yca50.setAttribute("for", "p"+n);
yca50.innerHTML='Show Password';

tda5.appendChild(yca50);





tr.appendChild(td1);
tr.appendChild(td2);
tr.appendChild(td3);
tr.appendChild(td4);


tr.appendChild(tda1);
tr.appendChild(tda2);
tr.appendChild(tda3);
tr.appendChild(tda6);
tr.appendChild(tda4);
tr.appendChild(tda5);



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

