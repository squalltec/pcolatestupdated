<?php 
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

$roler = $_SESSION['roler'];

include './BaseFiles/base.php';

?>

<?php startblock('PageTitle') ?>
PCO Connect || Users List
<?php endblock() ?>
<?php startblock('stylesheethead') ?>


<?php endblock() ?>

<?php startblock('navigation') ?>

    <?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<h6 class="mb-0 text-uppercase">Users</h6>
	<hr />
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


						$han = $_SESSION['hotel'];
						$can = $_SESSION['country'];
						$ctan = $_SESSION['city'];


						$sql = "SELECT * FROM venueusers WHERE hotel='$han' && country='$can' && city='$ctan'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {

						?>

								<tr>

									<td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['lname']; ?></td>
									<td><?php echo $row['designation']; ?></td>
									<td><?php echo $row['department']; ?></td>
									<td><?php echo $row['phone']; ?></td>
									<td><?php echo $row['nationality']; ?></td>
									<td><?php echo $row['birthday']; ?></td>
									<td><?php echo $row['role']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['password']; ?></td>

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


<?php endblock();?>	
