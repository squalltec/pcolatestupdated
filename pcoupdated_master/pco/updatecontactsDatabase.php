<?php
require_once('db_connection.php');


include('header.php');






if(isset($_POST['delete']))

{
    
    $id=$_POST['ida'];
    $tablee=$_POST['tablea'];
    
   
    
    $sql = "DELETE FROM $tablee WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
} else {
  //echo "Error deleting record: " . $conn->error;
}
    
    
    
}





if(isset($_POST['update']))

{
  
    
    $tablee=$_POST['tablee'];
    
    $id=$_POST['id'];
    
    $company=$_POST['hotel'];
    
    $country=$_POST['country'];
    
    $city=$_POST['city'];
    
    $fname=$_POST['fname'];
    
    $lname=$_POST['lname'];
    
    $designation=$_POST['designation'];
    
    $department=$_POST['department'];
    
    $outlet=$_POST['outlet'];
    
    $email=$_POST['email'];
    
    $phone=$_POST['phone'];
    
    $nationality=$_POST['nationality'];
    
    $birthday=$_POST['birthday'];
    
 
 $n=0;
 foreach($id as $ii)
 {
     
   if($tablee[$n]=='contactshotels' || $tablee[$n]=='contactsevents' || $tablee[$n]=='contactsothers')  
     
     {
$sql ="UPDATE $tablee[$n] SET hotel='$company[$n]',country='$country[$n]',city='$city[$n]',country='$country[$n]',fname='$fname[$n]',lname='$lname[$n]',designation='$designation[$n]',department='$department[$n]',outlet='$outlet[$n]',email='$email[$n]',phone='$phone[$n]',nationality='$nationality[$n]',birthday='$birthday[$n]' WHERE id='$id[$n]'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


else{
    $sql ="UPDATE $tablee[$n] SET company='$company[$n]',country='$country[$n]',city='$city[$n]',country='$country[$n]',fname='$fname[$n]',lname='$lname[$n]',designation='$designation[$n]',department='$department[$n]',outlet='$outlet[$n]',email='$email[$n]',phone='$phone[$n]',nationality='$nationality[$n]',birthday='$birthday[$n]' WHERE id='$id[$n]'";

 $result = $conn->query($sql);


if ($result === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}









$n=$n+1;

 }
 
    
    
}



















if(isset($_GET['SpecificData'])){
	$datatype = $_GET['SpecificData'];
	switch ($datatype) {
		case "events":
			$sql = "SELECT * FROM contactsevents ORDER BY id DESC";
			$table='contactsevents';
		  break;
		  	case "others":
			$sql = "SELECT * FROM contactsothers ORDER BY id DESC";
			$table='contactsothers';
		  break;
		  	case "tour":
			$sql = "SELECT * FROM contactstour ORDER BY id DESC";
			$table='contactstour';
		  break;
		case "hotels":
			$sql = "SELECT * FROM contactshotels ORDER BY id DESC";
				$table='contactshotels';
		  break;
		case "rentacar":
			$sql = "SELECT * FROM contactsrentacar ORDER BY id DESC";
			$table='contactsrentacar';
		  break;
		case "transport":
			$sql = "SELECT * FROM contactstransports ORDER BY id DESC";
			$table='contactstransports';
			break;
		case "all":
			$sql = "SELECT * FROM contactsevents  
			union select * from contactshotels  
			union select * from contactsrentacar 
			union select * from contactsothers  
			union select * from contactstransports ORDER BY id DESC";
			
			$table='all';
			break; 
		default:
		$sql = "SELECT * FROM contactsevents  
		union select * from contactshotels  
			union select * from contactstour 
		union select * from contactsrentacar  
		union select * from contactsothers  
		union select * from contactstransports ORDER BY id DESC
		";
		
		$table='all';
	  }

}else{
	$sql = "SELECT * FROM contactsevents  
		union select * from contactshotels  
			union select * from contactstour  
		union select * from contactsrentacar  
		union select * from contactsothers  
		union select * from contactstransports ORDER BY id DESC
		";
		$table='all';
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
					
					<?php
					if($table=='all')
{
    ?>
						<tr>
							<th style="display: none;">Id</th>
							<th><?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'hotels'){ echo"Hotel";}else{echo 'Company';} ?></th>
							<th>Country</th>
							<th>City</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Designation</th>
							<th>Department</th>
							<th>Outlet</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Nationality</th>
							<th>Bday</th>
							

						</tr>
						<?php
						
}
else
{
?>
	<tr>
	   
						    <th>X</th>
							<th style="display: none;">Id</th>
							<th><?php if(isset($_GET['SpecificData']) && $_GET['SpecificData'] == 'hotels'){ echo"Hotel";}else{echo 'Company';} ?></th>
							<th style='display:none;'>Country</th>
							<th style='display:block;'>City</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Designation</th>
							<th>Department</th>
							<th>Outlet</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Nationality</th>
							<th>Bday</th>
						    

						</tr>
<?php
}
?>

					</thead>
					<tbody>

						<?php


if($table=='all')
{
						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {

						?>

                               
								<tr>
						  
                                    
									<td style="display: none;"><?php echo $row['id']; ?></td>
									<td><?php echo $row['hotel'].$row['company']; ?></td>
									<td><?php echo $row['country']; ?></td>
									<td><?php echo $row['city']; ?></td>
									<td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['lname']; ?></td>
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
						
}

else{
    
    ?>
    
    
    
     <form method='POST' action='#'> 
              
            <input style='display:none;' id='ida' value='' name='ida'> 
             <input style='display:none;' id='tablea' value='' name='tablea'>
             
          <input name='delete' id='hiddensubmit' style='display:none;' type='submit' class='btn btn-danger' value='X'>        
                                   
    </form>
    
    
    
     <form action='#' method='POST'>
         
         <?php
						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {

						?>

                               
							 <tr>	
							 
								    
                                <td style="display:none;"> <input style='display:none;' class='form-control' name='tablee[]' value='<?php echo $table;?>'></td>
                                <td style="display:none;"><input style='display:none;' class='form-control' name='id[]' value='<?php echo $row['id']; ?>'></td>
                                   
									
                                  <td><input name='dela' data-id='<?php echo $row['id']; ?>' data-table='<?php echo $table;?>' style='width:40px;' onclick='delentry(this)' class='btn btn-danger' value='X'></td>
                                   
                                   
                                    <td style="display: none;"><?php echo $row['id']; ?></td>
									<td><input style='width:350px;' name='hotel[]' class='form-control' value='<?php echo $row['hotel'].$row['company'];; ?>'></td>
									<td style='display:none;'><input style='width:350px;' name='country[]' class='form-control' value='<?php echo $row['country']; ?>'></td>
									<td style='display:block;'><input style='width:150px;' name='city[]' class='form-control' value='<?php echo $row['city']; ?>'></td>
									<td><input style='width:150px;' name='fname[]' class='form-control' value='<?php echo $row['fname']; ?>'></td>
									<td><input style='width:150px;' name='lname[]' class='form-control' value='<?php echo $row['lname']; ?>'></td>
									<td><input style='width:350px;' name='designation[]' class='form-control' value='<?php echo $row['designation']; ?>'></td>
									<td><input style='width:150px;' name='department[]' class='form-control' value='<?php echo $row['department']; ?>'></td>
									<td><input style='width:10px;' name='outlet[]' class='form-control' value='<?php echo $row['outlet']; ?>'></td>
									<td><input style='width:350px;' name='email[]' class='form-control' value='<?php echo $row['email']; ?>'></td>
									<td><input style='width:150px;' name='phone[]' class='form-control' value='<?php echo $row['phone']; ?>'></td>
									<td><input style='width:150px;' name='nationality[]' class='form-control' value='<?php echo $row['nationality']; ?>'></td>
									<td><input style='width:150px;' type='date[]' name='birthday' class='form-control' value='<?php echo $row['birthday'];?>'></td>
                                    
                                   

								
								 </tr>
                                


						<?php
							}
						}
						
						
						
						?>
						
						
						
                        <input style='float:right;' name='update' type='submit' class='btn btn-success' value='Update'>
                                    
						</form>
						
						<?php
    
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






<script>
    function delentry($this)
    {
        
        var id=$this.getAttribute('data-id');
        
        var table=$this.getAttribute('data-table');
        
        document.getElementById('tablea').value=table;
        
        document.getElementById('ida').value=id;
        
        document.getElementById('hiddensubmit').click();
        
        
    }
</script>













































	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

	<script src="assets/js/table-datatable.js"></script>













</main>