<?php
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];

if (isset($_POST['submit'])) {	
	$numberOfRooms = $_POST['totalRoomTypes'];
	$roomNames = $_POST['room_names'];
	$totalRooms = $_POST['totalRooms'];
	$singleRoomSize = $_POST['SingleRoomSize'];
	$doubleRoomSize = $_POST['DoubleRoomSize'];
	$singledouble = array();
	for($i=0; $i< $numberOfRooms; $i++){
		if ($singleRoomSize[$i] == '' || $singleRoomSize[$i] == '-' || $singleRoomSize[$i] == '0' || $doubleRoomSize[$i] == '' || $doubleRoomSize[$i] == '0' || $doubleRoomSize[$i] == '-') {
			array_push($singledouble, 'on');
			$sd = 'on';
		} else {
			array_push($singledouble, '');
			$sd = '';
		}
		$sql = "INSERT INTO hotelsInventorydatabase (hotel,country,city,type,suite,numberofrooms,roomsize,roomsizedouble)
            VALUES ('$hotel','$country','$city','$roomNames[$i]','$sd','$totalRooms[$i]','$singleRoomSize[$i]','$doubleRoomSize[$i]')";
		$result1 = $conn->query($sql);
		$result1 = true;
		if($result1 === TRUE ){
			$_SESSION['roomname'] = $roomtype;
			$_SESSION['singledouble'] = $singledouble;
			$_SESSION['roomnamecount'] = '0';
			$_SESSION['numberOfRooms'] = $numberOfRooms;
			$_SESSION['roomNames'] = $roomNames;
			$_SESSION['totalRooms'] = $totalRooms;
			$_SESSION['singleRoomSize'] = $singleRoomSize;
			$_SESSION['doubleRoomSize'] = $doubleRoomSize;
			echo "<script>location.replace('addinventoryNew2.php');</script>";
		}


	}

}




?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Add Inventory Wizard
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
		background-color: white;
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
		font-size: 14px;
		font-weight: bold;
	}

	.step-number {
		float: right;
	}

	input,
	select,
	textarea {
		outline: none;
		appearance: unset !important;
		-moz-appearance: unset !important;
		-webkit-appearance: unset !important;
		-o-appearance: unset !important;
		-ms-appearance: unset !important;
	}

	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		appearance: none !important;
		-moz-appearance: none !important;
		-webkit-appearance: none !important;
		-o-appearance: none !important;
		-ms-appearance: none !important;
		margin: 0;
	}

	input:focus,
	select:focus,
	textarea:focus {
		outline: none;
		box-shadow: none !important;
		-moz-box-shadow: none !important;
		-webkit-box-shadow: none !important;
		-o-box-shadow: none !important;
		-ms-box-shadow: none !important;
	}

	input[type=checkbox] {
		appearance: checkbox !important;
		-moz-appearance: checkbox !important;
		-webkit-appearance: checkbox !important;
		-o-appearance: checkbox !important;
		-ms-appearance: checkbox !important;
	}

	input[type=radio] {
		appearance: radio !important;
		-moz-appearance: radio !important;
		-webkit-appearance: radio !important;
		-o-appearance: radio !important;
		-ms-appearance: radio !important;
	}

	input,
	select {
		box-sizing: border-box;
		display: block;
		width: 100%;
		border: 1px solid lightgray;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-o-border-radius: 5px;
		-ms-border-radius: 5px;
		font-family: Roboto, sans-serif !important;
		font-size: 13px;
		padding: 10px 10px;
	}

	input:focus {
		border: 1px solid #666;
	}

	input.valid {
		border: 1px solid #666;
	}
</style>

<?php endblock() ?>

<?php startblock('navigation') ?>

<?php include_once('./includes/navigations.php') ?>

<?php endblock() ?>



<?php startblock('PageContent') ?>


<h1 class="text-dark">Add Inventory</h1>
	<div class="row">
		<div class="col-sm">
			<h3 class="activeH3">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Room Types</span>
			</h3>
		</div>

		<div class="col-sm">
			<h3 onclick="$('#RoomTypesForm').click()">
				<span class="icon"><i class="bi bi-info-square"></i></span><br />
				<span class="title_text">Room Description & Info</span>
			</h3>
		</div>
		<div class="col-sm">
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-columns"></i></span><br />
				<span class="title_text">Room Amenities</span>
			</h3>
		</div>
		<div class="col-sm">
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-file-text"></i></span><br />
				<span class="title_text">Policies/Terms & Condition</span>
			</h3>
		</div>
	</div>
<div class="form-container">
	<!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
	

	<form method="POST" action="" class="signup-form">

		<fieldset>
			<legend>
				<span class="step-heading">Room Types: </span>
				<span class="step-number">Step 1 / 4</span>
			</legend>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="totalRooms" class="form-label required">Room Types Total </label>
						<input type="number" min="1" name="totalRoomTypes" id="totalRooms" onkeyup="GetRoomFields()" onblur="GetRoomFields()" />
					</div>
				</div>
				<!-- <div class="col-md-6">
					<div class="form-group">
						<label for="totalRoomsviewTypes" class="form-label required">View Types Total (Sea View, City View)</label>
						<input type="number" name="totalRoomsviewTypes" id="totalRoomsviewTypes" onkeyup="GetRoomViewField()" />
					</div>
				</div> -->
			</div>


			<div>
				<input type="hidden" id="appended" value="0">
				<input type="hidden" id="appendedViews" value="0">

				<div class="card" style="display: none;" id="roomFieldsViewsCard">
					<div class="card-body" style="padding-top: 0px;">
						<h2>Add Room view codes</h2>
						<div id="roomFieldsViews" style="width: auto; margin-top:20px;">


						</div>
						<div id="getRoomFieldsButtonDiv" style="display: none;">
							<input type="button" class="btn btn-danger" id="" value="Show Room Fields" onclick="GetRoomFields(true)" />
						</div>
						<div id="getRoomFieldsButtonDivValidation">
							<input type="button" class="btn btn-danger" disabled value="Fill This Form To Get Fields" onclick="ValidateRoomViewField()" />

						</div>


					</div>
				</div>

				<div class="card mt-3" style="display:none; " id="roomFieldsCard">
					<div class="card-body" id="roomFields" style=" padding-top: 0px !important; padding-bottom: 10px !important; ">

					</div>
					<div class="row pt-2 pb-2">
						<div class="col-md-12 d-flex justify-content-end">
							<input type="submit" name="submit" id="RoomTypesForm" class="btn btn-danger col-md-2" value="Save & Next">
						</div>
					</div>
				</div>

			</div>







		</fieldset>


	</form>
</div>




<?php endblock() ?>



<?php startblock('scriptBottom') ?>
<!-- <script src="assets/WizardAssets/vendor/jquery-validation/dist/jquery.validate.min.js"></script> -->


<script>
	function GetRoomViewField() {
		var totalRooms = $('#totalRooms').val();
		var appendedViews = $('#appendedViews').val();
		var appended = $('#appended').val();

		if ((totalRooms == '' || totalRooms == 0)) {
			if (totalRooms == '' || totalRooms == 0) {

				$('#totalRooms').css('border', '1px solid #ce3435');
				// alert('Enter Total Room Numbers');
			}

			return;
		}
		$('#totalRooms').css('border', '1px solid #666');






		var appendedViews = $('#appendedViews').val();

		var appendedViews = appendedViews != 0 ? appendedViews : 0;

		var legendsHTML = '';

		for (var i = appendedViews; i < totalRoomsviewTypes; i++) {

			var legendsHTML = `<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="RoomsviewTypeName" class="form-label" >View Type Name</label>
										<input type="text" name="RoomsviewTypeName[]" id="RoomsviewTypeName" required onkeyup="ValidateRoomViewField()"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="RoomsviewTypeName" class="form-label" >View Type Code</label>
										<input type="text" name="RoomsviewTypeCodes[]" id="RoomsviewTypeName" required onkeyup="ValidateRoomViewField()"/>
									</div>	
								</div>
							</div>`;
			$('#roomFieldsViews').append(legendsHTML);


		}


		$('#appendedViews').val(totalRoomsviewTypes);
		$('#roomFieldsViewsCard').slideDown();
	}

	function ValidateRoomViewField() {
		var totalRooms = $('#totalRooms').val();
		var totalRoomsviewTypes = $('#totalRoomsviewTypes').val();

		var RoomViewTypeNamesNF = $("input[name='RoomsviewTypeName[]']").map(
			function() {
				if ($(this).val() != '' || $(this).val() != null) {
					return $(this).val();
				}
			}).get();


		var RoomViewTypeCodesNF = $("input[name='RoomsviewTypeCodes[]']").map(
			function() {
				if ($(this).val() != '' || $(this).val() != null) {
					return $(this).val();
				}
			}).get();
		var RoomViewTypeNames = RoomViewTypeNamesNF.filter(function(el) {
			return el != '';
		});
		var RoomViewTypeCodes = RoomViewTypeCodesNF.filter(function(el) {
			return el != '';
		});


		if ((RoomViewTypeNames.length == RoomViewTypeCodes.length) && RoomViewTypeCodes.length == totalRoomsviewTypes) {
			$('#getRoomFieldsButtonDiv').show();
			$('#getRoomFieldsButtonDivValidation').hide();
			// GetRoomFields();

		} else {
			$('#getRoomFieldsButtonDiv').hide();
			$('#getRoomFieldsButtonDivValidation').show();
		}

	}

	function GetRoomFields() {
		$("#roomFields").html('');

		var totalRooms = $('#totalRooms').val();

		// var appended = $('#appended').val();

		// var appended = appended != 0 ? appended : 0;




		var TableHeader = `<div class="row" style="text-align:center;font-weight: bold; border: 1px solid lightgray;border-radius: 10px;padding: 5px;margin-bottom: 10px; background:#ce3435; color:white;">
								<div class="col-md-3" style="padding-top: 13px !important;">
									Room Type
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-sm p-1" style="padding-top: 13px !important;">
											Total Rooms
										</div>
										<div class="col-sm p-1">
											<div class="row">
												<div class="col-sm">
													Room Size (sqm)
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">Single</div>
												<div class="col-md-6">Double</div>
											</div>
												
										</div>
										<!--<div class="col-sm p-1" style="padding-top: 13px !important;">
											Available Twin Rooms
										</div>
										<div class="col-sm p-1" style="padding-top: 13px !important;">
											Disable Friendly
										</div>
										<div class="col-sm p-1" style="padding-top: 13px !important;">
											Double convertible to twin
										</div>-->
									</div>
								</div>
							</div>`;

		for (var i = 0; i < totalRooms; i++) {
			if (i == 0) {
				$("#roomFields").append(TableHeader);
			}
			var RoomsHtml = `
							<div class="row">
								<div class="col-md-3">
									<div class="col-sm" style="margin-top: 5px;">
										<div class="row p-0">
											<div class="col-sm-12 p-0" style="padding-right:4px !important; ">
												<div class="form-group">
													<input type="text" name="room_names[]" id="room_name" placeholder="Name" required/>
												</div>
											</div>
										</div>

										
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-sm p-1">
											<input type="number" name="totalRooms[]" placeholder="Total Rooms"/>
										</div>
										<div class="col-sm p-1 ">
											<div class="row">
												<div class="col-md-6 px-2" style="padding-left:10px !important; padding-right:6px !important; "><input type="text" name="SingleRoomSize[]" placeholder="W x L"/></div>
												<div class="col-md-6 p-0" style="padding-right:10px !important; "><input type="text" name="DoubleRoomSize[]" placeholder="W x L"/></div>
											</div>
											
										</div>
										<!--<div class="col-sm p-1">
											<input type="number" name="avtwin[]" placeholder="Available Twin"/>
										</div>
										<div class="col-sm p-1">
											<input type="number" name="disfr[]" placeholder="Dis Fr"/>
										</div>
										<div class="col-sm p-1">
											<input type="number" name="dctt[]" placeholder="DCTT"/>
										</div>-->
									</div>
								</div>
								
							</div>`;

			$("#roomFields").append(RoomsHtml);

		}
		$('#roomFieldsCard').slideDown();
		// $('#appended').val(totalRooms);
	}
</script>
<?php endblock(); ?>