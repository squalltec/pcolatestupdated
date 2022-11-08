<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<br/><br/><br/><br/>


<h1 align='center'>Choose Venue Location</h1>


<?php

session_start();

include 'db_connection.php';



    
    
    
if (isset($_POST['submit'])) {
    
    $_SESSION['hotel']=$_POST['hotel'];
    $_SESSION['country']=$_POST['country'];
    $_SESSION['city']=$_POST['city'];
    $_SESSION['roler']='';
    	header("Location: setup.php");
    
}
    


if (isset($_POST['subsubmit'])) {
    
    $_SESSION['hotel']=$_POST['hotel'];
    $_SESSION['country']=$_POST['country'];
    $_SESSION['city']=$_POST['city'];
    $_SESSION['roler']=$_POST['role'];
    
    	header("Location: setup.php");
    
}


$email= $_SESSION['email'];
$password= $_SESSION['password'];




$n=0;

 $sqllas = "SELECT * FROM loginforvenues WHERE email = '$email' && password= '$password'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    $n=$n+1;
    
    
    
    
}










$m=0;

 $sqllas = "SELECT * FROM venueusers WHERE email = '$email' && password= '$password'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    $m=$m+1;
    
    
    
    
}
















if($n>1)
{
    
    
    
    
    
 $sqllas = "SELECT * FROM loginforvenues WHERE email = '$email' && password= '$password'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
  
    
  ?>
  
  
  
  
  
<form action='#' method='POST'>


<input style='display:none;' name='hotel' value='<?php echo $row['name'];?>'>
<input style='display:none;' name='country' value='<?php echo $row['country'];?>'>
<input style='display:none;' name='city' value='<?php echo $row['city'];?>'>




<input style='display:none;' name='star' value='<?php echo $row['star'];?>'>

	



<div style='margin:0 auto;' class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 align='center' class="card-title"><?php echo $row['name'];?></h5>
        <p align='center'  class="card-text"><?php echo $row['country'];?>, <?php echo $row['city'];?></p>
        <p align='center' ><input type='submit' name='submit' class="btn btn-primary" value='Open'></p>
      </div>
    </div>
  </div>

</div>
</form>
  
  <?php
    
    
}
  if($m>0){
    
    
    
 $sqllas = "SELECT * FROM venueusers WHERE email = '$email' && password= '$password'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
  
    
  ?>
  
  
  
  
  
<form action='#' method='POST'>


<input style='display:none;' name='hotel' value='<?php echo $row['hotel'];?>'>
<input style='display:none;' name='country' value='<?php echo $row['country'];?>'>
<input style='display:none;' name='city' value='<?php echo $row['city'];?>'>
<input style='display:none;' name='star' value='<?php echo $row['star'];?>'>
<input style='display:none;' name='role' value='<?php echo $row['role'];?>'>
<div style='margin:0 auto;' class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 align='center' class="card-title"><?php echo $row['hotel'];?></h5>
        <p align='center'  class="card-text"><?php echo $row['country'];?>, <?php echo $row['city'];?></p>
        <p align='center'  class="card-text">Role: <?php echo $row['role'];?></p>
        <p align='center' ><input type='submit' name='subsubmit' class="btn btn-primary" value='Open'></p>
      </div>
    </div>
  </div>

</div>
</form>
  
  <?php
    
    
}
    
       
	
}  
}




else if($m>1){
    
    
    
 $sqllas = "SELECT * FROM venueusers WHERE email = '$email' && password= '$password'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
  
    
  ?>
  
  
  
  
  
<form action='#' method='POST'>


<input style='display:none;' name='hotel' value='<?php echo $row['hotel'];?>'>
<input style='display:none;' name='country' value='<?php echo $row['country'];?>'>
<input style='display:none;' name='city' value='<?php echo $row['city'];?>'>
<input style='display:none;' name='star' value='<?php echo $row['star'];?>'>
<input style='display:none;' name='role' value='<?php echo $row['role'];?>'>

<div style='margin:0 auto;' class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 align='center' class="card-title"><?php echo $row['hotel'];?></h5>
        <p align='center'  class="card-text"><?php echo $row['country'];?>, <?php echo $row['city'];?></p>
        <p align='center'  class="card-text">Role: <?php echo $row['role'];?></p>
        <p align='center' ><input type='submit' name='subsubmit' class="btn btn-primary" value='Open'></p>
      </div>
    </div>
  </div>

</div>
</form>
  
  <?php
    
    
}
    
       
	
}

else{
    	header("Location: setup.php");
}












?>





















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>