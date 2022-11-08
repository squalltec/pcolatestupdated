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

				
				<h6 class="mb-0 text-uppercase">Transfer Bookings</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Booking Number</th>
										<th>Arrival Company Name</th>
										<th>Arrival Car Model</th>
										<th>Arrival Car Brand</th>
										<th>Arrival Car Year</th>
										<th>Arrival Date</th>
										<th>Arrival Time</th>
										<th>Arrival From Location</th>
										<th>Arrival To Location</th>
										<th>Arrival Cars Needed</th>
										<th>Arrival Airline</th>
										<th>Arrival Flight Number</th>
										
										<th>Arrival Price</th>
										
										<th>Departure Company Name</th>
										<th>Departure Car Model</th>
										<th>Departure Car Brand</th>
										<th>Departure Car Year</th>
										<th>Departure Date</th>
										<th>Departure Time</th>
										<th>Departure From Location</th>
										<th>Departure To Location</th>
										<th>Departure Cars Needed</th>
										<th>Departure Airline</th>
										<th>Departure Flight Number</th>
										<th>Departure Price</th>
										
										
									
										<th>Title</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Nationality</th>
										<th>Pax</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
$sql ="SELECT * FROM transfernewbookingsnew";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
									<tr>
										<td><?php echo $row['uniquenumber'];?></td>
										
										
										
																	   <?php
																	   $ida=$row['carida'];
								   
$sql2 ="SELECT * FROM vehiclesInventorydatabase WHERE id='$ida'";
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
										
										<td><?php echo $row['arrivaldate'];?></td>
										<td><?php echo $row['arrivaltime'];?></td>
										<td><?php echo $row['arrivalfromlocation'];?></td>
										<td><?php echo $row['arrivaltolocation'];?></td>
										<td><?php echo $row['arrivalcarsneeded'];?></td>
										<td><?php echo $row['airlinearrival'];?></td>
										<td><?php echo $row['flightnumberarrival'];?></td>
										<td><?php echo $row['arrivalprice'];?></td>
										
										
										
										
										 
								  
																	   <?php
																	   $idd=$row['caridd'];
								   
$sql3 ="SELECT * FROM vehiclesInventorydatabase WHERE id='$idd'";
		$result3 = $conn->query($sql3);
	
if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
	
	echo '<td>'.$row3['hotel'].'</td>';
	echo '<td>'.$row3['model'].'</td>';
	echo '<td>'.$row3['brand'].'</td>';
	echo '<td>'.$row3['year'].'</td>';
	
	
  }
  
	}
	?>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										<td><?php echo $row['departuredate'];?></td>
										<td><?php echo $row['departuretime'];?></td>
										<td><?php echo $row['departurefromlocation'];?></td>
										<td><?php echo $row['departuretolocation'];?></td>
										<td><?php echo $row['departurecarsneeded'];?></td> 
										<td><?php echo $row['airlinedeparture'];?></td>
										<td><?php echo $row['flightnumberdeparture'];?></td>
										<td><?php echo $row['departureprice'];?></td>
										<td><?php echo $row['title'];?></td>
										<td><?php echo $row['fname'];?></td>
										<td><?php echo $row['lname'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['phone'];?></td>
										<td><?php echo $row['nationality'];?></td>	
										<td><?php echo $row['pax'];?></td>	
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








 