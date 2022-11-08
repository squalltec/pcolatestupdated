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

				
				<h6 class="mb-0 text-uppercase">Users</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									
										<th>First Name</th>
										<th>Last Name</th>
										<th>Designation</th>
											<th>Department</th>
											<th>Phone</th>
										<th>Nationality</th>
										<th>Birthday</th>
										<th>Role</th>
										<th>Email</th>
									    <th>Password</th>
										
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
								   
								   $han=$_SESSION['hotel'];
								   $can=$_SESSION['country'];
								   $ctan=$_SESSION['city'];
								   
								   
$sql ="SELECT * FROM venueusers WHERE hotel='$han' && country='$can' && city='$ctan'";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	?>
								    
									<tr>
									
										<td><?php echo $row['fname'];?></td>
											<td><?php echo $row['lname'];?></td>
												<td><?php echo $row['designation'];?></td>
												<td><?php echo $row['department'];?></td>
												<td><?php echo $row['phone'];?></td>
												<td><?php echo $row['nationality'];?></td>
												<td><?php echo $row['birthday'];?></td>
												<td><?php echo $row['role'];?></td>
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['password'];?></td>
									
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








 