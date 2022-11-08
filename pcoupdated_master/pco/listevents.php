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

				
				<h6 class="mb-0 text-uppercase">All Events</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									    <th>Country</th>
									    <th>City</th>
										<th>Name</th>
										<th>Starting Date</th>
										<th>Ending Date</th>
										<th>Description</th>
										<th>Title</th>
										<th>Background Color</th>
										<th>Text Color</th>
										<th>Venue Name</th>
										<th>Venue Location</th>
										<th>Venue Address</th>
										<th>GPS Location</th>
										<th>Directions</th>
										<th>FB</th>
										<th>Insta</th>
										<th>Linkedin</th>
										<th>Twitter</th>
										<th>NOS</th>
										<th>Event Type</th>
										<th>Past Years</th>
										<th>Pax</th>
										<th>Locations</th>
										<th>Type of Event</th>
										<th>Guests Regions</th>
										<th>Logo</th>
										<th>Banner</th>
										<th>Highlight Image</th>
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
$sql ="SELECT * FROM newevents";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
									<tr>
										<td><?php echo $row['country'];?></td>
										<td><?php echo $row['city'];?></td>
										<td><?php echo $row['name'];?></td>
										<td><?php $date=date_create($row['sdate']);
                                        echo date_format($date,"d/m/Y");?></td>
										
										
										<td><?php $date=date_create($row['edate']);
                                        echo date_format($date,"d/m/Y");?></td>
										
										
										
										<td><textarea disabled rows="3" cols="50"><?php echo $row['descr'];?></textarea></td>
										<td><?php echo $row['title'];?></td>
										<td><input type='color' value='<?php echo $row['backcolor'];?>' disabled></td>
										<td><input type='color' value='<?php echo $row['color'];?>' disabled></td>
										<td><?php echo $row['venuename'];?></td>
										<td><?php echo $row['venuelocation'];?></td>
										<td><?php echo $row['venueaddress'];?></td> 
										<td><?php echo $row['gpslocation'];?></td>
										<td><?php echo $row['venuedirection'];?></td>
										<td><?php echo $row['fb'];?></td>
										<td><?php echo $row['insta'];?></td>
										<td><?php echo $row['linkedin'];?></td>
										<td><?php echo $row['twitter'];?></td>
										<td><?php echo $row['nos'];?></td>
										<td><?php echo $row['eventtype'];?></td>
										<td><?php echo $row['year'];?></td>
										<td><?php echo $row['pax'];?></td>
										<td><?php echo $row['location'];?></td>
										<td><?php echo $row['typeofevent'];?></td>
										<td><?php echo $row['guestsregions'];?></td>
										<td><a href="eventlogos/<?php echo $row['name'];?>/<?php echo $row['logo'];?>">View</a></td>
										<td><a href="eventbanners/<?php echo $row['name'];?>/<?php echo $row['banner'];?>">View</a></td>
										<td><a href="eventhighlights/<?php echo $row['name'];?>/<?php echo $row['highimg'];?>">View</a></td>
									
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








 