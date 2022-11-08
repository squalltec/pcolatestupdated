<?php

require_once('db_connection.php');


include('header.php');


$rinfo=$_SESSION['regionalinfo'];
$hn=$_SESSION['hotelname'];
$cn=$_SESSION['countryname'];
$ln=$_SESSION['locationname'];




if (isset($_POST['next'])) {
	
echo "<script>location.replace('sameadditionalcharges.php');</script>";
  
	
}




if (isset($_POST['submit'])) {
	
	
	
	$names=array();
	
	$release=array();
	$releases=array();
	$release1=array();
	$release1s=array();
	$release2=array();
	$release2s=array();
	
	
	
	
	$dates=array();
	$datee=array();
	
	// receive all data in an array
	$meals = $_POST['meal'];
$fields = $_POST['sfield'];
$fielde = $_POST['efield'];



	
	$roomnames = $_POST['names'];
	
	$roomrelease = $_POST['release'];
	$roomreleases = $_POST['releases'];
	$roomrelease1 = $_POST['release1'];
	$roomrelease1s = $_POST['release1s'];
	$roomrelease2 = $_POST['release2'];
	$roomrelease2s = $_POST['release2s'];
	
	
	// output / process all data
foreach ($fields as $value) {
	
	array_push($dates,$value);
 
  
}



foreach ($fielde as $value) {
	
	array_push($datee,$value);
	
  
}

	
	
// output / process all data
foreach ($roomnames as $value) {
	
	array_push($names,$value);
 
  
}


foreach ($roomrelease as $value) {
	
	array_push($release,$value);
 
  
  
}



foreach ($roomreleases as $value) {
	
	array_push($releases,$value);
 
  
  
}

foreach ($roomrelease1 as $value) {
	
	array_push($release1,$value);
 
  
  
}

foreach ($roomrelease1s as $value) {
	
	array_push($release1s,$value);
 
  
  
}

foreach ($roomrelease2 as $value) {
	
	array_push($release2,$value);
 
  
  
}

foreach ($roomrelease2s as $value) {
	
	array_push($release2s,$value);
 
  
  
}





$ind=0;
	
// output / process all data
foreach ($roomnames as $value) {
	

$sqlTpl = "INSERT INTO setprices ( hotel,country,location,name,price,sellprice,dblprice,dblsellprice,trplprice,trplsellprice,sdate,edate,mealplan,regionalinfo)
           VALUES (%s )";
		   
		   
$sqlArr = array();

foreach( $dates as $k => $v )

  $sqlArr[] = '"'.$hn.'","'.$cn.'","'.$ln.'","'.$value.'","'.$release[$ind].'","'.$releases[$ind].'","'.$release1[$ind].'","'.$release1s[$ind].'","'.$release2[$ind].'","'.$release2s[$ind].'","'.$dates[$k].'" , "'.$datee[$k].'", "'.$meals.'", "'.$rinfo.'"';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );


 $result = $conn->query($sqlStr);
 $ind=$ind+1;


if ($result === TRUE) {
  echo "New record created successfully";
  
  
  


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


 
  
}












	
	
	
}

















$sqll ="SELECT * FROM roomtypes WHERE hotel='$hn' && country='$cn' && location='$ln'";
		$resultt = $conn->query($sqll);
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">




<h1>For <?php echo $_SESSION['regionalinfo'];?> Region <br/>Add Prices</h1>
<hr>
<label class="name btn btn-dark" onclick="textBoxCreate()">New Date</label> 
<form method="POST">




<p id="myForm">

</p>



<script>
var i = 1; // Global Variable for Name
var j = 1; // Global Variable for Name


 
function textBoxCreate(){
var line = document.createElement("hr");
var l = document.createElement("label");
l.innerHTML="Start Date";

var y = document.createElement("INPUT");
y.setAttribute("type", "date");
y.setAttribute("class", "form-control");
y.setAttribute("id","startdate_"+i);
y.setAttribute("Name", "sfield[]");

document.getElementById("myForm").appendChild(line);
document.getElementById("myForm").appendChild(l);
document.getElementById("myForm").appendChild(y);
i++;

var m = document.createElement("label");
m.innerHTML="End Date";
var z = document.createElement("INPUT");
z.setAttribute("type", "date");
z.setAttribute("class", "form-control");
z.setAttribute("id","enddate_"+j);
z.setAttribute("Name", "efield[]");

document.getElementById("myForm").appendChild(m);
document.getElementById("myForm").appendChild(z);
j++;
}


</script>















<?php

	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  echo $roww['name'];
	  
	  ?>
	  
	  
	  <br/>
	  <br/>
	  <input type='text' class="form-control" name='names[]' style="display:none;" value="<?php echo $roww['name'];?>">
	  <hr><hr>
	   <label>Meal Plan</label><br/>
	  <select class="form-control" name='meal'>
	  <option>Room Only</option>
	  <option>Bed and Breakfast</option>
	  <option>Half Board (Bed + Breakfast + Lunch)</option>
	  <option>Full Board (Breakfast + Lunch + Dinner)</option>
	  <option>All Inclusive</option>
	  </select>
	  <hr><hr>
	 
	   <label>Single Buy Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Bought Rate of Single <?php echo $roww['name'];?> Rooms" name='release[]'>
	 	
	  <label>Single Sell Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Price of Single <?php echo $roww['name'];?> Rooms" name='releases[]'>
	  <hr>
	  <hr>
		 <label>Double Buy Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Bought Rate of Double <?php echo $roww['name'];?> Rooms" name='release1[]'>
	 
	 <label>Double Sell Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Price of Double <?php echo $roww['name'];?> Rooms" name='release1s[]'>
	 <hr><hr>
	 <label>Tripple Buy Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Bought Rate of Tripple <?php echo $roww['name'];?> Rooms" name='release2[]'>
	 
	 <label>Tripple Sell Rate</label><br/>
	  <input type='number' class="form-control" placeholder="Price of Tripple <?php echo $roww['name'];?> Rooms" name='release2s[]'>
	  <hr><hr>
	  <br/>
	  
	  <?php



}
}



?>
<br/>
<input type="submit" style="float:left;"class="name btn btn-dark" value="Add" name="submit">

<input type="submit" style="float:right;"class="name btn btn-dark" value="Next" name="next">
</form>


</main>