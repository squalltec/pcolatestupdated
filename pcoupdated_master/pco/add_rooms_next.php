<?php

require_once('db_connection.php');


include('header.php');


$hn= $_SESSION['hotelname'];
$cn= $_SESSION['countryname'];
$an= $_SESSION['addressname'];


$classic="";
$premium="";
$premiumplus="";
$clubroom="";
$premiumsuite="";
$familyroom="";



$c="";
$p="";
$pp="";
$cr="";
$ps="";
$fr="";

	
$sqll ="SELECT * FROM hotels WHERE name='$hn' && country='$cn' && location='$an'";
		$resultt = $conn->query($sqll);

 
 
	
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  $classic=$roww["c"];
	  $premium=$roww["p"];
	  $premiumplus=$roww["pp"];
	  $clubroom=$roww["cr"];
	  $premiumsuite=$roww["ps"];
	  $familyroom=$roww["fr"];
	  
	  
}

}
	 

if (isset($_POST['submit'])) {
	
	

$c=$_POST['classicrooms'];
$p=$_POST['premiumrooms'];
$pp=$_POST['premiumplusrooms'];
$cr=$_POST['clubrooms'];
$ps=$_POST['premiumsuiterooms'];
$fr=$_POST['familyrooms'];





$sql ="INSERT INTO rooms (name, country,address,c,p,pp,cr,ps,fr) VALUES ('$hn', '$cn', '$an', '$c', '$p', '$pp', '$cr', '$ps', '$fr')";

 $result = $conn->query($sql);


if ($result === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






	
}

 
 ?>
 


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">
<form action="#" method="post" enctype="multipart/form-data">



<input style="display:none;" name="classicrooms">
<input style="display:none;" name="premiumrooms">
<input style="display:none;" name="premiumplusrooms">
<input style="display:none;" name="clubrooms">
<input style="display:none;" name="premiumsuiterooms">
<input style="display:none;" name="familyrooms">





<div class="form-group">


<h2 align='center'>Add Rooms</h2>

</div>

<div>













<?php 

if($classic=='1')
{

?>


 <div style="background-color:#f4f0ec;" class="form-group">
  <label>Classic Room</label><br/>
 
   <input type="number" name="classicrooms" class="form-control" placeholder="Number of Classic Rooms">
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  
  
  
  <?php 

if($premium=='1')
{

?>


 <div style="background-color:#f4f0ec;"  class="form-group">
  <label>Premium Room</label><br/>
   <input type="number" name="premiumrooms" class="form-control" placeholder="Number of Premium Rooms">
  
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  
  
  <?php 

if($premiumplus=='1')
{

?>


 <div style="background-color:#f4f0ec;"  class="form-group">
  <label>Premium Plus Room</label><br/>
   <input type="number" name="premiumplusrooms" class="form-control" placeholder="Number of Premium Plus Rooms">
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  
  <?php 

if($clubroom=='1')
{

?>


 <div style="background-color:#f4f0ec;" class="form-group">
  <label>Club Room</label><br/>
   <input type="number" name='clubrooms' class="form-control" placeholder="Number of Club Rooms">
  
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  
  <?php 

if($premiumsuite=='1')
{

?>


 <div style="background-color:#f4f0ec;" class="form-group">
  <label>Premium Suite</label><br/>
   <input type="number" class="form-control" name='premiumsuiterooms' placeholder="Number of Premium Suites">
  
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  <?php 

if($familyroom=='1')
{

?>


 <div style="background-color:#f4f0ec;" class="form-group">
  <label>Family Room</label><br/>
   <input type="number" class="form-control" name='familyrooms' placeholder="Number of Family Rooms">
  
  </div>
  
  
  
  <?php
  
}

  ?>
  
  
  
  
  
  
  
  </div>
  
  
  <input style="float:right;" type="submit" value="Submit" name="submit">
  
</form>
 </br>
  </br>
   </br>

</main>







