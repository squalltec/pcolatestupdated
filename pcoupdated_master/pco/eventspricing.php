<?php


require_once('db_connection.php');


include('header.php');

$_SESSION['step']='6';

$rinfo=$_SESSION['regionalinfo'];
$hotelnaam=$_SESSION['hotelname'];
$countrynaam=$_SESSION['countryname'];
$locationnaam=$_SESSION['locationname'];




if (isset($_POST['submit'])) {
	
	
	
	
	$lengths=array();
	$events=array();
	$prices=array();
	$pricesdbl=array();
	$pricestrpl=array();
	$prices=array();
	$sdates=array();
	$edates=array();
	
	
	$getlengths = $_POST['length'];
	$getevents = $_POST['events'];
	$getprices = $_POST['prices'];
	$getpricesdbl = $_POST['pricesdbl'];
	$getpricestrpl = $_POST['pricestrpl'];
	$getsdates = $_POST['sdates'];
	$getedates = $_POST['edates'];
	

	
	foreach ($getlengths as $value) {
	
	array_push($lengths,$value);
 
  
}


	
	foreach ($getevents as $value) {
	
	array_push($events,$value);
 
  
}
foreach ($getprices as $value) {
	
	array_push($prices,$value);
 
  
}


foreach ($getpricesdbl as $value) {
	
	array_push($pricesdbl,$value);
 
  
}

foreach ($getpricestrpl as $value) {
	
	array_push($pricestrpl,$value);
 
  
}
foreach ($getsdates as $value) {
	
	array_push($sdates,$value);
 
  
}
foreach ($getedates as $value) {
	
	array_push($edates,$value);
 
  
}
	

$sqlTpl = "INSERT INTO events ( hotel,country,location,event,price,pricedbl,pricetrpl,sdate,edate,regionalinfo,minimumstay)
           VALUES (%s )";
		   
$sqlArr = array();

foreach( $events as $k => $v )

  $sqlArr[] = '"'.$hotelnaam.'","'.$countrynaam.'","'.$locationnaam.'","'.$events[$k].'","'.$prices[$k].'","'.$pricesdbl[$k].'","'.$pricestrpl[$k].'","'.$sdates[$k].'" ,"'.$edates[$k].'","'.$rinfo.'","'.$lengths[$k].'"';
$sqlStr = sprintf( $sqlTpl ,
            implode( ' ) , ( ' , $sqlArr ) );





 $result = $conn->query($sqlStr);


if ($result === TRUE) {
  echo "New record created successfully";
  
  $rin=$_SESSION['regionalinfo'];
  
  
  if($rin=='All'){
	  
  $_SESSION['regionalinfo']='';
  $_SESSION['step']='';
  echo "<script>location.replace('addhotels.php');</script>";
  }
  
  else if($rin=='CIS'){
	  
  $_SESSION['regionalinfo']='GCC';
  $_SESSION['step']='4';
  echo "<script>location.replace('setprices.php');</script>";
  }
  
  else if($rin=='GCC'){
  $_SESSION['regionalinfo']='ASIA';
  $_SESSION['step']='4';
  echo "<script>location.replace('setprices.php');</script>";
  }
  else if($rin=='ASIA'){
  $_SESSION['regionalinfo']='Western Europe';
  $_SESSION['step']='4';
  echo "<script>location.replace('setprices.php');</script>";
  }
  else if($rin=='Western Europe'){
  $_SESSION['regionalinfo']='Rest of the World';
  $_SESSION['step']='4';
  echo "<script>location.replace('setprices.php');</script>";
  }
  
  else if($rin=='Rest of the World'){
  $_SESSION['regionalinfo']='';
  $_SESSION['step']='';
  echo "<script>location.replace('addhotels.php');</script>";
  }
  
  


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
<h2 align="center"> Events</h2>
<br/><br/>




<label style="float:right;" id="a" class="name btn btn-dark" onclick="textBoxCreate()">Add Event</label> 


<form method="POST" enctype="multipart/form-data">





<p id="myForm">

</p>


<br/><br/>
<input type="submit" style=" float:right;" class="name btn btn-dark" value="submit" name="submit">

<br/><br/><br/><br/>
</form>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 
<script>
var nam=1;

var idc=1;




$("#a").click(function() {
   
    //alert(nam);
	nam=nam+1;
});
 
   
function textBoxCreate(){
	


	 
var line = document.createElement("hr");
var l = document.createElement("label");
l.innerHTML="Event: ";





var y = document.createElement("DATALIST");
y.setAttribute("class", "form-control");
y.setAttribute("id","es"+idc);
y.setAttribute("Name", "es[]");

y.setAttribute("style", "display: none;");  
	
	
	$.ajax({
	
   url : 'getevents.php', // your php file
   type : 'GET', // type of the HTTP request
   success : function(result){
	   
	   $('#es'+idc).html(result);
	   
	   idc=idc+1;
	   
	   
			 
   }
   
});



 var za = document.createElement("INPUT");
za.setAttribute("type", "text");
za.setAttribute("class", "form-control");
za.setAttribute("list","es"+idc);
za.setAttribute("id","events"+idc);
za.setAttribute("Name", "events[]");

var zala = document.createElement("LABEL");
zala.innerHTML="Minimum Length of Stay";

 var zal = document.createElement("INPUT");
zal.setAttribute("type", "number");
zal.setAttribute("class", "form-control");
zal.setAttribute("id","length"+idc);
zal.setAttribute("Name", "length[]");





var z = document.createElement("INPUT");
z.setAttribute("type", "number");
z.setAttribute("class", "form-control");
z.setAttribute("id","prices[]");
z.setAttribute("Name", "prices[]");
z.setAttribute("Placeholder", "Additional Charge for Single");


var z1 = document.createElement("INPUT");
z1.setAttribute("type", "number");
z1.setAttribute("class", "form-control");
z1.setAttribute("id","pricesdbl[]");
z1.setAttribute("Name", "pricesdbl[]");
z1.setAttribute("Placeholder", "Additional Charge for Double");


var z2 = document.createElement("INPUT");
z2.setAttribute("type", "number");
z2.setAttribute("class", "form-control");
z2.setAttribute("id","pricestrpl[]");
z2.setAttribute("Name", "pricestrpl[]");
z2.setAttribute("Placeholder", "Additional Charge for Tripple");




var l1 = document.createElement("label");
l1.innerHTML="Starting Date: ";
var yy = document.createElement("INPUT");
yy.setAttribute("type", "date");
yy.setAttribute("class", "form-control");
yy.setAttribute("id","sdates[]");
yy.setAttribute("Name", "sdates[]");
yy.setAttribute("Placeholder", "Start Date");



var l2 = document.createElement("label");
l2.innerHTML="Ending Date: ";

var zz = document.createElement("INPUT");
zz.setAttribute("type", "date");
zz.setAttribute("class", "form-control");
zz.setAttribute("id","edates[]");
zz.setAttribute("Name", "edates[]");
zz.setAttribute("Placeholder", "Ending Date");










document.getElementById("myForm").appendChild(line);
document.getElementById("myForm").appendChild(l);
document.getElementById("myForm").appendChild(y);
document.getElementById("myForm").appendChild(za);
document.getElementById("myForm").appendChild(zala);
document.getElementById("myForm").appendChild(zal);
document.getElementById("myForm").appendChild(z);
document.getElementById("myForm").appendChild(z1);
document.getElementById("myForm").appendChild(z2);
document.getElementById("myForm").appendChild(l1);
document.getElementById("myForm").appendChild(yy);
document.getElementById("myForm").appendChild(l2);
document.getElementById("myForm").appendChild(zz);






}



</script>


</main>