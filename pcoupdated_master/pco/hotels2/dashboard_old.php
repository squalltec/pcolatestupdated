<?php
session_start();
include 'header.php';




$hotel=$_SESSION['hotel'];




$email=$_SESSION['email'];
$password=$_SESSION['password'];




if (isset($_POST['changepassword'])) {
    
    $passwordnew=$_POST['passw'];
    
    
    
    
    
$sql2 = "UPDATE loginforhotels SET password='$passwordnew' WHERE email='$email'";
		  
 $resulta2 = $conn->query($sql2);


if ($resulta2 === TRUE) {

$_SESSION['updated']='1';
	
}

$sql3 = "UPDATE hotelusers SET password='$passwordnew' WHERE email='$email'";
		  
 $resulta3 = $conn->query($sql3);


if ($resulta3 === TRUE) {

$_SESSION['updated']='1';
	
}
    
    
    
}




?>





       <!--start content-->
          <main class="page-content">
		  
		  
	
	
	
	
	
	
	
	
	
	
	
	<div id='succ' style='display:none;' class="alert alert-success" role="alert">
  <h4 class="alert-heading">Great!</h4>
  <p>Password Changed Successfully.</p>
  
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		  
		 <?php
		 
$sqll ="SELECT * FROM hotelsdatabase WHERE name='$hotel'";
		$resultt = $conn->query($sqll);

if ($resultt->num_rows > 0) {


               
}
else{
    ?>
    
         <div class="col">
               <a href='setup.php'><h1 align='center'>
                <div class="card overflow-hidden radius-10">
                 
                    <div class="card-body">
                    
                     <div style='font-size:2vw;' class="w-50">
                     Setup Hotel
                      </div>
                   
                 
                  </div>
                </div>
                 </h1></a>
               </div>
    
    
    <?php
    
}
               ?>
			  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		 <div style='text-align:right;'>
		  
	<?php
	
	
	$passes=array();
	
$n=0;
 $sqllas = "SELECT * FROM loginforhotels WHERE email = '$email'";
 
 
 $result=$conn->query($sqllas);

if ($result->num_rows > 1) {

     echo '<h4> You have Access to:</h4>';

while($row=mysqli_fetch_assoc($result)){
    $n=$n+1;
   
   array_push($passes,$row['password']);
   
    echo $row['name'];
    echo '<br/>';
    
} 


 $sqllas = "SELECT * FROM hotelusers WHERE email = '$email'";
 
 
 $result=$conn->query($sqllas);


while($row=mysqli_fetch_assoc($result)){
    $n=$n+1;
   
   array_push($passes,$row['password']);
   
    echo $row['hotel'].' ('.$row['role'].')';
    echo '<br/>';
    
} 



//echo '<br/><a href="multiplehotels.php" style="float:right;" class="btn btn-danger">Switch</a><br/><br/><br/>';


$allValuesAreTheSame =count(array_unique($passes));


if($allValuesAreTheSame>1)
{

?>

<h5>Same Password for All?</h5>
<form action='#' method='POST'>
    
<input name='passw' type='text' class='form-control' style='float:right; width:300px;'  placeholder='Password'>
<br/><br/>
<input name='changepassword' type='submit' value='Change Password' style='float:right;'>

</form>

<?php
}
	
}
	
	
	
	else{
	    
	   
 $sqllas = "SELECT * FROM hotelusers WHERE email = '$email'";
 
 
 $result=$conn->query($sqllas);

if ($result->num_rows > 1) {

     echo '<h4> You have Access to:</h4>';
     
while($row=mysqli_fetch_assoc($result)){
    $n=$n+1;
   
   array_push($passes,$row['password']);
   
    echo $row['hotel'].' ('.$row['role'].')';
    echo '<br/>';
    
} 

     
	    
$allValuesAreTheSame =count(array_unique($passes));


if($allValuesAreTheSame>1)
{

	    ?>
	    
	    
	    
	    <h5>Same Password for All?</h5>
<form action='#' method='POST'>
    
<input name='passw' type='text' class='form-control' style='float:right; width:300px;'  placeholder='Password'>
<br/><br/>
<input name='changepassword' type='submit' value='Change Password' style='float:right;'>

</form>

	    <?php
}
	    
	}
	
}
	
	
	
	
	
	
	?>	  
		  
		</div>   
		  
		  
		  
		  
		  
		  
		  <input style='display:none;' id='upd' value='<?php echo $_SESSION['updated'];?>'>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	<script>
	    var upd= document.getElementById('upd').value;
	    
	    if(upd=='1')
	    {
	        document.getElementById('succ').style.display='block';
	        
	       <?php
	       $_SESSION['updated']='0';
	       ?>
	    }
	    
	</script>	  
		  
		  
		  
		  <script>
const myTimeout = setTimeout(myGreeting, 3000);

function myGreeting() {
  document.getElementById("succ").style.display='none';
}
</script>
		  
		  
		  
		  
		  
		  
		  
		  
		  
            
</main>