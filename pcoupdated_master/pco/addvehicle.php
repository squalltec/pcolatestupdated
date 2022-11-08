<?php
require_once('db_connection.php');


include('header.php');



if (isset($_POST['submit'])) {
	
$name=$_POST['name'];	

$description =$_POST['description'];

$doors=$_POST['doors'];

$type=$_POST['type'];

$maximum=$_POST['maximum'];

$luggages=$_POST['luggages'];

$capacity=$_POST['capacity'];

$price=$_POST['price'];


	mkdir("Vehicle Images/".$name);	
	

		
		
		
		
	  $filename = $_FILES['myfile']['name'];
	  $destination = 'Vehicle Images/'. $name . '/' . $filename;
	  $extension = pathinfo($filename, PATHINFO_EXTENSION);
	  $file = $_FILES['myfile']['tmp_name'];


 // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {




$sql ="INSERT INTO vehicles (name, description,doors,type,maximum,luggages,capacity,price,image) VALUES ('$name', '$description', '$doors', '$type', '$maximum', '$luggages', '$capacity', '$price', '$filename')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



		}
}

 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
<form action="#" method="post" enctype="multipart/form-data">


<div class="form-group">


<h2 align='center'>Add Vehicle</h2>

</div>
<div>
<div class="form-group">
    <label>Vehicle Name</label>
    <input type="text" class="form-control" name='name' placeholder="Vehicle Name">
  </div>
  
  <div class="form-group">
    <label>Registration Number</label>
    <input type="text" class="form-control" name='registrationnumber' placeholder="Reg #">
  </div>
  
  <div class="form-group">
    <label>Model</label>
    <input type="text" class="form-control" name='model' placeholder="Model">
  </div>
  
   <div class="form-group">
    <label>Chassis Number</label>
    <input type="text" class="form-control" name='chassis' placeholder="Chassis #">
  </div>
  
  <div class="form-group">
    <label>Vehicle Color</label>
    <input type="color" class="" name='color'>
  </div>
  
   <div class="form-group">
    <label>Registration Expiry Date</label>
    <input type="date" class="form-control" name='chassis' placeholder="Chassis #">
  </div>
  
  
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Doors</label>
    <select class="form-control" name="doors">

      <option value='5'>5 </option>
      <option value='4'>4 </option>
      <option value='3'>3 </option>
      <option value='2'>2 </option>
      <option value='1'>1 </option>
    </select>
  </div>
  
  <div class="form-group">
    <label>Type</label>
    <select class="form-control" name="type">
	
	<option>Standard</option>
<option>Luxury</option>
<option>Limousine</option>


    </select>
  </div>
  

  
 
  <div class="form-group">
    <label>Upload Image</label>
    <input type="file" class="form-control" name='myfile'>
  </div>
  
  
  
  
  
  <label><b>Features:</b></label>
  
  <div class="form-group">
    <label>Maximum Persons Allowed</label>
	
   <input type="text" class="form-control" name='maximum'>
	<br/>
	<label>Luggages Allowed</label>
	
   <input type="text" class="form-control" name='luggages'>
	<br/>
	<label>Seating Capacity</label>
	
   <input type="text" class="form-control" name='capacity'>
	<br/>
	

  </div>
  
  
  
  
  <div class="form-group">
    <label>Price / KM</label>
    <input type="number" class="form-control" name='price' >
  </div>
  
  
  
  
   <div class="form-group">
 <button style="float:right;"type="submit" name='submit'class="btn btn-primary">Submit</button>
  </div>
  
  </div>
</form>


</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

