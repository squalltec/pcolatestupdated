<?php
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];

$country = $_SESSION['country'];

$city = $_SESSION['city'];

if (isset($_GET['uid'])) {
	$userId = $_GET['uid'];
	$sql = "SELECT * FROM venueusers WHERE id = $userId LIMIT 1";
	$result = $conn->query($sql);

	$userDetails = $result->fetch_assoc();
	// var_dump($userDetails['fname']);
	// die();
} else {
	echo "<script>location.replace('createuserNew.php');</script>";
}






if (isset($_POST['updatepicture'])) {


	$ht = $_POST['hotel'];
	$uniqueid = $_POST['uniqueid'];

	if (!empty($_FILES['profilepicture']['name'])) {


		mkdir("../Profile Pictures/" . $ht . "/" . $uniqueid, 0755, true);

		$filename2 = $_FILES['profilepicture']['name'];
		$destination2 = '../Profile Pictures/' . $ht . '/' . $uniqueid . '/' . $filename2;
		$extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
		$file2 = $_FILES['profilepicture']['tmp_name'];

		// move the uploaded (temporary) file to the specified destination
		if (move_uploaded_file($file2, $destination2)) {






			$sql2 = "UPDATE profilepictures SET image='$filename2' WHERE uniqueid='$uniqueid'";

			$resulta2 = $conn->query($sql2);


			if ($resulta2 === TRUE) {
				header("Refresh:0");
			}else{
				die('what');
			}
		}	
	}
}



if (isset($_POST['update'])) {


	$id = $_POST['aidi'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$designation = $_POST['designation'];
	$department = $_POST['department'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$nationality = $_POST['nationality'];
	$phone = $_POST['phone'];
	$birthday = $_POST['birthday'];
	$email = $_POST['email'];
	$password = $_POST['password'];



	$sql2 = "UPDATE venueusers SET fname='$fname',lname='$lname',designation='$designation',department='$department',nationality='$nationality',phone='$phone',birthday='$birthday',email='$email',password='$password' WHERE id='$id'";

	$resulta2 = $conn->query($sql2);


	if ($resulta2 === TRUE) {


		header("Refresh:0");
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


	$nn = 0;
	foreach ($fname as $value) {


		$role = implode(", ", $_POST['rights' . $nn]);



		echo $role;


		$sql = "INSERT INTO venueusers (hotel,country,city,star,fname,lname,designation,department,phone,nationality,birthday,role,email,password)
           VALUES ('$hotel','$country','$city','$star','$fname[$nn]','$lname[$nn]','$designation[$nn]','$department[$nn]','$phone[$nn]','$nationality[$nn]','$birthday[$nn]','$role','$email[$nn]','$password[$nn]')";

		$resulta = $conn->query($sql);


		if ($resulta === TRUE) {


			$_SESSION['alertme'] = 1;
		}


		$nn = $nn + 1;
	}
}



?>



<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
User || <?= $userDetails['fname'] ?> <?= $userDetails['lname'] ?>
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


<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center">
	<div class="breadcrumb-title pe-3 ">Users</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-home"></i></a>
				</li>
				<li class="breadcrumb-item active " aria-current="page">User Profile</li>
			</ol>
		</nav>
	</div>

</div>
<!--end breadcrumb-->

<!-- <div class="profile-cover bg-dark"></div> -->
<form action='#' method='POST' enctype="multipart/form-data">
	<input style='display:none;' name='aidi' value="<?= $userDetails['id'] ?>">

	<div class="row">
		<div class="col-12 col-lg-8">
			<div class="card shadow-sm border-0">
				<div class="card-body">
					<h5 class="mb-0">My Account</h5>
					<hr>
					<div class="card shadow-none border">
						<div class="card-header">
							<h6 class="mb-0">USER INFORMATION</h6>
						</div>
						<div class="card-body">
							<div class="row g-3">
								<div class="col-6">

									<label class="form-label">First Name</label>
									<input type="text" name='fname' class="form-control" value="<?= $userDetails['fname'] ?>">
								</div>
								<div class="col-6">
									<label class="form-label">Last Name</label>
									<input type="text" name='lname' class="form-control" value="<?= $userDetails['lname'] ?> ">
								</div>
								<div class="col-6">
									<label class="form-label">Designation</label>
									<input type="text" name='designation' class="form-control" value="<?= $userDetails['designation'] ?> ">
								</div>
								<div class="col-6">
									<label class="form-label">Department</label>
									<input type="text" name='department' class="form-control" value="<?= $userDetails['department'] ?> ">
								</div>
							</div>
						</div>
					</div>
					<div class="card shadow-none border">
						<div class="card-header">
							<h6 class="mb-0">CONTACT INFORMATION</h6>
						</div>
						<div class="card-body">
							<div class="row g-3">
								<div class="col-6">
									<label class="form-label">City</label>
									<input type="text" readonly name='city' class="form-control" value="<?= $userDetails['city'] ?>">
								</div>
								<div class="col-6">
									<label class="form-label">Country</label>
									<input type="text" readonly name='country' class="form-control" value="<?= $userDetails['country'] ?>">
								</div>
								<div class="col-6">
									<label class="form-label">Nationality</label>
									<input type="text" name='nationality' class="form-control" value="<?= $userDetails['nationality'] ?>">
								</div>
								<div class="col-6">
									<label class="form-label">Phone</label>
									<input type="text" name='phone' class="form-control" value="<?= $userDetails['phone'] ?>">
								</div>
								<div class="col-12">
									<label class="form-label">Birthday</label>
									<input type="date" name='birthday' class="form-control" value="<?= $userDetails['birthday'] ?>">
								</div>

								<div class="col-6">
									<label class="form-label">Email address</label>
									<input type="text" name='email' class="form-control" value="<?= $userDetails['email'] ?> ">
								</div>

								<div class="col-6">
									<label class="form-label">Password</label>
									<input type="text" name='password' class="form-control" value="<?= $userDetails['password'] ?> ">
								</div>

							</div>
						</div>
					</div>
					<div class="text-end">
						<button type='submit' name='update' class="btn btn-danger px-4">Save Changes</button>
					</div>
				</div>
			</div>
		</div>

</form>

<div class="col-12 col-lg-4">
	<div class="card shadow-sm border-0 overflow-hidden">
		<div class="card-body">
			<div class="profile-avatar text-center">



				<?php


				$sql2 = "SELECT * FROM profilepictures WHERE hotel='$hotel' && country='$country' && city='$city' && fname='" . $userDetails['fname'] . "' && lname='" . $userDetails['lname'] . "' ";
				$result2 = $conn->query($sql2);

				if ($result2->num_rows > 0) {
					// output data of each row
					while ($row2 = $result2->fetch_assoc()) {
						$imagg = $row2['image'];
					}
				}








				//date in mm/dd/yyyy format; or it can be in other formats as well
				$birthDate = $userDetails['birthday'];

				//explode the date to get month, day and year
				$birthDate = explode("-", $birthDate);
				//get age from date or birthdate
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
					? ((date("Y") - $birthDate[0]) - 1)
					: (date("Y") - $birthDate[0]));


				?>


				<img src="../Profile Pictures/<?php echo $hotel; ?>/<?php echo $userDetails['uniqueid']; ?>/<?php echo $imagg; ?>" class="rounded-circle shadow" width="120" height="120" alt="">
			</div>
			<!-- <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                          <div class="text-center">
                            <h4 class="mb-0">45</h4>
                            <p class="mb-0 text-secondary">Friends</p>
                          </div>
                          <div class="text-center">
                            <h4 class="mb-0">15</h4>
                            <p class="mb-0 text-secondary">Photos</p>
                          </div>
                          <div class="text-center">
                            <h4 class="mb-0">86</h4>
                            <p class="mb-0 text-secondary">Comments</p>
                          </div>
                      </div> -->
			<div class="text-center mt-4">
				<h4 class="mb-1"><?= $userDetails['fname'] ?> <?= $userDetails['lname'] ?>, <?php echo $age; ?></h4>
				<p class="mb-0 text-secondary"><?= $userDetails['birthday'] ?></p>
				<div class="mt-4"></div>
				<h6 class="mb-1"><?= $userDetails['designation'] ?> - <?= $userDetails['hotel'] ?></h6>
				<p class="mb-0 text-secondary"><?= $userDetails['city'] ?>, <?= $userDetails['country'] ?></p>
			</div>
			<hr>

			<form action='#' method='POST' enctype="multipart/form-data">
				<input style='display:none;' name='uniqueid' value='<?= $userDetails['uniqueid'] ?>'>
				<input style='display:none;' name='hotel' value='<?= $userDetails['hotel'] ?>'>

				<label>Change Profile Picture</label>
				<input type='file' name='profilepicture' accept='image/*' class='form-control'>
				<input type='submit' style='float:right;' value='Upload' name='updatepicture'>
			</form>
		</div>

	</div>
</div>
</div>
<!--end row-->



<?php endblock() ?>



<?php startblock('scriptBottom') ?>


<?php endblock(); ?>