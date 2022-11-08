<?php
require_once('db_connection.php');


include('header.php');


$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];	




if (isset($_POST['submit'])) {
    
    
//general facilities


 $acceptedcardslist = implode(", ", $_POST['cards']);
    
    
    $arraycards=$_POST['cards'];
    
    
    
foreach ($arraycards as $value) {
    
  
  
  
$sql1 ="SELECT * FROM hotelsdatabasegeneralfacilities WHERE name='$value'";
		$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbb="INSERT INTO hotelsdatabasegeneralfacilities (name) VALUES ('$value')";

 $resultbb = $conn->query($sqlbb);


if ($resultbb === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbb . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    




//main facilities



 $acceptedcardslistt = implode(", ", $_POST['cardss']);
    
    
    $arraycardss=$_POST['cardss'];
    
    
    
foreach ($arraycardss as $value) {
    
  
  
  
$sql1s ="SELECT * FROM hotelsdatabasemainfacilities WHERE name='$value'";
		$result1s = $conn->query($sql1s);

if ($result1s->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbs="INSERT INTO hotelsdatabasemainfacilities (name) VALUES ('$value')";

 $resultbbs = $conn->query($sqlbbs);


if ($resultbbs === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbs . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    
    






//front desk







 $acceptedcardslisttt = implode(", ", $_POST['cardsss']);
    
    
    $arraycardsss=$_POST['cardsss'];
    
    
    
foreach ($arraycardsss as $value) {
    
  
  
  
$sql1ss ="SELECT * FROM hotelsdatabasefrontdeskfacilities WHERE name='$value'";
		$result1ss = $conn->query($sql1ss);

if ($result1ss->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbss="INSERT INTO hotelsdatabasefrontdeskfacilities (name) VALUES ('$value')";

 $resultbbss = $conn->query($sqlbbss);


if ($resultbbss === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbss . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    







//family






 $acceptedcardslistttt = implode(", ", $_POST['cardssss']);
    
    
    $arraycardssss=$_POST['cardssss'];
    
    
    
foreach ($arraycardssss as $value) {
    
  
  
  
$sql1sss ="SELECT * FROM hotelsdatabasefamilyfacilities WHERE name='$value'";
		$result1sss = $conn->query($sql1sss);

if ($result1sss->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss="INSERT INTO hotelsdatabasefamilyfacilities (name) VALUES ('$value')";

 $resultbbsss = $conn->query($sqlbbsss);


if ($resultbbsss === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    
    













//sports







 $acceptedcardslistttt2 = implode(", ", $_POST['cardssss2']);
    
    
    $arraycardssss2=$_POST['cardssss2'];
    
    
    
foreach ($arraycardssss2 as $value) {
    
  
  
  
$sql1sss2 ="SELECT * FROM hotelsdatabasesportsfacilities WHERE name='$value'";
		$result1sss2 = $conn->query($sql1sss2);

if ($result1sss2->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss2="INSERT INTO hotelsdatabasesportsfacilities (name) VALUES ('$value')";

 $resultbbsss2 = $conn->query($sqlbbsss2);


if ($resultbbsss2 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss2 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
    
    











//cleaning






 $acceptedcardslistttt23 = implode(", ", $_POST['cardssss23']);
    
    
    $arraycardssss23=$_POST['cardssss23'];
    
    
    
foreach ($arraycardssss23 as $value) {
    
  
  
  
$sql1sss23 ="SELECT * FROM hotelsdatabasecleaningfacilities WHERE name='$value'";
		$result1sss23 = $conn->query($sql1sss23);

if ($result1sss23->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss23="INSERT INTO hotelsdatabasecleaningfacilities (name) VALUES ('$value')";

 $resultbbsss23 = $conn->query($sqlbbsss23);


if ($resultbbsss23 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss23 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
  
  
  
  
  
 
 
 
 
//Food







 $acceptedcardslistttt234 = implode(", ", $_POST['cardssss234']);
    
    
    $arraycardssss234=$_POST['cardssss234'];
    
    
    
foreach ($arraycardssss234 as $value) {
    
  
  
  
$sql1sss234 ="SELECT * FROM hotelsdatabasefoodfacilities WHERE name='$value'";
		$result1sss234 = $conn->query($sql1sss234);

if ($result1sss234->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss234="INSERT INTO hotelsdatabasefoodfacilities (name) VALUES ('$value')";

 $resultbbsss234 = $conn->query($sqlbbsss234);


if ($resultbbsss234 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss234 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
 
 
 
 
 
 
 
 
 
 
 
//Business





 $acceptedcardslistttt2345 = implode(", ", $_POST['cardssss2345']);
    
    
    $arraycardssss2345=$_POST['cardssss2345'];
    
    
    
foreach ($arraycardssss2345 as $value) {
    
  
  
  
$sql1sss2345 ="SELECT * FROM hotelsdatabasebusinessfacilities WHERE name='$value'";
		$result1sss2345 = $conn->query($sql1sss2345);

if ($result1sss2345->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss2345="INSERT INTO hotelsdatabasebusinessfacilities (name) VALUES ('$value')";

 $resultbbsss2345 = $conn->query($sqlbbsss2345);


if ($resultbbsss2345 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss2345 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
 
 
 
 
 
 
//Internet





 $acceptedcardslistttt23456 = implode(", ", $_POST['cardssss23456']);
    
    
    $arraycardssss23456=$_POST['cardssss23456'];
    
    
    
foreach ($arraycardssss23456 as $value) {
    
  
  
  
$sql1sss23456 ="SELECT * FROM hotelsdatabaseinternetfacilities WHERE name='$value'";
		$result1sss23456 = $conn->query($sql1sss23456);

if ($result1sss23456->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss23456="INSERT INTO hotelsdatabaseinternetfacilities (name) VALUES ('$value')";

 $resultbbsss23456 = $conn->query($sqlbbsss23456);


if ($resultbbsss23456 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss23456 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
 
 
 
 
  



















 
//Parking

 $acceptedcardslistttt234567 = implode(", ", $_POST['cardssss234567']);
    
    
    $arraycardssss234567=$_POST['cardssss234567'];
    
    
    
foreach ($arraycardssss234567 as $value) {
    
  
  
  
$sql1sss234567 ="SELECT * FROM hotelsdatabaseparkingfacilities WHERE name='$value'";
		$result1sss234567 = $conn->query($sql1sss234567);

if ($result1sss234567->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss234567="INSERT INTO hotelsdatabaseparkingfacilities (name) VALUES ('$value')";

 $resultbbsss234567 = $conn->query($sqlbbsss234567);


if ($resultbbsss234567 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss234567 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
 












//Unique



 $acceptedcardslistttt2345678 = implode(", ", $_POST['cardssss2345678']);
    
    
    $arraycardssss2345678=$_POST['cardssss2345678'];
    
    
    
foreach ($arraycardssss2345678 as $value) {
    
  
  
  
$sql1sss2345678 ="SELECT * FROM hotelsdatabaseuniquefacilities WHERE name='$value'";
		$result1sss2345678 = $conn->query($sql1sss2345678);

if ($result1sss2345678->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss2345678="INSERT INTO hotelsdatabaseuniquefacilities (name) VALUES ('$value')";

 $resultbbsss2345678 = $conn->query($sqlbbsss2345678);


if ($resultbbsss2345678 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss2345678 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  
  
 




//Safety





 $acceptedcardslistttt23456789 = implode(", ", $_POST['cardssss23456789']);
    
    
    $arraycardssss23456789=$_POST['cardssss23456789'];
    
    
    
foreach ($arraycardssss23456789 as $value) {
    
  
  
  
$sql1sss23456789 ="SELECT * FROM hotelsdatabasesafetyfacilities WHERE name='$value'";
		$result1sss23456789 = $conn->query($sql1sss23456789);

if ($result1sss23456789->num_rows > 0) {
  
	    
	  }
	  else{
	      
	      
	   	    
$sqlbbsss23456789="INSERT INTO hotelsdatabasesafetyfacilities (name) VALUES ('$value')";

 $resultbbsss23456789 = $conn->query($sqlbbsss23456789);


if ($resultbbsss23456789 === TRUE) {
  
  $_SESSION['alertme']='1';
 // echo "<script>location.replace('mainfacilities.php');</script>";
} else {
  echo "Error: " . $sqlbbsss23456789 . "<br>" . $conn->error;
}
     
	      
	      
	      
	      
	      
	  }  
	      

	  
	  
  }
  




















                     
$sqlo ="UPDATE hotelsdatabase SET generalfacilities='$acceptedcardslist', mainfacilities='$acceptedcardslistt',frontdeskfacilities='$acceptedcardslisttt',familyfacilities='$acceptedcardslistttt',sportsfacilities='$acceptedcardslistttt2',cleaningfacilities='$acceptedcardslistttt23',foodfacilities='$acceptedcardslistttt234',businessfacilities='$acceptedcardslistttt2345',internetfacilities='$acceptedcardslistttt23456',parkingfacilities='$acceptedcardslistttt234567',uniquefacilities='$acceptedcardslistttt2345678',safetyfacilities='$acceptedcardslistttt23456789' WHERE name='$hotel' && country='$country' && city='$city'";

 $resulto = $conn->query($sqlo);


if ($resulto === TRUE) {
 
 $_SESSION['alertme']=1;
 echo "<script>location.replace('addinventory2.php');</script>"; 


 //echo "<script>location.replace('dashboard.php');</script>";
 
} else {
  echo "Error: " . $sqlo . "<br>" . $conn->error;
}   
       






}


 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">

<h1 style='' align='center'>Add Facilities</h1>


<div class="form-group">


<h2 style='' align='center'>General</h2>

</div>
<div>





<form method='POST' action='#'>

   <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='all'>Select All</label>
       <input id='all' name='all' type='checkbox'><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabasegeneralfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcard" name='cards[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addnc'>
    
</nonsense>


<input type='submit' id='pds' onclick='addcardnew()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Facilities</h2>

</div>
<div>



   <div id='cardslist' class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alll'>Select All</label>
       <input id='alll' name='alll' type='checkbox'><br/>
         

       <?php
       $sqlv ="SELECT * FROM hotelsdatabasemainfacilities";
		$resultv = $conn->query($sqlv);

if ($resultv->num_rows > 0) {
  // output data of each row
  while($rowv = $resultv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowv['name'];?>'><?php echo $rowv['name'];?></label>
       <input id="alertcardd" name='cardss[]' type='checkbox' class='' value='<?php echo $rowv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncc'>
    
</nonsense>


<input type='submit' id='pdss' onclick='addcardneww()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  <!--frontdesk-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Front Desk Services</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='allll'>Select All</label>
       <input id='allll' name='allll' type='checkbox'><br/>
         

       <?php
       $sqlvv ="SELECT * FROM hotelsdatabasefrontdeskfacilities";
		$resultvv = $conn->query($sqlvv);

if ($resultvv->num_rows > 0) {
  // output data of each row
  while($rowvv = $resultvv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvv['name'];?>'><?php echo $rowvv['name'];?></label>
       <input id="alertcarddd" name='cardsss[]' type='checkbox' class='' value='<?php echo $rowvv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addnccc'>
    
</nonsense>


<input type='submit' id='pdsss' onclick='addcardnewww()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  <!--Family Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Family Services</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll'>Select All</label>
       <input id='alllll' name='alllll' type='checkbox'><br/>
         

       <?php
       $sqlvvv ="SELECT * FROM hotelsdatabasefamilyfacilities";
		$resultvvv = $conn->query($sqlvvv);

if ($resultvvv->num_rows > 0) {
  // output data of each row
  while($rowvvv = $resultvvv->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv['name'];?>'><?php echo $rowvvv['name'];?></label>
       <input id="alertcardddd" name='cardssss[]' type='checkbox' class='' value='<?php echo $rowvvv['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc'>
    
</nonsense>


<input type='submit' id='pdssss' onclick='addcardnewwww()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  <!--Sports-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Sports and Fitness</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll2'>Select All</label>
       <input id='alllll2' name='alllll2' type='checkbox'><br/>
         

       <?php
       $sqlvvv2 ="SELECT * FROM hotelsdatabasesportsfacilities";
		$resultvvv2 = $conn->query($sqlvvv2);

if ($resultvvv2->num_rows > 0) {
  // output data of each row
  while($rowvvv2 = $resultvvv2->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv2['name'];?>'><?php echo $rowvvv2['name'];?></label>
       <input id="alertcardddd2" name='cardssss2[]' type='checkbox' class='' value='<?php echo $rowvvv2['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc2'>
    
</nonsense>


<input type='submit' id='pdssss2' onclick='addcardnewwww2()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
   <!--Cleaning Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Cleaning Services</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll23'>Select All</label>
       <input id='alllll23' name='alllll23' type='checkbox'><br/>
         

       <?php
       $sqlvvv23 ="SELECT * FROM hotelsdatabasecleaningfacilities";
		$resultvvv23 = $conn->query($sqlvvv23);

if ($resultvvv23->num_rows > 0) {
  // output data of each row
  while($rowvvv23 = $resultvvv23->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv23['name'];?>'><?php echo $rowvvv23['name'];?></label>
       <input id="alertcardddd23" name='cardssss23[]' type='checkbox' class='' value='<?php echo $rowvvv23['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc23'>
    
</nonsense>


<input type='submit' id='pdssss23' onclick='addcardnewwww23()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
   
   <!--Food Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Food & Drink</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll234'>Select All</label>
       <input id='alllll234' name='alllll234' type='checkbox'><br/>
         

       <?php
       $sqlvvv234 ="SELECT * FROM hotelsdatabasefoodfacilities";
		$resultvvv234 = $conn->query($sqlvvv234);

if ($resultvvv234->num_rows > 0) {
  // output data of each row
  while($rowvvv234 = $resultvvv234->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv234['name'];?>'><?php echo $rowvvv234['name'];?></label>
       <input id="alertcardddd234" name='cardssss234[]' type='checkbox' class='' value='<?php echo $rowvvv234['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc234'>
    
</nonsense>


<input type='submit' id='pdssss234' onclick='addcardnewwww234()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   
   <!--Business Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Business Facilities</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll2345'>Select All</label>
       <input id='alllll2345' name='alllll2345' type='checkbox'><br/>
         

       <?php
       $sqlvvv2345 ="SELECT * FROM hotelsdatabasebusinessfacilities";
		$resultvvv2345 = $conn->query($sqlvvv2345);

if ($resultvvv2345->num_rows > 0) {
  // output data of each row
  while($rowvvv2345 = $resultvvv2345->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv2345['name'];?>'><?php echo $rowvvv2345['name'];?></label>
       <input id="alertcardddd2345" name='cardssss2345[]' type='checkbox' class='' value='<?php echo $rowvvv2345['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc2345'>
    
</nonsense>


<input type='submit' id='pdssss2345' onclick='addcardnewwww2345()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
   
   <!--Internet Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Internet</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll23456'>Select All</label>
       <input id='alllll23456' name='alllll23456' type='checkbox'><br/>
         

       <?php
       $sqlvvv23456 ="SELECT * FROM hotelsdatabaseinternetfacilities";
		$resultvvv23456 = $conn->query($sqlvvv23456);

if ($resultvvv23456->num_rows > 0) {
  // output data of each row
  while($rowvvv23456 = $resultvvv23456->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv23456['name'];?>'><?php echo $rowvvv23456['name'];?></label>
       <input id="alertcardddd23456" name='cardssss23456[]' type='checkbox' class='' value='<?php echo $rowvvv23456['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc23456'>
    
</nonsense>


<input type='submit' id='pdssss23456' onclick='addcardnewwww23456()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
   <!--Parking Services-->
  
  
  
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Parking</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll234567'>Select All</label>
       <input id='alllll234567' name='alllll234567' type='checkbox'><br/>
         

       <?php
       $sqlvvv234567 ="SELECT * FROM hotelsdatabaseparkingfacilities";
		$resultvvv234567 = $conn->query($sqlvvv234567);

if ($resultvvv234567->num_rows > 0) {
  // output data of each row
  while($rowvvv234567 = $resultvvv234567->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv234567['name'];?>'><?php echo $rowvvv234567['name'];?></label>
       <input id="alertcardddd234567" name='cardssss234567[]' type='checkbox' class='' value='<?php echo $rowvvv234567['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc234567'>
    
</nonsense>


<input type='submit' id='pdssss234567' onclick='addcardnewwww234567()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Unique Features-->
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Unique Features</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll2345678'>Select All</label>
       <input id='alllll2345678' name='alllll2345678' type='checkbox'><br/>
         

       <?php
       $sqlvvv2345678 ="SELECT * FROM hotelsdatabaseuniquefacilities";
		$resultvvv2345678 = $conn->query($sqlvvv2345678);

if ($resultvvv2345678->num_rows > 0) {
  // output data of each row
  while($rowvvv2345678 = $resultvvv2345678->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv2345678['name'];?>'><?php echo $rowvvv2345678['name'];?></label>
       <input id="alertcardddd2345678" name='cardssss2345678[]' type='checkbox' class='' value='<?php echo $rowvvv2345678['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc2345678'>
    
</nonsense>


<input type='submit' id='pdssss2345678' onclick='addcardnewwww2345678()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Safety Features-->
  
  <br/><br/>
  
  
  <div class="form-group">


<h2 align='center'>Safety & Security Features</h2>

</div>
<div>



   <div class="container">
      <div class='row'>
          
    <div class="col-sm">
  
   <div class="form-group">
      
            <label for='alllll23456789'>Select All</label>
       <input id='alllll23456789' name='alllll23456789' type='checkbox'><br/>
         

       <?php
       $sqlvvv23456789 ="SELECT * FROM hotelsdatabasesafetyfacilities";
		$resultvvv23456789 = $conn->query($sqlvvv23456789);

if ($resultvvv23456789->num_rows > 0) {
  // output data of each row
  while($rowvvv23456789 = $resultvvv23456789->fetch_assoc()) {
       ?>
       <label for='<?php echo $rowvvv23456789['name'];?>'><?php echo $rowvvv23456789['name'];?></label>
       <input id="alertcardddd23456789" name='cardssss23456789[]' type='checkbox' class='' value='<?php echo $rowvvv23456789['name'];?>'>
       
       &nbsp;&nbsp; &nbsp;&nbsp;
       
       <?php
  }
}
?>

<nonsense id='addncccc23456789'>
    
</nonsense>


<input type='submit' id='pdssss23456789' onclick='addcardnewwww23456789()' value='+'>

       </div> 
  
  </div>
  </div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <button type='submit' name='submit' class='btn btn-danger' style='float:right;'>Submit</button>
  
  </form>
  
  
  <br/>
  <br/>
  <br/>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
<script>
    document.getElementById("pds").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnew(){
   var parent=document.getElementById("addnc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cards[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  

























<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

</script>













</main>







<script>
    document.getElementById("pdss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardneww(){
   var parent=document.getElementById("addncc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardd']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

<script>
    document.getElementById("pdsss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewww(){
   var parent=document.getElementById("addnccc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardsss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#allll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcarddd']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
 <!--Family --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww(){
   var parent=document.getElementById("addncccc");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Sports --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2(){
   var parent=document.getElementById("addncccc2");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Cleaning --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23(){
   var parent=document.getElementById("addncccc23");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
   <!--Food --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss234").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww234(){
   var parent=document.getElementById("addncccc234");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss234[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll234").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd234']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  







 <!--Business Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2345").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2345(){
   var parent=document.getElementById("addncccc2345");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2345[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2345").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2345']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>

  
  
  
  
  
  
  
  
  
 <!--Internet Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23456").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23456(){
   var parent=document.getElementById("addncccc23456");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23456[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23456").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23456']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>
  
  
  
  
  
  
  
  
  
 <!--Parking Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss234567").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww234567(){
   var parent=document.getElementById("addncccc234567");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss234567[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll234567").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd234567']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 <!--Unique Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss2345678").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww2345678(){
   var parent=document.getElementById("addncccc2345678");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss2345678[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll2345678").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd2345678']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>
  
  
  
  
  
  
  
  
  
  
   <!--Safety Facilities --> 
  
  
  
  
  

<script>
    document.getElementById("pdssss23456789").addEventListener("click", function(event){
  event.preventDefault()
});



function addcardnewwww23456789(){
   var parent=document.getElementById("addncccc23456789");
   
   var inpt=document.createElement('INPUT');
   inpt.setAttribute('name','cardssss23456789[]');
   
   
   parent.appendChild(inpt);
    
}
</script>
  
  
  
<script>


    
 $("#alllll23456789").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcardddd23456789']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


<script>


    
 $("#all").click(function(event)
  {   
    
    var checkedStatus = this.checked;

    var elms = document.querySelectorAll("[id='alertcard']");
 
 if(checkedStatus==false){
for(var i = 0; i < elms.length; i++) 
{
 elms[i].checked=false; 
}
     
 }
 
 
else{
  for(var i = 0; i < elms.length; i++) 
{
  elms[i].checked=true; 
} 

}
  });


</script>





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





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

