<?php
require_once('db_connection.php');


include('header.php');

 ?>
 
 


          <main class="page-content">
   









  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/light-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

				
				<h6 class="mb-0 text-uppercase">Rent a Car Bookings</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Booking Number</th>
										
										<th>Title</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Nationality</th>
										<th>Days</th>
										<th>Pickup / Delivery</th>
									
										<th>Price</th>
										<th>Brand</th>
										<th>Company</th>
										<th>Model</th>
										<th>Year</th>
										<th>Pickup Location</th>
										<th>Flight #</th>
										<th>Pickup Date</th>
										<th>Pickup Time</th>
										<th>Dropoff Location</th>
										<th>Flight #</th>
										<th>Dropoff Date</th>
										<th>Dropoff Time</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
$sql ="SELECT * FROM rentacarbookings";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
									<tr>
										<td><?php echo $row['uniquenumber'];?></td>
										
										<td><?php echo $row['title'];?></td>
										<td><?php echo $row['fname'];?></td>
										<td><?php echo $row['lname'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['phone'];?></td>
										<td><?php echo $row['nationality'];?></td>
										<td><?php echo $row['days'];?></td>	
										<td><?php echo $row['pickordelivery'];?></td>	
										<td><?php echo $row['price'];?></td>
										
										
										
																	   <?php
																	   $ida=$row['carid'];
								   
$sql2 ="SELECT * FROM rentacarInventorydatabase WHERE id='$ida'";
		$result2 = $conn->query($sql2);
	
if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
	
	echo '<td>'.$row2['hotel'].'</td>';
	echo '<td>'.$row2['model'].'</td>';
	echo '<td>'.$row2['brand'].'</td>';
	echo '<td>'.$row2['year'].'</td>';
	
	
  }
  
	}
	?>
										
										
										
									<td><?php echo $row['pickuplocation'];?></td>	
									<td><?php echo $row['flightnumb1'];?></td>
									<td><?php echo $row['pickupdate'];?></td>	
									<td><?php echo $row['pickuptime'];?></td>	
									<td><?php echo $row['dropofflocation'];?></td>	
									<td><?php echo $row['flightnumb2'];?></td>
									<td><?php echo $row['dropoffdate'];?></td>	
									<td><?php echo $row['dropofftime'];?></td>	
										
										
										
										
										
										
										
										
										
										
										<td><?php echo $row['remarks'];?></td>
									
									</tr>
								
								<?php
  }
}
?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
		
		
		
		
		
		
		
		
		
		
		


  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>
	












</main>








 