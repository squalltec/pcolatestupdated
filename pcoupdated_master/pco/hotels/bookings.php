
<?php 

session_start(); 

require_once('db_connection.php'); 
$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

?>

<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
	Bookings
<?php endblock() ?>

<?php startblock('stylesheethead') ?>
<style>
	.dataTables_filter{
		float: right !important;
	}
	.page-item.active .page-link {
		z-index: 3;
		color: #fff !important;
		background-color: #ce3435;
		border-color: #ce3435;
	}
	.page-link {
		color:#ce3435 !important;
	}
	.buttons-copy,.buttons-excel,.buttons-pdf, .buttons-print{
		color: #fff !important;
		background-color: #ce3435;
		border-color: #ce3435;

	}
	.buttons-copy:hover,.buttons-excel:hover,.buttons-pdf:hover, .buttons-print:hover{
		color: #ce3435 !important;
		background-color: #fff;
		border-color: #ce3435;

	}
	td{
		border-right:1px solid #ce3435 !important;
		border-left:1px solid #ce3435 !important;
	}
	thead tr > th{
		border: 1px solid red !important;
		text-align: center;
	}
	tbody{
		border:1px solid #ce3435;
		text-align: center;
	}
	.dataTables_filter{
		display: none;
	}
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
		<h2 class="text-uppercase text-dark">Hotel Bookings</h2>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="bookingsTable" class="table align-middle" width="100%" style="margin-top: 20px;">
								<thead >
									<tr>
										<th>Booking No</th>
										<th>Check In</th>
										<th>Check Out</th>
										<th>Name</th>
										<th>Nationality</th>
										<th>Room Type</th>
										<th>Occupancy</th>
										<th>Food</th>
										<th>Remarks</th>
										<th>Price</th>
										<th>Confirmation Number</th>
									</tr>
								</thead>
								<tbody >
								   
								   <?php
								   
								   
								   $han=$_SESSION['hotel'];
								   $can=$_SESSION['country'];
								   $ctan=$_SESSION['city'];
								   
								   
									$sql ="SELECT * FROM bookings WHERE hotel='$han' && country='$can' && location='$ctan' ORDER BY id DESC";
											$result = $conn->query($sql);
										
									if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									
									?>
								    
									<tr>
										<td><?php echo $row['uniquenumber'];?></td>
										<td><?php echo $row['checkin'];?></td> 
										<td><?php echo $row['checkout'];?></td>
										<td><?php echo $row['title'];?> <?php echo $row['fname'];?> <?php echo $row['lname'];?></td>
										<td><?php echo $row['roomtype'];?></td>
										<td><?php echo $row['nationality'];?></td>
										<td><?php echo $row['adults'];?> + <?php echo $row['children'];?></td>
										<td>
											<div class="d-flex justify-content-between" style="font-size: 12px;">
												<span>Breakfast: </span>
												<span><?php if(isset($row['breakfast']) && $row['breakfast'] == 'included'){echo '<span class="badge rounded-pill bg-success">Yes</span>';}else{echo '<span class="badge rounded-pill bg-danger">No</span>';}?></span>
											</div>
											<div class="d-flex justify-content-between" style="font-size: 12px;">
												<span>Lunch: </span>
												<span><?php if(isset($row['lunch']) && $row['lunch'] == 'included'){echo '<span class="badge rounded-pill bg-success">Yes</span>';}else{echo '<span class="badge rounded-pill bg-danger">No</span>';}?></span>
											</div>
											<div class="d-flex justify-content-between" style="font-size: 12px;">
												<span>Dinner: </span>
												<span><?php if(isset($row['dinner']) && $row['dinner'] == 'included'){echo '<span class="badge rounded-pill bg-success">Yes</span>';}else{echo '<span class="badge rounded-pill bg-danger">No</span>';}?></span>
											</div>
											
											 
										</td>
										
										<td><?php echo $row['remarks'];?></td>
										<td><?php echo $row['price'];?></td>
										<td>5646546454</td>
									
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
		
<?php endblock() ?>

<?php startblock('FooterText') ?>
    Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>

<script>

	$( document ).ready(function() {

		var table = $('#bookingsTable').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print']
        } );
		table.buttons().container()
            .appendTo( '#bookingsTable_wrapper .col-md-6:eq(0)' );

		

		var tableWidth = $('#bookingsTable').width();
		if(tableWidth > 1190){
			$(".toggle-icon").click();
		}

		$('#mySearchBox').on( 'keyup', function () {
			table.search($('#mySearchBox').val()).draw();
		} );
	});
	
</script>
  
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>

<?php endblock();?>	
