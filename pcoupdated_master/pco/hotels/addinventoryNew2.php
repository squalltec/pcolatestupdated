<?php
session_start();

require_once('db_connection.php');
$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];

$singledouble=$_SESSION['singledouble'];
$counter = $_SESSION['roomnamecount'];



$roomtypes=$_SESSION['roomNames'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);





//var_dump($_SESSION);
if (isset($_POST['submit'])) {
	//var_dump(json_encode($_POST));
	
	


	$singleadultssleep = $_POST['singleadultssleep'];
	$singlechildrensleep = $_POST['singlechildrensleep'];
	$singleextrabedsleep = $_POST['singleextrabedsleep'];
	$doubleadultssleep = $_POST['doubleadultssleep'];
	$doublechildrensleep = $_POST['doublechildrensleep'];
	$doubleextrabedsleep = $_POST['doubleextrabedsleep'];




	$twin=$_POST['twin'];
	$convertible=$_POST['convertible'];
	$determination=$_POST['determination'];
		
	$rn=$_POST['rn'];
	$accessibility=$_POST['accessibility'];
	$location=$_POST['location'];
		
		
		
		
		$bar=0;
		
		foreach($rn as $ar)
		
	{
		
	
	$sql2lau = "INSERT INTO disabletwindetail (hotel,city,country,roomtype,roomnumber,accessibility,location)
			   VALUES ('$hotel','$city','$country','$roomtype','$rn[$bar]','$accessibility[$bar]','$location[$bar]')";
			  
	 $resulta2lau = $conn->query($sql2lau);
	
	
	if ($resulta2lau === TRUE) {
	
	
	}
	
	
	$bar=$bar+1;
			
	} 
		
		
		
		
		
		
		
		
		
		
		
	
	$sql2la = "INSERT INTO disabletwin (hotel,location,country,roomtype,twin,convertible,disablefriendly)
			   VALUES ('$hotel','$city','$country','$roomtype','$twin','$convertible','$determination')";
			  
	 $resulta2la = $conn->query($sql2la);
	
	
	if ($resulta2la === TRUE) {
	
	
	
	
	}
		
		
		
	
	$roomtypedes=mysqli_real_escape_string($conn, $_POST['desfacilitiess']);
	$roomtypedes2=mysqli_real_escape_string($conn, $_POST['desfacilitiess2']);
	
	
	
	
	
		
$sql = "UPDATE hotelsInventorydatabase SET doubledescription='$roomtypedes2',singledescription='$roomtypedes',singleadultoccupancy='$singleadultssleep',singlechildoccupancy='$singlechildrensleep',singleextrabedsallowed='$singleextrabedsleep',doubleadultoccupancy='$doubleadultssleep',doublechildoccupancy='$doublechildrensleep',doubleextrabedsallowed='$doubleextrabedsleep' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
	
	
			  
	 $resulta = $conn->query($sql);
	
	
	if ($resulta === TRUE) {
	
	  
			$_SESSION['alertme']=1;
			
			
			
		
	if (isset($_POST['desfacilitiess2']))
	{
	  $des2=$_POST['desfacilitiess2'];
	 
	 
	$sql = "UPDATE hotelsInventorydatabase SET doubledescription='$des2' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
			  
	 $resulta = $conn->query($sql);
	
	
	if ($resulta === TRUE) {
	   
	   
	   
	   
	   
	   
	}
	 
	
	}
	
	
	
	
	
	





//images


mkdir("../Room Uploads/" . $hotel . "/" . $roomtype, 0755, true);
	$uploadsDir = "../Room Uploads/" . $hotel . "/" . $roomtype . "/";
 //$allowedFileType = array('jpg','png','jpeg');
		
	$img=array();
	
	$imgs=$_FILES['photos']['name'];
	
        // Velidate if files exist
        if (!empty(array_filter($imgs))) {
            
            // Loop through file items
            foreach($imgs as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['photos']['name'][$id];
                $tempLocation    = $_FILES['photos']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
                if(true){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                      $sqlVal = "('".$fileName."', '".$uploadDate."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO hotelsInventoryImagesdatabase (hotel, country,location,type,image) VALUES ('$hotel', '$country', '$city', '$roomtype','$fileName')");
                    
                    
                    if($insert) {
                        
                       
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                       
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
		
		



	//images end
























	
			
			
			
			
			
		  
		
		$cnt=(int)$counter+1;
		$ttl=count($roomtypes);
	
	
	
	
	
		
	if($cnt<$ttl)
		{
			
			$_SESSION['roomnamecount']=$cnt;
			
			$_SESSION['alertme']=1;
			$_SESSION['dupdes']='';
		   echo "<script>location.replace('addinventoryNew2.php');</script>";
		
	}
	
	else{
		
	 $_SESSION['roomnamecount']=0;
	  
			$_SESSION['alertme']=1;
			$_SESSION['dupdes']='';
			$_SESSION['roomnamecount']=0;
		   echo "<script>location.replace('addinventoryNew3.php');</script>";
		
	}
	
	
	
			
		
		
		
		
	}
	




















	// die();
}




?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Add Inventory || Description & info
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

	.PreviewImage {
		border: 1px solid #ce3435;
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
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Room Types</span>
			</h3>
		</div>

		<div class="col-sm">
			<h3 class="activeH3">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Room Description & Info</span>
			</h3>
		</div>

		<div class="col-sm">
			<h3 onclick="$('#RoomTypesForm').click()">
				<span class="icon"><i class="bi bi-columns"></i></span><br />
				<span class="title_text">Room Amenities</span>
			</h3>
		</div>
		<div class="col-sm">
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Policies/Terms & Condition</span>
			</h3>
		</div>
	</div>
<div class="form-container">
	<!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
	

	<form method="POST" action="" enctype="multipart/form-data" class="signup-form">

		<fieldset>
			<h4><?php echo $roomtype;?></h4>
			<legend>
				<span class="step-heading">Room Description & Info: </span>
				<span class="step-number">Step 2 / 4</span>
			</legend>
			<div class="row mt-2">

				<?php
				if ($singledouble[$counter] != 'on') {
				?>
					<div class="col-md-6">
						<div class="form-group">
							<!-- <label for="totalRooms" class="form-label required">Single Room Description</label> -->
							<textarea name="desfacilitiess" id='sngl0' class="form-control" placeholder="Single Room Description" rows="4"></textarea>
								<div class='row'>
								<div style='text-align:right;' class='col-sm-11'>
								    <label  for='samefordbl0'>Same for Double</label>
								</div>
								<div style='float:right;' class='col-sm-1'>
								    <input onclick='dobl0(this)' style='margin-top:4px;' id='samefordbl0' type='checkbox'>
								</div>
								</div>
						</div>
					
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<!-- <label for="totalRooms" class="form-label required">Double Room Description </label> -->
							<textarea name="desfacilitiess2" id='dbl0' class="form-control" placeholder="Double Room Description" rows="4"></textarea>
						</div>
					</div>
				<?php
				} else {
				?>
					<div class="col-md-6">
						<div class="form-group">
							<label for="totalRooms" class="form-label required">Room Description (Single) </label>
							<textarea name="desfacilitiess" id='sngl1' class="form-control" rows="4"></textarea>
								<div class='row'>
								    <div  style='text-align:right;' class='col-sm-11'>
								    <label  for='samefordbl1'>Same for Double</label>
								</div>
								    <div style='float:right;' class='col-sm-1'>
								    <input onclick='dobl1(this)' style='margin-top:4px;' id='samefordbl1' type='checkbox'>
								</div>
								
								</div>
						</div>
					</div>
<div class="col-md-6">
						<div class="form-group">
							<label for="totalRooms" class="form-label required">Room Description (Double) </label>
							<textarea name="desfacilitiess2" id='dbl1' class="form-control" rows="4"></textarea>
								
						</div>
					</div>


				<?php

				}
				?>
			</div>

<script>
    function dobl0($this){
        
        if($this.checked)
        {
            var sn=document.getElementById('sngl0').value;
            
            document.getElementById('dbl0').value=sn;
        }
        
        else{
            if(document.getElementById('sngl0').value==document.getElementById('dbl0').value)
            {
                document.getElementById('dbl0').value='';
            }
        }
      
        
    }
    
        function dobl1($this){
        
        if($this.checked)
        {
            var sn=document.getElementById('sngl1').value;
            
            document.getElementById('dbl1').value=sn;
        }
        
        else{
            if(document.getElementById('sngl1').value==document.getElementById('dbl1').value)
            {
                document.getElementById('dbl1').value='';
            }
        }
      
        
    }
</script>

			<div class="row mt-2">
				<span class="step-heading">Room Type Totals: </span>
			</div>
			<div class="row mt-2">
				<div class="col-sm">
					<label for="totalRooms" class="form-label required">Available Twin</label>
					<input type="number" name="twin" placeholder="Available Twin" />
				</div>
				<div class="col-sm">
					<label for="totalRooms" class="form-label required">Disable Friendly</label>
					<input type="number" id="DisableFriendlyInput" name="determination" placeholder="Dis Fr" />
				</div>
				<div class="col-sm">
					<label for="totalRooms" class="form-label required">Double Convertible To Twin</label>
					<input type="number" name="convertible" placeholder="DCTT" />
				</div>
			</div>

			<div id="dfFieldsDiv" style="">
				<div class="row mt-2">
					<span class="step-heading">Disable Friendly Room Info: </span>
				</div>

				<div class="row mt-2 mb-2" id="dfFieldsContent">

				</div>

				<hr>
			</div>


			<div class="row">
				<span class="step-heading">Occupancy: </span>

				
				<div class="col-md-6">
					<div class="card-body p-3">
						<span class="step-heading">Single </span><br />
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Adult</label>
									<input type="number" name="singleadultssleep" />
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Children</label>
									<input type="number" name="singlechildrensleep" />
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Extra Bed</label>
									<input type="number" name="singleextrabedsleep" />
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card-body p-3">
						<span class="step-heading">Double </span>
						<br />
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Adult</label>
									<input type="number" name="doubleadultssleep"/>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Children</label>
									<input type="number" name="doublechildrensleep" />
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="totalRooms" class="form-label required">Extra Bed</label>
									<input type="number" name="doubleextrabedsleep" />
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>





			<div class="row mt-2 mb-2" id="ImagesPreview">
			</div>
			<div class="row">
				<div class="form-group">
					<label for="totalRooms" class="form-label required">Room Pictures</label>
					<input type="file" id="SelectedImages" name="photos[]" multiple>
				</div>

			</div>

			<div class="row pt-2 pb-2">
				<div class="col-md-12 d-flex justify-content-end">
					<input type="submit" name="submit" id="RoomTypesForm" class="btn btn-danger col-md-2" value="Save & Next">
				</div>
			</div>

		</fieldset>


	</form>
</div>



<?php endblock() ?>



<?php startblock('scriptBottom') ?>
<!-- <script src="assets/WizardAssets/vendor/jquery-validation/dist/jquery.validate.min.js"></script> -->
<script>
	$(function() {
		// Multiple images preview in browser
		var imagesPreview = function(input, placeToInsertImagePreview) {
			$('#' + placeToInsertImagePreview).html('');
			if (input.files) {
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function(event) {
						var ImagesHtml = '<div class="col-md-1" ><img src="' + event.target.result + '" class="img-fluid rounded PreviewImage" style="height: 70px;object-fit: cover;margin-bottom: 5px;" width="100%" ></div>';

						$('#' + placeToInsertImagePreview).append(ImagesHtml);
					}

					reader.readAsDataURL(input.files[i]);
				}
			}

		};

		$('#SelectedImages').on('change', function() {
			imagesPreview(this, 'ImagesPreview');
		});
	});

	$(function() {

		$('#DisableFriendlyInput').on('keyup', function() {

			var dfiv = this.value;
			$('#dfFieldsContent').html('');
			var htmlForElement = '<div class="col-sm-4">' +
				'<label for="totalRooms" class="form-label required">Room Number</label>' +
				'<input class="form-control" placeholder="Room Number" name="rn[]">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="totalRooms" class="form-label required">Accessibility Through</label>' +
				'<input class="form-control" placeholder="Accessibility" list="accesses" name="accessibility[]">' +
				'</div>' +
				'<div class="col-sm-4">' +
				'<label for="totalRooms" class="form-label required">Location</label>' +
				'<input class="form-control" placeholder="Location" name="location[]">' +
				'</div>';
			for (var i = 0; i < dfiv; i++) {
				$('#dfFieldsContent').append(htmlForElement);
			}

			// $('#dfFieldsDiv').slideDown();
		});
	});
</script>

<?php endblock(); ?>