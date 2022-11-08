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

				
				<h6 class="mb-0 text-uppercase">Bookings Applied for Cancellation</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									   <th>Cancelled</th>
										<th>Booking Number</th>
										<th>Hotel</th>
										<th>Country</th>
										<th>City</th>
										<th>Title</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Nationality</th>
										<th>Room Type</th>
										<th>Check In</th>
										<th>Check Out</th>
										<th>Days</th>
										<th>Price</th>
										
										<th>Adults</th>
										<th>Children</th>
										<th>Breakfast</th>
										<th>Lunch</th>
										<th>Dinner</th>
										<th>Remarks</th>
										<th>Deduction AED</th>
										 <th>Accept</th>
									    
									</tr>
								</thead>
								<tbody>
								   
								   <?php
								   
								   
								   $han=$_SESSION['hotel'];
								   $can=$_SESSION['country'];
								   $ctan=$_SESSION['city'];
								   
								   
$sql ="SELECT * FROM bookings WHERE hotel='$han' && country='$can' && location='$ctan' && cancellationapplied='Applied' GROUP BY uniquenumber";
		$result = $conn->query($sql);
	
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$un=$row['uniquenumber'];
	$sqln ="SELECT * FROM bookings WHERE uniquenumber='$un'";
		$resultn = $conn->query($sqln);
	
if ($resultn->num_rows > 0) {
  // output data of each row
  while($rown = $resultn->fetch_assoc()) {
	?>
								    
									<tr>
									  <td><?php 
									  if($rown['cancellationconfirmed']=='')
									  {
									  echo 'Pending'; 
									  }else
									  {
									  echo 'Confirmed';
									  }?></td>
									  
										<td><?php echo $rown['uniquenumber'];?></td>
										<td><?php echo $rown['hotel'];?></td>
										<td><?php echo $rown['country'];?></td>
										<td><?php echo $rown['location'];?></td>
										<td><?php echo $rown['title'];?></td>
										<td><?php echo $rown['fname'];?></td>
										<td><?php echo $rown['lname'];?></td>
										<td><?php echo $rown['email'];?></td>
										<td><?php echo $rown['phone'];?></td>
										<td><?php echo $rown['nationality'];?></td>
										<td><?php echo $rown['roomtype'];?></td>
										<td><?php echo $rown['checkin'];?></td> 
										<td><?php echo $rown['checkout'];?></td>
										<td><?php echo $rown['days'];?></td>
										<td><?php echo $rown['price'];?></td>
										<td><?php echo $rown['adults'];?></td>
										<td><?php echo $rown['children'];?></td>
										<td><?php echo $rown['breakfast'];?></td>
										<td><?php echo $rown['lunch'];?></td>
										<td><?php echo $rown['dinner'];?></td>
										<td><?php echo $rown['remarks'];?></td>
										
									   
									
									</tr>
									
								
								<?php
  }
}
?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>

									   
    <td>  <?php echo $row['deduction'];?></td>
										 <td> <button onclick='acceptcancel(<?php echo $row['uniquenumber'];?>)' class='btn btn-success'>Accept</button><button onclick='rejectcancel(<?php echo $row['uniquenumber'];?>)' class='btn btn-danger'>Reject</button>
									</td>
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
		    function acceptcancel(abc){
		        //alert(abc);
		        
		        
		        
		        
		        
		        
		          $.ajax({

                                            type: 'POST',
                                            url: 'cancelbookingsubmit.php',
                                            data: {
                                                'cancel': 'accept',
                                                'bookingnumber': abc
                                               
                                            },

                                            success: function(result) {
  location.reload();
    
                                            }

                                        });
      
      
      
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		    }
		       function rejectcancel(abc){
		       // alert(abc);
		       
		       
		       
		        
		          $.ajax({

                                            type: 'POST',
                                            url: 'cancelbookingsubmit.php',
                                            data: {
                                                'cancel': 'reject',
                                                'bookingnumber': abc
                                               
                                            },

                                            success: function(result) {
  location.reload();
    
                                            }

                                        });
		    }
		</script>
		
		
		
		


  
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  
  <script src="assets/js/table-datatable.js"></script>
	












</main>








 