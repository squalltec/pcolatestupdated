<?php


require_once('db_connection.php');


include('header.php');

$_SESSION['step']='5';

$hotelnaam=$_SESSION['hotelname'];
$countrynaam=$_SESSION['countryname'];
$locationnaam=$_SESSION['locationname'];
$rinfo=$_SESSION['regionalinfo'];




if (isset($_POST['submit'])) {
	
	
	$getbreakfast = $_POST['breakfast'];
	$getlunch = $_POST['lunch'];
	$getdinner = $_POST['dinner'];
	$getextrabed = $_POST['extrabed'];
	
	
	
	

$sql ="INSERT INTO basiccharges (hotel, country,location,breakfast,lunch,dinner,extrabed,regionalinfo) VALUES ('$hotelnaam', '$countrynaam', '$locationnaam', '$getbreakfast', '$getlunch', '$getdinner', '$getextrabed', '$rinfo')";


 $result = $conn->query($sql);


if ($result === TRUE) {
  echo "New record created successfully";
  echo "<script>location.replace('eventspricing.php');</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}	
	
}

?>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">

<h1>For <?php echo $_SESSION['regionalinfo'];?> Region</h1>
<h2 align="center">Meal Supplements</h2>
<br/><br/>




<form method="POST" enctype="multipart/form-data">



<input type="number" name="breakfast" placeholder="Price for Breakfast">

<input type="number" name="lunch" placeholder="Price for Lunch">

<input type="number" name="dinner" placeholder="Price for Dinner">

<input type="number" name="extrabed" placeholder="Price for Extra Bed">





<input type="submit" style=" float:right;" class="name btn btn-dark" value="submit" name="submit">
</form>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

</main>