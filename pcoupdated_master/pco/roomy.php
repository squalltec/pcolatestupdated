<?php

require_once('db_connection.php');


include('header.php');


$hn=$_SESSION['hotelname'];
$cn=$_SESSION['countryname'];
$ln=$_SESSION['locationname'];





if (isset($_POST['submit'])) {
	
	
	
	
	
	$names=array();
	$fields=array();
	$release=array();
	
	$dates=array();
	
	
	
	
	$roomnames = $_POST['names'];
	$roomfields = $_POST['fields'];
	$roomrelease = $_POST['release'];
	
	
	
	





		
	
	foreach ($roomrelease as $value) {
	
		$Date1 = date('y-m-d');
		$Date2 = date('y-m-d', strtotime($Date1 . " + $value day"));
		
		array_push($dates,$Date2);
 
  
}



	
	
// output / process all data
foreach ($roomnames as $value) {
	
	array_push($names,$value);
 
  
}

foreach ($roomfields as $value) {
	
	array_push($fields,$value);
 
  
}
foreach ($roomrelease as $value) {
	
	array_push($release,$value);
 
  
}





$sqlTpl = "INSERT INTO roomnumbers ( hotel,country,location,name, number,releasedate,dates)
           VALUES (%s )";
		   
$sqlArr = array();

foreach( $names as $k => $v )

  $sqlArr[] = '"'.$hn.'","'.$cn.'","'.$ln.'","'.$names[$k].'","'.$fields[$k].'","'.$release[$k].'","'.$dates[$k].'" ';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );





 $result = $conn->query($sqlStr);


if ($result === TRUE) {
  echo "New record created successfully";
  


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}






	
	
	
}

















$sqll ="SELECT * FROM roomtypes WHERE hotel='$hn' && country='$cn' && location='$ln'";
		$resultt = $conn->query($sqll);
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">



<form method="POST">


<?php

	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  echo"<h3 align='center'>";echo $roww['name']; echo "</h3>";
	  
	  ?>
	  
	  

<button type="button" id='a' style="background-color:#009CA4;" class="form-control" value="<?php echo $roww['name'];?>">Add More for <?php echo $roww['name'];?> </button>


<p id="myForm<?php echo $roww['name'];?>">

</p>


	  <br/>
	  <input type='text' class="form-control" name='names[]' style="display:none;" value="<?php echo $roww['name'];?>">
	  <input type='number' class="form-control" name='fields[]' placeholder="Number of <?php echo $roww['name'];?> Rooms">
	  <br/>
	  <label>Release Days</label><br/>
	  <input type='text' class="form-control" name='release[]'>
	  <br/>
	  
	  
	  
	  
	  <?php




























}
}





?>
<br/>
<input type="submit" style="float:right;"class="name btn btn-dark" value="Submit" name="submit">

</form>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

$("button").click(function() {
    var fired_button = $(this).val();
    	
		
		
		
		
		
		
		
		
	  
	  
	  
	  
var n = document.createElement("INPUT");
n.setAttribute("type", "text");
n.setAttribute("class", "form-control");
n.setAttribute("Name", "names[]");
n.setAttribute("Value",fired_button);
n.setAttribute("style","display:none;");
	  
	  
	
var y = document.createElement("INPUT");
y.setAttribute("type", "number");
y.setAttribute("class", "form-control");
y.setAttribute("Name", "fields[]");
y.setAttribute("placeholder", "Number of "+fired_button+" Rooms");


var yy = document.createElement("LABEL");


yy.innerHTML= "Release Days";


var z = document.createElement("INPUT");
z.setAttribute("type", "number");
z.setAttribute("class", "form-control");
z.setAttribute("Name", "release[]");
z.setAttribute("placeholder", "Number of Days");


var br = document.createElement("br");

document.getElementById("myForm"+fired_button).appendChild(br);
document.getElementById("myForm"+fired_button).appendChild(n);
document.getElementById("myForm"+fired_button).appendChild(y);


	
document.getElementById("myForm"+fired_button).appendChild(yy);
	
	
	
document.getElementById("myForm"+fired_button).appendChild(z);
	
	
	
});













</script>

</main>
