<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

//error_reporting(E_ALL);
session_start();
require_once('db_connection.php');
$hotel = $_SESSION['hotel'];
$country = $_SESSION['country'];
$city = $_SESSION['city'];
$counter = $_SESSION['roomnamecount'];
$roomtypes = $_SESSION['roomNames'];
$roomtype = $roomtypes[$counter];
$cnt = (int)$counter + 1;
$ttl = count($roomtypes);
if (isset($_POST['submit'])) {

	// var_dump($_POST);
	// die();


  //general facilities


  $inroomfacilities = implode(", ", $_POST['cards']);


  $arraycards = $_POST['cards'];



  foreach ($arraycards as $value) {




    $sql1 = "SELECT * FROM hotelsdatabaseinroomfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseinroomfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }










  //kitchen facilities


  $kitchen = implode(", ", $_POST['cards2']);


  $arraycards2 = $_POST['cards2'];



  foreach ($arraycards2 as $value) {




    $sql1 = "SELECT * FROM hotelsdatabasekitchenfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasekitchenfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }


















  //Private Bathroom facilities


  $privatebathroom = implode(", ", $_POST['cards3']);


  $arraycards3 = $_POST['cards3'];



  foreach ($arraycards3 as $value) {




    $sql1 = "SELECT * FROM hotelsdatabaseprivatebathroomfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseprivatebathroomfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }





  //Discounted facilities

/*
  $discounted = implode(", ", $_POST['cards4']);


  $arraycards4 = $_POST['cards4'];



  foreach ($arraycards4 as $value) {




    $sql1 = "SELECT * FROM hotelsdatabasediscountedfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasediscountedfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }

*/




  //Complimentary facilities


  $complimentary = implode(", ", $_POST['cards5']);


  $arraycards5 = $_POST['cards5'];



  foreach ($arraycards5 as $value) {




    $sql1 = "SELECT * FROM hotelsdatabasecomplimentaryfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabasecomplimentaryfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }



















  //Accessibility facilities


  $accessibility = implode(", ", $_POST['cards6']);


  $arraycards6 = $_POST['cards6'];



  foreach ($arraycards6 as $value) {




    $sql1 = "SELECT * FROM hotelsdatabaseaccessibilityfacilities WHERE name='$value'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
    } else {



      $sqlbb = "INSERT INTO hotelsdatabaseaccessibilityfacilities (name) VALUES ('$value')";

      $resultbb = $conn->query($sqlbb);


      if ($resultbb === TRUE) {

        $_SESSION['alertme'] = '1';
        // echo "<script>location.replace('mainfacilities.php');</script>";
      } else {
        echo "Error: " . $sqlbb . "<br>" . $conn->error;
      }
    }
  }

































  $sqlo = "UPDATE hotelsInventorydatabase SET accessibilityfacilities='$accessibility', inroomfacilities='$inroomfacilities',kitchenfacilities='$kitchen',privatebathroomfacilities='$privatebathroom',complimentaryfacilities='$complimentary' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";

 
  $resulto = $conn->query($sqlo);


  if ($resulto === TRUE) {

    $_SESSION['alertme'] = 1;









    if ($cnt < $ttl) {

      $_SESSION['roomnamecount'] = $cnt;

      $_SESSION['alertme'] = 1;

       echo "<script>location.replace('addinventoryNew3.php');</script>";
    } else {

      $_SESSION['roomnamecount'] = 0;

      $_SESSION['alertme'] = 1;

       echo "<script>location.replace('addinventoryNew4.php');</script>";
    }
  } else {
    echo "Error: " . $sqlo . "<br>" . $conn->error;
  }
  
}



?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Add Inventory || Facilites
<?php endblock() ?>
<?php startblock('stylesheethead') ?>
<!-- <link rel="stylesheet" href="assets/WizardAssets/css/style.css"> -->
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
		border-color: #ce3435 !important  ;
	}
	.btn-danger{
		background-color: #ce3435 !important;
	}
	.btn-danger:hover{
		transform: scale(1.1);
	}
	.card{
		height: 100%;
	}
	.card-title{
		margin-bottom: 0.5rem;
		background: #ce3435;
		padding: 10px 8px;
		color: white;
		border-radius: 5px;
		font-size: 15px;
	}
	.card-body{
		position: relative;
		padding-bottom:35px;
	}

	.addMoreButtom{
		padding: 0px !important;
		float:right;
		position:absolute;
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
	.selectAllRow .form-check .form-check-label{
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
			box-shadow: 0 3px 9.5px .5px rgba(0,0,0,.1);
			-moz-box-shadow: 0 3px 9.5px .5px rgba(0,0,0,.1);
			-webkit-box-shadow: 0 3px 9.5px .5px rgba(0,0,0,.1);
			-o-box-shadow: 0 3px 9.5px .5px rgba(0,0,0,.1);
			-ms-box-shadow: 0 3px 9.5px .5px rgba(0,0,0,.1);
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
		@media (min-width: 1200px){
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
		.form-check-input{
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
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Room Description & Info</span>
			</h3>
		</div>

		<div class="col-sm">
			<h3 class="activeH3">
				<span class="icon"><i class="bi bi-columns"></i></span><br />
				<span class="title_text">Room Amenities</span>
			</h3>
		</div>
		<div class="col-sm">
			<h3 onclick="$('#RoomTypesForm').click()">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Policies/Terms & Condition</span>
			</h3>
		</div>
	</div>
<div class="form-container">
	<!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
	

	<form method="POST" action="#" class="signup-form">

		<fieldset>
		<h4><?php echo $roomtype;?></h4>
			<legend>
				<span class="step-heading">Facilities: </span>
				<span class="step-number">Step 3 / 4</span>
			</legend>
			<div class="row mt-2">
				<!--In-Room Facilities-->
				<style>
					.form-check-input:checked {
						background-color: #ce3435 !important;
						border-color: #ce3435 !important  ;
					}
				</style>
				<div class="col-md-3" id='cardslist'>	
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">In-Room Facilities</h5>
							<div class="selectAllRow">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id='all' name='all'>
									<label class="form-check-label" for='all'><b>Select All</b></label>
								</div>
							</div>

							<?php
								$sqlv = "SELECT * FROM hotelsdatabaseinroomfacilities";
								$resultv = $conn->query($sqlv);
								if ($resultv->num_rows > 0) {
									// output data of each row
									while ($rowv = $resultv->fetch_assoc()) {
								?>
								
										<div class="form-check">
											<input class="form-check-input" name='cards[]' type="checkbox" value='<?php echo $rowv['name']; ?>' id="alertcard" >
											<label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
												<?php echo $rowv['name']; ?>
											</label>
										</div>
										
							<?php
								}
							} ?>
							<nonsense id='addnc'>
							</nonsense>
							<input class="btn btn-danger addMoreButtom" type='submit' id='pds' onclick='addcardnew()' value='+'>
						</div>
					</div>
				</div>

				<!--Kitchen Facilities-->
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Kitchen Facilities</h5>
							<div class="selectAllRow">
								<div class="form-check">
									<label class="form-check-label" for='all2'>Select All</label>
									<input class="form-check-input" type="checkbox" id='all2' name='all' >
								</div>
							</div>
							<?php
							
							
							$sqlv = "SELECT * FROM hotelsdatabasekitchenfacilities";
							$resultv = $conn->query($sqlv);
							if ($resultv->num_rows > 0) {
								// output data of each row
								while ($rowv = $resultv->fetch_assoc()) {
									?>
										<div class="form-check">
											<input  id="alertcard2" class="form-check-input" name='cards2[]' type="checkbox" value='<?php echo $rowv['name']; ?>'>
											<label class="form-check-label" for='<?php echo $rowv['name']; ?>'>
												<?php echo $rowv['name']; ?>
											</label>
										</div>
								<?php
									}
								}
							?>
							<nonsense id='addnc2'></nonsense>
							<input class="btn btn-danger addMoreButtom" type='submit' id='pds2' onclick='addcardnew2()' value='+'>
						</div>
					</div>
				</div>

				<!--Private Bathroom Facilities-->
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Private Bathroom Facilities</h5>
							<div class="selectAllRow">
								<div class="form-check">
									<label class="form-check-label" for='all3'>Select All</label>
									<input class="form-check-input" type="checkbox" id='all3' name='all' >
								</div>
							</div>
							<?php
							$sqlvz = "SELECT * FROM hotelsdatabaseprivatebathroomfacilities";
							$resultvz = $conn->query($sqlvz);
							if ($resultvz->num_rows > 0) {
								// output data of each row
								while ($rowvz = $resultvz->fetch_assoc()) {
									?>
										<div class="form-check">
											<input id="alertcard3" class="form-check-input" name='cards3[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
											<label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
												<?php echo $rowvz['name']; ?>
											</label>
										</div>
									
								<?php
								}
							} ?>
							<nonsense id='addnc3'></nonsense>
							<input class="btn btn-danger addMoreButtom" type='submit' id='pds3' onclick='addcardnew3()' value='+'>
						</div>
					</div>
				</div>

				<!--Complimentary Facilities-->
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Complimentary Facilities</h5>
							<div class="selectAllRow">
								<div class="form-check">
									<label class="form-check-label" for='all5'>Select All</label>
									<input class="form-check-input" type="checkbox" id='all5' name='all' >
								</div>
							</div>
							<?php
							$sqlvz = "SELECT * FROM hotelsdatabasefrontdeskfacilities";
							$resultvz = $conn->query($sqlvz);
							if ($resultvz->num_rows > 0) {
								// output data of each row
								while ($rowvz = $resultvz->fetch_assoc()) {
									$nmcr = $rowvz['name'];

							?>
										<div class="form-check">
											<input  id="alertcard5" class="form-check-input" name='cards5[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
											<label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
												<?php echo $rowvz['name']; ?>
											</label>
										</div>
									
							<?php
								}
							} ?>
							<nonsense id='addnc5'></nonsense>
							<input class="btn btn-danger addMoreButtom" type='submit' id='pds5' onclick='addcardnew5()' value='+'>
						</div>
					</div>
				</div>


























	<!--Accessibility Facilities-->
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Accessibility Facilities</h5>
							<div class="selectAllRow">
								<div class="form-check">
									<label class="form-check-label" for='all6'>Select All</label>
									<input class="form-check-input" type="checkbox" id='all6' name='all' >
								</div>
							</div>
							<?php
							$sqlvz = "SELECT * FROM hotelsdatabaseaccessibilityfacilities";
							$resultvz = $conn->query($sqlvz);
							if ($resultvz->num_rows > 0) {
								// output data of each row
								while ($rowvz = $resultvz->fetch_assoc()) {
									$nmcr = $rowvz['name'];

							?>
										<div class="form-check">
											<input  id="alertcard6" class="form-check-input" name='cards6[]' type="checkbox" value='<?php echo $rowvz['name']; ?>'>
											<label class="form-check-label" for='<?php echo $rowvz['name']; ?>'>
												<?php echo $rowvz['name']; ?>
											</label>
										</div>
									
							<?php
								}
							} ?>
							<nonsense id='addnc6'></nonsense>
							<input class="btn btn-danger addMoreButtom" type='submit' id='pds6' onclick='addcardnew6()' value='+'>
						</div>
					</div>
				</div>
				
				
				
				
				
				

















			</div>

			<div class="row pt-2 pb-2">
				<div class="col-md-12 d-flex justify-content-end">
					<button type='submit' name='submit' id='smbt' class='btn btn-danger col-md-2' >Save & Next</button>
				</div>
			</div>

		</fieldset>


	</form>
</div>




<?php endblock() ?>



<?php startblock('scriptBottom') ?>
<!-- <script src="assets/WizardAssets/vendor/jquery-validation/dist/jquery.validate.min.js"></script> -->

<script>

    document.getElementById("pds").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew() {
      var parent = document.getElementById("addnc");





      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards[]');
      inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }

    $("#all").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>





  <!--kitchen-->




  <script>
    document.getElementById("pds2").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew2() {
      var parent = document.getElementById("addnc2");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards2[]');
	  inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }

    $("#all2").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard2']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>
















  <!--bathroom-->




  <script>
    document.getElementById("pds3").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew3() {
      var parent = document.getElementById("addnc3");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards3[]');
	  inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }

    $("#all3").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard3']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>






  <!--discounted-->




  <script>
    document.getElementById("pds4").addEventListener("click", function(event) {
      event.preventDefault()
    });



    function addcardnew4() {
      var parent = document.getElementById("addnc4");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards4[]');
	  inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }

    $("#all4").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard4']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>










  <!--Complimentary-->




  <script>
    document.getElementById("pds5").addEventListener("click", function(event) {
      event.preventDefault()
    });
    document.getElementById("pds6").addEventListener("click", function(event) {
      event.preventDefault()
    });

   function addcardnew6() {
      var parent = document.getElementById("addnc6");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards6[]');
	  inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }
    
    
    
    
    
    
     $("#all6").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard6']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
    
    
    
    
    
    


    function addcardnew5() {
      var parent = document.getElementById("addnc5");

      var inpt = document.createElement('INPUT');
      inpt.setAttribute('name', 'cards5[]');
	  inpt.setAttribute('class', 'mt-1 mb-1');


      parent.appendChild(inpt);

    }

    $("#all5").click(function(event) {

      var checkedStatus = this.checked;

      var elms = document.querySelectorAll("[id='alertcard5']");

      if (checkedStatus == false) {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = false;
        }

      } else {
        for (var i = 0; i < elms.length; i++) {
          elms[i].checked = true;
        }

      }
    });
  </script>



<?php endblock(); ?>