

<?php

require_once('db_connection.php');


include('header.php');


?>







  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>	
 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--start content-->
          <main class="page-content">





<div class="row">
              <div class="col col-lg-9 mx-auto">
                  
                <div class="card radius-10">
                  <div class="card-body">
                    <h5 class="card-title">Hotel Rooms</h5>
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     

<?php	
					
				
					

		
		
		
$sqll ="SELECT * FROM hotels";
		$resultt = $conn->query($sqll);

 $a=0;
 
	
	
if ($resultt->num_rows > 0) {
  // output data of each row
  while($roww = $resultt->fetch_assoc()) {
	  
	  ?>
					  
					  
					  
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target='#collapse<?php echo $a;?>' aria-expanded="false" aria-controls="collapseTwo">
                            <?php 
							echo $roww['name']; 
							$naam=$roww['name']; 
							echo " - "; 
							echo $roww['country'];  
							$mulk=$roww['country']; 
							echo " - "; 
							echo $roww['location'];
							$jaga=$roww['location']; 
							?>
                          </button>
                        </h2>
                        <div id='collapse<?php echo $a; ?>' class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            
							<?php 
							
							
							
		
$sqlla ="SELECT * FROM roomnumbers WHERE hotel='$naam' && country='$mulk' && location='$jaga'";
		$resultta = $conn->query($sqlla);

?>

<table>
<thead>
<th>Type</th>
<th></th>
<th>Quantity</th>
<th></th><th></th>
<th> Release Date</th>
<th></th><th></th>
<th> Allowed Adults</th>
<th></th><th></th>
<th> Allowed Children</th>
<th></th><th></th>
<th> Allowed Max</th>
<th></th><th></th>
<th> Images</th>
</thead>
<tbody>
<?php
	
if ($resultta->num_rows > 0) {
  // output data of each row
  while($rowwa = $resultta->fetch_assoc()) {
	  ?>
	  <tr>
	  
	  <td  align="center"><?php echo $rowwa['name']; ?></td>
	  
	   
	<td></td>
	  <td  align="center"><?php echo $rowwa['number'];?>
	  
	<td></td><td></td>
	  
	  <td align="center"><?php echo $rowwa['dates'];?>
	
	  <td></td><td></td>
	  
	  <?php 
		$naamm=	$rowwa['name'];			
							
							
		
$sqllaw ="SELECT * FROM allowedpersons WHERE hotel='$naam' && country='$mulk' && location='$jaga' && name='$naamm'";
		$resulttaw = $conn->query($sqllaw);
		
if ($resulttaw->num_rows > 0) {
  // output data of each row
  while($rowwaw = $resulttaw->fetch_assoc()) {

?>
	  
	  <td align="center"><?php echo $rowwaw['adults']; ?></td>
	  
	  
	  <td></td><td></td>
	  
	  <td align="center"><?php echo $rowwaw['children']; ?></td>
	  
	  <td></td><td></td>
	  
	  
	  <td align="center"><?php echo $rowwaw['max']; ?></td>
	  
	  
	  
	  
	<td></td><td></td>
	    
		<?php
		
  }
}
?>
<td>

	   
	  <?php 
							
			$namee=	$rowwa['name'];	
 ?>


<?php 
							
		
$sqllaa ="SELECT * FROM roomimages WHERE hotel='$naam' && country='$mulk' && location='$jaga' && room='$namee';";
		$resulttaa = $conn->query($sqllaa);
		
		
		
if ($resulttaa->num_rows > 0) {
  // output data of each row
  while($rowwaa = $resulttaa->fetch_assoc()) {
	  
	  ?>
	  
	  <img style="width:10%;" src="Room Uploads/<?php echo $namee;?>/<?php echo $rowwaa['image']; ?>">
	  
<?php	  
}
}
	  ?>
	  <?php
	  
}}							
							?>
	  
	  
	  
	  
	  </td>
	  
	  
	  
	  </tr>
	  
	  
	 
							
                         
</tbody>
</table>

						 </div>
                        </div>
                      </div>
             
			 
			 
			 <?php
			 $a=$a+1;
}}
?>
			 
			 
                    </div>
                  </div>
                </div>

                

              </div>
          </div><!--end row-->
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  </main>