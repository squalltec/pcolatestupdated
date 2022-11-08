<?php
require_once('db_connection.php');


include('header.php');

if(isset($_GET['SpecificData'])){
	$datatype = $_GET['SpecificData'];
	switch ($datatype) {
		case "events":
			$sql = "SELECT * FROM contactsevents ORDER BY id DESC";
		  break;
		  	case "tour":
			$sql = "SELECT * FROM contactstour ORDER BY id DESC";
		  break;
		case "hotels":
			$sql = "SELECT * FROM contactshotels ORDER BY id DESC";
		  break;
		case "rentacar":
			$sql = "SELECT * FROM contactsrentacar ORDER BY id DESC";
		  break;
		case "transport":
			$sql = "SELECT * FROM contactstransports ORDER BY id DESC";
			break;
				case "others":
			$sql = "SELECT * FROM contactsothers ORDER BY id DESC";
			break;
		case "all":
			$sql = "SELECT * FROM contactsevents  
			union select * from contactshotels  
			union select * from contactsrentacar 
			union select * from contactsothers 
			union select * from contactstransports ORDER BY id DESC";
			break; 
		default:
		$sql = "SELECT * FROM contactsevents  
		union select * from contactstour
		union select * from contactshotels  
		union select * from contactsrentacar  
		union select * from contactsothers 
		union select * from contactstransports ORDER BY id DESC
		";
	  }

}else{
	$sql = "SELECT * FROM contactsevents  
	union select * from contactstour 
		union select * from contactshotels  
		union select * from contactsrentacar  
		union select * from contactsothers 
		union select * from contactstransports ORDER BY id DESC
		";
}




$result = $conn->query($sql);

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

	<div class="row">
		<div class="col-md-8">
			<h6 class="mb-0 text-uppercase">Contacts Database</h6>
		</div>
		<div class="col-md-4">
			<form name="specifcDataform" method="get" action="" id="specifcDataform">
				<select class="form-control" name="SpecificData" onchange="getSpecific()" <?php if(isset($_GET['SpecificData'])){ echo"value='".$_GET['SpecificData']."'";} ?>>
					<option disabled selected>Select Specific Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'all'){ echo"selected";} ?> value="all">Select All Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'events'){ echo"selected";} ?> value="events">Events Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'hotels'){ echo"selected";} ?> value="hotels">Hotels Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'rentacar'){ echo"selected";} ?> value="rentacar">Rent A Car Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'transport'){ echo"selected";} ?> value="transport">Transport Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'tour'){ echo"selected";} ?> value="tour">Tour Contacts</option>
					<option <?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'others'){ echo"selected";} ?> value="others">Other Contacts</option>
				</select>
			</form>
			<script>
				function getSpecific(){
					document.getElementById("specifcDataform").submit();
				}
			</script>
		</div>
	</div>

	<hr />
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="contactsTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="display: none;">Id</th>
							<th><?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'hotels'){ echo"Hotel";}else{echo 'Company';} ?></th>
							<th>Country</th>
							<th>City</th>
							<th>Name</th>
							<th>Designation</th>
							<th>Department</th>
							<th>Outlet</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Nationality</th>
							<th>Bday</th>

						</tr>
					</thead>
					<tbody>

						<?php



						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {

						?>

								<tr>

									<td style="display: none;"><?php echo $row['id']; ?></td>
									<td><?php echo $row['hotel']; ?><?php echo $row['company']; ?></td>
									<td><?php echo $row['country']; ?></td>
									<td><?php echo $row['city']; ?></td>
									<td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
									<td><?php echo $row['designation']; ?></td>
									<td><?php echo $row['department']; ?></td>
									<td><?php echo $row['outlet']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['phone']; ?></td>
									<td><?php echo $row['nationality']; ?></td>
									<td><?php echo $row['birthday']; ?></td>


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

	<script>
		$(document).ready(function () {
			$('#contactsTable').DataTable({
				order: [[0, 'desc']],
			});
		});
	</script>




















































	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

	<script src="assets/js/table-datatable.js"></script>













</main>