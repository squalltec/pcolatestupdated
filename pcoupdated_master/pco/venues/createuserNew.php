<?php
session_start();
$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];
require_once('db_connection.php');






if (isset($_POST['delme'])) {


	$uniqueid = $_POST['uniqueid'];




	$aidii = $_POST['aidi'];


	$sql = "DELETE FROM venueusers WHERE id='$aidii'";

	if ($conn->query($sql) === TRUE) {
		//  echo "Record deleted successfully";
	} else {
		// echo "Error deleting record: " . $conn->error;
	}



	$sql = "DELETE FROM profilepictures WHERE uniqueid='$uniqueid'";

	if ($conn->query($sql) === TRUE) {
		//  echo "Record deleted successfully";
	} else {
		// echo "Error deleting record: " . $conn->error;
	}
}

if (isset($_POST['submit'])) {


	$hotel = $_SESSION['hotel'];

	$star = $_SESSION['star'];

	$country = $_SESSION['country'];

	$city = $_SESSION['city'];


	$fname = $_POST['fname'];

	$lname = $_POST['lname'];

	$designation = $_POST['designation'];

	$department = $_POST['department'];

	$phone = $_POST['phone'];

	$nationality = $_POST['nationality'];

	$birthday = $_POST['birthday'];

	//$role=$_POST['role'];

	$email = $_POST['email'];

	$password = $_POST['password'];


	$uid = array();

	$nn = 0;
	foreach ($fname as $value) {
		$ud = uniqid();

		array_push($uid, $ud);

		$role = implode(", ", $_POST['rights' . $nn]);



		echo $role;


		$sql = "INSERT INTO venueusers (hotel,country,city,star,fname,lname,designation,department,phone,nationality,birthday,role,email,password,uniqueid)
           VALUES ('$hotel','$country','$city','$star','$fname[$nn]','$lname[$nn]','$designation[$nn]','$department[$nn]','$phone[$nn]','$nationality[$nn]','$birthday[$nn]','$role','$email[$nn]','$password[$nn]','$ud')";

		$resulta = $conn->query($sql);


		if ($resulta === TRUE) {


			$_SESSION['alertme'] = 1;
		}


		$nn = $nn + 1;
	}










	$nimg = 0;
	foreach ($fname as $value) {


		if (!empty($_FILES['profilePic' . $nimg]['name'])) {


			mkdir("../Profile Pictures/" . $hotel . "/" . $uid[$nimg], 0755, true);

			$filename2 = $_FILES['profilePic' . $nimg]['name'];
			$destination2 = '../Profile Pictures/' . $hotel . '/' . $uid[$nimg] . '/' . $filename2;
			$extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
			$file2 = $_FILES['profilePic' . $nimg]['tmp_name'];

			// move the uploaded (temporary) file to the specified destination
			if (move_uploaded_file($file2, $destination2)) {

				$sqlx = "INSERT INTO profilepictures (hotel,country,city, image,fname,lname,uniqueid) VALUES ('$hotel', '$country', '$city', '$filename2', '$fname[$nimg]', '$lname[$nimg]','$uid[$nimg]')";

				$resultx = $conn->query($sqlx);


				if ($resultx === TRUE) {
					// echo "Category created successfully";
				} else {
					echo "Error: " . $sqlx . "<br>" . $conn->error;
				}
			}
		}


		$nimg = $nimg + 1;
	}
}



?>







<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Create And Manage Users
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<style>
	input,
	select {
		padding: 10px 10px !important;
	}


	input[type="number"] {
		-moz-appearance: textfield !important;
	}

	input[type="number"]:hover,
	input[type="number"]:focus {
		-moz-appearance: number-input !important;
	}

	.signup-form {
		padding: 40px 40px 40px;
	}

	label.error:after {
		display: inline-block;
		position: absolute;
		content: '';
		background-image: url("data:image/svg+xml,<svg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z' clip-rule='evenodd'/></svg>");
		background-repeat: no-repeat;
		right: 20px;
		top: 40px;
		font-size: 13px;
		color: #ff1212;
	}

	input.valid {
		border: 1px solid lightgray;
	}

	.br-1 {
		border-right: 1px solid lightgray !important;
	}

	title {
		width: 110px !important;
		height: 110px !important;
	}

	h3 {
		display: block;
		text-align: center;
		padding: 20px 20px;
		font-size: 15px;
		border: 1px solid #ce3435;
	}

	h3:hover {
		background: #ce3435;
		color: white;
		cursor: pointer;
		border: 1px solid black;
	}

	.activeH3 {
		display: block;
		text-align: center;
		background: #ce3435;
		padding: 20px 20px;
		color: white;
		font-size: 15px;

	}

	.activeH3:hover {
		border: 1px solid black;
	}

	.DisableDiv {
		cursor: not-allowed !important;
	}

	.form-check-input:checked {
		background-color: #ce3435 !important;
		border-color: #ce3435 !important;
	}

	.btn-danger {
		background-color: #ce3435 !important;
	}

	.btn-danger:hover {
		transform: scale(1.1);
	}

	.card {
		height: 100%;
	}

	.card-title {
		margin-bottom: 0.5rem;
		background: #ce3435;
		padding: 10px 8px;
		color: white;
		border-radius: 5px;
		font-size: 15px;
	}

	.card-body {
		position: relative;
		padding-bottom: 35px;
	}

	.addMoreButtom {
		padding: 0px !important;
		float: right;
		position: absolute;
		bottom: 5px;
		right: 18px;
		height: 25px;
		width: 25px;
	}

	/* .selectAllRow{
	float:right;

	} */
	.selectAllRow {
		display: flex;
		justify-content: end;
	}

	.selectAllRow .form-check .form-check-label {
		font-weight: bold !important;
		color: black;
	}

	.signup-form {
		padding: 40px 40px 40px;
	}

	fieldset {
		border: none;
		margin: 0;
		padding: 0;
	}

	.form-container {
		width: 100%;
		position: relative;
		margin: 0 auto;
		background: #fff;
		box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
		-moz-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
		-webkit-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
		-o-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
		-ms-box-shadow: 0 3px 9.5px .5px rgba(0, 0, 0, .1);
		border-radius: 10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		-o-border-radius: 10px;
		-ms-border-radius: 10px;
	}

	legend {
		width: 100%;
		margin: 0;
		margin-bottom: 0px;
		padding: 0;
		font-size: 17px !important;
		margin-bottom: 20px;
	}

	@media (min-width: 1200px) {
		legend {
			font-size: 1.5rem;
		}

		legend {
			float: left;
			width: 100%;
			padding: 0;
			margin-bottom: .5rem;
			font-size: calc(1.275rem + .3vw);
			line-height: inherit;
		}
	}

	.icon {
		font-size: 29px;
	}

	.form-check-input {
		padding: 0px !important;
	}

	.step-heading {
		color: rgb(206, 52, 53);
		float: left;
	}

	.step-number {
		float: right;
	}

	.cardRemoveIcon {
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Users</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-users"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Manage Users</li>
			</ol>
		</nav>
	</div>
	<div class="ms-auto">
		<div class="btn-group">
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"><i class="bi bi-plus"></i> Add New</button>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<h5 class="mb-0">Customer Details</h5>
			<form class="ms-auto position-relative">
				<div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
				<input class="form-control ps-5" type="text" placeholder="search">
			</form>
		</div>
		<div class="table-responsive mt-3">
			<table class="table align-middle" style="border: 1px solid #ce3435;">
				<thead class="table-secondary" style="background-color: #ce3435 !important; color:white;">
					<tr>
						<th style="background-color: #ce3435;">#</th>
						<th style="background-color: #ce3435;">Name</th>
						<th style="background-color: #ce3435;">Designation</th>
						<th style="background-color: #ce3435;">Department</th>
						<th style="background-color: #ce3435;">Phone</th>
						<th style="background-color: #ce3435;">Nationality</th>
						<th style="background-color: #ce3435;">Role</th>
						<th style="background-color: #ce3435;">Email</th>
						<th style="background-color: #ce3435;">Actions</th>
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
						    
						    
						    
						    
							$sql2 = "SELECT * FROM profilepictures WHERE hotel='$han' && country='$can' && city='$ctan' && fname='" . $row['fname'] . "' && lname='" . $row['lname'] . "' ";
							$result2 = $conn->query($sql2);

							if ($result2->num_rows > 0) {
								// output data of each row
								while ($row2 = $result2->fetch_assoc()) {
									$imagg = $row2['image'];
								}
							}


					?>






							<tr>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['id']; ?></td>
								<td style="border-right: 1px solid #ce3435;">
									<div class="d-flex align-items-center gap-3 cursor-pointer">
										<img src="../Profile Pictures/<?php echo $han; ?>/<?php echo $row['uniqueid']; ?>/<?php echo $imagg; ?>" class="rounded-circle" width="44" height="44" alt="">
										<div class="">
											<p class="mb-0"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></p>
										</div>
									</div>
								</td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['designation']; ?></td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['department']; ?></td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['phone']; ?></td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['nationality']; ?></td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['role']; ?></td>
								<td style="border-right: 1px solid #ce3435;"><?php echo $row['email']; ?></td>
								<td>
									<div class="table-actions d-flex align-items-center gap-3 fs-6">

										<a href="userProfile.php?uid=<?php echo $row['id']; ?>" class="btn btn-dark" title="Edit User"><i class="bi bi-pencil-fill"></i></a>

										<form action='#' method='POST'>
											<input style='display:none;' name='uniqueid' value="<?php echo $row['uniqueid']; ?>">

											<input style='display:none;' name='aidi' value="<?php echo $row['id']; ?>">

											<button type="submit" name='delme' class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>



										</form>

									</div>
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
<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Users</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form action='#' method='POST' enctype='multipart/form-data'>
				<div class="modal-body">
					<div id="addMoreUsersForm">
						<div class="card">
							<div class="card-body" style="position:relative;">
								<span class="cardRemoveIcon" onclick="DelCard(this)"><i class="bi bi-x-lg"></i></span>
								<div class="row">
									<div class="col-md-4">
										<label for="fname">First Name</label>
										<input class="form-control" required="" id="fname" name="fname[]" placeholder="First Name">
									</div>
									<div class="col-md-4">
										<label for="lname">Last Name</label>
										<input class="form-control" required="" id="lname" name="lname[]" placeholder="Last Name">
									</div>
									<div class="col-md-4">
										<label for="Designation">Designation</label>
										<input class="form-control" required="" name="designation[]" id="Designation" placeholder="Designation">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<label for="Department">Department</label>
										<input class="form-control" required="" id="Department" name="department[]" placeholder="Department">
									</div>
									<div class="col-md-4">
										<label for="Phone">Phone</label>
										<input class="form-control" required="" id="Phone" name="phone[]" placeholder="Phone">
									</div>
									<div class="col-md-4">
										<label for="Nationality">Nationality</label>
										<input class="form-control" required="" id="Nationality" name="nationality[]" placeholder="Nationality">
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<lable for="Birthday">Birthday</lable>
										<input class="form-control" type='date' required="" id="Birthday" name="birthday[]" placeholder="Birthday">
									</div>
									<div class="col-md-4">
										<lable for="emaild">Email</lable>
										<input type="email" class="form-control" required="" id="emaild" name="email[]" placeholder="Email">
									</div>
									<div class="col-md-4">
										<lable for="Password">Password</lable>
										<input class="form-control" id='password0' type='password' required="" name="password[]" placeholder="Password">
										<input type="checkbox" class="form-check-input" id='p0' data-id='0' onclick="password(this)"><label for='p0'>Show Password</label>
									</div>
								</div>
								<div class="row">

									<div class="col-md-4">
										<lable for="profilePic">Roles</lable>
										<div class="row">
											<div class="col-md-6">
												<input name='rights0[]' id='admin0' data-id='0' onclick='dis(this);' value='admin' type='checkbox'><label for 'admin0'> &nbsp;Admin</label><br />
												<input name='rights0[]' id='accounts0' value='accounts' type='checkbox'><label for 'accounts0'> &nbsp;Accounts</label><br />
											</div>
											<div class="col-md-6">
												<input name='rights0[]' id='management0' value='management' type='checkbox'><label for 'management0'> &nbsp;Management</label><br />
												<input name='rights0[]' id='revenue0' value='revenue' type='checkbox'><label for 'revenue0'> &nbsp;Revenue</label>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<lable for="profilePic">Profile Image</lable>
										<input type="file" class="form-control" accept='image/*' name="profilePic0">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row d-flex justify-content-center">
						<button class='btn btn-danger col-sm-1' id='addact2' onclick="myFunction2()">+</button>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name='submit' class="btn btn-danger">Save changes</button>
				</div>
		</div>
	</div>
</div>


</form>


<?php endblock() ?>

<?php startblock('FooterText') ?>
Desgined and Developed By Squalltec
<?php endblock() ?>

<?php startblock('scriptBottom') ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	function DelCard(el) {
		$(el).parent().parent().remove();
	}
	// $('.cardRemoveIcon').click(function(){
	// 	$(this).parent().parent().remove();
	// });

	function dis($this) {
		var aid = $this.getAttribute('data-id');
		if (document.getElementById('admin' + aid).checked) {
			document.getElementById('accounts' + aid).checked = false;
			document.getElementById('accounts' + aid).disabled = true;
			document.getElementById('management' + aid).checked = false;
			document.getElementById('management' + aid).disabled = true;
			document.getElementById('revenue' + aid).checked = false;
			document.getElementById('revenue' + aid).disabled = true;
		} else {
			document.getElementById('accounts' + aid).disabled = false;
			document.getElementById('management' + aid).disabled = false;
			document.getElementById('revenue' + aid).disabled = false;
		}

	}

	function password($this) {
		var aid = $this.getAttribute('data-id');

		var x = document.getElementById("password" + aid);
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

	$.ajax({

		type: 'POST',

		url: 'getalertme.php',
		success: function(result) {


			if (result.includes('exists')) {
				Swal.fire('Updated Successfully')
			}



		}

	});

	document.getElementById("addact2").addEventListener("click", function(event) {
		event.preventDefault()
	});


	var abc = 1;
	var n = 1;
	var counting = 1;

	function myFunction2() {
		var NewUserFromHTML = `<div class="card">
						<div class="card-body" style="position:relative;">
						<span class="cardRemoveIcon" onclick="DelCard(this)"><i class="bi bi-x-lg"></i></span>
							<div class="row">
								<div class="col-md-4">
									<label for="fname">First Name</label>
									<input class="form-control" required="" id="fname" name="fname[]" placeholder="First Name">
								</div>
								<div class="col-md-4">
									<label for="lname">Last Name</label>
									<input class="form-control" required="" id="lname" name="lname[]" placeholder="Last Name">
								</div>
								<div class="col-md-4">
									<label for="Designation">Designation</label>
									<input class="form-control" required="" name="designation[]" id="Designation" placeholder="Designation">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="Department">Department</label>
									<input class="form-control" required="" id="Department" name="department[]" placeholder="Department">
								</div>
								<div class="col-md-4">
									<label for="Phone">Phone</label>
									<input class="form-control" required="" id="Phone" name="phone[]" placeholder="Phone">
								</div>
								<div class="col-md-4">
									<label for="Nationality">Nationality</label>
									<input class="form-control" required="" id="Nationality" name="nationality[]" placeholder="Nationality">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<lable for="Birthday">Birthday</lable>
									<input class="form-control" type='date' required="" id="Birthday" name="birthday[]" placeholder="Birthday">
								</div>
								<div class="col-md-4">
									<lable for="emaild">Email</lable>
									<input type="email" class="form-control" required="" id="emaild" name="email[]" placeholder="Email">
								</div>
								<div class="col-md-4">
									<lable for="Password">Password</lable>
									<input class="form-control" id='password0' type='password' required="" name="password[]" placeholder="Password">
									<input type="checkbox" class="form-check-input" id='p0' data-id='0' onclick="password(this)"><label for='p0'>Show Password</label>
								</div>
							</div>
							<div class="row">
							
							
								<div class="col-md-4">
									<lable for="profilePic">Roles</lable>
									<div class="row">
										<div class="col-md-6">
											<input name='rights` + abc + `[]' id='admin` + abc + `' data-id='` + abc + `' onclick='dis(this);' value='admin' type='checkbox'><label for 'admin` + abc + `'> &nbsp;Admin</label><br />
											<input name='rights` + abc + `[]' id='accounts` + abc + `' value='accounts' type='checkbox'><label for 'accounts` + abc + `'> &nbsp;Accounts</label><br />
										</div>
										<div class="col-md-6">
											<input name='rights` + abc + `[]' id='management` + abc + `' value='management' type='checkbox'><label for 'management` + abc + `'> &nbsp;Management</label><br />
											<input name='rights` + abc + `[]' id='revenue` + abc + `' value='revenue' type='checkbox'><label for 'revenue` + abc + `'> &nbsp;Revenue</label>
										</div>
									</div>
								</div>
							
							
							
								<div class="col-md-4">
									<lable for="profilePic">Profile Image</lable>
									<input type="file" class="form-control" accept='image/*' name="profilePic` + abc + `" >
								</div>
							</div>
							
						</div>
					</div>`;

		$('#addMoreUsersForm').append(NewUserFromHTML);

		abc = abc + 1;

	}
</script>

<?php endblock(); ?>