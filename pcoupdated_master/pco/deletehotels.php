<?php
require_once('db_connection.php');



function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
}







include('header.php');



if (isset($_POST['delme'])) 
{
	


$naam=$_POST['naam'];
$mulk=$_POST['mulk'];
$shehar=$_POST['shehar'];






$sql = "DELETE FROM loginforhotels WHERE name='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 

$sql = "DELETE FROM hotelusers WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 

$sql = "DELETE FROM basiccharges WHERE hotel='$naam' && country='$mulk' && location='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 


$sql = "DELETE FROM disabletwin WHERE hotel='$naam' && country='$mulk' && location='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 


$sql = "DELETE FROM disabletwindetail WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 



$sql = "DELETE FROM hotelsdatabase WHERE name='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 



$sql = "DELETE FROM hotelsdatabaseimages WHERE name='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 




$sql = "DELETE FROM hotelsInventorydatabase WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 


$sql = "DELETE FROM hotelsInventoryImagesdatabase WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 


$sql = "DELETE FROM meetingbanquetplannner WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 


$sql = "DELETE FROM pools WHERE hotel='$naam' && country='$mulk' && city='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 

$sql = "DELETE FROM roomnumbers WHERE hotel='$naam' && country='$mulk' && location='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 



$sql = "DELETE FROM setprices WHERE hotel='$naam' && country='$mulk' && location='$shehar'";

if ($conn->query($sql) === TRUE) {
 
} 







rrmdir('Hotel Images/'.$naam.'/');
rrmdir('Room Uploads/'.$naam.'/');
rrmdir('Hotel Logos/'.$naam.'/');










}

 
 ?>
 
 




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!--start content-->
          <main class="page-content">




<div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Hotels</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     


<?php


$sqlla ="SELECT * FROM loginforhotels";
		$resultta = $conn->query($sqlla);

	
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	
?>

 
                   <div class="accordion-item">
                       <form action='#' method='POST'>
                           
                           
                           
                           <input style='display:none;' name='naam' value='<?php echo $rowwa['name']; ?>'>
                            <input style='display:none;' name='mulk' value='<?php echo $rowwa['country']; ?>'>
                             <input style='display:none;' name='shehar' value='<?php echo $rowwa['city']; ?>'>
                           
                        <input style='float:left;' name='delme' type='submit' class='btn btn-danger' value='Delete'>
                    
                        </form>
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#collapse<?php echo $a;?>' aria-expanded="false" aria-controls="collapseTwo">
<?php echo $rowwa['name']; ?>

  </button>
 
                        </h2>
                      </div>
                     
                      
                     <?php
  }
}
?>                      
                      
                      
                      
          </div><!--end row-->
		  
                    </div>
          </div><!--end row-->
		    </div>
          </div><!--end row-->
		    </div>
          </div><!--end row-->
		         




</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

