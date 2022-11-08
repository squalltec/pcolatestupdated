<?php
require_once('db_connection.php');


include('header.php');


    
 
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];


$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomname'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);




if (isset($_POST['submit'])) {
    
    
    


//$numberofrooms=$_POST['number'];



$cancellationdays=$_POST['cancellationdays'];
$cancellationpercentage=$_POST['cancellationpercentage'];



$cancellationpolicyz1=$_POST['cancellationpolicy'];
$names1=$_POST['names'];

$cancellationpolicyz2=array();
$names2=array();

$na=0;
foreach($cancellationpolicyz1 as $cpm)
{
    
    
    if($cpm!='')
    {
        
        array_push($cancellationpolicyz2,$cancellationpolicyz1[$na]);
        array_push($names2,$names1[$na]);
        
    }
    
    $na=$na+1;
}



$cancellationpolicyz=$cancellationpolicyz2;
$names=$names2;




$namarray=array();


 $sqllasvc = "SELECT * FROM cancellationpoliciesnames";
 
 
 $resultvc=$conn->query($sqllasvc);


while($rowvc=mysqli_fetch_assoc($resultvc)){
    array_push($namarray,$rowvc['name']);
}

$namstring=implode(',',$namarray);


foreach($names as $nn)
{
    if(strpos($namstring,$nn)!==FALSE)
    {
        
    }
    
    else{
        
        
        $sqlab = "INSERT INTO cancellationpoliciesnames (name) VALUES ('$nn')";
		  
 $resultab = $conn->query($sqlab);


if ($resultab === TRUE) {
}
        
        
    }
    
    
}













$cp= implode("_@_",$cancellationpolicyz);
$nams= implode("_@_",$names);





$cp1=mysqli_real_escape_string($conn, $cp);

$nams1=mysqli_real_escape_string($conn, $nams);



    //$checker=$_POST['checkerdes'];
    
  //  if($checker=='on'){
  //      $_SESSION['cancellationpolicy']=$cancellationpolicy;
  //  }
  //  else{
  //      $_SESSION['cancellationpolicy']='';
  //  }
    









$sqlm = "UPDATE hotelsInventorydatabase SET cancellationpercentage='$cancellationpercentage',cancellationdays='$cancellationdays',cancellationpolicy='$cp1', cancellationpoliciesnames='$nams1' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
		  
 $resultam = $conn->query($sqlm);


if ($resultam === TRUE) {

	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	  echo "<script>location.replace('addinventory5.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('listofrooms.php');</script>";
    
}

	    
	
	
	
	
}


  
}
                    
 
 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">
                <h2 style='margin-top:-60px;'><?php echo $roomtype;?> </h2>  
              <h1 align='center'>Terms & Conditions</h1>
              
              
<form action="#" method="post" enctype="multipart/form-data">


<input style='display:none;' id='alertme' value='<?php echo $_SESSION['alertme'];?>'>

<br/>




<!-- <div class="container">
      <div class='row'>
    <div class="col-sm">
         <label>Number of Rooms for <?php echo $roomtype;?> </label>
        <input class='form-control' min='0' type='number' required name='number' placeholder='Number of Rooms'>
         
        </div>
         </div>
        </div>
        <br/>-->











    <div class="container">
      <div class='row'>
    <div class="col-sm">
        <input class='form-control' name='cancellationdays' placeholder='Cancellation Prior Days'>
      
        
        </div>
           <div class="col-sm">
        <input class='form-control' name='cancellationpercentage' placeholder='Cancellation Percentage Deduction'>
    
        
        </div>
         </div>
        </div>
        <br/>














<?php



 $sqllas = "SELECT * FROM cancellationpoliciesnames";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    ?>




         <div class="container">
      <div class='row'>
    <div class="col-sm">
         <input class='form-control' name='names[]' value='<?php echo $row['name'];?>'>
        <textarea class='form-control' name='cancellationpolicy[]' placeholder='<?php echo $row['name'];?>'><?php //echo  $_SESSION['cancellationpolicy'];?></textarea>
        <!-- <label for='abc'>Same Policy for All Other Rooms?</label>
        <input type='checkbox' name='checkerdes' id='abc'>-->
        
        </div>
         </div>
        </div>
        <br/>
        
        <?php
}
        ?>
        
        
        <nonsense id='populateme'></nonsense>
        
        
        
       <h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">+</button></h1> 
 
        
        
        
        

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
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});




function myFunction2() {
    
 var populateme = document.getElementById("populateme");    
    
    
  var div1=   document.createElement("div"); 
  div1.setAttribute('class','container');
  
  var div2=   document.createElement("div");
  div2.setAttribute('class','row');
  
  var div3=   document.createElement("div"); 
 div3.setAttribute('class','col-sm');
  


var yc = document.createElement("INPUT");

yc.setAttribute("class", "form-control");
yc.setAttribute("Name", "names[]");
yc.setAttribute("type", "text");
yc.setAttribute("placeholder", "Policy Name");


var yc2 = document.createElement("TEXTAREA");

yc2.setAttribute("class", "form-control");
yc2.setAttribute("Name", "cancellationpolicy[]");
yc2.setAttribute("placeholder", "Policy Description");




div3.appendChild(yc);
div3.appendChild(yc2);
div2.appendChild(div3)
div1.appendChild(div2)
populateme.appendChild(div1);

 
}

</script>

	
















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










</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

