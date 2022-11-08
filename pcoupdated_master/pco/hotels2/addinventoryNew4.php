<?php
session_start();
require_once('db_connection.php'); 
    
$hotel=$_SESSION['hotel'];	
    
$country=$_SESSION['country'];	

$city=$_SESSION['city'];

//$counter=0;
//$_SESSION['roomnamecount']=0;

$counter=$_SESSION['roomnamecount'];


$roomtypes=$_SESSION['roomNames'];

$roomtype=$roomtypes[$counter];

	$cnt=(int)$counter+1;
	$ttl=count($roomtypes);




if (isset($_POST['submit'])) {
    
    if(isset($_POST['sp']))
    {
   
    $sp='on'; 
     
}

   if(isset($_POST['sp2']))
    {
   
    $sp2='on'; 
     
}
   if(isset($_POST['sp3']))
    {
   
    $sp3='on'; 
     
}
//$numberofrooms=$_POST['number'];







if($sp=='on')
{
$_SESSION['cancellationdays']=$_POST['cancellationdays'];
$_SESSION['cancellationpercentage']=$_POST['cancellationpercentage'];
$_SESSION['cancellationdescription']= $_POST['cancellationdescription'];
}
if($sp2=='on')
{
$_SESSION['childage']=$_POST['childage'];
$_SESSION['childpercentage']=$_POST['childpercentage'];
$_SESSION['childdescription']=$_POST['childdescription'];

}
if($sp3=='on')
{
$_SESSION['cancellationpolicyz1']=$_POST['cancellationpolicy'];
$_SESSION['names1']=$_POST['names'];


}




$cancellationdays=$_POST['cancellationdays'];

$cancellationdays=implode(",",$cancellationdays);

$cancellationpercentage=$_POST['cancellationpercentage'];

$cancellationpercentage=implode(",",$cancellationpercentage);

$cancellationdescription=$_POST['cancellationdescription'];

$cancellationdescription=implode("_@_",$cancellationdescription);










$childage=$_POST['childage'];

$childage=implode(",",$childage);


$childpercentage=$_POST['childpercentage'];

$childpercentage=implode(",",$childpercentage);


$childdescription=$_POST['childdescription'];

$childdescription=implode("_@_",$childdescription);











$cancellationpolicyz1=$_POST['cancellationpolicy'];
$names1=$_POST['names'];

$cancellationpolicyz2=array();
$names2=array();

$na=0;
foreach($cancellationpolicyz1 as $cpm)
{
    
    
    if($cpm!='')
    {
        
        array_push($cancellationpolicyz2,$cancellationpolicyz1[$na]);
        array_push($names2,$names1[$na]);
        
    }
    
    $na=$na+1;
}



$cancellationpolicyz=$cancellationpolicyz2;
$names=$names2;




$namarray=array();


 $sqllasvc = "SELECT * FROM cancellationpoliciesnames";
 
 
 $resultvc=$conn->query($sqllasvc);


while($rowvc=mysqli_fetch_assoc($resultvc)){
    array_push($namarray,$rowvc['name']);
}

$namstring=implode(',',$namarray);


foreach($names as $nn)
{
    if(strpos($namstring,$nn)!==FALSE)
    {
        
    }
    
    else{
        
        
        $sqlab = "INSERT INTO cancellationpoliciesnames (name) VALUES ('$nn')";
		  
 $resultab = $conn->query($sqlab);


if ($resultab === TRUE) {
}
        
        
    }
    
    
}













$cp= implode("_@_",$cancellationpolicyz);
$nams= implode("_@_",$names);





$cp1=mysqli_real_escape_string($conn, $cp);

$nams1=mysqli_real_escape_string($conn, $nams);



    //$checker=$_POST['checkerdes'];
    
  //  if($checker=='on'){
  //      $_SESSION['cancellationpolicy']=$cancellationpolicy;
  //  }
  //  else{
  //      $_SESSION['cancellationpolicy']='';
  //  }
    









$sqlm = "UPDATE hotelsInventorydatabase SET cancellationpercentage='$cancellationpercentage',cancellationdays='$cancellationdays',cancellationdescription='$cancellationdescription',childage='$childage',childpercentage='$childpercentage',childdescription='$childdescription',cancellationpolicy='$cp1', cancellationpoliciesnames='$nams1' WHERE hotel='$hotel' && country='$country' && city='$city' && type='$roomtype'";
		  
 $resultam = $conn->query($sqlm);


if ($resultam === TRUE) {

	
if($cnt<$ttl)
	{
	    
	    $_SESSION['roomnamecount']=$cnt;
	    
	    $_SESSION['alertme']=1;
	   
	  echo "<script>location.replace('addinventoryNew4.php');</script>";
	
}
else{
    
 $_SESSION['roomnamecount']=0;
  
  
  
  
  
$_SESSION['cancellationdays']='';
$_SESSION['cancellationpercentage']='';
$_SESSION['cancellationdescription']='';


$_SESSION['childage']='';
$_SESSION['childpercentage']='';
$_SESSION['childdescription']='';


$_SESSION['cancellationpolicyz1']='';
$_SESSION['names1']='';
  
  
  
  
  
  
  
	    $_SESSION['alertme']=1;
	    $_SESSION['dupdes']='';
	   echo "<script>location.replace('editinventory.php');</script>";
    
}

	    
	
	
	
	
}


  
}
                    
 
 
 ?>
<?php include './BaseFiles/base.php' ?>

<?php startblock('PageTitle') ?>
Add Inventory || Policies/Terms & Condition
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
			<h3 class="DisableDiv">
				<span class="icon"><i class="bi bi-columns"></i></span><br />
				<span class="title_text">Room Amenities</span>
			</h3>
		</div>
		<div class="col-sm">
			<h3 class="activeH3">
				<span class="icon"><i class="bi bi-building"></i></span><br />
				<span class="title_text">Policies/Terms & Condition</span>
			</h3>
		</div>
	</div>
<div class="form-container">
	<!-- <h2>SIGN UP OFFICE EMPLYEE ACCOUNT</h2> -->
	

	<form method="POST" action="" class="signup-form">

		<fieldset>
		<h4><?php echo $roomtype;?></h4>
			<legend>
				<span class="step-heading">Policies/Terms & Condition: </span>
				<span class="step-number">Step 4 / 4</span>
			</legend>
			
	
	
	
	
			
			<div class="row">
			    	    	<?php
		if(count($_SESSION['roomNames'])>1)
		{
		    ?>
		    
		   	<div class="col-md-12 d-flex justify-content-end">
		             <h6 align='right'> <input  id='sp' style=' accent-color: red;' name='sp' type='checkbox'><label for='sp'>Same Policies for all rooms?<br/></label></h6><br/><br/><br/>
	
		          
		          
		    
		    </div>
		    <?php
		}
		?>	
		
		
		<?php
		if(count($_SESSION['cancellationdays'])<2)
		{
		?>
				<div class="col-md-4">
					<div class="form-group">
						<label for="totalRooms" class="form-label required">Cancellation Prior Days </label>
						<input class='form-control' name='cancellationdays[]' placeholder='Cancellation Prior Days'>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="totalRooms" class="form-label required">Cancellation Percentage Deduction</label>
						<input class='form-control' name='cancellationpercentage[]' placeholder='Cancellation Percentage Deduction'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						<label class="form-label required">Description</label>
						<input class='form-control' name='cancellationdescription[]' placeholder='Description'>
					</div>
				</div>
				
			</div>
			<?php
			}
			?>
			
			
			
			
			
			
			
			
			<nonsense id='addmorepercentages'>
			    
			    
			    
			    <?php
			    $cad=0;
			    foreach($_SESSION['cancellationdays'] as $ccdd)
			    {
			        
			       ?>
			       
			       
			       		<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' name='cancellationdays[]' value='<?php echo $_SESSION['cancellationdays'][$cad];?>' placeholder='Cancellation Prior Days'>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					
						<input class='form-control' name='cancellationpercentage[]' value='<?php echo $_SESSION['cancellationpercentage'][$cad];?>' placeholder='Cancellation Percentage Deduction'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' name='cancellationdescription[]' value='<?php echo $_SESSION['cancellationdescription'][$cad];?>'  placeholder='Description'>
					</div>
				</div>
				
			</div>
			       
			       
			       
			       <?php
			        
			        $cad=$cad+1;
			        
			    }
			    
			    
			    ?>
			    
			    
			</nonsense>
			
				<h1 align='center'><button class='btn btn-danger' id='addact2percentage' onclick="myFunction2percentage()">+</button></h1>
				
				
				
				
				
				
				
			
			
			
			
		<span class="step-heading">Child Rate Percentage</span>
		<br/>
				<div class="row">
		
			    	<?php
		if(count($_SESSION['roomNames'])>1)
		{
		    ?>
		    
		   	<div class="col-md-12 d-flex justify-content-end">
		             <h6 align='right'> <input  id='sp2' style=' accent-color: red;' name='sp2' type='checkbox'><label for='sp'>Same Policies for all rooms?<br/></label></h6><br/><br/><br/>
	
		          
		          
		    
		    </div>
		    <?php
		}
		?>	
			<?php
		if(count($_SESSION['childage'])<2)
		{
		?>
				<div class="col-md-4">
					<div class="form-group">
						<label for="totalRooms" class="form-label required">Child Age up to</label>
						<input class='form-control' type='number' name='childage[]' placeholder='Child age up to'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						<label class="form-label required">What Percentage of the price will be charged? </label>
						<input class='form-control' type='number' name='childpercentage[]' placeholder='Percentage'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						<label class="form-label required">Description </label>
						<input class='form-control' name='childdescription[]' placeholder='Description'>
					</div>
				</div>
				
			<?php
		}
		?>
				
				
			</div>
			
			
			<nonsense id='addmorechildpercentages'>
			    
			    <?php
			    $cada=0;
			    foreach($_SESSION['childage'] as $ca)
			    {
			    ?>
			    		<div class="row">
		
				<div class="col-md-4">
					<div class="form-group">
					
						<input class='form-control' type='number' value='<?php echo $_SESSION['childage'][$cada];?>' name='childage[]' placeholder='Child age up to'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' type='number' value='<?php echo $_SESSION['childpercentage'][$cada];?>' name='childpercentage[]' placeholder='Percentage'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' value='<?php echo $_SESSION['childdescription'][$cada];?>' name='childdescription[]' placeholder='Description'>
					</div>
				</div>
				
				
				
				
			</div>
			    
			    <?php
			    $cada=$cada+1;
			    }
			    ?>


			    
			    
			    
			</nonsense>
			
				<h1 align='center'><button class='btn btn-danger' id='addact2childpercentage' onclick="myFunction2childpercentage()">+</button></h1>
				
			
			
			
			
			
			
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			
				
				<?php
			    function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}


			    ?>

			<?php
			if(count($_SESSION['cancellationpolicyz1'])<1)
			{
			    	    
		if(count($_SESSION['roomNames'])>1)
		{
		    ?>
		    
		   	<div class="col-md-12 d-flex justify-content-end">
		             <h6 align='right'> <input  id='sp3' style=' accent-color: red;' name='sp3' type='checkbox'><label for='sp'>Same Policies for all rooms?<br/></label></h6><br/><br/><br/>
	
		          
		          
		    
		    </div>
		    <?php
		}
		
				$sqllas = "SELECT * FROM cancellationpoliciesnames";
				$result = $conn->query($sqllas);
				while ($row = mysqli_fetch_assoc($result)) {
			?>
			<div style="padding-left:10px; padding-right:10px; padding-bottom:10px; padding-top:10px; background-color:<?php echo '#'.random_color();?>;">
			    
				<div class='row mt-2'>
					<div class="col-sm">
					<!--	<label for="totalRooms" class="form-label required"><?php echo $row['name']; ?> Name</label>-->
						<input class='form-control' name='names[]' value='<?php echo $row['name']; ?>'>
					</div>
				</div>
				<div class='row mt-2'>
					<div class="col-sm">
					<!--<label for="totalRooms" class="form-label required"><?php echo $row['name']; ?> Description</label>-->
						<textarea class='form-control' name='cancellationpolicy[]' placeholder='<?php echo $row['name']; ?>'></textarea>
					</div>
				</div>
			</div>
			<?php
			}
			}
			?>
<br/>
<br/>
			<nonsense id='populateme'>
			    
			  <?php
			  
			  	if(count($_SESSION['roomNames'])>1)
		{
		    ?>
		    
		   	<div class="col-md-12 d-flex justify-content-end">
		             <h6 align='right'> <input  id='sp3' style=' accent-color: red;' name='sp3' type='checkbox'><label for='sp'>Same Policies for all rooms?<br/></label></h6><br/><br/><br/>
	
		          
		          
		    
		    </div>
		    <?php
		}
			  $cada2=0;
			  foreach($_SESSION['cancellationpolicyz1'] as $cpa){
			      
			    ?>
			    
			    	<div style="padding-left:10px; padding-right:10px; padding-bottom:10px; padding-top:10px; background-color:<?php echo '#'.random_color();?>;">
			    
				<div class='row mt-2'>
					<div class="col-sm">
					<!--	<label for="totalRooms" class="form-label required"><?php echo $row['name']; ?> Name</label>-->
						<input class='form-control' name='names[]' value='<?php echo $_SESSION['names1'][$cada2]; ?>'>
					</div>
				</div>
				<div class='row mt-2'>
					<div class="col-sm">
					<!--<label for="totalRooms" class="form-label required"><?php echo $row['name']; ?> Description</label>-->
						<textarea class='form-control' name='cancellationpolicy[]' placeholder='Description'><?php echo $_SESSION['cancellationpolicyz1'][$cada2]; ?></textarea>
					</div>
				</div>
			</div>
			    <?php
			      
			      
			      
			   
			   $cada2=$cada2+1;   
			  }
			  ?>
			    


			    
			</nonsense>



			<h1 align='center'><button class='btn btn-danger' id='addact2' onclick="myFunction2()">Add New Policy</button></h1>



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

<script>
document.getElementById("addact2").addEventListener("click", function(event){
  event.preventDefault()
});
document.getElementById("addact2percentage").addEventListener("click", function(event){
  event.preventDefault()
});


document.getElementById("addact2childpercentage").addEventListener("click", function(event){
  event.preventDefault()
});








function myFunction2childpercentage() {
    
    
 var ElementHTML = `
 	<div class="row">
		
				<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' type='number' name='childage[]' placeholder='Child age up to'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
					
						<input class='form-control' type='number' name='childpercentage[]' placeholder='Percentage'>
					</div>
				</div>
				
					<div class="col-md-4">
					<div class="form-group">
					
						<input class='form-control' name='childdescription[]' placeholder='Description'>
					</div>
				</div>
				
			</div>
			`;
    

$('#addmorechildpercentages').append(ElementHTML);

 
}





















function myFunction2percentage() {
    
    
 var ElementHTML = `	<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' name='cancellationdays[]' placeholder='Cancellation Prior Days'>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						
						<input class='form-control' name='cancellationpercentage[]' placeholder='Cancellation Percentage Deduction'>
					</div>
				</div>
				
				
				
					<div class="col-md-4">
					<div class="form-group">
					
						<input class='form-control' name='cancellationdescription[]' placeholder='Description'>
					</div>
				</div>
				
				
			</div>`;
    

$('#addmorepercentages').append(ElementHTML);

 
}

function myFunction2() {
    
    
 var ElementHTML = `<div style="padding-left:10px; padding-right:10px; padding-bottom:10px; padding-top:10px; background-color:#<?php echo random_color();?>;">
				<div class='row mt-2'>
					<div class="col-sm">
					
						<input class='form-control' placeholder='Policy Name' name='names[]' value=''>
					</div>
				</div>
				<div class='row mt-2'>
					<div class="col-sm">
						
						<textarea class='form-control' name='cancellationpolicy[]' placeholder='Policy Description' placeholder=''></textarea>
					</div>
				</div>
			</div>`;
    

$('#populateme').append(ElementHTML);

 
}

</script>

<?php endblock(); ?>